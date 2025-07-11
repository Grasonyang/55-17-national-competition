import "./Map.css"
import Card from "./Card"
import map_img from "../assets/image/map.png"
import card_img_1 from "../assets/image/1.jpg"
import card_img_2 from "../assets/image/2.jpeg"
import card_img_3 from "../assets/image/3.jpg"
import { useState } from "react"

function Map() {
    let cards = [
        {
            img: card_img_1,
            title: "景點1",
            content: "這是景點1的介紹，這裡有很多美麗的風景和有趣的活動。",
            position: {
                x: '50%',
                y: '45%'
            }
        },
        {
            img: card_img_2,
            title: "景點2",
            content: "這是景點2的介紹，這裡有很多美麗的風景和有趣的活動。",
            position: {
                x: '60%',
                y: '65%'
            }
        },
        {
            img: card_img_3,
            title: "景點3",
            content: "這是景點3的介紹，這裡有很多美麗的風景和有趣的活動。",
            position: {
                x: '47%',
                y: '55%'
            }
        },
    ];
    let [hoverIndex, setHoverIndex] = useState(null);
    return (
        <>
            <section id="map" role="contentinfo">
                <div className="card-container" aria-labelledby="map-title">
                    {
                        cards.map((card, index) => {
                            console.log(index);
                            return <Card key={index}
                                img={card.img}
                                title={card.title}
                                content={card.content}
                                isHover={index == hoverIndex}
                                onMouseEnter={
                                    () => {
                                        setHoverIndex(index);
                                    }
                                }
                                onMouseLeave={
                                    () => {
                                        setHoverIndex(null);
                                    }
                                }
                            ></Card>
                        })
                    }
                    <div className="link-container">
                        <h3>各景點連結</h3>
                        <ol>
                            {
                                cards.map((card, index) => {
                                    return (
                                        <li key={index}>
                                            <a href={`#${card.title}`}
                                                onMouseEnter={
                                                    () => {
                                                        setHoverIndex(index);
                                                    }
                                                }
                                                onMouseLeave={
                                                    () => {
                                                        setHoverIndex(null);
                                                    }
                                                }
                                                className={index == hoverIndex ? "link link-hover" : "link "}
                                            >
                                                {card.title}
                                            </a>
                                        </li>
                                    )
                                })
                            }
                        </ol>
                    </div>
                </div>
                <div className="map-container" aria-labelledby="map-title">
                    <div>
                        <img src={map_img} id="map-img" alt="map" aria-labelledby="map-title" />
                        {
                            cards.map((card, index) => {
                                return (
                                    <div key={index}
                                        style={{
                                            top: card.position.y,
                                            left: card.position.x,
                                        }}
                                        onMouseEnter={
                                            () => {
                                                setHoverIndex(index);
                                            }
                                        }
                                        onMouseLeave={
                                            () => {
                                                setHoverIndex(null);
                                            }
                                        }
                                        className={index == hoverIndex ? "point point-hover" : "point"}
                                    ></div>

                                )
                            })
                        }

                    </div>
                </div>

            </section >
        </>
    )
}
export default Map;
