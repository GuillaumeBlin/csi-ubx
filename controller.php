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
        $cipher = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encrypted = openssl_encrypt($data, $cipher, $this->key, 0, $iv,$tag);
        $encrypted = base64_encode($iv.$encrypted);
        return $encrypted;
    }

    
    private function dec( $ciphertext){
        $encrypted = base64_decode($ciphertext);
        $cipher = "AES-256-CBC";
        $iv = substr($encrypted, 0, openssl_cipher_iv_length($cipher));
        $encrypted = substr($encrypted, openssl_cipher_iv_length($cipher));
        $decrypted = openssl_decrypt($encrypted, $cipher, $this->key, 0, $iv,$tag);
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
        echo "CSI: ".htmlspecialchars(urlencode($this->enc("admin-161850-CSI")))."<br/>";
        echo $this->dec($this->enc("admin-161850-CSI"))."<br/>";
        echo "DT: ".htmlspecialchars(urlencode($this->enc("admin-161850-DT")))."<br/>";
        echo $this->dec($this->enc("admin-161850-DT"))."<br/>";
        echo "PhD: ".htmlspecialchars(urlencode($this->enc("admin-161850-PhD")))."<br/>";
        echo $this->dec($this->enc("admin-161850-PhD"))."<br/>";
    }

    private function user_view(){
        echo "user<br/>";
        echo $this->dec($_REQUEST["code"]);
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
