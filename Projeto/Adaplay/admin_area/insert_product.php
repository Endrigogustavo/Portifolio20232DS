<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>
  <!DOCTYPE html>

  <html>

  <head>

    <title> Inserir Produtos </title>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#product_desc,#product_features'
      });
    </script>

  </head>

  <body>
    <!-- Início da linha -->
    <div class="row"><!-- início da linha -->

      <!-- Início da coluna-lg-12 -->
      <div class="col-lg-12"><!-- col-lg-12 Inicia -->

        <!-- Início da trilha de navegação -->
        <ol class="breadcrumb"><!-- breadcrumb Inicia -->

          <li class="active">

            <i class="fa fa-dashboard"> </i> Dashboard / Inserir Produtos

          </li>

        </ol><!-- breadcrumb Termina -->
        <!-- Fim da trilha de navegação -->

      </div><!-- col-lg-12 Termina -->
      <!-- Fim da coluna-lg-12 -->

    </div><!-- Fim da linha -->
    <!-- Fim da linha -->

    <!-- Início da 2ª linha -->
    <div class="row"><!-- Início de 2 linhas -->

      <!-- Início da coluna-lg-12 -->
      <div class="col-lg-12"><!-- col-lg-12 Inicia -->

        <!-- Início do painel padrão -->
        <div class="panel panel-default"><!-- panel panel-default Inicia -->

          <!-- Início do cabeçalho do painel -->
          <div class="panel-heading"><!-- panel-heading Inicia -->

            <!-- Início do título do painel -->
            <h3 class="panel-title">

              <i class="fa fa-money fa-fw"></i> Inserir Produtos

            </h3>

          </div><!-- cabeçalho do painel Termina -->
          <!-- Fim do cabeçalho do painel -->

          <!-- Início do corpo do painel -->
          <div class="panel-body"><!-- panel-body Inicia -->

            <!-- Início do formulário horizontal -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

              <!-- Início do grupo de formulário -->
              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Titulo do Produto</label>

                <div class="col-md-6">

                  <input type="text" name="product_title" class="form-control" required>

                </div>

              </div><!-- form-group Termina -->
              <!-- Fim do grupo de formulário -->


              <!-- Início do grupo de formulário -->
              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> URL do Produto</label>

                <div class="col-md-6">

                  <input type="text" name="product_url" class="form-control" required>

                  <br>

                  <p style="font-size:15px; font-weight:bold;">

                    Exemplo de "URL" : carrinho-adaptado-azul

                  </p>

                </div>

              </div><!-- form-group Termina -->
              <!-- Fim do grupo de formulário -->


              <!-- Início do grupo de formulário -->
              <div class="form-group"><!-- form-group Inicia -->
                <label class="col-md-3 control-label"> Selecione um Fabricante </label>

                <div class="col-md-6">

                  <!-- Início da seleção do fabricante -->
                  <select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->

                    <option> Selecione um Fabricante </option>

                    <?php

                    $get_manufacturer = "select * from manufacturers";
                    $run_manufacturer = mysqli_query($con, $get_manufacturer);
                    while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                      $manufacturer_id = $row_manufacturer['manufacturer_id'];
                      $manufacturer_title = $row_manufacturer['manufacturer_title'];

                      echo "<option value='$manufacturer_id'>
