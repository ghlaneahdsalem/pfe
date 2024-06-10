<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
   
	<?php 
	 session_start();
       $prenom_medecin = "";
     if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'medecin') {
    $prenom_medecin = htmlspecialchars($_SESSION['user']['login']);
      }
	  require_once('db.php');
	   $id = $_GET['id'];
	 $sql1 = $pdo->prepare("SELECT * FROM dossiers_patients WHERE id = ?");
    $sql1->execute([$id]);
    $data1 = $sql1->fetch(PDO::FETCH_ASSOC);
    $sql = $pdo->prepare("SELECT * FROM medecin WHERE prenom = ?");
    $sql->execute([$prenom_medecin]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
	
 if(isset($_POST['generer_pdf'])){
	
     $date=date("d/m/Y"); // Utilisez la date actuelle
     $imagerie =$_POST['imagerie'];
	 ob_start();
require('fpdf186/fpdf.php');
  
class PDF extends FPDF { 
      private $prenom_medecin;
	  private $nom_medecin;
	  private $Email;
	  private $specialite;
        // Constructor to accept parameter
        function  __construct($prenom_medecin,$nom_medecin,$Email,$specialite) {
            parent::__construct();
            $this->prenom_medecin = $prenom_medecin;
			$this->nom_medecin = $nom_medecin;
			$this->Email = $Email;
			$this->specialite = $specialite;
        }
	// Page header 
	function Header() { 
		// Set font family to Arial bold 
            $this->SetFont('Arial','B',12); 
            $this->Cell(0, 10, 'Docteur: ' . $this->nom_medecin . $this->prenom_medecin, 0, 1, 'L');
			$this->Ln(2);
			$this->Cell(0, 10, 'Email: ' . $this->Email, 0, 1, 'L');
			$this->Ln(2);
			$this->Cell(0, 10, 'Specialite: ' . $this->specialite, 0, 1, 'L');
			
		// Add logo to page 
		$this->Image('imagerie.jpg',170,8,33); 
		 
		// Set font family to Arial bold 
		$this->SetFont('Arial','B',20); 
		
		// Move to the right 
		$this->Cell(80); 
		
		// Header 
		$this->Cell(80,10,'IMAGERIE_MEDICALE',1,0,'C'); 
		
		// Line break 
		$this->Ln(20); 
	} 

	// Page footer 
	function Footer() { 
		// Position at 1.5 cm from bottom 
            $this->SetY(-30); 
            
            // Arial italic 8 
            $this->SetFont('Arial','I',12); 
            
            // Signature du médecin
            $this->Cell(0, 10, 'Signature medecin: ' , 0, 1, 'L');
		// Position at 1.5 cm from bottom 
		$this->SetY(-15); 
		
		// Arial italic 8 
		$this->SetFont('Arial','I',8); 
		
		
		// Page number 
		$this->Cell(0,10,'Page ' . 
			$this->PageNo() . '/{nb}',0,0,'C'); 
	} 
} 

// Instantiation of FPDF class 
$pdf = new PDF($prenom_medecin,$data['nom'],$data['Email'],$data['specialite']); 

// Define alias for number of pages 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','',14); 
  $pdf->Ln(20);
 $pdf->Cell(50, 10, 'patient: '.$data1['nom_patient'].' '.$data1['prenom_patient'], 0, 0, 'A');
 $pdf->Ln(5);
	$pdf->Cell(50, 10, 'Date_Naissance: '.$data1['date_naissance'], 0, 0, 'A');
	$pdf->Ln(5);
	$pdf->Cell(50, 10, 'numero_national: '.$data1['num_national'], 0, 0, 'A');
    $pdf->Cell(100); 
    $pdf->Cell(50, 10, 'Date: '.$date, 0, 0, 'A');  
    $pdf->Ln(20); 
	// Add analyse information in a table-like format without borders
    $pdf->MultiCell(0, 10,  $imagerie, 0, 'L');
$pdf->Output(); 
 }
 ?>
 <br><br><br>
 <div id="petite_boite">
 <h2 align="center"> Generer Analyse</h2>
<form method="post" enctype="multipart/form-data" id="formulaire">
<br><br><br>
id patient:
<input type="text" name="id_patient"/><br>
 imagerie_medicale:
<textarea name="imagerie"/></textarea><br>
<input type="submit" class="btn btn-primary my-2"name="generer_pdf" value="generer_pdf">	
</form>
</div>
</body>
</html>