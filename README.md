# TravelEase WordPress Theme

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
- Initial WordPress theme conversion
- Added WordPress Customizer integration
- Implemented AJAX contact forms
- Added blog functionality
- Responsive design maintained
- SEO optimization

## Credits

- Font Awesome for icons
- Google Fonts for typography
- Original HTML/CSS/JS design by you