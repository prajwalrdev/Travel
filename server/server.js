require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const nodemailer = require('nodemailer');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Nodemailer transporter setup
const transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: process.env.EMAIL_USER,
    pass: process.env.EMAIL_PASS
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
      from: process.env.EMAIL_USER,
      to: process.env.ADMIN_EMAIL,
      subject: `New Contact Form Submission - ${service}`,
      html: `
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Phone:</strong> ${phone}</p>
        <p><strong>Service:</strong> ${service}</p>
        <p><strong>Date:</strong> ${date}</p>
        <p><strong>Time:</strong> ${time}</p>
        <p><strong>Message:</strong> ${message || 'No message provided'}</p>
      `
    };
    
    // Email to customer
    const customerMailOptions = {
      from: process.env.EMAIL_USER,
      to: email,
      subject: 'Thank you for contacting TravelEase',
      html: `
        <h2>Thank you for contacting TravelEase!</h2>
        <p>Dear ${name},</p>
        <p>We have received your inquiry about our ${service} service. One of our representatives will contact you shortly.</p>
        <p>Here's a summary of your request:</p>
        <ul>
          <li><strong>Service:</strong> ${service}</li>
          <li><strong>Date:</strong> ${date}</li>
          <li><strong>Time:</strong> ${time}</li>
        </ul>
        <p>If you have any urgent queries, please contact us at ${process.env.ADMIN_EMAIL} or call us at +1 (123) 456-7890.</p>
        <p>Best regards,<br>TravelEase Team</p>
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
      from: process.env.EMAIL_USER,
      to: email,
      subject: 'Welcome to TravelEase Newsletter!',
      html: `
        <h2>Thank you for subscribing to our newsletter!</h2>
        <p>Dear Subscriber,</p>
        <p>You will now receive updates about our latest offers, travel tips, and more.</p>
        <p>Best regards,<br>TravelEase Team</p>
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
      from: process.env.EMAIL_USER,
      to: email,
      subject: 'Your TravelEase Booking Confirmation',
      html: `
        <h2>Booking Confirmation</h2>
        <p>Dear ${name},</p>
        <p>Thank you for booking with TravelEase. Your booking has been confirmed!</p>
        <h3>Booking Details:</h3>
        <ul>
          <li><strong>Pickup:</strong> ${pickup}</li>
          <li><strong>Destination:</strong> ${destination}</li>
          <li><strong>Date:</strong> ${date}</li>
          <li><strong>Time:</strong> ${time}</li>
          <li><strong>Vehicle:</strong> ${vehicle}</li>
        </ul>
        <p>If you need to modify or cancel your booking, please contact us at ${process.env.ADMIN_EMAIL} or call us at +1 (123) 456-7890.</p>
        <p>Best regards,<br>TravelEase Team</p>
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
        <li><strong>Service:</strong> Airport Transfer</li>
        <li><strong>Airport:</strong> ${airport || 'Not specified'}</li>
      `;
    } else if (serviceType && (serviceType.includes('station') || serviceType.includes('railway'))) {
      serviceDetails = `
        <li><strong>Service:</strong> Railway Station Transfer</li>
        <li><strong>Station:</strong> ${station || 'Not specified'}</li>
        <li><strong>Train Number/Name:</strong> ${trainNumber || 'Not specified'}</li>
      `;
    } else if (serviceType && serviceType.includes('outstation')) {
      serviceDetails = `
        <li><strong>Service:</strong> Outstation Trip</li>
        <li><strong>Trip Type:</strong> ${tripType || 'One Way'}</li>
        <li><strong>Passengers:</strong> ${passengers || 'Not specified'}</li>
      `;
    } else {
      serviceDetails = `<li><strong>Service:</strong> ${serviceType || 'Taxi Service'}</li>`;
    }
    
    // Email to admin
    const adminMailOptions = {
      from: process.env.EMAIL_USER,
      to: process.env.ADMIN_EMAIL,
      subject: `New Service Booking - ${serviceType || 'Taxi Service'}`,
      html: `
        <h2>New Service Booking</h2>
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
      `
    };
    
    // Email to customer
    const customerMailOptions = {
      from: process.env.EMAIL_USER,
      to: email,
      subject: 'Your TravelEase Service Booking Confirmation',
      html: `
        <h2>Booking Confirmation</h2>
        <p>Dear ${name},</p>
        <p>Thank you for booking with TravelEase. Your service request has been received!</p>
        <h3>Booking Details:</h3>
        <ul>
          ${serviceDetails}
          <li><strong>Pickup Address:</strong> ${pickupAddress || 'Not specified'}</li>
          <li><strong>Dropoff Address:</strong> ${dropoffAddress || 'Not specified'}</li>
          <li><strong>Date:</strong> ${date || 'Not specified'}</li>
          <li><strong>Time:</strong> ${time || 'Not specified'}</li>
          <li><strong>Vehicle:</strong> ${vehicle || 'Not specified'}</li>
        </ul>
        <p>Our team will review your booking and contact you shortly to confirm the details.</p>
        <p>If you need to modify or cancel your booking, please contact us at ${process.env.ADMIN_EMAIL} or call us at +1 (123) 456-7890.</p>
        <p>Best regards,<br>TravelEase Team</p>
      `
    };
    
    // Send emails
    console.log('Sending admin email to:', process.env.ADMIN_EMAIL);
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