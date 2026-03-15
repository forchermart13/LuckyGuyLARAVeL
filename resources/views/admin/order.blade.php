@extends('Layout.index')

@section('content')

<div style="padding:30px;background:#f3f4f6;min-height:100vh;font-family:'Inter',sans-serif;">

<!-- Header Section with Title Only -->
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">
    <div>
        <h2 style="margin:0;color:#111827;font-size:24px;font-weight:600;">Recent Orders</h2>
        <p style="margin:5px 0 0;color:#6b7280;font-size:14px;">Manage and track all customer orders</p>
    </div>
</div>

<!-- Stats Cards -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:25px;">
    <div style="background:white;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="color:#6b7280;font-size:14px;margin-bottom:8px;">Total Orders</div>
        <div style="font-size:28px;font-weight:600;color:#111827;">156</div>
        <div style="color:#10b981;font-size:13px;margin-top:8px;">↑ 12% from last month</div>
    </div>
    <div style="background:white;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="color:#6b7280;font-size:14px;margin-bottom:8px;">Pending Orders</div>
        <div style="font-size:28px;font-weight:600;color:#111827;">23</div>
        <div style="color:#f59e0b;font-size:13px;margin-top:8px;">Need attention</div>
    </div>
    <div style="background:white;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="color:#6b7280;font-size:14px;margin-bottom:8px;">Completed</div>
        <div style="font-size:28px;font-weight:600;color:#111827;">98</div>
        <div style="color:#10b981;font-size:13px;margin-top:8px;">This month</div>
    </div>
    <div style="background:white;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="color:#6b7280;font-size:14px;margin-bottom:8px;">Revenue</div>
        <div style="font-size:28px;font-weight:600;color:#111827;">₹45,678</div>
        <div style="color:#10b981;font-size:13px;margin-top:8px;">↑ 8% increase</div>
    </div>
</div>

<!-- Working Filters -->
<div style="background:white;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.05);margin-bottom:20px;display:flex;gap:15px;align-items:center;flex-wrap:wrap;">
    <div style="display:flex;gap:10px;flex:1;">
        <input type="text" id="searchInput" placeholder="Search orders..." style="padding:10px 15px;border:1px solid #e5e7eb;border-radius:8px;flex:1;font-size:14px;">
        <button onclick="searchOrders()" style="padding:10px 20px;background:#3b82f6;color:white;border:none;border-radius:8px;cursor:pointer;font-size:14px;font-weight:500;">Search</button>
    </div>
    <div style="display:flex;gap:10px;">
        <select id="statusFilter" onchange="filterOrders()" style="padding:10px 15px;border:1px solid #e5e7eb;border-radius:8px;background:white;font-size:14px;">
            <option value="all">All Status</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="shipped">Shipped</option>
        </select>
        <select id="dateFilter" onchange="filterOrders()" style="padding:10px 15px;border:1px solid #e5e7eb;border-radius:8px;background:white;font-size:14px;">
            <option value="all">All Time</option>
            <option value="7">Last 7 days</option>
            <option value="30">Last 30 days</option>
            <option value="90">This month</option>
        </select>
    </div>
</div>

<!-- Main Table Card -->
<div style="background:white;padding:25px;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.08);">

    <!-- Table Header with Info -->
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h3 style="margin:0;color:#111827;font-size:18px;font-weight:600;">Orders List</h3>
        <div id="showingInfo" style="color:#6b7280;font-size:14px;">Showing 1-3 of 156 orders</div>
    </div>

    <table style="width:100%;border-collapse:collapse;font-family:'Inter',sans-serif;">
        <thead>
            <tr style="background:#f9fafb;border-radius:8px;">
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Order ID</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Image</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Customer</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Product</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Amount</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Status</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Date</th>
                <th style="padding:15px;text-align:left;color:#6b7280;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Actions</th>
            </tr>
        </thead>
        <tbody id="ordersTableBody">
            <!-- Dynamic content will be loaded here -->
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:25px;padding-top:20px;border-top:1px solid #e5e7eb;">
        <div id="paginationInfo" style="color:#6b7280;font-size:14px;">Showing 1 to 3 of 156 entries</div>
        <div style="display:flex;gap:8px;">
            <button onclick="changePage('prev')" style="padding:8px 14px;border:1px solid #e5e7eb;background:white;border-radius:6px;cursor:pointer;font-size:14px;">Previous</button>
            <button onclick="changePage(1)" style="padding:8px 14px;border:1px solid #3b82f6;background:#3b82f6;color:white;border-radius:6px;cursor:pointer;font-size:14px;">1</button>
            <button onclick="changePage(2)" style="padding:8px 14px;border:1px solid #e5e7eb;background:white;border-radius:6px;cursor:pointer;font-size:14px;">2</button>
            <button onclick="changePage(3)" style="padding:8px 14px;border:1px solid #e5e7eb;background:white;border-radius:6px;cursor:pointer;font-size:14px;">3</button>
            <button onclick="changePage('next')" style="padding:8px 14px;border:1px solid #e5e7eb;background:white;border-radius:6px;cursor:pointer;font-size:14px;">Next</button>
        </div>
    </div>
</div>

</div>

