<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Navbar Design</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
    .main-navbar{
    border-bottom: 1px solid #ccc;
}
.main-navbar .top-navbar{
    background-color: #2874f0;
    padding-top: 10px;
    padding-bottom: 10px;
}
.main-navbar .top-navbar .brand-name{
    color: #fff;
}
.main-navbar .top-navbar .nav-link{
    color: #fff;
    font-size: 16px;
    font-weight: 500;
}
.main-navbar .top-navbar .dropdown-menu{
    padding: 0px 0px;
    border-radius: 0px;
}
.main-navbar .top-navbar .dropdown-menu .dropdown-item{
    padding: 8px 16px;
    border-bottom: 1px solid #ccc;
    font-size: 14px;
}
.main-navbar .top-navbar .dropdown-menu .dropdown-item i{
    width: 20px;
    text-align: center;
    color: #2874f0;
    font-size: 14px;
}
.main-navbar .navbar{
    padding: 0px;
    background-color: #ddd;
}
.main-navbar .navbar .nav-item .nav-link{
    padding: 8px 20px;
    color: #000;
    font-size: 15px;
}

@media only screen and (max-width: 600px) {
    .main-navbar .top-navbar .nav-link{
        font-size: 12px;
        padding: 8px 10px;
    }
}


/* Product Card */
.product-card{
    background-color: #fff;
    border: 1px solid #ccc;
    margin-bottom: 24px;
}
.product-card a{
    text-decoration: none;
}
.product-card .stock{
    position: absolute;
    color: #fff;
    border-radius: 4px;
    padding: 2px 12px;
    margin: 8px;
    font-size: 12px;
}
.product-card .product-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.product-card .product-card-img img{
    width: 100%;
}
.product-card .product-card-body{
    padding: 10px 10px;
}
.product-card .product-card-body .product-brand{
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 4px;
    color: #937979;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .product-name{
    font-size: 20px;
    font-weight: 600;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .selling-price{
    font-size: 22px;
    color: #000;
    font-weight: 600;
    margin-right: 8px;
}
.product-card .product-card-body .original-price{
    font-size: 18px;
    color: #937979;
    font-weight: 400;
    text-decoration: line-through;
}
.product-card .product-card-body .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 12px;
    margin-top: 10px;
}


.footer-area{
    padding: 40px 0px;
    background-color: #2874f0;
    color: #fff;
}
.footer-area a{
    text-decoration: none;
}
.footer-area .footer-heading{
    font-size: 24px;
    color: #fff;
}
.footer-area .footer-underline{
    height: 1px;
    width: 70px;
    background-color: #ddd;
    margin: 10px 0px;
}
.copyright-area{
    padding: 14px 0px;
    background-color: #262626;
}
.copyright-area p{
    margin-bottom: 0px;
    color: #fff;
}
.copyright-area .social-media{
    text-align: end;
}
.copyright-area .social-media a{
    margin: 0px 10px;
    color: #fff;
    width: 20px;
}

