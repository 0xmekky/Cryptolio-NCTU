    <?php include "template/head.php"; ?>

    <body>
      <div class="header mb-4">
        <?php include "template/navbar.php" ?>
      </div>

      <div class="text fs-2 d-flex justify-content-center align-item-center text-center">
        <p class="text-type">Playfair-Cipher Encryption & Decryption</p>
      </div>

      <div class="form p-5 d-flex justify-content-center align-item-center">
        <form class="p-4 border border-3" id="playForm" style="width: 70%;" action="SaveItToFile/PLAYFAIR.php" method="POST">
          <label for="key" class="control-label">Key word:</label>
          <input id="key" type="text" name="KeyWord" class="form-control" placeholder="Enter key" required>
          <label class="control-label">Word or string:</label>
          <input id="String" type="text" name="msg" class="form-control otstup" placeholder="Enter a word or string">
          <input class="btn btn-primary form-control my-3" onclick="processKey(), cipher()" type="button" value="Encrypt">
          <h4 class="text-center" id="printValue"></h4>
          <input class="btn btn-success form-control mb-3" onclick="deCodeCipher()" type="button" value="Decrypt">
          <h4 class="text-center" id="printDeCode"></h4>
          <!-- comment -->
          <input class="btn btn-info my-2 form-control" type="submit" name="submit" value="Save as file">
        </form>
      </div>
      <?php include "template/footer.php"; ?>