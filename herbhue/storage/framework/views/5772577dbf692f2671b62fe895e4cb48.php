<?php $__env->startSection('content'); ?>
    <div class=" border-0 shadow  bg-transparent">
        <div class="card-body d-flex justify-content-between">
            <h5> <a href="#" class="text-dark">Registered Users</a> </h5>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <button type="button" class="btn btn-sm btn-outline-primary"><i
                        class="fa fa-file-pdf me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i
                        class="fa fa-file-excel me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-print me-2"></i>Print</button>


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
                            <th scope="col" class="bg-primary text-white">Mobile Number</th>
                            <th scope="col" class="bg-primary text-white">First Name</th>
                            <th scope="col" class="bg-primary text-white">Last Name</th>

                            <th scope="col" class="bg-primary text-white">Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">123456789</th>
                            <td>+91 0000000000</td>
                            <td>Firstname</td>
                            <td>lastname</td>

                            <td><span class="badge bg-light-info text-dark p-2"><div class="mb-2">7:36 AM</div>2023-08-28</span></td>


                        </tr>
                        <tr>
                            <th scope="row">123456789</th>
                            <td>+91 0000000000</td>
                            <td>Firstname</td>
                            <td>lastname</td>

                            <td><span class="badge bg-light-info text-dark p-2"><div class="mb-2">7:36 AM</div>2023-08-28</span></td>

                        </tr>




                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\kyc-app\resources\views/admin/user.blade.php ENDPATH**/ ?>