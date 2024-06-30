<?php
session_start();
require_once('header.php');
require_once('../../../classes.php');
$user = unserialize($_SESSION["user"]);
$users_details = $user->all_users();

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">FULL DATA </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">

      </div>
      <a class="nav-link d-flex align-items-center gap-2" href="../../../handel_logout.php">
                                    <svg class="bi">
                                        <use xlink:href="#file-earmark" />
                                    </svg>
                                    Log-out
                                </a>
    </div>
  </div>

  <div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Firs Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Phone</th>
          <th scope="col">Posts</th>
          <th scope="col">Comments</th>
          <th scope="col">likes</th>

          <th scope="col">DELETE</th>
          <th scope="col">Ban/Un-ban</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($users_details as $user_details) {
          $posts_counter = $user->get_user_posts_count($user_details['id']);
          $comments_counter = $user->get_user_comments_count($user_details['id']);
          $likes = $user->get_all_likes_count($user_details['id']);
        ?>
          <tr>
            <td><?= $user_details['id'] ?></td>
            <td><?= $user_details['first_name'] ?></td>
            <td><?= $user_details['last_name'] ?></td>
            <td><?= $user_details['email'] ?></td>
            <td><?= $user_details['role'] ?></td>
            <td><?= $user_details['phone'] ?></td>
            <td><?= $posts_counter ?></td>
            <td><?= $comments_counter ?></td>
            <td><?= $likes ?></td>

            <td>
              <form action="delete_account.php" method="post">
                <input type="hidden" name="user_id" value="<?= $user_details['id'] ?>">
                <button type="submit" class="btn btn-danger">DELETE ACCOUNT</button>
              </form>
            </td>
            <td>
              <?php if ($user_details['is_banned']) : ?>
                <form action="unban_user.php" method="post">
                  <input type="hidden" name="user_id" value="<?= $user_details['id'] ?>">
                  <button type="submit" class="btn btn-warning"> Un-ban</button>
                </form>
              <?php else : ?>
                <form action="ban_user.php" method="post">
                  <input type="hidden" name="user_id" value="<?= $user_details['id'] ?>">
                  <button type="submit" class="btn btn-warning">Ban</button>
                </form>
              <?php endif; ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<?php
require_once('footer.php');
?>