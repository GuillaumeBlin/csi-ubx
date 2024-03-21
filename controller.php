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
    
    private function enc($data){
        $cipher = "aes-128-gcm";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));

// Encrypt the data
$encrypted = openssl_encrypt($data, $cipher, $this->key, 0, $iv);

// Concatenate the IV and the encrypted data
$encrypted = base64_encode($iv.$encrypted);
return $encrypted;
//        $ciphertext = openssl_encrypt($data, 'aes-256-gcm', $this->sKey, OPENSSL_RAW_DATA, $this->fKey, $tag, '', 16);
//        return base64_encode($ciphertext . $tag);
    }

    
    private function dec( $ciphertext){

        $encrypted = base64_decode($ciphertext);
        $cipher = "aes-128-gcm";
// Extract the IV and the encrypted data
$iv = substr($encrypted, 0, openssl_cipher_iv_length($cipher));
$encrypted = substr($encrypted, openssl_cipher_iv_length($cipher));

// Decrypt the data
$decrypted = openssl_decrypt($encrypted, $$cipher, $this->key, 0, $iv);
return $decrypted;
/*
        $ciphertext = base64_decode($ciphertext);
        $authTag = substr($ciphertext, -16);
        $tagLength = strlen($authTag);
    
        if ($tagLength > 16 || ($tagLength < 12 && $tagLength !== 8 && $tagLength !== 4)) {
            return '';
        }
    
        $plaintext = openssl_decrypt(substr($ciphertext, 0, -16), 'aes-256-gcm', $this->sKey, OPENSSL_RAW_DATA, $this->fKey, $authTag, '');
    
        if (false === $plaintext) {
            return '';
        }
    
        return $plaintext;
        */
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
        echo htmlspecialchars(urlencode($this->enc("admin-161850-PhD")))."<br/>";
        echo $this->dec($this->enc("admin-161850-CSI"));
        echo $this->dec($this->enc("admin-161850-DT"));
        echo $this->dec($this->enc("admin-161850-PhD"));
    }

    private function user_view(){
        echo "user<br/>";
        echo "<pre>".$this->sKey."</pre><br/>";

        echo $this->dec($_REQUEST["code"]);
        echo "ici:".$_REQUEST["code"];
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
