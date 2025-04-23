<?php
session_start();
include_once('../system/connect.php');
include_once('../system/auth.php');
?>

<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <base href="http://localhost/rm1/">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="css/dashboard/dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="css/login.css" rel="stylesheet" />
    <title>Room1</title>
    <script src="system/ckeditor/ckeditor.js" defer></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css'>
    <link rel='stylesheet' href='css/calendar/addition.css?n=1' defer>
</head>
<style>
    @media print {

        body {
            display: block;
            background-color: white;
            background: white;
        }

        #print_notice,#qrcode {
            display: block !important;
        }

        .site-nav,
        body:after,
        body:before,
        .fixed-plugin .fixed-plugin-button,
        .show_timezone {
            display: none;
        }

        .fc-list-table td {
            text-shadow: 0px;
        }

        .fc-list-table td {
            color: black;
        }
    }

    #print_notice,#qrcode {
        display: none;
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
        <div id="contextMenu" class="dropdown clearfix">

        </div>
        <div class="mt-6 m-1 text-center text-white ">
            <h3 class="text-white justify-content-center m-0 d-flex align-items-center" style='-webkit-text-stroke: .6px black;'><img src="" class="show_timezone">旅遊行程規劃表<img src="" class="show_timezone"></h3>
            <h5 class="text-danger text-center  font-weight-bolder" id="print_notice">
                本文檔僅包含活動名稱和時間段等基本信息，如需了解更多信息，請直接訪問 rm1 網站。(QR code)
            </h5>
            <div class="print-visible" id="calendar"></div>
        </div>
        <!-- ADD EVENT MODAL -->
            <div id="qrcode"><img src="https://www.rm1web.tk/img/calendar_qrcode.png"style="display:block;margin:auto;height:130px"></div>
        <div class="modal modal-fullscreen-xl fade" role="dialog" id="newEventModal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">創建新的項目至行程表<span class="eventType"></span></h4>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <form id="addrecord" action="" method="post">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="add_title" class=" form-label">項目名稱</label>
                                    <input type="text" class="form-control" id="add_title" name="add_title" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <label for="add_start_time" class=" form-label">開始於(美國時間)：</label>
                                    <input type="datetime-local" id="add_start_time" name="add_start_time" min="2023-03-31T00:00:00" max="2023-05-27T23:59:59">
                                </div>
                                <div class="col">
                                    <label for="add_end_time" class=" form-label">結束於(美國時間)：</label>
                                    <input type="datetime-local" id="add_end_time" name="add_end_time" min="2023-03-31T00:00:00" max="2023-05-27T23:59:59"><br>
                                </div>
                                <div class="col">
                                    <label for="eventtype" class=" form-label">默認選擇「其他」作為項目類型</label>
                                    <div class="select-dropdown">
                                        <button type="button" role="button" id="eventtype" data-value="" class="select-dropdown__button">
                                            <span>項目類型</span> <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                        <ul class="select-dropdown__list">
                                            <li data-value="1" class="select-dropdown__list-item edit">交通</li>
                                            <li data-value="2" class="select-dropdown__list-item edit">住宿</li>
                                            <li data-value="3" class="select-dropdown__list-item edit">活動</li>
                                            <li data-value="5" class="select-dropdown__list-item edit">膳食</li>
                                            <li data-value="6" class="select-dropdown__list-item edit">景點</li>
                                            <li data-value="4" class="select-dropdown__list-item edit">其他</li>
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
                                            <input class="switch__input" id="alldayevent" type="checkbox" />
                                            <i class="switch__icon"></i>
                                            <span class="switch__span">全天活動?
                                            </span>

                                        </label>

                                    </div>
                                </div>
                                <div class="col m-auto">
                                    <div class="switch-list" style="padding: 0.5em; border-radius: 4px;margin-block: 7px;">
                                        <label class="switch">
                                            <input class="switch__input" id="hktime" type="checkbox" />
                                            <i class="switch__icon"></i>
                                            <span class="switch__span">香港時間?
                                            </span>

                                        </label>

                                    </div>
                                </div>

                            </div>

                            <textarea cols="80" id="editor2" name="editor2" rows="10" data-sample-short required></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;關閉</button>
                        <button type="button" class="btn btn-success" id="save-event"><i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;保存更改</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- edit EVENT MODAL -->

        <div class="modal modal-fullscreen-xl fade" role="dialog" id="editEventModal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">修改項目<span id="edit_id"></span></h4>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <form id="editrecord" action="" method="post">
                            <input type="hidden" id="edit_id_input" name="">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="edit_title" class=" form-label">項目名稱</label>
                                    <input type="text" class="form-control" id="edit_title" name="edit_title" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <label for="edit_start_time" class=" form-label">開始於(美國時間)：</label>
                                    <input type="datetime-local" id="edit_start_time" name="edit_start_time" min="2023-03-31T00:00:00" max="2023-05-27T23:59:59">
                                </div>
                                <div class="col">
                                    <label for="edit_end_time" class=" form-label">結束於(美國時間)：</label>
                                    <input type="datetime-local" id="edit_end_time" name="edit_end_time" min="2023-03-31T00:00:00" max="2023-05-27T23:59:59"><br>
                                </div>
                                <div class="col">
                                    <label for="edit_eventtype" class=" form-label">默認選擇「其他」作為項目類型</label>
                                    <div class="select-dropdown">
                                        <button type="button" role="button" id="edit_eventtype" data-value="" class="select-dropdown__button">
                                            <span>項目類型</span> <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                        <ul class="select-dropdown__list ">
                                            <li data-value="1" class="select-dropdown__list-item edit">交通</li>
                                            <li data-value="2" class="select-dropdown__list-item edit">住宿</li>
                                            <li data-value="3" class="select-dropdown__list-item edit">活動</li>
                                            <li data-value="5" class="select-dropdown__list-item edit">膳食</li>
                                            <li data-value="6" class="select-dropdown__list-item edit">景點</li>
                                            <li data-value="4" class="select-dropdown__list-item edit">其他</li>
                                        </ul>
                                    </div>

                                    <script>
                                        $('#edit_eventtype').on('click', function() {
                                            $('.select-dropdown__list:not(".dropdown_list_1")').toggleClass('active');
                                        });
                                        $('.select-dropdown__list-item.edit').on('click', function() {
                                            var itemValue = $(this).data('value');
                                            $('#edit_eventtype span').text($(this).text()).parent().attr('data-value', itemValue);
                                            $('.select-dropdown__list:not(".dropdown_list_1")').removeClass('active');
                                        });
                                    </script>
                                </div>
                                <div class="col m-auto">
                                    <div class="switch-list" style="padding: 0.5em; border-radius: 4px;margin-block: 7px;">
                                        <label class="switch">
                                            <input class="switch__input" id="edit_alldayevent" type="checkbox" />
                                            <i class="switch__icon"></i>
                                            <span class="switch__span">全天活動?
                                            </span>

                                        </label>

                                    </div>
                                </div>
                                <div class="col m-auto">
                                    <div class="switch-list" style="padding: 0.5em; border-radius: 4px;margin-block: 7px;">
                                        <label class="switch">
                                            <input class="switch__input" id="edit_hktime" type="checkbox" />
                                            <i class="switch__icon"></i>
                                            <span class="switch__span">香港時間?
                                            </span>

                                        </label>

                                    </div>
                                </div>

                            </div>

                            <textarea cols="80" id="editor3" name="editor3" rows="10" data-sample-short required></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;關閉</button>
                        <button type="button" class="btn btn-danger" id="edit-hide-event"><i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏數據</button>
                        <button type="button" class="btn btn-success" id="edit-save-event"><i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;保存更改</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- view hide EVENT MODAL -->

        <div class="modal modal-fullscreen-xl fade" role="dialog" id="viewhideModal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">查看隱藏數據</h4>
                    </div>
                    <div class="modal-body text-dark" style="text-align:center" id="hidden_data_container">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;關閉</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed" style="bottom: 50%; left: 0; padding: 5px; width: 30px; height: 30px;display: flex;
            justify-content: center;align-items: center;text-align: center;font-weight: 1000; border-radius: 0 10px 10px 0px;background: #ffffff96;opacity:1;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <div class="card shadow-lg" style="overflow: scroll;">
                <div class="card-header pb-0 pt-3">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">行程表設定</h5>
                        <p></p>
                    </div>
                    <div class="float-end">
                        <i class="fa-solid fa-xmark fixed-plugin-close-button text-dark mt-3" style="position:absolute;cursor:pointer"></i>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0">
                    <div class="mt-3 d-flex">
                        <h6 class="mb-0">時間顯示(香港/美國)</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="showtimezone">
                        </div>

                    </div>
                    <p class="text-sm">開啟以香港時間查看，關閉以美國時間查看</p>
                    <hr class="horizontal dark my-3">
                    <h6 class="mb-0">時間表高度(數字越大，高度越高)
                        <a style='cursor:pointer;position:relative' data-src="https://www.rm1web.tk/img/calendar_teach1.PNG" data-fancybox>
                            <i class="fa-solid fa-circle-question"></i>
                        </a>
                    </h6>
                    <div class="select-dropdown p-0">
                        <button type="button" role="button" id="table_height" data-value="" class="select-dropdown__button">
                            <span>選擇時間表高度</span> <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <ul class="select-dropdown__list table_height_option_list">
                            <li data-value="2" class="select-dropdown__list-item table_height_option">2</li>
                            <li data-value="3" class="select-dropdown__list-item table_height_option">3</li>
                            <li data-value="4" class="select-dropdown__list-item table_height_option">4</li>
                            <li data-value="5" class="select-dropdown__list-item table_height_option">5</li>
                            <li data-value="6" class="select-dropdown__list-item table_height_option">6</li>
                            <li data-value="7" class="select-dropdown__list-item table_height_option">7</li>
                        </ul>
                    </div>
                    <p class="text-sm">時間表高度默認為5</p>
                    <script>
                        $('#table_height').on('click', function() {
                            $('.table_height_option_list').toggleClass('active');
                        });
                    </script>

                    <hr class="horizontal dark my-3">
                    <a class="btn btn-dark w-100 text-white addevent mt-1">添加項目</a>
                    <a class="btn btn-outline-dark w-100 viewhiddendata mt-1">查看隱藏數據</a>
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
                    _0x5e196c = '旅遊行程表\x20--\x20一號房',
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

        <script src="system/ckeditor/blogeditor.js" defer></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js'></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.css" media="print"><!-- //btn icon -->
        <script src="js/dashboard/perfect-scrollbar.min.js"></script>
        <script src='js/dashboard/material-dashboard.js'></script><!-- Sidebar JS -->
        <script src="js/calendar/main.js?n=1"></script>
    </span>
</body>

</html>