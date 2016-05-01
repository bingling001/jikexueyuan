# 极客学院VIP视频解析 #
*如果觉得极客学院好用，请购买他们的VIP，如果觉得此代码好用，请给作者一个爱的抱抱，支付宝: tmk@li.cm*

## 目录结构 ##
```
│  config.php
│  favicon.ico
│  index.html
│  parse.php
│  README.md
│
├─css
│      semantic.min.css
│
└─js
        clipboard.min.js
        jquery.min.js
```
## 文件说明 ##
- index.html        //前端页面
- favicon.ico       //图标文件
- parse.php         //解析（关键）
- config.php        //配置（配置不当则无法解析VIP视频）
- semantic.min.css  //CSS框架
- jquery.min.js     //jQuery
- clipboard.min.js  //提供复制到剪贴板功能

## config.php配置方法（important）##
1. 首先你得有一个VIP账号，
2. 登陆极客学院官网
3. 找到你的Cookies(不知道怎么找就百度吧)
5. 找到Cookies里的uname和authcode（其他的通通不要），替换掉`config.php`中的相应变量
6. 退出账号，请不要再用此账号登陆极客学院，请不要再用此账号登陆极客学院，请不要再用此账号登陆极客学院，重要的事情说三遍，因为你重新登陆authcode会改变的，原来的authcode就不能用了
7. 若不小心重新登陆了，就更新下`config.php`吧
