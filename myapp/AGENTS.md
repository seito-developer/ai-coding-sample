# Overview

このアプリケーションは PHP, Laravel v12, PostgreSQL, Laravel Sail, HTML, CSS, JS で構成されるダッシュボードです。

# デザインガイド

## 配色

-   bgColor: #FFFFFF
-   baseColor: #3261AB
-   subColor: #007FB1
-   subColor: #D8E212

## Font

-   Base: Noto Sans Japanese
-   Accent: Montserrat

## Padding & Margin & Font Size

-   8 の倍数にしたがう。グルーピングするなら 8~24px, ジャンプ率を設けるなら 32~72px
-   基本のフォントサイズは PC, SP ともに 16px。見出しは 20, 24, 28, 32px、注釈など補足情報は 12px にするなど 4 の倍数で変化させる。

## その他

-   ボタンなど押せる要素は角丸 5px を適応させる
-   押せない要素は角丸 0px で統一
