<main id="profilePage">
  <!-- Page Content -->
  <div id="page-content-wrapper">

    <?php require_once(VIEWS_PATH . "profile_nav.php") ?>

    <div class="container profileMain mx-auto">
      <?php require_once(VIEWS_PATH . "message.php") ?>

      <div id="dashboardContainer" style="height:80vh;">
        <h1 class="mt-4"><strong>Hola, <?php echo $loggedUser->getFirstName(); ?>!</strong></h1>
        <h2>Bienvenido a tu perfil!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi aperiam voluptates quo cupiditate dolorum voluptatem tenetur ipsum ratione quia labore obcaecati, ipsam, impedit id aliquid eveniet aliquam eaque accusantium vitae.</p>
        <div>
          <form class="d-flex mx-auto" style=" justify-content: center" action="<?php echo FRONT_ROOT . 'Views/ShowUsers' ?>">
            <button class="btn btn-primary">Listado de Usuarios</button>
          </form>
        </div>
      </div>

    </div>

  </div>
</main>