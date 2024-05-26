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
//  scroll navbar
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 0) {
            navbar.classList.add("navbar-scroll");
        } else {
            navbar.classList.remove("navbar-scroll");
        }
    });
});

// end scroll navbar
// animasi card dan img
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <=
                (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function showCard() {
        cards.forEach((card) => {
            if (isInViewport(card)) {
                card.classList.add("show");
            }
        });
    }
    showCard();
    window.addEventListener("scroll", showCard);
});

// end animasi card img
