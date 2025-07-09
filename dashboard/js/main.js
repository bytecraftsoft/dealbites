(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    // Back to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });

    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });

    // Progress Bar Animation
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, { offset: '80%' });

    // Calendar
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });

    // Testimonials Carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav: false
    });

    // Chart Global Dark Theme Colors
  // Chart Global Dark Theme
Chart.defaults.color = "#ffffff";
Chart.defaults.borderColor = "#2a2a2a";

    // Worldwide Sales Chart
    new Chart($("#worldwide-sales"), {
        type: "bar",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [
                {
                    label: "USA",
                    data: [15, 30, 55, 65, 60, 80, 95],
                    backgroundColor: "rgba(255, 255, 255, 0.8)"
                },
                {
                    label: "UK",
                    data: [8, 35, 40, 60, 70, 55, 75],
                    backgroundColor: "rgba(255, 255, 255, 0.6)"
                },
                {
                    label: "AU",
                    data: [12, 25, 45, 55, 65, 70, 60],
                    backgroundColor: "rgba(255, 255, 255, 0.4)"
                }
            ]
        },
        options: { responsive: true }
    });

    // Sales & Revenue Chart
    new Chart($("#salse-revenue"), {
        type: "line",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [
                {
                    label: "Sales",
                    data: [15, 30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(255, 255, 255, 0.25)",
                    borderColor: "rgba(255, 255, 255, 0.8)",
                    fill: true,
                    tension: 0.4
                },
                {
                    label: "Revenue",
                    data: [99, 135, 170, 130, 190, 180, 270],
                    backgroundColor: "rgba(255, 255, 255, 0.15)",
                    borderColor: "rgba(255, 255, 255, 0.6)",
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: { responsive: true }
    });

    // Single Line Chart
    new Chart($("#line-chart"), {
        type: "line",
        data: {
            labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
            datasets: [{
                label: "Sales",
                data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15],
                borderColor: "rgba(255, 255, 255, 0.8)",
                backgroundColor: "transparent",
                fill: false,
                tension: 0.4
            }]
        },
        options: { responsive: true }
    });

    // Single Bar Chart
    new Chart($("#bar-chart"), {
        type: "bar",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(255, 255, 255, 0.8)",
                    "rgba(255, 255, 255, 0.6)",
                    "rgba(255, 255, 255, 0.4)",
                    "rgba(255, 255, 255, 0.25)",
                    "rgba(255, 255, 255, 0.15)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: { responsive: true }
    });

    // Pie Chart
    new Chart($("#pie-chart"), {
        type: "pie",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(255, 255, 255, 0.8)",
                    "rgba(255, 255, 255, 0.6)",
                    "rgba(255, 255, 255, 0.4)",
                    "rgba(255, 255, 255, 0.25)",
                    "rgba(255, 255, 255, 0.15)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: { responsive: true }
    });

    // Doughnut Chart
    new Chart($("#doughnut-chart"), {
        type: "doughnut",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(255, 255, 255, 0.8)",
                    "rgba(255, 255, 255, 0.6)",
                    "rgba(255, 255, 255, 0.4)",
                    "rgba(255, 255, 255, 0.25)",
                    "rgba(255, 255, 255, 0.15)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: { responsive: true }
    });

})(jQuery);
