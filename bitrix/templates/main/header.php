<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($APPLICATION->GetCurDir()=="/") 
	$bMainPage=true;
else
	$bMainPage=false;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle();?></title><meta name="viewport" content="width=1000">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="apple-touch-icon" sizes="57x57" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH ?>/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?=SITE_TEMPLATE_PATH ?>/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH ?>/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?=SITE_TEMPLATE_PATH ?>/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH ?>/favicons/favicon-16x16.png">
<link rel="manifest" href="<?=SITE_TEMPLATE_PATH ?>/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH ?>/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="google-site-verification" content="vj356dQU6y2RdP-TPDaQV4P4pBHP6Dva4s1crcyQusI" />
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery/js/jquery-1.10.2.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery/js/jquery-ui-1.10.4.custom.min.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/animate/jquery.animate.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.masked.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jcarousel/jquery.jcarousel.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/fancybox/source/jquery.fancybox.pack.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/menu.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/feedback.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/custompopup/custompopup.js")?>
<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/custompopup/custompopup.css")?>
<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/jquery/css/sunny/jquery-ui-1.10.4.custom.min.css")?>
<?// $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.cookie.js")?>
<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/fancybox/source/jquery.fancybox.css")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/custom.js")?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<?// $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/excanvas.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/coolclock.js")?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/moreskins.js")?>
</head>

<body>
<?$APPLICATION->ShowPanel();?>
    <header class="site-header container_20">
        <div class="logobar grid_7">
           <? if ($bMainPage==false) { ?>
            <a href="/"><div class="logo-clock-area">
            <canvas id="clockid" class="CoolClock:default:85::+5 MyClock"></canvas>
            </div></a>
             <? } 
            else { ?>
            <div class="logo-clock-area">
            <canvas id="clockid" class="CoolClock:default:85::+5 MyClock"></canvas>
            </div> 
            <? } ?>
        </div>
        <div class="contactsbar grid_8">
            <div class="phones">
                <a href="tel:+7(9044)95-42-42"><small>тел.: +7 (9044) </small>95-42-42</a><br>
                <a href="tel:+7(9044)95-61-61"><small>+7 (9044) </small>95-61-61</a>
            </div>
            <div class="subheader">
                Самые комфортные квартиры Тюмени для вас!
            </div>
        </div>
        <div class="header-apartbar grid_5">
            <img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/images/apart.png" alt="">
        </div>
    </header>
    <div class="clear"></div>
    <menu class="primary-menu container_20">
<?$APPLICATION->IncludeComponent("bitrix:menu", "primary-menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
		"COMPONENT_TEMPLATE" => ".default",
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
    </menu>
    <div class="clear"></div>
    <main class="container_20">
    <? if($bMainPage==false) { ?>
    <h1><? $APPLICATION->ShowTitle(false)?></h1>
    <?
    $APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
    )
);
        }?>