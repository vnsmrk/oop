// Populate dropdowns with options
$(document).ready(function () {
  // Populate day dropdown
  for (let i = 1; i <= 31; i++) {
    $("#day").append('<option value="' + i + '">' + i + "</option>");
  }

  // Populate year dropdown with a range from the current year to the next 5 years
  const currentYear = new Date().getFullYear();
  for (let i = currentYear; i <= currentYear + 5; i++) {
    $("#year").append('<option value="' + i + '">' + i + "</option>");
  }

  // Populate hour dropdown with 24 hours
  for (let i = 0; i < 24; i++) {
    const hour = i < 10 ? "0" + i : i;
    $("#hour").append('<option value="' + hour + '">' + hour + "</option>");
  }

  // Populate minute dropdown with minutes in intervals of 5
  for (let i = 0; i < 60; i += 5) {
    const minute = i < 10 ? "0" + i : i;
    $("#minute").append(
      '<option value="' + minute + '">' + minute + "</option>"
    );
  }

  // Set current hour and minute in dropdowns
  const now = new Date();
  $("#hour").val(now.getHours().toString().padStart(2, "0"));
  $("#minute")
    .val(Math.floor(now.getMinutes() / 5) * 5)
    .toString()
    .padStart(2, "0");

  // Initialize the datepicker
  $("#calendar-icon")
    .datepicker({
      format: "dd-mm-yyyy",
      todayHighlight: true,
      autoclose: true,
      orientation: "right",
    })
    .on("changeDate", function (e) {
      const date = e.date;
      $("#day").val(date.getDate());
      $("#month").val(date.getMonth() + 1); // Months are zero-indexed
      $("#year").val(date.getFullYear());
    });
});

// Combine date and time values into the hidden input before form submission
$("#schedule-form").on("submit", function (e) {
  const day = $("#day").val();
  const month = $("#month").val();
  const year = $("#year").val();
  const hour = $("#hour").val();
  const minute = $("#minute").val();

  const startDatetime = `${year}-${month.padStart(2, "0")}-${day.padStart(
    2,
    "0"
  )}T${hour.padStart(2, "0")}:${minute.padStart(2, "0")}`;
  $("#start_datetime").val(startDatetime);
});
