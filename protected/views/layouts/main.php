<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>


    <!-- jQuery UI Bootstrap theme -->
    <link type="text/css" href="js/jquery-ui-bootstrap/css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />

    <!-- Bootstrap google prettify -->
    <link href="js/bootstrap/docs/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- UI to Top -->
    <link rel="stylesheet" type="text/css" media="screen,projection" href="js/jquery.ui.totop/css/ui.totop.css" />

    <!-- Datatables -->
    <link rel="stylesheet" href="js/DataTables/media/css/demo_table_jui.intenso.css" />

    <!-- Admin Instenso main scripts -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/side_nav.css" />

    <!-- Favorites and Appple touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>

<body id="main">

<!-- Top navigation bar -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="i-bar"></span>
                <span class="i-bar"></span>
                <span class="i-bar"></span>
            </a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            Messages <span class="label label-info">100</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Message 1</a></li>
                            <li><a href="#">Another message</a></li>
                            <li><a href="#">Something else message</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Older messages...</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            Settings
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Personal Info</a></li>
                            <li><a href="#">Preferences</a></li>
                            <li><a href="#">Alerts</a></li>
                            <li><a id="cookie_delete" href="#">Delete Cookies</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            Theme
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a id="lightblue" href="#">Light Blue</a></li>
                            <li><a id="darkblue" href="#">Dark Blue</a></li>
                            <li><a id="red" href="#">Red</a></li>
                            <li><a id="green" href="#">Green</a></li>
                            <li><a id="orange" href="#">Orange</a></li>
                            <li><a id="grey" href="#">Grey</a></li>
                            <li><a id="black" href="#">Black</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            Background
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a id="pattern01" href="#">Pattern 1</a></li>
                            <li><a id="pattern02" href="#">Pattern 2</a></li>
                            <li><a id="pattern03" href="#">Pattern 3</a></li>
                            <li><a id="pattern04" href="#">Pattern 4</a></li>
                            <li><a id="pattern05" href="#">Pattern 5</a></li>
                            <li><a id="pattern06" href="#">Pattern 6</a></li>
                            <li><a id="pattern07" href="#">Pattern 7</a></li>
                            <li><a id="pattern08" href="#">Pattern 8</a></li>
                            <li><a id="pattern09" href="#">Pattern 9</a></li>
                            <li><a id="pattern10" href="#">Pattern 10</a></li>
                            <li><a id="pattern11" href="#">Pattern 11</a></li>
                            <li><a id="pattern12" href="#">Pattern 12</a></li>
                            <li><a id="pattern13" href="#">Pattern 13</a></li>
                            <li><a id="pattern14" href="#">Pattern 14</a></li>
                            <li><a id="pattern15" href="#">Pattern 15</a></li>
                            <li><a id="pattern16" href="#">Pattern 16</a></li>
                            <li><a id="pattern17" href="#">Pattern 17</a></li>
                            <li><a id="pattern18" href="#">Pattern 18</a></li>
                        </ul>
                    </li>
                    <li><a href="#about">About</a></li>
                </ul>
                <p class="navbar-text pull-right">Logged in as <a href="#">admin</a></p>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>


<div class="container-fluid">
                <?php echo $content; ?>

<!--        <hr>

        <footer>
            <p>&copy; Company 2012</p>
        </footer>-->

    </div><!--/.fluid-container-->

    <script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>

    <!-- jQuery Cookie -->
    <script type="text/javascript" language="javascript" src="js/intenso/jquery.cookie.js"></script>

    <!-- Sherpa side nav -->
    <script type="text/javascript" language="javascript" src="js/intenso/jquery.hoverIntent.minified.js"></script>

    <!-- UI to Top -->
    <script type="text/javascript" language="javascript" src="js/jquery.ui.totop/js/jquery.ui.totop.js"></script>

    <!-- Bootstrap Scripts -->
<script type="text/javascript" language="javascript" src="js/bootstrap/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap/js/bootstrap-alert.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap/js/bootstrap-tab.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap/js/bootstrap-typeahead.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap/js/bootstrap-modal.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap/docs/assets/js/google-code-prettify/prettify.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" language="javascript" src="js/DataTables/media/js/jquery.dataTables.js"></script>

    <!-- Admin Intenso -->
    <script type="text/javascript" language="javascript" src="js/intenso/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" language="javascript" src="js/intenso/intenso.js"></script>

</body>
</html>
