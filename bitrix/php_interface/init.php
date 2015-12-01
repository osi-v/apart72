<?
AddEventHandler("main", "OnEndBufferContent", "deleteKernelJs");

function deleteKernelJs(&$content) {
   global $USER;
   if(is_object($USER) && $USER->IsAuthorized()) return;
   
   $arPatternsToRemove = Array(
      '/<script.+?src=".+?kernel_main\/kernel_main\.js\?\d+"><\/script\>/',
      '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',
      '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
      '/<script.+?>(\n)bxSession\.Expand\(.+?\);(\n)<\/script>/',
      '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
      '/<link.+?href=".+?kernel_main\/kernel_main\.css\?\d+".+?>/'
   );
   $content = preg_replace($arPatternsToRemove, "", $content);
   $content = preg_replace("/\n{2,}/", "\n\n", $content);    
}

function ea($ar) {
	echo "<pre>";
	print_r($ar);
	echo "</pre>";
}

function getOption($iID, $bStrip=true) {
	if (CModule::IncludeModule('iblock')) {
		$res = CIBlockElement::GetByID($iID);
		if($ar_res = $res->GetNext())
			if ($bStrip)
				return strip_tags($ar_res['PREVIEW_TEXT']);
			else
				return $ar_res['PREVIEW_TEXT'];
		else
			return false;
		}
}
function getFileOption($iID) {
	if (CModule::IncludeModule('iblock')) {
		$res = CIBlockElement::GetByID($iID);
		if($ar_res = $res->GetNext()) 
			return $ar_res['PREVIEW_PICTURE'];
		else
			return false;
		}
}
include_once("classes/phpmailer/init.php");

$oMailSender = new CustomMailer("info@apart72.serv02.cdscompany.ru","Апартаменты-72");
if ($_REQUEST["reserve"]=="ajaxtype") {
	if (empty($_REQUEST["name"]) || empty($_REQUEST["phone"]) || empty($_REQUEST["flatinfo"]) || empty($_REQUEST["agree"]))  {
		$arResult["code"] = "empty";
	} else {
		if ($_REQUEST["check"]=="nospam") {
			$sBody = '';
			if ($_REQUEST["flatinfo"]) {
				$sBody.='Квартира: '.$_REQUEST["flatinfo"].'<br/>';
			}
			if ($_REQUEST["name"]) {
				$sBody.='Имя: '.$_REQUEST["name"].'<br/>';
			}
			if ($_REQUEST["phone"]) {
				$sBody.='Телефон: '.$_REQUEST["phone"].'<br/>';
			}
			if ($_REQUEST["comment"]) {
				$sBody.='Комментарий: '.$_REQUEST["comment"].'<br/>';
			}
			if ($_REQUEST["date_from"]) {
				$sBody.='Дата заезда: '.$_REQUEST["date_from"].'<br/>';
			}
			if ($_REQUEST["date_to"]) {
				$sBody.='Дата съезда: '.$_REQUEST["date_to"].'<br/>';
			}
			
			
			
			if ($oMailSender->SendMail("apartamenti72@mail.ru", "Бронирование квартиры", $sBody)) {
				$arResult["code"] = "success";
			} else {
				$arResult["code"] = "mailerr";
			}
		}
		
	}
	echo json_encode($arResult);
	die();
}
if ($_REQUEST["reserve"]=="bottomajaxtype") {
	if (empty($_REQUEST["name"]) || empty($_REQUEST["phone"]) || empty($_REQUEST["agree"]))  {
		$arResult["code"] = "empty";
	} else {
		if ($_REQUEST["check"]=="nospam") {
			$sBody = '';
            if ($_REQUEST["flatinfo"]) {
				$sBody.='Квартира: '.$_REQUEST["flatinfo"].'<br/>';
			}
			if ($_REQUEST["name"]) {
				$sBody.='Имя: '.$_REQUEST["name"].'<br/>';
			}
			if ($_REQUEST["phone"]) {
				$sBody.='Телефон: '.$_REQUEST["phone"].'<br/>';
			}
			if ($_REQUEST["comment"]) {
				$sBody.='Комментарий: '.$_REQUEST["comment"].'<br/>';
			}
            if ($_REQUEST["price_from"]) {
				$sBody.='Цена от: '.$_REQUEST["price_from"].'<br/>';
			}
            if ($_REQUEST["price_to"]) {
				$sBody.='Цена до: '.$_REQUEST["price_to"].'<br/>';
			}
			if ($_REQUEST["date_from"]) {
				$sBody.='Дата заезда: '.$_REQUEST["date_from"].'<br/>';
			}
			if ($_REQUEST["date_to"]) {
				$sBody.='Дата съезда: '.$_REQUEST["date_to"].'<br/>';
			}
			
			
			
			if ($oMailSender->SendMail("apartamenti72@mail.ru", "Бронирование квартиры", $sBody)) {
				$arResult["code"] = "success";
			} else {
				$arResult["code"] = "mailerr";
			}
		}
		
	}
	echo json_encode($arResult);
	die();
}


function getWatermark() {
	CModule::IncludeModule("iblock");
	$arWatermark = CIBlockElement::GetList(Array("NAME"=>"ASC"), array("ID"=>36), false, Array("nPageSize"=>100000), array("ID", "PREVIEW_PICTURE"));
	$arWatermark = $arWatermark->getNext(); 
	
	$fThumb = CFile::ResizeImageGet($arWatermark['PREVIEW_PICTURE'], array("width"=>560, "height"=>400), BX_RESIZE_IMAGE_PROPORTIONAL);
	
	$arWatermark = Array(
	array(
	"name" => "watermark", 
	"position" => "center", 
	"size"=>"real", 
	"type"=>"image",
	"file"=>$_SERVER['DOCUMENT_ROOT'].$fThumb["src"]
	)
	);
	return $arWatermark;
}

?>