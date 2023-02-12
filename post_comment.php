<?php
// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Get the comment data
$campaign_id = mysqli_real_escape_string($db, $_POST['campaign_id']);
$text = mysqli_real_escape_string($db, $_POST['text']);
$author = mysqli_real_escape_string($db, $_POST['author']);
$created_at = date('Y-m-d H:i:s');

// Insert the comment into the database
$query = "INSERT INTO comments (campaign_id, text, author, created_at) VALUES ('$campaign_id', '$text', '$author', '$created_at')";
mysqli_query($db, $query);

// Redirect back to the campaign page
header('Location: campaign.php?id=' . $campaign_id);
exit;
?>