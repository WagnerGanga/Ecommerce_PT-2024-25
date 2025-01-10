<?php
$active = "Home";
include("functions.php");
include("header.php");

?>

<!-- Chat Bot Button -->
<style>
  .chatbot-button {
    position: fixed;
    top: 20px;
    left: 20px;
    background-color:rgb(8, 9, 10);
    color: white;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 1000;
  }
</style>

<button class="chatbot-button" onclick="toggleChat()">💬</button>

<div id="chatbot" style="display: none; position: fixed; top: 100px; left: 20px; width: 300px; height: 400px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; z-index: 1000; padding: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
  <h3>Assistente Virtual</h3>
  <p>Escolha uma opção para começar:</p>
  <button onclick="respond('Quais são os produtos mais vendidos?')">Produtos mais vendidos</button>
  <button onclick="respond('Como faço para rastrear meu pedido?')">Rastrear pedido</button>
  <button onclick="respond('Quais são os métodos de pagamento disponíveis?')">Métodos de pagamento</button>
  <div id="chat-response" style="margin-top: 10px; font-size: 14px;"></div>
</div>

<script>
  function toggleChat() {
    const chat = document.getElementById('chatbot');
    chat.style.display = chat.style.display === 'none' ? 'block' : 'none';
  }

  function respond(option) {
    let response;
    switch (option) {
      case 'Quais são os produtos mais vendidos?':
        response = 'Os produtos mais vendidos incluem calçados esportivos, camisolas e relógios inteligentes.';
        break;
      case 'Como faço para rastrear meu pedido?':
        response = 'Você pode rastrear seu pedido acessando a página "Meus Pedidos" e inserindo seu número de rastreamento.';
        break;
      case 'Quais são os métodos de pagamento disponíveis?':
        response = 'Aceitamos cartões de crédito, débito e pagamentos por transferência bancária.';
        break;
      default:
        response = 'Desculpe, não tenho uma resposta para essa pergunta no momento.';
    }
    document.getElementById('chat-response').innerText = response;
  }
</script>

<section class="hero-section">
    <div class="hero-items owl-carousel">

        <?php

        $get_slides = "select * from slider LIMIT 0,1";
        $run_slider = mysqli_query($con, $get_slides);

        while ($row_slides = mysqli_fetch_array($run_slider)) {

            $slide_name = $row_slides['slide_name'];
            $slide_image = $row_slides['slide_image'];
            $slide_heading = $row_slides['slide_heading'];
            $slide_text = $row_slides['slide_text'];

            echo "

            <div class='single-hero-items set-bg' data-setbg='img/$slide_image'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-5'>
                            <h1>$slide_heading</h1>
                            <p>$slide_text
                            </p>
                            <a href='shop.php' class='primary-btn'>Compre Agora</a>
                        </div>
                    </div>
                    <div class='off-card'>
                        <h2>Até <span>60%</span></h2>
                    </div>  
                </div>
            </div>
                ";
        }


        $get_slides = "select * from slider LIMIT 1,2";
        $run_slider = mysqli_query($con, $get_slides);

        while ($row_slides = mysqli_fetch_array($run_slider)) {

            $slide_name = $row_slides['slide_name'];
            $slide_image = $row_slides['slide_image'];
            $slide_heading = $row_slides['slide_heading'];
            $slide_text = $row_slides['slide_text'];

            echo "
            <div class='single-hero-items set-bg' data-setbg='img/$slide_image'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-5'>
                            <h1 style='color: white;'>$slide_heading</h1>
                            <p style='color: white;'>$slide_text
                            </p>
                            <a href='shop.php' class='primary-btn'>Compre Agora</a>
                        </div>
                    </div>
                </div>
            </div>";
        }

        ?>

    </div>
</section>

<!-- Banner Section Begin -->

<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <a href='shop.php?cat_id=1'>
                    <div class="single-banner">
                        <img src="img/banner-1.png" alt="Mens">
                        <div class="inner-text">
                            <h4>Homens</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href='shop.php?cat_id=2'>
                    <div class="single-banner">
                        <img src="img/banner-2.png" alt="">
                        <div class="inner-text">
                            <h4>Mulheres</h4>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4">
                <a href='shop.php?cat_id=3'>
                    <div class="single-banner">
                        <img src="img/banner-3.png" alt="">
                        <div class="inner-text">
                            <h4>Crianças</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Women Banner Section Begin -->

<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="img/women-large.jpg">
                    <h2>Mulheres</h2>
                    <a href="shop.php?cat_id=2">Descubra Mais</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <h3>Produtos Disponíveis</h3>
                </div>
                <div class="product-slider owl-carousel">

                    <?php
                    getWProduct();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Man Banner Section Begin -->

<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <h3> Produtos quentes </h3>
                </div>
                <div class="product-slider owl-carousel">
                    <?php
                    getMProduct();
                    ?>

                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg m-large" data-setbg="img/men-large.jpg">
                    <h2>Homens</h2>
                    <a href="shop.php?cat_id=1">Descubra mais</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->

<?php
include('footer.php');


if (isset($_GET['stat'])) {

    echo "
        <script>
                bootbox.alert({
                    message: 'Welcome! You are logged in.',
                    backdrop: true
                });
        </script>";
}
?>

</body>

</html>

