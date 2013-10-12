<? require 'header.php' ?>

<?if(!empty($error)):?>
<p class="error"><?=$error?></p>
<?endif;?>

<p class="small">Hint: brian@nesbot.com / aaaa</p>

<div class="row">
      <div class="three columns">
        <form action="/login" method="POST">
			<ul>
				<li class="field"><input class="text input" type="text" placeholder="Text input" /></li>
				<li class="field"><input class="email input" type="email" placeholder="Email input" /></li>
			</ul>
		</form>
      </div>
      <div class="nine columns">
        
      </div>
</div>



<form action="/login" method="POST">
  <p>Email: <input type="text" name="email" id="email" value="<?=$email_value?>" /> <span class="error"><?=$email_error?></span></p>
  <p>Password: <input type="password" name="password" id="password" /> <span class="error"><?=$password_error?></span></p>
  <p><input type="submit" value="Login" />
</form>

<?if(!empty($urlRedirect)):?>
<p class="small">(You will redirect to "<?=$urlRedirect?>" upon login)</p>
<?endif;?>

<? require 'footer.php' ?>