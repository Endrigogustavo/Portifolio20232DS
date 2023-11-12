
<?php
// Verifica se o parâmetro 'delete_wishlist' foi passado na URL, indicando que o usuário deseja excluir um item da lista de desejos.
if (isset($_GET['delete_wishlist'])) {
    // Obtém o ID do item da lista de desejos a ser excluído da URL.
    $delete_id = $_GET['delete_wishlist'];
    // Cria uma consulta SQL para excluir o item da lista de desejos com base no seu ID.
    $delete_wishlist = "delete from wishlist where wishlist_id='$delete_id'";

    // Executa a consulta no banco de dados.
    $run_delete = mysqli_query($con, $delete_wishlist);
    // Verifica se a exclusão foi bem-sucedida.
    if ($run_delete) {

        // Redireciona o usuário de volta à página "my_account.php?my_wishlist".
        echo "<script>window.open('my_account.php?my_wishlist','_self')</script>";
    }
}




?>

