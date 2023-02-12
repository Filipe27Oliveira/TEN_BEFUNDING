<?php
// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Get the contribution data
$campaign_id = mysqli_real_escape_string($db, $_POST['campaign_id']);
$reward_id = mysqli_real_escape_string($db, $_POST['reward_id']);
$amount = mysqli_real_escape_string($db, $_POST['amount']);
$created_at = date('Y-m-d H:i:s');

// Insert the contribution into the database
$query = "INSERT INTO contributions (campaign_id, reward_id, amount, created_at) VALUES ('$campaign_id', '$reward_id', '$amount', '$created_at')";
mysqli_query($db, $query);

// Redirect back to the campaign page
header('Location: campaign.php?id=' . $campaign_id);
exit;
?>
