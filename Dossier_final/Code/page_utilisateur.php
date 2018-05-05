<!DOCTYPE html>
<html>
<head>
	<title>Page personelle</title>
	<link rel="stylesheet" href="style_utilisateur.css">
</head>


<body>
	<header>
	<ul>
		<li class="menu-notif">
			<a href="page_notif.php>">Acceuil</a>	
		</li>
		<li class="menu-acceuil">
			<a href="">Notif</a>
		</li>
	</ul>	
	</header>

	
		<section id="PhotoUtilisateur">
			<div class="sec">
				<div class="left">
					<img src="lassale.jpeg" alt="ma photo">
				</div>
				<div class="right">
					<h2>Othmane Ibrahimi</h2>
				</div>
			</div>
		</section>

	

	<nav>
		<div class="table">
			<ul>
				<li class="menu-reseau">
					<a href="page_monreseau.php>">Reseau</a>	
				</li>
				<li class="menu-emplois">
					<a href="page_emplois.html">Emplois</a>
				</li>
				<li class="menu-message">
					<a href="page_message.php">Messages</a>
				</li>
			</ul>

	</nav>

	<section id="Information">
		
		<div class="sec">
			<h2>Informations</h2>
			<div class="left">
				<h3>Naissance: </h3>
				<h3>Emplois : </h3>
				<h3>Habite à : </h3>
                <h3>Téléphone: </h3>
                <h3>Mail : </h3>
			</div>
			<div class="right">
				<h3>10/04/1996</h3>
				<h3>Politicien</h3>
				<h3>Paris</h3>
				<h3>06 99 67 35 41</h3>
				<h3>lassallepresident@gmail.com</h3>
			</div>
		</div>
		
	</section>

	<section id="Publication">

		<div class="sec">
			<h2>Publications</h2>
			<div class="left">
				<form method="post" action="">
				<label for="nom">Exprimez vous</label>
				<input type="text" name="statut" placeholder="Quoi de neuf.." autofocus="" required="required" size="50">
				<input type="submit" value="Publier" name="Publie">

			</div>
		</div>
		
	</section>

</body>
</html>