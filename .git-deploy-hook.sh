#!/bin/bash
# Hostinger Post-Deployment Hook
# This runs automatically after Git deployment

echo "Running post-deployment setup..."

# Navigate to deployment directory
cd $HOME/public_html || exit 1

# Create config file from template
if [ -f "app/config-hostinger.php" ]; then
    cp app/config-hostinger.php app/config.php
    echo "✅ Config file created"
fi

# Set permissions
chmod 644 app/config.php 2>/dev/null
chmod -R 755 app/data 2>/dev/null

# Create data directory if missing
mkdir -p app/data
chmod 755 app/data

echo "✅ Post-deployment setup complete!"
