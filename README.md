# Lumesse: TalentLink PHP Integration

My simplified SOAP integration for [FoAdvert](https://developer.lumesse-talenthub.com/docs/read/career_portal/FoAdvert.html).

# Usage
```php
<?php
use Serfhos\LumesseTalentLink\Client\FoAdvertSoapClient;

// Create client
$client = FoAdvertSoapClient::create([
    'endpoint' => 'https://api5.lumesse-talenthub.com/CareerPortal/SOAP/FoAdvert',
    'security' => 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
    'username' => '[placeholder]',
    'password' => 'guest',
    'key' => '[placeholder]',
]);

// Dump the first 10 results
$response = $client->getAdvertisements([
    'langCode' => 'EN',
    'firstResult' => 0,
    'maxResults' => 10,
]);

var_dump($response);
```
