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






		