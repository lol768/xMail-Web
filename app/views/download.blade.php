@extends('layouts.main')

@section('styles')
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/STYLE.css') }}" />
    -->
@stop
@section('scripts')
    <script src="{{ URL::asset('js/about.js') }}"></script> <!-- Also handles the development stuff -->
@stop

@section('content')
    <div class="post">
        <div class="post-content">
            <div class="aboutbox" data-url="http://dev.bukkit.org/bukkit-plugins/xmail" data-newwindow="1">
                <span class='aboutheader'>Bukkit Plugin</span><br/>
                <img src="{{ URL::asset('images/download_bukkit.png') }}"><br/>
                <p class="aboutcontent">Simply drag & drop to install. No complicated setup.</p>
                <a href="http://dev.bukkit.org/bukkit-plugins/xmail">more...</a>
            </div>
            <div class="aboutbox" data-url="#" data-newwindow="0">
                <span class='aboutheader'>xMail Client Mod</span><br/>
                <img src="{{ URL::asset('images/coming_soon.png') }}"><br/>
                <p class="aboutcontent">Access your mail from anywhere, anytime.</p>
                <a href="#">more...</a>
            </div>
            <div class="aboutbox" data-url="https://github.com/turt2live/xMail-Web" data-newwindow="1">
                <span class='aboutheader'>xMail Web Portal</span><br/>
                <img src="{{ URL::asset('images/coming_soon.png') }}"><br/>
                <p class="aboutcontent">Want to host your own node or portal? This is your choice.</p>
                <a href="https://github.com/turt2live/xMail-Web">more...</a>
            </div>
            <div class="aboutbox" data-url="#" data-newwindow="0">
                <span class='aboutheader'>xMail API</span><br/>
                <img src="{{ URL::asset('images/coming_soon.png') }}"><br/>
                <p class="aboutcontent">Cross-server support, easy to use, what more do you need?</p>
                <a href="#">more...</a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="post">
        <span class="post-title">xMail Downloads</span>
        <div class="post-content">
            <p>Letter wooded direct two men indeed income sister. Impression up admiration he by partiality is. Instantly immediate his saw one day perceived. Old blushes respect but offices hearted minutes effects. Written parties winding oh as in without on started. Residence gentleman yet preserved few convinced. Coming regret simple longer little am sister on. Do danger in to adieus ladies houses oh eldest. Gone pure late gay ham. They sigh were not find are rent.</p>
            <p>Bringing so sociable felicity supplied mr. September suspicion far him two acuteness perfectly. Covered as an examine so regular of. Ye astonished friendship remarkably no. Window admire matter praise you bed whence. Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off.</p>
            <p>Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of.</p>
        </div>
    </div>
@stop