<script>
// Sample orders data
const orders = [
    {
        id: '#1001',
        image: 'https://via.placeholder.com/60',
        customerInitials: 'RS',
        customerName: 'Rahul Sharma',
        product: 'Men T-Shirt',
        amount: '₹799',
        status: 'pending',
        statusText: 'Pending',
        statusBg: '#fef3c7',
        statusColor: '#92400e',
        date: '15 Mar 2026',
        timestamp: new Date('2026-03-15').getTime()
    },
    {
        id: '#1002',
        image: 'https://via.placeholder.com/60',
        customerInitials: 'AK',
        customerName: 'Amit Kumar',
        product: 'Hoodie',
        amount: '₹1299',
        status: 'completed',
        statusText: 'Completed',
        statusBg: '#d1fae5',
        statusColor: '#065f46',
        date: '14 Mar 2026',
        timestamp: new Date('2026-03-14').getTime()
    },
    {
        id: '#1003',
        image: 'https://via.placeholder.com/60',
        customerInitials: 'PS',
        customerName: 'Priya Singh',
        product: 'Women Jacket',
        amount: '₹1899',
        status: 'shipped',
        statusText: 'Shipped',
        statusBg: '#e0e7ff',
        statusColor: '#3730a3',
        date: '13 Mar 2026',
        timestamp: new Date('2026-03-13').getTime()
    }
];

let currentPage = 1;
let filteredOrders = [...orders];
const itemsPerPage = 3;

// Function to display orders
function displayOrders() {
    const tbody = document.getElementById('ordersTableBody');
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedOrders = filteredOrders.slice(start, end);
    
    let html = '';
    paginatedOrders.forEach(order => {
        html += `
            <tr style="border-bottom:1px solid #f3f4f6;transition:background 0.2s;" 
                onmouseover="this.style.background='#f9fafb'" 
                onmouseout="this.style.background='white'">
                <td style="padding:15px;font-weight:500;color:#3b82f6;">${order.id}</td>
                <td style="padding:15px;">
                    <img src="${order.image}" style="width:50px;height:50px;border-radius:8px;object-fit:cover;border:1px solid #e5e7eb;">
                </td>
                <td style="padding:15px;">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="width:32px;height:32px;background:#e5e7eb;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#4b5563;font-weight:600;">${order.customerInitials}</div>
                        <div style="font-weight:500;">${order.customerName}</div>
                    </div>
                </td>
                <td style="padding:15px;">${order.product}</td>
                <td style="padding:15px;font-weight:500;">${order.amount}</td>
                <td style="padding:15px;">
                    <span style="background:${order.statusBg};color:${order.statusColor};padding:6px 12px;border-radius:20px;font-size:12px;font-weight:500;">${order.statusText}</span>
                </td>
                <td style="padding:15px;color:#6b7280;">${order.date}</td>
                <td style="padding:15px;">
                    <div style="display:flex;gap:8px;">
                        <button style="padding:6px 12px;background:#3b82f6;color:white;border:none;border-radius:6px;font-size:12px;font-weight:500;cursor:pointer;">View</button>
                        ${order.status === 'pending' ? 
                            '<button style="padding:6px 12px;background:#10b981;color:white;border:none;border-radius:6px;font-size:12px;font-weight:500;cursor:pointer;">Approve</button>' : 
                            ''}
                        ${order.status !== 'completed' ? 
                            '<button style="padding:6px 12px;background:#ef4444;color:white;border:none;border-radius:6px;font-size:12px;font-weight:500;cursor:pointer;">Cancel</button>' : 
                            ''}
                    </div>
                </td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html;
    
    // Update info text
    const total = filteredOrders.length;
    const showingEnd = Math.min(end, total);
    document.getElementById('showingInfo').innerHTML = `Showing ${start + 1}-${showingEnd} of ${total} orders`;
    document.getElementById('paginationInfo').innerHTML = `Showing ${start + 1} to ${showingEnd} of ${total} entries`;
}

// Filter function
function filterOrders() {
    const statusFilter = document.getElementById('statusFilter').value;
    const dateFilter = document.getElementById('dateFilter').value;
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    filteredOrders = orders.filter(order => {
        // Status filter
        if (statusFilter !== 'all' && order.status !== statusFilter) {
            return false;
        }
        
        // Date filter
        if (dateFilter !== 'all') {
            const daysAgo = parseInt(dateFilter);
            const now = new Date().getTime();
            const daysDiff = (now - order.timestamp) / (1000 * 60 * 60 * 24);
            if (daysDiff > daysAgo) {
                return false;
            }
        }
        
        // Search filter
        if (searchTerm) {
            return order.customerName.toLowerCase().includes(searchTerm) ||
                   order.product.toLowerCase().includes(searchTerm) ||
                   order.id.toLowerCase().includes(searchTerm);
        }
        
        return true;
    });
    
    currentPage = 1;
    displayOrders();
}

// Search function
function searchOrders() {
    filterOrders();
}

// Pagination function
function changePage(direction) {
    const totalPages = Math.ceil(filteredOrders.length / itemsPerPage);
    
    if (direction === 'prev' && currentPage > 1) {
        currentPage--;
    } else if (direction === 'next' && currentPage < totalPages) {
        currentPage++;
    } else if (typeof direction === 'number') {
        currentPage = direction;
    }
    
    displayOrders();
}

// Initial display
displayOrders();
</script>

@endsection