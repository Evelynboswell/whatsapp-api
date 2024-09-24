<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# WhatsApp API Client with Laravel 10 and Fonnte

This project is a REST API client built using Laravel 10 to send WhatsApp messages using the [Fonnte WhatsApp API](https://docs.fonnte.com/api-send-message/).




## Features

- Send WhatsApp messages to any recipient using Fonnte's API.
- Includes easy-to-use REST API endpoints.
- Built with Laravel 10 and integrated with Laravel's HTTP Client for communication with external APIs.
- Handles SSL certificate issues and provides local development instructions.


## Requirements
- PHP >= 8.1
- Composer
- Laravel 10
- Fonnte API Key (You can obtain this by signing up at [Fonnte](https://fonnte.com))
## Installation
Follow the steps below to set up the project locally.
#### 1. Clone the Repository

```bash
git clone https://github.com/Evelynboswell/whatsapp-api.git
cd whatsapp-api
```
### 2. Install Dependencies
Run the following command to install all dependencies:
```
composer install
```
### 3. Set Up Environment Variables
Create a .env file by copying the example:
```
cp .env.example .env
```
In the .env file, set your Fonnte API credentials:
```
FONNTE_API_KEY=your_fonnte_api_key_here
FONNTE_BASE_URL=https://api.fonnte.com
```
### 4. Generate Application Key
Run the following command to generate a Laravel application key:
```
php artisan key:generate
```
### 5. Serve the Application
Run the following command to start the Laravel development server:
```
php artisan serve
```
Your application should now be running at http://127.0.0.1:8000.
## API Endpoints
The API consists of a single endpoint to send WhatsApp messages using Fonnte:
#### Send WhatsApp Message
- URL: /api/send-message
- Method: POST
- Headers:
- Authorization: Your Fonnte API key
- Content-Type: application/json
- Body:
```
{
  "phone": "628123456789",
  "message": "Hello, this is a test message!"
}
```
#### Example Request:
```
POST http://localhost:8000/api/send-message
Content-Type: application/json
Authorization: your_fonnte_api_key

{
    "phone": "628123456789",
    "message": "Hello, this is a test message!"
}
```
#### Example Response:
```
{
  "status": true,
  "message": "Message sent successfully!"
}
```
## Troubleshooting

### SSL Certificate Issues
If you encounter an SSL certificate error (e.g., cURL error 60: SSL certificate problem: unable to get local issuer certificate), you can temporarily bypass SSL verification in development by modifying the service to include withoutVerifying() in the HTTP request.
```
Http::withHeaders([
    'Authorization' => $this->apiKey
])->withoutVerifying()->post($this->baseUrl . '/send', [
    'target' => $phone,
    'message' => $message,
]);
```

### "Request Invalid on Disconnected Device"
If you encounter the error "reason": "request invalid on disconnected device", ensure that your WhatsApp device is connected to Fonnte:

- Log into your Fonnte account.
- Go to the Device section and reconnect your WhatsApp device by scanning the QR code.
- Verify that your WhatsApp number is active and working.

## Testing the API with Postman
To test this API using Postman:
- Open Postman and create a new POST request to: http://127.0.0.1:8000/api/send-message.
- Set the following headers:
- Authorization: your_fonnte_api_key
- Content-Type: application/json
- In the Body section, select raw and choose JSON. Add the following data:
```
{
    "phone": "628123456789",
    "message": "Test message from Postman"
}
```
- Click Send to send the message.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
