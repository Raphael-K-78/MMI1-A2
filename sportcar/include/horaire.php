<?php
date_default_timezone_set('Europe/Paris');
$now = new DateTime();
$formattedNow = $now->format('Y-m-d\TH:i');

$oneHourLater = new DateTime();
$oneHourLater->modify('+1 hour');
$formattedOneHourLater = $oneHourLater->format('Y-m-d\TH:i');
?>

<div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close-popup">&times;</span>
            <h2>Réserver une voiture</h2>
            <form action="" method="POST" >
                <label for="start_datetime">Date et heure de début</label>
                <input type="datetime-local"  name="début" min="<?php echo $formattedNow; ?>" value="<?php echo $formattedNow; ?>" required>

                <label for="end_datetime">Date et heure de fin</label>
                <input type="datetime-local" name="fin" min="<?php echo $formattedOneHourLater; ?>" value="<?php echo $formattedOneHourLater; ?>"required>

                <button type="submit" name="user_action" value="horaire">Réserver</button>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="css/pop-up.css">
    <script src="js/close-popup.js"></script>