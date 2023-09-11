<!-- Left side columns -->
<div class="col-lg-4">
  <div class="row">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Nouveau membre</h5>
          <!-- General Form Elements -->
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nom</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Svp Entrer votre nom!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Postnom</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Svp Entrer votre postnom!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Prenom</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Svp Entrer votre prenom!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Numero de téléphone</label>
                      <input type="text" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Svp Entrer votre numéro!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Svp Entrer votre nom d'utilisateur.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Svp Entrer votre mot de passe!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Valider</button>
                    </div>
                </form>
      </div>   
    </div>
  </div>
</div>
<!-- end Left side columns -->

<!-- Right side columns -->
<div class="col-lg-8">
  <div class="row">
    <!-- Recent Entries -->
    <div class="col-12">
      <div class="card recent-sales overflow-auto">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filtrer</h6>
            </li>

            <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
            <li><a class="dropdown-item" href="#">Ce mois</a></li>
            <li><a class="dropdown-item" href="#">Cette année</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Membres <span>| Today</span></h5>

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><a href="#">#2457</a></th>
                <td>Brandon Jacob</td>
                <td><a href="#" class="text-primary">At praesentium minu</a></td>
                <td>$64</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2147</a></th>
                <td>Bridie Kessler</td>
                <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                <td>$47</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2049</a></th>
                <td>Ashleigh Langosh</td>
                <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                <td>$147</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2644</a></th>
                <td>Angus Grady</td>
                <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                <td>$67</td>
                <td><span class="badge bg-danger">Rejected</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2644</a></th>
                <td>Raheem Lehner</td>
                <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                <td>$165</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>
    </div><!-- End Recent Entries -->
  </div>
</div>
<!-- End Right side columns -->