<?php
class layouts
{
    public function header($conf)
    {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>" . $conf['sacco_name'] . "</title>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f5f5f5;
                }
                .navbar {
                    background-color: #2c3e50;
                    padding: 1rem 0;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }
                .nav-container {
                    max-width: 1200px;
                    margin: 0 auto;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 0 20px;
                }
                .logo {
                    color: white;
                    font-size: 1.5rem;
                    font-weight: bold;
                    text-decoration: none;
                }
                .nav-links {
                    display: flex;
                    list-style: none;
                    margin: 0;
                    padding: 0;
                }
                .nav-links li {
                    margin-left: 2rem;
                }
                .nav-links a {
                    color: white;
                    text-decoration: none;
                    padding: 0.5rem 1rem;
                    border-radius: 4px;
                    transition: background-color 0.3s;
                }
                .nav-links a:hover {
                    background-color: #34495e;
                }
                .main-content {
                    max-width: 1200px;
                    margin: 2rem auto;
                    padding: 0 20px;
                }
            </style>
        </head>
        <body>
            <nav class='navbar'>
                <div class='nav-container'>
                    <a href='index.php' class='logo'>" . $conf['sacco_name'] . "</a>
                    <ul class='nav-links'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='member-registration.php'>Sign Up</a></li>
                        <li><a href='login.php'>Login</a></li>
                        <li><a href='booking.php'>Book Ride</a></li>
                        <li><a href='Tables/members_table.php'>View Members</a></li>
                    </ul>
                </div>
            </nav>
            <div class='main-content'>";
    }

    public function footer($conf)
    {
        echo "            </div>
            <footer style='background-color: #2c3e50; color: white; text-align: center; padding: 2rem 0; margin-top: 3rem;'>
                <p>Copyright &copy; " . $conf['sacco_name'] . " " . date("Y") . " - " . $conf['sacco_tagline'] . "</p>
                <p>Contact: " . $conf['sacco_phone'] . " | " . $conf['sacco_email'] . "</p>
            </footer>
        </body>
        </html>";
    }
}
