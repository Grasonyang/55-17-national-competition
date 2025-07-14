import "./Map.css"
import img1 from "./image/1.jpg"
import img2 from "./image/4.avif"
import img3 from "./image/29294533_l.jpg"
import map from "./image/map.png"

import { useState } from "react"

function Map() {
    let cards = [
        {
            title: "景點1",
            description: "這是景點1的描述, 這裡有很多有趣的事情可以做。",
            img: [img1, img2],
            position: {
                x: "20%",
                y: "50%"
            }
        },
        {
            title: "景點2",
            description: "這是景點1的描述, 這裡有很多有趣的事情可以做。",
            img: [img3, img2],
            position: {
                x: "70%",
                y: "60%"
            }
        },
        {
            title: "景點3",
            description: "這是景點1的描述, 這裡有很多有趣的事情可以做。",
            img: [img1, img3],
            position: {
                x: "90%",
                y: "40%"
            }
        },
    ]
    let [index, setIndex] = useState(-1) // 被hover的card、link、point
    return (
        <>
            <div className="container" id="map">
                <div className="box">
                    <div className="left">
                        <div className="info">
                            <h3 className="title">各景點展示</h3>
                            <p>檢視所有景點，找到你喜歡的吧</p>
                        </div>
                        <div className="card-container">
                            {
                                cards.map((card, i) => {
                                    return (
                                        <div
                                            key={i}
                                            className={index === i ? "card hover" : "card"}
                                            tabIndex={0}
                                            aria-label="景點圖片"
                                            onMouseMove={() => {
                                                setIndex(i)
                                            }}
                                            onMouseLeave={() => {
                                                setIndex(-1)
                                            }}
                                        >
                                            <picture className="card-img">
                                                <source media="(min-width: 760px)" srcSet={card.img[0]} />
                                                <img src={card.img[1]} alt={`${card.title}的圖片`} />
                                            </picture>
                                            <div className="card-body">
                                                <h4 className="card-title" tabIndex={0}>{card.title}</h4>
                                                <p className="card-text" tabIndex={0}>{card.description}</p>
                                            </div>
                                        </div>
                                    )
                                })
                            }
                            <div className="card link-container" tabIndex={0} aria-label="各景點連結">

                                {
                                    cards.map((card, i) => {
                                        return (
                                            <a
                                                key={i}
                                                className={index === i ? "link hover" : "link"}
                                                href="#"
                                                aria-label={`${card.title}的連結`}
                                                tabIndex={0}
                                                onMouseMove={() => {
                                                    console.log(index)
                                                    setIndex(i)
                                                }}
                                                onMouseLeave={() => {
                                                    setIndex(-1)
                                                }}
                                            >{card.title}</a>
                                        )
                                    })
                                }
                            </div>
                        </div>
                    </div>
                    <div className="right">
                        <div className="map-container">
                            <img src={map} alt="地圖" tabIndex={0} />
                            {
                                cards.map((card, i) => {
                                    return (
                                        <div
                                            key={i}
                                            className={index === i ? "point hover" : "point"}
                                            href="#"
                                            aria-label={`${card.title}的地圖標點`}
                                            tabIndex={0}
                                            onMouseMove={() => {
                                                setIndex(i)
                                            }}
                                            onMouseLeave={() => {
                                                setIndex(-1)
                                            }}
                                            title={card.title}
                                            style={{
                                                left: card.position.x,
                                                top: card.position.y
                                            }}
                                        ></div>
                                    )
                                })
                            }
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
export default Map;