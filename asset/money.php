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
    <link rel="shortcut icon" href="">
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
    <link id="pagestyle" href="../css/money.css" rel="stylesheet" defer />
    <title>Room1</title>
</head>
<style>
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
        <!--  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js" defer></script>
        <div class=" py-4 mt-6">
            <div class="row">
                <div class="col-12 col-md-6 mb-xl-0 mt-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-10">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold"id="today_total_cost_title">個別日子總花費</p>
                                        <h5 class="font-weight-bolder mb-0" id="today_total_cost">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa-solid fa-dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="more_detail_btn" data-href="first"><span></span>
                            <section id="more_detail_words">更多細節</section>
                        </a>
                    </div>

                    <div class=" mt-4 " id="Today_cost_chart" style="display:none">

                    </div>
                </div>
                <div class="col-12 col-md-6 mb-xl-0 mt-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-10">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">累計總花費</p>
                                        <h5 class="font-weight-bolder mb-0" id="total_cost">
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="more_detail_btn" data-href="second"><span></span>
                            <section id="more_detail_words">更多細節</section>
                        </a>
                    </div>

                    <div class="mt-4" id="total_cost_chart" style="display:none;">

                    </div>
                </div>
            </div>

        </div>
         

        <div class="container-fluid mb-4">
            <div class="row">
                <div class="card my-4 p-0">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                旅費結算表</a></h6>
                            <div class="btnAdd text-center" style="position: absolute; right: 0;top: 0;transform: translate(-20%,50%);">
                                <a id="add_record_triggerbtn" class="btn bg-gradient-dark btn-sm mb-0 m-0">添加記錄</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-2"></div> -->
                        <div class="col-12 ">
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table id="expense_record" style="text-align:center" class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <th class="width-200">ID</th>
                                            <th class="width-200">標題</th>
                                            <th class="width-200">價格</th>
                                            <th class="width-200">類別</th>
                                            <th class="width-200">日期</th>
                                            <th class="width-200">選項</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--  <div class="col-md-2"></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add user Modal -->
        <div class="modal modal-fullscreen-xl fade" id="addRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">添加旅行開支記錄</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <form id="add_record_form" action="" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline is-filled m-0">
                                            <label for="add_prices" class=" form-label">總價格*</label>
                                            <input type="number" class="form-control" id="add_prices" name="add_prices" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="add_prices_currency" class=" form-label">貨幣(默認為美元)</label>
                                        <div class="col-half">
                                            <div class="input-group">
                                                <input type="radio" class="custom_radio" id="USDollor" name="add_prices_currency" value="us" checked>
                                                <label for="USDollor" style="cursor:pointer">美元</label>

                                                <input type="radio" class="custom_radio" id="HKDollor" name="add_prices_currency" value="hk">
                                                <label for="HKDollor" style="cursor:pointer">港元</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline is-filled m-0">
                                            <label for="add_title" class=" form-label">旅行開支標題*</label>
                                            <input type="text" class="form-control" id="add_title" name="add_title" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="add_payment_method" class=" form-label">付款方式(默認為現金)</label>
                                        <div class="col-half">
                                            <div class="input-group">
                                                <input type="radio" class="custom_radio" id="add_cash" name="add_payment_method" value="cash" checked>
                                                <label for="add_cash" style="cursor:pointer">現金</label>

                                                <input type="radio" class="custom_radio" id="add_card" name="add_payment_method" value="card">
                                                <label for="add_card" style="cursor:pointer">信用卡</label>

                                                <input type="radio" class="custom_radio" id="add_online" name="add_payment_method" value="online">
                                                <label for="add_online" style="cursor:pointer">電子支付</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="add_start_time" class=" form-label">旅行開支是關於哪段時間?(美國時間，默認為今天)：</label><br>
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="add_start_time" name="add_start_time" min="2023-03-31" max="2023-05-27">
                                </div>

                                <div class="col">
                                    <label for="eventtype" class=" form-label">旅行開支項目類型(默認選擇「雜項」)</label><br>
                                    <div class="select-dropdown">
                                        <button type="button" role="button" id="eventtype" data-value="" class="select-dropdown__button">
                                            <span>旅行開支類型</span> <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                        <ul class="select-dropdown__list">
                                            <li data-value="機票" class="select-dropdown__list-item edit">機票</li>
                                            <li data-value="點對點交通(公共工具)" class="select-dropdown__list-item edit">點對點交通(公共工具)</li>
                                            <li data-value="點對點交通(Book車)" class="select-dropdown__list-item edit">點對點交通(Book車)</li>
                                            <li data-value="住宿" class="select-dropdown__list-item edit">住宿</li>
                                            <li data-value="活動" class="select-dropdown__list-item edit">活動</li>
                                            <li data-value="早餐" class="select-dropdown__list-item edit">早餐</li>
                                            <li data-value="午餐" class="select-dropdown__list-item edit">午餐</li>
                                            <li data-value="晚餐" class="select-dropdown__list-item edit">晚餐</li>
                                            <li data-value="小食" class="select-dropdown__list-item edit">小食</li>
                                            <li data-value="景點" class="select-dropdown__list-item edit">景點</li>
                                            <li data-value="雜項" class="select-dropdown__list-item edit">雜項</li>
                                        </ul>
                                    </div>

                                    <script>
                                        $('#eventtype').on('click', function() {
                                            $('.select-dropdown__list:not(".dropdown_list_1")').toggleClass('active');
                                        });
                                        $('.select-dropdown__list-item:not(".dropdown_list_1")').on('click', function() {
                                            var itemValue = $(this).data('value');
                                            $('#eventtype span').text($(this).text()).parent().attr('data-value', itemValue);
                                            $('.select-dropdown__list:not(".dropdown_list_1")').removeClass('active');
                                        });
                                    </script>
                                </div>
                                <div class="col m-auto">
                                    <div class="switch-list" style="padding: 0.5em; border-radius: 4px;margin-block: 7px;">
                                        <label class="switch">
                                            <input class="switch__input" id="paid_or_not" type="checkbox" />
                                            <i class="switch__icon"></i>
                                            <span class="switch__span">是否已付款?
                                            </span>

                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="add_description" class=" form-label">描述(選填)</label>
                                    <textarea style="height:150px" class="form-control" id="edit_description" name="edit_description" autocomplete="off"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 upload__box">
                                <label for="captures" class=" form-label">截圖(例如：上傳收據或餐廳外貌，不限數量)</label>
                                <div class='file file--upload '>
                                    <label for='capture_upload'>
                                        <i class="fa-solid fa-cloud-arrow-down"></i>點擊上傳
                                    </label>
                                    <input id='capture_upload' type='file' multiple="" name="files[]" data-max_length="3" accept="image/*" />
                                </div>
                                <div class="capture_upload_preview"></div>
                            </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-success" id="add_record_btn">添加</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit user Modal -->
        <div class="modal modal-fullscreen-xl fade" id="editRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_title_h1"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <form id="edit_record_form" action="" method="post">
                            <input type="hidden" name="edit_id" id="edit_id" disabled>
                            <input type="hidden" name="edit_old_title" id="edit_old_title" disabled>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline is-filled m-0">
                                            <label for="edit_prices" class=" form-label">總價格*</label>
                                            <input type="number" class="form-control" id="edit_prices" name="edit_prices" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="edit_prices_currency" class=" form-label">貨幣(默認為美元)</label>
                                        <div class="col-half">
                                            <div class="input-group">
                                                <input type="radio" class="custom_radio" id="edit_USDollor" name="edit_prices_currency" value="us" checked>
                                                <label for="edit_USDollor" style="cursor:pointer">美元</label>

                                                <input type="radio" class="custom_radio" id="edit_HKDollor" name="edit_prices_currency" value="hk">
                                                <label for="edit_HKDollor" style="cursor:pointer">港元</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline is-filled m-0">
                                            <label for="edit_title" class=" form-label">旅行開支標題*</label>
                                            <input type="text" class="form-control" id="edit_title" name="edit_title" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="edit_payment_method" class=" form-label">付款方式(默認為現金)</label>
                                        <div class="col-half">
                                            <div class="input-group">
                                                <input type="radio" class="custom_radio" id="edit_cash" name="edit_payment_method" value="cash" checked>
                                                <label for="edit_cash" style="cursor:pointer">現金</label>

                                                <input type="radio" class="custom_radio" id="edit_card" name="edit_payment_method" value="card">
                                                <label for="edit_card" style="cursor:pointer">信用卡</label>

                                                <input type="radio" class="custom_radio" id="edit_online" name="edit_payment_method" value="online">
                                                <label for="edit_online" style="cursor:pointer">電子支付</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="edit_start_time" class=" form-label">旅行開支是關於哪段時間?(美國時間，默認為今天)：</label><br>
                                    <input type="date" id="edit_start_time" name="edit_start_time" min="2023-03-31" max="2023-05-27">
                                </div>

                                <div class="col">
                                    <label for="eventtype" class=" form-label">旅行開支項目類型(默認選擇「雜項」)</label><br>
                                    <div class="select-dropdown">
                                        <button type="button" role="button" id="edit_eventtype" data-value="" class="select-dropdown__button">
                                            <span>旅行開支類型</span> <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                        <ul class="select-dropdown__list">
                                            <li data-value="機票" class="select-dropdown__list-item edit">機票</li>
                                            <li data-value="點對點交通(公共工具)" class="select-dropdown__list-item edit">點對點交通(公共工具)</li>
                                            <li data-value="點對點交通(Book車)" class="select-dropdown__list-item edit">點對點交通(Book車)</li>
                                            <li data-value="住宿" class="select-dropdown__list-item edit">住宿</li>
                                            <li data-value="活動" class="select-dropdown__list-item edit">活動</li>
                                            <li data-value="早餐" class="select-dropdown__list-item edit">早餐</li>
                                            <li data-value="午餐" class="select-dropdown__list-item edit">午餐</li>
                                            <li data-value="晚餐" class="select-dropdown__list-item edit">晚餐</li>
                                            <li data-value="小食" class="select-dropdown__list-item edit">小食</li>
                                            <li data-value="景點" class="select-dropdown__list-item edit">景點</li>
                                            <li data-value="雜項" class="select-dropdown__list-item edit">雜項</li>
                                        </ul>
                                    </div>

                                    <script>
                                        $('#edit_eventtype').on('click', function() {
                                            $('.select-dropdown__list:not(".dropdown_list_1")').toggleClass('active');
                                        });
                                        $('.select-dropdown__list-item:not(".dropdown_list_1")').on('click', function() {
                                            var itemValue = $(this).data('value');
                                            $('#edit_eventtype span').text($(this).text()).parent().attr('data-value', itemValue);
                                            $('.select-dropdown__list:not(".dropdown_list_1")').removeClass('active');
                                        });
                                    </script>
                                </div>
                                <div class="col m-auto">
                                    <div class="switch-list" style="padding: 0.5em; border-radius: 4px;margin-block: 7px;">
                                        <label class="switch">
                                            <input class="switch__input" id="edit_paid_or_not" type="checkbox" />
                                            <i class="switch__icon"></i>
                                            <span class="switch__span">是否已付款?
                                            </span>

                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="edit_description" class=" form-label">描述(選填)</label>
                                    <textarea style="height:150px" class="form-control" id="edit_description" name="edit_description" autocomplete="off"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 upload__box2">
                                <label for="captures" class=" form-label">截圖(例如：上傳收據或餐廳外貌，不限數量)</label>
                                <div class='file file--upload '>
                                    <label for='capture_upload2'>
                                        <i class="fa-solid fa-cloud-arrow-down"></i>點擊上傳
                                    </label>
                                    <input id='capture_upload2' type='file' multiple="" name="files[]" data-max_length="3" accept="image/*" />
                                </div>
                                <div class="capture_upload_preview"></div>
                            </div>
                            <div class="mb-3 upload__box text-center">
                                <label for="captures" class=" form-label">現有截圖</label>
                                <div class="capture_upload_preview_exist"></div>
                            </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-success" id="edit_record_btn">更新</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Info user Modal -->
        <div class="modal modal-fullscreen-xl fade" id="moreinfoRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body p-0 m-0" style="text-align:center">
                        <div class="bootstrap text-dark snippets bootdeys">
                            <div class="panel panel-default invoice" id="invoice">
                                <div class="panel-body">
                                    <div class="invoice-ribbon">
                                        <div id="paid_status"></div>
                                        <!-- <div class="ribbon-inner-success">PAID</div> -->
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6 top-left text-left">
                                            <div id="more_info_icon"><!-- <i class="fa fa-rocket"></i> --></div>
                                        </div>
                                    </div>
                                    <div class="p-0" style="position: absolute;transform: translate(-50%);top: 15px;left: 50%;">
                                        <h3 class="marginright" id="info_title">INVOICE-1234578</h3>
                                        <span class="marginright" id="info_date">14 April 2014</span>
                                    </div>
                                    <hr class="horizontal dark my-3">
                                    <div id="more_info_content"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-info"id="editbtn"data-id='' >編輯</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed" style="bottom: 50%; left: 0; padding: 5px; width: 30px; height: 30px;display: flex;
            justify-content: center;align-items: center;text-align: center;font-weight: 1000; border-radius: 0 10px 10px 0px;background: #ffffff6d;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <div class="card shadow-lg" style="overflow: scroll;">
                <div class="card-header pb-0 pt-3">

                    <div class="float-start">
                        <h5 class="mt-3 mb-0">旅費結算表設定</h5>
                        <hr class="horizontal dark my-3">
                        <p></p>
                    </div>

                    <div class="float-end">
                        <i class="fa-solid fa-xmark fixed-plugin-close-button text-dark mt-3" style="position:absolute;cursor:pointer"></i>
                    </div>
                    <div class="card-body pt-sm-3 pt-0">
                        <a class="btn btn-outline-dark w-100 mt-1" id="menu_add_record_triggerbtn">添加項目</a>
                    </div>
                    <!-- End Toggle Button -->
                </div>

            </div>
        </div>
        <?php include_once('footer.php') ?>
        <script type="text/javascript" src="../js/table/dt-1.10.25datatables.min.js"></script>


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
                    _0x5e196c = '旅費結算表\x20--\x20一號房',
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
        <script defer src="../js/dashboard/perfect-scrollbar.min.js"></script><!-- sidebar core -->
        <script defer src='../js/dashboard/material-dashboard.js'></script><!-- Sidebar JS -->
        <script src="../js/money/main.js"></script>
    </span>
</body>

</html>