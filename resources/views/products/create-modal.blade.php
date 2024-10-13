<div class="modal fade" id="createProduct" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Create New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="errorMessage text-center">
                </div>
                <form method="POST" action="" id="createForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                            anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                            anyone else.</small>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-create">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>