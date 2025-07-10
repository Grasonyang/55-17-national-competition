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
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        }, {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
        {
            "name": "景點5",
            "description": "這是一個測試卡片, 請提供景點5描述",
            "img_back": img5,
            "img_icon": img5,
        },
        {
            "name": "景點1",
            "description": "這是一個測試卡片, 請提供景點1描述",
            "img_back": img1,
            "img_icon": img1,
        },
        {
            "name": "景點2",
            "description": "這是一個測試卡片, 請提供景點2描述",
            "img_back": img2,
            "img_icon": img2,
        },
        {
            "name": "景點3",
            "description": "這是一個測試卡片, 請提供景點3描述",
            "img_back": img3,
            "img_icon": img3,
        },
        {
            "name": "景點4",
            "description": "這是一個測試卡片, 請提供景點4描述",
            "img_back": img4,
            "img_icon": img4,
        },
    ]
    const [isActive, setIsActive] = useState(-1);
    const containerRef = useRef(null);
    const startXRef = useRef(0);
    const scrollLeftRef = useRef(0);
    const mouseDownRef = useRef(false);
    const dragMovedRef = useRef(false);

    const handleMouseDown = (e) => {
        if (e.button !== 0) return;
        mouseDownRef.current = true;
        startXRef.current = e.clientX;
        scrollLeftRef.current = containerRef.current.scrollLeft;
        dragMovedRef.current = false;
        // document.body.style.cursor = "grabbing";

    };

    useEffect(() => {
        const handleMouseMove = (e) => {
            if (!mouseDownRef.current) return;
            // 只做這兩行
            if (Math.abs(e.clientX - startXRef.current) > 5) {
                dragMovedRef.current = true;
            }
            if (dragMovedRef.current) {
                const dx = e.clientX - startXRef.current;
                containerRef.current.scrollLeft = scrollLeftRef.current - dx;
            }

        };

        const handleMouseUp = () => {
            mouseDownRef.current = false;
            dragMovedRef.current = false;
            // document.body.style.cursor = "";
        };

        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);

        return () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        };
    }, []);

    return (
        <div
            className="card-type1-container"
            ref={containerRef}
            onMouseDown={handleMouseDown}
            style={{ cursor: "grab" }}
        >
            {
                cards.map((card, index) => (
                    <div
                        key={index}
                        className={isActive === index ? "card card-active" : "card"}
                        onClick={() => {
                            if (dragMovedRef.current) return;
                            isActive === index ? setIsActive(-1) : setIsActive(index);
                        }}
                    >
                        <img src={card.img_back} draggable="false" alt="card background" className="card-back" />
                        <img src={card.img_icon} draggable="false" alt="card icon" className="card-icon" />
                        <h4 className="card-title">{card.name}</h4>
                        <p className="card-text">{card.description}</p>
                    </div>
                ))
            }
        </div>
    );
}
export default type1;