# Fitness Class Booking System
PHP (8.2.4), JS, HTML, Tailwind CSS

**To run:**
- (if needed) Import `config/gym.sql` to local mySQL db
- Start XAMPP servers
- Go to `http://localhost/gym`
- Log in with an existing account:
  - (regular user) email `ash@catchem.com` & password `P@s5word`
  - (admin) email `admin@gym.com` & password `P@s5word`
- Or register new test user
    - To add admin access to a newly created account, change the value in the user's `is_admin` column of the users table to `1` (true). If you are logged in, you will need to log out and log in again for the change to take effect.
      - Admin accounts will see the `Admin Panel` option in their nav manu when logged in


### Contributions


#### Aniket Sandhu
- 404 page 
- account info page 
- membership page 
- Admin

#### Gurkeerit Braich
- My Bookings (View bookings, Reschedule Appointment, Cancel Booking)
- Confirm Booking (Capacity Check, Double Booking Check )
- Home Page (Links, Welcome Message for User, Latest upcoming class, Gym Bulletin)
- Css / design update 

#### Sho Okano
- Instructor list (list all instructors)
- Individual instructor view (display instructor's info and classes taught)
- Booking calendar (display class events for selected week, filter by class type)
- Class event view (display class details, check if user is already registered)
- General project structure, database design & implementation, navigation menu & routing, middleware
