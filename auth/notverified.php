<?php
define('TITLE', "Validation nécessaire");

include '../layouts/header.php';
check_logged_out();
?>

<body class="bg-gradient-info">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image10">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Compte non validé</h1>
                                    </div>
                                    <form class="user" action="includes/resend_validation.inc.php" method="POST">
                                        <div class="form-group">
                                            <p>Votre compte n'a pas encore été validé. Cliquez sur le bouton ci-dessous pour recevoir un nouvel e-mail de validation.</p>

                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="resend_submit" value="resend_submit" type="submit">Envoyer l'email de validation</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot_password.php">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Retour à la connexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
