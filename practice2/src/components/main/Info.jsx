import StarIcon from './StarIcon';
import { useState } from 'react';
import mp3_1 from './image/1.mp3';
import mp3_2 from './image/2.mp3';
import './Info.css'
function Info() {
    let [audio, setAudio] = useState(mp3_1);
    return (
        <>
            <div id="info"></div>
            <section id="info-container">
                <div className="content">
                    <div>
                        <StarIcon name="關鍵資訊" deep={false}></StarIcon>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td className='table-title'>聯絡地址</td>
                                <td className='table-content'>106 Fuxing S. Rd. Sec. 2, Daan, 10664, TWN.</td>
                            </tr>
                            <tr>
                                <td className='table-title'>電話號碼</td>
                                <td className='table-content'>09788888888</td>
                            </tr>
                            <tr>
                                <td className='table-title'>
                                    <button onClick={() => {
                                        setAudio(
                                            audio === mp3_1 ? mp3_2 : mp3_1
                                        )
                                    }}>轉換音頻</button>
                                </td>
                                <td className='table-content'>
                                    <div className="audio-container">
                                        <audio controls src={audio} id="audio">

                                        </audio>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section >
        </>
    )
}
export default Info;