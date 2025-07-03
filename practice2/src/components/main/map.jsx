import './Map.css'
import map from './image/map.png'
import Card from './Card';
import StarIcon from './StarIcon';
import { useState } from 'react';
function Map() {
    let cards = [
        {
            'title': '景點一',
            'img': map,
            'text': '這是景點一的介紹文字，這裡有很多有趣的事情可以做。',
            'position': {
                top: '50%',
                left: '50%',
            }
        },
        {
            'title': '景點二',
            'img': map,
            'text': '這是景點二的介紹文字，這裡有很多有趣的事情可以做。',
            'position': {
                top: '10%',
                left: '20%',
            }
        },
        {
            'title': '景點三',
            'img': map,
            'text': '這是景點三的介紹文字，這裡有很多有趣的事情可以做。',
            'position': {
                top: '90%',
                left: '10%',
            }
        },
    ]
    let [hoverIndex, setHoverIndex] = useState(-1);
    return (
        <>
            <div id="map"></div>
            <section id="map-container">

                <div className="content">
                    <div id="map-card-container">
                        {
                            cards.map((card, index) => {
                                return (
                                    <Card
                                        key={index}
                                        title={card.title}
                                        image={card.img}
                                        text={card.text}
                                        onMouseEnter={() => setHoverIndex(index)}
                                        onMouseLeave={() => setHoverIndex(-1)}
                                        isHover={hoverIndex === index}
                                    ></Card>
                                )
                            })
                        }
                        <Card title="各景點連結">
                            <ol>
                                {
                                    cards.map((card, index) => {
                                        return (
                                            <li key={index}
                                                onMouseEnter={() => setHoverIndex(index)}
                                                onMouseLeave={() => setHoverIndex(-1)}
                                            >
                                                <a href="" className={hoverIndex === index ? 'link hover_link ls-5' : 'link ls-5'}>{card.title}</a>
                                            </li>
                                        )
                                    })
                                }
                            </ol>
                        </Card>
                    </div>
                    <div id="map-img-container" >
                        <StarIcon name="地圖景點"></StarIcon>
                        <div id="map-img-points">
                            <img src={map} alt="map" className='map-img' />
                            {
                                cards.map((card, index) => {
                                    return (
                                        <div
                                            key={index}
                                            style={{
                                                top: card.position.top,
                                                left: card.position.left,
                                            }}
                                            onMouseEnter={() => { setHoverIndex(index); }}
                                            onMouseLeave={() => setHoverIndex(-1)}
                                            className={hoverIndex === index ? 'point hover_pointer' : 'point'}
                                        ></div>
                                    )
                                })
                            }
                        </div>
                    </div>
                </div>
            </section >
        </>
    )
}
export default Map;