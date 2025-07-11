import './Action.css'

function Action() {
    return (
        <>
            <section id="action" className="container" aria-labelledby='ac-title'>
                <h2 id="ac-title" tabIndex={0}><span>準備好展開</span><span>探索之旅了嗎？</span></h2>
                <p id="ac-txt" tabIndex={0}><span>立即預約導覽行程</span><span>深入了解里昂的古蹟故事。</span></p>
                <button type='button' id="ac-btn" aria-label="探索按鈕">開始探索</button>
            </section>
        </>
    )
}
export default Action;