$manufacturer_title
</option>";
                    }

                    ?>
                  </select><!-- selecione fabricante Termina -->

                </div>

              </div><!-- form-group Termina -->


              <div class="form-group"><!-- form-group Inicia -->
                <label class="col-md-3 control-label"> Categoria de Produtos </label>

                <div class="col-md-6">

                  <select name="product_cat" class="form-control">

                    <option> Selecione uma Categoria de Produtos </option>


                    <?php

                    $get_p_cats = "select * from product_categories";

                    $run_p_cats = mysqli_query($con, $get_p_cats);

                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                      $p_cat_id = $row_p_cats['p_cat_id'];

                      $p_cat_title = $row_p_cats['p_cat_title'];

                      echo "<option value='$p_cat_id' >$p_cat_title</option>";
                    }


                    ?>


                  </select>

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Categoria </label>

                <div class="col-md-6">


                  <select name="cat" class="form-control">

                    <option> Selecione uma Categoria </option>

                    <?php

                    $get_cat = "select * from categories ";

                    $run_cat = mysqli_query($con, $get_cat);

                    while ($row_cat = mysqli_fetch_array($run_cat)) {

                      $cat_id = $row_cat['cat_id'];

                      $cat_title = $row_cat['cat_title'];

                      echo "<option value='$cat_id'>$cat_title</option>";
                    }

                    ?>


                  </select>

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Primeira Imagem do Produto </label>

                <div class="col-md-6">

                  <input type="file" name="product_img1" class="form-control" required>

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Segunda Imagem do Produto </label>

                <div class="col-md-6">

                  <input type="file" name="product_img2" class="form-control" required>

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Terceira Imagem do Produto </label>

                <div class="col-md-6">

                  <input type="file" name="product_img3" class="form-control" required>

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Preço do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_price" class="form-control" required>

                </div>


              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->
                <label class="col-md-3 control-label"> Preço Promocional do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="psp_price" class="form-control" required>

                </div>


              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Palavras-Chave do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_keywords" class="form-control" required>

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Guias do Produto </label>

                <div class="col-md-6">

                  <ul class="nav nav-tabs"><!-- nav nav-tabs Inicia -->

                    <li class="active">

                      <a data-toggle="tab" href="#description"> Descrição do Produto </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#features"> Especificações do Produto </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#video"> Sons e Vídeo</a>

                    </li>


                  </ul><!-- nav nav-tabs Fim -->

                  <div class="tab-content"><!-- tab-content Inicia -->

                    <div id="description" class="tab-pane fade in active">
                      <!-- descrição do painel da guia desaparece nas partidas ativas -->

                      <br>

                      <textarea name="product_desc" class="form-control" rows="15" id="product_desc">


</textarea>

                    </div><!-- painel da guia de descrição desaparece nas extremidades ativas -->


                    <div id="features" class="tab-pane fade in"><!-- apresenta o esmaecimento do painel de guias em Iniciar -->

                      <br>

                      <textarea name="product_features" class="form-control" rows="15" id="product_features">


</textarea>

                    </div><!-- apresenta o fade do painel de guias nas extremidades -->


                    <div id="video" class="tab-pane fade in"><!-- painel da guia de vídeo desaparece em Início -->

                      <br>

                      <textarea name="product_video" class="form-control" rows="15">


</textarea>

                    </div><!-- painel da guia de vídeo desaparece nas extremidades -->


                  </div><!-- tab-content Termina -->

                </div>

              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"> Rótulo do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_label" class="form-control" required>

                </div>
              </div><!-- form-group Termina -->

              <div class="form-group"><!-- form-group Inicia -->

                <label class="col-md-3 control-label"></label>

                <div class="col-md-6">

                  <input type="submit" name="submit" value="Inserir Produto" class="btn btn-primary form-control">

                </div>

              </div><!-- form-group Termina -->

            </form><!-- form-horizontal Termina -->

          </div><!-- painel-body Termina -->

        </div><!-- painel panel-default Termina -->

      </div><!-- col-lg-12 Termina -->

    </div><!-- Fim de 2 linhas -->




  </body>

  </html>

  <?php

  if (isset($_POST['submit'])) {

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];

    $psp_price = $_POST['psp_price'];

    $product_label = $_POST['product_label'];

    $product_url = $_POST['product_url'];

    $product_features = $_POST['product_features'];

    $product_video = $_POST['product_video'];

    $status = "product";

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $insert_product = "insert into products (p_cat_id,cat_id,manufacturer_id,date,product_title,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,product_video,product_keywords,product_label,status) values ('$product_cat','$cat','$manufacturer_id',NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3','$product_price','$psp_price','$product_desc','$product_features','$product_video','$product_keywords','$product_label','$status')";

    $run_product = mysqli_query($con, $insert_product);

    if ($run_product) {

      echo "<script>alert('O produto foi inserido com sucesso')</script>";

      echo "<script>window.open('index.php?view_products','_self')</script>";
    }
  }

  ?>

<?php } ?>