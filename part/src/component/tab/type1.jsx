import "./type1.css"

import { useState } from "react";

function type1() {
    let radios = [
        {
            "name": "關於/我們",
        },
        {
            "name": "聯絡/我們",
        },
        {
            "name": "故事/(一)",
        },
        {
            "name": "故事/(二)",
        },
        {
            "name": "故事/(三)",
        },
    ]
    let [which, setWhich] = useState(0);
    return (
        <div className="tab" id="main_tab_container">
            {
                radios.map((radio, index) => {
                    return (
                        <>
                            <input type="radio"
                                name="main_tab"
                                className="main_tab"
                                id={`main_tab_${index}`}
                                checked={which === index}
                                onChange={() => setWhich(index)}
                            />
                            <label htmlFor={`main_tab_${index}`} className={index == which ? "main_tab_label active" : "main_tab_label"} >
                                {
                                    radio.name.split('/')[0]
                                }
                                <br />
                                {
                                    radio.name.split('/')[1]
                                }
                            </label>
                        </>
                    )
                })
            }
            {/* <svg>
                <defs>
                    <filter id="drip">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="5" />
                        <feColorMatrix

                            type="matrix"
                            values="1 0 0 0 0
                                0 1 0 0 0
                                0 0 1 0 0
                                0 0 0 45 -15" />
                    </filter>
                </defs>
            </svg> */}
        </div>
    )
}
export default type1;