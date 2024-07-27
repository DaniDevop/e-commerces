<!-- partie liste -->
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
                    <h6 class="mb-4">Profile {{ $user->name}}</h6>
                   
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tel</th>
                                    <th scope="col">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->tel }}</td>
                                        <td><img src="{{asset('storage/'.$user->profile)}}" /></td>
                                    </tr>
                               
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>

                    <!-- partie ajouter fournisseur -->

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   Modification informations
                </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                    <form action="{{route('update.compte')}}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="adresse" name="email" value="{{ $user->email}}">
                            </div>

                            <div class="mb-3">
                                <label for="profil" class="form-label">profile</label>
                                <input type="file" class="form-control" id="profil" name="profile" >
                            </div>
                                @if(Auth::check() && Auth::user()->role == 'Admin')

                            <div class="mb-3">
                                <label for="email" class="form-label">confirmation mot de passe</label>
                                <select name="role" class="form-select">
                                <option value="{{ $user->role}}">{{ $user->role}}</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                </select>
                                
                            </div>
                            @endif
                            
                            <div class="mb-3">
                                <label for="profil" class="form-label">Phone</label>
                                <input type="phone" class="form-control" id="profil" name="tel" value="{{ $user->tel }}">
                            </div>
                                <input type="hidden" name="id"  value="{{ $user->id }}" />
                            
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
