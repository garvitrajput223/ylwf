<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "ylwf";
 
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     } 

    //GETTING STATES, DISTRICTS, CITY DATA FROM DATABASE
	if (isset($_GET["state_id"])) {
        $state_id = $_GET['state_id'];
        $state_name = $_GET['state_name'];
        $sql = "SELECT district_id, district_name FROM sorted_table WHERE state_id = $state_id";
        $result = $conn->query($sql);

        $districts = array();
        while($row = $result->fetch_assoc()) {
            $districts[] = $row;
        }

        echo json_encode($districts);
    }
    else if (isset($_GET["district_id"])) {
        $district_id = $_GET['district_id'];
        $sql = "SELECT city_id, city_name FROM cities WHERE district_id = $district_id ";
        $result = $conn->query($sql);

        $cities = array();
        while($row = $result->fetch_assoc()) {
            $cities[] = $row;
        }

        echo json_encode($cities);
    }
    else {
        $sql = "SELECT state_id, state_name FROM states";
        $result = $conn->query($sql);

        $states = array();
        while($row = $result->fetch_assoc()) {
            $states[] = $row;
        }

        echo json_encode($states);
    }
?>