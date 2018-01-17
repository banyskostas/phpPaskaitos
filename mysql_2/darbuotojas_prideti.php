<?php
require_once('mysql.php');
require_once('positions.php');

const ACTION_EDIT = 1;

$userGetSuccess = false;

// Insert new
if (count($_POST)) {

    switch ($_POST['action']) {
        case ACTION_EDIT:
            if (isset($_GET['user'])) {
                // Insert to DB
                $query = 'UPDATE users SET ';
                //INSERT INTO customer_sales_values SET first_name='Charles', surname='Dube' , value=0;
                $counter = 1;
                foreach ($_POST as $key => $val) {
                    if ($key == 'action') {
                        $counter++;
                        continue;
                    }
                    if (strlen($val)) {
                        $query .= $key . "='" . $val . "'";
                    }

                    if ($counter < count($_POST)) {
                        $query .= ", ";
                    }
                    $counter++;
                }

                $query .= ' WHERE id = ' . $_GET['user'];
            }
            break;
        default:
// Insert to DB
            $query = 'INSERT INTO users SET ';
            //INSERT INTO customer_sales_values SET first_name='Charles', surname='Dube' , value=0;
            $counter = 1;
            foreach ($_POST as $key => $val) {
                if (strlen($val)) {
                    $query .= $key . "='" . $val . "'";
                }

                if ($counter < count($_POST)) {
                    $query .= ", ";
                }
                $counter++;
            }

    }

    // Actual insert
    $db = connect();

    var_dump($query);

    if (!$db->query($query)) {
        if ($error = mysqli_error($db)) {
            var_dump($error);
        }
    }
}

// Update
if (count($_GET)) {
    if (isset($_GET['user'])) {
        $user = getOne('SELECT * FROM users WHERE id = ' . htmlentities($_GET['user']));

        if (is_array($user)) {
            $userGetSuccess = true;
        }
    }

}

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
<style type="text/css">
td {
	vertical-align: middle !important;
}
</style>

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Baltic Talents</a>
			</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="statistika.php">Įmonės statistika</a></li>
				</ul>


			</div>
		</div>
	</nav>

	<div class="container" id="content" tabindex="-1">
		

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading">Naujas darbuotojas:</div>

					<div class="panel-body">


						    <form action="darbuotojas_prideti.php<?php echo (isset($_GET['user']) ? '?user=' . $_GET['user'] : '');?>" method="post">
                                <?php if ($userGetSuccess) { ?>
                                <input type="hidden" name="action" value="<?php echo ACTION_EDIT; ?>">
                                    <?php } ?>
								
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<label for="vardas">Vardas</label> 
								<input name="name" type="text" class="form-control" id="vardas" placeholder="Vardas" value="<?php echo $userGetSuccess ? $user['name'] : ''?>">
							</div>
							<div class="form-group">
								<label for="pavarde">Pavardė</label> 
								<input name="surname" type="text" class="form-control" id="pavarde" placeholder="Pavarde" value="<?php echo $userGetSuccess ? $user['surname'] : ''?>">
							</div>
							<div class="form-group">
								<label for="lytis">Lytis</label> 
								<select name="gender" id="lytis" class="form-control">
									<option value="1">Vyras</option>
									<option value="2">Moteris</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tel">Telefonas</label>
								<input name="mobile_nr" type="text" class="form-control" id="tel" placeholder="Telefonas" value="<?php echo $userGetSuccess ? $user['mobile_nr'] : ''?>">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label for="pareigos">Pareigos</label> 
								<select name="position" id="pareigos" class="form-control">
									<option value="<?php echo $positions[POSITION_DIRECTOR]['id'];?>" <?php echo $userGetSuccess ? ($user['position'] == POSITION_DIRECTOR ? 'selected' : '') : ''?>><?php echo $positions[POSITION_DIRECTOR]['title'];?></option>
									<option value="<?php echo $positions[POSITION_PROGRAMMER]['id'];?>" <?php echo $userGetSuccess ? ($user['position'] == POSITION_PROGRAMMER ? 'selected' : '') : ''?>><?php echo $positions[POSITION_PROGRAMMER]['title'];?></option>
									<option value="<?php echo $positions[POSITION_CLEANER]['id'];?>" <?php echo $userGetSuccess ? ($user['position'] == POSITION_CLEANER ? 'selected' : '') : ''?>><?php echo $positions[POSITION_CLEANER]['title'];?></option>
								</select>
							</div>
							<div class="form-group">
								<label for="issilavinimas">Išsilavinimas</label>
								<input name="education" type="text" class="form-control" id="issilavinimas" placeholder="Išsilavinimas" value="<?php echo $userGetSuccess ? $user['education'] : ''?>">
							</div>
							
							<div class="form-group">
								<label for="issilavinimas">Atlyginimas</label>
								<input name="salary" type="text" class="form-control" id="issilavinimas" placeholder="Atlyginimas" value="<?php echo $userGetSuccess ? $user['salary'] : ''?>">
							</div>
							
							</div>
							<div class="clearfix"></div>
								<div class="col-md-12">
								<input type="submit" class="btn btn-primary" value="Pridėti">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>


	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>