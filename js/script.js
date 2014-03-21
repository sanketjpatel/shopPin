function login()
{
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type: "POST",
		url: "backend/login_submit.php",		
		data: $('#loginForm').serialize(),
		dataType: "json",
		success: function(msg){
			
			if(!(msg.status))
			{
				error(1,msg.txt);
			}
			else {location.replace(msg.txt);
						     
			}
			
			hideshow('loading',0);

		}
	});

}


function register()
{
	hideshow('loading',1);

	error(0);
	
	$.ajax({
		type: "post",
		url: "backend/reg_submit.php",		
		data: $('#contactform').serialize(),
		dataType: "json",
		success: function(msg){
			
			if(parseInt(msg.status)==1)
			{
				//hide the form
				$('.sign-form').fadeOut('slow');					
				$('.sign-form').css('visibility','hidden');					
					
				//show the success message
				$('.done').fadeIn('slow');
				$('.done').css('visibility','visible');

				location.replace("dashboard.php");
			}
			else if(parseInt(msg.status)==0)
			{
				error(1,msg.txt);
			}
						hideshow('loading',0);

		}
	});

}



function hideshow(el,act)
{
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function error(act,txt)
{
	hideshow('error',act);
	if(txt) $('#error').html(txt);
}