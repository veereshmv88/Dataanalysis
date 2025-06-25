<?php
session_start();
include("connect.php");

// Enhanced security checks
if (!isset($_SESSION['email']) || !filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: login.php");
    exit();
}

// Secure database query with error handling
$user = null;
$userInitial = 'U';
$email = $_SESSION['email'];

try {
    $stmt = $conn->prepare("SELECT firstName, lastName FROM `users` WHERE email = ? LIMIT 1");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Sanitize user data
            $user['firstName'] = htmlspecialchars($user['firstName'], ENT_QUOTES, 'UTF-8');
            $userInitial = strtoupper(substr($user['firstName'], 0, 1));
        }
        $stmt->close();
    }
} catch (Exception $e) {
    // Log error for admin, show generic message to user
    error_log("Database error: " . $e->getMessage());
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BizBooster - Business Growth Platform">
    <title>Welcome to BizBooster</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --primary-light: #6366F1;
            --secondary: #10B981;
            --light: #F9FAFB;
            --dark: #111827;
            --gray: #6B7280;
            --light-gray: #E5E7EB;
            --border-radius: 12px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }
        
        .welcome-container {
            width: 100%;
            max-width: 480px;
        }
        
        .welcome-card {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }
        
        .logo-icon {
            color: var(--secondary);
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 600;
            margin: 0 auto 1.5rem;
            box-shadow: var(--shadow);
        }
        
        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .welcome-message {
            color: var(--gray);
            margin-bottom: 2rem;
            font-size: 1.05rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            box-shadow: var(--shadow);
            gap: 0.5rem;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }
        
        .btn i {
            font-size: 1rem;
        }
        
        .secondary-text {
            color: var(--gray);
            font-size: 0.875rem;
            margin-top: 2rem;
            display: block;
        }
        
        @media (max-width: 480px) {
            .welcome-card {
                padding: 1.75rem;
            }
            
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-card">
            <div class="logo">
                <i class="fas fa-rocket logo-icon"></i>
                <span>BizBooster</span>
            </div>
            
            <div class="user-avatar">
                <?php echo $userInitial; ?>
            </div>
            
            <h1>Welcome back<?php echo $user ? ', ' . $user['firstName'] : ''; ?></h1>
            
            <p class="welcome-message">
                We're delighted to have you back. BizBooster provides the tools you need to streamline operations, 
                analyze performance, and accelerate your business growth.
            </p>
            
            <a href="dashboard.php" class="btn">
                <i class="fas fa-tachometer-alt"></i>
                Go to Dashboard
            </a>
            
            <span class="secondary-text">
                Last login: <?php echo date('F j, Y \a\t g:i a'); ?>
            </span>
        </div>
    </div>
</body>
</html>