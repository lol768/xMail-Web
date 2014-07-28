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
        <span class="post-title">Register</span>
        <div class="post-content">
            <p>Already have an account? <a href="{{ URL::route('login') }}">Login</a>!</p>
            <div class="login col-left">
                <div class="login-form">
                    {{ Form::open() }}
                    <input type='text' name='email' placeholder='Your Email' /><br/>
                    <input type='text' name='username' placeholder='Minecraft Username' /><br/>
                    <br/>
                    <b>Don't use your Minecraft account password!</b><br/>
                    <input type='password' name='password' placeholder='xMail Password' /><br/>
                    <input type='password' name='confpassword' placeholder='Confirm Password' /><br/>
                    <input class='button button-flat button-flat-primary' type='submit' value="Sign Up" />
                    {{ Form::close() }}
                </div>
            </div>
            <div class="login col-right">
                Registering for an account allows you to access your mail without being in-game. You don't need an account to send or receive mail, but it sure does make it easier to check it on the go! <br/>
                <br />
                Once you register, you will be asked to validate your account on an xMail-supported server. This is as easy as typing a command and you'll be set!<br />
                <br />
                We only validate your Minecraft username against Mojang, but we don't use your entered credentials to validate your Minecraft account - so choose a different password!<br />
                <br />
                If you have any questions about registration, feel free to <a href="{{ URL::route('contact') }}">contact us</a> - we'll be happy to help!
            </div>
        </div>
    </div>
@stop
