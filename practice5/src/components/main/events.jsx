
import "./events.css"
import img_1 from "./image/1.jpg"
import img_2 from "./image/2.jpeg"
import img_3 from "./image/3.jpg"
import { useState, useRef, use } from "react"
import { useEffect } from "react";
function Events() {
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
        }, {
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
        }, {
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
        }, {
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
        }, {
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
        }, {
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
        }, {
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
        }, {
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
        }, {
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
        }, {
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
    let contaierRef = useRef(null);
    let startX = useRef({
        left: 0,
        click: false
    });
    let isdrag = useRef(false);
    useEffect(() => {
        let handleMouseMove = (e) => {

            if (!startX.current.click)
                return;

            if (Math.abs(e.pageX - startX.current.left) >= 5) {
                isdrag.current = true;
            }

            if (!isdrag.current) return;
            console.log(startX.current)
            let offsetX = e.pageX - startX.current.left;
            contaierRef.current.scrollLeft -= offsetX;
            startX.current.left = e.pageX;
        }
        let handleMouseUp = () => {
            isdrag.current = false;
            startX.current.click = false;
        }
        window.addEventListener("mousemove", handleMouseMove);
        window.addEventListener("mouseup", handleMouseUp);
        return () => {
            window.removeEventListener("mousemove", handleMouseMove);
            window.removeEventListener("mouseup", handleMouseUp);
        }
    })
    return (
        <div id="events-container" ref={contaierRef}
            onMouseDown={(e) => {
                startX.current.left = e.pageX;
                startX.current.click = true;
            }}
        >
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
                            <img src={card.img} draggable="false" alt="景點圖片" className="card-img" />
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
        </div>
    )
}
export default Events;