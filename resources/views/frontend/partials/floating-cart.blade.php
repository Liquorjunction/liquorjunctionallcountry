<a href="{{ route('cart') }}" id="floating-cart" class="floating-cart" title="My Cart">
    <i class="icon-bucket" style="font-size:32px;"></i>
    <span class="cart-item-total-count" style="position:absolute;top:-8px;right:-8px;background:#db0000;color:#fff;border-radius:50%;padding:2px 7px;font-size:13px;">
        @php
                                        if (Auth::guard('user')->user() == '' && Session::get('cart_info')) {
                                            echo count(Session::get('cart_info'));
                                        } else {
                                            echo '0';
                                        }
                                    @endphp
    </span>
</a>
<style>
.floating-cart {
    position: fixed;
    right: 100px;
    bottom: 90px;
    z-index: 9999;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    padding: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: box-shadow 0.2s;
    height: 80px;
    width: 80px;
}
.floating-cart.shake {
    animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
}
@keyframes shake {
  10%, 90% { transform: translateX(-2px); }
  20%, 80% { transform: translateX(4px); }
  30%, 50%, 70% { transform: translateX(-8px); }
  40%, 60% { transform: translateX(8px); }
}
</style>
<script>
function shakeFloatingCart() {
    var cart = document.getElementById('floating-cart');
    if(cart) {
        cart.classList.remove('shake');
        void cart.offsetWidth;
        cart.classList.add('shake');
    }
}
// Optionally, update cart count here as well
// Example: window.updateFloatingCartCount = function(count) { ... }
</script>
