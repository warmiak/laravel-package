@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="bg-white w-1/3 mx-auto shadow-md rounded px-8 pt-6 pb-8 my-8 flex flex-col">
            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}

                <div class="mb-1">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="name">Username</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('email') ? ' border-red' : '' }}"
                           id="name" name="name" type="text" placeholder="Username" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="mb-1">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="email">E-Mail</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('email') ? ' border-red' : '' }}"
                           id="email" name="email" type="email" placeholder="E-Mail" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="mb-1">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('password') ? ' border-red' : '' }}"
                           id="password" name="password" type="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <p class="text-red text-xs italic">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="password_confirmation">Confirm Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('password') ? ' border-red' : '' }}"
                           id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password">
                    @if ($errors->has('password'))
                        <p class="text-red text-xs italic">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Register</button>
                </div>

            </form>
        </div>
    </div>
@endsection
