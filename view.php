
<?php defined('C5_EXECUTE') or die(_("Access Denied."));


if($admin =='True'){
  $actionURLLinks = str_replace('&amp;', '&', $this->action('load_admin_links'))."?code=".$_GET["code"];
  $actionURLPhD = str_replace('&amp;', '&', $this->action('load_admin_PhD'))."?code=".$_GET["code"];
  $actionURLDT = str_replace('&amp;', '&', $this->action('load_admin_DT'))."?code=".$_GET["code"];
  $actionURLCSI = str_replace('&amp;', '&', $this->action('load_admin_CSI'))."?code=".$_GET["code"];
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />  
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<h1 onclick="$('#admin-links-display-<?php echo $bID;?>').toggle();"> Liens de connection</h1>

<div id="admin-links-display-<?php echo $bID;?>" style="display:none">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<h1 onclick="$('#admin-PhD-display-<?php echo $bID;?>').toggle();">Rapport des doctorantes et doctorantes</h1>
<div id="admin-PhD-display-<?php echo $bID;?>">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<h1 onclick="$('#admin-DT-display-<?php echo $bID;?>').toggle();">Rapport des directions de thèse</h1>
<div id="admin-DT-display-<?php echo $bID;?>">
  <div class="d-flex align-items-center">
    <strong>Loading...</strong>
    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
  </div>
</div>
<h1 onclick="$('#admin-CSI-display-<?php echo $bID;?>').toggle();">Rapport des comités de CSI</h1>
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