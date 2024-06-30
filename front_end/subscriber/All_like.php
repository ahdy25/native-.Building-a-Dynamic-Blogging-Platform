<?php
session_start();
require_once ("../../classes.php");
$user = unserialize($_SESSION["user"]);
$likes = $user->All_likes($_REQUEST["post_id"]);
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>All Likes</title>
  <link rel="shortcut icon" href="./image/logo.png" type="image/x-icon" />
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/list-groups/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="../../assets/dist/css/bootstrap.min.css">
  <link href="bootstrap.min.css" rel="stylesheet">

  <style>
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

    .profile-img {
      width: 50px;
      height: 50px;
    }

    .profile-info {
      font-size: 1.25rem;
    }

    .like-count {
      font-size: 1.5rem;
      font-weight: bold;
    }
  </style>
  <link href="list-groups.css" rel="stylesheet">
  <!-- Custom styles for this template -->
</head>

<body>

<?php
$likeCount = 0; 

if (!empty($likes)) {
  $likeCount = count($likes); 

  foreach ($likes as $like) {
    $user1 = $user->getUser($like["user_id"]);
    if (!empty($user1)) {
      $userData = $user1[0];
?>
  <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-2">
    <div class="d-flex gap-3 w-100 align-items-center">
      <img src="<?= empty($userData["image"]) ? 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' : $userData["image"]; ?>" alt="avatar" class="rounded-circle flex-shrink-0 profile-img">
      <div>
        <h6 class="mb-0 profile-info"><?= $userData["first_name"]." ". $userData["last_name"] ?></h6>
        <small class="text-muted"><?= $userData["created_at"] ?></small>
      </div>
    </div>
  </div>
<?php
    }
  }
}
?>
<div class="d-flex justify-content-end p-4">
  <span class="like-count">Total Likes: <?= $likeCount ?></span>
</div>



  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>