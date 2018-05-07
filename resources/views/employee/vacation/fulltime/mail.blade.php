<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>HapoSoft</title>
   <link rel="shortcut icon" href="https://uphinhnhanh.com/images/2018/03/15/hapoERP.png" type="image/png" />
   <style type="text/css">
       body{margin: 0px;padding: 0px;font-family: Verdana;font-size: 13px;}
       .wrapper{width: 650px;margin: auto; border: 1px solid #DDDDDD; color:white; background-image: url('https://uphinhnhanh.com/images/2018/03/15/our_customers.jpg'); padding-left: 15px;}
       .header .left{ float: left; width: 280px; }
       .header .left p{ text-align: center; }
       .logo{ padding-top: 15px; margin-left: 150px; width: 200px; }
       .title{text-align: center; font-size: 30px;}
       .vacation{ padding-top: 30px; }
       .vacation p{ padding-left: 15px;}
       .sign{ width: 300px; padding-left: 350px; padding-top: 50px; padding-bottom: 50px;}
       .sign p{text-align: center;}   
   </style>
</head>
<body>
<div class="wrapper">
   <div class="header">
       <div class="left">
           <strong><p>Cộng hòa xã hội chủ nghĩa Việt Nam</p>
           <p>Độc lập - Tự do - Hạnh Phúc</p></strong>
       </div>
       <div class="right">
           <img src="https://uphinhnhanh.com/images/2018/03/15/hapoERP.png" class="logo">
       </div>
   </div>
   <div class="vacation">
       <p class="title">Đơn Xin Nghỉ</p>
       <p>Kính gửi anh: Trần Huy Chung</p>
       <p>Chức vụ: Giám đốc</p>
       <p>Tên tôi là: {{ $data['name'] }}</p>
       <p>Hôm nay tôi viết đơn này xin phép được nghỉ làm ngày <strong><u>{{ (new \Carbon\Carbon($data['date']))->format('d/m/Y') }}</u></strong></p>
       <p><u>Lý do:</u> <strong>{{ $data['reason'] }}</strong></p>
       <p>Vậy rất mong nhận được sự đồng ý của anh !</p>
   </div>
   <div class="sign">
       <p>Hà nội ngày: <?php echo date('d-m-Y : H:i:s') ?></p>
       <p>Ký tên:</p>
       <p>{{ $data['name'] }}</p>
   </div>
</div>
</body>
</html>