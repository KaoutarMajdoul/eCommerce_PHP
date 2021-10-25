
<?php
class File{
	public static function build_path($path_array) {
		
		// DS contient le slash des chemins de fichiers,
		//c'est-à-dire '/' sur Linux et '\' sur Windows
		$DS = DIRECTORY_SEPARATOR;
		
		// $ROOT_FOLDER (sans slash à la fin) vaut
		// __DIR__ est une constante "magique" de PHP qui contient le
		//chemin du dossier courant
		$ROOT_FOLDER = __DIR__ . $DS . "..";
		
		return $ROOT_FOLDER. $DS . join($DS, $path_array);
	}
}
?>
