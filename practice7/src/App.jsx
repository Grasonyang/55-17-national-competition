import "./App.css"

import Header from "./Header"
import Map from "./main/Map"
import Event from "./main/Event"
import Tab from "./main/Tab"

function App() {
  
  return (
    <>
      <Header></Header>
      <main role="main">
        <Map></Map>
        <Event></Event>
        <Tab></Tab>
      </main>
    </>
  )
}

export default App
