<?php
session_start();
include_once('../system/connect.php');
include_once('../system/auth.php');
?>

<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" content="一號房主人">
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/icon.png">
    <meta name="google" content="notranslate" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Core css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="css/dashboard/dashboard.css" rel="stylesheet" />
    <title>Room1</title>
</head>

<body class="homepage_slider" data-spy="scroll" data-target=".navbar-fixed-top" style="    background-image: url(https://rm1web.tk/img/plane.JPG);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;" data-offset="100" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <noscript>
        <p style="color:red;font-weight:1000;TEXT-ALIGN:CENTER">此網頁需要支援 JavaScript 才能正確運行，請先至你的瀏覽器設定中開啟 JavaScript。</p>
        <style>
            .noscript {
                display: none;
            }
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

        <?php include_once('header.php'); ?>
        <div class="mt-6 timer text-center text-white">
            <div class="row">
                <span class="col-12 col-md-6">香港時間<i data-toggle="tooltip" title="香港時間" class="fa-solid fa-circle-question text-light"></i>：
                    <span id="MyClockDisplay_HK" class="clock text-center" style="font-family: Comic Sans MS;color: #17D4FE;font-size:x-large"></span>
                </span>

                <span class="col-12 col-md-6">美國時間<i data-toggle="tooltip" title="San Francisco和Los Angles時間" class="fa-solid fa-circle-question text-light"></i>：
                    <span id="MyClockDisplay_US" class="clock text-center" style="font-family: Comic Sans MS;color: #17D4FE;font-size:x-large"></span>
                </span>
            </div>
            <div class="row">
                <span class="col-12 col-md-6">美國時間<i data-toggle="tooltip" title="Jackson Hole和Yellowstone時間" class="fa-solid fa-circle-question text-light"></i>：
                    <span id="MyClockDisplay_US1" class="clock text-center" style="font-family: Comic Sans MS;color: #17D4FE;font-size:x-large"></span>
                </span>

                <span class="col-12 col-md-6">美國時間<i data-toggle="tooltip" title="波士頓時間" class="fa-solid fa-circle-question text-light"></i>：
                    <span id="MyClockDisplay_US2" class="clock text-center" style="font-family: Comic Sans MS;color: #17D4FE;font-size:x-large"></span>
                </span>
            </div>
        </div>
        <script>
            function addHours(date, hours) {
                date.setHours(date.getHours() - hours);
                return date;
            }
            /*setInterval(() => {
                const date = new Date();
                const usDate = addHours(date, 15);
                var dateStr_us =
                    ("00" + (usDate.getMonth() + 1)).slice(-2) + "/" +
                    ("00" + usDate.getDate()).slice(-2) + "/" +
                    usDate.getFullYear() + " " +
                    ("00" + usDate.getHours()).slice(-2) + ":" +
                    ("00" + usDate.getMinutes()).slice(-2) + ":" +
                    ("00" + usDate.getSeconds()).slice(-2);
                var dateStr_hk =
                    ("00" + (new Date().getMonth() + 1)).slice(-2) + "/" +
                    ("00" + new Date().getDate()).slice(-2) + "/" +
                    new Date().getFullYear() + " " +
                    ("00" + new Date().getHours()).slice(-2) + ":" +
                    ("00" + new Date().getMinutes()).slice(-2) + ":" +
                    ("00" + new Date().getSeconds()).slice(-2);
                document.getElementById("MyClockDisplay_US").textContent = dateStr_us;
                document.getElementById("MyClockDisplay_HK").textContent = dateStr_hk;
            }, 500); */
        </script>
        <script>
            function changeTimeZone(date, timeZone) {
                if (typeof date === 'string') {
                    return new Date(
                        new Date(date).toLocaleString('en-US', {
                            timeZone,
                        }),
                    );
                }
                return new Date(
                    date.toLocaleString('en-US', {
                        timeZone,
                    }),
                );
            }
            setInterval(() => {
                const hktime = changeTimeZone(new Date(), 'Asia/Hong_Kong');
                const time = changeTimeZone(new Date(), 'Asia/Hong_Kong');
                const time1 = changeTimeZone(new Date(), 'Asia/Hong_Kong');
                const usDate = changeTimeZone(new Date(), 'America/Los_Angeles');
                const usDate1 = addHours(time, 14);

                var dateStr_us =
                    ("00" + (usDate.getMonth() + 1)).slice(-2) + "/" +
                    ("00" + usDate.getDate()).slice(-2) + "/" +
                    usDate.getFullYear() + " " +
                    ("00" + usDate.getHours()).slice(-2) + ":" +
                    ("00" + usDate.getMinutes()).slice(-2) + ":" +
                    ("00" + usDate.getSeconds()).slice(-2);
                var dateStr_hk =
                    ("00" + (hktime.getMonth() + 1)).slice(-2) + "/" +
                    ("00" + hktime.getDate()).slice(-2) + "/" +
                    hktime.getFullYear() + " " +
                    ("00" + hktime.getHours()).slice(-2) + ":" +
                    ("00" + hktime.getMinutes()).slice(-2) + ":" +
                    ("00" + hktime.getSeconds()).slice(-2);
                var dateStr_us1 =
                    ("00" + (usDate1.getMonth() + 1)).slice(-2) + "/" +
                    ("00" + usDate1.getDate()).slice(-2) + "/" +
                    usDate1.getFullYear() + " " +
                    ("00" + usDate1.getHours()).slice(-2) + ":" +
                    ("00" + usDate1.getMinutes()).slice(-2) + ":" +
                    ("00" + usDate1.getSeconds()).slice(-2);
                const usDate2 = addHours(time1, 12);
                var dateStr_us2 =
                    ("00" + (usDate2.getMonth() + 1)).slice(-2) + "/" +
                    ("00" + usDate2.getDate()).slice(-2) + "/" +
                    usDate2.getFullYear() + " " +
                    ("00" + usDate2.getHours()).slice(-2) + ":" +
                    ("00" + usDate2.getMinutes()).slice(-2) + ":" +
                    ("00" + usDate2.getSeconds()).slice(-2);
                document.getElementById("MyClockDisplay_US").textContent = dateStr_us;
                document.getElementById("MyClockDisplay_HK").textContent = dateStr_hk;
                document.getElementById("MyClockDisplay_US1").textContent = dateStr_us1;
                document.getElementById("MyClockDisplay_US2").textContent = dateStr_us2;
            }, 500);
        </script>
        <div id="openviewWeather" style="pointer-events:none">

            <a class="weatherwidget-io mt-2" href="https://forecast7.com/zh-tw/42d36n71d06/boston/" data-label_1="Boston" data-label_2="Weather" data-font="Arial Black" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)">
            </a>
            <a class="weatherwidget-io mt-2" href="https://forecast7.com/zh-tw/37d77n122d42/san-francisco/" data-label_1="San-Francisco" data-label_2="Weather" data-font="Arial Black" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)">
            </a>
            <a class="weatherwidget-io mt-2" href="https://forecast7.com/zh-tw/43d48n110d76/jackson/" data-label_1="Jackson Hole" data-label_2="Weather" data-font="Arial Black" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)">
            </a>
            <a class="weatherwidget-io mt-2" href="https://forecast7.com/zh-tw/44d43n110d59/yellowstone-national-park/" data-label_1="Yellowstone" data-label_2="Weather" data-font="Arial Black" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)">
            </a>
            <a class="weatherwidget-io mt-2" href="https://forecast7.com/zh-tw/34d05n118d24/los-angeles/" data-label_1="Los-Angeles" data-label_2="Weather" data-font="Arial Black" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)">
            </a>

        </div>
        <script>
            ! function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://weatherwidget.io/js/widget.min.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'weatherwidget-io-js');
        </script>


        <!-- <div class="weatherWidget" ></div>
        <script>
            window.weatherWidgetConfig = window.weatherWidgetConfig || [];
            window.weatherWidgetConfig.push({
                selector: ".weatherWidget",
                apiKey: "JAFY4BB4XZ28M77GV8NSQ82U5", //Sign up for your personal key
                location: "London, UK", //Enter an address
                unitGroup: "metric", //"us" or "metric"
                forecastDays: 5, //how many days forecast to show
                title: "London,UK", //optional title to show in the 
                showTitle: true,
                showConditions: true
            });

            (function() {
                var d = document,
                    s = d.createElement('script');
                s.src = 'https://www.visualcrossing.com/widgets/forecast-simple/weather-forecast-widget-simple.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script> -->
        <?php include_once('footer.php') ?>

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
                    _0x5e196c = '旅行出行天氣\x20--\x20一號房',
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
        <!-- tooltips -->
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.1/tooltip.min.js"></script>
    </span>
</body>

</html>