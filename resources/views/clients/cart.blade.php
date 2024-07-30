<!DOCTYPE html>
<html lang="zxx" class="no-js">

@include('clients.pages.head')

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            @include('clients.pages.navbar')
        </div>
    </header>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    @if(count($cart) > 0 )
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Ajouter/Retirer</th>
                                <th scope="col">Supprimer</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cart as $car)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="90" src="{{ asset('storage/'.$car['profile']) }}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $car['designation'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>FCFA :{{ $car['prix'] }}</h5>
                                </td>

                                <td>
                                    <input type="number" value="{{ $car['qte_commande'] }}" name="quantite" id="quantite_{{ $car['produit_id'] }}">
                                    <button type="button" onclick="updateQuantity({{ $car['produit_id'] }})">Mettre à jour</button>
                                </td>
                                <td>
                                    <a href="{{ route('client.remove.produit', ['id' => $car['produit_id']]) }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                </td>
                                <td>
                                    <h5>{{ $car['prix'] * $car['qte_commande'] }} FCFA</h5>
                                </td>
                            </tr>
                            @endforeach
                            @else

                            <h1>Le Panier est vide</h1>

                            @endif

                            <tr class="bottom_button">
                                <td>
                                     @if(session()->get('client'))
                                    <form action="{{route('valide.login.commande')}}">

                                        <input type="hidden" name="id" value="{{$client}}">

                                        <button class="gray_btn">Valider la commande</button>
                                    </form>
                                    @else
                                    <button disabled >Veuillez vous connecté pour valider la commande</button>

                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h5>Somme-Total</h5>
                                </td>
                                <td>
                                    <h5> {{$sommeTotal}} FCFA</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <!-- Footer content -->
        </div>
    </footer>

    <!-- Include your JavaScript at the end of the body -->
    <script>
        function updateQuantity(produitId) {
            var inputElement = document.getElementById('quantite_' + produitId);
            if (inputElement) {
                var nouvelleQuantite = inputElement.value;
                var csrfToken = document.getElementById('csrf_token').value;

                fetch('{{ route('client.update.cart') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        id: produitId,
                        qte: nouvelleQuantite
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.messages);
                    // Gérer la réponse du serveur ici
                })
                .catch(error => {
                    console.error('Erreur lors de la requête:', error);
                });
            } else {
                console.error('L\'élément avec l\'ID "quantite_' + produitId + '" est introuvable.');
            }
        }
    </script>
    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
</body>
</html>
