<?php
class forms {
    
    public function member_registration() {
        ?>
        <form action='member-submit.php' method='post'>
            <label for='full_name'>Full Name:</label>
            <input type='text' id='full_name' name='full_name' required><br><br>
            
            <label for='id_number'>National ID Number:</label>
            <input type='text' id='id_number' name='id_number' required><br><br>
            
            <label for='phone'>Phone Number:</label>
            <input type='tel' id='phone' name='phone' required><br><br>
            
            <label for='email'>Email Address:</label>
            <input type='email' id='email' name='email' required><br><br>
            
            <label for='address'>Physical Address:</label>
            <textarea id='address' name='address' required></textarea><br><br>
            
            <label for='employment'>Employment Status:</label>
            <select id='employment' name='employment' required>
                <option value=''>Select Employment Status</option>
                <option value='employed'>Employed</option>
                <option value='self-employed'>Self-Employed</option>
                <option value='student'>Student</option>
                <option value='unemployed'>Unemployed</option>
            </select><br><br>
            
            <label for='monthly_income'>Monthly Income (KSh):</label>
            <input type='number' id='monthly_income' name='monthly_income' required min="0"><br><br>
            
            <?php echo $this->submit_button('Join SACCO'); ?>
            <a href='login.php'>Already a member? Login here</a>
        </form>
        <?php
    }

    public function driver_registration() {
        ?>
        <form action='driver-submit.php' method='post'>
            <label for='full_name'>Full Name:</label>
            <input type='text' id='full_name' name='full_name' required><br><br>
            
            <label for='license_number'>Driving License Number:</label>
            <input type='text' id='license_number' name='license_number' required><br><br>
            
            <label for='license_class'>License Class:</label>
            <select id='license_class' name='license_class' required>
                <option value=''>Select License Class</option>
                <option value='A'>Class A (Motorcycles)</option>
                <option value='B'>Class B (Light Vehicles)</option>
                <option value='C'>Class C (Heavy Vehicles)</option>
                <option value='D'>Class D (Public Service Vehicles)</option>
            </select><br><br>
            
            <label for='experience_years'>Years of Driving Experience:</label>
            <input type='number' id='experience_years' name='experience_years' required min="0" max="50"><br><br>
            
            <label for='phone'>Phone Number:</label>
            <input type='tel' id='phone' name='phone' required><br><br>
            
            <label for='email'>Email Address:</label>
    <input type='email' id='email' name='email' required><br><br>
            
            <label for='vehicle_type'>Vehicle Type:</label>
            <select id='vehicle_type' name='vehicle_type' required>
                <option value=''>Select Vehicle Type</option>
                <option value='matatu'>Matatu (14-seater)</option>
                <option value='bus'>Bus (25+ seater)</option>
                <option value='taxi'>Taxi (4-seater)</option>
                <option value='motorcycle'>Motorcycle (Boda-boda)</option>
            </select><br><br>
            
            <?php echo $this->submit_button('Apply as Driver'); ?>
            <a href='login.php'>Already registered? Login here</a>
</form>
<?php
    }

    public function ride_booking() {
        ?>
        <form action='booking-submit.php' method='post'>
            <label for='pickup_location'>Pickup Location:</label>
            <select id='pickup_location' name='pickup_location' required>
                <option value=''>Select Pickup Location</option>
                <option value='nairobi-cbd'>Nairobi CBD</option>
                <option value='westlands'>Westlands</option>
                <option value='karen'>Karen</option>
                <option value='rongai'>Rongai</option>
                <option value='thika'>Thika</option>
            </select><br><br>
            
            <label for='destination'>Destination:</label>
            <select id='destination' name='destination' required>
                <option value=''>Select Destination</option>
                <option value='nairobi-cbd'>Nairobi CBD</option>
                <option value='westlands'>Westlands</option>
                <option value='karen'>Karen</option>
                <option value='rongai'>Rongai</option>
                <option value='thika'>Thika</option>
            </select><br><br>
            
            <label for='travel_date'>Travel Date:</label>
            <input type='date' id='travel_date' name='travel_date' required><br><br>
            
            <label for='travel_time'>Preferred Time:</label>
            <select id='travel_time' name='travel_time' required>
                <option value=''>Select Time</option>
                <option value='06:00'>6:00 AM</option>
                <option value='07:00'>7:00 AM</option>
                <option value='08:00'>8:00 AM</option>
                <option value='09:00'>9:00 AM</option>
                <option value='17:00'>5:00 PM</option>
                <option value='18:00'>6:00 PM</option>
                <option value='19:00'>7:00 PM</option>
            </select><br><br>
            
            <label for='passenger_name'>Passenger Name:</label>
            <input type='text' id='passenger_name' name='passenger_name' required><br><br>
            
            <label for='phone'>Contact Phone:</label>
            <input type='tel' id='phone' name='phone' required><br><br>
            
            <label for='seats'>Number of Seats:</label>
            <input type='number' id='seats' name='seats' required min="1" max="14" value="1"><br><br>
            
            <?php echo $this->submit_button('Book Ride'); ?>
            <a href='login.php'>Member? Login for faster booking</a>
        </form>
        <?php
    }

        public function member_login() {
        ?>
        <form action='login-process.php' method='post'>
            <label for='member_id'>Member ID / Email:</label>
            <input type='text' id='member_id' name='member_id' required><br><br>
            
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' required><br><br>
            
            <label>
                <input type='checkbox' name='remember_me'> Remember me
            </label><br><br>
            
            <?php echo $this->submit_button('Login'); ?>
            
            <p><a href='member-registration.php'>Not a member? Join SACCO</a></p>
            <p><a href='driver-registration.php'>Want to drive? Apply here</a></p>
            <p><a href='#'>Forgot Password?</a></p>
        </form>
        <?php
    }

    private function submit_button($text) {
        return "<button type='submit'>$text</button>";
    }
}   
