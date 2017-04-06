<?php
class LogoutController{
	
function logout(){
session_destroy ();
session_unset ();
header ( 'Location: /' );

}
}
?> 