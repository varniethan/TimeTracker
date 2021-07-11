@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbars.left_pane/>
            <x-navbars.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                    <div>
                        <x-timeoff.timeoff_categories/>
                        <x-timeoff.add_timeoff/>
                        <x-timeoff.approve_timeoff/>
                        <x-timeoff.unapprove_timeoff/>
                        <x-buttons.remove/>
                    </div>
                    <x-timeoff.timeoff_table/>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbars.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })

        $('#timeoff_request').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
@endsection
