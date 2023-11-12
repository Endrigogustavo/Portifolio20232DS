<?php
// Obtém o endereço de e-mail do cliente da sessão
$customer_session = $_SESSION['customer_email'];
// Cria uma consulta SQL para buscar todas as informações do cliente com base no endereço de e-mail
$get_customer = "select * from customers where customer_email='$customer_session'";
// Executa a consulta SQL e armazena o resultado em $run_customer
$run_customer = mysqli_query($con, $get_customer);
// Extrai os dados do cliente do resultado da consulta e armazena-os em $row_customer
$row_customer = mysqli_fetch_array($run_customer);
// Extrai informações específicas do cliente da matriz $row_customer
$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];

?>

<!-- A partir daqui, começa a parte do formulário HTML para editar as informações do cliente -->
<h1 align="center"> Edite sua Conta </h1>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">

        <label> Nome do Cliente: </label>

        <input type="text" name="c_name" class="form-control" required value="<?php echo $customer_name; ?>">


    </div>

    <div class="form-group">

        <label> Email do Cliente: </label>

        <input type="text" name="c_email" class="form-control" required value="<?php echo $customer_email; ?>">


    </div>

    <div class="form-group">

        <label> País do Cliente: </label>

        <input type="text" name="c_country" class="form-control" required value="<?php echo $customer_country; ?>">


    </div>

    <div class="form-group">

        <label> Cidade do Cliente: </label>

        <input type="text" name="c_city" class="form-control" required value="<?php echo $customer_city; ?>">


    </div>

    <div class="form-group">

        <label> Contato do Cliente: </label>

        <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_contact; ?>">


    </div>

    <div class="form-group">

        <label> Endereço do Cliente: </label>

        <input type="text" name="c_address" class="form-control" required value="<?php echo $customer_address; ?>">


    </div>

    <div class="form-group">

        <label> Foto do Cliente: </label>

        <input type="file" name="c_image" class="form-control" required id="imgfile"><br>

        <img src="customer_images/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive"
            id="imgpreview">


    </div>

    <div class="text-center">

        <button name="update" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Atualizar Agora

        </button>


    </div>


</form>

<?php
// Obtém os valores atualizados do cliente dos campos do formulário
if (isset($_POST['update'])) {

    $update_id = $customer_id;

    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_country = $_POST['c_country'];

    $c_city = $_POST['c_city'];

    $c_contact = $_POST['c_contact'];

    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    // Move a imagem carregada para a pasta de imagens do cliente
    move_uploaded_file($c_image_tmp, "customer_images/$c_image");
    // Cria uma consulta SQL para atualizar as informações do cliente no banco de dados
    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";
    // Executa a consulta SQL de atualização
    $run_customer = mysqli_query($con, $update_customer);
    // Se a atualização for bem-sucedida, exibe uma mensagem de alerta e redireciona para a página de logout
    if ($run_customer) {

        echo "<script>alert('Your account has been updated please login again')</script>";

        echo "<script>window.open('logout.php','_self')</script>";
    }
}


?>