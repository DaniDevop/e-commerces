<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<style>
        /* Add CSS styles for images here */
        .table img {
            max-width: 70px; /* Adjust the max-width as needed */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Add rounded corners if desired */
            margin-right: 5px; /* Adjust spacing between images */
        }

        /* Additional styling for modal images */
        .modal-body img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>

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
                    <h6 class="mb-4">Detail d'un produit</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numero</th>
                                    <th scope="col">code</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">stock</th>
                                    <th scope="col">Categorie</th>
                                    >
                                </tr>
                            </thead>
                            <tbody>

                                    <tr>
                                        <th scope="row">{{$produit->id}}</th>
                                        <td>{{$produit->code}}</td>
                                        <th scope="row" class="zoom"> <img src="{{asset('uploads/store/'.$produit->image)}}" alt="" >  </th>
                                        <td>{{$produit->designation}}</td>
                                        <td>{{$produit->prix}}</td>
                                        <td>{{$produit->stock}}</td>
                                        <td>{{optional($produit->categorie)->categorie}}</td>

                                    </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Modifier produit
                </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                <form action="{{ route('update.produit') }}" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">code</label>
                    <input type="text" class="form-control" id="code"  placeholder="" name="code" value="{{$produit->code}}" disabled>
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Votre designation" value="{{$produit->designation}}">
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">prix</label>
                    <input type="text" class="form-control" id="prix" name="prix" placeholder="Votre prix" value="{{$produit->prix}}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Votre stock" value="{{$produit->stock}}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Image</label>
                    <input type="file" min="1" class="form-control" id="stock" name="image">
                </div>


                <input type="hidden" class="form-control" id="" name="id" value="{{ $produit->id }}">



                            <div class="mb-3">
                                <label for="email" class="form-label">categorie</label>
                                <select name="categorie_id" id="" class="form-select">

                                    <option value="{{$produit->categorie_id}}">Ancienne :{{optional($produit->categorie)->categorie}}</option>
                                        @foreach ($categorieAll as $cat )
                                    <option value="{{$cat->id}}">{{$cat->categorie}}</option>
                                    @endforeach
                                </select>

                            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>


            </form>


            </div>
        </div>
     </div>


     <br>
            <br>


           

            @include('partials.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('partials.js')
</body>

</html>

