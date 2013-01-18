<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Mailer {
    private $mail;
	private $MailConfig;
 
    public function __construct($config = array()) {
        require_once('PHPMailer_5.2.2/class.phpmailer.php');
		
		if( !empty($config) ) {
			$this->MailConfig = $config;
			$this->_initialize();
		}
    }
	
	private function _initialize(){
		date_default_timezone_set("Asia/Taipei");
		// the true param means it will throw exceptions on errors, which we need to catch
        $this->mail = new PHPMailer(true);
 
        $this->mail->IsSMTP(); // telling the class to use SMTP
		$this->mail->IsHTML(true);
		
		$this->mail->CharSet 	= "utf-8";                  			// 一定要設定 CharSet 才能正確處理中文
        $this->mail->SMTPDebug  = 0;                     				// enables SMTP debug information
        $this->mail->SMTPAuth   = true;                  				// enable SMTP authentication
        $this->mail->SMTPSecure = $this->MailConfig['SMTPSecure'];   	// sets the prefix to the servier
        $this->mail->Host       = $this->MailConfig['smtp_host'];   	// sets GMAIL as the SMTP server
        $this->mail->Port       = $this->MailConfig['smtp_port'];    	// set the SMTP port for the GMAIL server
        $this->mail->Username   = $this->MailConfig['smtp_user'];		// GMAIL username
        $this->mail->Password   = $this->MailConfig['smtp_passwd'];   	// GMAIL password
		
	}
		
    public function sendMail($SetFrom, $toWho, $subject, $body) {
		$this->mail->SetFrom($this->MailConfig['smtp_user'], $SetFrom);
		$this->mail->AddReplyTo($this->MailConfig['smtp_user'], $SetFrom);
        try{
            $this->mail->AddAddress($toWho, '');
 
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
 
            $this->mail->Send();
                // echo "Message Sent OK</p>\n";
 
        } catch (phpmailerException $e) {
            // echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            // echo $e->getMessage(); //Boring error messages from anything else!
        }
    }
}
 
/* End of file mailer.php */