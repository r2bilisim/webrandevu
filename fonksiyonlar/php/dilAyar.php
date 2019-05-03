<?php	
	//initialize the session
	if (!isset($_SESSION)) {
		session_start();
	}
	
	/* DIL PAKETI AYARLARI */
	
	function list_files($dir)
	{
		//dilPaketi dizinini içindeki dosyaları listeler
		if(is_dir($dir))
		{
			if($handle = opendir($dir))
			{
				while(($file = readdir($handle)) !== false)
				{
					if($file != "." && $file != ".." && $file != "Thumbs.db")
					{
						//echo '<a target="_blank" href="'.$dir.$file.'">'.$file.'</a><br>';							
						$dilDizi[]=$file;
					}
				}
				closedir($handle);
			}
		}
		
		return $dilDizi;
	}					
	
	
	if(isset($_COOKIE['dilSec']))
	{ 				
		$dilDosyasi="dilPaketi/".$_COOKIE["dilSec"];
		if(file_exists($dilDosyasi))
		{
			include($dilDosyasi);
		}
	}
	else 
	{
		//seçili dil yoksa varsayılan Türkçedir
		setcookie("dilSec","tr.php",(time()+365*60*60*24));	
		include('dilPaketi/tr.php');
	}
	if(isset($_POST['dilSec']))
	{ 				
		setcookie("dilSec",$_POST['dilSec'],(time()+365*60*60*24));	
		$dilDosyasi="dilPaketi/".$_POST["dilSec"];
		if(file_exists($dilDosyasi))
		{
			include($dilDosyasi);
		}
	}
	/* DIL PAKETI AYARLARI */	
?>