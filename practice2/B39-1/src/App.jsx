import React from 'react';
import Counter from './Counter.jsx';
function App() {
  let [counters, setCounters] = React.useState([]);
  React.useEffect(() => {
    console.log("App Component Rendered");
  })
  const addCounter = () => {
    setCounters([...counters, { id: Date.now(), count: 0 }]);
  }
  const handleCounterChange = React.useCallback((id, action) => {
    setCounters(counters =>
      counters.map(counter =>
        counter.id === id ? { ...counter, count: counter.count + action } : counter
      )
    );
    console.log(`處理 ID: ${id}, 動作: ${action}`);
  }, []);
  return (
    <>
      <button onClick={addCounter}>AddCounter</button>
      {counters.map(counter => (
        <Counter
          key={counter.id}
          id={counter.id}
          count={counter.count}
          onCountValueChange={handleCounterChange}
        />
      ))}
    </>
  )
}
export default App;