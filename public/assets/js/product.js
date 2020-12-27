//********* Bắt đầu đoạn code viết chức năng cho miniCart
// == Hàm load số sản phẩm (icon giỏ hàng ở header)
function loadQuantityCart() {
  $.ajax({
    url: "./Cart/LoadCart",
    method: "POST",
    async: false,
    success: function (res) {
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
// == Hàm load sản phẩm cho vào miniCart
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
// == Khi thêm 1 sản phẩm vào trong giỏ hàng (Button thêm giỏ hàng)
function InsertCart(id) {
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
//== Xóa sản phẩm khỏi MiniCart
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
//== Bắt sự kiện click khi thêm vào giỏ hàng
$(document).ready(function () {
  $(".addCart").click(function () {
    let id = $(this).attr("id");
    InsertCart(id);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});
//== Bắt sự kiện click khi xóa giỏ hàng khỏi miniCart
$(document).ready(function () {
  $(document).on("click", ".remove", function () {
    let id = $(this).attr("id");
    RemoveCart(id);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});
//********* Kết thúc đoạn code viết chức năng cho miniCart

//********* Bắt đầu đoạn code viết chức năng trang Cart
const formatter = new Intl.NumberFormat("vi-VN", {
  style: "currency",
  currency: "VND",
});
function updateCart(id, quantity) {
  $.ajax({
    url: "./Cart/UpdateCart",
    method: "POST",
    data: {
      cart_id: id,
      cart_quantity: quantity,
    },
    success: function (res) {
      var obj = JSON.parse(res);
      let test = "#price-" + id;
      let price = formatter.format(parseInt(obj.price));
      let priceTotal = formatter.format(parseInt(obj.priceTotal));
      let lastPrice = formatter.format(parseInt(obj.priceTotal) + 20000);
      $(test).html(price);
      $("#priceTotal").html(priceTotal);
      $("#lastPrice").html(lastPrice);
      loadQuantityCart();
      loadMiniCart();
    },
  });
}
//== Bắt sự kiện khi thay đổi số lượng sản phẩm
$(document).ready(function () {
  $(document).on("focusout", ".quantity-input", function () {
    let id = $(this).attr("id");
    var quantity = parseInt($(this).val());
    var max = parseInt($(this).attr("max"));
    var min = parseInt($(this).attr("min"));
    if (quantity > max) {
      quantity = max;
      $(this).val(max);
    }
    if (quantity < min || isNaN(quantity)) {
      quantity = min;
      $(this).val(min);
    }
    updateCart(id, quantity);
  });
});
//== Bắt sự kiện khi giảm số lượng sản phẩm
$(document).ready(function () {
  $(document).on("click", ".dec", function () {
    let id = $(this).siblings("input").attr("id");
    let quantity = parseInt($(this).siblings("input").val());
    updateCart(id, quantity);
  });
});
//== Bắt sự kiện khi tăng số lượng sản phẩm
$(document).ready(function () {
  $(document).on("click", ".inc", function () {
    let id = $(this).siblings("input").attr("id");
    var quantity = parseInt($(this).siblings("input").val());
    var max = parseInt($(this).siblings("input").attr("max"));
    if (quantity > max) {
      quantity = max;
      $(this).siblings("input").val(max);
    }
    updateCart(id, quantity);
  });
});