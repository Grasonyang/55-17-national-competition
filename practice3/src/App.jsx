import Header from './header'
import Call from './component/Call'
import Map from './component/Map'
import Footer from './Footer'

import './App.css'

function App() {
  return (
    <>
      <Header></Header>
      <main role='main'>
        <Call></Call>
        <Map></Map>
      </main>
      <Footer></Footer>
    </>
  )
}

export default App;