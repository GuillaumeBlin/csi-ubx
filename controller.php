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
    protected $jsonFile="/../../files/datas_adum/ubx_inscrits.json";
    
    private function enc($data){
        $cipher = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encrypted = openssl_encrypt($data, $cipher, $this->sKey, 0, $iv,$tag);
        $encrypted = base64_encode($iv.$encrypted);
        return $encrypted;
    }

    
    private function dec( $ciphertext){
        $encrypted = base64_decode($ciphertext);
        $cipher = "AES-256-CBC";
        $iv = substr($encrypted, 0, openssl_cipher_iv_length($cipher));
        $encrypted = substr($encrypted, openssl_cipher_iv_length($cipher));
        $decrypted = openssl_decrypt($encrypted, $cipher, $this->sKey, 0, $iv,$tag);
        return $decrypted;
    }

    private function retrieve_json()
    {
        $res = "";
        while (!(is_array($res))) {
            $res = json_decode(file_get_contents(realpath(dirname(__FILE__)) . $this->jsonFile), true);            
        }
        return $res;
    }
    
    private function array_except($array, $keys)
    {
        return array_diff_key($array, array_flip((array) $keys));
    }

    private function array_extract($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }

    private function group_by($key, $data)
    {
        $result = array();
        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $this->array_except($val, $key);
            } else {
                $result[""][] = $this->array_except($val, $key);
            }
        }
        return $result;
    }

    private function totitle($string)
    {
        return ucfirst(strtolower($string));
    }

    /* DISPLAY functions */

    
    private function display_links($defense)
    {
        echo "<li>".$this->totitle($defense["prenom"]) . ' ' . $defense["nom"];
            echo "<ul><li><i class='fas fa-envelope'></i><i class='fas fa-envelope' token='".htmlspecialchars(urlencode($this->enc("csi-".$defense["Matricule_etudiant"]."-PhD")))."'></i>";
            echo " -&gt; ".$defense["mail_principal"]. " (".$defense["mail_secondaire"].") </li>";
            echo "<li>".htmlspecialchars(urlencode($this->enc("csi-".$defense["Matricule_etudiant"]."-DT"))); 
            echo " -&gt; ".$defense["these_directeur_these_mail"]."</li>";
            echo "<li>".htmlspecialchars(urlencode($this->enc("csi-".$defense["Matricule_etudiant"]."-CSI"))); 
            echo " -&gt; CSI </li></ul>";            
        echo "</li>";
    }

    private function display_phd_report_content($defense)
    {
        include('form-PhD.php');
        return;
    }

    private function display_dt_report_content($defense)
    {
        include('form-PhD.php');
        return;
    }

    private function display_csi_report_content($defense)
    {
        include('form-PhD.php');
        return;
    }

    /* SORTING functions */
    private function students_sorter(array $a, array $b)
    {
        return [$a['these_ED_code'], $a['these_specialite'], $a['nom']] <=> [$b['these_ED_code'], $b['these_specialite'], $b['nom']];
    }    

    /* LOADING functions */

    /*Phd students*/
    private function display_list()
    {
        $students = $this->retrieve_json();
        $students = $students["data"][0];
        foreach ($students as &$value) {
            $value = $this->array_extract($value, [
                "Matricule_etudiant",
                "nom",
                "prenom",
                "mail_principal",
                "mail_secondaire",
                "these_ED_code",
                "these_directeur_these_mail",
                "these_specialite"
            ]);
        }

        usort($students, array($this, 'students_sorter'));

        $byGroup = $this->group_by("these_ED_code", $students);
        foreach ($byGroup as &$valueByED) {
            $valueByED = $this->group_by("these_specialite", $valueByED);
        }

        if (!array_key_exists($this->ed, $byGroup)) {
                echo "Aucun étudiant inscrit et aucune étudiante inscrite dans cette école doctorale.";
            
        } else {
                $valueByED = $byGroup[$this->ed];
                
                foreach ($valueByED as $keyBySpeciality => $valueBySpeciality) {
                    echo "<h3>" . $keyBySpeciality . "</h3>";
                    echo "<ul>";
                    foreach ($valueBySpeciality as $student) {
                        $this->display_links($student);
                    }
                    echo "</ul>";
                }
            
        }
    }

    /*Phd students*/
    private function display_report($mat,$user)
    {
        $students = $this->retrieve_json();
        $students = $students["data"][0];
        $student="";
        foreach ($students as $value) {
            if($value["Matricule_etudiant"]==$mat){
                $student = $this->array_extract($value, [
                "Matricule_etudiant",
                "civilite",
                "nom",
                "prenom",
                "mail_principal",
                "mail_secondaire",
                "niveau_Etud",
                "these_ED_code",
                "these_codirecteur_these_nom",
                "these_codirecteur_these_prenom",
                "these_codirecteur_these_mail",
                "these_directeur_these_nom",
                "these_directeur_these_prenom",
                "these_directeur_these_mail",
                "these_cotutelle",
                "these_cotutelle_etab",
                "these_cotutelle_pays",
                "these_date_1inscription",
                "these_laboratoire",
                "these_specialite"
                ]);
                break;
            }
        }
        
        echo "<pre>" . var_export($student, true) . "</pre>";
        echo $user;
        if (!$student) {
                echo "Aucun étudiant ou aucune étudiante correpsondant.";
            
        } else {
                if($user=="PhD"){//PhD
                    $this->display_phd_report_content($student);             
                }
                if($user=="DT"){
                    $this->display_dt_report_content($student);             
                }
                if($user=="CSI"){
                    $this->display_csi_report_content($student);             
                }
        }
    }

    public function action_admin_remove_phd_report($bID = false){
        if ($this->bID != $bID) {
            return false;
        }
        $id=$_REQUEST["id"];
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `PhDReport` WHERE `ID` = ?;', array(intval($id))); 
        echo $statement->rowCount()." entrée a bien été supprimée de la table";                    
        exit;
    }

    public function action_admin_mailing($bID = false){
        if ($this->bID != $bID) {
            return false;
        }
        $token=$_REQUEST["token"];
        $mh = Loader::helper('mail');

        $mh->setSubject('Simple Message');
        $mh->setBody('This is my simple message body: '.$token);
        $mh->to('guillaume.blin@u-bordeaux.fr', 'Guillaume B');
        $mh->from('noreply@concrete5.org');
        $mh->sendMail();
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
        $this->requireAsset("datatables");
    }

    private function admin_PhD_view(){     
        $db = \Database::connection();
        $statement = $db->executeQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'PhDReport';");
        $report_headers = $statement->fetchAll(); //print_r($rows);
        
        $statement = $db->executeQuery('SELECT * FROM `PhDReport` ;'); 
        $report_data = $statement->fetchAll(); //print_r($rows);
        include('admin-report.php');
        exit;
        
    }

    private function user_view(){
        $val=$this->dec($_REQUEST["code"]);
        print_r($val);
        if($val){
            $val=explode("-",$val);
            $mat=$val[1];
            $user=$val[2];
            $this->display_report($mat,$user);
        }else{
            echo 'invalid request';
        }
    }

    public function action_form_save_PhDReport($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $val=$this->dec($_REQUEST["code"]);
        $val=explode("-",$val);
        $mat=$val[1];
        
        //echo "<pre>".var_dump($_REQUEST)."</pre>";
        $report=$_REQUEST;
        array_shift($report);
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `PhDReport` WHERE `ID` = ?;', array(intval($mat))); 
        //echo $statement->rowCount();            
        $fields='';
        $values='';        
        foreach(array_keys($report) as $e){
            $fields=$fields."`".$e."`,";
            $values=$values.'?,';
        }
        $values=$values.'?,?';
        $fields=$fields."`Matricule`,`bID`";

        $sql='INSERT INTO `PhDReport` ( '.$fields.')VALUES ('.$values.');';
        $report["Matricule"]=intval($mat);
        $report["bID"]=$bID;        
        $statement = $db->executeQuery($sql, array_values($report)); 
        //echo $statement->rowCount();     
        include('report-PhD.php');
        exit;
    }

    public function action_load_user($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }        
            $this->user_view();
        
        exit;
    }
    public function action_load_admin_links($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $this->display_list() ;     
        exit;
    }

    public function action_load_admin_PhD($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $this->admin_PhD_view();        
        exit;
    }

    public function action_load_admin_DT($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        //$this->admin_PhD_view();        
        exit;
    }

    public function action_load_admin_CSI($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        //$this->admin_PhD_view();        
        exit;
    }

    private function emptyDB()
    {        
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `PhDReport` WHERE `ID` IN (SELECT `ID` FROM `PhDReport`);', array());         
        echo $statement->rowCount();
    }

}
