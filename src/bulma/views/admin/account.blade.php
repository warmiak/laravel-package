@extends('admin.layouts.admin')

@section('content')
<section class="hero">
        <div class="hero-body">
            <div class="box">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>E-Mail</th>
                        <th>Active</th>
                        <th>Confirmed</th>
                        <th>Roles</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts as $account)
                        <tr>
                            <td><a href="{{ route('admin_account_detail', ['id' => $account->id]) }}">{{ $account->name }}</a></td>
                            <td>{{ $account->email }}</td>
                            <td><i class="mdi {{ ($account->active) ? 'mdi-check has-text-success' : 'mdi-close has-text-danger' }}"></i></td>
                            <td><i class="mdi {{ ($account->confirmed) ? 'mdi-check has-text-success' : 'mdi-close text-danger' }}"></i></td>
                            <td>
                                <ul class="list-reset">
                                    @foreach($account->roles as $role)
                                        <li>{{ $role->label }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ strftime('%d.%m.%Y - %k:%M', strtotime($account->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection
