<main>
  <!-- Page Content -->
  <div id="page-content-wrapper">

    <?php require_once(VIEWS_PATH . "profile_nav.php") ?>
    <div class="container profileMain mx-auto">
      <?php require_once(VIEWS_PATH . "message.php") ?>

      <div id="dashboardContainer">
        <h1 class="mt-4"><strong>Hola, <?php echo $loggedUser->getFirstName(); ?>!</strong></h1>
        <h2>Bienvenido a tu perfil!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi aperiam voluptates quo cupiditate dolorum voluptatem tenetur ipsum ratione quia labore obcaecati, ipsam, impedit id aliquid eveniet aliquam eaque accusantium vitae.</p>

      </div>

    </div>

  </div>
</main>