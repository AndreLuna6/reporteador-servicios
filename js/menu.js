document.getElementById("toggleSidebar").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("collapsed");
  document.querySelector(".main-content").classList.toggle("expanded");
});