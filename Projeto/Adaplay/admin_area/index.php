<?php

session_start();

include("includes/db.php");

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>

    <?php

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from admins  where admin_email='$admin_session'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];

    $admin_name = $row_admin['admin_name'];

    $admin_email = $row_admin['admin_email'];

    $admin_image = $row_admin['admin_image'];

    $admin_country = $row_admin['admin_country'];

    $admin_job = $row_admin['admin_job'];

    $admin_contact = $row_admin['admin_contact'];

    $admin_about = $row_admin['admin_about'];


    $get_products = "SELECT * FROM products";
    $run_products = mysqli_query($con, $get_products);
    $count_products = mysqli_num_rows($run_products);

    $get_customers = "SELECT * FROM customers";
    $run_customers = mysqli_query($con, $get_customers);
    $count_customers = mysqli_num_rows($run_customers);

    $get_p_categories = "SELECT * FROM product_categories";
    $run_p_categories = mysqli_query($con, $get_p_categories);
    $count_p_categories = mysqli_num_rows($run_p_categories);


    $get_total_orders = "SELECT * FROM customer_orders";
    $run_total_orders = mysqli_query($con, $get_total_orders);
    $count_total_orders = mysqli_num_rows($run_total_orders);


    $get_pending_orders = "SELECT * FROM customer_orders WHERE order_status='Pago'";
    $run_pending_orders = mysqli_query($con, $get_pending_orders);
    $count_pending_orders = mysqli_num_rows($run_pending_orders);

    $get_completed_orders = "SELECT * FROM customer_orders WHERE order_status='Pago'";
    $run_completed_orders = mysqli_query($con, $get_completed_orders);
    $count_completed_orders = mysqli_num_rows($run_completed_orders);


    $get_total_earnings = "SELECT SUM( due_amount) as Total FROM customer_orders WHERE order_status = 'Pago'";
    $run_total_earnings = mysqli_query($con, $get_total_earnings);
    $row = mysqli_fetch_assoc($run_total_earnings);
    $count_total_earnings = $row['Total'];


    $get_coupons = "SELECT * FROM coupons";
    $run_coupons = mysqli_query($con, $get_coupons);
    $count_coupons = mysqli_num_rows($run_coupons);


    ?>


    <!DOCTYPE html>
    <html>

    <head>

        <title>Painel do Administrador</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">

    </head>

    <body>

        <div id="wrapper"><!-- wrapper inicia -->

            <?php include("includes/sidebar.php");  ?>

            <div id="page-wrapper"><!-- page-wrapper Inicia -->

                <div class="container-fluid"><!-- container-fluid é iniciado -->

                    <?php

                    if (isset($_GET['dashboard'])) {

                        include("dashboard.php");
                    }

                    if (isset($_GET['insert_product'])) {

                        include("insert_product.php");
                    }

                    if (isset($_GET['view_products'])) {

                        include("view_products.php");
                    }

                    if (isset($_GET['delete_product'])) {

                        include("delete_product.php");
                    }

                    if (isset($_GET['edit_product'])) {

                        include("edit_product.php");
                    }

                    if (isset($_GET['insert_p_cat'])) {

                        include("insert_p_cat.php");
                    }

                    if (isset($_GET['view_p_cats'])) {

                        include("view_p_cats.php");
                    }

                    if (isset($_GET['delete_p_cat'])) {

                        include("delete_p_cat.php");
                    }

                    if (isset($_GET['edit_p_cat'])) {

                        include("edit_p_cat.php");
                    }

                    if (isset($_GET['insert_cat'])) {

                        include("insert_cat.php");
                    }

                    if (isset($_GET['view_cats'])) {

                        include("view_cats.php");
                    }

                    if (isset($_GET['delete_cat'])) {

                        include("delete_cat.php");
                    }

                    if (isset($_GET['edit_cat'])) {

                        include("edit_cat.php");
                    }


                    if (isset($_GET['view_customers'])) {

                        include("view_customers.php");
                    }

                    if (isset($_GET['customer_delete'])) {

                        include("customer_delete.php");
                    }


                    if (isset($_GET['view_orders'])) {

                        include("view_orders.php");
                    }

                    if (isset($_GET['order_delete'])) {

                        include("order_delete.php");
                    }


                    if (isset($_GET['view_payments'])) {

                        include("view_payments.php");
                    }

                    if (isset($_GET['payment_delete'])) {

                        include("payment_delete.php");
                    }

                    if (isset($_GET['insert_user'])) {

                        include("insert_user.php");
                    }

                    if (isset($_GET['view_users'])) {

                        include("view_users.php");
                    }


                    if (isset($_GET['user_delete'])) {

                        include("user_delete.php");
                    }

                    if (isset($_GET['user_profile'])) {

                        include("user_profile.php");
                    }

                    if (isset($_GET['insert_box'])) {

                        include("insert_box.php");
                    }

                    if (isset($_GET['view_boxes'])) {

                        include("view_boxes.php");
                    }

                    if (isset($_GET['delete_box'])) {

                        include("delete_box.php");
                    }

                    if (isset($_GET['edit_box'])) {

                        include("edit_box.php");
                    }

                    if (isset($_GET['edit_css'])) {

                        include("edit_css.php");
                    }

                    if (isset($_GET['insert_manufacturer'])) {

                        include("insert_manufacturer.php");
                    }

                    if (isset($_GET['view_manufacturers'])) {

                        include("view_manufacturers.php");
                    }

                    if (isset($_GET['delete_manufacturer'])) {

                        include("delete_manufacturer.php");
                    }

                    if (isset($_GET['edit_manufacturer'])) {

                        include("edit_manufacturer.php");
                    }


                    if (isset($_GET['insert_coupon'])) {

                        include("insert_coupon.php");
                    }

                    if (isset($_GET['view_coupons'])) {

                        include("view_coupons.php");
                    }

                    if (isset($_GET['delete_coupon'])) {

                        include("delete_coupon.php");
                    }


                    if (isset($_GET['edit_coupon'])) {

                        include("edit_coupon.php");
                    }

                    if (isset($_GET['edit_contact_us'])) {

                        include("edit_contact_us.php");
                    }


                    if (isset($_GET['edit_about_us'])) {

                        include("edit_about_us.php");
                    }

                    ?>

                </div><!-- container-fluid Termina -->

            </div><!-- page-wrapper Termina -->

        </div><!-- fim do wrapper -->

        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>


    </body>


    </html>

<?php } ?>