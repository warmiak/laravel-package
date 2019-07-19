@php
    setlocale(LC_TIME, 'de_DE');
    date_default_timezone_set('Europe/Berlin')
@endphp
<nav class="flex justify-end bg-blue-darker text-white">
    <ul class="list-reset flex items-center">
        <li><a class="text-white" href="{{ route('home') }}"><i class="mdi mdi-home mdi-24px px-4"></i></a></li>
        <li class="py-3 pr-4"><span class="text-xs">{{ strftime('%A, %d %B %Y - %k:%M', strtotime(now())) }}</span></li>
        <li class="bg-orange-dark py-3 px-6"><a class="text-white" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
</nav>