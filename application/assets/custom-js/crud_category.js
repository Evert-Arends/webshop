// function createCategory(postTo, postData) {
//     let sendData = {
//         ajax: true,
//         create_category: true,
//         data: postData
//     };
//     $.post(postTo, sendData, function (data) {
//         console.log(data);
//         if (data === "success") {
//             console.log("Category edited.");
//         }
//     })
// }
// function deleteCategory(postTo, id) {
//     let sendData = {
//         ajax: true,
//         delete_category: true,
//         id: id
//     };
//     $.post(postTo, sendData, function (data) {
//         console.log(data);
//         if (data === "success") {
//             console.log("Category deleted.");
//         }
//     })
// }