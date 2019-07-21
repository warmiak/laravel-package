@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap my-8">
            @foreach($users as $user)
                <div class="bg-white w-2/5 shadow-lg rounded-lg overflow-hidden my-2 mx-auto border  {{ (!$user->active) ? 'border border-red' : '' }}">
                    <div class="sm:flex sm:items-center px-6 py-4">
                        @if(!empty($user->profiles->avatar))
                            <img class="block h-16 sm:h-24 rounded-full mx-auto mb-4 sm:mb-0 sm:mr-4 sm:ml-0" src="/storage/{{ $user->profiles->avatar }}" alt="">
                        @else
                            <img class="block h-16 sm:h-24 rounded-full mx-auto mb-4 sm:mb-0 sm:mr-4 sm:ml-0" src="/storage/profile/default.png" alt="">
                        @endif
                        <img class="block h-16 sm:h-24 rounded-full mx-auto mb-4 sm:mb-0 sm:mr-4 sm:ml-0" src="" alt="">
                        <div class="text-center sm:text-left sm:flex-grow">
                            <div class="mb-4">
                                <p class="text-xl leading-tight">{{ $user->profiles->firstname }} {{ $user->profiles->lastname }}</p>
                                <p class="text-sm leading-tight text-grey-dark">{{ $user->profiles->jobtitle }} at {{ $user->profiles->company }}</p>
                            </div>
                            <div>
                                <a href="{{ route('profile_show', ['name' => $user->name]) }}"
                                   class="text-xs font-semibold rounded-full px-4 py-1 leading-normal bg-white border border-blue text-blue hover:bg-blue hover:text-white">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mx-auto">
        {{ $users->links() }}
    </div>
@endsection
