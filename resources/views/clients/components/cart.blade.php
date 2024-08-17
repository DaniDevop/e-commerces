<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Listes des choix</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <table id="cartTable" class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Désignation</th>
      <th scope="col">Prix</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Image</th>
      <th scope="col">X</th>
    </tr>
  </thead>
  <tbody>
    <!-- Les lignes seront insérées ici dynamiquement -->
  </tbody>
</table>

  </div>
</div>