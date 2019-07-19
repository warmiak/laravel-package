@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="bg-white w-1/3 mx-auto shadow-md rounded px-8 pt-6 pb-8 my-8 flex flex-col">
            <form action="{{ route('password.email') }}" method="post">
                {{ csrf_field() }}

                <div class="mb-6">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="email">E-Mail</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('email') ? ' border-red' : '' }}"
                           id="email" name="email" type="email" placeholder="E-Mail" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection