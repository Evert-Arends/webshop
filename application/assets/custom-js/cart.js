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
    console.log(postTo);
    console.log(sessionKey);
    let sendData = {
        ajax: true,
        delete_product: true,
        session_key: sessionKey
    };
    $.post(postTo, sendData, function (data) {
        console.log(data);
        if (data === "success") {

        }
    })
}