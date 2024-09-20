<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">LOGIN</h1>
                <div style="text-align:center;color:orange;font-weight:bold"> <?php echo isset($error)?$error:"";?></div>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="User name">
                    <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password">
                    <button type="submit" name="btnSignIn" class="btn btn-primary btn-block opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                    <a href="">REGISTER</a>
                    <a href="">FORGOT PASSWORD</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>