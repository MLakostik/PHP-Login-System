<?php 
session_start();
$user_name = $_SESSION['name'];
$user_email = $_SESSION['email'];
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/components/header.php"); ?>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/components/navigation.php"); ?>
    <div class="highlight-clean">
        <div class="container" style="margin-top: 159px;">
            <div class="intro">
                <h2 class="text-center">Hello, <?php echo $user_name; ?></h2>
                <p class="text-center">You've successfully logged in! The source code of this project is available on my GitHub</p>
            </div>
            <div class="buttons"><a class="btn btn-primary" role="button" href="">github</a><a href="<?php echo get_base_url() . "/project/login-system/logout-demo"; ?>"><button class="btn btn-light" type="button">log out</button></a></div>
        </div>
    </div>
    <script src="<?php echo get_base_url() . "/"; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo get_base_url() . "/"; ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="<?php echo get_base_url() . "/"; ?>assets/js/theme.js"></script>
</body>
</html>