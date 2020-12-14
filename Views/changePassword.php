<main>

    <?php require_once(VIEWS_PATH . 'nav.php'); ?>

    <header class="text-white">

        <div class="container table pt-5">

            <form action="<?php echo FRONT_ROOT . 'ResetPassword/changePassword' ?>" method="POST" class="bg-dark-alpha pt-5 mt-5 mx-auto text-white">

                <div class="form-group">
                    <label class="inputLabels">Constraseña:</label>
                    <input id="password" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control form-control-lg logInInputs" placeholder="Ingrese Constraseña" required><i class="far fa-eye" id="togglePassword"></i>
                    <small class="text-dark">La contraseña debe contener una letra minuscula, una mayuscula y 8 caracteres minimo.</small>
                </div>

                <div class="form-group" hidden>
                    <label class="inputLabels">Token:</label>
                    <input id="token" type="text" name="token" class="form-control form-control-lg logInInputs" placeholder="Token" value="<?php
                                                                                                                                            use Helpers\ResetPasswordHelper as ResetPasswordHelper;
                                                                                                                                            echo ResetPasswordHelper::getValue(); ?>" required>
                </div>

                <br>
                <div class="form-group text-center mt-0">
                    <button id="registerButton" class="btn btn-danger w-75 loginBoton" type="submit" value="ok">Cambiar contraseña</button>
                </div>
            </form>
        </div>

    </header>

</main>