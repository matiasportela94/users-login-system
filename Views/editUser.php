<main>

    <?php require_once(VIEWS_PATH . "profile_nav.php") ?>

    <header class="text-white" style="height:80vh;">

        <?php require_once(VIEWS_PATH . "message.php") ?>

        <div class="container col col-12 col-md-6 table w-100 p-0 mt-3">


            <form action="<?php echo FRONT_ROOT . 'Members/update' ?>" method="POST" class="login-form bg-dark-alpha p-3 text-white ">

                <div class="form-group w-100">
                    <h2><strong>Editar Usuario</strong></h2>
                </div>

                <div class="form-group w-100" hidden>
                    <label class="inputLabels">User ID</label>
                    <input type="number" name="id" class="form-control form-control-lg logInInputs" placeholder="User Id" value="<?php echo $user->getId(); ?>">
                </div>

                <div class="form-group w-100">
                    <label class="inputLabels">D.N.I.:</label>
                    <input type="number" name="dni" class="form-control form-control-lg logInInputs" placeholder="Ingrese su Nº de Documento" value="<?php echo $user->getDni();    ?>" required>
                </div>

                <div class="form-group">
                    <label class="inputLabels">Nombre:</label>
                    <input type="text" name="firstName" class="form-control form-control-lg logInInputs" placeholder="Ingrese su Nombre" value="<?php echo $user->getFirstName(); ?>" required>
                </div>

                <div class="form-group">
                    <label class="inputLabels">Apellido:</label>
                    <input type="text" name="lastName" class="form-control form-control-lg logInInputs" placeholder="Ingrese su Apellido" value="<?php echo $user->getLastName(); ?>" required>
                </div>

                <div class="form-group">
                    <label class="inputLabels">Email:</label>
                    <input type="email" name="email" class="form-control form-control-lg logInInputs" placeholder="Ingrese un Email valido" value="<?php echo $user->getEmail(); ?>" required>
                </div>

                <div class="form-group text-center">
                    <button id="registerButton" class="btn btn-primary w-75 loginBoton" type="submit" value="ok">Actualizar</button>
                </div>


            </form>

        </div>

    </header>
</main>