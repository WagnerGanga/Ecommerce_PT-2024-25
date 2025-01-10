<?php
// Não é necessário chamar session_start() aqui, se já foi chamado no arquivo de configuração ou header.php.
include("db.php");
include("functions.php");
include("header.php");
?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Início</a>
                    <span>Login</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <div class="group-input">
                            <label for="username">Email *</label>
                            <input type="text" id="username" name="cemail" required>
                            <div id="email_error"></div>
                        </div>
                        <div class="group-input">
                            <label for="pass">Senha *</label>
                            <input type="password" id="pass" name="password" required>
                            <div id="password_error"></div>
                        </div>
                        <button name="login" class="site-btn login-btn">Entrar</button>
                    </form>
                    <div class="switch-login">
                        <a href="register.php" class="or-login">Ou Crie uma conta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php
include('footer.php');
?>

</body>
</html>

<?php
if (isset($_POST['login'])) {
    $log_email = $_POST['cemail'];
    $log_pass = $_POST['password'];

    // Usando prepared statements para evitar SQL Injection
    $sel_customer = $con->prepare("SELECT * FROM customer WHERE customer_email = ? AND customer_pass = ?");
    $sel_customer->bind_param('ss', $log_email, $log_pass);
    $sel_customer->execute();
    $run_sel_c = $sel_customer->get_result();
    $user = $run_sel_c->fetch_assoc(); // Obtém os dados do usuário

    $check_customer = $run_sel_c->num_rows;

    if ($check_customer == 0) {
        echo "
        <script>
            bootbox.alert({
                message: 'Invalid Username or Password',
                backdrop: true
            });
        </script>";
        exit();
    }

    $_SESSION['customer_email'] = $log_email;

    // Verifica se o usuário é admin e redireciona para a página apropriada
    if ($user['is_admin'] == 1) {
        echo "<script>window.open('/Ecommerce-Projeto/Admin/insert-product.php', '_self')</script>"; // Redireciona para o painel admin
    } else {
        echo "<script>window.open('/Ecommerce-Projeto/index.php', '_self')</script>"; // Redireciona para a página inicial do site
    }
}
?>
