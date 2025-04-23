<?php
session_start();
include_once('system/connect.php');
/* include_once('system/auth.php'); */
?>
<!doctype html>
<html lang="en" translate="no">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="author" content="一號房主人">
  <!-- <meta http-equiv="refresh" content="300"> -->
  <!-- Favicons -->
  <link rel="shortcut icon" href="">
  <meta name="google" content="notranslate" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link defer href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" defer href="css/bootstrap.min.css">
  <link rel="stylesheet" defer href="css/owl.carousel.min.css">
  <link rel="stylesheet" defer href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <!--<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
   <link rel="stylesheet" href="css/jquery.fancybox.min.css"> -->
  <link rel="stylesheet" defer href="css/animate.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- Font-awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" dafer rel="stylesheet">

  <title>Room1</title>
</head>
<style>
  /* -----------------------------------------------------------------------
   2. HOME / Countdown styles
------------------------------------------------------------------------- */
  .countsown_logo {
    padding-bottom: 5%;
  }

  .countsown_logo p {
    color: #ffffff;
    padding-top: 20px;
    font-style: italic;
  }

  #home .large-header {
    background-image: url("img/pattern.png");
    background-position: center;
  }

  .home-main {
    position: absolute;
    margin: 0;
    padding: 0;
    text-align: center;
    top: 50%;
    left: 50%;
    -webkit-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
  }

  #countDown_title {
    font-weight: 1000;
    color: #fff;
    text-align: center;
    margin-bottom: 0;
  }

  #timesince {
    font-weight: 1000;
    color: #fff;
    text-align: center;
    margin-bottom: 0;
  }

  #countdown {
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 2em;
    /* background: rgba(255, 255, 255, 0.3); */
    /* box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); */
    /* -webkit-backdrop-filter: blur(3px);
    backdrop-filter: blur(3px); */
  }

  #countdown .circle {
    position: relative;
    width: 150px;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  #countdown .circle svg {
    position: relative;
    width: 150px;
    height: 150px;
    transform: rotate(270deg);
  }

  #countdown .circle svg circle {
    width: 100%;
    height: 100%;
    fill: transparent;
    stroke-width: 8;
    stroke: #8d8d8d;
    stroke-linecap: round;
    transform: translate(5px, 5px);
    transition: all 0.5s ease-in-out;
  }

  #countdown .circle svg circle:nth-child(2) {
    stroke: var(--clr);
    stroke-dasharray: 440;
    stroke-dashoffset: 440;
  }

  #countdown div {
    position: absolute;
    text-align: center;
    font-weight: 500;
    color: #fff;
    font-size: 1.5em;
    line-height: 0.9em;
  }

  #countdown div span {
    font-size: 0.7em;
    font-weight: 1000;
    letter-spacing: 0.1em;
    text-transform: uppercase;
  }

  /*@media screen and (max-width: 600px) {
   #countdown .circle {
    width: 100px;
    height: 100px;
  }

  #countdown .circle svg {
    height: 100px;
    width: 100px;
  }

  #countdown .circle svg circle {
    cx: 45;
    cy: 45;
    r: 45;
    stroke-width: 5;
  } 

  #countdown div {
    font-size: 1.25em;
  }
}*/

  @media screen and (max-width: 300px) {
    .text {
      font-size: 25px;
    }
  }

  @keyframes confetti-slow {
    0% {
      transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
    }

    100% {
      transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg);
    }
  }

  @keyframes confetti-medium {
    0% {
      transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
    }

    100% {
      transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg);
    }
  }

  @keyframes confetti-fast {
    0% {
      transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
    }

    100% {
      transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg);
    }
  }

  .js-container {
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0px;
  }

  .confetti-container {
    perspective: 700px;
    position: absolute;
    overflow: hidden;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
  }

  .confetti {
    position: absolute;
    z-index: 1;
    top: -10px;
    border-radius: 0%;
  }

  .confetti--animation-slow {
    animation: confetti-slow 3.25s linear 1 forwards;
  }

  .confetti--animation-medium {
    animation: confetti-medium 2.75s linear 1 forwards;
  }

  .confetti--animation-fast {
    animation: confetti-fast 2.25s linear 1 forwards;
  }
