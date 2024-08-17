<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.login-box h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 16px;
}

.form-group input[type="text"], 
.form-group input[type="password"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group input[type="submit"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: #333;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-group input[type="submit"]:hover {
    background-color: #444;
}

.form-footer {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.form-footer a {
    color: #333;
    text-decoration: none;
    font-size: 14px;
}

.form-footer a:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .login-container {
        padding: 15px;
    }

    .login-box h2 {
        font-size: 20px;
    }

    .form-group input[type="submit"] {
        font-size: 14px;
    }

    .form-footer {
        flex-direction: column;
        align-items: center;
    }

    .form-footer a {
        margin-top: 5px;
    }
}

    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="{{route('do_login.admin')}}" method="POST">
              @csrf

              
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
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="name" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Connexion">
                </div>
                <div class="form-footer">
                    <a href="#">Forgot Password?</a>
                    <a href="#">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
