@extends('layouts.shift_app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-qr.full_shifts
                    :branchData="$branchData"
                    :employeeData="$employeeData"
                    :positionData="$positionData"
                    :shiftTypeData="$shiftTypeData"
                    :todayShiftData="$todayShiftData"/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

@section('scripts')
    <script type='text/javascript'>
        $(document).ready(function(){
            $("#clock_in_button").click( function()
                {
                    let shift_id = $('#shift_id').text();
                    console.log(shift_id);
                    // AJAX request
                    $.ajax({
                        url: {{route('full_shifts.qrclockin')}},
                        type: 'post',
                        dataType: 'json',
                        data:{
                            _token:$("input[name=_token]").val(),
                            'shift_id':shift_id,
                        },
                        success: function(response) {

                        }

                    });
                }
            );
        });
    </script>
@endsection

