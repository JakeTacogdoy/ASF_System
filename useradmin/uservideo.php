<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
        <!--uservideo-->
*{
  margin: 0; padding: 0;
  box-sizing: border-box;
  text-transform: capitalize;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: normal;
}

body{
   background: #eee;

}

.vid{
   color: #444;
   font-size: 40px;
   text-align: center;
   padding: 10px; 
}

.cont{
   display: grid;
   grid-template-columns: 2fr 1fr;
   gap: 15px;
   align-items: flex-start;
   padding: 5px 5%;
}
.cont .main-vid{
   background: #fff;
   border-radius: 5px;
   padding: 10px;
}

.cont .main-vid video{
   width: 100%;
   border-radius: 5px;
}

.cont .main-vid .title{
   color: #333;
   font-size: 23px;
   padding-bottom: 15px;
   padding-top: 15px;
}

.cont .video-list{
   background: #fff;
   border-radius: 5px;
   height: 520px;
   overflow-y: scroll;
}
.cont .video-list::-webkit-scrollbar{
   width: 7px;
}
.cont .video-list::-webkit-scrollbar-track{
   background: #ccc;
   border-radius: 50px;
}
.cont .video-list::-webkit-scrollbar-thumb{
   background: #666;
   border-radius: 50px;
}
.cont .video-list .vid video{
   width: 100px;
   border-radius: 5px;
}
.cont .video-list .vid{
   display: flex;
   align-items: center;
   gap: 15px;
   background: #f7f7f7;
   border-radius: 5px;
   margin: 10px;
   padding: 10px;
   border: 1px solid rgba(0,0,0,.1);
   cursor: pointer;
}
.cont .video-list .vid:hover{
   background: #eee;
}
.cont .video-list .vid.active{
   background: #2980b9;
}
.cont .video-list .vid.active .title{
   background: #fff;
}
.cont .video-list .vid .title{
   background: #333;
   font-size: 17px;
}

@media (max-width:991px){
   .cont{
       grid-template-columns: 1.5fr 1fr;
       padding: 10px;
   }
}
@media (max-width:768px){
   .cont{
       grid-template-columns: 1fr;
   }
}
    </style>

    <title>Document</title>

    <?php
    include("userheader.php");
    ?>

</head>
<body>
    <h3 class="heading"> video gallery </h3>

<div class="cont">
    <div class="main-vid">
        <div class="video">
            <video src="1image/video_from_database" controls muted autoplay></video>
            <h3 class="title">01. video title goes here</h3>
        </div>
    </div>
    <div class="video-list">
        <div class="vid active">
            <video src="1image/video_from_database" muted></video>
            <h3 class="title">01. video title</h3>
        </div>
        <div class="vid">
            <video src="1image/video_from_database" muted></video>
            <h3 class="title">02. video title</h3>
        </div>
        <div class="vid">
            <video src="1image/video_from_database" muted></video>
            <h3 class="title">03. video title</h3>
        </div>
        <div class="vid">
            <video src="1image/video_from_database" muted></video>
            <h3 class="title">04. video title</h3>
        </div>
    </div>
</div>

<script>
let listVideo = document.querySelectorAll('.video-list .vid');
let mainVideo = document.querySelector('.main-vid .video');
let title = document.querySelector('.main-video .title');

listVideo.forEach(video =>{
    video.onclick = () =>{
        listVideo.forEach(vid => vid.classList.remove('active'));
        video.classList.add('active');
        if(video.classList.contains('active')){
           let src = video.children[0].getAttribute('src');
           mainVideo.src = src;
           let text = video.children[1].innerHTML;
           title.innerHTML = text;
        };
    }
})
</script>

</body>
</html>