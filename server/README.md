# TSM Travells Backend Integration Guide

## 🚀 **Overview**

This backend system provides comprehensive functionality for your TSM Travells website, including:

- **Contact Form Processing** - Handle customer inquiries
- **Newsletter Subscription** - Manage email subscriptions
- **Form Validation** - Client-side and server-side validation
- **Email Notifications** - Automated customer and admin notifications
- **Security Features** - CSRF protection, input sanitization
- **Configuration Management** - Easy customization for your business

## 📁 **File Structure**

```
server/
├── config.php              # Main configuration file
├── process-forms.php       # Form processing backend
├── README.md              # This file
└── logs/                  # Error logs directory (create this)
    └── error.log
```

## ⚙️ **Setup Instructions**

### **Step 1: Basic Setup**

1. **Upload Files**: Upload the `server/` folder to your web hosting
2. **Set Permissions**: Ensure the `logs/` directory is writable (chmod 755)
3. **Test Connection**: Visit `yourdomain.com/server/process-forms.php` (should show "Method not allowed")

### **Step 2: Configure Email Settings**

Edit `server/config.php` and update these settings:

```php
// Email Configuration
define('ADMIN_EMAIL', 'your-email@domain.com');
define('ADMIN_NAME', 'Your Company Name');

// SMTP Configuration (recommended for better delivery)
define('SMTP_HOST', 'smtp.gmail.com'); // or your SMTP server
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
```

### **Step 3: Update Business Information**

```php
// Business Information
define('COMPANY_NAME', 'TSM Travells');
define('COMPANY_ADDRESS', 'Your Address');
define('COMPANY_PHONE', '+91 8861505754');
define('COMPANY_EMAIL', 'mangaloretaxicabservices@gmail.com');
```

### **Step 4: Test the System**

1. Fill out your contact form
2. Check if you receive the admin notification email
3. Check if the customer receives the confirmation email

## 🔧 **Configuration Options**

### **Email Settings**

#### **Option A: Basic PHP Mail (Default)**
```php
// Uses PHP's built-in mail() function
// Good for testing, may have delivery issues
```

#### **Option B: SMTP (Recommended)**
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
define('SMTP_ENCRYPTION', 'tls');
```

#### **Option C: Gmail Setup**
1. Enable 2-factor authentication on your Gmail
2. Generate an App Password
3. Use the App Password in SMTP_PASSWORD

### **Security Settings**

```php
// CSRF Protection
define('CSRF_TOKEN_EXPIRY', 3600); // 1 hour

// Rate Limiting
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_TIMEOUT', 900); // 15 minutes
```

### **Business Features**

```php
// Service Areas
$SERVICE_AREAS = [
    'central' => ['Hampankatta', 'Kankanady', 'Bejai'],
    'commercial' => ['Mangalore Central', 'State Bank'],
    // Add your areas
];

// Pricing Information
$PRICING = [
    'city_taxi' => [
        'per_km' => 15,
        'minimum_fare' => 50,
        'airport_pickup' => 100
    ],
    // Add your pricing
];
```

## 📧 **Email Templates**

### **Contact Form Email (Admin)**
- **Subject**: "New Contact Form Submission - TSM Travells"
- **Content**: Customer details, service type, date/time, message
- **Recipient**: Your business email

### **Contact Form Email (Customer)**
- **Subject**: "Thank you for contacting TSM Travells"
- **Content**: Confirmation message, inquiry details, contact information
- **Recipient**: Customer's email

### **Newsletter Subscription Email**
- **Subject**: "Newsletter Subscription Confirmed - TSM Travells"
- **Content**: Welcome message, benefits, contact information
- **Recipient**: Subscriber's email

## 🛡️ **Security Features**

### **CSRF Protection**
- Automatically generates and validates security tokens
- Prevents cross-site request forgery attacks
- Tokens expire after 1 hour

### **Input Sanitization**
- Removes malicious code from user inputs
- Validates email and phone number formats
- Prevents SQL injection and XSS attacks

### **Rate Limiting**
- Prevents form spam
- Configurable limits for different actions
- Automatic blocking of suspicious activity

## 📱 **Form Integration**

### **Contact Form**
```html
<form id="contactForm">
    <input type="hidden" name="form_type" value="contact">
    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <input type="tel" name="phone" required>
    <select name="service" required>
        <option value="">Select a service</option>
        <option value="city-taxi">City Taxi</option>
        <!-- Add more options -->
    </select>
    <button type="submit">Submit Inquiry</button>
</form>
```

### **Newsletter Form**
```html
<form id="newsletterForm">
    <input type="hidden" name="form_type" value="newsletter">
    <input type="email" name="email" required>
    <button type="submit">Subscribe</button>
