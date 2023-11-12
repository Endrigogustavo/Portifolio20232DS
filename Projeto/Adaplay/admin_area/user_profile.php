<?php



if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['user_profile'])) {

        $edit_id = $_GET['user_profile'];

        $get_admin = "select * from admins where admin_id='$edit_id'";

        $run_admin = mysqli_query($con, $get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];

        $admin_name = $row_admin['admin_name'];

        $admin_email = $row_admin['admin_email'];

        $admin_pass = $row_admin['admin_pass'];

        $admin_image = $row_admin['admin_image'];

        $new_admin_image = $row_admin['admin_image'];

        $admin_country = $row_admin['admin_country'];

        $admin_job = $row_admin['admin_job'];

        $admin_contact = $row_admin['admin_contact'];

        $admin_about = $row_admin['admin_about'];
    }



    ?>


    <div class="row"><!-- 1 linha começa -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <ol class="breadcrumb"><!-- breadcrumb Inicia -->
                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Editar Perfil

                </li>


            </ol><!-- breadcrumb Termina -->

        </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 1 linha -->

    <div class="row"><!-- Início de 2 linhas -->

        <div class="col-lg-12"><!-- col-lg-12 Inicia -->

            <div class="panel panel-default"><!-- panel panel-default Inicia -->

                <div class="panel-heading"><!-- panel-heading Inicia -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Editar Perfil

                    </h3>


                    <div><!-- cabeçalho do painel Termina -->


                        <div class="panel-body"><!-- panel-body Inicia -->

                            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicia -->

                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label">Nome de Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                                <div class="form-group"><!-- form-group Inicia -->
                                    <label class="col-md-3 control-label">Email do Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label">Senha do Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="text" name="admin_pass" class="form-control" required value="<?php echo $admin_pass; ?>">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->

                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label">País do Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="text" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label">Emprego do Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="text" name="admin_job" class="form-control" required value="<?php echo $admin_job; ?>">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label">Contato do Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label">Sobre o Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <textarea name="admin_about" class="form-control" rows="3"> <?php echo $admin_about; ?> </textarea>

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->

                                <div class="form-group"><!-- form-group Inicia -->
                                    <label class="col-md-3 control-label">Imagem do Usuário: </label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="file" name="admin_image" class="form-control">
                                        <br>
                                        <img src="admin_images/<?Php echo $admin_image; ?>" width="70" height="70">

                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                                <div class="form-group"><!-- form-group Inicia -->

                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-6"><!-- col-md-6 Inicia -->

                                        <input type="submit" name="update" value="Atualizar Perfil" class="btn btn-primary form-control">
                                    </div><!-- col-md-6 Termina -->

                                </div><!-- form-group Termina -->


                            </form><!-- form-horizontal Termina -->

                        </div><!-- painel-body Termina -->

                    </div><!-- painel panel-default Termina -->

                </div><!-- col-lg-12 Termina -->


            </div><!-- Fim de 2 linhas -->

            <?php

            if (isset($_POST['update'])) {

                $admin_name = $_POST['admin_name'];

                $admin_email = $_POST['admin_email'];

                $admin_pass = $_POST['admin_pass'];

                $admin_country = $_POST['admin_country'];

                $admin_job = $_POST['admin_job'];

                $admin_contact = $_POST['admin_contact'];

                $admin_about = $_POST['admin_about'];


                $admin_image = $_FILES['admin_image']['name'];

                $temp_admin_image = $_FILES['admin_image']['tmp_name'];

                move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

                if (empty($admin_image)) {

                    $admin_image = $new_admin_image;
                }

                $update_admin = "update admins set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_image='$admin_image',admin_contact='$admin_contact',admin_country='$admin_country',admin_job='$admin_job',admin_about='$admin_about' where admin_id='$admin_id'";

                $run_admin = mysqli_query($con, $update_admin);

                if ($run_admin) {

                    echo "<script>alert('O usuário foi atualizado com sucesso e faça login novamente')</script>";

                    echo "<script>window.open('login.php','_self')</script>";

                    session_destroy();
                }
            }


            ?>



        <?php }  ?>