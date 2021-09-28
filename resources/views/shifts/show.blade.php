@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.account-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-show.shifts
                    :shiftData="$shiftData"
                    :breakTypeData="$breakTypeData"
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
    <script>
        $(document).ready(function() {
            $("#shift_types").hide();
        });
        $(document).ready(function() {
            $("body").on("click", "#break-btn", function () {
                $("#shift_types").show();
            });
        })
    </script>


    <script>
        $('.break_type').click(function(){
            var shift_id=$('.shift_id').attr('placeholder');
            var formData = {
                'break_type_id': $(this).attr('value')
            };
            var breakTypeId = formData.break_type_id
            $.ajax({
                type: 'POST',
                url: "{{route('full_shifts.addShiftBreak')}}",
                data:{
                    _token:'nkeAxIOj2M0YrorwAqrcGaqsaya8VOaTSBR6r0F4', breakTypeId, shift_id,
                },
                dataType: 'json',
                encode: true,
                success: function(response)
                {
                   console.log("success")
                }
            })
        });



        $("#end_shift_btn").click(function (e)
        {
            e.preventDefault();

            $("input:checkbox[name=ids]:checked").each(function(){
                allids.push($(this).val());
            });

            $.ajax({
                url:"{{route('full_shifts.endShiftsEarley')}}",
                type:"PUT",
                data:{
                    _token:$("input[name=_token]").val(),
                    ids:allids
                },
                success: function(response)
                {
                    $.each(allids, function(key, val){
                        location.reload(true);
                    })
                }
            });
        })
    </script>
@endsection
