<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;
use Illuminate\Support\Facades\Log;

class GoogleSheetsService
{
    private $client;
    private $service;
    private $spreadsheetId; // replace with your Google Sheet ID
    private $range = 'Sheet1!A:A'; // specify the range where to insert names

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Wedding Appointment');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);

        $base64Credentials = env('GOOGLE_CREDENTIALS_BASE64');
        if (! $base64Credentials) {
            throw new \Exception('Missing Google credentials.');
        }

       // Decode the base64 credentials and use them
        $googleCredentials = json_decode(base64_decode($base64Credentials), true);

        if (! $googleCredentials) {
            Log::error('Google credentials could not be decoded from the environment variable.');
            throw new \Exception('Google credentials are not valid.');
        }

        $this->client->setAuthConfig($googleCredentials); // Use the decoded credentials directly
        $this->client->setAccessType('offline');
        $this->service = new Google_Service_Sheets($this->client);
        $this->spreadsheetId = env('GOOGLE_SHEET_ID');
    }

    public function appendNameToSheet($name)
    {
        $values = [
            [$name] // Name submitted by the user
        ];

        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        try {
            $this->service->spreadsheets_values->append(
                $this->spreadsheetId,
                $this->range,
                $body,
                $params
            );
        } catch (\Exception $e) {
            Log::error('Error adding data to Google Sheets: ' . $e->getMessage());
            throw new \Exception('Error adding data to Google Sheets: ' . $e->getMessage());
        }
    }
}
