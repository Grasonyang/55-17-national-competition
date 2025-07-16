import "./Tab.css"
import img1 from "./image/1.jpg"
import img2 from "./image/4.avif"
import img3 from "./image/29294533_l.jpg"
import{useState, useRef, useEffect} from "react";
function Tab(){
    let cards = [
        {
            title:"資訊1",
            description:"這是資訊1的描述。",
            img:[img1, img2],
        },
        {
            title:"資訊2",
            description:"這是資訊2的描述。",
            img:[img1, img2],
        },
        {
            title:"資訊3",
            description:"這是資訊3的描述。",
            img:[img1, img2],
        },
        {
            title:"資訊4",
            description:"這是資訊4的描述。",
            img:[img1, img2],
        },
        {
            title:"資訊5",
            description:"這是資訊5的描述。",
            img:[img1, img2],
        },
        {
            title:"資訊6",
            description:"這是資訊6的描述。",
            img:[img1, img2],
        },
    ]
    let cardRef = useRef([])
    let calculateMid = ()=>{
        cardRef.current.every((card,index)=>{
            let style = {
                x: card.offsetLeft + card.offsetWidth / 2,
                y: card.offsetTop + card.offsetHeight / 2,
            }
            card.style.setProperty("--x", `${style.x}px`)
            card.style.setProperty("--y", `${style.y}px`)
        })
    }
    let [isActive, setActive] = useState(-1);
    useEffect(()=>{
        calculateMid();
    })
    let Click = (index)=>{
        if(index==isActive){
            setActive(-1)
        }else{
            calculateMid();
            setActive(index)
        }
    }
    return (
        <>
            <div className="container">
                <div className="box">
                    <div className="left">
                        <div className="title">
                            <h3>資訊展示</h3>
                            <p></p>
                        </div>
                        <div className="btn-grp">
                            {
                                cards.map((card, index)=>{
                                    return (
                                        <button
                                            key={index}
                                            tabIndex={0}
                                        >{card.title}</button>
                                    )
                                })
                            }
                        </div>
                    </div>
                    <div className="right">
                        {
                            cards.map((card, index)=>{
                                return (
                                    <div
                                        key = {index}
                                        className="card"
                                        tabIndex={0}
                                        ref={el=>cardRefc.current[index] = el}
                                    >
                                        <picture>
                                            <img src={card.img[0]} alt="" />
                                            <source media="(min-width: )" srcSet={card.img[1]} sizes="" />
                                        </picture>
                                        <div className="card-body">
                                            <h4 className="card-title">{card.title}</h4>
                                            <p className="card-text">{card.description}</p>
                                        </div>
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
export default Tab;