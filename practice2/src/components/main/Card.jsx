import './Card.css'
import map from './image/map.png'
function Card({ title, image, text, onMouseEnter, onMouseLeave, children, isHover }) {
    return (
        <>
            <div
                className={isHover ? "card-container card-hover" : "card-container"}
                onMouseEnter={onMouseEnter}
                onMouseLeave={onMouseLeave}
            >
                {
                    image !== undefined ? <img src={image} alt="card image" className='card-img' /> : null
                }
                <div className="card-body">
                    <h4 className="card-title ls-10">{title}</h4>
                    {
                        image !== undefined ? (
                            <>
                                <p className="card-text ls-5">{text}</p>
                            </>
                        ) : (
                            children
                        )
                    }

                </div>
            </div>
        </>
    )
}
export default Card;