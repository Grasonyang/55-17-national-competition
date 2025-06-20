import { useState } from "react";
import "./Header.css"
function Header() {
    return (
        <>
            <nav className="navbar navbar-expand-lg header-bg">
                <div className="container-fluid">
                    <a className="navbar-brand" href="#">
                        <h1 className="fw-bold text-dark">里昂旅遊網</h1>
                    </a>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li className="nav-item">
                                <a className="nav-link" href="#map">地圖景點</a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" href="#">宣傳影片</a>
                            </li>
                            <li className="nav-item dropdown">
                                <a className="nav-link" href="#">先關資訊</a>
                            </li>
                            <li className="nav-item dropdown">
                                <a className="nav-link" href="#">最新活動</a>
                            </li>
                            <li className="nav-item dropdown">
                                <a className="nav-link" href="#">聯絡我們</a>
                            </li>
                        </ul>
                        <form className="d-flex" role="search">
                            <input className="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                            <button className="btn btn-outline-dark" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </>
    )
}
export default Header;