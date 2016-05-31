$(document).ready(function() {
    var user = "none";
    $(".user").click(function() {
        user = $(this).attr("data-name");
    });

    $("#test").click(function() {
        alert(user);
    });
});