<!-- Left side columns -->
<div class="col-lg-4">
  <div class="row">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Nouvelle entrée</h5>
          <!-- General Form Elements -->
          <form>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Montant</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example">    
                <option value="1">CDF</option>
                <option value="2">USD</option>
              </select>
              <label for="floatingSelect">Selectionner la devise</label>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10">
                <input type="date" value="<?php date('Y-m-d')?>" class="form-control">
              </div>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Libelle</label>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Valider</button>
              </div>
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
          <h5 class="card-title">Entrées récentes <span>| Today</span></h5>

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