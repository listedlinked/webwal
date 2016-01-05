<?php
session_start();

define("WITHDRAWALS_ENABLED", true); //Disable withdrawals during maintenance

include('jsonRPCClient.php');
include('classes/Client.php');
include('classes/User.php');

// function by zelles to modify the number to bitcoin format ex. 0.00120000
function satoshitize($satoshitize) {
   return sprintf("%.8f", $satoshitize);
}

// function by zelles to trim trailing zeroes and decimal if need
function satoshitrim($satoshitrim) {
   return rtrim(rtrim($satoshitrim, "0"), ".");
}

$server_url = "/";  // website url

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "piwallet";

$rpc_host = "localhost";
$rpc_port = "8332";
$rpc_user = "bitcoinrpc";
$rpc_pass = "Cp68nBkCAADKkskaKSskaDKdmSYLtLJ";

$fullname = "Martexcoin"; //Website Title (Do Not include 'wallet')
$short = "MXT"; //Coin Short (BTC)
$blockchain_url = "http://blockchain.info/tx/"; //Blockchain Url
$support = "suporte@martexcoin.org"; //Your support eMail
$hide_ids = array(1); //Hide account from admin dashboard
$donation_address = "13jy6rHB7HMgQBoYxQQXSM7TFTZZ6CDAAZ"; //Donation Address
?>
