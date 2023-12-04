var themeToggleBtn = document.getElementById('theme-toggle');
var sideBarToggle = document.getElementById("sidebar-toggle-button");
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
var dropdownUser = document.getElementById("dropdown-user-button");



dropdownUser.addEventListener("click", () => {
    document.getElementById("dropdown-user").classList.toggle('hidden');
})

sideBarToggle.addEventListener("click", () => {
    document.getElementById("logo-sidebar").classList.toggle("-translate-x-full");
})
