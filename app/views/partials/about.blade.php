<div class="post">
    <div class="post-content">
        <div class='aboutbox @if($currentPage == "players") current @endif' data-url="{{ URL::route('about_players') }}">
            <span class='aboutheader'>For Players</span><br/>
            <img src="{{ URL::asset('images/about_players.png') }}"><br/>
            <p class="aboutcontent">Talk to your friends regardless of which server they are on.</p>
            <a href="{{ URL::route('about_players') }}">more...</a>
        </div>
        <div class='aboutbox @if($currentPage == "owners") current @endif' data-url="{{ URL::route('about_owners') }}">
            <span class='aboutheader'>For Server Owners</span><br/>
            <img src="{{ URL::asset('images/about_servers.png') }}"><br/>
            <p class="aboutcontent">Communicate with your players like never before.</p>
            <a href="{{ URL::route('about_owners') }}">more...</a>
        </div>
        <div class='aboutbox @if($currentPage == "networks") current @endif' data-url="{{ URL::route('about_networks') }}">
            <span class='aboutheader'>For Networks</span><br/>
            <img src="{{ URL::asset('images/about_networks.png') }}"><br/>
            <p class="aboutcontent">Keep players in touch under your own roof.</p>
            <a href="{{ URL::route('about_networks') }}">more...</a>
        </div>
        <div class='aboutbox @if($currentPage == "developers") current @endif' data-url="{{ URL::route('about_developers') }}">
            <span class='aboutheader'>For Developers</span><br/>
            <img src="{{ URL::asset('images/about_developers.png') }}"><br/>
            <p class="aboutcontent">Enrich your plugin with cross-server rewards.</p>
            <a href="{{ URL::route('about_developers') }}">more...</a>
        </div>
        <div class='clear'></div>
    </div>
</div>