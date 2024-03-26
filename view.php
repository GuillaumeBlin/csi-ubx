
<?php defined('C5_EXECUTE') or die(_("Access Denied."));

$actionURL = str_replace('&amp;', '&', $this->action('load'))."?code=".$_GET["code"];
?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />  
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<h1><?php echo $admin;?></h1>
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