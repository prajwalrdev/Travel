require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const nodemailer = require('nodemailer');
const config = require('./config');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Nodemailer transporter setup
const transporter = nodemailer.createTransport({
  service: config.smtp.service,
  host: config.smtp.host,
  port: config.smtp.port,
  secure: config.smtp.secure,
  auth: {
    user: config.email.user,
    pass: process.env.EMAIL_PASS || config.email.pass
  }
});

// Verify transporter connection
transporter.verify(function(error, success) {
  if (error) {
    console.error('SMTP server connection error:', error);
  } else {
    console.log('SMTP server connection established, ready to send emails');
  }
});

// Routes

// Contact form submission
app.post('/api/contact', async (req, res) => {
  const { name, email, phone, service, date, time, message } = req.body;
  
  try {
    // Email to admin
    const adminMailOptions = {
      from: `"${config.company.name}" <${config.email.user}>`,
      to: config.email.adminEmail,
      subject: `New Contact Form Submission - ${service || 'General Inquiry'}`,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">New Contact Form Submission</h2>
          <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3 style="color: #007bff; margin-top: 0;">Customer Details:</h3>
            <p><strong>Name:</strong> ${name}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Phone:</strong> ${phone}</p>
            <p><strong>Service:</strong> ${service || 'General Inquiry'}</p>
            <p><strong>Date:</strong> ${date || 'Not specified'}</p>
            <p><strong>Time:</strong> ${time || 'Not specified'}</p>
            <p><strong>Message:</strong> ${message || 'No message provided'}</p>
          </div>
          <div style="background: #e9ecef; padding: 15px; border-radius: 5px; font-size: 14px;">
            <p style="margin: 0;"><strong>Company:</strong> ${config.company.name}</p>
            <p style="margin: 5px 0;"><strong>Address:</strong> ${config.company.address}</p>
            <p style="margin: 5px 0;"><strong>Phone:</strong> ${config.company.phone}</p>
          </div>
        </div>
      `
    };
    
    // Email to customer
    const customerMailOptions = {
      from: `"${config.company.name}" <${config.email.user}>`,
      to: email,
      subject: `Thank you for contacting ${config.company.name}`,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">Thank you for contacting us!</h2>
          <p>Dear <strong>${name}</strong>,</p>
          <p>We have received your inquiry about our <strong>${service || 'services'}</strong>. One of our representatives will contact you shortly to assist you further.</p>
          
          <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3 style="color: #007bff; margin-top: 0;">Your Inquiry Summary:</h3>
            <ul style="list-style: none; padding: 0;">
              <li style="margin: 10px 0;"><strong>Service:</strong> ${service || 'General Inquiry'}</li>
              <li style="margin: 10px 0;"><strong>Date:</strong> ${date || 'Not specified'}</li>
              <li style="margin: 10px 0;"><strong>Time:</strong> ${time || 'Not specified'}</li>
              <li style="margin: 10px 0;"><strong>Message:</strong> ${message || 'No message provided'}</li>
            </ul>
          </div>
          
          <div style="background: #e9ecef; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h4 style="margin-top: 0; color: #495057;">Need immediate assistance?</h4>
            <p style="margin: 5px 0;"><strong>Call us:</strong> <a href="tel:${config.company.phone}" style="color: #007bff;">${config.company.phone}</a></p>
            <p style="margin: 5px 0;"><strong>Email us:</strong> <a href="mailto:${config.email.adminEmail}" style="color: #007bff;">${config.email.adminEmail}</a></p>
            <p style="margin: 5px 0;"><strong>Address:</strong> ${config.company.address}</p>
          </div>
          
          <p>We look forward to serving you!</p>
          <p>Best regards,<br><strong>${config.company.name} Team</strong></p>
        </div>
      `
    };
    
    await transporter.sendMail(adminMailOptions);
    await transporter.sendMail(customerMailOptions);
    
    res.status(200).json({ success: true, message: 'Your message has been sent successfully!' });
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).json({ success: false, message: 'Failed to send message. Please try again later.' });
  }
});

