<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVE HOME SERVICE - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#1e40af',
                        accent: '#10b981',
                        danger: '#ef4444',
                        warning: '#f59e0b',
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .nav-text {
            display: none;
        }

        .sidebar.collapsed .logo-text {
            display: none;
        }

        .sidebar.collapsed .logo-icon {
            display: block;
        }

        .logo-icon {
            display: none;
        }

        .main-content {
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 0.375rem;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 0.5rem;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .star-rating {
            direction: rtl;
            display: inline-block;
        }

        .star-rating input[type=radio] {
            display: none;
        }

        .star-rating label {
            color: #bbb;
            font-size: 18px;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input[type=radio]:checked~label {
            color: #f2b600;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->


        <!-- Main Content -->
        <div class="main-content flex-1 overflow-auto ">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm py-4 px-6 flex items-center justify-between sticky top-0 z-10">
                <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                <div class="flex items-center space-x-4">

                    <div class="dropdown relative">
                        <a href="logout.php" class="flex items-center space-x-2 px-4 py-2 rounded bg-danger text-white hover:bg-red-700 transition">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="hidden md:inline">Logout</span>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->


                <!-- Recent Service Requests -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-6 border-b">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold">Recent Service Requests</h2>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Appliance</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issue</th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                require_once 'backend/db.php';
                                $result = $conn->query("SELECT id, name, phone, appliance, issue, request_date FROM service_requests ORDER BY request_date DESC LIMIT 20");
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#SR-' . htmlspecialchars($row['id']) . '</td>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . htmlspecialchars($row['name']) . '</td>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . htmlspecialchars($row['phone']) . '</td>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . htmlspecialchars($row['appliance']) . '</td>';
                                        echo '<td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">' . htmlspecialchars($row['issue']) . '</td>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . htmlspecialchars($row['request_date']) . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No service requests found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Testimonials -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold">Recent Testimonials</h2>
                            <a href="#" class="text-primary text-sm font-medium">View All</a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Feedback</th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                require_once 'backend/db.php';
                                $result = $conn->query("SELECT id, name, location, rating, feedback, status FROM testimonials ORDER BY id DESC LIMIT 20");
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap">';
                                        echo '<div class="flex items-center">';
                                        echo '<div class="flex-shrink-0 h-10 w-10">';
                                        echo '<div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">';
                                        echo '<span class="text-gray-600">' . strtoupper(substr($row['name'],0,1)) . '</span>';
                                        echo '</div></div>';
                                        echo '<div class="ml-4">';
                                        echo '<div class="text-sm font-medium text-gray-900">' . htmlspecialchars($row['name']) . '</div>';
                                        echo '</div></div>';
                                        echo '</td>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . htmlspecialchars($row['location']) . '</td>';
                                        echo '<td class="px-6 py-4 whitespace-nowrap">';
                                        echo '<div class="flex items-center">';
                                        $stars = intval($row['rating']);
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $stars) {
                                                echo '<i class="fas fa-star text-yellow-400"></i>';
                                            } else {
                                                echo '<i class="far fa-star text-yellow-400"></i>';
                                            }
                                        }
                                        echo '</div></td>';
                                        echo '<td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">' . htmlspecialchars($row['feedback']) . '</td>';
                                       
                                        echo '<td><button class="text-red-600 hover:text-red-800" onclick="deleteTestimonial(' . $row['id'] . ')">Delete</button></td>';
                                       
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No testimonials found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    </div>
    </div>
    <script>
        // Delete testimonial with confirmation and AJAX
        function deleteTestimonial(id) {
            if (confirm('Are you sure you want to delete this testimonial?')) {
                fetch('backend/delete_testimonial.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Testimonial deleted successfully.');
                        location.reload();
                    } else {
                        alert('Error deleting testimonial.');
                    }
                })
                .catch(() => alert('Error deleting testimonial.'));
            }
        }
    </script>
</body>

</html>