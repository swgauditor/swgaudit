# Data Theft Detection Test Module

Tests SWG effectiveness against DNS tunneling and data exfiltration.

## How It Works

1. Encodes file content using Base32
2. Splits encoded data into DNS-safe chunks
3. Exfiltrates data via DNS queries to subdomains
4. Reconstructs data on server from DNS logs

## Files

- `script.js` - File handling and DNS exfiltration logic
- `base32.js` - Base32 encoding/decoding functions
- `fetch_uploaded_data.php` - Server-side reconstruction
- `uploads/` - Temporary file storage (auto-cleaned)

## Test Cases

1. Small file exfiltration (< 1KB)
2. Large file chunking (> 10KB)
3. Various file types (txt, pdf, jpg)
4. DNS query rate limiting tests

## Expected SWG Behavior

1. Detect suspicious DNS patterns
2. Block excessive DNS queries
3. Alert on potential data exfiltration
4. Log suspicious domain requests

## Running Tests

1. Visit https://data-theft.swgaudit.com
2. Upload a test file (max 100KB)
3. Monitor DNS query logs
4. Check SWG alerts for DNS anomalies
