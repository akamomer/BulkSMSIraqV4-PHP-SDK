# BulkSMSIraqV4 PHP SDK

This is a lightweight PHP SDK for interacting with the Bulk SMS Iraq V4 API.

## Installation

```bash
composer require akamomer/bulksmsiraq-sdk-v4
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use  BulkSMSIraq\BulkSMSIraqV4;;

// Replace 'YOUR_API_KEY_HERE' with your actual API key
//API KEY: https://portal.verifyway.com/developers

$apiKey = 'API_KEY';
$smsClient = new BulkSMSIraqV4($apiKey);

$recipientNumber = '9647xxxxxxxxx';
//replace with your SenderID
//https://portal.verifyway.com/senderid
$senderId = 'SenderID';

try {

    // Example 2: Sending a WhatsApp message in Arabic
    echo "\nSending WhatsApp message in Arabic...\n";
    $whatsappResponse = $smsClient->sendWhatsAppArabic(
        $recipientNumber,
        $senderId,
        '123654'
    );
    print_r($whatsappResponse);
   
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage() . "\n";
}

?>
```

## License

MIT
