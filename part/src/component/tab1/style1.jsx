import "./style1.css"
import img1 from "./image/1.png"
import img2 from "./image/2.png"
import img3 from "./image/3.png"
import img4 from "./image/4.png"
import img5 from "./image/5.png"
import img6 from "./image/5.png"

import { useState, useRef, useEffect } from "react"

function style1() {
    let cards = [
        {
            title: "Card 1",
            description: "This is a description for card 1.",
            img: img1,
            className:"card card1"
        },
        {
            title: "Card 2",
            description: "This is a description for card 2.",
            img: img2,
            className:"card card2"
        },
        {
            title: "Card 3",
            description: "This is a description for card 3.",
            img: img3,
            className:"card card3"
        },
        {
            title: "Card 4",
            description: "This is a description for card 4.",
            img: img4,
            className:"card card4"
        },
        {
            title: "Card 5",
            description: "This is a description for card 5.",
            img: img5,
            className:"card card5"
        },
        {
            title: "Card 6",
            description: "This is a description for card 6.",
            img: img6,
            className:"card card6"
        },
    ];
    let [active, setActive] = useState(-1);
    // Create an array of refs for each card
    let cardRefs = useRef([]);

    // Function to calculate and set transform origin for each card
    const setTransformOrigin = () => {
        cardRefs.current.forEach((cardRef, index) => {
            if (cardRef) {
                
                // Calculate the center of the card relative to the container
                const centerX = cardRef.offsetLeft + cardRef.offsetWidth / 2;
                const centerY = cardRef.offsetTop + cardRef.offsetHeight / 2;
                console.log(centerX, centerY);
                // Set CSS custom properties for transform-origin
                cardRef.style.setProperty('--origin-x', `${centerX}px`);
                cardRef.style.setProperty('--origin-y', `${centerY}px`);
            }
        });
    };

    useEffect(() => {
        setTransformOrigin();
        const handleClickOutside = (event) => {
            if (
                cardRefs.current.forEach(element => element && !element.contains(event.target))
            ) {
                setActive(-1);
            }
        };
        let keyEvent = (e)=>{
            console.log(e.key, active)
            if(e.key==="ArrowLeft"){
                setActive(prev => (prev-1 + cards.length) % cards.length);
            }else if(e.key==="ArrowRight"){
                setActive(prev => (prev+1 ) % cards.length);
            }
        }
        document.addEventListener("mousedown", handleClickOutside);
        document.addEventListener("keydown",keyEvent)
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
            document.removeEventListener("keydown", keyEvent)
        };
    }, []);

    // Handle card click
    const handleCardClick = (index) => {
        setTransformOrigin(); // Recalculate before animation
        setActive(active === index ? -1 : index);
    };

    return (
        <>
            <div className="card-container" id="tab">
                {
                    cards.map((card, index) => {
                        return (
                            <div
                                tabIndex={0}
                                key={index}
                                className={active === index? `${card.className} active`: card.className}
                                ref={el => cardRefs.current[index] = el}
                                onClick={() => handleCardClick(index)}
                            >
                                <picture>
                                    <img src={card.img} alt="card img" />
                                </picture>
                                <div className="card-body">
                                    <h4>{card.title}</h4>
                                    <p>{card.description}</p>
                                </div>
                            </div>
                        );
                    })
                }
            </div>
        </>
    );
}
export default style1;
