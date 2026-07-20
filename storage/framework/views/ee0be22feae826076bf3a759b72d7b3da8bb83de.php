<?php echo $__env->make('frontend.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
/* Shake animation for Add to Cart button */
.shake {
  animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
}
@keyframes shake {
  10%, 90% { transform: translateX(-2px); }
  20%, 80% { transform: translateX(4px); }
  30%, 50%, 70% { transform: translateX(-8px); }
  40%, 60% { transform: translateX(8px); }
}
</style>
<?php echo $__env->yieldPushContent('after-scripts'); ?>

    
    <!-- begin olark code -->
    

<!-- end olark code -->

<script>
    var isMinPriceLoad = true;
var isMaxPriceLoad = true;


window.onload = function () {
  // Check if the element with ID "slider-1" exists
  let sliderOne = document.getElementById("slider-1");
  let sliderTwo = document.getElementById("slider-2");
  if (sliderOne) {
    // If the element exists, load the JavaScript functions
    slideOne();
  }if(sliderTwo){
    slideTwo();
  }
};

let sliderOne = document.getElementById("slider-1");
let sliderTwo = document.getElementById("slider-2");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("slider-1").max;
if (currency_type == "") {
  currency_type = "";
}
function slideOne() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderOne.value = parseInt(sliderTwo.value) - minGap;
  }
  //This is for style z- index 
  if(sliderOne.value==parseInt(sliderTwo.value)){   
    $("#slider-2").css('z-index','0');
  }else{
    $("#slider-2").css('z-index','2');
  }
  console.log('sliderOne',sliderOne.value);
  console.log('sliderTwo',parseInt(sliderTwo.value));

  if (!isMinPriceLoad) {
    $("#min-price").val(sliderOne.value);
  }

  //$("#min-price").val(sliderOne.value);
  displayValOne.textContent = sliderOne.value + currency_type;
  fillColor();
  isMinPriceLoad = false;
}
function slideTwo() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderTwo.value = parseInt(sliderOne.value) + minGap;
  }
  
  if(sliderOne.value==parseInt(sliderTwo.value)){   
    $("#slider-2").css('z-index','2');
  }else{
    $("#slider-2").css('z-index','0');
  }
  if (!isMaxPriceLoad) {
    $("#max-price").val(sliderTwo.value);
  }
  displayValTwo.textContent = sliderTwo.value + currency_type;
  fillColor();
  isMaxPriceLoad = false;
}
function fillColor() {
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
  sliderTrack.style.background = `linear-gradient(to right, #DDDDDD ${percent1}% , #FBB516 ${percent1}% , #FBB516 ${percent2}%, #DDDDDD ${percent2}%)`;
}

<?php 

$data = \App\Models\Setting::first();
$contact = \App\Models\Country::where('status',1)->first();

// dd($contact);

?>


</script>

<script type="text/javascript">
  window._mfq = window._mfq || [];
  (function() {
    var mf = document.createElement("script");
    mf.type = "text/javascript"; mf.defer = true;
    mf.src = "//cdn.mouseflow.com/projects/a1f36707-b54f-44e6-974e-cd307ffbe8f8.js";
    document.getElementsByTagName("head")[0].appendChild(mf);
  })();
</script>


  

<a href="https://wa.me/233<?php echo e($data->phone); ?>" class="fixed-watsapp" target="_blank">
  <img src="<?php echo e(asset('assets/frontend/images/whatsapp.svg')); ?>" alt="whatsapp" title="whatsapp" class="icon-badge heartbeat" width="40" height="40" />
</a>

</body>
</html><?php /**PATH /var/www/liquour_junction/well-known/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>