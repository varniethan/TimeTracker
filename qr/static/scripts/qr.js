$(document).ready(function(){
    console.log("Hello")
setInterval(function()
{
    $.ajax({
      type:"post",
      url:"/qr",
      datatype:"json",
      success:function(data)
      {
          var response_data = JSON.parse(data);
          console.log(response_data['status']);
          if (response_data['status'] == 1) {
                    console.log("QR appears to have updated, reloding page");
                    console.log(data['status']);
                    location.reload(true);
                }
      }
    });
}, 10000);//time in milliseconds
})

// $(document).ready(function(){

//     console.log("Hello")
//      setTimeout(function () {
//         location.reload(true);
//       }, 1500);
//     function sendRequest(){
//     $.ajax('/qr', {
//             method: 'POST',
//             success: function (result, status, xhr) {
//                 if (result['status'] = 1) {
//                     location.reload();
//                     console.log("QR appears to have updated, reloding page")
//                 }
//             }
//         }
//     );
// }



//     setInterval(function() {
//         // AJAX send request
//         $.ajax({
//             url: "/qr",
//             type: "post",
//             dataType: "json",
//             success: function (data) {
//             if (data['status'] = 1) {
//                     location.reload();
//                     console.log("QR appears to have updated, reloding page");
//                     console.log(data);
//                 }
//             },
//             error: function (request, error) {}
//         });
//     }, 5000);  // check about changes every 30 seconds
// })
