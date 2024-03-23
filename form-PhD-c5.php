<form action="<?php echo str_replace("/load/","/form_save_PhDReport/",$_SERVER['REQUEST_URI']);?>" method="POST">
    <input type="text" class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $defense["nom"];?>">
    <input type="submit" class="btn primary" value="Submit">
    </form>