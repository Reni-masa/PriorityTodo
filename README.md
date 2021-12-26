# docker環境 setup
```
// コンテナ立ち上げ(3コンテナ(php,nginx,postgresql),1ボリューム)
$ docker-compose up -d --build

// composer.jsonに定義させているライブラリ群をインストール
$ docker-compose exec php composer install

```

# application setup
```
// DB接続設定 .envファイル
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=priority_todo
DB_USERNAME=admin
DB_PASSWORD=password!1
 
// APP_KYEの設定
$ php artisan key:generate
```

# 開発時コマンド
```
// コンテナ立ち上げ
$ docker-compose up -d --build

// コンテナ一括削除
$ docker-compose down

// コンテナ確認
$ docker ps -a

//ボリューム確認
$ docker volume ls

// コンテナに入る
$ docker-compose exec -it [コンテナ名] bash

// フロント変更監視・ビルド
[コンテナ内]$ npm run watch

```

# commitメッセージ統一ルール
```
$ git commit -m "[Prefix]: 〇〇のため、□□を追加"
```
- Prefix
  - feat: 新しい機能
  - fix: バグの修正
  - docs: ドキュメントのみの変更
  - style: 空白、フォーマット、セミコロン追加など
  - refactor: 仕様に影響がないコード改善(リファクタ)
  - perf: パフォーマンス向上関連
  - test: テスト関連
  - chore: ビルド、補助ツール、ライブラリ関連


# todo
- Vue.js
  - ~~コンポーネント細分化~~
  - ~~コンポーネントによるcssスコープの確認~~
  - async awaitで同期的にする
- Laravel
  - ~~バーリデーション 責務の分離?requestを利用して実現~~
  - テストコード調査 Feature Test
  - ~~testデータ作成・投下~~
  - factoryの使い方の確立

