@extends('layouts.app', [
    'namePage' => 'Mass Schedule',
    'activePage' => 'massScheduleOutside',
    'backgroundImage' => asset('assets') . "/img/ParishConnect_Register.jpg",
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-11 mx-auto"> <!-- Wrap the content within a container with maximum width -->
            @if(isset($massSchedules) && $massSchedules->isNotEmpty())
                @php
                    $groupedSchedules = $massSchedules->groupBy('MassDay');
                @endphp

                @foreach($groupedSchedules as $day => $schedules)
                    <div class="card mb-4"> <!-- Add margin bottom to create space between cards -->
                        <div class="card-header">
                            <h4 class="card-title">{{ $day }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schedules as $massSchedule)
                                            <tr>
                                                <td>{{ $massSchedule->MassTimeSchedule }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Mass Schedule available</p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush
