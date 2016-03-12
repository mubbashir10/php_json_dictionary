<?php

	//reading JSON file
	$str = file_get_contents('data.json');
	
	//deconding JSON data
	$data = json_decode($str, true); 

?>
<!--html-->
<!doctype html>
<html lang="en">

	<!--meta information-->
	<head>
		<title>My WorkSpace</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" type="image/png" href="images/logo.png">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/skeleton.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>

	<!--content-->
	<body>

		<!--header-->
	    <header>
	    	<div class="container">
	    		<div class="row">
					<div class="nine columns">
						<h5 style="font-weight:bold;"><span style="color:#35bcf2;"><i class="fa fa-book"></i></span> web dictionary</h5>
					</div>
			    </div>	
			</div>    	
	    </header>


	    <!--search form-->
		<div class="wrapper">
			<div class="row">
				<div class="twelve columns"><h6 class="margin-top-max">Enter the word whose meaning you would like to know and then hit enter!</div></h6>
			</div>
			<div class="row">
				<form method="post" action="">
					<div class="seven columns">
						<input class="u-full-width" type="text" placeholder="enter search term..." name="query" id="exampleEmailInput" required>
					</div>
			    	<div class="five columns">
						<button name="searchBtn"><i class="fa fa-search"></i>&nbsp;&nbsp;Search Word</button>
					</div>
				</form>	
			</div>
		</div>


	   <!--results-->
		<div class="container">	

			<div class="row margin-top-mid margin-bottom-mid">

				<?php

					//when submit button is pressed
					if(isset($_POST['searchBtn'])){

						//getting search term
						$query = $_POST['query'];

						//getting number of results
						$result = 0;

						//if query is not empty
						if($query!==""){


							//searching
							foreach ($data as $key => $value) {

								//if match is not found then do nothing
								if (stripos($key, $query) === false){

								}
								//otherwise
								else{

									//counting result
								    $result ++;

								}

							}


							//results summary
							if($result>0){

								$html='<span class="margin-bottom-mid">'.$result.' results were found for <strong>"'.$query.'"</strong></span><hr>';
								echo $html;
							}
							else{

								$html='<span class="margin-bottom-mid" style="color:#ff0000;">No results were found for <strong>"'.$query.'"</strong></span><hr>';
								echo $html;

							}


							//printing results
							foreach ($data as $key => $value) {

								//if match is not found then do nothing
								if (stripos($key, $query) === false){

								}
								//otherwise
								else{

									//result
									$html = '<span style="color:#35bcf2;font-weight:bold;font-size:15px">'.$key.'</span><br><span style="color:#777;font-weight:bold;font-size:13px">'.$value.'</span><br><br>';	
									echo $html;

								}

							}
					
						}
					
					}

				?>

			</div>

			<div style="font-family:verdana;font-size:13px;"><a href="http://mubbashir10.com">Designed by Mubbashir10</a></div>
			<br><br>
		</div>

	</body>

</html>