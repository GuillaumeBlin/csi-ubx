<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_CSIReport/", $_SERVER['REQUEST_URI']); ?>" method="POST" <?php } ?>>
    <h3>Date de l’entretien</h3>
    <input type="date" class="form-control" name="Date_Entretrien">
    <h4>Modalités de l’entretien </h4>
    <div>
        <input name="ModalitesEntretien" value="Présentiel" type="radio">
        <label>Présentiel</label>
    </div>
    <div>
        <input name="ModalitesEntretien" value="Visioconférence" type="radio">
        <label>Visioconférence</label>
    </div>
    <div>
        <input name="ModalitesEntretien" value="Mixte" type="radio">
        <label>Mixte</label>
    </div>
    <div id="ModalitesEntretienDetails">
        <label>Détails des modalités</label>
        <textarea type="textarea" rows="5" class="form-control" name="ModalitesEntretienDetails"></textarea>
    </div>

    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <input type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $defense["nom"]; ?>">
    <h5>Prénom</h5>
    <input type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="<?php echo $defense["prenom"]; ?>">
    <h5>Email dans ADUM</h5>
    <input type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="<?php echo $defense["mail_principal"]; ?>">
    <h5>Spécialité</h5>
    <input type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="<?php echo $defense["these_specialite"]; ?>">
    <h5>Unité de recherche</h5>
    <input type="text" readonly class="form-control" name="PhD_UMR" id="PhD_UMR" value="<?php echo $defense["these_laboratoire"]; ?>">
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $defense["these_directeur_these_nom"]; ?>">
    <h5>Prénom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $defense["these_directeur_these_prenom"]; ?>">
    <h5>Nom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $defense["these_codirecteur_these_nom"]; ?>">
    <h5>Prénom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $defense["these_codirecteur_these_prenom"]; ?>">
    <h5>Date de début de thèse</h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="<?php echo date('Y-m-d', strtotime($defense["these_date_1inscription"])); ?>">

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo intval(substr($defense["niveau_Etud"], 0, 1)) + 1; ?>">

    <h3>Etat d'avancement de la thèse</h3>
    <h5>Résumé</h5>
    <p>Description projet thèse par la doctorante ou le doctorant<br />
        Présentation bilan d’activités + planning et calendrier prévisionnel
    </p>
    <textarea type="textarea" rows="5" class="form-control" name="ResumeAvancement"></textarea>

    <h5>Par rapport aux objectifs initiaux définis au début de la thèse, le contenu est-il ?</h5>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Globalement conforme" type="radio">
        <label>Globalement conforme</label>
    </span>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Conforme avec quelques ajustements" type="radio">
        <label>Conforme avec quelques ajustements</label>
    </span>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Réorienté" type="radio">
        <label>Réorienté</label>
    </span>
    <div id="ComparaisonObjectifsInitiauxPrecisions">
        <label>Précisions</label>
        <textarea type="textarea" rows="5" class="form-control" name="ComparaisonObjectifsInitiauxPrecisions"></textarea>
    </div>
    
    <h5>Observations sur le plan méthodologique et expérimental</h5>
    <span>
        <input name="ObservationsMethodoExpe" value="Aucune difficulté particulière" type="radio">
        <label>Aucune difficulté particulière</label>
    </span>
    <span>
        <input name="ObservationsMethodoExpe" value="Des difficultés mineures" type="radio">
        <label>Des difficultés mineures</label>
    </span>
    <span>
        <input name="ObservationsMethodoExpe" value="Des difficultés majeures" type="radio">
        <label>Des difficultés majeures</label>
    </span>
    <div id="ObservationsMethodoExpePrecisions">
        <label>Précisions et recommandations</label>
        <textarea type="textarea" rows="5" class="form-control" name="ObservationsMethodoExpePrecisions"></textarea>
    </div>    

    <h5>Le calendrier prévisionnel de réalisation est-il suivi ?</h5>
    <span>
        <input name="RespectCalendrierPrevisionnel" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="RespectCalendrierPrevisionnel" value="Non" type="radio">
        <label>Non</label>
    </span>
    <div id="RespectCalendrierPrevisionnelPrecisions">
        <label>Raisons et ajustements recommandés</label>
        <textarea type="textarea" rows="5" class="form-control" name="RespectCalendrierPrevisionnelPrecisions"></textarea>
    </div>

    <!-- 3eme année-->

    <div <?php if (intval(substr($defense["niveau_Etud"], 0, 1)) >= 3) {
                echo 'style="display:none"';
            } ?>>
        <b>A remplir obligatoirement pour une réinscription en 3ème année ou plus</b>
        <h5>La thèse pourra-t-elle a priori être soutenue au terme de l'année à venir?</h5>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Oui" type="radio">
            <label>Oui</label>
        </span>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Probablement" type="radio">
            <label>Probablement</label>
        </span>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Non" type="radio">
            <label>Non</label>
        </span>
        <div id="SoutenanceAuTermeAnneeAVenirPrecisions">
            <label>Raisons</label>
            <textarea type="textarea" rows="5" class="form-control" name="SoutenanceAuTermeAnneeAVenirPrecisions"></textarea>
        </div>

        <h5>Productions scientifiques et participation à des colloques</h5>
        <textarea type="textarea" rows="5" class="form-control" name="ProductionScientifique"></textarea>

        <h5>Expériences internationales avec mobilités < à 3 mois</h5>
                <span>
                    <input name="MobilitesInternationalesMoins3Mois" value="Oui" type="radio">
                    <label>Oui</label>
                </span>
                <span>
                    <input name="MobilitesInternationalesMoins3Mois" value="Non" type="radio">
                    <label>Non</label>
                </span>

                <h5>Expériences internationales avec mobilités > à 3 mois</h5>
                <span>
                    <input name="MobilitesInternationalesPlus3Mois" value="Oui" type="radio">
                    <label>Oui</label>
                </span>
                <span>
                    <input name="MobilitesInternationalesPlus3Mois" value="Non" type="radio">
                    <label>Non</label>
                </span>
    </div>

    <h3>Développement des compétences</h3>
    <h4>Formations obligatoires</h4>
    <h5>Formation à l’éthique de la recherche</h5>
    <span>
        <input name="EthiqueRecherche" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="EthiqueRecherche" value="Non" type="radio">
        <label>Non</label>
    </span>
    <span>
        <input name="EthiqueRecherche" value="En cours" type="radio">
        <label>En cours</label>
    </span>
    <h5>Formation à l’intégrité scientifique </h5>
    <span>
        <input name="IntegriteScientifique" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="IntegriteScientifique" value="Non" type="radio">
        <label>Non</label>
    </span>
    <span>
        <input name="IntegriteScientifique" value="En cours" type="radio">
        <label>En cours</label>
    </span>
    <h5>Formation à l’enseignement si mission d’enseignement </h5>
    <span>
        <input name="FormationEnseignement" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="FormationEnseignement" value="Non" type="radio">
        <label>Non</label>
    </span>
    <span>
        <input name="FormationEnseignement" value="En cours" type="radio">
        <label>En cours</label>
    </span>
    <div id="FormationsObligatoiresPrecisions">
        <label>Si une ou des formations n’ont pas été suivies, préciser les raisons et les recommandations</label>
        <textarea type="textarea" rows="5" class="form-control" name="FormationsObligatoiresPrecisions"></textarea>
    </div>

    <h5>Formations suivies dans l'année</h5>
    <textarea type="textarea" rows="5" class="form-control" name="FormationsDansLAnnee"></textarea>

    <h5>Avis et recommandations du CSI sur les formations à suivre l’année suivante</h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisRecommandationsFormations"></textarea>

    <h3>Perspectives de poursuite de carrière</h3>
    <p>Indiquer les perspectives de poursuite de carrière post-thèse auxquelles doit faire écho le plan de formation durant la thèse. Indiquer les perspectives de candidature pour un post-doc en France ou à l’étranger, de candidature à la qualification aux fonctions de Maîtres de conférences, de chercheur CNRS, INRAE, INRAP, etc...</p>
    <textarea type="textarea" rows="5" class="form-control" name="PerspectivesCarriere"></textarea>

    <h3>Avis du comité de suivi individuel sur la réinscription</h3>
    <div><label>Une inscription dérogatoire en 4ème année ou plus est-elle envisagée ?</label>
        <span>
            <input name="InscriptionDerogatoire" value="Oui" type="radio">
            <label>Oui</label>
        </span>
        <span>
            <input name="InscriptionDerogatoire" value="Non" type="radio">
            <label>Non</label>
        </span>
    </div>
    <div id="#DateSoutenance">
        <label>Date prévue pour la soutenance de thèse</label>
        <input type="date" class="form-control" name="DateSoutenance">
    </div>

    <span>
        <input name="Reinscription" value="Favorable" type="radio">
        <label>Favorable</label>
    </span>
    <span>
        <input name="Reinscription" value="Défavorable" type="radio">
        <label>Défavorable</label>
    </span>
    <div>
        <label>Avis circonstancié</label>
        <textarea type="textarea" rows="5" class="form-control" name="AvisReinscription"></textarea>
    </div>

    <h5>Le comité de suivi alerte la direction de l’école doctorale sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste » par un rapport confidentiel </h5>
    <span>
        <input name="RapportConfidentielAVenir" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="RapportConfidentielAVenir" value="Non" type="radio">
        <label>Non</label>
    </span>


    <div>
        <label>Date de l'établissement du rapport</label>
        <input type="date" class="form-control" name="DateRapport" id="DateRapport">
    </div>
    <?php if ($report_read_only == false) { ?>
        <div>
            <button type="submit" class="btn-default btn" style="default">Soumettre le rapport</button>
        </div>
    <?php } ?>
</form>

<script>
    <?php if ($report_read_only == true) {
    
        foreach($report as $k => $v){
            echo "$('input[type=date][name=".$k."]').val('".addslashes($v)."');";
            echo "$('input[type=text][name=".$k."]').val('".addslashes($v)."');";
            echo "var t= $('textarea[name=".$k."]'); t.val('".addslashes($v)."');";
            ?>
            if(t.length>0){t.height("");t.height(t.prop('scrollHeight') + "px");};
            <?php
            echo "var j=$('input[type=radio][name=".$k."][value=\"".addslashes($v)."\"]'); j.val('".addslashes($v)."').change();";
            //echo "$('input[name=".$k."]').val('".addslashes($v)."').prop('checked', true);";
?>
            j.prop('checked',true);
<?php
        }
        ?>

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