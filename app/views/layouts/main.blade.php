<!DOCTYPE html>
<html lang="en">
    <head>
        <title>xMail</title>
        <link rel="stylesheet" href="{{ URL::asset('css/xmail.css') }}" />
        @yield('styles')
        
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
        <script src="{{ URL::asset('js/xmail.js') }}"></script>
        @yield('scripts')
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="wrapper">
                    <a href="{{ URL::route('home') }}">
                        <img src="{{ URL::asset('images/logo.png') }}" alt="xMail Logo" class='logo'>
                    </a>
                    <nav>
                        <ul>
                            <li class='first'><a href="{{ URL::route('about') }}">About</a></li>
                            <li><a href="{{ URL::route('download') }}">Download</a></li>
                            <li><a href="{{ URL::route('servers') }}">Supported Servers</a></li>
                            <li class='last'><a href="{{ URL::route('contact') }}">Contact</a></li>
                            
                            <!-- Reverse order (including first & last classes) -->
                            @if(Auth::check())
                                <li class='right last'><a href="{{ URL::route('signout') }}">Sign Out</a></li>
                                <li class='right'><a href="#">My Account</a></li>
                                <li class='right first'><a href="{{ URL::route('mailbox') }}">Mail</a></li>
                            @else
                                <li class='right last'><a href="{{ URL::route('register') }}">Register</a></li>
                                <li class='right first'><a href="{{ URL::route('login') }}">Login</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="content">
                <div class="wrapper">
                    @if(Session::has('xmErrors') || isset($xmErrors))
                        @if($source = Session::has('xmErrors') ? Session::get('xmErrors') : $xmErrors) @endif
                        @foreach($source as $error)
                            <p class="alert error">{{ $error }}</p>
                        @endforeach
                    @endif
                    
                    @if(Session::has('xmWarnings') || isset($xmWarnings))
                        @if($source = Session::has('xmWarnings') ? Session::get('xmWarnings') : $xmWarnings) @endif
                        @foreach($source as $warning)
                            <p class="alert warning">{{ $warning }}</p>
                        @endforeach
                    @endif
                    
                    @if(Session::has('xmSuccesses') || isset($xmSuccesses))
                        @if($source = Session::has('xmSuccesses') ? Session::get('xmSuccesses') : $xmSuccesses) @endif
                        @foreach($source as $success)
                            <p class="alert success">{{ $success }}</p>
                        @endforeach
                    @endif
                    
                    @yield('content')
                </div>
            </div>
            <div id="footer">
                <div class="wrapper">
                    <footer>
                        <span style="float:left;">&copy; Copyright <?php echo date('Y'); ?> Travis Ralston | xMail is not affiliated with Mojang AB or Bukkit in any way.</span>
                        <span style="float:right;"><a href="{{ URL::route('terms') }}">Terms of Service</a> | <a href="{{ URL::route('privacy') }}">Privacy Policy</a></span>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>