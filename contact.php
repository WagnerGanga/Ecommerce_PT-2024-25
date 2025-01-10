<?php
$active = "Contact";
include('db.php');
include("functions.php");
include("header.php");

?>


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i>Início</a>
                    <span>Contacto</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contacte-nos</h4>
                    <p>Sua paixão é nossa satisfação</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Endereço:</span>
                            <p>Angola.Luanda:Kapolo2</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Telefone:</span>
                            <p>+244 940822206</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>AngoShop@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">

                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Deixe um recado</h4>
                        <p>Nossa equipe ligará de volta mais tarde e responderá às suas perguntas.</p>
                        <form action="contact.php" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Seu Nome" class="form-control" name="name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Seu Email" class="form-control" name="email" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Assunto da Mensagem" class="form-control" name="subject" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Sua Mensagem" class="form-control" name="message"></textarea>
                                    <button class="site-btn" name="submit">Enviar</button>
                                </div>
                            </div>
                        </form>

                        <?php

                        if (isset($_POST['submit'])) {
                            $user_name = $_POST['name'];
                            $user_email = $_POST['email'];
                            $user_subject = $_POST['subject'];
                            $user_msg = $_POST['message'];

                            $receiver_mail = 'yousafsaddique523@gmail.com';

                            mail($receiver_mail, $user_name, $user_subject, $user_msg, $user_email);
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php
include('footer.php');
?>


</body>

</html>