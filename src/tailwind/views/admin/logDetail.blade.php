@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h2 class="mb-8 p-2 bg-blue-darker text-white">Logs</h2>
        <div class="px-4">
            <table class="w-full">
                <tbody class="flex w-full flex-wrap">
                @foreach($logs as $key => $log)
                    <tr data-display="full_report{{{$key}}}" class="flex w-full border-b">
                        <td class="w-48 flex items-center py-1">
                            <span class="{{ $log['class'] }} flex items-center justify-between py-1 px-3 rounded w-full">
                                <i class="mdi {{ $log['icon'] }} mdi-24px"></i><span>{{$log['level']}}</span>
                            </span>
                        </td>
                        <td class="w-64 flex items-center justify-center"><span class="text-xs">{{$log['date']}}</span></td>
                        <td class="w-full break-words">

                            <span class="text-xs">{{ $log['message'] }}</span>
                            @if (isset($log['in_file'])) <br/>{{{$log['in_file']}}}@endif
                            @if ($log['full_report'])
                                <div class="stack" id="stack{{{$key}}}"
                                     style="display: none; white-space: pre-wrap;">{{{ trim($log['full_report']) }}}
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $logs->render() !!}
        </div>
    </div>
@endsection

