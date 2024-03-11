<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
       
        footer{
            position: fixed;
            left:0px;
            right: 0px;
            bottom: 0px;
            text-align: center;
            padding: 15px;
            background-color:#12f7ff ;
            color: black;
        }
        * {
    margin: 0;
    padding: 0;
  }
   
  /* body {
    background: #30333A;
  }  */
  
  .wrapper {
    position: absolute;
    top: 75%;
    left: 2%;
   padding: 10px;
    transform: translate(-50%, -50%);
  }
  
  ul {
   
    list-style: none;
    /* display: flex; */
    justify-content: space-between;
  }
  
  ul li {
    width: 50px;
    height: 50px;
    position: relative;
    background: #e59500;
    margin: 10px 0;
    cursor: pointer;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
  }
  
  ul li .fa {
    position: absolute;
    top: 50%;
    left: 50%;
  
    transform: translate(-50%, -50%);
    font-size: 20px;
    color: #fff;
  }
  ul li.facebook{
    background: #3b5999;
  }
  ul li.twitter{
    background: #55acee;
  }
  ul li.instagram{
    background: #e4405f;
  }
  ul li.google{
    background:#dd4b39;
  }
  ul li.whatsapp{
    background: #25D366;
  }
.slider{
    position: absolute;
    top:0;
    left: 51px;
    width:0px;
    height: 50px;
    background: #eebb5c;
    text-align: center;
    line-height: 50px;
    border-radius: 3px;
    transition: all 0.5s 0.3s ease;
}
.slider p{
    text-transform: uppercase;
    font-size: 16px;
    font-weight: 900;
    opacity: 0;
    transition: all 0.5s ease;
}
ul li.facebook div.slider{
    background: #627aac;
}
ul li.twitter div.slider{
    background: #7fd5f6;
}
ul li.instagram div.slider{
    background: #dd94c6;
}
ul li.google div.slider{
    background: #eea59c;
}
ul li.whatsapp div.slider{
    background: #82d47e;
}
ul li:hover .slider{
    width: 180px;
    transition: all 0.5s ease;
}
ul li:hover .slider p{
    opacity: 1;
    transition: all 1s 0.2s ease;
}

    </style>



    
    <div class="wrapper"> 
        <ul>
          <li class="facebook">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <div class="slider">
              <p>facebook</p>
            </div>
          </li>
          
          <li class="twitter">
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <div class="slider">
              <p>twitter</p>
            </div>
          </li>
          
          <li class="instagram">
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <div class="slider">
              <p>instagram</p>
            </div>
          </li>
          
          <li class="google">
            <i class="fa fa-google" aria-hidden="true"></i>
            <div class="slider">
              <p>google</p>
            </div>
          </li>
          
          <li class="whatsapp">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            <div class="slider">
              <p>whatsapp</p>
            </div>
          </li>
        </ul>
      </div>
    </div></br></br></br></br></br>
    <footer>&#169 Created By QuizWiz | All rights are reserved.</footer>

