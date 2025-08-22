# TSM Travells - Professional Cab Services in Mangalore

A comprehensive WordPress theme for TSM Travells, offering professional cab services in Mangalore with a modern, responsive design and full backend integration.

## 🚗 Project Overview

TSM Travells is a leading cab service provider in Mangalore, offering a wide range of transportation services including city taxis, outstation travel, airport transfers, wedding cars, and group transportation via Tempo Travellers.

## ✨ Features

### 🎨 Frontend Features
- **Modern Responsive Design**: Mobile-first approach with beautiful animations
- **Service Pages**: Comprehensive individual service pages with detailed information
- **Interactive Forms**: AJAX-powered booking forms for all services
- **Loading Animations**: Smooth page transitions and service loading effects
- **FAQ Sections**: Expandable FAQ sections on service pages
- **Related Services**: Cross-linking between different service offerings

### 🔧 Backend Features
- **Form Processing**: Complete backend integration for all booking forms
- **Email Notifications**: Automated admin and customer confirmation emails
- **CSRF Protection**: Security measures for form submissions
- **Input Validation**: Server-side validation for all form inputs
- **Error Handling**: Comprehensive error handling and user feedback

### 📱 Services Offered
1. **City Taxi Services** - Local transportation within Mangalore
2. **Outstation Taxi** - Long-distance travel to nearby cities and tourist spots
3. **Airport Taxi** - Reliable airport transfers to/from Mangalore International Airport
4. **Wedding Cars** - Luxury vehicles for special occasions
5. **Tempo Traveller** - Group transportation for 12-15 passengers

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- WordPress 5.0 or higher
- Web server (Apache/Nginx)
- MySQL/MariaDB database

### Installation Steps

1. **Clone/Download the Project**
   ```bash
   git clone [repository-url]
   cd Travel
   ```

2. **WordPress Installation**
   - Upload the entire folder to your WordPress themes directory (`wp-content/themes/`)
   - Activate the theme from WordPress Admin → Appearance → Themes

3. **Backend Setup**
   - Ensure the `server/` folder is accessible via web
   - Configure email settings in `server/process-forms.php`
   - Set proper permissions for the server folder

4. **Configuration**
   - Update contact information in `server/config.php`
   - Modify business details in theme files as needed
   - Configure SMTP settings for email functionality

## 📁 Project Structure

```
Travel/
├── index.php                 # Main homepage template
├── header.php               # WordPress header template
├── footer.php               # WordPress footer template
├── functions.php            # WordPress theme functions
├── css/
│   └── style.css           # Main stylesheet with responsive design
├── js/
│   └── script.js           # JavaScript for interactions and forms
├── services/                # Individual service pages
│   ├── city-taxi.php       # City taxi service page
│   ├── outstation-taxi.php # Outstation taxi service page
│   ├── airport-taxi.php    # Airport transfer service page
│   ├── wedding-cars.php    # Wedding car service page
│   ├── tempo-traveler.php  # Tempo traveller service page
│   └── ...                 # Other service pages
├── server/                  # Backend processing
│   ├── process-forms.php   # Form processing and email handling
│   ├── config.php          # Configuration settings
│   └── README.md           # Backend documentation
├── images/                  # Theme images and assets
└── README.md               # This file
```

## 🎯 Key Components

### 1. Homepage (`index.php`)
- Hero section with call-to-action buttons
- Services overview with loading animations
- About section highlighting company strengths
- Why Choose Us section
- Booking process explanation
- Testimonials and statistics
- Contact form integration

### 2. Service Pages
Each service page includes:
- Hero section with service-specific information
- Detailed service description
- Feature highlights with icons
- Service areas and destinations
- Comprehensive booking forms
- Pricing information
- FAQ sections
- Related services

### 3. Backend Integration (`server/process-forms.php`)
- Form validation and sanitization
- CSRF protection
- Email notifications (admin + customer)
- Error handling and user feedback
- Support for all service types

### 4. JavaScript Functionality (`js/script.js`)
- Mobile menu handling
- Smooth scrolling
- Form submission via AJAX
- Loading animations
- FAQ accordion functionality
- Service page interactions

## 🔧 Configuration

### Email Configuration
Update email settings in `server/process-forms.php`:
```php
$config = [
    'admin_email' => 'your-email@domain.com',
    'admin_name' => 'Your Company Name',
    'smtp_host' => 'your-smtp-server.com',
    'smtp_port' => 587,
    'smtp_username' => 'your-username',
    'smtp_password' => 'your-password',
    'smtp_encryption' => 'tls'
];
```

### Business Information
Update company details in:
- `header.php` - Logo and company name
- `index.php` - Company descriptions and content
- `server/config.php` - Business information constants

## 📱 Responsive Design

The theme is fully responsive with:
- Mobile-first approach
- Breakpoints at 768px, 900px, and 1200px
- Touch-friendly navigation
- Optimized forms for mobile devices
- Flexible grid layouts

## 🎨 Customization

### Colors and Styling
- CSS custom properties for easy color changes
- Modular CSS structure
- Consistent design system
- Easy to modify and extend

### Content Updates
- Service information can be updated in individual PHP files
- Pricing information in service page templates
- Company information in main template files

## 🚀 Performance Features

- Optimized CSS and JavaScript
- Efficient form handling
- Minimal external dependencies
- Fast loading times
- SEO-friendly structure

## 🔒 Security Features

- CSRF token protection
- Input sanitization and validation
- Secure form processing
- Error logging and monitoring
- Admin-only access to sensitive areas

## 📧 Form Types Supported

1. **Contact Form** (`contact`)
2. **Newsletter Subscription** (`newsletter`)
3. **Outstation Taxi Booking** (`outstation_booking`)
4. **Airport Taxi Booking** (`airport_booking`)
5. **Wedding Car Booking** (`wedding_car_booking`)
6. **Tempo Traveller Booking** (`tempo_traveller_booking`)

## 🛠️ Development

### Adding New Services
1. Create new service page in `services/` folder
2. Follow the existing template structure
3. Add form handling in `server/process-forms.php`
4. Update JavaScript event listeners
5. Add CSS styles as needed

### Modifying Forms
1. Update HTML structure in service pages
2. Modify validation in backend processing
3. Update email templates
4. Test form submission and validation

## 📞 Support

For technical support or customization requests:
- Email: [your-email@domain.com]
- Phone: [your-phone-number]
- Documentation: Check `server/README.md` for backend details

## 📄 License

This project is proprietary software developed for TSM Travells. All rights reserved.

## 🔄 Updates and Maintenance

### Regular Maintenance
- Monitor form submissions and email delivery
- Update service information and pricing
- Check for WordPress compatibility updates
- Monitor performance and loading times

### Future Enhancements
- Database integration for bookings
- Customer dashboard
- Payment gateway integration
- SMS notifications
- Advanced booking calendar

---

**TSM Travells** - Your trusted partner for professional cab services in Mangalore. 🚗✨
