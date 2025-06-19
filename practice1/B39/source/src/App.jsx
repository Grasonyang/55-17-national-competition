import { useState } from "react"
import Counter from "./Counter";
function App() {
  let [counters, setCounters] = useState([]);
  let addCounters = ()=>{
    return setCounters([...counters, {id: Date.now(), count: 0}])
  }
  return (
    <div className="d-flex flex-column align-items-center p-5">
      <button onClick={addCounters}>Add a counter</button>
      <div className="d-flex flex-wrap">
        {
          counters.map((counter) => {
            return <Counter key={counter.id} counter={counter} />
          })
        }
      </div>
    </div>
  )
}

export default App
