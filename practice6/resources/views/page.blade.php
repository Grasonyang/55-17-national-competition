<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $info['title'] ?? 'Document' }}</title>
    
    <!-- Meta OG Tags -->
    <meta property="og:title" content="{{ $info['title'] ?? 'Document' }}">
    <meta property="og:description" content="{{ $info['summary'] ?? $info['title'] ?? 'Document' }}">
    <meta property="og:image" content="{{ asset($info['cover'] ?? '') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $info['title'] ?? 'Document' }}">
    <meta name="twitter:description" content="{{ $info['description'] ?? $info['title'] ?? 'Document' }}">
    <meta name="twitter:image" content="{{ asset($info['cover'] ?? '') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header role="navigation">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="navbar-brand">{{ $info['title'] }}</h1>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('go') }}" tabindex="0" aria-label="前往主頁">主頁</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container" id="banner" role="banner">
            <img src="{{ asset($info['cover']) }}" alt="Banner Image">
            <div id="look"></div>
            <h1>{{ $info['title'] }}</h1>
        </div>
        
        <!-- 分享按鈕區域 -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h5>分享這個頁面：</h5>
                    <div class="share-buttons">
                        <button class="btn btn-primary me-2" onclick="shareToFacebook()">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                        <button class="btn btn-info me-2" onclick="shareToTwitter()">
                            <i class="fab fa-twitter"></i> Twitter
                        </button>
                        <button class="btn btn-success me-2" onclick="shareToLine()">
                            <i class="fab fa-line"></i> LINE
                        </button>
                        <button class="btn btn-secondary me-2" onclick="copyToClipboard()">
                            <i class="fas fa-copy"></i> 複製連結
                        </button>
                        <button class="btn btn-warning" onclick="nativeShare()" id="nativeShareBtn" style="display: none;">
                            <i class="fas fa-share"></i> 分享
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
</body>
<script>
    // Banner 滑鼠效果
    $("#banner").on('mousemove',function(e){
        let gradient = `radial-gradient(circle at ${e.offsetX}px ${e.offsetY}px, transparent, black 300px)`
        $("#look").css("background",gradient);
    })
    $("#banner").on('mouseleave',function(e){
        $("#look").css("background","none");
    })
    
    // 分享功能
    const currentUrl = window.location.href;
    const pageTitle = "{{ $info['title'] ?? 'Document' }}";
    const pageDescription = "{{ $info['summary'] ?? $info['title'] ?? 'Document' }}";
    
    // Facebook 分享
    function shareToFacebook() {
        const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }
    
    // Twitter 分享
    function shareToTwitter() {
        const text = `${pageTitle} - ${pageDescription}`;
        const url = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(text)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }
    
    // LINE 分享
    function shareToLine() {
        const text = `${pageTitle}\n${pageDescription}\n${currentUrl}`;
        const url = `https://social-plugins.line.me/lineit/share?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(text)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }
    
    // 複製連結到剪貼簿
    function copyToClipboard() {
        navigator.clipboard.writeText(currentUrl).then(function() {
            alert('連結已複製到剪貼簿！');
        }).catch(function(err) {
            // 降級方案
            const textArea = document.createElement('textarea');
            textArea.value = currentUrl;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('連結已複製到剪貼簿！');
        });
    }
    
    // 原生分享 API (適用於行動裝置)
    function nativeShare() {
        if (navigator.share) {
            navigator.share({
                title: pageTitle,
                text: pageDescription,
                url: currentUrl
            }).catch(console.error);
        }
    }
    
    // 檢查是否支援原生分享 API
    if (navigator.share) {
        document.getElementById('nativeShareBtn').style.display = 'inline-block';
    }
</script>
</html>