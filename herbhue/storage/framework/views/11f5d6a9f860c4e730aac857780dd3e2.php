

<?php $__env->startSection('content'); ?>
<div class="container-fluid mb-5">
       <div class="container mt-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header bg-green text-white" id="headingOne">
                <button class="accordion-button bg-green text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <textarea class="form-control" placeholder="Give your answer"  ></textarea>

                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success  btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header bg-green text-white" id="headingTwo">
                <button class="accordion-button collapsed bg-green text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <textarea class="form-control" placeholder="Give your answer"  ></textarea>

                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success  btn-lg">Submit</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header bg-green text-white" id="headingThree">
                <button class="accordion-button collapsed bg-green text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <textarea class="form-control" placeholder="Give your answer"  ></textarea>

                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success  btn-lg">Submit</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <h5 class="modal-title fs-5 text-white" id="exampleModalLabel">Few recommendations for you</h5>
      </div>
      <div class="modal-body">
      <div class="d-flex justify-content-between mb-3">
        <p>Lorem ipsum dolor sit amet, consectetur</p>
        <img src="<?php echo e(asset('img/image.png')); ?>" alt="" width="100px">
      </div>
      <div class="d-flex justify-content-between mb-3">
        <p>Lorem ipsum dolor sit amet, consectetur</p>
        <img src="<?php echo e(asset('img/image.png')); ?>" alt="" width="100px">
      </div>
      <div class="d-flex justify-content-between mb-3">
        <p>Lorem ipsum dolor sit amet, consectetur</p>
        <img src="<?php echo e(asset('img/image.png')); ?>" alt="" width="100px">
      </div>
      <div class="d-flex justify-content-between">
        <p>Lorem ipsum dolor sit amet, consectetur</p>
        <img src="<?php echo e(asset('img/image.png')); ?>" alt="" width="100px">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border-0 bg-transparent text-green"  data-bs-dismiss="modal">OK</button>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hurbhue\resources\views/frontend/personalized.blade.php ENDPATH**/ ?>