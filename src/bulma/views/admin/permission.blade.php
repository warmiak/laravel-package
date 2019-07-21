@extends('admin.layouts.admin')

@section('content')
<section class="hero">
    <div class="hero-body">
        <div class="columns">
            @foreach($roles as $role)
                <div class="column">
                    <div class="box">
                        <h2 class="title is-4">
                            {{ ucfirst($role->name) }}
                        </h2>

                        @foreach($permissions as $permission)
                            <edit-permission permission="{{ $permission['name'] }}" role="{{ $role->name }}" active="{{ $role->hasPermission($permission['name']) }}"></edit-permission>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
