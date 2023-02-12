<?php
// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Get the campaign ID
$campaign_id = mysqli_real_escape_string($db, $_GET['campaign_id']);

// Get the comments for the campaign
$query = "SELECT * FROM comments WHERE campaign_id='$campaign_id' ORDER BY created_at DESC";
$result = mysqli_query($db, $query);

// Show the comments
echo '<h2>Comments</h2>';
while ($comment = mysqli_fetch_assoc($result)) {
    echo '<p><strong>' . $comment['username'] . '</strong> (' . $comment['created_at'] . '): ' . $comment['text'] . '</p>';
}

// Show the comment form
echo '<h2>Leave a comment</h2>';
echo '<form action="process_comment.php" method="post">';
echo '<input type="hidden" name="campaign_id" value="' . $campaign_id . '">';
echo '<input type="text" name="username" placeholder="Your name">';
echo '<textarea name="text" placeholder="Your comment"></textarea>';
echo '<input type="submit" value="Submit">';
echo '</form>';
?>
