$(document).ready(function () {
  var rule_email = false;
  var rule_username = false;
  var rule_password = false;
  //Submit register
  $("form#registration-form").on("submit", function (e) {
    var loadingElement = $("div.zakas-preloader");
    var messageResult = $("#message_result");
    loadingElement.addClass("active");
    $.ajax({
      url: "./Ajax/registerAccount",
      data: $(this).serialize(),
      type: "POST",
      success: function (res) {
        if (jQuery.trim(res) == "success") {
          messageResult.addClass("text-success");
          messageResult
            .last()
            .html("Đăng ký tài khoản thành công, vui lòng xác nhận email");
        } else {
          messageResult.addClass("text-danger");
          messageResult.last().html("Đăng ký tài khoản thất bại");
        }
        loadingElement.removeClass("active");
      },
    });
    return false;
  });
  //Check username
  $("#register_username").keyup(function () {
    var user = $(this).val();
    $.post("./Ajax/checkUsername", { username: user }, function (data) {
      if (data == "true") {
        $("#message_username").html(
          "<i class='text-danger'>Tài khoản đã tồn tại trong hệ thống</i>"
        );
        rule_username = false;
      }
    });
  });
  $("#register_password").keyup(function () {
    var val = $("#register_password").val();
    console.log(val);
    var messagePassword = $("#message_password");
    //var regex = /^([a-zA-Z0-9_.+-])+$/;
    var regex = new RegExp(
      "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
    );
    if (regex.test(val)) {
      messagePassword.html("Password hợp lệ");
      messagePassword.addClass("text-success");
      messagePassword.removeClass("text-warning");
      rule_password = true;
    } else {
      messagePassword.html(
        "Mật khẩu tối thiểu 8 kí tự và gồm cả chữ thường, chữ hoa, số và kí tự đặc biệt"
      );
      messagePassword.addClass("text-warning");
      messagePassword.removeClass("text-success");
      rule_password = false;
    }
  });
  $("#register_email").keyup(function () {
    ruleEmail();
  });

  function ruleEmail() {
    var val = $("#register_email").val();
    var messageEmail = $("#message_email");
    // var regex = new RegExp(
    //   "^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})"
    // );
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(val)) {
      messageEmail.html("Email hợp lệ");
      messageEmail.addClass("text-success");
      messageEmail.removeClass("text-warning");
      rule_email = true;
    } else {
      messageEmail.html("Email không hợp lệ");
      messageEmail.addClass("text-warning");
      messageEmail.removeClass("text-success");
      rule_email = false;
    }
  }
  $("#btnRegister").click(function () {
    if (rule_email && rule_password && rule_username) {
      return true;
    }
    return false;
  });
});
