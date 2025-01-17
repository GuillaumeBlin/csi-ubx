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
                <h1>Rapport annuel du comité de suivi individuel de thèse</h1>
<form id="csi" >
    <h3>L’entretien</h3>
    <h4>Date de l’entretien </h4>
    <input type="date" class="form-control" name="Date_Entretrien" value="">
    <h4>Modalités de l’entretien </h4>
    <div>
        <input name="ModalitesEntretien" value="Présentiel" type="radio" >
        <label>Présentiel</label>
    </div>
    <div>
        <input name="ModalitesEntretien" value="Visioconférence" type="radio" >
        <label>Visioconférence</label>
    </div>
    <div>
        <input name="ModalitesEntretien" value="Mixte" type="radio" >
        <label>Mixte</label>
    </div>
    <div id="ModalitesEntretienDetails">
        <label>Détails des modalités</label>
        <textarea type="textarea" rows="5" class="form-control" wrap="wrap" name="ModalitesEntretienDetails"></textarea>

    </div>

    <h3>Informations générales</h3>
    <h4>La doctorante ou le doctorant</h4>
    <h5>Nom</h5>
    <input type="text" readonly class="form-control" name="PhD_Nom" id="PhD_Nom" value="">
    <h5>Prénom</h5>
    <input type="text" readonly class="form-control" name="PhD_Prenom" id="PhD_Prenom" value="">
    <h5>Email dans ADUM</h5>
    <input type="text" readonly class="form-control" name="PhD_Mail" id="PhD_Mail" value="">
    <h5>Spécialité</h5>
    <input type="text" readonly class="form-control" name="PhD_Specialite" id="PhD_Specialite" value="">
    <h5>Unité de recherche</h5>
    <textarea type="textarea" rows="1" disabled class="form-control" wrap="wrap" name="PhD_UMR" id="PhD_UMR"></textarea>
    <h4>La thèse</h4>
    <h5>Nom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Nom" id="DT_Nom" value="">
    <h5>Prénom direction de thèse</h5>
    <input type="text" readonly class="form-control" name="DT_Prenom" id="DT_Prenom" value="">
    
        <h5>Nom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Nom" id="CODT_Nom" value="">
    <h5>Prénom co-direction de thèse</h5>
    <input type="text" readonly class="form-control" name="CODT_Prenom" id="CODT_Prenom" value="">
    <h5>Date de début de thèse</h5>
    <input type="date" class="form-control" name="PhD_DateDebutThese" readonly id="PhD_DateDebutThese" value="">

    <h4>Année du CSI</h4>
    <h5>CSI pour réinscription en année</h5>
    <input type="number" readonly class="form-control" name="PhD_CSI_Annee" min="2" max="8" step="1" id="PhD_CSI_Annee" value="">

    <h3>Etat d'avancement de la thèse</h3>
    <h5>Par rapport aux objectifs initiaux définis au début de la thèse, le contenu est-il ?</h5>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Globalement conforme" type="radio" >
        <label>Globalement conforme</label>
    </span>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Conforme avec quelques ajustements" type="radio" >
        <label>Conforme avec quelques ajustements</label>
    </span>
    <span>
        <input name="ComparaisonObjectifsInitiaux" value="Réorienté" type="radio" >
        <label>Réorienté</label>
    </span>
    <div id="ComparaisonObjectifsInitiaux" >
        <label>Précisions</label>
        <textarea type="textarea" rows="5" class="form-control" name="ComparaisonObjectifsInitiauxPrecisions"></textarea>
    </div>

    <h5>Observations sur le plan méthodologique et expérimental</h5>
    <span>
        <input name="ObservationsMethodoExpe" value="Aucune difficulté particulière" type="radio" >
        <label>Aucune difficulté particulière</label>
    </span>
    <span>
        <input name="ObservationsMethodoExpe" value="Des difficultés mineures" type="radio" >
        <label>Des difficultés mineures</label>
    </span>
    <span>
        <input name="ObservationsMethodoExpe" value="Des difficultés majeures" type="radio" >
        <label>Des difficultés majeures</label>
    </span>
    <div id="ObservationsMethodoExpe" >
        <label>Précisions et recommandations</label>
        <textarea type="textarea" rows="5" class="form-control" name="ObservationsMethodoExpePrecisions"></textarea>
    </div>

    <h5>Le calendrier prévisionnel de réalisation est-il suivi ?</h5>
    <span>
        <input name="RespectCalendrierPrevisionnel" value="Oui" type="radio" >
        <label>Oui</label>
    </span>
    <span>
        <input name="RespectCalendrierPrevisionnel" value="Non" type="radio" >
        <label>Non</label>
    </span>
    <div id="RespectCalendrierPrevisionnel" >
        <label>Raisons et ajustements recommandés</label>
        <textarea type="textarea" rows="5" class="form-control" name="RespectCalendrierPrevisionnelPrecisions"></textarea>
    </div>

    <!-- 3eme année-->

    <div >
        <b>A remplir obligatoirement pour une réinscription en 3ème année ou plus</b>
        <h5>La thèse pourra-t-elle a priori être soutenue au terme de l'année à venir?</h5>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Oui" type="radio" >
            <label>Oui</label>
        </span>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Probablement" type="radio" >
            <label>Probablement</label>
        </span>
        <span>
            <input name="SoutenanceAuTermeAnneeAVenir" value="Non" type="radio" >
            <label>Non</label>
        </span>
        <div id="SoutenanceAuTermeAnneeAVenir" >
            <label>Raisons</label>
            <textarea type="textarea" rows="5" class="form-control" name="SoutenanceAuTermeAnneeAVenirPrecisions"></textarea>
        </div>

        <h5>Productions scientifiques et participation à des colloques</h5>
        <div>
            <label>Avis et recommandations</label>
            <textarea type="textarea" rows="5" class="form-control" name="AvisRecommandationsProductionScientifique"></textarea>
        </div>

        <h5>Expériences internationales avec mobilités < à 3 mois</h5>
                <span>
                    <input name="MobilitesInternationalesMoins3Mois" value="Oui" type="radio" >
                    <label>Oui</label>
                </span>
                <span>
                    <input name="MobilitesInternationalesMoins3Mois" value="Non" type="radio" >
                    <label>Non</label>
                </span>

                <h5>Expériences internationales avec mobilités > à 3 mois</h5>
                <span>
                    <input name="MobilitesInternationalesPlus3Mois" value="Oui" type="radio" >
                    <label>Oui</label>
                </span>
                <span>
                    <input name="MobilitesInternationalesPlus3Mois" value="Non" type="radio" >
                    <label>Non</label>
                </span>
    </div>

    <h3>Développement des compétences</h3>
    

    <h5>Avis et recommandations du CSI sur les formations à suivre l’année suivante</h5>
    <textarea type="textarea" rows="5" class="form-control" name="AvisRecommandationsFormations"></textarea>

    <h3>Perspectives de poursuite de carrière</h3>
    <p>Indiquer les perspectives de poursuite de carrière post-thèse auxquelles doit faire écho le plan de formation durant la thèse. Indiquer les perspectives de candidature pour un post-doc en France ou à l’étranger, de candidature à la qualification aux fonctions de Maîtres de conférences, de chercheur CNRS, INRAE, INRAP, etc...</p>
    <textarea type="textarea" rows="5" class="form-control" name="PerspectivesCarriere"></textarea>

    <h3>Avis du comité de suivi individuel sur la réinscription</h3>
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
    <div id="DateSoutenance" >
        <label>Si oui, date prévue pour la soutenance de thèse</label>
        <input type="date" class="form-control" name="DateSoutenance" value="">
    </div>

    <span>
        <input name="Reinscription" value="Favorable" type="radio" >
        <label>Favorable</label>
    </span>
    <span>
        <input name="Reinscription" value="Favorable avec réserves" type="radio" >
        <label>Favorable avec réserves</label>
    </span>
    <span>
        <input name="Reinscription" value="Défavorable" type="radio" >
        <label>Défavorable</label>
    </span>
    <div>
        <label>Avis circonstancié</label>
        <textarea type="textarea" rows="5" class="form-control" name="AvisReinscription"></textarea>
    </div>
    <h5>Le comité de suivi alerte la direction de l’école doctorale sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste » par un rapport confidentiel </h5>
    <h6>Cette information ne sera pas présente sur le rapport définitif mais accessible par la direction de l'ED</h6>
    <span>
        <input name="RapportConfidentielAVenir" value="Oui" type="radio" >
        <label>Oui</label>
    </span>
    <span>
        <input name="RapportConfidentielAVenir" value="Non" type="radio" >
        <label>Non</label>
    </span>

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
