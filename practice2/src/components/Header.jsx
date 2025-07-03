import './Header.css'

function Header() {
    return (
        <>
            <header className="header ">
                <div>
                    <a href="./"><h1 className='sans ls-10'>里昂旅遊網</h1></a>
                    <input type="checkbox" id="nav-menu-1-check" className='d-none' />
                    <label htmlFor="nav-menu-1-check" id="nav-menu-1-control">
                        <div></div>
                        <div></div>
                        <div></div>
                    </label>
                </div>
                <ul id="nav-menu-1">
                    <li><a href="#video" className="sans ls-5">影片重播</a></li>
                    <li><a href="#info" className="sans ls-5">關鍵資訊</a></li>
                    <li><a href="#event" className="sans ls-5">最新活動</a></li>
                    <li><a href="#contact" className="sans ls-5">聯絡我們</a></li>
                </ul>
            </header>
        </>
    )
}
export default Header;