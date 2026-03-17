@extends('Layout.index')

@section('title')
Products
@endsection

@section('content')

<style>
/* Modern CSS Reset and Variables with Light Colors */
:root {
    --primary-light: #fef3c7;
    --primary-medium: #fde68a;
    --primary-dark: #fbbf24;
    
    --success-light: #d1fae5;
    --success-medium: #a7f3d0;
    --success-dark: #34d399;
    
    --warning-light: #fff3cd;
    --warning-medium: #ffe69c;
    --warning-dark: #ffc107;
    
    --danger-light: #fee2e2;
    --danger-medium: #fecaca;
    --danger-dark: #ef4444;
    
    --info-light: #dbeafe;
    --info-medium: #bfdbfe;
    --info-dark: #3b82f6;
    
    --purple-light: #ede9fe;
    --purple-medium: #ddd6fe;
    --purple-dark: #8b5cf6;
}

.product-management {
    padding: 30px;
    max-width: 1400px;
    margin: 0 auto;
    min-height: 100vh;
    background: linear-gradient(135deg, #fff9e6 0%, #fff0d4 100%);
    position: relative;
    overflow: hidden;
}

/* Decorative Background Elements */
.product-management::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255, 237, 213, 0.6) 0%, transparent 70%);
    border-radius: 50%;
    z-index: 0;
}

.product-management::after {
    content: '';
    position: absolute;
    bottom: -20%;
    left: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(209, 250, 229, 0.6) 0%, transparent 70%);
    border-radius: 50%;
    z-index: 0;
}

/* Header Section */
.header-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 40px;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    z-index: 2;
}

.product-management h2 {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    display: inline-block;
    margin: 0;
    letter-spacing: -0.5px;
    text-shadow: 0 2px 10px rgba(245, 158, 11, 0.2);
}

.product-management h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #fbbf24, #f59e0b, #f97316);
    border-radius: 4px;
    transition: width 0.3s ease;
}

.product-management h2:hover::after {
    width: 120px;
}

/* Stats Cards with Light Colors */
.stats-container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.stat-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 15px 25px;
    border-radius: 20px;
    box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.8);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px -15px rgba(251, 191, 36, 0.3);
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-light);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-dark);
    font-size: 24px;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-icon {
    background: var(--primary-medium);
    transform: rotate(5deg);
}

.stat-info h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #f59e0b;
    margin: 0;
    line-height: 1.2;
}

.stat-info p {
    color: #6b7280;
    margin: 0;
    font-size: 0.9rem;
    font-weight: 500;
}

/* Enhanced Grid */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    margin-top: 30px;
    position: relative;
    z-index: 2;
}

/* Premium Glass Card with Light Colors */
.glass-card {
    position: relative;
    width: 100%;
    aspect-ratio: 1;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.9);
    box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.1);
    color: #1f2937;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 35px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    cursor: pointer;
}

/* Shine Effect */
.glass-card::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at center, rgba(255, 255, 255, 0.3) 0%, transparent 60%);
    opacity: 0;
    transition: opacity 0.5s ease;
}

.glass-card:hover::after {
    opacity: 1;
}

/* Card Content */
.card-content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 25px;
    width: 100%;
}

