<?php
include "lang.php";
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
            <td><?php echo htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD"))); ?></td>
            <td><?php echo htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT"))); ?></td>
            <td><?php echo htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI"))); ?></td>
            </tr>
        <?php  } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }


        sleep(2000).then(() => {
            const table = new DataTable('#mailing', {
                aLengthMenu: [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ]
            });

        });
    });
</script>