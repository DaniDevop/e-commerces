<div class="sidebar">
    <h3>Menu</h3>
    <ul>
        <li><a class="active" href="i{{route('home')}}">Acceuil</a></li>
        <li><a href="{{route('listes.commande')}}">Commandes</a></li>
        <li><a href="{{route('listes.produit')}}">Produit</a></li>
        <li><a href="{{route('listes.categorie')}}">Categories</a></li>
        <li><a href="{{route('listes.client')}}">Clients</a></li>
        <li><a href="">Users</a></li>
    </ul>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

