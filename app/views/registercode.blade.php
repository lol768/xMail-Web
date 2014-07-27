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
        <span class="post-title">Complete Registration</span>
        <div class="post-content">
            Thank you for signing up for xMail! In order to verify that you own the account, please type the following command on an xMail supported server. We've also sent this information to your email in case you can't do that right now. But remember to do this as soon as possible - after 24 hours we'll assume you don't own the account if this code hasn't been entered.
            <br /><br />
            <b>The code is case-sensitive - we recommend you copy and paste this command into Minecraft!</b>
            <div class='registercode'>
                <span class='command'>/xmail confirm {{ Session::get('registercode') }}</span>
            </div>
        </div>
    </div>
    <div class="post">
        <span class="post-title">xMail Servers</span>
        <div class="post-content">
            Unsure of what servers support xMail? Try one of the following! 
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