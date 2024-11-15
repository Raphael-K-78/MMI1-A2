<?php
    include("include/fonction_connect.php");
?>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="media/logocampagne.png" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide</title>
    <script src="lib/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/arrow-scroll.css">
    <link rel="stylesheet" href="css/contenue.css">
    <link rel="stylesheet" href="css/pop-up.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <?php
    include("include/header.php");
    ?>
    <main>
    <h1>NOTRE GUIDE</h1>
        <p class='important'>Apprenez comment trier vos déchets correctement pour maximiser le recyclage et protéger l'environnement. Suivez les conseils de nos figures historiques pour devenir un expert du tri !</p>

        <section class="step">
        <div class="section-4"><img src="media/separer.png"><div class="vertical-hr"></div></div>
        <div> <div class="icon">1</div></div>
            <div class="content">
                <h2>SÉPARER LES MATÉRIAUX<br><small>Divisez pour régner, même avec vos déchets !</small></h2>
                <p>Séparez les différents matériaux avant de les jeter pour qu'ils soient correctement recyclés. Les cartons et le papier doivent être jetés dans une poubelle séparée des plastiques et des métaux. Cela réduit la contamination et améliore la qualité des matériaux recyclés.</p>
                <div class="exemple green">
                    <h3>Par exemple :</h3>
                    <ul>
                        <li>Cartons : Séparez-les et aplatissez-les avant de les jeter dans le bac de recyclage.</li>
                        <li>Verre : Rincez les bouteilles et les bocaux avant de les déposer dans le conteneur à verre.</li>
                        <li>Métal : Évitez de jeter des canettes en aluminium ou en acier dans les poubelles de déchets ordinaires.</li>
                    </ul>
                </div>
            </div>
</section>


        <section class="step">
        <div class="section-4"><img src="media/netoyer.png"><div class="vertical-hr"></div></div>
            <div> <div class="icon">2</div></div>
            <div class="content">
                <h2>NETTOYER LES DÉCHETS</h2>
                <p>Rincez vos contenants alimentaires avant de les recycler. Retirez les restes de nourriture et les étiquettes si possible. Cela permet de prévenir les odeurs et d'améliorer la qualité du recyclage.</p>
                <div class="exemple red">
                    <h3>Par exemple :</h3>
                    <ul>
                        <li>Rincez les bocaux en verre et les bouteilles en plastique avant de les jeter.</li>
                        <li>Retirez les étiquettes des canettes en métal et des bouteilles en plastique.</li>
                        <li>Séparez les restes de nourriture des emballages avant de les recycler.</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="step">
        <div class="section-4"><img src="media/savoir.png"><div class="vertical-hr"></div></div>
        <div> <div class="icon">3</div></div>
            <div class="content">
                <h2>CONNAÎTRE LES SYMBOLES DE RECYCLAGE<br><small>Apprenez les symboles pour mieux trier</small></h2>
                <p>Les symboles de recyclage sont essentiels pour bien comprendre les déchets. Chaque symbole indique le type de matériau et comment il doit être recyclé.</p>
                <div class="exemple yellow">
                    <h3>Les symboles de recyclage les plus courants :</h3>
                    <div class="symbols">
                        <div><img src="media/logo1.png" alt="Symbole 1"><p>Symbole indiquant que le produit (recyclable) doit être trié ou rapporter dans un point de collecte pour être recyclé.</p></div>
                        <div><img src="media/logo2.png" alt="Symbole 2"><p>Symbole indiquant que le déchet ne doit pas être jeté dans une poubelle classique. Il doit être collcter par une filliere spécifique.</p></div>
                        <div><img id='recyclable' src="media/logo3.png" alt="Symbole 3"><p>Symbole indiquant que le produit ou l’emballage est recyclable, mais pas qu’il est recyclé, ni qu’il le sera.</p></div>
                        <div><img src="media/logo4.png" alt="Symbole 4"><p>Symbole indiquant que l’entreprise qui l’appose sur ses produits s’aquitte d’une contribution financière auprés de filières de recyclage.</p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="step">
        <div class="section-4"><img src="media/trier.png"><div class="vertical-hr"></div></div>
        <div> <div class="icon">4</div></div>
            <div class="content">
                <h2>UTILISER LES BONS CONTENEURS</h2>
                <p>Choisissez le bon conteneur pour chaque type de déchet. Cela permet de recycler efficacement et de réduire la contamination.</p>
                <div class="exemple green">
                    <ul>
                        <li>Conteneur jaune : Pour les emballages plastiques, les cartons, les boîtes de conserve.</li>
                        <li>Conteneur vert : Pour les bouteilles en verre, les bocaux en verre.</li>
                        <li>Conteneur bleu : Pour les papiers et les magazines.</li>
                        <li>Déchèterie : Pour les déchets dangereux, les appareils électroniques, les piles.</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
<?php 
    include("include/arrow-scroll.php");
    include("include/footer.php"); 
    ?>
</body>
</html>