@extends('Layout.index')

@section('title')
Products
@endsection

@section('content')

<style>
.product-management{
    padding:20px;
}

.product-management h2{
    margin-bottom:35px;
    font-size:2.2rem;
    font-weight:600;
    background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    background-clip:text;
    position:relative;
    display:inline-block;
}

.product-management h2::after{
    content:'';
    position:absolute;
    bottom:-10px;
    left:0;
    width:60px;
    height:4px;
    background:linear-gradient(90deg,#4f46e5,#f59e0b);
    border-radius:2px;
}

/* equal spacing grid */
.cards-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:25px;
    width:100%;
    margin-top:30px;
}

/* glass card */
.glass-card{
    width:100%;
    aspect-ratio:1;
    background:linear-gradient(135deg,rgba(255,255,255,0.1),rgba(255,255,255,0.05));
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,0.18);
    box-shadow:0 8px 32px 0 rgba(31,38,135,0.15);
    color:#2d3748;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    border-radius:20px;
    text-decoration:none;
    font-weight:600;
    transition:all .4s cubic-bezier(.4,0,.2,1);
    position:relative;
    overflow:hidden;
}

.glass-card::before{
    content:'';
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.2),
        transparent
    );
    transition:left .7s ease;
}

.glass-card:hover{
    transform:translateY(-10px) scale(1.02);
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
    border:1px solid rgba(255,255,255,0.3);
}

.glass-card:hover::before{
    left:100%;
}

.glass-card i{
    font-size:32px;
    margin-bottom:15px;
    transition:transform .3s ease;
}

.glass-card:hover i{
    transform:scale(1.1) rotate(5deg);
}

.glass-card span{
    font-size:1.1rem;
    letter-spacing:.5px;
    text-align:center;
    padding:0 10px;
}

/* card themes */
.card-add-product{
    background:linear-gradient(135deg,rgba(79,70,229,.9),rgba(79,70,229,.7));
    color:white;
}

.card-view-products{
    background:linear-gradient(135deg,rgba(5,150,105,.9),rgba(5,150,105,.7));
    color:white;
}

.card-add-category{
    background:linear-gradient(135deg,rgba(245,158,11,.9),rgba(245,158,11,.7));
    color:white;
}

.card-add-subcategory{
    background:linear-gradient(135deg,rgba(239,68,68,.9),rgba(239,68,68,.7));
    color:white;
}

/* background */
body{
    background:linear-gradient(135deg,#f5f7fa 0%,#c3cfe2 100%);
    min-height:100vh;
}

/* responsive */
@media (max-width:900px){
    .cards-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media (max-width:480px){
    .cards-grid{
        grid-template-columns:1fr;
    }
}

/* animation */
@keyframes fadeInUp{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.glass-card{
    animation:fadeInUp .6s ease forwards;
    opacity:0;
}

.glass-card:nth-child(1){animation-delay:.1s;}
.glass-card:nth-child(2){animation-delay:.2s;}
.glass-card:nth-child(3){animation-delay:.3s;}
.glass-card:nth-child(4){animation-delay:.4s;}
</style>

<div class="product-management">

<h2>Product Management</h2>

<div class="cards-grid">

<a href="/admin/product/add" class="glass-card card-add-product">
<i class="fa-solid fa-plus"></i>
<span>Add Product</span>
</a>

<a href="/admin/products" class="glass-card card-view-products">
<i class="fa-solid fa-box-open"></i>
<span>View Products</span>
</a>

<a href="/admin/category/add" class="glass-card card-add-category">
<i class="fa-solid fa-layer-group"></i>
<span>Add Category</span>
</a>

<a href="/admin/subcategory/add" class="glass-card card-add-subcategory">
<i class="fa-solid fa-diagram-project"></i>
<span>Add Subcategory</span>
</a>

</div>

</div>

@endsection