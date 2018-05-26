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
    let html="";
    if(admin){
        html+='<a id="users" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1" data-mdc-tabindex-handled="true"> <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i> Utilisateurs </a>'
    }
    html+='<a id="profil" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1" data-mdc-tabindex-handled="true"> <i class="material-icons mdc-list-item__graphic" aria-hidden="true">account_circle</i>Mon profil</a>';
    html+='<a id="logout" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1" data-mdc-tabindex-handled="true"> <i class="material-icons mdc-list-item__graphic" aria-hidden="true">power_off</i>Deconnexion</a>';
    $('#connexion').html(
        html
    );
    $('#logout').on('click', function (e) {
        changePage({'controller':'user', 'action':'deconnect'}, "Accueil")
        deconnected()
    });
    if(admin) {
        $('#users').on('click', function (e) {
            changePage({'controller':'user', 'action':'readAll'}, "User/ReadAll")
        });
    }
    $('#profil').on('click', function (e) {
        changePage({'controller':'user', 'action':'read', 'login':currentLogin}, "User/Read")
    })
}

function deconnected(){
    $('#connexion').html('<a id="login" class="mdc-list-item demo-drawer-list-item" tabindex="-1" data-mdc-tabindex="-1" data-mdc-tabindex-handled="true"> Connexion/Inscription </a>')

    $('#login').on('click', function (e) {
        changePage({'controller':'user', 'action':'connect'}, "User/Connect")
    })
}

$(function () {
    $('#users').on('click', function (e) {
        changePage({'controller':'user', 'action':'readAll'}, "User/ReadAll")
        drawer.open=false;
    })
    $('#profil').on('click', function (e) {
        changePage({'controller':'user', 'action':'read', 'login':currentLogin}, "User/Read")
        drawer.open=false;
    })
    $('#logout').on('click', function (e) {
        changePage({'controller':'user', 'action':'deconnect'}, "Accueil")
        drawer.open=false;
        deconnected()
    })
    $('#login').on('click', function (e) {
        changePage({'controller':'user', 'action':'connect'}, "User/Connect")
        drawer.open=false;
    })
    $('#accueilMenu').on('click', function (e) {
        changePage({'controller':'main', 'action':'accueil'}, "Accueil")
        drawer.open=false;
    })
    $('#proposMenu').on('click', function (e) {
        changePage({'controller':'main', 'action':'propos'}, "Propos")
        drawer.open=false;
    })
    $('#faqMenu').on('click', function (e) {
        changePage({'controller':'main', 'action':'faq'}, "Faq")
        drawer.open=false;
    })
    $('#eventPublic').on('click', function (e) {
        changePage({'controller':'event', 'action': 'readAll'}, "Evenement/ReadAll")
        drawer.open=false;
    })
    $('#createEvent').on('click', function (e) {
        changePage({"controller": "event", "action": "create"}, "Evenement/Create")
        drawer.open=false;
    })
});