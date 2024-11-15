<?php
$id = intval($_POST['modif']);
  $query = "SELECT * From `Quizz` where id_quizz = {$id}";
  $data = mysqli_query($db, $query);
  while ($element = mysqli_fetch_assoc($data)) {
   ?>

<div class="popup" id="popup">
    <div class="popup-content">
        <a href='#'><span class="close" id="close-popup">&times;</span></a>
        <h2>Modifier un Quizz</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Nom" value="<?php echo $element['Nom']; ?>" required>
            <input type="text" name="text" placeholder="texte" value="<?php echo $element['text']; ?>" required>
            <input type="date" name="date" placeholder="Date" value="<?php echo $element['Date']; ?>" required>
            <input type="hidden" name='id' value='<?php echo $id;} ?>'>
            <button type="submit" name="admin_action" id='suppr'value="suppr">Supprimer</button>
            <button type="submit" name="admin_action" value="modifier">Modifier</button>
        </form>
    </div>
</div>
<script src="../js/close-popup.js"></script>
<link rel="stylesheet" href="../css/pop-up.css">
