<?php
$servername = "localhost";//Change if need
$username = "root";//Your Database username
$password = "";//Your Database password
$dbname = "weather_db";
//check connection
if ($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
}
//Fetch last 5 searches
$sql = "SELECT location, searched_at FROM search_history ORDER BY searched_at DESC LIMIT 5";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
</head>
<body>
    <div class="weather-containear">
        <h1>Weather App</h1>
        <input type="text" Id="locationInput" placeholder="Enter city name....">
        <button onclick="getWeather()">Get Weather</button>
        <div id="WeatherRasult"></div>
        <h3>Recent Search</h3>
        <ul>
<?php
 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["location"] . " - " . $row["searched_at"] . "</li>";
    }
} else {
    echo "<li>No recent searches</li>";
}
?>
        </ul>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>