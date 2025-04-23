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
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="../css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="../css/dashboard/dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="../css/hotel.css" rel="stylesheet" />
    <title>Room1</title>
</head>
<style>
    .pricing-section .pricing-item h3 {
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 30px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        /* line-height: 1.5em; */
        height: 3em;
        width: 100%;
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
        -o-text-overflow: ellipsis;
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

        <div class="pricing-section">
                <div class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading font-weight-bold mb-5 text-white mt-5">Jackson Hole(17/5/23- 19/5/23)
                        <a href="https://www.google.com.hk/maps/dir/130+W+Simpson+Ave,+Jackson,+WY+83001%E7%BE%8E%E5%9C%8B/Lexington+at+Jackson+Hole+Hotel+%26+Suites,+North+Cache+Street,+Jackson+Hole,+%E6%87%B7%E4%BF%84%E6%98%8E%E5%B7%9E%E7%BE%8E%E5%9C%8B/Jackson+Hole+Airport,+East+Airport+Road+%23159,+%E5%82%91%E5%85%8B%E9%81%9C%E6%87%B7%E4%BF%84%E6%98%8E%E5%B7%9E%E7%BE%8E%E5%9C%8B/@43.5403827,-110.8146517,12z/data=!3m1!4b1!4m20!4m19!1m5!1m1!1s0x53531a69b2a83525:0xece8e8c60af92fa5!2m2!1d-110.764!2d43.4772!1m5!1m1!1s0x53531b5f1a8aea47:0x968a4cdc0bf21254!2m2!1d-110.7627675!2d43.4830775!1m5!1m1!1s0x535303d2e3141a2f:0xd5489fe0ee4e8cdd!2m2!1d-110.7362976!2d43.6033592!3e0?hl=zh-HK" target="_blank" class="btn btn-primary">完整地圖</a>
                    </h2>

                    <div class="switch-plan">

                        <div class="d-inline-flex align-items-center">
                            <div class="period">美金</div>
                            <a href="#" class="period-toggle js-period-toggle"></a>
                            <div class="period"><span class="mr-2">港幣</span><!-- <span class="save-percent">Save 25%</span> --></div>
                        </div>

                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6 " data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-item active">
                            <h3 style="position:relative"><button class="copy-snippet">複製</button>The Lexington at Jackson Hole</h3>
                            <div class="description">
                                <p style="position:relative"><button class="copy-snippet">複製</button>285 N Cache Street, 傑克遜, WY 83001, 美國</p>
                            </div>
                            <div class="period-change mb-4 d-block">
                                <div class="price-wrap">
                                    <div class="price">
                                        <div>
                                            <div>US$694</div>
                                            <div>HK$5,442</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-center period-wrap">
                                <div class="d-block text-left period">
                                    <div>
                                        <div>US$604房價 + US$90稅費及其他費用</div>
                                        <div>HK$4,739房價 + HK$703稅費及其他費用</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;2 張加大雙人床</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;包括早餐(美式)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-check"></i>&nbsp;&nbsp;免費取消 2023 年 5 月 13 日 下午11:59 前(5 月 12 日付款)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-van-shuttle"></i>&nbsp;&nbsp;機場接駁車（免費）
                                        <a style="color:var(--bs-link-hover-color)" href="http://lexingtonhoteljacksonhole.com/locationdirections-2/" target="_blank" rel="noopener noreferrer">官網介紹</a></span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-maximize"></i>&nbsp;&nbsp;30平方米
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-square-parking"></i>&nbsp;&nbsp;免費停車
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;入住時間：16:00;退房時間：11:00
                                </li>
                            </ul>
                            <div>
                                <a href="https://www.booking.com/hotel/us/lexington-at-jackson-hole.zh-tw.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaGKIAQGYATC4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AqycjJ8GwAIB0gIkNzg5MDQ3MDktNDkwNy00ZDNmLWFkYzEtMTg5YmQ2MWFhMmQy2AIG4AIB&sid=ea2ec099ce8e30322fd45955af422105&all_sr_blocks=5979721_209743725_4_1_0%3Bcheckin%3D2023-05-17%3Bcheckout%3D2023-05-19%3Bdest_id%3D6050%3Bdest_type%3Dregion%3Bdist%3D0%3Bgroup_adults%3D4%3Bgroup_children%3D0%3Bhapos%3D7%3Bhighlighted_blocks%3D5979721_209743725_4_1_0%3Bhpos%3D7%3Bmatching_block_id%3D5979721_209743725_4_1_0%3Bno_rooms%3D1%3Breq_adults%3D4%3Breq_children%3D0%3Broom1%3DA%2CA%2CA%2CA%3Bsb_price_type%3Dtotal%3Bsr_order%3Dpopularity%3Bsr_pri_blocks%3D5979721_209743725_4_1_0__60398%3Bsrepoch%3D1675824700%3Bsrpvid%3Dcddf141ddc4e0051%3Btype%3Dtotal%3Bucfs%3D1&selected_currency=USD#hotelTmpl" target="_blank" class="btn btn-primary">Booking.com</a>
                                <a href="https://www.google.com.hk/maps/dir/Lexington+at+Jackson+Hole+Hotel+%26+Suites,+North+Cache+Street,+%E5%82%91%E5%85%8B%E9%81%9C+WY,+%E7%BE%8E%E5%9C%8B/Jackson+Hole+Airport,+East+Airport+Road+%23159,+%E5%82%91%E5%85%8B%E9%81%9C%E6%87%B7%E4%BF%84%E6%98%8E%E5%B7%9E%E7%BE%8E%E5%9C%8B/@43.5432793,-110.8136305,12z/data=!3m1!4b1!4m14!4m13!1m5!1m1!1s0x53531b5f1a8aea47:0x968a4cdc0bf21254!2m2!1d-110.7627675!2d43.4830775!1m5!1m1!1s0x535303d2e3141a2f:0xd5489fe0ee4e8cdd!2m2!1d-110.7362976!2d43.6033592!3e0?hl=zh-HK" target="_blank" class="btn btn-primary">地圖</a>
                                <a href="http://lexingtonhoteljacksonhole.com/" target="_blank" class="btn btn-primary">酒店官網</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 " data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item active">
                            <h3 style="position:relative;color:#e84545;"><button class="copy-snippet">複製</button>傑克遜霍爾萬豪春季山丘套房</h3>
                            <div class="description">
                                <p style="position:relative"><button class="copy-snippet">複製</button>130 West Simpson Avenue, 傑克遜, WY 83001, 美國</p>
                            </div>
                            <div class="period-change mb-4 d-block">
                                <div class="price-wrap">
                                    <div class="price">
                                        <div>
                                            <div>US$963</div>
                                            <div>HK$7559</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-center period-wrap">
                                <div class="d-block text-left period">
                                    <div>
                                        <div>US$868房價 + US$95稅費及其他費用</div>
                                        <div>HK$6,810房價 + HK$749稅費及其他費用</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;2 張加大雙人床</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;包括早餐(自助)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-check"></i>&nbsp;&nbsp;免費取消 2023 年 5 月 13 日 下午11:59 前(無需訂金－到店付款)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-van-shuttle"></i>&nbsp;&nbsp;沒有機場接駁車
                                 </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-maximize"></i>&nbsp;&nbsp;39平方米
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-square-parking"></i>&nbsp;&nbsp;付費停車(每日 US$19)
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;入住時間：16:00;退房時間：11:00
                                </li>
                            </ul>
                            <div>
                                <a href="https://www.booking.com/hotel/us/springhill-suites-by-marriott-jackson-hole.zh-tw.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaGKIAQGYATC4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AqycjJ8GwAIB0gIkNzg5MDQ3MDktNDkwNy00ZDNmLWFkYzEtMTg5YmQ2MWFhMmQy2AIG4AIB&sid=ea2ec099ce8e30322fd45955af422105&all_sr_blocks=205600302_222303238_0_1_0%3Bcheckin%3D2023-05-17%3Bcheckout%3D2023-05-19%3Bdest_id%3D6050%3Bdest_type%3Dregion%3Bdist%3D0%3Bgroup_adults%3D4%3Bgroup_children%3D0%3Bhapos%3D24%3Bhighlighted_blocks%3D205600302_222303238_0_1_0%3Bhpos%3D24%3Bmatching_block_id%3D205600302_222303238_0_1_0%3Bno_rooms%3D1%3Breq_adults%3D4%3Breq_children%3D0%3Broom1%3DA%2CA%2CA%2CA%3Bsb_price_type%3Dtotal%3Bsr_order%3Dpopularity%3Bsr_pri_blocks%3D205600302_222303238_0_1_0__82800%3Bsrepoch%3D1675824700%3Bsrpvid%3Dcddf141ddc4e0051%3Btype%3Dtotal%3Bucfs%3D1&selected_currency=USD#hotelTmpl" target="_blank" class="btn btn-primary">Booking.com</a>
                                <a href="https://www.google.com.hk/maps/dir/130+W+Simpson+Ave,+Jackson,+WY+83001%E7%BE%8E%E5%9C%8B/Jackson+Hole+Airport,+East+Airport+Road+%23159,+%E5%82%91%E5%85%8B%E9%81%9C%E6%87%B7%E4%BF%84%E6%98%8E%E5%B7%9E%E7%BE%8E%E5%9C%8B/@43.5403827,-110.8141021,12z/data=!3m1!4b1!4m14!4m13!1m5!1m1!1s0x53531a69b2a83525:0xece8e8c60af92fa5!2m2!1d-110.764!2d43.4772!1m5!1m1!1s0x535303d2e3141a2f:0xd5489fe0ee4e8cdd!2m2!1d-110.7362976!2d43.6033592!3e0?hl=zh-HK" target="_blank" class="btn btn-primary">地圖</a>
                                <a href="https://www.marriott.com/search/findHotels.mi" target="_blank" class="btn btn-primary">酒店官網</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading font-weight-bold mb-5 text-white mt-3">Los Angles(21/5/23- 23/5/23)
                        <a href="https://www.google.com.hk/maps/dir/%E7%BE%8E%E5%9C%8B+California,+Anaheim,+Disneyland+Drive,+%E8%BF%AA%E5%A3%AB%E5%B0%BC%E6%A8%82%E5%9C%92/Fairfield+by+Marriott,+South+Harbor+Boulevard,+Anaheim+Resort,+%E5%AE%89%E9%82%A3%E7%BF%B0%E5%8A%A0%E5%88%A9%E7%A6%8F%E5%B0%BC%E4%BA%9E%E7%BE%8E%E5%9C%8B/Holiday+Inn+Express+%26+Suites+Anaheim+Resort+Area,+an+IHG+Hotel,+South+Manchester+Avenue,+%E5%AE%89%E9%82%A3%E7%BF%B0%E5%8A%A0%E5%88%A9%E7%A6%8F%E5%B0%BC%E4%BA%9E%E7%BE%8E%E5%9C%8B/Four+Points+by+Sheraton+Anaheim,+South+Harbor+Boulevard,+%E5%AE%89%E9%82%A3%E7%BF%B0%E5%8A%A0%E5%88%A9%E7%A6%8F%E5%B0%BC%E4%BA%9E%E7%BE%8E%E5%9C%8B/Residence+Inn+by+Marriott+at+Anaheim+Resort%2FConvention+Center,+West+Katella+Avenue,+%E5%AE%89%E9%82%A3%E7%BF%B0%E5%8A%A0%E5%88%A9%E7%A6%8F%E5%B0%BC%E4%BA%9E%E7%BE%8E%E5%9C%8B/@33.8103035,-117.927068,15z/data=!3m1!4b1!4m32!4m31!1m5!1m1!1s0x80dcd7d12b3b5e6b:0x2ef62f8418225cfa!2m2!1d-117.9189742!2d33.8120918!1m5!1m1!1s0x80dcd7d010f206ed:0x1d889aa30a582223!2m2!1d-117.9135991!2d33.8114201!1m5!1m1!1s0x80dcd7c57aaa4813:0x8866625728a6090e!2m2!1d-117.9130258!2d33.8120985!1m5!1m1!1s0x80dcd7d2492878db:0xca0cc5aeeb45ba87!2m2!1d-117.9162538!2d33.8174319!1m5!1m1!1s0x80dcd7dc43688063:0xde8ad4da817b72b1!2m2!1d-117.9172352!2d33.8027894!3e0?hl=zh-TW" target="_blank" class="btn btn-primary">完整地圖</a>
                    </h2>
                </div>


                <div class="row">

                    <div class="col-md-4 " data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-item active">
                            <h3 style="position:relative;color:#e84545;"><button class="copy-snippet">複製</button>Fairfield by Marriott Anaheim Resort</h3>
                            <div class="description">
                                <p style="position:relative"><button class="copy-snippet">複製</button>1460 South Harbor Boulevard, 安納海姆, CA 92802, 美國</p>
                            </div>
                            <div class="period-change mb-4 d-block">
                                <div class="price-wrap">
                                    <div class="price">
                                        <div>
                                            <div>US$587</div>
                                            <div>HK$4606</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-center period-wrap">
                                <div class="d-block text-left period">
                                    <div>
                                        <div>US$500房價 + US$87稅費及其他費用</div>
                                        <div>HK$3,927房價 + HK$679稅費及其他費用</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;2 張加大雙人床</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;不包括早餐</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-check"></i>&nbsp;&nbsp;免費取消 2023 年 5 月 17 日 下午11:59 前(無需訂金－到店付款)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-van-shuttle"></i>&nbsp;&nbsp;沒有機場接駁車
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-maximize"></i>&nbsp;&nbsp;21平方米
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-square-parking"></i>&nbsp;&nbsp;付費停車(每日 US$24)
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;入住時間：16:00;退房時間：11:00
                                </li>
                            </ul>
                            <div>
                                <a href="https://www.booking.com/hotel/us/fairfield-inn-anaheim-disneyland-resort.zh-tw.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaGKIAQGYATC4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AoH_jJ8GwAIB0gIkNmM1YWI5NDQtZjhjYS00YjRhLTllY2MtZGU3MDAwNTBlODA12AIG4AIB&sid=ea2ec099ce8e30322fd45955af422105&all_sr_blocks=26263001_274564842_0_0_0;checkin=2023-05-22;checkout=2023-05-23;dest_id=262630;dest_type=hotel;dist=0;group_adults=4;group_children=0;hapos=1;highlighted_blocks=26263001_274564842_0_0_0;hpos=1;matching_block_id=26263001_274564842_0_0_0;no_rooms=1;req_adults=4;req_children=0;room1=A%2CA%2CA%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=26263001_274564842_0_0_0__25020;srepoch=1675837360;srpvid=3a552cd75f0e008f;type=total;ucfs=1&#map_closed" target="_blank" class="btn btn-primary">Booking.com</a>
                                <a href="https://www.google.com.hk/maps/dir/%E7%BE%8E%E5%9C%8B+California,+Los+Angeles,+World+Way,+%E6%B4%9B%E6%9D%89%E7%A3%AF%E5%9C%8B%E9%9A%9B%E6%A9%9F%E5%A0%B4+(LAX)/%E7%BE%8E%E5%9C%8B+California,+Anaheim,+Disneyland+Drive,+%E8%BF%AA%E5%A3%AB%E5%B0%BC%E6%A8%82%E5%9C%92/Fairfield+by+Marriott,+South+Harbor+Boulevard,+Anaheim+Resort,+%E5%AE%89%E9%82%A3%E7%BF%B0%E5%8A%A0%E5%88%A9%E7%A6%8F%E5%B0%BC%E4%BA%9E%E7%BE%8E%E5%9C%8B/@33.8776759,-118.30115,11z/data=!3m1!4b1!4m20!4m19!1m5!1m1!1s0x80c2b0d213b24fb5:0x77a87b57698badf1!2m2!1d-118.40853!2d33.9415889!1m5!1m1!1s0x80dcd7d12b3b5e6b:0x2ef62f8418225cfa!2m2!1d-117.9189742!2d33.8120918!1m5!1m1!1s0x80dcd7d010f206ed:0x1d889aa30a582223!2m2!1d-117.9135991!2d33.8114201!3e0?hl=zh-TW" target="_blank" class="btn btn-primary">地圖</a>
                                <a href="https://www.marriott.com/en-us/hotels/laxoc-fairfield-anaheim-resort/overview/" target="_blank" class="btn btn-primary">酒店官網</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 " data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item active">
                            <h3 style="position:relative;color:#e84545;"><button class="copy-snippet">複製</button>Holiday Inn Express & Suites Anaheim Resort Area, an IHG Hotel</h3>
                            <div class="description">
                                <p style="position:relative"><button class="copy-snippet">複製</button>1411 South Manchester, Anaheim, CA 92802, United States</p>
                            </div>
                            <div class="period-change mb-4 d-block">
                                <div class="price-wrap">
                                    <div class="price">
                                        <div>
                                            <div>US$533</div>
                                            <div>HK4894</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-center period-wrap">
                                <div class="d-block text-left period">
                                    <div>
                                        <div>US$533房價 + US$91稅費及其他費用</div>
                                        <div>HK$4183房價 + HK$711稅費及其他費用</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;2 張加大雙人床</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;包括早餐(美式)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-check"></i>&nbsp;&nbsp;免費取消 2023 年 5 月 18 日 下午11:59 前(無需訂金－到店付款)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-van-shuttle"></i>&nbsp;&nbsp;沒有機場接駁車
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-maximize"></i>&nbsp;&nbsp;33平方米
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-square-parking"></i>&nbsp;&nbsp;付費停車(每日 US$30)
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;入住時間：15:00;退房時間：11:00
                                </li>
                            </ul>
                            <div>
                                <a href="https://www.booking.com/hotel/us/holiday-inn-express-anaheim-resort-area.zh-tw.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaGKIAQGYATC4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AoH_jJ8GwAIB0gIkNmM1YWI5NDQtZjhjYS00YjRhLTllY2MtZGU3MDAwNTBlODA12AIG4AIB&sid=ea2ec099ce8e30322fd45955af422105&checkin_month=5&checkin_monthday=21&checkin_year=2023&checkout_month=5&checkout_monthday=23&checkout_year=2023&dist=0&do_availability_check=1&group_adults=4&group_children=0&hp_avform=1&hp_group_set=0&no_rooms=1&origin=hp&sb_price_type=total&src=hotel&stay_on_hp=1&type=total&lang=zh-tw&soz=1&lang_changed=1#_" target="_blank" class="btn btn-primary">Booking.com</a>
                                <a href="https://www.google.com.hk/maps/dir/%E7%BE%8E%E5%9C%8B+California,+Los+Angeles,+World+Way,+%E6%B4%9B%E6%9D%89%E7%A3%AF%E5%9C%8B%E9%9A%9B%E6%A9%9F%E5%A0%B4+(LAX)/%E7%BE%8E%E5%9C%8B+California,+Anaheim,+Disneyland+Drive,+%E8%BF%AA%E5%A3%AB%E5%B0%BC%E6%A8%82%E5%9C%92/Holiday+Inn+%26+Suites+Anaheim+(1+Blk%2FDisneyland%C2%AE),+an+IHG+Hotel,+1240+S+Walnut+St,+Anaheim,+CA+92802%E7%BE%8E%E5%9C%8B/@33.8146589,-117.9279936,16z/data=!4m20!4m19!1m5!1m1!1s0x80c2b0d213b24fb5:0x77a87b57698badf1!2m2!1d-118.40853!2d33.9415889!1m5!1m1!1s0x80dcd7d12b3b5e6b:0x2ef62f8418225cfa!2m2!1d-117.9189742!2d33.8120918!1m5!1m1!1s0x80dd282b2f47dc37:0xb90b5f4931d86c92!2m2!1d-117.9279327!2d33.8166521!3e0?hl=zh-TW" target="_blank" class="btn btn-primary">地圖</a>
                                <a href="https://www.ihg.com/holidayinn/hotels/gb/en/find-hotels/select-roomrate?fromRedirect=true&qSrt=sBR&glat=FREE_hpa_free_HK_desktop_LAXAW_mapresults_2_USD_2023-05-17_selected___FALSE_TDBNIDAS1&qSlH=LAXAW&qRms=1&qAdlt=2&qChld=0&qCiD=17&qCiMy=042023&qCoD=19&qCoMy=042023&qrtPt=130.90&setPMCookies=true&qSlRc=TDBN&qRtP=IDAS1&qSHBrC=HI&qDest=1240%20South%20Walnut,%20Anaheim,%20CA,%20US&cm_mmc=hpa_free_HK_desktop_LAXAW_mapresults_2_USD_2023-05-17_selected___FALSE_TDBNIDAS1&srb_u=1" target="_blank" class="btn btn-primary">酒店官網</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 " data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item active">
                            <h3 style="position:relative;color:#e84545;"><button class="copy-snippet">複製</button>Four Points by Sheraton Anaheim</h3>
                            <div class="description">
                                <p style="position:relative"><button class="copy-snippet">複製</button>1221 South Harbor Boulevard, Anaheim, CA 92805, United States</p>
                            </div>
                            <div class="period-change mb-4 d-block">
                                <div class="price-wrap">
                                    <div class="price">
                                        <div>
                                            <div>US$379</div>
                                            <div>HK$2566</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-center period-wrap">
                                <div class="d-block text-left period">
                                    <div>
                                        <div>US$323房價 + US$56稅費及其他費用</div>
                                        <div>HK$2155房價 + HK$371稅費及其他費用</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;2 張加大雙人床</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;不包括早餐</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-check"></i>&nbsp;&nbsp;免費取消 2023 年 5 月 18 日 下午11:59 前(無需訂金－到店付款)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-van-shuttle"></i>&nbsp;&nbsp;沒有機場接駁車
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-maximize"></i>&nbsp;&nbsp;33平方米
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-square-parking"></i>&nbsp;&nbsp;付費停車(每日 US$22)
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;入住時間：15:00;退房時間：11:00
                                </li>
                            </ul>
                            <div>
                                <a href="https://www.booking.com/hotel/us/menage.zh-tw.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaGKIAQGYATC4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AoH_jJ8GwAIB0gIkNmM1YWI5NDQtZjhjYS00YjRhLTllY2MtZGU3MDAwNTBlODA12AIG4AIB&sid=ea2ec099ce8e30322fd45955af422105&all_sr_blocks=18305318_246423043_0_0_0%3Bcheckin%3D2023-05-21%3Bcheckout%3D2023-05-23%3Bdest_id%3D20011324%3Bdest_type%3Dcity%3Bdist%3D0%3Bgroup_adults%3D4%3Bgroup_children%3D0%3Bhapos%3D1%3Bhighlighted_blocks%3D18305318_246423043_0_0_0%3Bhpos%3D1%3Bmatching_block_id%3D18305318_246423043_0_0_0%3Bno_rooms%3D1%3Breq_adults%3D4%3Breq_children%3D0%3Broom1%3DA%2CA%2CA%2CA%3Bsb_price_type%3Dtotal%3Bsr_order%3Dpopularity%3Bsr_pri_blocks%3D18305318_246423043_0_0_0__32300%3Bsrepoch%3D1675838369%3Bsrpvid%3D81d72ecffe4b004c%3Btype%3Dtotal%3Bucfs%3D1&lang=zh-tw&soz=1&lang_changed=1&selected_currency=USD#_" target="_blank" class="btn btn-primary">Booking.com</a>
                                <a href="https://www.google.com.hk/maps/dir/%E7%BE%8E%E5%9C%8B+California,+Los+Angeles,+World+Way,+%E6%B4%9B%E6%9D%89%E7%A3%AF%E5%9C%8B%E9%9A%9B%E6%A9%9F%E5%A0%B4+(LAX)/%E7%BE%8E%E5%9C%8B+California,+Anaheim,+Disneyland+Drive,+%E8%BF%AA%E5%A3%AB%E5%B0%BC%E6%A8%82%E5%9C%92/%E7%BE%8E%E5%9C%8B%E5%8A%A0%E5%88%A9%E7%A6%8F%E5%B0%BC%E4%BA%9E%E5%AE%89%E9%82%A3%E7%BF%B0+South+Harbor+Boulevard,+%E9%98%BF%E7%B4%8D%E6%B5%B7%E5%A7%86%E5%BA%A6%E5%81%87%E6%9D%91%E5%96%9C%E4%BE%86%E7%99%BB%E5%85%AC%E5%9C%92%E9%85%92%E5%BA%97/@33.8736076,-118.3020328,11z/data=!3m2!4b1!5s0x80dcd7dda04fa4f3:0x7f98d389cfa2c1d1!4m20!4m19!1m5!1m1!1s0x80c2b0d213b24fb5:0x77a87b57698badf1!2m2!1d-118.40853!2d33.9415889!1m5!1m1!1s0x80dcd7d12b3b5e6b:0x2ef62f8418225cfa!2m2!1d-117.9189742!2d33.8120918!1m5!1m1!1s0x80dcd7dd0ad2bf23:0xd8d29eb68950f555!2m2!1d-117.915902!2d33.8011859!3e0?hl=zh-TW" target="_blank" class="btn btn-primary">地圖</a>
                                <a href="https://www.marriott.com/en-us/hotels/snaps-sheraton-park-hotel-at-the-anaheim-resort/overview/" target="_blank" class="btn btn-primary">酒店官網</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 " data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item active">
                            <h3 style="position:relative;color:#e84545;"><button class="copy-snippet">複製</button>Residence Inn by Marriott at Anaheim Resort/Convention Center</h3>
                            <div class="description">
                                <p style="position:relative"><button class="copy-snippet">複製</button> 640 West Katella Avenue, Anaheim, CA 92802, United States</p>
                            </div>
                            <div class="period-change mb-4 d-block">
                                <div class="price-wrap">
                                    <div class="price">
                                        <div>
                                            <div>US$403</div>
                                            <div>HK$3163</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-center period-wrap">
                                <div class="d-block text-left period">
                                    <div>
                                        <div>US$344房價 + US$59稅費及其他費用</div>
                                        <div>HK$2700房價 + HK$463稅費及其他費用</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;臥室 1: 2 張加大雙人床 客廳: 1 張沙發床</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;包括早餐(美式)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-check"></i>&nbsp;&nbsp;免費取消 2023 年 5 月 18 日 下午11:59 前(無需訂金－到店付款)</span>
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-van-shuttle"></i>&nbsp;&nbsp;沒有機場接駁車
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-maximize"></i>&nbsp;&nbsp;51平方米
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-square-parking"></i>&nbsp;&nbsp;付費停車(每日 US$30)
                                </li>
                                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span>
                                    <span><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;入住時間：16:00;退房時間：11:00
                                </li>
                            </ul>
                            <div>
                                <a href="https://www.booking.com/hotel/us/anaheim-jolly-roger.zh-tw.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaGKIAQGYATC4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AoH_jJ8GwAIB0gIkNmM1YWI5NDQtZjhjYS00YjRhLTllY2MtZGU3MDAwNTBlODA12AIG4AIB&sid=ea2ec099ce8e30322fd45955af422105&atlas_src=sr_iw_btn%3Bcheckin%3D2023-05-22%3Bcheckout%3D2023-05-23%3Bdest_id%3D20011324%3Bdest_type%3Dcity%3Bdist%3D0%3Bgroup_adults%3D4%3Bgroup_children%3D0%3Bhighlighted_blocks%3D29107203_246430067_4_1_0%3Bno_rooms%3D1%3Broom1%3DA%2CA%2CA%2CA%3Bsb_price_type%3Dtotal%3Btype%3Dtotal%3Bucfs%3D1&lang=zh-tw&soz=1&lang_changed=1&selected_currency=HKD#_" target="_blank" class="btn btn-primary">Booking.com</a>
                                <a href="https://www.google.com/maps/place/Residence+Inn+by+Marriott+at+Anaheim+Resort%2FConvention+Center/@33.8035962,-117.9193917,17z/data=!4m22!1m11!3m10!1s0x80dcd7dc43688063:0xde8ad4da817b72b1!2sResidence+Inn+by+Marriott+at+Anaheim+Resort%2FConvention+Center!5m4!1s2023-05-17!2i2!4m1!1i2!8m2!3d33.8027894!4d-117.9172352!3m9!1s0x80dcd7dc43688063:0xde8ad4da817b72b1!5m4!1s2023-05-17!2i2!4m1!1i2!8m2!3d33.8027894!4d-117.9172352" target="_blank" class="btn btn-primary">地圖</a>
                                <a href="https://www.marriott.com/en-us/hotels/snaar-residence-inn-at-anaheim-resort-convention-center/overview/" target="_blank" class="btn btn-primary">酒店官網</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <script>
            $(".copy-snippet").click(function() {
                let text = $(this).parent().text();
                let new_text = text.replace('複製','');
                navigator.clipboard.writeText(new_text).then(() => {
                    var el = document.createElement("div");
                    el.className = "snackbar";
                    var y = document.getElementById("snackbar-container");
                    el.style.color = 'lime';
                    el.innerHTML = '內容複製到剪貼板';
                    y.append(el);
                    el.className = "snackbar show";
                    setTimeout(function() {
                        el.className = el.className.replace("snackbar show", "snackbar");
                    }, 1500);
                }, () => {
                    var el = document.createElement("div");
                    el.className = "snackbar";
                    var y = document.getElementById("snackbar-container");
                    el.style.color = 'red';
                    el.innerHTML = '內容複製失敗';
                    y.append(el);
                    el.className = "snackbar show";
                    setTimeout(function() {
                        el.className = el.className.replace("snackbar show", "snackbar");
                    }, 1500);
                });
            });
        </script>


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
                    _0x5e196c = '旅行酒店比較\x20--\x20一號房',
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
        <script type="text/javascript" src="../js/table/dt-1.10.25datatables.min.js"></script>
        <!--  <script src="../js/dashboard/chartjs.min.js"></script> -->
        <script src="../js/flight/flight.js"></script>
        <!-- Search Airport Plugins -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.1/lodash.min.js' defer></script>
        <script src='https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js' defer></script>
        <script src='https://screenfeedcontent.blob.core.windows.net/html/airports.js' defer></script>
        <script src="../js/flight/search_flight.js" defer></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </span>
</body>

</html>