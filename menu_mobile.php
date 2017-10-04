 <style type="text/css">


   body,html{
    height: 100%;
  }

  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  .main{
    padding: 10px 10px 0 10px;
  }

 @media (min-width: 765px) {

    .main{
      position: absolute;
      width: calc(100% - 40px); 
      margin-left: 40px;
      float: right;
    }

    nav.sidebar:hover + .main{
      margin-left: 200px;
    }

    nav.sidebar.navbar.sidebar>

    .container .navbar-brand, .navbar>

    .container-fluid .navbar-brand {
      margin-left: 0px;
    }

    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
    }
    
    nav.sidebar a{
      padding-right: 13px;
    }

    nav.sidebar .navbar-nav >

     li:first-child{
      border-top: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav >

     li{
      border-bottom: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }

    .navbar-inverse .navbar-nav .open .dropdown-menu>

    li>

    a {
      color: #777;
    }

    nav.sidebar{
      width: 200px;
      height: 100%;
      margin-left: -160px;
      float: left;
      margin-bottom: 0px;
    }

    nav.sidebar li {
      width: 100%;
    }

    nav.sidebar:hover{
      margin-left: 0px;
    }

    .forAnimate{
      opacity: 0;
    }
  }
   
  @media (min-width: 1330px) {

    .main{
      width: calc(100% - 200px);
      margin-left: 200px;
    }

    nav.sidebar{
      margin-left: 0px;
      float: left;
    }

    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }

  nav.sidebar .navbar-nav .open .dropdown-menu>

  li>

  a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>

  li>

  a:focus {
    color: #CCC;
    background-color: transparent;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }
  
 

 </style>





<!-- //////////////////////////////////////////////////////////////////////////////////// -->



<div class="container">

    <img id="photobanner" class="img-responsive" src="photo/topbanner.jpg" alt="top-banner">

</div>
<?php
  if(!isset($_SESSION['clef_de_session'])){
?>
 <nav class="navbar navbar-default sidebar" role="navigation">
          <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
              <span class="sr-only">
              Toggle navigation</span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="./" style="color:black;">
                Acceuil<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home">
              </span>
            </a>
            </li>
            <li class="">
                <a href="?entreprise" style="color:white">
                Entreprise<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home">
              </span>
            </a>
            </li>
              <li class="dropdown">
                <a data-toggle="dropdown" style="color:white">
                  Produits <span class="caret">
                </span>
                <ul class="dropdown-menu">
                <li class="">
                  <a href="?galerie_tout" style="color:white">
                    Tous les produits<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?galerie_gluten" style="color:white">
                  Au-delà du blé<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
            </li> <li class="">
                <a href="?galerie_vegan" style="color:white">
                Vegan<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"> </span></a>
            </li>
                </ul>
                <li class="">
                  <a href="?contact" style="color:white">
                    Contact<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
               
                <li class="">
                  <a href="?connexion" style="color:white">
                    Connexion<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user">
                </span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
<?php
  }elseif($_SESSION['idrole'] ==1){
?>  
          <nav class="navbar navbar-default sidebar" role="navigation">
          <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
              <span class="sr-only">
              Toggle navigation</span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="./" style="color:black;">
                Acceuil<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home">
              </span>
            </a>
            </li>
            <li class="">
                <a href="?entreprise" style="color:white">
                Entreprise<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home">
              </span>
            </a>
            </li>
              <li class="dropdown">
                <a data-toggle="dropdown" style="color:white">
                
                  Produits <span class="caret">
                </span>
                <ul class="dropdown-menu">
                <li class="">
                  <a href="?galerie_tout" style="color:white">
                    Tous les produits<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?galerie_gluten" style="color:white">
                  Au-delà du blé<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
            </li> <li class="">
                <a href="?galerie_vegan" style="color:white">
                Vegan<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"> </span></a>
            </li>
                </ul>
                <li class="">
                  <a href="?order" style="color:white">
                    Réservations clients<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?action=insert" style="color:white">

                   Insertion<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?action=deco" style="color:white">
                    Déconnexion<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user">
                </span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<?php
  }else{
    ?>
        <nav class="navbar navbar-default sidebar" role="navigation">
          <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
              <span class="sr-only">
              Toggle navigation</span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="./" style="color:black;">
                Acceuil<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home">
              </span>
            </a>
            </li>
            <li class="">
                <a href="?entreprise" style="color:white">
                Entreprise<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home">
              </span>
            </a>
            </li>
              <li class="dropdown">
                <a data-toggle="dropdown" style="color:white">
                
                  Produits <span class="caret">
                </span>
                <ul class="dropdown-menu">
                <li class="">
                  <a href="?galerie_tout" style="color:white">
                    Tous les produits<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?galerie_gluten" style="color:white">
                  Au-delà du blé<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
            </li> <li class="">
                <a href="?galerie_vegan" style="color:white">
                Vegan<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"> </span></a>
            </li>
                </ul>
                <li class="">
                  <a href="?contact" style="color:white">
                    Contact<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?commande" style="color:white">
                    Réservation<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?order" style="color:white">
                    Vos réservations<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <li class="">
                  <a href="?action=deco" style="color:white">
                    Déconnexion<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                  </a>
                </li> 
                <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user">
                </span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <?php
  }
?>
