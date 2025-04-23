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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="css/dashboard/dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="css/hotel.css" rel="stylesheet" />
    <title>Room1</title>
</head>
<style>
    .wrapper {
        width: 370px;
        padding: 30px;
        border-radius: 7px;
        box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.05);
    }

    .wrapper header {
        font-size: 28px;
        font-weight: 500;
        text-align: center;
    }

    .wrapper form {
        margin: 40px 0 20px 0;
    }

    form :where(input, select, button) {
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: none;
    }

    form p {
        font-size: 18px;
        margin-bottom: 5px;
    }

    form input {
        height: 50px;
        font-size: 17px;
        padding: 0 15px;
        border: 1px solid #999;
    }

    form input:focus {
        padding: 0 14px;
        border: 2px solid #675AFE;
    }

    form .drop-list {
        display: flex;
        margin-top: 20px;
        align-items: center;
        justify-content: space-between;
    }

    .drop-list .select-box {
        display: flex;
        width: 115px;
        height: 45px;
        align-items: center;
        border-radius: 0.375rem;
        justify-content: center;
        border: 2px solid #ed5f5e;
    }

    .select-box img {
        max-width: 21px;
    }

    .select-box select {
        width: auto;
        font-size: 16px;
        background: none;
        margin: 0 -5px 0 5px;
        color: #fff;
    }

    .select-box select::-webkit-scrollbar {
        width: 8px;
    }

    .select-box select::-webkit-scrollbar-track {
        background: #fff;
    }

    .select-box select::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 8px;
        border-right: 2px solid #ffffff;
    }

    .drop-list .change_icon {
        cursor: pointer;
        margin-top: 30px;
        font-size: 22px;
    }

    form .exchange-rate {
        font-size: 28px;
        text-align: center;
        margin: 20px 0 30px;
        font-weight: 1000;
        text-shadow: 0 1px black, 1px 0 0 #f44336;
    }

    form button {
        height: 52px;
        color: #fff;
        font-size: 30px;
        cursor: pointer;
        background: #df6f6d;
        opacity: 1;
        font-weight: 1000;
        transition: 0.3s ease;
    }

    form button:hover {
        background: #f44336;
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
    .select-box select option {
    color: black;
    font-weight: 1000;
}
</style>

<body class="homepage_slider" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
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

        <div class="wrapper mt-7">
            <header>貨幣轉換器</header>
            <form action="#">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline is-filled">
                        <label for="add_title" class=" form-label">輸入數量</label>
                        <input type="text" class="form-control" id="add_title" name="add_title" autocomplete="off" style="color:#fff;font-weight:1000">
                    </div>
                </div>
                <div class="drop-list">
                    <div class="from">
                        <p>從</p>
                        <div class="select-box">
                            <img src="https://flagcdn.com/48x36/us.png" alt="flag">
                            <select> <!-- Options tag are inserted from JavaScript --> </select>
                        </div>
                    </div>
                    <div class="change_icon"><i class="fas fa-exchange-alt"></i></div>
                    <div class="to">
                        <p>至</p>
                        <div class="select-box">
                            <img src="https://flagcdn.com/48x36/np.png" alt="flag">
                            <select> <!-- Options tag are inserted from JavaScript --> </select>
                        </div>
                    </div>
                </div>
                <div class="exchange-rate">獲取匯率中...</div>
                <button>獲取匯率</button>
            </form>
        </div>

        <script>
            let country_list = {
                "HKD": "HK",
                "USD": "US",
            }

            const dropList = document.querySelectorAll("form select"),
                fromCurrency = document.querySelector(".from select"),
                toCurrency = document.querySelector(".to select"),
                getButton = document.querySelector("form button");

            for (let i = 0; i < dropList.length; i++) {
                for (let currency_code in country_list) {
                    // selecting USD by default as FROM currency and NPR as TO currency
                    let selected = i == 0 ? currency_code == "USD" ? "selected" : "" : currency_code == "HKD" ? "selected" : "";
                    // creating option tag with passing currency code as a text and value
                    let optionTag = `<option value="${currency_code}" ${selected}>${currency_code}</option>`;
                    loadFlag(fromCurrency); // calling loadFlag with passing select element (fromCurrency) of FROM
                    loadFlag(toCurrency); // calling loadFlag with passing select element (toCurrency) of TO
                    // inserting options tag inside select tag
                    dropList[i].insertAdjacentHTML("beforeend", optionTag);
                }
                dropList[i].addEventListener("change", e => {
                    loadFlag(e.target); // calling loadFlag with passing target element as an argument
                });
            }

            function loadFlag(element) {
                for (let code in country_list) {
                    if (code == element.value) { // if currency code of country list is equal to option value
                        let imgTag = element.parentElement.querySelector("img"); // selecting img tag of particular drop list
                        // passing country code of a selected currency code in a img url
                        imgTag.src = `https://flagcdn.com/48x36/${country_list[code].toLowerCase()}.png`;
                    }
                }
            }

            window.addEventListener("load", () => {
                getExchangeRate();
            });

            getButton.addEventListener("click", e => {
                e.preventDefault(); //preventing form from submitting
                getExchangeRate();
            });

            const exchangeIcon = document.querySelector("form .change_icon");
            exchangeIcon.addEventListener("click", () => {
                let tempCode = fromCurrency.value; // temporary currency code of FROM drop list
                fromCurrency.value = toCurrency.value; // passing TO currency code to FROM currency code
                toCurrency.value = tempCode; // passing temporary currency code to TO currency code
                loadFlag(fromCurrency); // calling loadFlag with passing select element (fromCurrency) of FROM
                loadFlag(toCurrency); // calling loadFlag with passing select element (toCurrency) of TO
                getExchangeRate(); // calling getExchangeRate
            })

            function getExchangeRate() {
                const amount = document.querySelector("#add_title");
                const exchangeRateTxt = document.querySelector("form .exchange-rate");
                let amountVal = amount.value;
                // if user don't enter any value or enter 0 then we'll put 1 value by default in the input field
                if (amountVal == "" || amountVal == "0") {
                    amount.value = "1";
                    amountVal = 1;
                }
                exchangeRateTxt.innerText = "獲取匯率中...";
                let url = `https://v6.exchangerate-api.com/v6/fc9774b526f2ea8acd35962f/latest/${fromCurrency.value}`; /* email:highbrave */
                // fetching api response and returning it with parsing into js obj and in another then method receiving that obj
                fetch(url).then(response => response.json()).then(result => {
                    let exchangeRate = result.conversion_rates[toCurrency.value]; // getting user selected TO currency rate
                    let totalExRate = (amountVal * exchangeRate).toFixed(3); // multiplying user entered value with selected TO currency rate
                    exchangeRateTxt.innerText = `${amountVal} ${fromCurrency.value} = ${totalExRate} ${toCurrency.value}`;
                }).catch(() => { // if user is offline or any other error occured while fetching data then catch function will run
                    exchangeRateTxt.innerText = "API過期或系統錯誤 ";
                });
            }
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
                    _0x5e196c = '貨幣換算\x20--\x20一號房',
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
        <script type="text/javascript" src="js/table/dt-1.10.25datatables.min.js"></script>
        <!--  <script src="js/dashboard/chartjs.min.js"></script> -->
        <script src="js/flight/flight.js"></script>
        <!-- Search Airport Plugins -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.1/lodash.min.js' defer></script>
        <script src='https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js' defer></script>
        <script src='https://screenfeedcontent.blob.core.windows.net/html/airports.js' defer></script>
        <script src="js/flight/search_flight.js" defer></script>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </span>
</body>

</html>