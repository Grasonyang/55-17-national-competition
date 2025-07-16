import "./Header.css"

import img1 from "./image/1.jpg"
import img2 from "./image/29294533_l.jpg"

import { useState, useRef, useEffect } from "react"
function Header() {
    let [isfixed, setFixed] = useState(false);
    let check = useRef(null);
    useEffect(()=>{
        let observe = new IntersectionObserver(([entry])=>{
            setFixed(!entry.isIntersecting)
        },{
            threshold:[0]
        })
        observe.observe(check.current)
        return ()=>{
            observe.disconnect()
        }
    })
    return (
        <header role="header" id="hd">
            <section id="hd-logo">
                <h1>里昂</h1>
                <a href="#">Contact Us</a>
                <input type="checkbox" id="hd-logo-check" />
                <label htmlFor="hd-logo-check" id="hd-logo-ctl">
                    <span></span><span></span><span></span>
                </label>
            </section>
            <section id="hd-banner" role="banner" ref={check}>
                <picture>
                    <source media="(min-width: 760px)" srcSet={img2}/>
                    <img src={img1} alt="banner image" />
                </picture>
                <div className="slogan">
                    <h2>歡迎來到里昂</h2>
                    <p>遠覽股文化之都，遊歷大千世界</p>
                    <button>開始你的行程</button>
                </div>
            </section>
            <nav id="hd-nav" role="navigation" className={isfixed? "fixed": ""}>
                <ul>
                    <li><a href="#" tabIndex={0}>地圖景點</a></li>
                    <li><a href="#" tabIndex={0}>影片重播</a></li>
                    <li><a href="#" tabIndex={0}>關鍵資訊</a></li>
                    <li><a href="#" tabIndex={0}>最新活動</a></li>
                    <li><a href="#" tabIndex={0}>資訊標籤</a></li>
                </ul>
            </nav>
        </header>
    )
}

export default Header
