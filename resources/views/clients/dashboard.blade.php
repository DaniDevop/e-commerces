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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($commande as $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="90" src="{{ asset('storage/'.$cart->photo_first )}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $cart->designation }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>FCFA :{{ $cart->prix }}</h5>
                                </td>

                                <td>
                                    <h5>{{ $cart->stat }}</h5>
                                </td>
                                <td>
                                    <h5>{{ $cart->date }}</h5>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $commande->links()}}
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

</body>
</html>
