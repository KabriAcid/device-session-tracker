# Device Session Tracker

Track your logged-in devices and sign out old ones automatically.

## Setup

1. Import `sql/schema.sql` into your MySQL db.
2. Edit `db.php` with credentials.
3. `composer install` (if using dependencies).
4. Deploy `login.php`, `dashboard.php`, etc.

## How it works

- Each login logs device info into `user_sessions`
- The dashboard lists sessions inactive for >180 days
- Users can sign them out with a click
