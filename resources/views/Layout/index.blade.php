<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<!-- Add in head section -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- jQuery (required for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
}

body {
    display: flex;
    background: linear-gradient(145deg, #fef9e7 0%, #f0f7e8 50%, #fff5f5 100%);
    min-height: 100vh;
    position: relative;
}

/* Animated Background */
body::before {
    content: '';
    position: fixed;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(76, 175, 80, 0.08) 0%, transparent 50%);
    pointer-events: none;
}

/* SIDEBAR */
.sidebar {
    width: 280px;
    background: linear-gradient(135deg, #2c3e2f 0%, #1a3b1a 100%);
    color: white;
    position: fixed;
    height: 100vh;
    padding: 30px 20px;
    border-right: 4px solid #ffd700;
    box-shadow: 10px 0 30px rgba(0, 0, 0, 0.2);
    z-index: 10;
    transition: all 0.3s ease;
}

.logo {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 40px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: #ffd700;
    letter-spacing: -0.5px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}

.logo i {
    background: #ffd700;
    color: #2c3e2f;
    padding: 12px;
    border-radius: 12px;
    font-size: 20px;
    box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
}

/* SIDEBAR LINKS */
.sidebar a {
    display: flex;
    align-items: center;
    gap: 14px;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    padding: 14px 16px;
    border-radius: 12px;
    margin-bottom: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-size: 15px;
    font-weight: 500;
    position: relative;
    overflow: hidden;
}

.sidebar a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: #ffd700;
    border-radius: 0 4px 4px 0;
    transform: scaleY(0);
    transition: transform 0.2s ease;
}

