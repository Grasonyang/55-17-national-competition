import './Header.css'
function Header() {
    return (
        <header id="hd" role="banner">
            <div id="hd-bar">
                <h1 id="logo">
                    <a href="#">里昂遊遊網</a>
                </h1>
                <input type="checkbox" id="hd-menu-check" aria-labelledby="hd-menu-control" />
                <label htmlFor="hd-menu-check" id="hd-menu-control" aria-label="主選單展開按鈕">
                    <div></div>
                    <div></div>
                    <div></div>
                </label>
            </div>
            <nav id="hd-menu" role="navigation" aria-label="主選單">
                <ul>
                    <li><a href="#mapct">地圖景點</a></li>
                    <li><a href="#video">精彩影片</a></li>
                    <li><a href="#info">關鍵資訊</a></li>
                    <li><a href="#eventct">最新活動</a></li>
                    <li><a href="#contacthr">聯絡我們</a></li>
                </ul>
            </nav>
        </header>
    )
}
export default Header;