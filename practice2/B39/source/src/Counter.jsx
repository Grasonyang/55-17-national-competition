import { useState } from "react";

function Counter({ number }) {
    console.log(number)
    let [value, setValue] = useState(number);
    let increase = () => {
        setValue(value + 1);
    }
    let decrease = () => {
        setValue(value - 1);
    }

    return (
        <>
            <div className="d-flex flex-column align-items-center m-3 p-3 border border-rounded border-primary">
                <h3>{value}</h3>
                <div>
                    <button className="btn btn-primary" onClick={decrease}>Decrease</button>
                    <button className="btn btn-danger" onClick={increase}>Increase</button>
                </div>
            </div>
        </>
    )
}
export default Counter;