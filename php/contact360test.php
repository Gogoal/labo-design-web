<!DOCTYPE html>
<html>
	<head>
		<link href="../css/style.css" rel="stylesheet">
		<link rel="shortcut icon" href="../img/favicon360tv_0.png" type="image/png">
		<meta charset="utf-8" />

	</head>
	<body>

		<div class="panel">

						
			<div id="connecteur" class="positionconnecteurNameRouge">
				<div class="cercleCGIrouge"> </div>
				<div class="connecteurinclineRouge"></div>
				<div class="connecteurRouge"></div>
			</div>

			<div id="connecteur2" class="positionconnecteurObjectOrange">
				<div class="cercleCGIorange"> </div>
				<div class="connecteurinclineOrange"></div>
				<div class="connecteurOrange"></div>
			</div>

			<div id="connecteur3" class="positionconnecteurMessageJauneL">
				<div class="cercleCGIjauneL"> </div>
				<div class="connecteurinclineJauneTL"></div>
				<div class="connecteurinclineJauneBL"></div>
				<div class="connecteurJauneTL"></div>
				<div class="connecteurJauneBL"></div>
			</div>

			<div id="connecteur4" class="positionconnecteurMessageJauneR">
				<div class="cercleCGIjauneR"> </div>
				<div class="connecteurinclineJauneTR"></div>
				<div class="connecteurinclineJauneBR"></div>
				<div class="connecteurJauneTR"></div>
				<div class="connecteurJauneBR"></div>
			</div>

			<div class="barreconnecteurjauneT">
				<div class="connecteurJauneT1"></div>
				<div class="connecteurJauneT2"></div>
			</div>

			<div class="barreconnecteurjauneB">
				<div class="connecteurJauneB1"></div>
				<div class="connecteurJauneB2"></div>
			</div>

			<form id="formcontact" class="positionformConnection" action="processEnvoi.php" method="post">
			
				
				<p><input type="text" id="nom" name="nom" placeholder="Nom ..." required/><span id="msg_nom" class="msg_form"></span></p></br>
				
				<p><input type="text" id="objet "name="objet" placeholder="Objet ..."/><span id="msg_objet" class="msg_form"> </span></p></br>
				
				<textarea class="inputMessage1" rows="9" cols="40" id="msg" name="msg" placeholder="Message ..."></textarea></br></br>
				<span id="msg_msg" class="msg_form"></span></br>
				
				<div class="formHelp">
					<p>Déplace l'ADN à la fin de la ligne pour poster ton message :</p>
				</div>
				<div class="formSubmitDrag">
					<div class="submitLine"></div>
					<div class="cercleCGIrougeSubmit"></div>
					<div class="cercleCGIrougeSubmitValid"></div>
				</div>

				<div class="submitSucess">
					<img id="valide" src="../img/valide.png">
					<p class="messageValide">Message envoyé !</p>
				</div>

			</form>
			<span id="msg_all"></span> 

		</div>

		<a href="../index.html">Retour au menu</a>
	<!-- 	<p><input type="submit" value="Connexion" class="button" /></p> -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		  <script>
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
				    	$(function(){
					        var nom        = $("#nom").val();
					        var objet      = $("#objet").val();
					        var email      = "samsamgoal@hotmail.fr";
					        var msg        = $("#msg").val();
					        var dataString = nom + objet + email + msg;
					        var msg_all    = "Merci de remplir tous les champs";
					        var msg_alert  = "Merci de remplir ce champs";

					        if (dataString  == "") {
					            $("#msg_all").html(msg_all);
					        } else if (nom == "") {
					            $("#msg_nom").html(msg_alert);
					        } else if (objet == "") {
					            $("#msg_objet").html(msg_alert);
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
					    
				    	$(".submitSucess").fadeIn(500);
				    	//ajout du code PHP pour l'envoi d'un mail
				    }
				});

			  });
		</script>

		<script type="text/javascript" src="../js/contactConnecteur.js"></script>
		<script type="text/javascript" src="../js/contactDraggable.js"></script>


		<script>

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

		</script>




<!-- 		<script>
		    $(function(){
		        var nom        = $("#nom").val();
		        var objet      = $("#objet").val();
		        var email      = "sam.mignot@gmail.com";
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
		</script> -->

	</body>
</html>