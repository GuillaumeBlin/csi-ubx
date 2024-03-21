<?php defined('C5_EXECUTE') or die(_("Access Denied."));
$method = "AES-256-CBC";

function decrypt($encrypted){
// Decode the encrypted data
$encrypted = base64_decode($encrypted);

// Extract the IV and the encrypted data
$iv = substr($encrypted, 0, openssl_cipher_iv_length($method));
$encrypted = substr($encrypted, openssl_cipher_iv_length($method));

// Decrypt the data
$decrypted = openssl_decrypt($encrypted, $method, $secretValue, 0, $iv);

// Display the decrypted data
echo "Decrypted: ".$decrypted."\n";
}
?>

<div class="home-key-numbers-inner" id="kn-display-<?php echo $bID;?>">
<?php
$arrayValues = explode(';', $keyValues);
$arrayDescriptions = explode(';', $keyDescriptions);
$nbKN = count($arrayValues);

for($i=0;$i<$nbKN;$i++){
  if($i%$nbMaxPerRow==0){
    if($i>0){
      echo "</ul>";  
    }
    echo "<ul>";
  }
?>
    <li>
      <div class="home-key-numbers-item">
        <strong class="home-key-numbers-item-number countup countup-block" data-value="<?php echo $arrayValues[$i]?>"><?php echo $arrayValues[$i]?></strong>
        <p class="home-key-numbers-item-title"><?php echo $arrayDescriptions[$i]?></p>
        <p class="home-key-numbers-item-subtitle"></p>
      </div>
    </li>

<?php
}
?> 
</ul></div>
