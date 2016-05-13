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


	