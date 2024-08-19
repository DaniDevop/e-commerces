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
    /* Main Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

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



    /* Login Form Styles */
    .login-container {
        max-width: 500px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .login-container h4 {
        color: #2874f0;
        text-align: center;
        margin-bottom: 20px;
    }

    .login-container .form-group {
        margin-bottom: 20px;
    }

    .login-container .form-group label {
        font-weight: 500;
        font-size: 14px;
    }

    .login-container .form-control {
        height: 45px;
        border-radius: 5px;
    }

    .login-container .btn-primary {
        width: 100%;
        height: 45px;
        border-radius: 5px;
        background-color: #2874f0;
        border: none;
        font-size: 16px;
    }

    .login-container .btn-primary:hover {
        background-color: #2162c5;
    }

    /* Responsive Design for Login Form */
    @media (max-width: 768px) {
        .login-container {
            margin: 20px;
        }
    }

    /* Footer Styles */
    .footer-area {
        padding: 40px 0px;
        background-color: #2874f0;
        color: #fff;
    }

    .footer-area a {
        text-decoration: none;
    }

    .footer-area .footer-heading {
        font-size: 24px;
        color: #fff;
    }

    .footer-area .footer-underline {
        height: 1px;
        width: 70px;
        background-color: #ddd;
        margin: 10px 0px;
    }

    .copyright-area {
        padding: 14px 0px;
        background-color: #262626;
    }

    .copyright-area p {
        margin-bottom: 0px;
        color: #fff;
    }

    .copyright-area .social-media {
        text-align: end;
    }

    .copyright-area .social-media a {
        margin: 0px 10px;
        color: #fff;
        width: 20px;
    }
</style>

<body>


    <div class="login-container">
        <h4 class="text-primary">Page de Connexion</h4>
        <hr>

        <form action="{{route('client.login.authentification')}}" method="POST">
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

            <div class="form-group">
                <label for="emailOrTel">Identifiant</label>
                <input type="text" name="emailOrTel" class="form-control" placeholder="Identifiant" />
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Enter le mot de passe" />
            </div>

            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
         <a href="/">Page d acceuil</a>
    </div>

    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">Funda E-Commerce</h4>
                    <div class="footer-underline"></div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
