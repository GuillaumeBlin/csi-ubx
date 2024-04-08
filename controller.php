<?php


namespace Application\Block\CSIUbx;

use DOMDocument;
use Concrete\Core\Block\BlockController;
use Concrete\Core\File\Filesystem;

use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Page\Page;
use \Concrete\Core\Entity\Attribute\Value\Value\SelectValueOption;

use Loader;

class Controller extends BlockController
{

    protected $btTable = "btCSIUbx";
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "240";
    protected $btDefaultSet = 'basic';
    protected $jsonFile = "/../../files/datas_adum/ubx_inscrits.json";

    private function enc($data)
    {
        $cipher = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encrypted = openssl_encrypt($data, $cipher, $this->sKey, 0, $iv, $tag);
        $encrypted = base64_encode($iv . $encrypted);
        return $encrypted;
    }


    private function dec($ciphertext)
    {
        $encrypted = base64_decode($ciphertext);
        $cipher = "AES-256-CBC";
        $iv = substr($encrypted, 0, openssl_cipher_iv_length($cipher));
        $encrypted = substr($encrypted, openssl_cipher_iv_length($cipher));
        $decrypted = openssl_decrypt($encrypted, $cipher, $this->sKey, 0, $iv, $tag);
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


    private function display_phd_report_content($defense)
    {
        include('form-PhD.php');
        echo "<script>
                $('.std-page-main-inner > h1').text('Rapport annuel de la doctorante ou du doctorant ');
                $('.std-page-main-inner > h1').after('<div class=\"block-introduction\">Lecture réservée aux membres du CSI et à la direction de l'ED</div>');";                
        echo "</script>";
        return;
    }

    private function display_dt_report_content($defense)
    {
        include('form-DT.php');
        echo "<script>
                $('.std-page-main-inner > h1').text('Rapport annuel de la direction de thèse');
                $('.std-page-main-inner > h1').after('<div class=\"block-introduction\">A adresser obligatoirement aux membres du CSI avant l’entretien.</div>');";
        echo "</script>";
        return;
    }

    private function display_csi_report_content($defense)
    {
        include('form-CSI.php');
        echo "<script>
                $('.std-page-main-inner > h1').text('Rapport annuel du comité de suivi individuel de thèse');";
        echo "</script>";
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
                "these_directeur_these_nom",
                "these_directeur_these_prenom",
                "csi",
                "INE"
            ]);
        }

        usort($students, array($this, 'students_sorter'));

        $byGroup = $this->group_by("these_ED_code", $students);

