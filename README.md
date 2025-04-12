<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsightFlow Analytics Dashboard</title>
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="script.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: linear-gradient(135deg, #f5f7ff 0%, #eef2ff 100%);
        }
        
        .dashboard {
            max-width: 1200px;
            width: 100%;
            text-align: center;
        }
        
        .header {
            margin-bottom: 3rem;
            position: relative;
        }
        
        .company-name {
            font-size: 4rem;
            font-weight: 800;
            color: #1e40af;
            margin-bottom: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }
        
        .company-name.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .company-name::after {
            content: "";
            display: block;
            width: 150px;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
            margin: 10px auto;
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 1s ease-out;
        }
        
        .company-name.visible::after {
            transform: scaleX(1);
        }
        
        .company-tagline {
            font-size: 1.25rem;
            color: #4b5563;
            margin-bottom: 2rem;
            font-weight: 400;
            letter-spacing: 0.5px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease 0.3s;
        }
        
        .company-tagline.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .options {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }
        
        .option-card {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            width: 350px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            border: 1px solid #e5e7eb;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .option-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .option-card:nth-child(1) {
            transition-delay: 0.2s;
        }
        
        .option-card:nth-child(2) {
            transition-delay: 0.4s;
        }
        
        .option-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
        }
        
        .option-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: #d1d5db;
        }
        
        .option-icon {
            font-size: 2.5rem;
            color: #1d4ed8;
            margin-bottom: 20px;
            background: #eff6ff;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            transition: all 0.3s ease;
        }
        
        .option-card:hover .option-icon {
            transform: scale(1.1);
            background: #3b82f6;
            color: white;
        }
        
        .option-title {
            font-size: 1.75rem;
            margin-bottom: 15px;
            color: #1e293b;
            font-weight: 600;
        }
        
        .option-desc {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .quick-stats {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
            flex-wrap: wrap;
            gap: 20px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.6s;
        }
        
        .quick-stats.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-left: 4px solid #3b82f6;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .recent-activity {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-top: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            text-align: left;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.8s;
        }
        
        .recent-activity.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .section-title {
            font-size: 1.5rem;
            color: #1e293b;
            margin-bottom: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #3b82f6;
        }
        
        .activity-text {
            flex: 1;
        }
        
        .activity-time {
            color: #9ca3af;
            font-size: 0.85rem;
        }
        
        .footer {
            margin-top: 50px;
            color: #6b7280;
            font-size: 0.9rem;
            padding: 20px;
            opacity: 0;
            transition: all 0.6s ease 1s;
        }
        
        .footer.visible {
            opacity: 1;
        }
        
        .floating-letters span {
            display: inline-block;
            transition: transform 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .company-name {
                font-size: 2.5rem;
            }
            
            .option-card {
                width: 100%;
                max-width: 350px;
            }
            
            .stat-card {
                width: 45%;
                min-width: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <div class="company-name" id="companyName">
                <i class="fas fa-chart-network"></i>
                <div class="floating-letters">
                    <span>B</span>
                    <span>i</span>
                    <span>z</span>
                    <span>B</span>
                    <span>o</span>
                    <span>o</span>
                    <span>s</span>
                    <span>t</span>
                    <span>e</span>
                    <span>r</span>
                </div>
            </div>
            <div class="company-tagline" id="companyTagline">
                Data-Driven Decisions for Modern Businesses
            </div>
        </div>
        
        
        <div class="options" id="options">
            <!-- Product Based Card - links to product.html -->
            <a href="product.html" class="option-card">
                <div class="option-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <h2 class="option-title">Product Analytics</h2>
                <p class="option-desc">Comprehensive analysis of product performance, inventory metrics, and sales trends to optimize your product strategy.</p>
                <div class="activity-time">Last updated: Today</div>
            </a>
            
            <!-- Service Based Card - links to service.html -->
            <a href="service.html" class="option-card">
                <div class="option-icon">
                    <i class="fas fa-handshake-angle"></i>
                </div>
                <h2 class="option-title">Service Analytics</h2>
                <p class="option-desc">Detailed tracking of service delivery, customer engagement, and performance metrics to enhance service quality.</p>
                <div class="activity-time">Last updated: Today</div>
            </a>
        </div>
        
        <div class="quick-stats" id="quickStats">
            <div class="stat-card">
                <div class="stat-value">12,548</div>
                <div class="stat-label">Active Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">89%</div>
                <div class="stat-label">Satisfaction</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">245</div>
                <div class="stat-label">New Clients</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">$1.2M</div>
                <div class="stat-label">Revenue</div>
            </div>
        </div>
        
        <div class="recent-activity" id="recentActivity">
            <h2 class="section-title">
                <i class="fas fa-bell"></i>
                Recent Activity
            </h2>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-file-import"></i>
                </div>
                <div class="activity-text">
                    New product data imported from Shopify
                </div>
                <div class="activity-time">10 min ago</div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="activity-text">
                    Quarterly report generated for executive review
                </div>
                <div class="activity-time">1 hour ago</div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="activity-text">
                    5 new users added to the Marketing team
                </div>
                <div class="activity-time">3 hours ago</div>
            </div>
        </div>
        
        <div class="footer" id="footer">
            © 2025 BizBooster Analytics Platform | v2.4.1
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Make elements visible on load with staggered delays
            setTimeout(() => {
                document.getElementById('companyName').classList.add('visible');
            }, 300);
            
            setTimeout(() => {
                document.getElementById('companyTagline').classList.add('visible');
            }, 800);
            
            setTimeout(() => {
                document.getElementById('options').querySelectorAll('.option-card').forEach(card => {
                    card.classList.add('visible');
                });
            }, 1000);
            
            setTimeout(() => {
                document.getElementById('quickStats').classList.add('visible');
            }, 1400);
            
            setTimeout(() => {
                document.getElementById('recentActivity').classList.add('visible');
            }, 1800);
            
            setTimeout(() => {
                document.getElementById('footer').classList.add('visible');
            }, 2200);
            
            // Floating letters effect for company name
            const letters = document.querySelectorAll('.floating-letters span');
            letters.forEach((letter, index) => {
                letter.style.transitionDelay = `${index * 0.05}s`;
                
                letter.addEventListener('mouseover', () => {
                    letter.style.transform = 'translateY(-10px)';
                });
                
                letter.addEventListener('mouseout', () => {
                    letter.style.transform = 'translateY(0)';
                });
            });
            
            // Animated counter for stats
            const statValues = document.querySelectorAll('.stat-value');
            const targetValues = [12548, 89, 245, 1.2];
            const durations = [2000, 1500, 1800, 2200];
            
            statValues.forEach((stat, index) => {
                const target = targetValues[index];
                const duration = durations[index];
                const start = 0;
                const increment = target / (duration / 16);
                let current = start;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        clearInterval(timer);
                        current = target;
                    }
                    
                    if (index === 3) { // For the dollar value
                        stat.textContent = `$${(current).toFixed(1)}M`;
                    } else if (index === 1) { // For percentage
                        stat.textContent = `${Math.floor(current)}%`;
                    } else {
                        stat.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        });
    </script>
</body>
</html>
