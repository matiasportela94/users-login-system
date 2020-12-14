  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo FRONT_ROOT . 'Home\Index'; ?>">
          <img id="imgHeader" src="" /><span class="nameHeader"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <form action="<?php echo FRONT_ROOT . "Views/ShowRegisterForm" ?>">
              <li class="nav-item">
                <button id="userButton" type="submit" name="register" value="" class="btn" style="width: 100%;">Registrate</button>

              </li>
            </form>
          </ul>
        </div>
      </div>
    </nav>