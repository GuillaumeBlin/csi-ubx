<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_PhDReport/", $_SERVER['REQUEST_URI']); ?>" method="POST" <?php } ?>>
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
    <h5>Type de financement</h5>
    <span>
        <input name="TypeDeFinancement" value="Ministère" type="radio">
        <label>Ministères</label>
    </span>
    <span>
        <input name="TypeDeFinancement" value="CIFRE" type="radio">
        <label>CIFRE</label>
    </span>
    <span>
        <input name="TypeDeFinancement" value="COFRA" type="radio">
        <label>COFRA</label>
    </span>
    <span>
        <input name="TypeDeFinancement" value="CD Droit Privé" type="radio">
        <label>CD Droit Privé</label>
    </span>
    <div>
        <input name="TypeDeFinancement" value="Autre" type="radio">
        <label>Autre
        </label>
        <input type="text" id="TypeDeFinancementAutre" class="other-val">
    </div>
    <h5>Thèse en cotutelle</h5>
    <span>
        <input name="PhD_Cotutelle" value="Oui" type="radio" readonly <?php if ($defense["these_cotutelle"] == "OUI") {
                                                                            echo "checked";
                                                                        } else {
                                                                            echo "disabled";
                                                                        }; ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="PhD_Cotutelle" value="Non" type="radio" readonly <?php if ($defense["these_cotutelle"] == "NON") {
                                                                            echo "checked";
                                                                        } else {
                                                                            echo "disabled";
                                                                        }; ?>>
        <label>Non</label>
    </span>
    <?php if ($defense["these_cotutelle"] == "OUI") { ?>
        <div>
            <label for="PhD_Cotutelle_Pays">Si oui, préciser le pays partenaire</label>
            <input type="text" class="form-control" readonly name="PhD_Cotutelle_Pays" id="PhD_Cotutelle_Pays" value="<?php echo $defense["these_cotutelle_pays"]; ?>">
        </div>
    <?php
    }
    ?>
    <h5>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise)</h5>
    <span>
        <input name="PhD_ExtraActivite" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="PhD_ExtraActivite" value="Non" type="radio" checked>
        <label>Non</label>
    </span>
    <div id="PhD_ExtraActivite_NbH_div" style="display:none">
        <label for="PhD_ExtraActivite_NbH">Si oui, nombre d’heures :</label>
        <input type="number" class="form-control" name="PhD_ExtraActivite_NbH" min="0" max="64" step="1" id="PhD_ExtraActivite_NbH">
    </div>

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo intval(substr($defense["niveau_Etud"], 0, 1)) + 1; ?>">
    <h4>Composition du comité de suivi individuel</h4>
    
    <?php 
    if ($report_read_only == true){
        $max=$report["CSI_Membre_Nombre"];
    }else{
        $max=count($defense["csi"]);
    }
    ?>
    <input type="hidden" name="CSI_Membre_Nombre" value="<?php echo $max;?>"/>
    <?php
    for ($i = 0; $i < $max; $i = $i + 1) { ?>

        <h5>Membre n°<?php echo $i + 1; ?></h5>
        <h6>Nom</h6>
        <input type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_Nom" id="CSI_Membre_<?php echo $i + 1; ?>_Nom" readonly value="<?php echo $defense["csi"][$i]["nom"]; ?>">
        <h6>Prénom</h6>
        <input type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_Prenom" id="CSI_Membre_<?php echo $i + 1; ?>_Prenom" readonly value="<?php echo $defense["csi"][$i]["prenom"]; ?>">
        <h6>Unité de recherche/établissement</h6>
        <input type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_UMR" id="CSI_Membre_<?php echo $i + 1; ?>_UMR">
        <h6>Adresse mail</h6>
        <input type="email" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_mail" id="CSI_Membre_<?php echo $i + 1; ?>_mail" readonly value="<?php echo $defense["csi"][$i]["mail"]; ?>">
        <h6>Référent</h6>
        <div>
            <input name="CSI_Referent_<?php echo $i + 1; ?>" disabled value="<?php echo $i + 1; ?>" type="radio" <?php if ($defense["csi"][$i]["referent"] == "oui") {
                                                                                            echo "checked";
                                                                                        } ?>>
            <label>Référent</label>
        </div>
        <h6>Qualité</h6>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_qualite" disabled value="Spécialiste du domaine de la thèse" type="radio" <?php if ($defense["csi"][$i]["membre_specialiste"] == "oui") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
            <label>Spécialiste du domaine de la thèse</label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_qualite" disabled value="Non spécialiste externe au domaine de la thèse" type="radio" <?php if ($defense["csi"][$i]["membre_non_specialiste"] == "oui") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
            <label>Non spécialiste externe au domaine de la thèse</label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_qualite" disabled value="Membre extérieur à l'établissement" type="radio" <?php if ($defense["csi"][$i]["membre_exterieur"] == "oui") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
            <label>Membre extérieur à l'établissement</label>
        </div>
    <?php } ?>
    <h3>Bilan annuel avec la direction de thèse</h3>
    <h5>Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques)</h5>
    <span>
        <input name="Freq_Contact_DT" value="Tous les jours" type="radio">
        <label>Tous les jours</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Plusieurs fois par semaine" type="radio">
        <label>Plusieurs fois par semaine</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Hebdomadaire" type="radio">
        <label>Hebdomadaire</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Mensuelle" type="radio">
        <label>Mensuelle</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Moins d'une fois par mois" type="radio">
        <label>Moins d'une fois par mois</label>
    </span>
    <?php if($defense["these_codirecteur_these_nom"]!=""){ ?>
    <h5>Fréquence des contacts avec la codirection de thèse</h5>
    <span>
        <input name="Freq_Contact_CODT" value="Tous les jours" type="radio">
        <label>Tous les jours</label>
    </span>
    <span>
        <input name="Freq_Contact_CODT" value="Plusieurs fois par semaine" type="radio">
        <label>Plusieurs fois par semaine</label>
    </span>
    <span>
        <input name="Freq_Contact_CODT" value="Hebdomadaire" type="radio">
        <label>Hebdomadaire</label>
    </span>
    <span>
        <input name="Freq_Contact_CODT" value="Mensuelle" type="radio">
        <label>Mensuelle</label>
    </span>
    <span>
        <input name="Freq_Contact_CODT" value="Moins d'une fois par mois" type="radio">
        <label>Moins d'une fois par mois</label>
    </span>
    <?php } ?>
    <h3>Bilan annuel de la relation avec l'unité de recherche</h3>
    <h5>Intégration dans l’unité de recherche</h5>
    <span>
        <input name="Integration_UMR" value="Peu satisfaisante" type="radio">
        <label>Peu satisfaisante</label>
    </span>
    <span>
        <input name="Integration_UMR" value="Satisfaisante" type="radio">
        <label>Satisfaisante</label>
    </span>
    <span>
        <input name="Integration_UMR" value="Très satisfaisante" type="radio">
        <label>Très satisfaisante</label>
    </span>
    <h5>Relations avec d'autres équipes scientifiques ?</h5>
    <span>
        <input name="Relation_Autre_EP" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="Relation_Autre_EP" value="Non" type="radio">
        <label>Non</label>
    </span>
    <div id="Relation_Autre_EP" style="display:none">
        <label for="Relation_Autre_EP_Details">Si oui, préciser lesquelles et si elles sont nationales ou internationales :</label>
        <textarea type="textarea" class="form-control" name="Relation_Autre_EP_Details" id="Relation_Autre_EP_Details"></textarea>
    </div>
    <h3>Avis général sur l'année écoulée</h3>
    <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    <h5>Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</h5>
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
    <h5>Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</h5>
    <span>
        <input name="Moyens" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Moyens" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Moyens" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</h5>
    <span>
        <input name="ReponsesAuxQuestions" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="ReponsesAuxQuestions" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="ReponsesAuxQuestions" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</h5>
    <span>
        <input name="InteretScientifique" value="Insuffisant" type="radio">
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="InteretScientifique" value="A améliorer" type="radio">
        <label>A améliorer</label>
    </span>
    <span>
        <input name="InteretScientifique" value="Satisfaisant" type="radio">
        <label>Satisfaisant</label>
    </span>
    <h5>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées</h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisGeneral" id="AvisGeneral"></textarea>
    <h5>Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</h5>
    <span>
        <input name="DdeRDV" value="Oui" type="radio">
        <label>Oui</label>
    </span>
    <span>
        <input name="DdeRDV" value="Non" type="radio">
        <label>Non</label>
    </span>
    <h5>Date de l'établissement du rapport</h5>
    <input type="date" class="form-control" name="DateRapport" id="DateRapport">
    <?php if ($report_read_only == false) { ?>
        <div>
            <button type="submit" class="btn-default btn" style="default">Soumettre le rapport</button>
        </div>
    <?php } ?>
