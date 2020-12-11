<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Đăng kí</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li class="current"><span>Đăng kí</span></li>
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
                <div class="col-md-8">
                    <div class="register-box">
                        <h4 class="heading__tertiary mb--30">Đăng kí tài khoản</h4>
                        <form class="form form--login" id="registration-form" action="./Register/UserRegister"
                            method="POST">
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="register_username">Tên tài khoản <span
                                        class="required">*</span></label>
                                <span class="message"><i id="message_username"></i></span>
                                <input type="text" class="form__input form__input--2" id="register_username"
                                    name="register_username">

                            </div>

                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="register_password">Mật khẩu <span
                                        class="required">*</span></label>
                                <span class="message"><i id="message_password"></i></span>

                                <input type="password" class="form__input form__input--2" id="register_password"
                                    name="register_password">
                            </div>
                            <div class="form__group mb--20">
                                <label class="form__label form__label--2" for="register_email">Email <span
                                        class="required">*</span></label>
                                <span class="message"><i id="message_email"></i></span>
                                <input type="email" class="form__input form__input--2" id="register_email"
                                    name="register_email">
                            </div>
                            <p id="message_result"></p>
                            <!-- <p class="privacy-text mb--20">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p> -->
                            <div class="form__group">
                                <input type="submit" id="btnRegister" name="btnRegister" value="Đăng kí"
                                    class="btn btn-submit btn-style-1">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>