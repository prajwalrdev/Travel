# WordPress Editable Features Guide - TravelEase Theme

## Overview
The TravelEase theme has been converted to be fully editable through WordPress Customizer. All content on the homepage and other pages can now be modified without touching any code.

## How to Access the Customizer

1. **Login to WordPress Admin**
2. **Go to Appearance > Customize** (or click "Customize" in the admin bar when viewing your site)
3. **Navigate through the sections** to edit different parts of your site

## Available Customizer Sections

### 1. Hero Section
**Location:** Customize > Hero Section

**Editable Fields:**
- **Hero Title** - Main heading on the homepage
- **Hero Subtitle** - Subtitle text below the main heading
- **Button 1 Text** - Text for the "Our Services" button
- **Button 2 Text** - Text for the "Book Now" button

### 2. Features Section
**Location:** Customize > Features Section

**Editable Fields:**
- **Feature 1 Title & Description** - "Best Prices" feature
- **Feature 2 Title & Description** - "Best Drivers" feature
- **Feature 3 Title & Description** - "24*7 Call Assistance" feature
- **Feature 4 Title & Description** - "Special Discounts" feature
- **Feature 5 Title & Description** - "Full City Coverage" feature
- **Feature 6 Title & Description** - "No Booking Fee" feature

### 3. About Section
**Location:** Customize > About Section

**Editable Fields:**
- **About Title** - Section heading
- **About Subtitle** - Section subtitle
- **About Paragraph 1, 2, 3** - Main content paragraphs
- **Stat 1-4 Numbers & Text** - Statistics displayed in the about section

### 4. Services Section
**Location:** Customize > Services Section

**Editable Fields:**
- **Services Title** - Section heading
- **Services Subtitle** - Section subtitle

### 5. Vehicle Types Section
**Location:** Customize > Vehicle Types Section

**Editable Fields:**
- **Vehicle Types Title** - Section heading
- **Vehicle Types Subtitle** - Section subtitle

### 6. Destinations Section
**Location:** Customize > Destinations Section

**Editable Fields:**
- **Destinations Title** - Section heading
- **Destinations Subtitle** - Section subtitle
- **Destination 1-3 Title & Description** - Individual destination cards

### 7. Stats Section
**Location:** Customize > Stats Section

**Editable Fields:**
- **Stat 1-4 Numbers & Text** - Statistics displayed in the stats section

### 8. Testimonials Section
**Location:** Customize > Testimonials Section

**Editable Fields:**
- **Testimonials Title** - Section heading
- **Testimonials Subtitle** - Section subtitle
- **Testimonial 1-3 Content, Name & Role** - Individual testimonials

### 9. Contact Information
**Location:** Customize > Contact Information

**Editable Fields:**
- **Contact Title** - Contact section heading
- **Contact Subtitle** - Contact section subtitle
- **Address** - Business address
- **Phone 1 & 2** - Contact phone numbers
- **Email 1 & 2** - Contact email addresses
- **Working Hours Line 1 & 2** - Business hours

### 10. Social Media
**Location:** Customize > Social Media

**Editable Fields:**
- **Facebook URL** - Facebook page link
- **Twitter URL** - Twitter profile link
- **Instagram URL** - Instagram profile link
- **LinkedIn URL** - LinkedIn profile link

## Service Pages

### Individual Service Page Editing
Each service page has its own custom fields for editing:

1. **Go to Pages** in WordPress admin
2. **Find the service page** you want to edit (e.g., "Innova Cabs", "Ertiga Cabs")
3. **Scroll down** to find the custom meta boxes
4. **Edit the content** in the provided fields
5. **Update the page** to save changes

### Available Service Pages with Custom Fields:
- **Innova Cabs** - Hero, content sections, pricing, etc.
- **Ertiga Cabs** - Hero, services, packages, etc.

## Advanced Features

### 1. Service Page Creation Tool
**Location:** Tools > Create Service Pages

This tool automatically creates all service pages with proper templates and content (excluding booking and outstation taxi services).

### 2. Content Import Tool
**Location:** Tools > Import Service Content

This tool imports content from the `services/` folder into WordPress pages for editing.

### 3. Newsletter Integration
The footer newsletter form is fully functional and sends confirmation emails.

### 4. Contact Form Integration
The contact form on the homepage sends emails to the admin email address.

## Tips for Best Results

### 1. Content Guidelines
- Keep titles concise and engaging
- Use clear, benefit-focused descriptions
- Maintain consistent tone across all sections
- Include relevant keywords naturally

### 2. Image Management
- Upload images through the WordPress Media Library
- Use appropriate alt text for accessibility
- Optimize images for web (recommended size: 1200x800px)

### 3. SEO Optimization
- Use descriptive titles and meta descriptions
- Include relevant keywords in content
- Ensure all images have alt text
- Keep URLs clean and descriptive

### 4. Mobile Responsiveness
- Test all changes on mobile devices
- Ensure text is readable on small screens
- Check that buttons and links are easily tappable

## Troubleshooting

### Common Issues:

1. **Changes Not Appearing**
   - Clear any caching plugins
   - Refresh the page
   - Check if you saved the customizer changes

2. **Custom Fields Not Showing**
   - Ensure you're editing the correct page
   - Check if the page template is set correctly
   - Verify user permissions

3. **Forms Not Working**
   - Check email settings in WordPress
   - Verify SMTP configuration if using email plugins
   - Test with different email addresses

### Support
If you encounter issues:
1. Check the WordPress error logs
2. Disable plugins temporarily to identify conflicts
3. Contact your hosting provider for server-related issues

## File Structure

The theme maintains the following structure for easy management:
```
Travel/
├── css/
│   └── style.css
├── js/
│   └── script.js
├── images/
├── services/
├── functions.php (contains all customizer options)
├── index.php (editable homepage)
├── header.php
├── footer.php
└── page templates
```

## Conclusion

The TravelEase theme is now fully editable through WordPress, making it easy for non-technical users to manage and update their travel website content. All changes are made through the WordPress Customizer, ensuring a user-friendly experience while maintaining the professional design and functionality of the theme.
