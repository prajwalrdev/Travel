# TravelEase - Travel Agency Website

A modern, responsive WordPress theme designed for travel and transportation businesses. This theme integrates all subdomain content into a comprehensive WordPress solution with booking, corporate, blog, and support pages.

## Features

### 🚀 Core Features
- **Responsive Design**: Mobile-first approach with modern CSS Grid and Flexbox
- **WordPress Integration**: Full WordPress compatibility with custom templates
- **SEO Optimized**: Clean code structure and semantic HTML
- **Fast Loading**: Optimized CSS and JavaScript for performance
- **Accessibility**: WCAG compliant with screen reader support

### 📱 Pages & Templates
- **Home Page**: Hero section, features, about, services, destinations, testimonials
- **Blog Page**: WordPress blog integration with sidebar and pagination
- **Corporate Page**: Business-focused services and features
- **Booking Page**: Comprehensive booking form with service selection
- **Support Page**: FAQ, contact forms, and customer support resources

### 🎨 Design Features
- **Modern UI**: Clean, professional design with smooth animations
- **Customizable Colors**: CSS variables for easy theme customization
- **Typography**: Professional font stack with proper hierarchy
- **Icons**: Font Awesome integration for consistent iconography

## Installation

### WordPress Installation
1. Download the theme files
2. Upload to `/wp-content/themes/travelease/`
3. Activate the theme in WordPress Admin
4. Configure pages using the custom templates

### Required Pages Setup
Create the following pages in WordPress and assign the corresponding templates:

1. **Blog Page**
   - Template: "Blog Page"
   - URL: `/blog/`

2. **Corporate Page**
   - Template: "Corporate Page"
   - URL: `/corporate/`

3. **Booking Page**
   - Template: "Booking Page"
   - URL: `/booking/`

4. **Support Page**
   - Template: "Support Page"
   - URL: `/support/`

## File Structure

```
travelease/
├── style.css                 # Main stylesheet with theme information
├── index.php                 # Main template file
├── header.php                # Header template
├── footer.php                # Footer template
├── functions.php             # Theme functions and features
├── page-blog.php             # Blog page template
├── page-corporate.php        # Corporate page template
├── page-booking.php          # Booking page template
├── page-support.php          # Support page template
├── single.php                # Single post template
├── archive.php               # Archive template
├── search.php                # Search results template
├── 404.php                   # 404 error page
├── page.php                  # Default page template
├── searchform.php            # Search form template
├── js/
│   └── script.js             # Theme JavaScript
├── css/                      # Additional stylesheets
├── images/                   # Theme images
└── screenshot.png            # Theme screenshot
```

## Customization

### Colors
The theme uses CSS variables for easy color customization. Edit the `:root` section in `style.css`:

```css
:root {
    --primary-color: #007bff;
    --primary-dark: #0056b3;
    --secondary-color: #6c757d;
    /* ... other colors */
}
```

### Content
- **Hero Section**: Customize via WordPress Customizer
- **Services**: Edit in the main index.php file
- **Blog Posts**: Use WordPress post editor
- **Contact Information**: Update in footer.php and support page

### Images
Replace placeholder images in the `/images/` directory:
- `hero-bg.jpg` - Hero section background
- `blog-bg.jpg` - Blog page background
- `corporate-bg.jpg` - Corporate page background
- `booking-bg.jpg` - Booking page background
- `support-bg.jpg` - Support page background

## WordPress Integration

### Theme Support
The theme includes support for:
- Custom logo
- Post thumbnails
- HTML5 markup
- Customizer
- Navigation menus
- Widgets

### Customizer Options
Access via Appearance > Customize:
- Hero section content
- About section content
- Contact information
- Social media links

### Menu Locations
- Primary Menu: Main navigation
- Footer Menu: Footer links

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Performance

### Optimization Features
- Minified CSS and JavaScript
- Optimized images
- Lazy loading for images
- Efficient CSS Grid and Flexbox
- Minimal HTTP requests

