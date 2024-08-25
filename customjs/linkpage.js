// At reload page.
document.addEventListener("DOMContentLoaded", function () {
  loadLastSelectedPage();
});

// Selecting a page to load
function loadPage(page) {
  var panel = document.getElementById("panel");
  if (page === "Dashboard") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/dashboard.php" style="width:100%; height:92vh;"></object>';
    setPageBg("dashm");
  } else if (page === "Client") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/client.php" style="width:100%; height:92vh;"></object>';
    setPageBg("clientm");
  } else if (page === "Case") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/case.php" style="width:100%; height:92vh;"></object>';
    setPageBg("casem");
  } else if (page === "Staff") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/staff.php" style="width:100%; height:92vh;"></object>';
    setPageBg("staffm");
  } else if (page === "Archived") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/archived.php" style="width:100%; height:92vh;"></object>';
    setPageBg("archivedm");
  } else if (page === "InterviewSheet") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/interviewsheet.php" style="width:100%; height:92vh;"></object>';
    setPageBg("interviewsheetm");
  } else if (page === "Transaction") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/transaction.php" style="width:100%; height:92vh;"></object>';
    setPageBg("transactionm");
  } else if (page === "Report") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/report.php" style="width:100%; height:92vh;"></object>';
    setPageBg("reportm");
  } else if (page === "Calendar") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/calendar.php" style="width:100%; height:92vh;"></object>';
    setPageBg("calendarm");
  } else if (page === "Request") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/appointment.php" style="width:100%; height:92vh;"></object>';
    setPageBg("requestm");
  } else if (page === "ClientAcc") {
    panel.innerHTML =
      '<object type="text/html" data="./pages/clientacc.php" style="width:100%; height:92vh;"></object>';
    setPageBg("clientaccm");
  } else setPageBg("none");
  // Store the selected page in localStorage
  localStorage.setItem("selectedPage", page);
}

// When reload get the last viewed page
function loadLastSelectedPage() {
  var lastSelectedPage = localStorage.getItem("selectedPage");
  if (lastSelectedPage) loadPage(lastSelectedPage);
}
// For the responsive sidebar activity
function setPageBg(page) {
  var menuIds = [
    "dashm",
    "clientm",
    "casem",
    "staffm",
    "archivedm",
    "transactionm",
    "interviewsheetm",
    "reportm",
    "calendarm",
    "requestm",
    "clientaccm",
  ];
  menuIds.forEach(function (id) {
    var menu = document.getElementById(id);
    if (menu) {
      if (id === page) {
        menu.style.backgroundColor = "#519772";
        menu.style.borderRadius = "5px";
      } else {
        menu.style.backgroundColor = ""; // Reset background color
        menu.style.borderRadius = ""; // Reset border radius
      }
    }
  });
}
