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
        <span class="post-title">Resend Confirmation Code</span>
        <div class="post-content">
            <p>Oh no! Something happened to your confirmation code you say? Well all you have to do is fill out the form below and we'll try to get you sorted.</p>
            <div class="login col-left">
                <div class="login-form">
                    {{ Form::open() }}
                    <input type='text' name='email' placeholder='Your Email' /><br/>
                    <input type='text' name='username' placeholder='Minecraft Username' /><br/>
                    <input type='submit' value="Resend" />
                    {{ Form::close() }}
                </div>
            </div>
            <div class="login col-right">
                <!-- Empty -->
            </div>
        </div>
    </div>
@stop