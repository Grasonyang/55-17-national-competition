import './Video.css';
import video from '../assets/video/1.mp4';
import { useRef, useEffect } from 'react';

function Video() {
    let videoRef = useRef(null)
    useEffect(() => {
        let target = videoRef.current;
        const intersectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.intersectionRatio >= 0.5) {
                    target.play();
                } else {
                    target.pause();
                }
            });
            console.log("Loaded new items");
        }, {
            threshold: [0, 0.5, 1]
        });
        intersectionObserver.observe(target);
        return () => {
            intersectionObserver.unobserve(target);
            intersectionObserver.disconnect();
        };
    })
    return (
        <>
            <div className="container scroll-target" id="video">
                <div className="child-container">
                    <h3 className='title'>影片展示</h3>
                    <video ref={videoRef} src={video} controls muted></video>
                </div>
            </div>
        </>
    )
}
export default Video;


