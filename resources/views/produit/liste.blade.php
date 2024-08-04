<!-- partie liste -->
<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('partials.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('partials.navbar')
            <!-- Navbar End -->

            <!-- Sale & Revenue Start -->
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Listes des produits</h6>

                    <form action="{{route('rechercher.produit')}}" method="POST">
                    @csrf
                      <input type="text" name="search" placeholder="recherche..." required>
                      <button type="submit" class="btn btn-success">Valider</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numero</th>
                                    <th scope="col">code</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">stock</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                   @foreach($produits as $prod)
                                    <tr>
                                        <th scope="row">{{$prod->id}}</th>
                                        <td>{{$prod->code}}</td>
                                        <td>{{$prod->designation}}</td>
                                        <td>{{$prod->prix}}</td>
                                        <td>{{$prod->stock}}</td>
                                        <td>{{$prod->categorie}}</td>

                                        <td><a href="{{route('details.produit',['id'=>$prod->id])}} " class="btn btn-dark"><i class="bi bi-eye-fill"></i></a></td>

                                        <td>   <a hredf="#" onclick="confirmDelete('{{ route('delete.produit', ['id' => $prod->id]) }}')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a> </td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                        {{$produits->links()}}
                    </div>
                </div>
            </div>


            <a href="{{route('add.produit')}}">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter Produit
                </button>
            </a>




            @include('partials.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('partials.js')

     <script>
    function confirmDelete(deleteUrl) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            window.location.href = deleteUrl;
        }
    }
</script>
</body>

</html>
