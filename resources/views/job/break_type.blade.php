@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.account_pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <x-code.breaks :breakTypeData="$breakTypeData"/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection


@section('scripts')
    @if (count($errors) > 0)
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#openTab').modal('show');
            });
        </script>
    @endif
@endsection