        if (!array_key_exists($this->ed, $byGroup)) {
            echo "Aucun étudiant inscrit et aucune étudiante inscrite dans cette école doctorale.";
        } else {
            $mailing_data = $byGroup[$this->ed];
            include('admin_links.php');
        }
    }

    /*Phd students*/
    private function display_report($mat, $user)
    {

        //check if a report already exist for $mat and $user
        $db = \Database::connection();
        //echo 'SELECT Matricule FROM `'.$user.'Report` WHERE Matricule="'.$mat.'";';       
        $statement = $db->executeQuery('SELECT Matricule FROM `' . $user . 'Report` WHERE Matricule="' . $mat . '";');
        //echo $statement->rowCount(); 
        if ($statement->rowCount() > 0) {
            echo "<b>Votre rapport a été enregistré.</b><br/>";
            echo "Il est visible ici : <i class='far fa-file-alt'></i>";
            echo "<script>";
            if ($user == "PhD") { //PhD            
                echo "$('.std-page-main-inner > h1').text('Rapport annuel de la doctorante ou du doctorant');";
            }
            if ($user == "DT") {
                echo "$('.std-page-main-inner > h1').text('Rapport annuel de la direction de thèse');";
            }
            if ($user == "CSI") {
                echo "$('.std-page-main-inner > h1').text('Rapport annuel du comité de suivi individuel de thèse');";
            }
            echo "$('.fa-file-alt').on('click',function(e){";
            if ($user == "PhD") { //PhD            
                echo 'window.open("' . str_replace("/load_user/", "/show_PhDReport/", $_SERVER['REQUEST_URI']) . '", "_blank");';
            }
            if ($user == "DT") {
                echo 'window.open("' . str_replace("/load_user/", "/show_DTReport/", $_SERVER['REQUEST_URI']) . '", "_blank");';
            }
            if ($user == "CSI") {
                echo 'window.open("' . str_replace("/load_user/", "/show_CSIReport/", $_SERVER['REQUEST_URI']) . '", "_blank");';
            }
            echo "  });</script>";
        } else {
            $students = $this->retrieve_json();
            $students = $students["data"][0];
            $student = "";
            foreach ($students as $value) {
                if ($value["Matricule_etudiant"] == $mat) {
                    $student = $this->array_extract($value, [
                        "Matricule_etudiant",
                        "civilite",
                        "nom",
                        "prenom",
                        "these_ED_code",
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
                        "niveau_Etud",
                        "csi",
                        "these_specialite"
                    ]);
                    break;
                }
            }
            if (!$student) {
                echo "Aucun étudiant ou aucune étudiante correpsondant.";
            } else {
                if ($user == "PhD") { //PhD
                    $this->display_phd_report_content($student);
                }
                if ($user == "DT") {
                    $this->display_dt_report_content($student);
                }
                if ($user == "CSI") {
                    $this->display_csi_report_content($student);
                }
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
        // $this->requireAsset("datatables");
    }


    private function user_view()
    {

        $val = $this->dec(str_replace(" ", "+", $_REQUEST["code"])); //bug  à cause des + qui sont transformé en " "
        if ($val) {
            $val = explode("-", $val);
            $mat = $val[1];
            $user = $val[2];
            $this->display_report($mat, $user);
        } else {
            echo 'Invalid request';
        }
        exit;
    }

    public function action_display_links($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $ine=$_REQUEST["ine"];
        $students = $this->retrieve_json();
        $students = $students["data"][0];
        $student = "";
        foreach ($students as $value) {
            if ($value["INE"] == $ine) {
            //if ($value["Matricule_etudiant"] == $ine) {
                $student = $this->array_extract($value, [
                    "Matricule_etudiant",
                    "nom",
                    "prenom",
                    "these_codirecteur_these_nom",
                    "these_codirecteur_these_prenom",
                    "these_codirecteur_these_mail",
                    "these_directeur_these_nom",
                    "these_directeur_these_prenom",
                    "these_directeur_these_mail",
                    "csi"
                ]);
                break;
            }
        }
        if (!$student) {
            echo "Invalid request";
        } else {
            
            $csiNames = '';
            $csiMails = '';
            foreach ($student["csi"] as $m) {
                $csiNames = $csiNames . " " . $m["prenom"] . " " . $m["nom"] . ",";
                $csiMails = $csiMails . " " . $m["mail"] . ",";
            }
            $csiNames = rtrim($csiNames, ',');
            $csiMails = rtrim($csiMails, ',');
            $url="https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi?code=";

            echo "<p>Voici les liens pour remplir les 3 parties du rapport de votre CSI. Il vous faut transmettre les liens correspondants aux différents personnes impliquées dans le CSI. Chaque lien permet de remplir une partie du rapport (Doctorant.e / Direction de thèse / CSI).</p>";
            echo "<ul>";
            echo "<li>Lien pour remplir la partie qui vous est propre : <br/> <a href='".$url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD")))."'>";
            echo $url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD")))."</a>";
            echo "</li>";
            echo "<li>Lien à destination de votre direction de thèse (".$student["these_directeur_these_prenom"] . ' ' . $student["these_directeur_these_nom"]." - ".$student["these_directeur_these_mail"].") : <br/> <a href='".$url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT")))."'>";
            echo $url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT")))."</a>";
            echo "</li>";
            echo "<li>Lien à destination du référent de votre CSI (".$csiNames." - ".$csiMails.") : <br/><a href='".$url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI")))."'>";
            echo $url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI")))."</a>";
            echo "</li>";
            echo "</ul>";
        }

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


    private function action_admin_remove_from_report($bID = false,$type)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $id = $_REQUEST["id"];
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `'.$type.'Report` WHERE `ID` = ?;', array(intval($id)));
        echo $statement->rowCount() . " entrée a bien été supprimée de la table";
        exit;
    }

    public function action_admin_remove_phd_report($bID = false)
    {
        $this->action_admin_remove_from_report($bID,'PhD');
    }

    public function action_admin_remove_dt_report($bID = false)
    {
        $this->action_admin_remove_from_report($bID,'DT');
    }

    public function action_admin_remove_csi_report($bID = false)
    {
        $this->action_admin_remove_from_report($bID,'CSI');
    }


    private function action_show_Report($bID = false, $type)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $val = $this->dec(str_replace(" ", "+", $_REQUEST["code"])); //bug  à cause des + qui sont transformé en " "
        $val = explode("-", $val);
        $mat = $val[1];
        $db = \Database::connection();
        $statement = $db->executeQuery('SELECT * FROM `'.$type.'Report` WHERE Matricule="' . $mat . '";');
        $report_data = $statement->fetchAll();
        $report = $report_data[0];
        include('report-'.$type.'.php');
        exit;
    }

    public function action_show_PhDReport($bID = false)
    {
        $this->action_show_Report($bID,'PhD');        
    }

    public function action_show_DTReport($bID = false)
    {
        $this->action_show_Report($bID,'DT');        
    }

    public function action_show_CSIReport($bID = false)
    {
        $this->action_show_Report($bID,'CSI');        
    }

    private function action_form_save_Report($bID = false,$type)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $val = $this->dec(str_replace(" ", "+", $_REQUEST["code"])); //bug  à cause des + qui sont transformé en " "
        $val = explode("-", $val);
        $mat = $val[1];

        $report = $_REQUEST;
        array_shift($report);
        $db = \Database::connection();
        $fields = '';
        $values = '';
        foreach (array_keys($report) as $e) {
            $fields = $fields . "`" . $e . "`,";
            $values = $values . '?,';
        }
        $values = $values . '?';
        $fields = $fields . "`Matricule`";

        $sql = 'INSERT INTO `'.$type.'Report` ( ' . $fields . ')VALUES (' . $values . ');';
        $report["Matricule"] = intval($mat);
        $statement = $db->executeQuery($sql, array_values($report));
        $userPage = preg_replace("%/form_save_".$type."Report/\d+%", "/", $_SERVER['REQUEST_URI']);
        $this->redirect($userPage);
        exit;
    }

    public function action_form_save_DTReport($bID = false)
    {
        $this->action_form_save_Report($bID,'DT');
    }

    public function action_form_save_PhDReport($bID = false)
    {
        $this->action_form_save_Report($bID,'PhD');        
    }

    public function action_form_save_CSIReport($bID = false)
    {
        $this->action_form_save_Report($bID,'CSI');        
    }

    private function admin_view($type)
    {
        $db = \Database::connection();
        $statement = $db->executeQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$type."Report';");
        $report_headers = $statement->fetchAll(); //print_r($rows);

        $statement = $db->executeQuery('SELECT * FROM `'.$type.'Report` WHERE ed='.$this->ed.';');
        //echo 'SELECT * FROM `'.$type.'Report` WHERE ed='.$this->ed.';';
        $report_data = $statement->fetchAll(); //print_r($rows);
        include("admin-".$type."-report.php");
        exit;
    }


    public function action_load_admin_links($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $this->display_list();
        exit;
    }

    public function action_load_admin_PhD($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $this->admin_view('PhD');
        exit;
    }

    public function action_load_admin_DT($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $this->admin_view('DT');
        exit;
    }

    public function action_load_admin_CSI($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $this->admin_view('CSI');        
        exit;
    }

    private function emptyDB()
    {
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `PhDReport` WHERE `ID` IN (SELECT `ID` FROM `PhDReport`);', array());
        echo $statement->rowCount();
    }
}
