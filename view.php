
<?php defined('C5_EXECUTE') or die(_("Access Denied."));

$actionURL = str_replace('&amp;', '&', $this->action('load'))."?code=".$_GET["code"];
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