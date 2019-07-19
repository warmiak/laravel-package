@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="mb-8 p-2 bg-blue-darker text-white">Dashboard</h2>
        <div class="px-4">
            <div class="p-2 text-xs mb-2">
                PHP version: {{ $system['php_version'] }}
            </div>
            <div class="p-2 text-xs mb-2">
                MySql Version: {{ $system['mysql_version'] }}
            </div>
            <div class="p-2 text-xs mb-2">
                Node Version: {{ $system['node_version'] }}
            </div>
            <div class="p-2 text-xs mb-2">
                Composer Version: {{ $system['composer_version'] }}
            </div>
            <div class="p-2 text-xs mb-2">
                {{ $system['system_os'] }}
            </div>
        </div>
    </div>
@endsection
