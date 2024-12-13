    <?php include "template/head.php" ?>

    <body>
        <div class="header mb-4">
            <?php include "template/navbar.php" ?>
        </div>
        <div class="text fs-2 mb-2 d-flex justify-content-center align-item-center text-center">
            <p class="text-type">Hill cipher Encryption & Decryption </p>
        </div>

        <div class="form p-5 d-flex justify-content-center align-item-center">
            <form class="p-4 border border-3" style="width: 70%;" action="" method="">
                <div class="form-floating">
                    <textarea class="form-control" size="20" id="text" style="height: 10em;">HELLO</textarea>
                    <label for="text">Text</label>
                </div>
                <div class="form-floating my-3">
                    <select class="form-select" id="matrixSize" aria-label="Floating label select example">
                        <option selected>Open this select</option>
                        <option value="2">2x2</option>
                        <option value="3">3x3</option>
                    </select>
                    <label for="matrixSize">Select Matrix Size:</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="key" style="height: 10em;" placeholder="Enter key matrix"></textarea>
                    <label for="key">Key (Matrix):</label>
                </div>
                <input class="btn btn-primary my-3" type="button" value="Encrypt" onclick="doHill(true);" />
                <input class="btn btn-success my-3" type="button" value="Decrypt" onclick="doHill(false);" />
                <h3>Result:</h3>
                <div class="fs-3 my-2" id="result"></div>
            </form>
        </div>

        <?php include "template/footer.php"; ?>