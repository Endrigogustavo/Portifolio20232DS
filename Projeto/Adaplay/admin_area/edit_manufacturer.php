<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>

    <?php

    if (isset($_GET['edit_manufacturer'])) {

        $edit_manufacturer = $_GET['edit_manufacturer'];

        $get_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer'";

        $run_manufacturer = mysqli_query($con, $get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $m_id = $row_manufacturer['manufacturer_id'];

        $m_title = $row_manufacturer['manufacturer_title'];

        $m_top = $row_manufacturer['manufacturer_top'];

        $m_image = $row_manufacturer['manufacturer_image'];

        $new_m_image = $row_manufacturer['manufacturer_image'];
    }


    ?>
    <div class="row"><!-- 1 row Começa -->

        <div class="col-lg-12"><!-- col-lg-12 Começa -->

            <ol class="breadcrumb"><!-- breadcrumb Começa -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Painel / Editar Fabricante

                </li>

            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 1 row Termina -->


    <div class="row"><!-- 2 row Começa -->

        <div class="col-lg-12"><!-- col-lg-12 Começa -->

            <div class="panel panel-default"><!-- panel panel-default Começa -->

                <div class="panel-heading"><!-- panel-heading Começa -->

                    <h3 class="panel-title"><!-- panel-title Começa -->

                        <i class="fa fa-money fa-fw"> </i> Editar Fabricante

                    </h3><!-- panel-title Termina -->

                </div><!-- panel-heading Termina -->

                <div class="panel-body"><!-- panel-body Começa -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Começa -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Nome do Fabricante </label>

                            <div class="col-md-6">

                                <input type="text" name="manufacturer_name" class="form-control" value="<?php echo $m_title; ?>">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Mostrar como Principais Fabricantes </label>

                            <div class="col-md-6">

                                <input type="radio" name="manufacturer_top" value="sim" <?php if ($m_top == 'não') {
                                                                                        } else {
                                                                                            echo "checked='checked'";
                                                                                        } ?>>

                                <label> Sim </label>

                                <input type="radio" name="manufacturer_top" value="não" <?php if ($m_top == 'não') {
                                                                                            echo "checked='checked'";
                                                                                        } else {
                                                                                        } ?>>

                                <label> Não </label>

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> Selecione a Imagem do Fabricante </label>

                            <div class="col-md-6">

                                <input type="file" name="manufacturer_image" class="form-control">

                                <br>

                                <img src="other_images/<?php echo $m_image; ?>" width="70" height="70">

                            </div>

                        </div><!-- form-group Termina -->

                        <div class="form-group"><!-- form-group Começa -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class="form-control btn btn-primary" value=" Atualizar Fabricante ">

                            </div>

                        </div><!-- form-group Termina -->

                    </form><!-- form-horizontal Termina -->

                </div><!-- panel-body Termina -->

            </div><!-- panel panel-default Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- 2 row Termina -->

    <?php

    if (isset($_POST['update'])) {

        $manufacturer_name = $_POST['manufacturer_name'];

        $manufacturer_top = $_POST['manufacturer_top'];

        $manufacturer_image = $_FILES['manufacturer_image']['name'];

        $tmp_name = $_FILES['manufacturer_image']['tmp_name'];

        move_uploaded_file($tmp_name, "other_images/$manufacturer_image");

        if (empty($manufacturer_image)) {

            $manufacturer_image = $new_m_image;
        }

        $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top',manufacturer_image='$manufacturer_image' where manufacturer_id='$m_id'";

        $run_manufacturer = mysqli_query($con, $update_manufacturer);

        if ($run_manufacturer) {

            echo "<script>alert('Fabricante Foi Atualizado')</script>";

            echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
        }
    }

    ?>

<?php } ?>