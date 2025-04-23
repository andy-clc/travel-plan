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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="../css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="../css/dashboard/dashboard.css" rel="stylesheet" />
    <title>Room1</title>
</head>
<style>
    /* =================================== */
    /*  Helpers Classes
/* =================================== */
    /* Border Radius */
    .rounded-top-0 {
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .rounded-bottom-0 {
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }

    .rounded-left-0 {
        border-top-left-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
    }

    .rounded-right-0 {
        border-top-right-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }

    /* Text Size */
    .text-0 {
        font-size: 11px !important;
        font-size: 0.6875rem !important;
    }

    .text-1 {
        font-size: 12px !important;
        font-size: 0.75rem !important;
    }

    .text-2 {
        font-size: 14px !important;
        font-size: 0.875rem !important;
    }

    .text-3 {
        font-size: 16px !important;
        font-size: 1rem !important;
    }

    .text-4 {
        font-size: 18px !important;
        font-size: 1.125rem !important;
    }

    .text-5 {
        font-size: 21px !important;
        font-size: 1.3125rem !important;
    }

    .text-6 {
        font-size: 24px !important;
        font-size: 1.50rem !important;
    }

    .text-7 {
        font-size: 28px !important;
        font-size: 1.75rem !important;
    }

    .text-8 {
        font-size: 32px !important;
        font-size: 2rem !important;
    }

    .text-9 {
        font-size: 36px !important;
        font-size: 2.25rem !important;
    }

    .text-10 {
        font-size: 40px !important;
        font-size: 2.50rem !important;
    }

    .text-11 {
        font-size: 44px !important;
        font-size: 2.75rem !important;
    }

    .text-12 {
        font-size: 48px !important;
        font-size: 3rem !important;
    }

    .text-13 {
        font-size: 52px !important;
        font-size: 3.25rem !important;
    }

    .text-14 {
        font-size: 56px !important;
        font-size: 3.50rem !important;
    }

    .text-15 {
        font-size: 60px !important;
        font-size: 3.75rem !important;
    }

    .text-16 {
        font-size: 64px !important;
        font-size: 4rem !important;
    }

    .text-17 {
        font-size: 72px !important;
        font-size: 4.5rem !important;
    }

    .text-18 {
        font-size: 80px !important;
        font-size: 5rem !important;
    }

    .text-19 {
        font-size: 84px !important;
        font-size: 5.25rem !important;
    }

    .text-20 {
        font-size: 92px !important;
        font-size: 5.75rem !important;
    }

    /* Line height */
    .line-height-07 {
        line-height: 0.7 !important;
    }

    .line-height-1 {
        line-height: 1 !important;
    }

    .line-height-2 {
        line-height: 1.2 !important;
    }

    .line-height-3 {
        line-height: 1.4 !important;
    }

    .line-height-4 {
        line-height: 1.6 !important;
    }

    .line-height-5 {
        line-height: 1.8 !important;
    }

    /* Font Weight */
    .font-weight-100 {
        font-weight: 100 !important;
    }

    .font-weight-200 {
        font-weight: 200 !important;
    }

    .font-weight-300 {
        font-weight: 300 !important;
    }

    .font-weight-400 {
        font-weight: 400 !important;
    }

    .font-weight-500 {
        font-weight: 500 !important;
    }

    .font-weight-600 {
        font-weight: 600 !important;
    }

    .font-weight-700 {
        font-weight: 700 !important;
    }

    .font-weight-800 {
        font-weight: 800 !important;
    }

    .font-weight-900 {
        font-weight: 900 !important;
    }

    /* Opacity */
    .opacity-0 {
        opacity: 0;
    }

    .opacity-1 {
        opacity: 0.1;
    }

    .opacity-2 {
        opacity: 0.2;
    }

    .opacity-3 {
        opacity: 0.3;
    }

    .opacity-4 {
        opacity: 0.4;
    }

    .opacity-5 {
        opacity: 0.5;
    }

    .opacity-6 {
        opacity: 0.6;
    }

    .opacity-7 {
        opacity: 0.7;
    }

    .opacity-8 {
        opacity: 0.8;
    }

    .opacity-9 {
        opacity: 0.9;
    }

    .opacity-10 {
        opacity: 1;
    }

    /* Background light */
    .bg-light-1 {
        background-color: #e9ecef !important;
    }

    .bg-light-2 {
        background-color: #dee2e6 !important;
    }

    .bg-light-3 {
        background-color: #ced4da !important;
    }

    .bg-light-4 {
        background-color: #adb5bd !important;
    }

    @media print {

        .table td,
        .table th {
            background-color: transparent !important;
        }

        .table td.bg-light,
        .table th.bg-light {
            background-color: #FFF !important;
        }

        .table td.bg-light-1,
        .table th.bg-light-1 {
            background-color: #f9f9fb !important;
        }

        .table td.bg-light-2,
        .table th.bg-light-2 {
            background-color: #f8f8fa !important;
        }

        .table td.bg-light-3,
        .table th.bg-light-3 {
            background-color: #f5f5f5 !important;
        }

        .table td.bg-light-4,
        .table th.bg-light-4 {
            background-color: #eff0f2 !important;
        }

        .table td.bg-light-5,
        .table th.bg-light-5 {
            background-color: #ececec !important;
        }
    }

    /* =================================== */
    /*  Layouts
/* =================================== */
    .itinerary-container {
        margin: 15px auto;
        padding: 70px;
        max-width: 850px;
        background-color: #fff;
        border: 1px solid #ccc;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        -o-border-radius: 6px;
        border-radius: 6px;
        font-size: .7em;
    }

    @media (max-width: 767px) {
        .itinerary-container {
            padding: 35px 20px 70px 20px;
            margin-top: 0px;
            border: none;
            border-radius: 0px;
        }
    }

    /* =================================== */
    /*  Extras
/* =================================== */
    .bg-primary,
    .badge-primary {
        background-color: #0071cc !important;
    }

    .bg-secondary {
        background-color: #0c2f55 !important;
    }

    .text-secondary {
        color: #0c2f55 !important;
    }

    .text-primary {
        color: #0071cc !important;
    }

    .btn-link {
        color: #0071cc;
    }

    .btn-link:hover {
        color: #0e7fd9 !important;
    }

    .border-primary {
        border-color: #0071cc !important;
    }

    .border-secondary {
        border-color: #0c2f55 !important;
    }

    .btn-primary {
        background-color: #0071cc;
        border-color: #0071cc;
    }

    .btn-primary:hover {
        background-color: #0e7fd9;
        border-color: #0e7fd9;
    }

    .btn-secondary {
        background-color: #0c2f55;
        border-color: #0c2f55;
    }

    .btn-outline-primary {
        color: #0071cc;
        border-color: #0071cc;
    }

    .btn-outline-primary:hover {
        background-color: #0071cc;
        border-color: #0071cc;
        color: #fff;
    }

    .btn-outline-secondary {
        color: #0c2f55;
        border-color: #0c2f55;
    }

    .btn-outline-secondary:hover {
        background-color: #0c2f55;
        border-color: #0c2f55;
        color: #fff;
    }

    .progress-bar,
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #0071cc;
    }

    .page-item.active .page-link,
    .custom-radio .custom-control-input:checked~.custom-control-label:before,
    .custom-control-input:checked~.custom-control-label::before,
    .custom-checkbox .custom-control-input:checked~.custom-control-label:before,
    .custom-control-input:checked~.custom-control-label:before {
        background-color: #0071cc;
        border-color: #0071cc;
    }

    .list-group-item.active {
        background-color: #0071cc;
        border-color: #0071cc;
    }

    .page-link {
        color: #0071cc;
    }

    .page-link:hover {
        color: #0e7fd9;
    }

    /* Pagination */
    .page-link {
        border-color: #f4f4f4;
        border-radius: 0.25rem;
        margin: 0 0.3rem;
    }

    .page-item.disabled .page-link {
        border-color: #f4f4f4;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        background-image: linear-gradient(90deg, transparent, rgb(0 0 0), transparent);
    }

    .testimonial--wrap {
        padding: 0;
        background: transparent;
        border-radius: 7px;
        -webkit-box-shadow: 0 15px 30px 0 rgb(0 0 0 / 5%);
        box-shadow: 0 15px 30px 0 rgb(0 0 0 / 5%);
    }

    img.flight_logo {
        height: 2.825rem;
    }
