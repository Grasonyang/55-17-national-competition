
import "./style1.css"

import banner_img from "./image/29294533_l.jpg"

import { useState } from "react";

function Style1() {
    let [show, setShow] = useState(1);
    return (
        <header role="banner" id="hd">
            <section id="logo-container">
                <h1 id="logo" tabIndex={0}>里昂</h1>
                <button id="menu-control-1">Contact Us</button>
                <button id="menu-control-2" onClick={() => { setShow(!show) }}>
                    <div className={show ? "menu-icon" : "menu-icon active"}>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    {show ? "menu" : "close"}
                </button>
            </section>
            <section role="callToAction" id="cta-container">
                <img src={banner_img} alt="banner image" />
                <div>
                    <h2 tabIndex={0}>歡迎來到里昂</h2>
                    <p tabIndex={0}>古老且悠久的城市，放鬆身心，享受片刻寧靜</p>
                    <button tabIndex={0}>開始你的旅程</button>
                </div>
            </section>
            <nav role="navigation" id="nav-container">
                <ul>
                    <li>
                        <a href="" tabIndex={0}>地圖景點</a>
                    </li>
                    <li>
                        <a href="" tabIndex={0}>影片重播</a>
                    </li>
                    <li>
                        <a href="" tabIndex={0}>關鍵資訊</a>
                    </li>
                    <li>
                        <a href="" tabIndex={0}>最新活動</a>
                    </li>
                    <li>
                        <a href="" tabIndex={0}>資訊標籤</a>
                    </li>
                </ul>
            </nav>
        </header>
    )
}
export default Style1;