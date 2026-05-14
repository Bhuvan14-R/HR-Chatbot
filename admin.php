<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("Location: index.php");

    exit();
}

include 'db.php';

/* ANALYTICS */

$totalChats =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM chat_logs")
)['total'];

$totalUnanswered =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM unanswered_questions")
)['total'];

$totalEmployees =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM employees")
)['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="stylesheet"
      href="style.css">

</head>

<body>

<div class="dashboard-container">

    <!-- HEADER -->

    <div class="dashboard-top">

        <h1>HR Chatbot Admin Dashboard</h1>

        <div class="dashboard-actions">

            <a href="employee_login.php"
               class="admin-btn">

               Open Chatbot

            </a>

            <a href="logout.php"
               class="logout-btn">

               Logout

            </a>

        </div>

    </div>

    <!-- ANALYTICS -->

    <div class="stats-grid">

        <div class="stat-card">

            <h2>
                <?php echo $totalChats; ?>
            </h2>

            <p>Total Chats</p>

        </div>

        <div class="stat-card">

            <h2>
                <?php echo $totalUnanswered; ?>
            </h2>

            <p>Unanswered Questions</p>

        </div>

        <div class="stat-card">

            <h2>
                <?php echo $totalEmployees; ?>
            </h2>

            <p>Employees</p>

        </div>

    </div>

    <!-- CHARTS -->

    <div class="dashboard-section">

        <h2>Analytics Visualization</h2>

        <div class="chart-grid">

            <div class="chart-card">

                <h3>System Analytics</h3>

                <canvas id="chatChart"></canvas>

            </div>

            <div class="chart-card">

                <h3>Answered vs Unanswered</h3>

                <canvas id="statusChart"></canvas>

            </div>

        </div>

    </div>

    <!-- MANAGEMENT PANELS -->

    <div class="dashboard-section">

        <h2>Management Panels</h2>

        <div class="stats-grid">

            <a href="chat_logs.php"
               class="panel-card">

                <h3>Chat Logs</h3>

                <p>
                    View all employee conversations
                </p>

            </a>

            <a href="unanswered.php"
               class="panel-card">

                <h3>Unanswered Questions</h3>

                <p>
                    Manage unanswered chatbot queries
                </p>

            </a>

            <a href="manage_policies.php"
               class="panel-card">

                <h3>Manage Policies</h3>

                <p>
                    Update or delete HR policies
                </p>

            </a>

            <a href="employees.php"
               class="panel-card">

                <h3>Employees</h3>

                <p>
                    Add and manage employees
                </p>

            </a>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const chatCtx =
document.getElementById('chatChart');

new Chart(chatCtx, {

    type:'bar',

    data:{

        labels:[
            'Total Chats',
            'Unanswered',
            'Employees'
        ],

        datasets:[{

            label:'Analytics',

            data:[
                <?php echo $totalChats; ?>,
                <?php echo $totalUnanswered; ?>,
                <?php echo $totalEmployees; ?>
            ],

            backgroundColor:[
                '#2563eb',
                '#ef4444',
                '#16a34a'
            ],

            borderRadius:12
        }]
    },

    options:{
        responsive:true,
        plugins:{
            legend:{
                display:false
            }
        }
    }
});

const statusCtx =
document.getElementById('statusChart');

new Chart(statusCtx, {

    type:'doughnut',

    data:{

        labels:[
            'Answered',
            'Unanswered'
        ],

        datasets:[{

            data:[
                <?php echo $totalChats - $totalUnanswered; ?>,
                <?php echo $totalUnanswered; ?>
            ],

            backgroundColor:[
                '#2563eb',
                '#ef4444'
            ],

            borderWidth:0
        }]
    },

    options:{
        responsive:true,
        plugins:{
            legend:{
                position:'bottom'
            }
        }
    }
});

</script>

</body>
</html>