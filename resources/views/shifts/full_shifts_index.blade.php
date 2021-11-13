@extends('layouts.shift_app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-index.full_shifts
                    :branchData="$branchData"
                    :employeeData="$employeeData"
                    :positionData="$positionData"
                    :shiftTypeData="$shiftTypeData"
                    :breakTypeData="$breakTypeData"
                    :fullShiftData="$fullShiftData"/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Cropper -->
{{--    <script src="{{ asset('assets/vendors/cropper/dist/cropper.min.js') }}"></script>--}}
    <script  type="text/javascript">
        function addImage(pk) {
            alert("addImage: " + pk);
        }

        $('#add_shift .save').click(function (e) {
            e.preventDefault();
            addImage(5);
            $('#add_shift').modal('hide');
            //$(this).tab('show')
            return false;
        })
        $(function () {$('#myDatepicker').datetimepicker();});

        $('#myDatepicker3').datetimepicker({format: 'hh:mm A'});
        $('#myDatepicker4').datetimepicker({format: 'hh:mm A'});
    </script>

{{--    Crud Script--}}
    <script>
        $(function(e)
        {
            $("#chkCheckAll").click(function(){$(".checkBox_class").prop('checked', $(this).prop('checked'));})

            $("#approveAllSelectedRecord").click(function (e)
            {
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{route('full_shifts.approveSelected')}}",
                    type:"PUT",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids:allids
                    },
                    success: function(response)
                    {
                        location.reload(true);
                        // $.each(allids, function(key, val){
                        //     $("#sid"+val).remove();
                        // })
                    }
                });
            })

            $("#unapproveAllSelectedRecord").click(function (e)
            {
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{route('full_shifts.unapproveSelected')}}",
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

            $("#deleteAllSelectedRecord").click(function (e)
            {
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{route('full_shifts.deleteSelected')}}",
                    type:"DELETE",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids:allids
                    },
                    success: function(response)
                    {
                        $.each(allids, function(key, val){
                            $("#sid"+val).remove();
                            location.reload(true);
                        })
                    }
                });
            })
        });
    </script>


@endsection

