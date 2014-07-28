@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/mailbox.css') }}" />
@stop
@section('scripts')
    <script type="text/javascript">
        var mailUrl = "{{ URL::route('getMail') }}";
        var loadingRow = "<tr><td class='loading-row'><img src=\"{{ URL::asset('images/loading.png') }}\" class='loading'></td></tr>";
    </script>
    <script src="{{ URL::asset('js/mailbox.js') }}"></script>
@stop

@section('content')
    <div class="post">
        <span class="post-title">Mailbox <div id="newmessages">You have new messages. Click here to show them</div></span>
        <div class="post-content" style="margin-top: 15px;">
            <table id="mailbox">
                <tbody>
                <!-- Populated by JavaScript -->
                <tr><td class='loading-row'><img src="{{ URL::asset('images/loading.png') }}" class='loading'></td></tr>
                </tbody>
            </table>
            <div style='padding-top: 10px;'>
                <div id="showing">Showing messages 1 to 10 of 33</div>
                <div id="pagination">
                    <span class='btn previous'>&lt;&lt; Previous</span>
                    <span class='btn' data-page='1'>1</span>
                    <span class='btn' data-page='2'>2</span>
                    <span class='btn current' data-page='3'>3</span>
                    <span class='btn' data-page='4'>4</span>
                    <span class='btn' data-page='5'>5</span>
                    <span class='btn next disabled'>Next &gt;&gt;</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@stop