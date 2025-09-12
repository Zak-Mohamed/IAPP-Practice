<?php
// Test database connection
require_once '../ClassAutoload.php';

// Manually include Connection class since autoloader might have path issues
require_once 'Connection.php';

echo "<h2>Database Connection Test</h2>";

try {
    $connection = new Connection();
    $result = $connection->testConnection();
    echo "<p style='color: green; font-size: 18px;'>✅ " . $result . "</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red; font-size: 18px;'>❌ Error: " . $e->getMessage() . "</p>";
}
?>