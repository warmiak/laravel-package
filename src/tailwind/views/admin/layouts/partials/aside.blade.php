<div class="flex flex-col bg-blue-darker h-screen" style="padding-top: 3rem">
    <div class="mx-2">
        <a class="block text-white text-lg w-full hover:bg-white hover:text-grey-darkest p-2" href="{{ route('admin_dashboard') }}">
            <i class="mdi mdi-view-dashboard mdi-18px"></i> Dashboard
        </a>
    </div>
    <div class="mx-2">
        <a class="block text-white text-lg w-full hover:bg-white hover:text-grey-darkest p-2" href="{{ route('admin_permission') }}">
            <i class="mdi mdi-security-account mdi-18px"></i> Permission
        </a>
    </div>
    <div class="mx-2">
        <a class="block text-white text-lg w-full hover:bg-white hover:text-grey-darkest p-2" href="{{ route('admin_account') }}">
            <i class="mdi mdi-account mdi-18px"></i> Account
        </a>
    </div>
    <div class="mx-2">
        <a class="block text-white text-lg w-full hover:bg-white hover:text-grey-darkest p-2" href="{{ route('admin_logs') }}">
            <i class="mdi mdi-file-document mdi-18px"></i> Logs
        </a>
    </div>
</div>