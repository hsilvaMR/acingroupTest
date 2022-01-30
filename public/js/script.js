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



    $('#btn-remov-cookie').on('click', function() {

        localStorage.removeItem('idDelet');
        $('#exampleModal').modal('hide');
        //alert("deletou o localstorage")
    })

    $('#btn-delet').on('click', function() {

        $('#exampleModal').modal('hide');

        var id = localStorage.getItem("idDelet")
        var url = '{{ route("deleteRecord", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
            type: "POST",
            url: url,
            success: function(data) {
                if (data == "sucess") {

                    alert("removido com sucesso")
                    var url = '/dashboard';
                    window.location.href = url
                } else {
                    alert(data)
                }
            }
        });

    })

    //  registar utilizador area de gestao 
    $('#formAddUser').on('submit', function(e) {
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

                var jsonRetorna = $.parseJSON(data);
                var sucess = jsonRetorna['success'];
                var error = jsonRetorna['error'];

                if (sucess == "success") {
                    alert("registado com sucesso")
                    $('#formAddUser')[0].reset();
                    var url = '/dashboard/users';
                    window.location.href = url
                } else {
                    switch (error) {
                        case "existe":
                            alert("o Utilizador já existe")
                            break;
                        default:
                            alert(error)
                            break;
                    }
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

function openModalDelete(id) {

    alert("id : " + id)
    localStorage.setItem("idDelet", id)
    $('#exampleModal').modal('show');

}