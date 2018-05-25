function changePage(queries, title){
    let url="/"+title
    let get=''
    $.each(queries, function(index, value) {
        get+=index+"="+value+"&"
        if(index!='controller' && index!='action')
            url+="/" + value.charAt(0).toUpperCase() + value.slice(1)

    });
    console.log()
    $.ajax({
        url: "http://localhost/Web/index.php?"+get,
        beforeSend: function(){
            $("#content").toggleClass('loading');
        },
        success: function(result){
            $("#content").toggleClass('loading');
            $("#content").html(result);
            history.pushState("", "", url);
        }
    });
}

function connected(login, admin){
    html="<div><p>Bienvenue "+login+"</p></div><div>"
    if(admin){
        html+='<a id="users" href="#">Users</a>'
    }
    $('#connexion').html(
        html+
        '<a id="profil" href="#">Mon Profil</a>'+
        '<a id="logout" href="#">Deconnexion</a>'+
        '</div>'
    )
    $('#logout').on('click', function (e) {
        changePage({'controller':'user', 'action':'deconnect'}, "Accueil")
        deconnected()
    })
    $('#users').on('click', function (e) {
        changePage({'controller':'user', 'action':'readAll'}, "ReadAll")
    })
    $('#profil').on('click', function (e) {
        changePage({'controller':'user', 'action':'read', 'login':currentLogin}, "Read")
    })
}

function deconnected(){
    $('#connexion').html(
        '<div></div><div>'+
        '<a id="login" href="#">Connexion</a>'+
        '<a id="signup" href="#">S\'inscrire</a>'+
        '</div>'
    )
    $('#login').on('click', function (e) {
        changePage({'controller':'user', 'action':'connect'}, "Connect")
    })
    $('#signup').on('click', function (e) {
        changePage({'controller':'user', 'action':'create'}, "Create")
    })
}

$(function () {
    $('#users').on('click', function (e) {
        changePage({'controller':'user', 'action':'readAll'}, "ReadAll")
    })
    $('#profil').on('click', function (e) {
        changePage({'controller':'user', 'action':'read', 'login':currentLogin}, "Read")
    })
    $('#logout').on('click', function (e) {
        changePage({'controller':'user', 'action':'deconnect'}, "Accueil")
        deconnected()
    })
    $('#login').on('click', function (e) {
        changePage({'controller':'user', 'action':'connect'}, "Connect")
    })
    $('#signup').on('click', function (e) {
        changePage({'controller':'user', 'action':'create'}, "Create")
    })
    $('#accueilMenu').on('click', function (e) {
        changePage({'controller':'main', 'action':'accueil'}, "Accueil")
    })
    $('#proposMenu').on('click', function (e) {
        changePage({'controller':'main', 'action':'propos'}, "Propos")
    })
    $('#faqMenu').on('click', function (e) {
        changePage({'controller':'main', 'action':'faq'}, "Faq")
    })
});