<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Bar</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> <!-- Optional CSS -->
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo"> <!-- Logo -->
                </a>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="<?= base_url('home') ?>">Home</a></li>
                    <li><a href="<?= base_url('projects') ?>">Projects</a></li>
                    <li><a href="<?= base_url('locations') ?>">Locations</a></li>
                    <li><a href="<?= base_url('about') ?>">About</a></li>
                </ul>
            </nav>
            <div class="user-profile">
                <a href="<?= base_url('profile') ?>">Profile</a>
                <a href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </header>
    <hr>
</body>
</html>