<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Welcome to Foundation</title>

    <!-- Included CSS Files -->
    <link rel="stylesheet" href="stylesheets/app.css">

    <script src="javascripts/foundation/modernizr.foundation.js"></script>

    <script src="javascripts/plugins/css3-mediaqueries.js"></script>

</head>

<body id="page" class="off-canvas hide-extras">
    
  <div class="container">


    <header id="header" class="row">

        <!-- App Navbar -->
        <div class="show-for-small app-navbar">
          <div class="navbar-search">
                  <div class="navbar-search-bar"><input type="text" placeholder="Search..."></div>
                  <div class="navbar-search-search"><i class="fa fa-search"></i></div>
                  <div class="navbar-search-close"><i class="fa fa-times"></i></div>
          </div>
          <a class="btn-navbar-menu" id="sidebarButton" href="#sidebar">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
          </a>

          <div class="navbar-logo">
              <div class="navbar-logo-va">
                <img src="images/MdR-Logotype_Orange.svg" onerror="this.onerror=null; this.src='images/MdR-Logotype_Orange.png'">
              </div>
          </div>

          <div class="btn-navbar-search" id="sidebarSearch"><i class="fa fa-search"></i></div>
        </div>
        <!-- App Navbar End-->

        <!-- Large Screen Header -->
        <div class="hide-for-small l-header-large">
            <div class="four columns">
                <!--<img class="logo-md" src="images/MdR-Logotype_Orange.svg" onerror="this.onerror=null; this.src='images/MdR-Logotype_Orange.png'">-->
                <img class="logo-md" src="images/logo-edge.png" />
            </div>
            <div class="eight columns">
                <img class="edge-strap" src="images/LogoTheEdgeStrap.png" />
            </div>

            <!--
            <div class="four columns l-search-box">
                <div class="search-form">
                    <input class="search-bar" type="text" placeholder="Search" name="s" id="s" />
                    <div class="boxed-icon-sm"><i class="fa fa-search"></i></div>
                </div>
            </div>
            -->
        </div> 
        <!-- Large Screen Header End -->

        <!-- Large Screen Navigation -->
        <div class="twelve columns phone-two hide-for-small">
            <nav id="menu" class="l-top-nav" role="navigation">
                <ul id="mainNav">
                    <li><a data="is-current" href="index.php">Home</a></li>
                    <li><a href="code.php">Code</a></li>
                    <li><a href="edge.php">Edge</a></li>
                </ul>
            </nav>
        </div>
        <!-- Large Screen Navigation End -->

    </header>



<div class="row"><!-- a row to wrap the offcanvas content -->
    <section role="main">



