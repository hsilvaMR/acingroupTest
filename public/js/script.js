$(function() {

    //alert("test ... js")

    // login v1
    $('#formLogin').on('submit', function(e) {
        var form = $(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            headers: { 'X-CSRF-Token': '{!! csrf_token() !!}' },
            success: function(data) {
                switch (data) {
                    case 'sucess':

                        if ($('#idRemeber').is(':checked')) {

                            localStorage.setItem('mail', $('#idFmail').val())
                            localStorage.setItem('password', $('#idFmail').val())
                        }
                        $('#formLogin')[0].reset();
                        // alert("login success")
                        var url = '/dashboard';
                        window.location.href = url
                        break;
                    case 'invalidLogin':
                        alert("credenciais invalido")
                            // $('#messageID').html("Credencias invalido");

                        break;
                    case 'invalidMail':
                        alert("email invalido")
                            // $('#messageID').html("Credencias invalido");
                        break;
                    case 'empty':
                        alert("campos vazios")
                            //$('#messageID').html("Credencias invalido");
                        break;
                }
            },
            error: function(jqXHR) {
                //  https://www.w3schools.com/js/js_ajax_http.asp

                var msg = "";
                if (jqXHR.status != null) {

                    msg = jqXHR.statusText;
                }
                if (jqXHR.readyState != null) {

                    msg = jqXHR.responseText;
                }
                alert(msg)
            }
        })
    });

    $(document).ready(function() {
        $('#table_id').DataTable();
    });

})

$(window).on('load', function() {

    if (localStorage.getItem("mail") != null && localStorage.getItem("mail") != "") {

        if (localStorage.getItem("password") != null && localStorage.getItem("password") != "") {

            var mail = localStorage.getItem("mail");
            var password = localStorage.getItem("password");

            // alert("cookie save -> mail :   " + mail + " |  pass " + password)

            $('#idFmail').val(mail);
            $('#idPassword').val(password);
        }


    }

});