<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'kasun', 'kasun123', 'radiant_book_store');



if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}
else {
    $stml = $conn->prepare("insert into messages(name, email, messages) values(?,?,?)");
    $stml->bind_param("sss",$name, $email, $message);
    $stml->execute();
    echo " <script>alert('Your message has been succsessfully receved '); document.location='../contactus.html'</script>";
    $stml->close();
    $conn->close();
}

?>