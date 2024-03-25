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
            echo "<ul><li>".htmlspecialchars(urlencode($this->enc("csi-".$defense["Matricule_etudiant"]."-PhD")));
            echo " -&gt; ".$defense["mail_principal"]. " (".$defense["mail_secondaire"].")</li>";
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
        $this->display_list() ;
        
        $db = \Database::connection();
        /*echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo '<tr>';
*/
        $statement = $db->executeQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'PhDReport';");
        echo $statement->rowCount();     
        $rows = $statement->fetchAll(); //print_r($rows);
        foreach ($rows as $row) {
            print_r($row);
        }
  /*                      <th>#</th>
                        <th id="click-me">Click Me</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th class="toggleDisplay">Th 1</th>
                        <th class="toggleDisplay">Th 2</th>
                        <th class="toggleDisplay">Th 3</th>
                        <th class="toggleDisplay">Th 4</th>
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
*/
                        $statement = $db->executeQuery('SELECT * FROM `PhDReport` ;'); 
                        echo $statement->rowCount();     
                        $rows = $statement->fetchAll(); //print_r($rows);
     /*                   
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td class="toggleDisplay">Td 1</td>
                        <td class="toggleDisplay">Td 2</td>
                        <td class="toggleDisplay">Td 3</td>
                        <td class="toggleDisplay">Td 4</td>
                    </tr>
                    
                    </tbody>
            </table>
        </div>
    </div>
</div>
</div>*/
        foreach ($rows as $row) {
            print_r($row);
        }
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
        
        echo "<pre>".var_dump($_REQUEST)."</pre>";
        $vals=$_REQUEST;
        array_shift($vals);
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `PhDReport` WHERE `ID` = ?;', array(intval($mat))); 
        echo $statement->rowCount();            
        $fields='';
        $values='';        
        foreach(array_keys($vals) as $e){
            $fields=$fields."`".$e."`,";
            $values=$values.'?,';
        }
        $values=$values.'?,?';
        $fields=$fields."`Matricule`,`bID`";

        $sql='INSERT INTO `PhDReport` ( '.$fields.')VALUES ('.$values.');';
        $vals["Matricule"]=intval($mat);
        $vals["bID"]=$bID;        
        $statement = $db->executeQuery($sql, array_values($vals)); 
        echo $statement->rowCount();            
        exit;
    }

    public function action_load($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        //$this->emptyDB();
        if($this->admin =='True'){
            $this->admin_view();
        }else{
            $this->user_view();
        }
        
        exit;
    }

    private function emptyDB()
    {        
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `PhDReport` WHERE `ID` IN (SELECT `ID` FROM `PhDReport`);', array());         
        echo $statement->rowCount();
    }

}
