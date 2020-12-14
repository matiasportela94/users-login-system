<main>

    <?php require_once('login_nav.php'); ?>

    <header class="text-white">
    <?php require_once('message.php'); ?>

      <div class="container table w-100">

        <form action="<?php echo FRONT_ROOT . 'LogIn/memberLogIn' ?>" method="POST" class="login-form bg-dark-alpha pt-4 mx-auto text-white" style="margin-top:10vh;">

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
          <br>
          <a href="" class="text-info" style="font-size:15px;" data-toggle="modal" data-target="#modalLoginAvatar">Ingresa Como Administrador</a>
        </div>
        <div class="text-center">
          <br>
        </div>
      </div>

    </header>

    <!-- Footer -->
    <footer class="py-4">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; GYM & BOX - 2020
        </p>
      </div>
      <!-- /.container -->
    </footer>

    <div class="desplegable">
      <form action="<?php echo FRONT_ROOT . 'LogIn/adminLogIn' ?>" method="POST" class="md-form">

        <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:15vh">
          <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

              <!--Header-->
              <div class="modal-header">
                <img src="<?php echo IMG_PATH . 'userIcon.png'; ?>" alt="avatar" class="rounded-circle img-responsive">
              </div>
              <!--Body-->
              <div class="modal-body text-center mb-1">

                <h5 class="mt-1 mb-2">Administrador</h5>

                <div class="md-form ml-0 mr-0">
                  <input placeholder="Ingrese Email" type="text" name="email" class="form-control form-control-sm validate ml-0">
                </div>

                <div class="md-form ml-0 mr-0 adm-group">
                  <input id="adminPassword" placeholder="Ingrese Contraseña" type="password" name="password" class="form-control form-control-sm validate ml-0"><i class="far fa-eye" id="toggleAdminPassword"></i>
                </div>

                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary mt-1">Iniciar Sesion <i class="fas fa-sign-in ml-1"></i></button>
                </div>
              </div>

            </div>
            <!--/.Content-->
          </div>
        </div>
      </form>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="<?php echo JS_PATH . "toggle-password.js" ?>"></script>


  </body>

  </html>