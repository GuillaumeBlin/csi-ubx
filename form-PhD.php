<?php 
if(!isset($report_read_only)){$report_read_only=false;}
if(!isset($lang)){$lang="FR";}
?>
<!--
<?php 
//var_dump($report);
?>
-->
<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_PhDReport/", $_SERVER['REQUEST_URI']); ?>" method="POST"  onsubmit="return validateForm()" <?php } ?>>
    <input required type="hidden" name="ed" id="ed" value="<?php echo $report["ed"]; ?>" />
    <h3><?php if (strcmp($lang, "FR") == 0) {?>Informations générales<?php }else{?>General information
<?php }?></h3>
    <h4><?php if (strcmp($lang, "FR") == 0) {?>La doctorante ou le doctorant<?php }else{?>The PhD student<?php }?></h4>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Nom<?php }else{?>Last name<?php }?></h5>
    <input required type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $report["PhD_Nom"]; ?>">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Prénom<?php }else{?>First name<?php }?></h5>
    <input required type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="<?php echo $report["PhD_Prenom"]; ?>">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Email dans ADUM<?php }else{?>Email in ADUM<?php }?></h5>
    <input required type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="<?php echo $report["PhD_Mail"]; ?>">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Spécialité<?php }else{?>Domain<?php }?></h5>
    <input required type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="<?php echo $report["PhD_Specialite"]; ?>">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Unité de recherche<?php }else{?>Research unit<?php }?></h5>
    <input required type="text" readonly class="form-control" name="PhD_UMR" id="PhD_UMR" value="<?php echo $report["PhD_UMR"]; ?>">
    <h4><?php if (strcmp($lang, "FR") == 0) {?>La thèse<?php }else{?>The thesis<?php }?></h4>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Nom direction de thèse<?php }else{?>Supervisor last name<?php }?></h5>
    <input required type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $report["DT_Nom"]; ?>">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Prénom direction de thèse<?php }else{?>Supervisor first name<?php }?></h5>
    <input required type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $report["DT_Prenom"]; ?>">
    <?php if ($report["CODT_Nom"] != "") { ?>
        <h5><?php if (strcmp($lang, "FR") == 0) {?>Nom co-direction de thèse<?php }else{?>Co-supervisor last name<?php }?></h5>
        <input required type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $report["CODT_Nom"]; ?>">
        <h5><?php if (strcmp($lang, "FR") == 0) {?>Prénom co-direction de thèse<?php }else{?>Co-supervisor first name<?php }?></h5>
        <input required type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $report["CODT_Prenom"]; ?>">
    <?php } ?>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Date de début de thèse<?php }else{?>Starting date of the thesis<?php }?></h5>
    <input required type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="<?php echo $report["PhD_DateDebutThese"]; ?>">    
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Thèse en cotutelle<?php }else{?>Cotutelle<?php }?></h5>
    <span>
        <input required name="PhD_Cotutelle" value="Oui" type="radio" readonly <?php if ($report["PhD_Cotutelle"] == "Oui") {
                                                                            echo "checked";
                                                                        } else {
                                                                            echo "disabled";
                                                                        }; ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="PhD_Cotutelle" value="Non" type="radio" readonly <?php if ($report["PhD_Cotutelle"] == "Non") {
                                                                            echo "checked";
                                                                        } else {
                                                                            echo "disabled";
                                                                        }; ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <?php if ($report["PhD_Cotutelle"] == "Oui") { ?>
        <div>
            <label for="PhD_Cotutelle_Pays"><?php if (strcmp($lang, "FR") == 0) {?>Si oui, préciser le pays partenaire<?php }else{?>Cotutelle partner country<?php }?></label>
            <input required type="text" class="form-control" readonly name="PhD_Cotutelle_Pays" id="PhD_Cotutelle_Pays" value="<?php echo $report["PhD_Cotutelle_Pays"]; ?>">
        </div>
        <h5><?php if (strcmp($lang, "FR") == 0) {?>Quelles sont les périodes de mobilités prévues durant votre co-tutelle ?<?php }else{?>What are the schedule of stays?<?php }?></h5>
        <input required type="text" class="form-control" name="PeriodesMobilites" id="PeriodesMobilites" value="<?php echo $report["PeriodesMobilites"]; ?>">
    <?php
    }
    ?>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Votre doctorat est-il financé ?<?php }else{?>Is your doctorate funded?<?php }?></h5>
    <span>
        <input required name="DoctoratFinancement" value="Oui" type="radio" <?php if ($report["DoctoratFinancement"] == "Oui") {
                                                                            echo "checked";
                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="DoctoratFinancement" value="Non" type="radio" <?php if ($report["DoctoratFinancement"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Votre doctorat est-il effectué dans le cadre d'une collaboration industrielle ?<?php }else{?>Is your doctorate being carried out as part of an industrial collaboration?
<?php }?></h5>
    <span>
        <input required name="CollaborationIndustrielle" value="Oui" type="radio" <?php if ($report["CollaborationIndustrielle"] == "Oui") {
                                                                            echo "checked";
                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="CollaborationIndustrielle" value="Non" type="radio" <?php if ($report["CollaborationIndustrielle"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>

        <div id="CollaborationIndustrielle" <?php if ($report["CollaborationIndustrielle"] == "" || $report["CollaborationIndustrielle"] == "Non") {
                                            echo 'style="display:none"';
                                        } ?>>
            <label for="CollaborationIndustrielleResponsable"><?php if (strcmp($lang, "FR") == 0) {?> Si oui, préciser le nom du responsable scientifique industriel<?php }else{?>Please specify the name of the industrial scientific manager<?php }?></label>
            <input type="text" class="form-control" name="CollaborationIndustrielleResponsable" id="CollaborationIndustrielleResponsable" value="<?php echo $report["CollaborationIndustrielleResponsable"]; ?>">
        </div>
    
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise)<?php }else{?>Thesis with complementary activities (teaching, mediation, expertise)<?php }?></h5>
    <span>
        <input required name="PhD_ExtraActivite" value="Oui" type="radio" <?php if ($report["PhD_ExtraActivite"] == "Oui") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="PhD_ExtraActivite" value="Non" type="radio" <?php if ($report["PhD_ExtraActivite"] == "" || $report["PhD_ExtraActivite"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>

    <div id="PhD_ExtraActivite" <?php if ($report["PhD_ExtraActivite"] == "" || $report["PhD_ExtraActivite"] == "Non") {
                                            echo 'style="display:none"';
                                        } ?>>
        <label for="PhD_ExtraActivite_NbH"><?php if (strcmp($lang, "FR") == 0) {?>Si oui, nombre d’heures :<?php }else{?>Please provide the related number of hours:<?php }?></label>
        <input type="number" class="form-control" name="PhD_ExtraActivite_NbH" min="0" max="64" step="1" id="PhD_ExtraActivite_NbH" value="<?php echo $report["PhD_ExtraActivite_NbH"]; ?>">
    </div>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avez-vous été consulté sur la composition du comité de suivi ?<?php }else{?>Have you been consulted on the composition of the monitoring committee?
<?php }?></h5>
    <span>
        <input required name="ConsultationCompositionCSI" value="Oui" type="radio" <?php if ($report["ConsultationCompositionCSI"] == "Oui") {
                                                                            echo "checked";
                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="ConsultationCompositionCSI" value="Non" type="radio" <?php if ($report["ConsultationCompositionCSI"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <h4><?php if (strcmp($lang, "FR") == 0) {?>Année du CSI<?php }else{?>CSI year<?php }?></h4>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>CSI pour réinscription en année<?php }else{?>CSI for re-registration in year<?php }?></h5>
    <input required type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="20" step="1" id="PhD_CSI_Annee" value="<?php echo $report["PhD_CSI_Annee"]; ?>">
    <h4><?php if (strcmp($lang, "FR") == 0) {?>Composition du comité de suivi individuel<?php }else{?>Composition of the individual monitoring committee<?php }?></h4>

    <?php
    $max = $report["CSI_Membre_Nombre"];
    ?>
    <input type="hidden" name="CSI_Membre_Nombre" value="<?php echo $max; ?>" />
    <?php
    for ($i = 0; $i < $max; $i = $i + 1) { ?>

        <h5><?php if (strcmp($lang, "FR") == 0) {?>Membre<?php }else{?>Member<?php }?> n°<?php echo $i + 1; ?></h5>
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Nom<?php }else{?>Last name<?php }?></h6>
        <input required type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_Nom" id="CSI_Membre_<?php echo $i + 1; ?>_Nom" readonly value="<?php echo $report["CSI_Membre_" . ($i + 1) . "_Nom"]; ?>">
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Prénom<?php }else{?>First name<?php }?></h6>
        <input required type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_Prenom" id="CSI_Membre_<?php echo $i + 1; ?>_Prenom" readonly value="<?php echo $report["CSI_Membre_" . ($i + 1) . "_Prenom"]; ?>">
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Adresse mail<?php }else{?>Mail address<?php }?></h6>
        <input required type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_mail" id="CSI_Membre_<?php echo $i + 1; ?>_mail" readonly value="<?php echo $report["CSI_Membre_" . ($i + 1) . "_mail"]; ?>">
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Référent<?php }else{?>Referent<?php }?></h6>
        <div>
            <input name="CSI_Referent_<?php echo $i + 1; ?>" disabled value="<?php echo $i + 1; ?>" type="radio" <?php if ($report["CSI_Referent_" . ($i + 1) . ""] == "oui") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
            <?php if ($report["CSI_Referent_" . ($i + 1) . ""] == "oui")  { ?>
                <input name="CSI_Referent_<?php echo $i + 1; ?>" value="<?php echo $i + 1; ?>" type="hidden" />
            <?php    } ?>

            <label><?php if (strcmp($lang, "FR") == 0) {?>Référent<?php }else{?>Referent<?php }?></label>
        </div>
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Qualité<?php }else{?>Quality<?php }?></h6>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_specialiste" disabled value="oui" type="radio" <?php if ($report["CSI_Membre_" . ($i + 1) . "_specialiste"] == "oui") {
                                                                                                                echo "checked";
                                                                                                            } ?>>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_specialiste" value="<?php if ($report["CSI_Membre_" . ($i + 1) . "_specialiste"] == "oui") {
                                                                                    echo "oui";
                                                                                }; ?>" type="hidden">
            <label><?php if (strcmp($lang, "FR") == 0) {?>Spécialiste du domaine de la thèse<?php }else{?> Specialist in thesis field<?php }?></label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_non_specialiste" disabled value="oui" type="radio" <?php if ($report["CSI_Membre_" . ($i + 1) . "_non_specialiste"] == "oui") {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_non_specialiste" value="<?php if ($report["CSI_Membre_" . ($i + 1) . "_non_specialiste"] == "oui") {
                                                                                        echo "oui";
                                                                                    }; ?>" type="hidden">
            <label><?php if (strcmp($lang, "FR") == 0) {?>Non spécialiste externe au domaine de la thèse<?php }else{?>Non-specialist from outside the thesis field
<?php }?></label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_externe" disabled value="oui" type="radio" <?php if ($report["CSI_Membre_" . ($i + 1) . "_externe"] == "oui") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_externe" value="<?php if ($report["CSI_Membre_" . ($i + 1) . "_externe"] == "oui") {
                                                                                echo "oui";
                                                                            }; ?>" type="hidden">
            <label><?php if (strcmp($lang, "FR") == 0) {?>Membre extérieur à l'établissement<?php }else{?><?php }?>External member</label>
        </div>
    <?php } ?>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Etat d'avancement de la thèse<?php }else{?>Thesis progress<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Résumé<?php }else{?>Summary<?php }?></h5>
    <p><?php if (strcmp($lang, "FR") == 0) {?>Présentation bilan d’activités, plan, rédaction, difficultés rencontrées, méthodologie, résultats, planning et calendrier prévisionnel<?php }else{?>Presentation of activities, plan, writing, difficulties encountered, methodology, results, schedule and provisional timetable
<?php }?>
    </p>
    <textarea type="textarea" rows="5" class="form-control" wrap="wrap" name="ResumeAvancement"><?php echo $report["ResumeAvancement"]; ?></textarea>

    <h5><?php if (strcmp($lang, "FR") == 0) {?>Productions scientifiques et participation à des colloques<?php }else{?>Publications and participation in conferences
<?php }?></h5>
        <textarea type="textarea" rows="5" class="form-control" name="ProductionScientifique"><?php echo $report["ProductionScientifique"]; ?></textarea>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Bilan annuel avec la direction de thèse<?php }else{?>Annual review with thesis supervisor<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques)<?php }else{?>Frequency of contact with thesis supervisor (excluding e-mail)
<?php }?></h5>
    <span>
        <input required name="Freq_Contact_DT" value="Tous les jours" type="radio" <?php if ($report["Freq_Contact_DT"] == "Tous les jours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Tous les jours<?php }else{?>Daily<?php }?></label>
    </span>
    <span>
        <input required name="Freq_Contact_DT" value="Plusieurs fois par semaine" type="radio" <?php if ($report["Freq_Contact_DT"] == "Plusieurs fois par semaine") {
                                                                                            echo "checked";
                                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Plusieurs fois par semaine<?php }else{?>Several times a week<?php }?></label>
    </span>
    <span>
        <input required name="Freq_Contact_DT" value="Hebdomadaire" type="radio" <?php if ($report["Freq_Contact_DT"] == "Hebdomadaire") {
                                                                            echo "checked";
                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Hebdomadaire<?php }else{?>Weekly<?php }?></label>
    </span>
    <span>
        <input required name="Freq_Contact_DT" value="Mensuelle" type="radio" <?php if ($report["Freq_Contact_DT"] == "Mensuelle") {
                                                                            echo "checked";
                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Mensuelle<?php }else{?>Monthly<?php }?></label>
    </span>
    <span>
        <input required name="Freq_Contact_DT" value="Moins d'une fois par mois" type="radio" <?php if ($report["Freq_Contact_DT"] == "Moins d'une fois par mois") {
                                                                                            echo "checked";
                                                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Moins d'une fois par mois<?php }else{?>Less than once a month<?php }?></label>
    </span>
    <?php if ($report["CODT_Nom"] != "") { ?>
        <h5><?php if (strcmp($lang, "FR") == 0) {?>Fréquence des contacts avec la codirection de thèse<?php }else{?>Frequency of contact with thesis supervisor<?php }?></h5>
        <span>
            <input required name="Freq_Contact_CODT" value="Tous les jours" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Tous les jours") {
                                                                                    echo "checked";
                                                                                } ?>>
            <label><?php if (strcmp($lang, "FR") == 0) {?>Tous les jours<?php }else{?>Daily<?php }?></label>
        </span>
        <span>
            <input required name="Freq_Contact_CODT" value="Plusieurs fois par semaine" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Plusieurs fois par semaine") {
                                                                                                echo "checked";
                                                                                            } ?>>
            <label><?php if (strcmp($lang, "FR") == 0) {?>Plusieurs fois par semaine<?php }else{?>Several times a week<?php }?></label>
        </span>
        <span>
            <input required name="Freq_Contact_CODT" value="Hebdomadaire" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Hebdomadaire") {
                                                                                    echo "checked";
                                                                                } ?>>
            <label><?php if (strcmp($lang, "FR") == 0) {?>Hebdomadaire<?php }else{?>Weekly<?php }?></label>
        </span>
        <span>
            <input required name="Freq_Contact_CODT" value="Mensuelle" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Mensuelle") {
                                                                                echo "checked";
                                                                            } ?>>
            <label><?php if (strcmp($lang, "FR") == 0) {?>Mensuelle<?php }else{?>Monthly<?php }?></label>
        </span>
        <span>
            <input required name="Freq_Contact_CODT" value="Moins d'une fois par mois" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Moins d'une fois par mois") {
                                                                                                echo "checked";
                                                                                            } ?>>
            <label><?php if (strcmp($lang, "FR") == 0) {?>Moins d'une fois par mois<?php }else{?>Less than once a month<?php }?></label>
        </span>
    <?php } ?>
    <h3><?php if (strcmp($lang, "FR") == 0) {?>Bilan annuel de la relation avec l'unité de recherche<?php }else{?>Annual assessment of relationship with research unit
<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Intégration dans l’unité de recherche<?php }else{?>Integration into the research unit
<?php }?></h5>
    <span>
        <input required name="Integration_UMR" value="Peu satisfaisante" type="radio" <?php if ($report["Integration_UMR"] == "Peu satisfaisante") {
                                                                                    echo "checked";
                                                                                } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Peu satisfaisante<?php }else{?>Unsatisfactory<?php }?></label>
    </span>
    <span>
        <input required name="Integration_UMR" value="Satisfaisante" type="radio" <?php if ($report["Integration_UMR"] == "Satisfaisante") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisante<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <span>
        <input required name="Integration_UMR" value="Très satisfaisante" type="radio" <?php if ($report["Integration_UMR"] == "Très satisfaisante") {
                                                                                    echo "checked";
                                                                                } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Très satisfaisante<?php }else{?>Very satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Relations avec d'autres équipes scientifiques ?<?php }else{?>Relations with other scientific teams?
<?php }?></h5>
    <span>
        <input required name="Relation_Autre_EP" value="Oui" type="radio" <?php if ($report["Relation_Autre_EP"] == "Oui") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="Relation_Autre_EP" value="Non" type="radio" <?php if ($report["Relation_Autre_EP"] =="" || $report["Relation_Autre_EP"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <div id="Relation_Autre_EP" <?php if ($report["Relation_Autre_EP"] == "" || $report["Relation_Autre_EP"] == "Non") {
                                    echo 'style="display:none"';
                                } ?>>
        <label for="Relation_Autre_EP_Details"><?php if (strcmp($lang, "FR") == 0) {?>Si oui, préciser lesquelles et si elles sont nationales ou internationales :<?php }else{?>Please specify which ones and whether they are national or international :<?php }?></label>
        <textarea type="textarea" class="form-control" name="Relation_Autre_EP_Details" id="Relation_Autre_EP_Details"><?php echo $report["Relation_Autre_EP_Details"]; ?></textarea>
    </div>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Bilan annuel des formations<?php }else{?>Annual training report
<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formation à l’éthique de la recherche validée<?php }else{?>Research ethics training validated<?php }?></h5>
    <span>
        <input required name="EthiqueRecherche" value="Oui" type="radio" <?php if ($report["EthiqueRecherche"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="EthiqueRecherche" value="Non" type="radio" <?php if ($report["EthiqueRecherche"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <span>
        <input required name="EthiqueRecherche" value="En cours" type="radio" <?php if ($report["EthiqueRecherche"] == "En cours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>En cours<?php }else{?>In progress<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formation à l’intégrité scientifique validée<?php }else{?>Scientific integrity training validated<?php }?></h5>
    <span>
        <input required name="IntegriteScientifique" value="Oui" type="radio" <?php if ($report["IntegriteScientifique"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="IntegriteScientifique" value="Non" type="radio" <?php if ($report["IntegriteScientifique"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <span>
        <input required name="IntegriteScientifique" value="En cours" type="radio" <?php if ($report["IntegriteScientifique"] == "En cours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>En cours<?php }else{?>In progress<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formation à l’enseignement validée si mission d’enseignement <?php }else{?>Teaching training validated if teaching mission<?php }?></h5>
    <span>
        <input required name="FormationEnseignement" value="Oui" type="radio" <?php if ($report["FormationEnseignement"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="FormationEnseignement" value="Non" type="radio" <?php if ($report["FormationEnseignement"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <span>
        <input required name="FormationEnseignement" value="En cours" type="radio" <?php if ($report["FormationEnseignement"] == "En cours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>En cours<?php }else{?>In progress<?php }?></label>
    </span>
    <div id="FormationsObligatoiresPrecisions">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Si une ou des formations n’ont pas été suivies, préciser les raisons<?php }else{?>If one or more training courses have not been taken, please give reasons
<?php }?></label>
        <textarea type="textarea" rows="5" class="form-control" name="FormationsObligatoiresPrecisions"><?php echo $report["FormationsObligatoiresPrecisions"]; ?></textarea>
    </div>

    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formations suivies dans l'année<?php }else{?>Training courses taken during the year
<?php }?></h5>
    <textarea type="textarea" rows="5" class="form-control" name="FormationsDansLAnnee"><?php echo $report["FormationsDansLAnnee"]; ?></textarea>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Avis général sur l'année écoulée<?php }else{?>General opinion of the past year
<?php }?></h3>
    <p><?php if (strcmp($lang, "FR") == 0) {?>Donner votre avis personnel sur les points suivants&nbsp;<?php }else{?>Please give your personal opinion on the following points
<?php }?></p>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;<?php }else{?>Do you have enough autonomy to manage your work?<?php }?></h5>
    <span>
        <input required name="Autonomie" value="Insuffisant" type="radio" <?php if ($report["Autonomie"] == "Insuffisant") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input required name="Autonomie" value="A améliorer" type="radio" <?php if ($report["Autonomie"] == "A améliorer") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input required name="Autonomie" value="Satisfaisant" type="radio" <?php if ($report["Autonomie"] == "Satisfaisant") {
                                                                        echo "checked";
                                                                    } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;<?php }else{?>Do you have the necessary means to carry out your work?
<?php }?></h5>
    <span>
        <input required name="Moyens" value="Insuffisant" type="radio" <?php if ($report["Moyens"] == "Insuffisant") {
                                                                    echo "checked";
                                                                } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input required name="Moyens" value="A améliorer" type="radio" <?php if ($report["Moyens"] == "A améliorer") {
                                                                    echo "checked";
                                                                } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input required name="Moyens" value="Satisfaisant" type="radio" <?php if ($report["Moyens"] == "Satisfaisant") {
                                                                    echo "checked";
                                                                } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;<?php }else{?>Do you find answers to your scientific questions in your work environment?
<?php }?></h5>
    <span>
        <input required name="ReponsesAuxQuestions" value="Insuffisant" type="radio" <?php if ($report["ReponsesAuxQuestions"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input required name="ReponsesAuxQuestions" value="A améliorer" type="radio" <?php if ($report["ReponsesAuxQuestions"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input required name="ReponsesAuxQuestions" value="Satisfaisant" type="radio" <?php if ($report["ReponsesAuxQuestions"] == "Satisfaisant") {
                                                                                    echo "checked";
                                                                                } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;<?php }else{?>Does the scientific interest of the subject correspond to your expectations?
<?php }?></h5>
    <span>
        <input required name="InteretScientifique" value="Insuffisant" type="radio" <?php if ($report["InteretScientifique"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input required name="InteretScientifique" value="A améliorer" type="radio" <?php if ($report["InteretScientifique"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input required name="InteretScientifique" value="Satisfaisant" type="radio" <?php if ($report["InteretScientifique"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées<?php }else{?>General opinion on the thesis, specifying any difficulties encountered
<?php }?></h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisGeneral" id="AvisGeneral"><?php echo $report["AvisGeneral"]; ?></textarea>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;<?php }else{?>Request for a confidential meeting with the doctoral school management to report "any form of conflict, discrimination, moral or sexual harassment or sexist behaviour".<?php }?></h5>
    <span>
        <input required name="DdeRDV" value="Oui" type="radio" <?php if ($report["DdeRDV"] == "Oui") {
                                                            echo "checked";
                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input required name="DdeRDV" value="Non" type="radio" <?php if ($report["DdeRDV"] == "Non") {
                                                            echo "checked";
                                                        } ?>>
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Date de l'établissement du rapport<?php }else{?>Date of report<?php }?></h5>
    <input required type="date" class="form-control" name="DateRapport" id="DateRapport" value="<?php echo $report["DateRapport"]; ?>">
    <?php if ($report_read_only == false) { ?>
        <div>
        <button type="submit" formnovalidate name="ReadOnly" value="Non" class="btn-default btn" style="default"><?php if (strcmp($lang, "FR") == 0) {?>Enregistrer le rapport uniquement<?php }else{?>Only save the report <?php }?></button>
            <button type="submit" name="ReadOnly" value="Oui" class="btn-default btn" style="default"><?php if (strcmp($lang, "FR") == 0) {?>Soumettre le rapport définitif<?php }else{?>Submit the final report<?php }?></button>
        </div>
    <?php } ?>
</form>
<script>
    <?php if ($report_read_only == true) {
    ?>
    function nl2br(str, replaceMode, isXhtml) {
        var breakTag = (isXhtml) ? '<br />' : '<br>';
        var replaceStr = (replaceMode) ? '$1' + breakTag : '$1' + breakTag + '$2';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
    }


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
    }else{
    ?>

    $("input[type=radio][name=PhD_ExtraActivite]").on("change", function() {
        if (this.value == 'Oui') {
            $("#PhD_ExtraActivite").show();
            $("#PhD_ExtraActivite_NbH").prop('required', 'true');
        } else {
            $("#PhD_ExtraActivite").hide();
            $("#PhD_ExtraActivite_NbH").val('');
            $("#PhD_ExtraActivite_NbH").prop('required', 'false');
        }
    });
    $("input[type=radio][name=CollaborationIndustrielle]").on("change", function() {
        if (this.value == 'Oui') {
            $("#CollaborationIndustrielle").show();
            $("#CollaborationIndustrielleResponsable").prop('required', 'true');
        } else {
            $("#CollaborationIndustrielle").hide();
            $("#CollaborationIndustrielleResponsable").val('');
            $("#CollaborationIndustrielleResponsable").prop('required', 'false');
        }
    });
    
    $("input[type=radio][name=Relation_Autre_EP]").on("change", function() {
        if (this.value == 'Oui') {
            $("#Relation_Autre_EP").show();
            $("#Relation_Autre_EP_Details").prop('required', 'true');
        } else {
            $("#Relation_Autre_EP").hide();
            $("#Relation_Autre_EP_Details").val('');
            $("#Relation_Autre_EP_Details").prop('required', 'false');
        }

    });
<?php
    }
?>
</script>