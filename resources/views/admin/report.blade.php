@extends('Layout.index')

@section('title')
Report
@endsection

@section('content')

<style>
.report-area{
    padding:25px;
}

.chart-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(380px,1fr));
    gap:25px;
}

.chart-card{
    background:#ffffff;
    border-radius:14px;
    padding:20px;
    box-shadow:0 8px 20px rgba(0,0,0,0.06);
    cursor:pointer;
    transition:0.25s;
}

.chart-card:hover{
    transform:translateY(-3px);
}

canvas{
    width:100%;
    height:300px;
}

.chart-modal{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.65);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:999;
}

.chart-modal.active{
    display:flex;
}

.modal-content{
    width:80%;
    max-width:900px;
    background:white;
    border-radius:14px;
    padding:30px;
}

.modal-content canvas{
    height:450px;
}

/* STATS SECTION */

.stats-grid{
    margin-top:35px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.stat-card{
    background:white;
    border-radius:12px;
    padding:22px;
    box-shadow:0 6px 18px rgba(0,0,0,0.05);
}

.stat-title{
    font-size:14px;
    color:#777;
    margin-bottom:8px;
}

.stat-number{
    font-size:28px;
    font-weight:600;
}
</style>

<div class="report-area">

<div class="chart-grid">

<div class="chart-card" onclick="openChart('weeklySales')">
<canvas id="weeklySales"></canvas>
</div>

<div class="chart-card" onclick="openChart('monthlyRevenue')">
<canvas id="monthlyRevenue"></canvas>
</div>

<div class="chart-card" onclick="openChart('orderTrend')">
<canvas id="orderTrend"></canvas>
</div>

</div>


<!-- STATS -->

<div class="stats-grid">

<div class="stat-card">
<div class="stat-title">Today</div>
<div class="stat-number">₹2,450</div>
</div>

<div class="stat-card">
<div class="stat-title">This Week</div>
<div class="stat-number">₹14,900</div>
</div>

<div class="stat-card">
<div class="stat-title">This Month</div>
<div class="stat-number">₹58,300</div>
</div>

<div class="stat-card">
<div class="stat-title">Last Year</div>
<div class="stat-number">₹6,72,000</div>
</div>

</div>

</div>

<div class="chart-modal" id="chartModal" onclick="closeChart()">
<div class="modal-content">
<canvas id="bigChart"></canvas>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

let chartsData={
weeklySales:{
type:'bar',
data:{
labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
datasets:[{data:[12,9,7,11,15,18,13]}]
}
},
monthlyRevenue:{
type:'line',
data:{
labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
datasets:[{data:[4200,5100,6800,7200,8300,9200,10500,9800,8700,9400,11000,12500]}]
}
},
orderTrend:{
type:'line',
data:{
labels:['Week1','Week2','Week3','Week4'],
datasets:[{data:[120,150,170,210]}]
}
}
}

new Chart(document.getElementById('weeklySales'),chartsData.weeklySales)
new Chart(document.getElementById('monthlyRevenue'),chartsData.monthlyRevenue)
new Chart(document.getElementById('orderTrend'),chartsData.orderTrend)

let bigChart

function openChart(id){

document.getElementById('chartModal').classList.add('active')

if(bigChart){
bigChart.destroy()
}

bigChart=new Chart(
document.getElementById('bigChart'),
chartsData[id]
)

}

function closeChart(){

document.getElementById('chartModal').classList.remove('active')

if(bigChart){
bigChart.destroy()
}

}

</script>

@endsection