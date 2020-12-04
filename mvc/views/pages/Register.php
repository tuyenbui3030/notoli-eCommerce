<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Register</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>Register</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content-wrapper">
    <div class="page-content-inner pt--75 pb--80">
        <div class="container">
            <div class="row justify-content-center">
                <!-- login -->
                <div class="col-md-6">
                    <div class="register-box">
                        <h4 class="heading__tertiary mb--30">Register</h4>
                        <form class="form form--login" action="./Register/UserRegister" method="POST">
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="register_username">Username <span
                                        class="required">*</span></label>
                                <span class="message" id="message_username"></span>
                                <input type="text" class="form__input form__input--2" id="register_username"
                                    name="register_username">

                            </div>

                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="register_password">Password <span
                                        class="required">*</span></label>
                                <input type="password" class="form__input form__input--2" id="register_password"
                                    name="register_password">
                            </div>
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="register_email">Email address <span
                                        class="required">*</span></label>
                                <span class="message" id="message_email"></span>
                                <input type="email" class="form__input form__input--2" id="register_email"
                                    name="register_email">
                                <div id="message_email"></div>
                            </div>
                            <!-- <p class="privacy-text mb--20">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p> -->
                            <div class="form__group">
                                <input type="submit" name="btnRegister" value="Register"
                                    class="btn btn-submit btn-style-1">
                            </div>
                        </form>
                        <?php if(isset($data["result"])) { ?>
                        <h3>
                            <?php
                                if($data["result"] == "true") {
                                    echo "Đăng ký thành công, vui lòng xác nhận tài khoản <a href='https://gmail.com/'>Tại đây</a>";
                                } else {
                                    echo "Đăng ký thất bại";
                                }
                            ?>
                        </h3>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>