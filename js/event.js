$(function (e) {
    $('.listeEvent').each(function (index, value) {
        value.addEventListener('click', function (e) {
            changePage({'controller':'event', 'action':'read', 'id':value.getAttribute('id')}, "Event/Read")
        })
    })
    
    $('#createEvent').on('click', function (e) {
            changePage({'controller':'event', 'action':'create'}, "Event/Create")
    })
    
    $('input#date.mdc-text-field__input').on('blur', function(e){
		$('#divDate label').addClass("mdc-floating-label--float-above")
	})
 
	$('#createEventForm').submit(function (e) {
		e.preventDefault()
        get = $('#createEventForm').attr('action').split('?')[1]
        post = ''
        $("#createEventForm input").each(function (index, val) {
            if (val.getAttribute('type') === 'checkbox' && val.checked) {
                post += val.getAttribute('name') + "=on"
            } else if (val.getAttribute('type') !== 'checkbox' && val.getAttribute('name') != null) {
                post += val.getAttribute('name') + "=" + val.value + "&"
            }
        })
        $.ajax({
            url: "http://localhost/Web/index.php?" + get,
            type: "POST",
            data: post,
            beforeSend: function () {
                $("#content").toggleClass('loading');
                $("#createEventForm input").each(function (index, value) {
                    value.setAttribute('disabled', 'true')
                })
            },
            success: function (result) {
                $("#content").toggleClass('loading');
                try {
                    error = JSON.parse(result)
                    $('#alreadyExist').html(error[0]).addClass('erreur')
                    $('#login_id').css('border', 'solid 1px red')
                    $("#createEventForm input").each(function (index, value) {
                        value.removeAttribute('disabled')
                    })
                } catch(e) {
                    $("#content").html(result);
                }
            }
        });
		
	})
})