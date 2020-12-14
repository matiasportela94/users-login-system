<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand js-scroll-trigger" href="<?php echo FRONT_ROOT . 'Home\Index'; ?>">
      <img id="imgHeader" src="" /><span class="nameHeader"></span>
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo FRONT_ROOT . "Views/ShowProfile" ?>">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT . "LogIn\LogOut" ?>">Cerrar Sesión</a>
        </li>

      </ul>
      <!-- Links -->


    </div>
    <!-- Collapsible content -->
  </div>
</nav>