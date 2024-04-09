<form id="csi" <?php if ($report_read_only == false) { ?> action="<?php echo str_replace("/load_user/", "/form_save_PhDReport/", $_SERVER['REQUEST_URI']); ?>" method="POST" <?php } ?>>
    <input type="hidden" name="ed" id="ed" value="<?php echo $report["these_ED_code"]; ?>" />
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
    <input type="text" readonly class="form-control" name="PhD_UMR" id="PhD_UMR" value="<?php echo $report["PhD_UMR"]; ?>">
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $report["DT_Nom"]; ?>">
    <h5>Prénom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $report["DT_Prenom"]; ?>">
    <?php if ($report["CODT_Nom"] != "") { ?>
        <h5>Nom co-direction de thèse</h5>
        <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $report["CODT_Nom"]; ?>">
        <h5>Prénom co-direction de thèse</h5>
        <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $report["CODT_Prenom"]; ?>">
    <?php } ?>
    <h5>Date de début de thèse</h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="<?php echo $report["PhD_DateDebutThese"]; ?>">    
    <h5>Thèse en cotutelle</h5>
    <span>
        <input name="PhD_Cotutelle" value="Oui" type="radio" readonly <?php if ($report["PhD_Cotutelle"] == "Oui") {
                                                                            echo "checked";
                                                                        } else {
                                                                            echo "disabled";
                                                                        }; ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="PhD_Cotutelle" value="Non" type="radio" readonly <?php if ($report["PhD_Cotutelle"] == "Non") {
                                                                            echo "checked";
                                                                        } else {
                                                                            echo "disabled";
                                                                        }; ?>>
        <label>Non</label>
    </span>
    <?php if ($report["PhD_Cotutelle"] == "Oui") { ?>
        <div>
            <label for="PhD_Cotutelle_Pays">Si oui, préciser le pays partenaire</label>
            <input type="text" class="form-control" readonly name="PhD_Cotutelle_Pays" id="PhD_Cotutelle_Pays" value="<?php echo $report["PhD_Cotutelle_Pays"]; ?>">
        </div>
        <h5>Quelles sont les périodes de mobilités prévues durant votre co-tutelle ?</h5>
        <input type="text" class="form-control" name="PeriodesMobilites" id="PeriodesMobilites" value="<?php echo $report["PeriodesMobilites"]; ?>">
    <?php
    }
    ?>
    <h5>Votre doctorat est-il financé ?</h5>
    <span>
        <input name="DoctoratFinancement" value="Oui" type="radio" <?php if ($report["DoctoratFinancement"] == "Oui") {
                                                                            echo "checked";
                                                                        } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="DoctoratFinancement" value="Non" type="radio" <?php if ($report["DoctoratFinancement"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Non</label>
    </span>
    <h5>Votre doctorat est-il effectué dans le cadre d'une collaboration industrielle ?</h5>
    <span>
        <input name="CollaborationIndustrielle" value="Oui" type="radio" <?php if ($report["CollaborationIndustrielle"] == "Oui") {
                                                                            echo "checked";
                                                                        } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="CollaborationIndustrielle" value="Non" type="radio" <?php if ($report["CollaborationIndustrielle"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Non</label>
    </span>

    <?php if ($report["CollaborationIndustrielle"] == "Oui") { ?>
        <div id="CollaborationIndustrielle">
            <label for="CollaborationIndustrielleResponsable">Si oui, préciser le nom du responsable scientifique industriel</label>
            <input type="text" class="form-control" name="CollaborationIndustrielleResponsable" id="CollaborationIndustrielleResponsable" value="<?php echo $report["CollaborationIndustrielleResponsable"]; ?>">
        </div>
    <?php
    }
    ?>

    <h5>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise)</h5>
    <span>
        <input name="PhD_ExtraActivite" value="Oui" type="radio" <?php if ($report["PhD_ExtraActivite"] == "Oui") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="PhD_ExtraActivite" value="Non" type="radio" <?php if (!array_key_exists("PhD_ExtraActivite", $report) || $report["PhD_ExtraActivite"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Non</label>
    </span>

    <div id="PhD_ExtraActivite" <?php if (!array_key_exists("PhD_ExtraActivite", $report) || $report["PhD_ExtraActivite"] == "Non") {
                                            echo 'style="display:none"';
                                        } ?>>
        <label for="PhD_ExtraActivite_NbH">Si oui, nombre d’heures :</label>
        <input type="number" class="form-control" name="PhD_ExtraActivite_NbH" min="0" max="64" step="1" id="PhD_ExtraActivite_NbH" value="<?php echo $report["PhD_ExtraActivite_NbH"]; ?>">
    </div>
    <h5>Avez-vous été consulté sur la composition du comité de suivi ?</h5>
    <span>
        <input name="ConsultationCompositionCSI" value="Oui" type="radio" <?php if ($report["ConsultationCompositionCSI"] == "Oui") {
                                                                            echo "checked";
                                                                        } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="ConsultationCompositionCSI" value="Non" type="radio" <?php if ($report["ConsultationCompositionCSI"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Non</label>
    </span>
    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="20" step="1" id="PhD_CSI_Annee" value="<?php echo $report["PhD_CSI_Annee"]; ?>">
    <h4>Composition du comité de suivi individuel</h4>

    <?php
    $max = $report["CSI_Membre_Nombre"];
    ?>
    <input type="hidden" name="CSI_Membre_Nombre" value="<?php echo $max; ?>" />
    <?php
    for ($i = 0; $i < $max; $i = $i + 1) { ?>

        <h5>Membre n°<?php echo $i + 1; ?></h5>
        <h6>Nom</h6>
        <input type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_Nom" id="CSI_Membre_<?php echo $i + 1; ?>_Nom" readonly value="<?php echo $report["CSI_Membre_" . ($i + 1) . "_Nom"]; ?>">
        <h6>Prénom</h6>
        <input type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_Prenom" id="CSI_Membre_<?php echo $i + 1; ?>_Prenom" readonly value="<?php echo $report["CSI_Membre_" . ($i + 1) . "_Prenom"]; ?>">
        <h6>Adresse mail</h6>
        <input type="text" class="form-control" readonly name="CSI_Membre_<?php echo $i + 1; ?>_mail" id="CSI_Membre_<?php echo $i + 1; ?>_mail" readonly value="<?php echo $report["CSI_Membre_" . ($i + 1) . "_mail"]; ?>">
        <h6>Référent</h6>
        <div>
            <input name="CSI_Referent_<?php echo $i + 1; ?>" disabled value="<?php echo $i + 1; ?>" type="radio" <?php if ($report["CSI_Referent_" . ($i + 1) . ""] == "oui") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
            <?php if ($report["csi"][$i]["referent"] == "oui") { ?>
                <input name="CSI_Referent_<?php echo $i + 1; ?>" value="<?php echo $i + 1; ?>" type="hidden" />
            <?php    } ?>

            <label>Référent</label>
        </div>
        <h6>Qualité</h6>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_specialiste" disabled value="oui" type="radio" <?php if ($report["CSI_Membre_" . ($i + 1) . "_specialiste"] == "oui") {
                                                                                                                echo "checked";
                                                                                                            } ?>>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_specialiste" value="<?php if ($report["CSI_Membre_" . ($i + 1) . "_specialiste"] == "oui") {
                                                                                    echo "oui";
                                                                                }; ?>" type="hidden">
            <label>Spécialiste du domaine de la thèse</label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_non_specialiste" disabled value="oui" type="radio" <?php if ($report["CSI_Membre_" . ($i + 1) . "_non_specialiste"] == "oui") {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_non_specialiste" value="<?php if ($report["CSI_Membre_" . ($i + 1) . "_non_specialiste"] == "oui") {
                                                                                        echo "oui";
                                                                                    }; ?>" type="hidden">
            <label>Non spécialiste externe au domaine de la thèse</label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_externe" disabled value="oui" type="radio" <?php if ($report["CSI_Membre_" . ($i + 1) . "_externe"] == "oui") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_externe" value="<?php if ($report["CSI_Membre_" . ($i + 1) . "_externe"] == "oui") {
                                                                                echo "oui";
                                                                            }; ?>" type="hidden">
            <label>Membre extérieur à l'établissement</label>
        </div>
    <?php } ?>

    <h3>Etat d'avancement de la thèse</h3>
    <h5>Résumé</h5>
    <p>Présentation bilan d’activités, plan, rédaction, difficultés rencontrées, méthodologie, résultats, planning et calendrier prévisionnel
    </p>
    <textarea type="textarea" rows="5" class="form-control" wrap="wrap" name="ResumeAvancement"><?php echo $report["ResumeAvancement"]; ?></textarea>

    <h5>Productions scientifiques et participation à des colloques</h5>
        <textarea type="textarea" rows="5" class="form-control" name="ProductionScientifique"><?php echo $report["ProductionScientifique"]; ?></textarea>
        
    <h3>Bilan annuel avec la direction de thèse</h3>
    <h5>Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques)</h5>
    <span>
        <input name="Freq_Contact_DT" value="Tous les jours" type="radio" <?php if ($report["Freq_Contact_DT"] == "Tous les jours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Tous les jours</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Plusieurs fois par semaine" type="radio" <?php if ($report["Freq_Contact_DT"] == "Plusieurs fois par semaine") {
                                                                                            echo "checked";
                                                                                        } ?>>
        <label>Plusieurs fois par semaine</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Hebdomadaire" type="radio" <?php if ($report["Freq_Contact_DT"] == "Hebdomadaire") {
                                                                            echo "checked";
                                                                        } ?>>
        <label>Hebdomadaire</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Mensuelle" type="radio" <?php if ($report["Freq_Contact_DT"] == "Mensuelle") {
                                                                            echo "checked";
                                                                        } ?>>
        <label>Mensuelle</label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Moins d'une fois par mois" type="radio" <?php if ($report["Freq_Contact_DT"] == "Moins d'une fois par mois") {
                                                                                            echo "checked";
                                                                                        } ?>>
        <label>Moins d'une fois par mois</label>
    </span>
    <?php if ($report["CODT_Nom"] != "") { ?>
        <h5>Fréquence des contacts avec la codirection de thèse</h5>
        <span>
            <input name="Freq_Contact_CODT" value="Tous les jours" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Tous les jours") {
                                                                                    echo "checked";
                                                                                } ?>>
            <label>Tous les jours</label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Plusieurs fois par semaine" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Plusieurs fois par semaine") {
                                                                                                echo "checked";
                                                                                            } ?>>
            <label>Plusieurs fois par semaine</label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Hebdomadaire" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Hebdomadaire") {
                                                                                    echo "checked";
                                                                                } ?>>
            <label>Hebdomadaire</label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Mensuelle" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Mensuelle") {
                                                                                echo "checked";
                                                                            } ?>>
            <label>Mensuelle</label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Moins d'une fois par mois" type="radio" <?php if ($report["Freq_Contact_CODT"] == "Moins d'une fois par mois") {
                                                                                                echo "checked";
                                                                                            } ?>>
            <label>Moins d'une fois par mois</label>
        </span>
    <?php } ?>
    <h3>Bilan annuel de la relation avec l'unité de recherche</h3>
    <h5>Intégration dans l’unité de recherche</h5>
    <span>
        <input name="Integration_UMR" value="Peu satisfaisante" type="radio" <?php if ($report["Integration_UMR"] == "Peu satisfaisante") {
                                                                                    echo "checked";
                                                                                } ?>>
        <label>Peu satisfaisante</label>
    </span>
    <span>
        <input name="Integration_UMR" value="Satisfaisante" type="radio" <?php if ($report["Integration_UMR"] == "Satisfaisante") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisante</label>
    </span>
    <span>
        <input name="Integration_UMR" value="Très satisfaisante" type="radio" <?php if ($report["Integration_UMR"] == "Très satisfaisante") {
                                                                                    echo "checked";
                                                                                } ?>>
        <label>Très satisfaisante</label>
    </span>
    <h5>Relations avec d'autres équipes scientifiques ?</h5>
    <span>
        <input name="Relation_Autre_EP" value="Oui" type="radio" <?php if ($report["Relation_Autre_EP"] == "Oui") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="Relation_Autre_EP" value="Non" type="radio" <?php if (!array_key_exists("Relation_Autre_EP", $report) || $report["Relation_Autre_EP"] == "Non") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Non</label>
    </span>
    <div id="Relation_Autre_EP" <?php if (!array_key_exists("Relation_Autre_EP", $report) || $report["Relation_Autre_EP"] == "Non") {
                                    echo 'style="display:none"';
                                } ?>>
        <label for="Relation_Autre_EP_Details">Si oui, préciser lesquelles et si elles sont nationales ou internationales :</label>
        <textarea type="textarea" class="form-control" name="Relation_Autre_EP_Details" id="Relation_Autre_EP_Details"><?php echo $report["Relation_Autre_EP_Details"]; ?></textarea>
    </div>

    <h3>Bilan annuel des formations</h3>
    <h5>Formation à l’éthique de la recherche validée</h5>
    <span>
        <input name="EthiqueRecherche" value="Oui" type="radio" <?php if ($report["EthiqueRecherche"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="EthiqueRecherche" value="Non" type="radio" <?php if ($report["EthiqueRecherche"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Non</label>
    </span>
    <span>
        <input name="EthiqueRecherche" value="En cours" type="radio" <?php if ($report["EthiqueRecherche"] == "En cours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>En cours</label>
    </span>
    <h5>Formation à l’intégrité scientifique validée</h5>
    <span>
        <input name="IntegriteScientifique" value="Oui" type="radio" <?php if ($report["IntegriteScientifique"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="IntegriteScientifique" value="Non" type="radio" <?php if ($report["IntegriteScientifique"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Non</label>
    </span>
    <span>
        <input name="IntegriteScientifique" value="En cours" type="radio" <?php if ($report["IntegriteScientifique"] == "En cours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>En cours</label>
    </span>
    <h5>Formation à l’enseignement validée si mission d’enseignement </h5>
    <span>
        <input name="FormationEnseignement" value="Oui" type="radio" <?php if ($report["FormationEnseignement"] == "Oui") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="FormationEnseignement" value="Non" type="radio" <?php if ($report["FormationEnseignement"] == "Non") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Non</label>
    </span>
    <span>
        <input name="FormationEnseignement" value="En cours" type="radio" <?php if ($report["FormationEnseignement"] == "En cours") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>En cours</label>
    </span>
    <div id="FormationsObligatoiresPrecisions">
        <label>Si une ou des formations n’ont pas été suivies, préciser les raisons</label>
        <textarea type="textarea" rows="5" class="form-control" name="FormationsObligatoiresPrecisions"><?php echo $report["FormationsObligatoiresPrecisions"]; ?></textarea>
    </div>

    <h5>Formations suivies dans l'année</h5>
    <textarea type="textarea" rows="5" class="form-control" name="FormationsDansLAnnee"><?php echo $report["FormationsDansLAnnee"]; ?></textarea>

    <h3>Avis général sur l'année écoulée</h3>
    <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    <h5>Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</h5>
    <span>
        <input name="Autonomie" value="Insuffisant" type="radio" <?php if ($report["Autonomie"] == "Insuffisant") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Autonomie" value="A améliorer" type="radio" <?php if ($report["Autonomie"] == "A améliorer") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Autonomie" value="Satisfaisant" type="radio" <?php if ($report["Autonomie"] == "Satisfaisant") {
                                                                        echo "checked";
                                                                    } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</h5>
    <span>
        <input name="Moyens" value="Insuffisant" type="radio" <?php if ($report["Moyens"] == "Insuffisant") {
                                                                    echo "checked";
                                                                } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Moyens" value="A améliorer" type="radio" <?php if ($report["Moyens"] == "A améliorer") {
                                                                    echo "checked";
                                                                } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Moyens" value="Satisfaisant" type="radio" <?php if ($report["Moyens"] == "Satisfaisant") {
                                                                    echo "checked";
                                                                } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</h5>
    <span>
        <input name="ReponsesAuxQuestions" value="Insuffisant" type="radio" <?php if ($report["ReponsesAuxQuestions"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="ReponsesAuxQuestions" value="A améliorer" type="radio" <?php if ($report["ReponsesAuxQuestions"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input name="ReponsesAuxQuestions" value="Satisfaisant" type="radio" <?php if ($report["ReponsesAuxQuestions"] == "Satisfaisant") {
                                                                                    echo "checked";
                                                                                } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</h5>
    <span>
        <input name="InteretScientifique" value="Insuffisant" type="radio" <?php if ($report["InteretScientifique"] == "Insuffisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="InteretScientifique" value="A améliorer" type="radio" <?php if ($report["InteretScientifique"] == "A améliorer") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>A améliorer</label>
    </span>
    <span>
        <input name="InteretScientifique" value="Satisfaisant" type="radio" <?php if ($report["InteretScientifique"] == "Satisfaisant") {
                                                                                echo "checked";
                                                                            } ?>>
        <label>Satisfaisant</label>
    </span>
    <h5>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées</h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisGeneral" id="AvisGeneral"><?php echo $report["AvisGeneral"]; ?></textarea>
    <h5>Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</h5>
    <span>
        <input name="DdeRDV" value="Oui" type="radio" <?php if ($report["DdeRDV"] == "Oui") {
                                                            echo "checked";
                                                        } ?>>
        <label>Oui</label>
    </span>
    <span>
        <input name="DdeRDV" value="Non" type="radio" <?php if ($report["DdeRDV"] == "Non") {
                                                            echo "checked";
                                                        } ?>>
        <label>Non</label>
    </span>
    <h5>Date de l'établissement du rapport</h5>
    <input type="date" class="form-control" name="DateRapport" id="DateRapport" value="<?php echo $report["DateRapport"]; ?>">
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

    $("input[type=radio][name=PhD_ExtraActivite]").on("change", function() {
        if (this.value == 'Oui') {
            $("#PhD_ExtraActivite").show();
        } else {
            $("#PhD_ExtraActivite").hide();
            $("#PhD_ExtraActivite_NbH").val('');
        }
    });
    $("input[type=radio][name=CollaborationIndustrielle]").on("change", function() {
        if (this.value == 'Oui') {
            $("#CollaborationIndustrielle").show();
        } else {
            $("#CollaborationIndustrielle").hide();
            $("#CollaborationIndustrielleResponsable").val('');
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