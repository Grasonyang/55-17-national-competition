import img1 from "./image/1.jpg"
import img2 from "./image/4.avif"
import img3 from "./image/29294533_l.jpg"
import { useState, useEffect, useRef } from "react"
import "./Events.css"
function Event() {
    let card = [
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
    let [cards, setCards] = useState([

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
    ])
    let containerRef = useRef(null)
    let [click, setClick] = useState(-1)
    let mouseDown = useRef(false);
    let isDrag = useRef(false);
    let startX = useRef(false);

    let handleMouseDown = (e) => {
        mouseDown.current = true;
        startX.current = e.pageX;
    }
    let handleMouseMove = (e) => {
        if (!mouseDown.current) return;
        if (Math.abs(e.pageX - startX.current) >= 5) {
            isDrag.current = true;
        }
        if (isDrag.current) {
            containerRef.current.scrollLeft -= e.pageX - startX.current;
            startX.current = e.pageX;
        }
        if (containerRef.current.scrollLeft + innerWidth >= containerRef.current.scrollWidth - 100) {
            setCards((prev) => [...prev, ...card])
        }
        console.log(containerRef.current.scrollLeft, containerRef.current.scrollLeft + innerWidth, containerRef.current.scrollWidth)
        // if()

    }
    let handleMouseLeave = (e) => {
        mouseDown.current = false;
        isDrag.current = false;
    }
    let handleMouseUp = (e) => {
        mouseDown.current = false;
        isDrag.current = false;
    }

    return (
        <>
            <div
                id="info"
                className="card-container"
                ref={containerRef}
                onMouseDown={handleMouseDown}
                onMouseMove={handleMouseMove}
                onMouseLeave={handleMouseLeave}
                onMouseUp={handleMouseUp}
            >
                {
                    cards.map((card, i) => {
                        return (
                            <div
                                key={i}
                                className={i === click ? "card active" : "card"}
                                tabIndex={0}
                                aria-label="景點圖片"
                                onClick={() => {
                                    i === click ? setClick(-1) : setClick(i)
                                }}
                            >
                                <picture className="card-img">
                                    <source media="(min-width: 760px)" srcSet={card.img[0]} />
                                    <img src={card.img[1]} draggable="false" alt={`${card.title}的圖片`} />
                                </picture>
                                <picture className="card-icon">
                                    <source media="(min-width: 760px)" srcSet={card.img[0]} />
                                    <img src={card.img[1]} draggable="false" alt={`${card.title}的圖片`} />
                                </picture>
                                <div className="card-body">
                                    <h4 className="card-title" tabIndex={0}>{card.title}</h4>
                                    <p className="card-text" tabIndex={0}>{card.description}</p>
                                </div>
                            </div>
                        )
                    })
                }
            </div>
        </>
    )
}
export default Event;