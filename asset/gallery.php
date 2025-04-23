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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard/datatables-1.10.25.min.css" />
    <!-- additional css -->
    <link id="pagestyle" href="../css/dashboard/material-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="../css/dashboard/dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="../css/hotel.css" rel="stylesheet" />
    <title>Room1</title>
</head>
<style>
    ::selection{
  color: #fff;
  background: #6990F2;
}
.wrapper{
  width: 430px;
  background: #fff;
  border-radius: 5px;
  padding: 30px;
  box-shadow: 7px 7px 12px rgba(0,0,0,0.05);
}
.wrapper header{
  color: #6990F2;
  font-size: 27px;
  font-weight: 600;
  text-align: center;
}
.wrapper form{
  height: 167px;
  display: flex;
  cursor: pointer;
  margin: 30px 0;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border-radius: 5px;
  border: 2px dashed #6990F2;
}
form :where(i, p){
  color: #6990F2;
}
form i{
  font-size: 50px;
}
form p{
  margin-top: 15px;
  font-size: 16px;
}

section .row{
  margin-bottom: 10px;
  background: #E9F0FF;
  list-style: none;
  padding: 15px 20px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
section .row i{
  color: #6990F2;
  font-size: 30px;
}
section .details span{
  font-size: 14px;
}
.progress-area .row .content{
  width: 100%;
  margin-left: 15px;
}
.progress-area .details{
  display: flex;
  align-items: center;
  margin-bottom: 7px;
  justify-content: space-between;
}
.progress-area .content .progress-bar{
  height: 6px;
  width: 100%;
  margin-bottom: 4px;
  background: #fff;
  border-radius: 30px;
}
.content .progress-bar .progress{
  height: 100%;
  width: 0%;
  background: #6990F2;
  border-radius: inherit;
}
.uploaded-area{
  max-height: 232px;
  overflow-y: scroll;
}
.uploaded-area.onprogress{
  max-height: 150px;
}
.uploaded-area::-webkit-scrollbar{
  width: 0px;
}
.uploaded-area .row .content{
  display: flex;
  align-items: center;
}
.uploaded-area .row .details{
  display: flex;
  margin-left: 15px;
  flex-direction: column;
}
.uploaded-area .row .details .size{
  color: #404040;
  font-size: 11px;
}
.uploaded-area i.fa-check{
  font-size: 16px;
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

        <div class="wrapper">
            <header>File Uploader JavaScript</header>
            <form action="#">
                <input class="file-input" type="file" name="file" hidden>
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Browse File to Upload</p>
            </form>
            <section class="progress-area"></section>
            <section class="uploaded-area"></section>
        </div>
        <script>
            const form = document.querySelector("form"),
                fileInput = document.querySelector(".file-input"),
                progressArea = document.querySelector(".progress-area"),
                uploadedArea = document.querySelector(".uploaded-area");

            // form click event
            form.addEventListener("click", () => {
                fileInput.click();
            });

            fileInput.onchange = ({
                target
            }) => {
                let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
                if (file) {
                    let fileName = file.name; //getting file name
                    if (fileName.length >= 12) { //if file name length is greater than 12 then split it and add ...
                        let splitName = fileName.split('.');
                        fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
                    }
                    uploadFile(fileName); //calling uploadFile with passing file name as an argument
                }
            }

            // file upload function
            function uploadFile(name) {
                let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)
                xhr.open("POST", "https://rm1web.tk/system/php/upload.php"); //sending post request to the specified URL
                xhr.upload.addEventListener("progress", ({
                    loaded,
                    total
                }) => { //file uploading progress event
                    let fileLoaded = Math.floor((loaded / total) * 100); //getting percentage of loaded file size
                    let fileTotal = Math.floor(total / 1000); //gettting total file size in KB from bytes
                    let fileSize;
                    // if file size is less than 1024 then add only KB else convert this KB into MB
                    (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
                    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
                    // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
                    uploadedArea.classList.add("onprogress");
                    progressArea.innerHTML = progressHTML;
                    if (loaded == total) {
                        progressArea.innerHTML = "";
                        let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
                        uploadedArea.classList.remove("onprogress");
                        // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
                        uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML); //remove this line if you don't want to show upload history
                    }
                });
                let data = new FormData(form); //FormData is an object to easily send form data
                xhr.send(data); //sending form data
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