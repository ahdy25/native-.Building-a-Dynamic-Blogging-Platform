<!doctype html>
<html lang="en">

<head>
    <title>Registration Success</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
        body {
            background-image: url(://cdn.dribbble.com/users/2185205/screenshots/7886140/media/90211520c82920dcaf6aea760https4aeb029.gif);
            background-repeat: repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .alert {
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 50px;
            border-radius: 8px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #28a745;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .alert-icon-error {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: orange;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .alert-content {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <header>
    </header>
    <main>

        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'sr') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong>Sign-in is successfully </strong> <br>

                        You will be redirected to the login page shortly.<br>
                        <br>
                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'index.php';
                    }, 4000);
                </script>
                <?php
            }
            ?>
        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'done') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong>Done</strong> <br>

                        

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/subscriber/profile.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'user_image_done') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong> Edit profile is Successfully </strong>
                        <br>
                        

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/subscriber/profile.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'delete_done') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong>Delete Account is Done</strong> <br>
                        

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/admin/dashboard/home.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'user_image_deleted') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong>Delete Profile Is Done</strong> <br>
                        

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/subscriber/profile.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
            </span> <br>
        </div>
        </div>


        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'ban_done') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong>🚫 The user has been blocked</strong> <br>
                        

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/admin/dashboard/home.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
            </span> <br>
        </div>
        </div>


        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'unban_done') {
                ?>
                <div class="alert alert-success" role="alert">
                    <div class="alert-icon">✅✅</div>
                    <div class="alert-content">
                        <strong>✅ The user has been unblocked</strong> <br>
                        

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/admin/dashboard/home.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
            </span> <br>
        </div>
        </div>


        </div>
    </main>
    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>