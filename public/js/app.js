// dzialanie zapisow na szczepionke
let hospital = '';

$('#vaccine-city').change(function () {
    $.ajax({
        url: "/ajax/vaccine/" + $(this).val(),
      }).done(function(result) {
        let res = JSON.parse(result);
        if (res.view) {
            $('#vaccine-hospital').html(res.view);
            $('#vaccine-hospital').prop('disabled', false);
        }
    });
});

$('#vaccine-hospital').change(function () {
    hospital = $(this).val();
    $.ajax({
        url: "/ajax/vaccine/city/" + $(this).val(),
      }).done(function(result) {
        let res = JSON.parse(result);

        if (res.info) {
            $('#vaccine-hospital-info').html(res.info);
        }

        if (res.calendar) {
            $('.register-table').html(res.calendar);
        }
    });

});

function registerUser(hour, date) {
    let url = "/zapisy/zapisz/" + hospital + '?hour=' + hour + '&date=' + date;

    window.location = url;
}

