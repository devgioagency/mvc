$(document).ready(function() {

    $("#entrydate").datepicker();

    checkMailingType();
    if(fieldValidation()) {


    }

});

var checkMailingType = function () {

    $('div.mailing input:radio[name=mailingtype]').click(function () {

        var $value = $(this).val();

        if($value == 'letter') {

            $('div.letter').show();
            $('div.package').hide();
        }
        else {
            $('div.letter').hide();
            $('div.package').show();
        }
    })
}


var getMailingType = function () {

    var $value = $('div.mailing input:radio[name=mailingtype]:checked').val();

    return $value;
}

var doPost = function (data) {

    $.ajax({
        data:data,
        method:'post',
        url:'index.php?c=Sending&a=index',
        success: function(data) {
            console.log(data);
        }
    });
}

var fieldValidation = function () {

    $('.formmailing').submit(function(e) {

        e.preventDefault();

       var fields = getFields();

        if(fields.firstname.length == 0 || fields.lastname.length == 0 ||
            fields.entrydate.length == 0)
        {

            return false;
        }

        else {
            doPost(getFields());
        }


    });

}

var getFields = function () {

    var fields = {

        firstname: $('#firstname').val(),
        lastname:  $('#lastname').val(),
        entrydate: $('#entrydate').val(),
        mailingtype: getMailingType(),
        ajax:1

    };

    return fields;
}