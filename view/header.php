<!DOCTYPE html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JarKom - Belajar Komputer</title>
    <link rel="icon" href="../img/komputer.ico">

    <!-- sweetalert -->
    <link href="css/sweetalert.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <script src="jquery.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="view/style.css" rel="stylesheet">
  </head>



  <body>

  <nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
      <a href="#" class="navbar-brand jarkom" style="color:white">JarKom</a>
    </div>

    <div class="collapse navbar-collapse" id="target-list">
      <ul class="nav navbar-nav">
        <li><a href="index.php" class="Home"><b>Home</b></a></li>
        <li><a href="komputer.php" class="Komputer"><b>Komputer</b></a></li>
        <li><a href="technews.php" class="TechNews"><b>Tech News</b></a></li>
        <li><a href="tipstrik.php" class="Tips"><b>Tips & trik</b></a></li>
        <li>
          <a href="add.php" class="Tambah"><b>Tambah</b> &nbsp; <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        </li>
        <li><a href="loginadmin.php" class="Login"><b>Login</b></a></li>
        <li><a href="logout.php" class="Logout"><b>Logout</b></a></li>
      </ul>

        </div>
  </nav>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


  </body>

</html>

<style type="text/css">
    .navbar-inverse {
    z-index: 1000;
    position: fixed;
    width: 100%;
    background-color: #77b8d5;
    border-radius: 0;
    border: 0;
    }
    .ubah{
      font-size: 30px;
    }
</style>


<script>
  $('.jarkom').click(function(){
    $('.jarkom').toggleClass('ubah');

    event.preventDefault();
  });
</script>
