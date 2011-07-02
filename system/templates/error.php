<?php if(!defined('N2_INCLUDE')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>N2: Error</title>
		<style type="text/css">
			body {
				background: #eee;
				font: 12px Verdana, sans-serif;
				margin: 0px;
			}
			
			#container {
				background: white;
				border: 1px solid maroon;
				margin: 20px auto 20px auto;
				padding: 20px;
				width: 760px;
			}
			
			table {
				width: 100%;
			}
		</style>
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<h1>Error Occured (#<?php echo $errno; ?>: <?php echo $type; ?>)</h1>
			</div>
			<p>
				<h2>Cause</h2>
				<?php echo $errstr; ?>
			</p>
			
			<hr/>
			
			<p>
				<h2>File</h2>
				<code><?php echo $errfile;?>:<?php echo $errline; ?></code> 
			</p>
	
			<hr/>
			
			<p>
				<a href="http://chrisatk.in/project.php?id=n2"><em>N2 PHP Framework</em></a>
			</p>
		</div>
	</body>
</html>