@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto">

        <h2 class="mb-8 p-2 bg-blue-darker text-white">Account Detail</h2>

        <edit-account :account="{{ $account }}" :roles="{{ json_encode($roles) }}"></edit-account>

    </div>
@endsection