// Newsletter subscription
app.post('/api/newsletter', async (req, res) => {
  const { email } = req.body;
  
  try {
    const mailOptions = {
      from: `"${config.company.name}" <${config.email.user}>`,
      to: email,
      subject: `Welcome to ${config.company.name} Newsletter!`,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">Welcome to our newsletter!</h2>
          <p>Dear Subscriber,</p>
          <p>Thank you for subscribing to the <strong>${config.company.name}</strong> newsletter! You will now receive updates about our latest offers, travel tips, and exclusive deals.</p>
          
          <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3 style="color: #007bff; margin-top: 0;">What you'll receive:</h3>
            <ul style="color: #495057;">
              <li>Special discounts and offers</li>
              <li>Travel tips and destination guides</li>
              <li>New service announcements</li>
              <li>Customer testimonials and stories</li>
            </ul>
          </div>
          
          <div style="background: #e9ecef; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h4 style="margin-top: 0; color: #495057;">Our Services:</h4>
            <p style="margin: 5px 0;">• City Taxi Services</p>
            <p style="margin: 5px 0;">• Airport Transfers</p>
            <p style="margin: 5px 0;">• Wedding Cars</p>
            <p style="margin: 5px 0;">• Group Transportation</p>
            <p style="margin: 5px 0;">• Outstation Travel</p>
          </div>
          
          <p>If you have any questions, feel free to contact us:</p>
          <p><strong>Phone:</strong> <a href="tel:${config.company.phone}" style="color: #007bff;">${config.company.phone}</a></p>
          <p><strong>Email:</strong> <a href="mailto:${config.email.adminEmail}" style="color: #007bff;">${config.email.adminEmail}</a></p>
          
          <p>Best regards,<br><strong>${config.company.name} Team</strong></p>
        </div>
      `
    };
    
    await transporter.sendMail(mailOptions);
    
    res.status(200).json({ success: true, message: 'You have successfully subscribed to our newsletter!' });
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).json({ success: false, message: 'Failed to subscribe. Please try again later.' });
  }
});

// Process booking without payment
app.post('/api/booking', async (req, res) => {
  const { 
    name, email, phone, 
    pickup, destination, date, time, 
    vehicle, notes 
  } = req.body;
  
  try {
    // Send confirmation email
    const mailOptions = {
      from: `"${config.company.name}" <${config.email.user}>`,
      to: email,
      subject: 'Your TravelEase Booking Confirmation',
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">Booking Confirmation</h2>
          <p>Dear <strong>${name}</strong>,</p>
          <p>Thank you for booking with <strong>${config.company.name}</strong>. Your booking has been confirmed!</p>
          <h3 style="color: #007bff; margin-top: 0;">Booking Details:</h3>
          <ul style="list-style: none; padding: 0;">
            <li style="margin: 10px 0;"><strong>Pickup:</strong> ${pickup}</li>
            <li style="margin: 10px 0;"><strong>Destination:</strong> ${destination}</li>
            <li style="margin: 10px 0;"><strong>Date:</strong> ${date}</li>
            <li style="margin: 10px 0;"><strong>Time:</strong> ${time}</li>
            <li style="margin: 10px 0;"><strong>Vehicle:</strong> ${vehicle}</li>
          </ul>
          <p>If you need to modify or cancel your booking, please contact us at <a href="mailto:${config.email.adminEmail}" style="color: #007bff;">${config.email.adminEmail}</a> or call us at <a href="tel:${config.company.phone}" style="color: #007bff;">${config.company.phone}</a>.</p>
          <p>Best regards,<br><strong>${config.company.name} Team</strong></p>
        </div>
      `
    };
    
    await transporter.sendMail(mailOptions);
    
    res.status(200).json({ success: true, message: 'Booking confirmed successfully!' });
  } catch (error) {
    console.error('Error processing booking:', error);
    res.status(500).json({ success: false, message: 'Failed to process booking. Please try again later.' });
  }
});

