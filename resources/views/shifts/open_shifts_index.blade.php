@extends('layouts.shift_app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-index.open_shifts
                    :branchData="$branchData"
                    :employeeData="$employeeData"
                    :positionData="$positionData"
                    :shiftTypeData="$shiftTypeData"
                    :openShiftData="$openShiftData"/>
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
                    url:"{{route('open_shifts.approveSelected')}}",
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
                    url:"{{route('open_shifts.unapproveSelected')}}",
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

            $("#endAllSelectedRecord").click(function (e)
            {
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{route('open_shifts.endSelected')}}",
                    type:"PUT",
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

            $("#deleteAllSelectedRecord").click(function (e)
            {
                e.preventDefault();
                var allids = [];

                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{route('open_shifts.deleteSelected')}}",
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

