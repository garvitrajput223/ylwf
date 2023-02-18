<?php
$host = "localhost";
$db_name = "ylwf";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['state_id'])) {
        $state_id = $_GET['state_id'];
        $stmt = $conn->prepare("SELECT district_id, district_name FROM districts WHERE state_id = :state_id");
        $stmt->bindParam(':state_id', $state_id);
        $stmt->execute();
        $districts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($districts);
    } elseif (isset($_GET['district_id'])) {
        $district_id = $_GET['district_id'];
        $stmt = $conn->prepare("SELECT * FROM cities WHERE district_id = :district_id");
        $stmt->bindParam(':district_id', $district_id);
        $stmt->execute();
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($cities);
    } else {
        $stmt = $conn->prepare("SELECT state_id, state_name FROM states");
        $stmt->execute();
        $states = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($states);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
