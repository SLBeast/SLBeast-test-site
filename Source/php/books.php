<?php

$id = 001;
$name = "";
$author = "";


$conn = new mysqli('localhost', 'kasun', 'kasun123', 'radiant_book_store');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. "  Name: " . $row["name"]. "  Author " . $row["author"]. "  Price: " . $row["price"]. "  Image :" . $row["img_url"]. "  Category:" .$row["category"] ,"<br>";
    }
  } else {
    echo "0 results";
  }



    $conn->close();
?>