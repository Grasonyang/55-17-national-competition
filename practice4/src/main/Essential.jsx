import './Essential.css';
import mp31 from '../assets/video/1.mp3';
import mp32 from '../assets/video/2.mp3';

import { useState } from 'react';

function Essential() {
    let [which, setWhich] = useState(0);
    let mp3 = [mp31, mp32]
    return (
        <>
            <section className="container scroll-target " id="info">
                <div className="child-container" >
                    <h1 className='title'>聯絡資訊</h1>
                    <div id="info-container">
                        <div className="info">
                            <h5 className='subtitle'>地址</h5>
                            <div className='content'>
                                <p>123 Main Street, Anytown, CA 91234</p>
                            </div>
                        </div>
                        <div className="info">
                            <h5 className='subtitle'>電話</h5>
                            <div className='content'>
                                <p>09xx-xxxxxx</p>
                            </div>
                        </div>
                        <div className="info">
                            <div className='subtitle'>
                                <button onClick={() => {
                                    setWhich(1 - which)
                                }}>切換播報</button>
                            </div>
                            <div className='content'>
                                <audio src={mp3[which]} controls></audio>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    )
}
export default Essential;


