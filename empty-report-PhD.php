<?php
if(!isset($lang)){$lang="FR";}
?>
<script type="text/javascript" src="/concrete/js/jquery.js"></script>
<link href="/application/files/cache/css/ub_tiers/main.css" rel="stylesheet" type="text/css" media="all">

<style type="text/css">
.print-content {    
  display: none !important;
}
        @media print {
             *{
                font-size: 1em!important;
             }
             .print-content {
                display: block !important;
            }
            textarea {display: none !important;}
             h1{
                font-size: 2em!important;
             }
             h3{
                page-break-before: always;
                font-size: 1.5em!important;
             }
             h3:first-of-type{
                page-break-before: avoid;
             }
            h3::before {
                content: ''!important;
                position: absolute!important;
                top: 0!important;
                left: 0!important;
                width: 2px!important;
                height: 28px!important;
                border-radius: 1px!important;
                background: blue!important;
                transform-origin: 0 100%!important;
                transform: translateY(2px) rotate(30deg)!important;
            }
             h4{
                font-size: 1.3em!important;
                text-transform:none!important;
                
             }
             h5{
                margin-top: 5px!important;
                margin-bottom: 1px!important;
             }
             input[type="text"],input[type="date"],input[type="number"]{
                height: 0px!important;
             }

        }
    </style>

