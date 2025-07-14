import './App.css';

import Header from './components/header/style1'
import Map from './components/main/map';
import Video from './components/main/video';
import Info from './components/main/Info';
import Events from './components/main/events';
import Contact from './components/footer/contact';
import Tab from './components/main/tab';
function App() {
  return (
    <>
      <Header></Header>
      <main role='main'>
        <Map></Map>
        <Video></Video>
        <Info></Info>
        <Events></Events>
        <Tab></Tab>
      </main>
      <footer>
        <Contact></Contact>
      </footer>
    </>
  );
}

export default App;
