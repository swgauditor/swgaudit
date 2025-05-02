# Phishing Test Module

Tests SWG effectiveness against credential theft attempts.

## How It Works

1. Simulates a login form that mimics common enterprise applications
2. Attempts to submit credentials via POST request
3. Tests if SWG can detect and block form submissions

## Test Cases

- Basic form submission blocking
- HTTPS form submission detection
- POST request interception
- SSL inspection capabilities

## Files

- `index.html` - Simulated login page
- `script.js` - Form submission handler
- `styles.css` - Page styling
- `phishing.png` - Example branding image

## Expected SWG Behavior

1. Block access to the phishing subdomain
2. Detect and block form submissions
3. Generate alerts for:
   - Known phishing patterns
   - Credential theft attempts
   - Form submissions to uncategorized domains

## Running Tests

1. Visit https://phishing.swgaudit.com
2. Attempt to submit test credentials
3. Check if form submission was blocked
4. Verify SWG alerts and logs
