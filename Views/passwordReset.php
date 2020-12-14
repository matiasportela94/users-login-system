<main>
    <?php require_once(VIEWS_PATH . 'nav.php'); ?>

    <header class="text-white">

        <div class="container table pt-5">

            <?php
            if (isset($message) && !empty($message)) {
            ?>
                <div class="col col-12 alert alert-info alert-dismissible fade show mt-5" role="alert">
                    <?php echo $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>

            <form action="<?php echo FRONT_ROOT . 'ResetPassword/resetPassword' ?>" method="POST" class="bg-dark-alpha pt-5 mt-5 mx-auto text-white">

                <div class="form-group">
                    <label>Ingresa tu Email</label>
                    <input type="text" name="email" class="form-control form-control-lg logInInputs" placeholder="Ingrese Email registrado" required>
                </div>
                <br>
                <div class="form-group text-center">
                    <button class="btn btn-danger w-50 loginBoton" type="submit">Confirmar</button>
                </div>
            </form>
        </div>

    </header>
</main>