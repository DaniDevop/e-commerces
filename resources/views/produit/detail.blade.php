<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Dashboard</title>
    <style>
		* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    padding-top: 20px;
    transition: all 0.3s ease;
}

.sidebar .logo {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar .logo h2 {
    font-size: 24px;
    margin: 0;
}

.sidebar .menu {
    list-style-type: none;
}

.sidebar .menu li {
    padding: 15px 20px;
    text-align: left;
}

.sidebar .menu li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    display: block;
}

.sidebar .menu li a:hover {
    background-color: #444;
}

.sidebar .menu li i {
    margin-right: 10px;
}

.main-content {
    margin-left: 250px;
    padding: 20px;
    transition: all 0.3s ease;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 28px;
}

.header .user-info {
    display: flex;
    align-items: center;
}

.header .user-info span {
    margin-right: 10px;
    font-size: 16px;
}

.header .user-info img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.product-form, .product-list {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product-form h4, .product-list h2 {
    margin-bottom: 20px;
    font-size: 22px;
}

.form-inline {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
    width: 48%;
}

.form-group label {
    margin-bottom: 5px;
    font-size: 16px;
}

.form-group input[type="text"], 
$form-group input[type="number"], 
.form-group select, 
.form-group input[type="file"] {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
}

.form-group input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #333;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #444;
}

.product-list table {
    width: 100%;
    border-collapse: collapse;
}

.product-list th, .product-list td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.product-list th {
    background-color: #f4f4f4;
}

.product-list img {
    border-radius: 4px;
}

.edit-btn, .delete-btn {
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 4px;
    margin-right: 5px;
}

.edit-btn {
    background-color: #5bc0de;
}

.edit-btn:hover {
    background-color: #31b0d5;
}

.delete-btn {
    background-color: #d9534f;
}

.delete-btn:hover {
    background-color: #c9302c;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
    .main-content {
        margin-left: 0;
    }
    .header {
        flex-direction: column;
        align-items: flex-start;
    }
    .form-inline {
        flex-direction: column;
    }
    .form-group {
        width: 100%;
    }
    .product-list table, .product-list th, .product-list td {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .header h1 {
        font-size: 24px;
    }
    .form-inline {
        flex-direction: column;
    }
    .form-group {
        width: 100%;
    }
    .product-list table, .product-list th, .product-list td {
        font-size: 12px;
    }
    .edit-btn, .delete-btn {
        padding: 3px 7px;
    }
}

	</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2>MyShop</h2>
        </div>
		@include('partials.navbar')

    </div>

    <div class="main-content">
        <div class="header">
            <h1>Details du Produit  {{$product->designation}} </h1>
            <div class="user-info">
                <span>Admin</span>
                <img src="https://via.placeholder.com/40" alt="User Image">
            </div>
        </div>

        <div class="product-form">
            <form action="{{route('update.produit')}}" method="POST" enctype="multipart/form-data">

			
			@if ($errors->any())
							<div class="alert alert-danger" style="color:red;">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                @csrf
                <h4>Mise-à-jour</h4>
                <div class="form-inline">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="designation" value="{{$product->designation}}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="prix" value="{{$product->prix}}" min="1">
                    </div>
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{$product->stock}}"  min="1">
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="categorie_id">
							<option value="{{$product->categorie_id}}">{{$product->categorie->categorie}}  </option>
                            @foreach ($categorieAll as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="image">
                    </div>
                </div>

				 <input type="hidden" name="id" value="{{$product->id}}" id="">
                <div class="form-group">
                    <input type="submit" name="addProduct" value="Mise-à-jour">
                </div>
            </form>
        </div>

        <div class="product-list">
            <h2>Details du produits</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
						<th>Date-création</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset('uploads/store/'. $product->image) }}" alt="Product Image" width="50"></td>
                        <td>{{ $product->designation }}</td>
                        <td>{{ $product->categorie->categorie }}</td>
                        <td>{{ $product->prix }}</td>
                        <td>{{ $product->stock }}</td>
						<td>{{ $product->created_at }}</td>

                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
