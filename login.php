<?php

define('TITLE', "Login");
include '../layouts/header.php';
check_logged_out();

?>
<body class="bg-gradient-info">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image10"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="includes/login.inc.php" method="POST" >

                                        <?php insert_csrf_token(); ?>

                                        <div class="form-group">
                                            <laberl for="email">Email</label>
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Votre email" required autofocus>
                                            <sub class="text-danger">
                                                <?php
                                                if (isset($_SESSION['ERRORS']['nouser']))
                                                    echo $_SESSION['ERRORS']['nouser'];
                                                ?>
                                            </sub>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="pwd">Password</label>
                                            <input type="password" class="form-control form-control-user" id="pwd" name="password" placeholder="Password" required>
                                            <sub class="text-danger">
                                                <?php
                                                if (isset($_SESSION['ERRORS']['wrongpassword']))
                                                    echo $_SESSION['ERRORS']['wrongpassword'];
                                                ?>
                                            </sub>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="loginsubmit" value="loginsubmit" type="submit">Se connecter</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Créer un compte</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

// include '../layouts/footer.php';

?>