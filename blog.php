<?php
include("config/db_connect.php");
require("functions/functions.php");

// check GET request id param
if (isset($_GET["blog_id"])) {

    $id = mysqli_real_escape_string($conn, $_GET["blog_id"]);

    //echo '<script>alert("The id is: ' . $id . '");</script>';

    $sql = "SELECT * FROM blogs WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $blog = mysqli_fetch_assoc($result);
}

// check if the user has already liked (cookie)
if (isset($_COOKIE['liked_post_' . $id])) {
    $user_has_liked = true;
} else {
    $user_has_liked = false;
}

// the like when the button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$user_has_liked) {
    $sql = "UPDATE blogs SET likes = likes + 1 WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // set a cookie to remember the user has liked this post (expires in 7 days)
        setcookie('liked_post_' . $id, 'true', time() + (7 * 24 * 60 * 60)); // 7  expiry
        $user_has_liked = true;
    }
}

mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="css/styles.css" />
    <title><?php echo htmlspecialchars($blog["title"])?></title>
</head>

<body>
    <?php include("templates/header.php"); ?>

    <section id="blog_body" class="pt-5 pb-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-8 bg-light">
                <h1 class="text-center"><?php echo htmlspecialchars($blog["title"]); ?></h1>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-center ps-2">Blog > <?php echo htmlspecialchars(truncatContent($blog["title"], 5)) ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-center ps-2">Published by: <?php echo htmlspecialchars($blog["author"]) ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-center ps-2">Date: <?php echo htmlspecialchars($blog["created_at"]) ?></p>
                        </div>
                    </div>
                </div>





                <img class="d-block mx-auto w-75 mt-2 mb-2" src="<?php echo htmlspecialchars($blog["image_url"]); ?>" alt="IMG">
                <p class="p-5"><?php echo htmlspecialchars($blog["content"]) ?></p>

                <p class="ps-5">Tags: <?php echo htmlspecialchars($blog["category"]) ?></p>

                <form method="POST" action="" class="ps-5">
                    <p>Likes: <?php echo $blog["likes"] ?> - <?php if ($user_has_liked): ?>
                            You already liked this post.
                        <?php else: ?>
                            Do you like it?
                        <?php endif ?>
                        <button type="submit" class="btn btn-success p-0 m-0 text-light" <?php if ($user_has_liked): ?> disabled <?php endif; ?>><i class="bi bi-hand-thumbs-up"></i><?php if ($user_has_liked): ?> Liked <?php else: ?> Like <?php endif; ?></button>
                    </p>
                </form>
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>