<?php
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'user', 'password', 'database');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

// Check if the user is making a payment
if (isset($_POST['pay'])) {
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $campaign_id = mysqli_real_escape_string($db, $_POST['campaign_id']);
  $username = $_SESSION['username'];

  // Use PayPal API to process the payment
  // Set the environment and credentials
  $environment = 'sandbox'; // or 'production'
  $clientId = 'your_client_id';
  $clientSecret = 'your_client_secret';

  // Create a new PayPal REST API client
  $client = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      $clientId,
      $clientSecret
    )
  );
  $client->setConfig(
    array(
      'mode' => $environment,
    )
  );

  // Define the payment details
  $payment = new \PayPal\Api\Payment();
  $transaction = new \PayPal\Api\Transaction();
  $amount = new \PayPal\Api\Amount();
  $details = new \PayPal\Api\Details();
  
  $details->setShipping(0)
    ->setTax(0)
    ->setSubtotal($amount);
  
  $amount->setCurrency('USD');
  $amount->setTotal($amount);
  $amount->setDetails($details);
  $transaction->setAmount($amount);
  $payment->setIntent('sale');
  $payment->setPayer($payer);
  $payment->setTransactions(array($transaction));

  // Create the payment
  try {
    $payment->create($client);
  } catch (\PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
  } catch (Exception $ex) {
    die($ex);
  }

  // Get the payment ID
  $payment_id = $payment->getId();

  // Insert the payment into the database
  $query = "INSERT INTO payments (amount, campaign_id, username, payment_id) VALUES ('$amount', '$campaign_id', '$username', '$payment_id')";
  mysqli_query($db, $query);

  // Update the campaign's total raised in the database
  $query = "UPDATE campaigns SET raised=raised+'$amount' WHERE id='$campaign_id'";
  mysqli_query($db, $query);
  header('location: dashboard.php');
}
?>
