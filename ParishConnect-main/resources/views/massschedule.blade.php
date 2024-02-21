@extends('layout')
@section('title', "Mass Schedule")
@section('styles')
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Align items to the top */
        }

        .registration-box {
            background-color: #ffffff; /* White background */
            padding: 20px; /* Add padding to create space between the content and the container */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
            width: 48%; /* Adjust width to fit both boxes */
        }

        .livestream-content {
            color: #333; /* Text color */
            font-size: 18px; /* Font size */
            line-height: 1.6; /* Line height */
            margin-bottom: 15px; /* Bottom margin */
        }

        .livestream-link {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Bold font weight */
        }

        .livestream-link:hover {
            text-decoration: underline; /* Add underline on hover */
        }

        .livestream-image {
            max-width: 80%; /* Maximum image width */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Rounded corners */
            margin-bottom: 15px; /* Bottom margin */
            margin-left: auto; /* Align to the right */
            margin-right: auto; /* Align to the left */
            display: block; /* Ensure it's a block-level element */
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="registration-box mx-auto mt-3">
        <div class="header">
            <h1>Mass Livestream</h1>
        </div>
        <div class="livestream-content">
            <a href="https://www.facebook.com/InangmgaDukhaParish/live_videos" target="_blank" class="livestream-link">Watch Livestream (Click Here!)</a>
        </div>
        <img src="https://scontent.fmnl5-2.fna.fbcdn.net/v/t39.30808-6/414680942_754662076708196_4119335385183308522_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=efb6e6&_nc_eui2=AeFPAe2YTQDQshfJAgXM_GDgwD9pb8rhRdbAP2lvyuFF1n307sRzfWV-fphPw_iRlGS4dDCSkuMZG5IvqqrW79nw&_nc_ohc=OH5AJn3bvo4AX8FSS0G&_nc_ht=scontent.fmnl5-2.fna&oh=00_AfAlz_c88uxHqAhcR9nkOZH3Lkt0RlJFEHIaw_xu9F5RHw&oe=65DB34E8" alt="Livestream Image" class="livestream-image">
    </div>

    <div class="registration-box mx-auto mt-3">
        <div class="header">
            <h1>Mass Schedule</h1>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td>Monday</td>
                    <td>6:30 AM</td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>6:30 PM</td>
                </tr>
                <tr>
                    <td>Wednesday to Friday</td>
                    <td>6:30 AM and 6:30 PM</td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>6:30 AM</td>
                </tr>
                <tr>
                    <td>Anticipated Sunday Mass</td>
                    <td>6:00 PM Saturday</td>
                </tr>
                <tr>
                    <td>Sunday Mass schedules</td>
                    <td>6:00 AM, 7:30 AM, 9:00 AM, 10:00 AM, 5:00 PM, 6:15 PM, 7:30 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
