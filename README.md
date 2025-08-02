# BulkSMSIraqV4 PHP SDK

BulkSMSIraq.com is a leading SMS gateway provider in Iraq, offering fast, reliable, and cost-effective bulk SMS solutions for businesses, developers, and organizations. With powerful APIs, including the V4 API, users can easily integrate SMS functionality into websites, applications, and systems to send alerts, notifications, marketing messages, and more. Whether you're targeting local customers or scaling your communication efforts, BulkSMSIraq.com delivers high deliverability, user-friendly tools, and responsive support. Get started today and enhance your communication with a trusted SMS platform built for Iraq's mobile network landscape.

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

    // Example 2: Sending a WhatsApp OTP message in Arabic
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
