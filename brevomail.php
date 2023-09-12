<?php
require_once(__DIR__ . '/vendor/autoload.php');
class Emailsend{
  private $config;
  private $apiInstance;
  private $sendSmtpEmail;
  public function __construct(){
    $this->config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
    $this->apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
      new GuzzleHttp\Client(),
      $this->config
    );
    $this->sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail();
  }
  public function afterRegister($recipient, $fullname){
    $this->sendSmtpEmail['subject'] = 'Nice to meet you!';
    $this->sendSmtpEmail['htmlContent'] = "<html><body><h1>Cher patient, nous avons le plaisir de vous informer que votre inscription a été réussie. Nous nous réjouissons de l'opportunité de vous servir.</h1></body></html>";
    $this->sendSmtpEmail['sender'] = array('name' => 'RecoureoPro', 'email' => 'bbba73212@gmail.com');
    $this->sendSmtpEmail['to'] = array(
      array('email' => $recipient, 'name' => $fullname)
    );
    // $this->sendSmtpEmail['replyTo'] = array('email' => 'bbba73212@gmail.com', 'name' => 'John Doe');
    $this->sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
    $this->mainSender();
  }

  public function verifyActivation($recipient, $fullname, $link){
    $this->sendSmtpEmail['subject'] = 'Verify your email with following link!';
    $this->sendSmtpEmail['htmlContent'] = "<html><body>" . $link . "</body></html>";
    $this->sendSmtpEmail['sender'] = array('name' => 'RecoureoPro', 'email' => 'bbba73212@gmail.com');
    $this->sendSmtpEmail['to'] = array(
      array('email' => $recipient, 'name' => $fullname)
    );
    $this->sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
    $this->mainSender();
  }

  private function mainSender(){
    try {
        $result = $this->apiInstance->sendTransacEmail($this->sendSmtpEmail);
        // print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
    }
  }
}

?>