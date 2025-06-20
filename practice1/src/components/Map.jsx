import React, { useState } from 'react';
import './Map.css';
import attractions1 from '../assets/image/attractions1.jpg';
import attractions2 from '../assets/image/attractions2.jpg';
import attractions3 from '../assets/image/attractions3.jpg';
import map from '../assets/image/map.png';

function Map() {
    let [hoversite, setHoversite] = useState(0);
    let sites = [
        {
            id: 1,
            name: "景點1",
            image: attractions1,
            description: "這是景點1的描述。",
            position: {
                top: "10%",
                left: "50%"
            }
        },
        {
            id: 2,
            name: "景點2",
            image: attractions2,
            description: "這是景點2的描述。",
            position: {
                top: "80%",
                left: "40%"
            }
        },
        {
            id: 3,
            name: "景點3",
            image: attractions3,
            description: "這是景點3的描述。",
            position: {
                top: "60%",
                left: "20%"
            }
        }
    ]
    let cardHover = {
        "transform": "scale(1.05)",
        "boxShadow": " 0px 0px 18px 4px #0080BC",
    };
    let linkHover = {
        // "transform": "scale(1.1)",
        "textShadow": " 2px 2px 4px  #0080BC"
    };
    let mapPointHover = {
        "transform": "scale(1.05)",
        "backgroundcolor": "#1000FF",
        "color": "white",
        "boxShadow": " 0px 0px 18px 4px #0080BC"
    }

    return (
        <>
            <h2 className="fw-bold text-center mt-5" id="map">地圖景點</h2>
            <div className="container row p-2">
                <div className="col-12 col-xl-6">
                    <div className="row gap-3 d-flex justify-content-center">
                        {
                            sites.map((site) => {
                                return (
                                    <div className="card site-card col-12 col-md-5 site-transition" key={site.id}
                                        onMouseEnter={() => {
                                            setHoversite(site.id)
                                        }}
                                        onMouseLeave={() => {
                                            setHoversite(null)
                                        }}
                                        style={hoversite === site.id ? cardHover : {}}
                                    >
                                        <img src={site.image} className="card-img-top" alt={site.name} />
                                        <div className="card-body">
                                            <h5 className="card-title">{site.name}</h5>
                                            <p className="card-text">{site.description}</p>
                                            <a href="#" className="btn btn-primary">了解更多</a>
                                        </div>
                                    </div>
                                )
                            })
                        }
                        <div className="card col-12 col-md-5 d-flex flex-column justify-content-center">
                            <h4>地圖景點</h4>
                            <ul>
                                {
                                    sites.map((site) => {
                                        return (
                                            <li className="nav-link site-transition" key={site.id}
                                                onMouseEnter={() => {
                                                    setHoversite(site.id)
                                                }}
                                                onMouseLeave={() => {
                                                    setHoversite(null)
                                                }}
                                                style={hoversite === site.id ? linkHover : {}}
                                            ><a href="#">{site.name}</a></li>
                                        )
                                    })
                                }
                            </ul>
                        </div>
                    </div>
                </div>
                <div className="col-12 col-xl-6 d-flex justify-content-center">
                    <div className='map-container d-flex justify-content-center p-5 p-xl-0'>
                        <img src={map} className="map" alt="map image" />
                        {
                            sites.map((site) => {
                                return (
                                    <div className="map-point site-transition" style={hoversite === site.id ? { ...site.position, ...mapPointHover } : site.position} key={site.id}
                                        onMouseEnter={() => {
                                            setHoversite(site.id)
                                        }}
                                        onMouseLeave={() => {
                                            setHoversite(null)
                                        }}
                                    >
                                        <span className="point-name">{site.name}</span>
                                    </div>
                                )
                            })
                        }
                    </div>
                </div>
            </div>
        </>
    )
}

export default Map;