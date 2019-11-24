<?php 
	session_start();
	session_destroy();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
	
		
		<title>Logout</title>
		
		<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=EB+Garamond|Cardo:400italic);

		body, html {
		  height: 100%;
		  margin: 0;
		}
		.bg {
		    margin: 0;
		    background-image: url("Image/log5.png");
		    height: 100%; 
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		    background-color: #D0B75B;

		}

		.sandbox-correct-pronounciation {
		  padding: 10em 0 10em 0;
		}
		.heading-correct-pronounciation {

		  margin: auto;
		  text-align: center;
		  position: relative;
		}
		h1 {
		  color:#FDF788;
		  font-family: 'Cardo', serif;
		  font-size: 1.5em;
		  font-weight: normal;
		  font-style: italic;
		  letter-spacing: 0.1em;
		  line-height: 2.2em;
		  position: relative;
		  bottom:150px;
		  text-shadow: 2px 2px 4px #04015E,
		  				2px 3px 4px #04015E,
		  				2px 4px 4px #04015E;

		}
		h1:hover {
            color:  #ffff;
            text-shadow:     0 1px 0 hsl(174,5%,80%),
	                 0 2px 0 hsl(174,5%,75%),
	                 0 3px 0 hsl(174,5%,70%),
	                 0 4px 0 hsl(174,5%,66%),
	                 0 5px 0 hsl(174,5%,64%),
	                 0 6px 0 hsl(174,5%,62%),
	                 0 7px 0 hsl(174,5%,61%),
	                 0 8px 0 hsl(174,5%,60%),
	
	                 0 0 5px rgba(0,0,0,.02),
	                0 1px 3px rgba(0,0,0,.05),
	                0 3px 5px rgba(0,0,0,.1),
	               0 5px 10px rgba(0,0,0,.15),
	              0 10px 10px rgba(0,0,0,.2),
	              0 20px 20px rgba(0,0,0,.3);
	              		}

		
		@import url(https://fonts.googleapis.com/css?family=Lato:900);

		*, *:before, *:after{
		  box-sizing:border-box;
		}
		
		
		
		.center {
				text-align:center;
		}
		#one {
			font-size:150%;
		}
		:root {
			  --button-color1: white;
			  --button-color2: black;
			  --button-background-color1:#3E1E4F;
			  --button-background-color2:#8D73AA;
			  --cursor: pointer;
			  --border-radius: 5px;
			  --border-radius1: 50%;
				--height: 30px;
				--width: 150px;
				--line-height: 25px;
				--ext-align: center;
				--transition-property: background, border-radius;
				--transition-duration: .2s, .5s;
				--transition-timing-function: linear, ease-in;
			}
			.btn-primary {
			    color: var(--button-color1);
			    background-color: var(--button-background-color1);
			    border-radius: var(--border-radius);
			    cursor: var(--cursor)
			    height:var(--height);
				width:var(--width);
				line-height:var(--line-height);
				ext-align:var(--ext-align);
				transition-property:var(--transition-property);
				transition-duration:var(--transition-duration);
				transition-timing-function:var(--transition-timing-function);

			}

			.btn-primary:hover {
				color: var(--button-color2);
			    background-color: var(--button-background-color2);
			    background-image:radial-gradient(circle,#B09CCA,#3E1E4F); 
			    border-radius: var(--border-radius1);
			}

		#letter{
		  display: inline-block;
		  font-weight: 900;
		  font-size: 80px;
		  margin: 0.1px;
		  position: relative;
		  transform-style: preserve-3d;
		  perspective: 400;
		  z-index: 1;
		}

		
		</style>
	</head>
<body>
    <div class="bg" id='bg'>
	<center><div class="sandbox sandbox-correct-pronounciation">
	<h1 class="heading heading-correct-pronounciation" id="letter">
		Logout Successful!
	</h1></center>
	<div class="center">
				<a class="btn btn-primary" href="http://localhost/NewFolder/Login.php">Login Again</a>
			</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
