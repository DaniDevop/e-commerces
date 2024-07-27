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
                    <h6 class="mb-4">Listes des clients</h6>
                    <form action="{{route('rechercher.client')}}" method="POST">
                    @csrf
                      <input type="text" name="search" placeholder="recherche..." required>
                      <button type="submit" class="btn btn-success">Valider</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Tel</th>
                                    <th scope="col">email</th>
                                    <th scope="col">adresse</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client) 
                                    <tr>
                                        <th scope="row">{{ $client->id}}</th>
                                        <td>{{ $client->nom}}</td>
                                        <td>{{ $client->tel}}</td>
                                        <td>{{ $client->email}}</td>
                                        <td>{{ $client->adresse}}</td>

                                        <td><a href="{{route('details.client',['id'=>$client->id])}} " class="btn btn-dark"><i class="bi bi-eye-fill"></i></a></td>

                                        <td>Delete</td>
                                    </tr>
                             @endforeach
                            </tbody>
                        </table>
                        {{$clients->links()}}
                    </div>
                </div>
            </div>


               <!-- partie ajouter fournisseur -->

              




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