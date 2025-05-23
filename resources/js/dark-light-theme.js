// Get icons (may not exist)
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Apply theme on page load
if (
  localStorage.getItem('color-theme') === 'dark' ||
  (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
  document.documentElement.classList.add('dark');
  if (themeToggleLightIcon) themeToggleLightIcon.classList.remove('hidden');
} else {
  document.documentElement.classList.remove('dark');
  if (themeToggleDarkIcon) themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

if (themeToggleBtn) {
  themeToggleBtn.addEventListener('click', function () {
    // toggle icons safely
    if (themeToggleDarkIcon) themeToggleDarkIcon.classList.toggle('hidden');
    if (themeToggleLightIcon) themeToggleLightIcon.classList.toggle('hidden');

    // toggle theme
    if (localStorage.getItem('color-theme')) {
      if (localStorage.getItem('color-theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      }
    } else {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      }
    }
  });
}
