# TravelEase Subdomains

This directory contains subdomain configurations for the TravelEase website. In a real production environment, these would be configured as actual subdomains on the web server.

## Subdomain Structure

Each subdirectory represents a subdomain that would be configured on a live server:

- `booking.travelease.com` - Online booking portal
- `corporate.travelease.com` - Corporate client portal
- `blog.travelease.com` - Travel blog and updates
- `support.travelease.com` - Customer support portal

## Local Development

For local development and demonstration purposes, these can be accessed via the directory structure:

- `http://localhost:8000/subdomains/booking/`
- `http://localhost:8000/subdomains/corporate/`
- `http://localhost:8000/subdomains/blog/`
- `http://localhost:8000/subdomains/support/`

## Production Deployment

In a production environment, you would need to:

1. Configure DNS records for each subdomain
2. Set up virtual hosts on your web server
3. Configure SSL certificates for each subdomain
4. Ensure proper routing and security measures

This README is for demonstration purposes to show how subdomains would be structured in a real-world implementation.