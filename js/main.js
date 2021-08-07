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
       success: function () {
           console.log('success');
       },
       error: function () {
           console.log('error');
       }
   }) ;
});