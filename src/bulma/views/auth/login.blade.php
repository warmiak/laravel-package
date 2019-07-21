@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="bg-white w-1/3 mx-auto shadow-md rounded px-8 pt-6 pb-8 my-8 flex flex-col">
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}

                <div class="mb-1">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="email">E-Mail</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('email') ? ' border-red' : '' }}"
                           id="email" name="email" type="email" placeholder="E-Mail" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="mb-1">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('password') ? ' border-red' : '' }}"
                           id="password" name="password" type="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <p class="text-red text-xs italic">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="remember" class="block text-grey-darker text-sm font-bold">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Stay logged in
                    </label>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Sign In</button>
                    <a class="bg-red-light hover:bg-red text-white font-bold py-2 px-4 rounded" href="{{ route('register') }}">Register</a>
                </div>
            </form>
            <div class="text-center mt-8">
                <p class="text-grey-dark text-sm">Forgot Password ? <a href="{{ route('password.request') }}" class="no-underline text-blue font-bold">Reset Password</a>.</p>
            </div>
        </div>
    </div>
@endsection