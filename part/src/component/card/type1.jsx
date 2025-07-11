import "./type1.css"

import img1 from "./image/1.png"
import img2 from "./image/2.png"
import img3 from "./image/3.png"
import img4 from "./image/4.png"
import img5 from "./image/5.png"

import { useState, useRef, useEffect } from "react"

function type1() {
    let cards = [
        {
            title: "Card 1",
            description: "This is the description for card 1.",
            img:{
                back: img1,
                icon: img1
            }
        },
        {
            title: "Card 2",
            description: "This is the description for card 2.",
            img:{
                back: img2,
                icon: img2
            }
        },{
            title: "Card 3",
            description: "This is the description for card 3.",
            img:{
                back: img3,
                icon: img3
            }
        },
        {
            title: "Card 4",
            description: "This is the description for card 4.",
            img:{
                back: img4,
                icon: img4
            }
        },
        {
            title: "Card 5",
            description: "This is the description for card 5.",
            img:{
                back: img5,
                icon: img5
            }
        },
        {
            title: "Card 1",
            description: "This is the description for card 1.",
            img:{
                back: img1,
                icon: img1
            }
        },
        {
            title: "Card 2",
            description: "This is the description for card 2.",
            img:{
                back: img2,
                icon: img2
            }
        },{
            title: "Card 3",
            description: "This is the description for card 3.",
            img:{
                back: img3,
                icon: img3
            }
        },
        {
            title: "Card 4",
            description: "This is the description for card 4.",
            img:{
                back: img4,
                icon: img4
            }
        },
        {
            title: "Card 5",
            description: "This is the description for card 5.",
            img:{
                back: img5,
                icon: img5
            }
        },
        {
            title: "Card 1",
            description: "This is the description for card 1.",
            img:{
                back: img1,
                icon: img1
            }
        },
        {
            title: "Card 2",
            description: "This is the description for card 2.",
            img:{
                back: img2,
                icon: img2
            }
        },{
            title: "Card 3",
            description: "This is the description for card 3.",
            img:{
                back: img3,
                icon: img3
            }
        },
        {
            title: "Card 4",
            description: "This is the description for card 4.",
            img:{
                back: img4,
                icon: img4
            }
        },
        {
            title: "Card 5",
            description: "This is the description for card 5.",
            img:{
                back: img5,
                icon: img5
            }
        },
        {
            title: "Card 1",
            description: "This is the description for card 1.",
            img:{
                back: img1,
                icon: img1
            }
        },
        {
            title: "Card 2",
            description: "This is the description for card 2.",
            img:{
                back: img2,
                icon: img2
            }
        },{
            title: "Card 3",
            description: "This is the description for card 3.",
            img:{
                back: img3,
                icon: img3
            }
        },
        {
            title: "Card 4",
            description: "This is the description for card 4.",
            img:{
                back: img4,
                icon: img4
            }
        },
        {
            title: "Card 5",
            description: "This is the description for card 5.",
            img:{
                back: img5,
                icon: img5
            }
        },
        {
            title: "Card 1",
            description: "This is the description for card 1.",
            img:{
                back: img1,
                icon: img1
            }
        },
        {
            title: "Card 2",
            description: "This is the description for card 2.",
            img:{
                back: img2,
                icon: img2
            }
        },{
            title: "Card 3",
            description: "This is the description for card 3.",
            img:{
                back: img3,
                icon: img3
            }
        },
        {
            title: "Card 4",
            description: "This is the description for card 4.",
            img:{
                back: img4,
                icon: img4
            }
        },
        {
            title: "Card 5",
            description: "This is the description for card 5.",
            img:{
                back: img5,
                icon: img5
            }
        }
    ]

    let [isActive, setIsActive] = useState(-1);
    let containerRef = useRef(null);
    let cardsRef = useRef([]);
    let mouseDown = useRef({
        status: false,
        startX: 0,
    });
    let handleCardClick = (index, e) => {
        if(mouseDrag.current) return;
        if(isActive===index){
            setIsActive(-1);
        }else{
            setIsActive(index)
            setTimeout(() => {
                cardsRef.current[index]?.scrollIntoView({
                    behavior: "smooth",
                    inline: "center", // 橫向中心
                    block: "nearest"  // 垂直方向保持不動
                });
            }, 2);
            
        }
    }
    let mouseDrag = useRef(false);
    let handleMouseDown=(e)=>{
        mouseDown.current.status = true;
        mouseDown.current.startX = e.pageX;
    }
    useEffect(()=>{
        cardsRef.current[0].click();
        $(document).on("mousemove",(e)=>{
            if(e.pageX - mouseDown.current.startX >= 5)
                mouseDrag.current = true;
            if(mouseDown.current.status && mouseDrag.current){
                // console.log(e);
                containerRef.current.scrollLeft+= (mouseDown.current.startX-e.pageX);
                mouseDown.current.startX = e.pageX;
            }
        })
        $(document).on("mouseup",(e)=>{
            // console.log("mouseup",e);
            mouseDown.current.status = false;
            mouseDown.current.startX = e.pageX;
            mouseDrag.current = false;
        })
        return ()=>{
            $(document).off("mousemove");
            $(document).off("mouseup");
        }
    }, [])
    return (
        <div
            ref={containerRef}
            className="card-container"
            onMouseDown={handleMouseDown}
            tabIndex="0"
            aria-label="景點滑動展示區"
        >
            {
                cards.map((card,index)=>{
                    return (
                        <div
                            key={index}
                            ref={(e) => cardsRef.current[index] = e}
                            className={isActive===index? "card active":"card"}
                            onClick={(e) => {
                                handleCardClick(index, e)
                            }}
                            draggable="false"
                            tabIndex="0"
                            aria-label="卡片"
                        >
                            <img src={card.img.back} draggable="false" alt="card background" className="card-back" />
                            <img src={card.img.icon} draggable="false" alt="card icon" className="card-icon" />
                            <h4 className="card-title">{ card.title }</h4>
                            <p className="card-text">{ card.description }</p>
                        </div>
                    )
                })
            }
        </div>
    )
    
}
export default type1;