@extends('layouts.app')

@section('content')


    <div class="flex ">
        <div class="container mx-auto py-8">
            <div class="flex px-10">
                <div class="w-1/4">
                    <div class="mb-4">
                        @if(!empty($user->profiles->avatar))
                            <img class="rounded-lg" src="/storage/{{ $user->profiles->avatar }}" alt="Avatar">
                        @else
                            <img class=rounded-lg" src="/storage/profile/default.png" alt="">
                        @endif
                    </div>
                    <div class="mb-4">
                        <div class="text-3xl font-medium text-grey-darkest">{{ $user->profiles->firstname }} {{ $user->profiles->lastname }}</div>
                        <div class="text-xl text-grey-dark font-light">{{ $user->profiles->jobtitle }}</div>
                    </div>
                    <div class="pb-6 border-b">
                        <a href="#" class="no-underline text-sm ">
                            Add a bio
                        </a>
                    </div>
                    <div class="flex items-center text-left py-4 mb-4 border-b">
                        <div class="flex items-center mr-2">
                            <svg class="fill-current text-grey-dark w-4 h-4" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/></svg>
                        </div>
                        <div>
                            <a href="#" class="no-underline text-sm">{{ $user->email }}</a>
                        </div>
                    </div>
                    <div class="">
                        <div class="font-medium text-grey-darkest">
                            Organizations
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="mr-1">
                                <a href="https://github.com/cogitools">
                                    <img class="w-8 h-8 rounded" src="https://avatars1.githubusercontent.com/u/1054277?s=70&v=4">
                                </a>
                            </div>
                            <div class="mr-1">
                                <a href="https://github.com/cogitools">
                                    <img class="w-8 h-8 rounded" src="https://avatars1.githubusercontent.com/u/1054277?s=70&v=4">
                                </a>
                            </div>
                            <div class="mr-1">
                                <a href="https://github.com/cogitools">
                                    <img class="w-8 h-8 rounded" src="https://avatars1.githubusercontent.com/u/1054277?s=70&v=4">
                                </a>
                            </div>
                            <div>
                                <a href="https://github.com/cogitools">
                                    <img class="w-8 h-8 rounded" src="https://avatars1.githubusercontent.com/u/1054277?s=70&v=4">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-3/4 ml-6 mt-2">
                    <div class="flex items-center font-thin text-grey-dark text-sm border-b">
                        <div class="p-4 border-b-2 font-normal text-grey-darkest border-orange -mb-2px">
                            Overview
                        </div>
                        <div class="p-4 flex items-center">
                            <div>
                                Repositories
                            </div>
                            <div class="rounded-lg bg-grey-light text-xs ml-1 p-px">
                                41
                            </div>
                        </div>
                        <div class="p-4 flex items-center">
                            <div>
                                Stars
                            </div>
                            <div class="rounded-lg bg-grey-light text-xs ml-1 p-px">
                                6
                            </div>
                        </div>
                        <div class="p-4 flex items-center">
                            <div>
                                Followers
                            </div>
                            <div class="rounded-lg bg-grey-light text-xs ml-1 p-px">
                                15
                            </div>
                        </div>
                        <div class="p-4 flex items-center">
                            <div>
                                Following
                            </div>
                            <div class="rounded-lg bg-grey-light text-xs ml-1 p-px">
                                23
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2 pt-6 pb-2 font-normal text-grey-darkest">
                            Pinned repositories
                        </div>
                        <div class="w-1/2 justify-end text-right text-grey-dark text-sm font-light pt-6 pb-2">
                            Customize your pinned repositories
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 border px-4 py-4 mb-4
    -mr-2
rounded text-sm">
                            <div class="flex">
                                <div class="mr-2">
                                    <svg class="h-3 w-3 fill-current text-grey-dark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/2000/svg"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>

                                </div>
                                <div>
                                    <a href="#" class="no-underline">
                                        laravel/framework
                                    </a>
                                </div>
                            </div>
                            <div class="flex text-sm mt-6">
                                <div class="mr-4 font-thin text-xs">
                                    PHP
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    8.8k
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    5k
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 border px-4 py-4 mb-4
ml-4
rounded text-sm">
                            <div class="flex">
                                <div class="mr-2">
                                    <svg class="h-3 w-3 fill-current text-grey-dark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/2000/svg"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>

                                </div>
                                <div>
                                    <a href="#" class="no-underline">
                                        laravel/framework
                                    </a>
                                </div>
                            </div>
                            <div class="flex text-sm mt-6">
                                <div class="mr-4 font-thin text-xs">
                                    PHP
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    8.8k
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    5k
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 border px-4 py-4 mb-4
    -mr-2
rounded text-sm">
                            <div class="flex">
                                <div class="mr-2">
                                    <svg class="h-3 w-3 fill-current text-grey-dark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/2000/svg"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>

                                </div>
                                <div>
                                    <a href="#" class="no-underline">
                                        laravel/framework
                                    </a>
                                </div>
                            </div>
                            <div class="flex text-sm mt-6">
                                <div class="mr-4 font-thin text-xs">
                                    PHP
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    8.8k
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    5k
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 border px-4 py-4 mb-4
ml-4
rounded text-sm">
                            <div class="flex">
                                <div class="mr-2">
                                    <svg class="h-3 w-3 fill-current text-grey-dark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/2000/svg"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>

                                </div>
                                <div>
                                    <a href="#" class="no-underline">
                                        laravel/framework
                                    </a>
                                </div>
                            </div>
                            <div class="flex text-sm mt-6">
                                <div class="mr-4 font-thin text-xs">
                                    PHP
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    8.8k
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    5k
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 border px-4 py-4 mb-4
    -mr-2
rounded text-sm">
                            <div class="flex">
                                <div class="mr-2">
                                    <svg class="h-3 w-3 fill-current text-grey-dark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/2000/svg"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>

                                </div>
                                <div>
                                    <a href="#" class="no-underline">
                                        laravel/framework
                                    </a>
                                </div>
                            </div>
                            <div class="flex text-sm mt-6">
                                <div class="mr-4 font-thin text-xs">
                                    PHP
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    8.8k
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    5k
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 border px-4 py-4 mb-4
ml-4
rounded text-sm">
                            <div class="flex">
                                <div class="mr-2">
                                    <svg class="h-3 w-3 fill-current text-grey-dark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/2000/svg"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>

                                </div>
                                <div>
                                    <a href="#" class="no-underline">
                                        laravel/framework
                                    </a>
                                </div>
                            </div>
                            <div class="flex text-sm mt-6">
                                <div class="mr-4 font-thin text-xs">
                                    PHP
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    8.8k
                                </div>
                                <div class="mr-4 font-thin text-xs">
                                    5k
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-1/2 pt-6 pb-2 font-normal text-grey-darkest">
                            1,438 contributions in the last year
                        </div>
                        <div class="w-1/2 pt-6 pb-2 justify-end text-right text-grey-dark text-sm font-light flex">
                            <div>
                                Contribution settings
                            </div>
                            <div class="">
                                <svg class="fill-current text-grey-dark h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="border p-4 rounded">
                        <img src="https://user-images.githubusercontent.com/1791228/34055423-1e71e608-e19d-11e7-87f9-49d2cbb08c50.png">
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
