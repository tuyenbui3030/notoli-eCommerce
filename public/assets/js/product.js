function loadQuantityCart() {
  $.ajax({
    url: "./Cart/LoadCart",
    method: "POST",
    async: false,
    success: function (res) {
      console.log(res);
      if (res != "null") {
        if ($("#mini-cart-count")) {
          if (res > 0) {
            $("#mini-cart-count").css("display", "block");
            $("#mini-cart-count").html(res);
          } else {
            $("#mini-cart-count").css("display", "none");
          }
        }
      }
    },
  });
}
function loadMiniCart() {
  $.ajax({
    url: "./Cart/LoadMiniCart",
    method: "POST",
    async: false,
    success: function (res) {
      console.log(res);
      if (res != "null") {
        $("#mini-cart-content").last().html(res);
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
        $(".popup_box--h1").html("Vui lòng đăng nhập để tiếp tục mua hàng");
        $(".popup_box").css("display", "block");
        disableScreen();
        $("#btn-close").click(function () {
          $(".popup_box").css("display", "none");
          enableScreen();
        });
        //alert("Vui lòng đăng nhập trước khi thêm vào giỏ hàng");
      }
    },
  });
}
function RemoveCart(id) {
  console.log(id);
  $.ajax({
    url: "./Cart/RemoveCart",
    method: "POST",
    data: {
      cart_id: id,
    },
    async: false,
    success: function (res) {},
  });
}
$(document).ready(function () {
  $(".addCart").click(function () {
    let id = $(this).attr("id");
    InsertCart(id);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});

$(document).ready(function () {
  $(".remove").click(function () {
    let id = $(this).attr("id");
    RemoveCart(id);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});

$(document).ready(function () {
  $(document).on("click", ".remove", function () {
    let id = $(this).attr("id");
    RemoveCart(id);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});
