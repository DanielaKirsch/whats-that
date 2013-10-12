<? require 'header.php' ?>


<?if(!empty($error)):?>
<p class="error"><?=$error?></p>
<?endif;?>



<div class="row">
      <div class="three columns">
            <form action="/api/createUser" method="POST">
    			<ul>
    				<li class="field">
		              <label class="inline" for="name">Name</label>
		              <input class="name input" type="text" name="name" id="name" value="" placeholder="Name" />
		            </li>
    				<li class="field">
		              <label class="inline" for="email">Email</label>
		              <input class="email input" type="text" name="email" id="email" value="" placeholder="Email" />
		            </li>
		            <li class="field">
		              <label class="inline" for="password">Password</label>
		              <input class="password input" type="password" name="password" id="password" placeholder="Password" />
		            </li>
    			 	<li>
              			<div class="medium default btn"><input type="submit" value="Login" /></div>
          		 	</li>
          		</ul>
    		</form>
      </div>
      <div class="nine columns">
        
      </div>
</div>



<? require 'footer.php' ?>