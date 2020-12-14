<main>

  <?php require_once(VIEWS_PATH . "nav.php") ?>


  <header class="text-white mt-2 mb-5">

    <?php require_once(VIEWS_PATH . "message.php") ?>

    <div class="container col col-12 col-md-6 table w-100 p-0 mt-5 ">


      <form action="<?php echo FRONT_ROOT . 'Members/add' ?>" method="POST" class="login-form bg-dark-alpha p-3 text-white ">

        <div class="form-group w-100 py-5">
          <h2>Registrate</h2>
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

        <br>
        <div class="form-group text-center mt-0">
          <button id="registerButton" class="btn btn-primary w-75 loginBoton" type="submit" value="ok">Registrate</button>
        </div>


      </form>

    </div>

  </header>
</main>