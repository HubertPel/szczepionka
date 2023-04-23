// dzialanie zapisow na szczepionke
let hospital = '';
let week = '';

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

        if (res.date_start && res.date_end) {
            $('.week-select').show();
            $('#date-info').html(res.date_start + ' - ' + res.date_end);
        }

        if (res.week) {
            week = res.week;
        }
    });

});

function registerUser(hour, date) {
    let url = "/zapisy/zapisz/" + hospital + '?hour=' + hour + '&date=' + date;

    window.location = url;
}

$('.next-week').click(() => {
    hospital = $('#vaccine-hospital').val();
    $.ajax({
        url: "/ajax/vaccine/city/" + $('#vaccine-hospital').val() + "?week=" + (parseInt(week)+1),
      }).done(function(result) {
        let res = JSON.parse(result);

        if (res.info) {
            $('#vaccine-hospital-info').html(res.info);
        }

        if (res.calendar) {
            $('.register-table').html(res.calendar);
        }

        if (res.date_start && res.date_end) {
            $('.week-select').show();
            $('#date-info').html(res.date_start + ' - ' + res.date_end);
        }

        if (res.week) {
            week = res.week;
        }
    });
});

$('.previous-week').click(() => {
    hospital = $('#vaccine-hospital').val();
    $.ajax({
        url: "/ajax/vaccine/city/" + $('#vaccine-hospital').val() + "?week=" + (parseInt(week)-1),
      }).done(function(result) {
        let res = JSON.parse(result);

        if (res.info) {
            $('#vaccine-hospital-info').html(res.info);
        }

        if (res.calendar) {
            $('.register-table').html(res.calendar);
        }

        if (res.date_start && res.date_end) {
            $('.week-select').show();
            $('#date-info').html(res.date_start + ' - ' + res.date_end);
        }

        if (res.week) {
            week = res.week;
        }
    });
});

