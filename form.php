<?php defined('C5_EXECUTE') or die(_("Access Denied."));
if(empty($secretValue)) $secretValue='';
if(empty($keyValues)) $keyValues='';
if(empty($keyDescriptions)) $keyDescriptions='';
if(empty($nbMaxPerRow)) $nbMaxPerRow='4';

?>


<div class="form-group">
	<label class="control-label" for="secretValue">Clé secrète d'encryptage (une fois changée, les URLs générées préalablement ne seront plus bonnes)</label>
	<input type="text" name="secretValue" class="ccm-input-text" value="<?php echo $secretValue; ?>" />
<br/>
	<label class="control-label" for="keyValues">Les valeurs clés à afficher séparées par des ';'</label>
	<input type="text" name="keyValues" class="ccm-input-text" value="<?php echo $keyValues; ?>" />
<br/>
<label class="control-label" for="keyDescriptions">Les descriptions des clés à afficher séparées par des ';'</label>
	<input type="text" name="keyDescriptions" class="ccm-input-text" value="<?php echo $keyDescriptions; ?>" />
	<label class="control-label" for="nbMaxPerRow">Nombre de Key Numbers maximum par ligne d'affichage</label>
	<input type="text" name="nbMaxPerRow" class="ccm-input-text" value="<?php echo $nbMaxPerRow; ?>" />
	
</div>
