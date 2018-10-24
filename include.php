<?
class IComingsoon{
    function MyOnBeforePrologHandler()
    {
        global $USER;
		$sw = COption::GetOptionString("intelma.comingsoon", "sw".SITE_ID);
		if($sw=="Y")
		if((defined("ADMIN_SECTION") || ADMIN_SECTION === true) || ($USER->isAdmin()))
		{
			return;
		}	 	 
		else
		{
			include("comingsoon.php");
			exit(); 
		}
    }
}
