@extends('layouts.app', [
    'namePage' => 'Application',
    'class' => 'sidebar-mini',
    'activePage' => 'events',
])

@section('content')
<div class="panel-header">
<div class="header text-center">
      <h2 class="title">Applications</h2>
      <p class="category">Approved/Pending Applications
      </p>
</div>
    
    </div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Your Applications
                </div>
                <div class="card-body">
                    @if(!is_null($data) && count($data) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Application Type</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Contact Number</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $application)
                                    <tr>
                                        <td>{{ $application->applicationtype }}</td>
                                        <td>{{ $application->sex }}</td>
                                        <td>{{ $application->age }}</td>
                                        <td>{{ $application->contactnumber }}</td>
                                        <td>{{ $application->created_at }}</td>
                                        <td>{{ $application->applicationStatus }}</td>
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
