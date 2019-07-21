@extends('admin.layouts.admin')

@section('content')
<section class="hero">
    <div class="hero-body">
        <div class="box">
            <edit-account :account="{{ $account }}" :roles="{{ json_encode($roles) }}"></edit-account>
        </div>
    </div>
</section>
@endsection
