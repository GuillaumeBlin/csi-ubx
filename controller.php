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
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($data, $cipher, $this->sKey, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $this->sKey, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
        return htmlspecialchars(urlencode($ciphertext));
//        $ciphertext = openssl_encrypt($data, 'aes-256-gcm', $this->sKey, OPENSSL_RAW_DATA, $this->fKey, $tag, '', 16);
//        return base64_encode($ciphertext . $tag);
    }

    
    private function dec( $ciphertext){

        $c = base64_decode($ciphertext);
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = substr($c, 0, $ivlen);
$hmac = substr($c, $ivlen, $sha2len=32);
$ciphertext_raw = substr($c, $ivlen+$sha2len);
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $this->sKey, $options=OPENSSL_RAW_DATA, $iv);
$calcmac = hash_hmac('sha256', $ciphertext_raw, $this->sKey, $as_binary=true);
if (hash_equals($hmac, $calcmac))// timing attack safe comparison
{
    return $original_plaintext;
}
return '';
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
        echo $this->enc("admin-161850-PhD")."<br/>";
        echo $this->dec($this->enc("admin-161850-CSI"));
        echo $this->dec($this->enc("admin-161850-DT"));
        echo $this->dec($this->enc("admin-161850-PhD"));
    }

    private function user_view(){
        echo "user<br/>";
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
