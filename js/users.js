$(function (e) {
    $('.form').submit(function (e) {
        e.preventDefault()
        erreur=false
        if($('.form').attr('id')=='signupForm') {
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            if (!pattern.test($('#email_id').val())) {
                $('#emailErreur').html('Veuillez entrer une adresse email valide')
                $('#emailErreur').addClass('erreur')
                $('#email_id').css('border', 'solid 1px red')
                erreur = true
            }
            if ($('#mdp_id').val() != $('#mdp2_id').val()) {
                $('#mdpErreur').html('Les deux mots de passe sont différents')
                $('#mdpErreur').addClass('erreur')
                $('#mdp_id').css('border', 'solid 1px red')
                $('#mdp2_id').css('border', 'solid 1px red')
                erreur = true
            }
        }
        if(!erreur){
            get = $('.form').attr('action').split('?')[1]
            post = ''
            $(".form input").each(function (index, value) {
                if (value.getAttribute('type') == 'checkbox' && value.checked) {
                    post += value.getAttribute('name') + "=on"
                } else if (value.getAttribute('type') != 'checkbox' && value.getAttribute('name') != null) {
                    post += value.getAttribute('name') + "=" + $('[name="' + value.getAttribute('name') + '"]').val() + "&"
                }
            })
            $.ajax({
                url: "http://localhost/Web/index.php?" + get,
                type: "POST",
                data: post,
                beforeSend: function () {
                    $("#content").toggleClass('loading');
                    $(".form input").each(function (index, value) {
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
                        $(".form input").each(function (index, value) {
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
        changePage({'controller':'user', 'action':'update', 'login':profilLogin}, "Update")
    })
    $('.listUsers').on('click', function f(e) {
        let action
        if(e.target.getAttribute('id').split('-')[0]=='delete'){
            action="Accueil"
        }else{
            action="Read"
        }
        changePage({'controller':'user', 'action':e.target.getAttribute('id').split('-')[0], 'login':e.target.getAttribute('id').split('-')[1]}, action)
        if(e.target.getAttribute('id').split('-')[0]=='delete' && e.target.getAttribute('id').split('-')[1]==currentLogin){
            deconnected()
        }
    })
    $('#createUser').on('click', function (e) {
        changePage({'controller':'user', 'action':'create'}, "Create")
    })
})