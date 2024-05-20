document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const themeContainer = document.getElementById("theme-container");

    // Check for saved user preference, if any, on load of the website
    const currentTheme = localStorage.getItem("theme");
    if (currentTheme) {
        themeContainer.classList.add(currentTheme);
    } else {
        themeContainer.classList.add("light-mode");
    }

    toggleButton.addEventListener("click", () => {
        themeContainer.classList.toggle("dark-mode");
        themeContainer.classList.toggle("light-mode");

        let theme = "light-mode";
        if (themeContainer.classList.contains("dark-mode")) {
            theme = "dark-mode";
        }
        localStorage.setItem("theme", theme);
    });
});
