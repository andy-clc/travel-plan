<?php
session_start();
include_once('../system/connect.php');
date_default_timezone_set('Asia/Hong_Kong');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" content="一號房主人">
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/icon.png">
    <meta name="google" content="notranslate" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- <meta http-equiv="refresh" content="360" /> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Core css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Font-awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/dashboard/datatables-1.10.25.min.css" />
    <title>Room1</title>
</head>
<style>
    .custom-btn {
        width: 130px;
        /* height: 40px; */
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
    }

    /* 11 */
    .btn-11 {
        border: none;
        background: rgb(251, 33, 117);
        background: linear-gradient(0deg, rgb(229 94 93) 0%, rgb(201 121 120) 100%);
        color: #fff;
        overflow: hidden;
        text-shadow: 0 1px 1px BLACK;
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

    .panel-title a {
        font-size: inherit;
    }

    /* DropDown List */
    .select-dropdown {
        position: relative;
        display: inline-block;
        max-width: 100%;
        padding-bottom: 20px;
        font-size: 24px;
        font-weight: 1000;
        text-shadow: 0 1px black;
    }

    .select-dropdown button span {
        text-shadow: 0px 1px 1px black;
        font-weight: 1000;
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
        margin-block: 5px;
    }

    .select-dropdown__button::focus {
        outline: none;
    }

    .select-dropdown__button i {
        position: absolute;
        right: 10px;
        transform: translate(-60%, 30%);
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
        line-height: 1.4;
        cursor: pointer;
        color: var(--bs-gray-300);
        transition: all ease-in-out 0.3s;
    }
</style>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <div id="scroll"></div>

    <div class="container text-white text-center " style="font-weight:1000">

        <div class="select-dropdown">
            <button type="button" role="button" id="where_search" data-value="" class="select-dropdown__button">
                <span>選擇字體大小</span> <i class="fa-solid fa-caret-down"></i>
            </button>
            <ul class="select-dropdown__list">
                <li data-value="12" class="select-dropdown__list-item">12</li>
                <li data-value="16" class="select-dropdown__list-item">16</li>
                <li data-value="21" class="select-dropdown__list-item">21</li>
                <li data-value="24" class="select-dropdown__list-item">24</li>
                <li data-value="28" class="select-dropdown__list-item">28</li>
                <li data-value="32" class="select-dropdown__list-item">32</li>
                <li data-value="48" class="select-dropdown__list-item">48</li>
                <li data-value="72" class="select-dropdown__list-item">72</li>
            </ul>
        </div>
        <?php
        if (isset($_COOKIE['font_size'])) { ?>
            <script>
                $(document).ready(function() {
                    $('#video_container').css('font-size', <?php echo $_COOKIE['font_size']; ?> + 'px')
                    $('.panel-title a').css('font-size', <?php echo $_COOKIE['font_size']; ?> + 'px')
                    $(".select-dropdown__list-item").each(function() {
                        var itemValue = $(this).data('value');
                        var text = $(this).text();
                        if (text == <?php echo $_COOKIE['font_size']; ?>) {
                            $('#where_search span').text($(this).text()).parent().attr('data-value', itemValue);
                            $("<h1 id='font_size_notify'style='font-size:24px'>當前字體大小：" + itemValue + "</h1>").insertBefore('.select-dropdown');
                        }

                    });
                })
            </script>

        <?php    } ?>
        <div id="accordion" class="panel-group wow fadeIn" data-wow-delay="0.6s">
            <div id="video_container" style="font-size:24px">
                <div class="panel panel-default"><!-- 錦衣之下 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" class="collapsed">錦衣之下(55集)</a>

                        </h4>
                    </div>
                    <div id="collapse12" data-movie='錦衣之下' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://www.mgtv.com/b/321474/7330195.html&jctype=normal&next=//gimy.app/eps/137683-3-2.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://www.mgtv.com/b/321474/7359889.html&jctype=normal&next=//gimy.app/eps/137683-3-3.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/lo4FZ8q7/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-4.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/3ePN17wa/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-5.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/DleGDhbZ/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-6.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/Kp33OVvG/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-7.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/lfsqNK2Q/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-8.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/dzVF5TfK/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-9.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/EZS5XT06/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-10.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/edVFgjeT/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-11.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/Dq27yis8/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-12.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/LOQq1sc0/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-13.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/BiZXYzJB/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-14.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/EexlXBIM/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-15.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/lKZT2zYu/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-16.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/qal0pTEN/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-17.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/gUxT4yQO/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-18.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/8OKGWNjE/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-19.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/WprFpteK/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-20.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/ilVyMNVN/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-21.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/vsHzFG2w/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-22.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/qiFOhe0Q/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-23.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/l24YabiN/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-24.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/LfHg8Hpg/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-25.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/rBgJE7S5/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-26.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/zsTLBcLe/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-27.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/g1kL3Lnf/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-28.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/S63pjwFB/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-29.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/f0duVbE8/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-30.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/iauWnCeQ/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-31.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/tcvBsvlP/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-32.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/b1lXSR3t/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-33.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/PNTt9MMm/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-34.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/DTfWp4Bs/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-35.html" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/8oZCClzC/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-36.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/2AFzCcF7/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-37.html" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/RDRg7jMo/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-38.html" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/iBlJZZUf/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-39.html" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/mGyUXnlW/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-40.html" target="_blank" class="custom-btn btn-11">第39集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/8GCxpori/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-41.html" target="_blank" class="custom-btn btn-11">第40集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/taKUqeb6/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-42.html" target="_blank" class="custom-btn btn-11">第41集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/aeX8AGFx/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-43.html" target="_blank" class="custom-btn btn-11">第42集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/zMnDC3hk/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-44.html" target="_blank" class="custom-btn btn-11">第43集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/9UKn7YjY/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-45.html" target="_blank" class="custom-btn btn-11">第44集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/b4rCbhnq/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-46.html" target="_blank" class="custom-btn btn-11">第45集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/3U4NZt4B/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-47.html" target="_blank" class="custom-btn btn-11">第46集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/gjEuYjI9/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-48.html" target="_blank" class="custom-btn btn-11">第47集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/K5AStAQt/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-49.html" target="_blank" class="custom-btn btn-11">第48集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/qRqSwMHH/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-50.html" target="_blank" class="custom-btn btn-11">第49集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/eAZcgoED/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-51.html" target="_blank" class="custom-btn btn-11">第50集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/U11AfUFz/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-52.html" target="_blank" class="custom-btn btn-11">第51集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/4j6dWqD3/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-53.html" target="_blank" class="custom-btn btn-11">第52集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/CMBtK7QM/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-54.html" target="_blank" class="custom-btn btn-11">第53集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/DfXOvAmN/index.m3u8&jctype=normal&next=//gimy.app/eps/137683-1-55.html" target="_blank" class="custom-btn btn-11">第54集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220802/z8YZXyer/index.m3u8&jctype=normal&next=//gimy.app" target="_blank" class="custom-btn btn-11">第55集<div class="dot"></div></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 君九齡 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" class="collapsed">君九齡(40集)</a>

                        </h4>
                    </div>
                    <div id="collapse9" data-movie='君九齡' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/1.html#1" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/2.html#1" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/3.html#1" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/4.html#1" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/5.html#1" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/6.html#1" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/7.html#1" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/8.html#1" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/9.html#1" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/10.html#1" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/11.html#1" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/12.html#1" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/13.html#1" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/14.html#1" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/15.html#1" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/16.html#1" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/17.html#1" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/18.html#1" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/19.html#1" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/20.html#1" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/21.html#1" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/22.html#1" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/23.html#1" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/24.html#1" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/25.html#1" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/26.html#1" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/27.html#1" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/28.html#1" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/29.html#1" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/30.html#1" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/31.html#1" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/32.html#1" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/33.html#1" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/34.html#1" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/35.html#1" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/36.html#1" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/37.html#1" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/38.html#1" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/39.html#1" target="_blank" class="custom-btn btn-11">第39集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://dramasq.biz/cn210907/40.html#1" target="_blank" class="custom-btn btn-11">第40集<div class="dot"></div></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 大唐女法醫 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" class="collapsed">大唐女法醫(35集)</a>

                        </h4>
                    </div>
                    <div id="collapse8" data-movie='大唐女法醫' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-2.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-3.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-4.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-5.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-6.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-7.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-8.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-9.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-10.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-11.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-12.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-13.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-14.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-15.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-16.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-17.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-18.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-19.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-20.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-21.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-22.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-23.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-24.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-25.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-26.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-27.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-28.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-29.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-30.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-31.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-32.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-33.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-34.html" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/191-0-35.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 無心法師3 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" class="collapsed">無心法師3(28集)</a>

                        </h4>
                    </div>
                    <div id="collapse7" data-movie='無心法師3' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-2.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-3.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-4.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-5.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-6.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-7.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-8.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-9.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-10.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-11.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-12.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-13.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-14.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-15.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-16.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-17.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-18.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-19.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-20.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-21.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-22.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-23.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-24.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-25.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-26.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-27.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/137-0-28.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 戰毒（ViuTV） -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" class="collapsed">戰毒（ViuTV）(12集)</a>

                        </h4>
                    </div>
                    <div id="collapse6" data-movie='戰毒（ViuTV）' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-2.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-3.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-4.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-5.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-6.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-7.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-8.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-9.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-10.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-11.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/181-0-12.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 卿卿日常 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" class="collapsed">卿卿日常「川內相親」(40集)</a>

                        </h4>
                    </div>
                    <div id="collapse5" data-movie='卿卿日常' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221110/svSXjKZE/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-2.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221110/NwP3Uc6Y/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-3.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221110/DN48bRNi/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-4.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221110/KAMcEzCr/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-5.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221110/isH8jjbj/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-6.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221110/plupD9Qc/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-7.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221111/KLixMbY5/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-8.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221111/CbdMyQcs/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-9.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221112/EQXOalDB/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-10.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221112/5ECYnZxt/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-11.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221113/kNNphPt4/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-12.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221113/9rikT2KM/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-13.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221114/II2gfuwl/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-14.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221114/PQF5pl4x/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-15.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221115/fs97j0Qm/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-16.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221115/qm38tZWg/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-17.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221116/QLe83IwQ/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-18.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221116/G9IaLItT/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-19.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221121/YwnNUERA/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-20.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221121/rm66xcG1/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-21.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221121/XcNSO6Qc/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-22.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221121/6egDdPZa/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-23.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221122/jPQ4SSrO/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-24.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221122/E1jNmEz5/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-25.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221123/2f9UsqsD/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-26.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221123/kWULr5Ys/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-27.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/opMvg6b3/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-28.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/sJUKhaDk/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-29.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/d512zqiW/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-30.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/XKCeX3KS/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-31.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/rTy74Iri/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-32.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/qJ0T2kXa/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-33.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/Sh3K2WEj/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-34.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221203/WV6nzXVS/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-35.html" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221206/kd2hgI6S/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-36.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221206/eq2x8P2d/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-37.html" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221208/HYptNje0/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-38.html" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221208/L9EjDYAg/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-39.html" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221209/fG2Jsadl/index.m3u8&jctype=normal&next=//gimy.app/eps/228907-2-40.html" target="_blank" class="custom-btn btn-11">第39集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf4.com/20221209/pSUAf9pu/index.m3u8&jctype=normal&next=//gimy.app" target="_blank" class="custom-btn btn-11">第40集<div class="dot"></div></a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 春閨夢裡人 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" class="collapsed">春閨夢裡人(38集)</a>

                        </h4>
                    </div>
                    <div id="collapse11" data-movie='春閨夢裡人' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-d72f59bcbde52f7b1875621ea480603fe3a6beef&jctype=normal&next=//gimys.tv/ep-232328-12-2.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-99c2ed54284c63435f2b1d558464cb00f5e2b39b&jctype=normal&next=//gimys.tv/ep-232328-12-3.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-17d31ca440fba04c4d9079392e6416122f445904&jctype=normal&next=//gimys.tv/ep-232328-12-4.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-192c2dbebc80d0293103b4f1045327527d4dcd61&jctype=normal&next=//gimys.tv/ep-232328-12-5.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-9c96bcd74076a127b92b95057b8f27714c89aff4&jctype=normal&next=//gimys.tv/ep-232328-12-6.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-67163371697a786baaa6a7cf1f9cf02fd08fa3b1&jctype=normal&next=//gimys.tv/ep-232328-12-7.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-999b7b40e5a8396d5691bc1c8f0c981ec04681a9&jctype=normal&next=//gimys.tv/ep-232328-12-8.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-51528585f157694b0e85ca449d53ee4949ce8540&jctype=normal&next=//gimys.tv/ep-232328-12-9.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-f4dd6b34784c72a77fd2a5895fa3c051bc2bd88f&jctype=normal&next=//gimys.tv/ep-232328-12-10.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-ff48c6c82e5c6684bdc0391f7d444edefa168ed3&jctype=normal&next=//gimys.tv/ep-232328-12-11.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-e6bcce5a78a8f1cc8b19278b3ec9c0a674d67cce&jctype=normal&next=//gimys.tv/ep-232328-12-12.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-0ac12382c17a6c39754800342ef9970db562eb40&jctype=normal&next=//gimys.tv/ep-232328-12-13.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-c9b3b29100767435555ff147d009e06fe8ca57e9&jctype=normal&next=//gimys.tv/ep-232328-12-14.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-c847658078a52639ea238b52f3bcbe3f0d985663&jctype=normal&next=//gimys.tv/ep-232328-12-15.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-419f0ebed540e1c0682c78a1302e8783fa6fff4f&jctype=normal&next=//gimys.tv/ep-232328-12-16.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-17091cdbdcb48df0932aa25e9c198906dd4f68d2&jctype=normal&next=//gimys.tv/ep-232328-12-17.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-9293588e189d202cf7ddde907657cd28040254bd&jctype=normal&next=//gimys.tv/ep-232328-12-18.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-1dbae34f8c3fdf9f584a99de2d36689a2b6febb7&jctype=normal&next=//gimys.tv/ep-232328-12-19.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-f10eb44308b1e53c080dd35bae1d8e15ea15ae26&jctype=normal&next=//gimys.tv/ep-232328-12-20.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-25facfd0b62de4ddd1026ccf64646c42e2b99a92&jctype=normal&next=//gimys.tv/ep-232328-12-21.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-685f51f051f6956af57ac0a9570b3957840867cb&jctype=normal&next=//gimys.tv/ep-232328-12-22.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-bc48bd308a358cee8428c95bb20d378de5e21a39&jctype=normal&next=//gimys.tv/ep-232328-12-23.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-d679fecaf64f83024750b629a1fb309b309b6ee7&jctype=normal&next=//gimys.tv/ep-232328-12-24.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-401f1714c446a827d45fc510abbc4456c07fc422&jctype=normal&next=//gimys.tv/ep-232328-12-25.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-dc791de10113dd21555dfb92da6a2cb8e066ada0&jctype=normal&next=//gimys.tv/ep-232328-12-26.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-37d28eb409901d0ec0a5739919bdd20855718d10&jctype=normal&next=//gimys.tv/ep-232328-12-27.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-b977b44dd9eaf88ab0bee211ecbebf4d00934755&jctype=normal&next=//gimys.tv/ep-232328-12-28.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-57250fece4d7d2d70b81a380dc6bee1262b734ac&jctype=normal&next=//gimys.tv/ep-232328-12-29.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-73df1217714b143b0e8b73f5ad2eab5d7df6203d&jctype=normal&next=//gimys.tv/ep-232328-12-30.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-334e90bf8898f75c691321b5b066a1384e781dba&jctype=normal&next=//gimys.tv/ep-232328-12-31.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-eb5718ea80e23b3620602c793398fd0eb6b5abaf&jctype=normal&next=//gimys.tv/ep-232328-12-32.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-e610a39f03e45470670c95ecda8e04c3099f678b&jctype=normal&next=//gimys.tv/ep-232328-12-33.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-a9c759ff51f20c8468c0256bf15934dd69e59909&jctype=normal&next=//gimys.tv/ep-232328-12-34.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-077574a1ebdab4089915d031856edb22768180e6&jctype=normal&next=//gimys.tv/ep-232328-12-35.html" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-75fe534e5285613d1de003499765f5b7c9e3b0d3&jctype=normal&next=//gimys.tv/ep-232328-12-36.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-7350495e50e7a3c0a2f696bf3baaec196843ab4c&jctype=normal&next=//gimys.tv/ep-232328-12-37.html" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-593adcdf5791691d2e4a47903cf955e1a19b1175&jctype=normal&next=//gimys.tv/ep-232328-12-38.html" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimys.tv/jcplayer/?url=tucheng-b009695772271d01465c5e863c6b2e026be2144d&jctype=normal" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 驪歌行 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" class="collapsed">驪歌行(43集)</a>

                        </h4>
                    </div>
                    <div id="collapse4" data-movie='驪歌行' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-2.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-3.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-4.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-5.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-6.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-7.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-8.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-9.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-10.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-11.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-12.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-13.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-14.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-15.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-16.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-17.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-18.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-19.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-20.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-21.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-22.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-23.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-24.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-25.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-26.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-27.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-28.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-29.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-30.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-31.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-32.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-33.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-34.html" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-35.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-36.html" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-37.html" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-38.html" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-39.html" target="_blank" class="custom-btn btn-11">第39集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-40.html" target="_blank" class="custom-btn btn-11">第40集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-41.html" target="_blank" class="custom-btn btn-11">第41集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-42.html" target="_blank" class="custom-btn btn-11">第42集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/271-0-43.html" target="_blank" class="custom-btn btn-11">第43集<div class="dot"></div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 如懿傳 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" class="collapsed">如懿傳(87集)</a>

                        </h4>
                    </div>
                    <div id="collapse3" data-movie='如懿傳' class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20742_752186e0/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-2.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20743_503ee9fe/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-3.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20744_29228024/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-4.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20745_466b520c/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-5.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20746_6faa3a30/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-6.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20747_ec2f38fa/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-7.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20748_5fefff30/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-8.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20749_baffff7c/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-9.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20750_6caac1df/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-10.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20751_c767b064/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-11.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20752_0f382543/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-12.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20753_349a879f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-13.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20754_ff96f2b1/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-14.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20755_5209406a/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-15.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20756_febe9ce1/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-16.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20757_b3c24aed/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-17.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20758_a7382e97/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-18.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20759_e4382349/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-19.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20760_9fdafa8f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-20.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20761_eac85b4f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-21.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20762_21683948/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-22.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20763_4b0b12ff/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-23.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20764_18d9f12d/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-24.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20765_d6de2adc/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-25.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20766_39590d27/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-26.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20767_538f6966/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-27.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20768_efbe8a2a/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-28.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20769_bb8e9417/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-29.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20770_52575570/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-30.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20771_4c41f48f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-31.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20772_0a6e9c09/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-32.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20773_9900a277/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-33.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20774_df8e050f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-34.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20775_5d1b4e66/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-35.html" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20776_2fdc8f8f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-36.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20777_568a2e7c/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-37.html" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20778_bf19c45f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-38.html" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20779_9ed4da63/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-39.html" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20780_83592d95/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-40.html" target="_blank" class="custom-btn btn-11">第39集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20781_5e301c28/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-41.html" target="_blank" class="custom-btn btn-11">第40集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20782_e20da455/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-42.html" target="_blank" class="custom-btn btn-11">第41集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20783_15818dba/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-43.html" target="_blank" class="custom-btn btn-11">第42集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20784_7377e883/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-44.html" target="_blank" class="custom-btn btn-11">第43集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20785_5ea05882/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-45.html" target="_blank" class="custom-btn btn-11">第44集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20786_e3f29dc0/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-46.html" target="_blank" class="custom-btn btn-11">第45集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20787_f041e075/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-47.html" target="_blank" class="custom-btn btn-11">第46集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20788_231dcf9f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-48.html" target="_blank" class="custom-btn btn-11">第47集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20789_8cacd726/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-49.html" target="_blank" class="custom-btn btn-11">第48集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20790_a64497c3/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-50.html" target="_blank" class="custom-btn btn-11">第49集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20791_f15f865a/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-51.html" target="_blank" class="custom-btn btn-11">第50集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20792_1d17f307/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-52.html" target="_blank" class="custom-btn btn-11">第51集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20793_9be93a7d/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-53.html" target="_blank" class="custom-btn btn-11">第52集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20794_31c0af3f/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-54.html" target="_blank" class="custom-btn btn-11">第53集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20795_7d0c50c0/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-55.html" target="_blank" class="custom-btn btn-11">第54集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20796_48ce99a2/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-56.html" target="_blank" class="custom-btn btn-11">第55集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20797_b2bac109/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-57.html" target="_blank" class="custom-btn btn-11">第56集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20798_80aff003/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-58.html" target="_blank" class="custom-btn btn-11">第57集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20799_814a01eb/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-59.html" target="_blank" class="custom-btn btn-11">第58集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20800_fbb925f2/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-60.html" target="_blank" class="custom-btn btn-11">第59集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20801_e3c6dbd1/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-61.html" target="_blank" class="custom-btn btn-11">第60集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20802_f036d3bd/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-62.html" target="_blank" class="custom-btn btn-11">第61集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20803_15ef39ed/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-63.html" target="_blank" class="custom-btn btn-11">第62集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20804_4ba9da6b/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-64.html" target="_blank" class="custom-btn btn-11">第63集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20805_9d1b1c19/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-65.html" target="_blank" class="custom-btn btn-11">第64集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20806_63c929c5/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-66.html" target="_blank" class="custom-btn btn-11">第65集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20807_00030ff3/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-67.html" target="_blank" class="custom-btn btn-11">第66集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20808_21b43ec2/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-68.html" target="_blank" class="custom-btn btn-11">第67集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20809_f28c10ed/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-69.html" target="_blank" class="custom-btn btn-11">第68集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20810_2811f4e9/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-70.html" target="_blank" class="custom-btn btn-11">第69集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn.com/20220627/20811_93f28409/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-6-71.html" target="_blank" class="custom-btn btn-11">第70集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/vsE7xvkq/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-72.html" target="_blank" class="custom-btn btn-11">第71集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/ELize1R1/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-73.html" target="_blank" class="custom-btn btn-11">第72集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/lsEj2Ki7/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-74.html" target="_blank" class="custom-btn btn-11">第73集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/P4e6WMBP/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-75.html" target="_blank" class="custom-btn btn-11">第74集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/G7qdHuC2/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-76.html" target="_blank" class="custom-btn btn-11">第75集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/0okkVlyx/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-77.html" target="_blank" class="custom-btn btn-11">第76集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/tGyyO3iz/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-78.html" target="_blank" class="custom-btn btn-11">第77集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/aKbbHOH3/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-79.html" target="_blank" class="custom-btn btn-11">第78集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/Gf081wIC/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-80.html" target="_blank" class="custom-btn btn-11">第79集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/syucyiof/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-81.html" target="_blank" class="custom-btn btn-11">第80集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/8Pw8RvGJ/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-82.html" target="_blank" class="custom-btn btn-11">第81集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/bGfaetpd/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-83.html" target="_blank" class="custom-btn btn-11">第82集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/ivBEakI2/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-84.html" target="_blank" class="custom-btn btn-11">第83集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/saZyq6z9/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-85.html" target="_blank" class="custom-btn btn-11">第84集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/H27DAcwe/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-86.html" target="_blank" class="custom-btn btn-11">第85集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/97wI7e7C/index.m3u8&jctype=normal&next=//gimy.app/eps/11856-2-87.html" target="_blank" class="custom-btn btn-11">第86集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://ukzy.ukubf3.com/20220517/bc0q0weC/index.m3u8&jctype=normal&next=//gimy.app" target="_blank" class="custom-btn btn-11">第87集<div class="dot"></div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 尚食 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" class="collapsed">尚食(40集)</a>

                        </h4>
                    </div>
                    <div id="collapse2" data-movie='尚食' class="panel-collapse collapse  ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://gimy.app/jcplayer/?url=https://vod1.kczybf.com/20220516/IKlfAYhf/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-1-2.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9302_a841c779/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-3.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9304_9baa7596/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-4.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9305_188c1b6a/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-5.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9306_98639ed5/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-6.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9307_d3cf1573/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-7.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9318_742bb1dd/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-8.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9308_0fd17cdd/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-9.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9310_9d031011/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-10.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9309_76c274bb/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-11.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9311_759f16b6/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-12.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9312_da2585ef/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-13.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9313_af3715cb/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-14.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9314_643ff61d/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-15.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9316_2501c721/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-16.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9315_13904406/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-17.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220607/9317_1744adac/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-18.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220608/8285_479fedfa/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-19.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220609/9866_26a7a601/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-20.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220610/10057_c0bfa4ab/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-21.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn2.com/20220613/10735_963e9916/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-22.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220614/8767_6899870e/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-23.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220616/9026_3aed8118/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-24.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220616/9025_8085329d/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-25.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220617/9077_572b8578/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-26.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220620/9231_a8ba7146/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-27.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn7.com/20220622/3512_fe5577b7/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-28.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn7.com/20220622/3511_17ae2b5b/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-29.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn3.com/20220623/8300_d66e2d0b/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-30.html" target="_blank" class="custom-btn btn-11">第29集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220625/9713_14f1ce65/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-31.html" target="_blank" class="custom-btn btn-11">第30集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220627/10033_2fd4bd64/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-32.html" target="_blank" class="custom-btn btn-11">第31集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn7.com/20220628/4351_632b3f5e/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-33.html" target="_blank" class="custom-btn btn-11">第32集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn1.com/20220629/10180_c008a1be/index.m3u8&jctype=normal&next=//gimy.app/eps/197826-2-34.html" target="_blank" class="custom-btn btn-11">第33集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://vip.lz-cdn3.com/20220630/8516_6d99cb6c/index.m3u8&jctype=normal&next=//gimy.app" target="_blank" class="custom-btn btn-11">第34集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220804/2xZs84bu/index.m3u8&jctype=normal&next=//gimy.app/eps/166625-1-36.html" target="_blank" class="custom-btn btn-11">第35集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220804/cxrAfCx0/index.m3u8&jctype=normal&next=//gimy.app/eps/166625-1-37.html" target="_blank" class="custom-btn btn-11">第36集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220804/cKNEM7Ql/index.m3u8&jctype=normal&next=//gimy.app/eps/166625-1-38.html" target="_blank" class="custom-btn btn-11">第37集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220804/kogSIxc9/index.m3u8&jctype=normal&next=//gimy.app/eps/166625-1-39.html" target="_blank" class="custom-btn btn-11">第38集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220803/46LL6Dad/index.m3u8&jctype=normal&next=//gimy.app/eps/166625-1-40.html" target="_blank" class="custom-btn btn-11">第39集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="//gimy.app/jcplayer/?url=https://v6.cdtlas.com/20220804/Dnkbb3i7/index.m3u8&jctype=normal" target="_blank" class="custom-btn btn-11">第40集<div class="dot"></div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- 萬能家政夫 -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" class="collapsed">萬能家政夫(9集)</a>

                        </h4>
                    </div>
                    <div id="collapse10" data-movie='萬能家政夫' class="panel-collapse collapse  ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-2.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-3.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-4.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-5.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-6.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-7.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-8.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/327-1-9.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default"><!-- Running Man -->
                    <div class="panel-heading">
                        <h4 class="panel-title" style="font-size:24px">
                            <a style="font-weight:1000" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="false" class="collapsed">Running Man (XVI)(28集)</a>

                        </h4>
                    </div>
                    <div id="collapse0" data-movie='Running Man (XVI)' class="panel-collapse collapse  ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713.html" target="_blank" class="custom-btn btn-11">第1集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-2.html" target="_blank" class="custom-btn btn-11">第2集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-3.html" target="_blank" class="custom-btn btn-11">第3集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-4.html" target="_blank" class="custom-btn btn-11">第4集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-5.html" target="_blank" class="custom-btn btn-11">第5集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-6.html" target="_blank" class="custom-btn btn-11">第6集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-7.html" target="_blank" class="custom-btn btn-11">第7集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-8.html" target="_blank" class="custom-btn btn-11">第8集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-9.html" target="_blank" class="custom-btn btn-11">第9集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-10.html" target="_blank" class="custom-btn btn-11">第10集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-11.html" target="_blank" class="custom-btn btn-11">第11集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-12.html" target="_blank" class="custom-btn btn-11">第12集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-13.html" target="_blank" class="custom-btn btn-11">第13集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-14.html" target="_blank" class="custom-btn btn-11">第14集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-15.html" target="_blank" class="custom-btn btn-11">第15集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-16.html" target="_blank" class="custom-btn btn-11">第16集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-17.html" target="_blank" class="custom-btn btn-11">第17集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-18.html" target="_blank" class="custom-btn btn-11">第18集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-19.html" target="_blank" class="custom-btn btn-11">第19集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-20.html" target="_blank" class="custom-btn btn-11">第20集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-21.html" target="_blank" class="custom-btn btn-11">第21集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-22.html" target="_blank" class="custom-btn btn-11">第22集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-23.html" target="_blank" class="custom-btn btn-11">第23集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-24.html" target="_blank" class="custom-btn btn-11">第24集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-25.html" target="_blank" class="custom-btn btn-11">第25集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-26.html" target="_blank" class="custom-btn btn-11">第26集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-27.html" target="_blank" class="custom-btn btn-11">第27集<div class="dot"></div></a></div>
                                <div class="col movie_list_item"><a href="https://m.colafun.com/713-1-28.html" target="_blank" class="custom-btn btn-11">第28集<div class="dot"></div></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- accordion -->
    </div>
    <p class="last_modify_time text-center"><?php echo "上一次更改時間： " . date(
                                                "d/m/Y h:i:sa",
                                                filemtime("video.php")
                                            ); ?></p>
    <script>
        $('.select-dropdown__button').on('click', function() {
            $('.select-dropdown__list').toggleClass('active');
        });
        $('.select-dropdown__list-item').on('click', function() {
            var itemValue = $(this).data('value');
            var title_size = $(this).data('value') + 8;
            $('.select-dropdown__button span').text($(this).text()).parent().attr('data-value', itemValue);
            $('.select-dropdown__list').toggleClass('active');
            var cookie_name = "font_size";
            var days = 10
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = cookie_name + "=" + (itemValue || "") + expires + "; path=/";
            $('#video_container').css('font-size', itemValue + 'px')
            $('.panel-title a').css('font-size', title_size + 'px')
            $('.last_modify_time').css('font-size', title_size + 'px')
            if ($("#font_size_notify").length == 0) {
                $("<h1 id='font_size_notify'style='font-size:24px'>當前字體大小：" + itemValue + "</h1>").insertBefore('.select-dropdown');
            } else {
                $('#font_size_notify').text('當前字體大小：' + itemValue)
            }
        });
    </script>

    <?php include_once('footer.php') ?>
    <script>
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
        $('a.collapsed:not(.first-bar)').on('click', function(e) {
            if ($(this).attr("aria-expanded", "false")) {
                setCookie('vc', $(this).attr('href'), 10);
            }
        })

        if (getCookie("vc")) {
            $('a.collapsed[href="' + getCookie("vc") + '"]').trigger("click");
        }
    </script>
    <script>
        $('a.custom-btn.btn-11').each(function(e) {
            var item_movie = $(this).text()
            var item_movie_name = $(this).parent().parent().parent().parent().data('movie')
            var entire_name = `${item_movie_name}  ${item_movie}`
            var form_data = new FormData();
            form_data.append('movie_name', entire_name)
            $(this).css("background", "linear-gradient(0deg, rgb(0 0 0) 0%, rgb(255 147 104 / 0%) 100%);");
            $.ajax({
                type: "POST",
                url: "../../system/php/video/check_color.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function() {
                    var el = document.createElement("div");
                    el.className = "snackbar";
                    var y = document.getElementById("snackbar-container");
                    el.style.color = 'white';
                    el.innerHTML = '內部文件遺失';
                    y.append(el);
                    el.className = "snackbar show";
                    setTimeout(function() {
                        el.className = el.className.replace("snackbar show", "snackbar");
                    }, 3000);
                },
                success: (data) => {
                    var json = JSON.parse(data);
                    if (json.count == 1) {
                        $(this).css('background', 'transparent');
                        /* $(this).parent().remove(); */
                        //$(this).css("background", "linear-gradient(0deg, rgb(108 255 112) 0%, rgb(110 147 104 / 0%) 100%);");
                        //$('.custom-btn').css('background', 'linear-gradient(0deg, rgb(229 94 93) 0%, rgb(201 121 120) 100%)');
                    }
                }
            })
        })
    </script>
    <script>
        const closeIcon = document.querySelector(".toast_close");

        $('.custom-btn.btn-11').on('click touchend', function(e) {
            if (e.cancelable) {
                event.preventDefault();
                var item_movie = $(this).text()
                var item_movie_name = $(this).parent().parent().parent().parent().data('movie')
                var item_herf = $(this).attr('href');
                var movie_info = `${item_movie_name}  ${item_movie}`
                var formData = {
                    movie_info: movie_info
                };
                $.ajax({
                    type: "POST",
                    url: "../system/account/video_info_store.php",
                    data: formData
                })

                const toast = document.querySelector(".toast_notify");
                const progress = document.querySelector(".toast_progress");

                let timer1, timer2;
                document.querySelector('.text-1').innerHTML = '即將跳轉頁面'
                document.querySelector('.text-2').innerHTML = `劇集：${item_movie_name}  ${item_movie}`
                document.querySelector('.toast_icon').innerHTML = `<i class="fa-solid fa-film"></i>`
                document.querySelector('html').style.pointerEvents = 'none'
                toast.classList.add("active");
                progress.classList.add("active");

                timer1 = setTimeout(() => {
                    toast.classList.remove("active");
                }, 3000); //1s = 1000 milliseconds

                timer2 = setTimeout(() => {
                    progress.classList.remove("active");
                    document.querySelector('html').style.pointerEvents = 'all'
                    //
                    setTimeout(() => {
                        //window.open(url, '_blank');
                    })
                    var isSafari = navigator.vendor && navigator.vendor.indexOf('Apple') > -1 &&
                        navigator.userAgent &&
                        navigator.userAgent.indexOf('CriOS') == -1 &&
                        navigator.userAgent.indexOf('FxiOS') == -1;
                    if (isSafari == true) {
                        window.location.assign(item_herf)
                    } else {
                        window.open(item_herf, '_blank');

                    }
                }, 3300);

            }
        });
        closeIcon.addEventListener("click", () => {
            toast.classList.remove("active");

            setTimeout(() => {
                progress.classList.remove("active");
            }, 300);

            clearTimeout(timer1);
            clearTimeout(timer2);
        });
    </script>
    <script src="../js/interaction.js"></script>
    <script>
        if (location.href == 'https://rm1web.tk/asset/video.php') {
            window.location.href = 'https://rm1web.tk/video';
        }
        var count = 0
        document.onvisibilitychange = function() {
            switch (document.visibilityState) {
                case 'hidden':
                    count = count + 1
                    // 使用者不在頁面上時要做的事……
                    break;
                case 'visible':
                    if (count >= 3) {
                        count = 0
                        location.reload();
                    }
                    //location.reload();
                    break;
            }
        };
    </script>

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
                _0x5e196c = '瀏覽影片\x20--\x20一號房',
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