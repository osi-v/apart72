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
<div class="jcarousel">
    <ul>
<? foreach ($arResult['ITEMS'] as $arItem) { ?>
<li>
<?
$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>1100, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
$img = '<img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" />';
echo $img;
?>
</li>
<? } ?>
    </ul>
</div>
