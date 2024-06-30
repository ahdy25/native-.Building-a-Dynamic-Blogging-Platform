<?php
abstract class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $image;
    protected $password;
    public $phone;
    public $created_at;
    public $updated_at;
    public $is_banned;

    function __construct($id, $first_name, $last_name, $email, $image, $password, $phone, $created_at, $updated_at, $is_banned)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->image = $image;
        $this->is_banned = $is_banned;
    }

    public static function login($email, $password)
    {
        $user = null;
        $qry = "SELECT * FROM USERS WHERE email='$email' AND password='$password'";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        if ($arr = mysqli_fetch_assoc($rslt)) {
            if ($arr['is_banned']) {
                return null;
                header('location:error_page.php?msg=account_banned');
                exit();
            }
            switch ($arr["role"]) {
                case 'subscriber':
                    $user = new Subscriber($arr["id"], $arr["first_name"], $arr["last_name"], $arr["email"], $arr["image"], $arr["password"], $arr["phone"], $arr["created_at"], $arr["updated_at"], $arr["is_banned"]);
                    break;
                case 'admin':
                    $user = new Admin($arr["id"], $arr["first_name"], $arr["last_name"], $arr["email"], $arr["image"], $arr["password"], $arr["phone"], $arr["created_at"], $arr["updated_at"], $arr["is_banned"]);
                    break;
            }
        }
        mysqli_close($connect);
        return $user;
    }
}
class Subscriber extends User
{
    public $role = "subscriber";
    public static function register($first_name, $last_name, $email, $password, $phone)
    {
        $qry = "INSERT INTO users (first_name,last_name,email,password,phone) 
    VALUES('$first_name','$last_name','$email','$password','$phone')";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }
    public static function postes($title, $content, $image, $user_id)
    {
        $qry = "INSERT INTO posts (title,content,image,user_id)
        VALUES ('$title','$content','$image','$user_id')";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }
    public static function store_comment($comment, $post_id, $user_id)
    {
        $qry = "INSERT INTO COMMENTS (comment,post_id,user_id)
        VALUES ('$comment','$post_id','$user_id')";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }
    public static function myposts($user_id)
    {
        $qry = "SELECT * FROM POSTS WHERE USER_ID=$user_id ORDER BY CREATED_AT DESC";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }

    public static function update_profile($imagePath, $user_id)
    {
        $qry = "UPDATE USERS SET IMAGE = '$imagePath' WHERE id=$user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }


    public static function home_post($limit = 10)
    {
        $qry = "
            SELECT posts.*, users.image as user_image, users.first_name, users.last_name 
            FROM posts 
            INNER JOIN users ON posts.user_id = users.id 
            ORDER BY posts.created_at DESC
            LIMIT $limit
        ";

        require_once ('configration.php');

        // Connect to the database
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);

        // Check the connection
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Execute the query
        $rslt = mysqli_query($connect, $qry);

        // Check for query errors
        if (!$rslt) {
            die("Query failed: " . mysqli_error($connect));
        }

        // Fetch all the results as an associative array
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);

        // Close the database connection
        mysqli_close($connect);

        // Return the data
        return $data;
    }

    public function get_post_comment($post_id)
    {
        $qry = "SELECT * FROM COMMENTS JOIN USERS ON COMMENTS.USER_ID=USERS.ID WHERE POST_ID=$post_id ORDER BY COMMENTS.CREATED_AT DESC";

        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);

        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);

        mysqli_close($connect);
        return $data;
    }
    public static function store_like($like, $user_id, $post_id)
    {
        $qry = "INSERT INTO likes (love , user_id , post_id) 
        VALUES('$like' , '$user_id','   $post_id')";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }
    public static function unlike($user_id, $post_id)
    {
        $qry = "Delete FROM likes WHERE user_id = $user_id AND post_id = $post_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }
    public static function All_likes($post_id)
    {
        $qry = "SELECT * FROM likes WHERE post_id = $post_id ";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public static function mylike($post_id, $user_id)
    {
        $qry = "SELECT * FROM likes WHERE post_id = $post_id AND user_id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public static function getUser($user_id)
    {
        $qry = "SELECT * FROM users WHERE id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
}












class Admin extends User
{
    public $role = "admin";
    function all_users()
    {
        $qry = "SELECT * FROM USERS ORDER BY CREATED_AT";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($connect);
        return $data;
    }
    public function get_user_posts_count($user_id)
    {
        $qry = "SELECT COUNT(*) FROM posts WHERE user_id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $count = mysqli_fetch_column($rslt);
        mysqli_close($connect);
        return $count;
    }

    public function get_user_comments_count($user_id)
    {
        $qry = "SELECT COUNT(*) FROM comments WHERE user_id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $count = mysqli_fetch_column($rslt);
        mysqli_close($connect);
        return $count;
    }
    public function get_all_likes_count($user_id)
    {
        $qry = "SELECT COUNT(*) FROM likes Where user_id=$user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $count = mysqli_fetch_column($rslt);
        mysqli_close($connect);
        return $count;
    }
    public function get_all_users_count()
    {
        $qry = "SELECT COUNT(*) FROM users";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        $count = mysqli_fetch_column($rslt);
        mysqli_close($connect);
        return $count;
    }
    function delete_account($user_id)
    {
        if ($user_id === null) {
            throw new InvalidArgumentException("User ID cannot be null");
        }
        $qry = "DELETE FROM USERS WHERE id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }

    public function ban_user($user_id)
    {
        $qry = "UPDATE USERS SET is_banned = 1 WHERE id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }

    public function unban_user($user_id)
    {
        $qry = "UPDATE USERS SET is_banned = 0 WHERE id = $user_id";
        require_once ('configration.php');
        $connect = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($connect, $qry);
        mysqli_close($connect);
        return $rslt;
    }
}
