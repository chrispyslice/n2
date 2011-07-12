<?php if(!defined('N2_INCLUDE')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>N2: Uncaught Exception</title>
		<style type="text/css">
			body {
				background: #eee;
				font: 12px Verdana, sans-serif;
				margin: 20px auto 20px auto;
			}
			
			#container {
				background: white;
				border: 1px solid maroon;
				padding: 20px;
				width: 600px;
			}
		</style>
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<h1>Uncaught Exception (Code <?php echo $e->getCode(); ?>)</h1>
			</div>
			<p>
				<h2>Cause</h2>
				<?php echo $e->getMessage(); ?>
			</p>
			
			<hr/>
			
			<p>
				<h2>File</h2>
				<code><?php echo $e->getFile();?>:<?php echo $e->getLine(); ?></code> 
			</p>
			
			<hr/>
			
			<h2>Stack Trace</h2>
			<p>
				<?php echo $e->getTraceAsString(); ?>
			</p>
				
			<hr />
			<p>
				<a href="http://chrisatk.in/project.php?id=n2"><em>N2 PHP Framework</em></a>
			</p>
		</div>
	</body>
</html>