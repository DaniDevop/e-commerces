<nav class="navbar navbar-expand-lg navbar-light main_box">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="/"><img src="img/logo1.png" width="90" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                     aria-expanded="false">Produits</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('listes.index')}}">Listes des produits</a></li>
                    </ul>
                </li>

                 @if(!session()->get('client'))

                <li class="nav-item"><a class="nav-link" href="{{route('login.client')}}">Compte</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{route('client.dahsbord.panier')}}">Dashboard</a></li>
                 @endif

                 @if(session()->get('client'))

                 <li class="nav-item"><a class="nav-link" href="{{route('logout.client')}}">Deconnexion</a></li>
                 @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="{{route('show.panier.client')}}" class="cart"><span class="ti-bag"> {{count(session()->get('cart',[]))}} </span></a></li>
                <li class="nav-item">
                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                </li>




            </ul>
        </div>
    </div>
</nav>
