<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <style>
        p.drop-cap::first-letter {
            float: left;
            font-size: 3.5rem;
            line-height: 1;
            margin-right: 0.25rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container p-3">
        <h1><?php echo e($title); ?></h1>
        <div class="container mt-5">
            <h3>File</h3>
            <ul class="list-group">
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- <pre><?php echo e(print_r($file,true)); ?></pre> -->
                    <a href="<?php echo e(route('handle', ['path'=> $file['path']])); ?>">
                        <li class="list-group-item">
                            <div>
                                <h3><?php echo e($file['name']); ?></h3>
                                <h5>Title: <?php echo e($file['title']); ?></h5>
                                <h6>Summary: <?php echo e($file['summary']); ?></h6>
                            </div>
                        </li>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <script src="<?php echo e(asset('asset/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\55-17-national-competition\practice1\resources\views/tag.blade.php ENDPATH**/ ?>