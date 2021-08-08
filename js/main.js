// AJAX for search weather
$('#date_form').on('submit', function (e) {
    e.preventDefault();

    var data = {
        city: $('#city').val(),
        date: $('#date').val()
    };

    $.ajax({
        url: '/core/http/ajax/SearchWeather.php',
        method: 'POST',
        dataType: 'JSON',
        data: data,
        success: function () {
            console.log('sucess');
        },
        error: function () {
            console.log('error');
        }
    });
});

// AJAX for user weather
$(document).ready(function () {
    $.ajax({
        url: 'core/http/ajax/GetUserWeather.php',
        method: 'POST',
        dataType: 'JSON',
        data: {},
        success: function (response) {

            console.log(response);

            $('<div id="user_city_wrapper" class="card user-city-wrapper col-md-8">' +
                '<div class="card-body">' +
                '<h4 class="card-title user-weather-title">Weather in ' + response.city + '</h4>' +
                '<p class="card-text">Time now ' + response.time + '</p>' +
                '<div class="user-weather-entry">' +
                '<span class="weather-temp">' + response.weather.temp + '&#176;</span>' +
                '<span class="weather-icon-wrapper"><img class="weather-icon-image"' +
                'src="' + response.images.icon + '"></span>' +
                '<div>' +
                '<span class="weather-status">' + response.weather.weather_status + '</span>' +
                '<br>' +
                '<span class="feels-like">Feels like ' + response.weather.feels_like_temp + '&#176;</span>' +
                '</div>' +
                '<div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>').appendTo('#user_weather');

            $('#user_city_wrapper').attr('style', 'background-image: url(' + response.images.background + ')');
        },
        error: function () {
            console.log('error');
        }
    });
});