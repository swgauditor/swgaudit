# Cyber‑Slacking Detection Test Module

Tests SWG content filtering and acceptable use policy enforcement.

## How It Works

1. Presents various YouTube video categories
2. Attempts to load streaming content
3. Tests URL and content categorization
4. Checks media access controls

## Files

- `videos.json` - Category and video definitions
- `script.js` - Video loading and UI handling
- `index.html` - Test interface
- `styles.css` - Custom styling

## Video Categories

- Educational
- Entertainment
- Gaming
- Music
- News
- Sports
- Technology
- Vlogs

## Expected SWG Behavior

1. Block non-work related categories
2. Filter streaming media
3. Apply time-based access rules
4. Log access attempts

## Running Tests

1. Visit https://cyberslacking.swgaudit.com
2. Try accessing different video categories
3. Test streaming capabilities
4. Verify category-based blocking