<div class="std-page">
    <div class="wrapper">
        <main id="content-main" class="std-page-main std-content">
            <div class="std-page-main-inner">
                <h1>Rapport annuel de la doctorante ou du doctorant</h1>
                <form id="csi">
         
    <h3><?php if (strcmp($lang, "FR") == 0) {?>Informations générales<?php }else{?>General information<?php }?></h3>
    <h4><?php if (strcmp($lang, "FR") == 0) {?>La doctorante ou le doctorant<?php }else{?>The PhD student<?php }?></h4>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Nom<?php }else{?>Last name<?php }?></h5>
    <input type="text"  class="form-control" name="PhD_Nom" id="PhD_Nom" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Prénom<?php }else{?>First name<?php }?></h5>
    <input type="text" class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Email dans ADUM<?php }else{?>Email in ADUM<?php }?></h5>
    <input type="text" class="form-control" name="PhD_Mail" id="PhD_Mail" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Spécialité<?php }else{?>Domain<?php }?></h5>
    <input type="text"  class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Unité de recherche<?php }else{?>Research unit<?php }?></h5>
    <input type="text"  class="form-control" name="PhD_UMR" id="PhD_UMR" value="">
    <h4><?php if (strcmp($lang, "FR") == 0) {?>La thèse<?php }else{?>The thesis<?php }?></h4>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Nom direction de thèse<?php }else{?>Supervisor last name<?php }?></h5>
    <input type="text"  class="form-control" name="DT_Nom" id="DT_Nom" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Prénom direction de thèse<?php }else{?>Supervisor first name<?php }?></h5>
    <input type="text"  class="form-control" name="DT_Prenom" id="DT_Prenom" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Nom co-direction de thèse<?php }else{?>Co-supervisor last name<?php }?></h5>
    <input type="text"  class="form-control" name="CODT_Nom" id="CODT_Nom" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Prénom co-direction de thèse<?php }else{?>Co-supervisor first name<?php }?></h5>
    <input type="text"  class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="">
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Date de début de thèse<?php }else{?>Starting date of the thesis<?php }?></h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese" id="PhD_DateDebutThese" value="">    
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Thèse en cotutelle<?php }else{?>Cotutelle<?php }?></h5>
    <span>
        <input name="PhD_Cotutelle" value="Oui" type="radio">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="PhD_Cotutelle" value="Non" type="radio">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <div>
            <label for="PhD_Cotutelle_Pays"><?php if (strcmp($lang, "FR") == 0) {?>Si oui, préciser le pays partenaire<?php }else{?>Cotutelle partner country<?php }?></label>
            <input type="text" class="form-control"  name="PhD_Cotutelle_Pays" id="PhD_Cotutelle_Pays" value="">
        </div>
        <h5><?php if (strcmp($lang, "FR") == 0) {?>Quelles sont les périodes de mobilités prévues durant votre co-tutelle ?<?php }else{?>What are the schedule of stays?<?php }?></h5>
        <input type="text" class="form-control" name="PeriodesMobilites" id="PeriodesMobilites" value="">
    
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Votre doctorat est-il financé ?<?php }else{?>Is your doctorate funded?<?php }?></h5>
    <span>
        <input name="DoctoratFinancement" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="DoctoratFinancement" value="Non" type="radio">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Votre doctorat est-il effectué dans le cadre d'une collaboration industrielle ?<?php }else{?>Is your doctorate being carried out as part of an industrial collaboration?<?php }?></h5>
    <span>
        <input name="CollaborationIndustrielle" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="CollaborationIndustrielle" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>

        <div id="CollaborationIndustrielle">
            <label for="CollaborationIndustrielleResponsable"><?php if (strcmp($lang, "FR") == 0) {?> Si oui, préciser le nom du responsable scientifique industriel<?php }else{?>Please specify the name of the industrial scientific manager<?php }?></label>
            <input type="text" class="form-control" name="CollaborationIndustrielleResponsable" id="CollaborationIndustrielleResponsable" value="">
        </div>
    
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise)<?php }else{?>Thesis with complementary activities (teaching, mediation, expertise)<?php }?></h5>
    <span>
        <input name="PhD_ExtraActivite" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="PhD_ExtraActivite" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>

    <div id="PhD_ExtraActivite" >
        <label for="PhD_ExtraActivite_NbH"><?php if (strcmp($lang, "FR") == 0) {?>Si oui, nombre d’heures :<?php }else{?>Please provide the related number of hours:<?php }?></label>
        <input type="number" class="form-control" name="PhD_ExtraActivite_NbH" min="0" max="64" step="1" id="PhD_ExtraActivite_NbH" value="">
    </div>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avez-vous été consulté sur la composition du comité de suivi ?<?php }else{?>Have you been consulted on the composition of the monitoring committee?
<?php }?></h5>
    <span>
        <input name="ConsultationCompositionCSI" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="ConsultationCompositionCSI" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <h4><?php if (strcmp($lang, "FR") == 0) {?>Année du CSI<?php }else{?>CSI year<?php }?></h4>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>CSI pour réinscription en année<?php }else{?>CSI for re-registration in year<?php }?></h5>
    <input type="number" class="form-control" name="PhD_CSI_Annee" min="2" max="20" step="1" id="PhD_CSI_Annee" value="">
    <h4><?php if (strcmp($lang, "FR") == 0) {?>Composition du comité de suivi individuel<?php }else{?>Composition of the individual monitoring committee<?php }?></h4>

    <?php
    $max = $report["CSI_Membre_Nombre"]??5;
    ?>
    <input type="hidden" name="CSI_Membre_Nombre" value="<?php echo $max; ?>" />
    <?php
    for ($i = 0; $i < $max; $i = $i + 1) { ?>

        <h5><?php if (strcmp($lang, "FR") == 0) {?>Membre<?php }else{?>Member<?php }?> n°<?php echo $i + 1; ?></h5>
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Nom<?php }else{?>Last name<?php }?></h6>
        <input type="text" class="form-control"  name="CSI_Membre_<?php echo $i + 1; ?>_Nom" id="CSI_Membre_<?php echo $i + 1; ?>_Nom"  value="">
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Prénom<?php }else{?>First name<?php }?></h6>
        <input type="text" class="form-control"  name="CSI_Membre_<?php echo $i + 1; ?>_Prenom" id="CSI_Membre_<?php echo $i + 1; ?>_Prenom"  value="">
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Adresse mail<?php }else{?>Mail address<?php }?></h6>
        <input type="text" class="form-control"  name="CSI_Membre_<?php echo $i + 1; ?>_mail" id="CSI_Membre_<?php echo $i + 1; ?>_mail"  value="">
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Référent<?php }else{?>Referent<?php }?></h6>
        <div>
            <input name="CSI_Referent"  value="<?php echo $i + 1; ?>" type="radio" >            
            <label><?php if (strcmp($lang, "FR") == 0) {?>Référent<?php }else{?>Referent<?php }?></label>
        </div>
        <h6><?php if (strcmp($lang, "FR") == 0) {?>Qualité<?php }else{?>Quality<?php }?></h6>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_qualite" value="oui" type="radio" >            
            <label><?php if (strcmp($lang, "FR") == 0) {?>Spécialiste du domaine de la thèse<?php }else{?> Specialist in thesis field<?php }?></label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_qualite" value="oui" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Non spécialiste externe au domaine de la thèse<?php }else{?>Non-specialist from outside the thesis field
