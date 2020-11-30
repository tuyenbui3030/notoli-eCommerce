$(document).ready(function () {
  $("#register_username").keyup(function () {
    var user = $(this).val();
    $.post("./Ajax/checkUsername", { username: user }, function (data) {
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
