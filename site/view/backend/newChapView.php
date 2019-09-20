<?php $title = "Nouveau chapitre"; ?>

<?php ob_start(); ?>

	<h1>Espace Client - Nouveau chapitre</h1>
		<div>
			<p><a href="index.php?action=showDash">Retour au menu</a></p>
			<div>
				<form action="index.php?action=createChapitre" method="post">
					<label for="title">Titre : </label>
					<input type="text" name="title" id="title" placeholder="Votre titre" size="80" /><br/>
					<textarea name="content" rows="40" cols="160"></textarea>
					<input type="submit" value="Poster" />
				</form>
			</div>
		</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>