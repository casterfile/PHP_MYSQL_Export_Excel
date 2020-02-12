<?php
include("connection.php");

// sql to delete a record
// $sql = "DELETE FROM armtest WHERE armtest_Name ='john@example.com'";

$sql = "DELETE FROM armtest WHERE armtest_Name Like'%Temp%'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully <br/> <br/> <br/>";
} else {
    echo "Error deleting record: " . $conn->error;
}



//Random Generated String
$n=10; 
function getName($n) { 
    // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
  
$NameGenerated = "NM-".getName($n); 

//Adding Data to the database
$sql = "INSERT INTO armtest (armtest_Name)
VALUES ('$NameGenerated')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully  <br/> <br/> <br/>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//Listing the Data search
$sql = "SELECT armtest_ID, armtest_Name FROM armtest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["armtest_ID"]. " - Name: " . $row["armtest_Name"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "End of the list <br><br><br>";


// Searching a Data from the data
$sql = "SELECT armtest_ID, armtest_Name FROM armtest WHERE armtest_ID = 71";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["armtest_ID"]. " - Name: " . $row["armtest_Name"]. "<br>";
    }
} else {
    echo "0 results";
}

//export.php  
$conn->close();

?>

<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
</form>
