

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-5">
                    <div class="card border-radius-20 border-secondary">
                        <div class="card-header bg-transparent d-flex justify-content-between ">
                            <h3>2 Item in your Cart</h3>
                            <h5 class="text-green pt-2"><img src="img/favorite_FILL0_wght400_GRAD0_opsz24.svg"
                                    class="me-2" style="width: 25px;" alt="">Saved for later</h5>
                        </div>
                        <div class="card-body">
                            <div class="row border-bottom pb-2">
                                <div class="col-3">
                                    <img src="img/medicine.png" class="w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <h6 class="fw-bold">Glucosamine HCL 1500 mg Tablet Joint Health with...</h6>
                                    <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                                    <span class="text-secondary">M.R.P: <span
                                            class="text-decoration-line-through text-secondary">£  535.00</span><span
                                            class="fw-bold text-black ms-3">£  241.00</span></span>


                                </div>
                                <div class="col-3">

                                    <p class="text-end"><img src="img/delete_FILL0_wght400_GRAD0_opsz24.svg" alt=""
                                            style="width: 20px;"></p>
                                    <div class="d-flex justify-content-end pt-4 mt-4">
                                        <span class="minus btn btn-success btn-sm shadow  "
                                            style="height: 35px;">-</span>
                                        <input type="number" class="count shadow border-0 border-top border-bottom "
                                            name="qty" value="1" style="width: 40px; height: 35px;" disabled="">
                                        <span class="plus btn btn-success btn-sm   shadow"
                                            style="height: 35px;">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 pb-2">
                                <div class="col-3">
                                    <img src="img/medicine.png" class="w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <h6 class="fw-bold">Glucosamine HCL 1500 mg Tablet Joint Health with...</h6>
                                    <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                                    <span class="text-secondary">M.R.P: <span
                                            class="text-decoration-line-through text-secondary">£  535.00</span><span
                                            class="fw-bold text-black ms-3">£  241.00</span></span>


                                </div>
                                <div class="col-3">

                                    <p class="text-end"><img src="img/delete_FILL0_wght400_GRAD0_opsz24.svg" alt=""
                                            style="width: 20px;"></p>
                                    <div class="d-flex justify-content-end pt-4 mt-4">
                                        <span class="minus btn btn-success btn-sm shadow  "
                                            style="height: 35px;">-</span>
                                        <input type="number" class="count shadow border-0 border-top border-bottom "
                                            name="qty" value="1" style="width: 40px; height: 35px;" disabled="">
                                        <span class="plus btn btn-success btn-sm   shadow"
                                            style="height: 35px;">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h4>Cart total: <span class="fw-bold">£  482.00</span> </h4>
                        </div>
                        <div class="card-body">

                            <button type="button" class="btn btn-success w-100 btn-lg py-3">Add Delivery
                                Address</button>

                                <div class="card shadow mt-4 py-2">
                                    <div class="card-body d-flex justify-content-between">
                                        <h4><img src="img/Group 70.svg" alt="" style="width: 35px;" class="me-2">Apply Coupon</h4>

                                        <p><img src="img/Down Arrow.svg" style="width: 15px;" alt=""></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-black mb-3">Bill Summary</h4>
                            <p class="d-flex justify-content-between text-secondary"> <span>Total MRP</span> <span>£  1448.00</span></p>
                            <p class="d-flex justify-content-between text-secondary"> <span>Discount on MRP</span> <span class="text-green">-£  458.50</span></p>
 <hr class="m-0 p-0">
                            <p class="d-flex justify-content-between text-secondary"> <span>Cart Value</span> <span>£  989.00</span></p>

                            <p class="d-flex justify-content-between text-secondary"> <span>Delivery Charges</span> <span class="text-green">Free</span></p>

                            <p class="d-flex justify-content-between text-secondary"> <span>Handling Charges</span> <span>£  19.00</span></p>
                            <hr class="m-0 p-0">
                            <p class="d-flex justify-content-between text-secondary"> <span>Order Total</span> <span>£  1008.00</span></p>

                            <hr class="m-0 p-0">
                            <p class="d-flex justify-content-between text-secondary"> <span>Amount to be paid</span> <span>£  482.00</span></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hurbhue\resources\views/frontend/cart.blade.php ENDPATH**/ ?>