<?
include("class.phpmailer.php");

class CustomMailer {
	
	private $oPhpMailer;
	
	function __construct($sFrom, $sFromName) {
		$this->oPhpMailer = new PHPMailer();
		$this->oPhpMailer->IsHTML(true);
		$this->oPhpMailer->From = $sFrom;
		$this->oPhpMailer->FromName = $sFromName;
	}
	
	function SendMail($sTo, $Subject, $sBody) {
		$this->oPhpMailer->ClearAddresses();
		$this->oPhpMailer->AddAddress($sTo);
		$this->oPhpMailer->Subject  = $Subject;
		$this->oPhpMailer->Body     = $sBody;
		if ($this->oPhpMailer->Send())
			return true;
		else
			return false;		
	}
}



?>