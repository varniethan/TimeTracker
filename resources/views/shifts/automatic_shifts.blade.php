@extends('layouts.shift_app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-index.automatic_shifts
                    :shiftData="$shiftData"
                    :branchData="$branchData"
                />
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Script -->
    <script type='text/javascript'>
        $(document).ready(function(){
            $("#shift_generate_button").click( function()
                {
                    console.log("Ready");
                    let bi_api_url = 'http://' + window.location.hostname + ':5001/workforce';
                    console.log(bi_api_url);
                    let org_id = $('#org_id').text();
                    console.log(org_id);
                    let shift_id = $('#shift_id :selected').val();
                    console.log(shift_id);
                    let date = $('#date').val();
                    console.log(date);
                    // AJAX request
                    $.ajax({
                        url: bi_api_url,
                        type: 'post',
                        dataType: 'json',
                        data:{
                            'auth_token':'123456',
                            'organisation_id':org_id,
                            'shift_id':shift_id,
                        },
                        success: function(response) {
                            $('#returned_data').html(response['orgID'] + '<br>' + response['profit'] + '<br>' + response['staff_list']);
                            $.each(response['staff_list'], function (i, item) {
                                var rows = "<tr>"
                                    + "<td>" + (i+1) + "</td>"
                                    + "<td>" + response['staff_list'][i] + "</td>"
                                    + "</tr>";
                                $('#shift_id tbody').append(rows);
                            });
                        }

                    });
                }
            );

            $("#shift_push_button").click( function()
                {
                    console.log("Ready");
                    let bi_api_url = 'http://' + window.location.hostname + ':5001/workforce';
                    console.log(bi_api_url);
                    let org_id = $('#org_id').text();
                    console.log(org_id);
                    let shift_id = $('#shift_id :selected').val();
                    console.log(shift_id);
                    let branch_id = $('#branch_id :selected').val();
                    console.log(branch_id);
                    let date = $('#date').val();
                    console.log(date);
                    // AJAX request
                    $.ajax({
                        url: bi_api_url,
                        type: 'post',
                        dataType: 'json',
                        data:{
                            'auth_token':'123456',
                            'organisation_id':org_id,
                            'shift_id':shift_id,
                        },
                        success: function(response) {
                            var allids = response['staff_list']
                            $.ajax({
                                url:"{{route('full_shifts.pushGeneratedShifts')}}",
                                type:"POST",
                                data:{
                                    _token:$("input[name=_token]").val(),
                                    'shift_id':shift_id,
                                    'branch_id':branch_id,
                                    'date':date,
                                    ids:allids
                                },
                                success: function(response)
                                {
                                    location.reload(true);
                                    // $.each(allids, function(key, val){
                                    //     location.reload(true);
                                    // })
                                }
                            });

                        }

                    });
                }
            );
        });
    </script>
@endsection

