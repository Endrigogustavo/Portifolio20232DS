<?php


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");

?>

<?php
// Verifica se o parâmetro 'c_id' está definido na URL.
if (isset($_GET['c_id'])) {
    // Se estiver definido, armazena seu valor na variável $customer_id.
    $customer_id = $_GET['c_id'];
}

$ip_add = getRealUserIp(); // Obtém o endereço IP do usuário.

$status = "Pago"; // Define o status do pedido como "pago".

$invoice_no = mt_rand(); // Gera um número de fatura aleatório.

$select_cart = "select * from cart where ip_add='$ip_add'"; // Consulta o carrinho do usuário com base no endereço IP.

$run_cart = mysqli_query($con, $select_cart); // Executa a consulta SQL no banco de dados.

while ($row_cart = mysqli_fetch_array($run_cart)) {
    // Loop para processar cada item no carrinho.

    $pro_id = $row_cart['p_id']; // Obtém o ID do produto.
    $pro_size = $row_cart['size']; // Obtém o tamanho do produto.
    $pro_qty = $row_cart['qty']; // Obtém a quantidade do produto.

    $sub_total = $row_cart['p_price'] * $pro_qty; // Calcula o subtotal do produto.

    // Insere um registro na tabela 'customer_orders' para registrar o pedido do cliente.
    $insert_customer_order = "insert into customer_orders (customer_id, due_amount, invoice_no, qty, size, order_date, order_status) values ('$customer_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', NOW(), '$status')";
    $run_customer_order = mysqli_query($con, $insert_customer_order);

    // Insere um registro na tabela 'pending_orders' para registrar o pedido pendente.
    $insert_pending_order = "insert into pending_orders (customer_id, invoice_no, product_id, qty, size, order_status) values ('$customer_id', '$invoice_no', '$pro_id', '$pro_qty', '$pro_size', '$status')";
    $run_pending_order = mysqli_query($con, $insert_pending_order);

    // Remove o item do carrinho após processamento do pedido.
    $delete_cart = "delete from cart where ip_add='$ip_add'";
    $run_delete = mysqli_query($con, $delete_cart);

    // Redireciona o usuário para sua conta após a conclusão do pedido.
    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
}
?>

