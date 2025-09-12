<?php
require '../ClassAutoload.php';
// Get all members
$fetchMembers = new FetchMembers();
$members = $fetchMembers->getAllMembers();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Members Table - RideLink SACCO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e8f4fd;
        }
        .no-data {
            text-align: center;
            color: #7f8c8d;
            font-style: italic;
            padding: 40px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-link:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="back-link">← Back to Home</a>
        
        <h1>RideLink SACCO Members</h1>
        
        <?php if ($members && count($members) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Employment</th>
                        <th>Monthly Income</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($member['id']); ?></td>
                            <td><?php echo htmlspecialchars($member['member_id']); ?></td>
                            <td><?php echo htmlspecialchars($member['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($member['email']); ?></td>
                            <td><?php echo htmlspecialchars($member['phone']); ?></td>
                            <td><?php echo ucfirst(htmlspecialchars($member['employment'])); ?></td>
                            <td>KSh <?php echo number_format($member['monthly_income'], 2); ?></td>
                            <td><?php echo date('M d, Y', strtotime($member['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <p style="margin-top: 20px; color: #7f8c8d;">
                Total Members: <strong><?php echo count($members); ?></strong>
            </p>
        <?php else: ?>
            <div class="no-data">
                <h3>No Members Found</h3>
                <p>No members have been registered yet.</p>
                <p><a href="../member-registration.php">Register the first member</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
