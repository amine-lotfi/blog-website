<?php
//echo "Hello homepage!"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="css/styles.css" />
    <title>Homepage</title>
</head>

<body>

    <?php include("templates/header.php"); ?>

    <section id="hero-section">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center bg-light p-5">
                <h1>Your best Tech-advisor!</h1>
                <p>Make sure to check our Blog. There you will find interesting Tech topics.</p>
                <a href="blogs.php" class="btn" id="btn-blog">Check out our blog!</a>
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>