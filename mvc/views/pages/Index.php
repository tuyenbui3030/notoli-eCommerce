<div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                    <h1 class="page-title">Đăng nhập</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li class="current"><span>Đăng nhập</span></li>
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
                    <div class="login-box">
                        <?php
                            echo "<h1>HOME</h1>";
                            while($row = mysqli_fetch_array($data["itemProduct"])){
                                echo $row["name"] . "</br>";
                            }                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>