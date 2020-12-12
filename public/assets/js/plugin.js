function disableScreen() {
  var screenLock = $("#screen_lock");
  screenLock.addClass("overlay");
}
function enableScreen() {
  var screenLock = $("#screen_lock");
  screenLock.removeClass("overlay");
}
//Register Validation
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
      url: "./Register/registerAccount",
      data: $(this).serialize(),
      type: "POST",
      success: function (res) {
        console.log(res);
        if (jQuery.trim(res) == "true") {
          messageResult.removeClass("text-danger");
          messageResult.addClass("text-success");
          messageResult
            .last()
            .html("Đăng ký tài khoản thành công, vui lòng xác nhận email");
          $("#register_username").val("");
          $("#register_password").val("");
          $("#register_email").val("");
          $("#message_username").html("");
          $("#message_password").html("");
          $("#message_email").html("");
        } else {
          messageResult.removeClass("text-success");
          messageResult.addClass("text-danger");
          messageResult.last().html("Đăng ký tài khoản thất bại");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 500);
        // loadingElement.removeClass("active");
      },
    });
    return false;
  });
  //Check username
  $("#register_username").keyup(function () {
    ruleUsername();
  });
  function ruleUsername() {
    var user = $("#register_username").val();
    var messageUsername = $("#message_username");
    $.post("./Register/checkUsername", { username: user }, function (data) {
      if (data == "true") {
        messageUsername.html("Tài khoản đã tồn tại trong hệ thống");
        messageUsername.addClass("text-danger");
        messageUsername.removeClass("text-success");
        messageUsername.removeClass("text-warning");
        rule_username = false;
      } else {
        var regex = /^([a-zA-Z0-9_.+-])(?=.{5,})/;
        if (regex.test(user)) {
          messageUsername.html("Tài khoản hợp lệ");
          messageUsername.addClass("text-success");
          messageUsername.removeClass("text-warning");
          messageUsername.removeClass("text-danger");
          rule_username = true;
        } else {
          messageUsername.html(
            "Tài khoản tối thiểu 6 (yêu cầu không có khoảng cách và kí tự đặc biệt)"
          );
          messageUsername.addClass("text-warning");
          messageUsername.removeClass("text-success");
          messageUsername.removeClass("text-danger");
          rule_username = false;
        }
      }
    });
  }
  $("#register_password").keyup(function () {
    rulePassword();
  });

  function rulePassword() {
    var val = $("#register_password").val();
    var messagePassword = $("#message_password");
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;
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
  }

  $("#register_email").keyup(function () {
    ruleEmail2();
  });

  function ruleEmail() {
    var val = $("#register_email").val();
    var messageEmail = $("#message_email");
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
  function ruleEmail2() {
    var val = $("#register_email").val();
    var messageEmail = $("#message_email");
    $.post("./Register/checkEmail", { email: val }, function (data) {
      if (data == "true") {
        messageEmail.html("Email đã được đăng kí bởi 1 tài khoản khác");
        messageEmail.addClass("text-danger");
        messageEmail.removeClass("text-success");
        messageEmail.removeClass("text-warning");
        rule_username = false;
      } else {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (regex.test(val)) {
          messageEmail.html("Email hợp lệ");
          messageEmail.addClass("text-success");
          messageEmail.removeClass("text-warning");
          messageEmail.removeClass("text-danger");
          rule_username = true;
        } else {
          messageEmail.html("Email không hợp lệ");
          messageEmail.addClass("text-warning");
          messageEmail.removeClass("text-success");
          messageEmail.removeClass("text-danger");
          rule_username = false;
        }
      }
    });
  }
  $("#btnRegister").click(function () {
    ruleUsername();
    rulePassword();
    ruleEmail2();

    if (rule_username && rule_password && rule_email) {
      return true;
    }
    $(".popup_box").css("display", "block");
    disableScreen();
    $("#btn-close").click(function () {
      $(".popup_box").css("display", "none");
      enableScreen();
    });
    return false;
  });
});
/*Login*/
$(document).ready(function () {
  $("#btnLogin").on("click", function () {
    var username = $("#login_username").val();
    var password = $("#login_password").val();
    if (username == "" || password == "") {
      $(".popup_box").css("display", "block");
      disableScreen();
      $("#btn-close").click(function () {
        $(".popup_box").css("display", "none");
        enableScreen();
      });
      return false;
    }
    var loadingElement = $("div.zakas-preloader");
    loadingElement.addClass("active");
    $.ajax({
      url: "./Login/loginPageController",
      method: "POST",
      data: {
        login: 1,
        usernamePHP: username,
        passwordPHP: password,
      },
      success: function (response) {
        var loginResponse = $("#login_response");
        if (response == "true") {
          window.location.href = "./";
        } else {
          loginResponse.html("Tên đăng nhập hoặc mật khẩu không chính xác!");
          loginResponse.addClass("text-danger");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 1000);
      },
      dataType: "text",
    });
    return false;
  });
});
//Send mail khôi phục mật khẩu

$(document).ready(function () {
  $("form#sendMail-form").on("submit", function (e) {
    var loadingElement = $("div.zakas-preloader");
    var messageResult = $("#message_recover_result");
    loadingElement.addClass("active");
    $.ajax({
      url: "./Login/sendMail",
      data: $(this).serialize(),
      type: "POST",
      success: function (res) {
        console.log(res);
        if (jQuery.trim(res) == "true") {
          messageResult.removeClass("text-danger");
          messageResult.addClass("text-success");
          messageResult
            .last()
            .html(
              "Mã xác minh đã được gửi đến địa chỉ email đăng kí. Vui lòng xác minh"
            );
        } else {
          messageResult.removeClass("text-success");
          messageResult.addClass("text-danger");
          messageResult.last().html("Email không tồn tại");
        }
        setTimeout(function () {
          loadingElement.removeClass("active");
        }, 500);
      },
    });
    return false;
  });
});
