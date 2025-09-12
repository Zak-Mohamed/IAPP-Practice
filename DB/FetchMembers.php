<?php
// FetchMembers.php - handles all member database operations
require_once 'Connection.php';

class FetchMembers
{
         private $conn;
      private $connection;

         public function __construct()
    {
        $this->connection = new Connection();
        $this->conn = $this->connection->getConnection();
    }
        public function getAllMembers()
    {
        try {
            $query = "SELECT * FROM members ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error fetching members: " . $e->getMessage();
            return false;
        }
    } public function getMemberById($member_id)
    {
        try {
            $query = "SELECT * FROM members WHERE id = :member_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':member_id', $member_id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error fetching member: " . $e->getMessage();
            return false;
        }
    }


    public function addMember($member_data)
    {
        try {
            $query = "INSERT INTO members (full_name, id_number, phone, email, address, employment, monthly_income, password, member_id, created_at) 
                     VALUES (:full_name, :id_number, :phone, :email, :address, :employment, :monthly_income, :password, :member_id, NOW())";

            $stmt = $this->conn->prepare($query);
            $hashed_password = password_hash($member_data['password'], PASSWORD_DEFAULT);
            $member_id = $this->generateMemberId();

            $stmt->bindParam(':full_name', $member_data['full_name']);
            $stmt->bindParam(':id_number', $member_data['id_number']);
            $stmt->bindParam(':phone', $member_data['phone']);
            $stmt->bindParam(':email', $member_data['email']);
            $stmt->bindParam(':address', $member_data['address']);
            $stmt->bindParam(':employment', $member_data['employment']);
            $stmt->bindParam(':monthly_income', $member_data['monthly_income']);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':member_id', $member_id);

            if ($stmt->execute()) {
                $this->sendWelcomeEmail($member_data['full_name'], $member_data['email'], $member_id);
                return $member_id;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error adding member: " . $e->getMessage();
            return false;
        }
    }

    private function generateMemberId()
    {
        $prefix = 'RL';
        $year = date('Y');
        $random = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        return $prefix . $year . $random;
    }
        private function sendWelcomeEmail($member_name, $member_email, $member_id)
    {
        try {
            $sendMail = new SendMail();
            $sendMail->sendWelcomeEmail($member_name, $member_email, $member_id);
        } catch (Exception $e) {
            error_log("Failed to send welcome email: " . $e->getMessage());
        }
    }   public function __destruct()
    {
        $this->connection->closeConnection();
    }
}
