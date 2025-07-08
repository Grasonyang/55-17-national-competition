import { useState } from 'react'
import img_1 from '../assets/image/1.jpg'
import img_2 from '../assets/image/2.jpeg'
import img_3 from '../assets/image/4.jpg'
import map from '../assets/image/map.png'



import './Map.css'
import Card1 from './Card1.jsx'

function Map() {
    let points = [
        {
            name: "景點1",
            description: "這是景點1的描述。這是景點1的描述。這是景點1的描述。",
            position: {
                top: "40%",
                left: "50%"
            },
            imgs: [img_1, img_2]
        },
        {
            name: "景點2",
            description: "這是景點2的描述。這是景點2的描述。這是景點2的描述。",
            position: {
                top: "30%",
                left: "60%"
            },
            imgs: [img_2, img_3]
        },
        {
            name: "景點3",
            description: "這是景點4的描述。這是景點4的描述。這是景點4的描述。",
            position: {
                top: "80%",
                left: "20%"
            },
            imgs: [img_3, img_1]
        },
    ]
    let [hoverIndex, setHoverIndex] = useState(-1);
    return (
        <>
            <section className="container scroll-target" id="mapct">
                <div className='child-container'>
                    <h3 className='title'>景點展示</h3>
                    <div id="map">
                        <div className='card1-container'>
                            {
                                points.map((point, index) => {
                                    console.log(point);
                                    return (
                                        <Card1 key={index}
                                            title={point.name}
                                            description={point.description}
                                            imgs={point.imgs}
                                            isHover={hoverIndex === index}
                                            onMouseEnter={() => setHoverIndex(index)}
                                            onMouseLeave={() => setHoverIndex(-1)}
                                        >
                                        </Card1>
                                    )
                                })
                            }
                            <Card1>
                                <h4 id="map-links">景點連結</h4>
                                <ul aria-labelledby='map-links'>
                                    {
                                        points.map((point, index) => {
                                            return (
                                                <li key={index}
                                                    className={hoverIndex === index ? 'hover_link' : ''}
                                                    onMouseEnter={() => setHoverIndex(index)}
                                                    onMouseLeave={() => setHoverIndex(-1)}
                                                >
                                                    <a href="">{point.name}</a>
                                                </li>
                                            )
                                        })
                                    }
                                </ul>
                            </Card1>
                        </div>
                        <div className='map-container'>
                            <div id="map-box">
                                <img src={map} tabIndex={0} alt="map" />
                                {
                                    points.map((point, index) => {
                                        return (
                                            <div key={index}
                                                tabIndex={0}
                                                className={hoverIndex === index ? 'point hover_point' : 'point'}
                                                style={{
                                                    top: point.position.top,
                                                    left: point.position.left,
                                                }}

                                                onMouseEnter={() => setHoverIndex(index)}
                                                onMouseLeave={() => setHoverIndex(-1)}
                                                aria-label={point.title} >
                                            </div>
                                        )
                                    })
                                }
                            </div>
                        </div>
                    </div>
                </div>
            </section >
        </>
    )
}

export default Map;
