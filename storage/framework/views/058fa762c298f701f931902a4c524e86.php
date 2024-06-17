<?php if($layout == 'grid'): ?>
    <div class="gotrip-form-search-grid rounded-4 mb-20 lg:d-none">
        <h5 class="text-18 fw-500 p-4 pb-0"><?php echo e(setting_item_with_lang("boat_page_search_title")); ?></h5>
        <?php echo $__env->make('Boat::frontend.layouts.search.form-search', ['style' => 'sidebar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>
<form action="<?php echo e(route("boat.search")); ?>" class="bravo_form_filter bravo_filter lg:d-none" data-x="filterPopup" data-x-toggle="-is-active"  method="get">
    <aside class="sidebar y-gap-40 p-4 p-lg-0">
        <div data-x-click="filterPopup" class="-icon-close is_mobile pb-0">
            <i class="icon-close"></i>
        </div>
        <div class="sidebar__item pb-30 -no-border">
            <h5 class="text-18 fw-500 mb-10"><?php echo e(__('Price')); ?></h5>
            <div class="row x-gap-10 y-gap-30">
                <div class="col-12">
                    <div class="js-price-searchPage">
                        <div class="text-14 fw-500"></div>
                        <?php
                        $price_min = $pri_from = floor ( App\Currency::convertPrice($boat_min_max_price[0]) );
                        $price_max = $pri_to = ceil ( App\Currency::convertPrice($boat_min_max_price[1]) );
                        if (!empty($price_range = Request::query('price_range'))) {
                            $pri_from = explode(";", $price_range)[0];
                            $pri_to = explode(";", $price_range)[1];
                        }
                        $currency = App\Currency::getCurrency( App\Currency::getCurrent() );
                        ?>
                        <input type="hidden" class="filter-price irs-hidden-input" name="price_range"
                               data-symbol=" <?php echo e($currency['symbol'] ?? ''); ?>"
                               data-min="<?php echo e($price_min); ?>"
                               data-max="<?php echo e($price_max); ?>"
                               data-from="<?php echo e($pri_from); ?>"
                               data-to="<?php echo e($pri_to); ?>"
                               readonly="" value="<?php echo e($price_range); ?>">
                        <div class="d-flex justify-between mb-20">
                            <div class="text-15 text-dark-1">
                                <span class="js-lower"></span>
                                -
                                <span class="js-upper"></span>
                            </div>
                        </div>
                        <div class="px-5">
                            <div class="js-slider"></div>
                        </div>
                        <button type="submit" class="flex-center bg-blue-1 rounded-4 px-3 py-1 mt-3 text-12 fw-600 text-white btn-apply-price-range mt-20"><?php echo e(__("APPLY")); ?></button>

                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar__item">
            <h5 class="text-18 fw-500 mb-10"><?php echo e(__("Review Score")); ?></h5>
            <div class="sidebar-checkbox">
                <?php for($number = 5 ;$number >= 1 ; $number--): ?>
                    <div class="row y-gap-10 items-center justify-between">
                        <div class="col-auto">
                            <div class="d-flex items-center">
                                <div class="form-checkbox ">
                                    <input <?php if(  in_array($number , request()->query('review_score',[])) ): ?>  checked <?php endif; ?> type="checkbox" name="review_score[]" value="<?php echo e($number); ?>">
                                    <div class="form-checkbox__mark">
                                        <div class="form-checkbox__icon icon-check"></div>
                                    </div>
                                </div>
                                <div class="text-15 ml-10">
                                    <?php for($review_score = 1 ;$review_score <= $number ; $review_score++): ?>
                                        <i class="fa fa-star text-yellow-1"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-15 text-light-1"></div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <?php echo $__env->make('Layout::global.search.filters.attrs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="bravo-clear-filter hidden-lg-up" style="display: none;">
            <a href="#" onclick="return false" class="button px-15 py-10 -dark-1 bg-blue-1 text-white">
                <i class="icon-loop-2 mr-10 text-12"></i>
                <span><?php echo e(__('Clear All')); ?></span>
            </a>
        </div>
    </aside>
</form>
<?php /**PATH /home/dh_mwskz3/tours.getpayin.com/themes/GoTrip/Boat/Views/frontend/layouts/search/sidebar-form-search.blade.php ENDPATH**/ ?>