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
    <div class="items-bar">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <div class="item">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]; ?>"><?
                $file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>245, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $img = '<img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" />';
                echo $img;
                ?></a>
                <div class="item-content">
                    <div class="item-address">
                        <?=$arItem["NAME"]; ?>
                    </div>
                    <div class="item-room-num">
                        <?=$arItem["PROPERTIES"]["ROOMS"]["VALUE"]; ?>-комнатная квартира
                    </div>
                </div>
                <div class="item-cost">
                    Цена: <?=$arItem["PROPERTIES"]["COST"]["VALUE"]; ?> руб.
                </div>
                <a href="#reserveform" class="fancybox_html item-order" data-title="Забронировать квартиру">
		Забронировать </a>
            </div>
  
                    <?endforeach;?>
    </div>