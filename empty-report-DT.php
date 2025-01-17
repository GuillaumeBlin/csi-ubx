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
                <h1>Rapport annuel de la direction de thèse</h1>


<form id="csi" >
    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <input type="text"  class="form-control" name="PhD_Nom" id="PhD_Nom" value="">
    <h5>Prénom</h5>
    <input type="text"  class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="">
    <h5>Email dans ADUM</h5>
    <input type="text"  class="form-control" name="PhD_Mail" id="PhD_Mail" value="">
    <h5>Spécialité</h5>
    <input type="text"  class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="">
    <h5>Unité de recherche</h5>
    <input type="text"  class="form-control" name="PhD_UMR" id="PhD_UMR" value="">
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <input type="text"  class="form-control" name="DT_Nom" id="DT_Nom" value="">
    <h5>Prénom direction de thèse</h5>
    <input type="text"  class="form-control" name="DT_Prenom" id="DT_Prenom" value="">
    
        <h5>Nom co-direction de thèse</h5>
    <input type="text"  class="form-control" name="CODT_Nom" id="CODT_Nom" value="">
    <h5>Prénom co-direction de thèse</h5>
    <input type="text"  class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="">
    <h5>Date de début de thèse</h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese"  id="PhD_DateDebutThese" value="">

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number"  class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="">

    <h3>Bilan annuel sur le déroulement de la thèse</h3>
    <p>Donner votre avis personnel sur les points suivants&nbsp;</p>
    <h5>Compétences techniques (maîtrise les outils)</h5>
    <span>
        <input name="CompetencesTechniques" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="CompetencesTechniques" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="CompetencesTechniques" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Compétences scientifiques (maîtrise les fondamentaux de sa discipline) </h5>
    <span>
        <input name="CompetencesScientifiques" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="CompetencesScientifiques" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="CompetencesScientifiques" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Autonomie (sait trouver seul l'information ou des solutions) </h5>
    <span>
        <input name="Autonomie" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Autonomie" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Autonomie" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Sait mobiliser de manière efficace la bibliographie (recherche complète et synthèse)</h5>
    <span>
        <input name="Bibliographie" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Bibliographie" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Bibliographie" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Capacité d'initiative (propose des solutions ou des réorientations)</h5>
    <span>
        <input name="Initiative" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Initiative" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Initiative" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Capacité d'adaptation (prend rapidement en main les nouveaux outils) </h5>
    <span>
        <input name="Adaptation" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Adaptation" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Adaptation" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à rédiger des documents de synthèse </h5>
    <span>
        <input name="Redaction" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Redaction" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Redaction" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à présenter ses travaux de recherche </h5>
    <span>
        <input name="Presentation" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Presentation" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Presentation" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Aptitude à structurer sa réflexion </h5>
    <span>
        <input name="Reflexion" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Reflexion" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Reflexion" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Assiduité (ponctualité, présence) </h5>
    <span>
        <input name="Assiduite" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Assiduite" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Assiduite" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Interaction avec l'encadrement (sollicite à bon escient) </h5>
    <span>
        <input name="Interaction" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Interaction" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Interaction" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>
    <h5>Intégration dans l'équipe/le laboratoire (interagit avec les chercheurs et les doctorants</h5>
    <span>
        <input name="Integration" value="Insuffisant" type="radio" >
        <label>Insuffisant</label>
    </span>
    <span>
        <input name="Integration" value="A améliorer" type="radio" >
        <label>A améliorer</label>
    </span>
    <span>
        <input name="Integration" value="Satisfaisant" type="radio" >
        <label>Satisfaisant</label>
    </span>

    <h3>Bilan annuel sur l'avancement de la thèse</h3>
    <div>
        <input name="Progression" value="La thèse progresse à très bon rythme" type="radio" >
        <label>La thèse progresse à très bon rythme</label>
    </div>
    <div>
        <input name="Progression" value="La thèse progresse normalement" type="radio" >
        <label>La thèse progresse normalement </label>
    </div>
    <div>
        <input name="Progression" value="La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible" type="radio" >
        <label>La thèse aurait dû progresser davantage sur l’année écoulée mais le retard pris est admissible</label>
    </div>
    <div>
        <input name="Progression" value="La thèse n'a clairement pas assez progressé" type="radio" >
        <label>La thèse n'a clairement pas assez progressé</label>
    </div>
    <div id="Argumentaire" >
        <label>Argumentaire</label>
        <textarea type="textarea" rows="5" class="form-control" name="ArgumentaireProgression" id="ArgumentaireProgression"></textarea>
    </div>

    <!-- 2eme année-->


    <div ><label>Si la doctorante ou le doctorant est 2ème année ou plus, l'état d'avancement global des travaux vous permet-il d'envisager une soutenance dans les délais</label>
        <span>
            <input name="SoutenanceDansDelais" value="Oui" type="radio" >
            <label>Oui</label>
        </span>
        <span>
            <input name="SoutenanceDansDelais" value="Non" type="radio" >
            <label>Non</label>
        </span>
    </div>

    <!-- 3eme année-->

    <div > <p>Si la doctorante ou le doctorant est en 3ème année ou plus</p>
        <div>
            <label>Echéancier de fin de thèse</label>
            <textarea type="textarea" rows="5" class="form-control" name="Echeancier"></textarea>
        </div>
        <div>
            <label>Date prévue pour la soutenance de thèse</label>
            <input type="date" class="form-control" name="DateSoutenance" value="">
        </div>
        <div><label>Une inscription dérogatoire en 4ème année ou plus est-elle envisagée ?</label>
            <span>
                <input name="InscriptionDerogatoire" value="Oui" type="radio" >
                <label>Oui</label>
            </span>
            <span>
                <input name="InscriptionDerogatoire" value="Non" type="radio" >
                <label>Non</label>
            </span>
        </div>
        <div id="InscriptionDerogatoire"  >
        <label>Un financement est-il prévu jusqu'à la soutenance de thèse ?</label>
            <span>
                <input name="Financement" value="Oui" type="radio" >
                <label>Oui</label>
            </span>
            <span>
                <input name="Financement" value="Non" type="radio" >
                <label>Non</label>
            </span>

            <div id="Financement" >
                <label>Si oui, préciser </label>
                <textarea type="textarea" rows="5" class="form-control" name="FinancementDetails" ></textarea>
            </div>
        </div>
    </div>

    <h3>Avis sur la réinscription en thèse</h3>
    <span>
        <input name="Reinscription" value="Favorable" type="radio" >
        <label>Favorable</label>
    </span>
    <span>
        <input name="Reinscription" value="Défavorable" type="radio" >
        <label>Défavorable</label>
    </span>
    <div>
        <label>Avis circonstancié</label>
        <textarea type="textarea" rows="5" class="form-control" name="AvisReinscription"></textarea>
    </div>

    <div>
        <label>Date de l'établissement du rapport</label>
        <input type="date" class="form-control" name="DateRapport" id="DateRapport" value="">
    </div>
    
</form>
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
        </main>
    </div>            
</div>