.glass-card i {
    font-size: 3.8rem;
    margin-bottom: 20px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.glass-card:hover i {
    transform: scale(1.2) rotate(5deg);
}

.glass-card span {
    font-size: 1.3rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    color: #1f2937;
    display: block;
    margin-bottom: 8px;
}

.card-subtitle {
    font-size: 0.9rem;
    font-weight: 400;
    opacity: 0.7;
    transition: all 0.3s ease;
}

.glass-card:hover .card-subtitle {
    opacity: 1;
    transform: translateY(0);
}

/* Light Color Themes */
.card-add-product {
    background: linear-gradient(145deg, #fef9e7, #fff5e0);
    border: 2px solid #fef3c7;
    box-shadow: 0 15px 30px -10px rgba(251, 191, 36, 0.2);
}

.card-add-product i {
    color: #f59e0b;
    text-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
}

.card-add-product .card-subtitle {
    color: #f59e0b;
}

.card-view-products {
    background: linear-gradient(145deg, #f0fdf4, #dcfce7);
    border: 2px solid #d1fae5;
    box-shadow: 0 15px 30px -10px rgba(16, 185, 129, 0.2);
}

.card-view-products i {
    color: #10b981;
    text-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
}

.card-view-products .card-subtitle {
    color: #10b981;
}

.card-add-category {
    background: linear-gradient(145deg, #fffbeb, #fef3c7);
    border: 2px solid #fde68a;
    box-shadow: 0 15px 30px -10px rgba(245, 158, 11, 0.2);
}

.card-add-category i {
    color: #fbbf24;
    text-shadow: 0 5px 15px rgba(251, 191, 36, 0.3);
}

.card-add-category .card-subtitle {
    color: #f59e0b;
}

.card-add-subcategory {
    background: linear-gradient(145deg, #fff1f2, #ffe4e6);
    border: 2px solid #fee2e2;
    box-shadow: 0 15px 30px -10px rgba(239, 68, 68, 0.15);
}

.card-add-subcategory i {
    color: #f87171;
    text-shadow: 0 5px 15px rgba(248, 113, 113, 0.3);
}

.card-add-subcategory .card-subtitle {
    color: #ef4444;
}

/* Decorative Circles */
.decorative-circle {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    z-index: 1;
}

.circle-1 {
    top: 10%;
    left: 5%;
    background: linear-gradient(135deg, rgba(253, 230, 138, 0.3), rgba(251, 191, 36, 0.2));
    animation: float 8s ease-in-out infinite;
}

.circle-2 {
    bottom: 15%;
    right: 8%;
    background: linear-gradient(135deg, rgba(209, 250, 229, 0.4), rgba(167, 243, 208, 0.3));
    animation: float 10s ease-in-out infinite reverse;
}

/* Floating Animation */
@keyframes float {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-20px) scale(1.05); }
}

/* Hover Effects */
.glass-card:hover {
    transform: translateY(-12px) scale(1.02);
    border-color: rgba(255, 255, 255, 1);
}

.card-add-product:hover {
    box-shadow: 0 25px 50px -12px rgba(245, 158, 11, 0.4);
}

.card-view-products:hover {
    box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.4);
}

.card-add-category:hover {
    box-shadow: 0 25px 50px -12px rgba(245, 158, 11, 0.4);
}

.card-add-subcategory:hover {
    box-shadow: 0 25px 50px -12px rgba(239, 68, 68, 0.3);
}

/* Responsive Design */
@media (max-width: 1100px) {
    .cards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .product-management h2 {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .product-management {
        padding: 20px;
    }
    
    .header-section {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .stats-container {
        width: 100%;
        justify-content: space-between;
    }
    
    .stat-card {
        flex: 1;
        min-width: 120px;
        padding: 12px 15px;
    }
    
    .stat-icon {
        width: 40px;
        height: 40px;
        font-size: 20px;
    }
    
    .stat-info h3 {
        font-size: 1.4rem;
    }
}

@media (max-width: 480px) {
    .cards-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .glass-card {
        aspect-ratio: 3/1;
    }
    
    .glass-card i {
        font-size: 2.5rem;
    }
    
    .glass-card span {
        font-size: 1.1rem;
    }
    
    .stats-container {
        flex-wrap: wrap;
    }
    
    .stat-card {
        min-width: 100%;
    }
}

/* Card Entrance Animation */
@keyframes cardEntrance {
    from {
        opacity: 0;
        transform: scale(0.3);
        filter: blur(10px);
    }
    to {
        opacity: 1;
        transform: scale(1);
        filter: blur(0);
    }
}

.glass-card {
    animation: cardEntrance 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    animation-delay: calc(var(--card-index) * 0.1s);
    opacity: 0;
}

.glass-card:nth-child(1) { --card-index: 1; }
.glass-card:nth-child(2) { --card-index: 2; }
.glass-card:nth-child(3) { --card-index: 3; }
.glass-card:nth-child(4) { --card-index: 4; }

/* Additional Light Color Touches */
.stat-card:nth-child(1) .stat-icon {
    background: var(--primary-light);
    color: var(--primary-dark);
}

.stat-card:nth-child(2) .stat-icon {
    background: var(--success-light);
    color: var(--success-dark);
}

/* Counter Animation */
@keyframes countUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.stat-info h3 {
    animation: countUp 0.5s ease forwards;
}
</style>

<div class="product-management">

<!-- Decorative Elements -->
<div class="decorative-circle circle-1"></div>
<div class="decorative-circle circle-2"></div>

<div class="header-section">
    <h2>✨ Product Management</h2>
    
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-cube"></i>
            </div>
            <div class="stat-info">
                <h3>150+</h3>
                <p>Total Products</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-tags"></i>
            </div>
            <div class="stat-info">
                <h3>12</h3>
                <p>Categories</p>
            </div>
        </div>
    </div>
</div>

<div class="cards-grid">

<a href="{{ route('admin.product.add') }}" class="glass-card card-add-product">
    <div class="card-content">
        <i class="fa-solid fa-plus-circle"></i>
        <span>Add Product</span>
        <div class="card-subtitle">✨ Create new product</div>
    </div>
    <div class="card-shine"></div>
</a>



<a href="/admin/category/add" class="glass-card card-add-category">
    <div class="card-content">
        <i class="fa-solid fa-folder-tree"></i>
        <span>Add Category</span>
        <div class="card-subtitle">📁 Organize products</div>
    </div>
</a>

<a href="/admin/subcategory/add" class="glass-card card-add-subcategory">
    <div class="card-content">
        <i class="fa-solid fa-code-branch"></i>
        <span>Add Subcategory</span>
        <div class="card-subtitle">🔖 Detailed classification</div>
    </div>
</a>
<a href="{{ route('admin.orders') }}" class="glass-card card-view-products">
    <div class="card-content">
        <i class="fa-solid fa-boxes"></i>
        <span>View Orders</span>
        <div class="card-subtitle">📦 Manage inventory</div>
    </div>
</a>
</div>

<!-- Quick Tips Section -->
<div style="margin-top: 40px; text-align: center; position: relative; z-index: 2;">
    <div style="display: inline-flex; gap: 15px; flex-wrap: wrap; justify-content: center;">
        <span style="background: #fef3c7; padding: 8px 20px; border-radius: 50px; color: #92400e; font-size: 0.9rem; border: 1px solid #fde68a;">
            <i class="fa-regular fa-lightbulb" style="margin-right: 5px;"></i> Quick Actions
        </span>
        <span style="background: #d1fae5; padding: 8px 20px; border-radius: 50px; color: #065f46; font-size: 0.9rem; border: 1px solid #a7f3d0;">
            <i class="fa-regular fa-clock" style="margin-right: 5px;"></i> Last updated: Today
        </span>
        <span style="background: #fee2e2; padding: 8px 20px; border-radius: 50px; color: #991b1b; font-size: 0.9rem; border: 1px solid #fecaca;">
            <i class="fa-regular fa-bell" style="margin-right: 5px;"></i> 3 pending reviews
        </span>
    </div>
</div>

</div>

<script>
// Add smooth hover effect for stats cards
document.querySelectorAll('.stat-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s ease';
    });
});

// Dynamic counter animation (optional)
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, 20);
}

// Start counter animation when stats cards are visible
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('h3');
            statNumbers.forEach(stat => {
                const value = parseInt(stat.textContent);
                animateCounter(stat, value);
            });
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-card').forEach(card => {
    observer.observe(card);
});
</script>

@endsection