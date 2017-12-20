<?php
    require_once('data/pool.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Baltic Talents</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Baltic Talents</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Nuoroada 1</a></li>
        <li><a href="#">Nuoroada 2</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sub nuoroda <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Sum meniu 1</a></li>
            <li><a href="#">Sum meniu 2</a></li>
          </ul>
        </li>
      </ul>
      
      
    </div>
  </div>
</nav>

<div class="container" id="content" tabindex="-1">
<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Apklausos</div>
	
	  <!-- Table -->
	  <table class="table">
	   	<tr>
	   		<th>Klausimas</th>
	   		<th>Viso atsakymų</th>
	   		<th>Veiksmai</th>
	   	</tr>
	   	
	   	<tr>
<!--	   		<td>Jeigu būtų Seimo rinkimai, už kurį kandidatą balsuotumėte, jeigu jie keltų savo kandidatūras</td>-->
<!--	   		<td>215</td>-->
<!--	   		<td><a href="" class="btn btn-primary" >Rodyti atsakymus</a></td>-->

            <?php
            foreach ($m_polls as $item) {
                $count = 0;
                foreach ($answers as $answer) {
                    if ($answer['poll_id'] == $item['id']) {
                        $count += intval($answer['total_votes']);
                    }
                }
                echo '<tr><td>'.$item['question'].'</td><td>'.$count.'</td><td><a href="atsakymai.php?id='.$item['id'].'" class="btn btn-primary" >Rodyti atsakymus</a></td></tr>';
            }
            ?>
	   		
	   	</tr>
	   	
	  </table>
	</div>
	</div>
</div>




</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>



