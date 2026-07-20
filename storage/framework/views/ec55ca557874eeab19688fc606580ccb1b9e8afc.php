<!-- Header -->
<style>
    .body-no-scroll {
        overflow: hidden;
        position: fixed;
        width: 100%;
    }

    .img-fluid {
        max-width: 100%;
        /* height: auto; */
        height: 90px;
    }

    .font-weight-bold {
        font-weight: 600 !important;
    }

    .font-md {
        font-size: 1.15rem !important;
    }

    .font-lg {
        font-size: 1.75rem !important;
    }

    .logo-modal {
        margin-bottom: 32px;
    }

    #agePopUp p {
        color: #686868;
        margin: 5px 0 40px;
    }

    /*
    #agePopUp .logo-modal img, #restrictionPopUp .logo-modal img {
        max-height: 35px;
    } */

    img {
        border-style: none;
    }

    img,
    svg {
        vertical-align: middle;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    #agePopUp .btn {
        font-size: 18px;
        width: 100px;
        font-weight: 700;
    }

    #agePopUp p {
        color: #686868;
        margin: 5px 0 40px;
    }

    #agePopUp .btn,
    .btn {
        padding: 8px 15px;
        text-align: center;
    }

    .btn {
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        text-decoration: none;
        line-height: 1.5;
    }

    /* .btn-outline-border
    {
        border: 2px solid black;
    } */

    button,
    select {
        text-transform: none;
    }

    button,
    input {
        overflow: visible;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .mt-3,
    .my-3 {
        margin-top: 1rem !important;
    }

    .text-center {
        text-align: center !important;
    }

    .btn-default {
        background: #fbb516;
        color: black;
        border: #fbb516 1px solid;
    }

    .pl-4,
    .px-4 {
        padding-left: 1.5rem !important;
    }

    .pr-4,
    .px-4 {
        padding-right: 1.5rem !important;
    }

    .text-red {
        color: #db0000 !important;
    }

    /* Modal back */
    /* body.modal-open {
        overflow: hidden;
    }

     .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    } */

    .btn-outline-border {
        background-color: #000;
        color: white;
        border: #000 2px solid;
    }

    .btn-outline-border:hover {
        color: white;
    }

    div:where(.swal2-container) div:where(.swal2-popup) {
        width: 25em !important;
    }


    /* Css for auto-suggestion */
    /* .suggestion-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 16px;
        padding: 10px;
    } */

    .suggestion-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        grid-template-columns: repeat(auto-fit, minmax(145px, 1fr));
        gap: 16px;
        padding: 10px;
        justify-content: center;
        max-width: 500px;
        margin: 0 auto;
    }


    .suggestion-item {
        /* background: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        transition: 0.3s ease;
        border: 1px solid #eee; */

        width: 150px;
        text-align: center;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        background: #fff;
        transition: transform 0.2s ease;
    }

    .suggestion-item:hover {
        /* background: #efefef; */
        transform: scale(1.05);

    }

    .suggestion-img img {
        width: 100%;
        height: 100px;
        object-fit: contain;
        border-radius: 4px;
        margin-bottom: 8px;
    }


    .suggestion-title {
        font-size: 14px;
        text-align: center;
        color: #333;
    }


    /* Favorite list */
    .fav_list span {
        position: relative;
        color: #212121;
        width: 20px;
        height: 20px;
        align-items: center;
        font-size: 13px;
        font-weight: bold;
        line-height: normal;
        letter-spacing: 0.55px;
        pointer-events: none;
    }

    .fav_list span.count-number.favorite-no {
        top: -10px;
        right: 5px;
        border: 0;
    }

    /* Toggle display */
    .toggle-show {
        display: block;
    }

    /* button css test */
    @media only screen and (max-width: 991px) {
        .mobile-menu__back-to-prev-page {
            position: absolute;
            top: 0;
            width: 48px;
            height: 50px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            z-index: 2;
            border: none;
            padding: 0;
            fill: currentColor;
            -webkit-transition: background-color .15s, color .15s;
            transition: background-color .15s, color .15s;
            cursor: pointer;
        }
    }

    @media only screen and (max-width: 991px) {
        [dir=ltr] .mobile-menu__back-to-prev-page {
            left: 0;
        }
    }
</style>

