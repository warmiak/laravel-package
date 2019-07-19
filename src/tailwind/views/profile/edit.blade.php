@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="my-8">
        <form action="{{ route('profile_store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('name') ? ' border-red' : '' }}"
                       id="name" name="name" type="text" placeholder="Name" value="{{ (old('name')) ? old('name') : $user->name }}">
                @if ($errors->has('name'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">E-Mail</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('email') ? ' border-red' : '' }}"
                       id="email" name="email" type="email" placeholder="E-Mail" value="{{ (old('email')) ? old('email') : $user->email }}">
                @if ($errors->has('email'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="firstname">Firstname</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('firstname') ? ' border-red' : '' }}"
                       id="firstname" name="firstname" type="text" placeholder="Firstname" value="{{ (old('firstname')) ? old('firstname') : $user->profiles->firstname }}">
                @if ($errors->has('firstname'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('firstname') }}</p>
                @endif
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="lastname">Lastname</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('lastname') ? ' border-red' : '' }}"
                       id="lastname" name="lastname" type="text" placeholder="Lastname" value="{{ (old('lastname')) ? old('lastname') : $user->profiles->lastname }}">
                @if ($errors->has('lastname'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('lastname') }}</p>
                @endif
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="birthday">Birthday</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('birthday') ? ' border-red' : '' }}"
                       id="birthday" name="birthday" type="text" value="{{ (old('birthday')) ? old('birthday') : date('d-m-Y', strtotime($user->profiles->birthday)) }}">
                @if ($errors->has('birthday'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('birthday') }}</p>
                @endif
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="jobtitle">Jobtitle</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('jobtitle') ? ' border-red' : '' }}"
                       id="jobtitle" name="jobtitle" type="text" placeholder="Jobtitle" value="{{ (old('jobtitle')) ? old('jobtitle') : $user->profiles->jobtitle }}">
                @if ($errors->has('jobtitle'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('jobtitle') }}</p>
                @endif
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="company">Company</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('company') ? ' border-red' : '' }}"
                       id="company" name="company" type="text" placeholder="Company" value="{{ (old('company')) ? old('company') : $user->profiles->company }}">
                @if ($errors->has('company'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('company') }}</p>
                @endif
            </div>


            <div class="flex flex-no-wrap -mx-3 mb-2">
                <div class="w-full md:w-3/5 px-3 mb-6 md:mb-0">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="street">
                        Street
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                           id="street" name="street" type="text" placeholder="Street"
                           value="{{ (old('street')) ? old('street') : $user->profiles->street }}">
                    @if ($errors->has('street'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('street') }}</p>
                    @endif
                </div>
                <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="street_number">
                        Number
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                           id="street_number" name="street_number" type="text" placeholder="Street Number"
                           value="{{ (old('street_number')) ? old('street_number') : $user->profiles->street_number }}">
                    @if ($errors->has('street_number'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('street_number') }}</p>
                    @endif
                </div>
                <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="street_additive">
                        Additive
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                           id="street_additive" name="street_additive" type="text" placeholder="Street Additive"
                           value="{{ (old('street_additive')) ? old('street_additive') : $user->profiles->street_additive }}">
                    @if ($errors->has('street_additive'))
                        <p class="text-red text-xs italic mb-2">{{ $errors->first('street_additive') }}</p>
                    @endif
                </div>
            </div>

            <div class="mb-1">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="avatar">Company</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3"
                       id="avatar" name="avatar" type="file" placeholder="Avatar" value="{{ (old('avatar')) ? old('avatar') : $user->profiles->avatar }}">
                @if ($errors->has('company'))
                    <p class="text-red text-xs italic mb-2">{{ $errors->first('company') }}</p>
                @endif
            </div>

            <button class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded" type="submit">Save Profile</button>

        </form>
    </div>
</div>
@endsection
