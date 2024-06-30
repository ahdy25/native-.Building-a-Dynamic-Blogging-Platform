<?php
session_start();
require_once('../../configration.php');
require_once('../../classes.php');

$post_id = $_POST['post_id'];
$user_id = $_SESSION['user_id'];

$check_like = $db->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
$check_like->execute([$user_id, $post_id]);
$like = $check_like->fetch();

if ($like) {
    $update_like = $db->prepare("UPDATE likes SET is_liked = NOT is_liked WHERE user_id = ? AND post_id = ?");
    $update_like->execute([$user_id, $post_id]);
} else {
    $insert_like = $db->prepare("INSERT INTO likes (user_id, post_id, is_liked) VALUES (?, ?, 1)");
    $insert_like->execute([$user_id, $post_id]);
}

$count_likes = $db->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ? AND is_liked = 1");
$count_likes->execute([$post_id]);
$like_count = $count_likes->fetchColumn();

echo json_encode(['like_count' => $like_count, 'is_liked' => $like && !$like['is_liked']]);
?>
