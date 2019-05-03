<?php include("Connections/baglantim.php"); ?>
<?php include("fonksiyonlar/php/dilAyar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $diller['title']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="dist/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="dist/css/main.css">
<!--===============================================================================================-->
<script>
function ackapa(kblt)
        {
            var yeniform = document.RandevuForm;
            if (yeniform.kabulet.checked)
                {
                    document.getElementById('kartvar').style.display='block';
                }
                else
                    {
                        document.getElementById('kartvar').style.display='none';
                    }
        }
</script>
</head>
<body>
<noscript>
<h1>TARAYICINIZIN JAVASCRIPT DESTEKLEDIĞINDEN EMIN OLUNUZ VEYA TARAYICI AYARLARINIZDAN AKTİF HALE GETIRINIZ.</h1>
<h2>RANDEVU ALMABİLMEK İÇİN TARAYICINIZIN JAVASCRİPT DESTEĞİNİ AÇARAK YENİDEN DENEYİNİZ!</h2>
</noscript>
	<?php
if(isset($db)){ 
$row_RandevuAyar = $db->query("SELECT * FROM GRUPLAR WHERE Webrandevu=1 AND AKTIF=1")->fetchAll();
if(count($row_RandevuAyar)>0)//sistemde randevu verebilecek herhangi bir grup varsa ve açıksa
{
	/*if(!isset($_SESSION)) dilAyar.php den dolayı gereksiz
	{
		session_start();
		$_SESSION['onay']=true;
	}
	*/
	$_SESSION['onay']=true;
}else { if(isset($_SESSION)){session_destroy(); unset($_SESSION['onay']); unset($_SESSION['oturum']); } }
}
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<a href="index.php"><img src="dist/images/logo.png" alt="IMG"></a>
				</div>
				
				<form class="login100-form validate-form" action="dogrula.php" method="post" name="RandevuForm">
				
				<span class="login100-form-title">
						<?php echo $diller['sistemBaslik']; ?>
					</span>
						<table><tr>
							<td>
								<table width="100%">
									<tr>
										<td >
										<ul>
											   <li><a style="color: blue;" href="<?php echo $diller['sayfaAltLink'][1]['url']; ?>" target="_blank"><?php echo $diller['sayfaAltLink'][1]['url']; ?></a>  sayfamızdan ‘<a href="<?php echo $diller['sayfaAltLink'][1]['url']; ?>" style="color: blue;">Genel Bilgiler</a>’ ile ‘<a href="<?php echo $diller['sayfaAltLink'][1]['url']; ?>" style="color: blue;">İstenen Belgeler</a>’  bölümünü inceleyiniz,</li>
	                                           <li>İşleminizi lütfen süresi içinde yaptırınız.</li>
	                                           <li>Randevu saati geçen kişi, normal işlem sırasına tabidir.</li>
									    </ul>
										</td>
									</tr>
									<tr><td bgcolor="#C0C0C0"><input type="Checkbox" style="width:20px;height:20px" name="kabulet" onclick="ackapa(this.name)"> <?php echo $diller['onayMetni'];?></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<div id="kartvar" style="display:none">
							<div class="container-login100-form-btn">
											
									<table align="center">
										<tr><td>
										<?php
										if(isset($db) && count($row_RandevuAyar)>0)//sistem açık
										{ ?>

										<input type="submit" class="login100-form-btn" name="devambutonu" value="<?php echo $diller['devamEt'];?>">
									<?php }else{ ?>
									<div class="alert alert-danger">Randevu Sistemi Kapalıdır veya Şuan Hizmet Vermemektedir.</div>
									<?php } ?>
										</td></tr>
									</table>
								</div>
								</div>
							</td>
						</tr>
							</table>
						</form>
	<div class="container">
		<div class="text-center p-t-136">
		<div class="txt2" href="#">								
			<?php echo $diller['sayfaAltBilgi']; ?>
			<a>
			<div>
			<?php foreach($diller['sayfaAltLink'] as $link)
			{
				?>
			
			<span>
			<a href="<?php echo $link['url']; ?>"><b><?php echo $link['title']; ?></b></a>
			</span> | 
			<?php 
			}
			?>		
			</div>
		</a>
		</div>
		</div>
	</div>
		</div>
	</div>
</div>	

	
<!--===============================================================================================-->	
	<script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="dist/vendor/bootstrap/js/popper.js"></script>
	<script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="dist/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

</body>
</html>