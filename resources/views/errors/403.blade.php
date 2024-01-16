<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel= "stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    {{-- <link href="style.css" rel="stylesheet"> --}}
    <link href="{{ asset('admins/body/error.css') }}" rel="stylesheet">
</head>

<body>
    <section class="notFound">
        <div class="img">
            <img src="https://assets.codepen.io/5647096/backToTheHomepage.png" alt="Back to the Homepage" />
            <img src="https://assets.codepen.io/5647096/Delorean.png" alt="El Delorean, El Doc y Marti McFly" />
        </div>
        <div class="text">
            <h1>403</h1>
            <h2>THIS ACTION IS UNAUTHORIZED</h2>
            <h3>BACK TO HOME?</h3>
            <a href="{{ route('home') }}" class="yes">YES</a>
            <a href="#">NO</a>
        </div>
    </section>

</body>

</html>
