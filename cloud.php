<?php
	if (empty($_POST["password"]))
	{
		header('Location: https://lapota.francoisdescamps.org/index.php?error=noPasswd');
	}
	elseif ($_POST["password"] === file_get_contents("/home/pi/passwdSophie"))
        {
                /* NOP */
        }
        else
        {
                header('Location: https://lapota.francoisdescamps.org/index.php?error=badPasswd');
        }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Téléchargements</title>
		<meta charset=UTF-8 />
		<link rel="stylesheet" type="text/css" href="/css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="icon" type="image/png" href="imgs/favicon.png" />
	</head>
	<body>
		<h1>La Soute à Bagages du Tardis</h1>

		<section id="files_section">

			<h2>Fichiers en ligne :</h2>

			<ul>
				<?php
					foreach(scandir('/home/pi/files') as $file)
					{
						if($file[0] == '.')
						{
							continue;
						}
						echo '<li><a title="'.$file.'" href="/download.php?file='.$file.'">'.$file.'</a></li>';

					}
				?>
			</ul>

		</section>

		<h2>État du stockage :</h2>

		<?php
			$storageState = intval(exec("df -k | grep -vE '^Filesystem|tmpfs|devtmpfs|/dev/mmcblk0p1' | awk '{ print $5 }' | sed -e 's/%//g' | tr '\n' ' '"));
			if ($storageState < 5) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-0.png">';
			} elseif ($storageState < 15) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-10.png">';
			} elseif ($storageState < 25) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-20.png">';
			} elseif ($storageState < 35) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-30.png">';
			} elseif ($storageState < 45) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-40.png">';
			} elseif ($storageState < 55) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-50.png">';
			} elseif ($storageState < 65) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-60.png">';
			} elseif ($storageState < 75) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-70.png">';
			} elseif ($storageState < 85) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-80.png">';
			} elseif ($storageState < 95) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-90.png">';
			} elseif ($storageState > 95) {
				echo '<img id="sd_card_img" src="/imgs/sd_card-1000.png">';
			}
			echo '<p id="p_storage_state">Carte SD occupée à '.exec("df -k | grep -vE '^Filesystem|tmpfs|devtmpfs|/dev/mmcblk0p1' | awk '{ print $5 }'").'</p>';
		?>

		<h2>Mettre en ligne un fichier :</h2>

		<form enctype="multipart/form-data" action="/upload.php" accept-charset="UTF-8" method="post">
				<input name="utf8" type="hidden" value="&#x2713;" />
				<input type="file" name="file" id="file" />
				<input type="submit" value="Envoyer" />
			</form>


	</body>
</html>
