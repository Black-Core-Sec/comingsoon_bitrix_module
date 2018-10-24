<?
global $MESS; 

include("../lang/ru/install/index.php");
include("../install/version.php");

Class intelma_comingsoon extends CModule
{
	var $MODULE_ID = "intelma.comingsoon"; 
	var $MODULE_VERSION; 
	var $MODULE_VERSION_DATE; 
	var $MODULE_NAME; 
	var $MODULE_DESCRIPTION;

	function intelma_comingsoon()
    {

        $arModuleVersion = array();
        include("version.php");

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = GetMessage("CS_MODULE_NAME"); 
		$this->MODULE_DESCRIPTION = GetMessage("CS_MODULE_DESC"); 
        $this->PARTNER_NAME = GetMessage("CS_PARTNER_NAME");
		$this->PARTNER_URI = GetMessage("CS_PARTNER_URI");		
	}

	function DoInstall()
    {
	
		$this->InstallFiles();
		RegisterModule("intelma.comingsoon");
        RegisterModuleDependences("main", "OnBeforeProlog", "intelma.comingsoon", "IComingsoon", "MyOnBeforePrologHandler");
	}

	function InstallFiles()
	{
		global $DOCUMENT_ROOT;

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
  
		$ToDir = $DOCUMENT_ROOT."/bitrix/images/intelma.comingsoon";
        CheckDirPath($ToDir);
        CopyDirFiles($path."/images", $ToDir);
		
		$ToDir = $DOCUMENT_ROOT."/bitrix/js/intelma.comingsoon";
        CheckDirPath($ToDir);
        CopyDirFiles($path."/js", $ToDir);
		
		$ToDir = $DOCUMENT_ROOT."/bitrix/themes/intelma.comingsoon";
        CheckDirPath($ToDir);
        CopyDirFiles($path."/themes", $ToDir);

		return true;
	}

	function DoUninstall()
    {

        UnRegisterModuleDependences("main", "OnBeforeProlog", "intelma.comingsoon", "IComingsoon", "MyOnBeforePrologHandler");
		$this->UnInstallFiles();
		UnRegisterModule("intelma.comingsoon");
	}

	function UnInstallFiles()
	{
		try {
            DeleteDirFilesEx("bitrix/images/intelma.comingsoon");
            DeleteDirFilesEx("bitrix/js/intelma.comingsoon");
            DeleteDirFilesEx("bitrix/themes/intelma.comingsoon");
        } catch (Exception $e) {
		    return false;
        }

        return true;
	} 
}
