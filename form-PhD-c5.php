<?php
$form = Loader::helper('form');

echo form_open($this->action('form_save_PhDReport'));

print $form->text('firstName', "Andrew", array('style' => 'width: 100%', 'tabindex' => 2));  
print $form->select('favoriteFruit', array('p' => 'Pears', 'a' => 'Apples', 'o' => 'Oranges'), 'a');
echo form_submit('mysubmit', 'Submit Post!');



?>
