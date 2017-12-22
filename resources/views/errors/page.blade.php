<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Error Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="SuggeElson" />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="application-name" content="sprFlat admin template" />
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/plugins.css" rel="stylesheet" />
    <link href="/assets/css/main.css" rel="stylesheet" />
    <link href="/assets/css/custom.css" rel="stylesheet" />
</head>
<body class="error-page">
<div class="container animated fadeInDown">
    <h1 class="error-number">{{$code}}</h1>
    <h1 class="text-center mb25">请求页面失败...</h1>
    <p class="text-center s24">错误信息：{{$message}}</p>
    <div class="text-center mt25">
        <div class="btn-group">
            <a href="javascript: history.go(-1)" class="btn btn-default btn-lg"><i class="en-arrow-left8"></i>  Go back</a>
            <a href="/login" class="btn btn-default btn-lg"><i class="ec-locked"></i> Login</a>
            <a href="#" class="btn btn-default btn-lg"><i class="en-mail"></i> Contact admin</a>
        </div>
    </div>
</div>
</body>
</html>