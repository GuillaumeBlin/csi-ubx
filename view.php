
<?php defined('C5_EXECUTE') or die(_("Access Denied."));


if($admin =='True'){
  $actionURLLinks = str_replace('&amp;', '&', $this->action('load_admin_links'))."?code=".$_GET["code"];
  $actionURLPhD = str_replace('&amp;', '&', $this->action('load_admin_PhD'))."?code=".$_GET["code"];
  $actionURLDT = str_replace('&amp;', '&', $this->action('load_admin_DT'))."?code=".$_GET["code"];
  $actionURLCSI = str_replace('&amp;', '&', $this->action('load_admin_CSI'))."?code=".$_GET["code"];
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />  
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<h1 onclick="$('#admin-links-display-<?php echo $bID;?>').toggle();"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
  <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707"/>
</svg> Liens de connection</h1>

<div id="admin-links-display-<?php echo $bID;?>" style="display:none">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<h1 onclick="$('#admin-PhD-display-<?php echo $bID;?>').toggle();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
  <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707"/>
</svg> Rapport des doctorantes et doctorantes</h1>
<div id="admin-PhD-display-<?php echo $bID;?>">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<h1 onclick="$('#admin-DT-display-<?php echo $bID;?>').toggle();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
  <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707"/>
</svg> Rapport des directions de thèse</h1>
<div id="admin-DT-display-<?php echo $bID;?>">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<h1 onclick="$('#admin-CSI-display-<?php echo $bID;?>').toggle();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
  <path d="M14 16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM5.904 5.197 10 9.293V6.525a.5.5 0 0 1 1 0V10.5a.5.5 0 0 1-.5.5H6.525a.5.5 0 0 1 0-1h2.768L5.197 5.904a.5.5 0 0 1 .707-.707"/>
</svg> Rapport des comités de CSI</h1>
<div id="admin-CSI-display-<?php echo $bID;?>">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<script>
$.post("<?php echo $actionURLLinks; ?>",{},function(data){
    $( "#admin-links-display-<?php echo $bID;?>" ).html(data);
});
$.post("<?php echo $actionURLPhD; ?>",{},function(data){
    $( "#admin-PhD-display-<?php echo $bID;?>" ).html(data);
});
$.post("<?php echo $actionURLDT; ?>",{},function(data){
    $( "#admin-DT-display-<?php echo $bID;?>" ).html(data);
});
$.post("<?php echo $actionURLCSI; ?>",{},function(data){
    $( "#admin-CSI-display-<?php echo $bID;?>" ).html(data);
});
</script>
<?php
}else{
  $actionURL = str_replace('&amp;', '&', $this->action('load_user'))."?code=".$_GET["code"];
?>
<div id="csi-display-<?php echo $bID;?>">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<script>
$.post("<?php echo $actionURL; ?>",{},function(data){
    $( "#csi-display-<?php echo $bID;?>" ).html(data);
});
</script>
<?php
}
?>