</style>

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

        <div class="mt-7">
            <div id="accordion" class="panel-group wow fadeIn" data-wow-delay="0.6s">
                <div id="video_container" style="font-size:24px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title" style="font-size:24px">
                                <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse2345" aria-expanded="false" class="collapsed">機票記錄</a>

                            </h4>
                        </div>
                        <div id="collapse2345" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <div class="testimonial--wrap">

                                    <div class="owl-single owl-carousel">
                                        <div class="testimonial-item">
                                            <!-- Container -->
                                            <div class="text-dark container-fluid itinerary-container bg-gradient-faded-light">
                                                <!-- Header -->
                                                <header>
                                                    <div class="row align-items-baseline">
                                                        <div class="col text-center text-sm-left mb-3 mb-sm-0"> <img class="flight_logo" src="https://www.cathaypacific.com/content/dam/content-fragment/zh_hk/config/logo.originalimage.svg" title="logo" alt="logo" /> </div>
                                                        <div class="col text-center text-sm-right">
                                                            <h4 class="text-7 mb-0">國泰航空訂票記錄</h4>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                </header>
                                                <!-- Header End -->

                                                <!-- Main Content -->
                                                <main>
                                                    <div class="row">
                                                        <div class="col"> <strong class="font-weight-600">Ticket Number機票編號</strong>
                                                            <p>160 2384216402 <br>
                                                                160 2384216403 <br>160 2384216404</p>
                                                            <strong class="font-weight-600">Booking Reference預訂參考編號</strong>
                                                            <p>52ODFK</p>
                                                        </div>
                                                        <div class="col"> <strong class="font-weight-600">Office:</strong>
                                                            <address>
                                                                Cathay Pacific Airways LTD<br>
                                                                Internet Booking<br>
                                                                Hong Kong
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center trip-title">
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Hong Kong (HKG)</h5>
                                                                </div>
                                                                <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">San Francisco (SFO)</h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">10 May 23, Wed</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">CX870</span> <span class="text-muted d-block">Flight航班編號</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">13:55 (HK)</span> <span class="text-muted d-block">Departure起飛</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">12h 30m</span> <span class="text-muted d-block">Duration飛行</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">11:25 (US)</span> <span class="text-muted d-block">Arrival到達</span> </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col"><strong class="font-weight-600">Class艙等</strong>
                                                                    <p>Economy</p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Fare Basis票價基礎</strong>
                                                                    <p>SR21WUAR</p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Status狀態</strong>
                                                                    <p><span class="badge badge-success py-1 px-2 font-weight-normal">Confirmed <i class="fas fa-check-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-1">
                                                            <div class="row">
                                                                <div class="col"> <strong class="font-weight-600">Airport Info機場信息</strong>
                                                                    <p class="mb-0">Hong Kong Intl,<br>
                                                                        Terminal 1 </p>
                                                                    <div class="d-flex align-items-center m-0">
                                                                        <hr class="flex-grow-1 my-2">
                                                                        <span class="mx-2">to</span>
                                                                        <hr class="flex-grow-1 my-2">
                                                                    </div>
                                                                    <p class="mb-sm-0">San Francisco Intl,<br>
                                                                        Terminal 1</p>
                                                                </div>
                                                                <div class="col"> <strong class="font-weight-600">Flight Info航班信息</strong><br>
                                                                    <p>Airbus A350-900</p>
                                                                    <strong class="font-weight-600">Seat:</strong><br>
                                                                    <p>45A,45B,45C</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-4">
                                                        <div class="card-header">
                                                            <div class="row align-items-center trip-title">
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Los Angles (LAX)</h5>
                                                                </div>
                                                                <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Hong Kong (HKG)</h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">25 May 23, Thurs</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">CX881</span> <span class="text-muted d-block">Flight航班編號</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">00:30 (US)</span> <span class="text-muted d-block">Departure起飛</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">15h 15m</span> <span class="text-muted d-block">Duration飛行</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">06:45 (HK)</span> <span class="text-muted d-block">Arrival到達</span> </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col"><strong class="font-weight-600">Class艙等</strong>
                                                                    <p>Economy</p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Fare Basis票價基礎</strong>
                                                                    <p>VR21WUAR</p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Status狀態</strong>
                                                                    <p><span class="badge badge-success py-1 px-2 font-weight-normal">Confirmed <i class="fas fa-check-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-1">
                                                            <div class="row">
                                                                <div class="col"> <strong class="font-weight-600">Airport Info機場信息</strong>
                                                                    <p class="mb-0">Los Angles Intl, <br>Terminl B</p>
                                                                    <div class="d-flex align-items-center m-0">
                                                                        <hr class="flex-grow-1 my-2">
                                                                        <span class="mx-2">to</span>
                                                                        <hr class="flex-grow-1 my-2">
                                                                    </div>
                                                                    <p class="mb-0">Hong Kong Intl,<br>
                                                                        Terminal 1 </p>
                                                                </div>
                                                                <div class="col"> <strong class="font-weight-600">Flight Info航班信息</strong><br>
                                                                    <p>Boeing 777-300ER</p>
                                                                    <strong class="font-weight-600">Seat:</strong><br>
                                                                    <p>45H,45J,45K</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </main>
                                                <!-- Main Content End -->

                                            </div>
                                            <!-- Container End -->
                                        </div>
                                        <div class="testimonial-item">
                                            <!-- Container -->
                                            <div class="text-dark container-fluid itinerary-container bg-gradient-faded-light">
                                                <!-- Header -->
                                                <header>
                                                    <div class="row align-items-baseline">
                                                        <div class="col text-center text-sm-left mb-3 mb-sm-0"> <img class="flight_logo" src="https://content.delta.com/content/www/apac/en.damAssetRender.20211110T1419424440500.html/content/dam/delta_homepage_redesign/Logo/Delta-Logo.svg" title="logo" alt="logo" /> </div>
                                                        <div class="col text-center text-sm-right">
                                                            <h4 class="text-7 mb-0">達美航空訂票記錄</h4>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                </header>
                                                <!-- Header End -->

                                                <!-- Main Content -->
                                                <main>
                                                    <div class="row">
                                                        <div class="col"> <strong class="font-weight-600">Ticket Number機票編號</strong>
                                                            <p>0062362159891 <br>0062362159893 <br>0062362159892</p>
                                                            <strong class="font-weight-600">Confirmation確認編號</strong>
                                                            <p>HUAHFL</p>
                                                        </div>
                                                        <div class="col"> <strong class="font-weight-600">普通托運行李費用</strong>
                                                            <address>
                                                                $30 USD/第一件23公斤以下托運行李/單程<br><a href="https://www.delta.com/us/en/baggage/overview" target="_blank">前往Delta官網</a>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row align-items-center trip-title">
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">San Francisco (SFO)</h5>
                                                                </div>
                                                                <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Salt Lake City (SLC)</h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">14 May 23, Sun</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">DL 2356</span> <span class="text-muted d-block">Flight航班編號</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">06:05 (US)</span> <span class="text-muted d-block">Departure起飛</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">1h 50m</span> <span class="text-muted d-block">Duration飛行</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">08:55 (US)</span> <span class="text-muted d-block">Arrival到達</span> </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col"><strong class="font-weight-600">Class艙等</strong>
                                                                    <p>MAIN CABIN (L) </p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Status狀態</strong>
                                                                    <p><span class="badge badge-success py-1 px-2 font-weight-normal">Confirmed <i class="fas fa-check-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-1">
                                                            <div class="row">
                                                                <div class="col"> <strong class="font-weight-600">Airport Info機場信息</strong>
                                                                    <p class="mb-0">San Francisco Intl,<br>
                                                                        Terminal 2 </p>
                                                                    <div class="d-flex align-items-center m-0">
                                                                        <hr class="flex-grow-1 my-2">
                                                                        <span class="mx-2">to</span>
                                                                        <hr class="flex-grow-1 my-2">
                                                                    </div>
                                                                    <p class="mb-sm-0">Salt Lake City,<br>
                                                                        Terminal 2</p>
                                                                </div>
                                                                <div class="col"> <strong class="font-weight-600">Flight Info航班信息</strong><br>
                                                                    <p>Airbus A220-300</p>
                                                                    <strong class="font-weight-600">Seat:</strong><br>
                                                                    <p>21C,21D,21E</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-4">
                                                        <div class="card-header">
                                                            <div class="row align-items-center trip-title">
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Salt Lake City (SLC)</h5>
                                                                </div>
                                                                <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Jackson Hole (JAC) </h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">14 May 23, Sun</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">DL 2278</span> <span class="text-muted d-block">Flight航班編號</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">11:20 (US)</span> <span class="text-muted d-block">Departure起飛</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">1h 2m</span> <span class="text-muted d-block">Duration飛行</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">12:22 (US)</span> <span class="text-muted d-block">Arrival到達</span> </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col"><strong class="font-weight-600">Class艙等</strong>
                                                                    <p>MAIN CABIN (L) </p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Status狀態</strong>
                                                                    <p><span class="badge badge-success py-1 px-2 font-weight-normal">Confirmed <i class="fas fa-check-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-1">
                                                            <div class="row">
                                                                <div class="col"> <strong class="font-weight-600">Airport Info機場信息</strong>
                                                                    <p class="mb-0">Salt Lake City,<br>Terminal 2</p>
                                                                    <div class="d-flex align-items-center m-0">
                                                                        <hr class="flex-grow-1 my-2">
                                                                        <span class="mx-2">to</span>
                                                                        <hr class="flex-grow-1 my-2">
                                                                    </div>
                                                                    <p class="mb-0">Jackson Hole Airport</p>
                                                                </div>
                                                                <div class="col"> <strong class="font-weight-600">Flight Info航班信息</strong><br>
                                                                    <p>Airbus A319</p>
                                                                    <strong class="font-weight-600">Seat:</strong><br>
                                                                    <p>22A,22B,22C</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-4">
                                                        <div class="card-header">
                                                            <div class="row align-items-center trip-title">
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Jackson Hole (JAC) </h5>
                                                                </div>
                                                                <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Salt Lake City (SLC)</h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">19 May 23, Fri</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">DL 2837</span> <span class="text-muted d-block">Flight航班編號</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">18:10 (US)</span> <span class="text-muted d-block">Departure起飛</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">1h 2m</span> <span class="text-muted d-block">Duration飛行</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">19:12 (US)</span> <span class="text-muted d-block">Arrival到達</span> </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col"><strong class="font-weight-600">Class艙等</strong>
                                                                    <p>MAIN CABIN (V) </p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Status狀態</strong>
                                                                    <p><span class="badge badge-success py-1 px-2 font-weight-normal">Confirmed <i class="fas fa-check-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-1">
                                                            <div class="row">
                                                                <div class="col"> <strong class="font-weight-600">Airport Info機場信息</strong>
                                                                    <p class="mb-0">Jackson Hole Airport</p>
                                                                    <div class="d-flex align-items-center m-0">
                                                                        <hr class="flex-grow-1 my-2">
                                                                        <span class="mx-2">to</span>
                                                                        <hr class="flex-grow-1 my-2">
                                                                    </div>
                                                                    <p class="mb-0">Salt Lake City,<br>Terminal 2</p>
                                                                </div>
                                                                <div class="col"> <strong class="font-weight-600">Flight Info航班信息</strong><br>
                                                                    <p>Airbus A319</p>
                                                                    <strong class="font-weight-600">Seat:</strong><br>
                                                                    <p>22A,22B,22C</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-4">
                                                        <div class="card-header">
                                                            <div class="row align-items-center trip-title">
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Salt Lake City (SLC) </h5>
                                                                </div>
                                                                <div class="col-2 col-md-auto text-8 text-black-50 text-center trip-arrow">➝</div>
                                                                <div class="col-5 col-md-auto text-center text-md-left">
                                                                    <h5 class="m-0">Los Angles (LAX)</h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto text-3 text-dark text-center mt-2 mt-md-0 ml-md-auto">19 May 23, Fri</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">DL 2167</span> <span class="text-muted d-block">Flight航班編號</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">21:15 (US)</span> <span class="text-muted d-block">Departure起飛</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">2h 2m</span> <span class="text-muted d-block">Duration飛行</span> </div>
                                                                <div class="col text-center time-info mt-3 mt-sm-0"> <span class="text-5 font-weight-500 text-dark">22:17 (US)</span> <span class="text-muted d-block">Arrival到達</span> </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col"><strong class="font-weight-600">Class艙等</strong>
                                                                    <p>MAIN CABIN (V) </p>
                                                                </div>
                                                                <div class="col"><strong class="font-weight-600">Status狀態</strong>
                                                                    <p><span class="badge badge-success py-1 px-2 font-weight-normal">Confirmed <i class="fas fa-check-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-1">
                                                            <div class="row">
                                                                <div class="col"> <strong class="font-weight-600">Airport Info機場信息</strong>
                                                                    <p class="mb-0">Salt Lake City,<br>Terminal 2</p>
                                                                    <div class="d-flex align-items-center m-0">
                                                                        <hr class="flex-grow-1 my-2">
                                                                        <span class="mx-2">to</span>
                                                                        <hr class="flex-grow-1 my-2">
                                                                    </div>
                                                                    <p class="mb-0">Los Angeles Intl<br>Terminal 3</p>
                                                                </div>
                                                                <div class="col"> <strong class="font-weight-600">Flight Info航班信息</strong><br>
                                                                    <p>Airbus A321</p>
                                                                    <strong class="font-weight-600">Seat:</strong><br>
                                                                    <p>22A,22B,22C</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </main>
                                                <!-- Main Content End -->
                                            </div>
                                            <!-- Container End -->
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- accordion -->
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
                    _0x5e196c = '旅行資訊\x20--\x20一號房',
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.1/tooltip.min.js"></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </span>
</body>

</html>