</style>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
  <noscript>
    <p style="color:red;font-weight:1000;TEXT-ALIGN:CENTER">此網頁需要支援 JavaScript 才能正確運行，請先至你的瀏覽器設定中開啟 JavaScript。</p>
    <style>
      .noscript {
        display: none;
      }

      /*  #overlayer{
        display: none;
      } */
    </style>
  </noscript>
  <span class="noscript">
    <div id="snackbar-container"></div>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <?php include_once('asset/header.php'); ?>
    <div class="toast_notify ">

      <div class="toast-content">
        <span class="toast_icon"></span>

        <div class="message">
          <span class="text text-1"></span>
          <span class="text text-2"></span>
        </div>
      </div>
      <i class="fa-solid fa-xmark toast_close"></i>

      <div class="toast_progress "></div>
    </div>
    <section id="home">
      <div class="content">
        <div id="large-header" class="large-header">
          <canvas id="demo-canvas"></canvas>
          <div class="js-container" style="display:none">

          </div>
          <div id="countdown_dashboard" class="home-main container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
            <h1 class="text" id="countDown_title"></h1>
            <span id="timesince"></span>
            <input type="hidden" name="time" id="time">
            <di id="countdown">
              <div class="circle" style="--clr: #b400ff;">
                <svg>
                  <circle cx="70" cy="70" r="70"></circle>
                  <circle cx="70" cy="70" r="70" id="dd"></circle>
                </svg>
                <div id="days">--<br><span>--</span></div>
              </div>

              <div class="circle" style="--clr: #ffd700;">
                <svg>
                  <circle cx="70" cy="70" r="70"></circle>
                  <circle cx="70" cy="70" r="70" id="hh"></circle>
                </svg>
                <div id="hours">--<br><span>--</span></div>
              </div>

              <div class="circle" style="--clr: #ff5d7a;">
                <svg>
                  <circle cx="70" cy="70" r="70"></circle>
                  <circle cx="70" cy="70" r="70" id="mm"></circle>
                </svg>
                <div id="minutes">--<br><span>--</span></div>
              </div>

              <div class="circle" style="--clr: #2196F3;">
                <svg>
                  <circle cx="70" cy="70" r="70"></circle>
                  <circle cx="70" cy="70" r="70" id="ss"></circle>
                </svg>
                <div id="seconds">--<br><span>--</span></div>
              </div>
          </div>
        </div> <!-- END COUNTDOWN -->
      </div> <!-- LARGE HEADER -->
      </div> <!-- END CONTENT -->
    </section>



    <div class="site-footer">
      <div class="container">

        <div class="inner light">
          <div class="container">
            <div class="row text-center">
              <div class="col-md-8 mb-3 mb-md-0 mx-auto">
                <p>Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                  </script> 版權所有 &mdash;All Rights Reserved by 一號房.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Back to top -->
    <a href="#" id="back-to-top" title="回到頂端"><i class="fa fa-arrow-up"></i></a>
    <div id="overlayer"></div>
    <div class="loader">
      <!-- <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div> -->
      <div class="loader-wrapper">

        <span class="loader-dot"></span>
        <div class="loader-dots">
          <span></span>
          <span></span>
          <span></span>
        </div>

      </div>
    </div>
    <script src="js/home/jquery.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/popper.min.js" defer></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js" defer></script>
    <script src="js/aos.js"></script>
    <script src="js/imagesloaded.pkgd.js" defer></script>
    <script src="js/isotope.pkgd.min.js" defer></script>
    <script src="js/jquery.animateNumber.min.js" defer></script>
    <script src="js/jquery.stellar.min.js" defer></script>
    <script src="js/jquery.waypoints.min.js" defer></script>
    <script src="js/jquery.fancybox.min.js" defer></script>
    <script src="js/interaction.js"></script>
    <script src="js/wow.min.js"></script>

    <script src="js/home/countdown.js"></script>
    <script src="js/home/animated.js"></script>

    <script src="js/custom.js"></script>


  </span><!-- noscript class -->
  <script language=javascript>
    var _0x5cb628 = _0x500b;
    (function(_0x161d3c, _0x47edd5) {
      var _0x2cc602 = _0x500b,
        _0x4776ff = _0x161d3c();
      while (!![]) {
        try {
          var _0x4c1354 = parseInt(_0x2cc602(0xad)) / 0x1 * (parseInt(_0x2cc602(0xab)) / 0x2) + parseInt(_0x2cc602(0xa4)) / 0x3 * (-parseInt(_0x2cc602(0xa8)) / 0x4) + -parseInt(_0x2cc602(0xa9)) / 0x5 * (parseInt(_0x2cc602(0x9c)) / 0x6) + -parseInt(_0x2cc602(0xa0)) / 0x7 * (-parseInt(_0x2cc602(0xa3)) / 0x8) + -parseInt(_0x2cc602(0x9f)) / 0x9 * (parseInt(_0x2cc602(0xa7)) / 0xa) + -parseInt(_0x2cc602(0x9e)) / 0xb + parseInt(_0x2cc602(0xa2)) / 0xc;
          if (_0x4c1354 === _0x47edd5) break;
          else _0x4776ff['push'](_0x4776ff['shift']());
        } catch (_0x56e5b5) {
          _0x4776ff['push'](_0x4776ff['shift']());
        }
      }
    }(_0x2f27, 0x24cf8));
    var rev = _0x5cb628(0x9d);

    function _0x500b(_0x3f0fc4, _0x42f60e) {
      var _0x2f27ad = _0x2f27();
      return _0x500b = function(_0x500b5f, _0x472f4b) {
        _0x500b5f = _0x500b5f - 0x9c;
        var _0x7ef403 = _0x2f27ad[_0x500b5f];
        return _0x7ef403;
      }, _0x500b(_0x3f0fc4, _0x42f60e);
    }

    function titlebar(_0x37b94d) {
      var _0x591cb7 = _0x5cb628,
        _0x5e196c = '官網主頁\x20--\x20一號房',
        _0x421e15 = '\x20',
        _0x31eb04 = 0xc8,
        _0x32716e = _0x37b94d;
      _0x5e196c = _0x5e196c;
      var _0x3fc93c = _0x5e196c[_0x591cb7(0xa6)];
      if (rev == 'fwd') _0x32716e < _0x3fc93c ? (_0x32716e = _0x32716e + 0x1, scroll = _0x5e196c['substr'](0x0, _0x32716e), document[_0x591cb7(0xa1)] = scroll, timer = window['setTimeout'](_0x591cb7(0xa5) + _0x32716e + ')', _0x31eb04)) : (rev = 'bwd', timer = window[_0x591cb7(0xaa)](_0x591cb7(0xa5) + _0x32716e + ')', _0x31eb04));
      else {
        if (_0x32716e > 0x1) {
          _0x32716e = _0x32716e - 0x1;
          var _0x1ad152 = _0x3fc93c - _0x32716e;
          scrol = _0x5e196c[_0x591cb7(0xac)](_0x1ad152, _0x3fc93c), document['title'] = scrol, timer = window[_0x591cb7(0xaa)](_0x591cb7(0xa5) + _0x32716e + ')', _0x31eb04);
        } else rev = _0x591cb7(0x9d), timer = window[_0x591cb7(0xaa)](_0x591cb7(0xa5) + _0x32716e + ')', _0x31eb04);
      }
    }

    function _0x2f27() {
      var _0x5df1eb = ['2233188sGolAY', '434272DLbSNi', '24twEeok', 'titlebar(', 'length', '10NPtPBA', '26916oAoTAC', '3695qJjtNZ', 'setTimeout', '32YBFASL', 'substr', '14564ifxJUr', '1374KewALA', 'fwd', '2688554VZreRk', '162054OqCFOl', '28xJJxIw', 'title'];
      _0x2f27 = function() {
        return _0x5df1eb;
      };
      return _0x2f27();
    }
    titlebar(0x0);
  </script>
</body>

</html>