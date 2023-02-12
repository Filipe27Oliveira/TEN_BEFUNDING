<?php
// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Get the campaign ID and reward ID
$campaign_id = mysqli_real_escape_string($db, $_GET['campaign_id']);
$reward_id = mysqli_real_escape_string($db, $_GET['reward_id']);

// Get the reward information
$query = "SELECT * FROM rewards WHERE campaign_id='$campaign_id' AND id='$reward_id'";
$result = mysqli_query($db, $query);
$reward = mysqli_fetch_assoc($result);

// Show the reward information
echo '<h2>' . $reward['name'] . '</h2>';
echo '<p>' . $reward['description'] . '</p>';
echo '<p>Minimum contribution: $' . $reward['minimum_amount'] . '</p>';

// Show the contribution form
echo '<form action="process_contribution.php" method="post">';
echo '<input type="hidden" name="campaign_id" value="' . $campaign_id . '">';
echo '<input type="hidden" name="reward_id" value="' . $reward_id . '">';
echo '<input type="text" name="amount" value="' . $reward['minimum_amount'] . '">';
echo '<input type="submit" value="Contribute">';
echo '</form>';
?>
