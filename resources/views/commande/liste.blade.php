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
				<h3>Listes des commandes</h3>
				<div class="content-detail">
					<table>
						<thead>
							<tr>
								<th>Date</th>
								<th>Order Ref#</th>
								<th>User</th>
								<th>Status</th>
								<th>Details</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($commandes as $order)
							<tr>
								<td>{{$order->date}}</td>
								<td>{{$order->created_at}}</td>
								<td>{{$order->nom}}</td>
								<td>{{$order->status}}</td>
								<td>Details</td>
								<td>Delete</td>
							</tr>
                            @endforeach
						</tbody>
					</table>
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