<?php
$user_id = isset(auth()->guard('user')->user()->id) ? auth()->guard('user')->user()->id : '';
// dd($user_id);
$notificationListCount = 0;
$favoriteCount = 0;
if ($user_id) {
    $notificationList = DB::table('notification')->where('sender_id', $user_id)->orderby('id', 'DESC')->limit(10)->get();
    $notificationListCount = DB::table('notification')->where('sender_id', $user_id)->where('is_read', 0)->count();

    $favoriteCount = DB::table('favorite_product')->where('user_id', $user_id)->where('status', 1)->count();
}
?>
<header id="masthead" class="site-header">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo e(@$user_id); ?>">

    
    <div class="middle-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-7">
                    <div class="mobile-header">
                        <button class="mobile-header__menu-button mobile_only backdrop" type="button">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_101_3)">
                                    <path
                                        d="M22.5 21H1.50001C0.67155 21 0 20.3284 0 19.5C0 18.6716 0.67155 18 1.50001 18H22.5C23.3285 18 24 18.6716 24 19.5C24 20.3284 23.3285 21 22.5 21Z"
                                        fill="black" />
                                    <path
                                        d="M22.5 13.5H1.50001C0.67155 13.5 0 12.8284 0 12C0 11.1716 0.67155 10.5 1.50001 10.5H22.5C23.3285 10.5 24 11.1716 24 12C24 12.8285 23.3285 13.5 22.5 13.5Z"
                                        fill="black" />
                                    <path
                                        d="M22.5 5.99999H1.50001C0.67155 5.99999 0 5.32841 0 4.49995C0 3.67148 0.67155 2.99994 1.50001 2.99994H22.5C23.3285 2.99994 24 3.67148 24 4.49995C24 5.32841 23.3285 5.99999 22.5 5.99999Z"
                                        fill="black" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_101_3">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                        <div class="mobile-menu mobile_only">
                            <div class="mobile-menu__backdrop"></div>
                            <div class="mobile-menu__body">
                                
                                <button class="mobile-menu__close mobile-menu__back-to-prev-page " type="button">
                                    <i class="icon_24 icon_arrow_back" style="color: #ffffff;"></i>
                                </button>
                                <button class="mobile-menu__close" type="button"><i
                                        class="icon_24 icon_close"></i></button>

                                <div class="mobile-menu__panel">
                                    <div class="mobile-menu__panel-header">
                                        <div class="mobile-menu__panel-title">
                                            <div class="top_logo">
                                                <a href="javascript:void(0)" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mobile-menu__panel-body">
                                        <ul class="mobile-menu__links">
                                            <?php
                                                $get_category = Helper::getCategory();
                                            ?>
                                            <?php if(!empty($get_category)): ?>
                                                <?php $__currentLoopData = $get_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if (\Session::get('language') == 1) {
                                                            $category_title = $result->title;
                                                        } else {
                                                            $category_title = $result->title_fr
                                                                ? $result->title_fr
                                                                : $result->title;
                                                        }
                                                    ?>
                                                    <div class="mobile-menu__divider"></div>
                                                    <li class="main-nav__item" data-mobile-menu-item="">
                                                        <a href="<?php echo e(route('productlist', ['id' => Helper::encodeUrl($result->id)])); ?>"
                                                            class="sidebar_close"><?php echo e($category_title); ?> </a>

                                                        <?php if($result->subcategory->isNotEmpty()): ?>
                                                            <a class="child_menu_icon" data-mobile-menu-trigger=""><i
                                                                    class="icon_24 icon_solid_arrow_right right_icon"></i></a>
                                                            <div class="mobile-menu__links-panel"
                                                                data-mobile-menu-panel>
                                                                <div
                                                                    class="mobile-menu__panel mobile-menu__panel--hidden">
                                                                    <div class="mobile-menu__panel-header">
                                                                        <button class="mobile-menu__panel-back"
                                                                            type="button">
                                                                            <i class="icon_24 icon_arrow_back"></i>
                                                                            <!-- <span>Back</span> -->
                                                                        </button>
                                                                        <div class="mobile-menu__panel-title">
                                                                            <?php echo e($category_title); ?> </div>
                                                                    </div>

                                                                    <div class="mobile-menu__panel-body">
                                                                        <ul class="mobile-menu__links second_level">
                                                                            <?php $__currentLoopData = $result->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php
                                                                                    if (
                                                                                        \Session::get('language') == 1
                                                                                    ) {
                                                                                        $subcategory_title =
                                                                                            $sub_result->title;
                                                                                    } else {
                                                                                        $subcategory_title = $sub_result->title_fr
                                                                                            ? $sub_result->title_fr
                                                                                            : $sub_result->title;
                                                                                    }
                                                                                ?>
                                                                                <li data-mobile-menu-item>
                                                                                    <a
                                                                                        href="<?php echo e(route('productlist', ['id' => Helper::encodeUrl($result->id)])); ?>?sid=<?php echo e(Helper::encodeUrl($sub_result->id)); ?>"><?php echo e(ucfirst($subcategory_title)); ?></a>
                                                                                </li>
                                                                                <div class="mobile-menu__divider"></div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                            
                                            <div class="mobile-menu__divider"></div>
                                            <li class="main-nav__item" data-mobile-menu-item>
                                                <a href="<?php echo e(route('special')); ?>" class="sidebar_close">
                                                    <?php
                                                        $special_title =
                                                            \Session::get('language') == 1
                                                                ? 'Special Offers'
                                                                : 'Offres Spéciales';
                                                    ?>
                                                    <?php echo e($special_title); ?>

                                                </a>
                                            </li>

                                        </ul>
                                        <div class="mobile-menu__divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('frontend.home')); ?>" class="logo"><img
                                src="<?php echo e(asset('assets/dashboard/images/liquor-logo.svg')); ?>"
                                alt="think-celebration-think-liquor-junction"
                                title="Think Celebration Think Liquor Junction" /></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-5">
                    <ul class="middle-header-link-nav">
                        <li><a href="<?php echo e(route('ourStore')); ?>"><?php echo e(@Helper::language('our_store')); ?></a></li>
                        <li><a href="<?php echo e(route('trackOrder')); ?>"><?php echo e(@Helper::language('track_your_order')); ?></a></li>
                        <li><a href="<?php echo e(route('aboutUs')); ?>"><?php echo e(@Helper::language('about_us')); ?></a></li>
                        <li><a href="<?php echo e(route('customerSupport')); ?>"><?php echo e(@Helper::language('customer_support')); ?></a>
                        </li>
                    </ul>


                    <div class="middle-header-bottom">
                        

                        <form action="#" class="header-search-form searchForm">
                            <div class="home_search">
                                <input type="search" autocomplete="off" name="" id="search-box"
                                    placeholder="<?php echo e(@Helper::language('search_the_product')); ?>">
                                <button type="submit" class="search-button search-box-click" disabled><i
                                        class="fa-solid fa-magnifying-glass text-white"></i></button>
                                <div class="auto-suggested-box suggesstion-box d-none" id="suggesstion-box"></div>
                            </div>
                        </form>
                        <ul class="middle-header-icon-nav">
                            
                            <li>
                                <button class="mobile-header__menu-button mobile_only backdrop d-block d-sm-none"
                                    type="button">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_101_3)">
                                            <path
                                                d="M22.5 21H1.50001C0.67155 21 0 20.3284 0 19.5C0 18.6716 0.67155 18 1.50001 18H22.5C23.3285 18 24 18.6716 24 19.5C24 20.3284 23.3285 21 22.5 21Z"
                                                fill="black" />
                                            <path
                                                d="M22.5 13.5H1.50001C0.67155 13.5 0 12.8284 0 12C0 11.1716 0.67155 10.5 1.50001 10.5H22.5C23.3285 10.5 24 11.1716 24 12C24 12.8285 23.3285 13.5 22.5 13.5Z"
                                                fill="black" />
                                            <path
                                                d="M22.5 5.99999H1.50001C0.67155 5.99999 0 5.32841 0 4.49995C0 3.67148 0.67155 2.99994 1.50001 2.99994H22.5C23.3285 2.99994 24 3.67148 24 4.49995C24 5.32841 23.3285 5.99999 22.5 5.99999Z"
                                                fill="black" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_101_3">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                            </li>
                            <li class="mobile_only">
                                <a href="#" class="search-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.9069 10.4521C17.9069 11.9311 17.4267 13.2973 16.6178 14.4058L20.6979 18.4883C21.1007 18.891 21.1007 19.5451 20.6979 19.9479C20.295 20.3507 19.6408 20.3507 19.2379 19.9479L15.1578 15.8654C14.0492 16.6774 12.6827 17.1543 11.2035 17.1543C7.50044 17.1543 4.5 14.1544 4.5 10.4521C4.5 6.74985 7.50044 3.75 11.2035 3.75C14.9065 3.75 17.9069 6.74985 17.9069 10.4521ZM11.2035 15.0921C13.7656 15.0921 15.8443 13.0138 15.8443 10.4521C15.8443 7.89051 13.7656 5.8122 11.2035 5.8122C8.64132 5.8122 6.5626 7.89051 6.5626 10.4521C6.5626 13.0138 8.64132 15.0921 11.2035 15.0921Z"
                                            fill="#242424" />
                                    </svg>
                                </a>
                            </li>
                            <?php if(auth()->guard('user')->check() && !auth()->guard('user')->user()->is_guest_user): ?>
                            <li class="delivery">
                                <a href="<?php echo e(route('trackOrder')); ?>"
                                    title="<?php echo e(@Helper::language('track_your_order')); ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="g2793">
                                            <g id="g2795">
                                                <path id="path2797" d="M17.0673 17.3689H9.48047" stroke="#242424"
                                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <g id="g2799">
                                                <g id="Clip path group">
                                                    <mask id="mask0_5939_3065" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="0" y="0" width="24"
                                                        height="24">
                                                        <g id="clipPath2805">
                                                            <path id="path2803"
                                                                d="M0 1.90735e-06H24V24H0V1.90735e-06Z"
                                                                fill="white" />
                                                        </g>
                                                    </mask>
                                                    <g mask="url(#mask0_5939_3065)">
                                                        <g id="g2801">
                                                            <g id="g2807">
                                                                <path id="path2809"
                                                                    d="M21.6862 17.3689H23.2968V12.4787L19.2633 8.3111H15.9629V8.31705V17.3245"
                                                                    stroke="#242424" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <g id="g2815">
                                                                <path id="path2817"
                                                                    d="M5.6447 15.6681C6.50429 14.8085 7.89788 14.8085 8.75748 15.6681C9.61702 16.5277 9.61702 17.9215 8.75748 18.7811C7.89788 19.6407 6.50429 19.6407 5.6447 18.7811C4.7851 17.9215 4.7851 16.5277 5.6447 15.6681Z"
                                                                    stroke="#242424" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <g id="g2819">
                                                                <path id="path2821"
                                                                    d="M17.9142 15.6681C18.7738 14.8085 20.1674 14.8085 21.027 15.6681C21.8866 16.5277 21.8866 17.9215 21.027 18.7811C20.1674 19.6407 18.7738 19.6407 17.9142 18.7811C17.0546 17.9215 17.0546 16.5277 17.9142 15.6681Z"
                                                                    stroke="#242424" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <g id="g2823">
                                                                <path id="path2825"
                                                                    d="M2.92383 4.57434V17.3611H4.90987"
                                                                    stroke="#242424" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <g id="g2827">
                                                                <path id="path2829"
                                                                    d="M15.9834 8.31689V4.57425H2.92383"
                                                                    stroke="#242424" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                            <g id="g2831">
                                                                <path id="path2833" d="M7.80239 4.57446H2.92383"
                                                                    stroke="#242424" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>


                            <?php if(!empty($user_id) && !auth()->guard('user')->user()->is_guest_user): ?>
                                <li class="header-cart" style="top:3px;">
                                    <a href="javascript::void(0);" class="backdrop" title="Notification"
                                        onclick="return readNotification()" data-bs-toggle="offcanvas"
                                        data-bs-target="#notificationOffcanvas" aria-controls="offcanvasRight">
                                        <img src="<?php echo e(asset('assets/frontend/images/notification-bell.svg')); ?>" />
                                    </a>
                                    <?php if($notificationListCount > 0): ?>
                                        <span
                                            class="count-number  notification-no"><?php echo e(@$notificationListCount); ?></span>
                                    <?php endif; ?>
                                </li>
                                <?php if(auth()->guard('user')->check() && !auth()->guard('user')->user()->is_guest_user): ?>
                                <li class="fav_list" style="top:3px;">
                                    <a href="<?php echo e(route('favorite-list')); ?>"
                                        title="<?php echo e(@Helper::language('my_favorite_list_label')); ?>">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="icon_wishlist">
                                                <?php if($favoriteCount > 0): ?>
                                                    
                                                    <path fill="#000000" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                                2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44h1.74C14.09 5.01 15.76 4 17.5 4
                                                20 4 22 6 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                <?php else: ?>
                                                    
                                                    <path fill="#242424"
                                                        d="M11.5312 4.62479L11.9648 5.09071L12.4336 4.62557C13.7422 3.35789 15.5547 2.78093 17.3359 3.07562C20.0273 3.52135 22 5.83617 22 8.55013V8.77532C22 10.3866 21.3281 11.928 20.1406 13.0268L13.082 19.5768C12.7891 19.8486 12.4023 20 12 20C11.5977 20 11.2109 19.8486 10.918 19.5768L3.85898 13.0268C2.67305 11.928 2 10.3866 2 8.77532V8.55013C2 5.83617 3.97344 3.52135 6.66406 3.07562C8.41016 2.78093 10.2578 3.35789 11.5312 4.62479ZM11.9648 7.72701L10.207 5.90994C9.35938 5.10158 8.15625 4.71798 6.97266 4.91366C5.18555 5.20991 3.875 6.74859 3.875 8.55013V8.77532C3.875 9.87022 4.33242 10.9185 5.13828 11.664L12 18.0315L18.8633 11.664C19.668 10.9185 20.125 9.87022 20.125 8.77532V8.55013C20.125 6.74859 18.8125 5.20991 17.0273 4.91366C15.8438 4.71798 14.6406 5.10158 13.793 5.90994L11.9648 7.72701Z" />
                                                <?php endif; ?>
                                            </g>
                                        </svg>
                                    </a>
                                    <?php if($favoriteCount > 0): ?>
                                        <span class="count-number favorite-no"><?php echo e(@$favoriteCount); ?></span>
                                    <?php endif; ?>
                                </li>
                                <?php endif; ?>

                            <?php endif; ?>

                            <li>
                                <?php if(!empty($user_id)): ?>
                                    <?php if(auth()->guard('user')->check() && !auth()->guard('user')->user()->is_guest_user): ?>
                                    <a href="<?php echo e(route('my-account')); ?>"
                                        title="<?php echo e(@Helper::language('my_account_label')); ?>">
                                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector"
                                                d="M13.6949 11.7096C14.6753 10.9383 15.3909 9.88056 15.7421 8.68358C16.0933 7.4866 16.0628 6.2099 15.6546 5.0311C15.2465 3.85231 14.4811 2.83003 13.4649 2.10649C12.4487 1.38296 11.2323 0.994141 9.98486 0.994141C8.73741 0.994141 7.52097 1.38296 6.50479 2.10649C5.48861 2.83003 4.7232 3.85231 4.31507 5.0311C3.90694 6.2099 3.87637 7.4866 4.22762 8.68358C4.57887 9.88056 5.29447 10.9383 6.27486 11.7096C4.59494 12.3827 3.12915 13.499 2.03375 14.9396C0.938358 16.3801 0.254423 18.0909 0.05486 19.8896C0.0404146 20.021 0.0519765 20.1538 0.0888854 20.2807C0.125794 20.4075 0.187327 20.5259 0.269971 20.629C0.436879 20.8371 0.679644 20.9705 0.94486 20.9996C1.21008 21.0288 1.47602 20.9514 1.68419 20.7845C1.89235 20.6176 2.02569 20.3749 2.05486 20.1096C2.27444 18.1548 3.20655 16.3494 4.67308 15.0384C6.13961 13.7274 8.03776 13.0027 10.0049 13.0027C11.972 13.0027 13.8701 13.7274 15.3366 15.0384C16.8032 16.3494 17.7353 18.1548 17.9549 20.1096C17.982 20.3554 18.0993 20.5823 18.284 20.7467C18.4686 20.911 18.7076 21.0011 18.9549 20.9996H19.0649C19.327 20.9695 19.5666 20.8369 19.7314 20.6309C19.8963 20.4248 19.973 20.162 19.9449 19.8996C19.7444 18.0958 19.0567 16.3806 17.9557 14.9378C16.8547 13.4951 15.3818 12.3791 13.6949 11.7096ZM9.98486 10.9996C9.19374 10.9996 8.42038 10.765 7.76258 10.3255C7.10478 9.88599 6.59209 9.26128 6.28934 8.53037C5.98659 7.79947 5.90738 6.9952 6.06172 6.21928C6.21606 5.44335 6.59702 4.73062 7.15643 4.17121C7.71584 3.6118 8.42858 3.23084 9.2045 3.0765C9.98042 2.92215 10.7847 3.00137 11.5156 3.30412C12.2465 3.60687 12.8712 4.11956 13.3107 4.77736C13.7503 5.43515 13.9849 6.20851 13.9849 6.99964C13.9849 8.0605 13.5634 9.07792 12.8133 9.82806C12.0631 10.5782 11.0457 10.9996 9.98486 10.9996Z"
                                                fill="#242424" />
                                        </svg>
                                    </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('websitelogin')); ?>"
                                        title="<?php echo e(@Helper::language('login_label')); ?>">
                                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector"
                                                d="M13.6949 11.7096C14.6753 10.9383 15.3909 9.88056 15.7421 8.68358C16.0933 7.4866 16.0628 6.2099 15.6546 5.0311C15.2465 3.85231 14.4811 2.83003 13.4649 2.10649C12.4487 1.38296 11.2323 0.994141 9.98486 0.994141C8.73741 0.994141 7.52097 1.38296 6.50479 2.10649C5.48861 2.83003 4.7232 3.85231 4.31507 5.0311C3.90694 6.2099 3.87637 7.4866 4.22762 8.68358C4.57887 9.88056 5.29447 10.9383 6.27486 11.7096C4.59494 12.3827 3.12915 13.499 2.03375 14.9396C0.938358 16.3801 0.254423 18.0909 0.05486 19.8896C0.0404146 20.021 0.0519765 20.1538 0.0888854 20.2807C0.125794 20.4075 0.187327 20.5259 0.269971 20.629C0.436879 20.8371 0.679644 20.9705 0.94486 20.9996C1.21008 21.0288 1.47602 20.9514 1.68419 20.7845C1.89235 20.6176 2.02569 20.3749 2.05486 20.1096C2.27444 18.1548 3.20655 16.3494 4.67308 15.0384C6.13961 13.7274 8.03776 13.0027 10.0049 13.0027C11.972 13.0027 13.8701 13.7274 15.3366 15.0384C16.8032 16.3494 17.7353 18.1548 17.9549 20.1096C17.982 20.3554 18.0993 20.5823 18.284 20.7467C18.4686 20.911 18.7076 21.0011 18.9549 20.9996H19.0649C19.327 20.9695 19.5666 20.8369 19.7314 20.6309C19.8963 20.4248 19.973 20.162 19.9449 19.8996C19.7444 18.0958 19.0567 16.3806 17.9557 14.9378C16.8547 13.4951 15.3818 12.3791 13.6949 11.7096ZM9.98486 10.9996C9.19374 10.9996 8.42038 10.765 7.76258 10.3255C7.10478 9.88599 6.59209 9.26128 6.28934 8.53037C5.98659 7.79947 5.90738 6.9952 6.06172 6.21928C6.21606 5.44335 6.59702 4.73062 7.15643 4.17121C7.71584 3.6118 8.42858 3.23084 9.2045 3.0765C9.98042 2.92215 10.7847 3.00137 11.5156 3.30412C12.2465 3.60687 12.8712 4.11956 13.3107 4.77736C13.7503 5.43515 13.9849 6.20851 13.9849 6.99964C13.9849 8.0605 13.5634 9.07792 12.8133 9.82806C12.0631 10.5782 11.0457 10.9996 9.98486 10.9996Z"
                                                fill="#242424" />
                                        </svg>
                                    </a>
                                <?php endif; ?>

                            </li>
                            <?php if(!empty($user_id) && auth()->guard('user')->user()->is_guest_user): ?>
                            <li>
                                <a href="javascript:void(0)" 
                                class="sidebar-link" 
                                data-bs-toggle="modal" 
                                data-bs-target="#logoutModal"
                                title="Logout">

                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                        <path d="M16 17L21 12L16 7" stroke="#242424" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 12H9" stroke="#242424" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13 21H6C4.895 21 4 20.105 4 19V5C4 3.895 4.895 3 6 3H13" stroke="#242424" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </a>
                            </li>
                            <?php endif; ?>
                            <li class="header-cart">
                                
                                <div class="cart-dropdown-wrapper" style="position: relative; display: inline-block;">
                                    <a id="cart-url" href="<?php echo e(route('cart')); ?>"
                                        title="<?php echo e(@Helper::language('my_cart')); ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z"
                                            stroke="#242424" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M17 22C17.5523 22 18 21.5523 18 21C18 20.4477 17.5523 20 17 20C16.4477 20 16 20.4477 16 21C16 21.5523 16.4477 22 17 22Z"
                                            stroke="#242424" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M2 2H3.31348C3.56088 2 3.68458 2 3.78413 2.04368C3.87185 2.08217 3.94619 2.14408 3.99829 2.22202C4.0574 2.31046 4.07489 2.42803 4.10988 2.66318L4.58584 5.86207L5.64362 13.3269C5.77786 14.2742 5.84498 14.7478 6.08084 15.1043C6.28868 15.4185 6.58664 15.6683 6.93888 15.8237C7.33861 16 7.83647 16 8.83218 16H17.438C18.3859 16 18.8598 16 19.2471 15.8363C19.5886 15.6919 19.8815 15.4592 20.0931 15.1641C20.3331 14.8294 20.4218 14.3824 20.5991 13.4885L21.9302 6.77901C21.9926 6.46437 22.0238 6.30704 21.9786 6.18407"
                                            stroke="#242424" stroke-width="1.7" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                    
                                </a>
                                    <span class="cart-item-total-count">
                                    <?php
                                        if (Auth::guard('user')->user() == '' && Session::get('cart_info')) {
                                            echo count(Session::get('cart_info'));
                                        } else {
                                            echo '0';
                                        }
                                    ?>
                                    
                                    </span>
                                    <!-- Small Cart Dropdown -->
                                    <div id="small-cart-dropdown" class="small-cart-dropdown" style="display:none; position:absolute; right:0; top:40px; width:340px; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.15); border-radius:8px; z-index:9999;">
                                        <div style="max-height:300px; overflow-y:auto; padding:15px 15px 0 15px;">
                                            <?php
                                                $cartItems = [];
                                                if (Auth::guard('user')->user() == '' && Session::get('cart_info')) {
                                                    $cartItems = Session::get('cart_info');
                                                } elseif (Auth::guard('user')->user() != '') {
                                                    $cartItems = Helper::getUserCartItems(); // You may need to implement this helper if not present
                                                }
                                            ?>
                                            <?php if(!empty($cartItems) && count($cartItems) > 0): ?>
                                                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="cart-item d-flex align-items-center mb-2" style="border-bottom:1px solid #eee; padding-bottom:8px;">
                                                        <div style="width:50px; height:50px; flex-shrink:0;">
                                                            <img src="<?php echo e($item['image'] ?? asset('assets/frontend/images/no-image.png')); ?>" alt="<?php echo e($item['name'] ?? ''); ?>" style="width:100%; height:100%; object-fit:cover; border-radius:4px;">
                                                        </div>
                                                        <div class="ms-2" style="flex:1;">
                                                            <div style="font-weight:600; font-size:15px;"><?php echo e($item['name'] ?? ''); ?></div>
                                                            <div style="font-size:13px; color:#888;">Qty: <?php echo e($item['qty'] ?? 1); ?></div>
                                                            <div style="font-size:14px; color:#242424;"><?php echo e(@$settings->currency_symbol); ?><?php echo e($item['price'] ?? '0.00'); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="text-center py-4" style="color:#888;">Your cart is empty.</div>
                                            <?php endif; ?>
                                        </div>
                                        <div style="padding:15px; border-top:1px solid #eee; background:#fafafa;">
                                            <a href="<?php echo e(route('cart')); ?>" class="solid-button w-100">Go To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <style>
                            .small-cart-dropdown::-webkit-scrollbar {
                                width: 6px;
                                background: #f1f1f1;
                            }
                            .small-cart-dropdown::-webkit-scrollbar-thumb {
                                background: #ccc;
                                border-radius: 3px;
                            }
                            </style>
                            <script>
                             function renderSmallCartDropdown(items) {
                                var html = '';
                                if (items.length > 0) {
                                    items.forEach(function(item) {
                                        html += `<div class="cart-item d-flex align-items-center mb-2" style="border-bottom:1px solid #eee; padding-bottom:8px; position:relative;">
                                            <div style="width:50px; height:50px; flex-shrink:0;">
                                                <img src="${item.image}" alt="${item.name}" style="width:100%; height:100%; object-fit:cover; border-radius:4px;">
                                            </div>
                                            <div class="ms-2" style="flex:1;">
                                                <div style="font-weight:600; font-size:15px;">${item.name}</div>
                                                <div style="font-size:13px; color:#888;">Qty: ${item.qty}</div>
                                                <div style="font-size:14px; color:#242424;">${item.price} <?php echo e(Helper::Settings('currency_symbol')); ?> </div>
                                            </div>
                                            <button class="delete-cart-item-btn" data-id="${item.id}" title="Remove"
        style="background:none; border:none; cursor:pointer; padding:5px;">

        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path d="M3 6H21" stroke="#ff4d4f" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M8 6V4H16V6" stroke="#ff4d4f" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M19 6L18 20H6L5 6" stroke="#ff4d4f" stroke-width="1.5"/>
            <path d="M10 11V17" stroke="#ff4d4f" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M14 11V17" stroke="#ff4d4f" stroke-width="1.5" stroke-linecap="round"/>
        </svg>

    </button>
                                        </div>`;
                                    });
                                                            // Handle delete icon click
                                                            document.addEventListener('click', function(e) {
                                                                if (e.target.closest('.delete-cart-item-btn')) {
                                                                    var btn = e.target.closest('.delete-cart-item-btn');
                                                                    var id = btn.getAttribute('data-id');
                                                                    fetch('/cart/item/' + id, {
                                                                        method: 'DELETE',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]'),
                                                                            'Accept': 'application/json'
                                                                        }
                                                                    })
                                                                    .then(res => res.json())
                                                                    .then(data => {
                                                                        if (data.success) {
                                                                            updateCartUI();
                                                                        }
                                                                    });
                                                                }
                                                            });
                                } else {
                                    html = '<div class="text-center py-4" style="color:#888;">Your cart is empty.</div>';
                                }
                                document.querySelector('#small-cart-dropdown > div').innerHTML = html;
                            }

                            function updateCartUI() {
                                fetch('/cart/data')
                                    .then(res => res.json())
                                    .then(data => {
                                        document.querySelector('.cart-item-total-count').textContent = data.count;
                                        document.querySelector('.cart-item-total-count-floating').textContent = data.count;
                                        renderSmallCartDropdown(data.items);
                                    });
                            }

                            document.addEventListener('DOMContentLoaded', function() {
                                var cartUrl = document.getElementById('cart-url');
                                var dropdown = document.getElementById('small-cart-dropdown');
                                if(cartUrl && dropdown) {
                                    cartUrl.addEventListener('mouseenter', function() {
                                        dropdown.style.display = 'block';
                                    });
                                    cartUrl.addEventListener('mouseleave', function() {
                                        setTimeout(function() {
                                            if(!dropdown.matches(':hover')) dropdown.style.display = 'none';
                                        }, 200);
                                    });
                                    dropdown.addEventListener('mouseenter', function() {
                                        dropdown.style.display = 'block';
                                    });
                                    dropdown.addEventListener('mouseleave', function() {
                                        dropdown.style.display = 'none';
                                    });
                                }
                                // Optionally, update cart UI on page load
                                updateCartUI();
                            });
                            // Call updateCartUI() after AJAX add-to-cart success
                            </script>
                            <li class="site_language">
                                <select class="form-select" aria-label="site_language" name="LanguageChange"
                                    id="langchange">
                                    <option style="display:none"></option>
                                    <option <?php if(\Session::get('language') == 1): ?> <?php echo e('selected'); ?> <?php endif; ?>
                                        value="1" selected="">EN</option>
                                    <!-- <option <?php if(\Session::get('language') == 2): ?> <?php echo e('selected'); ?> <?php endif; ?> value="2">FR</option> -->
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-header">
        <div class="container">
            <nav id="site-navigation" class="navigation main-navigation desktop-menu">
                <ul class="nav-menu">
                    <?php
                        $get_category = Helper::getCategory();
                    ?>
                    <?php if(!empty($get_category)): ?>
                        <?php $__currentLoopData = $get_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                if (\Session::get('language') == 1) {
                                    $category_title = $result->title;
                                } else {
                                    $category_title = $result->title_fr ? $result->title_fr : $result->title;
                                }
                            ?>
                            <li class="nav-item <?php if($result->subcategory->isNotEmpty()): ?> <?php echo e('has-children '); ?> <?php endif; ?>">
                                <a href="<?php echo e(route('productlist', ['id' => Helper::encodeUrl($result->id)])); ?>"><?php echo e($category_title); ?>

                                </a>
                                <?php if($result->subcategory->isNotEmpty()): ?>
                                    <div class="sub-menu">
                                        <ul>
                                            <?php $__currentLoopData = $result->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    if (\Session::get('language') == 1) {
                                                        $subcategory_title = $sub_result->title;
                                                    } else {
                                                        $subcategory_title = $sub_result->title_fr
                                                            ? $sub_result->title_fr
                                                            : $sub_result->title;
                                                    }
                                                ?>
                                                <li><a
                                                        href="<?php echo e(route('productlist', ['id' => Helper::encodeUrl($result->id)])); ?>?sid=<?php echo e(Helper::encodeUrl($sub_result->id)); ?>"><?php echo e(ucfirst($subcategory_title)); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('special')); ?>">Special Offers</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="offcanvas offcanvas-end offcanvasNotification" tabindex="-1" id="notificationoffcanvas"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasRightLabel"><?php echo e(@Helper::language('notification')); ?></h4>
            
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

        </div>
    </div>
    
