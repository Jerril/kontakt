<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kontakt 1.0</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.5;
            background-color: #fafafa;
            max-height: 100vh;
        }

        nav {
            background-color: #fff;
            height: 56px;
            padding: 2px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: inherit;
            text-decoration: none;
        }

        nav .logo {
            font-style: italic;
            font-size: 20px;
        }

        nav .logo:hover {
            text-decoration: underline;
        }

        nav .signup {
            border: 2px solid #3056D2;
            background-color: #3056D2;
            border-radius: 4px;
            padding: 6px 17px;
            color: #fff;
            font-weight: 500;
            margin-left: 25px;
        }

        nav .signup:hover {
            background-color: transparent;
            color: #3056D2;
        }

        nav .login {
            color: #757575;
            font-weight: 500;
        }

        nav .login i {
            rotate: 45deg;
        }

        nav .login:hover i {
            rotate: 90deg;
        }

        main {
            padding: 97px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .app-copy h1 {
            font-size: 60px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="logo">kontakt</a>
        <div>
            <a href="/login" class="login">Login <i class="fas fa-arrow-up"></i></a>
            <a href="/signup" class="signup">Sign up</a>
        </div>
    </nav>
    <main>
        <div class="app-copy">
            <h1>
                Never loose your contacts again
            </h1>
            <p>
                This simple system that manages and stores your contacts. You can retrieve them on multiple platforms or when you change phone
            </p>
        </div>
        <img src="" alt="">
    </main>
</body>
</html>
