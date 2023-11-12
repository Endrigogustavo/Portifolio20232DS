<?php
// Inicia a sessão PHP.
session_start();


//Variáveis de Link
$index = "index.php";
$register = "customer_register.php";
$conta = "customer/my_account.php?my_orders";
$cart = "cart.php";
$favorites = "customer/my_account.php?my_wishlist";
$products = "#";
$contato = "contact.php";
$logout = "logout.php";
$checkout = "checkout.php";
$sobrenos = "about.php";

// Inclui arquivos necessários, como configurações de banco de dados, cabeçalho, funções e conteúdo principal.
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");



?>
<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Pr©dutos </span>
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>

<!-- Início da seção de conteúdo -->
<div id="content">
  <!-- Início do contêiner -->
  <div class="container">
    <!-- Início de uma coluna do Bootstrap -->
    <div class="col-md-12">
    </div>
    <!-- Fim da coluna do Bootstrap -->

    <!-- Início de uma coluna do Bootstrap para a barra lateral -->
    <div class="col-md-3">
      <?php include("includes/sidebar.php"); ?>
    </div>
    <!-- Fim da coluna do Bootstrap para a barra lateral -->

    <!-- Início de uma coluna do Bootstrap para o conteúdo principal -->
    <div class="col-md-9">
      <?php getProducts(); ?>
    </div>
    <!-- Fim da coluna do Bootstrap para o conteúdo principal -->

    <!-- Centraliza o conteúdo -->
    <center>
      <!-- Início de uma lista de paginação -->
      <ul class="pagination">
        <?php getPaginator(); ?>
      </ul>
      <!-- Fim da lista de paginação -->
    </center>
    <!-- Fecha a centralização -->
  </div>
  <!-- Fecha o contêiner -->
</div>
<!-- Fim da seção de conteúdo -->

<?php
// Inclui o arquivo de rodapé.
include("includes/footer.php");
?>

<!-- Inclui arquivos JavaScript (jQuery e Bootstrap) para adicionar funcionalidade à página -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>
  $(document).ready(function () {

    /// Mostrar e Ocultar pesquisa ///

    // Quando um elemento com a classe '.nav-toggle' é clicado
    $('.nav-toggle').click(function () {

      // Toggle (mostrar/ocultar) elementos com as classes '.panel-collapse' e '.collapse-data' com uma animação de 700ms
      $(".panel-collapse,.collapse-data").slideToggle(700, function () {

        // Após a animação, verifica se o elemento está oculto ou visível
        if ($(this).css('display') == 'none') {

          // Se estiver oculto, muda o texto do elemento com a classe '.hide-show' para 'Show'
          $(".hide-show").html('<img src="images/aberto.png" class="icon-image">');

        } else {

          // Se estiver visível, muda o texto do elemento com a classe '.hide-show' para 'Hide'
          $(".hide-show").html('<img src="images/fechado.png" class="icon-image">');

        }

      });

    });

    /// Fim do Mostrar e Ocultar pesquisa ///

    /// O código dos filtros de pesquisa começa ///

    $(function () {

      // Extensão do jQuery para criar um filtro de tabela
      $.fn.extend({

        filterTable: function () {

          return this.each(function () {

            // Quando um elemento desse filtro é pressionado
            $(this).on('keyup', function () {

              var $this = $(this),

                search = $this.val().toLowerCase(),

                target = $this.attr('data-filters'),

                handle = $(target),

                rows = handle.find('li a');

              // Se a caixa de pesquisa estiver vazia, mostre todas as linhas
              if (search == '') {

                rows.show();

              } else {

                // Caso contrário, percorra cada linha e oculte aquelas que não correspondem à pesquisa
                rows.each(function () {

                  var $this = $(this);

                  $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                });

              }

            });

          });

        }

      });

      // Aplica a função de filtro à caixa de pesquisa com o atributo 'data-action="filter"' e 'id="dev-table-filter"'
      $('[data-action="filter"][id="dev-table-filter"]').filterTable();

    });

    /// O código dos filtros de pesquisa termina ///

  });
</script>


