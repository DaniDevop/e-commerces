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
								<li><a href="#">Logout</a></li>
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
				<h3>Catogory</h3>
				<div class="content-data">
					<div class="content-form">
						<form method="POST" action="{{route('ajouter.categorie')}}">
                            @csrf
							<h4>Ajouter une catégorie</h4>
							<div class="form-inline">
								<div class="form-group">
									<label>Category Name</label>
									<input type="text" name="categorie">
								</div>

							</div>
							<div class="form-group">
								<label></label>
								<input type="submit" name="addCategory" value="Ajouter-une-categorie">
							</div>
						</form>


					</div>

					<div class="content-detail">
						<h4>Listes des catégories</h4>
                        <form action="{{route('rechercher.categorie')}}" method="GET">
                            @csrf
                            <div class="form-group">
                                <label>Rechercher une catégorie</label>
                                <input type="text" name="search" required>
                                <button>Chercher...</button>
                            </div>
                        </form>

						<table>
							<thead>
								<tr>
									<th>Category</th>
									<th>Date</th>
									<th>Modifier</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
                                @foreach($categorie as $cat)
								<tr>
									<td> {{$cat->categorie}} </td>
									<td>{{$cat->created_at}} </td>
									<td><a href="{{route('details.categorie',['id'=>$cat->id])}}">Modifier</a> </td>
									<td>Delete</td>
								</tr>
                                @endforeach
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
