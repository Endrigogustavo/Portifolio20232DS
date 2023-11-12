<div class="panel panel-default sidebar-menu"><!-- painel painel-default sidebar-menu Inicia -->

    <div class="panel-heading"><!-- cabeçalho do painel Inicia -->

        <?php

        $customer_session = $_SESSION['customer_email'];

        $get_customer = "select * from customers where customer_email='$customer_session'";

        $run_customer = mysqli_query($con, $get_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_image = $row_customer['customer_image'];

        $customer_name = $row_customer['customer_name'];

        if (!isset($_SESSION['customer_email'])) {
        } else {

            echo "

<center>

<img src='customer_images/$customer_image' class='img-responsive'>

</center>

<br>

<h3 align='center' class='panel-title'> Nome : $customer_name </h3>

";
        }

        ?>
    </div><!-- cabeçalho do painel Termina -->

    <div class="panel-body"><!-- panel-body Inicia -->

        <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Inicia -->

            <li class="<?php if (isset($_GET['my_orders'])) {
                echo "active";
            } ?>">

                <a href="my_account.php?my_orders"> <i class="fa fa-pencil"></i> Meus Pedidos </a>

            </li>

            <li class="<?php if (isset($_GET['edit_account'])) {
                echo "active";
            } ?>">

                <a href="my_account.php?edit_account"> <i class="fa fa-pencil"></i> Editar Conta </a>

            </li>

            <li class="<?php if (isset($_GET['change_pass'])) {
                echo "active";
            } ?>">

                <a href="my_account.php?change_pass"> <i class="fa fa-user"></i> Alterar Senha </a>

            </li>

            <li class="<?php if (isset($_GET['my_wishlist'])) {
                echo "active";
            } ?>">

                <a href="my_account.php?my_wishlist"> <i class="fa fa-heart"></i> Minha Lista de Desejos </a>

            </li>

            <li class="<?php if (isset($_GET['delete_account'])) {
                echo "active";
            } ?>">

                <a href="my_account.php?delete_account"> <i class="fa fa-trash-o"></i> Deletar Conta </a>

            </li>

            <li>

                <a href="logout.php"> <i class="fa fa-sign-out"></i> Sair </a>

            </li>

        </ul><!-- nav nav-pills nav-stacked Termina -->

    </div><!-- painel-body Termina -->

</div><!-- painel painel-default sidebar-menu Termina -->