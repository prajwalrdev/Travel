# Service Setup Instructions

## To Make Service Links Work in WordPress

The service links in the index page are now properly configured, but you need to create WordPress pages for each service to make them work. Here's how to do it:

### Step 1: Create Service Pages

1. Go to **WordPress Admin → Pages → Add New**
2. Create a new page for each service with the following details:

#### City Taxi Service
- **Page Title**: City Taxi Service
- **Page Slug**: `city-taxi`
- **Template**: Select "City Taxi Service" from the Page Template dropdown
- **Publish** the page

#### Outstation Taxi Service
- **Page Title**: Outstation Taxi Service
- **Page Slug**: `outstation-taxi`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

#### Wedding Cars Service
- **Page Title**: Wedding Cars Service
- **Page Slug**: `wedding-cars`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

#### Airport Taxi Service
- **Page Title**: Airport Taxi Service
- **Page Slug**: `airport-taxi`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

#### Mini Bus Service
- **Page Title**: Mini Bus Service
- **Page Slug**: `mini-bus`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

#### Tempo Traveler Service
- **Page Title**: Tempo Traveler Service
- **Page Slug**: `tempo-traveler`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

#### Innova Cabs Service
- **Page Title**: Innova Cabs Service
- **Page Slug**: `innova-cabs`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

#### Ertiga Cabs Service
- **Page Title**: Ertiga Cabs Service
- **Page Slug**: `ertiga-cabs`
- **Template**: Select "Services Page" from the Page Template dropdown
- **Publish** the page

### Step 2: Verify Permalinks

1. Go to **WordPress Admin → Settings → Permalinks**
2. Make sure you have a permalink structure selected (not "Plain")
3. Click **Save Changes**

### Step 3: Test the Links

After creating all the pages:
1. Go to your homepage
2. Click on any "Learn More" button in the services section
3. You should be redirected to the corresponding service page

### How It Works

- The `travelease_get_service_url()` function in `functions.php` generates the correct URLs
- Each service page uses the appropriate template
- The `page-services.php` template handles most services
- The `page-city-taxi.php` template is specifically for the city taxi service
- All styling is consistent across all service pages

### Troubleshooting

If the links still don't work:
1. Make sure all pages are published
2. Check that the page slugs match exactly (case-sensitive)
3. Try refreshing your permalinks (Settings → Permalinks → Save Changes)
4. Clear any caching plugins if you have them

### Alternative: Quick Setup

If you want to test quickly, you can create just one page (e.g., City Taxi Service) and verify that the link works before creating all the others.
