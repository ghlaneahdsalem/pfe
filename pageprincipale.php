<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>connexion page | Cabinet médical</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
#home {
    margin-top: 50px;
    height: calc(100vh - 50px);
    padding: 0 8%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-thumb {
    background-color: #ea1f33;
}
#home .left {
    width: 40%;
}
#home .left h1 {
    font-size: 35px;
    margin-bottom: 10px;
}
#home .left p {
    font-size: 13px;
    margin-bottom: 30px;
    color: blue;
}
#home .right {
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
#home .right img {
    width: 100%;
}

.photos {
    max-width: 1000px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
.container {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
}
.col-3 {
    flex: 1;
    padding: 10px;
    text-align: center;
    transition: 0.5%;
}
.col-3 img {
    width: 100%;
    height: auto;
    box-shadow: 20px 20px 30px #999;
}
.col-3 span{
	color: blue;
}
</style>
</head>
<body>
<section id="home">
    <div class="left">
        <h1>PLATEFORME MEDICALE</h1>
        <p>Voici Notre plateforme simplifie la gestion des dossiers médicaux et la prise de rendez-vous, 
		permettant aux patients et aux professionnels
		de santé de se concentrer sur ce qui est essentiel : la santé et le bien-être<br>
		Accédez à votre espace patient ou professionnel depuis n'importe quel appareil, à tout moment et en tout lieu. Notre plateforme est conçue pour
		être accessible et facile à utiliser pour tous.
		</p>
    </div>
    <div class="right">
        <img src="docteur.jpg" alt="Docteur">
    </div>
</section>
<section class="photos">
    <div class="container">
        <div class="col-3">
            <img src="patient2.jpg" alt="Patient">
            <span>Tout au long de la consultation, le médecin fait preuve de bienveillance, d'empathie et de respect envers le patient.</span>
        </div>
        <div class="col-3">
            <img src="consultation.jpg" alt="Consultation">
            <span>À l'heure du rendez-vous, le patient est accueilli par le médecin dans un environnement serein et professionnel.
			Le médecin prend le temps d'écouter attentivement les préoccupations et les symptômes du patient.</span>
        </div>
        <div class="col-3">
            <img src="secretaire.jpg" alt="Secrétaire">
            <span>Le secrétaire médical joue un rôle crucial dans le bon fonctionnement de la plateforme</span>
        </div>
    </div>
</section>
<section class="photos">
    <div class="container">
        <div class="col-3">
            <img src="dosspt.jpg" alt="dossier Patient">
        </div>
        <div class="col-3">
            <img src="dossier1.jpg" alt="dossier Patient">
            <span>Conservez, accédez et gérez facilement les dossiers médicaux de vos patients de manière sécurisée et organisée.
			Notre système permet un suivi précis de l'historique médical, des prescriptions, des résultats de tests et des consultations passées.
</span>
        </div>
        <div class="col-3">
            <img src="securite.jpg" alt="Securite">
            <span>Nous accordons une grande importance à la sécurité et à la confidentialité des données de nos utilisateurs. 
			Toutes les informations sont protégées par des mesures de sécurité de
			pointe pour garantir la confidentialité et l'intégrité des données médicales.</span>
        </div>
    </div>
</section>
</body>
</html>