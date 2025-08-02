<?php

namespace BulkSMSIraq;

/**
 * PHP SDK for Bulk SMS Iraq V4 API.
 *
 * This class provides a clear and separate method for each API endpoint,
 * making it easier to send different types of messages, handle OTPs, and manage credentials.
 *
 * It uses cURL to make HTTP requests and handles the API key and JSON payloads.
 */
class BulkSMSIraqV4
{
    /**
     * @var string The base URL for the API.
     */
    private const BASE_URL = 'https://gateway.standingtech.com/api/v4/sms/';

    /**
     * @var string The API key for authentication.
     */
    private string $apiKey;

    /**
     * BulkSMSIraqV4 constructor.
     *
     * @param string $apiKey Your API key.
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Sends a WhatsApp message in English.
     *
     * @param string $recipient The recipient's phone number, e.g., "9647502171212".
     * @param string $senderId The sender ID, e.g., "SenderID".
     * @param string $message The content of the message.
     * @return array The API response as an associative array.
     */
    public function sendWhatsAppEnglish(string $recipient, string $senderId, string $message): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => 'whatsapp',
            'message' => $message,
            'lang' => 'en',
        ];
        return $this->makeRequest('send', $payload);
    }

    /**
     * Sends a WhatsApp message in Arabic.
     *
     * @param string $recipient The recipient's phone number, e.g., "9647502171212".
     * @param string $senderId The sender ID, e.g., "SenderID".
     * @param string $message The content of the message.
     * @return array The API response as an associative array.
     */
    public function sendWhatsAppArabic(string $recipient, string $senderId, string $message): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => 'whatsapp',
            'message' => $message,
            'lang' => 'ar',
        ];
        return $this->makeRequest('send', $payload);
    }
    
    /**
     * Sends a WhatsApp message in Kurdish.
     *
     * @param string $recipient The recipient's phone number, e.g., "9647502171212".
     * @param string $senderId The sender ID, e.g., "SenderID".
     * @param string $message The content of the message.
     * @return array The API response as an associative array.
     */
    public function sendWhatsAppKurdish(string $recipient, string $senderId, string $message): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => 'whatsapp',
            'message' => $message,
            'lang' => 'ku',
        ];
        return $this->makeRequest('send', $payload);
    }

    /**
     * Sends a Unicode SMS in Arabic or Kurdish.
     *
     * @param string $recipient The recipient's phone number, e.g., "9647502171212".
     * @param string $senderId The sender ID, e.g., "SenderID".
     * @param string $message The content of the message.
     * @param string $lang The language code ('ar' or 'ku').
     * @return array The API response as an associative array.
     */
    public function sendSmsUnicode(string $recipient, string $senderId, string $message, string $lang): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => 'unicode',
            'message' => $message,
            'lang' => $lang,
        ];
        return $this->makeRequest('send', $payload);
    }

    /**
     * Sends an English SMS.
     *
     * @param string $recipient The recipient's phone number, e.g., "9647502171212".
     * @param string $senderId The sender ID, e.g., "SenderID".
     * @param string $message The content of the message.
     * @return array The API response as an associative array.
     */
    public function sendSmsEnglish(string $recipient, string $senderId, string $message): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => 'plain',
            'message' => $message,
            'lang' => 'en',
        ];
        return $this->makeRequest('send', $payload);
    }

    /**
     * Sends a Telegram OTP.
     *
     * @param string $recipient The recipient's phone number.
     * @param string $senderId The sender ID.
     * @param string $message The OTP code.
     * @return array The API response as an associative array.
     */
    public function sendTelegramOtp(string $recipient, string $senderId, string $message): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => 'telegram',
            'message' => $message,
            'lang' => 'en',
        ];
        return $this->makeRequest('send', $payload);
    }
    
    /**
     * Sends a message with credentials via a specified type (whatsapp or plain).
     *
     * @param string $recipient The recipient's phone number, e.g., "9647502171212".
     * @param string $senderId The sender ID, e.g., "SenderID".
     * @param string $type The message type (e.g., 'whatsapp', 'plain').
     * @param string $lang The language code (e.g., 'en', 'ar', 'ku').
     * @param string $param1 The first credential parameter.
     * @param string $param2 The second credential parameter.
     * @param string $param3 The third credential parameter.
     * @return array The API response as an associative array.
     */
    public function sendCredentials(string $recipient, string $senderId, string $type, string $lang, string $param1, string $param2, string $param3): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => $type,
            'param1' => $param1,
            'param2' => $param2,
            'param3' => $param3,
            'lang' => $lang,
        ];

        return $this->makeRequest('send/credentials', $payload);
    }
    
    /**
     * Sends an automatic OTP via a specified type (whatsapp or sms).
     *
     * @param string $recipient The recipient's phone number.
     * @param string $senderId The sender ID.
     * @param string $type The OTP message type (e.g., 'whatsapp', 'sms').
     * @param string $lang The language code (e.g., 'en', 'ar', 'ku').
     * @return array The API response as an associative array.
     */
    public function sendAutoOTP(string $recipient, string $senderId, string $type, string $lang): array
    {
        $payload = [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => $type,
            'code' => 'auto',
            'lang' => $lang,
        ];

        return $this->makeRequest('sendotp', $payload);
    }

    /**
     * Verifies a sent OTP.
     *
     * @param string $recipient The recipient's phone number.
     * @param string $code The OTP code to verify.
     * @param string $id The ID of the OTP transaction, provided by the sendAutoOTP response.
     * @param bool $expire Whether to expire the OTP after verification.
     * @return array The API response as an associative array.
     */
    public function verifyOTP(string $recipient, string $code, string $id, bool $expire = true): array
    {
        $payload = [
            'recipient' => $recipient,
            'code' => $code,
            'id' => $id,
            'expire' => $expire ? 'yes' : 'no',
        ];

        return $this->makeRequest('verifyotp', $payload);
    }

    /**
     * A private helper method to handle the cURL request logic.
     *
     * @param string $endpoint The API endpoint path (e.g., 'send', 'sendotp').
     * @param array $payload The data to be sent in the request body.
     * @return array The JSON-decoded response.
     * @throws \Exception If the cURL request fails.
     */
    private function makeRequest(string $endpoint, array $payload): array
    {
        $url = self::BASE_URL . $endpoint;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json',
            'Accept: application/json',
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            curl_close($curl);
            throw new \Exception("cURL Error ($httpCode): $error_msg");
        }

        curl_close($curl);
        return json_decode($response, true) ?? ['error' => 'Invalid JSON response', 'response' => $response];
    }
}
