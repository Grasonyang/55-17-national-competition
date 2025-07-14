
import "./style1.css"
import banner_img from "./image/29294533_l.jpg"
import { useState, useEffect, useRef, use } from "react";

function Style1() {
    const [isMenuOpen, setIsMenuOpen] = useState(false);

    const toggleMenu = () => {
        setIsMenuOpen(!isMenuOpen);
    };
    let nav = useRef(null);
    let [sticky, setSticky] = useState(false);
    useEffect(() => {
        let observe = new IntersectionObserver(
            ([entry]) => setSticky(!entry.isIntersecting), {
            threshold: 0
        })
        observe.observe(nav.current);
        return () => {
            observe.disconnect();
        }
    }, [])
    return (
        <>
            <a href="#main-content" className="skip-to-content">
                跳到主要內容
            </a>
            <header role="banner" id="hd" className="main-header">
                {/* Logo and Navigation Toggle Section */}
                <section id="logo-container" className="header-top">
                    <h1 id="logo" tabIndex={0} className="site-title">
                        里昂
                    </h1>

                    <button
                        id="menu-control-1"
                        className="contact-btn"
                        type="button"
                        aria-label="聯絡我們"
                    >
                        Contact Us
                    </button>

                    <input
                        type="checkbox"
                        id="menu-control-2-check"
                        checked={isMenuOpen}
                        onChange={toggleMenu}
                        aria-hidden="true"
                        className="sr-only"
                    />

                    <label
                        htmlFor="menu-control-2-check"
                        id="menu-control-2"
                        className="mobile-menu-toggle"
                        onClick={toggleMenu}
                        aria-label={isMenuOpen ? "關閉選單" : "開啟選單"}
                    >
                        <div className={isMenuOpen ? "menu-icon active" : "menu-icon"}>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span className="menu-text">
                            {isMenuOpen ? "close" : "menu"}
                        </span>
                    </label>
                </section>

                {/* Hero/CTA Section */}
                <section ref={nav} id="cta-container" className="hero-section" role="img" aria-labelledby="hero-title">
                    <img
                        src={banner_img}
                        alt="里昂城市美景 - 古老建築與現代風光的完美融合"
                        className="hero-image"
                        loading="eager"
                    />
                    <div className="hero-content">
                        <h2 id="hero-title" tabIndex={0} className="hero-title">
                            歡迎來到里昂
                        </h2>
                        <p tabIndex={0} className="hero-description">
                            古老且悠久的城市，放鬆身心，享受片刻寧靜
                        </p>
                        <button
                            tabIndex={0}
                            className="cta-button"
                            type="button"
                            aria-label="開始探索里昂之旅"
                        >
                            開始你的旅程
                        </button>
                    </div>
                </section>
                {/* Main Navigation */}
                <nav
                    id="nav-container"
                    className={`main-navigation ${isMenuOpen ? 'nav-open' : ''} ${sticky ? 'sticky' : ''}`}
                    role="navigation"
                    aria-label="主要導航選單"

                >
                    <ul className="nav-list" role="menubar">
                        <li role="none">
                            <a
                                href="#map-attractions"

                                role="menuitem"
                                className="nav-link"
                            >
                                地圖景點
                            </a>
                        </li>
                        <li role="none">
                            <a
                                href="#video-replay"
                                tabIndex={0}
                                role="menuitem"
                                className="nav-link"
                            >
                                影片重播
                            </a>
                        </li>
                        <li role="none">
                            <a
                                href="#key-info"
                                tabIndex={0}
                                role="menuitem"
                                className="nav-link"
                            >
                                關鍵資訊
                            </a>
                        </li>
                        <li role="none">
                            <a
                                href="#latest-events"
                                tabIndex={0}
                                role="menuitem"
                                className="nav-link"
                            >
                                最新活動
                            </a>
                        </li>
                        <li role="none">
                            <a
                                href="#info-tags"
                                tabIndex={0}
                                role="menuitem"
                                className="nav-link"
                            >
                                資訊標籤
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
        </>
    );
}

export default Style1;