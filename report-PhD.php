<link href="/application/files/cache/css/ub_tiers/main.css" rel="stylesheet" type="text/css" media="all">

<div id="report-phd">
    <h1>Rapport annuel de la doctorante ou du doctorant </h1>
    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <?php echo $report["PhD_Nom"]; ?>

    <h5>Prénom</h5>
    <?php echo $report["PhD_Prenom"]; ?>
    <h5>Email dans ADUM</h5>
    <?php echo $report["PhD_Mail"]; ?>
    <h5>Spécialité</h5>
    <?php echo $report["PhD_Specialite"]; ?>
    <h5>Unité de recherche</h5>
    <?php echo $report["PhD_UMR"]; ?>

    <h4>La thèse</h4>
    <h5>Nom direction de thèse</label>
        <?php echo $report["DT_Nom"]; ?>
        <h5>Prénom direction de thèse</h5>
        <?php echo $report["DT_Prenom"]; ?>
        <h5>Nom co-direction de thèse</h5>
        <?php echo $report["CODT_Nom"]; ?>
        <h5>Prénom co-direction de thèse</h5>
        <?php echo $report["CODT_Prenom"]; ?>
        <h5>Date de début de thèse</h5>
        <?php echo $report["PhD_DateDebutThese"]; ?>
        <h5>Type de financement</h5>
        <?php echo $report["TypeDeFinancement"];
        if ($report["TypeDeFinancementAutre"]) {
            echo " :" . $report["TypeDeFinancementAutre"];
        }
        ?>
        <h5>Thèse en cotutelle</h5>
        <?php echo $report["PhD_Cotutelle"]; ?>
        <h5>Si oui, préciser le pays partenaire</h5>
        <?php echo $report["PhD_Cotutelle_Pays"]; ?>
        <h5>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise) :</h5>
        <?php echo $report["PhD_ExtraActivite"]; ?>
        <p>Si oui, nombre d’heures :
            <?php echo $report["PhD_ExtraActivite_NbH"]; ?></p>

        <h4>Année du CSI</h4>
        <h5>CSI pour réinscription en année</h5>
        <?php echo $report["PhD_CSI_Annee"]; ?>
        <h4>Composition du comité de suivi individuel</h4>
        <h5>Membre n°1</h5>
        <h6>Nom</h6>
        <?php echo $report["CSI_Membre_1_Nom"]; ?>
        <h6>Prénom</h6>
        <?php echo $report["CSI_Membre_1_Prenom"]; ?>
        <h6>Unité de recherche/établissement</h6>
        <?php echo $report["CSI_Membre_1_UMR"]; ?>
        <h6>Adresse mail</h6>
        <?php echo $report["CSI_Membre_1_mail"]; ?>
        <h6>Qualité</h6>
        <?php echo $report["CSI_Membre_1_qualite"]; ?>

        <h5>Membre n°2</h5>
        <h6>Nom</h6>
        <?php echo $report["CSI_Membre_2_Nom"]; ?>
        <h6>Prénom</h6>
        <?php echo $report["CSI_Membre_2_Prenom"]; ?>
        <h6>Unité de recherche/établissement</h6>
        <?php echo $report["CSI_Membre_2_UMR"]; ?>
        <h6>Adresse mail</h6>
        <?php echo $report["CSI_Membre_2_mail"]; ?>
        <h6>Qualité</h6>
        <?php echo $report["CSI_Membre_2_qualite"]; ?>

        <h5>Membre n°3</h5>
        <h6>Nom</h6>
        <?php echo $report["CSI_Membre_3_Nom"]; ?>
        <h6>Prénom</h6>
        <?php echo $report["CSI_Membre_3_Prenom"]; ?>
        <h6>Unité de recherche/établissement</h6>
        <?php echo $report["CSI_Membre_3_UMR"]; ?>
        <h6>Adresse mail</h6>
        <?php echo $report["CSI_Membre_3_mail"]; ?>
        <h6>Qualité</h6>
        <?php echo $report["CSI_Membre_3_qualite"]; ?>
        <h3>Bilan annuel avec la direction de thèse</h3>
        <h5>Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques)</h5>
        <?php echo $report["Freq_Contact_DT"]; ?>
        <h5>Fréquence des contacts avec la codirection de thèse (le cas échéant) </h5>
        <?php echo $report["Freq_Contact_CODT"]; ?>

        <h3>Bilan annuel de la relation avec l'unité de recherche</h3>
        <h5>Intégration dans l’unité de recherche</h5>
        <?php echo $report["Integration_UMR"]; ?>
        <h5>Relations avec d'autres équipes scientifiques ?</h5>
        <?php echo $report["Relation_Autre_EP"]; ?>

        <p>Si oui, préciser lesquelles et si elles sont nationales ou internationales :
            <?php echo $report["Relation_Autre_EP_Details"]; ?></p>
        <h3>Avis général sur l'année écoulée</h3>
        <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
        <h5>Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</h5>
        <?php echo $report["Autonomie"]; ?>
        <h5>Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</h5>
        <?php echo $report["Moyens"]; ?>
        <h5>Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</h5>
        <?php echo $report["ReponsesAuxQuestions"]; ?>
        <h5>L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</h5>
        <?php echo $report["InteretScientifique"]; ?>
        <h5>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées</h5>
        <p><?php echo $report["AvisGeneral"]; ?></p>
        <h5>Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</h5>
        <?php echo $report["DdeRDV"]; ?>
        <h5>Date de l'établissement du rapport</h5>
        <?php echo $report["DateRapport"]; ?>


</div>