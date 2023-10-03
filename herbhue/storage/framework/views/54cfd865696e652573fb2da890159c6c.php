<?php $__env->startSection('content'); ?>
    <div class=" border-0 shadow  bg-transparent">
        <div class="card-body d-flex justify-content-between">
            <h5> <a href="#" class="text-dark">Upload Deeds</a> </h5>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <button type="button" class="btn btn-sm btn-outline-primary"><i
                        class="fa fa-file-pdf me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i
                        class="fa fa-file-excel me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-print me-2"></i>Print</button>
                <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target="#addStore"><i class="fa fa-plus me-2"></i>Add</button>

            </div>
        </div>
    </div>

    <div class="card border-0 shadow mt-4 bg-transparent ">
        <div class="card-body">


            <div class="table-responsive ">
                <table class="table table-bordered border-top border-start small" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary text-white">User ID</th>
                            <th scope="col" class="bg-primary text-white"> Name</th>
                            <th scope="col" class="bg-primary text-white"> Deeds</th>
                            <th scope="col" class="bg-primary text-white">Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">123456789</th>
                            <td>Firstname</td>
                            <td>
                                <p>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1667px-PDF_file_icon.svg.png"
                                        style="width: 20px;" alt=""> Notary
                                </p>
                            </td>

                            <td><span class="badge bg-light-info text-dark p-2"> 2023-08-28</span></td>


                        </tr>





                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addStore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary py-3">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Upload Deeds</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12 mb-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select User</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Document name">
                                  </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label" for="customFile">Upload Deeds</label>
                                <input type="file" class="form-control" id="customFile" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\kyc-app\resources\views/admin/deeds.blade.php ENDPATH**/ ?>