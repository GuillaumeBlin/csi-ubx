<?php
include "lang.php";
$actionMailing = str_replace("/load_admin_links/", "/admin_mailing/", $_SERVER['REQUEST_URI']);
?>

<p><button id="mailing_phd_button"><i class='far fa-paper-plane'></i> Envoyer le lien aux doctorant.e.s sélectionné.e.s</button></p>
<p><button id="mailing_dt_button"><i class='far fa-paper-plane'></i> Envoyer le lien aux directions sélectionné.e.s</button></p>
<p><button id="mailing_csi_button"><i class='far fa-paper-plane'></i> Envoyer le lien aux csi sélectionnés</button></p>

<table id="mailing" class="display">
    <thead>
        <tr>
            <?php
            echo "<th>" . $translation["Matricule"] . "</th>";
            echo "<th>" . $translation["PhD_Nom"] . "</th>";
            echo "<th>" . $translation["PhD_Prenom"] . "</th>";
            echo "<th>" . $translation["PhD_ToMail"] . "</th>";
            ?>
            <th>Mail pour la direction de thèse</th>
            <th>Mail pour les membres du CSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($mailing_data as $student) {
            echo "<tr>";
            $csiNames = '';
            $csiMails = '';
            foreach ($student["csi"] as $m) {
                $csiNames = $csiNames . " " . $m["prenom"] . " " . $m["nom"] . ",";
                $csiMails = $csiMails . " " . $m["mail"] . ",";
            }
            $csiNames = rtrim($csiNames, ',');
            $csiMails = rtrim($csiMails, ',');

        ?>
            <td><?php echo $student["Matricule_etudiant"]; ?></td>
            <td><?php echo $student["nom"]; ?></td>
            <td><?php echo $student["prenom"]; ?></td>
            <td><i class='far fa-paper-plane' atype='PhD' amail='<?php echo $student["mail_principal"]; ?>' phdName='<?php echo $student["prenom"] . ' ' . $student["nom"]; ?>' aname='<?php echo $student["prenom"] . ' ' . $student["nom"]; ?>' token='<?php echo htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-PhD"))); ?>'></i> <?php echo $student["mail_principal"]; ?></td>
            <td><i class='far fa-paper-plane' atype='DT' amail='<?php echo $student["these_directeur_these_mail"]; ?>' phdName='<?php echo $student["prenom"] . ' ' . $student["nom"]; ?>' aname='<?php echo $student["these_directeur_these_prenom"] . ' ' . $student["these_directeur_these_nom"]; ?>' token='<?php echo htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-DT"))); ?>'></i> <?php echo $student["these_directeur_these_mail"]; ?></td>
            <td><i class='far fa-paper-plane' atype='CSI' amail='<?php echo $csiMails; ?>' phdName='<?php echo $student["prenom"] . ' ' . $student["nom"]; ?>' aname='<?php echo $csiNames; ?>' token='<?php echo htmlspecialchars(urlencode($this->enc("csi-" . $student["Matricule_etudiant"] . "-CSI"))); ?>'></i> <?php echo $csiMails; ?></td>
            </tr>
        <?php  }
        ?>
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
                ],
                select: {
                    style: 'multi+shift'
                }
            });

            // Array to track the ids of the details displayed rows
            const detailRows = [];
            $("#mailing_phd_button").on("click", function() {

                var nbMails = 0;
                table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop) {
                    nbMails = nbMails + (this.data()[3].match(/<i/g) || []).length
                });
                if (confirm("Vous êtes sur le point d'envoyer " + nbMails + " messages. Confirmez-vous cet envoi ?")) {
                    table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop) {
                        var e = $.parseHTML(this.data()[3]);
                        $.each(e, function(i, el) {
                            if (el.nodeName == "I") {
                                var aType = el.attributes['atype'].value;
                                var aToken = el.attributes['token'].value;
                                var phdName = el.attributes['phdname'].value;
                                var aName = el.attributes['aname'].value;
                                var aMail = el.attributes['amail'].value;
                                console.log("Sending mail to " + aName);
                                $.post("<?php echo $actionMailing; ?>", {
                                    token: aToken,
                                    type: aType,
                                    student: phdName,
                                    name: aName,
                                    mail: aMail
                                }, function(data) {
                                    console.log(data);
                                });
                            }
                        });
                    });
                }
            });

            $("#mailing_dt_button").on("click", function() {
                var nbMails = 0;
                table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop) {
                    nbMails = nbMails + (this.data()[4].match(/<i/g) || []).length
                });
                if (confirm("Vous êtes sur le point d'envoyer " + nbMails + " messages. Confirmez-vous cet envoi ?")) {
                    table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop) {
                        var e = $.parseHTML(this.data()[4]);
                        $.each(e, function(i, el) {
                            if (el.nodeName == "I") {
                                var aType = el.attributes['atype'].value;
                                var aToken = el.attributes['token'].value;
                                var phdName = el.attributes['phdname'].value;
                                var aName = el.attributes['aname'].value;
                                var aMail = el.attributes['amail'].value;
                                console.log("Sending mail to " + aName);
                                $.post("<?php echo $actionMailing; ?>", {
                                    token: aToken,
                                    type: aType,
                                    student: phdName,
                                    name: aName,
                                    mail: aMail
                                }, function(data) {
                                    console.log(data);
                                });
                            }
                        });
                    });
                }
            });

            $("#mailing_csi_button").on("click", function() {
                var nbMails = 0;
                table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop) {
                    nbMails = nbMails + (this.data()[5].match(/<i/g) || []).length
                });
                if (confirm("Vous êtes sur le point d'envoyer " + nbMails + " messages. Confirmez-vous cet envoi ?")) {
                    table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop) {
                        var e = $.parseHTML(this.data()[5]);
                        $.each(e, function(i, el) {
                            if (el.nodeName == "I") {
                                var aType = el.attributes['atype'].value;
                                var aToken = el.attributes['token'].value;
                                var phdName = el.attributes['phdname'].value;
                                var aName = el.attributes['aname'].value;
                                var aMail = el.attributes['amail'].value;
                                console.log("Sending mail to " + aName);
                                $.post("<?php echo $actionMailing; ?>", {
                                    token: aToken,
                                    type: aType,
                                    student: phdName,
                                    name: aName,
                                    mail: aMail
                                }, function(data) {
                                    console.log(data);
                                });
                            }
                        });
                    });
                }
            });



        });
    });
</script>