@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="mb-8 p-2 bg-blue-darker text-white">Permission</h2>

        <div class="flex flex-wrap -mx-2 px-4">
            @foreach($roles as $role)

                <div class="w-1/4 mb-4">
                    <div class="mx-2">
                        <h3 class="p-2 bg-blue-darker text-white">{{ ucfirst($role->name) }}</h3>

                        <div class="flex flex-col px-2 border py-4">
                            @foreach($permissions as $permission)

                                <edit-permission permission="{{ $permission['name'] }}" role="{{ $role->name }}" active="{{ $role->hasPermission($permission['name']) }}"></edit-permission>

                            @endforeach
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection
