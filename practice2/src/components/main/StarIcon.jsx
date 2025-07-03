import './StarIcon.css'
function StarIcon({ name, deep }) {
    let color = deep ? 'rgb(0, 2, 122)' : 'rgb(0, 217, 255)';
    return (
        <>
            <div className='star-icon'>
                <svg width="50" height="50" viewBox="0 0 100 100">
                    <polygon points="50,0 55,45 100,50 55,55 50,100 45,55 0,50 45,45" fill={color} />
                </svg>
                <h3 className='sans ls-10' style={{ color: color }}>{name}</h3>
            </div >

        </>
    )
}
export default StarIcon;