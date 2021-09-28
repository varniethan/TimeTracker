<div class="page-title"><div class="title_left"><h3>QR Code - Shifts Available</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>View <small>your shifts details</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">
                    @foreach($todayShiftData as $todayShift)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Full Shift @ {{$branchData->name}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$todayShift->id}}</h5>
                                {{$todayShift->date}}
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <div class="">
                                    <iframe src="https://free.timeanddate.com/clock/i7xt82e6/n297/tluk/fn7/fs20/tct/pct/ftb/th2" frameborder="0" width="130" height="28" allowtransparency="true"></iframe>
                                </div>
                                <a href="#" class="btn btn-primary">Clock In</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
