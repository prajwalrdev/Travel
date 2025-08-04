/**
 * Simple test script to verify server functionality
 * Run with: node test.js
 */

require('dotenv').config();
const nodemailer = require('nodemailer');
const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

// Test email configuration
async function testEmailConfig() {
  console.log('\n--- Testing Email Configuration ---');
  try {
    const transporter = nodemailer.createTransport({
      service: 'gmail',
      auth: {
        user: process.env.EMAIL_USER,
        pass: process.env.EMAIL_PASS
      }
    });

    // Verify connection configuration
    await transporter.verify();
    console.log('✅ Email configuration is valid');
    return true;
  } catch (error) {
    console.error('❌ Email configuration error:', error.message);
    return false;
  }
}

// Test Stripe configuration
async function testStripeConfig() {
  console.log('\n--- Testing Stripe Configuration ---');
  try {
    // Try to list customers (a simple API call)
    const customers = await stripe.customers.list({ limit: 1 });
    console.log('✅ Stripe configuration is valid');
    return true;
  } catch (error) {
    console.error('❌ Stripe configuration error:', error.message);
    return false;
  }
}

// Test environment variables
function testEnvironmentVariables() {
  console.log('\n--- Testing Environment Variables ---');
  const requiredVars = [
    'PORT',
    'EMAIL_USER',
    'EMAIL_PASS',
    'ADMIN_EMAIL',
    'STRIPE_SECRET_KEY',
    'STRIPE_PUBLISHABLE_KEY'
  ];

  const missingVars = [];

  requiredVars.forEach(varName => {
    if (!process.env[varName]) {
      missingVars.push(varName);
    }
  });

  if (missingVars.length === 0) {
    console.log('✅ All required environment variables are set');
    return true;
  } else {
    console.error('❌ Missing environment variables:', missingVars.join(', '));
    return false;
  }
}

// Run all tests
async function runTests() {
  console.log('=== TravelEase Server Test ===');
  
  const envResult = testEnvironmentVariables();
  const emailResult = await testEmailConfig();
  const stripeResult = await testStripeConfig();

  console.log('\n--- Test Summary ---');
  console.log(`Environment Variables: ${envResult ? '✅ PASS' : '❌ FAIL'}`);
  console.log(`Email Configuration: ${emailResult ? '✅ PASS' : '❌ FAIL'}`);
  console.log(`Stripe Configuration: ${stripeResult ? '✅ PASS' : '❌ FAIL'}`);

  if (envResult && emailResult && stripeResult) {
    console.log('\n✅ All tests passed! The server should work correctly.');
  } else {
    console.log('\n❌ Some tests failed. Please fix the issues before starting the server.');
  }
}

runTests();