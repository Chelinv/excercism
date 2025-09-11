// @ts-check

/**
 * Calculates the sum of the two input arrays.
 *
 * @param {number[]} array1
 * @param {number[]} array2
 * @returns {number} sum of the two arrays
 */
export function twoSum(array1, array2) {
  const total=parseInt(array1.join(""),10)+parseInt(array2.join(""),10);
  return total;
}

/**
 * Checks whether a number is a palindrome.
 *
 * @param {number} value
 * @returns {boolean} whether the number is a palindrome or not
 */
export function luckyNumber(value) {
  const str = value.toString();
  // Invertir la cadena
  const reversed = str.split("").reverse().join("");
  // Comparar original con invertido
  return str === reversed;
}

/**
 * Determines the error message that should be shown to the user
 * for the given input value.
 *
 * @param {string|null|undefined} input
 * @returns {string} error message
 */
export function errorMessage(input) {
  if (input === '' || input === null || input === undefined) {
    return 'Required field';
  }

  // Intentar convertir a número
  const num = Number(input);

  // Caso 2: si no es un número válido o es 0
  if (isNaN(num) || num === 0) {
    return 'Must be a number besides 0';
  }

  // Caso 3: válido
  return '';
}
