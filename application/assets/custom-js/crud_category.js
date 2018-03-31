function createCategory(postTo, postData) {
    let sendData = {
        ajax: true,
        create_category: true,
        data: postData
    };
    $.post(postTo, sendData, function (data) {
        console.log(data);
        if (data === "success") {
            console.log("Category deleted.");
        }
    })
}