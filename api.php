<?php
define("IN_WALLET", true);
include('common.php');
$con=mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
$key = $_GET['key'];
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL. Make sure to edit the common.php file: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM users where secret = '$key' and authused=1");
while($row = mysqli_fetch_array($result))
  {
$id = $row['id'];
$username = $row['username'];
$pin = $row['supportpin'];
$twofactoren = $row['authused'];
$isadmin = $row['admin'];
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$apibal = $client->getBalance($username);
$addr = $client->getAddress($username);;
}
if ($isadmin == 1)
 {
 $ifadmin = "true"; }
 else {
$ifadmin = "false"; }
if ($twofactoren == 1)
{
$iftwofactor = "true"; }
else {
$iftwofactor = "false";}
echo json_encode(array("id" => "$id", "username" => "$username", "balance" => "$apibal", "addresses" => "$addr", "Support Pin" => "$pin", "Two Factor Enabled"=> "$iftwofactor", "admin" => "$ifadmin"));
?>

