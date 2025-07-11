import video from './image/2.mp4';
import './Video.css'
import StarIcon from './StarIcon';
import { useRef, useEffect } from 'react';
function Video() {
    let videoRef = useRef(null);
    useEffect(() => {
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.intersectionRatio > 0.5) {
                    entry.target.play();
                } else {
                    entry.target.pause();
                }
            });
        }, {
            threshold: [0, 0.5, 1]
        });
        let target = videoRef.current;
        if (target)
            observer.observe(target);
        return () => {
            if (target)
                observer.unobserve(target);
        }
    }, []);
    return (
        <>
            <div id="video"></div>
            <div id="video-container">
                <StarIcon name="影片介紹" deep={true}></StarIcon>
                <video ref={videoRef} src={video} controls muted></video>
            </div>
        </>
    )
}
export default Video;