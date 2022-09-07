<!doctype html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155905321-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-155905321-1');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '471041803606898');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=471041803606898&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Hotjar Tracking Code for https://croland.hr/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1635134,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <style>
      .lds-roller {
          display: inline-block;
          position: relative;
          width: 80px;
          height: 80px;
        }
        .lds-roller div {
          animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
          transform-origin: 40px 40px;
        }
        .lds-roller div:after {
          content: " ";
          display: block;
          position: absolute;
          width: 7px;
          height: 7px;
          border-radius: 50%;
          background: #fff;
          margin: -4px 0 0 -4px;
        }
        .lds-roller div:nth-child(1) {
          animation-delay: -0.036s;
        }
        .lds-roller div:nth-child(1):after {
          top: 63px;
          left: 63px;
        }
        .lds-roller div:nth-child(2) {
          animation-delay: -0.072s;
        }
        .lds-roller div:nth-child(2):after {
          top: 68px;
          left: 56px;
        }
        .lds-roller div:nth-child(3) {
          animation-delay: -0.108s;
        }
        .lds-roller div:nth-child(3):after {
          top: 71px;
          left: 48px;
        }
        .lds-roller div:nth-child(4) {
          animation-delay: -0.144s;
        }
        .lds-roller div:nth-child(4):after {
          top: 72px;
          left: 40px;
        }
        .lds-roller div:nth-child(5) {
          animation-delay: -0.18s;
        }
        .lds-roller div:nth-child(5):after {
          top: 71px;
          left: 32px;
        }
        .lds-roller div:nth-child(6) {
          animation-delay: -0.216s;
        }
        .lds-roller div:nth-child(6):after {
          top: 68px;
          left: 24px;
        }
        .lds-roller div:nth-child(7) {
          animation-delay: -0.252s;
        }
        .lds-roller div:nth-child(7):after {
          top: 63px;
          left: 17px;
        }
        .lds-roller div:nth-child(8) {
          animation-delay: -0.288s;
        }
        .lds-roller div:nth-child(8):after {
          top: 56px;
          left: 12px;
        }
        @keyframes lds-roller {
          0% {
            transform: rotate(0deg);
          }
          100% {
            transform: rotate(360deg);
          }
        }

    </style>
    <title>CroLand.hr</title>
  </head>

        

  <body id="body">

        @include('frontend.includes.top_nav')
        @include('frontend.includes.top_nav_mobile')

        @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
      $('.menu, .overlay').click(function () {
        $('.menu').toggleClass('clicked');
        
        $('#nav').toggleClass('show');
        
      });
      </script>
      <script>
        $('.slider').slick();
      </script>
      <!--
      <a class="go-to-top" href="#body">
        <i class="fa fa-arrow-up"></i>
      </a>
    -->
  </body>
</html>