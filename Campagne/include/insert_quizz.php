<?php
date_default_timezone_set('Europe/Paris');
$now = new DateTime();
$formattedNow = $now->format('Y-m-d');

$onedayLater = new DateTime();
$onedayLater->modify('+1 day');
$formattedOnedayLater = $onedayLater->format('Y-m-d');
?>

<div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close-popup">&times;</span>
            <h2>Ajouter un Quizz</h2>
            <form action="" method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <input name="text" type="text" placeholder='text' required>
                <input type="date" name="date" min="<?php echo $formattedOnedayLater; ?>" value="<?php echo $formattedOnedayLater; ?>"required>

                <button type="submit" name='admin_action' value="créer_quizz">Ajouter une Question</button>
            </form>
        </div>
    </div>
    <script src="../js/close-popup.js"></script>