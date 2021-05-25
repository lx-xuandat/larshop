<!-- The Modal -->
<div class="modal" id="editModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="modalFormCustomer" name="modalFormData" role="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="firstname" class="form-control" id="firstname" name="firstname"
                                placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="lastname" class="form-control" id="lastname" name="lastname"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+84346479339">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="province">Province</label>
                            <select id="province" name="province" class="form-control">
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="district">District</label>
                            <select id="district" name="district" class="form-control">
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ward_street">Ward Street</label>
                            <select id="ward_street" name="ward_street" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-save" id="btn-save">Save</button>
            </div>

        </div>
    </div>
</div>