</header>



<?php if(empty($user_id)): ?>
    <div class="modal show" id="agePopUp" tabindex="-1" aria-labelledby="agePopUpLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered position-relative text-center">
            <div class="modal-content border-0 rounded-0">
                <div class="modal-body px-4 py-5 p-md-5">
                    <div class="logo-modal">
                        <img class="img-fluid" alt="GotoLiquorStore" title="GotoLiquorStore"
                            src="https://www.liquorjunctionghana.com/assets/dashboard/images/liquor-logo.svg"
                            width="640" height="80">
                    </div>
                    <div class="font-weight-bold font-md text-red mb-2" id="no-btn-click-message"
                        style="display: none;">
                        You are not old enough to view this content
                    </div>
                    <div id="contentDiv">
                        <div class="font-weight-bold font-lg">Are you 18 or above?</div>
                        <p>You must be of legal drinking age to enter this site.</p>
                        <div class="mt-4">
                            <button id="btnAgePopUpNo" type="button"
                                class="btn px-4 btn btn-outline-border mr-2">No</button>
                            <button id="btnAgePopUpYes" type="button" class="btn px-4 btn btn-default">Yes</button>
                        </div>
                        <div class="mt-3">
                            Live Freely. Drink Responsibly.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="modal fade remove-item-modal p-0 show" id="logoutModal" tabindex="-1" aria-modal="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                 <input type="hidden" name="address_id" id="address_id" value="">
                 <div class="modal-body">
                     <h5 class="mb-3"><?php echo e(@Helper::language('logout_label_web')); ?></h5>
                     <p class="body-large mb-4"><?php echo e(@Helper::language('are_you_sure_you_want_to_logout')); ?></p>
                     <div class="d-flex justify-content-between gap-2">
                         <button type="submit" class="small-common-btn common-border-btn hvr-radial-out-black w-100" data-bs-dismiss="modal" aria-label="Close"><?php echo e(@Helper::language('cancel_btn')); ?></button>
                         <button type="submit" class="small-common-btn hvr-radial-out solid-button w-100" onclick="return logoutUser()"><?php echo e(@Helper::language('yes')); ?></button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
