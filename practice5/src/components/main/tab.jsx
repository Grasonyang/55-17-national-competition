import "./tab.css"
import { useState } from "react"

function Tab() {
    const [activeTab, setActiveTab] = useState(0);

    const tabs = [
        {
            title: "關於我們",
            content: "歡迎來到里昂！我們是一個致力於推廣里昂文化與旅遊的專業團隊。透過我們的服務，讓您深度體驗這座古老城市的魅力，從歷史建築到現代文化，從傳統美食到創新藝術。"
        },
        {
            title: "故事 (一)",
            content: "里昂的絲綢之路：在文藝復興時期，里昂成為歐洲絲綢貿易的中心。工匠們在這裡創造出精美的絲織品，至今仍能在老城區的工作坊中感受到那份傳統工藝的魅力。"
        },
        {
            title: "故事 (二)",
            content: "美食之都的誕生：里昂被譽為法國的美食首都，這裡誕生了許多傳奇主廚。從傳統的里昂小酒館到米其林星級餐廳，每一道菜都承載著深厚的歷史文化底蘊。"
        },
        {
            title: "故事 (三)",
            content: "燈光節的奇蹟：每年12月的里昂燈光節吸引著全世界的遊客。這個傳統始於1852年，如今已成為世界上最壯觀的燈光藝術盛會，將整座城市變成一個巨大的藝術畫布。"
        }
    ];
    return (
        <div className="tab-container">
            <div className="tab-wrapper">
                {/* Tab 導航 */}
                <div className="tab-nav">
                    <ul className="tab-list">
                        {tabs.map((tab, index) => (
                            <li
                                key={index}
                                className={`tab-item ${activeTab === index ? 'active' : ''}`}
                                onClick={() => setActiveTab(index)}
                                role="tab"
                                aria-selected={activeTab === index}
                                tabIndex={0}
                                onKeyDown={(e) => {
                                    if (e.key === 'Enter' || e.key === ' ') {
                                        setActiveTab(index);
                                    }
                                }}
                            >
                                <span className="tab-title">{tab.title}</span>
                            </li>
                        ))}
                    </ul>
                </div>

                {/* Tab 內容 */}
                <div className="tab-content">
                    <div
                        className="tab-panel active"
                        role="tabpanel"
                        aria-labelledby={`tab-${activeTab}`}
                    >
                        <div className="content-wrapper">
                            <h3>{tabs[activeTab].title}</h3>
                            <p>{tabs[activeTab].content}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Tab;