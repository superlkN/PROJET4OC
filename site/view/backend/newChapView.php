<?php $title = "Nouveau chapitre"; ?>

<?php ob_start(); ?>

<script>
	tinymce.init({
		selector: '#textarea2',
		height:500,
		forced_root_block : false,
		force_br_newlines : true,
		force_p_newlines : false,
		
	});
</script>
	<div class="headerDash">
		<h1>Espace Client - Nouveau chapitre</h1>
		<ul>
			<li><a href="index.php?action=showDash">Dashboard</a></li>
			<li> <a href="index.php"> Blog </a> </li>
		</ul>
	</div>
	<div class="container">
		<div>
			<form action="index.php?action=createChapitre" method="post">
				<label for="title">Titre : </label>
				<input class="titleNewChap" type="text" name="title" id="title" placeholder="Votre titre" size="80" /><br/>
				<textarea id="textarea2" name="content" rows="" cols=""></textarea>
				<input class="button1" id="submitNew" type="submit" value="Poster" />
			</form>
		</div>
	</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>