<div class="w-full">
    <div class=" shadow bg-grey-darkest pb-8">
        <div class="container mx-auto">
            <nav class="flex justify-between py-8 items-center mb-4">
                <a href="#" class="font-sans text-black md:text-white text-sm md:text-4xl font-thin">
                    <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
                    <span class="font-semibold text-xl tracking-tight">Tailwind CSS</span>
                </a>
                <ul class="list-reset flex">
                    <li><a href="/" class="text-black md:text-white p-2 md:p-4">Home</a></li>
                    <li><a href="{{ route('profile_index') }}" class="text-black md:text-white p-2 md:p-4 whitespace-no-wrap">Member</a></li>
                    @guest
                        <li><login-menu></login-menu></li>
                    @else
                        <user-menu linkclass="text-white" username="{{ ucfirst(Auth::user()->name) }}">
                            @if(Auth::user()->hasRole('admin'))
                                <li><a href="{{ route('admin_dashboard') }}" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-grey-darker">Dashboard</a></li>
                            @endif
                            <li><a href="{{ route('profile_edit') }}" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-grey-darker">Edit Profile</a></li>
                            <li><a href="{{ route('logout') }}" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-grey-darker"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </li>
                        </user-menu>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    @endguest
                </ul>

            </nav>
        </div>

        <div class="text-center text-white pb-8">
            <h1 class="font-sans font-thin">Laravel</h1>
            <h2 class="font-thin text-sm tracking-wide mt-2 mb-4">with Vue.js and Tailwind CSS</h2>

        </div>
    </div>

</div>