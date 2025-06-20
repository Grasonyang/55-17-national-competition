import { useState } from 'react'
import Header from './components/Header'
import CallToAction from './components/CallToAction'
import Map from './components/Map'
import './App.css'
function App() {

  return (
    <>
      <Header />
      <main>
        <CallToAction />
        <div className="container">
          <Map />
        </div>

      </main>

    </>
  )
}

export default App