.sidebar a:hover {
    background: rgba(255, 215, 0, 0.15);
    color: #ffd700;
    transform: translateX(8px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.sidebar a:hover::before {
    transform: scaleY(1);
}

.sidebar a i {
    font-size: 18px;
    width: 24px;
    text-align: center;
    color: #ffd700;
    transition: all 0.3s ease;
}

.sidebar a:hover i {
    color: #fff;
    transform: scale(1.1);
}

/* MAIN */
.main {
    margin-left: 280px;
    width: 100%;
    padding: 30px 40px;
    position: relative;
}

/* TOPBAR */
.topbar {
    background: linear-gradient(135deg, #fff 0%, #fef9e7 100%);
    padding: 16px 28px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 2px solid #ffd700;
    box-shadow: 0 15px 35px rgba(255, 215, 0, 0.15), 0 0 0 2px #ffd700 inset;
    margin-bottom: 35px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.topbar:hover {
    transform: translateY(-4px);
    box-shadow: 0 25px 45px rgba(255, 215, 0, 0.25), 0 0 0 3px #ffd700 inset;
}

.brand-title {
    font-size: 20px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 12px;
    color: #2c3e2f;
}

.brand-title i {
    background: #ffd700;
    color: #2c3e2f;
    padding: 10px;
    border-radius: 12px;
    font-size: 18px;
    box-shadow: 0 8px 15px rgba(255, 215, 0, 0.3);
}

/* SEARCH */
.search {
    background: white;
    padding: 10px 18px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 12px;
    border: 2px solid #4caf50;
    transition: all 0.3s ease;
    width: 300px;
}

.search:focus-within {
    box-shadow: 0 10px 25px rgba(76, 175, 80, 0.2);
    border-color: #ffd700;
}

.search i {
    color: #4caf50;
    font-size: 16px;
}

.search input {
    border: none;
    outline: none;
    background: none;
    width: 100%;
    font-size: 15px;
    color: #2c3e2f;
}

.search input::placeholder {
    color: #9e9e9e;
}

/* TOP ICONS */
.top-actions {
    display: flex;
    align-items: center;
    gap: 25px;
}

.top-actions i {
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-size: 20px;
    color: #2c3e2f;
    position: relative;
}

.top-actions i:hover {
    transform: scale(1.15);
    color: #ffd700;
}

.top-actions .fa-bell {
    animation: gentle-shake 10s ease-in-out infinite;
}

@keyframes gentle-shake {
    0%, 90%, 100% { transform: rotate(0); }
    92%, 96% { transform: rotate(5deg); }
    94%, 98% { transform: rotate(-5deg); }
}

/* CONTENT */
.content {
    background: linear-gradient(135deg, #fff 0%, #fef9e7 50%, #fff5f5 100%);
    padding: 35px;
    border-radius: 24px;
    border: 2px solid #ffd700;
    box-shadow: 0 20px 50px rgba(255, 215, 0, 0.15), 0 0 0 2px #ff6b6b inset;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    min-height: calc(100vh - 140px);
}

.content:hover {
    transform: translateY(-6px);
    box-shadow: 0 30px 60px rgba(255, 215, 0, 0.25), 0 0 0 3px #ff6b6b inset;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #fef9e7;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #ffd700, #4caf50);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #ff6b6b, #ffd700);
}

/* Glass Card Effect */
.glass-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 215, 0, 0.1));
    border: 2px solid #ffd700;
    border-radius: 16px;
    padding: 20px;
}

/* Loading Animation */
@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

.loading {
    background: linear-gradient(90deg, #fff, #ffd700, #4caf50, #ff6b6b, #fff);
    background-size: 1000px 100%;
    animation: shimmer 3s infinite;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .sidebar {
        width: 80px;
        padding: 30px 10px;
    }
    
    .sidebar .logo span,
    .sidebar a span {
        display: none;
    }
    
    .sidebar .logo i {
        margin: 0 auto;
    }
    
    .sidebar a {
        justify-content: center;
        padding: 14px;
    }
    
    .sidebar a i {
        margin: 0;
    }
    
    .main {
        margin-left: 80px;
        padding: 30px 20px;
    }
}

/* Active Link State */
.sidebar a.active {
    background: rgba(255, 215, 0, 0.2);
    color: #ffd700;
    border-left: 4px solid #ffd700;
}

.sidebar a.active i {
    color: #ffd700;
}

/* Stats Card */
.stat-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    border: 2px solid #4caf50;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(76, 175, 80, 0.1);
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: #ffd700;
    box-shadow: 0 20px 40px rgba(255, 215, 0, 0.2);
}

/* Gradient Text */
.gradient-text {
    background: linear-gradient(135deg, #2c3e2f, #4caf50, #ffd700, #ff6b6b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
}

/* Classic Theme Elements */
.classic-border {
    border: 3px solid #ffd700;
    border-radius: 12px;
}

.classic-button {
    background: #ffd700;
    color: #2c3e2f;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid #4caf50;
}

.classic-button:hover {
    background: #4caf50;
    color: white;
    border-color: #ffd700;
    transform: scale(1.05);
}

/* Notification Badge */
.notification-badge {
    background: #ff6b6b;
    color: white;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 50px;
    border: 2px solid #ffd700;
}

/* Divider */
.classic-divider {
    height: 3px;
    background: linear-gradient(90deg, #ffd700, #4caf50, #ff6b6b, #ffd700);
    margin: 20px 0;
    border-radius: 3px;
}

/* Price Tag */
.price-tag {
    background: #ffd700;
    color: #2c3e2f;
    padding: 8px 16px;
    border-radius: 50px;
    font-weight: 700;
    border: 2px solid #4caf50;
    display: inline-block;
}

/* Alert Messages */
.alert-success {
    background: #4caf50;
    color: white;
    padding: 15px;
    border-radius: 10px;
    border-left: 5px solid #ffd700;
}

.alert-warning {
    background: #ffd700;
    color: #2c3e2f;
    padding: 15px;
    border-radius: 10px;
    border-left: 5px solid #ff6b6b;
}

.alert-error {
    background: #ff6b6b;
    color: white;
    padding: 15px;
    border-radius: 10px;
    border-left: 5px solid #ffd700;
}
</style>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-store"></i>
        <span>A-Clothing</span>
    </div>
    
  <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
    <i class="fa-solid fa-gauge"></i>
    <span>Dashboard</span>
</a>

<a href="/admin/products" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
    <i class="fa-solid fa-box"></i>
    <span>Add Products</span>
</a>
<a href="{{ route('admin.settings') }}" class="{{ request()->is('admin/settings*') ? 'active' : '' }}">
    <i class="fa-solid fa-layer-group"></i>
    <span>CAT-LOOK</span>
</a>
<a href="{{ route('admin.orders') }}" class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
    <i class="fa-solid fa-cart-shopping"></i>
    <span>Orders</span>
</a>
<!-- <a href="/admin/customers" class="{{ request()->is('admin/customers*') ? 'active' : '' }}">
    <i class="fa-solid fa-users"></i>
    <span>Customers</span>
</a> -->

<!-- <a href="/admin/coupons" class="{{ request()->is('admin/coupons*') ? 'active' : '' }}">
    <i class="fa-solid fa-tags"></i>
    <span>Coupons</span>
</a> -->


<a href="{{ route('admin.report') }}" class="{{ request()->is('admin/report*') ? 'active' : '' }}">
    <i class="fa-solid fa-chart-line"></i>
    <span>Analytics</span>
</a>

</div>

<div class="main">
  

    <div class="content">
        @yield('content')
    </div>
</div>








<!-- Add this just before closing body tag or in a suitable position -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
    @if(session('success'))
    <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-exclamation-circle me-2"></i> {{ session('error') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif
</div>

<!-- Bootstrap JS (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    @endif
</script>
<script>
// Auto hide toasts after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
    var toasts = document.querySelectorAll('.toast');
    toasts.forEach(function(toast) {
        setTimeout(function() {
            toast.classList.remove('show');
        }, 3000);
    });
});
</script>
</body>
</html>