<?php
$servername = "localhost";
$username = "root";
$password = "*****";
$dbname = "contactsphp";


class Contact {
            public $name;
            public $age;
            public $number;
            public $email;
            
            // Assigning the values
            public function __construct($name, $age, $number, $email) {
              $this->name = $name;
              $this->age = $age;
              $this->number = $number;
              $this->email = $email;
            }
}
$arrayOfContacts = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM reg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$contact = new Contact($row["name"],$row["age"],$row["number"],$row["email"]);
    	
  		
    	
       /* echo "Name: " . $row["name"]." " ;
    	echo "Age: " . $row["age"]." " ;
    	echo "Number: " . $row["number"]." " ;
    	echo "Email: " . $row["email"]."\n" ;*/
    	array_push($arrayOfContacts,$contact);
    }
} else {
    echo "0 results";
}
//print_r($arrayOfContacts); print entire array
echo json_encode($arrayOfContacts);
$conn->close();

?>