@extends('layouts.main')

@section('styles')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/STYLE.css') }}" />
    -->
@stop
@section('scripts')
    <script type='text/javascript'>
        var noImage = "{{ URL::asset('images/noicon.png') }}";
    </script>
    <script src="{{ URL::asset('js/mcservers.js') }}"></script>
@stop

@section('content')
    <div class="post">
        <span class="post-title">Supported Servers</span>
        <div class="post-content">
            <p>These are servers that have let us know that they use xMail. Is your server not on the list? <a href="{{ URL::route('contact') }}">Contact us</a> to get it added!</p>
            
            <div class='mcservers'>
                @foreach($servers as $server)           
                    <div class='server' data-name="{{ $server['name'] }}" data-ip="{{ $server['ip'] }}" data-port="{{ $server['port'] }}" data-url="{{ URL::route('mcserver', array($server['ip'], $server['port'], $server['token'])) }}">
                        <div class='loading'></div>
                        <div class='clear'></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop