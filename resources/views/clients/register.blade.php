<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Navbar Design</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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


.carousel-item .custom-carousel-content{
    width: 50%;
    transform: translate(0%, -10%);
}
.custom-carousel-content{
    text-align: start;
}
.custom-carousel-content h1{
    font-size: 40px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 30px;
}
.custom-carousel-content h1 span{
    color: #fbff00;
}
.custom-carousel-content p{
    font-size: 18px;
    font-weight: 400;
    color: #fff;
    margin-bottom: 30px;
}
.custom-carousel-content .btn-slider{
    border: 1px solid #fff;
    border-radius: 0px;
    padding: 8px 26px;
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    letter-spacing: 0.5px;
}


</style>
<body>

  
   @include('clients.pages.navbar')



   <div class="py-3 py-md-4 checkout">
        <div class="container">
          
            <hr>

            <div class="row">
               
			<div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
					<form action="{{route('client.create')}}" method="POST">
							@csrf


													@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label>Identifiant</label>
                                    <input type="text" name="nom" class="form-control" placeholder="Votre nom" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Teléphone</label>
                                    <input type="text" name="tel" class="form-control" placeholder="Numéro de téléphone" />
                                </div>

								<div class="col-md-3 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Votre email" />
                                </div>

								<div class="col-md-3 mb-3">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse" class="form-control" placeholder="Votre email" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter le mot de passe" />
                                </div>

								<div class="col-md-3 mb-3">
                                    <label>Mot de passe de confirmation</label>
                                    <input type="password" name="confirmation_password" class="form-control" placeholder="Enter le mot de passe" />
                                </div>
                               
                                <div class="col-md-12 mb-3">
                                    <div class="d-md-flex align-items-start">
                                            <button class="nav-link fw-bold btn btn-info" type="submit">Valider</button>
                                        
                
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                           Page de connexion
                        </h4>
                        <hr>


						

                        <form action="{{route('client.login')}}" method="POST">
							@csrf


													@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Identifiant</label>
                                    <input type="text" name="emailOrTel" class="form-control" placeholder="Identifiant" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter le mot de passe" />
                                </div>
                               
                                <div class="col-md-12 mb-3">
                                    <div class="d-md-flex align-items-start">
                                            <button class="nav-link fw-bold btn btn-info" type="submit">Valider</button>
                                        
                
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
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

    
</body>
</html>