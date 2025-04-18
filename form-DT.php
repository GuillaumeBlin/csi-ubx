<?php if(!isset($report_read_only)){$report_read_only=false;}?>
<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_DTReport/", $_SERVER['REQUEST_URI']); ?>" method="POST" <?php } ?>>
    <input required type="hidden" name="ed" id="ed" value="<?php echo $report["ed"]; ?>" />
    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <input required type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $report["PhD_Nom"]; ?>">
    <h5>Prénom</h5>
    <input required type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="<?php echo $report["PhD_Prenom"]; ?>">
    <h5>Email dans ADUM</h5>
    <input required type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="<?php echo $report["PhD_Mail"]; ?>">
    <h5>Spécialité</h5>
    <input required type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="<?php echo $report["PhD_Specialite"]; ?>">
    <h5>Unité de recherche</h5>
    <input required type="text" readonly class="form-control" name="PhD_UMR" id="PhD_UMR" value="<?php echo $report["PhD_UMR"]; ?>">
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <input required type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $report["DT_Nom"]; ?>">
    <h5>Prénom direction de thèse</h5>
    <input required type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $report["DT_Prenom"]; ?>">
    <?php if($report["CODT_Nom"]!=""){ ?>
        <h5>Nom co-direction de thèse</h5>
    <input required type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $report["CODT_Nom"]; ?>">
    <h5>Prénom co-direction de thèse</h5>
    <input required type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $report["CODT_Prenom"]; ?>">
    <?php } ?>
    <h5>Date de début de thèse</h5>
    <input required type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="<?php echo $report["PhD_DateDebutThese"]; ?>">

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input required type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo $report["PhD_CSI_Annee"]; ?>">

    <h3>Bilan annuel sur le déroulement de la thèse</h3>
    <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    <h5>Compétences techniques (maîtrise les outils)</h5>
    <span>
        <input required name="CompetencesTechniques" value="Insuffisant" type="radio" <?php if ($report["CompetencesTechniques"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="CompetencesTechniques" value="A améliorer" type="radio" <?php if ($report["CompetencesTechniques"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="CompetencesTechniques" value="Satisfaisant" type="radio" <?php if ($report["CompetencesTechniques"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Compétences scientifiques (maîtrise les fondamentaux de sa discipline) </h5>
    <span>
        <input required name="CompetencesScientifiques" value="Insuffisant" type="radio" <?php if ($report["CompetencesScientifiques"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="CompetencesScientifiques" value="A améliorer" type="radio" <?php if ($report["CompetencesScientifiques"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="CompetencesScientifiques" value="Satisfaisant" type="radio" <?php if ($report["CompetencesScientifiques"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Autonomie (sait trouver seul l'information ou des solutions) </h5>
    <span>
        <input required name="Autonomie" value="Insuffisant" type="radio" <?php if ($report["Autonomie"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Autonomie" value="A améliorer" type="radio" <?php if ($report["Autonomie"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Autonomie" value="Satisfaisant" type="radio" <?php if ($report["Autonomie"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Sait mobiliser de manière efficace la bibliographie (recherche complète et synthèse)</h5>
    <span>
        <input required name="Bibliographie" value="Insuffisant" type="radio" <?php if ($report["Bibliographie"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Bibliographie" value="A améliorer" type="radio" <?php if ($report["Bibliographie"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Bibliographie" value="Satisfaisant" type="radio" <?php if ($report["Bibliographie"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Capacité d'initiative (propose des solutions ou des réorientations)</h5>
    <span>
        <input required name="Initiative" value="Insuffisant" type="radio" <?php if ($report["Initiative"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Initiative" value="A améliorer" type="radio" <?php if ($report["Initiative"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Initiative" value="Satisfaisant" type="radio" <?php if ($report["Initiative"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Capacité d'adaptation (prend rapidement en main les nouveaux outils) </h5>
    <span>
        <input required name="Adaptation" value="Insuffisant" type="radio" <?php if ($report["Adaptation"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Adaptation" value="A améliorer" type="radio" <?php if ($report["Adaptation"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Adaptation" value="Satisfaisant" type="radio" <?php if ($report["Adaptation"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à rédiger des documents de synthèse </h5>
    <span>
        <input required name="Redaction" value="Insuffisant" type="radio" <?php if ($report["Redaction"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Redaction" value="A améliorer" type="radio" <?php if ($report["Redaction"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Redaction" value="Satisfaisant" type="radio" <?php if ($report["Redaction"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à présenter ses travaux de recherche </h5>
    <span>
        <input required name="Presentation" value="Insuffisant" type="radio" <?php if ($report["Presentation"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Presentation" value="A améliorer" type="radio" <?php if ($report["Presentation"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Presentation" value="Satisfaisant" type="radio" <?php if ($report["Presentation"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à structurer sa réflexion </h5>
    <span>
        <input required name="Reflexion" value="Insuffisant" type="radio" <?php if ($report["Reflexion"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Reflexion" value="A améliorer" type="radio" <?php if ($report["Reflexion"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Reflexion" value="Satisfaisant" type="radio" <?php if ($report["Reflexion"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Assiduité (ponctualité, présence) </h5>
    <span>
        <input required name="Assiduite" value="Insuffisant" type="radio" <?php if ($report["Assiduite"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Assiduite" value="A améliorer" type="radio" <?php if ($report["Assiduite"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Assiduite" value="Satisfaisant" type="radio" <?php if ($report["Assiduite"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Interaction avec l'encadrement (sollicite à bon escient) </h5>
    <span>
        <input required name="Interaction" value="Insuffisant" type="radio" <?php if ($report["Interaction"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Interaction" value="A améliorer" type="radio" <?php if ($report["Interaction"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Interaction" value="Satisfaisant" type="radio" <?php if ($report["Interaction"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Intégration dans l'équipe/le laboratoire (interagit avec les chercheurs et les doctorants</h5>
    <span>
        <input required name="Integration" value="Insuffisant" type="radio" <?php if ($report["Integration"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input required name="Integration" value="A améliorer" type="radio" <?php if ($report["Integration"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input required name="Integration" value="Satisfaisant" type="radio" <?php if ($report["Integration"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>

    <h3>Bilan annuel sur l'avancement de la thèse</h3>
    <div>
        <input required name="Progression" value="La thèse progresse à très bon rythme" type="radio" <?php if ($report["Progression"] == "La thèse progresse à très bon rythme") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>La thèse progresse à très bon rythme</label>
    </div>
    <div>
        <input required name="Progression" value="La thèse progresse normalement" type="radio" <?php if ($report["Progression"] == "La thèse progresse normalement") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>La thèse progresse normalement </label>
    </div>
    <div>
        <input required name="Progression" value="La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible" type="radio" <?php if ($report["Progression"] == "La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible</label>
    </div>
    <div>
        <input required name="Progression" value="La thèse n'a clairement pas assez progressé" type="radio" <?php if ($report["Progression"] == "La thèse n'a clairement pas assez progressé") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>La thèse n'a clairement pas assez progressé</label>
    </div>
    <div id="Argumentaire" <?php if ($report["Progression"] == "" ||($report["Progression"] == "La thèse progresse à très bon rythme")|| ($report["Progression"] == "La thèse progresse normalement")){ echo 'style="display:none"'; }?>>
        <label>Argumentaire</label>
        <textarea type="textarea" rows="5" class="form-control" name="ArgumentaireProgression" id="ArgumentaireProgression"><?php echo $report["ArgumentaireProgression"]; ?></textarea>
    </div>

    <!-- 2eme année-->


    <div <?php if ($report["PhD_CSI_Annee"]>2) {
                echo 'style="display:none"';
            } ?>><label>L'état d'avancement global des travaux vous permet-il d'envisager une soutenance dans les délais</label>
        <span>
            <input <?php if ($report["PhD_CSI_Annee"]<3) {?>required<?php }?>  name="SoutenanceDansDelais" value="Oui" type="radio" <?php if ($report["SoutenanceDansDelais"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Oui</label>
        </span>
        <span>
            <input <?php if ($report["PhD_CSI_Annee"]<3) {?>required<?php }?>  name="SoutenanceDansDelais" value="Non" type="radio" <?php if ($report["SoutenanceDansDelais"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Non</label>
        </span>
    </div>

    <!-- 3eme année-->

    <div <?php if ($report["PhD_CSI_Annee"]<3) {
                echo 'style="display:none"';
            } ?>>
        <div>
            <label>Echéancier de fin de thèse</label>
            <textarea type="textarea" rows="5" class="form-control" name="Echeancier"><?php echo $report["Echeancier"]; ?></textarea>
        </div>
        <div>
            <label>Date prévue pour la soutenance de thèse</label>
            <input type="date" class="form-control" name="DateSoutenance" value="<?php echo $report["DateSoutenance"]; ?>">
        </div>
        <div><label>Une inscription dérogatoire en 4ème année ou plus est-elle envisagée ?</label>
            <span>
                <input <?php if ($report["PhD_CSI_Annee"]>2) {?>required<?php }?>  name="InscriptionDerogatoire" value="Oui" type="radio" <?php if ($report["InscriptionDerogatoire"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
                <label>Oui</label>
            </span>
            <span>
                <input <?php if ($report["PhD_CSI_Annee"]>2) {?>required<?php }?>  name="InscriptionDerogatoire" value="Non" type="radio" <?php if ($report["InscriptionDerogatoire"] == "" ||$report["InscriptionDerogatoire"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
                <label>Non</label>
            </span>
        </div>
        <div id="InscriptionDerogatoire" <?php if ($report["InscriptionDerogatoire"]=="" ||$report["InscriptionDerogatoire"]=="Non"){ echo 'style="display:none"'; }?> >
        <label>Un financement est-il prévu jusqu'à la soutenance de thèse ?</label>
            <span>
                <input name="Financement" value="Oui" type="radio" <?php if ($report["Financement"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
                <label>Oui</label>
            </span>
            <span>
                <input name="Financement" value="Non" type="radio" <?php if ($report["Financement"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
                <label>Non</label>
            </span>

            <div id="Financement" <?php if ($report["Financement"]=="" || $report["Financement"]=="Non"){ echo 'style="display:none"'; }?>>
                <label>Si oui, préciser </label>
                <textarea type="textarea" rows="5" class="form-control" name="FinancementDetails" ><?php echo $report["FinancementDetails"]; ?></textarea>
            </div>
        </div>
    </div>

    <h3>Avis sur la réinscription en thèse</h3>
    <span>
        <input required name="Reinscription" value="Favorable" type="radio" <?php if ($report["Reinscription"] == "Favorable") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Favorable</label>
    </span>
    <span>
        <input required name="Reinscription" value="Défavorable" type="radio" <?php if ($report["Reinscription"] == "Défavorable") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Défavorable</label>
    </span>
    <div>
        <label>Avis circonstancié</label>
        <textarea type="textarea" rows="5" class="form-control" name="AvisReinscription"><?php echo $report["AvisReinscription"]; ?></textarea>
    </div>

    <div>
        <label>Date de l'établissement du rapport</label>
        <input required type="date" class="form-control" name="DateRapport" id="DateRapport" value="<?php echo $report["DateRapport"]; ?>">
    </div>
    <?php if ($report_read_only == false) { ?>
        <div>
        <button type="submit" name="ReadOnly" formnovalidate value="Non" class="btn-default btn" style="default">Enregistrer le rapport uniquement</button>
            <button type="submit" name="ReadOnly" value="Oui" class="btn-default btn" style="default">Soumettre le rapport définitif</button>
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

    $("input[type=radio][name=Progression]").on("change", function() {
        if ((this.value == "La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible") ||
            (this.value == "La thèse n'a clairement pas assez progressé")) {
            $("#Argumentaire").show();
            $("#ArgumentaireProgression").prop('required', 'true');
        } else {
            $("#Argumentaire").hide();
            $("#ArgumentaireProgression").val('');
            $("#ArgumentaireProgression").removeAttr('required');
        }

    });
    
    $("input[type=radio][name=Financement]").on("change", function() {
        if (this.value == 'Oui') {
            $("#Financement").show();
        } else {
            $("#Financement").hide();
            $("textarea[name=FinancementDetails]").val('');
        }

    });

    $("input[type=radio][name=InscriptionDerogatoire]").on("change", function() {
        if (this.value == 'Oui') {
            $("#InscriptionDerogatoire").show();            
        } else {
            $("#InscriptionDerogatoire").hide();
            $("#Financement").hide();
            $("input[type=radio][name=Financement][value='Non']").prop("checked",true);
            $("textarea[name=FinancementDetails]").val('');
        }

    });
</script>