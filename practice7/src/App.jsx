import "./App.css"

import Header from "./Header"
import Map from "./main/Map"
import Event from "./main/Event"

function App() {
  
  return (
    <>
      <Header></Header>
      <main role="main">
        <Map></Map>
        <Event></Event>
      </main>
    </>
  )
}

export default App
