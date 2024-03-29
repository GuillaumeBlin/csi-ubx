<form action="<?php echo str_replace("/load_user/","/form_save_PhDReport/",$_SERVER['REQUEST_URI']);?>" method="POST">

    <h1>Rapport annuel de la doctorante ou du doctorant </h1>
    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
                <h5>Nom</h5>
                <input type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="<?php echo $defense["nom"];?>">
                <h5>Prénom</h5>
                <input type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="<?php echo $defense["prenom"];?>">
                <h5>Email dans ADUM</h5>
                <input type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="<?php echo $defense["mail_principal"];?>">
                <h5>Spécialité</h5>
                <input type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="<?php echo $defense["these_specialite"];?>">
                <h5>Unité de recherche</h5>
                <input type="text" readonly class="form-control" name="PhD_UMR" id="PhD_UMR" value="<?php echo $defense["these_laboratoire"];?>">
    <h4>La thèse</h4>
                <h5>Nom direction de thèse</h5>
                <input type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="<?php echo $defense["these_directeur_these_nom"];?>">
                <h5>Prénom direction de thèse</h5>
                <input type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="<?php echo $defense["these_directeur_these_prenom"];?>">
                <h5>Nom co-direction de thèse</h5>
                <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="<?php echo $defense["these_codirecteur_these_nom"];?>">
                <h5>Prénom co-direction de thèse</h5>
                <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="<?php echo $defense["these_codirecteur_these_prenom"];?>">
        <h5>Date de début de thèse</h5>
        <input type="date" class="form-control" name="PhD_DateDebutThese" readonly  id="PhD_DateDebutThese" value="<?php echo date('Y-m-d', strtotime($defense["these_date_1inscription"])); ?>">
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
                <input name="PhD_Cotutelle" value="Oui" type="radio" readonly <?php if($defense["these_cotutelle"]=="OUI") {echo "checked";}else{echo "disabled";};?>>
                <label>Oui</label>
            </span>
            <span>
                <input name="PhD_Cotutelle" value="Non" type="radio" readonly <?php if($defense["these_cotutelle"]=="NON") {echo "checked";}else{echo "disabled";};?>>
                <label>Non</label>
            </span>
    <?php   if($defense["these_cotutelle"]=="OUI") {?>
            <div>
                <label for="PhD_Cotutelle_Pays" >Si oui, préciser le pays partenaire</label>
                <input type="text" class="form-control" name="PhD_Cotutelle_Pays" id="PhD_Cotutelle_Pays" value="<?php echo $defense["these_cotutelle_pays"];?>">
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
                <input name="PhD_ExtraActivite" value="Non" type="radio">
                <label>Non</label>
            </span>
    <div id="PhD_ExtraActivite_NbH_div">
        <label for="PhD_ExtraActivite_NbH" >Si oui, nombre d’heures :</label>
        <input type="number" class="form-control" name="PhD_ExtraActivite_NbH" min="0" max="64" step="1" id="PhD_ExtraActivite_NbH">
    </div>

    <h4>Année du CSI</h4>
        <h5>CSI pour réinscription en année</h5>                
        <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="<?php echo intval(substr($defense["niveau_Etud"],0,1))+1;?>">
    <h4>Composition du comité de suivi individuel</h4>
            <h5>Membre n°1</h5>
                <?php //print_r($defense["csi"]);
                ?> 
                <h6>Nom</h6>
                <input type="text" class="form-control" name="CSI_Membre_1_Nom" id="CSI_Membre_1_Nom" readonly value="<?php echo $defense["csi"][0]["nom"];?>">
            <h6>Prénom</h6>
                <input type="text" class="form-control" name="CSI_Membre_1_Prenom" id="CSI_Membre_1_Prenom" readonly value="<?php echo $defense["csi"][0]["prenom"];?>">
            <h6>Unité de recherche/établissement</h6>
                <input type="text" class="form-control" name="CSI_Membre_1_UMR" id="CSI_Membre_1_UMR" >
            <h6>Adresse mail</h6>
                <input type="email" class="form-control" name="CSI_Membre_1_mail" id="CSI_Membre_1_mail" readonly value="<?php echo $defense["csi"][0]["mail"];?>">
                <h6>Qualité</h6>
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
            <h5>Membre n°2</h5>
            <h6>Nom</h6>
                <input type="text" class="form-control" name="CSI_Membre_2_Nom" id="CSI_Membre_2_Nom" readonly value="<?php echo $defense["csi"][1]["nom"];?>">
            <h6>Prénom</h6>
                <input type="text" class="form-control" name="CSI_Membre_2_Prenom" id="CSI_Membre_2_Prenom" readonly value="<?php echo $defense["csi"][1]["prenom"];?>">
            <h6>Unité de recherche/établissement</h6>
                <input type="text" class="form-control" name="CSI_Membre_2_UMR" id="CSI_Membre_2_UMR">
            <h6>Adresse mail</h6>
                <input type="email" class="form-control" name="CSI_Membre_2_mail" id="CSI_Membre_2_mail" readonly value="<?php echo $defense["csi"][1]["mail"];?>">
                <h6>Qualité</h6>
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
            <h5>Membre n°3</h5>
            <h6>Nom</h6>
                <input type="text" class="form-control" name="CSI_Membre_3_Nom" id="CSI_Membre_3_Nom" readonly value="<?php echo $defense["csi"][2]["nom"];?>">
                <h6>Prénom</h6>
                <input type="text" class="form-control" name="CSI_Membre_3_Prenom" id="CSI_Membre_3_Prenom" readonly value="<?php echo $defense["csi"][2]["nom"];?>">
                <h6>Unité de recherche/établissement</h6>
                <input type="text" class="form-control" name="CSI_Membre_3_UMR" id="CSI_Membre_3_UMR">
                <h6>Adresse mail</h6>
                <input type="email" class="form-control" name="CSI_Membre_3_mail" id="CSI_Membre_3_mail" readonly value="<?php echo $defense["csi"][2]["mail"];?>">
                <h6>Qualité</h6>
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
    <h3>Bilan annuel avec la direction de thèse</h3>
        <h4>Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques)</h4>
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
        <h4>Fréquence des contacts avec la codirection de thèse (le cas échéant) </h4>
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
    <h3>Bilan annuel de la relation avec l'unité de recherche</h3>
        <h4>Intégration dans l’unité de recherche)</h4>
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
        <h4>Relations avec d'autres équipes scientifiques ?</h4>
            <span>
                <input name="Relation_Autre_EP"  value="Oui" type="radio">
                <label>Oui</label>
            </span>
            <span>
                <input name="Relation_Autre_EP" value="Non" type="radio">
                <label>Non</label>
            </span>
    <div>
        <label for="Relation_Autre_EP_Details" >Si oui, préciser lesquelles et si elles sont nationales ou internationales :</label>
        <textarea type="textarea" class="form-control" name="Relation_Autre_EP_Details" id="Relation_Autre_EP_Details"></textarea>
    </div>
    <h3>Avis général sur l'année écoulée</h3>
        <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
        <h4>Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</h4>
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
        <h4>Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</h4>
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
        <h4>Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</h4>
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
        <h4>L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</h4>
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
        <h4>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées</h4>
        <textarea type="textarea" class="form-control" name="AvisGeneral" id="AvisGeneral"></textarea>
        <h4>Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</h4>
             <span>
                <input name="DdeRDV"  value="Oui" type="radio">
                <label>Oui</label>
            </span>
            <span>
                <input name="DdeRDV" value="Non" type="radio">
                <label>Non</label>
            </span>
        <h4>Date de l'établissement du rapport</h4>
        <input type="date" class="form-control" name="DateRapport" id="DateRapport">
    <div>
        <button type="submit" class="btn-default btn" style="default">Soumettre le rapport</button>
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