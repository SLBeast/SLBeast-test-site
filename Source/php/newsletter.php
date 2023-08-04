<?php

$name = $_POST['name'];
$email = $_POST['email'];

$conn = new mysqli('localhost', 'kasun', 'kasun123', 'radiant_book_store');

if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}
else {
   
    $stml = $conn->prepare("select email from newsletter where email = ?");
    $stml->bind_param("s",$email);
    $stml->execute();

    $stml->store_result();
     $stml->bind_result($column1);
     $stml->fetch();

     if(empty($column1)) {
        $stml = $conn->prepare("insert into newsletter(name, email) values(?,?)");
    $stml->bind_param("ss",$name, $email);
    $stml->execute();
    echo "<script>alert('You succsessfully subcribed to our newsletter'); document.location='../../index.html'</script>"; 
        
    }
    else {
        echo "<script>alert('You are already subcribed to our newsletter'); document.location='../../index.html'</script>"; 
    }

     
  
   
    
    $stml->close();
    $conn->close();
 
   
}

?>