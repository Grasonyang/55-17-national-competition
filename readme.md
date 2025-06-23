### mode-e
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

- /home get
    - 


### AuthController
 
- /login get
    - 登入頁面
- /api/login post
    - 登入

- /user/new get
    - 使用者註冊頁面
- /api/user/new post
    - 使用者註冊

- /user/{rules} get
    - header admin token
    - 管理使用者頁面
- /api/user/{user_id} post
    - header admin token
    - 使用者修改
- /api/user/{user_id} delete
    - header admin token
    - 使用者刪除



- /products get
    - header admin or company_admin token
- /products/{gtin} get
    - header admin or company_admin token
    - 管理產品頁面
- /products/{gtin}/delete get、post
    - header admin or company_admin token
    - 產品刪除
        - admin 直接刪除
        - company_admin 軟刪除
- /products/{gtin}/update get、post
    - header admin or company_admin token
    - 管理修改
- /products/new get
    - header admin or company_admin token
    - 產品新增頁面
- /products/new post
    - header admin or company_admin token
    - 產品新增
