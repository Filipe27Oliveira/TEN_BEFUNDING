<?php
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

// Check if the user is creating a new campaign
if (isset($_POST['create'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $goal = mysqli_real_escape_string($db, $_POST['goal']);
  $username = $_SESSION['username'];

  // Insert the campaign into the database
  $query = "INSERT INTO campaigns (title, description, goal, username) VALUES ('$title', '$description', '$goal', '$username')";
  mysqli_query($db, $query);
  header('location: dashboard.php');
}

// Check if the user is editing a campaign
if (isset($_POST['edit'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $goal = mysqli_real_escape_string($db, $_POST['goal']);

  // Update the campaign in the database
  $query = "UPDATE campaigns SET title='$title', description='$description', goal='$goal' WHERE id='$id'";
  mysqli_query($db, $query);
  header('location: dashboard.php');
}

// Check if the user is deleting a campaign
if (isset($_GET['delete'])) {
  $id = mysqli_real_escape_string($db, $_GET['delete']);

  // Delete the campaign from the database
  $query = "DELETE FROM campaigns WHERE id='$id'";
  mysqli_query($db, $query);
  header('location: dashboard.php');
}

// Get the user's campaigns from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM campaigns WHERE username='$username'";
$campaigns = mysqli_query($db, $query);
?>
