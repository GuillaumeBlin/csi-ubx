<?php if(!isset($report_read_only)){$report_read_only=false;}?>
<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_CSIReport/", $_SERVER['REQUEST_URI']); ?>" method="POST" <?php } ?>>
    <input type="hidden" name="ed" id="ed" value="<?php echo $report["ed"]; ?>" />
    <h3>L’entretien</h3>
    <h4>Date de l’entretien </h4>
    <input type="date" class="form-control" name="Date_Entretrien" value="<?php echo $report["Date_Entretrien"]; ?>">
    <h4>Modalités de l’entretien </h4>
    <div>
        <input name="ModalitesEntretien" value="Présentiel" type="radio" <?php if ($report["ModalitesEntretien"] == "Présentiel") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Présentiel</label>
    </div>
    <div>
        <input name="ModalitesEntretien" value="Visioconférence" type="radio" <?php if ($report["ModalitesEntretien"] == "Visioconférence") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Visioconférence</label>
    </div>
    <div>
        <input name="ModalitesEntretien" value="Mixte" type="radio" <?php if ($report["ModalitesEntretien"] == "Mixte") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Mixte</label>
    </div>
    <div id="ModalitesEntretienDetails">
        <label>Détails des modalités</label>
        <textarea type="textarea" rows="5" class="form-control" wrap="wrap" name="ModalitesEntretienDetails"><?php echo $report["ModalitesEntretienDetails"]; ?></textarea>

    </div>

    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <input type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $report["PhD_Nom"]; ?>">
    <h5>Prénom</h5>
    <input type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="<?php echo $report["PhD_Prenom"]; ?>">
    <h5>Email dans ADUM</h5>
    <input type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="<?php echo $report["PhD_Mail"]; ?>">
    <h5>Spécialité</h5>
    <input type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="<?php echo $report["PhD_Specialite"]; ?>">
    <h5>Unité de recherche</h5>
    <textarea type="textarea" rows="1" disabled class="form-control" wrap="wrap" name="PhD_UMR" id="PhD_UMR"><?php echo $report["PhD_UMR"]; ?></textarea>
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $report["DT_Nom"]; ?>">
    <h5>Prénom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $report["DT_Prenom"]; ?>">
    <?php if($report["CODT_Nom"]!=""){ ?>
        <h5>Nom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $report["CODT_Nom"]; ?>">
    <h5>Prénom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $report["CODT_Prenom"]; ?>">
    <?php } ?>
    <h5>Date de début de thèse</h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="<?php echo $report["PhD_DateDebutThese"]; ?>">

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo $report["PhD_CSI_Annee"]; ?>">

    <h3>Etat d'avancement de la thèse</h3>
    <h5>Par rapport aux objectifs initiaux définis au début de la thèse, le contenu est-il ?</h5>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Globalement conforme" type="radio" <?php if ($report["ComparaisonObjectifsInitiaux"] == "Globalement conforme") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Globalement conforme</label>
    </span>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Conforme avec quelques ajustements" type="radio" <?php if ($report["ComparaisonObjectifsInitiaux"] == "Conforme avec quelques ajustements") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Conforme avec quelques ajustements</label>
    </span>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Réorienté" type="radio" <?php if ($report["ComparaisonObjectifsInitiaux"] == "Réorienté") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Réorienté</label>
    </span>
    <div id="ComparaisonObjectifsInitiaux" <?php if ($report["ComparaisonObjectifsInitiaux"]=="" || $report["ComparaisonObjectifsInitiaux"]=="Globalement conforme"){ echo 'style="display:none"'; }?>>
        <label>Précisions</label>
        <textarea type="textarea" rows="5" class="form-control" name="ComparaisonObjectifsInitiauxPrecisions"><?php echo $report["ComparaisonObjectifsInitiauxPrecisions"]; ?></textarea>
    </div>

    <h5>Observations sur le plan méthodologique et expérimental</h5>
    <span>
        <input name="ObservationsMethodoExpe" value="Aucune difficulté particulière" type="radio" <?php if ($report["ObservationsMethodoExpe"] == "Aucune difficulté particulière") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Aucune difficulté particulière</label>
    </span>
    <span>
        <input name="ObservationsMethodoExpe" value="Des difficultés mineures" type="radio" <?php if ($report["ObservationsMethodoExpe"] == "Des difficultés mineures") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Des difficultés mineures</label>
    </span>
    <span>
        <input name="ObservationsMethodoExpe" value="Des difficultés majeures" type="radio" <?php if ($report["ObservationsMethodoExpe"] == "Des difficultés majeures") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Des difficultés majeures</label>
    </span>
    <div id="ObservationsMethodoExpe" <?php if ($report["ObservationsMethodoExpe"]=="" || $report["ObservationsMethodoExpe"]=="Aucune difficulté particulière"){ echo 'style="display:none"'; }?>>
        <label>Précisions et recommandations</label>
        <textarea type="textarea" rows="5" class="form-control" name="ObservationsMethodoExpePrecisions"><?php echo $report["ObservationsMethodoExpePrecisions"]; ?></textarea>
    </div>

    <h5>Le calendrier prévisionnel de réalisation est-il suivi ?</h5>
    <span>
        <input name="RespectCalendrierPrevisionnel" value="Oui" type="radio" <?php if ($report["RespectCalendrierPrevisionnel"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="RespectCalendrierPrevisionnel" value="Non" type="radio" <?php if ($report["RespectCalendrierPrevisionnel"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Non</label>
    </span>
    <div id="RespectCalendrierPrevisionnel" <?php if ($report["RespectCalendrierPrevisionnel"]=="" || $report["RespectCalendrierPrevisionnel"]=="Oui"){ echo 'style="display:none"'; }?>>
        <label>Raisons et ajustements recommandés</label>
        <textarea type="textarea" rows="5" class="form-control" name="RespectCalendrierPrevisionnelPrecisions"><?php echo $report["RespectCalendrierPrevisionnelPrecisions"]; ?></textarea>
    </div>

    <!-- 3eme année-->

    <div <?php if ($report["PhD_CSI_Annee"]<3) {
                echo 'style="display:none"';
            } ?>>
        <!--<b>A remplir obligatoirement pour une réinscription en 3ème année ou plus</b>-->
        <h5>La thèse pourra-t-elle a priori être soutenue au terme de l'année à venir?</h5>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Oui" type="radio" <?php if ($report["SoutenanceAuTermeAnneeAVenir"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Oui</label>
        </span>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Probablement" type="radio" <?php if ($report["SoutenanceAuTermeAnneeAVenir"] == "Probablement") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Probablement</label>
        </span>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Non" type="radio" <?php if ($report["SoutenanceAuTermeAnneeAVenir"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Non</label>
        </span>
        <div id="SoutenanceAuTermeAnneeAVenir" <?php if ($report["SoutenanceAuTermeAnneeAVenir"]=="" || $report["SoutenanceAuTermeAnneeAVenir"]=="Oui"){ echo 'style="display:none"'; }?>>
            <label>Raisons</label>
            <textarea type="textarea" rows="5" class="form-control" name="SoutenanceAuTermeAnneeAVenirPrecisions"><?php echo $report["SoutenanceAuTermeAnneeAVenirPrecisions"]; ?></textarea>
        </div>

        <h5>Productions scientifiques et participation à des colloques</h5>
        <div>
            <label>Avis et recommandations</label>
            <textarea type="textarea" rows="5" class="form-control" name="AvisRecommandationsProductionScientifique"><?php echo $report["AvisRecommandationsProductionScientifique"]; ?></textarea>
        </div>

        <h5>Expériences internationales avec mobilités < à 3 mois</h5>
                <span>
                    <input name="MobilitesInternationalesMoins3Mois" value="Oui" type="radio" <?php if ($report["MobilitesInternationalesMoins3Mois"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
                    <label>Oui</label>
                </span>
                <span>
                    <input name="MobilitesInternationalesMoins3Mois" value="Non" type="radio" <?php if ($report["MobilitesInternationalesMoins3Mois"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
                    <label>Non</label>
                </span>

                <h5>Expériences internationales avec mobilités > à 3 mois</h5>
                <span>
                    <input name="MobilitesInternationalesPlus3Mois" value="Oui" type="radio" <?php if ($report["MobilitesInternationalesPlus3Mois"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
                    <label>Oui</label>
                </span>
                <span>
                    <input name="MobilitesInternationalesPlus3Mois" value="Non" type="radio" <?php if ($report["MobilitesInternationalesPlus3Mois"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
                    <label>Non</label>
                </span>
    </div>

    <h3>Développement des compétences</h3>
    

    <h5>Avis et recommandations du CSI sur les formations à suivre l’année suivante</h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisRecommandationsFormations"><?php echo $report["AvisRecommandationsFormations"]; ?></textarea>

    <h3>Perspectives de poursuite de carrière</h3>
    <p>Indiquer les perspectives de poursuite de carrière post-thèse auxquelles doit faire écho le plan de formation durant la thèse. Indiquer les perspectives de candidature pour un post-doc en France ou à l’étranger, de candidature à la qualification aux fonctions de Maîtres de conférences, de chercheur CNRS, INRAE, INRAP, etc...</p>
    <textarea type="textarea" rows="5" class="form-control" name="PerspectivesCarriere"><?php echo $report["PerspectivesCarriere"]; ?></textarea>

    <h3>Avis du comité de suivi individuel sur la réinscription</h3>
    <div><label>Une inscription dérogatoire en 4ème année ou plus est-elle envisagée ?</label>
        <span>
            <input name="InscriptionDerogatoire" value="Oui" type="radio" <?php if ($report["InscriptionDerogatoire"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Oui</label>
        </span>
        <span>
            <input name="InscriptionDerogatoire" value="Non" type="radio" <?php if ($report["InscriptionDerogatoire"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Non</label>
        </span>
    </div>
    <div id="DateSoutenance" <?php if ($report["InscriptionDerogatoire"]=="" || $report["InscriptionDerogatoire"]=="Non"){ echo 'style="display:none"'; }?>>
        <label>Si oui, date prévue pour la soutenance de thèse</label>
        <input type="date" class="form-control" name="DateSoutenance" value="<?php echo $report["DateSoutenance"]; ?>">
    </div>

    <span>
        <input name="Reinscription" value="Favorable" type="radio" <?php if ($report["Reinscription"] == "Favorable") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Favorable</label>
    </span>
    <span>
        <input name="Reinscription" value="Favorable avec réserves" type="radio" <?php if ($report["Reinscription"] == "Favorable avec réserves") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Favorable avec réserves</label>
    </span>
    <span>
        <input name="Reinscription" value="Défavorable" type="radio" <?php if ($report["Reinscription"] == "Défavorable") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Défavorable</label>
    </span>
    <div>
        <label>Avis circonstancié</label>
        <textarea type="textarea" rows="5" class="form-control" name="AvisReinscription"><?php echo $report["AvisReinscription"]; ?></textarea>
    </div>

    <h5>Le comité de suivi alerte la direction de l’école doctorale sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste » par un rapport confidentiel </h5>
    <span>
        <input name="RapportConfidentielAVenir" value="Oui" type="radio" <?php if ($report["RapportConfidentielAVenir"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="RapportConfidentielAVenir" value="Non" type="radio" <?php if ($report["RapportConfidentielAVenir"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Non</label>
    </span>


    <div>
        <label>Date de l'établissement du rapport</label>
        <input type="date" class="form-control" name="DateRapport" id="DateRapport" value="<?php echo $report["DateRapport"]; ?>">
    </div>
    <?php if ($report_read_only == false) { ?>
        <div>
            <button type="submit" class="btn-default btn" style="default">Soumettre le rapport</button>
        </div>
    <?php } ?>
</form>

<script>
   function nl2br(str, replaceMode, isXhtml) {
        var breakTag = (isXhtml) ? '<br />' : '<br>';
        var replaceStr = (replaceMode) ? '$1' + breakTag : '$1' + breakTag + '$2';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
    }

    <?php if ($report_read_only == true) {
    ?>
        $("textarea").each(function() {
            if (this.length > 0) {
                this.height("");
                var x = this.prop('scrollHeight');
                x = x + 10;
                this.height(x + "px");
            };
        });

        window.onbeforeprint = function() {
            $('.print-content').remove();
            $('textarea').each(function() {
                var text = $(this).val();
                $(this).after('<p class="well print-content">' + nl2br(text) + '</p>');
            });
        }
        $("#csi :input").attr("disabled", true);
    <?php
    }
    ?>

    $("input[type=radio][name=InscriptionDerogatoire]").on("change", function() {
        if (this.value == 'Oui') {
            $("#DateSoutenance").show();
        } else {
            $("#DateSoutenance").hide();
            $("input[name=DateSoutenance]").val('');
        }

    });

    $("input[type=radio][name=SoutenanceAuTermeAnneeAVenir]").on("change", function() {
        if ((this.value == "Probablement") ||
            (this.value == "Non")) {
            $("#SoutenanceAuTermeAnneeAVenir").show();
        } else {
            $("#SoutenanceAuTermeAnneeAVenir").hide();
            $("input[name=SoutenanceAuTermeAnneeAVenirPrecisions]").val('');
        }

    });

    $("input[type=radio][name=RespectCalendrierPrevisionnel]").on("change", function() {
        if (this.value == 'Non') {
            $("#RespectCalendrierPrevisionnel").show();
        } else {
            $("#RespectCalendrierPrevisionnel").hide();
            $("input[name=RespectCalendrierPrevisionnelPrecisions]").val('');
        }

    });

    $("input[type=radio][name=ObservationsMethodoExpe]").on("change", function() {
        if ((this.value == "Des difficultés mineures") ||
            (this.value == "Des difficultés majeures")) {
            $("#ObservationsMethodoExpe").show();
        } else {
            $("#ObservationsMethodoExpe").hide();
            $("input[name=ObservationsMethodoExpePrecisions]").val('');
        }

    });

    $("input[type=radio][name=ComparaisonObjectifsInitiaux]").on("change", function() {
        if ((this.value == "Conforme avec quelques ajustements") ||
            (this.value == "Réorienté")) {
            $("#ComparaisonObjectifsInitiaux").show();
        } else {
            $("#ComparaisonObjectifsInitiaux").hide();
            $("input[name=ComparaisonObjectifsInitiauxPrecisions]").val('');
        }
    });
</script>