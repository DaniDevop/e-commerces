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
    background-color: black;
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    padding-top: 20px;
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

.cards {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.card {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    width: 23%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-content {
    text-align: left;
}

.card-content h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.card-content p {
    font-size: 24px;
    font-weight: bold;
}

.card-icon {
    font-size: 36px;
    color: #333;
}

.charts {
    display: flex;
    justify-content: space-between;
}

.chart {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    width: 48%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.chart h2 {
    margin-bottom: 20px;
    font-size: 22px;
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
    .sidebar .menu {
        display: flex;
        flex-wrap: wrap;
    }
    .main-content {
        margin-left: 0;
    }
    .cards {
        flex-direction: column;
    }
    .card {
        width: 100%;
        margin-bottom: 20px;
    }
    .charts {
        flex-direction: column;
    }
    .chart {
        width: 100%;
        margin-bottom: 20px;
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
            <h1>Dashboard</h1>
            <div class="user-info">
                <span>Admin</span>
                <img src="https://via.placeholder.com/40" alt="User Image">
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <div class="card-content">
                    <h3>Produits</h3>
                    <p> {{$produitCount}} </p>
                </div>
                <div class="card-icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Ventes</h3>
                    <p> {{$sommeFacture}} FCFA</p>
                </div>
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Clients</h3>
                    <p>  {{$clientCount}}  </p>
                </div>
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Commandes</h3>
                    <p> {{$commandesCount}} </p>
                </div>
                <div class="card-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="chart">
                <h2>Sales Overview</h2>
                <!-- Add your chart library here -->
            </div>
            <div class="chart">
                <h2>Recent Orders</h2>
                <!-- Add your chart or data table here -->
            </div>
        </div>
    </div>
</body>
</html>
