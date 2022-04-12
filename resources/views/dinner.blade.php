<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <title>献立一覧</title>
</head>
<body class="container" style="background-color:#F1EFE8" >
        <div class="header">
            <div class="title-area">
                
                <a href="">create dinner menu</a>
                <img src="/image/icon1.png" class="icon1" alt="">
                
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="" value="ログアウト">
                    <a href="">logout</a>
                </form>         
            </div>

            <div class="images">
                <img src="/image/dinner.png" alt="">
            </div>  
        </div>
        <div class="main">

            <img src="/image/icon2.png" class="icon2" alt="">

            <div class="list-top">
                <button type="button" class="btn btn-lg rounded-pill" onclick="location.href=''">グループ一覧</button>
                <button type="button" class="btn btn-lg rounded-pill" onclick="location.href=''">献立作成</button>
            </div>

            <div class="list-title">--------   献立一覧   --------</div>

            <div class="list-box">
                <div class="list-area">
                    <p class="text">
                        main-------ハンバーグ</br>
                        side-------サラダ</br>
                        soup-------コンソメスープ           
                    </p>
                </div>
                <div class="list-area">
                    <p class="text">
                        main-------ハンバーグ</br>
                        side-------サラダ</br>
                        soup-------コンソメスープ           
                    </p>
                </div>
            </div>
        </div>
        <div class="footer"></div>
</body>
</html>