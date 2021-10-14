<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @foreach($payData as $pay)
    <title>{{$pay->last_name}}{{"'s Pay Slip"}}</title>
    <link rel="icon" type="image/ico" href="{{ asset('assets/images/favicon.ico')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
@foreach($holidayData as $holiday)
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center lh-1 mb-2">
                <h6 class="fw-bold">Payslip for {{$pay->organisation}}</h6> <span class="fw-normal">Payment slip from {{$start_date}} to {{$end_date}}</span>
            </div>
            <div class="d-flex justify-content-end"> <span>Working Branch: {{$pay->branch}}</span> </div>
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="row">
                        <div class="col-md-3">
                            <div> <span class="fw-bolder">EMP Code:</span> <small class="ms-3">{{$pay->id}}</small> </div>
                        </div>
                        <div class="col-md-5">

                            <div> <span class="fw-bolder">EMP Name:</span> <small class="ms-3">{{$pay->first_name}} {{$pay->last_name}}</small> </div>
                        </div>
                        <div class="col-md-4">
                            <div> <span class="fw-bolder">NI Number:</span> <small class="ms-3">{{$pay->ni_number}}</small> </div>
                        </div>
                    </div>
                </div>
                <table class="mt-4 table table-bordered">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Earnings</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Deductions</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Basic Pay</th>
                        <td>{{$pay->basic_salary}} {{'£'}}</td>
                        <td>Tax</td>
                        <td><i class="fa fa-ban"></i></td>
                    </tr>
                    <tr>
                        <th scope="row">No. of Hours worked</th>
                        <td>{{$pay->duration}}</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th scope="row">Hourly Rate</th>
                        <td>{{$pay->rate}} {{'£'}} per hrs</td>
                    </tr>
                    <tr>
                        <th scope="row">Hourly Pay Total</th>
                        <td>{{$pay->total_pay}}  {{'£'}}</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th scope="row">No. of Leaves</th>
                        <td>{{$holiday->no_of_holidays}} with {{$holiday->duration}}{{' hrs'}}</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th scope="row">Holiday Wages Total</th>
                        <td>{{$holiday->total_pay}} {{'£'}}</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="border-top">
                        <th scope="row">Total Earning</th>
                        <td>{{ $pay->basic_salary + $pay->total_pay + $holiday->total_pay}} {{'£'}}</td>
                        <td>Total Deductions</td>
                        <td><i class="fa fa-ban"></i></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : {{ $pay->basic_salary + $pay->total_pay + $holiday->total_pay}} {{'£'}}</span> </div>
                <style>.row-margin-05 { margin-top: 5em; }</style>
                <div class="border col-md-8">
                    <div class="d-flex flex-column .row-margin-05"> <span>In Words</span> <span>Twenty Five thousand nine hundred seventy only</span> </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For {{$pay->organisation}}</span> <span class="mt-4">Authorised Signatory</span> </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
</body>
</html>