#myCarousel .carousel-item .mask{position: absolute;top: 0;left:0;height:100%;width: 100%;background-attachment: fixed}
#myCarousel h4{font-size:50px;margin-bottom:15px;color:#FFF;line-height:100%;letter-spacing:0.5px;font-weight:600}
#myCarousel p{font-size:18px;margin-bottom:15px;color:#d5d5d5}
#myCarousel .carousel-item a{background:#FF0000;font-size:14px;color:#FFF;padding:13px 32px;display:inline-block}
#myCarousel .carousel-item a:hover{background:#FF0000;text-decoration:none}
#myCarousel .carousel-item h4{-webkit-animation-name:fadeInLeft;animation-name:fadeInLeft}
#myCarousel .carousel-item p{-webkit-animation-name:slideInRight;animation-name:slideInRight}
#myCarousel .carousel-item a{-webkit-animation-name:fadeInUp;animation-name:fadeInUp}
#myCarousel .carousel-item .mask img{-webkit-animation-name:slideInRight;animation-name:slideInRight;display:block;height:auto;max-width:100%}
#myCarousel h4, #myCarousel p, #myCarousel a,
 #myCarousel .carousel-item .mask img{-webkit-animation-duration: 1s;animation-duration: 1.2s;-webkit-animation-fill-mode: both;animation-fill-mode: both}#myCarousel .container{max-width: 1430px}#myCarousel .carousel-item{height:100%;min-height:550px}#myCarousel{position:relative;z-index:1;background:#000;background-size:cover}.carousel-control-next, .carousel-control-prev{height:40px;width:40px;padding:12px;top:50%;bottom:auto;transform:translateY(-50%);background-color: #FF0000}.carousel-item{position: relative;display: none;-webkit-box-align: center;-ms-flex-align: center;align-items: center;width: 100%;transition: -webkit-transform .6s ease;transition: transform .6s ease;transition: transform .6s ease,-webkit-transform .6s ease;-webkit-backface-visibility: hidden;backface-visibility: hidden;-webkit-perspective: 1000px;perspective: 1000px}.carousel-fade .carousel-item{opacity: 0;-webkit-transition-duration: .6s;transition-duration: .6s;-webkit-transition-property: opacity;transition-property: opacity}.carousel-fade .carousel-item-next.carousel-item-left, .carousel-fade .carousel-item-prev.carousel-item-right, .carousel-fade .carousel-item.active{opacity: 1}.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-right.active{opacity: 0}.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active{-webkit-transform: translateX(0);-ms-transform: translateX(0);transform: translateX(0)}@supports (transform-style:preserve-3d){.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active{-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}}.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active{-webkit-transform: translate3d(0,0,0);transform: translate3d(0,0,0)}@-webkit-keyframes fadeInLeft{from{opacity: 0;-webkit-transform: translate3d(-100%, 0, 0);transform: translate3d(-100%, 0, 0)}to{opacity: 1;-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}}@keyframes fadeInLeft{from{opacity: 0;-webkit-transform: translate3d(-100%, 0, 0);transform: translate3d(-100%, 0, 0)}to{opacity: 1;-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}}.fadeInLeft{-webkit-animation-name: fadeInLeft;animation-name: fadeInLeft}@-webkit-keyframes fadeInUp{from{opacity: 0;-webkit-transform: translate3d(0, 100%, 0);transform: translate3d(0, 100%, 0)}to{opacity: 1;-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}}@keyframes fadeInUp{from{opacity: 0;-webkit-transform: translate3d(0, 100%, 0);transform: translate3d(0, 100%, 0)}to{opacity: 1;-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}}.fadeInUp{-webkit-animation-name: fadeInUp;animation-name: fadeInUp}@-webkit-keyframes slideInRight{from{-webkit-transform: translate3d(100%, 0, 0);transform: translate3d(100%, 0, 0);visibility: visible}to{-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}}@keyframes slideInRight{from{-webkit-transform: translate3d(100%, 0, 0);transform: translate3d(100%, 0, 0);visibility: visible}to{-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0)}}.slideInRight{-webkit-animation-name: slideInRight;animation-name: slideInRight}


</style>
<body>

  
   @include('clients.pages.navbar')

   <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="mask flex-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>iPhone XS</h4>
                            <p>This has many features that are simply awesome. The phone comes with a 3.50-inch display with a resolution of 320x480 pixels.</p> <br> <a href="#">BUY NOW</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="{{asset('client/slide1.jpg')}}" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="mask flex-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-12 order-md-1 order-2">
                            <h4>HP Pavillion</h4>
                            <p>This has many features that are simply awesome.The phone comes with a 3.50-inch display with a resolution of 320x480 pixels.</p> <br> <a href="#">BUY NOW</a>
                        </div>
                        <div class="col-md-5 col-12 order-md-2 order-1"><img src="{{asset('client/logo1.jpg')}}" class="mx-auto" alt="slide"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Listes des Produits</h4>
                </div>
                 @foreach($produitAll as $product)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="{{asset('uploads/store/'.$product->image)}}" alt="Mens Shirt">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">Catégorie :{{$product->categorie->categorie}} </p>
                            <h5 class="product-name">
                               <a href="">
                                    {{$product->designation}}
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{$product->prix}}</span>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="btn btn1" onclick="addProductCart({{ $product->id }})">Add To Cart</a>
                                <a href="{{route('product.details',['id'=>$product->id])}}" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
            {{$produitAll->links()}}
        </div>
    </div>




    <div>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading">Funda E-Commerce</h4>
                        <div class="footer-underline"></div>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="" class="text-white">Home</a></div>
                        <div class="mb-2"><a href="" class="text-white">About Us</a></div>
                        <div class="mb-2"><a href="" class="text-white">Contact Us</a></div>
                        <div class="mb-2"><a href="" class="text-white">Blogs</a></div>
                        <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="" class="text-white">Collections</a></div>
                        <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                        <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                        <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                        <div class="mb-2"><a href="" class="text-white">Cart</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Reach Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i> #444, some main road, some area, some street, bangalore, india - 560077
                            </p>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-phone"></i> +91 888-XXX-XXXX
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-envelope"></i> fundaofwebit@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; 2022 - Funda of Web IT - Ecommerce. All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-media">
                            Get Connected:
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        
$(document).ready(function(){
    
    $('#myCarousel').carousel({
    interval: 3000,
 }) 
    
});

        const cart = {{ count(session('cart', [])) }}
        console.log(cart)
         async function addProductCart(id) {
            const url = "http://127.0.0.1:8000/client/add-product";
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({'id': id})
                });

                if (!response.ok) {
                    throw new Error(`Erreur lors du contact au serveur: ${response.status}   ID : ${id}`);
                }
                alert("Produit ajouté avec succès !");
              
            } catch (error) {
                console.error('Erreur:', error);
                alert("Une erreur s'est produite lors de l'ajout du produit au panier.");
            }
        } 

    </script>
</body>
</html>