<!-- partie liste -->
<!DOCTYPE html>
<html lang="en">

@include('partials.header')
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
                    <h6 class="mb-4">Listes  des utilisateurs</h6>
                    <form action="{{route('users.search')}}" method="POST">
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
                                    <th scope="col">Email</th>
                                    <th scope="col">Tel</th>
                                    <th scope="col">Profile</th>
                                     @if(Auth::check() && Auth::user()->role == 'Admin')

                                    <th scope="col">Active/Desactive</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->tel }}</td>
                                        <td><img src="{{asset('storage/'.$user->profile)}}" /></td>
                            @if(Auth::check() && Auth::user()->role == 'Admin')

                                          @if( $user->active==true)
                                        <td>   <a hredf="#" onclick="confirmDelete('{{ route('changes.etat.compte', ['id' => $user->id]) }}')" class="btn btn-danger"><i class="bi bi-person-dash"></i></a> </td>
                                        @else   
                                          <td>   <a hredf="#" onclick="confirmDelete('{{ route('changes.etat.compte', ['id' => $user->id]) }}')" class="btn btn-info"><i class="bi bi-person-check"></i></a> </td>
                                          @endif
                                          @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>

                    <!-- partie ajouter fournisseur -->

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nouveau compte
                </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                    <form action="{{route('create.compte')}}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="veuillez mettre votre nom" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="adresse" name="email" placeholder="veuillez mettre votre adresse">
                            </div>

                              <div class="mb-3">
                                <label for="profil" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="profil" name="tel" >
                            </div>

                            <div class="mb-3">
                                <label for="profil" class="form-label">profile</label>
                                <input type="file" class="form-control" id="profil" name="profile" >
                            </div>

                            
                                 <div class="mb-3">
                                <label for="email" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="adresse" name="password" placeholder="veuillez mot de passe">
                            </div>
                            
                             <div class="mb-3">
                                <label for="email" class="form-label">confirmation mot de passe</label>
                                <input type="password" class="form-control" id="adresse" name="confirm_password" placeholder="veuillez confirmer">
                            </div>
                            @if(Auth::check() && Auth::user()->role == 'Admin')

                            <div class="mb-3">
                                <label for="email" class="form-label">confirmation mot de passe</label>
                                <select name="role" class="form-select">
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                </select>
                                
                            </div>
                            @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                        </div>
                       
                    </div>
                </div>
            </div>

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
