// DNS-safe Base32 alphabet (RFC 4648, no padding)
const BASE32_ALPHABET = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";

// Base32 encode: DNS-safe, no padding, always uppercase
function base32Encode(bytes) {
    let output = '';
    let value = 0;
    let bits = 0;

    for (let i = 0; i < bytes.length; i++) {
        value = (value << 8) | bytes[i];
        bits += 8;
        while (bits >= 5) {
            output += BASE32_ALPHABET[(value >>> (bits - 5)) & 31];
            bits -= 5;
        }
    }

    if (bits > 0) {
        output += BASE32_ALPHABET[(value << (5 - bits)) & 31];
    }

    return output.toUpperCase(); // ensure DNS-safe casing
}

// Base32 decode: accepts uppercase or lowercase, ignores invalid characters
function base32Decode(input) {
    input = input.toUpperCase().replace(/[^A-Z2-7]/g, ''); // sanitize
    let value = 0;
    let bits = 0;
    const output = [];

    for (let i = 0; i < input.length; i++) {
        const index = BASE32_ALPHABET.indexOf(input[i]);
        if (index === -1) continue; // skip any non-base32 chars
        value = (value << 5) | index;
        bits += 5;
        if (bits >= 8) {
            output.push((value >>> (bits - 8)) & 255);
            bits -= 8;
        }
    }

    return new Uint8Array(output);
}