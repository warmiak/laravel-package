@extends('admin.layouts.admin')

@section('content')
    @php
        setlocale(LC_TIME, 'de_DE')
    @endphp
    <div class="container mx-auto">
        <h2 class="mb-8 p-2 bg-blue-darker text-white">Accounts</h2>

        <div class="px-4">
            <table class="text-left w-full">
                <thead class="bg-blue-darker flex text-white w-full">
                <tr class="flex w-full">
                    <th class="p-2 w-1/6">Username</th>
                    <th class="p-2 w-1/6">E-Mail</th>
                    <th class="p-2 w-1/6">Active</th>
                    <th class="p-2 w-1/6">Confirmed</th>
                    <th class="p-2 w-1/6">Roles</th>
                    <th class="p-2 w-1/6">Created</th>
                </tr>
                </thead>
                <tbody class="flex flex-col items-center justify-between">
                @foreach($accounts as $account)
                    <tr class="flex w-full">
                        <td class="p-2 w-1/6"><a class="text-blue-dark" href="{{ route('admin_account_detail', ['id' => $account->id]) }}">{{ $account->name }}</a></td>
                        <td class="p-2 w-1/6">{{ $account->email }}</td>
                        <td class="p-2 w-1/6"><i class="mdi {{ ($account->active) ? 'mdi-check text-green' : 'mdi-close text-red' }}"></i></td>
                        <td class="p-2 w-1/6"><i class="mdi {{ ($account->confirmed) ? 'mdi-check text-green' : 'mdi-close text-red' }}"></i></td>
                        <td class="p-2 w-1/6">
                            <ul class="list-reset">
                                @foreach($account->roles as $role)
                                    <li>{{ $role->label }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="p-2 w-1/6">{{ strftime('%d.%m.%Y - %k:%M', strtotime($account->created_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
