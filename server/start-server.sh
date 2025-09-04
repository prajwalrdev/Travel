#!/bin/bash

echo "Starting TSM Travells Node.js Server..."
echo ""
echo "Make sure you have:"
echo "1. Node.js installed"
echo "2. Updated config.js with your Gmail app password"
echo "3. Gmail 2FA enabled"
echo ""
echo "Starting server on port 3000..."
echo ""

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "Error: Node.js is not installed. Please install Node.js first."
    exit 1
fi

# Check if npm is installed
if ! command -v npm &> /dev/null; then
    echo "Error: npm is not installed. Please install npm first."
    exit 1
fi

# Install dependencies if node_modules doesn't exist
if [ ! -d "node_modules" ]; then
    echo "Installing dependencies..."
    npm install
fi

# Start the server
npm start
