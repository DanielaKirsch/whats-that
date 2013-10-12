<? require 'header.php' ?>

<div class="row">	
	<h1 class="lead">Hello</h1>
	<div class="row">
		<p>Hello Index!</p>
	</div>
</div>


<?if (!empty($user)):?>
<p>Hi <?=$user?>
<?endif;?>

<? require 'footer.php' ?>