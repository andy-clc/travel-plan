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
    <meta name="keywords" content="" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Core css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css"defer>
    <link rel="stylesheet" href="../css/owl.theme.default.min.css"defer>
    <link rel="stylesheet" href="../fonts/icomoon/style.css"defer>
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css"defer>
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css"defer>
    <link rel="stylesheet" href="../css/animate.css"defer>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Font-awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="../css/dashboard/material-dashboard.css" rel="stylesheet" defer/>
    <link id="pagestyle" href="../css/dashboard/dashboard.css" rel="stylesheet"defer />
    <title>Room1</title>
    <script src="../system/ckeditor/ckeditor.js" defer></script>
</head>
<style>
    .panel-title a {
        padding: 10px 30px;
        font-size: 18px;
        color: white;
        text-shadow: 0 0.5px black;
    }

    body:before {
        content: '';
        background-image: url(https://rm1web.tk/img/plane2.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: fixed;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        opacity: 0.2;
        z-index: -1;
    }

    /* DropDown List */
    .select-dropdown {
        position: relative;
        display: inline-block;
        max-width: 100%;
        padding-bottom: 20px;
    }

    .select-dropdown__button {
        padding: 0.5em;
        background-color: #fff;
        color: #616161;
        border: 1px solid hsl(204, 86%, 53%);
        border-radius: 4px;
        cursor: pointer;
        width: 210px;
        text-align: left;
        /* margin-block: 5px; */
    }

    .select-dropdown__button::focus {
        outline: none;
    }

    .select-dropdown__button i {
        position: absolute;
        right: 10px;
        transform: translate(-60%, 10%);
    }

    .select-dropdown__list {
        position: absolute;
        display: block;
        left: 0;
        right: 0;
        max-height: 300px;
        overflow: auto;
        margin: 0;
        padding: 0;
        list-style-type: none;
        opacity: 0;
        pointer-events: none;
        transform-origin: top left;
        transform: scale(1, 0);
        transition: all ease-in-out 0.3s;
        z-index: 2;
    }

    .select-dropdown__list.active {
        opacity: 1;
        pointer-events: auto;
        transform: scale(1, 1);
    }

    .select-dropdown__list-item {
        display: block;
        list-style-type: none;
        padding: 10px 15px;
        background: hsl(204deg 86% 53% / 81%);
        border-top: 1px solid #e6e6e6;
        font-size: 14px;
        line-height: 1.4;
        cursor: pointer;
        color: var(--bs-gray-300);
        transition: all ease-in-out 0.3s;
    }

    input#flight_date,
    input#edit_flight_date,
    input#edit_search_time,
    input#search_time {
        padding: 0.5em;
        border: 1px solid hsl(204, 86%, 53%);
        border-radius: 4px;
        width: 150px;
        margin-block: 5px;
    }

    .js-tilt-glare {
        border-radius: 5px;
    }

    /* flight css */
    h1.city-abbr {
        color: tomato;
    }

    .panel-group .panel-heading+.panel-collapse .panel-body {
        border-top: none;
        margin-inline: 5px;
    }

    .custom-btn {
        width: 130px;
        color: #fff;
        border-radius: 5px;
        padding: 10px;
        font-family: 'Lato', sans-serif;
        font-weight: 1000;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
        font-size: 16px;
    }

    /* 11 */
    .btn-11 {
        border: none;
        background: rgb(251, 33, 117);
        background: linear-gradient(0deg, rgb(255 170 85) 0%, rgb(255 170 85 / 14%) 100%);
        color: #fff;
        overflow: hidden;
        /* font-size: 24px; */
    }

    h1 {
        font-size: inherit;
    }

    .btn-11:hover {
        text-decoration: none;
        color: #fff;
    }

    .btn-11:before {
        position: absolute;
        content: '';
        display: inline-block;
        top: -180px;
        left: 0;
        width: 30px;
        height: 100%;
        background-color: #fff;
        animation: shiny-btn1 3s ease-in-out infinite;
    }

    .btn-11:hover {
        opacity: .7;
    }

    .btn-11:active {
        box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .3),
            -4px -4px 6px 0 rgba(116, 125, 136, .2),
            inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
            inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
    }


    @keyframes shiny-btn1 {
        0% {
            -webkit-transform: scale(0) rotate(45deg);
            opacity: 0;
        }

        80% {
            -webkit-transform: scale(0) rotate(45deg);
            opacity: 0.5;
        }

        81% {
            -webkit-transform: scale(4) rotate(45deg);
            opacity: 1;
        }

        100% {
            -webkit-transform: scale(50) rotate(45deg);
            opacity: 0;
        }
    }

    .g3 {
        text-decoration: underline 3px RoyalBlue;
        text-underline-offset: 12px;
        animation: g3 linear 3000ms infinite;
    }

    .g3:nth-of-type(1) {
        animation-delay: 0ms
    }

    .g3:nth-of-type(2) {
        animation-delay: 100ms
    }

    .g3:nth-of-type(3) {
        animation-delay: 200ms
    }

    .g3:nth-of-type(4) {
        animation-delay: 300ms
    }

    .g3:nth-of-type(5) {
        animation-delay: 400ms
    }

    .g3:nth-of-type(6) {
        animation-delay: 500ms
    }

    .g3:nth-of-type(7) {
        animation-delay: 600ms
    }

    .g3:nth-of-type(8) {
        animation-delay: 700ms
    }

    .g3:nth-of-type(9) {
        animation-delay: 800ms
    }

    .g3:nth-of-type(10) {
        animation-delay: 900ms
    }

    @keyframes g3 {
        0% {
            text-decoration-style: wavy;
            text-underline-offset: 8px;
            text-decoration-color: PowderBlue
        }

        5% {
            text-decoration-style: wavy;
            text-underline-offset: 0px;
            text-decoration-color: RoyalBlue
        }

        25% {
            text-decoration-style: solid;
            text-underline-offset: 12px
        }

        37.5% {
            text-decoration-color: PowderBlue
        }

        45% {
            text-decoration-color: RoyalBlue
        }

        87.5% {
            text-decoration-color: RoyalBlue
        }

        98% {
            text-decoration-color: PowderBlue
        }
    }

    .panel-group .panel-heading+.panel-collapse .panel-body {
        border-top: none;
        margin-inline: 5px;
        background: linear-gradient(45deg, black, transparent);
        padding: 5px;
    }

    hr {
        background-image: linear-gradient(45deg, white, orange);
        height: 5px;
        border-radius: 2px;
    }

    .title {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .title h4 {
        color: var(--light);
    }

    @media (max-width: 401px) {
        .title {
            display: block;
        }
    }
</style>

<body class="homepage_slider" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100" oncontextmenu="return true" onselectstart="return true" ondragstart="return true">
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
        <div class="mt-6 text-center text-white ">
            <div class="m-bottom-30">
                <div class="title text-white">
                    <h4>旅行額外資料</h4>
                    <a target="_blank" id="addrecord_btn" class="btn btn-outline-success m-1">添加資料<div class="dot"></div></a>
                    <a target="_blank" id="viewhiderecord_btn" class="btn btn-outline-light m-1">查看隱藏數據<div class="dot"></div></a>
                </div>

                <div class="divider-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>

            </div>
        </div>

        <div id="result" style="margin:5px"></div>

        <div class="modal modal-fullscreen-xl fade" id="viewhideModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">查看隱藏數據</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="hidden_data_container" style="text-align:center">

                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-info" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal modal-fullscreen-xl fade" id="add" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">添加資料</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <form id="record" action="" method="post">
                            <input type="hidden" name="id" id="record_id" disabled>
                            <input type="hidden" name="form_type" id="form_type" disabled>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline is-filled">
                                            <label for="add_title" class=" form-label">資料標題</label>
                                            <input type="text" class="form-control" id="add_title" name="add_title" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-dropdown">
                                        <button type="button" role="button" id="add_about_date" data-value="" class="select-dropdown__button">
                                            <span>資料是關於哪一個時間?</span> <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                        <ul class="select-dropdown__list">
                                            <li data-value="1" class="select-dropdown__list-item">出發前(9/5或之前)</li>
                                            <li data-value="2" class="select-dropdown__list-item">SFO(10/5-14/5)</li>
                                            <li data-value="3" class="select-dropdown__list-item">JAC(14/5 & 17/5-19/5)</li>
                                            <li data-value="4" class="select-dropdown__list-item">YWS(15/5-17/5)</li>
                                            <li data-value="5" class="select-dropdown__list-item">LAX(19/5-21/5)</li>
                                            <li data-value="6" class="select-dropdown__list-item">LAX(22/5-24/5)</li>
                                        </ul>
                                    </div>
                                    <script>
                                        $('#add_about_date').on('click', function() {
                                            $('.select-dropdown__list:not(".dropdown_list_1")').toggleClass('active');
                                        });
                                        $('.select-dropdown__list-item:not(".dropdown_list_1")').on('click', function() {
                                            var itemValue = $(this).data('value');
                                            $('#add_about_date span').text($(this).text()).parent().attr('data-value', itemValue);
                                            $('.select-dropdown__list:not(".dropdown_list_1")').toggleClass('active');
                                        });
                                    </script>
                                </div>
                                <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short required></textarea>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer text-center">
                        <button type="submit" id="modal_submit" class="btn btn-success">添加</button>
                        <!-- <button type="button" id="modal_submit" class="btn btn-danger">隱藏</button> -->
                        <button type="button" class="btn btn-info" data-dismiss="modal">關閉</button>

                    </div>
                </div>
            </div>
        </div>
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
                    _0x5e196c = '旅行額外資料\x20--\x20一號房',
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
        <script src="../system/ckeditor/form.js" defer></script>
        <!--  <script src="../js/dashboard/chartjs.min.js"></script> -->
        <script src="../js/trip/main.js" defer></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script>

        </script>
    </span>
</body>

</html>