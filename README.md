# Recommendest Project

## Overview
Recommendest is a travel destination recommendation platform that provides users with personalized destination suggestions based on various criteria. The application is built primarily with PHP and utilizes a MySQL database for data storage.

## Features
- **Class Autoloading**: Automatically loads PHP classes for efficient management.
- **User Management**: Membership tiers (Non-Membership, Silver, Gold), create and manage user data.
- **Destinations Database**: Detailed information on various travel destinations.
- **Booking System**: Book visits with validation, view a summary of bookings.
- **Top-Up Functionality**: Users can top up account balances.
- **Responsive User Interface**: Modern design with interactive elements.
- **Session Management**: Secure handling of user sessions.

## Installation and Setup
### Prerequisites
- PHP 7.x or higher
- MySQL
- Web server (e.g., Apache or Nginx)

### Steps to Run Locally
1. Clone the repository to your local machine:
   ```bash
   git clone <repository_url>
   ```

2. Navigate to the project directory:
   ```bash
   cd Recommendest
   ```

3. Import the database schema located at `app/config/scheme.sql` into your MySQL database.

4. Modify the database configuration settings in `app/config/config.php` as needed to match your environment.

5. Start your PHP web server:
   ```bash
   php -S localhost:8000 -t public
   ```
   Alternatively, configure your web server to serve the `public` directory of the project.

6. Access the website by visiting: [http://localhost:8000](http://localhost:8000)

## Usage
- Navigate the application using the links provided in the navigation bar.
- Sign up as a user and explore destination recommendations.
- Use the booking system to schedule your visits and view your booking history.
- Top up your account to facilitate bookings.
