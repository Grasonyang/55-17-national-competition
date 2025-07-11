import './Card.css'
function Card({ img, title, content, isHover, onMouseEnter, onMouseLeave }) {
    return (
        <div className={isHover ? "card card-hover" : "card"}
            onMouseEnter={onMouseEnter}
            onMouseLeave={onMouseLeave}
            role="card"
            aria-labelledby={title}
            tabIndex="0"
        >
            <img src={img} alt="" className="card-img" />
            <div className="card-body">
                <h3 className="card-title">{title}</h3>
                <p className="card-text">{content}</p>
            </div>
        </div>
    )
}
export default Card;