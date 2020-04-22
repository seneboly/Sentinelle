<?php
function getConnexionBD()
	{
	    $dbhost = 'localhost';
		$dbuser = 'root';
		$dbpassword = '';
		$dbname = 'sogesegl_db';
		try 
		{
			$db=new PDO("mysql:host=".$dbhost.";dbname=".$dbname,$dbuser,$dbpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
			return $db;

		}catch (Exception $e) 
		{
			die("Erreur de connexion à la BD ".$e->getMessage());
		}
	}
$db=getConnexionBD();

// ne pas oublier l'ouverture  l connection à la base  
//Le chemin d'acces a ton fichier sur le serveur
//$fichier =fopen ($filename ,$mode [,$use_include_path = FALSE [, @]] );

$rep = "C:/xampp/htdocs/mesprojets/sogesegl/";
$dir = opendir($rep);
$f=readdir($dir);
$fichier="erreur_caisse";

while ($f = readdir($dir)) 
{
	if(is_file($rep.$f)) 
	{
	   if (preg_match("@".$fichier."@", $f))
		{
			if (!$fichier = fopen(str_replace('.php','',$f), "r")) 
			{
				echo "Echec de l'ouverture du fichier";
				exit;
			}
			else 
			{
				// votre code;
				//tant qu'on est pas a la fin du fichier : 
				while (!feof($fichier)) 
				{ 			
					// On recupere toute la ligne 
					$uneLigne = fgets($fichier, 1024); 
					//On met dans un tableau les differentes valeurs trouvés (ici séparées par un ';') 
					$tableauValeurs = explode('|', $uneLigne);
					var_dump($tableauValeurs);
					if ($tableauValeurs[0] != '') 
					{			
						// On crée la requete pour inserer les donner (ici il y a 12 champs donc de [0] a [11]) 
						$sql="INSERT INTO liste_erreurs VALUES (NULL, '$tableauValeurs[0]', '$tableauValeurs[1]', '$tableauValeurs[2]', '$tableauValeurs[3]',
							 '$tableauValeurs[4]', '$tableauValeurs[5]',
							  '$tableauValeurs[6]', '$tableauValeurs[7]',
							   '$tableauValeurs[8]', '$tableauValeurs[9]',
							    '$tableauValeurs[10]', '$tableauValeurs[11]',
							    '$tableauValeurs[12]','$tableauValeurs[13]',
							    '$tableauValeurs[14]','$tableauValeurs[15]','0', CURRENT_TIMESTAMP,null,null)";
						$req=$db->query($sql); 
						// la ligne est finie donc on passe a la ligne suivante (boucle) 				 
						//vérification et envoi d'une réponse à l'utilisateur 
						if ($req) 
						{ 
							
							//deplacement du fichier

						} 
						else 
						{ 
							echo"Echec dans l'ajout dans la base de données"; 
						} 
					}

				}
				//il faut toujours fermer le fichier 
				fclose($fichier);
				$name=date('Y-m-d-H-i-s');
				//deplacement du fichier dans un autre dossier nomer archive
				//rename(str_replace('.php','',$f),'archive/'.$name.'listeerreur.csv');
			} 
		}
	}
}


?>
