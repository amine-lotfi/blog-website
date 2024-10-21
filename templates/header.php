<?php
// redirect to avoid form resubmission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: " . $_SERVER['PHP_SELF'] . "?blog_id=" . $id);
    exit();
}
?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span>Tech<i class="bi bi-pc-display m-1"></i></span>io</a>

        <!-- mobile navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogs.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>