<!-- End Header -->
<!-- Site Content -->
<main class="site-content">
    <?php $__env->startPush('after-scripts'); ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk"></script>
        <script>
            $('.notification_btn').click(function(e) {
                // Add and Remove class from body 
                $('body').addClass('scrollidisable');
                e.stopPropagation();
            });
            $(document).ready(function() {
                navigator.geolocation.getCurrentPosition(function(position) {

                    // Get the coordinates of the current possition.
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    // alert(lat)
                    // alert(lng)
                    action_url = "<?php echo e(route('sessionlatitude')); ?>";
                    var csrf = "<?php echo e(csrf_token()); ?>";

                    $.ajax({
                        url: action_url,
                        data: {
                            'lat': lat,
                            'lng': lng
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        type: "POST",

                        beforeSend: function() {
                            $(".loader").fadeIn();
                            $('.loader').css("visibility", "visible");
                        },
                        success: function(response) {
                            // console.log(response);
                            // return false;
                            $('.loader').css("visibility", "hidden");
                            // console.log('test'+response);
                            // var url = "<?php echo e(route('store.filter')); ?>";
                            // // url += '/'+response.supplier_id;
                            //  window.location.href = url;
                            // $(document).find("#filterData").modal('show');
                        },
                    });
                });
            });

            $('#notificationoffcanvas .btn-close').on('click', function() {
                $("#c-go-top").show();
                $('.fixed-watsapp').show();
            });

            function logoutUser() {
         // alert('ff')
         var data = 1;
         action_url = "<?php echo e(route('user-logout')); ?>";
         var csrf = "<?php echo e(csrf_token()); ?>";

         $.ajax({
             url: action_url,
             data: {
                 'data': data
             },
             headers: {
                 'X-CSRF-TOKEN': csrf
             },
             type: "POST",

             beforeSend: function() {
                 $(".loader").fadeIn();
                 $('.loader').css("visibility", "visible");
             },
             success: function(response) {
                 // return false;
                 var url = "<?php echo e(route('frontend.home')); ?>";
                 window.location.href = url;
                 // location.reload();
             },
         });
     }

            function readNotification() {
                var data = 1;
                action_url = "<?php echo e(route('read-notification')); ?>";
                var csrf = "<?php echo e(csrf_token()); ?>";

                if (window.innerWidth < 768) {
                    console.log("Forcing hide of go-top in readNotification()");
                    $("#c-go-top").hide();
                    $('.fixed-watsapp').hide();
                }

                $.ajax({
                    url: action_url,
                    data: {
                        'data': data
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrf
                    },
                    type: "POST",

                    beforeSend: function() {
                        $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(response) {
                        $('.loader').css("visibility", "hidden");
                        $(document).find(".offcanvas-body").html(response.html);
                        $(".offcanvasNotification").addClass('show');
                        $(".offcanvasNotification").css('visibility', 'visible');
                        // document.getElementById('notificationoffcanvas').classList.toggle('show');
                        // location.reload();
                    },
                });
            }
        </script>


        
        <script>
            $(document).ready(function() {

                const btnNo = document.getElementById('btnAgePopUpNo');
                const btnYes = document.getElementById('btnAgePopUpYes');
                const noBtnClickMessage = document.getElementById('no-btn-click-message');
                const contentDiv = document.getElementById('contentDiv');

                const modalElement = document.getElementById('agePopUp');
                const modal = new bootstrap.Modal(modalElement);

                const userDecision = localStorage.getItem('ageVerification');

                // if (userDecision === 'yes') {
                //     modal.hide();
                // } else {
                //         window.addEventListener('load', function() {
                //             modal.show();
                //         });
                //     }

                // btnNo.addEventListener('click', function () {
                //     noBtnClickMessage.style.display = 'block'; 
                //     contentDiv.style.display = 'none'; 
                // });

                // btnYes.addEventListener('click', function () {
                //     noBtnClickMessage.style.display = 'none'; 
                //     localStorage.setItem('ageVerification', 'yes');
                //     modal.hide(); 

                //     const backdrop = document.querySelector('.modal-backdrop');
                //     if (backdrop) {
                //         backdrop.remove(); 
                //     }

                //     document.body.classList.remove('modal-open');
                // });

                if (userDecision !== 'yes') {
                    modal.show();
                }

                // Handle No button click
                btnNo.addEventListener('click', function() {
                    noBtnClickMessage.style.display = 'block';
                    contentDiv.style.display = 'none';
                });

                // Handle Yes button click
                btnYes.addEventListener('click', function() {
                    noBtnClickMessage.style.display = 'none';
                    localStorage.setItem('ageVerification', 'yes');
                    modal.hide();

                    const backdrop = document.querySelector('.modal-backdrop');
                    if (backdrop) {
                        backdrop.remove();
                    }
                    document.body.classList.remove('modal-open');
                });

            })
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButton = document.querySelector('.search-icon');
                const searchForm = document.querySelector('.header-search-form');

                toggleButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    searchForm.classList.toggle('toggled-on');
                    searchForm.classList.toggle('toggle-show');
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                if (window.location.hash === '#_=_') {
                    history.replaceState('', document.title, window.location.pathname + window.location.search);
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php /**PATH /home/liquorjunctiongh/public_html/resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>