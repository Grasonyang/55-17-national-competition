import "./style1.css"
import { useState } from "react";
function Style1() {
    let [clickIndex, setClickIndex] = useState(0)
    return (
        <>
            <div className="container">
                <div className="box">
                    <div className="left">
                        <div className="part1">
                            <button onClick={() => setClickIndex(1)}>1</button>
                            <button onClick={() => setClickIndex(2)}>2</button>
                            <button onClick={() => setClickIndex(3)}>3</button>
                            <button onClick={() => setClickIndex(4)}>4</button>
                            <button onClick={() => setClickIndex(5)}>5</button>
                            <button onClick={() => setClickIndex(6)}>6</button>
                        </div>
                    </div>
                    <div className="right">
                        <div
                            className={clickIndex === 1 ? "part part1 active" : "part part1"}
                            style={{
                                "--top": `${this.offsetY}px`,
                                "--left": `${this.offsetY}px`,
                            }}
                        >
                            <h1>1</h1>
                            <p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>
                        </div>
                        <div
                            className={clickIndex === 2 ? "part part2 active" : "part part2"}
                        >
                            <h1>2</h1>
                            <p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>

                        </div>
                        <div
                            className={clickIndex === 3 ? "part part3 active" : "part part3"}
                        >
                            <h1>3</h1>
                            <p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>

                        </div>
                        <div
                            className={clickIndex === 4 ? "part part4 active" : "part part4"}
                        >
                            <h1>4</h1>
                            <p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>

                        </div>
                        <div
                            style={{
                                backgroundColor: "black",
                            }}
                            className={clickIndex === 5 ? "special special1 active" : "special special1"}
                        >
                            <h1>5</h1>
                            <p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>

                        </div>
                        <div
                            style={{
                                backgroundColor: "black"
                            }}
                            className={clickIndex === 6 ? "special special2 active" : "special special2"}
                        >
                            <h1>6</h1>
                            <p>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>

                        </div>
                        {/* <div></div> */}
                    </div>
                </div>
            </div>
        </>
    )
}
export default Style1;