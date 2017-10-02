(function($){
	$('.addPanier').click(function(event){
		event.preventDefault();
		$.get($(this).attr('href'),{},function(data){
			if(data.error){
				alert(data.message);
			}else{
			 	alert(data.message);
			}
		},'json');
		return false;
	});

})(jQuery);

(function($){
	$('.delPanier').click(function(event){
		location.reload();
		$.get($(this).attr('href'),{},function(data){
			if(data.error){
				alert(data.message);
			}else{
			 	alert(data.message);
			}
		},'json');
		return false;
	});

})(jQuery);


function bienajoute(){
	alert("Le produits a bien ete ajoute");
}