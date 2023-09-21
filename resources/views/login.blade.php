<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <div class="form-box log">
            <form class="form" action="/authentificate" method="POST">
                @csrf
                <span class="title">Login</span>
                <span class="subtitle">Login to your account !</span>
                <div class="form-container">
                    <input type="text" name="loginname" class="input" placeholder="Full Name">
                    <input type="password" name="loginpassword" class="input" placeholder="Password">
                </div>
                <button>Login</button>
            </form>
        </div>
    </div>
</body>
</html>
