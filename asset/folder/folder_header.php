<?php session_start(); ?>
<!-- Start Navigation -->
<div id="scroll"></div>

<!-- Start Navigation -->
<nav class="unslate_co--site-mobile-menu">
    <div class="close-wrap d-flex">
        <a href="#" class="d-flex ml-auto js-menu-toggle">
            <span class="close-label">關閉</span>
            <div class="close-times">
                <span class="bar1"></span>
                <span class="bar2"></span>
            </div>
        </a>
    </div>
    <div class="site-mobile-inner"></div>
</nav>
<div class="unslate_co--site-wrap ">
    <div class="unslate_co--site-inner">
        <nav class="unslate_co--site-nav site-nav-target wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
            <div class="menu-container">
                <div class="menurow align-items-center justify-content-between text-left">
                    <div class="col-md-5 text-right">
                        <ul class="site-nav-ul text-right js-clone-nav d-none d-lg-inline-block">
                            <li><a href="/home" class="nav-link"><i class="fa-solid fa-house"></i>網站主頁</a>
                            <li class="has-children">
                                <a href="#" class="nav-link"><i class="fa-solid fa-circle-info"></i>工作室資訊</a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="/about">工作室簡介</a>
                                    </li>
                                    <li>
                                        <a href="/rule">官網須知</a>
                                    </li>
                                </ul>
                            </li>
                           <!--  <li class="has-children">
                                <a href="#" class="nav-link"><i class="fa-solid fa-map"></i>地圖創作 </a>
                                <ul class="dropdown">
                                     <li>
                                        <a href="/map">地圖精選</a>
                                    </li>
                                    <li>
                                        <a href="/map-support">申請推薦</a>
                                    </li> 

                                </ul>
                            </li>-->
                            <li><a href="/pixel_maker" class="nav-link"><i class="fa-solid fa-images"></i>像素生成</a>
                        </ul>
                    </div>
                    <div class="site-logo pos-absolute">
                        <a class="unslate_co--site-logo"><img src="../../../img/favicon.png">
                            <span></span>
                        </a>
                    </div>
                    <ul class="site-nav-ul-none-onepage text-right d-inline-block d-lg-none">
                        <li><a href="#" class="js-menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
                    </ul>
                    <div class="col-md-5 text-right text-lg-left">
                        <ul class="site-nav-ul js-clone-nav text-right d-none d-lg-inline-block">
                            <li class="has-children">
                                <a href="#" class="nav-link"><i class="fa-solid fa-gamepad"></i>遊戲攻略 </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="/allblog">遊戲文章</a>
                                    </li>
                                    <li>
                                        <a href="/blogpost">文章創作</a>
                                    </li>
                                    <!-- <li>
                                        <a href="/pixel_maker">像素生成</a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#" class="nav-link"><i class="fa-brands fa-windows"></i>用戶系統 </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="/login">登入/登出</a>
                                    </li>
                                    <li>
                                        <a href="/login">忘記密碼</a>
                                    </li>
                                    <?php if (isset($_SESSION['username'])) { ?>
                                        <li>
                                            <a href="/dashboard">系統主頁</a>
                                        </li>
                                        <li>
                                            <a href="/userinfo">您的資料</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#" class="nav-link"><i class="fa-solid fa-at"></i>聯系我們 </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="/contact">聯系途徑</a>
                                    </li>
                                    <li>
                                        <a href="https://discord.gg/UgAgdhNdAc" target="_blank">加入Discord</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>

        <!--  <script src="Javascript/scrollupbutton.js"></script> -->
        <script src="../../../js/menu/scripts-dist.js"></script>
        <script src="../../../js/menu/main.js"></script>
        <!--  <script src="Javascript/countdown.js"></script> -->

    </div>
</div>
<!-- End Navigation -->
<div class="alert text-center cookiealert" role="alert">
    <b>感謝您瀏覽工作室官網。繼續瀏覽頁面即表示同意接受我們使用Cookies來優化用戶體驗及數據統計。</a>

        <button type="button" class=" btn btn-main btn-black acceptcookies">
            確定
        </button>
</div>
<script>
    document.onvisibilitychange = function() {
        switch (document.visibilityState) {
            case 'hidden':
                // 使用者不在頁面上時要做的事……
                break;
            case 'visible':
                // 使用者在頁面上時要做的事……
                break;
        }
    };
</script>
<script type="text/javascript">
    var user = "<?= $_SESSION['username'] ?>";
</script>