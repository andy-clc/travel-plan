
<div id="scroll"></div>

<div class="container">


    <nav class="site-nav">
        <div class="logo">
            <a class="nav_link" href="/home">
                <img src="https://www.rm1web.tk/img/icon/favicon-32x32.png" alt="">
            </a>
        </div>
        <div class="row align-items-center">


            <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
                    <li><a href="home" class="nav_link"><i class="fa-solid fa-house-user"></i>&nbsp;&nbsp;主頁</a></li>
                    <li><a href="video" class="nav_link"><i class="fa-solid fa-video"></i>&nbsp;&nbsp;瀏覽影片</a></li>

                    <!-- <li class="has-children">
                        <a href="#"><i class="fa-solid fa-car"></i>&nbsp;&nbsp;汽車</a>
                        <ul class="dropdown">
                            <li><a href="/car_history">歷史記錄</a></li>

                        </ul>
                    </li> -->
                    <li class="has-children">
                        <a href="#"><i class="fa-solid fa-plane"></i>&nbsp;&nbsp;旅行</a>
                        <ul class="dropdown">

                            <li><a href="weather" class="nav_link">&nbsp;&nbsp;旅行出行天氣</a></li>
                            <li><a href="money_convert" class="nav_link">&nbsp;&nbsp;貨幣兌換器</a></li>
                            <li><a href="expense" class="nav_link">&nbsp;&nbsp;旅費結算表</a></li>
                            <!-- <li><a href="/trip_info">&nbsp;&nbsp;旅行資訊</a></li> -->
                            <li class="has-children">
                                <a href="#">&nbsp;&nbsp;旅行規劃(美國)</a>
                                <ul class="dropdown">
                                    <li><a href="calendar" class="nav_link">行程表</a></li>
                                    <li><a href="checklist" class="nav_link">行李清單</a></li>
                                    <li><a href="trip_sup" class="nav_link">旅行資料補充</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--  <li class="has-children">
                        <a href="#"><i class="fa-solid fa-chair"></i>&nbsp;&nbsp;家俱</a>
                        <ul class="dropdown">

                            <li><a href="/furniture_history">歷史記錄</a></li>
                            <li><a href="/furniture_requir">需求</a></li>
                        </ul>
                    </li>
                    <li><a href="/contact"><i class="fa-solid fa-address-book"></i>&nbsp;&nbsp;聯絡</a></li> -->
                </ul>



               

                <a href="#" class="burger light ml-auto site-menu-toggle js-menu-toggle d-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>

        </div>
    </nav> <!-- END nav -->

</div> <!-- END container -->

<div class="alert text-center cookiealert" role="alert">
    <b>感謝您瀏覽一號房官網。繼續瀏覽頁面即表示同意接受我們使用Cookies來優化用戶體驗及數據統計。</a>

        <button type="button" class="mx-auto col-lg-2 btn btn-light btn-block acceptcookies">
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