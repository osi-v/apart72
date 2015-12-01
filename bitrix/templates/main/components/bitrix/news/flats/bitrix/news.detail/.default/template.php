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

<div class="flat-detail">
<div class="flatslider">
<div class="flat-single-image">
<?
$file = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>460, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true, getWatermark());
$img = '<a href="'.$file['src'].'" rel="gallery" class="fancybox"><img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" /></a>';
echo $img;
?>
</div>
<div class="sliderphoto">
<ul>
<?
foreach ($arResult["PROPERTIES"]["PHOTOS"]["VALUE"] as $photo) {
    if (count($photo)>0) {
$big = CFile::ResizeImageGet($photo, array('width'=>1000, 'height'=>700), BX_RESIZE_IMAGE_EXACT, true, getWatermark());
$small = CFile::ResizeImageGet($photo, array('width'=>100, 'height'=>70), BX_RESIZE_IMAGE_EXACT, true);
$img = '<a href="'.$big['src'].'" rel="gallery" class="fancybox"><img src="'.$small['src'].'" width="'.$small['width'].'" height="'.$small['height'].'" /></a>';
echo "<li>" . $img . "</li>";
        }
}
?>

</ul>
</div>
<? if (count($photo)>0) { ?>
<a class="ctrl-btn sliderphoto-prev">&lsaquo;</a>
<a class="ctrl-btn sliderphoto-next">&rsaquo;</a>
<? } ?>
</div>
<div class="flat-information-sidebar">
<div class="flat-property">
<div class="flat-property-item"><a href="#map-for-flat-title" class="flat-address-title"><b><?=$arResult["NAME"];?></b></a></div>
<div class="flat-property-item">Количество комнат: <b><?=$arResult["PROPERTIES"]["ROOMS"]["VALUE"];?></b></div>
<div class="flat-property-item">Стоимость: <b><?=$arResult["PROPERTIES"]["COST"]["VALUE"];?> <span class="ruble-night">руб./cут.</span></b></div>
<div class="flat-property-item">Спальных мест: <b><?=$arResult["PROPERTIES"]["SLEEP"]["VALUE"];?></b></div>
<div class="flat-property-item">Площадь: <b><?=$arResult["PROPERTIES"]["AREA"]["VALUE"];?></b></div>
    </div>
<div class="flat-parameters">
<ul class="parameters-col">
<? foreach ($arResult["PROPERTIES"]["FEATURES"]["VALUE"] as $feature) { ?>
<li><?=$feature;?></li>
       <? } ?>
        </ul>
    </div>
     <a href="#reserveform" class="fancybox_html flat-order" data-title="Забронировать квартиру">Забронировать</a>
</div>
<div class="map-for-flat">
<h2 id="map-for-flat-title">Карта проезда</h2>
<div id="map" data-coords="<?=$arResult["PROPERTIES"]["MAP"]["VALUE"];?>" data-html="<?=$arResult["NAME"];?>" class="map"></div>
</div>
<? if (!$arResult["PREVIEW_TEXT"]=="") { ?>
<div class="detail-for-flat">
<h2>О квартире</h2>
<?=$arResult["PREVIEW_TEXT"];?>
</div>
<? } ?>
</div>
