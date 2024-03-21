@extends('layouts.app', [
    'namePage' => 'Liturgical Activities Created',
    'class' => 'sidebar-mini',
    'activePage' => 'liturgicalActivitiesScheduling',
])

@section('content')
<div class="panel-header">
<div class="header text-center">
      <h2 class="title">Liturgical Activities</h2>
      <p class="category">Approved/Pending Liturgical Activities
      </p>
</div>
    </div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Your Activities
                </div>
                <div class="card-body">
                    @if(!is_null($data) && count($data) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Host</th>
                                    <th>Description</th>
                                    <th>Date and Time</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $application)
                                    <tr>
                                        <td>{{ $application->ActivityType }}</td>
                                        <td>{{ $application->ActivityName }}</td>
                                        <td>{{ $application->ActivityHost }}</td>
                                        <td>{{ $application->ActivityDescription }}</td>
                                        <td>{{ $application->ActivityDateTime }}</td>
                                        <td>{{ $application->created_at }}</td>
                                        <td>{{ $application->activityStatus }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No applications found.</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initGoogleMaps();
    });
</script>
@endpush




<!-- <div>
<ul>
@foreach($data as $i)
<li>{{$i->applicationtype}}</li>
@endforeach
</ul>
</div> -->
