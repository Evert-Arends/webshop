$('document').ready(function () {
    $("#register-error").fadeOut();

});

function submitRegisterForm() {
    console.log("REGISTER!");

    let data = $("#register-form").serialize();

    let dataUrl = $("#myModal3").attr("data-attr");

    console.log(dataUrl);
    $.ajax({
        type: 'POST',
        url: dataUrl + 'register/',
        data: data,
        beforeSend: function () {
            $(`#register-error`).fadeOut();
            $("#register-error").html("");
            $("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
        },
        success: function (jsonResponse) {
            if (jsonResponse === "ok") {

                $("#btn-register").html('<img src="' + dataUrl + "/application/assets/images/loading.gif" + '"/> &nbsp; Registering ...');
                window.location.href = dataUrl.toString() + 'home/';
                console.log("Registered successfully!");
            }
            else {
                console.log("Could not register!");
                console.log("Log:" + jsonResponse.toString());

                let errorList = $("<ul></ul>");
                let response = JSON.parse(jsonResponse);
                let arrayLength = response.length;
                for (let i = 0; i < arrayLength; i++) {
                    errorList.append($("<li></li>").text(response[i]));
                }

                $(`#register-error`).append(errorList);

                $("#register-error").fadeIn(1000, function () {
                    $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                });
            }
        }
    });
}
