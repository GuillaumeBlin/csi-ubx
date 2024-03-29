<form action="<?php echo str_replace("/load_user/","/form_save_PhDReport/",$_SERVER['REQUEST_URI']);?>" method="POST">
<div>
    <h1>Rapport annuel de la doctorante ou du doctorant </h1>
    <h2>INFORMATION GÉNÉRALES</h2>
    <h3>LA DOCTORANTE OU LE DOCTORANT</h3>
    <div class="">
        <p>          
        <div class="form-group">
                <h4>Nom</h4>
                <input type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $defense["nom"];?>">
        </div>
        <div class="form-group">
                <h4>Prénom</h4>
                <input type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="<?php echo $defense["prenom"];?>">
        </div>
        <div class="form-group">
                <h4>Email dans ADUM</h4>
                <input type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="<?php echo $defense["mail_principal"];?>">
        </div>
        <div class="form-group">
                <h4>Spécialité</h4>
                <input type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="<?php echo $defense["these_specialite"];?>">
        </div>
        <div class="form-group">
                <h4>Unité de recherche</h4>
                <input type="text" readonly class="form-control" name="PhD_UMR" id="PhD_UMR" value="<?php echo $defense["these_laboratoire"];?>">
        </div>
        </p>
    </div>
    <h3>LA THÈSE</h3>
    <div>
        <div class="form-group">
                <h4>Nom direction de thèse</h4>
                <input type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $defense["these_directeur_these_nom"];?>">
        </div>
        <div class="form-group">
                <h4>Prénom direction de thèse</h4>
                <input type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $defense["these_directeur_these_prenom"];?>">
        </div>
        <div class="form-group">
                <h4>Nom co-direction de thèse</h4>
                <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $defense["these_codirecteur_these_nom"];?>">
        </div>
        <div class="form-group">
                <h4>Prénom co-direction de thèse</h4>
                <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $defense["these_codirecteur_these_prenom"];?>">
        </div>        
    </div>
    <div>
        <h4>Date de début de thèse</h4>
        <input type="date" class="form-control" name="PhD_DateDebutThese" readonly  id="PhD_DateDebutThese" value="<?php echo date('Y-m-d', strtotime($defense["these_date_1inscription"])); ?>">
    </div>
    <div>
        <h4>Type de financement</h4>
        <div class="radio-group">
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
        </div>
    </div>
    <div>
        <h4>Thèse en cotutelle</h4>
        
        <div class="radio-group">
            <span>
                <input name="PhD_Cotutelle" value="Oui" type="radio" readonly <?php if($defense["these_cotutelle"]=="OUI") {echo "checked";}else{echo "disabled";};?>>
                <label>Oui</label>
            </span>
            <span>
                <input name="PhD_Cotutelle" value="Non" type="radio" readonly <?php if($defense["these_cotutelle"]=="NON") {echo "checked";}else{echo "disabled";};?>>
                <label>Non</label>
            </span>
        </div>
    </div>
    <?php if($defense["these_cotutelle"]=="OUI") {?>
        <div>
        <label for="PhD_Cotutelle_Pays" >Si oui, préciser le pays partenaire</label>
        <input type="text" class="form-control" name="PhD_Cotutelle_Pays" id="PhD_Cotutelle_Pays" value="<?php echo $defense["these_cotutelle_pays"];?>">
    </div>
    <?php 
    }
    ?>
    <div>
        <h4>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise)
        </h4>
        <div class="radio-group">
            <span>
                <input name="PhD_ExtraActivite" value="Oui" type="radio">
                <label>Oui</label>
            </span>
            <span>
                <input name="PhD_ExtraActivite" value="Non" type="radio">
                <label>Non</label>
            </span>
        </div>
    </div>
    <div id="PhD_ExtraActivite_NbH_div">
        <label for="PhD_ExtraActivite_NbH" >Si oui, nombre d’heures :</label>
        <input type="number" class="form-control" name="PhD_ExtraActivite_NbH" min="0" max="64" step="1" id="PhD_ExtraActivite_NbH">
    </div>
    <h3>ANNÉE DU CSI</h3>
    <div>
        <label for="PhD_CSI_Annee">
            <div>CSI pour réinscription en année</div>
        </label>
        
        <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo intval(substr($defense["niveau_Etud"],0,1))+1;?>">
    </div>
        <h3>COMPOSITION DU COMITÉ DE SUIVI INDIVIDUEL (hors direction de thèse)</h3>
        <h4>La direction de la thèse ne fait pas partie du comité de suivi. Il comprend à minima 2 membres.</h4>
    <div>
        <p>
            <div>Membre n°1
            </div>
            <div>
                <?php //print_r($defense["csi"]);
                ?> 
                <label for="CSI_Membre_1_Nom">Nom</label>
                <input type="text" class="form-control" name="CSI_Membre_1_Nom" id="CSI_Membre_1_Nom" readonly value="<?php echo $defense["csi"][0]["nom"];?>">
            </div>
            <div>
                <label for="CSI_Membre_1_Prenom" >Prénom</label>
                <input type="text" class="form-control" name="CSI_Membre_1_Prenom" id="CSI_Membre_1_Prenom" readonly value="<?php echo $defense["csi"][0]["prenom"];?>">
            </div>
            <div>
                <label for="CSI_Membre_1_UMR">Unité de recherche/établissement</label>
                <input type="text" class="form-control" name="CSI_Membre_1_UMR" id="CSI_Membre_1_UMR" >
            </div>
            <div>
                <label for="CSI_Membre_1_mail">Adresse mail</label>
                <input type="email" class="form-control" name="CSI_Membre_1_mail" id="CSI_Membre_1_mail" value="<?php echo $defense["csi"][0]["mail"];?>">
            </div>                    
        <div class="radio-group">
            <div>
                <input name="CSI_Membre_1_qualite" value="Spécialiste du domaine de la thèse" type="radio" <?php if($defense["csi"][0]["membre_specialiste"]=="oui"){echo "checked";}?>>
                <label>Spécialiste du domaine de la thèse</label>
            </div>
            <div>
                <input name="CSI_Membre_1_qualite" value="Non spécialiste externe au domaine de la thèse" type="radio" <?php if($defense["csi"][0]["membre_non_specialiste"]=="oui"){echo "checked";}?>>
                <label>Non spécialiste externe au domaine de la thèse</label>
            </div>
            <div>
                <input name="CSI_Membre_1_qualite" value="Membre extérieur à l'établissement" type="radio" <?php if($defense["csi"][0]["membre_exterieur"]=="oui"){echo "checked";}?>>
                <label>Membre extérieur à l'établissement</label>
            </div>
        </div>
            
            <div>Membre n°2</div>
            <div>
                <label for="CSI_Membre_2_Nom">Nom</label>
                <input type="text" class="form-control" name="CSI_Membre_2_Nom" id="CSI_Membre_2_Nom" readonly value="<?php echo $defense["csi"][1]["nom"];?>">
            </div>
            <div>
                <label for="CSI_Membre_2_Prenom" >Prénom</label>
                <input type="text" class="form-control" name="CSI_Membre_2_Prenom" id="CSI_Membre_2_Prenom" readonly value="<?php echo $defense["csi"][1]["prenom"];?>">
            </div>
            <div>
                <label for="CSI_Membre_2_UMR">Unité de recherche/établissement</label>
                <input type="text" class="form-control" name="CSI_Membre_2_UMR" id="CSI_Membre_2_UMR">
            </div>
            <div>
                <label for="CSI_Membre_2_mail">Adresse mail</label>
                <input type="email" class="form-control" name="CSI_Membre_2_mail" id="CSI_Membre_2_mail" value="<?php echo $defense["csi"][1]["mail"];?>">
            </div>
            <div class="radio-group">
            <div>
                <input name="CSI_Membre_2_qualite" value="Spécialiste du domaine de la thèse" type="radio" <?php if($defense["csi"][1]["membre_specialiste"]=="oui"){echo "checked";}?>>
                <label>Spécialiste du domaine de la thèse</label>
            </div>
            <div>
                <input name="CSI_Membre_2_qualite" value="Non spécialiste externe au domaine de la thèse" type="radio" <?php if($defense["csi"][1]["membre_non_specialiste"]=="oui"){echo "checked";}?>>
                <label>Non spécialiste externe au domaine de la thèse</label>
            </div>
            <div>
                <input name="CSI_Membre_2_qualite" value="Membre extérieur à l'établissement" type="radio" <?php if($defense["csi"][1]["membre_exterieur"]=="oui"){echo "checked";}?>>
                <label>Membre extérieur à l'établissement</label>
            </div>
        </div>
            <div>Membre n°3</div>
            <div>
                <label for="CSI_Membre_3_Nom">Nom</label>
                <input type="text" class="form-control" name="CSI_Membre_3_Nom" id="CSI_Membre_3_Nom" readonly value="<?php echo $defense["csi"][2]["nom"];?>">
            </div>
            <div>
                <label for="CSI_Membre_3_Prenom" >Prénom</label>
                <input type="text" class="form-control" name="CSI_Membre_3_Prenom" id="CSI_Membre_3_Prenom" readonly value="<?php echo $defense["csi"][2]["nom"];?>">
            </div>
            <div>
                <label for="CSI_Membre_3_UMR">Unité de recherche/établissement</label>
                <input type="text" class="form-control" name="CSI_Membre_3_UMR" id="CSI_Membre_3_UMR">
            </div>
            <div>
                <label for="CSI_Membre_3_mail">Adresse mail</label>
                <input type="email" class="form-control" name="CSI_Membre_3_mail" id="CSI_Membre_3_mail" value="<?php echo $defense["csi"][2]["mail"];?>">
            </div>
            <div class="radio-group">
            <div>
                <input name="CSI_Membre_3_qualite" value="Spécialiste du domaine de la thèse" type="radio" <?php if($defense["csi"][2]["membre_specialiste"]=="oui"){echo "checked";}?>>
                <label>Spécialiste du domaine de la thèse</label>
            </div>
            <div>
                <input name="CSI_Membre_3_qualite" value="Non spécialiste externe au domaine de la thèse" type="radio" <?php if($defense["csi"][2]["membre_non_specialiste"]=="oui"){echo "checked";}?>>
                <label>Non spécialiste externe au domaine de la thèse</label>
            </div>
            <div>
                <input name="CSI_Membre_3_qualite" value="Membre extérieur à l'établissement" type="radio" <?php if($defense["csi"][2]["membre_exterieur"]=="oui"){echo "checked";}?>>
                <label>Membre extérieur à l'établissement</label>
            </div>
        </div>
        </p>
    </div>
    <h2>1 -&nbsp; BILAN ANNUEL AVEC LA DIRECTION DE THÈSE</h2>
    <div>
        <label for="Freq_Contact_DT" class="formbuilder-checkbox-group-label">Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques) :<span class="formbuilder-required">*</span></label>
        <div>
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
        </div>
    </div>
    <div>
        <label for="Freq_Contact_CODT">Fréquence des contacts avec la codirection de thèse (le cas échéant) :</label>
        <div>
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
        </div>
    </div>
    <h2>2- BILAN ANNUEL DE LA RELATION AVEC L’UNITÉ DE RECHERCHE</h2>
    <div>
        <label for="Integration_UMR">Intégration dans l’unité de recherche) :<span class="formbuilder-required">*</span></label>
        <div>
            <span>
                <input name="Integration_UMR" value="Peu satisfaisante" type="radio">
                <label>Peu satisfaisante</label>
            </span>
            <span>
                <input name="Integration_UMR"  value="Satisfaisante" type="radio">
                <label>Satisfaisante</label>
            </span>
            <span>
                <input name="Integration_UMR" value="Très satisfaisante" type="radio">
                <label>Très satisfaisante</label>
            </span>
        </div>
    </div>
    <div>
        <label for="Relation_Autre_EP">Relations avec d'autres équipes scientifiques ?&nbsp;</label>
        <div class="radio-group">
            <span>
                <input name="Relation_Autre_EP"  value="Oui" type="radio">
                <label>Oui</label>
            </span>
            <span>
                <input name="Relation_Autre_EP" value="Non" type="radio">
                <label>Non</label>
            </span>
        </div>
    </div>
    <div>
        <label for="Relation_Autre_EP_Details" >Si oui, préciser lesquelles et si elles sont nationales ou internationales :</label>
        <textarea type="textarea" class="form-control" name="Relation_Autre_EP_Details" id="Relation_Autre_EP_Details"></textarea>
    </div>
    <h2>3 -&nbsp;AVIS GÉNÉRAL SUR L’ANNÉE ÉCOULÉE</h2>
    <div>
        <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    </div>
    <div>
        <label for="Autonomie">Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</label>
        <div class="radio-group">
            <span>
                <input name="Autonomie"  value="Insuffisant" type="radio">
                <label>Insuffisant</label>
            </span>            
            <span>
                <input name="Autonomie"  value="A améliorer" type="radio">
                <label>A améliorer</label>
            </span>
            <span>
                <input name="Autonomie"  value="Satisfaisant" type="radio">
                <label>Satisfaisant</label>
            </span>            
        </div>
    </div>
    <div>
        <label for="Moyens" >Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</label>
        <div class="radio-group">
        <span>
                <input name="Moyens"  value="Insuffisant" type="radio">
                <label>Insuffisant</label>
            </span>            
            <span>
                <input name="Moyens"  value="A améliorer" type="radio">
                <label>A améliorer</label>
            </span>
            <span>
                <input name="Moyens"  value="Satisfaisant" type="radio">
                <label>Satisfaisant</label>
            </span>
        </div>
    </div>
    <div>
        <label for="ReponsesAuxQuestions" >Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</label>
        <div class="radio-group">
        <span>
                <input name="ReponsesAuxQuestions"  value="Insuffisant" type="radio">
                <label>Insuffisant</label>
            </span>            
            <span>
                <input name="ReponsesAuxQuestions"  value="A améliorer" type="radio">
                <label>A améliorer</label>
            </span>
            <span>
                <input name="ReponsesAuxQuestions"  value="Satisfaisant" type="radio">
                <label>Satisfaisant</label>
            </span>
        </div>
    </div>
    <div>
        <label for="InteretScientifique">L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</label>
        <div class="radio-group">
        <span>
                <input name="InteretScientifique"  value="Insuffisant" type="radio">
                <label>Insuffisant</label>
            </span>            
            <span>
                <input name="InteretScientifique"  value="A améliorer" type="radio">
                <label>A améliorer</label>
            </span>
            <span>
                <input name="InteretScientifique"  value="Satisfaisant" type="radio">
                <label>Satisfaisant</label>
            </span>
        </div>
    </div>
    <div>
        <label for="AvisGeneral">
            <div>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées :&nbsp;</div>
        </label>
        <textarea type="textarea" class="form-control" name="AvisGeneral" id="AvisGeneral"></textarea>
    </div>
    <div>
        <label for="DdeRDV">Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</label>
        <div class="radio-group">
             <span>
                <input name="DdeRDV"  value="Oui" type="radio">
                <label>Oui</label>
            </span>
            <span>
                <input name="DdeRDV" value="Non" type="radio">
                <label>Non</label>
            </span>
        </div>
    </div>
    <div>
        <label for="DateRapport">Date de l'établissement du rapport</label>
        <input type="date" class="form-control" name="DateRapport" id="DateRapport">
    </div>
    <div>
        <button type="submit" class="btn-default btn" style="default">Soumettre le rapport</button>
    </div>
</div>
</form>
<script>
    
    $("input[type=radio][name=PhD_ExtraActivite]").on("change",function(){
            if (this.value == 'Oui') {
                $("#PhD_ExtraActivite_NbH_div").show();
            }else{
                $("#PhD_ExtraActivite_NbH_div").hide();
                $("#PhD_ExtraActivite_NbH").val('');
            }
            
        });
</script>