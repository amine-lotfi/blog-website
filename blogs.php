<?php

include("config/db_connect.php");
require("functions/functions.php");

// query
$sql = "SELECT * FROM blogs ORDER BY created_at";

// make query & get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$blogs =  mysqli_fetch_all($result, MYSQLI_ASSOC);

// blogs count
$blogs_counter = count($blogs);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

//print_r($blogs);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="css/styles.css" />
    <title>Blog</title>
</head>

<body>

    <?php include("templates/header.php"); ?>

    <section id="blog-section">
        <div class="container">
            <div class="row">
                <?php foreach ($blogs as $blog): ?>
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="<?php echo htmlspecialchars($blog["image_url"]); ?>" class="card-img-top " alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo htmlspecialchars(truncatContent($blog["title"], 6)); ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo htmlspecialchars(truncatContent($blog["content"], 20)); ?>
                                </p>
                                <a href="blog.php?blog_id=<?php echo $blog["id"] ?>" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>