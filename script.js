function getWeather() {
    let location = document.getElementById("locationInput").value;
    let apiKey = "358b5f91563b4366984102840250702"; // Your API key
    let apiUrl = `http://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${location}&aqi=no`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            let temperature = data.current.temp_c;
            document.getElementById("weatherResult").innerHTML = 
                `The temperature in ${location} is ${temperature}°C`;
        })
        .catch(error => {
            document.getElementById("weatherResult").innerHTML = "City not found!";
        });
}
