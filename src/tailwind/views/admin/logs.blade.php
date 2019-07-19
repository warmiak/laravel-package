@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="mb-8 p-2 bg-blue-darker text-white">Logs</h2>
        <div class="px-4">
            <table class="w-full">
                <thead class="flex w-full mb-2">
                <tr class="flex w-full">
                    <th class="w-1/5 flex justify-center bg-black"><span class="flex text-white px-2"><i class="mdi mdi-file mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-grey-darker"><span class="flex text-white px-2"><i class="mdi mdi-view-list mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-red-darker"><span class="flex text-white px-2"><i class="mdi mdi-bug mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-red-dark"><span class="flex text-white px-2"><i class="mdi mdi-bullhorn mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-red"><span class="flex text-white px-2"><i class="mdi mdi-heart-pulse mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-red-light"><span class="flex text-white px-2"><i class="mdi mdi-close-circle mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-orange"><span class="flex items-center text-white px-2"><i class="mdi mdi-alert mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-green"><span class="flex items-center text-white px-2"><i class="mdi mdi-alert-circle mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-blue"><span class="flex items-center text-white px-2"><i class="mdi mdi-information mdi-24px"></i></span></th>
                    <th class="w-1/5 flex justify-center bg-blue-light"><span class="flex items-center text-white px-2"><i class="mdi mdi-lifebuoy mdi-24px"></i></span></th>
                </tr>
                </thead>
                <tbody class="flex w-full flex-wrap">
                @foreach($stats as $stat)
                    <tr class="flex w-full text-center py-2 border-b items-center">
                        <td class="w-1/5 text-left">
                        <span class="p-1">
                            <a href="{{ route('admin_log_detail', ['log' => $stat['filename']]) }}" class="text-black underline hover:text-grey-dark">
                                {{ ltrim(preg_replace('/[^0-9-]/', '', $stat['filename']), '-') }}
                                @if($stat['filename'] == 'laravel')
                                    {{ $stat['filename'] }}
                                @endif
                            </a>
                        </span>
                        </td>
                        <td class="w-1/5"><span class="bg-grey-darker text-white py-1 px-3 rounded">{{ (isset($stat['count'])) ? $stat['count'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-red-darker text-white py-1 px-3 rounded">{{ (isset($stat['message']['emergency'])) ? $stat['message']['emergency'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-red-dark text-white py-1 px-3 rounded">{{ (isset($stat['message']['alert'])) ? $stat['message']['alert'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-red text-white py-1 px-3 rounded">{{ (isset($stat['message']['critical'])) ? $stat['message']['critical'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-red-light text-white py-1 px-3 rounded">{{ (isset($stat['message']['error'])) ? $stat['message']['error'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-orange text-white py-1 px-3 rounded">{{ (isset($stat['message']['warning'])) ? $stat['message']['warning'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-green text-white py-1 px-3 rounded">{{ (isset($stat['message']['notice'])) ? $stat['message']['notice'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-blue text-white py-1 px-3 rounded">{{ (isset($stat['message']['info'])) ? $stat['message']['info'] : 0 }}</span></td>
                        <td class="w-1/5"><span class="bg-blue-light text-white py-1 px-3 rounded">{{ (isset($stat['message']['debug'])) ? $stat['message']['debug'] : 0 }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $stats->links() }}
        </div>
    </div>
@endsection