<?php
include "lang.php";
$actionMailing = str_replace("/load_admin_links/","/admin_mailing/",$_SERVER['REQUEST_URI']);
//  $actionRemovePhDReport = str_replace("/load_admin_PhD/","/admin_remove_phd_report/",$_SERVER['REQUEST_URI']);
?>

<p><button id="mailing_button">Supprimer la ligne sélectionnée</button></p>

<table id="mailing" class="display">
    <thead>
        <tr>
            <th></th>
            <?php        
                echo "<th>".$translation["Matricule"]."</th>";
                echo "<th>".$translation["PhD_Nom"]."</th>";
                echo "<th>".$translation["PhD_Prenom"]."</th>";
                echo "<th>".$translation["PhD_ToMail"]."</th>";
            ?>
            <th>Mail pour la direction de thèse</th>
            <th>Mail pour les membres du CSI</th>
        </tr>
    </thead>
    <tbody>
        <?php     
        foreach ($mailing_data as $student) {
            echo "<tr>";
            $csiNames='';
            $csiMails='';
            foreach($student["csi"] as $m){
                $csiNames=$csiNames." ".$m["prenom"]." ".$m["nom"].",";
                $csiMails=$csiMails." ".$m["mail"].",";
            }
            $csiNames=rtrim($csiNames,',');
            $csiMails=rtrim($csiMails,',');

        ?>
            <td class="dt-control" id="entry<?php echo $student['ID'];?>"></td>
            <td><?php echo $student["Matricule_etudiant"];?></td>
            <td><?php echo $student["nom"];?></td>
            <td><?php echo $student["prenom"];?></td>
            <td><i class='far fa-paper-plane' atype='PhD' amail='<?php echo $student["mail_principal"];?>' phdName='<?php echo $student["prenom"].' '.$student["nom"];?>' aname='<?php echo $student["prenom"].' '.$student["nom"];?>' token='<?php echo htmlspecialchars(urlencode($this->enc("csi-".$student["Matricule_etudiant"]."-PhD")));?>'></i> <?php echo $student["mail_principal"];?></td>
            <td><i class='far fa-paper-plane' atype='DT' amail='<?php echo $student["these_directeur_these_mail"];?>' phdName='<?php echo $student["prenom"].' '.$student["nom"];?>' aname='<?php echo $student["these_directeur_these_prenom"].' '.$student["these_directeur_these_nom"];?>' token='<?php echo htmlspecialchars(urlencode($this->enc("csi-".$student["Matricule_etudiant"]."-DT")));?>'></i> <?php echo $student["these_directeur_these_mail"];?></td>
            <td><i class='far fa-paper-plane' atype='CSI' amail='<?php echo $csiMails;?>' phdName='<?php echo $student["prenom"].' '.$student["nom"];?>' aname='<?php echo $csiNames;?>' token='<?php echo htmlspecialchars(urlencode($this->enc("csi-".$student["Matricule_etudiant"]."-CSI")));?>'></i> <?php echo $csiMails;?></td>                        
            </tr>
       <?php  }
        ?>
    </tbody>
</table>

<script type="text/javascript">
$( document ).ready(function() {
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
   

    sleep(2000).then(() => { 
        const table = new DataTable('#mailing');
 
        // Array to track the ids of the details displayed rows
        const detailRows = [];
        $("#mailing_button").on("click",function(){
            var anId=table.row('.selected').data()[1];
            $.post("<?php echo $actionRemovePhDReport; ?>",{id: anId},function(data){
                console.log(data);
                table.row('.selected').remove().draw(false);
            });
        });
        
        table.on('click', 'tbody tr', (e) => {
            let classList = e.currentTarget.classList;
        
            if (classList.contains('selected')) {
                classList.remove('selected');
            }
            else {
                table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
                classList.add('selected');
            }
        });

        $('.fa-paper-plane').on('click',function(e){
            if(e.target.getAttribute('token')) {
                var aType=e.target.getAttribute('atype');
                var aToken=e.target.getAttribute('token');
                var phdName=e.target.getAttribute('phdname');
                var aName=e.target.getAttribute('aname');
                var aMail=e.target.getAttribute('amail');
                console.log(aToken);
                $.post("<?php echo $actionMailing;?>",{token: aToken, type: aType, student:phdName, name: aName, mail: aMail},function(data){
                    console.log(data);
                });
            }
         });
    });
});
</script>