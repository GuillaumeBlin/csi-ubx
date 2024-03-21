<?php defined('C5_EXECUTE') or die(_("Access Denied."));

$codes = array(""=>"CED","41" => "ED Droit", "42" => "ED Entreprise Economie Société", "40" => "ED Sciences Chimiques", "154" => "ED Sciences de la Vie et de la Santé", "304" => "ED Sciences et environnements", "209" => "ED Sciences Physiques et de l'Ingénieur", "545" => "ED Sociétés, Politique, Santé Publique", "39" => "ED Mathématiques et Informatique");

if(empty($fKey)) $fKey=base64_encode(openssl_random_pseudo_bytes(32));
if(empty($sKey)) $sKey=base64_encode(openssl_random_pseudo_bytes(64));
if(empty($admin)) $admin='False';
if(empty($ed)) $ed=null;

?>


<div class="form-group">
	<input type="hidden" name="fKey" class="ccm-input-text" value="<?php echo $fKey; ?>" />
	<input type="hidden" name="sKey" class="ccm-input-text" value="<?php echo $sKey; ?>" />
	<br/>
	<label class="control-label" for="filter">ED <sup class="fas fa-asterisk"></sup></label>
	<select id="ed" name="d" class="ccm-input-select">
		<option value="-1">Aucun</option> 
		<?php foreach ($codes as $key => $opt) { ?>
			<option value="<?php echo $key; ?>" <?php if (strcmp($ed, $key) === 0) { ?>selected<?php } ?>> <?php echo $opt; ?></option>
		<?php } ?>
	</select>
	<br/>
	<label class="control-label" for="details">Affichage gestionnaire</label>
	<select id="admin" name="admin" class="ccm-input-select">		
		<option value="True" <?php if (strcmp($admin, "True") === 0) { ?>selected<?php } ?>> Oui</option>
		<option value="False" <?php if (strcmp($admin, "False") === 0) { ?>selected<?php } ?>> Non</option>
	</select>
</div>
