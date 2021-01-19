<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/project/login-system/handlers/login-handler.php");
include($_SERVER['DOCUMENT_ROOT'] . "/components/header.php");
?>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/components/navigation.php"); ?>
    <div class="login-clean" style="margin: 0;background: rgb(255,255,255);margin-top: 80px;">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate" style="border-width: 0px;border-color: var(--danger);color: rgb(34,133,249);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <p id="error-msg" style="margin-bottom: -12px;color: var(--danger);text-align: center;"><?php echo $error_msg; ?></p>
            <div class="form-group"><button class="btn btn-primary btn-block" name="login-btn" type="submit" style="background: linear-gradient(122deg, var(--purple) 3%, var(--blue) 57%, rgb(17,146,239) 80%), var(--blue);">Log In</button></div>
            <a class="forgot" href="<?php echo get_base_url() . "/"; ?>project/login-system/register-demo">Don't have an account? Sign up</a>
        </form>
    </div>
    <script src="<?php echo get_base_url() . "/"; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo get_base_url() . "/"; ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="<?php echo get_base_url() . "/"; ?>assets/js/theme.js"></script>
</body>
</html>