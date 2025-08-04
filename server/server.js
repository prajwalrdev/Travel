require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const nodemailer = require('nodemailer');
const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

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

// Create payment intent for Stripe
app.post('/api/create-payment-intent', async (req, res) => {
  const { amount, currency = 'usd' } = req.body;
  
  try {
    const paymentIntent = await stripe.paymentIntents.create({
      amount: Math.round(amount * 100), // Stripe requires amount in cents
      currency,
      automatic_payment_methods: {
        enabled: true,
      },
    });
    
    res.status(200).json({
      clientSecret: paymentIntent.client_secret,
    });
  } catch (error) {
    console.error('Error creating payment intent:', error);
    res.status(500).json({ error: error.message });
  }
});

// Process booking with payment
app.post('/api/booking', async (req, res) => {
  const { 
    name, email, phone, 
    pickup, destination, date, time, 
    vehicle, notes, paymentMethod, 
    paymentIntentId 
  } = req.body;
  
  try {
    // Verify payment if not cash
    if (paymentMethod !== 'cash' && paymentIntentId) {
      const paymentIntent = await stripe.paymentIntents.retrieve(paymentIntentId);
      
      if (paymentIntent.status !== 'succeeded') {
        return res.status(400).json({ success: false, message: 'Payment not completed' });
      }
    }
    
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
          <li><strong>Payment Method:</strong> ${paymentMethod}</li>
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

// Start server
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});