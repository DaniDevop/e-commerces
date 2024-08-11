<!DOCTYPE html>
<html lang="en">

@include('admin.pages.head')

<body>

	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="{{route('home')}}">
						<img src="../img/icons/online_shopping.png">
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
				<h3>Order</h3>
				<div class="content-detail">
					<table>
						<thead>
							<tr>
								<th>Date</th>
								<th>Order Ref#</th>
								<th>User</th>
								<th>Amount</th>
								<th>Payment Mode</th>
								<th>Status</th>
								<th>View</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11-05-2020</td>
								<td>15895452</td>
								<td>Kamran</td>
								<td>1500</td>
								<td>Cash On Delivery</td>
								<td>Pending</td>
								<td>View</td>
								<td>Delete</td>
							</tr>
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
