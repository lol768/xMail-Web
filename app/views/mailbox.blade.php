@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/mailbox.css') }}" />
@stop
@section('scripts')
    <script src="{{ URL::asset('js/mailbox.js') }}"></script>
    <script type="text/javascript">
        var mailUrl = "{{ URL::route('getMail') }}";
    </script>
@stop

@section('content')
    <div class="post">
        <span class="post-title">Mailbox</span>
        <div class="post-content" style="margin-top: 15px;">
            <table id="mailbox">
                <tbody>
                <!-- Populated by JavaScript -->
                </tbody>
            </table>
            <div style="color: #444;text-align: center; width: 100%; padding-bottom: 10px; padding-top: 10px;">no more messages</div>
        </div>
    </div>
@stop