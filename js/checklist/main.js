$(document).ready(function () {
    let touchstartX = 0
    let touchendX = 0

    function checkDirection() {
        if (touchendX < touchstartX) {
            if (touchstartX - touchendX >= 100) {
                //left swipe
                if ($('.fixed-plugin').hasClass('show') && !$('body').hasClass('offcanvas-menu')) {//如杲左表已顯示，右表未顯示
                    $('.fixed-plugin').removeClass('show');
                } else
                    if (!$('.fixed-plugin').hasClass('show') && !$('body').hasClass('offcanvas-menu')) {//如杲左表未顯示，右表已顯示
                        $('body').addClass('offcanvas-menu');
                        $('body').find('.js-menu-toggle').addClass('active');
                    }
            }
        }
        if (touchendX > touchstartX) {
            //right swipe
            if (touchendX - touchstartX >= 100) {
                if (!$('.fixed-plugin').hasClass('show') && !$('body').hasClass('offcanvas-menu')) {//如杲左表未顯示，右表亦未顯示
                    $('.fixed-plugin-button').trigger("click");
                }
                if ($('body').hasClass('offcanvas-menu')) {
                    $('body').removeClass('offcanvas-menu');
                    $('body').find('.js-menu-toggle').removeClass('active');
                }
            }
        }
    }

    document.addEventListener('touchstart', e => {
        touchstartX = e.changedTouches[0].screenX
        //console.log(touchstartX)
    })

    document.addEventListener('touchend', e => {
        touchendX = e.changedTouches[0].screenX
        //console.log(touchendX)
        checkDirection()
    })





   /*  document.addEventListener('touchstart', handleTouchStart, false);
    document.addEventListener('touchmove', handleTouchMove, false);

    var xDown = null;
    var yDown = null;

    function getTouches(evt) {
        return evt.touches || // browser API
            evt.originalEvent.touches; // jQuery
    }

    function handleTouchStart(evt) {
        const firstTouch = getTouches(evt)[0];
        xDown = firstTouch.clientX;
        yDown = firstTouch.clientY;
    };

    function handleTouchMove(evt) {
        if (!xDown || !yDown) {
            return;
        }

        var xUp = evt.touches[0].clientX;
        var yUp = evt.touches[0].clientY;
        //$(document.elementFromPoint(xUp, yUp)).css('color', 'red');
        //console.log(document.elementFromPoint(xUp, yUp).className)
        //console.log(document.elementFromPoint(xUp, yUp).tagName)
        //console.log(evt.target.outerHTML)
        if (evt.target.outerHTML.indexOf("fc-bg") == -1) {
            var xDiff = xDown - xUp;
            var yDiff = yDown - yUp;
            if (Math.abs(xDiff) > Math.abs(yDiff)) {
                if (xDiff > 0) {
                    //right swipe
                    if ($('.fixed-plugin').hasClass('show') && !$('body').hasClass('offcanvas-menu')) {//如杲左表已顯示，右表未顯示
                        $('.fixed-plugin').removeClass('show');
                    } else
                        if (!$('.fixed-plugin').hasClass('show') && !$('body').hasClass('offcanvas-menu')) {//如杲左表未顯示，右表已顯示
                            $('body').addClass('offcanvas-menu');
                            $('body').find('.js-menu-toggle').addClass('active');
                        }
                } else {
                    //left swipe
                    if (!$('.fixed-plugin').hasClass('show') && !$('body').hasClass('offcanvas-menu')) {//如杲左表未顯示，右表亦未顯示
                        $('.fixed-plugin-button').trigger("click");
                    }
                    if ($('body').hasClass('offcanvas-menu')) {
                        $('body').removeClass('offcanvas-menu');
                        $('body').find('.js-menu-toggle').removeClass('active');
                    }
                }
            } else {
                if (yDiff > 0) {
                    //down swipe
                } else {
                    //up swipe
                }
            }
            //reset values
            xDown = null;
            yDown = null;
        }
    }; */

    /* if (window.matchMedia("(pointer: coarse)").matches) {
        $('.fixed-plugin-button').css('display', 'none')
      } else {
        $('.fixed-plugin-button').css('display', 'flex')
      } */

    function toastbar(message, color) {
        var el = document.createElement("div");
        el.className = "snackbar";
        var y = document.getElementById("snackbar-container");
        el.style.color = color;
        el.innerHTML = message;
        y.append(el);
        el.className = "snackbar show";
        setTimeout(function () {
            el.className = el.className.replace("snackbar show", "snackbar");
        }, 3000);
    }
    var search_result = []
    $('.add_button').on('click', function () {
        var itemValue = $(this).data('type');
        var ul = $(this).data('ul');
        var example = $(this).data('eg');
        var html = `<div class="insert_form">
    <form class="add_form"data-type="${itemValue}"data-ul="${ul}">
        <input type="text"id="insert_input" name="add" placeholder="輸入要添加嘅${itemValue}名稱..."autocomplete="off">
        <button type="submit"><i class="fa-regular fa-square-plus fa-beat insert_data_btn"style="cursor:pointer"></i></button>
        <ul class="select-dropdown__list " id="search_bar_result"style="display:none;top:35px"></ul>
    </form> 
    <div class="row justify-content-center align-items-center">
        <label for="edit_airline" class=" form-label m-0 col-12 col-md-4 text-center">選擇該物品放入哪個行李(默認為行李1,非必填)</label>
        <div class=" col-12 col-md-4 text-center">
            <input type="radio" class="custom_radio" id="baggage1" name="which_baggage" value="baggage1"checked>
            <label for="baggage1" style="cursor:pointer">行李1</label>

            <input type="radio" class="custom_radio" id="baggage2" name="which_baggage" value="baggage2">
            <label for="baggage2" style="cursor:pointer">行李2</label>

            <input type="radio" class="custom_radio" id="baggage3" name="which_baggage" value="baggage3">
            <label for="baggage3" style="cursor:pointer">行李3</label>

            <input type="radio" class="custom_radio" id="baggage4" name="which_baggage" value="baggage4">
            <label for="baggage4" style="cursor:pointer">行李4</label>
        </div>
    </div>
    <p style="color:black;font-size:15px;margin-top:5px;line-height: 1em;">如果想一併填入數量，請在名稱後輸入「*數量」(不寫默認為1)，例如:${example}</p>
    <p style="color:black;font-size:15px;margin-top:-10px;margin-bottom:0;line-height: 1em;">您可以在插入數據後添加數量、屏幕截圖和更多信息</p></div>`

        if ($('.insert_form').length > 0) {
            if ($('#insert_input').val() != '') {
                if (confirm('檢測到您還沒有將最後一個數據保存到系統中！您確定要取消該數據並插入一個新數據嗎')) {
                    $('.todo_content').find('.insert_form').remove();
                    $(this).parent().parent().after(html);
                    return true;
                } else {

                }
            } else {
                $('.todo_content').find('.insert_form').remove();
                $(this).parent().parent().after(html);
                $.ajax({
                    type: "POST",
                    url: "../../system/php/checklist/getalldata.php",
                    contentType: false,
                    processData: false,
                    error: function () {
                        toastbar('內部文件遺失', 'red')
                    },
                })
                    .done(function (data) {
                        var json = JSON.parse(data);
                        //console.log(json)
                        var len = data.length;
                        var count = 0
                        for (var i = 0; i < len; i++) {
                            if (search_result.indexOf(json[i]) == -1) {
                                search_result[i] = json[i]
                                count = count + 1
                            }
                        }
                        //console.table(search_result)
                    });
            }
        } else {
            $(this).parent().parent().after(html);
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/getalldata.php",
                contentType: false,
                processData: false,
                error: function () {
                    toastbar('內部文件遺失', 'red')
                },
            })
                .done(function (data) {
                    var json = JSON.parse(data);
                    //console.log(json)
                    var len = data.length;
                    var count = 0
                    for (var i = 0; i < len; i++) {
                        if (search_result.indexOf(json[i]) == -1) {
                            search_result[count] = json[i]
                            count = count + 1
                        }
                    }
                    //console.table(search_result)
                });
        }
        $("#insert_input").focus();
    });
    $(document).on('input focus', '#insert_input', function (_e) { //change keydown paste input
        var input = $(this).val()
        var len = search_result.length;
        var count = 0
        $('#search_bar_result').html('')
        for (var i = 0; i < len; i++) {
            if (search_result[i] != undefined) {
                if (search_result[i].toLowerCase().indexOf(input.toLowerCase()) >= 0 && input != '') {
                    if (count <= 9) {
                        $('#search_bar_result').append(
                            `<li style="border-radius:0;margin:0;padding:3px;text-shadow:0 1px 1px black;"data-value="${search_result[i]}" 
                            class="select-dropdown__list-item search_bar_result_options">${search_result[i]}</li>`)
                        //console.log(search_result[i])
                        if (count == 0) {
                            $('#search_bar_result').prepend(`
                            <li style="border-radius:0;margin:0;padding:3px;text-shadow:0 1px 1px black;background: hsl(204deg 100% 50%);
                            text-align: center;display: block;font-size: large;text-decoration: underline;"
                            class="select-dropdown__list-item ">點擊下面的類似結果，系統將自動輸入值</li>`)
                        }
                        count = count + 1
                    }
                }
            }
        }
        if (count != 0) {
            $('#search_bar_result').css('display', 'block')
            $('#search_bar_result').addClass('active')
        } else {
            $('#search_bar_result').css('display', 'none')
            $('#search_bar_result').removeClass('active')
        }
    })
    $(document).on('click', '.search_bar_result_options', function () { //
        $('#search_bar_result').css('display', 'none')
        $('#search_bar_result').removeClass('active')
        $('#insert_input').val($(this).attr('data-value'))
    })
    $(document).click(function (e) {
        if ($(e.target).hasClass('search_bar_result_options') || $(e.target).attr('id') == 'insert_input' 
        || $(e.target).parent().attr('id') == 'search_bar_result') {
        } else {
            $('#search_bar_result').css('display', 'none')
            $('#search_bar_result').removeClass('active')
        }
    });

    (function ($) {

        $.fn.numberstyle = function (options) {
            var settings = $.extend({
                value: 0,
                step: undefined,
                min: undefined,
                max: undefined
            }, options);
            return this.each(function (i) {
                var input = $(this);
                var container = document.createElement('div'),
                    btnAdd = document.createElement('div'),
                    btnRem = document.createElement('div'),
                    confirm = document.createElement('div'),
                    min = (settings.min) ? settings.min : input.attr('min'),
                    max = (settings.max) ? settings.max : input.attr('max'),
                    value = (settings.value) ? settings.value : parseFloat(input.val());
                container.className = 'numberstyle-qty';
                btnAdd.className = (max && value >= max) ? 'qty-btn qty-add disabled' : 'qty-btn qty-add';
                btnAdd.innerHTML = '+';
                btnRem.className = (min && value <= min) ? 'qty-btn qty-rem disabled' : 'qty-btn qty-rem';
                btnRem.innerHTML = '-';
                confirm.className = 'qty-btn-confirm';
                confirm.innerHTML = '<i class="fa-solid fa-check fa-fade"style="color:green"></i>';
                input.wrap(container);
                input.closest('.numberstyle-qty').prepend(btnRem).append(btnAdd).append(confirm);
                // use .off() to prevent triggering twice
                $(document).off('click', '.qty-btn').on('click', '.qty-btn', function (e) {

                    var input = $(this).siblings('input'),
                        sibBtn = $(this).siblings('.qty-btn'),
                        step = (settings.step) ? parseFloat(settings.step) : parseFloat(input.attr('step')),
                        min = (settings.min) ? settings.min : (input.attr('min')) ? input.attr('min') : undefined,
                        max = (settings.max) ? settings.max : (input.attr('max')) ? input.attr('max') : undefined,
                        oldValue = parseFloat(input.val()),
                        newVal;
                    //Add value
                    if ($(this).hasClass('qty-add')) {

                        newVal = (oldValue >= max) ? oldValue : oldValue + step,
                            newVal = (newVal > max) ? max : newVal;
                        if (newVal == max) {
                            $(this).addClass('disabled');
                        }
                        sibBtn.removeClass('disabled');
                        //Remove value
                    } else {

                        newVal = (oldValue <= min) ? oldValue : oldValue - step,
                            newVal = (newVal < min) ? min : newVal;
                        if (newVal == min) {
                            $(this).addClass('disabled');
                        }
                        sibBtn.removeClass('disabled');
                    }
                    //Update value
                    input.val(newVal).trigger('change');
                });

                input.on('change', function () {

                    const val = parseFloat(input.val()),
                        min = (settings.min) ? settings.min : (input.attr('min')) ? input.attr('min') : undefined,
                        max = (settings.max) ? settings.max : (input.attr('max')) ? input.attr('max') : undefined;
                    if (val > max) {
                        input.val(max);
                    }
                    if (val < min) {
                        input.val(min);
                    }
                });

            });
        };

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
            document.cookie = name + '=; Max-Age=-99999999;';
        }

        function get_total_li() {
            setTimeout(() => {
                let total_no = 0
                let checked_total_item = 0
                for (var j = 1; j <= 7; j++) {
                    var len = $(`#ul${j} li[style!='display: none;']`).length
                    total_no = total_no + len
                    var checked_total = 0
                    $(`#ul${j} .item_checkbox`).each(function () {
                        /* if ($(this).is(':checked')) { //Checked
                            
                            checked_total = checked_total + 1
                            checked_total_item = checked_total_item + 1
                        } */
                        var box_id = $(this).attr('data-id')
                        var li_id = $(`li[data-id=${box_id}]`).css('display');
                        if ($(this).is(':checked')) { //Checked
                            if (li_id == 'block' || li_id == 'flex') {
                                checked_total = checked_total + 1
                                checked_total_item = checked_total_item + 1
                            }
                        }
                    });
                    $(`#total_li_${j}`).html(` ( ${checked_total} / ${len} )`)
                    if (len == 0) {
                        if ($(`#ul${j} .no_Data`).length <= 0) {
                            $(`#ul${j}`).append('<p class="no_Data m-0 text-danger text-center font-weight-bolder">暫無數據</p>')
                        }
                    } else {
                        $(`#ul${j} .no_Data`).remove()
                    }
                }
                $('#total_item').html(`總數：${checked_total_item} / ${total_no}`)
            }, 200);
        }

        function set_select_list_data() {
            var html = `
            <div class="title text-dark text-center ">
            選擇您的動作以繼續
            </div>
        
            <div class="option_container">
                <label class="option_item">
                <input type="checkbox" class="checkbox"name="choose_list_option"value="create">
                <div class="option_inner facebook">
                    <div class="tickmark"></div>
                    <div class="option_icon"><i class="fa-solid fa-circle-plus fab"></i></div>
                    <div class="name">建立一個新清單</div>
                </div>
                </label>
                <label class="option_item">
                <input type="checkbox" class="checkbox" name="choose_list_option"value="exist">
                <div class="option_inner twitter">
                    <div class="tickmark"></div>
                    <div class="option_icon"><i class="fa-solid fa-arrow-pointer fab"></i></div>
                    <div class="name">選擇已被建立的清單</div>
                </div>
                </label>
                
            </div>`
            $('#select_list_modal_content').html(html)

        }
        $(document).on('click', 'input:checkbox[name="choose_list_option"]', function (e) {
            if ($(this).val() == 'create') {
                var html = `
                    <div class="back_button">
                        <a class="back_label"style="cursor:pointer">返回</a>
                    </div>
                    <h3>建立一個新清單</h3>
                <p class="text-sm">不論目的地，每件行李(手提 OR 寄艙)應<span style="font-weight:1000;text-decoration: 1px underline black;">只創建一個清單</span>；如行李需重新設置，請點擊「重置數據」按鈕</p>
                <form id="new_list_form" action="" method="post" onkeydown="return event.key != 'Enter';">
                    <div class="row justify-content-center"style="overflow: visible;">
                        <div class="col-sm-6 col-12"style="padding-top: 5px;">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="new_list_title" class=" form-label">清單名稱*</label>
                                    <input type="text" class="form-control" id="new_list_title" name="new_list_title"value="" autocomplete="off">
                                    <p class="text-sm">名稱不能與現有的重複且為必填欄位</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12"style="padding-top: 5px;">
                            <div class="select-dropdown"style="padding-bottom: 7px;">
                                <button type="button" role="button"style="margin-block:0" id="choose_new_list_dropdown" data-value="" class="select-dropdown__button edit">
                                    <span>選擇這次的目的地*</span> <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <ul class="select-dropdown__list "id="choose_enew_list_dropdown_list">
                                    <li data-value="香港" class="select-dropdown__list-item choose_new_list_item">香港</li>
                                    <li data-value="波士頓" class="select-dropdown__list-item choose_new_list_item">波士頓</li>
                                    <li data-value="三藩市" class="select-dropdown__list-item choose_new_list_item">三藩市</li>
                                    <li data-value="Jackson Hole" class="select-dropdown__list-item choose_new_list_item">Jackson Hole</li>
                                    <li data-value="Yellowstone" class="select-dropdown__list-item choose_new_list_item">Yellowstone</li>
                                    <li data-value="洛杉磯" class="select-dropdown__list-item choose_new_list_item">洛杉磯</li>
                                    <li data-value="其他" class="select-dropdown__list-item choose_new_list_item">其他</li>
                                </ul>
                            </div>
                            <p class="text-sm">選擇目的地可以動態改變清單背景圖*</p>
                        </div>
                        <div class="col-sm-6 col-12"style="padding-top: 5px;">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled m-0">
                                    <label for="new_list_psw" class=" form-label">密碼（可選）</label>
                                    <input type="text" class="form-control" id="new_list_psw" name="new_list_psw"value="" autocomplete="off">
                                    <p class="text-sm">設置密碼可以讓清單只有自己可以看到，但是1號房主人還是可以訪問的，以便更好的維護</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex m-auto add_checklist_switch">
                        <h6 class="mb-0">是否在建立清單時一併設置所有默認數據？</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox"checked id="set_default">
                        </div>
                    </div>
                    <p class="text-sm">新增清單時，<span style="font-weight:1000">開啟</span>表示添加所有由一號房主人協助設定的默認物品<br>
                        <span style="font-weight:1000">關閉</span>表示所有清單物品由您自己填入</p>
                    <button type="button" class="btn btn-success text-center"id="add_list_confirm">添加</button>
                </form>
                `
                $('input:checkbox[name="choose_list_option"]').attr("disabled", true);
                setTimeout(() => {
                    $('#select_list_modal_content').html(html)
                }, 500);

            } else if ($(this).val() == 'exist') {
                var html = `
                    <div class="back_button">
                        <a class="back_label"style="cursor:pointer">返回</a>
                    </div>
                    <h3>請在下面選擇已被建立的清單</h3>
                    <p class="text-sm">如果您曾經創建清單，請在下方選擇您創建的清單名稱；有時候您需要輸入密碼以作確認；<br>
                    <span style="font-weight:1000;text-decoration: 1px underline black;">如果忘記清單密碼，請聯繫一號房主人</span></p>
                    <hr class="horizontal info my-3 ">
                    <div class="select-dropdown"style="padding-bottom: 0;">
                        <button type="button" role="button"style="margin-block:0" id="choose_exist_list_dropdown"data-psw="" data-value="" class="select-dropdown__button edit">
                            <span>選擇清單</span> <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <ul class="select-dropdown__list "id="choose_exist_list_dropdown_list">
                        </ul>
                    </div>
                    <div class="psw_container"></div>
                    <hr class="horizontal info my-3">
                    
                `
                $('input:checkbox[name="choose_list_option"]').attr("disabled", true);
                setTimeout(() => {
                    $('#select_list_modal_content').html(html)

                    var form_data = new FormData();
                    $(this).prop("disabled", true);
                    var me = this;
                    $.ajax({
                        type: "POST",
                        url: "../../system/php/checklist/get_exist_name.php",
                        contentType: false,
                        processData: false,
                        error: function (xhr, ajaxOptions, thrownError) {
                            toastbar(thrownError + '(' + xhr.status + ')', 'red')
                        },
                        success: function (data) {
                            data = JSON.parse(data);
                            document.getElementById('choose_exist_list_dropdown_list').innerHTML = ''
                            for (var i = 0; i < data.length; i++) {
                                var name = data[i].extra
                                if (data[i].psw != '') {
                                    var psw = '1'
                                } else {
                                    var psw = '0'
                                }
                                const html =
                                    `<li data-value="${name}"data-psw="${psw}" class="select-dropdown__list-item choose_exist_list_item">${name}</li>`
                                document.getElementById('choose_exist_list_dropdown_list').innerHTML += html;
                                get_total_li()

                            }
                            if (getCookie('list_name')) {
                                $('#choose_exist_list_dropdown span').text(decodeURI(getCookie("list_name"))).parent().attr('data-value', decodeURI(getCookie("list_name"))).attr('data-psw', getCookie('0'));
                            }
                        }
                    })
                }, 500);
            }
        });

        $(document).on('click', '.back_label', function (e) {
            set_select_list_data()
        })

        $(document).on('click', '.main_menu', function (e) {//單擊主菜單圖標，顯示或隱藏
            if (!$(this).children().first().hasClass('open')) {
                $(this).children().first().addClass('open');
            } else {
                $(this).children().first().removeClass('open');
            }
        });
        /* $(document).on('click', '.custom_radio', function (e) {
            if($(this).is(':checked')) { $(this).prop('checked', false); }
         }); */

        $(document).on('click', '.editlist_confirm_btn', function (e) {//編輯清單主要數據 確認按鈕
            var extra = $('#list_related_id').val()
            var title = $('#edit_list_title').val()
            var destin = $('#choose_edit_list_dropdown').attr('data-value')
            var old_psw = $('#edit_list_old_psw').val()
            var new_psw = $('#edit_list_new_psw').val()
            var form_data = new FormData();
            var text = $(this).text()
            $(this).prop("disabled", true);
            $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            var me = this;
            form_data.append('extra', extra)
            form_data.append('title', title)
            form_data.append('destin', destin)
            form_data.append('old_psw', old_psw)
            form_data.append('new_psw', new_psw)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/main_menu/update_list.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html('保存更改');
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html('保存更改');
                    if (data.indexOf("更新清單信息成功") > -1) {
                        setCookie('list_name', title, 30);
                        $('#list_related_id').val(decodeURI(getCookie("list_name")))
                        reset_list()
                        $('#editlist_modal').modal('hide')
                    }
                }
            })
        });

        $(document).on('click', '.mainmenu_share', function (e) {
            var url = "https://rm1web.tk/checklist";
            var list_name = decodeURI(getCookie("list_name"))
            var whole_text = url + '?id=' + getCookie("list_name") //+ '\n' + '旅行清單分享功能，點擊連結即可免密碼快速進入「' + list_name+'」的清單'
            navigator.clipboard.writeText(whole_text).then(() => {
                toastbar('鏈接複製到剪貼板', '#67ff67')
            }, () => {
                toastbar('鏈接複製失敗', 'red')
            });
        });

        $(document).on('click', '.sidebar_share', function (e) {//刪除項目 btn 點擊顯示modal
            var url = "https://rm1web.tk/checklist";
            var list_name = decodeURI(getCookie("list_name"))
            var whole_text = url + '?id=' + getCookie("list_name") //+ '\n' + '旅行清單分享功能，點擊連結即可免密碼快速進入「' + list_name+'」的清單'
            navigator.clipboard.writeText(whole_text).then(() => {
                toastbar('鏈接複製到剪貼板', '#67ff67')
            }, () => {
                toastbar('鏈接複製失敗', 'red')
            });
        });

        $(document).on('click', '.mainmenu_delete', function (e) {//刪除項目 btn 點擊顯示modal
            $('#delete_list_confirm_modal').modal('show')
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            $('#delete_checklist_name').html(id)
        });

        $(document).on('click', '.deletelist__confirm', function (e) {//刪除列表確認
            var id = getCookie('list_name')
            var psw = $('#delete_checklist_psw').val()
            var form_data = new FormData();
            var text = $(this).text()
            $(this).prop("disabled", true);
            $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            var me = this;
            form_data.append('id', id)
            form_data.append('psw', psw)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/main_menu/delete_list.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html(text);
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html(text);
                    if (data.indexOf("刪除清單成功") > -1) {
                        document.cookie = 'list_name' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
                        $('.chooselist').trigger('click')
                        $('#select_list_modal').modal({
                            backdrop: 'static',
                            keyboard: true
                        })
                        $('#delete_list_confirm_modal').modal('hide')
                        $('#select_list_modal_footer').css('display', 'none')
                        $('#delete_checklist_psw').val('')
                    }
                }
            })
        });

        $(document).on('click', '.mainmenu_reset', function (e) {//重置數據內容生成
            $('.reset_data').html('')
            $('#reset_list_modal').modal('show')
            var id = $('#list_related_id').val()
            if (getCookie('checklist_showno')) {
                var val = decodeURI(getCookie('checklist_showno'))
                $('.choose_baggage_no_dropdown_list_item').each(function (e) {
                    var text = $(this).text()
                    var data_val = $(this).attr('data-value')
                    if (val == data_val) {
                        $('.reset_data').append(`<h6 id="reset_baggage_no" data-bg="${data_val}"
                        class="mb-1 text-dark text-sm">*此重置只會影響行李編號為${data_val}的數據</h6>`)
                    }
                })
            } else {
                $('.reset_data').append(`<h6 id="reset_baggage_no" data-bg="none" class="mb-1 text-dark text-sm">*此重置會影響所有行李編號的數據</h6>`)
            }
            $('#reset_list_item').html(id)
            $('#reset_list_item').css('font-size', '26px')
            $('#reset_list_item').css('text-decoration', ' underline')
            var all_check_total = 0
            var all_ul_total = 0
            for (var j = 1; j <= 7; j++) {
                var name = ['電子產品', '衣物', '清潔用品', '文件', '健康', '一般用品', '食物']
                var len = $(`#ul${j} li[style!='display: none;']`).length
                all_ul_total = all_ul_total + $(`#ul${j} li[style!='display: none;']`).length
                var checked_total = 0
                $(`#ul${j} .item_checkbox`).each(function () {
                    var box_id = $(this).attr('data-id')
                    var li_id = $(`li[data-id=${box_id}]`).css('display');
                    if ($(this).is(':checked') && li_id == 'block' || li_id == 'flex') { //Checked
                        checked_total = checked_total + 1
                        all_check_total = all_check_total + 1
                    }
                });
                //$('.reset_data').append(`<h6>${icon[j - 1]}&nbsp;&nbsp;已完成${checked_total}${name[j - 1]}</h6>`)
                $(`#reset_${j}`).html(`
                    <div class="d-flex flex-column ">
                    <h6 class="mb-1 text-dark">已完成：${checked_total}項 / ${len}項</h6>
                    </div>
                    `)

                //<span class="text-xs">總佔比：${percent}% -- 今日佔比：${today_percent}%</span>
            }
            $('#reset_total_amount').html(`全部：${all_check_total} / ${all_ul_total}`)
        });

        $(document).on('click', '.reset_confirm', function (e) {//重置數據確認按鈕
            var id = decodeURI(getCookie('list_name'))
            var form_data = new FormData();
            var text = $(this).text()
            $(this).prop("disabled", true);
            $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            var me = this;
            form_data.append('id', id)
            form_data.append('baggage_no', $('#reset_baggage_no').attr('data-bg'))
            $(this).prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/main_menu/reset_list.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html(text);
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html(text);
                    if (data.indexOf("成功重置清單所有數據") > -1 || data.indexOf("行李編號") > -1) {
                        $('#reset_list_modal').modal('hide')
                        reset_list()
                    }
                }
            })
        });

        $(document).on('click', '.mainmenu_edit', function (e) {//主菜單編輯內容生成
            $('#editlist_modal').modal({
                backdrop: 'static',
                keyboard: true
            })
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            var form_data = new FormData();
            var me = this;
            form_data.append('related', related)
            form_data.append('id', id)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/main_menu/fetch_data.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    const html =
                        `
                    <input type="hidden" class="form-control" id="edit_list_id" name="edit_list_id"value="${data[0].id}" autocomplete="off">
                    <div class="row justify-content-center"style="overflow: visible;">
                    <div class="col-sm-12 col-12"style="padding-top: 5px;">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline is-filled">
                                <label for="edit_list_title" class=" form-label">清單名稱*</label>
                                <input type="text" class="form-control" id="edit_list_title" name="edit_list_title"value="${data[0].extra}" autocomplete="off">
                                <p class="text-sm">名稱不能與現有的重複且為必填欄位</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12"style="padding-top: 5px;">
                        <div class="select-dropdown"style="padding-bottom:7px">
                            <button type="button" role="button"style="margin-block:0" id="choose_edit_list_dropdown" data-value="${data[0].destination}" class="select-dropdown__button edit">
                                <span>${data[0].destination}</span> <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <ul class="select-dropdown__list "id="choose_edit_list_dropdown_list">
                                <li data-value="香港" class="select-dropdown__list-item choose_edit_list_item">香港</li>
                                <li data-value="波士頓" class="select-dropdown__list-item choose_edit_list_item">波士頓</li>
                                <li data-value="三藩市" class="select-dropdown__list-item choose_edit_list_item">三藩市</li>
                                <li data-value="Jackson Hole" class="select-dropdown__list-item choose_edit_list_item">Jackson Hole</li>
                                <li data-value="Yellowstone" class="select-dropdown__list-item choose_edit_list_item">Yellowstone</li>
                                <li data-value="洛杉磯" class="select-dropdown__list-item choose_edit_list_item">洛杉磯</li>
                                <li data-value="其他" class="select-dropdown__list-item choose_edit_list_item">其他</li>
                            </ul>
                        </div>
                        <p class="text-sm">選擇目的地可以動態改變清單背景圖</p>
                    </div>
                    <p class="text-sm">更改清單密碼</p>
                    <div class="col-sm-6 col-12"style="padding-top: 5px;">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline is-filled">
                                <label for="edit_list_old_psw" class=" form-label">輸入舊密碼</label>
                                <input type="text" class="form-control" id="edit_list_old_psw" name="edit_list_old_psw"value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12"style="padding-top: 5px;">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline is-filled">
                                <label for="edit_list_new_psw" class=" form-label">輸入新密碼</label>
                                <input type="text" class="form-control" id="edit_list_new_psw" name="edit_list_new_psw"value="" autocomplete="off">
                                <p class="text-sm">設置密碼可以讓清單只有自己可以看到，但是1號房主人還是可以訪問的，以便更好的維護</p>
                                <p class="text-sm">如果您想取消密碼保護，請輸入正確的舊密碼並將新密碼欄位留空</p>
                            </div>
                        </div>
                    </div>
                </div>`
                    $('#editlist_modal_content').html(html)
                    $('#editlist_modal_title').html('<h3>編輯此清單主要數據</h3>')
                    if (data[0].psw == '') {
                        $('#edit_list_old_psw').val('之前沒有設置密碼')
                        $("#edit_list_old_psw").prop('disabled', true);
                    }
                    //console.log(data)
                }
            })
        });

        $(document).on('click', '#search_bar_btn', function (e) {
            if ($("#search_bar").is(":focus")) {
                if ($("#search_bar").val() === '') {
                    $('#search_bar').blur()
                    $('#search_bar').removeClass("unfocus")
                }
            } else {
                $('#search_bar').focus()
                $('#search_bar').addClass("unfocus")
            }
        });

        $('#search_bar').on('input', function () {
            if ($("#search_bar").val() === '') {
                if ($('.select-dropdown__button span').text() != '全部顯示') {
                    $('.select-dropdown__button span').text('全部顯示').parent().attr('data-value', ' ');
                    eraseCookie('checklist_showno')
                    var interval = setInterval(() => {
                        setTimeout(() => {
                            $('.select-dropdown__button').addClass('alert-danger alert-link')
                            setTimeout(() => {
                                $('.select-dropdown__button').removeClass('alert-danger alert-link')
                            }, 500);
                        }, 500);
                    }, 1000);
                    setTimeout(() => {
                        clearInterval(interval);
                    }, 4000);
                }
                $(".todos li").css('display', 'block')
                get_total_li()
            } else {
                $(".todos li").each(function () {
                    if ($(this).text().toLowerCase().indexOf($("#search_bar").val().toLowerCase()) >= 1) {
                        $(this).css('display', 'block')
                        get_total_li()
                    } else {
                        $(this).css('display', 'none')
                        get_total_li()
                    }
                })
            }
        });

        $(document).on('click', '#choose_edit_list_dropdown', function (e) {
            $('#choose_edit_list_dropdown_list').toggleClass('active');
        });
        $(document).on('click', '.choose_edit_list_item', function (e) {
            var itemValue = $(this).data('value');
            $('#choose_edit_list_dropdown span').text($(this).text()).parent().attr('data-value', itemValue);
            $('#choose_edit_list_dropdown_list').toggleClass('active');
        });

        $(document).on('click', '#choose_new_list_dropdown', function (e) {
            $('#choose_enew_list_dropdown_list').toggleClass('active');
        });
        $(document).on('click', '.choose_new_list_item', function (e) {
            var itemValue = $(this).data('value');
            $('#choose_new_list_dropdown span').text($(this).text()).parent().attr('data-value', itemValue);
            $('#choose_enew_list_dropdown_list').toggleClass('active');
        });

        $(document).ready(function () {
            if (getCookie('checklist_showno')) {
                var val = decodeURI(getCookie('checklist_showno'))
                //console.log('cookies' + val)
                $('.choose_baggage_no_dropdown_list_item').each(function (e) {
                    var text = $(this).text()
                    var data_val = $(this).attr('data-value')
                    if (val == data_val) {
                        toastbar('系統現正獲取行李' + val + '數據中', '#67ff67')
                        $('#choose_baggage_no span').text(text).parent().attr('data-value', data_val);
                    }
                })
            }
            if (window.location.href.indexOf("?id=") > -1) {
                var id = window.location.href.substring(window.location.href.lastIndexOf('?id=') + 4);
                setCookie('list_name', id, 30);
                $('#list_related_id').val(decodeURI(getCookie("list_name")))
                $('.mainmenu_edit').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_delete').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_psw').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_reset').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_share').attr('data-id', decodeURI(getCookie("list_name")));
                reset_list()
                toastbar('成功更改當前列表', '#67ff67')
                window.history.replaceState('', '', '/checklist');
            } else if (getCookie("list_name")) {
                $('#list_related_id').val(decodeURI(getCookie("list_name")))
                $('.mainmenu_edit').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_delete').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_psw').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_reset').attr('data-id', decodeURI(getCookie("list_name")));
                $('.mainmenu_share').attr('data-id', decodeURI(getCookie("list_name")));
                reset_list()
            } else {
                $('#select_list_modal').modal({
                    backdrop: 'static',
                    keyboard: true
                })
                $('#select_list_modal_footer').css('display', 'none')
                set_select_list_data()
            }
            if (getCookie("show_delete_checklist")) {
                $('#show_delete_modal1').prop('checked', true);
                $('#show_delete_modal').prop('checked', true);
            } else {
                $('#show_delete_modal1').prop('checked', false);
                $('#show_delete_modal').prop('checked', false);
            }
        })
        $(document).on('click', '#add_list_confirm', function (e) { //添加新列表confirm
            e.preventDefault()
            var name = $('#new_list_title').val()
            var destination = $('#choose_new_list_dropdown').attr("data-value")
            var psw = $('#new_list_psw').val()
            if ($('#set_default').is(':checked')) { //Checked
                var set_default = '1'
            } else {
                var set_default = '0'
            }
            var form_data = new FormData();
            var text = $(this).text()
            $(this).prop("disabled", true);
            $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            var me = this;
            form_data.append('name', name)
            form_data.append('destination', destination)
            form_data.append('psw', psw)
            form_data.append('set_default', set_default)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/add_new_list.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html(text);
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html(text);
                    if (data.indexOf("成功添加新清單") > -1) {
                        $('#select_list_modal').modal('hide');
                        $('#select_list_modal_footer').css('display', 'block')
                        setCookie('list_name', name, 30);
                        $('#list_related_id').val(decodeURI(getCookie("list_name")))
                        reset_list()
                        get_total_li()
                    }
                }
            })
        });

        $(document).on('click', '#choose_exist_list_dropdown', function (e) {
            $('#choose_exist_list_dropdown_list').toggleClass('active');
        });

        $(document).on('click', '#choose_baggage_no', function (e) {
            $('#choose_baggage_no_dropdown_list').toggleClass('active');
        });

        $('.choose_baggage_no_dropdown_list_item').on('click', function () {
            var itemValue = $(this).data('value');
            var title_size = $(this).data('value') + 8;
            $('.select-dropdown__button span').text($(this).text()).parent().attr('data-value', itemValue);
            if (itemValue != ' ' && itemValue != '') {
                setCookie('checklist_showno', encodeURI(itemValue))
            }
            if (itemValue == ' ' || itemValue == '') {
                eraseCookie('checklist_showno')
            }
            $('#choose_baggage_no_dropdown_list').toggleClass('active');
            $(".todos li").each(function () {
                if ($(this).text().indexOf(itemValue) >= 1) {
                    console.log($(this).text())
                    $(this).css('display', 'block')
                    get_total_li()
                } else {
                    $(this).css('display', 'none')
                    get_total_li()
                }
            })
        });

        $(document).on('click', '.choose_exist_list_item', function (e) {//選擇清單時，判斷有沒有password
            var psw = $(this).data('psw');
            var itemValue = $(this).data('value');
            if (getCookie('list_name')) {
                var cookies = getCookie('list_name')
            } else {
                var cookies = ''
            }
            $('#choose_exist_list_dropdown span').text($(this).text()).parent().attr('data-value', itemValue);
            $('#choose_exist_list_dropdown_list').toggleClass('active');
            $('#choose_exist_list_dropdown span').parent().attr('data-psw', psw);
            $('.psw_container').html('')
            if (psw == '1' && cookies != itemValue) { //psw_container have password
                var html = `
            <div class="col-sm-6 col-12 m-auto"style="padding-top: 5px;">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline is-filled m-0">
                        <label for="new_list_psw" class=" form-label">密碼</label>
                        <input type="text" class="form-control" id="new_list_psw" name="new_list_psw"value="" autocomplete="off">
                        <p class="text-sm">此清單創建者已設置密碼，因此請輸入正確的密碼才能進入</p>
                    </div>
                </div>
            </div>
            <button type="button"data-value="${itemValue}" class="btn btn-success text-center"id="select_list_psw_confirm">確認密碼</button>`
                $('.psw_container').html(html)
            } else if (cookies == itemValue) {
                var html = `<button type="button"data-value="${itemValue}" class="btn btn-success text-center"id="select_list_nopsw_confirm">確認進入此清單</button>
            <p class="text-sm">您已在此列表中，所以點擊確認就可以直接進入這個清單</p>`
                $('.psw_container').html(html)
            } else {
                var html = `<button type="button"data-value="${itemValue}" class="btn btn-success text-center"id="select_list_nopsw_confirm">確認進入此清單</button>
            <p class="text-sm">此清單創建者沒有設置密碼，所以點擊確認可以直接進入這個清單</p>`
                $('.psw_container').html(html)
            }
        });

        $(document).on('click', '#select_list_nopsw_confirm', function (e) {//選擇清單點擊按鈕
            var value = $(this).data('value');
            $('#select_list_modal').modal('hide');
            $('#select_list_modal_footer').css('display', 'block')
            setCookie('list_name', encodeURI(value), 30);
            $('#list_related_id').val(decodeURI(getCookie("list_name")))
            setTimeout(() => {
                reset_list()
                get_total_li()
            }, 1000);

        });

        $(document).on('click', '#select_list_psw_confirm', function (e) {//選擇清單有password點擊按鈕
            var value = $(this).data('value');
            var psw = $('#new_list_psw').val();
            var form_data = new FormData();
            var text = $(this).text()
            $(this).prop("disabled", true);
            $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            var me = this;
            form_data.append('value', value)
            form_data.append('psw', psw)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/check_psw.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html(text);
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html(text);
                    if (data.indexOf("密碼正確，數據獲取中") > -1) {
                        $('#select_list_modal').modal('hide');
                        $('#select_list_modal_footer').css('display', 'block')
                        setCookie('list_name', encodeURI(value), 30);
                        $('#list_related_id').val(decodeURI(getCookie("list_name")))
                        setTimeout(() => {
                            reset_list()
                            get_total_li()
                        }, 1000);
                    }
                }
            })
        });

        var imgArray1 = []; /* edit modal upload setting */
        var imgWrap1 = "";

        $(document).on("change", "#capture_upload", function (e) {
            imgWrap1 = $(this).closest('.upload__box').find('.capture_upload_preview');
            var maxLength = $(this).attr('data-max_length');
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

                if (!f.type.match('image.*')) {
                    var el = document.createElement("div");
                    el.className = "snackbar";
                    var y = document.getElementById("snackbar-container");
                    el.innerHTML = "<span style='color:red;'><i class='fa-solid fa-circle-exclamation'></i>只能上傳JPG或PNG圖片</span>";
                    y.append(el);
                    el.className = "snackbar show";
                    setTimeout(function () {
                        el.className = el.className.replace("snackbar show", "snackbar");
                    }, 3000);
                    return;
                }
                var totalfiles = document.getElementById('capture_upload').files.length;
                for (var index = 0; index < totalfiles; index++) {
                    if (document.getElementById('capture_upload').files[index].size / 1024 / 1024 > '20') {
                        var size = Math.round(document.getElementById('capture_upload').files[index].size / 1024 / 1024)
                        var el = document.createElement("div");
                        el.className = "snackbar";
                        var y = document.getElementById("snackbar-container");
                        el.innerHTML = "<span style='color:red;'><i class='fa-solid fa-circle-exclamation'></i>請上傳小於20mb的文件(現在：" + size + "MB)</span>";
                        y.append(el);
                        el.className = "snackbar show";
                        setTimeout(function () {
                            el.className = el.className.replace("snackbar show", "snackbar");
                        }, 3000);
                        return
                    }
                }

                var len = 0;
                for (var i = 0; i < imgArray1.length; i++) {
                    if (imgArray1[i] !== undefined) {
                        len++;
                    }
                }

                imgArray1.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                    var html = "<div class='upload__img-box'>" +
                        "<div style='background-image: url(" + e.target.result + ")' data-number='" +
                        $(".upload__img-close").length + "' data-file='" + f.name +
                        "' class='img-bg'><div class='upload__img-close'></div><a style='cursor:pointer' data-src=" +
                        e.target.result + " data-fancybox><div class='upload__img-fancybox'></div></div></div>";
                    imgWrap1.append(html);
                    iterator++;
                }
                reader.readAsDataURL(f);
            });
        });

        $(document).on('click', ".chooselist", function (e) {//sidebar choost list button click
            $('#select_list_modal').modal('show')
            set_select_list_data()
        });

        $('#edit_modal_content').on('click', ".upload__img-close:not(.exist_image_delete)", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray1.length; i++) {
                if (imgArray1[i].name === file) {
                    imgArray1.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });

        $('#edit_modal_content').on('click', ".exist_image_delete", function (e) {
            var related = $(this).parent().data("related");
            var filename = $(this).parent().data("name");
            var id = $(this).parent().data("id");
            var me = $(this)
            var form_data = new FormData();
            form_data.append('related', related)
            form_data.append('filename', filename)
            form_data.append('id', id)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/delete_img.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    toastbar(data, 'red')
                    if (data.indexOf("圖片已被刪除") > -1 || data.indexOf("圖片不存在") > -1) {
                        for (var i = 0; i < imgArray1.length; i++) {
                            if (imgArray1[i].name === filename) {
                                imgArray1.splice(i, 1);
                                break;
                            }
                        }
                        $(me).parent().parent().remove();
                    }

                }
            })


        });

        function reset_list() {
            $('#list_related_id').val(decodeURI(getCookie("list_name")))
            $('.mainmenu_edit').attr('data-id', decodeURI(getCookie("list_name")));
            $('.mainmenu_delete').attr('data-id', decodeURI(getCookie("list_name")));
            $('.mainmenu_psw').attr('data-id', decodeURI(getCookie("list_name")));
            $('.mainmenu_reset').attr('data-id', decodeURI(getCookie("list_name")));
            var scrollp = $('.todo_content').scrollTop()
            for (var j = 1; j <= 7; j++) {
                $(`#ul${j}`).html('')
            }
            var form_data = new FormData();
            form_data.append('related', $('#list_related_id').val())
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/fetch_list.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    var len = data.length;
                    for (var i = 0; i < len; i++) {
                        var name = data[i].title
                        var number = data[i].quantity
                        var check = data[i].check
                        if (data[i].screen_shot != '') {
                            var icon = '<i class="fa-regular fa-images"style="color: inherit;"></i>'
                        } else {
                            var icon = ''
                        }
                        if (data[i].remark != '') {
                            var icon2 = '<i class="fa-solid fa-comment-dots"style="color: inherit;"></i>'
                        } else {
                            var icon2 = ''
                        }
                        switch (check) {
                            case '1': {
                                check = 'checked'
                                break;
                            }
                            case '2': {
                                check = ''
                                break;
                            }
                            default: {
                                check = ''
                                break;
                            }
                        }//1️⃣2️⃣3️⃣4️⃣
                        var baggage_no = data[i].baggage_no.trim()
                        switch (baggage_no) {
                            case 'baggage1': {
                                var baggage_sybmol = "1️⃣";
                                break;
                            }
                            case 'baggage2': {
                                var baggage_sybmol = "2️⃣";
                                break;
                            }
                            case 'baggage3': {
                                var baggage_sybmol = "3️⃣";
                                break;
                            }
                            case 'baggage4': {
                                var baggage_sybmol = "4️⃣";
                                break;
                            }
                            default: {
                                var baggage_sybmol = "";
                                break;
                            }
                        }
                        var itemValue = $('#choose_baggage_no').attr('data-value');
                        if (itemValue != '') {
                            if (itemValue == baggage_sybmol) {
                                var display = 'style="display: block;"'
                            } else {
                                var display = 'style="display: none;"'
                            }
                        }
                        var type = data[i].type.trim()
                        switch (type) {
                            case '電子產品': {
                                var ul = "ul1";
                                break;
                            }
                            case '衣物': {
                                var ul = "ul2";
                                break;
                            }
                            case '清潔用品': {
                                var ul = "ul3";
                                break;
                            }
                            case '文件': {
                                var ul = "ul4";
                                break;
                            }
                            case '健康': {
                                var ul = "ul5";
                                break;
                            }
                            case '一般用品': {
                                var ul = "ul6";
                                break;
                            }
                            case '食物': {
                                var ul = "ul7";
                                break;
                            }
                            default: {
                                var ul = "not_found";
                                break;
                            }
                        }
                        const html =
                            `<li data-id="${data[i].id}"${display}>
                    <div class="row w-100 align-items-center">
                    <span class="col-md-11 col-9 overflow-hidden p-0 ">
                    <input type="checkbox"${check} class="item_checkbox"data-id="${data[i].id}" id="ulitem${data[i].id}" />
                    <label for="ulitem${data[i].id}"class="align-items-center d-flex text-truncate">
                        <span class="check"></span>${baggage_sybmol} ${name} * <span id="content_quantity${data[i].id}">${number}</span><span>${icon}${icon2}</span>
                    </label>
                    </span>
                    <span class="col-md-1 col-3 d-flex justify-content-end p-0">
                        <i class="fa-solid fa-info first_menu_info"data-name="${name}"data-id="${data[i].id}"></i>
                        <i class="fa-solid fa-plus-minus quantity"data-quantity="${data[i].quantity}"data-id="${data[i].id}"></i>
                        <div class="pulldown">
                            <i class="fa-solid fa-list-ul more_info pulldown-toggle"data-name="${name}"data-id="${data[i].id}"></i>
                        </div>
                    </span>
                    </div>
                </li>`
                        $('')
                        document.getElementById(ul).innerHTML += html;
                        get_total_li()
                    }
                    $('.todo_content').animate({
                        scrollTop: `${scrollp}px`
                    }, 500);
                }
            })
            var form_data = new FormData();
            form_data.append('related', decodeURI(getCookie("list_name")))
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/get_destin.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data[0] == null) {
                        document.cookie = 'list_name' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
                        $('.chooselist').trigger('click')
                        $('#select_list_modal').modal({
                            backdrop: 'static',
                            keyboard: true
                        })
                        toastbar('找不到當前清單，請選擇其他清單查看', 'red')
                    }

                    var destination = data[0].destination;
                    switch (destination) {
                        case '香港': {
                            bg_img = 'https://static.dw.com/image/61713800_1006.jpg'
                            break;
                        }
                        case '波士頓': {
                            bg_img = 'https://a.travel-assets.com/findyours-php/viewfinder/images/res70/530000/530953-cambridge-town.jpg'
                            break;
                        }
                        case '三藩市': {
                            bg_img = 'https://res.klook.com/image/upload/Mobile/City/ct1vkydy5zb3cdltfmse.jpg'
                            break;
                        }
                        case 'Jackson Hole': {
                            bg_img = 'https://upload.wikimedia.org/wikipedia/commons/d/d0/Barns_grand_tetons.jpg'
                            break;
                        }
                        case 'Yellowstone': {
                            bg_img = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYlNL3VGkA3YXjnzwPPRoRNE-dEtVXbUZppg&usqp=CAU'
                            break;
                        }
                        case '洛杉磯': {
                            bg_img = 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/HollywoodSign.jpg/640px-HollywoodSign.jpg'
                            break;
                        }
                        case '其他': {
                            bg_img = 'https://static.vecteezy.com/system/resources/previews/000/207/535/original/desert-road-trip-vector.jpg'
                            break;
                        }
                        default: {
                            bg_img = 'https://static.vecteezy.com/system/resources/previews/000/207/535/original/desert-road-trip-vector.jpg'
                            break;
                        }
                    }
                    $('.cover-img .cover-inner').css('background-image', `url(${bg_img})`);
                    $('.cover-img .cover-inner h3').html(`${data[0].extra}`);
                    $('.cover-img .cover-inner h6').html(`目的地：${data[0].destination}`);
                }
            })
            $('#show_list_name').html(decodeURI(getCookie("list_name")))
            setTimeout(() => {
                get_total_li()
            }, 1500);

        }

        function change_item_name_text() {
            $('#show_list_name').html($("#list_related_id").val())
        };

        $(document).on('change', '.item_checkbox', function (e) { //項目checked 和 not-checked
            if ($(this).is(':checked')) { //Checked
                var checked = '1'
            } else {
                var checked = '2'
            }
            var form_data = new FormData();
            form_data.append('check', checked)
            form_data.append('id', $(this).attr("data-id"))
            form_data.append('related', $('#list_related_id').val())
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/change_checked.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
            })
            get_total_li()
        });

        $(document).on('click', '.menu_delete_btn', function (e) {//項目刪除點擊顯示modal
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            var name = $(`label[for='ulitem${id}']`).text().trim()
            if (getCookie('show_delete_checklist')) {
                $('#delete_confirm_modal').modal('show')
                $(`#delete_item`).text(name)
                $('.delete_confirm').attr('data-id', id)
            } else {
                var form_data = new FormData();
                var text = $(this).text()
                var me = this;
                form_data.append('id', id)
                form_data.append('related', related)
                $.ajax({
                    type: "POST",
                    url: "../../system/php/checklist/delete_item.php",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    error: function (xhr, ajaxOptions, thrownError) {
                        toastbar(thrownError + '(' + xhr.status + ')', 'red')
                        $(me).prop("disabled", false);
                        $(me).html(text);
                    },
                    success: function (data) {
                        toastbar(data)
                        $(me).prop("disabled", false);
                        $(me).html(text);
                        if (data.indexOf("成功刪除") > -1) {
                            $('#delete_confirm_modal').modal('hide');
                            $(`li[data-id='${id}']`).remove()
                            get_total_li()
                        }
                    }
                })
            }

        });

        $('#show_delete_modal1').on('change', function () {
            if ($(this).is(':checked')) {
                setCookie('show_delete_checklist', 'yes', 60)
                $('#show_delete_modal').prop('checked', true);
            } else {
                eraseCookie(`show_delete_checklist`)
                $('#show_delete_modal').prop('checked', false);
            }
        });
        $('#show_delete_modal').on('change', function () {
            if ($(this).is(':checked')) {
                setCookie('show_delete_checklist', 'yes', 60)
                $('#show_delete_modal1').prop('checked', true);
            } else {
                eraseCookie(`show_delete_checklist`)
                $('#show_delete_modal1').prop('checked', false);
            }
        });

        $(document).on('click', '.delete_confirm', function (e) {//項目刪除確認
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            var form_data = new FormData();
            var text = $(this).text()
            $(this).prop("disabled", true);
            $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            var me = this;
            form_data.append('id', id)
            form_data.append('related', related)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/delete_item.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html(text);
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html(text);
                    if (data.indexOf("成功刪除") > -1) {
                        $('#delete_confirm_modal').modal('hide');
                        $(`li[data-id='${id}']`).remove()
                        get_total_li()
                    }
                }
            })
        });

        $(document).on('click', '.first_menu_info', function (e) {
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            var name = $(`label[for='ulitem${id}']`).text().trim()
            if (name.indexOf("*") === -1) {
                var full_name = name;
            } else {
                var full_name = name.substring(0, name.indexOf("*")); //name
            }
            $('#more_info__modal').modal('show')
            $('.modal_more_info_content').html('')
            var form_data = new FormData();
            form_data.append('related', related)
            form_data.append('content', full_name)
            $('.modal_more_info_content').html('<h4 class="text-dark text-center">系統正在獲取數據，請稍候...</h4>')
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/fetch_single.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    var baggage_no = data[0].baggage_no.trim()
                    switch (baggage_no) {
                        case 'baggage1': {
                            var baggage_sybmol = "1️⃣";
                            break;
                        }
                        case 'baggage2': {
                            var baggage_sybmol = "2️⃣";
                            break;
                        }
                        case 'baggage3': {
                            var baggage_sybmol = "3️⃣";
                            break;
                        }
                        case 'baggage4': {
                            var baggage_sybmol = "4️⃣";
                            break;
                        }
                        default: {
                            var baggage_sybmol = "";
                            break;
                        }
                    }
                    const html =
                        `<div class="text-dark">
                        <h5>名稱：${data[0].title}</h5>
                        <h5>數量：${data[0].quantity}</h5>
                        <h5>所屬類別：${data[0].type} ( 行李${baggage_sybmol} )</h5>
                        <h5>創建數據時間：${data[0].create_time}</h5>
                        <h5>最後編輯時間：${data[0].last_edit_time}</h5>
                        <h5>描述：${data[0].remark}</h5>
                        <div class="capture_upload_preview_exist_view"></div>
                    </div>`
                    $('.modal_more_info_content').html(html)
                    if (data[0].screen_shot != '') {
                        screen_shot = data[0].screen_shot
                        spilt = screen_shot.split(" ");
                        for ($i = 0; $i < spilt.length - 1; $i++) {
                            console.log(spilt[$i])
                            var exist_img = "<div class='upload__img-box'>" +
                                "<div style='background-image: url(" + spilt[$i] + ")' data-name='" +
                                spilt[$i] + "' data-id='" + data[0].id + "' data-related='" + data[0].related +
                                "' class='img-bg'><a style='cursor:pointer;right: 10px;' data-src='" + spilt[$i] + "' data-fancybox><div class='upload__img-fancybox'></div></div></div>";
                            $('.capture_upload_preview_exist_view').append(exist_img);
                        }
                    }
                    //console.log(data)
                }
            })
        });

        $(document).on('click', '.menu_view_btn', function (e) {
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            var name = $(`label[for='ulitem${id}']`).text().trim()
            if (name.indexOf("*") === -1) {
                var full_name = name;
            } else {
                var full_name = name.substring(0, name.indexOf("*")); //name
            }
            $('#more_info__modal').modal('show')
            $('.modal_more_info_content').html('<h4 class="text-dark text-center">系統正在獲取數據，請稍候...</h4>')
            var form_data = new FormData();
            form_data.append('related', related)
            form_data.append('content', full_name)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/fetch_single.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    var baggage_no = data[0].baggage_no.trim()
                    switch (baggage_no) {
                        case 'baggage1': {
                            var baggage_sybmol = "1️⃣";
                            break;
                        }
                        case 'baggage2': {
                            var baggage_sybmol = "2️⃣";
                            break;
                        }
                        case 'baggage3': {
                            var baggage_sybmol = "3️⃣";
                            break;
                        }
                        case 'baggage4': {
                            var baggage_sybmol = "4️⃣";
                            break;
                        }
                        default: {
                            var baggage_sybmol = "";
                            break;
                        }
                    }
                    const html =
                        `<div class="text-dark">
                        <h5>名稱：${data[0].title}</h5>
                        <h5>數量：${data[0].quantity}</h5>
                        <h5>所屬類別：${data[0].type} ( 行李${baggage_sybmol} )</h5>
                        <h5>創建數據時間：${data[0].create_time}</h5>
                        <h5>最後編輯時間：${data[0].last_edit_time}</h5>
                        <h5>描述：${data[0].remark}</h5>
                        <div class="capture_upload_preview_exist_view"></div>
                    </div>`
                    $('.modal_more_info_content').html(html)
                    if (data[0].screen_shot != '') {
                        screen_shot = data[0].screen_shot
                        spilt = screen_shot.split(" ");
                        for ($i = 0; $i < spilt.length - 1; $i++) {
                            console.log(spilt[$i])
                            var exist_img = "<div class='upload__img-box'>" +
                                "<div style='background-image: url(" + spilt[$i] + ")' data-name='" +
                                spilt[$i] + "' data-id='" + data[0].id + "' data-related='" + data[0].related +
                                "' class='img-bg'><a style='cursor:pointer;right: 10px;' data-src='" + spilt[$i] + "' data-fancybox><div class='upload__img-fancybox'></div></div></div>";
                            $('.capture_upload_preview_exist_view').append(exist_img);
                        }
                    }
                    //console.log(data)
                }
            })
        });

        $(document).on('click', '.menu_edit_btn', function (e) {
            var id = $(this).attr("data-id")
            var related = $('#list_related_id').val()
            var name = $(`label[for='ulitem${id}']`).text().trim()
            if (name.indexOf("*") === -1) {
                var full_name = name;
            } else {
                var full_name = name.substring(0, name.indexOf("*")); //name
            }
            $('#edit_modal').modal({
                backdrop: 'static',
                keyboard: true
            })
            $('#edit_modal_title').html(`添加/編輯 【${full_name}】 的數據`)
            $('#edit_modal_content').html('')
            var form_data = new FormData();
            var me = this;
            form_data.append('related', related)
            form_data.append('content', full_name)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/fetch_single.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    /*  console.log(data) */
                    var baggage_no = data[0].baggage_no.trim()
                    switch (baggage_no) {
                        case 'baggage1': {
                            var b1 = ["checked", "", "", ""];
                            break;
                        }
                        case 'baggage2': {
                            var b1 = ["", "checked", "", ""];
                            break;
                        }
                        case 'baggage3': {
                            var b1 = ["", "", "checked", ""];
                            break;
                        }
                        case 'baggage4': {
                            var b1 = ["", "", "", "checked"];
                            break;
                        }
                        default: {
                            var b1 = ["", "", "", ""];
                            break;
                        }
                    }
                    const html =
                        `<form id="edit_form" action="" method="post" onkeydown="return event.key != 'Enter';">
                        <input type="hidden" name="edit_id" id="edit_id"value="${data[0].id}" disabled>
                        <input type="hidden" name="edit_old_title" id="edit_old_title"value="${data[0].title}" disabled>
                        
                        
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="edit_title" class=" form-label">名稱</label>
                                    <input type="text" class="form-control" id="edit_title" name="edit_title"value="${data[0].title}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline is-filled">
                                    <label for="edit_quantity" class=" form-label">數量</label>
                                    <input type="text" class="form-control" id="edit_quantity" name="edit_quantity"value="${data[0].quantity}" autocomplete="off">
                                    <p class="text-sm">物品數量應以數字開頭，如果需要，可以在後面輸入單位</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                    <label for="edit_airline" class=" form-label m-0 col-12 col-md-4 text-center">選擇該物品放入哪個行李(默認為行李1,非必填)</label>
                    <div class=" col-12 col-md-4 text-center">
                        <input type="radio" class="custom_radio" id="baggage1" name="edit_which_baggage" value="baggage1"${b1[0]}>
                        <label for="baggage1" style="cursor:pointer">行李1</label>
            
                        <input type="radio" class="custom_radio" id="baggage2" name="edit_which_baggage" value="baggage2"${b1[1]}>
                        <label for="baggage2" style="cursor:pointer">行李2</label>
            
                        <input type="radio" class="custom_radio" id="baggage3" name="edit_which_baggage" value="baggage3"${b1[2]}>
                        <label for="baggage3" style="cursor:pointer">行李3</label>
            
                        <input type="radio" class="custom_radio" id="baggage4" name="edit_which_baggage" value="baggage4"${b1[3]}>
                        <label for="baggage4" style="cursor:pointer">行李4</label>
                    </div>
                </div>
                    <div class="select-dropdown">
                        <button type="button" role="button"style="margin-block:0" id="edit_type"data-initialval="${data[0].type}" data-value="${data[0].type}" class="select-dropdown__button edit">
                            <span>${data[0].type}</span> <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <ul class="select-dropdown__list "id="edit_type_list">
                            <li data-value="電子產品" class="select-dropdown__list-item edit_type_list_item">電子產品</li>
                            <li data-value="衣物" class="select-dropdown__list-item edit_type_list_item">衣物</li>
                            <li data-value="清潔用品" class="select-dropdown__list-item edit_type_list_item">清潔用品</li>
                            <li data-value="文件" class="select-dropdown__list-item edit_type_list_item">文件</li>
                            <li data-value="健康" class="select-dropdown__list-item edit_type_list_item">健康</li>
                            <li data-value="一般用品" class="select-dropdown__list-item edit_type_list_item">一般用品</li>
                            <li data-value="食物" class="select-dropdown__list-item edit_type_list_item">食物</li>
                        </ul>
                    </div>
                    <div class="mb-3 upload__box text-center">
                        <label for="captures" class=" form-label">截圖(不限數量，限制為 .png 或 .jpg)</label>
                        <div class='file file--upload '>
                            <label for='capture_upload'>
                                <i class="fa-solid fa-cloud-arrow-down"></i>點擊上傳
                            </label>
                            <input id='capture_upload' type='file' multiple="" name="files[]"  accept="image/*" />
                        </div>
                        <div class="capture_upload_preview"></div>
                    </div>
                    <div class="mb-3 upload__box text-center">
                        <label for="captures" class=" form-label">現有截圖</label>
                        <div class="capture_upload_preview_exist"></div>
                    </div>
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline is-filled">
                            <label for="edit_description" class=" form-label">描述</label>
                            <textarea style="height:150px"class="form-control" id="edit_description" name="edit_description"autocomplete="off">${data[0].remark}</textarea>
                        </div>
                    </div>
                    </form>`
                    $('#edit_modal_content').html(html)
                    if (data[0].screen_shot != '') {
                        screen_shot = data[0].screen_shot
                        spilt = screen_shot.split(" ");
                        for ($i = 0; $i < spilt.length - 1; $i++) {
                            console.log(spilt[$i])
                            var exist_img = "<div class='upload__img-box'>" +
                                "<div style='background-image: url(" + spilt[$i] + ")' data-name='" +
                                spilt[$i] + "' data-id='" + data[0].id + "' data-related='" + data[0].related +
                                "' class='img-bg'><div class='upload__img-close exist_image_delete'></div><a style='cursor:pointer' data-src='" + spilt[$i] + "' data-fancybox><div class='upload__img-fancybox'></div></div></div>";
                            $('.capture_upload_preview_exist').append(exist_img);
                        }
                    }
                    //console.log(data)
                }
            })
        });
        $(document).on('click', '.edit_confirm_btn', function (e) {
            var text = $(this).text()
            $(this).prop("disabled", true);
            if (document.getElementById('capture_upload').files.length != 0) {
                $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>上傳照片可能需要更長的時間');
            } else {
                $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
            }

            var me = this;
            e.preventDefault();
            var form_data = new FormData();
            var totalfiles = document.getElementById('capture_upload').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('capture_upload').files[index]); //files[]係upload.php用嘅名
            }
            form_data.append('edit_id', $('#edit_id').val())
            form_data.append('related', $('#list_related_id').val())
            form_data.append('totalfiles', totalfiles)
            form_data.append('edit_title', $('#edit_title').val())
            form_data.append('old_title', $('#edit_old_title').val())
            form_data.append('edit_quantity', $('#edit_quantity').val())
            form_data.append('edit_type_initial', $('#edit_type').attr("data-initialval"))
            form_data.append('edit_type', $('#edit_type').attr("data-value"))
            form_data.append('edit_description', $('#edit_description').val())
            form_data.append('baggage_no', $("input[name=edit_which_baggage]:checked").val())
            var scrollp = $('.todo_content').scrollTop()
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/edit_item.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).prop("disabled", false);
                    $(me).html(text);
                },
                success: function (data) {
                    toastbar(data)
                    $(me).prop("disabled", false);
                    $(me).html(text);
                    if (data.indexOf("成功更改") > -1) {
                        reset_list()
                        get_total_li()
                        $('.todo_content').animate({
                            scrollTop: `${scrollp}px`
                        }, 500);
                        $('#edit_modal').modal('hide')
                    }

                }
            })
        });
        $(document).on('click', '#edit_type', function (e) {
            $('#edit_type_list').toggleClass('active');
        });
        $(document).on('click', '.edit_type_list_item', function (e) {
            var itemValue = $(this).data('value');
            $('#edit_type span').text($(this).text()).parent().attr('data-value', itemValue);
            $('#edit_type_list').toggleClass('active');
        });

        $(document).on('click', '.more_info', function (e) {
            var id = $(this).attr("data-id")
            var name = $(this).attr("data-name")
            var html = `<div class="pulldown-menu"data-index="${id}">
                    <ul>
                        <li>
                            <p class="p-1 text-sm font-weight-bold text-dark text-truncate"style="width:95%;margin-bottom:5px">物品：${name}</p>
                        </li>
                        <li style="margin-top: 5px;">
                            <i class="fa-solid fa-pen-to-square menu_edit_btn w-100"data-id="${id}">&nbsp;&nbsp;編輯內容</i>
                        </li>
                        <li> 
                            <i class="fa-solid fa-trash menu_delete_btn w-100"data-id="${id}">&nbsp;&nbsp;刪除數據</i>
                        </li>
                            <li><i class="fa-solid fa-database menu_view_btn w-100"data-id="${id}">&nbsp;&nbsp;查看詳細資訊</i>
                        </li>
                    </ul>
                </div>`
            // alert(e.pageX + ' , ' + e.pageY);
            //alert(`#more_info_menu${id}`.length)
            if ($(`.pulldown-menu[data-index="${id}" ]`).length === 0) {
                $(this).after(html)
            }
            $('.pulldown-toggle').removeClass('open');
            if (!$(this).hasClass('open')) {
                $(this).addClass('open');
            } else {
                $(this).removeClass('open');
            }
        });

        $(document).on('click', '.qty-btn-confirm:not(".disabled")', function (e) {
            var id = $(this).parent().prev().attr("data-id")
            var new_quantity = $(`.numberstyle[data-id="${id}" ]`).val()
            var old_quantity = $(`.numberstyle[data-id="${id}" ]`).attr("data-initialno")
            var unit = $(`.numberstyle[data-id="${id}" ]`).attr("data-unit")
            var form_data = new FormData();
            var me = this;
            form_data.append('id', id)
            form_data.append('new_quantity', new_quantity)
            form_data.append('old_quantity', old_quantity)
            form_data.append('unit', unit)
            form_data.append('related', $('#list_related_id').val())
            $(this).addClass('disabled')
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/change_quantity.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                    $(me).removeClass('disabled')

                },
                success: function (data) {
                    toastbar(data)
                    $(me).parent().remove()
                    $(me).removeClass('disabled')
                    if (data.indexOf("成功修改數量") > -1) {
                        $(`#content_quantity${id}`).text(`${new_quantity}${unit}`)
                        $(`.quantity[data-id="${id}" ]`).attr('data-quantity', new_quantity + unit)
                    }
                }
            })
        });

        $(document).on('click', '.quantity', function (e) {
            var id = $(this).attr("data-id")
            var quantity = $(this).attr("data-quantity")
            var initialno = parseInt(quantity.replace(/[^0-9]/ig))
            var unit = quantity.replace(/[^\u4e00-\u9fa5]/gi, '')
            var html = `<input class="numberstyle" type="number" min="1"max="1000"data-id="${id}"data-unit="${unit}"data-initialno="${initialno}" step="1" value="${initialno}">`
            // alert(e.pageX + ' , ' + e.pageY);
            //alert(`#more_info_menu${id}`.length)
            if ($(`.numberstyle[data-id="${id}" ]`).length === 0) {
                $(this).after(html)
                $(`.numberstyle[data-id="${id}" ]`).numberstyle();
            }
        });

        $(document).click(function (e) {
            if (e.target.className.indexOf("pulldown-toggle") === -1 && e.target.className.indexOf("pulldown-menu") === -1 &&
                e.target.className.indexOf("main_menu") === -1) {
                $('.pulldown-toggle').removeClass('open');
            }
            if (e.target.className.indexOf("searchInputIcon") === -1 && e.target.className.indexOf("pulldown-menu") === -1) {
                if ($("#search_bar").val() === '') {
                    $('#search_bar').blur()
                    $('#search_bar').removeClass("unfocus")
                }
            }
        });

        function fetch_single_list(content, ul, related, baggageno) {
            if (content.indexOf("*") === -1) {
                var name = content;
                var number = '1'
            } else {
                var number = content.substr(content.indexOf("*") + 1) //quantity
                var name = content.substring(0, content.indexOf("*")); //name
            }
            //console.log(name + '<br>'+number)
            var form_data = new FormData();
            form_data.append('related', related)
            form_data.append('content', name)
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/fetch_single.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if(data.length === 0){
                        toastbar('生成數據時出錯【No Data】','red')
                    }
                    var len = data[0].length;
                    var name = data[0].title
                    var number = data[0].quantity
                    var check = data[0].check
                    switch (check) {
                        case '1': {
                            check = 'checked'
                            break;
                        }
                        case '2': {
                            check = ''
                            break;
                        }
                        default: {
                            check = ''
                            break;
                        }
                    }
                    var type = data[0].type.trim()
                    switch (type) {
                        case '電子產品': {
                            var ul = "ul1";
                            break;
                        }
                        case '衣物': {
                            var ul = "ul2";
                            break;
                        }
                        case '清潔用品': {
                            var ul = "ul3";
                            break;
                        }
                        case '文件': {
                            var ul = "ul4";
                            break;
                        }
                        case '健康': {
                            var ul = "ul5";
                            break;
                        }
                        case '一般用品': {
                            var ul = "ul6";
                            break;
                        }
                        case '食物': {
                            var ul = "ul7";
                            break;
                        }
                        default: {
                            var ul = "not_found";
                            break;
                        }
                    }
                    var baggage_no = data[0].baggage_no.trim()
                    switch (baggage_no) {
                        case 'baggage1': {
                            var baggage_sybmol = "1️⃣";
                            break;
                        }
                        case 'baggage2': {
                            var baggage_sybmol = "2️⃣";
                            break;
                        }
                        case 'baggage3': {
                            var baggage_sybmol = "3️⃣";
                            break;
                        }
                        case 'baggage4': {
                            var baggage_sybmol = "4️⃣";
                            break;
                        }
                        default: {
                            var baggage_sybmol = "";
                            break;
                        }
                    }
                    const html =
                        `<li data-id="${data[0].id}">
                        <div class="row w-100 align-items-center">
                            <span class="col-md-11 col-9 overflow-hidden p-0 ">
                                <input type="checkbox" ${check} class="item_checkbox" data-id="${data[0].id}" id="ulitem${data[0].id}" />
                                <label for="ulitem${data[0].id}" class="align-items-center d-flex text-truncate">
                                    <span class="check"></span>${baggage_sybmol} ${name} * <span id="content_quantity${data[0].id}">${number}</span>
                                </label>
                            </span>
                            <span class="col-md-1 col-3 d-flex justify-content-end p-0">
                                <i class="fa-solid fa-info first_menu_info"data-name="${name}"data-id="${data[0].id}"></i>
                                <i class="fa-solid fa-plus-minus quantity" data-quantity="${data[0].quantity}" data-id="${data[0].id}"></i>
                                <div class="pulldown">
                                    <i class="fa-solid fa-list-ul more_info pulldown-toggle"data-name="${name}"data-id="${data[0].id}"></i>
                                </div>
                            </span>
                        </div>
                    </li>`
                    if ($(`#${ul} li`).length >= 1) {
                        $(html).insertBefore(`#${ul} li:first-child`);
                    } else if ($(`#${ul} li`).length <= 0) {
                        $(`#${ul}`).append(html);
                    }
                    get_total_li()
                }
            })
        }
        $(document).on('submit', 'form.add_form', function (e) {
            e.preventDefault()
            var form_data = new FormData();
            form_data.append('related', $('#list_related_id').val())
            form_data.append('content', $('#insert_input').val()) //remove space$('#insert_input').val().replace(/\s+/g, '')
            form_data.append('type', $('.add_form').attr("data-type"))
            form_data.append('baggage_no', $("input[name=which_baggage]:checked").val())
            $(this).prop('disabled', true);
            var scrollp = $('.todo_content').scrollTop()
            $.ajax({
                type: "POST",
                url: "../../system/php/checklist/add_list.php",
                data: form_data,
                contentType: false,
                processData: false,
                error: function (xhr, ajaxOptions, thrownError) {
                    toastbar(thrownError + '(' + xhr.status + ')', 'red')
                },
            })
                .done(function (data) {
                    $(this).prop('disabled', false);
                    toastbar(data)
                    if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功添加至伺服器</span>") > -1) {
                        fetch_single_list($('#insert_input').val(), $('.add_form').attr("data-ul"), $('#list_related_id').val()
                            , $("input[name=which_baggage]:checked").val())
                        $("#insert_input").val('');
                        $('#insert_input').trigger('blur');
                        $('.todo_content').animate({
                            scrollTop: `${scrollp}px`
                        }, 500);
                        $('#search_bar_result').css('display', 'none')
                        $('#search_bar_result').removeClass('active')
                    }
                    if (data.indexOf("已有重複名稱的內容") > -1) {
                        var itemval = data.substr(data.indexOf("[") + 1)
                        var remove = itemval.replace("]</span>", "");
                        var original_scroll = $('.todo_content').scrollTop()
                        $('.todo_content').animate({
                            scrollTop: $(`li[data-id="${remove}`).position().top - 30
                        }, 500);
                        var interval = setInterval(() => {
                            setTimeout(() => {
                                $(`li[data-id="${remove}`).addClass('alert-danger alert-link')
                                setTimeout(() => {
                                    $(`li[data-id="${remove}`).removeClass('alert-danger alert-link')
                                }, 500);
                            }, 500);
                        }, 1000);
                        setTimeout(() => {
                            clearInterval(interval);
                            $('.todo_content').animate({
                                scrollTop: original_scroll
                            }, 500);
                        }, 6000);

                    }
                });
        })
        document.onvisibilitychange = function () {
            switch (document.visibilityState) {
                case 'visible':
                    var form_data = new FormData();
                    form_data.append('related', $('#list_related_id').val())
                    $.ajax({
                        type: "POST",
                        url: "../../system/php/checklist/check_time.php",
                        data: form_data,
                        contentType: false,
                        processData: false,
                        error: function (xhr, ajaxOptions, thrownError) {
                            toastbar(thrownError + '(' + xhr.status + ')', 'red')
                        },
                    }).done(function (data) {
                        if (data.indexOf("內容更新中，有人在您離開期間更新了資料") > -1) {
                            var el = document.createElement("div");
                            el.className = "snackbar";
                            var y = document.getElementById("snackbar-container");
                            el.style.color = 'white';
                            el.innerHTML = data;
                            y.append(el);
                            el.className = "snackbar show";
                            setTimeout(function () {
                                el.className = el.className.replace("snackbar show", "snackbar");
                            }, 3000);
                            reset_list()
                        }
                    });

                    break;
            }
        };

    }(jQuery)); //number input function close

})