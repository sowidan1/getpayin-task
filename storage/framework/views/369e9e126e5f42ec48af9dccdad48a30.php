<section class="layout-pt-md layout-pb-lg news-list-block">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row <?php echo e($headerAlign); ?>">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title"><?php echo e($title ?? ''); ?></h2>
                    <?php if(!empty($desc)): ?>
                        <p class=" sectionTitle__text mt-5 sm:mt-0"><?php echo e($desc); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row y-gap-30 pt-40">

            <?php $i = 2; ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div data-anim-child="slide-up delay-" class="col-lg-6 <?php echo e($style ?? ''); ?>">
                    <?php echo $__env->make('News::frontend.blocks.list-news.loop', ['style' => $style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php $i++; if($i == 5) $i = 2; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/dh_mwskz3/tours.getpayin.com/themes/GoTrip/News/Views/frontend/blocks/list-news/style_6.blade.php ENDPATH**/ ?>