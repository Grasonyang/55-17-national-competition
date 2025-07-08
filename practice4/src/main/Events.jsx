import img_1 from '../assets/image/1.jpg'
import img_2 from '../assets/image/2.jpeg'
import img_3 from '../assets/image/4.jpg'
import './Event.css'
import Card1 from './Card1.jsx'

function Events() {
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
    return (
        <>
            < div className='container scroll-target' id="eventct">
                <div className="child-container">
                    <h1 className="title">最新活動</h1>
                    <div className="card-container" id="event">
                        {
                            points.map((point, index) => {
                                console.log(point);
                                return (
                                    <Card1 key={index}
                                        title={point.name}
                                        description={point.description}
                                        imgs={point.imgs}
                                        isHover={false}
                                    >
                                    </Card1>
                                )
                            })
                        }
                    </div>
                </div>
            </div >
        </>
    )
}
export default Events;