import './header.css'
function Header() {
    return (
        <>
            <nav role="navigation" id="hd">
                <a href="#" className="logo" aria-labelledby="site-title">
                    <h1 id="site-title" role='link'>里昂旅遊網</h1>
                </a>
                <input type="checkbox" id="main-menu-check" />
                <label htmlFor="main-menu-check" id="main-menu-control" role="checkbox" aria-checked="mixed" aria-controls="main-menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </label>
                <ul id="main-menu">
                    <li>
                        <a href="">地圖景點</a>
                    </li>
                    <li>
                        <a href="">旅遊影片</a>
                    </li>
                    <li>
                        <a href="">關鍵資訊</a>
                    </li>
                    <li>
                        <a href="">最新活動</a>
                    </li>
                    <li>
                        <a href="">聯絡我們</a>
                    </li>
                </ul>
            </nav>

        </>
    )
}

export default Header;