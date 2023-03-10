
<body>
<p><a href="index.htm">back to main page</a>&#128512;&#128151;&#128525;</p>
</body>
<?php
	
 error_reporting (0); 
    $url = 'https://scratch.mit.edu/projects/803705446/';
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    $id = $matches[0];
    $width = '700px';
    $height = '600px';
    

$name=array('1.I got another C','2.I am the next Picasso','3.Happy dagger, this is tye sheath');
$count=0;
while($count<count($name))
{ echo "<li>The three chapters include:$name[$count]</li>";
$count++;
}
   
?>
<!DOCTYPE html>
<html>
<head>

	<title>Love Story Role play</title>
</head>
<body>

<iframe id="scrtach" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
    src="https://scratch.mit.edu/projects/803705446/embed<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
    frameborder="0" allowfullscreen></iframe> 

  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="AI Chat Bot">
    <meta name="author" content="JoeLiu @ Taiwan">

    <title>Joe's AI Chat Bot</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="WebAIstyle.css">
  </head>
  <body>
  <section>

  
        <button id="microphone"><i class="fa fa-microphone"></i></button>
    <h1>
          <p>This chapter:I got another C: <em class="output-you">Example:"I got another C.I am so.....(happy, sad,....)"</em></p>
          <p>AI Bot: <em class="output-bot">請按下麥克風圖示待顯示紅色後說出您的問題，顯示白色時表示AI正在查詢，AI 語言模型可能偶爾會產生不正確的信息或有偏見的內容</em></p>
      
    </h1> 
  </section>  
    <script src="Speechtw.js"></script>

  </body>
</html>
