$(document).ready(function() {
    $('#submit').attr('disabled', 'disabled');
    $('.inputVal').keyup(function() {
        var val = $(this).val();
        if (isNaN(val)) {
            val = val.replace(/[^0-9\.]/g, '');
            if (val.split('.').length > 2)
                val = val.replace(/\.+$/, "");
        }
        $(this).val(val);
    });

    $('select').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb1').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb1').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input1').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb2').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /^\d*?[a-zA-Z][a-zA-Z0-9\-]{1,}\d*$/i.test($("#input1").val());
            if (!pat) {
                $('#eb2').html("*Required");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb2').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input3').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb4').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb4').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input4').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb5').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb5').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input5').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb6').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /^\d?[a-zA-Z0-9#-]+?[a-zA-Z0-9][a-zA-Z0-9\-#]{1,}\d*$/i.test($("#input5").val());
            if (!pat) {
                $('#eb6').html("Only #,- allowed. Must contain 2 non-special characters !!");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb6').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input6').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb7').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb7').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input7').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb8').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        } else {
            $(this).css("border", "2px solid green");
            $('#eb8').html("");
            $("#submit").removeAttr('disabled');
        }
    });

    $('#input8').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb9').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input8").val());
            if (!pat) {
                $('#eb9').html("Only alphabetic/numeric values allowed.");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb9').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input9').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb10').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#input9").val());
            if (!pat) {
                $('#eb10').html("Only alphabetic/numeric values allowed.");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb10').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });

    $('#input10').blur(function() {
        var val = $(this).val();
        if (val == "") {
            $('#eb11').html("*Required");
            $(this).focus();
            $(this).css("border", "2px solid red");
            $('#submit').attr('disabled', 'disabled');
        }
        if (val) {
            var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input10").val());
            if (!pat) {
                $('#eb11').html("Only alphabetic/numeric values allowed.");
                $(this).focus();
                $(this).css("border", "2px solid red");
                $('#submit').attr('disabled', 'disabled');
            } else {
                $(this).css("border", "2px solid green");
                $('#eb11').html("");
                $("#submit").removeAttr('disabled');
            }
        }
    });
});