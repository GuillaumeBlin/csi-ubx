<form action="<?php echo str_replace("/load/","/form_save_PhDReport/",$_SERVER['REQUEST_URI']);?>" method="POST">
<div class="rendered-form">
    <div class="">
        <h1>Rapport annuel de la doctorante ou du doctorant </h1></div>
    <div class="">
        <h2>INFORMATION GÉNÉRALES</h2></div>
    <div class="">
        <h3>LA DOCTORANTE OU LE DOCTORANT</h3></div>
    <div class="">
        <p>          
        <div class="form-group">
                <label for="PhD_Nom" >Nom</label>
                <input type="text" disabled class="form-control" name="PhD_Nom" access="false" id="PhD_Nom" value="<?php echo $defense["nom"];?>">
        </div>
        <div class="form-group">
                <label for="PhD_Prenom" >Prénom</label>
                <input type="text" disabled class="form-control" name="PhD_Prenom" access="false" id="PhD_Prenom" value="<?php echo $defense["prenom"];?>">
        </div>
        <div class="form-group">
                <label for="PhD_Mail" >Email dans ADUM</label>
                <input type="text" disabled class="form-control" name="PhD_Mail" access="false" id="PhD_Mail" value="<?php echo $defense["mail_principal"];?>">
        </div>
        <div class="form-group">
                <label for="PhD_Specialite" >Spécialité</label>
                <input type="text" disabled class="form-control" name="PhD_Specialite" access="false" id="PhD_Specialite" value="<?php echo $defense["these_specialite"];?>">
        </div>
        <div class="form-group">
                <label for="PhD_UMR" >Unité de recherche</label>
                <input type="text" disabled class="form-control" name="PhD_UMR" access="false" id="PhD_UMR" value="<?php echo $defense["these_laboratoire"];?>">
        </div>
        </p>
    </div>
    <div class="">
        <h3 access="false" id="control-9542568">LA THÈSE</h3></div>
    <div class="">
        <p access="false" id="control-690656">
            <div>NOM / prénom direction de thèse : <?php echo $defense["these_directeur_these_nom"];?> <?php echo $this->totitle($defense["these_directeur_these_prenom"]);?></div>                
            <div>NOM / prénom co-direction de thèse :<?php echo $defense["these_codirecteur_these_nom"];?> <?php echo $this->totitle($defense["these_codirecteur_these_prenom"]);?></div>
        </p>
    </div>
    <div class="formbuilder-date form-group field-date-1711061138770">
        <label for="PhD_DateDebutThese" class="formbuilder-date-label">Date de début de thèse</label>
        <input type="date" class="form-control" name="PhD_DateDebutThese" disabled access="false" id="PhD_DateDebutThese" value="<?php echo date('Y-m-d', strtotime($defense["these_date_1inscription"])); ?>">
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711093700565">
        <label for="TypeDeFinancement" class="formbuilder-radio-group-label">Type de financement</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="TypeDeFinancement" access="false" id="radio-group-1711093700565-0" value="Ministère" type="radio">
                <label for="radio-group-1711093700565-0">Ministères</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="TypeDeFinancement" access="false" id="radio-group-1711093700565-1" value="CIFRE" type="radio">
                <label for="radio-group-1711093700565-1">CIFRE</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="TypeDeFinancement" access="false" id="radio-group-1711093700565-2" value="COFRA" type="radio">
                <label for="radio-group-1711093700565-2">COFRA</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="TypeDeFinancement" access="false" id="radio-group-1711093700565-3" type="CD Droit Privé">
                <label for="radio-group-1711093700565-3">CD Droit Privé</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="TypeDeFinancement" access="false" id="radio-group-1711093700565-other" class="undefined other-option" value="Autre" type="radio">
                <label for="radio-group-1711093700565-other">Autre
                    <input type="text" id="TypeDeFinancementAutre" class="other-val">
                </label>
            </div>
        </div>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711093715652">
        <label for="radio-group-1711093715652" class="formbuilder-radio-group-label">Thèse en cotutelle :&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711093715652" access="false" id="radio-group-1711093715652-0" value="option-1" type="radio">
                <label for="radio-group-1711093715652-0">Oui</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711093715652" access="false" id="radio-group-1711093715652-1" value="option-2" type="radio">
                <label for="radio-group-1711093715652-1">Non</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-text form-group field-text-1711093865273">
        <label for="text-1711093865273" class="formbuilder-text-label">Si oui, préciser le pays partenaire</label>
        <input type="text" class="form-control" name="text-1711093865273" access="false" id="text-1711093865273">
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711093714411">
        <label for="radio-group-1711093714411" class="formbuilder-radio-group-label">
            <div>Thèse avec activités complémentaires (enseignement, médiation, valorisation expertise) :</div>
        </label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711093714411" access="false" id="radio-group-1711093714411-0" value="option-1" type="radio">
                <label for="radio-group-1711093714411-0">Oui</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711093714411" access="false" id="radio-group-1711093714411-1" value="option-2" type="radio">
                <label for="radio-group-1711093714411-1">Non</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-number form-group field-number-1711093931378">
        <label for="number-1711093931378" class="formbuilder-number-label">Si oui, nombre d’heures :</label>
        <input type="number" class="form-control" name="number-1711093931378" access="false" min="0" max="64" step="1" id="number-1711093931378">
    </div>
    <div class="">
        <h3 access="false" id="control-6155510">ANNÉE DU CSI</h3></div>
    <div class="formbuilder-number form-group field-number-1711094007194">
        <label for="number-1711094007194" class="formbuilder-number-label">
            <div>CSI pour réinscription en année</div>
        </label>
        <input type="number" class="form-control" name="number-1711094007194" access="false" min="2" max="8" step="1" id="number-1711094007194">
    </div>
    <div class="">
        <h3 access="false" id="control-4438948"><div>&nbsp;COMPOSITION DU COMITÉ DE SUIVI INDIVIDUEL (hors direction de thèse)</div></h3></div>
    <div class="">
        <h4 access="false" id="control-5071902"><div>La direction de la thèse ne fait pas partie du comité de suivi. Il comprend à minima 2 membres.</div><div><br></div></h4></div>
    <div class="">
        <p access="false" id="control-2875245">
            <div>Membre n°1 – Spécialiste du domaine de la thèse
                <br>
            </div>
            <div class="formbuilder-text form-group field-text-1711108611188">
                <label for="text-1711108611188" class="formbuilder-text-label">Nom</label>
                <input type="text" class="form-control" name="text-1711108611188" access="false" id="text-1711108611188">
            </div>
            <div class="formbuilder-text form-group field-text-1711108635344">
                <label for="text-1711108635344" class="formbuilder-text-label">Prénom</label>
                <input type="text" class="form-control" name="text-1711108635344" access="false" id="text-1711108635344">
            </div>
            <div class="formbuilder-text form-group field-text-1711108635344">
                <label for="text-1711108635344" class="formbuilder-text-label">Unité de recherche/établissement</label>
                <input type="text" class="form-control" name="text-1711108635344" access="false" id="text-1711108635344">
            </div>
            <div class="formbuilder-text form-group field-text-1711108647183">
                <label for="text-1711108647183" class="formbuilder-text-label">Adresse mail</label>
                <input type="email" class="form-control" name="text-1711108647183" access="false" id="text-1711108647183">
            </div>
            <div>Membre n°2 – Nom spécialiste externe au domaine de la thèse</div>
            <div class="formbuilder-text form-group field-text-1711108611188">
                <label for="text-1711108611188" class="formbuilder-text-label">Nom</label>
                <input type="text" class="form-control" name="text-1711108611188" access="false" id="text-1711108611188">
            </div>
            <div class="formbuilder-text form-group field-text-1711108635344">
                <label for="text-1711108635344" class="formbuilder-text-label">Prénom</label>
                <input type="text" class="form-control" name="text-1711108635344" access="false" id="text-1711108635344">
            </div>
            <div class="formbuilder-text form-group field-text-1711108635344">
                <label for="text-1711108635344" class="formbuilder-text-label">Unité de recherche/établissement</label>
                <input type="text" class="form-control" name="text-1711108635344" access="false" id="text-1711108635344">
            </div>
            <div class="formbuilder-text form-group field-text-1711108647183">
                <label for="text-1711108647183" class="formbuilder-text-label">Adresse mail</label>
                <input type="email" class="form-control" name="text-1711108647183" access="false" id="text-1711108647183">
            </div>
            <div>Membre n°3 – Ex. partenaire de la cotutelle, spécialiste du financeur etc</div>
            <div class="formbuilder-text form-group field-text-1711108611188">
                <label for="text-1711108611188" class="formbuilder-text-label">Nom</label>
                <input type="text" class="form-control" name="text-1711108611188" access="false" id="text-1711108611188">
            </div>
            <div class="formbuilder-text form-group field-text-1711108635344">
                <label for="text-1711108635344" class="formbuilder-text-label">Prénom</label>
                <input type="text" class="form-control" name="text-1711108635344" access="false" id="text-1711108635344">
            </div>
            <div class="formbuilder-text form-group field-text-1711108635344">
                <label for="text-1711108635344" class="formbuilder-text-label">Unité de recherche/établissement</label>
                <input type="text" class="form-control" name="text-1711108635344" access="false" id="text-1711108635344">
            </div>
            <div class="formbuilder-text form-group field-text-1711108647183">
                <label for="text-1711108647183" class="formbuilder-text-label">Adresse mail</label>
                <input type="email" class="form-control" name="text-1711108647183" access="false" id="text-1711108647183">
            </div>
        </p>
    </div>
    <div class="">
        <h2 access="false" id="control-4649260">1 -&nbsp; BILAN ANNUEL AVEC LA DIRECTION DE THÈSE</h2></div>
    <div class="formbuilder-checkbox-group form-group field-checkbox-group-1711060510937">
        <label for="checkbox-group-1711060510937" class="formbuilder-checkbox-group-label">Fréquence des contacts avec la direction de thèse (en dehors des courriers électroniques) :<span class="formbuilder-required">*</span></label>
        <div class="checkbox-group">
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060510937[]" access="false" id="checkbox-group-1711060510937-0" value="TousLesJours" type="checkbox">
                <label for="checkbox-group-1711060510937-0">Tous les jours</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060510937[]" access="false" id="checkbox-group-1711060510937-1"  value="PlusieursFoisParSemaine" type="checkbox">
                <label for="checkbox-group-1711060510937-1">Plusieurs fois par semaine</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060510937[]" access="false" id="checkbox-group-1711060510937-2"  value="Hebdomadaire" type="checkbox">
                <label for="checkbox-group-1711060510937-2">Hebdomadaire</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060510937[]" access="false" id="checkbox-group-1711060510937-3"  value="Mensuelle" type="checkbox">
                <label for="checkbox-group-1711060510937-3">Mensuelle</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060510937[]" access="false" id="checkbox-group-1711060510937-4"  value="MoinsDUneFoisParMois" type="checkbox">
                <label for="checkbox-group-1711060510937-4">Moins d'une fois par mois</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-checkbox-group form-group field-checkbox-group-1711060647737">
        <label for="checkbox-group-1711060647737" class="formbuilder-checkbox-group-label">Fréquence des contacts avec la codirection de thèse (le cas échéant) :</label>
        <div class="checkbox-group">
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060647737[]" access="false" id="checkbox-group-1711060647737-0" value="TousLesJours" type="checkbox">
                <label for="checkbox-group-1711060647737-0">Tous les jours</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060647737[]" access="false" id="checkbox-group-1711060647737-1" value="PlusieursFoisParSemaine" type="checkbox">
                <label for="checkbox-group-1711060647737-1">Plusieurs fois par semaine</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060647737[]" access="false" id="checkbox-group-1711060647737-2" value="Hebdomadaire" type="checkbox">
                <label for="checkbox-group-1711060647737-2">Hebdomadaire</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060647737[]" access="false" id="checkbox-group-1711060647737-3" value="Mensuelle" type="checkbox">
                <label for="checkbox-group-1711060647737-3">Mensuelle</label>
            </div>
            <div class="formbuilder-checkbox-inline">
                <input name="checkbox-group-1711060647737[]" access="false" id="checkbox-group-1711060647737-4" value="MoinsDUneFoisParMois" type="checkbox">
                <label for="checkbox-group-1711060647737-4">Moins d'une fois par mois</label>
            </div>
        </div>
    </div>
    <div class="">
        <h2 access="false" id="control-241947">2- BILAN ANNUEL DE LA RELATION AVEC L’UNITÉ DE RECHERCHE</h2></div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711060744423">
        <label for="radio-group-1711060744423" class="formbuilder-radio-group-label">Intégration dans l’unité de recherche) :<span class="formbuilder-required">*</span></label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060744423" access="false" id="radio-group-1711060744423-0"  value="PeuSatisfaisante" type="radio">
                <label for="radio-group-1711060744423-0">Peu satisfaisante</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060744423" access="false" id="radio-group-1711060744423-1"  value="Satisfaisante" type="radio">
                <label for="radio-group-1711060744423-1">Satisfaisante</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060744423" access="false" id="radio-group-1711060744423-2"  value="TrèsSatisfaisante" type="radio">
                <label for="radio-group-1711060744423-2">Très satisfaisante</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711060796978">
        <label for="radio-group-1711060796978" class="formbuilder-radio-group-label">Relations avec d'autres équipes scientifiques ?&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060796978" access="false" id="radio-group-1711060796978-0" value="oui" type="radio">
                <label for="radio-group-1711060796978-0">Oui</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060796978" access="false" id="radio-group-1711060796978-1" value="non" type="radio">
                <label for="radio-group-1711060796978-1">Non</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-textarea form-group field-textarea-1711060863637">
        <label for="textarea-1711060863637" class="formbuilder-textarea-label">Si oui, préciser lesquelles et si elles sont nationales ou internationales :</label>
        <textarea type="textarea" class="form-control" name="textarea-1711060863637" access="false" id="textarea-1711060863637"></textarea>
    </div>
    <div class="">
        <h2 access="false" id="control-2432633">3 -&nbsp;AVIS GÉNÉRAL SUR L’ANNÉE ÉCOULÉE</h2></div>
    <div class="">
        <p access="false" id="control-2310973">Donner votre avis personnel sur les points suivants&nbsp;</p>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711060965385">
        <label for="radio-group-1711060965385" class="formbuilder-radio-group-label">Avez-vous assez d'autonomie pour gérer votre travail ?&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060965385" access="false" id="radio-group-1711060965385-0" value="Satisfaisant" type="radio">
                <label for="radio-group-1711060965385-0">Satisfaisant</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060965385" access="false" id="radio-group-1711060965385-1" value="AAméliorer" type="radio">
                <label for="radio-group-1711060965385-1">A améliorer</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711060965385" access="false" id="radio-group-1711060965385-2" value="Insuffisant" type="radio">
                <label for="radio-group-1711060965385-2">Insuffisant</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711061036406">
        <label for="radio-group-1711061036406" class="formbuilder-radio-group-label">Avez-vous les moyens nécessaires pour mener à bien votre travail ?&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061036406" access="false" id="radio-group-1711061036406-0" value="Satisfaisant" type="radio">
                <label for="radio-group-1711061036406-0">Satisfaisant</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061036406" access="false" id="radio-group-1711061036406-1" value="AAméliorer" type="radio">
                <label for="radio-group-1711061036406-1">A améliorer</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061036406" access="false" id="radio-group-1711061036406-2" value="Insuffisant" type="radio">
                <label for="radio-group-1711061036406-2">Insuffisant</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711061035943">
        <label for="radio-group-1711061035943" class="formbuilder-radio-group-label">Trouvez-vous dans votre environnement de travail les réponses à vos questions scientifiques ?&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061035943" access="false" id="radio-group-1711061035943-0" value="Satisfaisant" type="radio">
                <label for="radio-group-1711061035943-0">Satisfaisant</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061035943" access="false" id="radio-group-1711061035943-1" value="AAméliorer" type="radio">
                <label for="radio-group-1711061035943-1">A améliorer</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061035943" access="false" id="radio-group-1711061035943-2" value="Insuffisant" type="radio">
                <label for="radio-group-1711061035943-2">Insuffisant</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711061031927">
        <label for="radio-group-1711061031927" class="formbuilder-radio-group-label">L'intérêt scientifique du sujet correspond-il à vos attentes ?&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061031927" access="false" id="radio-group-1711061031927-0" value="Satisfaisant" type="radio">
                <label for="radio-group-1711061031927-0">Satisfaisant</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061031927" access="false" id="radio-group-1711061031927-1" value="AAméliorer" type="radio">
                <label for="radio-group-1711061031927-1">A améliorer</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061031927" access="false" id="radio-group-1711061031927-2" value="Insuffisant" type="radio">
                <label for="radio-group-1711061031927-2">Insuffisant</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-textarea form-group field-textarea-1711061085657">
        <label for="textarea-1711061085657" class="formbuilder-textarea-label">
            <div>Avis général sur la thèse en précisant les éventuelles difficultés rencontrées :&nbsp;</div>
        </label>
        <textarea type="textarea" class="form-control" name="textarea-1711061085657" access="false" id="textarea-1711061085657"></textarea>
    </div>
    <div class="formbuilder-radio-group form-group field-radio-group-1711061105339">
        <label for="radio-group-1711061105339" class="formbuilder-radio-group-label">Demande de rendez-vous confidentiel avec la direction de l’école doctorale pour un signalement sur « toute forme de conflit, de discrimination ou de harcèlement moral ou sexuel ou d’agissement sexiste »&nbsp;</label>
        <div class="radio-group">
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061105339" access="false" id="radio-group-1711061105339-0" value="oui" type="radio">
                <label for="radio-group-1711061105339-0">Oui</label>
            </div>
            <div class="formbuilder-radio-inline">
                <input name="radio-group-1711061105339" access="false" id="radio-group-1711061105339-1" value="non" type="radio">
                <label for="radio-group-1711061105339-1">Non</label>
            </div>
        </div>
    </div>
    <div class="formbuilder-date form-group field-date-1711061138769">
        <label for="date-1711061138769" class="formbuilder-date-label">Date de l'établissement du rapport</label>
        <input type="date" class="form-control" name="date-1711061138769" access="false" id="date-1711061138769">
    </div>
    <div class="formbuilder-button form-group field-button-1711110414702">
        <button type="submit" class="btn-default btn" name="button-1711110414702" access="false" style="default" id="button-1711110414702">Valider le rapport</button>
    </div>
</div>
</form>