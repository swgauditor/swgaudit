<!--
   Copyright 2024 SWG Audit Contributors

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
-->

# SWG Audit Testing Suite
A comprehensive testing framework for evaluating Secure Web Gateway (SWG) effectiveness against common web threats.

## Overview
This testing suite helps security teams evaluate their SWG implementation against Zero-Hour threat:
- Phishing attacks and credential theft
- Malware downloads 
- Data exfiltration via DNS tunneling
- Productivity loss through Cyber‑Slacking

The Zero-Hour threat tests evaluate the SWG's ability to identify and block new, previously unknown threats without relying on traditional signature-based detection methods.

## Important Testing Requirements
- All test domains under swgaudit.com must be treated as uncategorized sites
- SWG should apply security policies based on behavior analysis rather than URL categorization

## Test Cases

### 1. Phishing Test (phishing.swgaudit.com)
Simulates a credential harvesting attack. Your SWG should:
- Allow initial access to the phishing page (for testing visibility)
- Block all form submissions to prevent credential theft
- Alert on form submission attempts
- Log all interaction with the phishing simulation

### 2. Malware Test (malware.swgaudit.com)  
Attempts to download the EICAR test file. Your SWG should:
- Block the file download while allowing site access
- Block individual malware fragments
- Alert on malware assembly attempts
- Log all download attempts

### 3. Data Theft Test (data-theft.swgaudit.com)
Tests DNS tunneling detection. Your SWG should:
- Allow access to the test interface
- Block all data exfiltration attempts via DNS
- Detect and block encoded DNS queries
- Monitor and alert on suspicious DNS patterns

### 4. Cyber‑Slacking Test (cyberslacking.swgaudit.com)
Tests content filtering capabilities. Your SWG should:
- Allow access to the test interface
- Selectively allow/block YouTube categories:
  * Allow: Educational, News, Documentation
  * Block: Entertainment, Gaming, Music
- Enforce bandwidth quotas
- Log category access attempts

## Setup Instructions

### DNS Configuration
1. Configure your authoritative DNS server (BIND9):

```conf
# /etc/bind/named.conf.local
zone "swgaudit.com" IN {
    type master;
    file "/etc/bind/zones/db.swgaudit.com";
    allow-update { none; };
    allow-transfer { none; };
};

# /etc/bind/named.conf.options
options {
    listen-on { YOUR_PUBLIC_IP; };
    recursion no;
    allow-query { any; };
    allow-query-cache { none; };
    allow-transfer { none; };
    dnssec-validation auto;
    version "not currently available";
};
```

### Web Server Configuration
1. Configure Apache virtual hosts:

```apache
# /etc/apache2/sites-available/swgaudit.com.conf
<VirtualHost *:443>
    ServerName swgaudit.com
    ServerAlias *.swgaudit.com
    DocumentRoot /var/www/swg-audit/home
    
    SSLEngine On
    Include /etc/letsencrypt/options-ssl-apache.conf
    
    # Rewrite rules for subdomains
    RewriteEngine On
    
    # Main domain
    RewriteCond %{HTTP_HOST} ^swgaudit\.com$ [NC]
    RewriteRule ^(.*)$ /var/www/swg-audit/home/$1 [L]
    
    # Subdomain handling
    RewriteCond %{HTTP_HOST} ^([^.]+)\.swgaudit\.com$ [NC]
    RewriteCond /var/www/swg-audit/%1 -d
    RewriteRule ^(.*)$ /var/www/swg-audit/%1/$1 [L]
</VirtualHost>
```

### Installation
1. Clone the repository:
```bash
git clone https://github.com/yourusername/swg-audit.git /var/www/swg-audit
```

2. Set up permissions:
```bash
chown -R www-data:www-data /var/www/swg-audit
chmod -R 755 /var/www/swg-audit
```

3. Install dependencies:
```bash
apt install apache2 bind9 php-fpm
```

4. Configure SSL certificates using Let's Encrypt:
```bash
certbot --apache -d swgaudit.com -d *.swgaudit.com
```

## Directory Structure
```
/var/www/swg-audit/
├── home/                # Main website files
├── phishing/           # Phishing simulation
├── malware/            # Malware detection tests
│   └── fragments/      # EICAR test file fragments
├── data-theft/         # DNS tunneling tests
│   └── uploads/        # Temporary file storage
└── cyberslacking/      # Content filtering tests
    └── videos.json     # Video category definitions
```

## Testing Methodology

1. Configure your SWG to treat swgaudit.com as an uncategorized domain
2. Run each test case independently
3. Monitor SWG logs and alerts
4. Document any bypass techniques that succeed
5. Adjust SWG policies based on findings

## Supporting the Project

If you find this project useful, consider giving it a star on GitHub! Starring the repository helps others discover the project and shows your support for the work being done.

## Contributing

We welcome contributions! Please see the [CONTRIBUTING.md](CONTRIBUTING.md) file for detailed guidelines on how to contribute to this project. Whether it's reporting issues, submitting code changes, writing documentation, or suggesting features, your help is greatly appreciated.

## Security

- This tool is for testing purposes only
- Do not use real credentials
- All uploaded files are automatically deleted
- No actual malware is used (only EICAR test file)

## License

This project is licensed under the Apache License, Version 2.0 - see the [LICENSE](LICENSE) file for details.