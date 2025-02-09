
# Gemini API キーの取得方法

## 1. Google AI Studio にアクセス
[Google AI Studio](https://aistudio.google.com/) にアクセスし、Google アカウントでログイン。

## 2. API キーを取得
1. 「API キー」タブを開く。
2. 「新しい API キーを作成」をクリック。
3. API キーが発行されるので、コピーして `.env` に追加。

## 3. `.env` に API キーを追加
```env
GEMINI_API_KEY=your_api_key_here
```

---

# gs_exp_calendar セットアップ手順

---

## 1. リポジトリのクローン
```sh
git clone https://github.com/fukushimasurao/gs_exp_calendar.git
cd gs_exp_calendar
```

## 2. `.env` ファイルの作成
`.env` ファイルがない場合は、サンプルをコピーして作成:
```sh
cp .env.example .env
```

## 3. Laravel Sail のコンテナを起動
```sh
./vendor/bin/sail up -d
```

`Sail` コマンドが使えない場合はエイリアスを登録:
```sh
alias sail='bash vendor/bin/sail'
```

## 4. `.env` の設定確認
.envは別途渡します。

GEMINI_API_KEYもこの時設定してください。
```env
GEMINI_API_KEY=your_api_key_here
```

コンテナを再起動する場合:
```sh
sail down
sail up -d
```

## 5. 依存関係のインストール
```sh
sail composer install
```

## 6. アプリキーの生成
```sh
sail artisan key:generate
```

## 7. データベースのマイグレーション
```sh
sail artisan migrate
```

## 8. フロントエンドのセットアップ（必要な場合）
```sh
sail npm install
sail npm run dev
```

## 8. 動作確認
```sh
sail up -d
```
ブラウザで `http://localhost` にアクセス。

## 9. ※権限の問題が発生した場合
```sh
sudo chmod -R 777 storage bootstrap/cache
```


