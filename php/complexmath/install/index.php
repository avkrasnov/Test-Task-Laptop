<? 
use Bitrix\Main\ModuleManager,
	Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
 
Class complexmath extends CModule {
	public $MODULE_ID = 'complexmath';
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;
	
	function __construct() {
		if (file_exists(__DIR__."/version.php")) {
			include_once(__DIR__."/version.php");
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
			$this->MODULE_NAME = Loc::getMessage("MODULE_NAME");
			$this->MODULE_DESCRIPTION = Loc::getMessage("MODULE_DESCRIPTION");
		}
	}
	
	function DoInstall() {
		$this->InstallDB();
		$this->InstallEvents();
		$this->InstallFiles();
		ModuleManager::registerModule($this->MODULE_ID);
		return true;
	}
	
	function DoUninstall() {
		$this->UnInstallDB();
		$this->UnInstallEvents();
		$this->UnInstallFiles();
		ModuleManager::unRegisterModule($this->MODULE_ID);
		return true;
	}
	
	function InstallDB() {
		return true;
	}
	
	function UnInstallDB() {
		return true;
	}
	
	function InstallEvents() {
		return true;
	}
	
	function UnInstallEvents() {
		return true;
	}
	
	function InstallFiles() {
		return true;
	}
	
	function UnInstallFiles() {
		return true;
	}
}
?>