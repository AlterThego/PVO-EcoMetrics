<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About EcoMetrics

ECOMETRICS: SOCIO-ECONOMIC PROFILE AND INVENTORY SYSTEM OF BENGUET PROVINCIAL VETERINARY OFFICE

EcoMetrics is a a digital platform for socio-economic profiling and inventory management. This solution enhanced data accuracy, accessibility, and analysis capabilities, enabling the Bengetuet Provincial Veterinary Office (BPVO)and stakeholders to better understand economic impacts, identify trends, and make data-driven decisions to support animal-based livelihoods in the province.

Built with Laravel. An accessible, powerful, and provides tools required for large, robust applications powered by php.

## Features of EcoMetrics:

- User Authentication and Security
- Data Input and Management
- Data Visualization
- Data Analysis
- Report Generation and Export
- Miscellaneous Data Management
- User Management

## Requirements:
- composer [https://getcomposer.org/download/]
- node.js [https://nodejs.org/en/download/current]

## How to run the code?

1. composer install (zip and gd extensions should be enabled in php.ini)
2. npm install
3. cp .env.example .env
4. php artisan migrate (run with xampp)
5. php artisan key:generate
6. npm run dev
-->New Terminal
7. php artisan serve
-->New Terminal
8. OPTIONAL: php artisan db:seed (email: 'admin@benguet.gov.ph', password: 'admin@benguet.gov.ph')

*Login = http://127.0.0.1:8000/login
*Register = http://127.0.0.1:8000/register

