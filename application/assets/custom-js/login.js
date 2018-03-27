/* login submit */

$('document').ready(function () {
    $("#error").fadeOut();

});

function submitLoginForm() {
    console.log("LOGIN!");

    let data = $("#login-form").serialize();

    let dataUrl = $("#myModal2").attr("data-attr");

    console.log(dataUrl);
    $.ajax({
        type: 'POST',
        url: dataUrl + 'login/',
        data: data,
        beforeSend: function () {
            $("#error").fadeOut();
            $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
        },
        success: function (response) {
            if (response === "ok") {

                $("#btn-login").html('<img src="' + dataUrl + "/application/assets/images/loading.gif" + '"/> &nbsp; Signing In ...');
                window.location.href = dataUrl.toString() + 'home/';
                console.log("Logged in successfully!");

            }

            else {
                console.log("Could not login!");
                console.log("Because:" + response.toString());
                $(`#error`).text(response);

                $("#error").fadeIn(1000, function () {
                    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                });
            }
        }
    });
}
