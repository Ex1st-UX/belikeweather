
$('#date_form').on('submit', function (e) {
    e.preventDefault();

    var data = {
        city: $('#city').val(),
        date: $('#date').val()
    };

    $.ajax({
        url: '/core/http/ajax/Weather.php',
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