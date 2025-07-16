import "./Event.css"
import { useState, useRef, useEffect } from "react";

import img1 from "./image/1.jpg"
import img2 from "./image/4.avif"
import img3 from "./image/29294533_l.jpg"

function Event(){
    let _card = [
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        {
            title:"景點一",
            description:"景點一的描述",
            img:[img1, img2]
        },
        {
            title:"景點二",
            description:"景點二的描述",
            img:[img2, img3]
        },
        {
            title:"景點三",
            description:"景點三的描述",
            img:[img3, img1]
        },
        
    ]
    let [cards, setCards] = useState(_card);
    let containerRef = useRef(null);
    let isDrag = useRef(false);
    let isClick = useRef(false);
    let isStart = useRef(0);
    let mouseEventEnd = (e)=>{
        isDrag.current=false;
        isClick.current=false;
    }
    let mouseEventStart=(e)=>{
        isClick.current=true;
        isStart.current = e.pageX;
    }
    let mouseEventMove=(e)=>{
        if(!isClick.current)
            return ;
        if(Math.abs(isStart.current - e.pageX)>=5){
            isDrag.current = true;
        }
        if(isDrag.current){
            containerRef.current.scrollLeft += isStart.current - e.pageX;
            isStart.current = e.pageX;
        }
        console.log(containerRef.current.offsetWidth)
        if(containerRef.current.scrollLeft+containerRef.current.offsetWidth >= containerRef.current.scrollWidth - 50){
            
            setCards((prev)=>{
                return [...prev, ..._card];
            })
        }
    }
    let [isActive, setIsActive] = useState(0)

    return (
        <>
            <div className="container" id="event">
                <div className="box">
                    <h3>最新活動消息</h3>
                </div>
            </div>
            <div className="card-container" ref={containerRef} id="event-cards"
                onMouseDown={(e)=>mouseEventStart(e)}
                onMouseMove={(e)=>mouseEventMove(e)}
                onMouseLeave={(e)=>mouseEventEnd(e)}
                onMouseUp={(e)=>mouseEventEnd(e)}
                
            >
                {
                    cards.map((card,index)=>{
                        return (
                            <>
                                <div
                                    key={index}
                                    className={isActive===index?"card active":"card"}
                                    onClick={
                                        ()=>{
                                            if(isDrag.current)
                                                return
                                            return isActive===index?setIsActive(-1): setIsActive(index)
                                        }
                                    }
                                >
                                    <picture className="back">
                                        <img src={card.img[0]} alt="background" />
                                        <source media="(min-width: )" srcSet={card.img[1]} />
                                    </picture>
                                    <picture className="icon">
                                        <img src={card.img[0]} alt="logo" />
                                        <source media="(min-width: )" srcSet={card.img[1]} />
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
            </div>
        </>
    )
}
export default Event;