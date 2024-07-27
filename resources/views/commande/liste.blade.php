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
                    <h6 class="mb-4">Listes des commandes</h6>
                    <form action="{{route('rechercher.commandes')}}" method="POST">
                    @csrf
                      <input type="text" name="search" placeholder="recherche..." required>
                      <button type="submit" class="btn btn-success">Valider</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Details</th>                                                                       
                                    <th scope="col">Valider</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($commandes as $command)

                                    <tr>
                                        <th scope="row">{{$command->id}}</th>
                                        <td>{{$command->date}}</td>
                                        <td>{{$command->nom}}</td>
                                        @if($command->status =="En-cours")
                                        <td><span style="color:green;">{{$command->status}}</span></td>
                                        @else
                                         <td><span style="color:blue;">{{$command->status}}</span></td>
                                         @endif
                                        <td><a href="{{route('details.commandes',['id'=>$command->id])}}" class="btn btn-dark"><i class="bi bi-eye-fill"></i></a></td>
                                            @if($command->status =="Valider")
                                            <td>Valider✨✨</td>
                                            @else                                 
                                        <td>  <a href="{{route('valider.commandes',['id'=>$command->id])}}" class="btn btn-success"><i class="bi bi-calendar-check"></i></a> </td>
                                        @endif                                 
                                        <td><a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                               
                            </tbody>
                        </table>
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
</body>

</html>