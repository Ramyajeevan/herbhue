

<?php $__env->startSection('content'); ?>
 
<div class="container-fluid mb-5">
        <div class="row mt-3">
             <div class="col-md-3">
                <div class="card border-radius-20 border-3 border-secondary">
                    <div class="card-header pt-3 bg-transparent">
                        <h2 class="text-black text-center">Filters</h2>
                    </div>
                    <p class="text-black fs-3 fw-bold text-center mt-2">Price</p>
                    <hr class="m-0 p-0">
                    <div class="card-body">
                        <div class="range-slider">
                           
                            <input value="25000" min="0" max="120000" step="500" type="range"/>
                            <input value="50000" min="0" max="120000" step="500" type="range"/>
                            <span>
                                <input type="number"  min="0" max="120000"/>
                                <input type="number" min="0" max="120000"/>
                            </span>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-9">
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-secondary">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="img/medicine.png" class="w-75" alt="">
                </div>
                <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                <span class="text-secondary">M.R.P: <span class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                <p>₹241.00</p>

                <button type="button" class="btn btn-success w-100">Add to cart</button>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-secondary">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="img/medicine.png" class="w-75" alt="">
                </div>
                <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                <span class="text-secondary">M.R.P: <span class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                <p>₹241.00</p>

                <button type="button" class="btn btn-success w-100">Add to cart</button>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-secondary">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="img/medicine.png" class="w-75" alt="">
                </div>
                <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                <span class="text-secondary">M.R.P: <span class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                <p>₹241.00</p>

                <button type="button" class="btn btn-success w-100">Add to cart</button>
            </div>
        </div>
    </div>

</div>
             </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\herbhue\resources\views/frontend/shop.blade.php ENDPATH**/ ?>