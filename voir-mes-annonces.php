<?php require_once('testAdmin.php') ?>
<?php require_once('bib/header.inc.php') ?>
<h1>Ajouter un livre</h1>

<form action="productAdd2.php" method="post" id="ajout">
	<p><label for="titre">Le titre</label><input type="text" name="titre" id="titre" required="required"></p>
	<p><label for="pass">L'auteur<br><a href="auteurAdd.php">Ajouter</a></label>
<?php 
//récup des auteurs

$query = "SELECT * FROM auteurs ORDER BY nom ASC";

$result = $connectPDO->query($query);

if($result->rowCount()>0){ ?>
<select name="id_a">
	<?php 
		while( $ligne = $result->fetch(PDO::FETCH_OBJ)) {
 			echo '<option value='.$ligne->id.'>'.$ligne->nom.'</option >'; 
 		}//fin while
	 ?>


</select>

<?php } // fin if
else{
	echo '-';
}
 ?>



	</p>
	<p><label for="mail">Le résumé</label><textarea name="resume"></textarea></p>
	<p><label for="stock">Le stock</label><input type="text" name="stock" id="stock" required="required"></p>
	<p><label for="prix">Le prix</label><input type="text" name="prix" id="prix" required="required"></p>
	<p><input type="reset"> <input type="submit" value="ajouter" name="submit" id="submit"></p>

</form>

<?php require_once('bib/footer.inc.php') ?>