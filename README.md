# BulkSMSIraqV4 PHP SDK

This is a lightweight PHP SDK for interacting with the Bulk SMS Iraq V4 API.

## Installation

```bash
composer require yourname/bulksmsiraq-sdk-v4
```

## Usage

```php
use BulkSMSIraq\BulkSMSIraqV4;

$sms = new BulkSMSIraqV4('YOUR_API_KEY');

$response = $sms->sendSmsEnglish('9647500000000', 'YourSenderID', 'Hello from PHP SDK!');
print_r($response);
```

## License

MIT
