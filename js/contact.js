$(function() {
	var $positionRond = $(".cercleCGIrougeSubmit").css('left');
	$( ".cercleCGIrougeSubmit" ).draggable({ 
		cursor:"grab",
		axis: "x" ,
		revert: "invalid",
		containment: "parent",
		// start: function() {
		//     submitMessage( $positionRond );
		// }

	});

	$( ".cercleCGIrougeSubmitValid" ).droppable({
		activeClass: "ui-state-default",
		hoverClass: "ui-state-hover",
		drop: function( event, ui ) {
		   	$(".submitSucess").fadeIn(500);
		    	//ajout du code PHP pour l'envoi d'un mail
		}
	});
});




$(document).ready(function(){
    $(".cercleCGIrouge").fadeIn(500);
    $(".cercleCGIorange").fadeIn(500, function(){
    	$(".connecteurinclineRouge").animate({width: '25px'}, "slow", function(){
    		$(".connecteurRouge").animate({width: '190px'}, "slow", function() {
    			$(".connecteurinclineOrange").animate({width: '25px'}, "slow", function() {
    				$(".connecteurOrange").animate({width: '190px'}, "slow", function() {
    					$(".cercleCGIjauneL").fadeIn(500);
    					$(".cercleCGIjauneR").fadeIn(500, function(){
    						$(".connecteurJauneTL").animate({width: '70px'});
    						$(".connecteurJauneBL").animate({width: '70px'});
    						$(".connecteurJauneBR").animate({width: '70px'});
    						$(".connecteurJauneTR").animate({width: '70px'}, function() {
    							$(".connecteurinclineJauneTL").animate({width: '25px'});
    							$(".connecteurinclineJauneBL").animate({width: '25px'});
    							$(".connecteurinclineJauneTR").animate({width: '25px'});
    							$(".connecteurinclineJauneBR").animate({width: '25px'}, function() {
    								$(".connecteurJauneB1").animate({width: '156px'});
    								$(".connecteurJauneB2").animate({width: '156px'});
    								$(".connecteurJauneT1").animate({width: '156px'});
    								$(".connecteurJauneT2").animate({width: '156px'});
    							});
    						});
    					});
    				});
    			});	
    		});	
    	 });
    });
});


$(function(){
    var nom        = $("#nom").val();
    var objet      = $("#objet").val();
    var email      = // trouver un moyen de récupérer le mail
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
                $("#formcontact").html("<p>Formulaire bien envoyé</p>");
                //$(".submitSucess").fadeIn(500);
            },
            error: function() {
                $("#formcontact").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
            }
        });
    }
    
	return false;
});
