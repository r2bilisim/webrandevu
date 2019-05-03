<?php
	if(isset($_POST['grp_ismi']) && isset($_POST['adSoyad']) && isset($_POST['RandevuTarihiMesaj']) && isset($_POST['biletNo']))
{
	$baslik ="Servis:".$_POST['grp_ismi'];
	$icerik="Randevu Bilgileri:".$_POST['adSoyad']." Randevu Tarihi:".$_POST['RandevuTarihiMesaj']." Bilet No: ".$_POST['biletNo'];
	$aciklama="Web randevu sistemi: Randevu gününü kaydetmeyi unutmayınız..";
}else
{
	$baslik ="Hata!!";
$icerik="Biletiniz oluşturulamadı. Kayıtlı Bilet Yok!";
	$aciklama="";
}
?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
	    <script src="../../dist/plugin/jsPDF/pdfmake.min.js"></script>
    <script src="../../dist/plugin/jsPDF/vfs_fonts.js"></script>
    <script type="text/javascript">

var dd = {
	content: [
		{
			text: '<?php echo $baslik;?>',
			style: 'header'
		},
		{
			text: '<?php echo $icerik;?>',
			style: 'subheader'
		},		
		{
			text: '<?php echo $aciklama;?>',
			style: ['quote', 'small']
		}
	],
	styles: {
		header: {
			fontSize: 18,
			bold: true,
			color: 'red'
		},
		subheader: {
			fontSize: 15,
			bold: true
		},
		quote: {
			italics: true
		},
		small: {
			fontSize: 8
		}
	}
	
}

var a=pdfMake.createPdf(dd).download('<?php echo $baslik; ?>');
if(a)
{
	self.close ();
}

    </script>
</head>
<body>
</body>
</html>