import { useState } from "react"
function Counter(props){
    let [counter, setCounter] = useState(props.count || 0);
    let increment = ()=>{
        setCounter(counter + 1);
    }
    let decrement = ()=>{
        setCounter(counter - 1);
    }
    return (
        <>
            <div>
                <h5>{counter}</h5>
                <div className="d-flex align-items-center">
                    <button className="btn btn-primary" onClick={decrement}>Decrease</button>
                    <button className="btn btn-danger" onClick={increment}>Increase</button>
                </div>
            </div>
        </>
    )
}
export default Counter;