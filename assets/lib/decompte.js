// Refresh des decompte chaque seconde pour un changement en live

$(document).ready(function(){
    setInterval(ajaxcall, 100000);
    ajaxcall();

    function ajaxcall(){
        $.ajax({
            url: 'decompteur.php',
            method : "GET",
            success : function(data) {
                $(".capsule").html(data);
            },
            error : function(erreur){
            }
        });
    };

});