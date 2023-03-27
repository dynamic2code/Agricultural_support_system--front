<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <style>
            .container {
            /* height: 100vh; set height to full viewport height */
            height: auto;
            display: flex; /* use flexbox layout */
            justify-content: center; /* center horizontally */
            align-items: center; /* center vertically */
            }

            form {
            background-color: #3498db;
            width: 500px;
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            color: #fff;
            }

            input[type="submit"] {
            background-color: #fff;
            color: #3498db;
            border: none;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            }

        </style>
    </head>
    <body class="body">
        <div class="container">
            <form  method="POST" action="{{ route('sign_up') }}">
            @csrf
            <h2>sign-up</h2>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <br>
                <br>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location">
                <br>
                <br>

                <label for="land_size">Land size (in acers):</label>
                <input type="number" id="land_size" name="land_size">
                <br>
                <br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone">
                <br>
                <br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <br>
                <br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <br>
                <br>

                <input type="submit" value="Submit">
            </form>
            
        </div>
        <h5>you have an account? <button>log-in</button></h5>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </body>
</html>
