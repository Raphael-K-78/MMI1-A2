<?php
    include("include/fonction_connect.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="icon" type="image/png" href="media/logocampagne.png" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="lib/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/arrow-scroll.css">
    <link rel="stylesheet" href="css/contenue.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/pop-up.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include("include/header.php"); ?>
    <main>
        <section class='section-1'>
            
            <div>
                <div class="image-container">
                    <h2>Le saviez-vous ?</h2>
                    <img src="media/poubelle.jpg" alt="Image de poubelle">
                </div>
                <div class="text-container">
                    <p class='important'>25% de notre poubelle jaune n’est pas est directement recyclé et mis avec les déchets résiduels pour être incinérés</p>
                    <h2>MAIS POURQUOI ?</h2>
                    <p>Malgré les campagnes de sensibilisation, beaucoup de gens ne séparent pas correctement leurs déchets. Certains matériaux recyclables sont jetés avec les déchets non recyclables, ce qui diminue le taux de recyclage et conduit à l'incinération d'une partie des déchets recyclables.</p>
                    <button><a href="Guide.php">En savoir plus</a></button>
                </div>
            </div>
        </section>
        <section class="section-2">
            <div class='element'>
                <h2>01</h2>
                <h3>En triant mieux, on réduit nos déchets résiduels</h3>
                <p>Un tri efficace réduit les déchets non valorisables. En séparant correctement les matériaux recyclables et compostables des autres déchets, on diminue la quantité de déchets envoyés en décharge ou incinérés. Cela nécessite une meilleure éducation sur les techniques de tri et des infrastructures adaptées.<p>
            </div>
            <div class='element'>
                <h2>02</h2>
                <h3>L'impact environnemental du tri incorrect</h3>
                <p>Un tri incorrect peut contaminer des lots de recyclables, augmentant les coûts et les déchets. Les substances dangereuses mal triées peuvent polluer les sols et les eaux, nuisant à la santé et à l'environnement. Informer sur ces risques incite à une gestion plus responsable des déchets.<p>
            </div>
            <div class='element'>
                <h2>03</h2>
                <h3>Réduire la pollution</h3>
                <p>Un tri correct réduit les déchets en décharge et incinérés, diminuant ainsi les émissions de gaz à effet de serre et les substances toxiques. Cela améliore la qualité de l'air, de l'eau et des sols, limitant notre impact écologique.<p>
            </div>
            <div class='element'>
                <h2>04</h2>
                <h3>Préserver les ressources</h3>
                <p>Le recyclage réduit la nécessité d'extraire de nouvelles matières premières, économisant ainsi des ressources naturelles comme les arbres et les métaux. Cela diminue la pression sur les écosystèmes et économise de l'énergie, contribuant à la durabilité environnementale.<p>
            </div>
        </section>
        <section class="section-1">
            <div >
            <div class="image-container">
                <img class='horizontal-img'src='media/lacampagne.png' alt='campagne'>
            </div>
            <div class="text-container">
                <h2>La Campagne</h2>
                <p>
                    Plongez dans une aventure unique où l'histoire rencontre l'ecologie ! Notre nouvelle campagne, "Trier, c'est protéger", vous guide à travers les étapes cruciales de la gestion
                    des déchets en suivant les figures emblématiques de l'histoire de France comme Napoléon, Jeanne d'Arc, Charlemagne et Charles de Gaulle, dans des décors historiques.
                </p>
                <button><a  href='Campagne.php'>En savoir plus</a></button>
            </div>
        </section>
        <section class="section-1 revert">
            <div>    
                <div class="text-container">
                    <h2>Quizz</h2>
                    <p>
                    Êtes-vous un expert en tri des déchets ? Testez vos connaissances et amusez-vous en répondant à notre quiz interactif ! Défié vos amis et partagez vos résultats pour faire une différence.
                    Prêt à relever le défi ? Cliquez ici pour commencer et que le jeu commence !
                    </p>
                <button><a href='Quizz.php'>Jouer</a></button>
            </div>
            <div class="image-container">
                <img class='horizontal-img' src="media/quizz.png" alt="quizz">
            </div>
        </div>
    </div>
    </main>
    <?php 
    include("include/arrow-scroll.php");
    include("include/footer.php"); 
    ?>
</body>
</html>