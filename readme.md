### mode-e

#### practice
- practice1 (2025/06/23-2025/06/25)
- practice2 (2025/06/27)
    - 考3小時，未完成 70%
    - 9小時，未完成 user route
        - product manage 不熟
    


#### 題目
- 身分
    - 管理員(admin)
    - 公司管理員(company_admin)
    - 無身分(none)
    - token設計
        {type}_{hash sha256 token(user_id)}

- 公司資訊

- 產品資訊

- 管理頁面
    - 使用者管理頁面
        - 頁面訪問
            - token 驗證
                - admin
            - 內容
                - admin
                    - 查詢
                    - 新增
                    - 修改
                    - 刪除
                    - 停用

    - 公司管理頁面
        - 頁面訪問
            - token 驗證
                - admin、company_admin
            - 內容
                - admin
                    - 查詢(列出特定條件下的所有公司)
                    - 新增
                    - 修改
                    - 刪除
                    - 停用
                    


    - 產品管理頁面
        - 頁面訪問
            - token 驗證
                - admin、company_admin
            - 內容
                - admin
                    - 查詢(列出所有產品)
                    - 新增
                    - 修改
                    - 刪除
                    - 隱藏產品
                - company_admin
                    - 查詢(列出公司擁有產品)
                    - 新稱
                    - 修改
                    - 軟刪除
                    - 隱藏產品
    
    - 隱藏產品管理頁面
        - 頁面訪問
            - token 驗證
                - admin、company_admin
             - 內容
                - admin
                    - 取消隱藏
                - company_admin
                    - 取消隱藏


- 公開頁面
    - 公開 GTIN 批量驗證頁面 
    - 公開產品頁面
    - 登入、註冊頁面

- 問題
    - 題目展示公司、產品是說一次全部列出，還是針對單個公司的所有產品

 