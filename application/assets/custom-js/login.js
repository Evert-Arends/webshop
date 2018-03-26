/* login submit */
function submitForm() {
    console.log("LOGIN!");

    let data = $("#login-form").serialize();

    let dataUrl = $("#myModal2").attr("data-attr");
    // dataUrl += 'home';

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

                $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                window.location.href = dataUrl.toString() + 'home/';
                console.log("Logged in successfully!");

            }

            else {
                console.log("Could not login!");
                console.log("Because:" + response);

                $("#error").fadeIn(1000, function () {
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                });
            }
        }
    });
}
