<?php

namespace App\Http\Controllers;

use App\Logs\LogViewer;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', shell_exec("/usr/local/mysql-5.7.21-macos10.13-x86_64/bin/mysql --version"), $mysql);

        $system = [
            'php_version' => phpversion(),
            'mysql_version' => $mysql[0],
            'node_version' => shell_exec("node -v"),
            'composer_version' => shell_exec("composer -V"),
            'system_os' => php_uname(),
        ];

        return view('admin.dashboard', compact('system'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission()
    {
        $defaultPermissions = config('acl.default_permissions');

        $array = array_column($defaultPermissions, 0);

        $collection = \App\Permission::all();

        $permissions = $collection->whereNotIn('name', $array)->toArray();

        $roles = Role::all();

        return view('admin.permission', compact('roles', 'permissions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        $accounts = User::with('roles')->get();

        return view('admin.account', compact('accounts'));
    }

    /**
     * @param LogViewer $logViewer
     * @return array
     */
    public function logs(LogViewer $logViewer)
    {
        $files = File::allFiles(storage_path('logs'));

        $array = array();
        foreach ($files as $value) {
            $log = File::get($value);
            $name = File::name($value);

            $array[] = array(
                'message' => $logViewer->getStats($log),
                'filename' => $name,
                'count' => array_sum($logViewer->getStats($log))
            );
        }

        $stats = $logViewer->getPagination($array, 25);

        return view('admin.logs', compact('stats'));
    }

    /**
     * @param $name
     * @param LogViewer $logViewer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logDetail($name, LogViewer $logViewer)
    {
        $file = File::get(storage_path('logs'). '/' .$name. '.log');

        $messages = $logViewer->getMessage($file);
        $logs = $logViewer->getPagination($messages, 25, $name);

        return view('admin.logDetail', compact('logs'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function accountDetail($id)
    {
        $account = User::with('profiles')->findOrFail($id);

        $roles = array();

        foreach (Role::all() as $value) {
            if ($account->hasRole($value->name)) {
                array_push($roles, [
                    'name' => $value->name,
                    'label' => $value->label,
                    'status' => 1
                ]);
            } else {
                array_push($roles, [
                    'name' => $value->name,
                    'label' => $value->label,
                    'status' => 0
                ]);
            }
        }

        return view('admin.accountDetail', compact('account', 'roles'));
    }
}
