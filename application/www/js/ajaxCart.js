// function sendOrder()
// {
//   $.ajax({
//     url: "addOrderController.class.php",
//     method:post,
//     dataType:json
//     data: {
//       ft_getOrder();
//     }
//   }).done(function(data) {
//     console.log("succes");
//   }).fail(function(error){
//     console.log(error);
//   });
// }

ft_getOrder();

function ft_getOrder()
{
  var today = Date.now();
  var order = {
      orderDate:today,
      requiredDate:orderDate
  };
  console.log(order);
}
