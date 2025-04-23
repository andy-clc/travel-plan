<?php /* session_start(); */ ?>
<div class="site-footer">
    <div class="container">

        <div class="inner light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-8 mb-3 mb-md-0 mx-auto">
                        <p style="text-shadow: 0 1px 1px BLACK;font-weight: 1000;">Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> 版權所有 &mdash;All Rights Reserved by 一號房.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Back to top -->
<a href="#" id="back-to-top" title="回到頂端"><i class="fa fa-arrow-up"></i></a>
<div id="overlayer"></div>
<div class="loader">
    <!-- <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div> -->
    <div class="loader-wrapper">

        <span class="loader-dot"></span>
        <div class="loader-dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
       <!--  <div class="loader_wrap">
            <div class="loader_percentage" id="precent"></div>
            <div class="loader_percentage">
                <div class="loader_trackbar">
                    <div class="loader_loadbar"></div>
                </div>
                <div class="loader_glow"></div>
            </div>
        </div> -->
    </div>
</div>
<script>
    var width = 100,
        perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
        EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
        time = parseInt((EstimatedTime / 1000) % 60) * 100;

    // Loadbar Animation
    $(".loadbar").animate({
        width: width + "%"
    }, time);

    // Loadbar Glow Animation
    $(".glow").animate({
        width: width + "%"
    }, time);

    // Percentage Increment Animation
    var PercentageID = $("#precent"),
        start = 0,
        end = 100,
        durataion = time;
    animateValue(PercentageID, start, end, durataion);

    function animateValue(id, start, end, duration) {

        var range = end - start,
            current = start,
            increment = end > start ? 1 : -1,
            stepTime = Math.abs(Math.floor(duration / range)),
            obj = $(id);

        var timer = setInterval(function() {
            current += increment;
            $(obj).text(current + "%");
            //obj.innerHTML = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    // Fading Out Loadbar on Finised
    setTimeout(function() {
        $('.preloader-wrap').fadeOut(300);
    }, time);
</script>

<div class="toast_notify ">

    <div class="toast-content">
        <span class="toast_icon"></span>

        <div class="message">
            <span class="text text-1">$title</span>
            <span class="text text-2">$descript</span>
        </div>
    </div>
    <i class="fa-solid fa-xmark toast_close"></i>

    <div class="toast_progress "></div>
</div>


<!-- <script src="https://rm1web.tk/js/jquery-3.5.1.min.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><!--只可加1次 for Modal box -->
<!-- 
    The problem is due to having jQuery instances more than one time. 
    Take care if you are using many files with multiples instance of jQuery. Just leave 1 instance of jQuery and your code will work.
 -->
<script src="https://rm1web.tk/js/interaction.js"></script>
<script defer src="https://rm1web.tk/js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://rm1web.tk/js/popper.min.js"></script>
<?php /* $actual_link = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($actual_link != 'https://rm1web.tk/asset/calendar.php' || $actual_link != 'https://rm1web.tk/calendar'){ */ ?>
<script src="https://rm1web.tk/js/bootstrap.min.js"></script>
<?php /* } */ ?>
<script defer src="https://rm1web.tk/js/owl.carousel.min.js"></script>
<script src="https://rm1web.tk/js/aos.js"></script>
<script defer src="https://rm1web.tk/js/imagesloaded.pkgd.js"></script>
<script defer src="https://rm1web.tk/js/isotope.pkgd.min.js"></script>
<script defer src="https://rm1web.tk/js/jquery.animateNumber.min.js"></script>
<script defer src="https://rm1web.tk/js/jquery.stellar.min.js"></script>
<script defer src="https://rm1web.tk/js/jquery.waypoints.min.js"></script>
<script defer src="https://rm1web.tk/js/jquery.fancybox.min.js"></script>
<script src="https://rm1web.tk/js/custom.js"></script>


</span><!-- noscript class -->