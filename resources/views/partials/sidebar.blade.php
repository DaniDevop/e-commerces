<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{route('home')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Dashboard</h3>
                </a>
                 @auth
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('storage/'. auth()->user()->profile)}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                   
                    <div class="ms-3">
                        <h6 class="mb-0">Bienvenue ✨:{{ auth()->user()->name}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                @endauth
                <div class="navbar-nav w-100">
                    <a href="{{route('home')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-plus-fill"></i>Fournisseur</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('listes.fournisseur')}}" class="dropdown-item">Listes des fournisseurs</a>
                          
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-basket"></i>Produit</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('listes.produit')}}" class="dropdown-item">Listes des produits</a>
                          
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-cart4"></i>Commande</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('listes.commande')}}" class="dropdown-item">Listes des commandes</a>
                           
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-wallet2"></i>Facture</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('listes.factures')}}" class="dropdown-item">Listes des factures</a>
                           
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-ui-checks-grid"></i>Categorie</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('listes.categorie')}}" class="dropdown-item">Listes des categories</a>
                           
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-check"></i>Client</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('listes.client')}}" class="dropdown-item">Listes des clients</a>
                           
                        </div>
                    </div>

                                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>Utilisateurs</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('users.compte')}}" class="dropdown-item">Listes des utilisateurs</a>
                           
                        </div>
                    </div>
                   
                  
                    
            </nav>
        </div>



