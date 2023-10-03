<?php $__env->startSection('content'); ?>


   <div class=" border-0 shadow  bg-transparent">
        <div class="card-body d-flex justify-content-between">
            <h5> <a href="#" class="text-dark">Notifications</a>   </h5>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-file-pdf me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-file-excel me-2"></i>Export</button>
                <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-print me-2"></i>Print</button>
                <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addStore"><i class="fa fa-plus me-2"></i>Add</button>

            </div>
        </div>
    </div>

    <div class="card border-0 shadow mt-4 bg-transparent ">
        <div class="card-body">


            <div class="table-responsive ">
                <table class="table table-bordered border-top border-start small" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary text-white">S.No</th>
                            <th scope="col" class="bg-primary text-white">Message</th>
                            <th scope="col" class="bg-primary text-white">Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">01</th>
                            <td class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestias maiores nulla aliquid ad voluptas ab, perspiciatis maxime voluptatem, placeat tempore dolores minima pariatur ut vero doloremque nobis unde fugit!</td>


                            <td><span class="badge bg-light-info text-dark p-2"><div class="mb-2">7:36 AM</div>2023-08-28</span></td>


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
                <h5 class="modal-title text-white" id="exampleModalLabel">Send Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Type Your Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary">Send</button>
            </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\kyc-app\resources\views/admin/notifications.blade.php ENDPATH**/ ?>