<?php }?></label>
        </div>
        <div>
            <input name="CSI_Membre_<?php echo $i + 1; ?>_qualite"  value="oui" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Membre extérieur à l'établissement<?php }else{?><?php }?>External member</label>
        </div>
    <?php } ?>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Etat d'avancement de la thèse<?php }else{?>Thesis progress<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Résumé<?php }else{?>Summary<?php }?></h5>
    <p><?php if (strcmp($lang, "FR") == 0) {?>Présentation bilan d’activités, plan, rédaction, difficultés rencontrées, méthodologie, résultats, planning et calendrier prévisionnel<?php }else{?>Presentation of activities, plan, writing, difficulties encountered, methodology, results, schedule and provisional timetable
<?php }?>
    </p>
    <textarea type="textarea" rows="5" class="form-control" wrap="wrap" name="ResumeAvancement"></textarea>

    <h5><?php if (strcmp($lang, "FR") == 0) {?>Productions scientifiques et participation à des colloques<?php }else{?>Publications and participation in conferences
<?php }?></h5>
        <textarea type="textarea" rows="5" class="form-control" name="ProductionScientifique"></textarea>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Bilan annuel avec la direction de thèse<?php }else{?>Annual review with thesis supervisor<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques)<?php }else{?>Frequency of contact with thesis supervisor (excluding e-mail)
<?php }?></h5>
    <span>
        <input name="Freq_Contact_DT" value="Tous les jours" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Tous les jours<?php }else{?>Daily<?php }?></label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Plusieurs fois par semaine" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Plusieurs fois par semaine<?php }else{?>Several times a week<?php }?></label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Hebdomadaire" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Hebdomadaire<?php }else{?>Weekly<?php }?></label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Mensuelle" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Mensuelle<?php }else{?>Monthly<?php }?></label>
    </span>
    <span>
        <input name="Freq_Contact_DT" value="Moins d'une fois par mois" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Moins d'une fois par mois<?php }else{?>Less than once a month<?php }?></label>
    </span>
    
        <h5><?php if (strcmp($lang, "FR") == 0) {?>Fréquence des contacts avec la codirection de thèse<?php }else{?>Frequency of contact with thesis supervisor<?php }?></h5>
        <span>
            <input name="Freq_Contact_CODT" value="Tous les jours" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Tous les jours<?php }else{?>Daily<?php }?></label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Plusieurs fois par semaine" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Plusieurs fois par semaine<?php }else{?>Several times a week<?php }?></label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Hebdomadaire" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Hebdomadaire<?php }else{?>Weekly<?php }?></label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Mensuelle" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Mensuelle<?php }else{?>Monthly<?php }?></label>
        </span>
        <span>
            <input name="Freq_Contact_CODT" value="Moins d'une fois par mois" type="radio" >
            <label><?php if (strcmp($lang, "FR") == 0) {?>Moins d'une fois par mois<?php }else{?>Less than once a month<?php }?></label>
        </span>
    
    <h3><?php if (strcmp($lang, "FR") == 0) {?>Bilan annuel de la relation avec l'unité de recherche<?php }else{?>Annual assessment of relationship with research unit<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Intégration dans l’unité de recherche<?php }else{?>Integration into the research unit<?php }?></h5>
    <span>
        <input name="Integration_UMR" value="Peu satisfaisante" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Peu satisfaisante<?php }else{?>Unsatisfactory<?php }?></label>
    </span>
    <span>
        <input name="Integration_UMR" value="Satisfaisante" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisante<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <span>
        <input name="Integration_UMR" value="Très satisfaisante" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Très satisfaisante<?php }else{?>Very satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Relations avec d'autres équipes scientifiques ?<?php }else{?>Relations with other scientific teams?<?php }?></h5>
    <span>
        <input name="Relation_Autre_EP" value="Oui" type="radio">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="Relation_Autre_EP" value="Non" type="radio">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <div id="Relation_Autre_EP">
        <label for="Relation_Autre_EP_Details"><?php if (strcmp($lang, "FR") == 0) {?>Si oui, préciser lesquelles et si elles sont nationales ou internationales :<?php }else{?>Please specify which ones and whether they are national or international :<?php }?></label>
        <textarea type="textarea" class="form-control" name="Relation_Autre_EP_Details" id="Relation_Autre_EP_Details"></textarea>
    </div>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Bilan annuel des formations<?php }else{?>Annual training report<?php }?></h3>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formation à l’éthique de la recherche validée<?php }else{?>Research ethics training validated<?php }?></h5>
    <span>
        <input name="EthiqueRecherche" value="Oui" type="radio">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="EthiqueRecherche" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <span>
        <input name="EthiqueRecherche" value="En cours" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>En cours<?php }else{?>In progress<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formation à l’intégrité scientifique validée<?php }else{?>Scientific integrity training validated<?php }?></h5>
    <span>
        <input name="IntegriteScientifique" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="IntegriteScientifique" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <span>
        <input name="IntegriteScientifique" value="En cours" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>En cours<?php }else{?>In progress<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formation à l’enseignement validée si mission d’enseignement <?php }else{?>Teaching training validated if teaching mission<?php }?></h5>
    <span>
        <input name="FormationEnseignement" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="FormationEnseignement" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <span>
        <input name="FormationEnseignement" value="En cours" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>En cours<?php }else{?>In progress<?php }?></label>
    </span>
    <div id="FormationsObligatoiresPrecisions">
        <label><?php if (strcmp($lang, "FR") == 0) {?>Si une ou des formations n’ont pas été suivies, préciser les raisons<?php }else{?>If one or more training courses have not been taken, please give reasons<?php }?></label>
        <textarea type="textarea" rows="5" class="form-control" name="FormationsObligatoiresPrecisions"></textarea>
    </div>

    <h5><?php if (strcmp($lang, "FR") == 0) {?>Formations suivies dans l'année<?php }else{?>Training courses taken during the year<?php }?></h5>
    <textarea type="textarea" rows="5" class="form-control" name="FormationsDansLAnnee"></textarea>

    <h3><?php if (strcmp($lang, "FR") == 0) {?>Avis général sur l'année écoulée<?php }else{?>General opinion of the past year<?php }?></h3>
    <p><?php if (strcmp($lang, "FR") == 0) {?>Donner votre avis personnel sur les points suivants&nbsp;<?php }else{?>Please give your personal opinion on the following points<?php }?></p>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;<?php }else{?>Do you have enough autonomy to manage your work?<?php }?></h5>
    <span>
        <input name="Autonomie" value="Insuffisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input name="Autonomie" value="A améliorer" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input name="Autonomie" value="Satisfaisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;<?php }else{?>Do you have the necessary means to carry out your work?<?php }?></h5>
    <span>
        <input name="Moyens" value="Insuffisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input name="Moyens" value="A améliorer" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input name="Moyens" value="Satisfaisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;<?php }else{?>Do you find answers to your scientific questions in your work environment?<?php }?></h5>
    <span>
        <input name="ReponsesAuxQuestions" value="Insuffisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input name="ReponsesAuxQuestions" value="A améliorer" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input name="ReponsesAuxQuestions" value="Satisfaisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;<?php }else{?>Does the scientific interest of the subject correspond to your expectations?<?php }?></h5>
    <span>
        <input name="InteretScientifique" value="Insuffisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Insuffisant<?php }else{?>Insufficient<?php }?></label>
    </span>
    <span>
        <input name="InteretScientifique" value="A améliorer" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>A améliorer<?php }else{?>Needs improvement<?php }?></label>
    </span>
    <span>
        <input name="InteretScientifique" value="Satisfaisant" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Satisfaisant<?php }else{?>Satisfactory<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées<?php }else{?>General opinion on the thesis, specifying any difficulties encountered<?php }?></h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisGeneral" id="AvisGeneral"></textarea>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;<?php }else{?>Request for a confidential meeting with the doctoral school management to report "any form of conflict, discrimination, moral or sexual harassment or sexist behaviour".<?php }?></h5>
    <span>
        <input name="DdeRDV" value="Oui" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Oui<?php }else{?>Yes<?php }?></label>
    </span>
    <span>
        <input name="DdeRDV" value="Non" type="radio" >
        <label><?php if (strcmp($lang, "FR") == 0) {?>Non<?php }else{?>No<?php }?></label>
    </span>
    <h5><?php if (strcmp($lang, "FR") == 0) {?>Date de l'établissement du rapport<?php }else{?>Date of report<?php }?></h5>
    <input type="date" class="form-control" name="DateRapport" id="DateRapport" value="">
</form>
            </div>
        </main>
    </div>   
    
    <script>
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
       
</script>
</div>