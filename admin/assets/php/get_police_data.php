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
        $stmt = $conn->prepare("SELECT  DISTINCT c.pin_code, c.district_id, c.state_id FROM police_stations s JOIN districts d ON s.district_id = d.district_id JOIN cities c ON d.district_id = c.district_id WHERE s.id = $station_id ORDER BY c.pin_code ASC");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $pincode = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($pincode);
    }else {
        $stmt = $conn->prepare("SELECT * FROM police_stations");
        $stmt->execute();
        $stations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($stations);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>