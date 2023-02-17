<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
  margin: 0;
  font-size: 20px;
}

* {
  box-sizing: border-box;
}

.container {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  background: white;
  color: black;
  font-family: arial, sans-serif;
  overflow: hidden;
}

.content {
  position: relative;
  width: 600px;
  max-width: 100%;
  margin: 20px;
  background: white;
  padding: 60px 40px;
  text-align: center;
  box-shadow: -10px 10px 67px -12px rgba(0, 0, 0, 0.2);
  opacity: 0;
  animation: apparition 0.8s 1.2s cubic-bezier(0.39, 0.575, 0.28, 0.995) forwards;
}
.content p {
  font-size: 1.3rem;
  margin-top: 0;
  margin-bottom: 0.6rem;
  letter-spacing: 0.1rem;
  color: #595959;
}
.content p:last-child {
  margin-bottom: 0;
}
.content button {
  display: inline-block;
  margin-top: 2rem;
  padding: 0.5rem 1rem;
  border: 3px solid #595959;
  background: transparent;
  font-size: 1rem;
  color: #595959;
  text-decoration: none;
  cursor: pointer;
  font-weight: bold;
}

.particle {
  position: absolute;
  display: block;
  pointer-events: none;
}
.particle:nth-child(1) {
  top: 66.0912453761%;
  left: 57.3689416419%;
  font-size: 11px;
  filter: blur(0.02px);
  animation: 27s float2 infinite;
}
.particle:nth-child(2) {
  top: 73.1707317073%;
  left: 19.6078431373%;
  font-size: 20px;
  filter: blur(0.04px);
  animation: 27s floatReverse infinite;
}
.particle:nth-child(3) {
  top: 37.2093023256%;
  left: 59.9803343166%;
  font-size: 17px;
  filter: blur(0.06px);
  animation: 31s floatReverse infinite;
}
.particle:nth-child(4) {
  top: 59.4397076736%;
  left: 79.333986288%;
  font-size: 21px;
  filter: blur(0.08px);
  animation: 34s float infinite;
}
.particle:nth-child(5) {
  top: 82.2521419829%;
  left: 66.8633235005%;
  font-size: 17px;
  filter: blur(0.1px);
  animation: 39s floatReverse2 infinite;
}
.particle:nth-child(6) {
  top: 18.3796856106%;
  left: 35.0535540409%;
  font-size: 27px;
  filter: blur(0.12px);
  animation: 32s floatReverse infinite;
}
.particle:nth-child(7) {
  top: 37.6811594203%;
  left: 52.5291828794%;
  font-size: 28px;
  filter: blur(0.14px);
  animation: 23s floatReverse infinite;
}
.particle:nth-child(8) {
  top: 6.7469879518%;
  left: 66.9902912621%;
  font-size: 30px;
  filter: blur(0.16px);
  animation: 26s float2 infinite;
}
.particle:nth-child(9) {
  top: 54.0540540541%;
  left: 31.5581854043%;
  font-size: 14px;
  filter: blur(0.18px);
  animation: 21s floatReverse2 infinite;
}
.particle:nth-child(10) {
  top: 69.3528693529%;
  left: 18.6457311089%;
  font-size: 19px;
  filter: blur(0.2px);
  animation: 38s floatReverse infinite;
}
.particle:nth-child(11) {
  top: 72.8155339806%;
  left: 70.3125%;
  font-size: 24px;
  filter: blur(0.22px);
  animation: 22s floatReverse infinite;
}
.particle:nth-child(12) {
  top: 53.3980582524%;
  left: 28.3203125%;
  font-size: 24px;
  filter: blur(0.24px);
  animation: 29s float infinite;
}
.particle:nth-child(13) {
  top: 40.5307599517%;
  left: 0.9718172983%;
  font-size: 29px;
  filter: blur(0.26px);
  animation: 28s float2 infinite;
}
.particle:nth-child(14) {
  top: 19.4174757282%;
  left: 29.296875%;
  font-size: 24px;
  filter: blur(0.28px);
  animation: 31s floatReverse2 infinite;
}
.particle:nth-child(15) {
  top: 10.7711138311%;
  left: 76.6961651917%;
  font-size: 17px;
  filter: blur(0.3px);
  animation: 31s floatReverse2 infinite;
}
.particle:nth-child(16) {
  top: 74.7847478475%;
  left: 35.538005923%;
  font-size: 13px;
  filter: blur(0.32px);
  animation: 35s float2 infinite;
}
.particle:nth-child(17) {
  top: 34.7406513872%;
  left: 58.3090379009%;
  font-size: 29px;
  filter: blur(0.34px);
  animation: 39s float2 infinite;
}
.particle:nth-child(18) {
  top: 35.792019347%;
  left: 21.4216163583%;
  font-size: 27px;
  filter: blur(0.36px);
  animation: 40s float2 infinite;
}
.particle:nth-child(19) {
  top: 34.9514563107%;
  left: 45.8984375%;
  font-size: 24px;
  filter: blur(0.38px);
  animation: 22s float infinite;
}
.particle:nth-child(20) {
  top: 95.4489544895%;
  left: 55.2813425469%;
  font-size: 13px;
  filter: blur(0.4px);
  animation: 22s float2 infinite;
}
.particle:nth-child(21) {
  top: 3.8882138518%;
  left: 31.2805474096%;
  font-size: 23px;
  filter: blur(0.42px);
  animation: 21s floatReverse2 infinite;
}
.particle:nth-child(22) {
  top: 8.8019559902%;
  left: 90.373280943%;
  font-size: 18px;
  filter: blur(0.44px);
  animation: 39s float2 infinite;
}
.particle:nth-child(23) {
  top: 85.8536585366%;
  left: 38.2352941176%;
  font-size: 20px;
  filter: blur(0.46px);
  animation: 33s floatReverse infinite;
}
.particle:nth-child(24) {
  top: 90.0726392252%;
  left: 74.0740740741%;
  font-size: 26px;
  filter: blur(0.48px);
  animation: 30s float2 infinite;
}
.particle:nth-child(25) {
  top: 78.335373317%;
  left: 5.8997050147%;
  font-size: 17px;
  filter: blur(0.5px);
  animation: 27s floatReverse2 infinite;
}
.particle:nth-child(26) {
  top: 54.2372881356%;
  left: 34.1130604288%;
  font-size: 26px;
  filter: blur(0.52px);
  animation: 25s floatReverse2 infinite;
}
.particle:nth-child(27) {
  top: 24.2424242424%;
  left: 26.3414634146%;
  font-size: 25px;
  filter: blur(0.54px);
  animation: 28s float infinite;
}
.particle:nth-child(28) {
  top: 46.772228989%;
  left: 51.9098922625%;
  font-size: 21px;
  filter: blur(0.56px);
  animation: 36s float2 infinite;
}
.particle:nth-child(29) {
  top: 93.3171324423%;
  left: 22.4828934506%;
  font-size: 23px;
  filter: blur(0.58px);
  animation: 35s floatReverse2 infinite;
}
.particle:nth-child(30) {
  top: 76.6584766585%;
  left: 10.8481262327%;
  font-size: 14px;
  filter: blur(0.6px);
  animation: 35s floatReverse2 infinite;
}
.particle:nth-child(31) {
  top: 56.4476885645%;
  left: 31.3111545988%;
  font-size: 22px;
  filter: blur(0.62px);
  animation: 31s floatReverse infinite;
}
.particle:nth-child(32) {
  top: 11.7791411043%;
  left: 3.9408866995%;
  font-size: 15px;
  filter: blur(0.64px);
  animation: 38s floatReverse infinite;
}
.particle:nth-child(33) {
  top: 8.7272727273%;
  left: 93.6585365854%;
  font-size: 25px;
  filter: blur(0.66px);
  animation: 27s floatReverse2 infinite;
}
.particle:nth-child(34) {
  top: 88.6699507389%;
  left: 50.395256917%;
  font-size: 12px;
  filter: blur(0.68px);
  animation: 33s float infinite;
}
.particle:nth-child(35) {
  top: 85.0241545894%;
  left: 38.9105058366%;
  font-size: 28px;
  filter: blur(0.7px);
  animation: 31s float infinite;
}
.particle:nth-child(36) {
  top: 87.061668682%;
  left: 51.6066212269%;
  font-size: 27px;
  filter: blur(0.72px);
  animation: 32s floatReverse infinite;
}
.particle:nth-child(37) {
  top: 16.5450121655%;
  left: 13.698630137%;
  font-size: 22px;
  filter: blur(0.74px);
  animation: 30s float infinite;
}
.particle:nth-child(38) {
  top: 42.2085889571%;
  left: 53.2019704433%;
  font-size: 15px;
  filter: blur(0.76px);
  animation: 29s floatReverse infinite;
}
.particle:nth-child(39) {
  top: 91.6256157635%;
  left: 29.6442687747%;
  font-size: 12px;
  filter: blur(0.78px);
  animation: 40s floatReverse infinite;
}
.particle:nth-child(40) {
  top: 35.8787878788%;
  left: 90.7317073171%;
  font-size: 25px;
  filter: blur(0.8px);
  animation: 21s floatReverse infinite;
}
.particle:nth-child(41) {
  top: 83.698296837%;
  left: 55.7729941292%;
  font-size: 22px;
  filter: blur(0.82px);
  animation: 28s float infinite;
}
.particle:nth-child(42) {
  top: 94.6979038224%;
  left: 75.1730959446%;
  font-size: 11px;
  filter: blur(0.84px);
  animation: 36s floatReverse2 infinite;
}
.particle:nth-child(43) {
  top: 73.4299516908%;
  left: 94.3579766537%;
  font-size: 28px;
  filter: blur(0.86px);
  animation: 23s float infinite;
}
.particle:nth-child(44) {
  top: 16.7281672817%;
  left: 17.7690029615%;
  font-size: 13px;
  filter: blur(0.88px);
  animation: 34s floatReverse infinite;
}
.particle:nth-child(45) {
  top: 69.864698647%;
  left: 97.7295162883%;
  font-size: 13px;
  filter: blur(0.9px);
  animation: 30s float infinite;
}
.particle:nth-child(46) {
  top: 35.2078239609%;
  left: 75.6385068762%;
  font-size: 18px;
  filter: blur(0.92px);
  animation: 27s float2 infinite;
}
.particle:nth-child(47) {
  top: 91.0411622276%;
  left: 93.567251462%;
  font-size: 26px;
  filter: blur(0.94px);
  animation: 28s floatReverse infinite;
}
.particle:nth-child(48) {
  top: 46.3208685163%;
  left: 52.4781341108%;
  font-size: 29px;
  filter: blur(0.96px);
  animation: 26s float2 infinite;
}
.particle:nth-child(49) {
  top: 52.6829268293%;
  left: 61.7647058824%;
  font-size: 20px;
  filter: blur(0.98px);
  animation: 37s floatReverse2 infinite;
}
.particle:nth-child(50) {
  top: 59.9508599509%;
  left: 21.6962524655%;
  font-size: 14px;
  filter: blur(1px);
  animation: 33s float2 infinite;
}
.particle:nth-child(51) {
  top: 92.7960927961%;
  left: 46.1236506379%;
  font-size: 19px;
  filter: blur(1.02px);
  animation: 37s floatReverse infinite;
}
.particle:nth-child(52) {
  top: 89.7657213317%;
  left: 27.6953511375%;
  font-size: 11px;
  filter: blur(1.04px);
  animation: 34s floatReverse2 infinite;
}
.particle:nth-child(53) {
  top: 53.2687651332%;
  left: 35.0877192982%;
  font-size: 26px;
  filter: blur(1.06px);
  animation: 24s float2 infinite;
}
.particle:nth-child(54) {
  top: 31.1435523114%;
  left: 9.7847358121%;
  font-size: 22px;
  filter: blur(1.08px);
  animation: 27s floatReverse infinite;
}
.particle:nth-child(55) {
  top: 55.5420219245%;
  left: 87.1694417238%;
  font-size: 21px;
  filter: blur(1.1px);
  animation: 24s float2 infinite;
}
.particle:nth-child(56) {
  top: 56.2268803946%;
  left: 55.390702275%;
  font-size: 11px;
  filter: blur(1.12px);
  animation: 34s floatReverse2 infinite;
}
.particle:nth-child(57) {
  top: 49.3218249075%;
  left: 57.3689416419%;
  font-size: 11px;
  filter: blur(1.14px);
  animation: 28s floatReverse infinite;
}
.particle:nth-child(58) {
  top: 59.6577017115%;
  left: 55.9921414538%;
  font-size: 18px;
  filter: blur(1.16px);
  animation: 37s float2 infinite;
}
.particle:nth-child(59) {
  top: 50.7936507937%;
  left: 44.1609421001%;
  font-size: 19px;
  filter: blur(1.18px);
  animation: 23s floatReverse2 infinite;
}
.particle:nth-child(60) {
  top: 13.7086903305%;
  left: 70.796460177%;
  font-size: 17px;
  filter: blur(1.2px);
  animation: 26s floatReverse infinite;
}
.particle:nth-child(61) {
  top: 91.4004914005%;
  left: 26.6272189349%;
  font-size: 14px;
  filter: blur(1.22px);
  animation: 29s float2 infinite;
}
.particle:nth-child(62) {
  top: 14.4927536232%;
  left: 8.7548638132%;
  font-size: 28px;
  filter: blur(1.24px);
  animation: 27s float infinite;
}
.particle:nth-child(63) {
  top: 41.1260709914%;
  left: 16.7158308751%;
  font-size: 17px;
  filter: blur(1.26px);
  animation: 24s floatReverse2 infinite;
}
.particle:nth-child(64) {
  top: 50.0613496933%;
  left: 13.7931034483%;
  font-size: 15px;
  filter: blur(1.28px);
  animation: 34s float infinite;
}
.particle:nth-child(65) {
  top: 47.3429951691%;
  left: 59.3385214008%;
  font-size: 28px;
  filter: blur(1.3px);
  animation: 28s float infinite;
}
.particle:nth-child(66) {
  top: 56.3106796117%;
  left: 63.4765625%;
  font-size: 24px;
  filter: blur(1.32px);
  animation: 25s float2 infinite;
}
.particle:nth-child(67) {
  top: 0.9708737864%;
  left: 49.8046875%;
  font-size: 24px;
  filter: blur(1.34px);
  animation: 35s float infinite;
}
.particle:nth-child(68) {
  top: 21.3333333333%;
  left: 7.8048780488%;
  font-size: 25px;
  filter: blur(1.36px);
  animation: 26s float infinite;
}
.particle:nth-child(69) {
  top: 1.9464720195%;
  left: 9.7847358121%;
  font-size: 22px;
  filter: blur(1.38px);
  animation: 32s float infinite;
}
.particle:nth-child(70) {
  top: 53.9759036145%;
  left: 3.8834951456%;
  font-size: 30px;
  filter: blur(1.4px);
  animation: 32s float2 infinite;
}
.particle:nth-child(71) {
  top: 43.9024390244%;
  left: 32.3529411765%;
  font-size: 20px;
  filter: blur(1.42px);
  animation: 38s float2 infinite;
}
.particle:nth-child(72) {
  top: 54.7677261614%;
  left: 7.858546169%;
  font-size: 18px;
  filter: blur(1.44px);
  animation: 33s float infinite;
}
.particle:nth-child(73) {
  top: 88.7804878049%;
  left: 20.5882352941%;
  font-size: 20px;
  filter: blur(1.46px);
  animation: 37s float infinite;
}
.particle:nth-child(74) {
  top: 56.2268803946%;
  left: 89.0207715134%;
  font-size: 11px;
  filter: blur(1.48px);
  animation: 24s floatReverse infinite;
}
.particle:nth-child(75) {
  top: 78.239608802%;
  left: 3.9292730845%;
  font-size: 18px;
  filter: blur(1.5px);
  animation: 31s floatReverse2 infinite;
}
.particle:nth-child(76) {
  top: 18.4914841849%;
  left: 21.5264187867%;
  font-size: 22px;
  filter: blur(1.52px);
  animation: 35s floatReverse infinite;
}
.particle:nth-child(77) {
  top: 55.1390568319%;
  left: 58.4225900682%;
  font-size: 27px;
  filter: blur(1.54px);
  animation: 38s float2 infinite;
}
.particle:nth-child(78) {
  top: 88.0195599022%;
  left: 52.0628683694%;
  font-size: 18px;
  filter: blur(1.56px);
  animation: 21s float infinite;
}
.particle:nth-child(79) {
  top: 27.4509803922%;
  left: 71.8503937008%;
  font-size: 16px;
  filter: blur(1.58px);
  animation: 29s float2 infinite;
}
.particle:nth-child(80) {
  top: 37.0280146163%;
  left: 89.1283055828%;
  font-size: 21px;
  filter: blur(1.6px);
  animation: 23s floatReverse2 infinite;
}

@keyframes apparition {
  from {
    opacity: 0;
    transform: translateY(100px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(180px);
  }
}
@keyframes floatReverse {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-180px);
  }
}
@keyframes float2 {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(28px);
  }
}
@keyframes floatReverse2 {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-28px);
  }
}

            </style>
        <title>Page not found - 404</title>
        <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}'/>
        
    </head>
    <body>   
        <main class='container'>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>4</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <span class='particle'>0</span>
        <article class='content'>
            <p style="font-size: 80px; color:green;"><strong>404</strong> not found</p><br/><br/>
            <p style="font-size: 40px; color:black;"><strong>Sorry. Looks like the developers fell asleep...</strong></p>
        </article>
        </main>

    
    </body>
</html>