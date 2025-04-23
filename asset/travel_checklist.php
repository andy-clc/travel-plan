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
    <link rel="stylesheet" defer href="../css/bootstrap.min.css">
    <link rel="stylesheet" defer href="../css/owl.carousel.min.css">
    <link rel="stylesheet" defer href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" defer href="../fonts/icomoon/style.css">
    <link rel="stylesheet" defer href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" defer href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" defer href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Font-awesome CDN -->
    <link defer href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!-- additional css -->
    <link defer id="pagestyle" href="../css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link defer id="pagestyle" href="../css/dashboard/dashboard.css" rel="stylesheet" />
    <link defer id="pagestyle" href="../css/checklist.css" rel="stylesheet" />
    <title>Room1</title>
</head>
<style>
    #total_item {
        position: absolute;
        bottom: -15px;
        color: var(--light);
        font-weight: 1000;
        z-index: 1;
        left: 10px;
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
        <div class="todoList mt-6 text-dark">
            <div class="searchInputWrapper">
                <input class="searchInput" id="search_bar" type="text" placeholder='搜索物品名稱'>
                <i class="searchInputIcon fa fa-search" id="search_bar_btn"></i>
                </input>
            </div>
            <div class="cover-img">
                <div class="cover-inner">
                    <h3>${default}</h3>
                    <h6>${default}</h6>
                    <p id="total_item"></p>
                    <div class="select-dropdown" style="padding-bottom: 0;padding-bottom: 0; z-index: 2;position: absolute;bottom: 5px;right: 8px;">
                        <button type="button" role="button" style="margin-block:0;padding:0.1rem 0 0.1rem 0.5rem" id="choose_baggage_no" data-psw="" data-value="" class="select-dropdown__button edit">
                            <span>選擇行李號碼</span> <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <ul class="select-dropdown__list " id="choose_baggage_no_dropdown_list">
                            <li data-value=" " class="select-dropdown__list-item choose_baggage_no_dropdown_list_item">全部顯示</li>
                            <li data-value="1️⃣" class="select-dropdown__list-item choose_baggage_no_dropdown_list_item">只顯示行李1️⃣</li>
                            <li data-value="2️⃣" class="select-dropdown__list-item choose_baggage_no_dropdown_list_item">只顯示行李2️⃣</li>
                            <li data-value="3️⃣" class="select-dropdown__list-item choose_baggage_no_dropdown_list_item">只顯示行李3️⃣</li>
                            <li data-value="4️⃣" class="select-dropdown__list-item choose_baggage_no_dropdown_list_item">只顯示行李4️⃣</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pulldown main_menu">
                <i class="fa-solid fa-ellipsis-vertical pulldown-toggle" style="background:none;border: none;"></i>
                <div class="pulldown-menu" style="left:40px" data-index="${id}">
                    <ul>
                        <li style="margin-top: 5px;">
                            <i class="fa-solid fa-pen-to-square mainmenu_edit w-100" data-id="${id}">&nbsp;編輯列表</i>
                        </li>
                        <li><i class="fa-solid fa-gears mainmenu_reset w-100" data-id="${id}">&#8198;重置數據</i>
                        </li>
                        <li>
                            <i class="fa-solid fa-trash mainmenu_delete w-100" data-id="${id}">&nbsp;刪除列表</i>
                        </li>
                        <li>
                            <i class="fa-solid fa-share-nodes mainmenu_share w-100">&nbsp;分享列表</i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <input type="hidden" name="list_related_id" id="list_related_id" value="test">
                <div class="todo_content">
                    <div class=" align-items-center stickly">
                        <p class="" style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">電子產品<span class="text-sm" id="total_li_1"></span></p>
                        <div class="  text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul1" data-type="電子產品" data-eg="充電器*2、Type-C充電線*3">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul1"></ul>
                    <div class=" align-items-center stickly">
                        <p style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">衣物<span class="text-sm" id="total_li_2"></span></p>
                        <div class="text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul2" data-type="衣物" data-eg="褲*10、襪*15">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul2"> </ul>
                    <div class=" align-items-center stickly">
                        <p class="" style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">清潔用品<span class="text-sm" id="total_li_3"></span></p>
                        <div class="  text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul3" data-type="清潔用品" data-eg="牙刷*2、濕紙巾*15">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul3"></ul>
                    <div class=" align-items-center stickly">
                        <p class="" style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">文件<span class="text-sm" id="total_li_4"></span></p>
                        <div class="  text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul4" data-type="文件" data-eg="個人證件*1、身份證*1">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul4"></ul>
                    <div class=" align-items-center stickly">
                        <p class="" style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">健康<span class="text-sm" id="total_li_5"></span></p>
                        <div class="  text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul5" data-type="健康" data-eg="藥物*10、防疫用品*2">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul5"></ul>
                    <div class=" align-items-center stickly">
                        <p class="" style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">一般用品<span class="text-sm" id="total_li_6"></span></p>
                        <div class="  text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul6" data-type="一般用品" data-eg="空水樽*1、雨傘*1">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul6"> </ul>
                    <div class=" align-items-center stickly">
                        <p class="" style="font-weight:1000;margin:0;width: 90%;margin-left: 5px;">食物<span class="text-sm" id="total_li_7"></span></p>
                        <div class=" text-right" style="position:absolute;top:0;right:10px;">
                            <i class="fas fa-plus add_button" data-ul="ul7" data-type="食物" data-eg="杯麵*5、糖*10">添加</i>
                        </div>
                        <hr class="todos_hr">
                    </div>
                    <ul class="todos" id="ul7"> </ul>
                </div>
            </div>
        </div>

        <div class="modal modal-fullscreen-xl fade" id="editlist_modal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editlist_modal_title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-dark font-weight-bolder text-center" id="editlist_modal_content">


                    </div>
                    <div class="modal-footer text-center justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-success editlist_confirm_btn">保存更改</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-fullscreen-xl fade" id="edit_modal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_modal_title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-dark font-weight-bolder text-center" id="edit_modal_content">


                    </div>
                    <div class="modal-footer text-center justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-success edit_confirm_btn">保存更改</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-fullscreen-xl fade" id="select_list_modal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body text-dark font-weight-bolder text-center" id="select_list_modal_content">


                    </div>
                    <div class="modal-footer text-center justify-content-center" id="select_list_modal_footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="reset_list_modal" class="modal modal-fullscreen-xl fade">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column text-left">
                        <h4 class="modal-title w-100">重置清單所有數據</h4>
                        <h6 class="w-100"><i class="fa-solid fa-circle-info"></i>&nbsp;&nbsp;重置清單是指讓每一數據都由已完成變為未完成，以便清單可以重複使用</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-dark font-weight-bolder">
                        <h6>清單名稱：<span id="reset_list_item"></span></h6>
                        <div class="reset_data"></div>
                        <div class="row">
                            <div class="col-3 m-0 p-0">
                                <h6 class="mb-0">詳細記錄</h6>
                            </div>
                            <div class="col-9 d-flex justify-content-end align-items-center text-dark">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small id="reset_total_amount"></small>
                            </div>
                        </div>
                        <div class=" border-radius-lg">
                            <div class="row">
                                <div class="col-6 col-sm-6  py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-mobile-screen"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">電子產品</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_1"></h4>
                                </div>
                                <div class="col-6 col-sm-6 py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-shirt"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">衣物</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_2"></h4>
                                </div>
                                <div class="col-6 col-sm-6  py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-broom"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">清潔用品</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_3"></h4>
                                </div>
                                <div class="col-6 col-sm-6 py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-file"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">文件</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_4"></h4>
                                </div>
                                <div class="col-6 col-sm-6  py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-dark text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-heart-pulse"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">健康</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_5"></h4>
                                </div>
                                <div class="col-6 col-sm-6  py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-success text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-circle-info"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">一般用品</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_6"></h4>
                                </div>
                                <div class="col-6 col-sm-6 py-1 ps-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-shape icon-sm shadow border-radius-md bg-gradient-secondary text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-burger"></i>
                                        </div>
                                        <p class="text-xs mt-1 mb-0 font-weight-bold">食物</p>
                                    </div>
                                    <h4 class="font-weight-bolder" id="reset_7"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-success reset_confirm" data-id>重置</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete whole list Modal -->
        <div id="delete_list_confirm_modal" class="modal modal-fullscreen-xl fade">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100">確認刪除?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-dark font-weight-bolder">
                        <h5>您確定要刪除整個清單嗎？一旦你點擊刪除按鈕，將無法復原數據。</p>
                            <p>清單名稱：<span id="delete_checklist_name"></span></p>
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="delete_checklist_psw" class=" form-label">請輸入密碼以刪除*</label>
                                    <input type="text" class="form-control" id="delete_checklist_psw" name="delete_checklist_psw" value="" autocomplete="off">
                                </div>
                            </div>
                            <p class="text-sm">如果清單本身沒有設置密碼，留空即可</p>

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-danger deletelist__confirm" data-id>刪除</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete_confirm_modal" class="modal modal-fullscreen-xl fade">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100">確認刪除?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-dark font-weight-bolder">
                        <h5>你確定要從清單中刪除這個項目嗎？ 一經確定將無法復原數據。</h5>
                        <p>項目：<span id="delete_item"></span></p>
                        <div class="d-flex">
                            <h6 class="mb-0">刪除項目前顯示警告框？</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="show_delete_modal1">
                            </div>
                        </div>
                        <p class="text-sm">開啟以顯示警告框，關閉以隱藏警告框</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-danger delete_confirm" data-id>刪除</button>
                    </div>
                </div>
            </div>
        </div>

        <!--More Info Modal -->
        <div id="more_info__modal" class="modal  modal-fullscreen-xl fade">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100">更多資訊</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-dark font-weight-bolder modal_more_info_content">

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
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
                        <h5 class="mt-3 mb-0">行李清單選擇</h5>
                        <p></p>
                    </div>
                    <div class="float-end">
                        <i class="fa-solid fa-xmark fixed-plugin-close-button text-dark mt-3" style="position:absolute;cursor:pointer"></i>
                    </div>
                    <hr class="horizontal dark my-3">
                    <!-- End Toggle Button -->
                </div>
                <div class="card-body pt-sm-3 pt-0">
                    <div class="d-flex">
                        <h6 class="mb-0">刪除項目前顯示警告框？</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="show_delete_modal">
                        </div>
                    </div>
                    <p class="text-sm">開啟以顯示警告框，關閉以隱藏警告框</p>
                    <hr class="horizontal dark my-3">
                    <p class="text-sm">當前選擇的清單：<span id="show_list_name"></span>
                    <p id="list_current"></p>
                    </p>
                    <a class="btn btn-dark w-100 text-white sidebar_share mt-1"><i class="fa-solid fa-share-nodes"></i>&nbsp;&nbsp;分享清單</a>
                    <a class="btn btn-outline-dark w-100 chooselist mt-1"><i class="fa-solid fa-arrow-pointer"></i>&nbsp;&nbsp;選擇清單</a>
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
                    _0x5e196c = '旅行清單\x20--\x20一號房',
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
        <script defer src="../js/dashboard/perfect-scrollbar.min.js"></script><!-- sidebar core -->
        <script defer src='../js/dashboard/material-dashboard.js'></script><!-- Sidebar JS -->
        <script defer src='../js/checklist/main.js' defer></script><!-- checklist JS -->
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