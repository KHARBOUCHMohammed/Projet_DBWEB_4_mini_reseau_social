<?php

/**
 * 
 */
class Utilisateur
{
	
	public $id;
	public $pseudo;
	public $naissance;

	public function __toString() 
	{

		return "<a>" . print_r($this, True) . "</a>";
	}

}

/**
 * 
 */
class Publication
{
	public $id;
	public $contenu;
	public $auteur;
	public $categorie;
	public $likers;

	public function __toString() 
	{

		return "<a>" . print_r($this, True) . "</a>";
	}

	public function setlikers($likers)
	{
		$this->likers=$likers;
	}
}


/**
 * 
 */
class Vote
{
	public $id;	
	public $publication;
	public $Utilisateur;

	public function __toString() 
	{

		return "<a>" . print_r($this, True) . "</a>";
	}

}


/**
 * 
 */
class Connexion
{

	private static $instanciation = null;
	private static $pdoinsta = null;
	private static $servername = "pedago01c.univ-avignon.fr";
	private static $database = "etd";
	private static $username = "uapv2100360";
	private static $password = "ibUmwE";

	//	$servername="localhost"; // pedago01c.univ-avignon.fr
	//	$username="root"; // identifiant uapv
	//	$password=""; // mot de passe reçu
	
	function __construct()
	{
		

		$pdo = "pgsql:host=" . self::$servername . ";dbname=" . self::$database . ";user=" . self::$username . ";password=" . self::$password;

		

		try 
		{
			self::$pdoinsta = new PDO($pdo);

			//echo "connexion reussie";
		}
		catch (Exception $e)
		{
			//echo "connexion echoue <br>";
			echo $e->getMessage();
		}
	}

	public static function GetInsta()
	{
		if(is_null(self::$instanciation))
		{
			self::$instanciation = new Connexion();
		}
		return self::$instanciation;
	}

	public function query($query)
	{
		return self::$pdoinsta->query($query);
	}
}

$pdo = Connexion::GetInsta();






?>
