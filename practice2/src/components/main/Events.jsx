import StarIcon from './StarIcon';
import Card from './Card';
import map from './image/map.png'
import './Events.css';
function Event() {
    let cards = [
        {
            title: "美食市集嘉年華",
            description: "品嚐來自世界各地的美食攤位，享受現場音樂與街頭藝人表演。"
        },
        {
            title: "河畔露天電影夜",
            description: "在里昂河畔露天放映經典電影，免費入場，記得自備野餐墊！"
        },
        {
            title: "手作市集週末",
            description: "匯聚本地工藝職人，現場有陶藝、皮件、插畫等創意商品。"
        },
        {
            title: "夏日音樂祭",
            description: "整天的現場演唱會，邀請本地與國際藝人輪番登場。"
        },
        {
            title: "夜間導覽：歷史里昂",
            description: "由導遊帶領你夜探老城街道，揭開中世紀歷史故事。"
        },

    ];
    return (
        <>
            <div id="event"></div>
            <div id="evnet-container">
                <StarIcon name="最新活動" deep={true}></StarIcon>
                <div className="cards-container">
                    {
                        cards.map((card, index) => {
                            return (
                                <Card
                                    key={index}
                                    title={card.title}
                                    text={card.description}
                                    image={map}
                                ></Card>
                            )
                        })
                    }
                </div>
            </div>
        </>
    )
}
export default Event;