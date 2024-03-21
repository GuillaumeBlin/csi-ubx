<?php


namespace Application\Block\CSIUbx;

use DOMDocument;
use Concrete\Core\Block\BlockController;
use Concrete\Core\File\Filesystem;

use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Page\Page;
use \Concrete\Core\Entity\Attribute\Value\Value\SelectValueOption;

class Controller extends BlockController
{

    protected $btTable = "btCSIUbx";
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "240";
    protected $btDefaultSet = 'basic';
    
    private $method = "AES-256-CBC";

    private function enc($data){
        // Generate a random initialization vector (IV)
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
        // Encrypt the data
        $encrypted = openssl_encrypt($data, $this->method, $this->sKey, 0, $iv);
        // Concatenate the IV and the encrypted data
        $encrypted = base64_encode($iv.$encrypted);
        // Display the encrypted data
        return $encrypted;
    }

    private function dec($encrypted){
      // Decode the encrypted data
      $encrypted = base64_decode($encrypted);    
      // Extract the IV and the encrypted data
      $iv = substr($encrypted, 0, openssl_cipher_iv_length($this->method));
      $encrypted = substr($encrypted, openssl_cipher_iv_length($this->method));    
      // Decrypt the data
      $decrypted = openssl_decrypt($encrypted, $this->method, $this->sKey, 0, $iv);    
      // Display the decrypted data
      return $decrypted;
    }
    

    public function getBlockTypeName()
    {
        return 'CSI UBx';
    }

    public function getBlockTypeDescription()
    {
        return t('A simple block displaying CSI report form');
    }

    public function validate($args)
    {
        $error = parent::validate($args);
        if (!is_array($args)) {
            $error->add(t('Invalid data type, data must be an array.'));
            return $error;
        }
        return $error;
    }

    public function save($args)
    {
        parent::save($args);
    }

    public function registerViewAssets($outputContent = "")
    {
        $this->requireAsset("javascript", "jquery");
    }

    private function admin_view(){
        echo "admin";
        echo $this->enc("admin-161850-CSI")."<br/>";
        echo $this->enc("admin-161850-DT")."<br/>";
        echo $this->enc("admin-161850-PhD")."<br/>";
        echo $this->dec($this->enc("admin-161850-CSI"));
        echo $this->dec($this->enc("admin-161850-DT"));
        echo $this->dec($this->enc("admin-161850-PhD"));
    }

    private function user_view(){
        echo "user<br/>";
        echo $this->dec($_GET["code"]);
        echo "ici:".$_GET["code"];
    }

    public function action_load($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        if($this->admin =='True'){
            $this->admin_view();
        }else{
            $this->user_view();
        }
        
        exit;
    }

}
