<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

.profile-container {
    width: 100%;
    max-width: 500px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.profile-box h2 {
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
.form-group input[type="email"], 
.form-group input[type="password"], 
.form-group input[type="text"] {
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

@media (max-width: 480px) {
    .profile-container {
        padding: 15px;
    }

    .profile-box h2 {
        font-size: 20px;
    }

    .form-group input[type="submit"] {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-box">
            <h2>Edit Profile</h2>
            <form action="{{route('update.compte')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="username">Username</label>
                    <input type="text" id="username" name="name" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{$user->email}}" required>
                </div>
               
                <div class="form-group">
                    <label for="username">Tel</label>
                    <input type="text" id="username" name="tel" value="{{$user->tel}}" required>
                </div>

                <input type="hidden" id="username" name="id" value="{{$user->id}}" required>

                <div class="form-group">
                    <input type="submit" value="Update Profile">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
