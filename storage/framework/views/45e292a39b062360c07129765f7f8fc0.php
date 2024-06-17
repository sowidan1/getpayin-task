

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__('Verification Requests')); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <form method="post" action="<?php echo e(route("user.admin.verification.bulkEdit")); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                    <?php echo e(csrf_field()); ?>

                    <select name="action" class="form-control">
                        <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                        <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                    </select>
                    <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                </form>
            </div>
            <div class="col-left">
                <form method="get" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <select class="form-control" name="role">
                        <option value=""><?php echo e(__('-- Select --')); ?></option>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->name); ?>" <?php if(Request()->role == $role->name): ?> selected <?php endif; ?> ><?php echo e(ucfirst($role->name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by name')); ?>" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search User')); ?></button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <div class="header-status-control">
                <a href="<?php echo e(route('user.admin.verification.index')); ?>"><?php echo e(__("All Verification")); ?></a> -
                <a href="<?php echo e(route('user.admin.verification.index',['status'=>'pending'])); ?>"><?php echo e(__("Pending")); ?></a> -
                <a href="<?php echo e(route('user.admin.verification.index',['status'=>'approved'])); ?>"><?php echo e(__("Approved")); ?></a>
            </div>
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Phone')); ?></th>
                                <th><?php echo e(__('Role')); ?></th>
                                <th class="date"><?php echo e(__('Date')); ?></th>
                                <th class="status"><?php echo e(__('Status')); ?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?php echo e($row->id); ?>" class="check-item">
                                        </td>
                                        <td class="title">
                                            <a href="<?php echo e(route('user.admin.verification.detail',['id'=>$row->id])); ?>"><?php echo e($row->getDisplayName()); ?></a>
                                        </td>
                                        <td><?php echo e($row->email); ?></td>
                                        <td><?php echo e($row->phone); ?></td>
                                        <td>
                                            <?php
                                                echo e(ucfirst($row->role_name));
                                            ?>
                                        </td>
                                        <td><?php echo e(display_date($row->created_at)); ?></td>
                                        <td class="status"><?php echo e($row->verify_submit_status); ?></td>
                                        <td>
                                            <?php if($row->verify_submit_status == "completed"): ?>
                                                <a class="btn btn-sm btn-info" href="<?php echo e(route('user.admin.verification.detail',['id'=>$row->id])); ?>"><?php echo e(__('View Verification')); ?></a>
                                            <?php else: ?>
                                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('user.admin.verification.detail',['id'=>$row->id])); ?>"><?php echo e(__('View request')); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8"><?php echo e(__("No data")); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <?php echo e($rows->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dh_mwskz3/tours.getpayin.com/modules/User/Views/admin/verification/index.blade.php ENDPATH**/ ?>