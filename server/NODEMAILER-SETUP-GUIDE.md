# Nodemailer Setup Guide for TSM Travells

## 🚀 Overview

This guide will help you set up Nodemailer to send emails from your contact forms using the `mangaloretaxicabservices@gmail.com` email address.

## 📋 Prerequisites

1. **Gmail Account**: `mangaloretaxicabservices@gmail.com`
2. **Node.js**: Version 14 or higher
3. **npm**: Node package manager

## ⚙️ Step-by-Step Setup

### Step 1: Enable 2-Factor Authentication on Gmail

1. Go to [Google Account Settings](https://myaccount.google.com/)
2. Navigate to **Security**
3. Enable **2-Step Verification** if not already enabled
4. This is required to generate an App Password

### Step 2: Generate Gmail App Password

1. In Google Account Settings, go to **Security**
2. Under **2-Step Verification**, click **App passwords**
3. Select **Mail** as the app and **Other** as the device
4. Click **Generate**
5. **Copy the 16-character password** (you'll need this for the config)

### Step 3: Update Configuration

1. **Edit `server/config.js`**:
   ```javascript
   module.exports = {
     email: {
       user: 'mangaloretaxicabservices@gmail.com',
       pass: 'your_16_character_app_password_here', // Replace with your app password
       adminEmail: 'mangaloretaxicabservices@gmail.com'
     },
     // ... rest of config
   };
   ```

2. **Alternative: Use Environment Variables**:
   Create a `.env` file in your server directory:
   ```bash
   EMAIL_PASS=your_16_character_app_password_here
   ```

### Step 4: Install Dependencies

```bash
cd server
npm install
```

### Step 5: Test the Setup

1. **Start the server**:
   ```bash
   npm start
   ```

2. **Test with a contact form submission**:
   - Fill out your website's contact form
   - Check if you receive emails at `mangaloretaxicabservices@gmail.com`
   - Check if the customer receives a confirmation email

## 🔧 Configuration Options

### Gmail SMTP Settings
```javascript
smtp: {
  host: 'smtp.gmail.com',
  port: 587,
  secure: false, // Use TLS
  service: 'gmail'
}
```

### Alternative Email Providers

#### Outlook/Hotmail
```javascript
smtp: {
  host: 'smtp-mail.outlook.com',
  port: 587,
  secure: false,
  service: 'outlook'
}
```

#### Yahoo Mail
```javascript
smtp: {
  host: 'smtp.mail.yahoo.com',
  port: 587,
  secure: false,
  service: 'yahoo'
}
```

## 📧 Email Templates

The system includes professionally designed email templates for:

1. **Contact Form Submissions**
   - Admin notification with customer details
   - Customer confirmation with inquiry summary

2. **Newsletter Subscriptions**
   - Welcome email with service information
   - Company contact details

3. **Service Bookings**
   - Admin notification with booking details
   - Customer confirmation with booking summary

## 🛡️ Security Features

- **CSRF Protection**: Built-in token validation
- **Input Sanitization**: Prevents XSS attacks
- **Rate Limiting**: Prevents spam submissions
- **Secure SMTP**: TLS encryption for email transmission

## 🔍 Troubleshooting

### Common Issues

#### 1. "Invalid login" Error
- Verify your Gmail app password is correct
- Ensure 2-factor authentication is enabled
- Check if the password has any extra spaces

#### 2. "Connection timeout" Error
- Check your firewall settings
- Verify port 587 is not blocked
- Try using port 465 with `secure: true`

#### 3. Emails going to Spam
- Add `mangaloretaxicabservices@gmail.com` to your contacts
- Check Gmail's spam folder
- Verify your domain's SPF/DKIM records

### Debug Mode

Enable debug logging in your server:
```javascript
// In server.js
const transporter = nodemailer.createTransporter({
  // ... your config
  debug: true, // Enable debug output
  logger: true // Log to console
});
```

## 📱 Testing

### Test Contact Form
```bash
curl -X POST http://localhost:3000/api/contact \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "phone": "1234567890",
    "service": "City Taxi",
    "message": "Test message"
  }'
```

### Test Newsletter Subscription
```bash
curl -X POST http://localhost:3000/api/newsletter \
  -H "Content-Type: application/json" \
  -d '{
    "email": "test@example.com"
  }'
```

## 🚀 Production Deployment

### Environment Variables
Set these in your production environment:
```bash
EMAIL_PASS=your_production_app_password
NODE_ENV=production
PORT=3000
```

### SSL/HTTPS
For production, ensure your server uses HTTPS:
```javascript
const https = require('https');
const fs = require('fs');

const options = {
  key: fs.readFileSync('path/to/key.pem'),
  cert: fs.readFileSync('path/to/cert.pem')
};

https.createServer(options, app).listen(443);
```

### Monitoring
Monitor email delivery:
```javascript
transporter.verify(function(error, success) {
  if (error) {
    console.error('SMTP connection failed:', error);
    // Send alert to admin
  } else {
    console.log('SMTP server ready');
  }
});
```

## 📊 Email Analytics

Track email performance:
```javascript
// Log email statistics
const emailStats = {
  sent: 0,
  failed: 0,
  lastSent: null
};

// After sending email
emailStats.sent++;
emailStats.lastSent = new Date();

// Log statistics
console.log('Email Statistics:', emailStats);
```

## 🔄 Maintenance

### Regular Tasks
1. **Monitor email delivery rates**
2. **Check Gmail app password expiration**
3. **Update email templates as needed**
4. **Review spam reports**

### Backup Configuration
Keep a backup of your email configuration:
```javascript
// backup-config.js
module.exports = {
  email: {
    user: 'mangaloretaxicabservices@gmail.com',
    pass: 'backup_app_password',
    adminEmail: 'mangaloretaxicabservices@gmail.com'
  }
};
```

## 📞 Support

If you encounter issues:
- **Email**: mangaloretaxicabservices@gmail.com
- **Phone**: +91 8861505754
- **Check logs**: `server/logs/error.log`

## ✅ Checklist

- [ ] Gmail 2FA enabled
- [ ] App password generated
- [ ] Configuration updated
- [ ] Dependencies installed
- [ ] Server started
- [ ] Contact form tested
- [ ] Emails received
- [ ] Production deployment ready

---

**Note**: Keep your Gmail app password secure and never commit it to version control. Use environment variables or secure configuration management in production.
