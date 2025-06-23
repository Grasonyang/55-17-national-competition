import { useState } from "react";

function Map() {
    let sites = [
        {
            id: 1,
            name: "景點一",
            description: "景點一的描述",
            img: "src/assets/image/1.jpg",
            alt: "景點一的圖片",
            position: {
                top: "70%",
                left: "80%"
            }
        }, {
            id: 2,
            name: "景點二",
            description: "景點二的描述",
            img: "src/assets/image/2.jpg",
            alt: "景點二的圖片",
            position: {
                top: "50%",
                left: "40%"
            }
        }, {
            id: 3,
            name: "景點三",
            description: "景點三的描述",
            img: "src/assets/image/A.png",
            alt: "景點三的圖片",
            position: {
                top: "10%",
                left: "90%"
            }
        },

    ]
    let [hoverid, setHoverId] = useState(0);
    let [cardclass, setCardclass] = useState("card col-5 p-0");
    let [pointclass, setPointclass] = useState("");
    let [linkclass, setLinkclass] = useState("");
    const hoverCard = (id) => {
        setHoverId(id);
    }
    const hoverPoint = () => {

    }
    const hoverLink = () => {

    }
    return (
        <>
            <div className="map_container mt-5">
                <h2>地圖景點</h2>
                <div className="row">
                    <div className="col-12 col-md-6">
                        <div className="row gap-3">
                            {
                                sites.map((site) => {
                                    return (
                                        <div className={cardclass} key={site.id}
                                            onMouseDown={
                                                () => {
                                                    hoverCard(site.id);
                                                }
                                            }
                                        >
                                            <img src={site.img} alt={site.alt} className="card-img-top" />
                                            <div className="card-body">
                                                <h4 className="card-title">{site.name}</h4>
                                                <p className="card-text">{site.description}</p>
                                            </div>
                                        </div>
                                    )
                                })
                            }
                            <div className="link_container card col-5 d-flex flex-column justify-content-center">
                                <h3>景點連結</h3>
                                {
                                    sites.map((site) => {
                                        return (
                                            <a href="" className="link-primary" key={site.id}>
                                                {site.name}
                                            </a>
                                        )
                                    })
                                }
                            </div>
                        </div>
                    </div>
                    <div className="col-12 col-md-6">right</div>
                </div>
            </div>
        </>
    )
}
export default Map;