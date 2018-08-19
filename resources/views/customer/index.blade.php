@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Diet Settings</td>
                        <td>Preferred Distance</td>
                        <td>Preferred Price Range </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $preferences->dietary_mode }}</td>
                        <td>{{ $preferences->preferred_price_range }}</td>
                        <td>{{ $preferences->preferred_radius_size }}</td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
