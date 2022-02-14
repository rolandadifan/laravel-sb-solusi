<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script>
       document.addEventListener( 'DOMContentLoaded', function () {
        var main = new Splide( '#main-slider', {
            type      : 'fade',
            rewind    : true,
            pagination: false,
            arrows    : false,
        } );


        var thumbnails = new Splide( '#thumbnail-slider', {
            fixedWidth  : 100,
            fixedHeight : 60,
            gap         : 10,
            rewind      : true,
            pagination  : false,
            cover       : true,
            isNavigation: true,
            breakpoints : {
            600: {
                fixedWidth : 60,
                fixedHeight: 44,
            },
            },
        } );


        main.sync( thumbnails );
        main.mount();
        thumbnails.mount();
        } );

        var delay = 2000;
        $(window).on('load', function() {
            setTimeout(function(){
                $("#loading").hide();
                $(".loader").hide();
            },delay);
        });

            
    </script>