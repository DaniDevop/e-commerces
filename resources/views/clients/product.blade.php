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
    .main-navbar {
        border-bottom: 1px solid #ccc;
    }

    .main-navbar .top-navbar {
        background-color: #2874f0;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .main-navbar .top-navbar .brand-name {
        color: #fff;
    }

    .main-navbar .top-navbar .nav-link {
        color: #fff;
        font-size: 16px;
        font-weight: 500;
    }

    .product-view .product-name {
        font-size: 24px;
        color: #2874f0;
    }

    /* Sidebar Categories */
    .sidebar-categories {
        background-color: #f8f9fa;
        padding: 15px;
        border-right: 1px solid #ddd;
    }

    .sidebar-categories h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .sidebar-categories .list-group-item {
        border: none;
        padding: 10px 15px;
    }

    .sidebar-categories .list-group-item:hover {
        background-color: #2874f0;
        color: #fff;
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

	.carousel-item {
    padding: 10px;
}

.carousel-item img {
    width: 100%;
    height: auto;
    object-fit: cover;
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

</style>

<body>

    @include('clients.pages.navbar')

    <div class="container mt-3" method="POST" action="{{route('client.findProduct')}}">
    <form class="d-flex mb-3">
        @csrf
        <input id="search-input" class="form-control me-2" type="search" name="search" placeholder="Recherche produit ..." aria-label="Recherche">
        <button class="btn btn-outline-success" type="submit">Recherche</button>
    </form>

    <form class="mb-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <select id="categorie-select" name="categorie" class="form-select">
            <option value="">Tous</option>
            @foreach($categorie as $cat)
                <option value="{{ $cat->id }}">{{ $cat->categorie }}</option>
            @endforeach
        </select>
    </form>
</div>



<div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" id="product-list">
        <!-- Les produits seront rendus ici -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
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

     var app = {{ Illuminate\Support\Js::from($produitAll) }};
     console.log(app)

     document.addEventListener('DOMContentLoaded', () => {
    const productList = document.getElementById('product-list');
    const searchInput = document.getElementById('search-input');
    const categorySelect = document.getElementById('categorie-select');

    function renderProducts(products) {
    const chunkSize = 4; // Nombre de produits par slide
    const productList = document.getElementById('product-list');
    productList.innerHTML = ''; // Clear existing products

    for (let i = 0; i < products.length; i += chunkSize) {
        const chunk = products.slice(i, i + chunkSize);
        const isActive = i === 0 ? 'active' : '';

        let productCards = chunk.map(product => `
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        <label class="stock ${product.stock > 0 ? 'bg-success' : 'bg-danger'}">
                            ${product.stock > 0 ? 'En Stock' : 'Rupture de Stock'}
                        </label>
                        <img src="/uploads/store/${product.image}" alt="${product.designation}">
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">Catégorie : ${product.categorie.categorie}</p>
                        <h5 class="product-name">
                            <a href="">
                                ${product.designation}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">${product.prix}</span>
                        </div>
                        <div class="mt-2">
                            <a href="#" class="btn btn1" onclick="addProductCart(${product.id})">Ajouter au panier</a>
                            <a href="/details_product/${product.id}" class="btn btn1">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

        const item = `
            <div class="carousel-item ${isActive}">
                <div class="row">
                    ${productCards}
                </div>
            </div>
        `;
        productList.innerHTML += item;
    }
}

// Rendu initial des produits
renderProducts(app);

    // Filter products
    function filterProducts() {
        const searchQuery = searchInput.value.toLowerCase();
        const selectedCategory = categorySelect.value;

        const filteredProducts = app.filter(product => {
            const matchesSearch = product.designation.toLowerCase().includes(searchQuery);
            const matchesCategory = selectedCategory === '' || product.categorie.id === parseInt(selectedCategory);
            return matchesSearch && matchesCategory;
        });

        renderProducts(filteredProducts);
    }

    // Event listeners for filtering
    searchInput.addEventListener('input', filterProducts);
    categorySelect.addEventListener('change', filterProducts);
});


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
