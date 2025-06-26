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
    <header id="header">
        <img src="<?php echo e(asset('content-images/istockphoto-1149147557-612x612.jpg')); ?>" alt="Old Town">
        <h1><?php echo e($title); ?></h1>
    </header>

    <main class="container mt-4">
        <div class="row">
            <!-- 主內容 -->
            <div class="col-md-8">
                <div class="bg-light p-3">
                    <?php if(isset($texts)): ?>
                        <?php $__currentLoopData = $texts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="drop-cap"><?php echo e($text); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php echo $html; ?>

                    <?php endif; ?>
                    <?php if(isset($imgLink)): ?>
                        <?php $__currentLoopData = $imgLink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset('content-images/'.$img)); ?>" alt="Image" class="img-fluid mb-3 main_image">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Aside 區塊 -->
            <div class="col-md-4">
                <aside>
                    <ul class="list-unstyled">
                        <li><strong>Date:</strong> <?php echo e($aside['date']); ?> </li>
                        <li><strong>Tags:</strong> 
                            <?php if($aside['tags']): ?>
                                <?php $__currentLoopData = $aside['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="badge bg-secondary"><?php echo e($tag); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </li>
                        <li><strong>Draft:</strong> <?php echo e($aside['draft']); ?></li>
                    </ul>
                </aside>
            </div>
        </div>
    </main>
    <div class="img_box"></div>
    <script src="<?php echo e(asset('asset/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
</body>
<script>
    const header = document.getElementById('header');
    const img = header.querySelector('img');

    header.addEventListener('mousemove', function (e) {
        const rect = header.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const mask = `radial-gradient(circle 300px at ${x}px ${y}px, black 0%, rgba(255,255,255,0) 100%)`;

        img.style.webkitMaskImage = mask;
        img.style.maskImage = mask;
    });
    $(".main_image").on('click',function(){
        if($(".img_box").text()==""){
            $(".img_box").show();
            $(".img_box").append(`
                <img src="${$(this).attr('src')}" alt="Image" class="img-fluid">
            `);
        }else{
            $(".img_box").hide();
            $(".img_box").text("");
        }
    })
    $(".img_box").on('click',function(){
        $(".img_box").hide();
        $(".img_box").text("");
    })
    $(window).on('scroll', function () {
        $(".img_box").hide();
        $(".img_box").text("");
    });
</script>
</html>
<?php /**PATH C:\xampp\htdocs\55-17-national-competition\practice1\resources\views/page.blade.php ENDPATH**/ ?>