// Process service-specific bookings (airport, railway, etc.)
app.post('/api/service-booking', async (req, res) => {
  console.log('Received service booking request:', req.body);
  
  const { 
    name, email, phone, 
    serviceType, // e.g., 'airport', 'railway', etc.
    pickupAddress, dropoffAddress,
    airport, station, // Optional fields depending on service type
    date, time, vehicle,
    passengers, tripType, // Optional fields
    trainNumber, // Optional for railway bookings
    notes
  } = req.body;
  
  // Validate required fields
  if (!name || !email || !phone) {
    console.error('Missing required fields in service booking request');
    return res.status(400).json({ success: false, message: 'Name, email, and phone are required fields.' });
  }
  
  try {
    console.log('Processing service booking for:', email);
    
    // Prepare service-specific details for email
    let serviceDetails = '';
    
    if (serviceType && serviceType.includes('airport')) {
      serviceDetails = `
        <li style="margin: 10px 0;"><strong>Service:</strong> Airport Transfer</li>
        <li style="margin: 10px 0;"><strong>Airport:</strong> ${airport || 'Not specified'}</li>
      `;
    } else if (serviceType && (serviceType.includes('station') || serviceType.includes('railway'))) {
      serviceDetails = `
        <li style="margin: 10px 0;"><strong>Service:</strong> Railway Station Transfer</li>
        <li style="margin: 10px 0;"><strong>Station:</strong> ${station || 'Not specified'}</li>
        <li style="margin: 10px 0;"><strong>Train Number/Name:</strong> ${trainNumber || 'Not specified'}</li>
      `;
    } else if (serviceType && serviceType.includes('outstation')) {
      serviceDetails = `
        <li style="margin: 10px 0;"><strong>Service:</strong> Outstation Trip</li>
        <li style="margin: 10px 0;"><strong>Trip Type:</strong> ${tripType || 'One Way'}</li>
        <li style="margin: 10px 0;"><strong>Passengers:</strong> ${passengers || 'Not specified'}</li>
      `;
    } else {
      serviceDetails = `<li style="margin: 10px 0;"><strong>Service:</strong> ${serviceType || 'Taxi Service'}</li>`;
    }
    
    // Email to admin
    const adminMailOptions = {
      from: `"${config.company.name}" <${config.email.user}>`,
      to: config.email.adminEmail,
      subject: `New Service Booking - ${serviceType || 'Taxi Service'}`,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">New Service Booking</h2>
          <p><strong>Name:</strong> ${name}</p>
          <p><strong>Email:</strong> ${email}</p>
          <p><strong>Phone:</strong> ${phone}</p>
          <p><strong>Service Type:</strong> ${serviceType || 'Not specified'}</p>
          <p><strong>Pickup Address:</strong> ${pickupAddress || 'Not specified'}</p>
          <p><strong>Dropoff Address:</strong> ${dropoffAddress || 'Not specified'}</p>
          <p><strong>Date:</strong> ${date || 'Not specified'}</p>
          <p><strong>Time:</strong> ${time || 'Not specified'}</p>
          <p><strong>Vehicle:</strong> ${vehicle || 'Not specified'}</p>
          <p><strong>Notes:</strong> ${notes || 'No notes provided'}</p>
        </div>
      `
    };
    
    // Email to customer
    const customerMailOptions = {
      from: `"${config.company.name}" <${config.email.user}>`,
      to: email,
      subject: 'Your TravelEase Service Booking Confirmation',
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">Booking Confirmation</h2>
          <p>Dear <strong>${name}</strong>,</p>
          <p>Thank you for booking with <strong>${config.company.name}</strong>. Your service request has been received!</p>
          <h3 style="color: #007bff; margin-top: 0;">Booking Details:</h3>
          <ul style="list-style: none; padding: 0;">
            ${serviceDetails}
            <li style="margin: 10px 0;"><strong>Pickup Address:</strong> ${pickupAddress || 'Not specified'}</li>
            <li style="margin: 10px 0;"><strong>Dropoff Address:</strong> ${dropoffAddress || 'Not specified'}</li>
            <li style="margin: 10px 0;"><strong>Date:</strong> ${date || 'Not specified'}</li>
            <li style="margin: 10px 0;"><strong>Time:</strong> ${time || 'Not specified'}</li>
            <li style="margin: 10px 0;"><strong>Vehicle:</strong> ${vehicle || 'Not specified'}</li>
          </ul>
          <p>Our team will review your booking and contact you shortly to confirm the details.</p>
          <p>If you need to modify or cancel your booking, please contact us at <a href="mailto:${config.email.adminEmail}" style="color: #007bff;">${config.email.adminEmail}</a> or call us at <a href="tel:${config.company.phone}" style="color: #007bff;">${config.company.phone}</a>.</p>
          <p>Best regards,<br><strong>${config.company.name} Team</strong></p>
        </div>
      `
    };
    
    // Send emails
    console.log('Sending admin email to:', config.email.adminEmail);
    const adminInfo = await transporter.sendMail(adminMailOptions);
    console.log('Admin email sent:', adminInfo.response);
    
    console.log('Sending customer email to:', email);
    const customerInfo = await transporter.sendMail(customerMailOptions);
    console.log('Customer email sent:', customerInfo.response);
    
    console.log('Service booking processed successfully');
    res.status(200).json({ success: true, message: 'Your booking request has been received successfully!' });
  } catch (error) {
    console.error('Error processing service booking:', error);
    // More detailed error message for debugging
    const errorMessage = error.message || 'Unknown error';
    console.error('Error details:', errorMessage);
    
    res.status(500).json({ 
      success: false, 
      message: 'Failed to process booking. Please try again later.',
      error: process.env.NODE_ENV === 'development' ? errorMessage : undefined
    });
  }
});

// Start server
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});