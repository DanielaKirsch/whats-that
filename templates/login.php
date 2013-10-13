<? require 'header.php' ?>

<div class="modal" id="modalbadges">
    <div class="content">
      <a class="close switch active" gumby-trigger="|#modal1"><i class="icon-cancel"></i></a>
      <div>
       
        <img src="/img/badges.png">
       
      </div>
    </div>
  </div>


<div class="modal" id="modal1">
    <div class="content">
      <a class="close switch active" gumby-trigger="|#modal1"><i class="icon-cancel"></i></a>
      <div>
        <div>
          <h1>Do you know what this is?</h1>

        </div>
        <div class="ten columns centered text-center">
          
        </div>
        

        <div class="field">
          <h2>Yes, I know the answer</h2>
            <input type="text" id="wikipedia" class="text input" />
            
            <form action="/api/updatePicture" method="POST">
            <div class="wikipedia-tag">
              <div class="some_text">Is this a</div>
                    <div class="the_value"></div>
                    <div class="some_text">?</div>
                    <input type="hidden" name="tagged_pid" id="tagged_pid" value="" />
                    <input type="hidden" name="tagged_title" id="tagged_title" value="" />
                 <div class="clear"></div>
                    <input type="submit" value="Yeah!" class="yeah" />

               
                    
            </div>
             </form>
        </div>
        <div class="search output">
          <ul>

          </ul>
        </div>
        <div id="result"></div>

      </div>
    </div>
  </div>
  
  <div class="modal" id="loginmodal">
    <div class="content">
      <a class="close switch active" gumby-trigger="|#modal1"><i class="icon-cancel"></i></a>
      <div class="row">
        <div class="ten columns centered text-center">
          <h2>Login</h2>
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
      </div>
    </div>
  </div>


  <div class="modal" id="uploadmodal">
    <div class="content">
      <a class="close switch active" gumby-trigger="|#modal1"><i class="icon-cancel"></i></a>
      <div class="row">
        <div class="ten columns centered text-center">
        
        
  <h1 class="lead">Upload your photo</h1>
  
    
    <form action="/api/upload" method="POST" enctype="multipart/form-data">
    
          <ul>
          
            <li class="field">
              
              <input class="file input" type="file" name="uploadfile" id="uploadfile" value="" placeholder="File upload" />
            </li>
            <li class="field">
             
              <div class="picker">
                <select name="category">
                  <option>Thing</option>
                  <option>Trees</option>
                  <option>Cats</option>
                  <option>Dogs</option>
                  <option>Tools</option>
                   <option>Cars</option>
                 
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
    </div>
  </div>


<div class="row whatisit"> 
  <h1 class="lead">Do you know what these things are?</h1>
  <div class="row">
    <span class="thefilter">Select a category:</span>

    <ul id="filters">
      <li><a href="#" data-filter="*" class="all active">show all</a></li>
      <li><a href="#" data-filter=".Dogs" class="dogs">Dogs</a></li>
      <li><a href="#" data-filter=".Cats" class="cats">Cats</a></li>
      <li><a href="#" data-filter=".Trees" class="trees">Trees</a></li>
      <li><a href="#" data-filter=".Thing" class="thing">Thing</a></li>
      <li><a href="#" data-filter=".Tools" class="tools">Tools</a></li>
      <li><a href="#" data-filter=".Cars" class="cars">Cars</a></li>
    </ul>

    
  </div>
</div>



<div class="row" id="allpictures"> </div>







<div class="uploadfooter">
  <div class="row">
    <div class="lead newlead">Tell me what this is!</div>
    <div class="belowlead">Upload a picture of something you don't know and get an answer</div>

    <a href="#" class="uploadpicture"></a>
  </div>
</div>

<? require 'footer.php' ?>