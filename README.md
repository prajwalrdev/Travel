# TravelEase WordPress Theme

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

- **Responsive Design**: Mobile-first approach with modern CSS
- **Customizable**: Extensive WordPress Customizer options
- **SEO Friendly**: Proper WordPress template tags and semantic HTML
- **Contact Forms**: AJAX-powered contact and newsletter forms
- **Blog Support**: Full blog functionality with archives and single posts
- **Social Media Integration**: Configurable social media links
- **Font Awesome Icons**: Beautiful iconography throughout
- **Google Maps Integration**: Embedded map in contact section

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme through the 'Appearance' menu in WordPress
3. Configure the theme using the WordPress Customizer

## Required Files

The theme includes all necessary WordPress template files:

- `style.css` - Theme header and main stylesheet
- `index.php` - Main template file
- `header.php` - Header template
- `footer.php` - Footer template
- `functions.php` - Theme functions and features
- `page.php` - Page template
- `single.php` - Single post template
- `archive.php` - Archive and category pages
- `search.php` - Search results
- `searchform.php` - Search form
- `404.php` - Error page template

## Customization

### WordPress Customizer Options

The theme includes extensive customization options in the WordPress Customizer:

#### Hero Section
- Hero title and subtitle
- Button text customization

#### About Section
- About title and subtitle
- Content editable through WordPress pages

#### Services Section
- Services title and subtitle

#### Contact Information
- Contact title and subtitle
- Address, phone numbers, and email addresses
- Working hours

#### Social Media
- Facebook, Twitter, Instagram, and LinkedIn URLs

### Menu Locations

The theme supports two menu locations:
- **Primary Menu**: Main navigation menu
- **Footer Menu**: Footer quick links

### Widget Areas

Currently, the theme uses static content, but you can easily add widget areas by modifying the template files.

## File Structure

```
travelease/
├── style.css              # Theme header and main stylesheet
├── index.php              # Main template
├── header.php             # Header template
├── footer.php             # Footer template
├── functions.php          # Theme functions
├── page.php               # Page template
├── single.php             # Single post template
├── archive.php            # Archive template
├── search.php             # Search results
├── searchform.php         # Search form
├── 404.php                # Error page
├── css/                   # Original CSS files
├── js/                    # Original JavaScript files
├── images/                # Theme images
├── services/              # Service pages
└── README.md              # This file
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Dependencies

- WordPress 5.0+
- PHP 7.4+
- Font Awesome 6.4.0 (CDN)
- Google Fonts (Poppins)

## Customization Tips

### Adding New Sections

To add new sections to the homepage:

1. Edit `index.php` to add your new section
2. Add customizer options in `functions.php`
3. Use `get_theme_mod()` to make content editable

### Modifying Colors

The theme uses CSS custom properties for colors. You can modify them in the main CSS file or add customizer color options.

### Adding Widget Areas

To add widget areas:

1. Register them in `functions.php` using `register_sidebar()`
2. Add them to your template files using `dynamic_sidebar()`

## Support

For support and customization requests, please refer to the original HTML/CSS/JS files in their respective directories.

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
