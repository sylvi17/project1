<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="beranda-greet">
        <h1>Halo, ini project laravel pertama saya</h1>
    </div>
    <form action="profil" method="get">
        <button type="submit">Halaman Profil</button>
    </form>
    <form action="kontak" method="get">
        <button type="submit">Halaman Kontak</button>
    </form>
    <form action="home" method="get">
        <button type="submit">Halaman Home</button>
    </form>
</body>
</html>