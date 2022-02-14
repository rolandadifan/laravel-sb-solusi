@include('include.header')
    <div id="loading">
            <span class="loader">
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--dot'></div>
                <div class='loader--text'></div>
            </span>
            <div class="textLoader">
                <center>
                <b>Please Wait ... </b>
                </center>
            </div>
    </div>

    @include('include.nav')

    @yield('content')
    
   @include('include.footer')

    @stack('prepend-script')
    @include('include.script')
    @stack('addon-script')
</body>
</html>