/**
 * Simple test script to verify server functionality
 * Run with: node test.js
 */

require('dotenv').config();
const nodemailer = require('nodemailer');

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



// Test environment variables
function testEnvironmentVariables() {
  console.log('\n--- Testing Environment Variables ---');
  const requiredVars = [
    'PORT',
    'EMAIL_USER',
    'EMAIL_PASS',
    'ADMIN_EMAIL'
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

  console.log('\n--- Test Summary ---');
  console.log(`Environment Variables: ${envResult ? '✅ PASS' : '❌ FAIL'}`);
  console.log(`Email Configuration: ${emailResult ? '✅ PASS' : '❌ FAIL'}`);

  if (envResult && emailResult) {
    console.log('\n✅ All tests passed! The server should work correctly.');
  } else {
    console.log('\n❌ Some tests failed. Please fix the issues before starting the server.');
  }
}

runTests();