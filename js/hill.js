function parseMatrix(input, size) {
  const rows = input
    .trim()
    .split("\n")
    .map((row) => row.trim().split(/\s+/).map(Number));
  if (rows.length !== size || rows.some((row) => row.length !== size)) {
    throw new Error(`Invalid key matrix. Must be ${size}x${size}.`);
  }
  return rows;
}

function mod(n, m) {
  return ((n % m) + m) % m;
}

function modInverse(a, m) {
  for (let x = 1; x < m; x++) {
    if ((a * x) % m === 1) return x;
  }
  throw new Error("No modular inverse found.");
}

function inverseMatrix(matrix, size) {
  if (size === 2) {
    const det = mod(
      matrix[0][0] * matrix[1][1] - matrix[0][1] * matrix[1][0],
      26
    );
    const detInv = modInverse(det, 26);

    return [
      [mod(matrix[1][1] * detInv, 26), mod(-matrix[0][1] * detInv, 26)],
      [mod(-matrix[1][0] * detInv, 26), mod(matrix[0][0] * detInv, 26)],
    ];
  } else {
    throw new Error("Only 2x2 matrices are supported for decryption.");
  }
}

function textToVector(text, size) {
  const vector = text
    .toUpperCase()
    .replace(/[^A-Z]/g, "")
    .split("")
    .map((ch) => ch.charCodeAt(0) - 65);
  while (vector.length % size !== 0) vector.push(0); // Padding with 'A' if necessary
  return vector;
}

function vectorToText(vector) {
  return vector.map((val) => String.fromCharCode(mod(val, 26) + 65)).join("");
}

function matrixMultiply(matrix, vector, size) {
  return Array(size)
    .fill(0)
    .map(
      (_, i) => vector.reduce((sum, val, j) => sum + matrix[i][j] * val, 0) % 26
    );
}

function doHill(isEncrypt) {
  const text = document.getElementById("text").value;
  const matrixSize = parseInt(document.getElementById("matrixSize").value);
  const keyInput = document.getElementById("key").value;

  try {
    const keyMatrix = parseMatrix(keyInput, matrixSize);
    const processedMatrix = isEncrypt
      ? keyMatrix
      : inverseMatrix(keyMatrix, matrixSize);

    const vector = textToVector(text, matrixSize);
    const result = [];

    for (let i = 0; i < vector.length; i += matrixSize) {
      const chunk = vector.slice(i, i + matrixSize);
      result.push(...matrixMultiply(processedMatrix, chunk, matrixSize));
    }

    document.getElementById("result").textContent = isEncrypt
      ? `Encrypted Text: ${vectorToText(result)}`
      : `Decrypted Text: ${vectorToText(result)}`;

    let hillForm = document.getElementById("hillForm");
    let hillResult = document.createElement("input");
    hillResult.value = document.getElementById("result").textContent;
    hillResult.name = "result";
    hillResult.style.display = "none";
    hillResult.type = "text";
    hillForm.appendChild(hillResult);
  } catch (error) {
    document.getElementById("result").textContent = `Error: ${error.message}`;
  }
}
