<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_DTReport/", $_SERVER['REQUEST_URI']); ?>" method="POST" <?php } ?>>
    <input type="hidden" name="ed" id="ed" value="<?php echo $defense["these_ED_code"]; ?>" />
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
    <?php if($defense["these_codirecteur_these_nom"]!=""){ ?>
        <h5>Nom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $defense["these_codirecteur_these_nom"]; ?>">
    <h5>Prénom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $defense["these_codirecteur_these_prenom"]; ?>">
    <?php } ?>
    <h5>Date de début de thèse</h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="<?php echo date('Y-m-d', strtotime($defense["these_date_1inscription"])); ?>">

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo intval(substr($defense["niveau_Etud"], 0, 1)) + 1; ?>">

    <h3>Bilan annuel sur le déroulement de la thèse</h3>
    <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    <h5>Compétences techniques (maîtrise les outils)</h5>
    <span>
        <input name="CompetencesTechniques" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="CompetencesTechniques" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="CompetencesTechniques" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Compétences scientifiques (maîtrise les fondamentaux de sa discipline) </h5>
    <span>
        <input name="CompetencesScientifiques" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="CompetencesScientifiques" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="CompetencesScientifiques" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Autonomie (sait trouver seul l'information ou des solutions) </h5>
    <span>
        <input name="Autonomie" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Autonomie" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Autonomie" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Sait mobiliser de manière efficace la bibliographie (recherche complète et synthèse)</h5>
    <span>
        <input name="Bibliographie" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Bibliographie" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Bibliographie" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Capacité d'initiative (propose des solutions ou des réorientations)</h5>
    <span>
        <input name="Initiative" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Initiative" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Initiative" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Capacité d'adaptation (prend rapidement en main les nouveaux outils) </h5>
    <span>
        <input name="Adaptation" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Adaptation" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Adaptation" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à rédiger des documents de synthèse </h5>
    <span>
        <input name="Redaction" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Redaction" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Redaction" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à présenter ses travaux de recherche </h5>
    <span>
        <input name="Presentation" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Presentation" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Presentation" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à structurer sa réflexion </h5>
    <span>
        <input name="Reflexion" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Reflexion" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Reflexion" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Assiduité (ponctualité, présence) </h5>
    <span>
        <input name="Assiduite" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Assiduite" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Assiduite" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Interaction avec l'encadrement (sollicite à bon escient) </h5>
    <span>
        <input name="Interaction" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Interaction" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Interaction" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Intégration dans l'équipe/le laboratoire (interagit avec les chercheurs et les doctorants</h5>
    <span>
        <input name="Integration" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Integration" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Integration" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>

    <h3>Bilan annuel sur l'avancement de la thèse</h3>
    <div>
        <input name="Progression" value="La thèse progresse à très bon rythme" type="radio">
        <label>La thèse progresse à très bon rythme</label>
    </div>
    <div>
        <input name="Progression" value="La thèse progresse normalement" type="radio">
        <label>La thèse progresse normalement </label>
    </div>
    <div>
        <input name="Progression" value="La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible" type="radio">
        <label>La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible</label>
    </div>
    <div>
        <input name="Progression" value="La thèse n'a clairement pas assez progressé" type="radio">
        <label>La thèse n'a clairement pas assez progressé</label>
    </div>
    <div id="Argumentaire" style="display:none">
        <label>Argumentaire</label>
        <textarea type="textarea" rows="5" class="form-control" name="ArgumentaireProgression" id="ArgumentaireProgression"></textarea>
    </div>

    <!-- 2eme année-->


    <div <?php if (intval(substr($defense["niveau_Etud"], 0, 1)) > 2) {
                echo 'style="display:none"';
            } ?>><label>L'état d'avancement global des travaux vous permet-il d'envisager une soutenance dans les délais</label>
        <span>
            <input name="SoutenanceDansDelais" value="Oui" type="radio">
            <label>Oui</label>
        </span>
        <span>
            <input name="SoutenanceDansDelais" value="Non" type="radio">
            <label>Non</label>
        </span>
    </div>

    <!-- 3eme année-->

    <div <?php if (intval(substr($defense["niveau_Etud"], 0, 1)) < 3) {
                echo 'style="display:none"';
            } ?>>
        <div>
            <label>Echéancier de fin de thèse</label>
            <textarea type="textarea" rows="5" class="form-control" name="Echeancier"></textarea>
        </div>
        <div>
            <label>Date prévue pour la soutenance de thèse</label>
            <input type="date" class="form-control" name="DateSoutenance">
        </div>
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
        <div id="InscriptionDerogatoire" style="display:none" ><label>Un financement est-il prévu jusqu'à la soutenance de thèse ?</label>
            <span>
                <input name="Financement" value="Oui" type="radio">
                <label>Oui</label>
            </span>
            <span>
                <input name="Financement" value="Non" type="radio">
                <label>Non</label>
            </span>

            <div id="Financement" style="display:none">
                <label>Si oui, préciser </label>
                <textarea type="textarea" rows="5" class="form-control" name="FinancementDetails" ></textarea>
            </div>
        </div>
    </div>

    <h3>Avis sur la réinscription en thèse</h3>
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

        foreach ($report as $k => $v) {
            echo "$('input[type=date][name=" . $k . "]').val('" . addslashes($v) . "');";
            echo "$('input[type=text][name=" . $k . "]').val('" . addslashes($v) . "');";
            echo "var t= $('textarea[name=" . $k . "]'); t.val('" . addslashes($v) . "');";
    ?>
            if (t.length > 0) {
                t.height("");
                var x = t.prop('scrollHeight');
                x = x + 10;
                t.height(x + "px");
            };


            <?php
            echo "var j=$('input[type=radio][name=" . $k . "][value=\"" . addslashes($v) . "\"]');";
            //echo "$('input[name=".$k."]').val('".addslashes($v)."').prop('checked', true);";
            ?>
            j.prop('checked', true);
        <?php
        }
        ?>
        window.onbeforeprint = function() {
            $('.print-content').remove();
            $('textarea').each(function() {
                var text = $(this).val();
                $(this).after('<p class="well print-content">' + text + '</p>');
            });
        }
        $("#csi :input").attr("disabled", true);
    <?php

    }
    ?>

    $("input[type=radio][name=Progression]").on("change", function() {
        if ((this.value == "La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible") ||
            (this.value == "La thèse n'a clairement pas assez progressé")) {
            $("#Argumentaire").show();
        } else {
            $("#Argumentaire").hide();
            $("#ArgumentaireProgression").val('');
        }

    });
    
    $("input[type=radio][name=Financement]").on("change", function() {
        if (this.value == 'Oui') {
            $("#Financement").show();
        } else {
            $("#Financement").hide();
            $(".FinancementDetails").val('');
        }

    });

    $("input[type=radio][name=InscriptionDerogatoire]").on("change", function() {
        if (this.value == 'Oui') {
            $("#InscriptionDerogatoire").show();
        } else {
            $("#InscriptionDerogatoire").hide();
            $("#Financement").hide();
            $(".Financement").val('Non');
            $(".FinancementDetails").val('');
        }

    });
</script>