<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#timeoff_categories" data-whatever="@getbootstrap">Add Time Off Category</button>

<div class="modal fade" id="timeoff_categories" tabindex="-1" role="dialog" aria-labelledby="timeoffCategoriesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="timeoffCategoriesLabel">Add Time Off Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Employee</label>
                        <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="message-text">Description</label>
                        <textarea class="form-control col-md-9 col-sm-9" id="message-text"></textarea>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label col-form-label col-md-3 col-sm-3">Type</label>
                        <div class="form-control col-md-6 col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Paid</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Unpaid</label>
                            </div>
                        </div>
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


