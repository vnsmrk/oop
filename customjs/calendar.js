document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev",
      center: "title",
      right: "next",
    },
    customButtons: {
      prev: {
        text: "",
        click: function () {
          calendar.prev();
          updatePrevNextButtons();
        },
      },
      next: {
        text: "",
        click: function () {
          calendar.next();
          updatePrevNextButtons();
        },
      },
    },
    events: Object.values(scheds).map(function (event) {
      return {
        id: event.id,
        title: event.title,
        start: event.start_datetime,
      };
    }),
    eventClick: function (info) {
      var id = info.event.id;
      var schedule = scheds[id];
      if (schedule) {
        $("#detail-name").text(schedule.name);
        $("#detail-title").text(schedule.title);
        $("#detail-description").text(schedule.description);
        $("#detail-start").text(schedule.sdate);
        $("#edit").attr("data-id", id);
        $("#delete").attr("data-id", id);
        $("#event-details-modal").modal("show");
      }
    },
  });

  function updatePrevNextButtons() {
    var date = calendar.getDate();
    var prevMonth = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    var nextMonth = new Date(date.getFullYear(), date.getMonth() + 1, 1);

    $(".fc-prev-button").text(
      prevMonth.toLocaleString("default", { month: "long" })
    );
    $(".fc-next-button").text(
      nextMonth.toLocaleString("default", { month: "long" })
    );

    $(".fc-prev-button, .fc-next-button").css({
      color: "green",
      "text-decoration": "underline",
      background: "none",
      border: "none",
      cursor: "pointer",
      "font-size": "1em",
    });
  }

  calendar.render();
  updatePrevNextButtons();

  $("#edit").on("click", function () {
    var id = $(this).attr("data-id");
    var schedule = scheds[id];
    if (schedule) {
      $("#schedule-modal #scheduleModalLabel").text("Edit Schedule");
      $('#schedule-modal input[name="id"]').val(id);
      $('#schedule-modal select[name="name"]').val(schedule.name);
      $('#schedule-modal input[name="title"]').val(schedule.title);
      $('#schedule-modal textarea[name="description"]').val(
        schedule.description
      );
      $('#schedule-modal input[name="start_datetime"]').val(
        schedule.start_datetime.replace(" ", "T")
      );
      $("#event-details-modal").modal("hide");
      $("#schedule-modal").modal("show");
    }
  });

  $("#delete").on("click", function () {
    var id = $(this).attr("data-id");
    if (confirm("Are you sure you want to delete this schedule?")) {
      $.ajax({
        url: "../../functions/delete_schedule.php",
        method: "POST",
        data: { id: id },
        success: function (response) {
          location.reload();
        },
      });
    }
  });
});