</form>
<script>
    <?php if ($report_read_only == true) {

        foreach ($report as $k => $v) {
            echo "$('input[type=date][name=" . $k . "]').val('" . addslashes(preg_replace("/\n|\r/", " ",nl2br($v))) . "');";
            echo "$('input[type=text][name=" . $k . "]').val('" . addslashes(preg_replace("/\n|\r/", " ",nl2br($v))) . "');";
            echo "var t= $('textarea[name=" . $k . "]'); t.val('" . addslashes(preg_replace("/\n|\r/", " ",nl2br($v))) . "');";
    ?>
            if (t.length > 0) {
                t.height("");
                var x = t.prop('scrollHeight');
                x = x + 10;
                t.height(x + "px");
            };


            <?php
            echo "var j=$('input[type=radio][name=" . $k . "][value=\"" . addslashes(preg_replace("/\n|\r/", " ",nl2br($v))) . "\"]');";
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
    $("input[type=radio][name=PhD_ExtraActivite]").on("change", function() {
        if (this.value == 'Oui') {
            $("#PhD_ExtraActivite_NbH_div").show();
        } else {
            $("#PhD_ExtraActivite_NbH_div").hide();
            $("#PhD_ExtraActivite_NbH").val('');
        }

    });
    $("input[type=radio][name=Relation_Autre_EP]").on("change", function() {
        if (this.value == 'Oui') {
            $("#Relation_Autre_EP").show();
        } else {
            $("#Relation_Autre_EP").hide();
            $("#Relation_Autre_EP_Details").val('');
        }

    });
    
</script>