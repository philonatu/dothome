<?php
  include "container/lib01.php";
?>
<style>
@import url('https://fonts.googleapis.com/css?family=Arima+Madurai:300');

*,
*::before,
*::after {
	box-sizing: border-box;
}
h1 {
	font-family: 'Arima Madurai', cursive;
	color: black;
	font-size: 4rem;
	letter-spacing: -3px;
	text-shadow: 0px 1px 1px rgba(255,255,255,0.6);
	position: relative;
	z-index: 3;
}
.headwords {
	z-index: 1;
	position: relative;
	overflow: hidden;
	display: flex;
	align-items: center;
	justify-content: center;
	// min-height: 100vh;
	min-height: 35rem;
	background-image: linear-gradient(to bottom,  rgba(255,168,76,0.6) 0%,rgba(255,123,13,0.6) 100%), url('../img/ground003.jpg');
	background-blend-mode: soft-light;
	background-size: cover;
	background-position: center center;
	padding: 2rem;
}

.bird {
	background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/174479/bird-cells-new.svg);
	background-size: auto 100%;
	width: 88px;
	height: 125px;
	will-change: background-position;

	animation-name: fly-cycle;
	animation-timing-function: steps(10);
	animation-iteration-count: infinite;

	&--one {
		animation-duration: 1s;
		animation-delay: -0.5s;
	}

	&--two {
		animation-duration: 0.9s;
		animation-delay: -0.75s;
	}

	&--three {
		animation-duration: 1.25s;
		animation-delay: -0.25s;
	}

	&--four {
		animation-duration: 1.1s;
		animation-delay: -0.5s;
	}

}

.bird-headwords {
	position: absolute;
	top: 20%;
	left: -10%;
	transform: scale(0) translateX(-10vw);
	will-change: transform;

	animation-name: fly-right-one;
	animation-timing-function: linear;
	animation-iteration-count: infinite;

	&--one {
		animation-duration: 15s;
		animation-delay: 0;
	}

	&--two {
		animation-duration: 16s;
		animation-delay: 1s;
	}

	&--three {
		animation-duration: 14.6s;
		animation-delay: 9.5s;
	}

	&--four {
		animation-duration: 16s;
		animation-delay: 10.25s;
	}

}

@keyframes fly-cycle {

	100% {
		background-position: -900px 0;
	}

}

@keyframes fly-right-one {

	0% {
		transform: scale(0.3) translateX(-10vw);
	}

	10% {
		transform: translateY(2vh) translateX(10vw) scale(0.4);
	}

	20% {
		transform: translateY(0vh) translateX(30vw) scale(0.5);
	}

	30% {
		transform: translateY(4vh) translateX(50vw) scale(0.6);
	}

	40% {
		transform: translateY(2vh) translateX(70vw) scale(0.6);
	}

	50% {
		transform: translateY(0vh) translateX(90vw) scale(0.6);
	}

	60% {
		transform: translateY(0vh) translateX(110vw) scale(0.6);
	}

	100% {
		transform: translateY(0vh) translateX(110vw) scale(0.6);
	}

}

@keyframes fly-right-two {

	0% {
		transform: translateY(-2vh) translateX(-10vw) scale(0.5);
	}

	10% {
		transform: translateY(0vh) translateX(10vw) scale(0.4);
	}

	20% {
		transform: translateY(-4vh) translateX(30vw) scale(0.6);
	}

	30% {
		transform: translateY(1vh) translateX(50vw) scale(0.45);
	}

	40% {
		transform: translateY(-2.5vh) translateX(70vw) scale(0.5);
	}

	50% {
		transform: translateY(0vh) translateX(90vw) scale(0.45);
	}

	51% {
		transform: translateY(0vh) translateX(110vw) scale(0.45);
	}

	100% {
		transform: translateY(0vh) translateX(110vw) scale(0.45);
	}

}





</style>

        <nav class="navbar">
          <div class="logo">
            <a href="index.php"><img src="img/logo_text_sm.png" alt="logo letter"></a>
          </div>
          <div class="logo_text">
            <p> SCIENCE AND PHILOSOPHY ON NATURE </p>
          </div>
        </nav>

        <div class="headwords">
          <h1>test</h1>

          	<div class="bird-headwords bird-headwords--one">
          		<div class="bird bird--one"></div>
          	</div>

          	<div class="bird-headwords bird-headwords--two">
          		<div class="bird bird--two"></div>
          	</div>

          	<div class="bird-headwords bird-headwords--three">
          		<div class="bird bird--three"></div>
          	</div>

          	<div class="bird-headwords bird-container--four">
          		<div class="bird bird--four"></div>
          	</div>
        </div>


        <div class="navbar_under">
          <div class="menu_under tooltip" data-tooltips="">
            <a style="padding-left:15px" href="archive.php">아카이브(전체목록)</a>
          </div>
          <div class="menu_under">
            <a href="book.php">저서 </a>
          </div>
          <div class="menu_under tooltip" data-tooltips="미완성, 서평 메뉴는 필로나투 페이지들에서 큰 비중을 차지하게 될 것입니다.">
            <a href="review.php">서평/책소개</a>
          </div>
          <div class="menu_under tooltip" data-tooltips="개념 사전처럼 만드는 중인데, 문열기까지 시간이 꽤 걸릴 듯 합니다.">
            <a href="concept.php">개념 뭉치</a>
          </div>
          <div class="menu_under tooltip" data-tooltips="갤러리와 블로그로 구성되어, Homo Faber의 단편의 그림과 기관출판되지 않은 단상의 글을 볼 수 있습니다.">
            <a href="blog.php">글과 그림</a>
          </div>
          <div class="menu_under tooltip" data-tooltips="article based English version">
            <a style="margin-left: 100px; font-size:14px" href="http://philonatu.com/?page_id=295">English Version</a>
          </div>




        </div>
