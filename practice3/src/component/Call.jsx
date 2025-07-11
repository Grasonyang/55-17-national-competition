import "./Call.css";
import banner_img from "../assets/image/4.avif"
function Call() {
    return (
        <>
            <section id="ca" role="banner" >
                <div>
                    <a href="#map" id="action" role="button">Find <br />Something?</a>
                    <img src={banner_img} alt="banner image" id="banner_img" />
                </div>
            </section>

        </>
    )
}
export default Call;