<div class="row">
    <div class="eight columns">
        <article class="l-article">
            <h2>The Edge Otober</h2>
            <ul class="postmetadata">
                <li clsss="date"><i class="fa fa-clock-o"></i><time>1<sup>st</sup> November, 2013</time></li>
                <li><i class="fa fa-tag"></i>Tags: <a href="#">London</a>, <a href="#">Conference</a>, <a href="#">Food</a></li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </article>

        <article class="l-article">
            <table class="twelve">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Text</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong class="swatch-0">Name Surname</strong></td>
                  <td>who joined Human Resources as an L&D Administrator (18 September)</td>
                </tr>
                <tr>
                  <td><strong class="swatch-0">Name Surname</strong></td>
                  <td>who joined Human Resources as an L&D Administrator (18 September)</td>
                </tr>
                <tr>
                  <td><strong class="swatch-0">Name Surname</strong></td>
                  <td>who joined Human Resources as an L&D Administrator (18 September)</td>
                </tr>
              </tbody>
            </table>
        </article>
    </div>

    <div class="four columns">
        <div class="l-sidebar-item">
            <div class="panel-list">
                <ul>
                            <li>
                                <h2>Sidebar panel</h2>
                                <h3>Latest news item</h3>
                                <p>Intro copy for latest news and link to full article if needed.</p>
                                <hr>
                            </li>

                            <li>
                                <h3>Latest news item</h3>
                                <p>Intro copy for latest news and link to full article if needed.</p>
                                <hr>
                            </li>

                            <li>
                                <h3>Latest news item</h3>
                                <p>Intro copy for latest news and link to full article if needed.</p>
                                <hr>
                            </li>
                </ul>
            </div>
        </div><!-- sidebar-item -->
        <div class="l-sidebar-item">
                        <div class="panel teaser">
                                        <div class="flexslider-sidebar">
                        <div class="flex-viewport" style="overflow: hidden; position: relative;"></div>

                        <ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul><div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1600%; transition: 0.6s; -webkit-transition: 0.6s; -webkit-transform: translate3d(-789px, 0, 0);"><li class="clone" aria-hidden="true" style="width: 263px; float: left; display: block;"><h3><a href="http://www.mishcon.com/enlighten">Mishcon Enlighten</a></h3>
                        <p>Knowledge is the most important currency in business today.</p>
                        <p class="followus"><a href="http://www.mishcon.com/enlighten/">Visit Mishcon Enlighten »</a></p></li><li class="clone" aria-hidden="true" style="width: 263px; float: left; display: block;"><h3><a href="http://businessshapers.co.uk">Business Shapers</a></h3>
                        <p>Sharing and celebrating the knowledge, innovation and creativity that is shaping the business world.</p>
                        <p class="followus"><a href="http://businessshapers.co.uk">Visit Business Shapers »</a></p></li>

                        <li class="" style="width: 263px; float: left; display: block;"><h3><a href="http://www.mishcon.com/enlighten">Mishcon Enlighten</a></h3>
                        <p>Knowledge is the most important currency in business today.</p>
                        <p class="followus"><a href="http://www.mishcon.com/enlighten/">Visit Mishcon Enlighten »</a></p></li><li style="width: 263px; float: left; display: block;" class="flex-active-slide"><h3><a href="http://www.mishcon.com/enlighten">Lawfully Chic</a></h3>
                        <p>A blog for art-lovers and adventurers, fashionistas and culture vultures, who believe in fair play, fair trade and fair travel.</p>
                        <p class="followus"><a href="http://lawfullychic.com/">Visit Lawfully Chic »</a></p></li>

                        <li style="width: 263px; float: left; display: block;" class=""><h3><a href="http://businessshapers.co.uk">Business Shapers</a></h3>
                        <p>Sharing and celebrating the knowledge, innovation and creativity that is shaping the business world.</p>
                        <p class="followus"><a href="http://businessshapers.co.uk">Visit Business Shapers »</a></p></li>


                          <li class="clone" aria-hidden="true" style="width: 263px; float: left; display: block;"><h3><a href="http://www.mishcon.com/enlighten">Mishcon Enlighten</a></h3>
                        <p>Knowledge is the most important currency in business today.</p>
                        <p class="followus"><a href="http://www.mishcon.com/enlighten/">Visit Mishcon Enlighten »</a></p></li><li class="clone" aria-hidden="true" style="width: 263px; float: left; display: block;"><h3><a href="http://businessshapers.co.uk">Business Shapers</a></h3>
                        <p>Sharing and celebrating the knowledge, innovation and creativity that is shaping the business world.</p>
                        <p class="followus"><a href="http://businessshapers.co.uk">Visit Business Shapers »</a></p></li></ul></div><ol class="flex-control-nav flex-control-paging"><li><a>1</a></li><li><a>2</a></li><li><a>3</a></li><li><a>4</a></li><li><a>5</a></li><li><a>6</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul>
                        </div>          
                        </div>
        </div>

        <div class="l-sidebar-item">
            <div class="panel">
                <h3>Archives</h3>
                <ul class="no-list">
                    <li><a href="#">Month</a></li>
                    <li><a href="#">Month</a></li>
                    <li><a href="#">Month</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="six columns">
        <article class="l-article">
                <ul class="accordion">
                  <li class="active">
                    <div class="title">
                      <h5>Accordion Panel 1</h5>
                    </div>
                    <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                  </li>
                  <li>
                    <div class="title">
                      <h5>Accordion Panel 2</h5>
                    </div>
                    <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                  </li>
                  <li>
                    <div class="title">
                      <h5>Accordion Panel 3</h5>
                    </div>
                    <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                  </li>
                </ul>
        </article>
    </div>

    <div class="six columns">
        <div class="l-article">
            <div class="panel">
                <img src="http://placehold.it/700x250" />
            </div>

            <div class="panel">
                <img src="http://placehold.it/700x250" />
            </div>

            <div class="panel">
                <img src="http://placehold.it/700x250" />
            </div>
        </div>
    </div>
</div>


<!-- Social Media
    ______________________________________________________
-->

<div class="row">
    <div class="twelve columns">
        <div class="social-media-box">
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
        <a class="addthis_button_email"></a>
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_linkedin"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_google_plusone_share"></a>
        </div>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-52569a311a08252e"></script>

            <!-- AddThis Button END -->
            <script type="text/javascript">
                var addthis_share = {
                    templates : {
                        twitter : "{{title}} {{url}}  @Mishcon Graduates"
                    }
                }
            </script>
        </div>
    </div>
</div>


<?php include("footer.php"); ?>