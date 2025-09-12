<?php
class Connection
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct()
    {
        global $conf;
        $this->host = $conf['DB_HOST'];
        $this->db_name = $conf['DB_NAME'];
        $this->username = $conf['DB_USER'];
        $this->password = $conf['DB_PASS'];
    }

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            die();
        }
        return $this->conn;
    }
    public function closeConnection()
    {
        $this->conn = null;
    }

    public function testConnection()
    {
        try {
            $conn = $this->getConnection();
            if ($conn) {
                return "Database connection successful!";
            }
        } catch (Exception $e) {
            return "Database connection failed: " . $e->getMessage();
        }
    }
}
