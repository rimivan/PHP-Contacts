<?php
$servername = "localhost";
$username = "root";
$password = "****";
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

            public function getName(){
            	return $this->name;
            }

            public function getAge(){
            	return $this->age;
            }

            public function getNumber(){
            	return $this->number;
            }

            public function getEmail(){
            	return $this->email;
            }
}

$contactToInsertInDb = new Contact($_POST["name"],$_POST["age"],$_POST["number"],$_POST["email"]);
$nameToInsert = $contactToInsertInDb->getName();
$ageToInsert = $contactToInsertInDb->getAge();
$numberToInsert = $contactToInsertInDb->getNumber();
$emailToInsert = $contactToInsertInDb->getEmail();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO reg (name,age,number,email)
VALUES ('$nameToInsert', '$ageToInsert', '$numberToInsert','$emailToInsert')";

if ($conn->query($sql) === TRUE) {
    echo json_encode($contactToInsertInDb);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>