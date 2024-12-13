	<?php include "template/head.php" ?>

	<body>
		<div class="header mb-4">
			<?php include "template/navbar.php" ?>
		</div>
		<div class="container" id="container">
		</div>
		<div class="text fs-2 d-flex justify-content-center align-item-center text-center mb-2">
			<p class="text-type">Caeser-Cipher Encryption & Decryption</p>
		</div>

		<div class="form p-5 d-flex justify-content-center align-item-center">
			<form class="p-4 border border-3" style="width: 70%;" action="" method="">
				<label class="form-label" for="caser-msg">Text:</label>
				<input class="form-control" id="caser-msg" type="text" placeholder="Welcome in Cryptolio NCTU.">
				<label class="form-label" for="caser-shift">Shift:</label>
				<input class="form-control" id="caser-shift" type="number" value="13">
				<input class="btn btn-primary mt-2" type="button" value="Encrypt" onclick="doCrypt(false);">
				<input class="btn btn-success mt-2" type="button" value="Decrypt" onclick="doCrypt(true);">
			</form>
		</div>
		<?php include "template/footer.php"; ?>