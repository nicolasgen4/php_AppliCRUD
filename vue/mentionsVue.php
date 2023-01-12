<?php

/**
 * Vue de la page mentions légales
 * Affiche le contenu HTML de la page mentions légales
 * Appelle le modèle du site
 */

$title = 'mentions légales';
$css = 'mentionsStyle';

//Liens du site dans les mentions
$lien = 'https://nicolas.lesacteursduweb.fr';

ob_start();

?>

<div class="mentions-bandeau bandeau">
    <!--TITRE DE PAGE MASQUE-->
    <h1 class="lecteur-ecran lecteur-ecran-focus">Mentions légales et conditions d'utilisation du site</h1>
</div>

<div class="wrapper mentions column-start">
    <section class="titre-mentions column-start">
        <h2>Mentions légales</h2>
    </section>

    <section class="article-mentions column-start">
        <h3>Définitions</h3>
        <p><b>Client :</b> tout professionnel ou personne physique capable au sens des articles 1123 et suivants du Code
            civil,
            ou personne morale, qui visite le Site objet des présentes conditions générales.
        </p>
        <p><b>Prestations et Services :</b> <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> met à disposition des
            Clients
            :</p>
        <p><b>Contenu :</b> Ensemble des éléments constituants l’information présente sur le Site, notamment textes –
            images
            –
            vidéos.</p>
        <p><b>Informations clients :</b> Ci après dénommé "Information (s)" qui correspondent à l’ensemble des données
            personnelles susceptibles d’être détenues par <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> pour la gestion de
            votre
            compte, de la gestion de la relation client et à des fins d’analyses et de statistiques.</p>
        <p><b>Utilisateur :</b> Internaute se connectant, utilisant le site susnommé.</p>
        <p><b>Informations personnelles :</b> "Les informations qui permettent, sous quelque forme que ce soit,
            directement
            ou
            non, l'identification des personnes physiques auxquelles elles s'appliquent" (article 4 de la loi n° 78-17
            du 6
            janvier 1978).</p>
        <p>Les termes "données à caractère personnel", "personne concernée", "sous traitant" et "données sensibles"
            ont
            le sens défini par le Règlement Général sur la Protection des Données (RGPD : n° 2016-679)</p>
    </section>
    <section class="article-mentions column-start">
        <h3>1. Présentation du site internet.</h3>
        <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il
            est
            précisé aux utilisateurs du site internet <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> l'identité des
            différents
            intervenants dans le cadre de sa réalisation et de son suivi:
        </p>
        <ul class="column-start">
            <li><strong>Propriétaire</strong> : Entrepreneur individuel GENAC TIF – <?= ucfirst(htmlspecialchars($coordonnees['adresse'])) . ' ' . htmlspecialchars($coordonnees['code_postal']) . ' ' . strtoupper(htmlspecialchars($coordonnees['ville'])) ?></li>
            <li><strong>Responsable publication</strong> : Mme Hilaire Laurine – <?= htmlspecialchars($coordonnees['telephone']) ?></li>
            <li><strong>Créateur du site</strong> : <a href="https://www.linkedin.com/in/nicolasdev/" title="Voir le linkedin du développeur">https://www.linkedin.com/in/nicolasdev</a></li>
            <li><strong>Hébergeur du site</strong> : Infomaniak Network SA – Rue Eugène-Marziano 25 1227 1227 Les Acacias (GE) +41228203555</li>
            <li><strong>Déléguée à la protection des données</strong> : Mme Hilaire Laurine – coiffeuse@gmail.com</li>
        </ul>
    </section>
    <section class="article-mentions column-start">
        <h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>
        <p>Le Site constitue une œuvre de l’esprit protégée par les dispositions du Code de la Propriété Intellectuelle
            et
            des
            Réglementations Internationales applicables.
            Le Client ne peut en aucune manière réutiliser, céder ou exploiter pour son propre compte tout ou partie des
            éléments ou travaux du Site.</p>
        <p>L’utilisation du site <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            implique
            l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions
            d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> sont donc invités à
            les
            consulter de manière régulière.
        </p>
        <p>Ce site internet est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de
            maintenance technique peut être toutefois décidée par <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>,
            qui s’efforcera alors de
            communiquer préalablement aux utilisateurs les dates et heures de l’intervention.
            Le site web <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> est mis à
            jour
            régulièrement par <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            responsable.
            De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à
            l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.</p>
    </section>
    <section class="article-mentions column-start">
        <h3>3. Description des services fournis.</h3>
        <p>Le site internet <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> a pour
            objet
            de fournir une information concernant l’ensemble des activités de la société.
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> s’efforce de fournir
            sur
            le
            site <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> des informations
            aussi
            précises que possible. Toutefois, il ne pourra être tenu responsable des oublis, des inexactitudes et des
            carences
            dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces
            informations.
        </p>
        <p>Toutes les informations indiquées sur le site <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            sont données à titre
            indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> ne sont pas
            exhaustifs.
            Ils
            sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>4. Limitations contractuelles sur les données techniques.</h3>
        <p>Le site utilise la technologie JavaScript.
            Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De
            plus,
            l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus
            et
            avec
            un navigateur de dernière génération mis-à-jour
            Le site <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> est hébergé
            chez
            un
            prestataire sur le territoire de l’Union Européenne conformément aux dispositions du Règlement Général sur
            la
            Protection des Données (RGPD : n° 2016-679)</p>
        <p>L’objectif est d’apporter une prestation qui assure le meilleur taux d’accessibilité. L’hébergeur assure la
            continuité de son service 24 Heures sur 24, tous les jours de l’année. Il se réserve néanmoins la
            possibilité
            d’interrompre le service d’hébergement pour les durées les plus courtes possibles notamment à des fins de
            maintenance, d’amélioration de ses infrastructures, de défaillance de ses infrastructures ou si les
            Prestations
            et
            Services génèrent un trafic réputé anormal.</p>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> et l’hébergeur ne
            pourront
            être
            tenus responsables en cas de dysfonctionnement du réseau Internet, des lignes téléphoniques ou du matériel
            informatique et de téléphonie lié notamment à l’encombrement du réseau empêchant l’accès au serveur.</p>
    </section>
    <section class="article-mentions column-start">
        <h3>5. Propriété intellectuelle et contrefaçons.</h3>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> est propriétaire des
            droits
            de
            propriété intellectuelle et détient les droits d’usage sur tous les éléments accessibles sur le site
            internet,
            notamment les textes, images, graphismes, logos, vidéos, icônes et sons.
            Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du
            site,
            quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de :
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>.
        </p>
        <p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée
            comme
            constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants
            du
            Code
            de Propriété Intellectuelle.</p>
    </section>
    <section class="article-mentions column-start">
        <h3>6. Limitations de responsabilité.</h3>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> agit en tant qu’éditeur
            du
            site. <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> est responsable
            de
            la
            qualité et de la véracité du Contenu qu’il publie. </p>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> ne pourra être tenu
            responsable
            des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site internet
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>, et résultant soit de
            l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition
            d’un
            bug
            ou d’une incompatibilité.
        </p>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> ne pourra également
            être
            tenu
            responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance)
            consécutifs à
            l’utilisation du site <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>.
            Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des
            utilisateurs. <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> se
            réserve
            le
            droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait
            à la
            législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le
            cas
            échéant, <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> se réserve
            également
            la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas
            de
            message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé
            (texte,
            photographie …).</p>
    </section>
    <section class="article-mentions column-start">
        <h3>7. Gestion des données personnelles.</h3>
        <p>Le Client est informé des réglementations concernant la communication marketing, la loi du 21 Juin 2014 pour
            la
            confiance dans l’Economie Numérique, la Loi Informatique et Liberté du 06 Août 2004 ainsi que du Règlement
            Général
            sur la Protection des Données (RGPD : n° 2016-679). </p>
    </section>
    <section class="article-mentions column-start">
        <h3>7.1 Responsables de la collecte des données personnelles</h3>
        <p>Pour les Données Personnelles collectées dans le cadre de l'utilisation du formulaire de contact et
            du formulaire de réservation des produits click and collect,
            le responsable du traitement des Données Personnelles est : GENAC TIF.
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            est représenté par Mme Hilaire Laurine, son représentant légal.
        </p>
        <p>En tant que responsable du traitement des données qu’il collecte, <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            s’engage à respecter le cadre
            des dispositions légales en vigueur. Il lui appartient notamment au Client d’établir les finalités de ses
            traitements de données, de fournir à ses prospects et clients, à partir de la collecte de leurs
            consentements,
            une
            information complète sur le traitement de leurs données personnelles et de maintenir un registre des
            traitements
            conforme à la réalité.
            Chaque fois que <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> traite
            des
            Données Personnelles, <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            prend
            toutes les mesures raisonnables pour s’assurer de l’exactitude et de la pertinence des Données Personnelles
            au
            regard des finalités pour lesquelles <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> les traite.</p>
    </section>
    <section class="article-mentions column-start">
        <h3>7.2 Finalité des données collectées</h3>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> est susceptible de
            traiter
            tout
            ou partie des données : </p>
        <ul class="column-start">
            <li>pour répondre par email au Client suite à l'utilisation du
                formulaire de contact du Site : nom, prénom, email.</li>
            <li>pour envoyer un accusé de réception par email au Client suite à l'utilisation du formulaire de
                contact du Site : nom, prénom, email.</li>
            <li>pour répondre au Client par email dans le cadre d'une réservation de produits click and collect
                suite à l'utilisation du formulaire de réservation du Site : nom, prénom, email.</li>
            <li>pour envoyer un récapitulatif de réservation par email au Client suite à l'utilisation du formulaire de
                réservation de produits click and collect du Site : nom, prénom, email.</li>
        </ul>
        <p><a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> ne commercialise pas
            vos
            données personnelles qui sont donc uniquement utilisées par nécessité de réponse aux demandes du Client
            et dans le cadre des services du Site.
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>7.3 Droit d’accès, de rectification et d’opposition</h3>
        <p>
            Conformément à la réglementation européenne en vigueur, les Utilisateurs de
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            disposent des droits
            suivants
            :
        </p>
        <ul class="column-start">
            <li>droit d'accès (article 15 RGPD) et de rectification (article 16 RGPD), de mise à jour, de complétude des
                données
                des Utilisateurs droit de verrouillage ou d’effacement des données des Utilisateurs à caractère
                personnel
                (article 17 du RGPD), lorsqu’elles sont inexactes, incomplètes, équivoques, périmées, ou dont la
                collecte,
                l'utilisation, la communication ou la conservation est interdite </li>

            <li>droit de retirer à tout moment un consentement (article 13-2c RGPD) </li>

            <li>droit à la limitation du traitement des données des Utilisateurs (article 18 RGPD) </li>

            <li>droit d’opposition au traitement des données des Utilisateurs (article 21 RGPD) </li>

            <li>droit à la portabilité des données que les Utilisateurs auront fournies, lorsque ces données font
                l’objet de
                traitements automatisés fondés sur leur consentement ou sur un contrat (article 20 RGPD) </li>

            <li>droit de définir le sort des données des Utilisateurs après leur mort et de choisir à qui
                <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> devra communiquer
                (ou
                non) ses données à un tiers qu’ils aura préalablement désigné
            </li>
        </ul>
        <p>Dès que <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> a connaissance
            du
            décès
            d’un Utilisateur et à défaut d’instructions de sa part, <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            s’engage à détruire
            ses
            données, sauf si leur conservation s’avère nécessaire à des fins probatoires ou pour répondre à une
            obligation
            légale.</p>
        <p>Si l’Utilisateur souhaite savoir comment <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> utilise ses Données
            Personnelles, demander à les rectifier ou s’oppose à leur traitement, l’Utilisateur peut contacter
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> par écrit à l’adresse
            suivante :
        </p>
        GENAC TIF – Mme Hilaire Laurine<br>
        15 place du 19 Mars 1962 16170 Genac-Bignac.
        <p>Dans ce cas, l’Utilisateur doit indiquer les Données Personnelles qu’il souhaiterait que
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> corrige, mette à jour
            ou
            supprime, en s’identifiant précisément avec une copie d’une pièce d’identité (carte d’identité ou
            passeport).
        </p>
        <p>
            Les demandes de suppression de Données Personnelles seront soumises aux obligations qui sont imposées à
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> par la loi, notamment
            en
            matière de conservation ou d’archivage des documents. Enfin, les Utilisateurs de
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> peuvent déposer une
            réclamation auprès des autorités de contrôle, et notamment de la CNIL (https://www.cnil.fr/fr/plaintes).
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>7.4 Non-communication des données personnelles</h3>
        <p>
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> s’interdit de traiter,
            héberger ou transférer les Informations collectées sur ses Clients vers un pays situé en dehors de l’Union
            européenne ou reconnu comme "non adéquat" par la Commission européenne sans en informer préalablement le
            client.
        </p>
        <p>
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> s’engage à prendre
            toutes
            les
            précautions nécessaires afin de préserver la sécurité des Informations et notamment qu’elles ne soient pas
            communiquées à des personnes non autorisées. Cependant, si un incident impactant l’intégrité ou la
            confidentialité
            des Informations du Client est portée à la connaissance de <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>,
            celle-ci devra dans
            les
            meilleurs délais informer le Client et lui communiquer les mesures de corrections prises. Par ailleurs
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> ne collecte aucune "données sensibles".
        </p>
        <p>
            Les Données Personnelles de l’Utilisateur ne sont pas communiquées à des prestataires de services.
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> s'engage à ne jamais
            communiquer les Données Personnelles de l'Utilisateur à des personnes non autorisées.
        </p>
        <p>
            Dans la limite de leurs attributions respectives et pour les finalités rappelées ci-dessus, les principales
            personnes susceptibles d’avoir accès aux données des Utilisateurs de
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> sont principalement
            la propriétaire du Site et ses employés.
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>8. Notification d’incident</h3>
        <p>
            Quels que soient les efforts fournis, aucune méthode de transmission sur Internet et aucune méthode de
            stockage
            électronique n'est complètement sûre. Nous ne pouvons en conséquence pas garantir une sécurité absolue.
            Si nous prenions connaissance d'une brèche de la sécurité, nous avertirions les utilisateurs concernés afin
            qu'ils
            puissent prendre les mesures appropriées. Nos procédures de notification d’incident tiennent compte de nos
            obligations légales, qu'elles se situent au niveau national ou européen. Nous nous engageons à informer
            pleinement
            nos clients de toutes les questions relevant de la sécurité de leur compte et à leur fournir toutes les
            informations
            nécessaires pour les aider à respecter leurs propres obligations réglementaires en matière de reporting.</p>
        <p>
            Aucune information personnelle de l'utilisateur du site
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> n'est publiée à
            l'insu de
            l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule
            l'hypothèse du
            rachat de <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> et de ses
            droits
            permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la
            même
            obligation de conservation et de modification des données vis à vis de l'utilisateur du site
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>.
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>Sécurité</h3>
        <p>
            Pour assurer la sécurité et la confidentialité des Données Personnelles et des Données Personnelles de
            Santé, <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> utilise des
            réseaux
            protégés
            par des dispositifs standards tels que par pare-feu, la pseudonymisation, l’encryption et mot de passe. </p>
        <p>
            Lors du traitement des Données Personnelles, <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>
            prend toutes les
            mesures
            raisonnables visant à les protéger contre toute perte, utilisation détournée, accès non autorisé,
            divulgation,
            altération ou destruction.</p>
    </section>
    <section class="article-mentions column-start">
        <h3>9. Liens hypertextes "cookies" et balises ("tags") internet</h3>
        <p>
            Le site <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> contient un
            certain
            nombre de liens hypertextes vers d’autres sites, mis en place avec l’autorisation de
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a>. Cependant,
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> n’a pas la
            possibilité de
            vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.
        </p>
        Sauf si vous décidez de désactiver les cookies, vous acceptez que le site puisse les utiliser. Vous pouvez à
        tout
        moment
        désactiver ces cookies et ce gratuitement à partir des possibilités de désactivation qui vous sont offertes et
        rappelées
        ci-après, sachant que cela peut réduire ou empêcher l’accessibilité à tout ou partie des Services proposés par
        le
        site.
        <p></p>
    </section>
    <section class="article-mentions column-start">
        <h3>9.1. "COOKIES"</h3>
        <p>
            Un "cookie" est un petit fichier d’information envoyé sur le navigateur de l’Utilisateur et enregistré au
            sein
            du
            terminal de l’Utilisateur (ex : ordinateur, smartphone), (ci-après "Cookies"). Ce fichier comprend des
            informations telles que le nom de domaine de l’Utilisateur, le fournisseur d’accès Internet de
            l’Utilisateur, le
            système d’exploitation de l’Utilisateur, ainsi que la date et l’heure d’accès. Les Cookies ne risquent en
            aucun
            cas
            d’endommager le terminal de l’Utilisateur.</p>
        <p>
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> n'utilise aucun "cookie" publicitaire
            ou d'analyse de l'activité de l'Utilisateur et ne traite
            donc aucune données de l'Utilisateur concernant ses activités lors d'une visite du Site. 
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> n'utilise que les "cookies" nécessaires
            pour conserver le panier d'achats de l'Utilisateur, dans le cadre du service de réservation de produits
            proposé par le Site.
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>9.2. BALISES ("TAGS") ET TRACEURS</h3>
        <p>
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> n'utilise aucun outil d'analyses
            Web ou traceurs, et ne recueille donc aucune données sur les visiteurs du Site et leur utilisation du Site.
        </p>
    </section>
    <section class="article-mentions column-start">
        <h3>10. Droit applicable et attribution de juridiction.</h3>
        <p>
            Tout litige en relation avec l’utilisation du site
            <a href="<?= htmlspecialchars($lien) ?>"><?= htmlspecialchars($lien) ?></a> est soumis au droit
            français.
            En dehors des cas où la loi ne le permet pas, il est fait attribution exclusive de juridiction aux tribunaux
            compétents d'Angoulême
        </p>
    </section>
</div>

<?php

$content = ob_get_clean();

require_once __DIR__ . '/modele.php';
