<?php

// Connect to the database
$host = 'localhost';
$db   = 'user_registration';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


if (isset($_POST['Email']) && isset($_POST['Password'])) {
    // Get the email and password from the form
    $email = $_POST['Email'];
    $password = $_POST['Password'];
}
// Insert the form data into the users table
$stmt = $pdo->prepare('INSERT INTO users (FirstName, LastName, Phone, Email, Address, City, State, ZipCode, Country, Gender, DOB, password) VALUES (:FirstName, :LastName, :Phone, :Email, :Address, :City, :State, :ZipCode, :Country, :Gender, :DOB , :password)');
$stmt->execute([
	'FirstName' => $_POST['FirstName'],
	'LastName' => $_POST['LastName'],
	'Phone' => $_POST['Phone'],
	'Email' => $_POST['Email'],
	'Address' => $_POST['Address'],
	'City' => $_POST['City'],
	'State' => $_POST['State'],
	'ZipCode' => $_POST['ZipCode'],
	'Country' => $_POST['Country'],
	'Gender' => $_POST['Gender'],
	'DOB' => $_POST['DOB'],
	'password' => $_POST['password'],
]);

// Redirect the user to a thank-you page
header('Location: thank-you.html');
exit;

?>