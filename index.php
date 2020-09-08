<?php
$name =  isset($_POST['name']) ? $_POST['name']: '';
$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number']: '';
$Address = isset($_POST['Address']) ?  $_POST['Address']: '';
$email = isset($_POST['email']) ? $_POST['email']:'';
$product = isset($_POST['product']) ? $_POST['product']: '';
$quantity =  isset($_POST['quantity']) ? $_POST['quantity']: '';
$payment_methode  = isset($_POST['payment_methode']) ? $_POST['payment_methode']: '';

// Create connection
$conn = new mysqli ('localhost:3307','root','','customer');
if ($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
$stmt = $conn->prepare("insert into customer1 (name, mobile_number, Address, email, product, quantity, payment_methode )
values ('?','?','?','?','?','?','?')");
$stmt->bind_param("sisssis" ,$name, $mobile_number, $Address, $email, $product, $quantity, $payment_methode);
$stmt ->execute();
echo "New record is inserted sucessfully";
$stmt ->close();
$conn->close();
}
?>