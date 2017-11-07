$(document).ready(function(){
						   
	$('#inputField').bind("blur focus keydown keypress keyup", function(){recount();});
	$('input.g-button').attr('disabled','disabled');
	$("#inputField").Watermark("Agrega tu comentario ...");
	
});

function recount()
{
	var maxlen=140;
	var current = maxlen-$('#inputField').val().length;
	$('.counter').html(current);
	
	if(current<0 || current==maxlen)
	{
		$('.counter').css('color','#D40D12');
		$('input.g-button').attr('disabled','disabled').addClass('inact');
	}
	else
		$('input.g-button').removeAttr('disabled').removeClass('inact');
	
	if(current<10)
		$('.counter').css('color','#D40D12');
	
	else if(current<20)
		$('.counter').css('color','#5C0002');

	else
		$('.counter').css('color','#3a3a3b');
	
}

$(document).ready(function() 
{
// comentario
$("#update_button").click(function() 
{
	var updateval = $("#inputField").val();
	var dataString = 'update='+ updateval;
		
		$.ajax({
			type: "POST",
			url: "comentario_insertar.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#comentarios").prepend($(html).fadeIn('slow'));
				$("#inputField").val('');	
				$("#inputField").focus();
				$("#stexpand").oembed(updateval);
  			}
 		});
	return false;
});

//Eliminar
$('.stdelete').live("click",function() 
{
var ID = $(this).attr("id");
var dataString = 'id_comentario='+ ID;

if(confirm("¿Estás seguro que deseas  borrar el comentario?"))
{
	$.ajax({
		type: "POST",
		url: "comentario_eliminar.php",
		data: dataString,
		cache: false,
		success: function(html){
		$("#stbody"+ID).slideUp();
		}
 	});
}
return false;
});

});