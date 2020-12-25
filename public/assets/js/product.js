function loadQuantityCart() {
  $.ajax({
    url: "./Cart/LoadCart",
    method: "POST",
    async: false,
    success: function (res) {
      console.log(res);
      if ($("#mini-cart-count")) {
        $("#mini-cart-count").css("display", "block");
        $("#mini-cart-count").html(res);
        $("#mini-cart-content").html("dmm");
      }
    },
  });
}
function InsertCart(id) {
  console.log(id);
  $.ajax({
    url: "./Cart/InsertCart",
    method: "POST",
    data: {
      product_id: id,
    },
    async: false,
    success: function (res) {
      if (res == "noLogin") {
        alert("Vui lòng đăng nhập trước khi thêm vào giỏ hàng");
      }
    },
  });
}
$(document).ready(function () {
  $(".addCart").click(function () {
    let id = $(this).attr("id");
    InsertCart(id);
    loadQuantityCart();
    return false;
  });
});
