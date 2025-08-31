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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
            background-color: rgba(0,0,0,0.4);
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
        .star-rating label:hover ~ label,
        .star-rating input[type=radio]:checked ~ label {
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
                        <button class="flex items-center space-x-2">
                            
                            <span class="hidden md:inline">Logout</span>
                          
                        </button>
                      
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Service Requests</p>
                                <h3 class="text-2xl font-bold mt-1">1,248</h3>
                                <p class="text-green-500 text-sm mt-1">+12 today</p>
                            </div>
                            <div class="p-3 rounded-full bg-blue-50 text-primary">
                                <i class="fas fa-tools text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Requests</p>
                                <h3 class="text-2xl font-bold mt-1">48</h3>
                                <p class="text-red-500 text-sm mt-1">+3 today</p>
                            </div>
                            <div class="p-3 rounded-full bg-orange-50 text-warning">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Approved Testimonials</p>
                                <h3 class="text-2xl font-bold mt-1">186</h3>
                                <p class="text-green-500 text-sm mt-1">+2 today</p>
                            </div>
                            <div class="p-3 rounded-full bg-green-50 text-accent">
                                <i class="fas fa-check-circle text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Pending Testimonials</p>
                                <h3 class="text-2xl font-bold mt-1">12</h3>
                                <p class="text-red-500 text-sm mt-1">+1 today</p>
                            </div>
                            <div class="p-3 rounded-full bg-purple-50 text-purple-500">
                                <i class="fas fa-comment-dots text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Service Requests -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-6 border-b">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold">Recent Service Requests</h2>
                            <a href="#" class="text-primary text-sm font-medium">View All</a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Appliance</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issue</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#SR-1001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ramesh Kumar</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Washing Machine</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Machine not spinning properly</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">New</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Today, 10:30 AM</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openServiceRequestModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#SR-1000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Priya S</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AC</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Cooling not working properly</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Yesterday, 4:15 PM</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openServiceRequestModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#SR-999</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Arjun M</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Fridge</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Water leakage from freezer</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 days ago</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openServiceRequestModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#SR-998</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Deepa R</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Washing Machine</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Machine not draining water</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 days ago</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openServiceRequestModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#SR-997</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Karthik V</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AC</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Strange noise from outdoor unit</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4 days ago</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openServiceRequestModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Update</button>
                                    </td>
                                </tr>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-600">S</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Suresh P</div>
                                                <div class="text-sm text-gray-500">suresh@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Anna Nagar</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Excellent service! Technician arrived on time and fixed my washing machine quickly.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openTestimonialModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-600">M</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Meena K</div>
                                                <div class="text-sm text-gray-500">meena@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">T Nagar</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="far fa-star text-yellow-400"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Good service but a bit expensive. Technician was knowledgeable.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openTestimonialModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-600">R</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Rajesh B</div>
                                                <div class="text-sm text-gray-500">rajesh@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Velachery</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star-half-alt text-yellow-400"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">AC service was good. The technician explained the issue clearly.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openTestimonialModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Approve</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-600">A</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Anitha S</div>
                                                <div class="text-sm text-gray-500">anitha@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Adyar</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Best fridge repair service in Chennai! Highly recommended.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openTestimonialModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <span class="text-gray-600">V</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Vijay K</div>
                                                <div class="text-sm text-gray-500">vijay@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nungambakkam</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="far fa-star text-yellow-400"></i>
                                            <i class="far fa-star text-yellow-400"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">Service was okay, but took longer than expected.</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openTestimonialModal()" class="text-primary hover:text-secondary mr-2">View</button>
                                        <button class="text-green-600 hover:text-green-800">Approve</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Service Request Modal -->
    <div id="serviceRequestModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeServiceRequestModal()">&times;</span>
            <h2 class="text-xl font-semibold mb-4">Service Request Details - #SR-1001</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium mb-2">Customer Information</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Name</p>
                            <p class="font-medium">Ramesh Kumar</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="font-medium">+91 9876543210</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium">ramesh@example.com</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Address</p>
                            <p class="font-medium">12, Gandhi Street, T Nagar, Chennai - 600017</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-medium mb-2">Service Details</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Appliance Type</p>
                            <p class="font-medium">Washing Machine</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Brand & Model</p>
                            <p class="font-medium">LG Front Load (Model: FHM1207ZDL)</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Issue Description</p>
                            <p class="font-medium">Machine not spinning properly. Makes loud noise during spin cycle.</p>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Request Date</p>
                            <p class="font-medium">Today, 10:30 AM</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                <option>New</option>
                                <option>In Progress</option>
                                <option>Completed</option>
                                <option>Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="closeServiceRequestModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50">Close</button>
                <button class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-primary hover:bg-secondary">Update Status</button>
            </div>
        </div>
    </div>

    <!-- Testimonial Modal -->
    <div id="testimonialModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTestimonialModal()">&times;</span>
            <h2 class="text-xl font-semibold mb-4">Testimonial Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium mb-2">Customer Information</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                <span class="text-gray-600 text-xl">S</span>
                            </div>
                            <div>
                                <p class="font-medium">Suresh P</p>
                                <p class="text-sm text-gray-500">suresh@example.com</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="font-medium">+91 9876543210</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="font-medium">Anna Nagar, Chennai</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-medium mb-2">Feedback Details</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Rating</p>
                            <div class="flex items-center mt-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500">Service Type</p>
                            <p class="font-medium">Washing Machine Repair</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Feedback</p>
                            <p class="font-medium mt-1">Excellent service! Technician arrived on time and fixed my washing machine quickly. Very professional and explained the issue clearly. Would definitely recommend to others.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="closeTestimonialModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50">Close</button>
                <button class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-danger hover:bg-red-700">Delete</button>
                <button class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-primary hover:bg-secondary">Approve</button>
            </div>
        </div>
    </div>

    <!-- Add Testimonial Modal -->
    <div id="addTestimonialModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddTestimonialModal()">&times;</span>
            <h2 class="text-xl font-semibold mb-4">Add New Testimonial</h2>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Location/Area</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service Type</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                                <option>Washing Machine</option>
                                <option>AC</option>
                                <option>Fridge</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                            <div class="star-rating">
                                <input id="star5" type="radio" name="rating" value="5">
                                <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                <input id="star4" type="radio" name="rating" value="4">
                                <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                <input id="star3" type="radio" name="rating" value="3">
                                <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                <input id="star2" type="radio" name="rating" value="2">
                                <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                <input id="star1" type="radio" name="rating" value="1">
                                <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Feedback/Review</label>
                    <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeAddTestimonialModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-primary hover:bg-secondary">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('expanded');
        });

        // Modal functions
        function openServiceRequestModal() {
            document.getElementById('serviceRequestModal').style.display = 'block';
        }

        function closeServiceRequestModal() {
            document.getElementById('serviceRequestModal').style.display = 'none';
        }

        function openTestimonialModal() {
            document.getElementById('testimonialModal').style.display = 'block';
        }

        function closeTestimonialModal() {
            document.getElementById('testimonialModal').style.display = 'none';
        }

        function openAddTestimonialModal() {
            document.getElementById('addTestimonialModal').style.display = 'block';
        }

        function closeAddTestimonialModal() {
            document.getElementById('addTestimonialModal').style.display = 'none';
        }

        // Logout function
        function logout() {
            // In a real app, this would call your backend logout endpoint
            alert('Logging out...');
            // Then redirect to login page
            window.location.href = 'login.html';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>