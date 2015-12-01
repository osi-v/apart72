<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-detail">
<div class="post-date-bar">

<img src="/bitrix/templates/<? echo SITE_TEMPLATE_ID;?>/images/postdateicon.png" alt=""><?=ConvertDateTime($arResult["DATE_ACTIVE_FROM"], "DD.MM.YYYY", "ru")?></div>
<div class="post-image">
<?
$file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>450, 'height'=>393), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$img = '<img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" />';
    echo $img;
    ?></div>
<div class="post-content"><?=$arResult["DETAIL_TEXT"]?></div>

</div>