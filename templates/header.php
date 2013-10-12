<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
   <meta charset="utf-8">

   <!-- Use the .htaccess and remove these lines to avoid edge case issues.
          More info: h5bp.com/b/378 -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

   <title>Gumby - A Flexible, Responsive CSS Framework - Powered by SASS</title>
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <meta name="author" content="humans.txt">

   <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

   <!-- Facebook Metadata /-->
   <meta property="fb:page_id" content="" />
   <meta property="og:image" content="" />
   <meta property="og:description" content=""/>
   <meta property="og:title" content=""/>

   <!-- Google+ Metadata /-->
   <meta itemprop="name" content="">
   <meta itemprop="description" content="">
   <meta itemprop="image" content="">

   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

   <!-- We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
       However, there is a blank style.css in the css directory should you prefer -->
   <link rel="stylesheet" href="/css/gumby.css">
   <!-- <link rel="stylesheet" href="css/style.css"> -->

   <script src="/js/libs/modernizr-2.6.2.min.js"></script>

  <link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>

<body>
   
   
      <div class="row navbar">
             <?php
               if(empty($user)) { ?>
                   

                    <div><a href="#" class="register">Register</a></div>

                     <div><a href="#" class="login">Login</a></div>
                <?php } ?>
            <?php
               if($user) { ?>
                     
                     <div><a href="/logout">Logout</a></div>
              <?php }
            ?>
            <a href="/">
               <img src="/img/logo.png" class="mylogo">
            </a>
      
      <div class="clear"></div>
        <div class="searchtext">Looking for something?</div> 
        <div class="clear"></div>
        <div class="append field searchfield">
                   
                     <input class="wide text input" type="email" placeholder="Find pictures!" value="Find pictures!">
                     <div class="medium primary btn"><a href="#">Go</a></div>
         </div>
            
        

   </div>

<!-- /header -->