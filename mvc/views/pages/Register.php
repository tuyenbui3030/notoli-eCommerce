<div class="col-md-6">
    <div class="register-box">
        <h4 class="heading__tertiary mb--30">Register</h4>
        <form class="form form--login" action="./Register/UserRegister" method="POST">
            <div class="form__group mb--20">
                <label class="form__label form__label--2" for="register_username">Username <span
                        class="required">*</span></label>
                <input type="text" class="form__input form__input--2" id="register_username" name="register_username">
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
                <input type="email" class="form__input form__input--2" id="register_email" name="register_email">
            </div>
            <!-- <p class="privacy-text mb--20">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p> -->
            <div class="form__group">
                <input type="submit" name="btnRegister" value="Register" class="btn btn-submit btn-style-1">
            </div>
        </form>
        <?php if(isset($data["result"])) { ?>
        <h3>
            <?php
                if($data["result"] == "true") {
                    echo "Đăng ký thành công";
                } else {
                    echo "Đăng ký thất bại";
                }
            ?>
        </h3>
        <?php } ?>
    </div>
</div>