 

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="productImage text-center">
                      <img id="largeImage" src="img/medicine.png" alt="Default Image">
                    </div>
                    <div id="thumbs" class="mt-3 text-center">
                        <img src="img/medicine.png" alt="1st image  " />
                        <img src="img/medicine.png" alt="2nd image  " />
                        <img src="img/medicine.png" alt="3rd image  " />
                        <img src="img/medicine.png" alt="4th image  " />
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-green">Category Name</h6>
                    <h3 class="text-black">Glucosamine HCL 1500 mg Tablet Joint Health with...</h3>

                    <p><i class="fa fa-star text-green fs-5 me-2"></i> <i class="fa fa-star text-green fs-5 me-2"></i><i
                            class="fa fa-star text-green fs-5 me-2"></i><i
                            class="fa fa-star text-green fs-5 me-2"></i><i
                            class="fa fa-star-half-o text-green fs-5 me-2"></i> <span class="text-secondary">(3 Customer
                            Reviews)</span></p>
                    <h5 class="fw-bold">₹ 241 <span class="fav"><i class="fa fa-heart text-secondary"></i></span></h5>
                    <p class="fs-5">M.R.P: <strong class="text-decoration-line-through">₹ 535.00</strong> </p>

                    <div class="mb-4">
                        <p class="fs-5 text-light-green fw-bold">In Stock</p>
                        <input type="radio" class="btn-check" name="options-outlined" id="success-outlined"
                            autocomplete="off" checked>
                        <label class="btn btn-outline-light text-black border-secondary px-4 py-2  text-start"
                            for="success-outlined"> 30 Tablets <br> <strong>₹ 241</strong> </label>

                        <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined"
                            autocomplete="off">
                        <label class="btn btn-outline-light text-black border-secondary px-4 py-2 text-start"
                            for="danger-outlined">60 Tablets <br> <strong>₹ 354</strong> </label>
                    </div>
                    <div class="d-flex mb-3">
                        <p class="fs-5 text-secondary me-2">Quantity</p>
                        <span class="minus btn btn-success btn-sm shadow  " style="height: 35px;">-</span>
                        <input type="number" class="count shadow border-0 border-top border-bottom " name="qty"
                            value="1" style="width: 40px; height: 35px;" disabled="">
                        <span class="plus btn btn-success btn-sm   shadow" style="height: 35px;">+</span>
                    </div>
                    <div class="d-flex">
                        <p class="fs-5 text-secondary me-2">Delivery</p>
                        <div class="input-group mb-3 pe-5 me-5">
                            <span class="input-group-text border-0 border-bottom bg-transparent rounded-0 border-3"
                                id="basic-addon1"><img src="img/pin_drop_FILL1_wght400_GRAD0_opsz48 (1).svg"
                                    style="width: 20px;" alt=""></span>
                            <input type="text" class="form-control border-0 border-bottom border-3 w-50"
                                placeholder="Enter Pincode" aria-label="Username" aria-describedby="basic-addon1">
                            <span
                                class="input-group-text border-0 border-bottom border-3 bg-transparent rounded-0 text-green fw-bold"
                                id="basic-addon1">Check</span>

                        </div>
                    </div>

                    <button type="button" class="btn btn-success w-50 btn-lg">Add to cart</button>


                </div>
            </div>

            <h3 class="text-black">Description</h3>
            <p class="text-secondary fs-5 border-bottom pb-4 mb-5 border-3">Glucosamine HCL 1500 mg Tablets for Joint Health with Boswellia Serrata, Collagen Peptide, L-Arginine, and Curcuma Longa contains Glucosamine which is essential for building cartilage, a flexible connective tissue that provides padding at the ends of long bones, where they meet the joints. The 1mg Glucosamine HCL formulation is enriched with the goodness of Cissus quadrangularis, Boswellia Serrata, and L-Arginine. White Willow Bark is known to aid in reducing pain and inflammation. Boswellia helps in reducing the ageing effect and alleviates pain as well as swelling in the joints. Rosehip and L-Arginine are known to promote overall joint health. <br> <br> Key Ingredients:  <br> Glucosamine HCL <br> Cissus quadrangularis <br> Boswellia Serrata <br> L-Arginine  <br> Rosehip Fruit Extracts <br> <br>  Key Benefits:  <br>Helps in building the  cartilage <br> This joint pain capsule promotes flexibility and mobility of joints  <br> These joint pain capsules aid in relieving pain and inflammation in joints  <br> Useful in the treatment of osteoarthritis and rheumatoid arthritis  <br> Beneficial in treating jaw disorder called Temporomandibular disorder (TMD) <br> Supports healthy functioning of joints   <br> <br>Directions For Use: <br> Two tablets per day or as directed by the healthcare professional. <br> <br> Safety Information: Shelf Life: 18 months <br> Read the label carefully before use <br> Keep out of reach of children <br> This product is not intended to diagnose, cure or prevent any disease <br> Pregnant/lactating women and children with medical conditions should consult a healthcare practitioner before use Do not exceed the recommended dosage Keep the container tightly closed <br> Do not use if the seal is broken <br> Store in a cool & dry place, away from direct sunlight</p>

            <h3 class="text-black">Reviews & Ratings</h3>
            <p><i class="fa fa-star-o   fs-5 me-2"></i> <i class="fa fa-star-o   fs-5 me-2"></i><i class="fa fa-star-o   fs-5 me-2"></i><i class="fa fa-star-o   fs-5 me-2"></i><i class="fa fa-star-o fs-5 me-2"></i>  </p>
            <textarea class="form-control w-25" placeholder="Your Message" id="floatingTextarea"></textarea>

            <h4 class="text-black">Reviews by customers</h4>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\herbhue\resources\views/frontend/productpage.blade.php ENDPATH**/ ?>