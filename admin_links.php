<?php
include "lang.php";
$url="https://doctorat.u-bordeaux.fr/page-de-saisie-des-rapports-de-csi?code=";
?>

<table id="mailing" class="display">
    <thead>
        <tr>
            <?php
            echo "<th>" . $translation["Matricule"] . "</th>";
            echo "<th>" . $translation["PhD_Nom"] . "</th>";
            echo "<th>" . $translation["PhD_Prenom"] . "</th>";
            echo "<th>" . $translation["PhD_Link"] . "</th>";
            echo "<th>" . $translation["DT_Link"] . "</th>";
            echo "<th>" . $translation["CSI_Link"] . "</th>";
            ?>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mailing_data as $student) { ?>
            <tr>
            <td><?php echo $student["Matricule_etudiant"]; ?></td>
            <td><?php echo $student["nom"]; ?></td>
            <td><?php echo $student["prenom"]; ?></td>
            <td><i class="fas fa-link csi-link" onclick="csiLink(this);" url="<?php echo $url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD"))); ?>" alt="Cliquer pour copier le lien"></i> </td>
            <td><i class="fas fa-link csi-link" onclick="csiLink(this);" url="<?php echo $url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT"))); ?>" alt="Cliquer pour copier le lien"></i> </td>
            <td><i class="fas fa-link csi-link" onclick="csiLink(this);" url="<?php echo $url.htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI"))); ?>" alt="Cliquer pour copier le lien"></i> </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        function csiLink(e){
            var textToCopy = e.attributes['url'].value;
            var tempTextarea = $('<textarea>');
            $('body').append(tempTextarea);
            tempTextarea.val(textToCopy).select();
            document.execCommand('copy');
            tempTextarea.remove();
            alert("Le lien a bien été copié.");
        }

        sleep(0).then(() => {
            const table = new DataTable('#mailing', {
                aLengthMenu: [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ]
            });

            /*$('.csi-link').click(function() {
                var textToCopy = this.attributes['url'].value;
                var tempTextarea = $('<textarea>');
                $('body').append(tempTextarea);
                tempTextarea.val(textToCopy).select();
                document.execCommand('copy');
                tempTextarea.remove();
                alert("Le lien a bien été copié.");
            });*/

        });
    });
</script>