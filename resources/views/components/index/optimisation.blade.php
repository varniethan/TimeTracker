<div class="page-title">
    <div class="col-md-4">
        <div class="title_left"><h3>Decision Maker</h3></div>
    </div>
    <div class="col-md-3">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-sucess') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
    <p hidden id="org_id">{{session('org_id')}}</p>
</div>


<div class="clearfix"></div>
<div class="x_panel">
    <div class="x_title">
        <h2>Make decisions <small>take day to day to business decisions easily and effectively.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item" href="#">Settings 1</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <div class="row row-margin-01">
                <div class="col-md-6">
                    <form method="post">
                        <p class="font-weight-bold">Enter the product prices</p>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Price of Product 1</label>
                                <input type="number" name="product_1_price" id="product_1_price" class="form-control" id="inputEmail4" placeholder="90 Price, $">
                            </div>
                            <div class="form-group col-md-4 offset-4">
                                <label for="inputEmail4">Price of Product 2</label>
                                <input type="number" name="product_2_price" id="product_2_price" class="form-control" id="inputEmail4" placeholder="75 Price, $">
                            </div>
                        </div>
                        <p class="font-weight-bold">Enter the number hours that are needed to complete following operations</p>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Operation 1 Hours</label>
                                <input type="number" name="operation_1_product_1_hours" id="operation_1_product_1_hours" class="form-control" id="inputEmail4" placeholder="3 Hours">
                            </div>
                            <div class="form-group col-md-4 offset-4">
                                <label for="inputEmail4">Operation 1 Hours</label>
                                <input type="number" name="operation_1_product_2_hours" id="operation_1_product_2_hours" class="form-control" id="inputEmail4" placeholder="2 Hours">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="fo  rm-group col-md-4">
                                <label for="inputEmail4">Operation 2 Hours</label>
                                <input type="number" name="operation_2_product_1_hours" id="operation_2_product_1_hours" class="form-control" id="inputEmail4" placeholder="9 Hours">
                            </div>
                            <div class="form-group col-md-4 offset-4">
                                <label for="inputEmail4">Operation 2 Hours</label>
                                <input type="number" name="operation_2_product_2_hours" id="operation_2_product_2_hours" class="form-control" id="inputEmail4" placeholder="4 Hours">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Operation 3 Hours</label>
                                <input type="number" name="operation_3_product_1_hours" id="operation_3_product_1_hours" class="form-control" id="inputEmail4" placeholder="2 Hours">
                            </div>
                            <div class="form-group col-md-4 offset-4">
                                <label for="inputEmail4">Operation 3 Hours</label>
                                <input type="number" name="operation_3_product_2_hours" id="operation_3_product_2_hours" class="form-control" id="inputEmail4" placeholder="10 Hours">
                            </div>
                        </div>
                        <p class="font-weight-bold">Enter the maximum number of hours that will be allocated for each operation</p>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Max Operation 1 Hours</label>
                                <input type="number" name="max_operaton_1_hours" id="max_operaton_1_hours" class="form-control" id="inputEmail4" placeholder="66 Max Hours">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Max Operation 2 Hours</label>
                                <input type="number" name="max_operaton_2_hours" id="max_operaton_2_hours" class="form-control" id="inputEmail4" placeholder="180 Max Hours">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Max Operation 3 Hours</label>
                                <input type="number" name="max_operaton_3_hours" id="max_operaton_3_hours" class="form-control" id="inputEmail4" placeholder="200 Max Hours">
                            </div>
                        </div>
                        <button  type="button" id="make_decision" class="btn btn-primary">Make Decision</button>
                    </form>
                </div>
                <div class="col md-6">
                    <p class="font-weight-bold">An example scenario that the decision maker can be used:</p>
                    <!-- blockquote -->
                    <blockquote class="blockquote-reverse">
                        <p>A furniture manufacturer makes two types of furniture – chairs and sofas. The production of the sofas and chairs requires three operations – carpentry, finishing, and upholstery. Manufacturing a chair requires 3 hours of carpentry, 9 hours of finishing, and 2 hours of upholstery. Manufacturing a sofa requires 2 hours of carpentry, 4 hours of finishing, and 10 hours of upholstery. The factory has allocated at most 66 labor hours for carpentry, 180 labor hours for finishing, and 200 labor hours for upholstery. The profit per chair is $90 and the profit per sofa is $75. How many chairs and how many sofas should be produced each day to maximize the profit?</p>
                        <small>"Answer: 10 Chairs and 18 Sofas"</small>
                        <br>
                        <small>"Introduction to Simplex Algorithm Notes"<cite title="Source Title"> K.Varniethan</cite></small>
                    </blockquote>
                    <p class="font-weight-bold">The results will be displayed below once the decision is made:</p>
                    <p id="decision1" class="font-weight-bold"></p>
                    <p id="decision2" class="font-weight-bold"></p>
                </div>
        </div>
    </div>
</div>
