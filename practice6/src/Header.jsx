import './Header.css'
import banner_img_1 from "./assets/29294533_l.jpg"
import banner_img_2 from "./assets/1.jpg"

import { useState, useRef, useEffect } from "react"


function Header() {
    let checkpoint = useRef(null)
    let [fixed, setFixed] = useState(false);
    useEffect(() => {
        let observe = new IntersectionObserver((entries) => {
            let entry = entries[0]
            setFixed(!entry.isIntersecting);
            console.log(entry.isIntersecting)
        }, {
            threshold: [0]
        })
        observe.observe(checkpoint.current)
        return () => {
            observe.disconnect();
        }
    }, [])
    return (
        <header role='banner' id="hd">
            <section id="hd-logo">
                <h1 tabIndex={0}>里昂</h1>
                <a href="#contact" tabIndex={0}>Contact Us</a>
                <input type="checkbox" id="hd-menu-check" aria-hidden="true" />
                <label htmlFor="hd-menu-check" id="hd-menu-control" tabIndex={0} aria-label='主選單展開按鈕'>
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </section>
            <section id="hd-banner" ref={checkpoint}>
                <picture>
                    <source media="(min-width: 760px)" srcSet={banner_img_1} />
                    <img src={banner_img_2} alt="banner image" />
                </picture>
                <div className='slogan'>
                    <h2 tabIndex={0}>歡迎來到里昂</h2>
                    <p tabIndex={0}>閱覽文化之都，享受大千世間</p>
                    <button tabIndex={0}>查看更多</button>
                </div>
            </section>
            <nav id="hd-nav" role='navigation' className={fixed ? "fixed" : ""}>
                <ul className='list' tabIndex={0} aria-label='主選單'>
                    <li className='list-item'>
                        <a href="#map" tabIndex={0}>地圖景點</a>
                    </li>
                    <li className='list-item'>
                        <a href="#video" tabIndex={0}>精彩影片</a>
                    </li>
                    <li className='list-item'>
                        <a href="#info" tabIndex={0}>關鍵資訊</a>
                    </li>
                    <li className='list-item'>
                        <a href="#event" tabIndex={0}>最新活動</a>
                    </li>
                    <li className='list-item'>
                        <a href="#story" tabIndex={0}>相關故事</a>
                    </li>
                </ul>
            </nav>
        </header>
    )
}
export default Header;