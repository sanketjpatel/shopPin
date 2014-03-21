<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require_once('db/db.php');
include('functions/functions.php');

	
//For registration

	// we check if everything is filled in and perform checks

	if(!$_POST['username'])
	{
		die(msg(0,"<p>Please enter a username.</p>"));
	}
	
	if(strlen($_POST['username'])<5 || strlen($_POST['username'])>15)
	{
		die(msg(0,"<p>Username must be between 5 and 15 characters.</p>"));
	}

	// elseif(uniqueUser($_POST['username']))
	// {
	// 	die(msg(0,"Username already taken."));
	// }


	elseif(!$_POST['password'])
	{
		die(msg(0,"<p>Please enter a password.</p>"));
	}
	
	elseif(strlen($_POST['password'])<3)
	{
		die(msg(0,"<p>Password must be atleast 3 characters.</p>"));
	}

	elseif(!$_POST['email'])
	{
		die(msg(0,"<p>Please enter an email address.</p>"));
	}
	elseif(!$_POST['name'])
	{
		die(msg(0,"<p>Please enter your name.</p>"));
	}
	

	// elseif(uniqueEmail($_POST['email']))
	// {
	// 	die(msg(0,"<p>Email taken. Please select another email address.</p>"));
	// }

	else
		{
		
			$res = addUser($_POST['username'],$_POST['password'],$_POST['email'],$_POST['name']);
				if ($res == 2){
					die(msg(0,"There was an error registering your details. Please contact the site admin."));
				}
				if ($res == 3){
					die(msg(0,"Username already exists"));
				}
				if ($res == 4){
					die(msg(0,"Email already exists"));
				}
				if ($res == 99){
					die(msg(1,"<p>Registration successful!</p>"));
					
				}
		}

	function msg($status,$txt)
	{
		return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}

?>
