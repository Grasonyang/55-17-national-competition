import './Card1.css'

function Card1({
    title,
    description,
    imgs,
    isHover = false,
    onMouseEnter,
    onMouseLeave,
    children = undefined,
}) {
    if (children != undefined) {
        return (
            <>
                <div className="cardex">
                    {children}
                </div>
            </>
        )
    } else {
        return (
            <>
                <div className={isHover ? 'card1 card1_hover' : 'card1'}
                    tabIndex={0}
                    onMouseEnter={onMouseEnter}
                    onMouseLeave={onMouseLeave}>
                    <picture className="card-img">
                        <source media="(min-width: 760px)" srcSet={imgs[1]} />
                        <img src={imgs[0]} alt={title} />
                    </picture>
                    <div className="card-body">
                        <h4 className="card-title">{title}</h4>
                        <p className="card-txt">{description}</p>
                    </div>
                </div>
            </>
        )
    }

}
export default Card1;