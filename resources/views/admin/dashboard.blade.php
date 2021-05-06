@extends('admin.layouts.app')

@section('content')
<!-- Card package -->
<div class="card-columns">
    <div class="card default-color mb-4 white-text">
        <div class="card-body">
          <div class="pull-right">
            <i class="fas fa-chart-line"></i>
          </div>
          <p>Today Orders</p>
          <h4>10</h4>
        </div>
        <div class="progress md-progress">
          <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
          <p class="mb-0">Worse than last day (5%)</p>
        </div>
    </div>
      <!-- Panel -->

          <!-- Panel -->
    <div class="card mimosa mb-4 white-text">
        <div class="card-body">
          <div class="pull-right">
            <i class="fas fa-chart-line"></i>
          </div>
          <p>Pending Orders</p>
          <h4>150</h4>
        </div>
        <div class="progress md-progress">
          <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
          <p class="mb-0"><span style="visibility: hidden">Worse than last week (25%)</span></p>
        </div>
    </div>
      <!-- Panel -->
    <!-- Panel -->
    <div class="card info-color mb-4 white-text">
        <div class="card-body">
          <div class="pull-right">
            <i class="fas fa-chart-line"></i>
          </div>
          <p>Toatal Orders</p>
          <h4>200</h4>
        </div>
        <div class="progress md-progress">
          <div class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
          <p class="mb-0"><span style="visibility: hidden">Worse than last week (25%)</span></p>
        </div>
    </div>
      <!-- Panel -->


</div>
  <!-- Card package -->
@endsection
