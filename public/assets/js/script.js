$(document).ready(function () {
    // Dark mode toggle
    const $toggleButton = $("#dark-mode-toggle");
    const $themeContainer = $("#theme-container");

    // cek history user , agar tetap dimode yang sama ketika user merefresh
    const currentTheme = localStorage.getItem("theme");
    if (currentTheme) {
        $themeContainer.addClass(currentTheme);
    } else {
        $themeContainer.addClass("light-mode");
    }

    $toggleButton.on("click", function () {
        $themeContainer.toggleClass("dark-mode light-mode");

        let theme = "light-mode";
        if ($themeContainer.hasClass("dark-mode")) {
            theme = "dark-mode";
        }
        localStorage.setItem("theme", theme);
    });

    // Scroll navbar
    const $navbar = $(".navbar");

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 0) {
            $navbar.addClass("navbar-scroll");
        } else {
            $navbar.removeClass("navbar-scroll");
        }
    });

    // Animasi card dan img
    const $elements = $(
        ".card, .h-sejarah, .p-sejarah, .img-sejarah, .h-berjualan, .p-berjualan, .h-cuan, .p-cuan, .h-market, .p-market "
    );

    function isInViewport($element) {
        const rect = $element[0].getBoundingClientRect();
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
        $elements.each(function () {
            const $card = $(this);
            if (isInViewport($card)) {
                $card.addClass("show");
            }
        });
    }

    showCard();
    $(window).on("scroll", showCard);
});
