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
        $year = (int)$defense["niveau_Etud"][0];
        switch ($year) {
            case 1:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ère";
                } else {
                    $year = $year . "st";
                }

                break;
            case 2:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "nde";
                } else {
                    $year = $year . "nd";
                }
                break;
            case 3:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ème";
                } else {
                    $year = $year . "rd";
                }

                break;
            default:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ème";
                } else {
                    $year = $year . "th";
                }

                break;
        }
        echo "<li>";
        if (strcmp($this->langage, "FR") == 0) {
            echo '<a target="_blank" href="https://adum.fr/script/cv.pl?site=CDUBX&matri=' . $defense["Matricule_etudiant"] . '">' . $this->totitle($defense["prenom"]) . ' ' . $defense["nom"] . '</a> ';
            echo  ' (' . $year . ' année) - ';
            echo $defense["these_titre"] . " - ";
            //echo " (".$defense["these_laboratoire"].") ";        
            echo   'sous la direction de ' . $this->totitle($defense["these_directeur_these_prenom"]) . " " . $defense["these_directeur_these_nom"];
            if ($defense["these_codirecteur_these_nom"] != "") {
                echo ' et ' . $defense["these_codirecteur_these_prenom"] . " " . $defense["these_codirecteur_these_nom"];
            }
        } else {
            echo '<a target="_blank" href="https://adum.fr/script/cv.pl?site=CDUBX&matri=' . $defense["Matricule_etudiant"] . '">' . $this->totitle($defense["prenom"]) . ' ' . $defense["nom"] . '</a> ';
            echo  ' (' . $year . ' year) - ';
            echo $defense["these_titre_anglais"] . " - ";
            //echo " (".$defense["these_laboratoire"].") ";        
            echo  'under the supervision of ' . $this->totitle($defense["these_directeur_these_prenom"]) . " " . $defense["these_directeur_these_nom"];
            if ($defense["these_codirecteur_these_nom"] != "") {
                echo ' and ' . $this->totitle($defense["these_codirecteur_these_prenom"]) . " " . $defense["these_codirecteur_these_nom"];
            }
        }

        echo "</li>";
    }

    private function display_dt_report_content($defense)
    {
        $year = (int)$defense["niveau_Etud"][0];
        switch ($year) {
            case 1:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ère";
                } else {
                    $year = $year . "st";
                }

                break;
            case 2:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "nde";
                } else {
                    $year = $year . "nd";
                }
                break;
            case 3:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ème";
                } else {
                    $year = $year . "rd";
                }

                break;
            default:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ème";
                } else {
                    $year = $year . "th";
                }

                break;
        }
        echo "<li>";
        if (strcmp($this->langage, "FR") == 0) {
            echo '<a target="_blank" href="https://adum.fr/script/cv.pl?site=CDUBX&matri=' . $defense["Matricule_etudiant"] . '">' . $this->totitle($defense["prenom"]) . ' ' . $defense["nom"] . '</a> ';
            echo  ' (' . $year . ' année) - ';
            echo $defense["these_titre"] . " - ";
            //echo " (".$defense["these_laboratoire"].") ";        
            echo   'sous la direction de ' . $this->totitle($defense["these_directeur_these_prenom"]) . " " . $defense["these_directeur_these_nom"];
            if ($defense["these_codirecteur_these_nom"] != "") {
                echo ' et ' . $defense["these_codirecteur_these_prenom"] . " " . $defense["these_codirecteur_these_nom"];
            }
        } else {
            echo '<a target="_blank" href="https://adum.fr/script/cv.pl?site=CDUBX&matri=' . $defense["Matricule_etudiant"] . '">' . $this->totitle($defense["prenom"]) . ' ' . $defense["nom"] . '</a> ';
            echo  ' (' . $year . ' year) - ';
            echo $defense["these_titre_anglais"] . " - ";
            //echo " (".$defense["these_laboratoire"].") ";        
            echo  'under the supervision of ' . $this->totitle($defense["these_directeur_these_prenom"]) . " " . $defense["these_directeur_these_nom"];
            if ($defense["these_codirecteur_these_nom"] != "") {
                echo ' and ' . $this->totitle($defense["these_codirecteur_these_prenom"]) . " " . $defense["these_codirecteur_these_nom"];
            }
        }

        echo "</li>";
    }

    private function display_csi_report_content($defense)
    {
        $year = (int)$defense["niveau_Etud"][0];
        switch ($year) {
            case 1:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ère";
                } else {
                    $year = $year . "st";
                }

                break;
            case 2:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "nde";
                } else {
                    $year = $year . "nd";
                }
                break;
            case 3:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ème";
                } else {
                    $year = $year . "rd";
                }

                break;
            default:
                if (strcmp($this->langage, "FR") == 0) {
                    $year = $year . "ème";
                } else {
                    $year = $year . "th";
                }

                break;
        }
        echo "<li>";
        if (strcmp($this->langage, "FR") == 0) {
            echo '<a target="_blank" href="https://adum.fr/script/cv.pl?site=CDUBX&matri=' . $defense["Matricule_etudiant"] . '">' . $this->totitle($defense["prenom"]) . ' ' . $defense["nom"] . '</a> ';
            echo  ' (' . $year . ' année) - ';
            echo $defense["these_titre"] . " - ";
            //echo " (".$defense["these_laboratoire"].") ";        
            echo   'sous la direction de ' . $this->totitle($defense["these_directeur_these_prenom"]) . " " . $defense["these_directeur_these_nom"];
            if ($defense["these_codirecteur_these_nom"] != "") {
                echo ' et ' . $defense["these_codirecteur_these_prenom"] . " " . $defense["these_codirecteur_these_nom"];
            }
        } else {
            echo '<a target="_blank" href="https://adum.fr/script/cv.pl?site=CDUBX&matri=' . $defense["Matricule_etudiant"] . '">' . $this->totitle($defense["prenom"]) . ' ' . $defense["nom"] . '</a> ';
            echo  ' (' . $year . ' year) - ';
            echo $defense["these_titre_anglais"] . " - ";
            //echo " (".$defense["these_laboratoire"].") ";        
            echo  'under the supervision of ' . $this->totitle($defense["these_directeur_these_prenom"]) . " " . $defense["these_directeur_these_nom"];
            if ($defense["these_codirecteur_these_nom"] != "") {
                echo ' and ' . $this->totitle($defense["these_codirecteur_these_prenom"]) . " " . $defense["these_codirecteur_these_nom"];
            }
        }

        echo "</li>";
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
                "these_laboratoire",
                "these_specialite"
                ]);
                break;
            }
        }
        
        echo "<pre>" . var_export($student, true) . "</pre>";

        if (!$student) {
                echo "Aucun étudiant ou aucune étudiante correpsondant.";
            
        } else {
                if($user=="PhD"){
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
        
    }

    private function user_view(){
        $val=$this->dec($_REQUEST["code"]);
        if($val){
            $val=explode("-",$val);
            $mat=$val[1];
            $user=$val[2];
            $this->display_report($mat,$user);
        }else{
            echo 'invalid request';
        }
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
