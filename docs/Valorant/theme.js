document.addEventListener("DOMContentLoaded", () => {
  const dropdownBtn = document.getElementById("themeDropdownBtn");
  const dropdown = document.getElementById("themeDropdown");
  const themeButtons = document.querySelectorAll("[data-theme]");

  if (
    localStorage.theme === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
  ) {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }

  if (dropdownBtn && dropdown) {
    dropdownBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      dropdown.classList.toggle("hidden");
    });

    themeButtons.forEach(btn => {
      btn.addEventListener("click", () => {
        const theme = btn.dataset.theme;
        if (theme === "dark") {
          document.documentElement.classList.add("dark");
          localStorage.theme = 'dark';
        } else {
          document.documentElement.classList.remove("dark");
          localStorage.theme = 'light';
        }
        dropdown.classList.add("hidden");
      });
    });

    document.addEventListener("click", e => {
      if (!dropdownBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add("hidden");
      }
    });
  }
});
