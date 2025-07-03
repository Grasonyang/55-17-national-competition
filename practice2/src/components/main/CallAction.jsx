import './CallAction.css'
import image_screen from './image/screen.jpg'
import image_screen_1 from './image/screen1.jpg'

function CallAction() {
    return (
        <>
            <section className="" id="ca-img-container">
                <img src={image_screen_1} alt="call-to-action image" id="ca-img" />
                <a href="#map" id="ca-action-button" className='sans ls-20 d-select'>查看各大景點</a>
            </section>
        </>
    )
}
export default CallAction;