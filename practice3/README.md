| Role 類型    | 常用值                                                            | 說明          |
| ----------- | -------------------------------------------------------------- | ----------- |
| Landmark    | `banner`, `navigation`, `main`, `contentinfo`, `complementary` | 幫助快速跳轉主區塊   |
| Widget      | `button`, `checkbox`, `tab`, `slider`, `dialog`, `textbox`     | 模擬互動元件的語意   |
| Document    | `article`, `heading`, `list`, `table`                          | 指出結構性內容類型   |
| Live Region | `alert`, `status`, `log`, `timer`                              | 實時更新資訊的通知區塊 |

| 屬性名稱            | 功能說明                 | 常見值                        |
| --------------- | -------------------- | -------------------------- |
| `aria-checked`  | checkbox 是否被勾選       | `true` / `false` / `mixed` |
| `aria-expanded` | 子項目是否展開（如下拉選單）       | `true` / `false`           |
| `aria-hidden`   | 隱藏元素（對輔助技術）          | `true` / `false`           |
| `aria-disabled` | 是否為禁用狀態              | `true` / `false`           |
| `aria-selected` | 是否被選取（例如 tab）        | `true` / `false`           |
| `aria-pressed`  | button 是否為開啟（toggle） | `true` / `false` / `mixed` |

| 屬性名稱                    | 功能說明                          |
| ----------------------- | ----------------------------- |
| `aria-labelledby`       | 指定哪個元素為此元素的標題（用ID）            |
| `aria-describedby`      | 指定描述此元素的說明（用ID）               |
| `aria-controls`         | 表示此元件控制哪個元素（如 tabs 控制 panels） |
| `aria-owns`             | 定義一個擁有關係（不代表實體DOM結構）          |
| `aria-activedescendant` | 指定目前被選中的子項目ID                 |


