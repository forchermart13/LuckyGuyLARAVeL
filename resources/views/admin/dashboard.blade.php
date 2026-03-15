@extends('Layout.index')

@section('title')
Dashboard
@endsection

@section('content')

<style>

.dashboard-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:30px;
}

.stat-card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 6px 20px rgba(0,0,0,0.05);
display:flex;
justify-content:space-between;
align-items:center;
transition:.25s;
}

.stat-card:hover{
transform:translateY(-4px);
box-shadow:0 12px 25px rgba(0,0,0,0.08);
}

.stat-icon{
font-size:22px;
padding:12px;
border-radius:8px;
background:#eef2ff;
color:#4f46e5;
}

.stat-text h4{
font-size:14px;
color:#6b7280;
margin-bottom:6px;
}

.stat-text p{
font-size:22px;
font-weight:600;
color:#111827;
}

/* table */

.table-card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 6px 20px rgba(0,0,0,0.05);
}

.table-title{
font-size:18px;
font-weight:600;
margin-bottom:15px;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
text-align:left;
padding:10px;
font-size:13px;
color:#6b7280;
border-bottom:1px solid #eee;
}

table td{
padding:12px 10px;
font-size:14px;
border-bottom:1px solid #f3f4f6;
}

.status{
padding:4px 10px;
border-radius:6px;
font-size:12px;
}

.status.completed{
background:#dcfce7;
color:#16a34a;
}

.status.pending{
background:#fef3c7;
color:#ca8a04;
}

</style>


<h2 style="margin-bottom:25px;">Store Dashboard</h2>


<div class="dashboard-grid">

<div class="stat-card">

<div class="stat-text">
<h4>Total Orders</h4>
<p>1,245</p>
</div>

<div class="stat-icon">
<i class="fa-solid fa-cart-shopping"></i>
</div>

</div>


<div class="stat-card">

<div class="stat-text">
<h4>Total Customers</h4>
<p>843</p>
</div>

<div class="stat-icon">
<i class="fa-solid fa-users"></i>
</div>

</div>


<div class="stat-card">

<div class="stat-text">
<h4>Total Products</h4>
<p>156</p>
</div>

<div class="stat-icon">
<i class="fa-solid fa-shirt"></i>
</div>

</div>


<div class="stat-card">

<div class="stat-text">
<h4>Monthly Revenue</h4>
<p>$18,240</p>
</div>

<div class="stat-icon">
<i class="fa-solid fa-dollar-sign"></i>
</div>

</div>

</div>


<div class="table-card">

<div class="table-title">
Recent Orders
</div>

<table>

<thead>
<tr>
<th>Order ID</th>
<th>Customer</th>
<th>Product</th>
<th>Amount</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<tr>
<td>#1023</td>
<td>Rahul Sharma</td>
<td>Black Hoodie</td>
<td>$65</td>
<td><span class="status completed">Completed</span></td>
</tr>

<tr>
<td>#1022</td>
<td>Arjun Patel</td>
<td>Denim Jacket</td>
<td>$120</td>
<td><span class="status pending">Pending</span></td>
</tr>

<tr>
<td>#1021</td>
<td>Neha Singh</td>
<td>Oversized T-Shirt</td>
<td>$40</td>
<td><span class="status completed">Completed</span></td>
</tr>

<tr>
<td>#1020</td>
<td>Aman Khan</td>
<td>White Sneakers</td>
<td>$95</td>
<td><span class="status completed">Completed</span></td>
</tr>

</tbody>

</table>

</div>

@endsection