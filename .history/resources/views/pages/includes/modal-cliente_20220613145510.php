<!-- Modal Dialog Scrollable -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
    Modal Dialog Scrollable
</button> -->
<div class="modal fade" id="modalDialogScrollable" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- No Labels Form -->
                <form class="row g-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="City">
                    </div>
                    <div class="col-md-4">
                        <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="Zip">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- End No Labels Form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->