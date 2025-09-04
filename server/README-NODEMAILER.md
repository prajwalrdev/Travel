# 🚀 Nodemailer Implementation for TSM Travells

## 📋 Quick Start

### 1. Install Dependencies
```bash
cd server
npm install
```

### 2. Configure Gmail
- Enable 2-Factor Authentication on `mangaloretaxicabservices@gmail.com`
- Generate App Password
- Update `config.js` with your app password

### 3. Start Server
```bash
# Windows
start-server.bat

# Linux/Mac
chmod +x start-server.sh
./start-server.sh

# Or manually
npm start
```

## 🔧 Configuration

### Gmail Setup
1. **Enable 2FA**: Go to Google Account → Security → 2-Step Verification
2. **Generate App Password**: Security → App passwords → Mail → Other
3. **Copy 16-character password**

### Update config.js
```javascript
module.exports = {
  email: {
    user: 'mangaloretaxicabservices@gmail.com',
    pass: 'your_16_char_app_password', // ← Replace this
    adminEmail: 'mangaloretaxicabservices@gmail.com'
  },
  // ... rest of config
};
```

## 📧 API Endpoints

### Contact Form
```bash
POST http://localhost:3000/api/contact
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "1234567890",
  "service": "City Taxi",
  "date": "2024-01-15",
  "time": "14:30",
  "message": "Need taxi service"
}
```

### Newsletter Subscription
```bash
POST http://localhost:3000/api/newsletter
Content-Type: application/json

{
  "email": "subscriber@example.com"
}
```

### Service Booking
```bash
POST http://localhost:3000/api/service-booking
Content-Type: application/json

{
  "name": "Jane Doe",
  "email": "jane@example.com",
  "phone": "9876543210",
  "serviceType": "airport",
  "pickupAddress": "123 Main St",
  "dropoffAddress": "Airport Terminal 1",
  "date": "2024-01-20",
  "time": "09:00",
  "vehicle": "Sedan"
}
```

## 🎨 Email Templates

### Contact Form - Admin Notification
- **From**: TSM Travells <mangaloretaxicabservices@gmail.com>
- **To**: mangaloretaxicabservices@gmail.com
- **Subject**: New Contact Form Submission - [Service]
- **Content**: Customer details, service info, contact information

### Contact Form - Customer Confirmation
- **From**: TSM Travells <mangaloretaxicabservices@gmail.com>
- **To**: Customer's email
- **Subject**: Thank you for contacting TSM Travells
- **Content**: Confirmation message, inquiry summary, company contact info

### Newsletter - Welcome Email
- **From**: TSM Travells <mangaloretaxicabservices@gmail.com>
- **To**: Subscriber's email
- **Subject**: Welcome to TSM Travells Newsletter!
- **Content**: Welcome message, service overview, company information

## 🔒 Security Features

- **Input Validation**: Client-side and server-side validation
- **CORS Protection**: Configured for web applications
- **Error Handling**: Comprehensive error logging
- **Rate Limiting**: Built-in protection against spam

## 🚨 Troubleshooting

### Common Issues

#### 1. "Invalid login" Error
```bash
# Check your config.js
pass: 'your_actual_app_password'  # No extra spaces
```

#### 2. "Connection timeout"
```bash
# Check firewall settings
# Verify port 3000 is open
# Try different SMTP ports (587, 465)
```

#### 3. Emails in Spam
- Add `mangaloretaxicabservices@gmail.com` to contacts
- Check spam folder
- Verify domain reputation

### Debug Mode
```javascript
// In server.js, add:
const transporter = nodemailer.createTransporter({
  // ... your config
  debug: true,
  logger: true
});
```

## 📱 Frontend Integration

### JavaScript Form Submission
```javascript
// Contact form
const formData = new FormData(form);
const formObject = {};
formData.forEach((value, key) => {
  formObject[key] = value;
});

const response = await fetch('http://localhost:3000/api/contact', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(formObject)
});
```

### Form Validation
```javascript
function validateForm(formData) {
  const errors = [];
  
  if (!formData.get('name') || formData.get('name').trim().length < 2) {
    errors.push('Name must be at least 2 characters long');
  }
  
  if (!formData.get('email') || !isValidEmail(formData.get('email'))) {
    errors.push('Please enter a valid email address');
  }
  
  if (!formData.get('phone') || !isValidPhone(formData.get('phone'))) {
    errors.push('Please enter a valid 10-digit phone number');
  }
  
  return errors;
}
```

## 🚀 Production Deployment

### Environment Variables
```bash
# Set in production environment
EMAIL_PASS=your_production_app_password
NODE_ENV=production
PORT=3000
```

### PM2 Process Manager
```bash
# Install PM2
npm install -g pm2

# Start with PM2
pm2 start server.js --name "tsm-travells-server"

# Monitor
pm2 monit

# Logs
pm2 logs tsm-travells-server
```

### Nginx Reverse Proxy
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    
    location /api/ {
        proxy_pass http://localhost:3000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }
}
```

## 📊 Monitoring

### Email Statistics
```javascript
// Track email performance
const emailStats = {
  sent: 0,
  failed: 0,
  lastSent: null
};

// After sending email
emailStats.sent++;
emailStats.lastSent = new Date();
console.log('Email Statistics:', emailStats);
```

### Health Check Endpoint
```javascript
// Add to server.js
app.get('/api/health', (req, res) => {
  res.json({
    status: 'healthy',
    timestamp: new Date().toISOString(),
    emailStats: emailStats
  });
});
```

## 🔄 Maintenance

### Regular Tasks
1. **Monitor email delivery rates**
2. **Check Gmail app password expiration**
3. **Update email templates**
4. **Review error logs**
5. **Backup configuration**

### Log Rotation
```bash
# Install logrotate
sudo apt-get install logrotate

# Configure log rotation
sudo nano /etc/logrotate.d/tsm-travells
```

## 📞 Support

- **Email**: mangaloretaxicabservices@gmail.com
- **Phone**: +91 8861505754
- **Documentation**: Check this README and NODEMAILER-SETUP-GUIDE.md

## ✅ Checklist

- [ ] Gmail 2FA enabled
- [ ] App password generated
- [ ] config.js updated
- [ ] Dependencies installed
- [ ] Server started
- [ ] Contact form tested
- [ ] Emails received
- [ ] Production deployment ready

---

**Next Steps**: 
1. Follow the setup guide
2. Test with your contact form
3. Deploy to production
4. Monitor email delivery
5. Customize templates as needed