<script>
  $(document).ready(function () {

    // Início da função getProducts
    function getProducts() {

      // Início do código para coletar seleções de fabricantes
      var sPath = ''; // Inicializa uma string vazia para armazenar os parâmetros de seleção

      var aInputs = $('li').find('.get_manufacturer'); // Encontra elementos de caixa de seleção com a classe 'get_manufacturer'
      var aKeys = Array(); // Inicializa um array para armazenar as chaves selecionadas
      var aValues = Array(); // Inicializa um array para armazenar os valores selecionados
      iKey = 0; // Inicializa um contador

      // Percorre todas as caixas de seleção de fabricantes
      $.each(aInputs, function (key, oInput) {
        if (oInput.checked) { // Verifica se a caixa de seleção está marcada
          aKeys[iKey] = oInput.value; // Armazena o valor marcado no array de chaves
        }
        iKey++;
      });

      // Se houver chaves selecionadas, cria a parte correspondente da string 'sPath'
      if (aKeys.length > 0) {
        var sPath = ''; // Reinicializa a string 'sPath'
        for (var i = 0; i < aKeys.length; i++) {
          sPath = sPath + 'man[]=' + aKeys[i] + '&'; // Adiciona o valor selecionado à string 'sPath'
        }
      }
      // Fim do código para coletar seleções de fabricantes

      // Início do código para coletar seleções de categorias de produtos
      var aInputs = Array();
      var aInputs = $('li').find('.get_p_cat');
      var aKeys = Array();
      var aValues = Array();
      iKey = 0;

      // Percorre todas as caixas de seleção de categorias de produtos
      $.each(aInputs, function (key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value;
        }
        iKey++;
      });

      // Se houver chaves selecionadas, adiciona à string 'sPath'
      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath = sPath + 'p_cat[]=' + aKeys[i] + '&';
        }
      }
      // Fim do código para coletar seleções de categorias de produtos

      // Início do código para coletar seleções de categorias gerais
      var aInputs = Array();
      var aInputs = $('li').find('.get_cat');
      var aKeys = Array();
      var aValues = Array();
      iKey = 0;

      // Percorre todas as caixas de seleção de categorias gerais
      $.each(aInputs, function (key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value;
        }
        iKey++;
      });

      // Se houver chaves selecionadas, adiciona à string 'sPath'
      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath = sPath + 'cat[]=' + aKeys[i] + '&';
        }
      }

      // Fim do Código de Categorias

      // Início do Código do Carregador
      $('#wait').html('<img src="../images/load.gif">'); // Define o conteúdo do elemento com ID 'wait' como uma imagem de carregamento
      // Fim do Código do Carregador

      // Início do Código AJAX
      $.ajax({
        url: "load.php", // URL para a qual a solicitação AJAX é enviada
        method: "POST", // Método HTTP usado na solicitação
        data: sPath + 'sAction=getProducts', // Dados enviados com a solicitação, incluindo 'sPath' e 'sAction'
        success: function (data) { // Função a ser executada quando a solicitação AJAX for bem-sucedida
          $('#Products').html(''); // Limpa o conteúdo do elemento com ID 'Products'
          $('#Products').html(data); // Define o conteúdo do elemento 'Products' com o resultado da solicitação AJAX
          $("#wait").empty(); // Remove o conteúdo do elemento com ID 'wait', que provavelmente era a imagem de carregamento
        }
      });

      $.ajax({
        url: "load.php", // Outra solicitação AJAX para uma URL diferente
        method: "POST", // Método HTTP usado na solicitação
        data: sPath + 'sAction=getPaginator', // Dados enviados com a solicitação, incluindo 'sPath' e 'sAction'
        success: function (data) { // Função a ser executada quando a solicitação AJAX for bem-sucedida
          $('.pagination').html(''); // Limpa o conteúdo dos elementos com a classe 'pagination'
          $('.pagination').html(data); // Define o conteúdo dos elementos 'pagination' com o resultado da solicitação AJAX
        }
      });
      // Fim do Código AJAX

    }

    // Fim da Função getProducts

    // Associar a Função getProducts a Eventos de Clique nas Caixas de Seleção
    $('.get_manufacturer').click(function () {
      getProducts();
    });

    $('.get_p_cat').click(function () {
      getProducts();
    });

    $('.get_cat').click(function () {
      getProducts();
    });


  });
</script>

</body>

</html>