/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/pages/calendar.init.js ***!
  \*********************************************/
/*
Template Name: Dason - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: themesdesign.in@gmail.com
File: Calendar init js
*/
!function ($) {
  "use strict";

  var CalendarPage = function CalendarPage() {};

  CalendarPage.prototype.init = function () {
    var addEvent = $("#event-modal");
    var modalTitle = $("#modal-title");
    var formEvent = $("#form-event");
    var selectedEvent = null;
    var newEventData = null;
    var forms = document.getElementsByClassName('needs-validation');
    var selectedEvent = null;
    var newEventData = null;
    var eventObject = null;
    /* initialize the calendar */

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var Draggable = FullCalendarInteraction.Draggable;
    var externalEventContainerEl = document.getElementById('external-events'); // init dragable

    new Draggable(externalEventContainerEl, {
      itemSelector: '.external-event',
      eventData: function eventData(eventEl) {
        return {
          title: eventEl.innerText,
          className: $(eventEl).data('class')
        };
      }
    });
      $.ajax({
          type: 'get',
          url: window.location.origin + '/admin/calender/events',
          success: function(response) {
              // Handle the success response, e.g., show a success message
              response.forEach(function(event){
                 calendar.addEvent({
                     title: event.title,
                     start: event.start,
                 })
              })
          },
          error: function(error) {
              // Handle errors, e.g., display validation errors
              console.log(error.responseJSON.errors);
          }
      });


    var draggableEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');

    function addNewEvent(info) {
      addEvent.modal('show');
      formEvent.removeClass("was-validated");
      $("#event-title").val();
      $('#event-category').val();
      modalTitle.text('Add Event');
      console.log('sds')
      newEventData = info;

    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
      editable: true,
      droppable: true,
      selectable: true,
        locale: 'ar', // Set the locale to 'ar' for Arabic
      defaultView: 'dayGridMonth',
      themeSystem: 'bootstrap',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      eventClick: function eventClick(info) {
        addEvent.modal('show');
        formEvent[0].reset();
        selectedEvent = info.event;
        $("#event-title").val(selectedEvent.title);
        $('#event-category').val(selectedEvent.classNames[0]);
        newEventData = null;
        modalTitle.text('Edit Event');
        newEventData = null;
      },
      dateClick: function dateClick(info) {
        addNewEvent(info);
      },

    });
    calendar.render();
    /*Add new event*/
    // Form to add new event

    $(formEvent).on('submit', function (ev) {
      ev.preventDefault();
      var inputs = $('#form-event :input');
      var updatedTitle = $("#event-title").val();
      var updatedCategory = $('#event-category').val(); // validation
        var formData = {
            'title' : updatedTitle,
            'start': newEventData.date,
            'allDay': newEventData.allDay,
        }

        $.ajax({
            type: 'get',
            url: window.location.origin + '/admin/calender/event/store',
            data: formData,
            success: function(response) {
                // Handle the success response, e.g., show a success message

            },
            error: function(error) {
                // Handle errors, e.g., display validation errors
                console.log(error.responseJSON.errors);
            }
        });
      if (forms[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        forms[0].classList.add('was-validated');
      } else {
        if (selectedEvent) {
          selectedEvent.setProp("title", updatedTitle);
          selectedEvent.setProp("classNames", [updatedCategory]);
        } else {
          var newEvent = {
            title: updatedTitle,
            start: newEventData.date,
            allDay: newEventData.allDay,
            className: updatedCategory
          };
          calendar.addEvent(newEvent);
        }

        addEvent.modal('hide');
      }
    });
    $("#btn-delete-event").on('click', function (e) {
      if (selectedEvent) {
        selectedEvent.remove();
        selectedEvent = null;
        addEvent.modal('hide');
      }
    });
    $("#btn-new-event").on('click', function (e) {
      addNewEvent({
        date: new Date(),
        allDay: true
      });

    });
  }, //init
  $.CalendarPage = new CalendarPage(), $.CalendarPage.Constructor = CalendarPage;
}(window.jQuery), //initializing
function ($) {
  "use strict";

  $.CalendarPage.init();
}(window.jQuery);
/******/ })()
;
