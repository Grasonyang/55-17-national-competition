import img1 from "./image/1.jpg"
import img2 from "./image/4.avif"
import img3 from "./image/29294533_l.jpg"
import { useState,useRef, useEffect } from "react"
import "./Tab.css"
function Tab() {
    let cards = [
        {
            title:"景點1",
            description:"這是景點1的描述。",
            img:[img1,img2]
        },
        {
            title:"景點2",
            description:"這是景點2的描述。",
            img:[img2,img3]
        },
        {
            title:"景點3",
            description:"這是景點3的描述。",
            img:[img3,img1]
        },
        {
            title:"景點4",
            description:"這是景點4的描述。",
            img:[img1,img2]
        },
        {
            title:"景點5",
            description:"這是景點5的描述。",
            img:[img2,img3]
        },
        {
            title:"景點6",
            description:"這是景點6的描述。",
            img:[img3,img1]
        },
    ]
    let cardsRef = useRef([]);
    // let btnRef = useRef([]);
    
    let GetMid = ()=>{
        cardsRef.current.forEach((el,index)=>{
            if(el) {
                // 获取元素相对于其容器的位置
                const centerX = el.offsetLeft + el.offsetWidth/2;
                const centerY = el.offsetTop + el.offsetHeight/2;
                el.style.setProperty('--x', `${centerX}px`)
                el.style.setProperty('--y', `${centerY}px`)
                console.log(`Card ${index}: left=${el.offsetLeft}, width=${el.offsetWidth}, centerX=${centerX}, centerY=${centerY}`)
            }
        })
    }
    let [Activeindex,setIndex]= useState(-1);
    
    useEffect(()=>{
        GetMid()
        let listenkey = (e)=>{
            // if (e.key === "F7") {
            //     e.preventDefault();
            //     console.log("F7 key pressed - default caret Browse prevented.");
            //     return; // 阻止後續的方向鍵處理，如果F7本身沒有其他邏輯
            // }
            if(e.key=="ArrowLeft"){
                setIndex((prev)=>(prev-1+cards.length)%cards.length);
            }else if(e.key=="ArrowRight"){
                setIndex((prev)=>(prev+1+cards.length)%cards.length);
            }
        }
        let clickll = (e)=>{
            let have =false;
            cardsRef.current.forEach((el,index)=>{
                if(el.contains(e.target)){
                    have = true;
                    if(index=== Activeindex) {
                        setIndex(-1);
                    }else{
                        setIndex(index);
                    }

                    
                }
            })
            if(!have){
                setIndex(-1);
            }
            
        }
        document.addEventListener('mousedown', clickll);
        window.addEventListener('resize', GetMid); // 监听窗口大小变化
        window.addEventListener('keydown', listenkey); // 监听键盘事件
        return () => {
            document.removeEventListener('mousedown', clickll);
            window.removeEventListener('resize', GetMid); // 清除监听器
            window.removeEventListener('keydown', listenkey); // 清除键盘事件监听器
        }
    }, []) // 只在组件挂载时执行一次
    return (
        <>
            <div className="container" id="tab">
                <div className="box">
                    <div className="left">
                        <div className="title">
                            <h4>各景點展示</h4>
                        </div>
                        <div className="btn-container">
                            {
                                cards.map((card,index)=>{
                                    return(
                                        <button
                                            key={index}
                                            className={Activeindex===index?`active`:``}
                                            onClick={()=>{
                                                GetMid();
                                                setIndex(index);
                                            }}
                                        >{card.title}</button>
                                    )
                                })
                            }
                        </div>
                    </div>
                    <div className="right">
                        {
                            cards.map((card,index)=>{
                                return(
                                    <div
                                        ref={(el)=>{cardsRef.current[index]=el}}
                                        key={index}
                                        className={Activeindex===index?`card card${index+1} active`:`card card${index+1}`}
                                    >
                                        <picture>
                                            <source media="(min-width:760px)" srcSet={card.img[1]} sizes="" />
                                            <img src={card.img[0]} alt="" />
                                        </picture>
                                        <div className="card-body">
                                            <h4>{card.title}</h4>
                                            <p>{card.description}</p>
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