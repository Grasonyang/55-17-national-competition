import { useState } from 'react'
import Counter from './Counter';
import "./App.css"
function App() {
  let [counters, setCounters] = useState([]);
  let addCounter = () => {
    setCounters([...counters, { id: counters.length + 1, value: 0 }]);
  }
  return (
    <>
      <button className="btn btn-success position-fixed" onClick={addCounter}>Add a Counter</button>
      <div className='container p-5 d-flex flex-wrap align-items-center'>
        {
          counters.map((counter) => (
            <Counter key={counter.id} number={counter.value} />
          ))
        }
      </div>
    </>
  )
}

export default App
