<?php
session_start();
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);
$assets = "../../assets";


?>
<!doctype html>
<html lang="en" data-bs-theme="auto">


<body>



    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
    <script src="<?= $assets ?>/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>