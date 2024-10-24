<?php 

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Déconnexion' && 
    isset($_POST['user_action']) && $_POST['user_action'] == 'horaire' && 
    isset($_POST['début']) && isset($_POST['fin'])) {

    $db = mysqli_connect("localhost", "   ", "   ", "   ") or die(mysqli_error($db));

    $debut = $_POST['début'];
    $fin = $_POST['fin'];

    $query = "SELECT DISTINCT v.* FROM Voiture v LEFT JOIN Reservation r ON v.id_voit = r.id_voit WHERE NOT EXISTS (SELECT 1 FROM Reservation r2 WHERE v.id_voit = r2.id_voit AND '$debut' < r2.datetime_r AND '$fin' > r2.datetime_d);";
    $data = mysqli_query($db, $query);
    ?>
    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close-popup">&times;</span>
            <h2>Réserver une voiture</h2>
            <form action="" method="POST" >
                <label for="start_datetime">Choix du modèle</label>
                <select id="voiture_select" name="voiture" required>
                <?php 
                while ($voiture = mysqli_fetch_assoc($data)) {
                    printf( "<option name='voiture' value='{$voiture['id_voit']}'>{$voiture['marque']} {$voiture['modele']}</option>");
                }
                mysqli_close($db);

            }
                ?>
                </select>
                <input type="hidden" name="début" value="<?php echo $_POST['début']; ?>">
                <input type='hidden' name='fin' value="<?php echo $_POST['fin']; ?>">
                    <button type="submit" name="user_action" value="reservation">Réserver</button>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="css/pop-up.css">
    <script src="js/close-popup.js"></script>
