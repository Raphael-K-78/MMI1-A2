<?php
    include("include/fonction_connect.php");
?>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="media/logocampagne.png" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campagne</title>
    <script src="lib/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/arrow-scroll.css">
    <link rel="stylesheet" href="css/contenue.css">
    <link rel="stylesheet" href="css/pop-up.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php
    include("include/header.php");
    ?>
    <main>
    <section class='section-1'>
            <h1>Découvrez notre campagne "Diviser pour mieux trier"</h1>
            <div>
                <div class="image-container">
                    <img src="media/Charlesdegaule1.png" alt="Image de poubelle">
                </div>
                <div class="text-container">
                    <p >Bienvenue dans notre campagne de sensibilisation "Diviser pour Mieux Trier" ! Nous croyons fermement en l'importance du tri sélectif et de la gestion responsable des déchets pour préserver notre environnement et construire un avenir durable.</p>
                    <p>Notre mission est simple mais essentielle : informer, éduquer et inspirer le plus grand nombre de personnes possible à adopter des pratiques de tri sélectif efficaces et respectueuses de l'environnement. À travers une série d'initiatives créatives et engageantes, nous visons à encourager chacun à jouer son rôle dans la réduction des déchets et la préservation de notre planète.</p>
                    <p>Nous croyons en la force du collectif pour créer un changement positif. Rejoignez-nous dans notre mission "Diviser pour Mieux Trier" en partageant nos contenus, en participant à nos initiatives et en adoptant vous-même des habitudes de vie plus durables. Ensemble, nous pouvons faire une réelle différence pour notre planète !</p>
                    <p>Prêt à passer à l'action ? Explorez notre site pour découvrir plus en détail notre campagne, et n'oubliez pas de nous suivre sur les réseaux sociaux pour rester informé et engagé !</p>
                </div>
            </div>
        </section>
        <div id="div_scroll">
    <div class="anime-container" id="napoleon">
        <div class="side-text green">
            <p>NAPOLÉON</p>
        </div>
        <div class="main-content">
            <div class="text-content">
                <h2>Apprenez à trier avec Napoléon</h2>
                <p>Napoléon incarne l'esprit de détermination et d'organisation nécessaires pour devenir un véritable empereur du tri sélectif. Avec son sens de la stratégie et de l'efficacité, il nous inspire à trier nos déchets avec rigueur et discipline, contribuant ainsi à la construction d'un avenir plus durable.</p>
            </div>
        </div>
    </div>
    <div class="anime-container" id="charlemagne">
        <div class="side-text red">
            <p>CHARLEMAGNE</p>
        </div>
        <div class="main-content">
            <div class="text-content">
                <h2>Apprenez à trier avec Charlemagne</h2>
                <p>Charlemagne, roi du recyclage, symbolise la valorisation des ressources et la vision à long terme. Son engagement en faveur du recyclage nous invite à suivre son exemple en donnant une seconde vie à nos déchets, contribuant ainsi à la préservation de notre planète.</p>
            </div>
        </div>
    </div>
    <div class="anime-container" id="degaule">
        <div class="side-text yellow">
            <p>Charles de Gaule</p>
        </div>
        <div class="main-content">
            <div class="text-content">
                <h2>Apprenez à trier avec Charles de Gaule</h2>
                <p>Charles de Gaulle incarne la force de leadership et l'engagement envers la protection de l'environnement. 
                    Avec sa détermination et son sens du devoir, il nous encourage à être des acteurs du changement en adoptant des comportements responsables et en soutenant des initiatives durables.</p>
            </div>
        </div>
    </div>
    <div class="anime-container" id="jeanneausecour">
        <div class="side-text green">
            <p>Jeanne d’Arc</p>
        </div>
        <div class="main-content">
            <div class="text-content">
                <h2>Apprenez à trier avec Jeanne d’Arc</h2>
                <p>Jeanne d'Arc, soldat de l'écologie, symbolise la lutte passionnée pour la protection de la nature et la défense des valeurs écologiques. Son courage et sa détermination nous inspirent à nous engager activement pour la préservation de la biodiversité et la lutte contre le changement climatique.</p>
            </div>
        </div>
    </div>
     </div>
     <script src='js/anime.js'></script>
    </main>
    <?php 
    include("include/arrow-scroll.php");
    include("include/footer.php"); 
    ?>
</body>
</html>