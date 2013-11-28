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
            <div class="eight columns">
                <!--<img class="logo-md" src="images/MdR-Logotype_Orange.svg" onerror="this.onerror=null; this.src='images/MdR-Logotype_Orange.png'">-->
                <img class="logo-md" src="images/m-inside-logo.png" />
            </div>

            <div class="four columns l-search-box">
                <div class="search-form">
                    <input class="search-bar" type="text" placeholder="Search" name="s" id="s" />
                    <div class="boxed-icon-sm"><i class="fa fa-search"></i></div>
                </div>
            </div>
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