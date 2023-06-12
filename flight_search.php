<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $departure_airport = $_POST["departure_airport"];
  $arrival_airport = $_POST["arrival_airport"];
  $departure_date = $_POST["departure_date"];
  $number_of_passengers = $_POST["number_of_passengers"];
  // Get the list of flights from the API
  $flights = get_flights($departure_airport, $arrival_airport, $departure_date, $number_of_passengers);
  // Display the list of flights to the user
  echo "<ul>";
  foreach ($flights as $flight) {
    echo "<li>";
    echo "<strong>Flight number:</strong> " . $flight["flight_number"];
    echo "<br>";
    echo "<strong>Departure airport:</strong> " . $flight["departure_airport"];
    echo "<br>";
    echo "<strong>Arrival airport:</strong> " . $flight["arrival_airport"];
    echo "<br>";
    echo "<strong>Departure date:</strong> " . $flight["departure_date"];
    echo "<br>";
    echo "<strong>Price:</strong> $" . $flight["price"];
    echo "</li>";
  }
  echo "</ul>";
}
function get_flights($departure_airport, $arrival_airport, $departure_date, $number_of_passengers) {
  // Get the API key from the environment variable
  $api_key = getenv("FLIGHT_API_KEY");
  // Create the API request
  $url = "https://api.flights.com/v1/flights/search?departure_airport=" . $departure_airport . "&arrival_airport=" . $arrival_airport . "&departure_date=" . $departure_date . "&number_of_passengers=" . $number_