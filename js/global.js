jQuery(document).ready(function(){
						   
	jQuery("#sidebar li").click(function(){
    	window.location=jQuery(this).find("a").attr("href");return false;
	});

}); //close doc ready
