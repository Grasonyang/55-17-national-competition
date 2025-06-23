import React from 'react';
function Counter({ id, count, onCountValueChange }) {
    React.useEffect(() => {
        console.log("Counter Component Rendered");
    })
    return (
        <>
            <h5>{count}</h5>
            <button onClick={() => { onCountValueChange(id, 1) }}>Increase</button>
            <button onClick={() => { onCountValueChange(id, -1) }}>Decrease</button >
        </>
    )
}
export default Counter;