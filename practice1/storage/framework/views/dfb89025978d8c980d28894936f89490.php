<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/bootstrap.css')); ?>">
    <title>Document</title>
</head>
<body>
    <div class="container p-3">
        <h1><?php echo e($currentFolder); ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php $__currentLoopData = $everyFolderPath; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('handle', ['path'=> $path['fullPath']])); ?>"><?php echo e($path['path']); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ol>
        </nav>
        <div class="container">
            <h3>Folder</h3>
            <?php if($isEmpty): ?>
                <h5 class="text text-danger">The Folder is Empty!!!</h5>
            <?php else: ?>
                <div class="container mt-5">
                    <ul class="list-group">
                        <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <a href="<?php echo e(route('handle', ['path'=> $currentFolder.'/'.$folder])); ?>"><?php echo e($folder); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="container mt-5">
                    <h3>File</h3>
                    <ul class="list-group">
                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- <pre><?php echo e(print_r($file,true)); ?></pre> -->
                            <a href="<?php echo e(route('handle', ['path'=> $file['path'].'/'.$file['name']])); ?>">
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
            <?php endif; ?>
        </div>
    </div>

    <script src="<?php echo e(asset('asset/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\55-17-national-competition\practice1\resources\views/home.blade.php ENDPATH**/ ?>