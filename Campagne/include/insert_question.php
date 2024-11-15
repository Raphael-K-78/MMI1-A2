<?php

$data = mysqli_query($db, "SELECT Nom, id_quizz FROM `Quizz`;");

if (!$data) {
    die("Erreur de requête SQL : " . mysqli_error($db));
}
?>

<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close" id="close-popup">&times;</span>
        <h2>Ajouter une Question</h2>
        <form action="" method="POST">
            <label for="quizz_select">Choix du Quizz</label>
            <select id="quizz_select" name="quizz" required>
                <?php 
                while ($quizz = mysqli_fetch_assoc($data)) {
                    printf("<option name='quizz' value='%s'>%s</option>", $quizz['id_quizz'], $quizz['Nom']);
                }
                ?>
            </select>
            <input name="question" type="text" placeholder='Question' required>
            <input name="rep1" type="text" placeholder='Réponse 1' required>
            <input name="rep2" type="text" placeholder='Réponse 2' required>
            <input name="rep3" type="text" placeholder='Réponse 3' required>
            <input name="rep4" type="text" placeholder='Réponse 4' required>
            <input name="reponse" type="number" placeholder='Bonne réponse' min='1' max='4' required>

            <button type="submit" name='admin_action' value="créer_question">Ajouter une Question</button>
        </form>
    </div>
</div>
<script src="../js/close-popup.js"></script>
