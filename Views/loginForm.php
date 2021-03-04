<main>

    <?php require_once('login_nav.php'); ?>

    <header class="text-white mt-5">

      <div class="container table w-100 ">

      <?php require_once('message.php'); ?>

        <form action="<?php echo FRONT_ROOT . 'LogIn/memberLogIn' ?>" method="POST" class="login-form bg-dark-alpha pt-4 mx-auto text-white">

          <div class="form-group text-center">
            <img src="<?php echo IMG_PATH . 'userIcon2.png'; ?>" alt="avatar" style="height:20vh;">
          </div>

          <div class="form-group text-dark">
            <label>Nº de Documento o Email</label>
            <input type="text" name="username" class="form-control form-control-lg logInInputs" placeholder="Ingrese Nº de Documento o Email" required>
          </div>

          <div class="form-group text-dark">
            <label>Contraseña</label>
            <input id="password" type="password" name="password" class="form-control form-control-lg logInInputs" placeholder="Ingrese constraseña" required><i class="far fa-eye" id="togglePassword"></i>
          </div>

          <?php
          if (isset($message)) {
            echo "<div class='text-warning' style='text-align:center;'>$message</div><br>";
          }
          ?>
          <br>

          <div class="form-group text-center">
            <button class="btn btn-primary w-75 loginBoton" type="submit">Iniciar Sesión</button>
          </div>

        </form>

        <div class="form-group text-center">
          <a class="" style="font-size:15px; color: #000000;" href="<?php echo FRONT_ROOT . 'Views/ShowResetPassword' ?>">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="text-center">
          <br>
        </div>
      </div>

    </header>
    
  


  </body>

  </html>