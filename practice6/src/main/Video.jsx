
import "./Video.css"
import video from "./video/2.mp4"
import { useEffect, useRef } from "react"
function Video() {
    let videoRef = useRef(null)
    useEffect(() => {
        let observe = new IntersectionObserver((entries) => {
            let entry = entries[0]
            if (entry.intersectionRatio >= 0.5) {
                videoRef.current.play()
            } else {
                videoRef.current.pause()
            }
        }, {
            threshold: [0, 0.5, 1]
        }
        )
        observe.observe(videoRef.current)
        console.log(document.visibilityState)
        document.visibilityState === "hidden" && videoRef.current.pause()
        return () => {
            observe.disconnect()
        }
    })
    return (
        <>
            <video ref={videoRef} src={video} muted></video>
        </>
    )
}
export default Video;