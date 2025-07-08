import './App.css';

import { useState } from 'react'

import Header from './Header.jsx'
import Action from './main/Action.jsx'
import Map from './main/Map.jsx'
import Video from './main/Video.jsx'
import Essential from './main/Essential.jsx'
import Events from './main/Events.jsx';
import Contact from './main/Contact.jsx';
function App() {
  return (
    <>
      <Header></Header>
      <main role='main' aria-label="主內容">
        <Action></Action>
        <Map></Map>
        <hr className='scroll-target' id="videohr" />
        <Video></Video>
        <hr className='scroll-target' id="essentialhr" />
        <Essential></Essential>
        <hr className='scroll-target' id="eventhr" />
        <Events></Events>
        <hr className='scroll-target' id="contacthr" />
        <Contact></Contact>
      </main >
    </>
  )
}
export default App;