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
        <span class="post-title">Contact Us</span>
        <div class="post-content">
            <br/>
            <div class="login col-left">
                <div class="login-form">
                    {{ Form::open() }}
                    <input type='text' name='email' placeholder='Your Email' /><br/>
                    <input type='text' name='username' placeholder='Minecraft Username (optional)' /><br/>
                    <textarea name='message' class='contact' placeholder="Your Message"></textarea><br/>
                    <input type='submit' value="Send" />
                    {{ Form::close() }}
                </div>
            </div>
            <div class="login col-right">
                Have an issue with your account? Questions about xMail? Just want to say hi? Fill out the form to the left and we'll get back to you as soon as we can!<br/>
                <br/>
                If you keep your message short and detailed we'll give you a gold star.
            </div>
        </div>
    </div>
@stop