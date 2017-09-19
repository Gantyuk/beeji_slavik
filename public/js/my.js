$(document).ready(function () {
    $(".fancybox").fancybox();
    var img_load = null;

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function getHtml(response) {
        var html = '', status = '';
        $.each(response, function (i, v) {
            if (v['status'] == null) {
                status = "<span class=\"label label-danger\">Не виконано</span>";
            } else {
                status = "<span class=\"label label-success\">Виконано</span>";
            }
            html += "<tr><td>" + status + "</td><td>" + v['name'] + " </td> <td>" + v['e-mail'] +
                "</td><td>" + v['Date_create'] + "</td><td><a href=\"#edit" + v['id'] + "\" class=\"fancybox\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a> " +
                "<a href=\"#viev" + v['id'] + "\" class=\"fancybox\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></a>" +
                "<a href=\"/admin?do=" + v['id'] + "\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td></tr>";
        });
        return html;
    }
function validation( buton) {
    var regular = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if ($('#name').val().length > 0) {
        $('#name2').text($('#name').val());
        $('#name').removeClass('alert alert-danger');
        if (regular.test($('#email').val())) {
            $('#email2').text('Eмаіл: ' + $('#email').val());
            $('#email').removeClass("alert alert-danger");
            if ($('#text').val().length > 0) {
                $('#text2').text($('#text').val());
                $('#text').removeClass("alert alert-danger");
                if (img_load == 1) {
                    $("#img").removeClass("btn-danger");
                    buton.click();
                } else {
                    $("#img").addClass("btn-danger");
                }
            } else {
                $('#text').addClass("alert alert-danger");
            }
        } else {
            $('#email').addClass("alert alert-danger");
        }
    } else {
        $('#name').addClass('alert alert-danger');
    }
}
    $('#real_send').click(function (){validation($('#real_send_notvisible'))});
    $('#prewiew_visible').click(function (){validation($('#prewiew'))});
    $("#imgInput").change(function () {
        readURL(this);
        img_load = 1;
    });
    $('#prewiew').click(function () {
        $('#real_send').removeClass('disabled');
    });
    $('#name_search').on('keyup', function () {
        $.ajax({
            type: "get",
            url: '/admin/search',
            data: {
                search: $(this).val(),
                field: 'name'
            }
        }).done(function (data) {
            var response = jQuery.parseJSON(data);
            $('tbody').html(getHtml(response));
            $(".fancybox").fancybox();
        });
    });
    $('#email_search').on('keyup', function () {
        $.ajax({
            type: "get",
            url: '/admin/search',
            data: {
                search: $(this).val(),
                field: 'e-mail'
            }
        }).done(function (data) {
            var response = jQuery.parseJSON(data);
            $('tbody').html(getHtml(response));
            $(".fancybox").fancybox();
        });
    });
    $('#date_search').on('keyup', function () {
        $.ajax({
            type: "get",
            url: '/admin/search',
            data: {
                search: $(this).val(),
                field: 'Date_create'
            }
        }).done(function (data) {
            var response = jQuery.parseJSON(data);
            $('tbody').html(getHtml(response));
            $(".fancybox").fancybox();
        });
    });
});