function Tip(){tt_Tip(arguments,null)}function TagToTip(){var t=tt_GetElt(arguments[0]);t&&tt_Tip(arguments,t)}function UnTip(){tt_OpReHref(),tt_aV[DURATION]<0&&2&tt_iState?tt_tDurt.Timer("tt_HideInit()",-tt_aV[DURATION],!0):tt_aV[STICKY]&&2&tt_iState||tt_HideInit()}function tt_Extension(){return tt_ExtCmdEnum(),tt_aExt[tt_aExt.length]=this,this}function tt_SetTipPos(t,e){var n=tt_aElt[0].style;if(tt_x=t,tt_y=e,n.left=t+"px",n.top=e+"px",tt_ie56){var _=tt_aElt[tt_aElt.length-1];_&&(_.style.left=n.left,_.style.top=n.top)}}function tt_HideInit(){if(tt_iState){if(tt_ExtCallFncs(0,"HideInit"),tt_iState&=-13,tt_flagOpa&&tt_aV[FADEOUT]&&(tt_tFade.EndTimer(),tt_opa)){var t=Math.round(tt_aV[FADEOUT]/(tt_aV[FADEINTERVAL]*(tt_aV[OPACITY]/tt_opa)));return void tt_Fade(tt_opa,tt_opa,0,t)}tt_tHide.Timer("tt_Hide();",1,!1)}}function tt_Hide(){tt_db&&tt_iState&&(tt_OpReHref(),2&tt_iState&&(tt_aElt[0].style.visibility="hidden",tt_ExtCallFncs(0,"Hide")),tt_tShow.EndTimer(),tt_tHide.EndTimer(),tt_tDurt.EndTimer(),tt_tFade.EndTimer(),tt_op||tt_ie||(tt_tWaitMov.EndTimer(),tt_bWait=!1),(tt_aV[CLICKCLOSE]||tt_aV[CLICKSTICKY])&&tt_RemEvtFnc(document,"mouseup",tt_OnLClick),tt_ExtCallFncs(0,"Kill"),tt_t2t&&!tt_aV[COPYCONTENT]&&tt_UnEl2Tip(),tt_iState=0,tt_over=null,tt_ResetMainDiv(),tt_aElt[tt_aElt.length-1]&&(tt_aElt[tt_aElt.length-1].style.display="none"))}function tt_GetElt(t){return document.getElementById?document.getElementById(t):document.all?document.all[t]:null}function tt_GetDivW(t){return t?t.offsetWidth||t.style.pixelWidth||0:0}function tt_GetDivH(t){return t?t.offsetHeight||t.style.pixelHeight||0:0}function tt_GetScrollX(){return window.pageXOffset||(tt_db?tt_db.scrollLeft||0:0)}function tt_GetScrollY(){return window.pageYOffset||(tt_db?tt_db.scrollTop||0:0)}function tt_GetClientW(){return tt_GetWndCliSiz("Width")}function tt_GetClientH(){return tt_GetWndCliSiz("Height")}function tt_GetEvtX(t){return t?typeof t.pageX!=tt_u?t.pageX:t.clientX+tt_GetScrollX():0}function tt_GetEvtY(t){return t?typeof t.pageY!=tt_u?t.pageY:t.clientY+tt_GetScrollY():0}function tt_AddEvtFnc(t,e,n){t&&(t.addEventListener?t.addEventListener(e,n,!1):t.attachEvent("on"+e,n))}function tt_RemEvtFnc(t,e,n){t&&(t.removeEventListener?t.removeEventListener(e,n,!1):t.detachEvent("on"+e,n))}function tt_GetDad(t){return t.parentNode||t.parentElement||t.offsetParent}function tt_MovDomNode(t,e,n){e&&e.removeChild(t),n&&n.appendChild(t)}function tt_Init(){tt_MkCmdEnum(),tt_Browser()&&tt_MkMainDiv()&&(tt_IsW3cBox(),tt_OpaSupport(),tt_AddEvtFnc(document,"mousemove",tt_Move),(TagsToTip||tt_Debug)&&tt_SetOnloadFnc(),tt_AddEvtFnc(window,"unload",tt_Hide))}function tt_MkCmdEnum(){var n=0;for(var i in config)eval("window."+i.toString().toUpperCase()+" = "+n++);tt_aV.length=n}function tt_Browser(){var n,nv,n6,w3c;if(n=navigator.userAgent.toLowerCase(),nv=navigator.appVersion,tt_op=document.defaultView&&typeof eval("window.opera")!=tt_u,tt_ie=-1!=n.indexOf("msie")&&document.all&&!tt_op){var ieOld=!document.compatMode||"BackCompat"==document.compatMode;tt_db=ieOld?document.body||null:document.documentElement,tt_db&&(tt_ie56=parseFloat(nv.substring(nv.indexOf("MSIE")+5))>=5.5&&typeof document.body.style.maxHeight==tt_u)}else tt_db=document.documentElement||document.body||(document.getElementsByTagName?document.getElementsByTagName("body")[0]:null),tt_op||(n6=document.defaultView&&typeof document.defaultView.getComputedStyle!=tt_u,w3c=!n6&&document.getElementById);if(tt_body=document.getElementsByTagName?document.getElementsByTagName("body")[0]:document.body||null,tt_ie||n6||tt_op||w3c)if(tt_body&&tt_db){if(document.attachEvent||document.addEventListener)return!0}else tt_Err("wz_tooltip.js must be included INSIDE the body section, immediately after the opening <body> tag.",!1);return tt_db=null,!1}function tt_MkMainDiv(){return tt_body.insertAdjacentHTML?tt_body.insertAdjacentHTML("afterBegin",tt_MkMainDivHtm()):typeof tt_body.innerHTML!=tt_u&&document.createElement&&tt_body.appendChild&&tt_body.appendChild(tt_MkMainDivDom()),window.tt_GetMainDivRefs&&tt_GetMainDivRefs()?!0:(tt_db=null,!1)}function tt_MkMainDivHtm(){return'<div id="WzTtDiV"></div>'+(tt_ie56?'<iframe id="WzTtIfRm" src="javascript:false" scrolling="no" frameborder="0" style="filter:Alpha(opacity=0);position:absolute;top:0px;left:0px;display:none;"></iframe>':"")}function tt_MkMainDivDom(){var t=document.createElement("div");return t&&(t.id="WzTtDiV"),t}function tt_GetMainDivRefs(){if(tt_aElt[0]=tt_GetElt("WzTtDiV"),tt_ie56&&tt_aElt[0]&&(tt_aElt[tt_aElt.length-1]=tt_GetElt("WzTtIfRm"),tt_aElt[tt_aElt.length-1]||(tt_aElt[0]=null)),tt_aElt[0]){var t=tt_aElt[0].style;return t.visibility="hidden",t.position="absolute",t.overflow="hidden",!0}return!1}function tt_ResetMainDiv(){tt_SetTipPos(0,0),tt_aElt[0].innerHTML="",tt_aElt[0].style.width="0px",tt_h=0}function tt_IsW3cBox(){var t=tt_aElt[0].style;t.padding="10px",t.width="40px",tt_bBoxOld=40==tt_GetDivW(tt_aElt[0]),t.padding="0px",tt_ResetMainDiv()}function tt_OpaSupport(){var t=tt_body.style;tt_flagOpa=typeof t.KhtmlOpacity!=tt_u?2:typeof t.KHTMLOpacity!=tt_u?3:typeof t.MozOpacity!=tt_u?4:typeof t.opacity!=tt_u?5:typeof t.filter!=tt_u?1:0}function tt_SetOnloadFnc(){if(tt_AddEvtFnc(document,"DOMContentLoaded",tt_HideSrcTags),tt_AddEvtFnc(window,"load",tt_HideSrcTags),tt_body.attachEvent&&tt_body.attachEvent("onreadystatechange",function(){"complete"==tt_body.readyState&&tt_HideSrcTags()}),/WebKit|KHTML/i.test(navigator.userAgent))var t=setInterval(function(){/loaded|complete/.test(document.readyState)&&(clearInterval(t),tt_HideSrcTags())},10)}function tt_HideSrcTags(){window.tt_HideSrcTags&&!window.tt_HideSrcTags.done&&(window.tt_HideSrcTags.done=!0,tt_HideSrcTagsRecurs(tt_body)||tt_Err("There are HTML elements to be converted to tooltips.\nIf you want these HTML elements to be automatically hidden, you must edit wz_tooltip.js, and set TagsToTip in the global tooltip configuration to true.",!0))}function tt_HideSrcTagsRecurs(t){for(var e,n,_=t.childNodes||t.children||null,i=_?_.length:0;i;){if(--i,!tt_HideSrcTagsRecurs(_[i]))return!1;if(e=_[i].getAttribute?_[i].getAttribute("onmouseover")||_[i].getAttribute("onclick"):"function"==typeof _[i].onmouseover?_[i].onmouseover||_[i].onclick:null,e&&(n=e.toString().match(/TagToTip\s*\(\s*'[^'.]+'\s*[\),]/),n&&n.length&&!tt_HideSrcTag(n[0])))return!1}return!0}function tt_HideSrcTag(t){var e,n;if(e=t.replace(/.+'([^'.]+)'.+/,"$1"),n=tt_GetElt(e)){if(tt_Debug&&!TagsToTip)return!1;n.style.display="none"}else tt_Err("Invalid ID\n'"+e+"'\npassed to TagToTip(). There exists no HTML element with that ID.",!0);return!0}function tt_Tip(t,e){!tt_db||8&tt_iState||(tt_iState&&tt_Hide(),tt_Enabled&&(tt_t2t=e,tt_ReadCmds(t)&&(tt_iState=5,tt_AdaptConfig1(),tt_MkTipContent(t),tt_MkTipSubDivs(),tt_FormatTip(),tt_bJmpVert=!1,tt_bJmpHorz=!1,tt_maxPosX=tt_GetClientW()+tt_GetScrollX()-tt_w-1,tt_maxPosY=tt_GetClientH()+tt_GetScrollY()-tt_h-1,tt_AdaptConfig2(),tt_OverInit(),tt_ShowInit(),tt_Move())))}function tt_ReadCmds(t){var e;e=0;for(var n in config)tt_aV[e++]=config[n];if(1&t.length){for(e=t.length-1;e>0;e-=2)tt_aV[t[e-1]]=t[e];return!0}return tt_Err("Incorrect call of Tip() or TagToTip().\nEach command must be followed by a value.",!0),!1}function tt_AdaptConfig1(){if(tt_ExtCallFncs(0,"LoadConfig"),tt_aV[TITLEBGCOLOR].length||(tt_aV[TITLEBGCOLOR]=tt_aV[BORDERCOLOR]),tt_aV[TITLEFONTCOLOR].length||(tt_aV[TITLEFONTCOLOR]=tt_aV[BGCOLOR]),tt_aV[TITLEFONTFACE].length||(tt_aV[TITLEFONTFACE]=tt_aV[FONTFACE]),tt_aV[TITLEFONTSIZE].length||(tt_aV[TITLEFONTSIZE]=tt_aV[FONTSIZE]),tt_aV[CLOSEBTN]){tt_aV[CLOSEBTNCOLORS]||(tt_aV[CLOSEBTNCOLORS]=new Array("","","",""));for(var t=4;t;)--t,tt_aV[CLOSEBTNCOLORS][t].length||(tt_aV[CLOSEBTNCOLORS][t]=1&t?tt_aV[TITLEFONTCOLOR]:tt_aV[TITLEBGCOLOR]);tt_aV[TITLE].length||(tt_aV[TITLE]=" ")}100!=tt_aV[OPACITY]||typeof tt_aElt[0].style.MozOpacity==tt_u||Array.every||(tt_aV[OPACITY]=99),tt_aV[FADEIN]&&tt_flagOpa&&tt_aV[DELAY]>100&&(tt_aV[DELAY]=Math.max(tt_aV[DELAY]-tt_aV[FADEIN],100))}function tt_AdaptConfig2(){tt_aV[CENTERMOUSE]&&(tt_aV[OFFSETX]-=tt_w-(tt_aV[SHADOW]?tt_aV[SHADOWWIDTH]:0)>>1,tt_aV[JUMPHORZ]=!1)}function tt_MkTipContent(t){tt_sContent=tt_t2t?tt_aV[COPYCONTENT]?tt_t2t.innerHTML:"":t[0],tt_ExtCallFncs(0,"CreateContentString")}function tt_MkTipSubDivs(){var t="position:relative;margin:0px;padding:0px;border-width:0px;left:0px;top:0px;line-height:normal;width:auto;",e=' cellspacing="0" cellpadding="0" border="0" style="'+t+'"><tbody style="'+t+'"><tr><td ';tt_aElt[0].style.width=tt_GetClientW()+"px",tt_aElt[0].innerHTML=""+(tt_aV[TITLE].length?'<div id="WzTiTl" style="position:relative;z-index:1;"><table id="WzTiTlTb"'+e+'id="WzTiTlI" style="'+t+'">'+tt_aV[TITLE]+"</td>"+(tt_aV[CLOSEBTN]?'<td align="right" style="'+t+'text-align:right;"><span id="WzClOsE" style="position:relative;left:2px;padding-left:2px;padding-right:2px;cursor:'+(tt_ie?"hand":"pointer")+';" onmouseover="tt_OnCloseBtnOver(1)" onmouseout="tt_OnCloseBtnOver(0)" onclick="tt_HideInit()">'+tt_aV[CLOSEBTNTEXT]+"</span></td>":"")+"</tr></tbody></table></div>":"")+'<div id="WzBoDy" style="position:relative;z-index:0;"><table'+e+'id="WzBoDyI" style="'+t+'">'+tt_sContent+"</td></tr></tbody></table></div>"+(tt_aV[SHADOW]?'<div id="WzTtShDwR" style="position:absolute;overflow:hidden;"></div><div id="WzTtShDwB" style="position:relative;overflow:hidden;"></div>':""),tt_GetSubDivRefs(),tt_t2t&&!tt_aV[COPYCONTENT]&&tt_El2Tip(),tt_ExtCallFncs(0,"SubDivsCreated")}function tt_GetSubDivRefs(){for(var t=new Array("WzTiTl","WzTiTlTb","WzTiTlI","WzClOsE","WzBoDy","WzBoDyI","WzTtShDwB","WzTtShDwR"),e=t.length;e;--e)tt_aElt[e]=tt_GetElt(t[e-1])}function tt_FormatTip(){var t,e,n,_,i,a=tt_aV[PADDING],o=tt_aV[BORDERWIDTH],l=a+o<<1;tt_aV[TITLE].length?(n=tt_aV[TITLEPADDING],t=tt_aElt[1].style,t.background=tt_aV[TITLEBGCOLOR],t.paddingTop=t.paddingBottom=n+"px",t.paddingLeft=t.paddingRight=n+2+"px",t=tt_aElt[3].style,t.color=tt_aV[TITLEFONTCOLOR],-1==tt_aV[WIDTH]&&(t.whiteSpace="nowrap"),t.fontFamily=tt_aV[TITLEFONTFACE],t.fontSize=tt_aV[TITLEFONTSIZE],t.fontWeight="bold",t.textAlign=tt_aV[TITLEALIGN],tt_aElt[4]&&(t=tt_aElt[4].style,t.background=tt_aV[CLOSEBTNCOLORS][0],t.color=tt_aV[CLOSEBTNCOLORS][1],t.fontFamily=tt_aV[TITLEFONTFACE],t.fontSize=tt_aV[TITLEFONTSIZE],t.fontWeight="bold"),tt_aV[WIDTH]>0?tt_w=tt_aV[WIDTH]:(tt_w=tt_GetDivW(tt_aElt[3])+tt_GetDivW(tt_aElt[4]),tt_aElt[4]&&(tt_w+=a),tt_aV[WIDTH]<-1&&tt_w>-tt_aV[WIDTH]&&(tt_w=-tt_aV[WIDTH])),_=-o):(tt_w=0,_=0),t=tt_aElt[5].style,t.top=_+"px",o&&(t.borderColor=tt_aV[BORDERCOLOR],t.borderStyle=tt_aV[BORDERSTYLE],t.borderWidth=o+"px"),tt_aV[BGCOLOR].length&&(t.background=tt_aV[BGCOLOR]),tt_aV[BGIMG].length&&(t.backgroundImage="url("+tt_aV[BGIMG]+")"),t.padding=a+"px",t.textAlign=tt_aV[TEXTALIGN],tt_aV[HEIGHT]&&(t.overflow="auto",tt_aV[HEIGHT]>0?t.height=tt_aV[HEIGHT]+l+"px":tt_h=l-tt_aV[HEIGHT]),t=tt_aElt[6].style,t.color=tt_aV[FONTCOLOR],t.fontFamily=tt_aV[FONTFACE],t.fontSize=tt_aV[FONTSIZE],t.fontWeight=tt_aV[FONTWEIGHT],t.textAlign=tt_aV[TEXTALIGN],tt_aV[WIDTH]>0?e=tt_aV[WIDTH]:-1==tt_aV[WIDTH]&&tt_w?e=tt_w:(e=tt_GetDivW(tt_aElt[6]),tt_aV[WIDTH]<-1&&e>-tt_aV[WIDTH]&&(e=-tt_aV[WIDTH])),e>tt_w&&(tt_w=e),tt_w+=l,tt_aV[SHADOW]?(tt_w+=tt_aV[SHADOWWIDTH],i=Math.floor(4*tt_aV[SHADOWWIDTH]/3),t=tt_aElt[7].style,t.top=_+"px",t.left=i+"px",t.width=tt_w-i-tt_aV[SHADOWWIDTH]+"px",t.height=tt_aV[SHADOWWIDTH]+"px",t.background=tt_aV[SHADOWCOLOR],t=tt_aElt[8].style,t.top=i+"px",t.left=tt_w-tt_aV[SHADOWWIDTH]+"px",t.width=tt_aV[SHADOWWIDTH]+"px",t.background=tt_aV[SHADOWCOLOR]):i=0,tt_SetTipOpa(tt_aV[FADEIN]?0:tt_aV[OPACITY]),tt_FixSize(_,i)}function tt_FixSize(t,e){var n,_,i,a,o=tt_aV[PADDING],l=tt_aV[BORDERWIDTH];tt_aElt[0].style.width=tt_w+"px",tt_aElt[0].style.pixelWidth=tt_w,_=tt_w-(tt_aV[SHADOW]?tt_aV[SHADOWWIDTH]:0),n=_,tt_bBoxOld||(n-=o+l<<1),tt_aElt[5].style.width=n+"px",tt_aElt[1]&&(n=_-(tt_aV[TITLEPADDING]+2<<1),tt_bBoxOld||(_=n),tt_aElt[1].style.width=_+"px",tt_aElt[2].style.width=n+"px"),tt_h&&(i=tt_GetDivH(tt_aElt[5]),i>tt_h&&(tt_bBoxOld||(tt_h-=o+l<<1),tt_aElt[5].style.height=tt_h+"px")),tt_h=tt_GetDivH(tt_aElt[0])+t,tt_aElt[8]&&(tt_aElt[8].style.height=tt_h-e+"px"),a=tt_aElt.length-1,tt_aElt[a]&&(tt_aElt[a].style.width=tt_w+"px",tt_aElt[a].style.height=tt_h+"px")}function tt_DeAlt(t){var e;if(t&&(t.alt&&(t.alt=""),t.title&&(t.title=""),e=t.childNodes||t.children||null))for(var n=e.length;n;)tt_DeAlt(e[--n])}function tt_OpDeHref(t){if(tt_op)for(tt_elDeHref&&tt_OpReHref();t;){if(t.hasAttribute&&t.hasAttribute("href")){t.t_href=t.getAttribute("href"),t.t_stats=window.status,t.removeAttribute("href"),t.style.cursor="hand",tt_AddEvtFnc(t,"mousedown",tt_OpReHref),window.status=t.t_href,tt_elDeHref=t;break}t=tt_GetDad(t)}}function tt_OpReHref(){tt_elDeHref&&(tt_elDeHref.setAttribute("href",tt_elDeHref.t_href),tt_RemEvtFnc(tt_elDeHref,"mousedown",tt_OpReHref),window.status=tt_elDeHref.t_stats,tt_elDeHref=null)}function tt_El2Tip(){var t=tt_t2t.style;tt_t2t.t_cp=t.position,tt_t2t.t_cl=t.left,tt_t2t.t_ct=t.top,tt_t2t.t_cd=t.display,tt_t2tDad=tt_GetDad(tt_t2t),tt_MovDomNode(tt_t2t,tt_t2tDad,tt_aElt[6]),t.display="block",t.position="static",t.left=t.top=t.marginLeft=t.marginTop="0px"}function tt_UnEl2Tip(){var t=tt_t2t.style;t.display=tt_t2t.t_cd,tt_MovDomNode(tt_t2t,tt_GetDad(tt_t2t),tt_t2tDad),t.position=tt_t2t.t_cp,t.left=tt_t2t.t_cl,t.top=tt_t2t.t_ct,tt_t2tDad=null}function tt_OverInit(){tt_over=window.event?window.event.target||window.event.srcElement:tt_ovr_,tt_DeAlt(tt_over),tt_OpDeHref(tt_over)}function tt_ShowInit(){tt_tShow.Timer("tt_Show()",tt_aV[DELAY],!0),(tt_aV[CLICKCLOSE]||tt_aV[CLICKSTICKY])&&tt_AddEvtFnc(document,"mouseup",tt_OnLClick)}function tt_Show(){var t=tt_aElt[0].style;t.zIndex=Math.max(window.dd&&dd.z?dd.z+2:0,1010),(tt_aV[STICKY]||!tt_aV[FOLLOWMOUSE])&&(tt_iState&=-5),tt_aV[EXCLUSIVE]&&(tt_iState|=8),tt_aV[DURATION]>0&&tt_tDurt.Timer("tt_HideInit()",tt_aV[DURATION],!0),tt_ExtCallFncs(0,"Show"),t.visibility="visible",tt_iState|=2,tt_aV[FADEIN]&&tt_Fade(0,0,tt_aV[OPACITY],Math.round(tt_aV[FADEIN]/tt_aV[FADEINTERVAL])),tt_ShowIfrm()}function tt_ShowIfrm(){if(tt_ie56){var t=tt_aElt[tt_aElt.length-1];if(t){var e=t.style;e.zIndex=tt_aElt[0].style.zIndex-1,e.display="block"}}}function tt_Move(t){if(t&&(tt_ovr_=t.target||t.srcElement),t=t||window.event,t&&(tt_musX=tt_GetEvtX(t),tt_musY=tt_GetEvtY(t)),4&tt_iState){if(!tt_op&&!tt_ie){if(tt_bWait)return;tt_bWait=!0,tt_tWaitMov.Timer("tt_bWait = false;",1,!0)}tt_aV[FIX]?(tt_iState&=-5,tt_PosFix()):tt_ExtCallFncs(t,"MoveBefore")||tt_SetTipPos(tt_Pos(0),tt_Pos(1)),tt_ExtCallFncs([tt_musX,tt_musY],"MoveAfter")}}function tt_Pos(t){var e,n,_,i,a,o,l,r,d;return t?(n=tt_aV[JUMPVERT],_=ABOVE,i=OFFSETY,a=tt_h,o=tt_maxPosY,l=tt_GetScrollY(),r=tt_musY,d=tt_bJmpVert):(n=tt_aV[JUMPHORZ],_=LEFT,i=OFFSETX,a=tt_w,o=tt_maxPosX,l=tt_GetScrollX(),r=tt_musX,d=tt_bJmpHorz),n?e=tt_aV[_]&&(!d||tt_CalcPosAlt(t)>=l+16)?tt_PosAlt(t):!tt_aV[_]&&d&&tt_CalcPosDef(t)>o-16?tt_PosAlt(t):tt_PosDef(t):(e=r,tt_aV[_]?e-=a+tt_aV[i]-(tt_aV[SHADOW]?tt_aV[SHADOWWIDTH]:0):e+=tt_aV[i]),e>o&&(e=n?tt_PosAlt(t):o),l>e&&(e=n?tt_PosDef(t):l),e}function tt_PosDef(t){return t?tt_bJmpVert=tt_aV[ABOVE]:tt_bJmpHorz=tt_aV[LEFT],tt_CalcPosDef(t)}function tt_PosAlt(t){return t?tt_bJmpVert=!tt_aV[ABOVE]:tt_bJmpHorz=!tt_aV[LEFT],tt_CalcPosAlt(t)}function tt_CalcPosDef(t){return t?tt_musY+tt_aV[OFFSETY]:tt_musX+tt_aV[OFFSETX]}function tt_CalcPosAlt(t){var e=t?OFFSETY:OFFSETX,n=tt_aV[e]-(tt_aV[SHADOW]?tt_aV[SHADOWWIDTH]:0);return tt_aV[e]>0&&0>=n&&(n=1),(t?tt_musY-tt_h:tt_musX-tt_w)-n}function tt_PosFix(){var t,e;if("number"==typeof tt_aV[FIX][0])t=tt_aV[FIX][0],e=tt_aV[FIX][1];else for(el="string"==typeof tt_aV[FIX][0]?tt_GetElt(tt_aV[FIX][0]):tt_aV[FIX][0],t=tt_aV[FIX][1],e=tt_aV[FIX][2],!tt_aV[ABOVE]&&el&&(e+=tt_GetDivH(el));el;el=el.offsetParent)t+=el.offsetLeft||0,e+=el.offsetTop||0;tt_aV[ABOVE]&&(e-=tt_h),tt_SetTipPos(t,e)}function tt_Fade(t,e,n,_){_&&(e+=Math.round((n-e)/_),(n>t?e>=n:n>=e)?e=n:tt_tFade.Timer("tt_Fade("+t+","+e+","+n+","+(_-1)+")",tt_aV[FADEINTERVAL],!0)),e?tt_SetTipOpa(e):tt_Hide()}function tt_SetTipOpa(t){tt_SetOpa(tt_aElt[5],t),tt_aElt[1]&&tt_SetOpa(tt_aElt[1],t),tt_aV[SHADOW]&&(t=Math.round(.8*t),tt_SetOpa(tt_aElt[7],t),tt_SetOpa(tt_aElt[8],t))}function tt_OnCloseBtnOver(t){var e=tt_aElt[4].style;t<<=1,e.background=tt_aV[CLOSEBTNCOLORS][t],e.color=tt_aV[CLOSEBTNCOLORS][t+1]}function tt_OnLClick(t){t=t||window.event,t.button&&2&t.button||t.which&&3==t.which||(tt_aV[CLICKSTICKY]&&4&tt_iState?(tt_aV[STICKY]=!0,tt_iState&=-5):tt_aV[CLICKCLOSE]&&tt_HideInit())}function tt_Int(t){var e;return isNaN(e=parseInt(t))?0:e}function tt_GetWndCliSiz(t){var e,n=window["inner"+t],_="client"+t,i="number";if(typeof n==i){var a;return(e=document.body)&&typeof(a=e[_])==i&&a&&n>=a?a:(e=document.documentElement)&&typeof(a=e[_])==i&&a&&n>=a?a:n}return(e=document.documentElement)&&(n=e[_])?n:document.body[_]}function tt_SetOpa(t,e){var n=t.style;if(tt_opa=e,1==tt_flagOpa)if(100>e){typeof t.filtNo==tt_u&&(t.filtNo=n.filter);var _="hidden"!=n.visibility;n.zoom="100%",_||(n.visibility="visible"),n.filter="alpha(opacity="+e+")",_||(n.visibility="hidden")}else typeof t.filtNo!=tt_u&&(n.filter=t.filtNo);else switch(e/=100,tt_flagOpa){case 2:n.KhtmlOpacity=e;break;case 3:n.KHTMLOpacity=e;break;case 4:n.MozOpacity=e;break;case 5:n.opacity=e}}function tt_Err(t,e){(tt_Debug||!e)&&alert("Tooltip Script Error Message:\n\n"+t)}function tt_ExtCmdEnum(){var s;for(var i in config)s="window."+i.toString().toUpperCase(),eval("typeof("+s+") == tt_u")&&(eval(s+" = "+tt_aV.length),tt_aV[tt_aV.length]=null)}function tt_ExtCallFncs(t,e){for(var n=!1,_=tt_aExt.length;_;){--_;var i=tt_aExt[_]["On"+e];i&&i(t)&&(n=!0)}return n}var config=new Object,tt_Debug=!0,tt_Enabled=!0,TagsToTip=!0;config.Above=!1,config.BgColor="#4D2C1E",config.BgImg="",config.BorderColor="#4D2C1E",config.BorderStyle="solid",config.BorderWidth=2,config.CenterMouse=!1,config.ClickClose=!1,config.ClickSticky=!1,config.CloseBtn=!1,config.CloseBtnColors=["#990000","#FFFFFF","#DD3333","#FFFFFF"],config.CloseBtnText="&nbsp;X&nbsp;",config.CopyContent=!0,config.Delay=400,config.Duration=0,config.Exclusive=!1,config.FadeIn=100,config.FadeOut=100,config.FadeInterval=30,config.Fix=null,config.FollowMouse=!0,config.FontColor="#FFFFFF",config.FontFace="Arial, Helvetica, sans-serif",config.FontSize="11px",config.FontWeight="normal",config.Height=0,config.JumpHorz=!1,config.JumpVert=!0,config.Left=!1,config.OffsetX=14,config.OffsetY=8,config.Opacity=100,config.Padding=10,config.Shadow=!1,config.ShadowColor="#C0C0C0",config.ShadowWidth=5,config.Sticky=!1,config.TextAlign="left",config.Title="",config.TitleAlign="left",config.TitleBgColor="",config.TitleFontColor="#FFFFFF",config.TitleFontFace="",config.TitleFontSize="",config.TitlePadding=2,config.Width=250;var tt_aElt=new Array(10),tt_aV=new Array,tt_sContent,tt_t2t,tt_t2tDad,tt_musX,tt_musY,tt_over,tt_x,tt_y,tt_w,tt_h,tt_aExt=new Array,tt_db,tt_op,tt_ie,tt_ie56,tt_bBoxOld,tt_body,tt_ovr_,tt_flagOpa,tt_maxPosX,tt_maxPosY,tt_iState=0,tt_opa,tt_bJmpVert,tt_bJmpHorz,tt_elDeHref,tt_tShow=new Number(0),tt_tHide=new Number(0),tt_tDurt=new Number(0),tt_tFade=new Number(0),tt_tWaitMov=new Number(0),tt_bWait=!1,tt_u="undefined";Number.prototype.Timer=function(t,e,n){(!this.value||n)&&(this.value=window.setTimeout(t,e))},Number.prototype.EndTimer=function(){this.value&&(window.clearTimeout(this.value),this.value=0)},tt_Init();