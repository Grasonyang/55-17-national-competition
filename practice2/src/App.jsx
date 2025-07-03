import './App.css'
import Header from './components/Header.jsx'
import CallAction from './components/main/CallAction.jsx'
import Map from './components/main/map.jsx'
import Video from './components/main/Video.jsx'
import Info from './components/main/Info.jsx'
import Events from './components/main/Events.jsx'
import Contact from './components/main/Contact.jsx'


function App() {
  return (
    <>
      <Header></Header>
      <main>
        <CallAction></CallAction>
        <Map></Map>
        <Video id="video"></Video>
        <Info></Info>
        <Events></Events>
        <Contact></Contact>
      </main>
    </>
  )
}
export default App;