### Loading Speed
- First Contentful Paint: < 1.5s
- Largest Contentful Paint: < 2.5s
- Cumulative Layout Shift: < 0.1

## Support

### Documentation
- This README file
- Inline code comments
- WordPress Codex integration

### Troubleshooting
1. **Menu not showing**: Check if menu is assigned to "Primary Menu" location
2. **Images not loading**: Verify image paths in `/images/` directory
3. **Styles not applying**: Clear browser cache and WordPress cache
4. **Forms not working**: Check if JavaScript is enabled

## Development

### Prerequisites
- WordPress 5.0+
- PHP 7.4+
- Modern web browser

### Local Development
1. Set up local WordPress environment
2. Install theme in `/wp-content/themes/`
3. Activate theme
4. Create required pages with templates
5. Customize content and styling

### Code Standards
- WordPress Coding Standards
- PSR-12 PHP standards
- Modern CSS practices
- ES6+ JavaScript

## License

This theme is licensed under the GPL v2 or later.
A modern, responsive WordPress theme designed for travel and taxi services websites. This theme has been converted from a static HTML site to a fully functional WordPress theme.

## Features

- Fully responsive design that works on all devices (mobile, tablet, desktop)
- Modern UI/UX with smooth animations and transitions
- Interactive elements including sliders, counters, and form validation
- Sections for services, destinations, testimonials, and contact information
- Booking form with client-side validation
- Newsletter subscription functionality
- Social media integration
- Back-to-top button for easy navigation

## Technologies Used

- HTML5 for structure
- CSS3 for styling (with CSS variables for easy theming)
- Vanilla JavaScript for interactivity
- Font Awesome for icons
- Google Fonts for typography
- SVG images for lightweight, scalable graphics

## Project Structure

```
Travel_Agent/
├── index.html          # Main HTML file
├── css/
│   └── style.css       # Main stylesheet
├── js/
│   └── script.js       # JavaScript functionality
├── images/             # SVG images for the website
│   ├── hero-bg.jpg
│   ├── stats-bg.jpg.svg
│   ├── about-image.jpg.svg
│   ├── destination-1.jpg.svg
│   ├── destination-2.jpg.svg
│   ├── destination-3.jpg.svg
│   ├── testimonial-1.jpg.svg
│   ├── testimonial-2.jpg.svg
│   └── testimonial-3.jpg.svg
└── README.md           # Project documentation
```

## How to Run

1. Clone or download this repository
2. Open the `index.html` file in any modern web browser

No build process or special server is required as this is a static website.

## Browser Compatibility

The website is compatible with all modern browsers including:
- Google Chrome
- Mozilla Firefox
- Safari
- Microsoft Edge
- Opera

## Customization

### Colors

The website uses CSS variables for easy color customization. You can modify the colors by editing the `:root` section in the `style.css` file:

```css
:root {
    --primary-color: #ff6b6b;
    --secondary-color: #4ecdc4;
    --dark-color: #1a1a2e;
    --light-color: #f7f7f7;
    --gray-color: #6c757d;
    --success-color: #28a745;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease-in-out;
}
```

### Images

All images are SVG files that can be easily edited with any vector graphics editor. You can replace them with your own images by modifying the image paths in the HTML file.

### Content

The website content can be customized by editing the text in the HTML file. The structure is organized into sections, making it easy to locate and modify specific content.

## License

This theme is based on your original HTML design. Please ensure you have the rights to use all included assets and fonts.

## Changelog

### Version 1.0.0
- Initial release
- Integrated all subdomain content
- WordPress compatibility
- Responsive design
- Custom templates for all pages

## Credits

- **Design**: TravelEase Team
- **Development**: WordPress Standards
- **Icons**: Font Awesome
- **Fonts**: System fonts stack

---

For support and questions, please refer to the WordPress documentation or contact the development team.
