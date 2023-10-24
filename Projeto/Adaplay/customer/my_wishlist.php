<center>

    <h1> Minha Lista de Desejos </h1>

    <p class="lead"> Todos os seus produtos da lista de desejos em um só lugar. </p>

</center>

<hr>

<div class="table-responsive">

    <table class="table table-bordered table-hover">

        <thead>

            <tr>

                <th> Lista de Desejos: </th>

                <th> Produto da Lista de Desejos </th>

                <th> Deletar da Lista </th>

            </tr>

        </thead>

        <tbody>

            <?php

// Obtém informações do cliente com base no endereço de email da sessão.
            $customer_session = $_SESSION['customer_email'];

            $get_customer = "select * from customers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $i = 0;


            $get_wishlist = "select * from wishlist where customer_id='$customer_id'";

            $run_wishlist = mysqli_query($con, $get_wishlist);

             // Loop para exibir os itens da lista de desejos.
            while ($row_wishlist = mysqli_fetch_array($run_wishlist)) {

                $wishlist_id = $row_wishlist['wishlist_id'];

                $product_id = $row_wishlist['product_id'];

                $get_products = "select * from products where product_id='$product_id'";

                $run_products = mysqli_query($con, $get_products);

                $row_products = mysqli_fetch_array($run_products);

                $product_title = $row_products['product_title'];

                $product_url = $row_products['product_url'];

                $product_img1 = $row_products['product_img1'];

                $i++;

            ?>

                <tr>

                    <td width="100"> <?php echo $i; ?> </td>

                    <td>

                        <img src="../admin_area/product_images/<?php echo $product_img1; ?>" width="60" height="60">

                        &nbsp;&nbsp;&nbsp;

                        <a href="../<?php echo $product_url; ?>">

                            <?php echo $product_title; ?>

                        </a>

                    </td>
 <!-- Coluna com a imagem e o título do produto da lista de desejos. -->
                    <td>

                        <a href="my_account.php?delete_wishlist=<?php echo $wishlist_id; ?>" class="btn btn-primary">

                            <i class="fa fa-trash-o"> </i> Delete

                        </a>

                    </td>
  <!-- Coluna com um botão para excluir o item da lista de desejos. -->
                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>