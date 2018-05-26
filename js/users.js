$(function (e) {
    $('#signupForm').submit(function (e) {
        e.preventDefault()
        erreur=false
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if (!pattern.test($('#mailsingup').val())) {
            $('#emailErreur').html('Veuillez entrer une adresse email valide')
            $('#emailErreur').addClass('erreur')
            $('#mailsingup').css('border', 'solid 1px red')
            erreur = true
        }
        if ($('#ippsignup').val() != $('#ippconfirmsignup').val()) {
            $('#mdpErreur').html('Les deux mots de passe sont différents')
            $('#mdpErreur').addClass('erreur')
            $('#ippsignup').css('border', 'solid 1px red')
            $('#ippconfirmsignup').css('border', 'solid 1px red')
            erreur = true
        }
        console.log(erreur);
        if(!erreur){
            get = $('#signupForm').attr('action').split('?')[1]
            post = ''
            $("#signupForm input").each(function (index, value) {
                if (value.getAttribute('type') == 'checkbox' && value.checked) {
                    post += value.getAttribute('name') + "=on"
                } else if (value.getAttribute('type') != 'checkbox' && value.getAttribute('name') != null) {
                    post += value.getAttribute('name') + "=" + $('#signupForm [name="' + value.getAttribute('name') + '"]').val() + "&"
                }
                console.log(value.getAttribute('name')+":"+$('#signupForm [name="' + value.getAttribute('name') + '"]').val())
            })
            $.ajax({
                url: "http://localhost/Web/index.php?" + get,
                type: "POST",
                data: post,
                beforeSend: function () {
                    $("#content").toggleClass('loading');
                    $("#signupForm input").each(function (index, value) {
                        value.setAttribute('disabled', 'true')
                    })
                },
                success: function (result) {
                    $("#content").toggleClass('loading');
                    try {
                        error = JSON.parse(result)
                        $('#alreadyExist').html(error[0])
                        $('#alreadyExist').addClass('erreur')
                        $('#login_id').css('border', 'solid 1px red')
                        $("#signupForm input").each(function (index, value) {
                            value.removeAttribute('disabled')
                        })
                    } catch(e) {
                        $("#content").html(result);
                    }
                }
            });
        }
    })

    $('#loginForm').submit(function (e) {
        e.preventDefault()
        erreur=false
        if(!erreur){
            get = $('#loginForm').attr('action').split('?')[1]
            post = ''
            $("#loginForm input").each(function (index, value) {
                if (value.getAttribute('type') == 'checkbox' && value.checked) {
                    post += value.getAttribute('name') + "=on"
                } else if (value.getAttribute('type') != 'checkbox' && value.getAttribute('name') != null) {
                    post += value.getAttribute('name') + "=" + $('#loginForm [name="' + value.getAttribute('name') + '"]').val() + "&"
                }
            })
            $.ajax({
                url: "http://localhost/Web/index.php?" + get,
                type: "POST",
                data: post,
                beforeSend: function () {
                    $("#content").toggleClass('loading');
                    $("#loginForm input").each(function (index, value) {
                        value.setAttribute('disabled', 'true')
                    })
                },
                success: function (result) {
                    $("#content").toggleClass('loading');
                    try {
                        error = JSON.parse(result)
                        $('#alreadyExist').html(error[0])
                        $('#alreadyExist').addClass('erreur')
                        $('#login_id').css('border', 'solid 1px red')
                        $("#loginForm input").each(function (index, value) {
                            value.removeAttribute('disabled')
                        })
                    } catch(e) {
                        $("#content").html(result);
                    }
                }
            });
        }
    })

    $('#deleteButton').on('click', function (e) {
        if (confirm('Etes-vous sûr de vouloir supprimer ce compte?')) {
            changePage({'controller':'user', 'action':'delete', 'login':profilLogin}, "Accueil")
            deconnected()
        }
    })
    $('#updateButton').on('click', function (e) {
        changePage({'controller':'user', 'action':'update', 'login':profilLogin}, "User/Update")
    })
    $('.listUsers').on('click', function f(e) {
        let action
        if(e.target.getAttribute('id').split('-')[0]=='delete'){
            action="Accueil"
        }else{
            action="/User/Read"
        }
        changePage({'controller':'user', 'action':e.target.getAttribute('id').split('-')[0], 'login':e.target.getAttribute('id').split('-')[1]}, action)
        if(e.target.getAttribute('id').split('-')[0]=='delete' && e.target.getAttribute('id').split('-')[1]==currentLogin){
            deconnected()
        }
    })
    $('#createUser').on('click', function (e) {
        changePage({'controller':'user', 'action':'create'}, "User/Create")
    })
})