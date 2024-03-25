<style>
    #report{
  font-family: "Gill Sans Extrabold", sans-serif;
    }
    #report > h1, h2{
        background-color:#4a90e2;
    }
    #report > h3{
        text-align: center;
    }
    #report > label {
        font-weight: bold;
    }

    .ref::after {
    font-weight: bold;
  content: " :";
}
</style>
</style>
</style>
<div id="report">
    <h1>Rapport annuel de la doctorante ou du doctorant </h1>
    <h2>INFORMATION GÉNÉRALES</h2>
    <h3>LA DOCTORANTE OU LE DOCTORANT</h3>
    <div class="">
        <p>          
        <div class="form-group">
                <label for="PhD_Nom" >Nom</label>
                <?php echo $report["PhD_Nom"];?>
        </div>
        <div class="form-group">
                <label for="PhD_Prenom" >Prénom</label>
                <?php echo $report["PhD_Prenom"];?>
        </div>
        <div class="form-group">
                <label for="PhD_Mail" >Email dans ADUM</label>
                <?php echo $report["PhD_Mail"];?>
        </div>
        <div class="form-group">
                <label for="PhD_Specialite" >Spécialité</label>
                <?php echo $report["PhD_Specialite"];?>
        </div>
        <div class="form-group">
                <label for="PhD_UMR" >Unité de recherche</label>
                <?php echo $report["PhD_UMR"];?>
        </div>
        </p>
    </div>
    <h3>LA THÈSE</h3>
    <div>
        <div class="form-group">
                <label for="DT_Nom" >Nom direction de thèse</label>
                <?php echo $report["DT_Nom"];?>
        </div>
        <div class="form-group">
                <label for="DT_Prenom" >Prénom direction de thèse</label>
                <?php echo $report["DT_Prenom"];?>
        </div>
        <div class="form-group">
                <label for="CODT_Nom" >Nom co-direction de thèse</label>
                <?php echo $report["CODT_Nom"];?>
        </div>
        <div class="form-group">
                <label for="CODT_Prenom" >Prénom co-direction de thèse</label>
                <?php echo $report["CODT_Prenom"];?>
        </div>        
    </div>
    <div>
        <label for="PhD_DateDebutThese" >Date de début de thèse</label>
        <?php echo $report["PhD_DateDebutThese"]; ?>
    </div>
    <div>
        <label for="TypeDeFinancement" >Type de financement</label>
        <?php echo $report["TypeDeFinancement"]; 
        if($report["TypeDeFinancementAutre"]){
            echo " :".$report["TypeDeFinancementAutre"];
        }
        ?>
        
    </div>
    <div>
        <label for="PhD_Cotutelle" class="formbuilder-radio-group-label">Thèse en cotutelle :&nbsp;</label>
        <?php echo $report["PhD_Cotutelle"]; ?>
    </div>
    <div>
        <label for="PhD_Cotutelle_Pays" >Si oui, préciser le pays partenaire</label>
        <?php echo $report["PhD_Cotutelle_Pays"]; ?>
    </div>
    <div>
        <label for="PhD_ExtraActivite" class="formbuilder-radio-group-label">
            <div>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise) :</div>
        </label>
        <?php echo $report["PhD_ExtraActivite"]; ?>
    </div>
    <div>
        <label for="PhD_ExtraActivite_NbH" >Si oui, nombre d’heures :</label>
        <?php echo $report["PhD_ExtraActivite_NbH"]; ?>
    </div>
    <h3>ANNÉE DU CSI</h3>
    <div>
        <label for="PhD_CSI_Annee">
            <div>CSI pour réinscription en année</div>
        </label>
        <?php echo $report["PhD_CSI_Annee"]; ?>
    </div>
        <h3>COMPOSITION DU COMITÉ DE SUIVI INDIVIDUEL (hors direction de thèse)</h3>
        <h4>La direction de la thèse ne fait pas partie du comité de suivi. Il comprend à minima 2 membres.</h4>
    <div>
        <p>
            <div>Membre n°1 – Spécialiste du domaine de la thèse
            </div>
            <div>
                <label for="CSI_Membre_1_Nom">Nom</label>
                <?php echo $report["CSI_Membre_1_Nom"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_1_Prenom" >Prénom</label>
                <?php echo $report["CSI_Membre_1_Prenom"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_1_UMR">Unité de recherche/établissement</label>
                <?php echo $report["CSI_Membre_1_UMR"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_1_mail">Adresse mail</label>
                <?php echo $report["CSI_Membre_1_mail"]; ?>
            </div>
            <div>Membre n°2 – Nom spécialiste externe au domaine de la thèse</div>
            <div>
                <label for="CSI_Membre_2_Nom">Nom</label>
                <?php echo $report["CSI_Membre_2_Nom"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_2_Prenom" >Prénom</label>
                <?php echo $report["CSI_Membre_2_Prenom"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_2_UMR">Unité de recherche/établissement</label>
                <?php echo $report["CSI_Membre_2_UMR"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_2_mail">Adresse mail</label>
                <?php echo $report["CSI_Membre_2_mail"]; ?>
            </div>
            <div>Membre n°3 – Ex. partenaire de la cotutelle, spécialiste du financeur etc</div>
            <div>
                <label for="CSI_Membre_3_Nom">Nom</label>
                <?php echo $report["CSI_Membre_3_Nom"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_3_Prenom" >Prénom</label>
                <?php echo $report["CSI_Membre_3_Prenom"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_3_UMR">Unité de recherche/établissement</label>
                <?php echo $report["CSI_Membre_3_UMR"]; ?>
            </div>
            <div>
                <label for="CSI_Membre_3_mail">Adresse mail</label>
                <?php echo $report["CSI_Membre_3_mail"]; ?>
            </div>
        </p>
    </div>
    <h2>1 -&nbsp; BILAN ANNUEL AVEC LA DIRECTION DE THÈSE</h2>
    <div>
        <label for="Freq_Contact_DT" class="formbuilder-checkbox-group-label">Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques) :<span class="formbuilder-required">*</span></label>
        <div>
        <?php echo $report["Freq_Contact_DT"]; ?>
        </div>
    </div>
    <div>
        <label for="Freq_Contact_CODT">Fréquence des contacts avec la codirection de thèse (le cas échéant) :</label>
        <div>
        <?php echo $report["Freq_Contact_CODT"]; ?>
        </div>
    </div>
    <h2>2- BILAN ANNUEL DE LA RELATION AVEC L’UNITÉ DE RECHERCHE</h2>
    <div>
        <label for="Integration_UMR">Intégration dans l’unité de recherche) :<span class="formbuilder-required">*</span></label>
        <div>
        <?php echo $report["Integration_UMR"]; ?>
        </div>
    </div>
    <div>
        <label for="Relation_Autre_EP">Relations avec d'autres équipes scientifiques ?&nbsp;</label>
        <div>
        <?php echo $report["Relation_Autre_EP"]; ?>
        </div>
    </div>
    <div>
        <label for="Relation_Autre_EP_Details" >Si oui, préciser lesquelles et si elles sont nationales ou internationales :</label>
        <p><?php echo $report["Relation_Autre_EP_Details"]; ?></p>
    </div>
    <h2>3 -&nbsp;AVIS GÉNÉRAL SUR L’ANNÉE ÉCOULÉE</h2>
    <div>
        <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    </div>
    <div>
        <label for="Autonomie">Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</label>
        <div class="radio-group">
        <?php echo $report["Autonomie"]; ?>      
        </div>
    </div>
    <div>
        <label for="Moyens" >Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</label>
        <div class="radio-group">
        <?php echo $report["Moyens"]; ?>
        </div>
    </div>
    <div>
        <label for="ReponsesAuxQuestions" >Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</label>
        <div class="radio-group">
        <?php echo $report["ReponsesAuxQuestions"]; ?>
        </div>
    </div>
    <div>
        <label for="InteretScientifique">L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</label>
        <div class="radio-group">
        <?php echo $report["InteretScientifique"]; ?>
        </div>
    </div>
    <div>
        <label for="AvisGeneral">
            <div>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées :&nbsp;</div>
        </label>
        <p><?php echo $report["AvisGeneral"]; ?></p>
    </div>
    <div>
        <label for="DdeRDV">Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</label>
        <div class="radio-group">
        <?php echo $report["DdeRDV"]; ?>
        </div>
    </div>
    <div>
        <label for="DateRapport">Date de l'établissement du rapport</label>
        <?php echo $report["DateRapport"]; ?>
    </div>
    
</div>