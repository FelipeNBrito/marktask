$(document).ready( function () {
    $('.table-pattern').DataTable({
        language: {
            processing:     "Traitement en cours...",
            search:         "Filtrar&nbsp;:",
            info:           "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            infoEmpty:      "Sem registros para mostrar",
            // lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            // infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            // infoPostFix:    "",
            // loadingRecords: "Chargement en cours...",
            // zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Sem registros para mostrar",
            paginate: {
                first:      "Primeiro",
                previous:   "Anterior",
                next:       "Próximo",
                last:       "Último"
            },
            // aria: {
            //     sortAscending:  ": activer pour trier la colonne par ordre croissant",
            //     sortDescending: ": activer pour trier la colonne par ordre décroissant"
            // }
        }
    });
});