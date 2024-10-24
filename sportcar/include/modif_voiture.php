<?php
$id = intval($_POST['modif']);
  $queryvoiture = "SELECT * From `Voiture` where id_voit = {$id}";
  $tousvoiture = mysqli_query($db, $queryvoiture);
  while ($voiture = mysqli_fetch_assoc($tousvoiture)) {
   ?>

<div class="popup" id="popup">
    <div class="popup-content">
        <a href='#'><span class="close" id="close-popup">&times;</span></a>
        <h2>Modifier une voiture</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="text" name="marque" placeholder="Marque" value="<?php echo $voiture['marque']; ?>" required>
            <input type="text" name="modele" placeholder="Modèle" value="<?php echo $voiture['modele']; ?>" required>
            <input type="number" name="prix" placeholder="Prix" value="<?php echo $voiture['prix']; ?>" required>
            <input type="file" name="image" accept="image/*">
            <input type="hidden" name='id' value='<?php echo $id; ?>'>
            <input type="hidden" name='image' value='<?php echo $voiture['image'];} ?>'>
            <button type="submit" name="admin_action" id='suppr'value="suppr">Supprimer</button>
            <button type="submit" name="admin_action" value="modifier">Ajouter</button>
        </form>
    </div>
</div>
<script src="../js/close-popup.js"></script>
<link rel="stylesheet" href="../css/pop-up.css">