</form>
```

## 🔍 **Troubleshooting**

### **Common Issues**

#### **1. Emails Not Sending**
- Check SMTP settings in `config.php`
- Verify server allows outgoing emails
- Check spam/junk folders
- Enable error logging to see specific errors

#### **2. Form Submission Fails**
- Check browser console for JavaScript errors
- Verify file paths are correct
- Ensure server supports PHP
- Check file permissions

#### **3. CSRF Token Errors**
- Clear browser cache and cookies
- Check if sessions are working
- Verify server time settings

### **Debug Mode**

Enable debug mode in `config.php`:
```php
define('DEBUG_MODE', true);
```

This will show detailed error messages and log information.

### **Error Logging**

Check the `logs/error.log` file for detailed error information:
```bash
tail -f server/logs/error.log
```

## 🚀 **Advanced Features**

### **Database Integration (Optional)**

For advanced features like customer management, you can add database support:

```php
// In config.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tsm_travells');
define('DB_USER', 'username');
define('DB_PASS', 'password');

// In process-forms.php
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // Store form submissions in database
} catch(PDOException $e) {
    // Handle database errors
}
```

### **SMS Integration**

Add SMS notifications using your preferred gateway:

```php
// In config.php
define('SMS_API_KEY', 'your-sms-api-key');
define('SMS_SENDER_ID', 'TSMTRAV');

// In process-forms.php
function sendSMS($phone, $message) {
    // Implement SMS sending logic
}
```

### **WhatsApp Integration**

Integrate with WhatsApp Business API:

```php
// In config.php
define('WHATSAPP_API_KEY', 'your-whatsapp-api-key');
define('WHATSAPP_PHONE_NUMBER', '918861505754');

// In process-forms.php
function sendWhatsApp($phone, $message) {
    // Implement WhatsApp sending logic
}
```

## 📊 **Monitoring & Analytics**

### **Form Analytics**
- Track form submissions
- Monitor conversion rates
- Identify popular services
- Analyze customer inquiries

### **Performance Monitoring**
- Response time tracking
- Error rate monitoring
- Server resource usage
- Email delivery rates

## 🔄 **Updates & Maintenance**

### **Regular Updates**
- Keep PHP version updated
- Monitor security advisories
- Update email templates
- Review and optimize code

### **Backup Strategy**
```php
// In config.php
define('AUTO_BACKUP', true);
define('BACKUP_FREQUENCY', 'daily');
define('BACKUP_RETENTION', 30);
```

### **Maintenance Mode**
```php
// In config.php
define('MAINTENANCE_MODE', true);
define('MAINTENANCE_MESSAGE', 'We are currently performing maintenance. Please check back soon.');
```

## 📞 **Support & Contact**

### **Technical Support**
- **Email**: support@tsmtravells.com
- **Phone**: +91 8861505754
- **WhatsApp**: +91 8861505754

### **Documentation**
- This README file
- Code comments in PHP files
- Configuration examples
- Troubleshooting guide

## 📝 **Customization Guide**

### **Adding New Form Types**

1. **Update `process-forms.php`**:
```php
case 'new_form_type':
    $response = processNewForm($_POST);
    break;
```

2. **Add processing function**:
```php
function processNewForm($data) {
    // Your custom logic here
    return ['success' => true, 'message' => 'Success!'];
}
```

3. **Update JavaScript**:
```javascript
submitForm(form, 'new_form_type');
```

### **Custom Email Templates**

Modify the email content in `process-forms.php`:
```php
$message = "
<html>
<head>
    <title>Your Custom Title</title>
</head>
<body>
    <h2>Your Custom Content</h2>
    <!-- Add your HTML content -->
</body>
</html>
";
```

### **Adding New Validation Rules**

Update the validation functions in `process-forms.php`:
```php
function validateCustomField($value) {
    // Add your validation logic
    return true; // or false
}
```

## 🎯 **Best Practices**

### **Security**
- Always validate and sanitize user inputs
- Use HTTPS for all form submissions
- Regularly update security settings
- Monitor for suspicious activity

### **Performance**
- Optimize database queries
- Use caching where appropriate
- Minimize file sizes
- Enable compression

### **User Experience**
- Provide clear error messages
- Show loading states
- Confirm successful submissions
- Offer multiple contact methods

### **Maintenance**
- Regular backups
- Monitor error logs
- Update dependencies
- Test functionality regularly

## 🚀 **Deployment Checklist**

- [ ] Upload all server files
- [ ] Set correct file permissions
- [ ] Configure email settings
- [ ] Update business information
- [ ] Test form submissions
- [ ] Verify email delivery
- [ ] Check error logging
- [ ] Test on mobile devices
- [ ] Verify security features
- [ ] Monitor performance

## 📈 **Future Enhancements**

- **Customer Portal** - Account management
- **Booking System** - Real-time availability
- **Payment Integration** - Online payments
- **Driver App** - Mobile application
- **Analytics Dashboard** - Business insights
- **Multi-language Support** - International customers
- **API Development** - Third-party integrations
- **Chatbot Integration** - Automated support

---

**Need Help?** Contact our support team at support@tsmtravells.com or call +91 8861505754