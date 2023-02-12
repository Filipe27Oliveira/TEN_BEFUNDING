<?php
// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Get the campaign ID
$campaign_id = mysqli_real_escape_string($db, $_GET['id']);

// Get the comments for the campaign
$query = "SELECT * FROM comments WHERE campaign_id='$campaign_id' ORDER BY created_at DESC;
$comments = mysqli_query($db, $query);

// Display the comments
while ($comment = mysqli_fetch_assoc($comments)) {
echo '<div class="comment">';
echo '<p>' . $comment['text'] . '</p>';
echo '<p>By: ' . $comment['author'] . ' on ' . $comment['created_at'] . '</p>';
echo '</div>';
}

// Show the comment form
echo '<form action="post_comment.php" method="post">';
echo '<input type="hidden" name="campaign_id" value="' . $campaign_id . '">';
echo '<textarea name="text"></textarea>';
echo '<input type="text" name="author">';
echo '<input type="submit" value="Post Comment">';
echo '</form>';
?>