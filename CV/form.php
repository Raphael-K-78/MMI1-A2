<!DOCTYPE html>
  <html lang="en">
	<head> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
        <link rel="icon" type="image/png" href="image/profil.png" >

		
		<title> CV Raphaël Kondratiuk </title>
	</head> 
	<body> 
    <header>
            <div id="img"></div>
            <div>
			<h1>Raphaël Kondratiuk</h1> 
			<p>Prepared a B.A. in multimedia business and future web developer</p>
			</div>
			<hr>
		</header>

		<nav class="nav">
			<ul> 
				<li><a href="index.html">Profile</a></li>
				<li><a href="video.html">Video</a></li>
				<li><a href="career.html">Future Career</a></li> 
				<li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="form.html">Form</a></li>
			</ul> 
		 </nav>
        <main id="formulaire">
            <p>Please don't hesitate to give us your opinion on the website.</p>
            <p id='error'></p>
            <form method="Post" action="form.php" autocomplete="on"  >
                <input type='text' name='last' placeholder="Last Name">
                <input type="text" name='first' placeholder="First Name">
                <textarea id="opinion" placeholder="Your opinion ..." name="opinion"></textarea>
                <input type="submit" name="submit" value="submit">
            </form>
            <?php 
if($_POST['first']!="" and $_POST['last']!="" and $_POST['opinion']!=""){?>
    <script>document.getElementById('formulaire').innerHTML = "<p>Thank you <? echo $_POST['first'].' '.$_POST['last'] ?> for taking the time to write this review: <? echo $_POST['opinion'] ?></p>"</script>
<?}
else{?>
    <script>document.getElementById('error').innerHTML = 'Complete all input fields, please'</script>
<?}
?>

        </main>    
        <footer>
            <section id="validator">
                <hr>
                <h2>Website Certification</h2>
                <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valide !" >
                <img src="image/html-validator.png" alt="HTML Valide !">
            </section>
            <div id="file">
                <hr>
				<article>
                	<h2>File</h2>
                	<ul>
						<li><a href="ENGLISH_CV_RAPHAEL_KONDRATIUK.pdf">C.V.</a></li>
                    	<li><a href="website.zip">website</a></li>
                	</ul>
				</article>
            </div>
            <div id="webpage">
                <hr>
				<article>
				<h2>Web Page</h2>
                <ul>
                    <li><a href="index.html">Profile</a></li> 
				    <li><a href="career.html">Future Career</a></li> 
				    <li><a href="video.html">Video</a></li> 
				    <li><a href="portfolio.html">Portfolio</a></li>
				    <li><a href="form.html">Form</a></li>
                </ul>
				</article>
            </div>
            <p>don't hesitate to hover your mouse over all the images on the website!</p>

        </footer>
      </body>
</html>