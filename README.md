# Laravel 12 管理分類法、分類、標籤和階層式架構

引入 aliziodev 的 laravel-taxonomy 套件來擴增管理分類法、分類、標籤和階層式架構，巢狀支援特性適合階層式架構的查詢效能最佳化。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行安裝 Vite 和 Laravel 擴充套件引用的依賴項目。
```sh
$ npm install
```
- 執行正式環境版本化資源管道並編譯。
```sh
$ npm run build
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/` 來進行文章瀏覽。

----

## 畫面截圖
![](https://i.imgur.com/8dKOOAl.png)
> 文章依最新的發佈時間排序列出，如同為了向讀者提供最新內容而分享的文章或更新

![](https://i.imgur.com/3hzXBpf.png)
> 分類可以將文章歸類在一起，標籤將相關文章歸類為相同群組
