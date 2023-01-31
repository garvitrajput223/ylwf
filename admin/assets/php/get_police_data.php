<?php
$host = "localhost";
$db_name = "ylwf";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $station_id = $_GET['id'];
        $stmt = $conn->prepare("SELECT cities.*
                                FROM police_stations
                                JOIN cities ON police_stations.state_id = cities.state_id
                                AND police_stations.district_id = cities.district_id
                                WHERE police_stations.id = :id;
                             ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $pincode = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($pincode);
    }else {
        $stmt = $conn->prepare("SELECT id, name FROM police_stations");
        $stmt->execute();
        $stations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($stations);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
