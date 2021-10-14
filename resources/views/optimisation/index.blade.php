@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                </div>
{{--                <x-index.organisation :organisationnData="$organisationData"/>--}}
                <x-index.optimisation/>
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
            $("#make_decision").click( function()
                {
                    console.log("Ready");
                    let bi_api_url = 'http://' + window.location.hostname + ':5001/simplex';
                    console.log(bi_api_url);
                    let org_id = $('#org_id').text();

                    let product_1_price = $('#product_1_price').text();
                    let product_2_price = $('#product_2_price').text();

                    let operation_1_product_1_hours = $('#operation_1_product_1_hours').text();
                    let operation_1_product_2_hours = $('#operation_1_product_2_hours').text();

                    let operation_2_product_1_hours = $('#operation_2_product_1_hours').text();
                    let operation_2_product_2_hours = $('#operation_2_product_2_hours').text();

                    let operation_3_product_1_hours = $('#operation_3_product_1_hours').text();
                    let operation_3_product_2_hours = $('#operation_3_product_2_hours').text();

                    let max_operaton_1_hours = $('#max_operaton_1_hours').text();
                    let max_operaton_2_hours = $('#max_operaton_2_hours').text();
                    let max_operaton_3_hours = $('#max_operaton_3_hours').text();
                    console.log(product_1_price);

                    let shift_id = $('#shift_id :selected').val();
                    console.log(shift_id);
                    let date = $('#date').val();
                    console.log(date);

                }
            );
        });
    </script>


    <script type='text/javascript'>
        $(document).ready(function(){
            $("#make_decision").click( function()
                {
                    console.log("Ready");
                    let bi_api_url = 'http://' + window.location.hostname + ':5001/simplex';
                    console.log(bi_api_url);
                    let product_1_price = $('#product_1_price').val();
                    let product_2_price = $('#product_2_price').val();

                    let operation_1_product_1_hours = $('#operation_1_product_1_hours').val();
                    let operation_1_product_2_hours = $('#operation_1_product_2_hours').val();

                    let operation_2_product_1_hours = $('#operation_2_product_1_hours').val();
                    let operation_2_product_2_hours = $('#operation_2_product_2_hours').val();

                    let operation_3_product_1_hours = $('#operation_3_product_1_hours').val();
                    let operation_3_product_2_hours = $('#operation_3_product_2_hours').val();

                    let max_operaton_1_hours = $('#max_operaton_1_hours').val();
                    let max_operaton_2_hours = $('#max_operaton_2_hours').val();
                    let max_operaton_3_hours = $('#max_operaton_3_hours').val();

                    // AJAX request
                    $.ajax({
                        url: bi_api_url,
                        type: 'post',
                        dataType: 'json',
                        data:{
                            'auth_token':'123456',
                            'product_1_price':product_1_price,
                            'product_2_price':product_2_price,
                            'operation_1_product_1_hours':operation_1_product_1_hours,
                            'operation_1_product_2_hours':operation_1_product_2_hours,
                            'operation_2_product_1_hours':operation_2_product_1_hours,
                            'operation_2_product_2_hours':operation_2_product_2_hours,
                            'operation_3_product_1_hours':operation_3_product_1_hours,
                            'operation_3_product_2_hours':operation_3_product_2_hours,
                            'max_operaton_1_hours':max_operaton_1_hours,
                            'max_operaton_2_hours':max_operaton_2_hours,
                            'max_operaton_3_hours':max_operaton_3_hours,
                        },
                        success: function(response) {
                            $('#decision1').html('Product 1 quantity:' + response['decision_list'][0] + ' units');
                            $('#decision2').html('Product 2 quantity:' + response['decision_list'][1] + ' units');
                            // $.each(response['decision_list'], function (i, item) {
                            //     $('#decision').html('Product '+ i + ' quantity:' + response['decision_list'][1]);
                            // });
                        }

                    });
                }
            );
        });
    </script>


@endsection
