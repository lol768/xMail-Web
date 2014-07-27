@extends('layouts.main')

@section('styles')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/STYLE.css') }}" />
    -->
@stop
@section('scripts')
    <script src="{{ URL::asset('js/about.js') }}"></script>
@stop

@section('content')
    @include('partials.about', array('currentPage' => null))
    <div class="post">
        <span class="post-title">What is xMail?</span>
        <div class="post-content">
            <p>xMail is a Minecraft mail service that allows players to communicate with each other, even if they are on different servers. Players can send send simple text messages, items, entities, and other custom objects that plugins create. Players can also access their mail from within a web browser, such as the one you are reading this page in, with full support for replying, sending, and forwarding mail.</p>
            <p>Server owners are not left in the dark when it comes to xMail however. Server owners and operators can control what comes in and out of their server through xMail and even supply their own xMail network to be used only for them. Owners can also setup mailboxes that players can contact and that multiple administrators can access. These mailboxes are powerful tools to keep in touch with players.</p>
            <p>For more information on how xMail can benefit you, regardless of your role, click any of the samples above.</p>
        </div>
    </div>
@stop