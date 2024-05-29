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

    private function oldenc($data)
    {
        $cipher = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encrypted = openssl_encrypt($data, $cipher, $this->sKey, 0, $iv);
        $encrypted = base64_encode($iv . $encrypted);
        return $encrypted;
    }

    private function enc($data)
    {
        $cipher = "AES-256-CBC";
        $encrypted = "+==";
        while (!ctype_alnum(substr($encrypted, 0, -2))) {
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
            $encrypted = openssl_encrypt($data, $cipher, $this->sKey, 0, $iv);
            $encrypted = base64_encode($iv . $encrypted);
        }
        return $encrypted;
    }


    private function dec($ciphertext)
    {

        $encrypted = base64_decode($ciphertext);
        $cipher = "AES-256-CBC";
        $iv = substr($encrypted, 0, openssl_cipher_iv_length($cipher));
        if(strlen($iv)<openssl_cipher_iv_length($cipher)){
            return false;
        }
        $encrypted = substr($encrypted, openssl_cipher_iv_length($cipher));
        $decrypted = openssl_decrypt($encrypted, $cipher, $this->sKey, 0, $iv);
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


    private function display_phd_report_content($report)
    {
        $lang = $this->langage;
        include('form-PhD.php');
        echo "<!--";
        //  var_dump($report);
        echo "-->";
        echo "<script>";
        if (strcmp($this->langage, "FR") == 0) {
            echo "$('.std-page-main-inner > h1').text('Rapport annuel de la doctorante ou du doctorant ');            
            $('.std-page-main-inner > h1').after('<div class=\"block-introduction\">Lecture réservée aux membres du CSI et à la direction de l\'ED. A adresser obligatoirement aux membres du CSI avant l\'entretien.</div>');";
            if (strcmp($report['ReadOnly'], '') != 0) {
                echo "$('.std-page-main-inner > h1').before('<div class=\"block-introduction\" style=\"color:red\">Votre rapport a été enregistré.</div>');";
            }
        } else {
            echo "$('.std-page-main-inner > h1').text('Annual report of the PhD student ');
            $('.std-page-main-inner > h1').after('<div class=\"block-introduction\">For CSI member and ED directors discretion only. To fullfilled and send to the CSI commitee before its meeting</div>');";
        }
        echo "</script>";
        return;
    }

    private function display_dt_report_content($report)
    {
        include('form-DT.php');
        echo "<script>";
        if (strcmp($this->langage, "FR") == 0) {
            echo "
                $('.std-page-main-inner > h1').text('Rapport annuel de la direction de thèse');
                $('.std-page-main-inner > h1').after('<div class=\"block-introduction\">A adresser obligatoirement aux membres du CSI avant l\'entretien.</div>');";
            if (strcmp($report['ReadOnly'], '') != 0) {
                echo "$('.std-page-main-inner > h1').before('<div class=\"block-introduction\" style=\"color:red\">Votre rapport a été enregistré.</div>');";
            }
        } else {
            echo "
                $('.std-page-main-inner > h1').text('Annual report ot the supervisor');
                $('.std-page-main-inner > h1').after('<div class=\"block-introduction\">To fullfilled and send to the CSI commitee before its meeting.</div>');";
        }
        echo "</script>";
        return;
    }

    private function display_csi_report_content($report)
    {
        include('form-CSI.php');
        echo "<script>";
        if (strcmp($this->langage, "FR") == 0) {
            echo "
                $('.std-page-main-inner > h1').text('Rapport annuel du comité de suivi individuel de thèse');";
            if (strcmp($report['ReadOnly'], '') != 0) {
                echo "$('.std-page-main-inner > h1').before('<div class=\"block-introduction\" style=\"color:red\">Votre rapport a été enregistré.</div>');";
            }
        } else {
            echo "
                $('.std-page-main-inner > h1').text('Annual report of the CSI');";
        }
        echo "</script>";
        return;
    }

    /* SORTING functions */
    private function students_sorter(array $a, array $b)
    {
        return [$a['these_ED_code'],  $a['nom']] <=> [$b['these_ED_code'], $b['nom']];
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

        $statement = $db->executeQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'" . $user . "Report';");
        $report_headers = $statement->fetchAll(); //print_r($rows);

        //$statement = $db->executeQuery('DELETE FROM `'.$user.'Report` WHERE Matricule="136196";');       
        $statement = $db->executeQuery('SELECT * FROM `' . $user . 'Report` WHERE Matricule="' . $mat . '";');

        $report_data = $statement->fetchAll();

        //echo $statement->rowCount(); 
        if (($statement->rowCount() > 0) && (strcmp($report_data[0]['ReadOnly'], "Oui") == 0)) {
            if (strcmp($this->langage, "FR") == 0) {
                echo "<b>Votre rapport définitif a été enregistré.</b><br/>";
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
            } else {
                echo "<b>Your report has been succesfully recorded.</b><br/>";
                echo "You can retrieve it here : <i class='far fa-file-alt'></i>";
                echo "<script>";
                if ($user == "PhD") { //PhD            
                    echo "$('.std-page-main-inner > h1').text('Annual report of the PhD student');";
                }
                if ($user == "DT") {
                    echo "$('.std-page-main-inner > h1').text('Annual report ot the supervisor');";
                }
                if ($user == "CSI") {
                    echo "$('.std-page-main-inner > h1').text('Annual report of the CSI');";
                }
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
            if ($statement->rowCount() > 0) {
                $report = $report_data[0];
                $lang = $this->langage;
            } else {
                $report = array();
            }
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
                exit;
            } else {
                $report["ed"] = $student["these_ED_code"];
                $report["PhD_Nom"] = $student["nom"];
                $report["PhD_Prenom"] = $student["prenom"];
                $report["PhD_Mail"] = $student["mail_secondaire"];
                $report["PhD_Specialite"] = $student["these_specialite"];
                $report["PhD_UMR"] = $student["these_laboratoire"];
                $report["DT_Nom"] = $student["these_directeur_these_nom"];
                $report["DT_Prenom"] = $student["these_directeur_these_prenom"];
                $report["CODT_Nom"] = $student["these_codirecteur_these_nom"];
                $report["CODT_Prenom"] = $student["these_codirecteur_these_prenom"];
                $report["PhD_DateDebutThese"] = date('Y-m-d', strtotime($student["these_date_1inscription"]));
                $report["PhD_Cotutelle"] = ucfirst(strtolower($student["these_cotutelle"]));
                $report["PhD_Cotutelle_Pays"] = $student["these_cotutelle_pays"];
                $report["PhD_CSI_Annee"] = intval(substr($student["niveau_Etud"], 0, 1)) + 1;
                $report["niveau_Etud"] = $student["niveau_Etud"];
                $report["CSI_Membre_Nombre"] = min(count($student["csi"]), 5);
                for ($i = 0; $i < min(count($student["csi"]), 5); $i = $i + 1) {
                    $report["CSI_Membre_" . ($i + 1) . "_Nom"] = $student["csi"][$i]["nom"];
                    $report["CSI_Membre_" . ($i + 1) . "_Prenom"] = $student["csi"][$i]["prenom"];
                    $report["CSI_Membre_" . ($i + 1) . "_mail"] = $student["csi"][$i]["mail"];
                    $report["CSI_Referent_" . ($i + 1)] = $student["csi"][$i]["referent"];
                    $report["CSI_Membre_" . ($i + 1) . "_specialiste"] = $student["csi"][$i]["membre_specialiste"];
                    $report["CSI_Membre_" . ($i + 1) . "_non_specialiste"] = $student["csi"][$i]["membre_non_specialiste"];
                    $report["CSI_Membre_" . ($i + 1) . "_externe"] = $student["csi"][$i]["membre_exterieur"];
                }
            }
            if ($statement->rowCount() == 0) {
                foreach ($report_headers as $row) {
                    if (!array_key_exists($row["COLUMN_NAME"], $report)) {
                        $report[$row["COLUMN_NAME"]] = '';
                    }
                }
            }

            if ($user == "PhD") { //PhD
                $this->display_phd_report_content($report);
            }
            if ($user == "DT") {
                $this->display_dt_report_content($report);
            }
            if ($user == "CSI") {
                $this->display_csi_report_content($report);
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
            if (strcmp($user, "DT") == 0) {
                if((!array_key_exists("pp",$_REQUEST))||($_REQUEST["pp"]!=$this->pwd)){
                    echo 'Invalid request';
                    exit;
                }
            }
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
        $ine = $_REQUEST["ine"];
        $students = $this->retrieve_json();
        $students = $students["data"][0];
        $student = "";
        foreach ($students as $value) {
            if ($value["INE"] == $ine) {
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
                    "csi",
                    "passphrase"
                ]);
                break;
            }
        }
        if (!$student) {
            echo "Invalid request";
        } else {

            //echo "<script>if(prompt(\"Veuillez fournir le mot de passe personnel disponible sur votre profil ADUM (haut de la page sous l'intitulé 'Pass CSI Bordeaux :') pour accéder à cette page.\")!='" . $student["passphrase"] . "'){window.location.replace('https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi');\$('body').empty();}</script>";
            
            if((!array_key_exists("pp",$_REQUEST))||($_REQUEST["pp"]!=$student["passphrase"])){
                echo 'Invalid request';
                //Please check that you indeed came through the page https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi
                exit;
            }

            $csiNames = '';
            $csiMails = '';
            foreach ($student["csi"] as $m) {
                $csiNames = $csiNames . " " . $m["prenom"] . " " . $m["nom"] . ",";
                $csiMails = $csiMails . " " . $m["mail"] . ",";
            }
            $csiNames = rtrim($csiNames, ',');
            $csiMails = rtrim($csiMails, ',');
            if (strcmp($this->langage, "FR") == 0) {
                $url = "https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi?code=";

                echo "<p>Voici les liens pour remplir les 3 parties du rapport de votre CSI. Il vous faut transmettre les liens correspondants aux différents personnes impliquées dans le CSI. Chaque lien permet de remplir une partie du rapport (Doctorant.e / Direction de thèse / CSI).</p>";
                echo "<ul>";
                $lphd = $url . htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD")));
                echo "<li>Lien pour remplir la partie qui vous est propre : <br/> <a href='" . $lphd . "'>";
                echo $lphd . "</a>";
                echo "</li>";
                $ldt = $url . htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT")));
                echo "<li>Lien à destination de votre direction de thèse (" . $student["these_directeur_these_prenom"] . ' ' . $student["these_directeur_these_nom"] . " - " . $student["these_directeur_these_mail"] . ") : <br/> <a href='" . $ldt . "'>";
                echo $ldt . "</a>";
                echo "</li>";
                $lcsi = $url . htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI")));
                echo "<li>Lien à destination du référent de votre CSI (" . $csiNames . " - " . $csiMails . ") : <br/><a href='" . $lcsi . "'>";
                echo $lcsi . "</a>";
                echo "</li>";
                echo "</ul>";
            } else {
                $url = "https://doctorat.u-bordeaux.fr/en/csi-report-filling-page?code=";

                echo "<p>Here are links in order for each part of the CSI commitee (PhD student, Supervisor and CSI commitee) to fill out its content of the CSI report. You need to send the corresponding links to each member involved in your CSI. Each link allows to fill out a part of the report (PhD student / Supervisor / CSI).</p>";
                echo "<ul>";
                $lphd = $url . htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD")));
                echo "<li>Link for filling out the PhD student part : <br/> <a href='" . $lphd . "'>";
                echo $lphd . "</a>";
                echo "</li>";
                $ldt = $url . htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT")));
                echo "<li>Link for filling out the Supervisor part (" . $student["these_directeur_these_prenom"] . ' ' . $student["these_directeur_these_nom"] . " - " . $student["these_directeur_these_mail"] . ") : <br/> <a href='" . $ldt . "'>";
                echo $ldt . "</a>";
                echo "</li>";
                $lcsi = $url . htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI")));
                echo "<li>Link for filling out the CSI commitee part (" . $csiNames . " - " . $csiMails . ") : <br/><a href='" . $lcsi . "'>";
                echo $lcsi . "</a>";
                echo "</li>";
                echo "</ul>";
            }
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


    private function action_admin_remove_from_report($bID = false, $type)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $id = $_REQUEST["id"];
        $db = \Database::connection();
        $statement = $db->executeQuery('DELETE FROM `' . $type . 'Report` WHERE `ID` = ?;', array(intval($id)));
        echo $statement->rowCount() . " entrée a bien été supprimée de la table";
        exit;
    }

    public function action_admin_remove_phd_report($bID = false)
    {
        $this->action_admin_remove_from_report($bID, 'PhD');
    }

    public function action_admin_remove_dt_report($bID = false)
    {
        $this->action_admin_remove_from_report($bID, 'DT');
    }

    public function action_admin_remove_csi_report($bID = false)
    {
        $this->action_admin_remove_from_report($bID, 'CSI');
    }


    private function action_show_Report($bID = false, $type)
    {
        if ($this->bID != $bID) {
            return false;
        }
        if ($_REQUEST["code"]) {
            $val = $this->dec(str_replace(" ", "+", $_REQUEST["code"])); //bug  à cause des + qui sont transformé en " "
            if ($val) {

                $val = explode("-", $val);
                $mat = $val[1];
                $db = \Database::connection();
                $statement = $db->executeQuery('SELECT * FROM `' . $type . 'Report` WHERE Matricule="' . $mat . '";');
                $report_data = $statement->fetchAll();
                $report = $report_data[0];
                $lang = $this->langage;
                include('report-' . $type . '.php');
            } else {
                echo 'Invalid request';
            }
        } else {
            return false;
        }
        exit;
    }

    public function action_show_PhDReport($bID = false)
    {
        $this->action_show_Report($bID, 'PhD');
    }

    public function action_show_DTReport($bID = false)
    {
        $this->action_show_Report($bID, 'DT');
    }

    public function action_show_CSIReport($bID = false)
    {
        $this->action_show_Report($bID, 'CSI');
    }

    private function action_form_save_Report($bID = false, $type)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $val = $this->dec(str_replace(" ", "+", $_REQUEST["code"])); //bug  à cause des + qui sont transformé en " "
        if ($val) {
            $val = explode("-", $val);
            $mat = $val[1];

            $report = $_REQUEST;
            unset($report["pp"]);
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
            $statement = $db->executeQuery('DELETE FROM `' . $type . 'Report` WHERE `Matricule`=' . intval($mat) . ';', array());

            $sql = 'INSERT INTO `' . $type . 'Report` ( ' . $fields . ')VALUES (' . $values . ');';
            $report["Matricule"] = intval($mat);
            //echo $report["ReadOnly"];
            $statement = $db->executeQuery($sql, array_values($report));
            $userPage = preg_replace("%/form_save_" . $type . "Report/\d+%", "/", $_SERVER['REQUEST_URI']);
            $this->redirect($userPage);
        } else {
            echo 'Invalid request';
        }
        exit;
    }

    public function action_form_save_DTReport($bID = false)
    {
        $this->action_form_save_Report($bID, 'DT');
    }

    public function action_form_save_PhDReport($bID = false)
    {
        $this->action_form_save_Report($bID, 'PhD');
    }

    public function action_form_save_CSIReport($bID = false)
    {
        $this->action_form_save_Report($bID, 'CSI');
    }

    private function admin_view($type)
    {
        $db = \Database::connection();
        $statement = $db->executeQuery("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'" . $type . "Report';");
        $report_headers = $statement->fetchAll(); //print_r($rows);

        $statement = $db->executeQuery('SELECT * FROM `' . $type . 'Report` WHERE ed=' . $this->ed . ';');
        //echo 'SELECT * FROM `'.$type.'Report` WHERE ed='.$this->ed.';';
        //$statement = $db->executeQuery('DELETE FROM PhDReport WHERE `ID` = 1435;');
        $report_data = $statement->fetchAll(); //print_r($rows);
        include("admin-" . $type . "-report.php");
        exit;
    }

    public function action_load_admin_DT_pwd($bID = false)
    {
        if ($this->bID != $bID) {
            return false;
        }
        $db = \Database::connection();
        $statement = $db->executeQuery("SELECT pwd FROM btCSIUbx WHERE pwd!='' LIMIT 1;");
        $rows = $statement->fetchAll();
        echo $rows[0]['pwd'];
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
