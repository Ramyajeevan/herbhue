

<?php $__env->startSection('content'); ?>
<style>
    .border-20px{
        border-radius: 20px !important;
    }
</style>

<div class="container-fluid bg-green py-5">
    <div class="container py-5">
        <h1 class="text-white">
            Contact Us
        </h1>
        <p class="text-white">For Any Query, Related To Any Product. Drop Your Details Below</p>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow border-20px border-0 p-3" style="margin-top:-115px ;">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg bg-secondary border-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg bg-secondary border-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address">
                            </div>
                            <div class="mb-3"> 
                                 <textarea class="form-control form-control-lg bg-secondary border-0 rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="Go ahead, we are listing..."></textarea>
                            </div>
                             
                            
                            <button type="submit" class="btn btn-primary w-100 btn-lg rounded-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hurbhue\resources\views/frontend/contact-us.blade.php ENDPATH**/ ?>