<!--ナビゲーションのページ-->

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 style=margin: 0 10px; @if(isset($fixed) && $fixed) fixed-top @endif">
<!-- navbar：Bootstrapのナビゲーションの基本class / navbar-expand-lg：画面幅がlargeの場合、メニュー項目表示 / navbar-light：ライト(明るい)に変更 / bg-light：背景色 / mb-4：ナビゲーション下のマージン / @if(isset($fixed) && $fixed) fixed-top @endif：ナビゲーション固定-->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <a class="navbar-brand" style="display: block; text-align: center;">
            <span style="font-size: 24px; font-weight: bold; color: black;">&emsp;酒は百薬の長</span>
            <small class="text-muted" style="font-size: 12px; display: block;">商品管理システム</small>
            </a>

        <div class="collapse navbar-collapse  justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">ホーム</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/search">商品一覧</a>
                </li>
                @can('isAdmin')<!--0が一般ユーザー、1が管理者-->
                <li class="nav-item">
                    <a class="nav-link" href="/user">ユーザー管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/item">商品管理</a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">ログアウト</a>
                </li>
            </ul>
        </div>
    </nav> 