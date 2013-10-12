<? require 'header.php' ?>

<?if(!empty($error)):?>
<p class="error"><?=$error?></p>
<?endif;?>

<div class="row"> 
  <h1 class="lead">Hey! Wonderful you're here!</h1>
  <div class="row">
    <p>Please login</p>
  </div>
</div>

<div class="row">
      <div class="three columns">
            <form action="/" method="POST">
    			<ul>
    			
    				<li class="field">
              <label class="inline" for="email">Email</label>
              <input class="email input" type="text" name="email" id="email" value="<?=$email_value?>" placeholder="Email" />
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

<div class="row"> 
  <h1 class="lead">Upload your photo</h1>
  <div class="row">
    
    <form action="/api/upload" method="POST" enctype="multipart/form-data">
    
          <ul>
          
            <li class="field">
              
              <input class="file input" type="file" name="uploadfile" id="uploadfile" value="" placeholder="File upload" />
            </li>
            <li class="field">
             
              <div class="picker">
                <select name="category">
                  <option>Thingy</option>
                  <option>Tree</option>
                  <option>Cats</option>
                </select>
              </div>

            </li>
           <li>
              <div class="medium default btn"><input type="submit" value="Upload" /></div>
           </li>
          </ul>
      </form>


  </div>

</div>




<? require 'footer.php' ?>