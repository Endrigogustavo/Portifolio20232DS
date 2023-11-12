<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

    <title>Login do Administrador</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

<div class="container"><!-- container inicia -->

<form class="form-login" action="" method="post"><!-- form-login Inicia -->

            <h2 class="form-login-heading">Login do Administrador</h2>

            <input type="text" class="form-control" name="admin_email" placeholder="Email" required>

            <input type="password" class="form-control" name="admin_pass" placeholder="Senha" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">

                Entrar

            </button>

            </form><!-- form-login Termina -->

</div><!-- container Termina -->




</body>

</html>

<?php

if (isset($_POST['admin_login'])) {

    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin = mysqli_query($con, $get_admin);

    $count = mysqli_num_rows($run_admin);

    if ($count == 1) {

        $_SESSION['admin_email'] = $admin_email;

        echo "<script>alert('Você está logado no painel de administração')</script>";

        echo "<script>window.open('index.php?dashboard','_self')</script>";
    } else {

        echo "<script>alert('E-mail ou senha estão errados')</script>";
    }
}

?>