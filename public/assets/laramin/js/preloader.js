$(document).ready(function () {
    //preloader js code
    $(".preloader")
        .delay(300)
        .animate(
            {
                opacity: "0",
            },
            300,
            function () {
                $(".preloader").css("display", "none");
            }
        );
});
