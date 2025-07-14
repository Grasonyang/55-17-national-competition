
import "./video.css"
import { useState, useRef, useEffect } from "react"
import video from "./video/1.mp4"
function Video() {
    let videoRef = useRef(null);
    useEffect(() => {
        let observe = new IntersectionObserver(
            (entries) => {
                let entry = entries[0];
                if (entry.intersectionRatio > 0.5) {
                    videoRef.current.play();
                } else {
                    videoRef.current.pause();
                }
            }, {
            threshold: [0, 0.5, 1]
        }
        )
        observe.observe(videoRef.current);
        return () => {
            observe.disconnect();
        }
    })
    return (
        <>
            <div id="video-container" >
                <video ref={videoRef} src={video} muted style={{
                    width: "100%",
                    height: "auto"
                }}>

                </video>
            </div>
        </>
    )
}
export default Video;