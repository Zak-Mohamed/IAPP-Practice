<?php
class forms {
    
    public function member_registration() {
        ?>
        <div style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h2 style="text-align: center; color: #2c3e50; margin-bottom: 2rem;">Sign Up Here</h2>
            
            <form action='member-submit.php' method='post' style="display: grid; gap: 1rem;">
                <div>
                    <label for='full_name' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Full Name:</label>
                    <input type='text' id='full_name' name='full_name' required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>
                
                <div>
                    <label for='id_number' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">National ID Number:</label>
                    <input type='text' id='id_number' name='id_number' required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>
                
                <div>
                    <label for='phone' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Phone Number:</label>
                    <input type='tel' id='phone' name='phone' required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>
                
                <div>
                    <label for='email' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Email Address:</label>
                    <input type='email' id='email' name='email' required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>
                
                <div>
                    <label for='address' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Physical Address:</label>
                    <textarea id='address' name='address' required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; min-height: 80px; resize: vertical;"></textarea>
                </div>
                
                <div>
                    <label for='employment' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Employment Status:</label>
                    <select id='employment' name='employment' required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                        <option value=''>Select Employment Status</option>
                        <option value='employed'>Employed</option>
                        <option value='self-employed'>Self-Employed</option>
                        <option value='student'>Student</option>
                        <option value='unemployed'>Unemployed</option>
                    </select>
                </div>
                
                <div>
                    <label for='monthly_income' style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Monthly Income (KSh):</label>
                    <input type='number' id='monthly_income' name='monthly_income' required min="0" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>
                
                <div style="text-align: center; margin-top: 1.5rem;">
                    <?php echo $this->submit_button('Join SACCO'); ?>
                </div>
                
                <div style="text-align: center; margin-top: 1rem;">
                    <a href='login.php' style="color: #3498db; text-decoration: none;">Already a member? Login here</a>
                </div>
            </form>
        </div>
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

        public function signin() {
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
            <p><a href='#'>Forgot Password?</a></p>
        </form>
        <?php
    }

    private function submit_button($text) {
        return "<button type='submit' style='background-color: #3498db; color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s;'>$text</button>";
    }
}   
