@php
    setlocale(LC_TIME, 'de_DE');
    date_default_timezone_set('Europe/Berlin')
@endphp
<div class="columns">
    <div class="column"></div>
    <div class="column is-narrow">
        <div style="padding-right: 12px">
            <span class="has-text-white">{{ strftime('%A, %d %B %Y - %k:%M', strtotime(now())) }}</span>
            <a class="has-text-white" href="{{ route('home') }}"><i class="mdi mdi-home mdi-24px px-4"></i></a>
            <a class="has-text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
