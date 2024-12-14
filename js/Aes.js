async function doAES(isEncrypt) {
  const text = document.getElementById("text").value;
  const keyText = document.getElementById("key").value;

  if (!keyText) {
    alert("Please enter a key.");
    return;
  }

  const key = await crypto.subtle.importKey(
    "raw",
    new TextEncoder().encode(keyText.padEnd(32, " ")), // Pad key to 256-bit if necessary
    { name: "AES-CBC" },
    false,
    isEncrypt ? ["encrypt"] : ["decrypt"]
  );

  const iv = new Uint8Array(16); // AES CBC IV (static or dynamic)
  if (isEncrypt) {
    const encrypted = await crypto.subtle.encrypt(
      { name: "AES-CBC", iv },
      key,
      new TextEncoder().encode(text)
    );
    let plantext = document.createElement("input");
    plantext.name = "message";
    plantext.value = document.getElementById("text").value;
    plantext.type = "text";
    plantext.style.display = "none";
    let aesForm = document.getElementById("Aes");
    aesForm.appendChild(plantext);
    console.log(plantext, plantext.value);
    document.getElementById("text").value = btoa(
      String.fromCharCode(...new Uint8Array(encrypted))
    );
  } else {
    try {
      const decrypted = await crypto.subtle.decrypt(
        { name: "AES-CBC", iv },
        key,
        Uint8Array.from(atob(text), (c) => c.charCodeAt(0))
      );
      document.getElementById("text").value = new TextDecoder().decode(
        decrypted
      );
    } catch (err) {
      alert("Decryption failed. Ensure correct key.");
    }
  }
}
