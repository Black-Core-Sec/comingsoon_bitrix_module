<?

global $MESS;
$module_id = 'intelma.comingsoon';
include("lang/".LANGUAGE_ID."/install/options.php");
require_once('include.php');
IncludeModuleLangFile('options.php');
include('CModuleOptions.php');

$showRightsTab = false;
$arTabs = array();
$arGroups = array ();
$arOptions = array();
$sites_list = array();
$sites_arr = CSite::GetList($by="sort", $order="asc");

for ($i=0; $site = $sites_arr->Fetch(); $i++) {
    $sites_list = array($site["LID"] => $site["NAME"]);
    $key = key($sites_list);


    // ÇÀÏÎËÍÅÍÈÅ ÌÀÑÑÈÂÀ arTabs **************************************************


    $exTab = array (
      'DIV' =>$key,
      'TAB' => $sites_list[$key],
      'ICON' => '',
      'TITLE' => GetMessage("ICS_TAB"));
    $arTabs[$i] = $exTab;


    // ÇÀÏÎËÍÅÍÈÅ ÌÀÑÑÈÂÀ arGroups **************************************************


    $exGroup = array('TITLE' => $sites_list[$key], 'TAB' => $i);
    $arGroups['MAIN'.$key] = $exGroup;

    // ÇÀÏÎËÍÅÍÈÅ ÌÀÑÑÈÂÀ arOptions **************************************************

    $sw = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_SW"),
      'TYPE' => 'CHECKBOX',
      'DEFAULT' => 'N',
      'REFRESH' => 'N',
      'SORT' => '0');
    $arOptions["sw"."$key"] =  $sw;

    $datetimepicker = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_DATE"),
      'TYPE' => 'DATE',
      'DEFAULT' => '',
      'REFRESH' => 'N',
      'SORT' => '1');
    $arOptions["datetimepicker"."$key"] =  $datetimepicker;

    $bg = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_BG"),
      'TYPE' => 'FILE',
      'BUTTON_TEXT' => GetMessage("ICS_SF"),
      'SORT' => '2',
      'NOTES' => '',
      'DEFAULT' => '/bitrix/images/intelma.comingsoon/bg.jpg');
    $arOptions["bg"."$key"] =  $bg;

    $logo = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_LOGO"),
      'TYPE' => 'FILE',
      'BUTTON_TEXT' => GetMessage("ICS_SF"),
      'SORT' => '3',
      'NOTES' => '',
      'DEFAULT' => '/bitrix/images/intelma.comingsoon/logo.svg');
    $arOptions["logo"."$key"] =  $logo;

    $text = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_TEXT"),
      'TYPE' => 'TEXT',
      'DEFAULT' => '',
      'SORT' => '4',
      'COLS' => 40,
      'ROWS' => 15,
      'NOTES' => '');
    $arOptions["text"."$key"] =  $text;

    $fb = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => 'Facebook',
      'TYPE' => 'STRING',
      'DEFAULT' => 'https://www.facebook.com',
      'SORT' => '5',
      'NOTES' => '');
    $arOptions["fb"."$key"] =  $fb;

    $vk = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => 'VK',
      'TYPE' => 'STRING',
      'DEFAULT' => 'https://vk.com',
      'SORT' => '6',
      'NOTES' => '');
    $arOptions["vk"."$key"] =  $vk;

    $ok = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => 'OK',
      'TYPE' => 'STRING',
      'DEFAULT' => 'http://www.ok.ru',
      'SORT' => '7',
      'NOTES' => '');
    $arOptions["ok"."$key"] =  $ok;

    $websta = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => 'Websta',
      'TYPE' => 'STRING',
      'DEFAULT' => 'http://www.websta.me',
      'SORT' => '8',
      'NOTES' => '');
    $arOptions["websta"."$key"] =  $websta;

    $tel = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_PHONE"),
      'TYPE' => 'STRING',
      'DEFAULT' => '8(800)-000-00-00',
      'SORT' => '9',
      'NOTES' => '');
    $arOptions["tel"."$key"] =  $tel;

    $mail = array(
      'GROUP' => 'MAIN'.$key,
      'TITLE' => GetMessage("ICS_EMAIL"),
      'TYPE' => 'STRING',
      'DEFAULT' => 'mail@gmail.com',
      'SORT' => '10',
      'NOTES' => '');
    $arOptions["mail"."$key"] =  $mail;
};

$opt = new CModuleOptions($module_id, $arTabs, $arGroups, $arOptions, $showRightsTab);
$opt -> ShowHTML();
