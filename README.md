## About this application

This is a simple information application made from Laravel and Vue.js. It is used to fetch weather and place information about a city.

## Why is the UI/UX implementation for this project the best?

The UI/UX is simple and can be opened on different devices and it offers instant information about the specific weather and temperature for the day as well as the nearby places to it with their respective complete addresses.

## Installation
1. Clone the repository to a local directory

2. Run these commands to install dependencies
```
composer install
npm install
```

3. Rename .env.example to .env in order to use external API (Openweather & Foursquare) env values, but you can also change the values to your API key
```
OPENWEATHER_APPID=
FOURSQUARE_APPID=
```

4. Run these commands to initialize the application
```
npm run dev
php artisan serve
```

5. Load the application in your browser
```
http://localhost:8000
```
