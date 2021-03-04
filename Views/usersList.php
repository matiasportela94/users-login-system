<main id="profilePage" style="min-height: 90vh;">
  <!-- Page Content -->
  <div id="page-content-wrapper">

    <?php require_once(VIEWS_PATH . "profile_nav.php") ?>

    <div class="container profileMain mx-auto">

        <?php require_once(VIEWS_PATH . "message.php") ?>

      <div class="row d-flex mt-3">
        <div class="col col-sm-12 col-md-6 justify-content-start text-white">
          <h2><strong>Listado de Usuarios</strong></h2>
        </div>
        <div class="col col-sm-12 col-md-6 justify-content-end">
          <a href="#addUser" class="btn btn-primary" data-lity>Agregar Usuario</a>
        </div>

      </div>

      <div id="usersList" class="row d-flex justify-content-center align-items-center mt-3">

        <?php
        foreach ($users as $user) {
        ?>
          <div class="col col-sm-6 col-md-4 col-lg-3 my-2">

            <div class="card" style="width: 18rem; height: 100%;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $user->getLastName() . ", " . $user->getFirstName(); ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo "DNI: " . $user->getDni() ?></h6>
                <p class="card-text"><?php echo "Email: " . $user->getEmail() ?></p>
                <div class="row">
                  <div class="col m-0 p-0"></div>
                  <div class="col m-0 p-0">
                    <form action="<?php echo FRONT_ROOT . 'Members/ShowModify' ?>" method="POST">
                      <button type="submit" value="<?php echo $user->getId() ?>" class="btn btn-secondary p-2" name="idCine">Edit</button>
                    </form>
                    <form action="<?php echo FRONT_ROOT . 'Members/Delete' ?>" method="post" class="col m-0 p-0">
                      <button type="submit" name="userId" value="<?php echo $user->getId(); ?>" class="btn btn-danger p-2">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php
        }
        ?>
      </div>

    </div>


</main>


<div id="addUser" style="background:#fff;overflow:auto;" class="lity-hide">
  <div class="row bg-dark" style="max-width:95vw;">

    <div class="container col col-12 w-100 p-0 h-100">


      <form action="<?php echo FRONT_ROOT . 'Members/addFromProfile' ?>" method="POST" class="login-form bg-dark-alpha p-3 text-white ">

        <div class="form-group w-100">
          <h2>Agregar Usuario</h2>
        </div>

        <div class="form-group w-100">
          <label class="inputLabels">D.N.I.:</label>
          <input type="number" name="dni" class="form-control form-control-lg logInInputs" placeholder="Ingrese su Nº de Documento" required>
        </div>

        <div class="form-group">
          <label class="inputLabels">Nombre:</label>
          <input type="text" name="firstName" class="form-control form-control-lg logInInputs" placeholder="Ingrese su Nombre" required>
        </div>

        <div class="form-group">
          <label class="inputLabels">Apellido:</label>
          <input type="text" name="lastName" class="form-control form-control-lg logInInputs" placeholder="Ingrese su Apellido" required>
        </div>

        <div class="form-group">
          <label class="inputLabels">Email:</label>
          <input type="email" name="email" class="form-control form-control-lg logInInputs" placeholder="Ingrese un Email valido" required>
        </div>

        <div class="form-group">
          <label class="inputLabels">Constraseña:</label>
          <input id="password" type="password" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control form-control-lg logInInputs" placeholder="Ingrese Constraseña" required><i class="far fa-eye" id="togglePassword" style="color: #000000"></i>
          <small class="text-warning">La contraseña debe contener una letra minuscula, una mayuscula y 8 caracteres minimo.</small>
        </div>

        <div class="form-group text-center">
          <button id="registerButton" class="btn btn-primary w-75 loginBoton" type="submit" value="ok">Registrar</button>
        </div>


      </form>

    </div>

  </div>
</div>