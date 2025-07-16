import "./Map.css"
import { useState, useRef, useEffect } from "react";

import img1 from "./image/1.jpg"
import img2 from "./image/4.avif"
import img3 from "./image/29294533_l.jpg"
import map from "./image/map.png"



function Map(){
    let cards = [
        {
            title:"里昂大教堂",
            description:"里昂大教堂是法國里昂的一座天主教教堂，位於老城區的中心，是該市最重要的宗教建築之一。",
            image: [img1, img2],
            position:{
                left: "50%",
                top:"50%",
            }
        },
        {
            title:"里昂市政廳",
            description:"里昂市政廳是法國里昂的一座歷史建築，位於市中心，是該市的行政和政治中心。",
            image: [img2, img3],
            position:{
                left: "20%",
                top:"40%",
            }
        },
        {
            title:"里昂美術館",
            description:"里昂美術館是法國里昂的一座重要藝術博物館，收藏了大量的藝術品和文物。",
            image: [img3, img1],
            position:{
                left: "70%",
                top:"60%",
            }
        },
        
    ]
    let [hoverIndex, setHoverIndex] = useState(-1);
    return (
        <div className="container" id="map">
            <div className="box">
                <div className="left">
                    <div className="title">
                        <h3>地圖景點展示</h3>
                        <p>
                            點擊地圖上的景點，查看詳細資訊
                        </p>
                    </div>
                    <div className="card-container">
                        {
                            cards.map((card, index)=>{
                                return (
                                    <>
                                        <div
                                            key={index}
                                            className={hoverIndex===index?"card hover":"card"}
                                            onMouseMove={
                                                ()=>setHoverIndex(index)
                                            }
                                            onMouseLeave={
                                                ()=>setHoverIndex(-1)
                                            }
                                            
                                        >
                                            <picture>
                                                <source media="(min-width: 760px)" srcSet={card.image[0]} />
                                                <img src={card.image[1]} alt={`${card.title}的圖片`} />
                                            </picture>
                                            <div className="card-body">
                                                <h4>{card.title}</h4>
                                                <p>{card.description}</p>
                                            </div>
                                        </div>
                                    </>
                                )
                            })
                        }
                        <div className="card link-container">
                            {
                                cards.map((card, index)=>{
                                    return (
                                        <>
                                            
                                            <a 
                                                key={index}
                                                className={hoverIndex===index?"link hover":"link"}
                                                onMouseMove={
                                                    ()=>setHoverIndex(index)
                                                }
                                                onMouseLeave={
                                                    ()=>setHoverIndex(-1)
                                                }
                                                href=""
                                            >{card.title}</a>
                                        </>
                                    )
                                })
                            }
                        </div>
                    </div>
                </div>
                <div className="right">
                    <div className="map-container">
                        <picture>
                            <img src={map} alt="map" />
                        </picture>
                        {
                            cards.map((card, index)=>{
                                return (
                                    <>
                                        
                                        <div
                                            key={index}
                                            className={hoverIndex===index?"point hover":"point"}
                                            onMouseMove={
                                                ()=>setHoverIndex(index)
                                            }
                                            onMouseLeave={
                                                ()=>setHoverIndex(-1)
                                            }
                                            style={card.position}
                                            title={card.title}
                                        ></div>
                                    </>
                                )
                            })
                        }
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Map;