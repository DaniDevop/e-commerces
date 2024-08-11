<!DOCTYPE html>
<html lang="en">

@include('admin.pages.head')

<body>

	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="{{route('home')}}">
						<img width="50" src="{{asset('client/img/logo1.png')}}">
						<div class="logo-text">
							<p class="big-logo">Ecommerce</p>
							<p class="small-logo">online shop</p>
						</div>
					</a>
				</div> <!-- logo -->
				<div class="shop-icon">
					<div class="dropdown">
						<img src="../img/icons/account.png">
						<div class="dropdown-menu">
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Settings</a></li>
								<li><a href="{{route('logout.compte')}}">Logout</a></li>
							</ul>
						</div>
					</div>
				</div> <!-- shop icons -->
			</div> <!-- brand -->
		</div> <!-- container -->
	</header> <!-- header -->

	<main>

		<div class="main-content">
            @include('admin.pages.sidebar')

			<div class="content">
				<h3>Product</h3>
				<div class="content-data">
					<div class="content-form">
						<form action="{{route('update.produit')}}" method="POST" enctype="multipart/form-data">
                            @csrf
							<h4>Add Product</h4>
							<div class="form-inline">
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" name="designation" value="{{$produit->designation}}">
								</div>
								<div class="form-group">
									<label>Price</label>
									<input type="number" name="prix" value="{{$produit->prix}}" min="1">
								</div>
							</div>
							<div class="form-group">
								<label>Stock</label>
								<input type="number" name="stock" value="{{$produit->stock}}" min="1">
							</div>

							<div class="form-inline">
								<div class="form-group">
									<label>Category</label>
									<select name="categorie_id" >
										<option>---Select a Category---</option>
                                        <option value="{{$produit->categorie_id}}">{{optional($produit->categorie)->categorie}}</option>
                                        @foreach ($categorieAll as $categorie )
										<option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                        @endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Images</label>
									<input type="file" name="image" >
								</div>
							</div>
							<div class="form-group">
								<label></label>
                                <input type="hidden" name="id" value="{{$produit->id}}">
								<input type="submit" name="addProduct" value="Ajouter un produit">
							</div>
						</form>
					</div>
					<div class="content-detail">
						<h4>All Products</h4>
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Designation</th>
                                    <th>Prix</th>
									<th>Category</th>
                                    <th>Stock</th>
								</tr>
							</thead>
							<tbody>
								<tr>
                                    <th scope="row"  class="zoom"> <img src="{{asset('uploads/store/'.$produit->image)}}" alt=""  width="30">  </th>

									<td>  {{$produit->designation}} </td>
                                    <td>  {{$produit->prix}} </td>
									<td>  {{$produit->categorie->categorie}} </td>
									<td>  {{$produit->stock}} </td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>


		</div>



	</main> <!-- Main Area -->

	<footer>
		<div class="container">
			<div class="footer-bar">
				<div class="copyright-text">
					<p>Copryright 2020 - All Rights Reserved</p>
				</div>
			</div> <!-- Footer Bar -->
		</div>
	</footer> <!-- Footer Area -->

</body>

</html>
