@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card w">
                <div class="card-header">
                    <h3 class="card-title">Attendance</h3>
                </div>
                <div class="card-body">
                    <p>Status:
                        @if($checkedIn)
                            <span class="text-success">Currently Checked In ({{ $lastAttendance->check_in->format('H:i:s') }})</span>
                        @else
                            <span class="text-danger">Not Checked In</span>
                        @endif
                    </p>

                    @if(!$checkedIn)
                        <form method="POST" action="{{ route('attendance.check-in') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Check In</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('attendance.check-out') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Check Out</button>
                        </form>
                    @endif
                </div>
            </div>
            {{-- admin chart for depts --}}
            @isset($deptChartData)
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Employees per Department</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="deptChart"></canvas>
                    </div>
                </div>
            @endisset

            {{-- hr chart for leave request --}}
            @isset($leaveChartData)
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Leave Requests by Status</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="leaveChart"></canvas>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@if(isset($deptChartData))
<script>
    const deptLabels = @json($deptChartData->pluck('nama'));
    const deptCounts = @json($deptChartData->pluck('count'));

    const deptCtx = document.getElementById('deptChart').getContext('2d');
    new Chart(deptCtx, {
        type: 'bar',
        data: {
            labels: deptLabels,
            datasets: [{
                label: 'Number of Employees',
                data: deptCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
@endif

@if(isset($leaveChartData))
<script>
    const leaveLabels = @json($leaveChartData->pluck('status_request'));
    const leaveCounts = @json($leaveChartData->pluck('total'));

    const leaveCtx = document.getElementById('leaveChart').getContext('2d');
    new Chart(leaveCtx, {
        type: 'bar',
        data: {
            labels: leaveLabels,
            datasets: [{
                label: 'Leave Requests',
                data: leaveCounts,
                backgroundColor: 'rgba(255, 159, 64, 0.6)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
@endif
@endsection

