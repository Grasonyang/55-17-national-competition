import './Info.css'
import mp31 from './audio/1.mp3'
import mp32 from './audio/1.mp3'

import { useRef } from 'react';
function Info() {
    let audioRef = useRef(null);
    return (
        <>
            <div className="container">
                <div className="box info-box" id="info">
                    <h3 className='title'>關鍵資訊</h3>
                    <div>
                        <ul className='info-list'>
                            <li className="info-item">
                                <p className="info-label">Phone:</p>
                                <p className="info-value">09-7777777777</p>
                            </li>
                            <li className="info-item">
                                <p className="info-label">Address:</p>
                                <p className="info-value">
                                    100 Roosevelt Rd Sec 4,
                                    Taipei 100,
                                    TWN
                                </p>
                            </li>
                        </ul>
                        <audio src={mp31} ref={audioRef}></audio>
                        <button className="info-audio-btn" onClick={() => { audioRef.current.play() }}>Click Me!!!</button>
                    </div>
                </div>
            </div>
        </>
    )
}
export default Info;