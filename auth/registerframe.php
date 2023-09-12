<?php

define('TITLE', "Register");
include '../layouts/header.php';

include "../php/functions.php";

?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <!-- Nested Row within Card Body -->
                <div class="p-3">
                    <h1 class="text-center">Créer un compte !</h1>

                    <?php if (isset($_SESSION['listOfErrors'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php
                                foreach ($_SESSION['listOfErrors'] as $error) {
                                    echo "<li>" . $error . "</li>";
                                }
                                unset($_SESSION['listOfErrors']);
                                ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <form action="../php/userAddframe.php" method="POST" enctype="multipart/form-data" class="my-3">
                        <input type="hidden" value="add" name="action">

                        <div class="mb-3">
                            <input type="text" name="firstname" class="form-control" placeholder="Votre prénom" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["firstname"] : ""; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="text" name="lastname" class="form-control" placeholder="Votre nom" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["lastname"] : ""; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Votre email" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["email"] : ""; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="tel" name="phone_mobile" class="form-control" placeholder="Votre numéro de téléphone" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["phone_mobile"] : ""; ?>">
                        </div>

                        <div class="mb-3">
                            <input type="password" name="pwd" class="form-control" placeholder="Mot de passe">
                        </div>

                        <div class="mb-3">
                            <input type="password" name="pwdConfirm" class="form-control" placeholder="Confirmez le mot de passe">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary w-100" value="S'inscrire">
                        </div>


                    </form>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="forgot-password.php">Mot de passe oublié?</a>
                        <a href="../index.php">Vous avez déjà un compte ? connectez vous !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
