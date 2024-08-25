document.getElementById("show-more-btn").addEventListener("click", function () {
  var eventContainer = document.querySelector(".event-container");
  if (eventContainer.classList.contains("show-more")) {
    eventContainer.classList.remove("show-more");
    this.textContent = "Show More";
  } else {
    eventContainer.classList.add("show-more");
    this.textContent = "Show Less";
  }
});
