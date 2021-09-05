@extends('layouts.app')


@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-index.holiday
                    :branchData="$branchData"
                    :employeeData="$employeeData"
                    :positionData="$positionData"
                    :holidayTypeData="$holidayTypeData"
                    :holidayData="$holidayData"/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

@section('scripts')
{{--    <script>--}}
{{--        $('#exampleModal').on('show.bs.modal', function (event) {--}}
{{--            var button = $(event.relatedTarget) // Button that triggered the modal--}}
{{--            var recipient = button.data('whatever') // Extract info from data-* attributes--}}
{{--            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).--}}
{{--            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.--}}
{{--            var modal = $(this)--}}
{{--            modal.find('.modal-title').text('New message to ' + recipient)--}}
{{--            modal.find('.modal-body input').val(recipient)--}}
{{--        })--}}

{{--        $('#timeoff_request').on('show.bs.modal', function (event) {--}}
{{--            var button = $(event.relatedTarget) // Button that triggered the modal--}}
{{--            var recipient = button.data('whatever') // Extract info from data-* attributes--}}
{{--            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).--}}
{{--            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.--}}
{{--            var modal = $(this)--}}
{{--            modal.find('.modal-title').text('New message to ' + recipient)--}}
{{--            modal.find('.modal-body input').val(recipient)--}}
{{--        })--}}
{{--    </script>--}}
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
                url:"{{route('holiday.approveSelected')}}",
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
                url:"{{route('holiday.unapproveSelected')}}",
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
                url:"{{route('holiday.deleteSelected')}}",
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
