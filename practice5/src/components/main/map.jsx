

import "./map.css"
import img_1 from "./image/1.jpg"
import img_2 from "./image/2.jpeg"
import img_3 from "./image/3.jpg"
import map from "./image/map.png"
import { useState } from "react"

function Map() {
    let cards = [
        {
            title: "景點一",
            description: '這是景點一的描述, 這裡可以放一些關於景點的詳細資訊。',
            img: img_1,
            position: {
                x: '50%',
                y: '45%'
            }
        },
        {
            title: "景點二",
            description: '這是景點二的描述, 這裡可以放二些關於景點的詳細資訊。',
            img: img_2,
            position: {
                x: '65%',
                y: '35%'
            }
        }, {
            title: "景點三",
            description: '這是景點三的描述, 這裡可以放三些關於景點的詳細資訊。',
            img: img_3,
            position: {
                x: '25%',
                y: '75%'
            }
        }
    ]
    let [hoverIndex, setHoverIndex] = useState(-1);
    return (
        <>
            <section className="container">
                <div className="box" id="map-container">
                    <div className="left">
                        <h3 className="title">各大景點</h3>
                        <p>這是對各大景點的簡要描述，展示地圖上主要景點的位置與相關資訊。</p>
                        <div className="card-container">
                            {
                                cards.map((card, index) => {
                                    return (
                                        <div
                                            key={index}
                                            aria-label={card.title}
                                            className={hoverIndex === index ? "card card-hover" : "card"}
                                            onMouseMove={
                                                () => {
                                                    setHoverIndex(index);
                                                }
                                            }
                                            onMouseLeave={
                                                () => {
                                                    setHoverIndex(-1)
                                                }
                                            }

                                        >
                                            <img src={card.img} alt="景點圖片" className="card-img" />
                                            <div className="card-body">
                                                <h4 className="card-title">
                                                    {card.title}
                                                </h4>
                                                <p className="card-text">
                                                    {card.description}
                                                </p>
                                            </div>
                                            <div className="card-footer">
                                                <p></p>
                                                <button>more</button>
                                            </div>
                                        </div>
                                    )
                                })
                            }
                            <div
                                className="card"
                                style={{
                                    justifyContent: 'center',
                                }}
                            >
                                <h4 className="card-title">景點連結</h4>
                                <div className="card-links">
                                    {
                                        cards.map((card, index) => {
                                            return (
                                                <>
                                                    <a href="#" tabIndex={0}
                                                        key={index}
                                                        className={hoverIndex === index ? "link-hover" : "link"}
                                                        onMouseMove={
                                                            () => {
                                                                setHoverIndex(index);
                                                            }
                                                        }
                                                        onMouseLeave={
                                                            () => {
                                                                setHoverIndex(-1)
                                                            }
                                                        }
                                                    >
                                                        {card.title}
                                                    </a>
                                                </>
                                            )
                                        })
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="right">
                        <div className="map" role="map-container" aria-label="地圖區塊展示">
                            <img src={map} alt="map" />
                            {
                                cards.map((card, index) => {
                                    return (
                                        <div
                                            key={index}
                                            aria-label={card.title}
                                            className={hoverIndex === index ? "point point-hover" : "point"}
                                            style={{
                                                left: card.position.x,
                                                top: card.position.y,
                                            }}
                                            onMouseMove={
                                                () => {
                                                    setHoverIndex(index);
                                                }
                                            }
                                            onMouseLeave={
                                                () => {
                                                    setHoverIndex(-1)
                                                }
                                            }
                                        ></div>
                                    )
                                })
                            }
                        </div>
                    </div>
                </div>
            </section>
        </>
    )
}

export default Map;