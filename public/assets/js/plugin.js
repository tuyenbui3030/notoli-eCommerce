$(document).ready(function () {
  $("form#registration-form").on("submit", function (e) {
    let username = $(this).find("input#register_username").val();
    let password = $(this).find("input#register_password").val();
    let email = $(this).find("input#register_email").val();
    var loadingElement = $("div.zakas-preloader");
    loadingElement.addClass("active");
    $.ajax({
      url: "./Ajax/insertAccount",
      cache: false,
      type: "POST", // method: 'POST'
      success: function (res) {
        loadingElement.removeClass("active");
      },
    });
    //return false;
  });

  $("#register_username").keyup(function () {
    var user = $(this).val();
    $.post("./Ajax/checkUsername", { username: user }, function (data) {
      console.log(user);
      if (user.length >= 8) {
        if (data == "true") {
          $("#message_username").html(
            "<i class='text-danger'>Tài khoản đã tồn tại trong hệ thống</i>"
          );
        } else {
          $("#message_username").html(
            "<i class='text-success'>Tài khoản hợp lệ</i>"
          );
        }
      } else {
        if (user.length != 0) {
          $("#message_username").html(
            "<i class='text-warning'>Tên tài khoản tối thiểu 8 kí tự</i>"
          );
        }
      }
      if (user.includes(" ")) {
        $("#message_username").html(
          "<i class='text-warning'>Tài khoản không được có khoảng trắng</i>"
        );
      }
      if (user.length < 1) {
        console.log("Khong duoc bo trong");
        $("#message_username").html(
          "<i class='text-warning'>Tài khoản không được bỏ trống</i>"
        );
      }
    });
  });
});
