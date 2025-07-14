
import './App.css'

import Header from "./Header"
import Map from "./main/Map"
import Video from "./main/Video"
import Events from "./main/Events"


function App() {

  return (
    <>
      <Header></Header>
      <main>
        <Map></Map>
        <Video></Video>
        <Events></Events>
      </main>
      <footer></footer>
    </>
  )
}

export default App
