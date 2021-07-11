<button type="button" class="btn btn-success" data-toggle="modal" data-target="#timeoff_request" data-whatever="@getbootstrap">Add Time Off Request</button>

<div class="modal fade" id="timeoff_request" tabindex="-1" role="dialog" aria-labelledby="timeoffRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="timeoffRequestLabel">Add Time Off Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Employee</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Date<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='date' type="date" name="date" required='required'>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Time Off Code</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Pay Rate</label>
                        <div class="col-md-6 col-sm-6">
                            <label for="recipient-name" class="col-form-label">$0.00</label>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="message-text">Description</label>
                        <textarea class="form-control col-md-9 col-sm-9" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-success">Save and Add New</button>
            </div>
        </div>
    </div>
</div>
