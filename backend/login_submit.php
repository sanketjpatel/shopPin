<?php

/*
 * Developed by: Tanmay Garg
 * Contact: tanmaygarg@ymail.com
 */

include('functions/functions.php');

$returnURL ="index.php";

			$res = login($_POST['username'],$_POST['password']);
				if ($res == 1){
					die(msg(0,"<p>Username and / or password incorrect!</p>"));
				}
				
				if ($res == 77){
										echo(msg(1,$returnURL));
				}
				
	
	function msg($status,$txt)
	{
		return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}
				
?>
