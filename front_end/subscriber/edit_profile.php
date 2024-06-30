<?php
session_start();
require_once ('../../classes.php');
require_once ('header.php');
?>



<div class="container  justify-content-center align-items-center bg-secondary-subtle p-2  ">
            <div class="card-pro">
                <div class="user text-center">
                    <div class="profile">

                        <img src="<?php if (!empty($user->image))
                            echo $user->image;
                        else
                            echo 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' ?>"
                                class="rounded-circle" alt="User Image" width="150" height="150">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <h4 class="mb-0"><?= $user->first_name ?></h4>
                    <span class="text-muted d-block mb-2"><?= $user->role ?></span>
                    <form action="store_user_image.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" style="width: 50%" id="">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Add
                        </button>
                        <button type="submit" name="delete" class="btn btn-danger">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>


<script src="<?= $assets ?>/dist/js/bootstrap.bundle.min.js"></script>