import video from './image/2.mp4';
import './Video.css'
import StarIcon from './StarIcon';
function Video() {
    return (
        <>
            <div id="video"></div>
            <div id="video-container">
                <StarIcon name="影片介紹" deep={true}></StarIcon>
                <video src={video} controls></video>
            </div>
        </>
    )
}
export default Video;