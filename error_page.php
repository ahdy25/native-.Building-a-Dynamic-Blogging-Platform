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
            background-image: url(https://zerogravitymarketing.com/wp-content/uploads/2022/08/ZGM-Blog-2022-%E2%80%93-1500-x-785-ALL-GRAPHICS-955x500.jpg);
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
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'required_fields') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <div class="alert-icon-error">⚠️</div>
                    <div class="alert-content">
                        <strong>⚠️</strong> <br>
                        There was an error uploading the post
                        You will be redirected to login page in 2 seconds... <br>

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
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'required_images_fields') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <div class="alert-icon-error">⚠️</div>
                    <div class="alert-content">
                        <strong>⚠️</strong> <br>
                        There was an error uploading your image profile <br>
                        <b> Try again later </b>
                        You will be redirected to login page in 2 seconds... <br>

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
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'required_comment_field') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <div class="alert-icon-error">⚠️</div>
                    <div class="alert-content">
                        <strong>⚠️</strong> <br>
                        An error occurred while loading your comment!</strong>
                        <br>
                        <b>Please try again later</b>
                        You will be redirected to login page in 2 seconds... <br>

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
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'required_comment_home_field') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <div class="alert-icon-error">⚠️</div>
                    <div class="alert-content">
                        <strong>⚠️</strong> <br>
                        An error occurred while loading your comment!</strong>
                        <br>
                        <b>Please try again later</b>
                        You will be redirected to login page in 2 seconds... <br>

                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'front_end/subscriber/home.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
            <div class="container">
                <?php
                if (!empty($_GET["msg"]) && $_GET["msg"] == 'unauthorized') {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <div class="alert-icon-error">⚠️</div>
                        <div class="alert-content">
                            <strong>⚠️</strong> <br>
                            You do not have access to this item!</strong>
                            <br>
                            <b>Login again</b>
                            You will be redirected to login page in 2 seconds... <br>
                        </div>
                    </div>

                    <script type="text/javascript">
                        setTimeout(function () {
                            window.location.href = 'index.php';
                        }, 2000);
                    </script>
                    <?php
                }
                ?>
            </div>
            <div class="container">
                <?php
                if (!empty($_GET["msg"]) && $_GET["msg"] == 'no_image_to_delete') {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <div class="alert-icon-error">⚠️</div>
                        <div class="alert-content">
                            <strong>⚠️</strong> <br>
                            There are no photos to be deleted</strong>
                            <br>
                            <b>Try again</b>
                            You will be redirected to login page in 2 seconds... <br>
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
        </div>
        <div class="container">
            <?php
            if (!empty($_GET["msg"]) && $_GET["msg"] == 'account_banned') {
                ?>
                <div class="alert alert-danger" role="alert">
                    <div class="alert-icon-error" style="font-size: 24px; color: red;">🚫</div>
                    <div class="alert-content" style="color: red;">
                        <strong>🚫 Your account is blocked</strong> <br>
                        <b>Try again</b>
                        You will be redirected to login page in 2 seconds... <br>
                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function () {
                        window.location.href = 'index.php';
                    }, 2000);
                </script>
                <?php
            }
            ?>
        </div>
        <?php
        if (!empty($_GET["msg"]) && $_GET["msg"] == 'unban_failed') {
            ?>
            <div class="alert alert-danger" role="alert">
                <div class="alert-icon-error" style="font-size: 24px; color: red;">⚠️</div>
                <div class="alert-content" style="color: red;">
                    <strong>❌ Failed to unblock the user </strong> <br>
                    <b>Try again</b>
                    You will be redirected to login page in 2 seconds... <br>
                </div>
            </div>

            <script type="text/javascript">
                setTimeout(function () {
                    window.location.href = 'index.php';
                }, 2000);
            </script>
            <?php
        }
        ?>
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