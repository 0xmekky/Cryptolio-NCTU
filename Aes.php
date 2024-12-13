    <?php include "template/head.php"; ?>

    <body>
        <div class="header mb-4">
            <?php include "template/navbar.php" ?>
        </div>
        <div class="text fs-2 d-flex justify-content-center align-item-center text-center">
            <p class="text-type">AES Encryption & Decryption</p>
        </div>

        <div class="form p-5 d-flex justify-content-center align-item-center">
            <form class="p-4 border border-3" style="width: 70%;" action="" method="">
                <div class="form-floating">
                    <textarea class="form-control" size="20" id="text" style="height: 10em;" placeholder="Encrypt this text with AES!">Encrypt this text with AES!</textarea>
                    <label for="text">Text</label>
                </div>
                <label class="form-label" for="key">Key:</label>
                <input class="form-control" type="password" name="" id="key" placeholder="Enter AES key">
                <input class="btn btn-primary my-2" type="button" value="Encrypt" onclick="doAES(true);">
                <input class="btn btn-success my-2" type="button" value="Decrypt" onclick="doAES(false);">
            </form>
        </div>

        <?php include "template/footer.php" ?>