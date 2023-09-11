<?php $title = "Se connecter"; ?>

<?php ob_start(); ?>

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">FCI</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Connectez-vous:</h5>
              <p class="text-center small">votre nom d'utilisateur & votre mot de passe</p>
            </div>

            <form class="row g-3 needs-validation" novalidate>

              <div class="col-12">
                <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="text" name="username" class="form-control" id="yourUsername" required>
                  <div class="invalid-feedback">Mot de passe</div>
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Se connecter</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Vous n'avez pas de compte? <a href="register.php">Créer un compte</a></p>
              </div>
            </form>

          </div>
        </div>

        <div class="credits">
          Fait avec amour par <a href="tel:0979150962">Charlie Kyakimwa</a>
        </div>

      </div>
    </div>
  </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout.php') ?>