<div class="modal fade" id="updateProduct" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="errorMessage text-center">

                </div>
                <form id="updateForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="up_id" id="up_id">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="up_name" name="up_name">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                            anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="up_price" name="up_price">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                            anyone else.</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn-update" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>