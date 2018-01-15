<?php
require_once('mysql.php');
require_once('positions.php');
require_once('taxCalculator.php');

$alert = null;
$user = null;


if (isset($_GET['user'])) {
    $users = get('SELECT * FROM users WHERE `id` = ' . (int)htmlentities($_GET['user']));

    if (!is_array($users)) {
        $alert = $users;
    } else {
        $user = isset($users[0]) ? $users[0] : null;

        // Position
        $position = '-';
        if ($tempPosition = getPositionByID($user['position'], $positions)) {
            $position = $tempPosition['title'];
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
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
.curr {
	text-align: right;
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
            <?php
                if (!$user) {
            ?>
                    <!-- BEGIN ALERTS-->
                    <div class="alert alert-danger <?php echo (!$alert)? 'hidden' : '' ;?>">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $alert;?>
                            </div>
                        </div>
                    </div>
                    <!-- END ALERTS-->
            <?php
            } else {
                    ?>

                    <div class="col-md-12">
                        <div class="page-header">
                            <h1><?php echo $user['name'] . ' ' . $user['surname']; ?></h1>
                        </div>


                    </div>

                    <div class="col-md-6">

                        <p>
                            <b>Pareigos: </b> <br/> <?php echo $position; ?>
                        </p>
                        <p>
                            <b>Mėnesinė alga: </b> <br/><?php echo number_format($user['salary'], 2); ?> EUR
                        </p>

                    </div>
                    <div class="col-md-6">

                        <p>
                            <b>Telefonas: </b> <br/> <?php echo $user['mobile_nr']; ?>
                        </p>


                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">

                        <div class="panel panel-primary">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Mokesčiai</div>


                            <table class="table  table-hover">

                                <tr>
                                    <td>Priskaičiuotas atlyginimas „ant popieriaus“:</td>
                                    <td class="curr"><?php echo number_format($user['salary'], 2); ?> EUR</td>


                                </tr>
                                <tr>
                                    <td>Pritaikytas NPD</td>
                                    <td class="curr"><?php echo number_format(getNPD(), 2); ?>  EUR</td>


                                </tr>
                                <tr>
                                    <td>Pajamų mokestis <?php echo getIncomeTax() * 100; ?>%</td>
                                    <td class="curr"><?php echo number_format(calcIncomeTax($user['salary']), 2); ?> EUR</td>
                                </tr>
                                <tr>
                                    <td>Sodra. Sveikatos draudimas <?php echo getHealthInsurance() * 100; ?>%</td>
                                    <td class="curr"><?php echo number_format(calcHealthInsurance($user['salary']), 2); ?> EUR</td>



                                </tr>
                                <tr>
                                    <td>Sodra. Pensijų ir soc. draudimas <?php echo getSocialInsurance() * 100; ?> %</td>
                                    <td class="curr"><?php echo number_format(calcSocialInsurance($user['salary']), 2); ?> EUR</td>



                                </tr>

                                <tr class="info">
                                    <td>Išmokamas atlyginimas „į rankas“:</td>
                                    <td class="curr"><b><?php echo number_format(calcSalaryAfterTaxes($user['salary']), 2); ?> EUR</b></td>

                                </tr>

                                <tr>
                                    <td colspan="2"><b>Darbo vietos kaina</b></td>
                                </tr>

                                <tr>
                                    <td>Sodra <?php echo getSodra() * 100; ?>%:</td>
                                    <td class="curr"><?php echo number_format(calcSodra($user['salary']), 2); ?> EUR</td>

                                </tr>

                                <tr>
                                    <td>Įmokos į garantinį fondą <?php echo getPaymentToWarrantyFund() * 100; ?>% :</td>
                                    <td class="curr"><?php echo number_format(calcPaymentToWarrantyFund($user['salary']), 2); ?> EUR</td>


                                </tr>
                                <tr class="info">
                                    <td>Visa darbo vietos kaina :</td>
                                    <td class="curr"><b><?php echo number_format(calcPositionPriceTotal($user['salary']), 2); ?> EUR</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <?php
                }
            ?>
			
		</div>
		
	</div>



	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>