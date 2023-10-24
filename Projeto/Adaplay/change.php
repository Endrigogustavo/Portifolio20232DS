<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

//Caso vocês esqueçam, aqui está a explicação deste código: 
//Este código PHP lida com a atualização da quantidade de um item no carrinho de compras de um usuário.

$ip_add = getRealUserIp();

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $qty = $_POST['quantity'];

    $change_qty = "update cart set qty='$qty' where p_id='$id' AND ip_add='$ip_add'";

    $run_qty = mysqli_query($con, $change_qty);
}





?>