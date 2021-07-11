@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-employer.all_employer_left_pane/>
            <x-employer.employer_top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                </div>
                <x-employer.add_company :countryData="$countryData"/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbars.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

@section('scripts')
    </script>
    <script type='text/javascript'>

        $(document).ready(function(){

            // Country Change
            $('#sel_country').change(function(){

                // Country id
                var id = $(this).val();

                // Empty the dropdown
                $('#sel_city').find('option').not(':first').remove();

                // AJAX request
                $.ajax({
                    url: 'getCities/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){

                        var len = 0;
                        if(response['data'] != null){
                            len = response['data'].length;
                        }

                        if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){
                                var id = response['data'][i].id;
                                var name = response['data'][i].name;
                                var option = "<option value='"+id+"'>"+name+"</option>";
                                $("#sel_city").append(option);
                            }
                        }

                    }
                });
            });

        });

    </script>
@endsection
