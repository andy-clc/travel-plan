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
  if (getCookie("calendar_default")) {
    var default_date = getCookie("calendar_default").toString()
  } else {
    var default_date = '2023-05-10'.toString()
  }

  if (!getCookie("calendar_time")) {
    setCookie('calendar_time', 'hk', 30);
  }

  if (!getCookie("calendar_view")) {
    setCookie('calendar_view', 'agendaDay', 30);
  }
  function calendar_table_height() {
    if (!getCookie("calendar_table_height")) {
      setCookie('calendar_table_height', '5', 30);
      $('#table_height span').text('5').parent().attr('data-value', '5');
    } else {
      var height = getCookie("calendar_table_height")
      $('.fc-time-grid .fc-slats td').css('height', `${height}em`)
      $('#table_height span').text(height).parent().attr('data-value', height);
    }
  }

  function getcalendar() {
    var scrollp = $('.fc-scroller').scrollTop()
    $('.popover.fade.show').remove();
    $.ajax({
      url: 'https://rm1web.tk/system/php/calendar/fetch_data.php',
      type: 'POST',
    }).done(function (response) {
      $('#calendar').fullCalendar('removeEvents');
      /* $("#calendar").fullCalendar('addEventSource', response); */
      $('#calendar').fullCalendar('rerenderEvents');
      $('#calendar').fullCalendar('refetchEvents');
      /* $('#calendar').fullCalendar('refetchResources'); */
      /* setTimeout(() => {
        $('.fc-scroller').animate({
          scrollTop: `${scrollp}px`
        }, 500);

      }, 500); */
    });

    var time = getCookie('calendar_time').toString()
    if (time == 'hk') {
      $(".show_timezone").attr("src", "https://flagcdn.com/48x36/hk.png");
    } else {
      $(".show_timezone").attr("src", "https://flagcdn.com/48x36/us.png");
    }
  }

  function resetform() {
    $("#newEventModal").modal("hide");
    $('#addrecord').trigger("reset");
    $("#eventtype").attr("data-value", "0");
    $(".select-dropdown__button span").text("項目類型?")
    CKEDITOR.instances.editor2.setData(event.description);

  }

  function reseteditform() {
    $("#editEventModal").modal("hide");
    $('#editrecord').trigger("reset");
    $("#edit_eventtype").attr("data-value", "0");
    $(".select-dropdown__button span").text("項目類型?")
    CKEDITOR.instances.editor3.setData(event.description);

  }
  var newEvent;
  var editEvent;

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
  $(document).ready(function () {
    /*  if (window.matchMedia("(pointer: coarse)").matches) {
       $('.fixed-plugin-button').css('display', 'none')
     } else {
       $('.fixed-plugin-button').css('display', 'flex')
     } */

    setTimeout(() => {
      $('button.fc-refresh-button.fc-button.fc-state-default.fc-corner-right').html('<i class="fa-solid fa-rotate"></i>刷新')
    }, 100);

    $(document).on('click', 'button.fc-refresh-button.fc-button.fc-state-default.fc-corner-right', function (e) {
      setTimeout(() => {
        $('button.fc-refresh-button.fc-button.fc-state-default.fc-corner-right').html('<i class="fa-solid fa-check fa-beat"></i>完成')
        setTimeout(function () {
          $('button.fc-refresh-button.fc-button.fc-state-default.fc-corner-right').html('<i class="fa-solid fa-rotate"></i>刷新')
        }, 1500);
      }, 100);
    });

    var calendar = $('#calendar').fullCalendar({
      customButtons: {
        refresh: {
          click: function () {
            getcalendar()
          }
        },
        printButton: {
          text: '儲存',
          click: function () {
            var view = $('#calendar').fullCalendar('getView');
            if (view.type == 'agendaDay') {
              toastbar('時間表因界面衝突不支持打印', 'red')
            } else {
              document.title = view.title + '之行程(基本版)'
              window.print();
            }
          }
        }
      },
      header: {
        left: 'today,refresh ,printButton',
        center: 'prev, title, next',
        right: 'agendaDay,listDay,listWeek'
      },
      views: {
        listDay: { buttonText: '日程' },
        agendaWeek: {
          columnFormat: 'ddd D/M',
          eventLimit: false
        },
        agendaDay: {
          buttonText: '時間表',
          columnFormat: 'dddd',
          eventLimit: false
        },
        listWeek: {
          buttonText: '週程',
          duration: { days: 7 },
          columnFormat: ''
        }
      },
      eventAfterAllRender: function (view) {
        /* listWeek,agendaDay,agendaWeek*/
        /* if (view.name == "month") {
            $('#calendar').fullCalendar('changeView', 'agendaDay');
        } *//* 
        console.log('eventAfterAllRender') */
        if (getCookie("calendar_view")) {
          var default_view = getCookie("calendar_view").toString()
          $('#calendar').fullCalendar('changeView', default_view.toString());
        } else {
          $('#calendar').fullCalendar('changeView', 'agendaDay');
        }
        /* if(view.type == 'agendaDay'){
          var height = $('.fc-scroller').scrollTop()
          console.log(height)
          $('.fc-scroller').animate({ scrollTop: `${height}px` });
        } */
      },
      eventLimitClick: function (cellInfo, event) {


      },
      eventResize: function (event, delta, revertFunc, jsEvent, ui, view) {
        $('.popover.fade.show').remove();

        function datetimeLocal(datetime) {
          const dt = new Date(datetime);
          dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
          return dt.toISOString().slice(0, 16);
        }
        startDate = datetimeLocal(event.start);
        endDate = datetimeLocal(event.end);
        var form_data = new FormData();
        form_data.append('id', event.id)
        form_data.append('start', startDate)
        form_data.append('end', endDate)
        form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
        $.ajax({
          type: "POST",
          url: "../../system/php/calendar/resize_event.php",
          data: form_data,
          contentType: false,
          processData: false,
          error: function () {
            toastbar('內部文件遺失', 'red')
          },
        })
          .done(function (data) {
            toastbar(data)
            if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功添加至伺服器</span>") > -1) {
              resetform()

            }

          });
      },
      eventDragStart: function (event, jsEvent, ui, view) {
        var draggedEventIsAllDay;
        draggedEventIsAllDay = event.allDay;

      },
      eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
        function datetimeLocal(datetime) {
          const dt = new Date(datetime);
          dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
          return dt.toISOString().slice(0, 16);
        }
        $('.popover.fade.show').remove();
        startDate = datetimeLocal(event.start);
        endDate = datetimeLocal(event.end);
        var form_data = new FormData();
        form_data.append('id', event.id)
        form_data.append('start', startDate)
        form_data.append('end', endDate)
        form_data.append('allDay', event.allDay)
        form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
        $.ajax({
          type: "POST",
          url: "../../system/php/calendar/drop_event.php",
          data: form_data,
          contentType: false,
          processData: false,
          error: function () {
            toastbar('內部文件遺失', 'red')
          },
        })
          .done(function (data) {
            toastbar(data)
            if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功添加至伺服器</span>") > -1) {
              resetform()
            }

          });
      },
      unselect: function (jsEvent, view) {
        $(".dropNewEvent").hide();
      },
      dayClick: function (startDate, jsEvent, view) {
        /* only suitable for month view mode */
        /*   var today = moment();
          var startDate;
          if (view.name == "month") {
              startDate.set({
                  hours: today.hours(),
                  minute: today.minutes()
              });
              alert('Clicked on: ' + startDate.format());
          } */
      },
      validRange: function (nowDate) {
        return {
          start: '2023-03-31',
          end: '2023-05-28'
        };
      },


      select: function (startDate, endDate, jsEvent, view) {
        function datetimeLocal(datetime) {
          const dt = new Date(datetime);
          dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
          return dt.toISOString().slice(0, 16);
        }

        const booking = document.getElementById('add_start_time');
        document.getElementById('add_start_time').value = datetimeLocal(startDate);
        document.getElementById('add_end_time').value = datetimeLocal(endDate);

        $('#newEventModal').modal({
          backdrop: 'true',
          keyboard: true
        })
      },
      eventClick: function (event, jsEvent, view) {
        $('.popover.fade.show').remove();
        /*  editEvent(event); */

      },
      // when view is destroyed, we keep the scroll position in a variable
      viewDestroy: function (view) {
        if (view.type == 'agendaDay' && document.querySelector('.fc-scroller').scrollTop != 0) {
          scrollp = document.querySelector('.fc-scroller').scrollTop;
          /* console.log('destroy'+scrollp) */
        }
      },
      viewRender: function (view, element) {
        $('.popover.fade.show').remove();
        var currentdate = view.intervalStart.format('YYYY-MM-DD')
        setCookie('calendar_default', currentdate, 1);
        if (view.type != "month") {
          var view = $('#calendar').fullCalendar('getView');
          /* console.log(view.type) */
          setCookie('calendar_view', view.type, 30);
        }
        if (view.type == "agendaDay") {
          var table_height = getCookie('calendar_table_height')
          if (table_height != '5') {
            calendar_table_height()
            var scrollp = $('.fc-scroller').scrollTop()
            setTimeout(() => {
              $("#calendar").fullCalendar("render");
              setTimeout(() => {
                $('.fc-scroller').animate({
                  scrollTop: `${scrollp}px`
                }, 50);
                /*  console.log(scrollp) */
              }, 1000);
            }, 20);
          }

        }
      },
      eventAfterAllRender: function (view) {
        /*  if (scroll > 0 && view.type == 'agendaDay' )
         console.log(scroll)
           setTimeout(function () {
             document.querySelector('.fc-scroller').scrollTop = scroll;
           }, 1000); */
        /* console.log($('.fc-scroller').scrollTop()) */
      },
      height: 1200,
      defaultView: getCookie('calendar_view').toString(),
      locale: 'zh-tw',
      timezone: "local",
      //nextDayThreshold: "09:00:00",
      allDaySlot: true,
      displayEventTime: true,
      displayEventEnd: true,
      firstDay: 1,
      weekNumbers: false,
      selectable: true, //可不可以拖動，手機不太ok
      //scrollTimeReset: false,
      weekNumberCalculation: "ISO",
      eventLimit: true,
      eventLimitClick: 'week', //popover
      navLinks: true,
      defaultDate: moment(default_date),
      timeFormat: 'HH:mm',
      defaultTimedEventDuration: '01:00:00',
      editable: true,
      //minTime: '07:00:00',
      //maxTime: '18:00:00',
      slotLabelFormat: 'HH:mm',
      weekends: true,
      nowIndicator: true,
      dayPopoverFormat: 'dddd DD/MM',
      longPressDelay: 0, //the amount of time the user must hold down before an event becomes draggable or a date becomes selectable.
      eventLongPressDelay: 500,
      selectLongPressDelay: 500,
      events: {
        url: 'https://rm1web.tk/system/php/calendar/fetch_data.php?timezone=' + getCookie('calendar_time').toString(),
        error: function () {
          var el = document.createElement("div");
          el.className = "snackbar";
          var y = document.getElementById("snackbar-container");
          el.style.color = 'white';
          el.innerHTML = 'Failed to fetch data';
          y.append(el);
          el.className = "snackbar show";
          setTimeout(function () {
            el.className = el.className.replace("snackbar show", "snackbar");
          }, 3000);
        },
        success: function (data) { }
      },
      loading: function (bool) {
        $('#loading').toggle(bool);
      },

      eventRender: function (event, element, view) {
        /* console.log(event) */
        if (event.type == "交通") {
          element.find("td.fc-list-item-marker.fc-widget-content").html('<i class="fa-solid fa-car-side" style="color: #00ff2a;"></i>')
          element.find(".fc-event-dot").css('display', 'none');
        }
        if (event.type == "住宿") {
          element.find("td.fc-list-item-marker.fc-widget-content").html('<i class="fa-solid fa-square-h" style="color: #ff7907;"></i>')
          element.find(".fc-event-dot").css('display', 'none');
        }
        if (event.type == "活動") {
          element.find("td.fc-list-item-marker.fc-widget-content").html('<i class="fa-solid fa-city" style="color: #fe56fe;"></i>')
          element.find(".fc-event-dot").css('display', 'none');
        }
        if (event.type == "膳食") {
          element.find("td.fc-list-item-marker.fc-widget-content").html('<i class="fa-solid fa-utensils" style="color: #2196f3;"></i>')
          element.find(".fc-event-dot").css('display', 'none');
        }
        if (event.type == "景點") {
          element.find("td.fc-list-item-marker.fc-widget-content").html('<i class="fa-solid fa-map-location-dot" style="color: #f44336;"></i>')
          element.find(".fc-event-dot").css('display', 'none');
        }
        if (event.type == "其他") {
          element.find("td.fc-list-item-marker.fc-widget-content").html('<i class="fa-solid fa-comment-dots" style="color: #fbff00;"></i>')
          element.find(".fc-event-dot").css('display', 'none');
        }
        function datetimeLocal(datetime) {
          const dt = new Date(datetime);
          dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
          return dt.toISOString().slice(0, 16);
        }
        element.bind('dblclick', () => {
          $('.popover.fade.show').remove();
          $('#editEventModal').modal({
            backdrop: 'static',
            keyboard: true
          })
          document.getElementById('edit_title').value = event.title.slice(0, -6);
          document.getElementById('edit_id').innerText = '編號為' + event.id + '的內容';
          document.getElementById('edit_id_input').value = event.id;
          if (event.timezone == 'hk') {
            $("#edit_hktime").prop('checked', true);
            $('label[for="edit_start_time"]').text('開始於(香港時間)：')
            $('label[for="edit_end_time"]').text('結束於(香港時間)：')
          } else {
            $("#edit_hktime").prop('checked', false);
            $('label[for="edit_start_time"]').text('開始於(美國時間)：')
            $('label[for="edit_end_time"]').text('結束於(美國時間)：')
          }

          if (event.allDay == true) {
            $('#edit_end_time').attr("disabled", true);
            document.getElementById('edit_start_time').value = datetimeLocal(event.start);
            document.getElementById('edit_end_time').value = '';
            $("#edit_alldayevent").prop('checked', true);
          } else {
            $('#edit_end_time').attr("disabled", false);
            document.getElementById('edit_start_time').value = datetimeLocal(event.start);
            document.getElementById('edit_end_time').value = datetimeLocal(event.end);
            $("#edit_alldayevent").prop('checked', false);
          }
          $(".select-dropdown__list-item.edit").each(function () {
            var itemValue = $(this).data('value');
            var text = $(this).text();
            if (text == event.type) {
              $('#edit_eventtype span').text($(this).text()).parent().attr('data-value', itemValue);
              $('.select-dropdown__list .edit').toggleClass('active');
            }
          });
          CKEDITOR.instances.editor3.setData(event.description);
          setTimeout(() => {
            $('.popover.fade.show').remove();
          }, 500);

        });
        var startdateEventInfo = moment(event.start).format('HH:mm');
        var startTimeEventInfo = moment(event.start).format('MM/DD');
        var endTimeEventInfo = moment(event.end).format('HH:mm');
        var enddateEventInfo = moment(event.end).format('MM/DD');
        var displayEventDate;

        if (event.allDay == false) {
          displayEventDate = startTimeEventInfo + " " + startdateEventInfo + " 至 " + enddateEventInfo + " " + endTimeEventInfo;
        } else {
          displayEventDate = startTimeEventInfo + "全日活動";
        }
        element.popover({
          title: `<div class="popoverTitleCalendar" >${event.title}</div>`,
          content: `<div class="popoverInfoCalendar ${event.id}">
          <p class="popover_id_hide d-none"> ${event.id}</p>
          <p class="popover_bg_hide d-none"> ${event.backgroundColor}</p>
          <p class="popover_timezone_hide d-none"> ${event.timezone}</p>
          <p class="popover_start_hide d-none"> ${event.start}</p>
          <p class="popover_end_hide d-none"> ${event.end}</p>
          <p class="popover_type_hide d-none"> ${event.type}</p>
          <p class="popover_title_hide d-none"> ${event.title}</p>
          <p class="popover_allday_hide d-none"> ${event.allDay}</p>
          <p class="popover_type m-0 p-0"><strong>類型:</strong> ${event.type}</p>
          <p class="popover_date m-0 p-0"><strong>活動時間:</strong> ${displayEventDate}</p>
          <div class="popoverDescCalendar m-0 p-0"><strong>簡介:</strong> ${event.description}</div>
          </div>`,
          delay: {
            show: "100",
            hide: "10"
          },
          trigger: 'click',
          /* hover focus click */
          placement: 'top',
          animation: true,
          html: true,
          container: 'body'
        });

      },
    })
  })
  function datetimeLocal(datetime) {
    const dt = new Date(datetime);
    dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
    return dt.toISOString().slice(0, 16);
  }
  $(document).on('click', '.popover_edit_btn', function (e) {
    $('#editEventModal').modal({
      backdrop: 'static',
      keyboard: true
    })
    document.getElementById('edit_title').value = $(this).attr('data-title').slice(0, -6)
    document.getElementById('edit_id').innerText = '編號為' + $(this).attr('data-id') + '的內容';
    document.getElementById('edit_id_input').value = $(this).attr('data-id');
    var me = $(this)
    if ($(this).attr('data-timezone') == 'hk') {
      $("#edit_hktime").prop('checked', true);
      $('label[for="edit_start_time"]').text('開始於(香港時間)：')
      $('label[for="edit_end_time"]').text('結束於(香港時間)：')
    } else {
      $("#edit_hktime").prop('checked', false);
      $('label[for="edit_start_time"]').text('開始於(美國時間)：')
      $('label[for="edit_end_time"]').text('結束於(美國時間)：')
    }
    if ($(this).attr('data-allday') == 'true') {
      $('#edit_end_time').attr("disabled", true);
      document.getElementById('edit_start_time').value = datetimeLocal($(this).attr('data-start'));
      document.getElementById('edit_end_time').value = '';
      $("#edit_alldayevent").prop('checked', true);
    } else {
      $('#edit_end_time').attr("disabled", false);
      document.getElementById('edit_start_time').value = datetimeLocal($(this).attr('data-start'));
      document.getElementById('edit_end_time').value = datetimeLocal($(this).attr('data-end'));
      $("#edit_alldayevent").prop('checked', false);
    }
    $(".select-dropdown__list-item.edit").each(function () {
      var itemValue = $(this).data('value');
      var text = $(this).text();
      if (text == $(me).attr('data-type').trim()) {
        $('#edit_eventtype span').text($(this).text()).parent().attr('data-value', itemValue);
        $('.select-dropdown__list .edit').toggleClass('active');
      }
    });
    CKEDITOR.instances.editor3.setData($(".popoverDescCalendar").html().replace("簡介:", ""));
    setTimeout(() => {
      $('.popover.fade.show').remove();
    }, 500);
  });


  $(document).on('click', '.popover_delete_btn', function (e) {
    $(this).prop('disabled', true);
    $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
    var me = $(this)
    event.preventDefault();
    var form_data = new FormData();
    form_data.append('_id', $(this).attr('data-id'))
    form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
    if (confirm("確認隱藏此數據嗎？您可以之後在上方按鈕檢索已隱藏的數據並恢復顯示")) {
      $.ajax({
        type: "POST",
        url: "../../system/php/calendar/hide_event.php",
        data: form_data,
        contentType: false,
        processData: false,
        error: function () {
          toastbar('內部文件遺失', 'red')
          $(me).prop('disabled', false);
          $(me).html('<i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏');
        },
      })
        .done(function (data) {
          toastbar(data)
          $(me).prop('disabled', false);
          $(me).html('<i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏');
          if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功隱藏數據</span>") > -1) {
            reseteditform()
            getcalendar()
          }

        });
    } else {
      $(me).prop('disabled', false);
      $(me).html('<i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏');
    }
  });

  $('body').on('DOMNodeInserted', '.popover', function () {
    $('.popover-header').css('background', $('.popover_bg_hide').text() + '52')
    var html = `
  <div class="d-flex justify-content-center">
      <button type="button" class="btn btn-secondary popover_edit_btn"data-id="${$('.popover_id_hide').text().trim()}"
      data-timezone="${$('.popover_timezone_hide').text().trim()}"data-start="${$('.popover_start_hide').text().trim()}"
      data-end="${$('.popover_end_hide').text().trim()}"data-type="${$('.popover_type_hide').text()}"
      data-title="${$('.popover_title_hide').text().trim()}"data-allday="${$('.popover_allday_hide').text().trim()}">編輯</button>
      <button type="button" class="btn btn-danger popover_delete_btn"data-id="${$('.popover_id_hide').text().trim()}" >隱藏</button>
  </div>
  `
    if ($('.popover .popover_edit_btn').length === 0) {
      $(html).insertBefore(".popover_type");
    }
    //$('.popover_type').before(html)
  });
  setInterval(() => {
    $('.popover img:not([src*="/ckeditor/plugins/hkemoji/sticker/milkbottle/"]):not([src*="/ckeditor/plugins/hkemoji/sticker/onion/"]):not(".nofancybox")').wrap(function () {
      if ($(this).height() > 100 || $(this).width() > 100) {
        /*         return "<a style='cursor:pointer' data-src=" + this.src + " data-fancybox><img src='" + this.src + "'class='nofancybox'style='width:100%'></a>"; */
        return "<div style='position:relative'><a style='cursor:pointer;position:relative' data-src=" + this.src + " data-fancybox><img loading='lazy' src='" + this.src +
          "'class='nofancybox d-block m-auto'data-width='" + $(this).width() + "'data-window_width='" + $(window).width() + "'></a><div class='download_img'data-href=" + this.src + "><i class='fa-solid fa-download'></i></div></div>";

      }

    });
    $('.popover a').each(function () {
      $(this).attr('target', '_blank')
    });
    $('.popover video:not(".nofancybox")').wrap(function () {
      return "<a style='cursor:pointer' data-src=" + this.src + " data-fancybox>" +
        "<video controlslist='nodownload'style='width:100%;height:100%'class='nofancybox' playsinline autoplay muted loop>" +
        "<source style='width:100%;height:100%'type='video/webm' src=" + this.src + " type='video/mp4'></video></a>";
    });
  }, 1000);
  $(document).on('click', ".download_img", function (e) {
    var link = $(this).data('href')
    var element = document.createElement('a');
    element.setAttribute('href', link);
    var text = $(this).closest('a').find('.custom_accordion').text()
    element.setAttribute('download', text);
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
  })
  //CREATE NEW EVENT CALENDAR

  /* ************************提交表單*********************************** */


  $('#add_start_time').on('change', function () {
    var starttime = moment($('#add_start_time').val())
    var dtime = moment(starttime).add(2, 'hours')
    if ($('#add_end_time').val() == '') {

      document.getElementById('add_end_time').value = dtime._i
    }
    $('#add_end_time').attr('min', starttime._i);

  });
  $('#edit_start_time').on('change', function () {
    var starttime = moment($('#edit_start_time').val())
    var dtime = moment(starttime).add(2, 'hours')
    if ($('#edit_end_time').val() == '') {

      document.getElementById('edit_end_time').value = dtime._i
    }
    $('#edit_end_time').attr('min', starttime._i);

  });
  $('#alldayevent').on('change', function () {
    if ($(this).is(':checked')) {
      var endDay = $('#add_end_time').prop('disabled', true);
      document.getElementById('add_end_time').value = '';
    } else {
      var endDay = $('#add_end_time').prop('disabled', false);
    }
  });
  $('#edit_alldayevent').on('change', function () {
    if ($(this).is(':checked')) {
      var endDay = $('#edit_end_time').prop('disabled', true);
      document.getElementById('edit_end_time').value = '';
    } else {
      var endDay = $('#edit_end_time').prop('disabled', false);
    }
  });
  $('#hktime').on('change', function () {
    if ($(this).is(':checked')) {
      $('label[for="add_start_time"]').text('開始於(香港時間)：')
      $('label[for="add_end_time"]').text('結束於(香港時間)：')
    } else {
      $('label[for="add_start_time"]').text('開始於(美國時間)：')
      $(' label[for="add_end_time"]').text('結束於(美國時間)：')
    }
  });
  $('#edit_hktime').on('change', function () {
    if ($(this).is(':checked')) {
      $('label[for="edit_start_time"]').text('開始於(香港時間)：')
      $('label[for="edit_end_time"]').text('結束於(香港時間)：')
    } else {
      $('label[for="edit_start_time"]').text('開始於(美國時間)：')
      $(' label[for="edit_end_time"]').text('結束於(美國時間)：')
    }
  });

  $("#edit-hide-event").click(function () {
    $("#edit-hide-event").prop('disabled', true);
    $("#edit-hide-event").html('<i class="fa-solid fa-spinner fa-spin"></i>');

    event.preventDefault();
    var form_data = new FormData();
    form_data.append('_id', $('#edit_id_input').val())
    form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
    if (confirm("確認隱藏此數據嗎？您可以之後在上方按鈕檢索已隱藏的數據並恢復顯示")) {
      $.ajax({
        type: "POST",
        url: "../../system/php/calendar/hide_event.php",
        data: form_data,
        contentType: false,
        processData: false,
        error: function () {
          toastbar('內部文件遺失', 'red')
          $("#edit-hide-event").prop('disabled', false);
          $("#edit-hide-event").html('<i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏數據');
        },
      })
        .done(function (data) {
          toastbar(data)
          $("#edit-hide-event").prop('disabled', false);
          $("#edit-hide-event").html('<i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏數據');
          if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功隱藏數據</span>") > -1) {
            reseteditform()
            getcalendar()
          }

        });
    } else {
      $("#edit-hide-event").prop('disabled', false);
      $("#edit-hide-event").html('<i class="fa-solid fa-eye-slash"></i>&nbsp;&nbsp;隱藏數據');
    }

  });
  /* edit event  */
  $("#edit-save-event").click(function () {
    $("#edit-save-event").prop('disabled', true);
    $("#edit-save-event").html('<i class="fa-solid fa-spinner fa-spin"></i>');


    if ($('#edit_alldayevent').is(':checked')) {
      var statusAllDay = true
    } else {
      var statusAllDay = false
    }
    if ($('#edit_hktime').is(':checked')) {
      var timezone = 'hk'
    } else {
      var timezone = 'us'
    }
    //GENERATE RAMDON ID
    var eventId = 1 + Math.floor(Math.random() * 100000000);

    event.preventDefault();
    var form_data = new FormData();
    form_data.append('statusAllDay', statusAllDay)
    form_data.append('_id', $('#edit_id_input').val())
    form_data.append('title', $('#edit_title').val())
    form_data.append('start', $('#edit_start_time').val())
    form_data.append('end', $('#edit_end_time').val())
    form_data.append('eventtype', $('#edit_eventtype').attr("data-value"))
    form_data.append('description', CKEDITOR.instances.editor3.getData())
    form_data.append('timezone', timezone)
    form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
    $.ajax({
      type: "POST",
      url: "../../system/php/calendar/edit_event.php",
      data: form_data,
      contentType: false,
      processData: false,
      error: function () {
        toastbar('內部文件遺失', 'red')
        $("#edit-save-event").prop('disabled', false);
        $("#edit-save-event").html('<i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;保存更改');
      },
    })
      .done(function (data) {
        toastbar(data)
        $("#edit-save-event").prop('disabled', false);
        $("#edit-save-event").html('<i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;保存更改');
        if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功更改資料</span>") > -1) {
          reseteditform()
          getcalendar()
        }

      });

  });
  $('#hidden_data_container').on('click', ".restore", function (e) {
    var form_data = new FormData();
    form_data.append('id', $(this).attr("data-id"))
    form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
    $(this).prop('disabled', true);
    $(this).html('<i class="fa-solid fa-spinner fa-spin"></i>');
    var el = $(this)
    $.ajax({
      type: "POST",
      url: "../../system/php/calendar/show_data.php",
      data: form_data,
      contentType: false,
      processData: false,
      error: function () {
        toastbar('內部文件遺失', 'red')
        $(el).prop('disabled', false);
        $(el).html('<i class="fa-solid fa-arrow-rotate-left"></i>&nbsp;&nbsp;復原數據');
      },
    })
      .done(function (data) {
        toastbar(data)
        $(el).prop('disabled', false);
        $(el).html('<i class="fa-solid fa-arrow-rotate-left"></i>&nbsp;&nbsp;復原數據');
        if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功復原資料</span>") > -1) {
          $.ajax({
            type: "POST",
            url: "../../system/php/calendar/fetch_hidden_data.php",
            contentType: false,
            processData: false,
            error: function () {
              toastbar('內部文件遺失', 'red')
            },
          })
            .done(function (data) {
              $('#hidden_data_container').html(data)

            });
          getcalendar()
        }
      });
  })
  $("#save-event").click(function () {
    $("#save-event").prop('disabled', true);
    $("#save-event").html('<i class="fa-solid fa-spinner fa-spin"></i>');


    if ($('#alldayevent').is(':checked')) {
      var statusAllDay = true
    } else {
      var statusAllDay = false
    }
    if ($('#hktime').is(':checked')) {
      var timezone = 'hk'
    } else {
      var timezone = 'us'
    }
    //GENERATE RAMDON ID
    var eventId = 1 + Math.floor(Math.random() * 100000000);

    event.preventDefault();
    var form_data = new FormData();
    form_data.append('statusAllDay', statusAllDay)
    form_data.append('_id', eventId)
    form_data.append('title', $('#add_title').val())
    form_data.append('start', $('#add_start_time').val())
    form_data.append('end', $('#add_end_time').val())
    form_data.append('eventtype', $('#eventtype').attr("data-value"))
    form_data.append('description', CKEDITOR.instances.editor2.getData())
    form_data.append('timezone', timezone)
    form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
    $.ajax({
      type: "POST",
      url: "../../system/php/calendar/add_event.php",
      data: form_data,
      contentType: false,
      processData: false,
      error: function () {
        toastbar('內部文件遺失', 'red')
        $("#save-event").prop('disabled', false);
        $("#save-event").html('<i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;保存更改');
      },
    })
      .done(function (data) {
        toastbar(data)
        $("#save-event").prop('disabled', false);
        $("#save-event").html('<i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;保存更改');
        if (data.indexOf("<span style='color:#67ff67'><i class='fa-solid fa-check-double'></i>成功添加至伺服器</span>") > -1) {
          resetform()
          getcalendar()
        }

      });

  });
  $(".addevent").click(function () {
    $('#newEventModal').modal({
      backdrop: 'true',
      keyboard: true
    })
    document.getElementById('add_start_time').val = default_date
    document.getElementById('add_end_time').val = default_date

  });
  $(".viewhiddendata").click(function () {
    $('#viewhideModal').modal({
      backdrop: 'true',
      keyboard: true
    })
    $.ajax({
      type: "POST",
      url: "../../system/php/calendar/fetch_hidden_data.php",
      contentType: false,
      processData: false,
      error: function () {
        toastbar('內部文件遺失', 'red')
      },
    })
      .done(function (data) {
        $('#hidden_data_container').html(data)

      });

  });
  $('#showtimezone').on('change', function () {
    if ($(this).is(':checked')) {
      setCookie('calendar_time', 'hk', 30);
      getcalendar()
    } else {
      setCookie('calendar_time', 'us', 30);
      getcalendar()
    }
  });
  $(document).on('click', function (e) {
    $('[data-toggle="popover"],[data-original-title]').each(function () {
      //the 'is' for buttons that trigger popups
      //the 'has' for icons within a button that triggers a popup
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        (($(this).popover('hide').data('bs.popover') || {}).inState || {}).click = false // fix for BS 3.3.6
      }

    });

  });

  $('.table_height_option').on('click', function () {
    var itemValue = $(this).data('value');
    setCookie('calendar_table_height', itemValue, 30);
    $('#table_height span').text($(this).text()).parent().attr('data-value', itemValue);
    $('.table_height_option_list').removeClass('active');
    $('.fc-time-grid .fc-slats td').css('height', `${itemValue}em`)
    getcalendar()
  });

  $(document).ready(function () {
    var time = getCookie('calendar_time').toString()
    if (time == 'hk') {
      $("#showtimezone").prop('checked', true);
      $(".show_timezone").attr("src", "https://flagcdn.com/48x36/hk.png");

    } else {
      $("#showtimezone").prop('checked', false);
      $(".show_timezone").attr("src", "https://flagcdn.com/48x36/us.png");

    }
    var table_height = getCookie('calendar_table_height')
    if (table_height != '5') {
      calendar_table_height()
      setTimeout(() => {
        getcalendar()
      }, 200);
    }
  })
  /* var totalSeconds = 0;
  setInterval(setTime, 1000);
  
  function setTime() {
    ++totalSeconds;
    console.log(totalSeconds)
  } */
  document.onvisibilitychange = function () {
    switch (document.visibilityState) {
      case 'visible':
        var form_data = new FormData();
        form_data.append('related', $('#list_related_id').val())
        form_data.append('time_zone_name', Intl.DateTimeFormat().resolvedOptions().timeZone)
        $.ajax({
          type: "POST",
          url: "../../system/php/calendar/check_time.php",
          data: form_data,
          contentType: false,
          processData: false,
          error: function (xhr, ajaxOptions, thrownError) {
            toastbar(thrownError + '(' + xhr.status + ')', 'red')
          },
        }).done(function (data) {
          if (data.indexOf("內容更新中，有人在您離開期間更新了資料") > -1) {
            toastbar(data)
            getcalendar()
          }
        });
        break;
    }
  };
})