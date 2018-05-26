$(function (e) {
    $('.listeEvent').forEach(function (elem) {
        elem.on('click', function (e) {
            changePage({'controller':'event', 'action':'read', 'id':elem.getAttribute('id')}, "Evenement/Read")
        })
    })
    $('#createEvent').on('click', function (e) {
            changePage({'controller':'event', 'action':'create'}, "Evenement/Create")
        })
    })
})