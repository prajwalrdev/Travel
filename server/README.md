# TravelEase Server

This is the backend server for the TravelEase website, handling contact form submissions, newsletter subscriptions, and booking payments.

## Features

- Contact form submission handling with email notifications
- Newsletter subscription management
- Booking system with Stripe payment integration
- Email confirmations for all interactions

## Prerequisites

- Node.js (v14 or higher)
- npm or yarn
- Stripe account for payment processing
- Email account for sending notifications

## Installation

1. Clone the repository
2. Navigate to the server directory:
   ```
   cd server
   ```
3. Install dependencies:
   ```
   npm install
   ```
4. Create a `.env` file based on the `.env.example` template and fill in your credentials:
   ```
   cp .env.example .env
   ```

## Configuration

Update the `.env` file with your credentials:

```
# Server Configuration
PORT=3000
NODE_ENV=development

# Email Configuration
EMAIL_USER=your_email@gmail.com
EMAIL_PASS=your_app_password
ADMIN_EMAIL=admin@example.com

# Stripe Configuration
STRIPE_SECRET_KEY=sk_test_your_stripe_secret_key
STRIPE_PUBLISHABLE_KEY=pk_test_your_stripe_publishable_key
```

### Email Configuration

For Gmail, you'll need to create an App Password:
1. Go to your Google Account > Security
2. Under "Signing in to Google," select "App passwords"
3. Generate a new app password for "Mail"
4. Use this password in the `EMAIL_PASS` field

### Stripe Configuration

1. Create a Stripe account at https://stripe.com
2. Get your API keys from the Stripe Dashboard
3. Add them to the `.env` file

## Running the Server

### Development Mode

```
npm run dev
```

This will start the server with nodemon, which automatically restarts when you make changes.

### Production Mode

```
npm start
```

## API Endpoints

### Contact Form

- **POST** `/api/contact`
  - Handles contact form submissions
  - Sends email notifications to admin and confirmation to customer

### Newsletter

- **POST** `/api/newsletter`
  - Handles newsletter subscriptions
  - Sends confirmation email to subscriber

### Booking

- **POST** `/api/create-payment-intent`
  - Creates a Stripe payment intent for booking
  - Returns client secret for frontend processing

- **POST** `/api/booking`
  - Processes booking with or without payment
  - Sends booking confirmation emails

## Frontend Integration

The frontend is already configured to communicate with this server. Make sure the server is running on the correct port (default: 3000) and that the API URL in the frontend JavaScript files is set correctly.

## Security Considerations

- The server uses CORS to restrict access to allowed origins
- Sensitive information is stored in environment variables
- Stripe handles payment information securely

## License

This project is licensed under the MIT License.