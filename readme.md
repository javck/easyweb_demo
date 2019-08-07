<p align="center">EasyWeb示範網站</p>

## 關於EasyWeb

Easyweb是根據Laravel的Voyager套件加以優化而設計出的網頁系統整合工具，能夠輕鬆地從後台修改前台頁面的圖片和文字，並支持綠界金流與簡訊王的串接功能。


## 路由(Route)

/ 根目錄首頁為示範頁，可登入到後台，管理員帳密為admin/123456

## 控制器(Controller)

/app/Http/Controllers/SiteController.php 負責處理前台網頁的請求

## 視圖(View)

/resources/views/layouts/site.blade.php 作為整個前台網頁的父視圖，所有視圖都繼承它
/resources/views/demo.blade.php 示範網頁的視圖檔

## 資料庫模型(Model)

所有的圖文資料都是存在資料庫的elements表格中，對應的模型為App/Element


## 版本歷史

V1.0 示範如何從資料庫取得圖文並呈現於前台
V1.1 示範如何從資料庫取得文章並呈現於前台(進行中...)

##安裝

Step 1.將CANVAS版型檔案解壓縮至public資料夾
Step 2.確保有成功安裝npm，並執行npm run dev來壓縮js和css檔，生成all.js和all.css
