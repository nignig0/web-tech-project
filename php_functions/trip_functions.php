<?php
include(__DIR__ . '/../db/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$baseDir = dirname(__DIR__); 

function createTrip($userId, $seats, $tripType,
 $destination, $meetUpSpot, $departureTime, $cost){
    global $conn;

    $statement = $conn->prepare('INSERT INTO mm_trips(userId, seats, tripType, destination, meetUpSpot, departureTime, cost, originalCost, originalSeats) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('isssssiii', $userId, $seats, $tripType,
    $destination, $meetUpSpot, $departureTime, $cost, $cost, $seats);

    //we need to keep track of the original cost and the original seats

    if($statement->execute()){
        header('Location: feed.php');
    }else{
        die('Error in creating trip');
    }

 }

function getTrips(){
    global $conn;
    $statement = $conn->prepare('SELECT * FROM mm_trips ORDER BY id DESC');
    
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->execute();
    $result = $statement->get_result();
    $trips = [];
    
    if(!empty($result)){
        while($row = $result->fetch_assoc()){
            $trips[] = $row;
        }
    }

    echo json_encode($trips);
 }

function getUserTrips(){
    global $conn;

    $userId = $_SESSION['id'];
    $statement = $conn->prepare('SELECT * FROM mm_user_trip_relation WHERE userId = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('s', $userId);
    $statment->execute();
    
    $result = $statement->get_result();
    $trips = [];
    
    if(!empty($result)){
        while($row = $result->fetch_assoc()){
            $trips[] = $row;
        }
    }

    echo json_encode($trips);
 }

function updateSeats($tripId, $factor){
    //factor can either be +1 or -1
    global $conn;

    $statement = $conn->prepare('UPDATE mm_trips SET seats = seats + ? WHERE id = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('is', $factor, $tripId);
    if(!$statement->execute()){
        die('Error updating trip seats');
    }

}

function getTrip($tripId){
    global $conn;
    $statement = $conn->prepare('SELECT * FROM mm_trips WHERE id = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }
    
    $statement->bind_param('s', $tripId);
    $statement->execute();
    $result = $statement->get_result();
    $trip = $result->fetch_assoc();

    return $trip;
}

function updateCost($tripId){
    //factor can either be +1 or -1
    global $conn;

    $trip = getTrip($tripId);
    $cost = $trip['originalCost']/($trip['originalSeats'] - $trip['seats']);

    $statement = $conn->prepare('UPDATE mm_trips SET cost = ? WHERE id = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('is', $cost, $tripId);
    if(!$statement->execute()){
        die('Error updating trip cost');
    }

}

function getSeats($tripId){
    global $conn;
    $statement = $conn->prepare('SELECT seats FROM mm_trips WHERE id = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }
    
    $statement->bind_param('s', $tripId);
    $statement->execute();
    $result = $statement->get_result();
    $seats = $result->fetch_assoc();

    return $seats;
}

function joinTrip($userId, $tripId){
    global $conn;

    $statement = $conn->prepare('SELECT FROM mm_user_trip_relation WHERE userId = ? AND tripId = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('ss', $userId, $tripId);
    $statement->execite();
    $result = $statement->get_result();

    if($result->num_rows > 0 ){
        die('User already in trip');
    }

    //check if there is space in the trip
    $seats = getSeats($tripId);

    if($seats == 0){
        die('Trip has no more space');
    }


    $statement = $conn->prepare('INSERT INTO mm_user_trip_relation (userId, tripId) VALUES (?, ?)');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_params('ss', $userId, $tripId);

    
    if($statement->execute()){
        updateSeats($tripId, -1);
        updateCost($trip);
        header('Location: feed.php');
    }else{
        die('Error joining trip');
    }
}

function leaveTrip($userId, $tripId){
    global $conn;

    $statement = $conn->prepare('SELECT FROM mm_user_trip_relation WHERE userId = ? AND tripId = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_param('ss', $userId, $tripId);
    $statement->execite();
    $result = $statement->get_result();

    if($result->num_rows == 0 ){
        die('Record does not exist');
    }


    $statement = $conn->prepare('DELETE FROM mm_user_trip_relation WHERE userId = ? AND tripId = ?');
    if(!$statement){
        die('Error in connection '. $conn->error);
    }

    $statement->bind_params('ss', $userId, $tripId);
    
    if($statement->execute()){
        updateSeats($tripId, 1);
        updateCost($trip);
        header('Location: feed.php');
    }else{
        die('Error leaving  trip');
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'getTrips') getTrips();

?>