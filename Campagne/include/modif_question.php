<?php
$id = intval($_POST['modifQ']);
  $query = "SELECT * From `Question` where id_question = {$id}";
  $data = mysqli_query($db, $query);
  while ($element = mysqli_fetch_assoc($data)) {
   ?>

<div class="popup" id="popup">
    <div class="popup-content">
        <a href='#'><span class="close" id="close-popup">&times;</span></a>
        <h2>Modifier un Quizz</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="text" name="question" placeholder="Question" value="<?php echo $element['Question']; ?>" required>
            <input type="text" name="rep1" placeholder="Réponse 1" value="<?php echo $element['Reponse1']; ?>" required>
            <input type="text" name="rep2" placeholder="Réponse 2" value="<?php echo $element['Reponse2']; ?>" required>
            <input type="text" name="rep3" placeholder="Réponse 3" value="<?php echo $element['Reponse3']; ?>" required>
            <input type="text" name="rep4" placeholder="Réponse 4" value="<?php echo $element['Reponse4']; ?>" required>
            <input type="hidden" name='id' value='<?php echo $id;} ?>'>
            <button type="submit" name="admin_action" id='suppr' value="supprQ">Supprimer</button>
            <button type="submit" name="admin_action" value="modifierQ">Modifier</button>
        </form>
    </div>
</div>
<script src="../js/close-popup.js"></script>
<link rel="stylesheet" href="../css/pop-up.css">
