@extends('layouts.main')

@section('styles')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/STYLE.css') }}" />
    -->
@stop
@section('scripts')
    <!-- <script src="{{ URL::asset('js/SCRIPT.js') }}"></script>
    -->
@stop

@section('content')
    <div class="post">
        <span class="post-title">Login</span>
        <div class="post-content">
            <p>Don't have an account? <a href="{{ URL::route('register') }}">Register</a>!</p>
            <div class="login col-left">
                <div class="login-form">
                    {{ Form::open() }}
                    <input type='text' name='username' placeholder='Minecraft Username' /><br/>
                    <input type='password' name='password' placeholder='xMail Password' /><br/>
                    <input class='button button-flat button-flat-primary' type='submit' value="Login" />
                    {{ Form::close() }}
                </div>
            </div>
            <div class="login col-right">
                Logging in allows you to access your mailboxes, settings, and other features of xMail all for free! The credentials you enter here are in no way affiliated with you Minecraft/Mojang account and are validated on our end to make sure it's you. <br/>
                <br/>
                If at any time you forget your password, click <a href="{{ URL::route('forgotpass') }}">here</a> and we'll send you a reset link.
            </div>
        </div>
    </div>
@stop
