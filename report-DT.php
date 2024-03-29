<style>
    #report-dt{
  font-family: "Gill Sans Extrabold", sans-serif;
    }
    #report-dt > h1, h2{
        background-color:#4a90e2;
    }
    #report-dt > h3{
        text-align: center;
    }
    #report-dt > label {
        font-weight: bold;
    }

    #report-dt > label::after {
    font-weight: bold;
  content: " :";
}
</style>

    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <?php echo $report["PhD_Nom"];?>
    <h5>Prénom</h5>
    <?php echo $report["PhD_Prenom"];?>
    <h5>Email dans ADUM</h5>
    <?php echo $report["PhD_Mail"];?>
    <h5>Spécialité</h5>
    <?php echo $report["PhD_Specialite"];?>
    <h5>Unité de recherche</h5>
    <?php echo $report["PhD_UMR"];?>
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <?php echo $report["DT_Nom"];?>
    <h5>Prénom direction de thèse</h5>
    <?php echo $report["DT_Prenom"];?>
    <h5>Nom co-direction de thèse</h5>
    <?php echo $report["CODT_Nom"];?>
    <h5>Prénom co-direction de thèse</h5>
    <?php echo $report["CODT_Prenom"];?>
    <h5>Date de début de thèse</h5>
    <?php echo $report["PhD_DateDebutThese"];?>
    
    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <?php echo $report["PhD_CSI_Annee"];?>
    
    <h3>Bilan annuel sur le déroulement de la thèse</h3>
    <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    <h5>Compétences techniques (maîtrise les outils)</h5>
    <?php echo $report["CompetencesTechniques"];?>
    
    <h5>Compétences scientifiques (maîtrise les fondamentaux de sa discipline) </h5>
    <?php echo $report["CompetencesScientifiques"];?>
    
    <h5>Autonomie (sait trouver seul l'information ou des solutions) </h5>
    <?php echo $report["Autonomie"];?>    
    <h5>Sait mobiliser de manière efficace la bibliographie (recherche complète et synthèse)</h5>
    <?php echo $report["Bibliographie"];?>
    
    <h5>Capacité d'initiative (propose des solutions ou des réorientations)</h5>
    <?php echo $report["Initiative"];?>
     
    <h5>Capacité d'adaptation (prend rapidement en main les nouveaux outils) </h5>
    <?php echo $report["Adaptation"];?>
    
    <h5>Aptitude à rédiger des documents de synthèse </h5>
    <?php echo $report["Redaction"];?>
    
    <h5>Aptitude à présenter ses travaux de recherche </h5>
    <?php echo $report["Presentation"];?>
    
    <h5>Aptitude à structurer sa réflexion </h5>
    <?php echo $report["Reflexion"];?>
    
    <h5>Assiduité (ponctualité, présence) </h5>
    <?php echo $report["Assiduite"];?>
    
    <h5>Interaction avec l'encadrement (sollicite à bon escient) </h5>
    <?php echo $report["Interaction"];?>
    
    <h5>Intégration dans l'équipe/le laboratoire (interagit avec les chercheurs et les doctorants</h5>
    <?php echo $report["Integration"];?>
    
    <h3>Bilan annuel sur l'avancement de la thèse</h3>
    <?php echo $report["Progression"];?>
    
    <div>
        <label>Argumentaire</label>
        <p><?php echo $report["ArgumentaireProgression"];?></p>
    </div>

    <!-- 2eme année-->

    <?php if($report["ArgumentaireProgression"]!=""){?>
    <div>
        <label>L'état d'avancement global des travaux vous permet-il d'envisager une soutenance dans les délais</label>
        <span>
        <?php echo $report["SoutenanceDansDelais"];?>
        </span>
    </div>
    <?php } ?>
    <!-- 3eme année-->

    <?php if($report["Echeancier"]!=""){?>
        <div>
            <label>Echéancier de fin de thèse</label>
            <?php echo $report["Echeancier"];?>
        </div>
        <div>
            <label>Date prévue pour la soutenance de thèse</label>
            <?php echo $report["DateSoutenance"];?>
        </div>
        <div><label>Une inscription dérogatoire en 4ème année ou plus est-elle envisagée ?</label>
            <span>
            <?php echo $report["InscriptionDerogatoire"];?>
            </span>
        </div>
        <div id="InscriptionDerogatoire"><label>Un financement est-il prévu jusqu'à la soutenance de thèse ?</label>
            <span>
            <?php echo $report["Financement"];?>
            </span>
        
            <div>
                <label>Si oui, préciser </label>
                <?php echo $report["FinancementDetails"];?>
            
            </div>
        </div>
     <?php } ?>

    <h3>Avis sur la réinscription en thèse</h3>
    <span>
    <?php echo $report["Reinscription"];?>
    </span>
    <div>
        <label>Avis circonstancié</label>
        <p><?php echo $report["AvisReinscription"];?></p>
    </div>

    <div>
        <label>Date de l'établissement du rapport</label>
        <?php echo $report["DateRapport"];?>
    </div>

