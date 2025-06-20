import "./Map.css"
import map from '../assets/image/map.png';
import attractions1 from '../assets/image/attractions1.jpg';
import attractions2 from '../assets/image/attractions2.jpg';
import attractions3 from '../assets/image/attractions3.jpg';
import attractions4 from '../assets/image/attractions4.jpg';
function Map() {
    return (
        <>
            <h2 className="fw-bold text-center mt-5" id="map">地圖景點</h2>
            <div className="row p-1">
                <div className="col-md-12 col-lg-6">
                    <div className="row gap-3">
                        <div className="col-12 col-md-5 card">
                            <img src={attractions1} alt="" className="card-img-top" />
                            <div className="card-body">
                                <h5 className="card-title">Card title</h5>
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" className="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div className="col-12 col-md-5 card">
                            <img src={attractions2} alt="" className="card-img-top" />
                            <div className="card-body">
                                <h5 className="card-title">Card title</h5>
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" className="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div className="col-12 col-md-5 card">
                            <img src={attractions3} alt="" className="card-img-top" />
                            <div className="card-body">
                                <h5 className="card-title">Card title</h5>
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" className="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div className="col-12 col-md-5 card">
                            <img src={attractions4} alt="" className="card-img-top" />
                            <div className="card-body">
                                <h5 className="card-title">Card title</h5>
                                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" className="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="col-md-12 col-lg-6 map-box">
                    <img src={map} alt="map image" />
                </div>
            </div>
        </>
    )
}
export default Map;