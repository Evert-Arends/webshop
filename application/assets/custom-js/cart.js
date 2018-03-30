/* login submit */

function addToCart(postTo, productID, productName, productAmount) {
    let sendData = {
        ajax: true,
        add_product: true,
        product_id: productID,
        product_name: productName,
        amount: productAmount
    };
    $.post(postTo, sendData, function (data) {
        console.log(data);
        if (data === "success") {
            alert("Product toegevoegd.");
        }
    })
}


function deleteFromCart(postTo, sessionKey) {
    let sendData = {
        ajax: true,
        delete_product: true,
        session_key: sessionKey
    };
    $.post(postTo, sendData, function (data) {
        console.log(data);
        if (data === "success") {
            console.log("Product deleted.");
        }
    })
}

function updateAmount(postTo, sessionKey, amount, productKey) {
    console.log(postTo);
    console.log(sessionKey);
    let sendData = {
        ajax: true,
        amount: amount,
        edit_product: true,
        product_id: productKey,
        session_key: sessionKey
    };
    $.post(postTo, sendData, function (data) {
        console.log(data);
        if (data === "success") {

        }
    })
}
