<?php $__env->startSection('content'); ?>


   <div class=" border-0 shadow  bg-transparent">
        <div class="card-body d-flex justify-content-between">
            <h5> <a href="#" class="text-dark">RETENTION</a>   </h5>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-file-pdf me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-file-excel me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-print me-2"></i>Print</button>


            </div>
        </div>
    </div>

    <div class="card border-0 shadow mt-4 bg-transparent ">
        <div class="card-body">

            <div id="filterwaladiv22">
                <input type="radio" class="btn-check" name="options-outlined" id="success-outlined1" autocomplete="off"  >
                <label class="btn btn-outline-primary btn-sm me-2" for="success-outlined1">All</label>
                <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off"  >
                <label class="btn btn-outline-primary btn-sm me-2" for="success-outlined">Draft</label>

                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                <label class="btn btn-outline-primary btn-sm me-2" for="danger-outlined">Open</label>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered border-top border-start small" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary text-white">Reference number</th>
                            <th scope="col" class="bg-primary text-white">First Name</th>
                            <th scope="col" class="bg-primary text-white">Last Name</th>
                            <th scope="col" class="bg-primary text-white">Company Name</th>
                            <th scope="col" class="bg-primary text-white">Mobile Number</th>
                            <th scope="col" class="bg-primary text-white">Email address</th>
                            <th scope="col" class="bg-primary text-white">Date of application</th>
                            <th scope="col" class="bg-primary text-white">Retention</th>
                            <th scope="col" class="bg-primary text-white">Status</th>
                            <th scope="col" class="bg-primary text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">    <a href="<?php echo e(('/application-detail')); ?>" target="_blank" class="badge bg-light-info text-decoration-none  text-black">123456789</a></th>
                        <td>Firstname</td>
                        <td>lastname</td>
                        <td>companyname</td>
                        <td>+91 0000000000</td>
                        <td>user@gmail.com</td>
                        <td><span class="badge bg-light-info text-dark p-2"> 2023-08-28</span></td>
                        <td>10 Days Left</td>
                        <td>
                            <span class="badge bg-light-danger text-dark p-2">Draft</span>
                        </td>
                    <td>
                            <i class="bx bx-trash text-danger me-1 cursor-pointer delete-customer"   data-bs-toggle="tooltip" data-bs-placement="right" title="Delete"></i></td>
                      </tr>

                      <tr>
                        <th scope="row">    <a href="<?php echo e(('/application-detail')); ?>" target="_blank" class="badge bg-light-info text-decoration-none  text-black">123456789</a></th>
                        <td>Firstname</td>
                        <td>lastname</td>
                        <td>companyname</td>
                        <td>+91 0000000000</td>
                        <td>user@gmail.com</td>
                        <td><span class="badge bg-light-info text-dark p-2"> 2023-08-28</span></td>
                        <td>10 Days Left</td>
                        <td>
                            <span class="badge bg-light-danger text-dark p-2">Draft</span>
                        </td>
                    <td>
                            <i class="bx bx-trash text-danger me-1 cursor-pointer delete-customer"   data-bs-toggle="tooltip" data-bs-placement="right" title="Delete"></i></td>
                      </tr>


                      <tr>
                        <th scope="row">    <a href="<?php echo e(('/application-detail')); ?>" target="_blank" class="badge bg-light-info text-decoration-none  text-black">123456789</a></th>
                        <td>Firstname</td>
                        <td>lastname</td>
                        <td>companyname</td>
                        <td>+91 0000000000</td>
                        <td>user@gmail.com</td>
                        <td><span class="badge bg-light-info text-dark p-2"> 2023-08-28</span></td>
                        <td>10 Days Left</td>
                        <td>
                            <span class="badge bg-light-danger text-dark p-2">Draft</span>
                        </td>
                    <td>
                            <i class="bx bx-trash text-danger me-1 cursor-pointer delete-customer"   data-bs-toggle="tooltip" data-bs-placement="right" title="Delete"></i></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\kyc-app\resources\views/admin/retention.blade.php ENDPATH**/ ?>