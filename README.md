# TravelEase - Travel Agency Website

## Overview

TravelEase is a modern, responsive travel agency website built with HTML5, CSS3, and JavaScript. The website showcases various travel services, destinations, and features a clean, user-friendly interface designed to provide an excellent user experience.

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

This project is available for personal and commercial use.

## Credits

- Font Awesome for icons
- Google Fonts for typography
- Inspiration from various travel websites

---

Developed with ❤️ for TravelEase