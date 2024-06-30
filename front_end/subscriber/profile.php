<?php
// require_once('dark_mode.php');
session_start();
require_once ('header.php');
require_once ('../../classes.php');
$user = unserialize($_SESSION["user"]);
$my_posts = $user->myposts($user->id);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 3px;
        }

        .like-btn {
            background-color: #007bff;

            border-color: #007bff;
            padding: 0.5rem 1rem;

        }

        .comment-icon:hover {
            color: #007bff;

        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");




        .container {
            height: 65vh;
        }

        .card-pro {

            background-color: saddlebrown;
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            width: 380px;
            border: none;
            border-radius: 15px;
            padding: 8px;

            position: relative;
            height: 370px;
        }

        .profile img {


            height: 80px;
            width: 80px;
            margin-top: 2px;


        }

        .like-button {
            background-color: #3366ff;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }





        /* Component: Mini Profile Widget */
        .mini-profile-widget .image-container .avatar {
            width: 180px;
            height: 180px;
            display: block;
            margin: 0 auto;
            border-radius: 50%;
            background: white;
            padding: 4px;
            border: 1px solid #dddddd;
        }

        .mini-profile-widget .details {
            text-align: center;
        }



    

    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
    <main>


        <div class="row py-5 px-4  w-full">
            <div class="col-12 ">

                <!-- Profile widget -->
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="px-4 pt-2 pb-4 bg-dark">
                        <div class="media align-items-end profile-header">


                            <div class="profile mx-2 p-2"><img
                                    src="<?php if (!empty($user->image))
                                        echo $user->image;
                                    else
                                        echo 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' ?>"
                                        alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="edit_profile.php"
                                        class="btn btn-dark btn-sm btn-block">Edit profile</a></div>
                                <div class="media-body mb-5 text-white p-2">
                                    <h4 class="mb-2 mx-3"><?= $user->first_name ?></h4>
                                <span class="text-white d-block mb-2 mx-1">( <?= $user->role ?> )</span>

                            </div>
                        </div>
                    </div>

                    <div class="bg-light p-4 d-flex text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i
                                        class="fa fa-picture-o mr-1"></i>Photos</small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i
                                        class="fa fa-user-circle-o mr-1"></i>Followers</small>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <h2 class="text-center">Enter The Post</h2>
                                <form action="storePoste.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder=""
                                            aria-describedby="titleHelp" required />
                                        <small id="titleHelp" class="text-muted">Help text</small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea name="content" id="contentArea" class="form-control" rows="4"
                                            aria-describedby="contentHelp" required></textarea>
                                        <small id="contentHelp" class="text-muted">Help text</small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            aria-describedby="imageHelp" />
                                        <small id="imageHelp" class="text-muted">Help text</small>
                                    </div>
                                    <button type="submit" class="btn btn-secondary w-100">Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="py-4 px-2">
                        <div class="p-4 rounded shadow-sm m-4">
                            <h1 class="mb-4 text-center">Recent posts</h1>
                            <?php foreach ($my_posts as $posts) {
                                ?>
                                <div class="col-8 offset-2 border border-secondary-subtle rounded mb-4 shadow p-2">
                                    <div class="panel panel-white  rounded">
                                        <div class="post-heading  m-4">
                                            <div class="  ">
                                                <img style="width:50px ; height: 50px; border-radius:50px;"
                                                    src="<?php if (!empty($user->image))
                                                        echo $user->image;
                                                    else
                                                        echo 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' ?>">
                                                    <h6 class="mb-0"><?= $user->first_name ?><?= " " . $user->last_name ?></h6>
                                                <br>
                                                <h6 class=""> <span><?= $posts["created_at"] ?></span></h6>
                                            </div>

                                        </div>
                                        <div class="post-image mx-4 my-1">
                                            <?php if (!empty($posts['image'])) { ?>
                                                <img class="card-img-top rounded" src="<?= $posts['image'] ?>" alt="title"
                                                    style="max-height: 900px; object-fit: contain; width: 100%;" />
                                            <?php } ?>
                                        </div>
                                        <div class="card-body px-2">
                                            <h4 class="card-title ps-3 mx-4"><?= $posts['title'] ?></h4>
                                            <p class="card-text ps-4 mx-4"><?= $posts['content'] ?></p>
                                            <p class="card-text mx-5 my-2">
                                                <small class="text-muted">Published on
                                                    <?= date('F j, Y, g:i a', strtotime($posts['created_at'])) ?></small>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="post-description p-2 d-flex justify-content-between">
                                            <div class="stats ">
                                            <?php if (!empty($user->myLike($posts["id"], $user->id))) {  ?>
                                        <a style="color:red" role="button" href="handle_like_profile.php?post_id=<?= $posts["id"] ?>&like=no" class="btn ">
                                            <i class="bi bi-heart-fill"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/></svg>

                                            <span>Like</span>
                                        </a>
                                    <?php } else
                                    {  ?>
                                        <a style="color:" role="button" href="handle_like_profile.php?post_id=<?= $posts["id"] ?>&like=yes" class="btn ">
                                            <i class="bi bi-heart"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/></svg>

                                            <span>Like</span>
                                        </a>
                                    <?php } ?>               
                                </div>
                                            </>

                                            <div class="action">
                                                <a role="button" href="All_like.php?post_id=<?= $posts["id"] ?>"
                                                    class="btn">
                                                    <i class="fa-solid fa-users-between-lines"></i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="fa-solid fa-users-between-lines"
                                                        viewBox="0 0 640 512">

                                                        <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M0 24C0 10.7 10.7 0 24 0H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 48 0 37.3 0 24zM0 488c0-13.3 10.7-24 24-24H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM83.2 160a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM32 320c0-35.3 28.7-64 64-64h96c12.2 0 23.7 3.4 33.4 9.4c-37.2 15.1-65.6 47.2-75.8 86.6H64c-17.7 0-32-14.3-32-32zm461.6 32c-10.3-40.1-39.6-72.6-77.7-87.4c9.4-5.5 20.4-8.6 32.1-8.6h96c35.3 0 64 28.7 64 64c0 17.7-14.3 32-32 32H493.6zM391.2 290.4c32.1 7.4 58.1 30.9 68.9 61.6c3.5 10 5.5 20.8 5.5 32c0 17.7-14.3 32-32 32h-224c-17.7 0-32-14.3-32-32c0-11.2 1.9-22 5.5-32c10.5-29.7 35.3-52.8 66.1-60.9c7.8-2.1 16-3.1 24.5-3.1h96c7.4 0 14.7 .8 21.6 2.4zm44-130.4a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM321.6 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                                    </svg>
                                                    <span>Likes</span>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="post-footer">
                                            <div class=" ">
                                                <form action="store_comment.php" method="post" id="commentForm"
                                                    class=" d-flex p-4 w-full ">
                                                    <input class="form-control" name="comment" placeholder="Add a comment"
                                                        type="text">
                                                    <span class="input-group-addon">
                                                        <button type="submit"
                                                            class="btn btn-lg btn-primary m-2">Add</button>
                                                    </span>
                                                    <input type="hidden" name="post_id" value="<?= $posts['id'] ?>">
                                                </form>
                                                <hr>
                                            </div>
                                            <ul class="comments-list pe-3">
                                    <?php
                                    $comments = $user->get_post_comment($posts["id"]);
                                    foreach ($comments as $comment) {
                                    ?>
                                        <li class="comment">
                                            <div class="card mb-4">
                                                <div class="card-body bg-light">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">

                                                            <img style="border-radius: 50%;" src="<?= empty($comment['image']) ? 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' : $comment['image']; ?>" alt="avatar" width="25" height="25" />
                                                            <p class="small mb-0 ms-2"><?= $comment["first_name"] . " " . $comment["last_name"] ?></p>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <p class="small text-muted mb-0"><?= $comment["created_at"] ?></p>
                                                        </div>
                                                    </div>
                                                   
                                                   <div class="ms-3 mt-3 ps-3 pt-3 bg-white border border-secondary-subtle rounded">
                                                   <p><?= $comment["comment"] ?></p>
                                                   </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!-- End profile widget -->

        </div>
        </div>



        </div>

        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
</body>

</html>