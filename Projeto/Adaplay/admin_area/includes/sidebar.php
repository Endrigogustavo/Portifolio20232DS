<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {




?>

    <nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top Inicia -->

        <div class="navbar-header"><!-- navbar-header Inicia -->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-ex1-collapse Starts -->


                <span class="sr-only">Alternar de navegação</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>


            </button><!-- navbar-ex1-collapse Termina -->
            <a class="navbar-brand" href="index.php?dashboard">Painel do Administrador</a>


        </div><!-- navbar-header Termina -->

        <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav Inicia -->

            <li class="dropdown"><!-- menu suspenso Inicia -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle Starts -->

                    <i class="fa fa-user"></i>

                    <?php echo $admin_name; ?> <b class="caret"></b>


                </a><!-- menu suspenso Terminais -->

                <ul class="dropdown-menu"><!-- menu suspenso Inicia -->

                    <li><!-- li Inicia -->

                        <a href="index.php?user_profile=<?php echo $admin_id; ?>">

                            <i class="fa fa-fw fa-user"></i> Perfil


                        </a>

                    </li><!-- li Termina -->

                    <li><!-- li Inicia -->

                        <a href="index.php?view_products">

                            <i class="fa fa-fw fa-envelope"></i> Produtos

                            <span class="badge">
                                <?php echo $count_products; ?>
                            </span>


                        </a>

                    </li><!-- li Termina -->

                    <li><!-- li Inicia -->

                        <a href="index.php?view_customers">

                            <i class="fa fa-fw fa-gear"></i> Clientes

                            <span class="badge">
                                <?php echo $count_customers; ?>
                            </span>


                        </a>

                    </li><!-- li Termina -->

                    <li><!-- li Inicia -->

                        <a href="index.php?view_p_cats">

                            <i class="fa fa-fw fa-gear"></i> Categoria de Produtos

                            <span class="badge">
                                <?php echo $count_p_categories; ?>
                            </span>


                        </a>

                    </li>
                    <!-- li Termina -->

                    <li class="divider"></li>

                    <li><!-- li Inicia -->

                        <a href="logout.php">

                            <i class="fa fa-fw fa-power-off"> </i> Sair

                        </a>

                    </li><!-- li Termina -->

                </ul><!-- menu suspenso Termina -->





            </li><!-- menu suspenso Termina -->


        </ul><!-- nav navbar-right top-nav Termina -->

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <!-- Collapse navbar-collapse navbar-ex1-collapse Inicia -->

            <ul class="nav navbar-nav side-nav">
                <!-- nav navbar-nav side-nav Inicia -->

                <li><!-- li Inicia -->

                    <a href="index.php?dashboard">

                        <i class="fa fa-fw fa-dashboard"></i> Dashboard

                    </a>

                </li><!-- li Termina -->

                <li><!-- Produtos li Início -->

                    <a href="#" data-toggle="collapse" data-target="#products">

                        <i class="fa fa-fw fa-table"></i> Produtos

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="products" class="collapse">

                        <li>
                            <a href="index.php?insert_product"> Inserir </a>
                        </li>

                        <li>
                            <a href="index.php?view_products"> Ver Produtos </a>
                        </li>


                    </ul>

                </li><!-- Produtos li Terminais -->

                <li><!-- fabricante li Inicia -->

                    <a href="#" data-toggle="collapse" data-target="#manufacturers"><!-- anchor Starts -->

                        <i class="fa fa-fw fa-briefcase"></i> Fabricantes

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>
                    <!-- âncora Termina -->

                    <ul id="manufacturers" class="collapse"><!-- ul colapso Inicia -->

                        <li>
                            <a href="index.php?insert_manufacturer"> Inserir Fabricantes </a>
                        </li>

                        <li>
                            <a href="index.php?view_manufacturers"> Ver Fabricantes </a>
                        </li>
                    </ul><!-- ul colapso Termina -->


                </li><!-- fabricante li Termina -->


                <li><!-- li Inicia -->
                    <a href="#" data-toggle="collapse" data-target="#p_cat">

                        <i class="fa fa-fw fa-pencil"></i> Categoria de Produtos

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="p_cat" class="collapse">

                        <li>
                            <a href="index.php?insert_p_cat"> Inserir Categoria de Produtos </a>
                        </li>

                        <li>
                            <a href="index.php?view_p_cats"> Ver Categoria de Produtos </a>
                        </li>


                    </ul>
                </li><!-- li Termina -->


                <li><!-- li Inicia -->

                    <a href="#" data-toggle="collapse" data-target="#cat">

                        <i class="fa fa-fw fa-arrows-v"></i> Categorias

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>

                    <ul id="cat" class="collapse">

                        <li>
                            <a href="index.php?insert_cat"> Inserir Categoria </a>
                        </li>

                        <li>
                            <a href="index.php?view_cats"> Ver Categoria </a>
                        </li>


                    </ul>

                </li><!-- li Termina -->


                <li><!-- sobre nós li Começa -->

                    <a href="index.php?edit_about_us">

                        <i class="fa fa-fw fa-edit"></i> Editar Página Sobre Nós

                    </a>


                </li><!-- sobre nós li Termina -->


                <li><!-- Seção de cupons li começa -->

                    <a href="#" data-toggle="collapse" data-target="#coupons"><!-- anchor Starts -->

                        <i class="fa fa-fw fa-arrows-v"></i> Cupons

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a><!-- âncora Termina -->

                    <ul id="coupons" class="collapse"><!-- ullapse Inicia -->

                        <li>
                            <a href="index.php?insert_coupon"> Inserir Cupons</a>
                        </li>

                        <li>
                            <a href="index.php?view_coupons"> Ver Cupons </a>
                        </li>


                    </ul><!-- ul colapso Termina -->

                </li><!-- Seção de cupons li Termina -->

                <li>

                    <a href="index.php?view_customers">

                        <i class="fa fa-fw fa-edit"></i> Ver Clientes

                    </a>

                </li>

                <li>

                    <a href="index.php?view_orders">

                        <i class="fa fa-fw fa-list"></i> Ver Pedidos

                    </a>

                </li>

                <li>

                    <a href="index.php?view_payments">

                        <i class="fa fa-fw fa-pencil"></i> Ver Pagamentos

                    </a>

                </li>

                <li><!-- li Inicia -->

                    <a href="#" data-toggle="collapse" data-target="#users">

                        <i class="fa fa-fw fa-gear"></i> Usuários

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse">

                        <li>
                            <a href="index.php?insert_user"> Inserir Usuários </a>
                        </li>

                        <li>
                            <a href="index.php?view_users"> Ver Usuários </a>
                        </li>

                        <li>
                            <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Editar Perfil </a>
                        </li>

                    </ul>

                </li><!-- li Termina -->

                <li><!-- li Inicia -->

                    <a href="logout.php">

                        <i class="fa fa-fw fa-power-off"></i> Sair

                    </a>

                </li><!-- li Termina -->

            </ul><!-- nav navbar-nav side-nav Termina -->

        </div><!-- recolher navbar-collapse navbar-ex1-collapse Termina -->

    </nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>