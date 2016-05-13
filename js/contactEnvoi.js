$(function(){
    var nom        = $("#nom").val();
    var objet      = $("#objet").val();
    var email      = // trouver un moyen de récupérer le mail <?php global $user; $user->mail ?>
    var msg        = $("#msg").val();
    var dataString = nom + sujet + email + msg;
    var msg_all    = "Merci de remplir tous les champs";
    var msg_alert  = "Merci de remplir ce champs";
    if (dataString  == "") {
        $("#msg_all").html(msg_all);
    } else if (nom == "") {
        $("#msg_nom").html(msg_alert);
    } else if (sujet == "") {
        $("#msg_sujet").html(msg_alert);
    } else if (msg == "") {
        $("#msg_message").html(msg_alert);
    } else {
        $.ajax({
            type : "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success : function() {
                $(".submitSucess").fadeIn(500);
            },
            error: function() {
                $("#formcontact").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
            }
        });
    }
    return false;
});
