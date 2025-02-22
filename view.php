<?php defined('C5_EXECUTE') or die(_("Access Denied."));

 function dec($ciphertext,$k)
    {

        $encrypted = base64_decode($ciphertext);
        $cipher = "AES-256-CBC";
        $iv = substr($encrypted, 0, openssl_cipher_iv_length($cipher));
        if(strlen($iv)<openssl_cipher_iv_length($cipher)){
            return false;
        }
        $encrypted = substr($encrypted, openssl_cipher_iv_length($cipher));
        $decrypted = openssl_decrypt($encrypted, $cipher, $k, 0, $iv);
        return $decrypted;
    }

if ($admin == 'True') {
  $actionURLLinks = str_replace('&amp;', '&', $this->action('load_admin_links'));
  $actionURLPhD = str_replace('&amp;', '&', $this->action('load_admin_PhD'));
  $actionURLDT = str_replace('&amp;', '&', $this->action('load_admin_DT'));
  $actionURLCSI = str_replace('&amp;', '&', $this->action('load_admin_CSI'));
  $actionURLDTPwd = str_replace('&amp;', '&', $this->action('load_admin_DT_pwd'));
?>

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js"></script>
  <script src="https://cdn.datatables.net/select/2.0.0/js/select.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>

  <h3>Formulaires vides</h3>
  <p>Formulaire vide qui ne sera pas enregistré dans la base. A n'utiliser qu'en cas de gros problèmes : 
    une doctorante ou un doctorant qui n'aurait pas effectué sont CSI et qui ne serait pas encore inscrite ou 
    inscrit en année courante (cas rare normalement)</p>
    <ul>
    <li>Doctorante ou doctorant : https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi/show_EmptyPhDReport</li>
    <li>Direction de thèse : https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi/show_EmptyDTReport</li>
    <li>CSI : https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi/show_EmptyCSIReport</li>
</ul>
  <h3>Mots de passes nécessaires pour utiliser leur lien</h3>
Tous les usagers (doctorant, doctorante, directeur, directrice et membre du CSI) ont une passphrase accessible sur leur profil adum (haut de la page sous l'intitulé 'Pass CSI Bordeaux :') </h3>
  <p>Les doctorantes et doctorants peuvent obtenir les liens de saisies, qu'elle ou il doit transmettre 
    aux différentes parties en accédant à l'url suivante et en remplacant <code>MONINE</code> par son INE</p>
    <p>https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi?ine=MONINE</p>
    ou 
    <p>https://doctorat.u-bordeaux.fr/en/csi-report-filling-page?ine=MONINE</p>
    pour la version en anglais
  <h3 onclick="$('#admin-links-display-<?php echo $bID; ?>').toggle();"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
      <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707" />
    </svg> Liens de connexion</h3>

  <div id="admin-links-display-<?php echo $bID; ?>" style="display:none">
    <div class="d-flex align-items-center">
      <strong>Loading...</strong>
      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>
  </div>
  <h3 onclick="$('#admin-PhD-display-<?php echo $bID; ?>').toggle();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
      <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707" />
    </svg> Rapport des doctorantes et doctorantes</h3>
    
  <div id="admin-PhD-display-<?php echo $bID; ?>" style="display:none">
    <div class="d-flex align-items-center">
      <strong>Loading...</strong>
      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>
  </div>
  <h3 onclick="$('#admin-DT-display-<?php echo $bID; ?>').toggle();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
      <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707" />
    </svg> Rapport des directions de thèse</h3>
  <div id="admin-DT-display-<?php echo $bID; ?>" style="display:none">
    <div class="d-flex align-items-center">
      <strong>Loading...</strong>
      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>
  </div>
  <h3 onclick="$('#admin-CSI-display-<?php echo $bID; ?>').toggle();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
      <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707" />
    </svg> Rapport des comités de CSI</h3>
  <div id="admin-CSI-display-<?php echo $bID; ?>" style="display:none">
    <div class="d-flex align-items-center">
      <strong>Loading...</strong>
      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>
  </div>
  <script>
    $.post("<?php echo $actionURLLinks; ?>", {}, function(data) {
      $("#admin-links-display-<?php echo $bID; ?>").html(data);
    });
    $.post("<?php echo $actionURLPhD; ?>", {}, function(data) {
      
      $("#admin-PhD-display-<?php echo $bID; ?>").html(data);
    });
    $.post("<?php echo $actionURLDT; ?>", {}, function(data) {
      $("#admin-DT-display-<?php echo $bID; ?>").html(data);
    });
    $.post("<?php echo $actionURLCSI; ?>", {}, function(data) {
      $("#admin-CSI-display-<?php echo $bID; ?>").html(data);
    });
    $.post("<?php echo $actionURLDTPwd; ?>", {}, function(data) {
      $("#admin-DT-pwd").html(data);
    });
  </script>
<?php
} else {

  if(isset($_GET['code'])){
    $actionURL = str_replace('&amp;', '&', $this->action('load_user')) . "?code=" . $_GET["code"];
  }

  if(isset($_GET['ine'])){
    $ine=$_GET['ine'];
    if(strcmp($ine, "MONINE") === 0){
      echo "<script>alert('Merci de remplacer MONINE par votre réel INE');";
      echo "$('.std-page-main-inner > h1').text('Invalid page');</script>";
      return;
    }
    $actionURL = str_replace('&amp;', '&', $this->action('display_links')) . "?ine=" . $_GET["ine"];
  }
  /*if(isset($_GET['pwd'])){
    $actionURL =$actionURL."&pwd=".$_GET["pwd"];
  }*/
  if(isset($_GET['ine'])||isset($_GET['code'])){
?>
  <div id="csi-display-<?php echo $bID; ?>">
    <div class="d-flex align-items-center">
      <strong>Loading...</strong>
      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>
  </div>
  <script>
    var cmp="&pp=";
    <?php 
    if(isset($_GET['ine'])){
    ?>
      cmp="&pp="+prompt("Veuillez fournir le mot de passe personnel disponible sur votre profil ADUM (haut de la page sous l'intitulé 'Pass CSI Bordeaux :') pour accéder à cette page.");
    <?php 
    }
    ?>
    <?php 
    if(isset($_GET['code'])){
      $val = dec($_GET["code"],$sKey);
      if ($val) {
        $val = explode("-", $val);
        $mat = $val[1];
        $user = $val[2];
        //if ((strcmp($user, "DT") == 0)||(strcmp($user, "CSI") == 0)) {
    ?>                
           cmp="&pp="+prompt("Veuillez fournir le mot de passe personnel disponible sur votre profil ADUM (haut de la page sous l'intitulé 'Pass CSI Bordeaux :') pour accéder à cette page.");
    <?php
        //}        
      }    
    }
    ?>
    $.post("<?php echo $actionURL; ?>"+cmp, {}, function(data) {
      $("#csi-display-<?php echo $bID; ?>").html(data);
    });
  </script>
<?php
  }else{
    echo "<script>$('.std-page-main-inner > h1').text('Invalid page');</script>";
  }
}
?>