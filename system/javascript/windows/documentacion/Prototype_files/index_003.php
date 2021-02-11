/* generated javascript */
var skin = 'monobook';
var stylepath = '/skins-1.5';

/* MediaWiki:Common.js */
 /** Execute function on page load *********************************************
  *
  *  Description: Wrapper around addOnloadHook() for backwards compatibility.
  *               Will be removed in the near future.
  *  Maintainers: [[User:R. Koot]]
  */
 
 function addLoadEvent( f ) { addOnloadHook( f ); }

 /** Import module *************************************************************
  *
  *  Description: Includes a raw wiki page as javascript or CSS, 
  *               used for including user made modules.
  *  Maintainers: [[User:AzaToth]]
  */
 
 function importScript( page ) {
     var url = wgScriptPath + '/index.php?title='
                            + escape( page.replace( ' ', '_' ) )
                            + '&action=raw&ctype=text/javascript&dontcountme=s';
     var scriptElem = document.createElement( 'script' );
     scriptElem.setAttribute( 'src' , url );
     scriptElem.setAttribute( 'type' , 'text/javascript' );
     document.getElementsByTagName( 'head' )[0].appendChild( scriptElem );
 }
 
 function importStylesheet( page ) {
     var sheet = '@import "'
               + wgScriptPath
               + '/index.php?title='
               + escape( page.replace( ' ', '_' ) )
               + '&action=raw&ctype=text/css";'
     var styleElem = document.createElement( 'style' );
     styleElem.setAttribute( 'type' , 'text/css' );
     styleElem.appendChild( document.createTextNode( sheet ) );
     document.getElementsByTagName( 'head' )[0].appendChild( styleElem );
 }

 /* Test if an element has a certain class **************************************
  *
  * Description: Uses regular expressions and caching for better performance.
  * Maintainers: [[User:Mike Dillon]], [[User:R. Koot]], [[User:SG]]
  */
 
 var hasClass = (function () {
     var reCache = {};
     return function (element, className) {
         return (reCache[className] ? reCache[className] : (reCache[className] = new RegExp("(?:\\s|^)" + className + "(?:\\s|$)"))).test(element.className);
     };
 })();

 /** Internet Explorer bug fix **************************************************
  *
  *  Description: UNDOCUMENTED
  *  Maintainers: [[User:Tom-]]?
  */
 
 if (window.showModalDialog && document.compatMode && document.compatMode == "CSS1Compat")
 {
   var oldWidth;
   var docEl = document.documentElement;
 
   function fixIEScroll()
   {
     if (!oldWidth || docEl.clientWidth > oldWidth)
       doFixIEScroll();
     else
       setTimeout(doFixIEScroll, 1);
   
     oldWidth = docEl.clientWidth;
   }
 
   function doFixIEScroll() {
     docEl.style.overflowX = (docEl.scrollWidth - docEl.clientWidth < 4) ? "hidden" : "";
   }
   document.attachEvent("onreadystatechange", fixIEScroll);
   attachEvent("onresize", fixIEScroll);
 }


 /** Collapsible tables *********************************************************
  *
  *  Description: Allows tables to be collapsed, showing only the header. See
  *               [[Wikipedia:NavFrame]].
  *  Maintainers: [[User:R. Koot]]
  */
 
 var autoCollapse = 2;
 var collapseCaption = "ocultar";
 var expandCaption = "mostrar";
 
 function collapseTable( tableIndex )
 {
     var Button = document.getElementById( "collapseButton" + tableIndex );
     var Table = document.getElementById( "collapsibleTable" + tableIndex );
 
     if ( !Table || !Button ) {
         return false;
     }
 
     var Rows = Table.getElementsByTagName( "tr" ); 
 
     if ( Button.firstChild.data == collapseCaption ) {
         for ( var i = 1; i < Rows.length; i++ ) {
             Rows[i].style.display = "none";
         }
         Button.firstChild.data = expandCaption;
     } else {
         for ( var i = 1; i < Rows.length; i++ ) {
             Rows[i].style.display = Rows[0].style.display;
         }
         Button.firstChild.data = collapseCaption;
     }
 }
 
 function createCollapseButtons()
 {
     var tableIndex = 0;
     var NavigationBoxes = new Object();
     var Tables = document.getElementsByTagName( "table" );
 
     for ( var i = 0; i < Tables.length; i++ ) {
         if ( hasClass( Tables[i], "collapsible" ) ) {
             NavigationBoxes[ tableIndex ] = Tables[i];
             Tables[i].setAttribute( "id", "collapsibleTable" + tableIndex );
 
             var Button     = document.createElement( "span" );
             var ButtonLink = document.createElement( "a" );
             var ButtonText = document.createTextNode( collapseCaption );
 
             Button.style.styleFloat = "right";
             Button.style.cssFloat = "right";
             Button.style.fontWeight = "normal";
             Button.style.textAlign = "right";
             Button.style.width = "6em";
 
             ButtonLink.setAttribute( "id", "collapseButton" + tableIndex );
             ButtonLink.setAttribute( "href", "javascript:collapseTable(" + tableIndex + ");" );
             ButtonLink.appendChild( ButtonText );
 
             Button.appendChild( document.createTextNode( "[" ) );
             Button.appendChild( ButtonLink );
             Button.appendChild( document.createTextNode( "]" ) );
 
             var Header = Tables[i].getElementsByTagName( "tr" )[0].getElementsByTagName( "th" )[0];
             Header.insertBefore( Button, Header.childNodes[0] );
 
             tableIndex++;
         }
     }
 
     for ( var i = 0;  i < tableIndex; i++ ) {
         if ( hasClass( NavigationBoxes[i], "collapsed" ) || ( tableIndex >= autoCollapse && hasClass( NavigationBoxes[i], "autocollapse" ) ) ) {
             collapseTable( i );
         }
     }
 }
 
 addOnloadHook( createCollapseButtons );

 //fix edit summary prompt for undo
 //this code fixes the fact that the undo function combined with the "no edit summary prompter" causes problems if leaving the
 //edit summary unchanged
 //this was added by [[User:Deskana]], code by [[User:Tra]]
 addOnloadHook(function () {
   if (document.location.search.indexOf("undo=") != -1
   && document.getElementsByName('wpAutoSummary')[0]) {
     document.getElementsByName('wpAutoSummary')[0].value='';
   }
 })

/* MediaWiki:Monobook.js (deprecated; migrate to Common.js!) */
//<h2>Tooltips and access keys</h2><pre>
ta = new Object();
ta['pt-userpage'] = new Array('.','Mi página de usuario'); 
ta['pt-anonuserpage'] = new Array('.','La página de usuario de la IP desde la que editas'); 
ta['pt-mytalk'] = new Array('n','Mi página de discusión'); 
ta['pt-anontalk'] = new Array('n','Discusión sobre ediciones hechas desde esta dirección IP'); 
ta['pt-preferences'] = new Array('','Mis preferencias'); 
ta['pt-watchlist'] = new Array('l','La lista de páginas para las que estás vigilando los cambios'); 
ta['pt-mycontris'] = new Array('y','Lista de mis contribuciones'); 
ta['pt-login'] = new Array('o','Te animamos a registrarte antes de editar, aunque no es obligatorio'); 
ta['pt-anonlogin'] = new Array('o','Te animamos a registrarte antes de editar, aunque no es obligatorio'); 
ta['pt-logout'] = new Array('o','Salir de la sesión'); 
ta['ca-talk'] = new Array('t','Discusión acerca del artículo'); 
ta['ca-edit'] = new Array('e','Puedes editar esta página. Por favor, usa el botón de previsualización antes de grabar.'); 
ta['ca-addsection'] = new Array('+','Añadir un comentario a esta discusión'); 
ta['ca-viewsource'] = new Array('e','Esta página está protegida, sólo puedes ver su código fuente'); 
ta['ca-history'] = new Array('h','Versiones anteriores de esta página y sus autores'); 
ta['ca-protect'] = new Array('=','Proteger esta página'); 
ta['ca-delete'] = new Array('d','Borrar esta página'); 
ta['ca-undelete'] = new Array('d','Restaurar las ediciones hechas a esta página antes de que fuese borrada'); 
ta['ca-move'] = new Array('m','Trasladar (renombrar) esta página'); 
ta['ca-nomove'] = new Array('','No tienes los permisos necesarios para trasladar esta página'); 
ta['ca-watch'] = new Array('w','Añadir esta página a tu lista de seguimiento'); 
ta['ca-unwatch'] = new Array('w','Borrar esta página de tu lista de seguimiento'); 
ta['search'] = new Array('f','Buscar en este wiki'); 
ta['p-logo'] = new Array('','Portada'); 
ta['n-mainpage'] = new Array('z','Visitar la Portada'); 
ta['n-portal'] = new Array('','Acerca del proyecto, qué puedes hacer, dónde encontrar información'); 
ta['n-currentevents'] = new Array('','Información de contexto sobre acontecimientos actuales'); 
ta['n-recentchanges'] = new Array('r','La lista de cambios recientes en el wiki'); 
ta['n-randompage'] = new Array('x','Cargar una página aleatoriamente'); 
ta['n-help'] = new Array('','El lugar para aprender'); 
ta['n-sitesupport'] = new Array('','Respáldanos'); 
ta['t-whatlinkshere'] = new Array('j','Lista de todas las páginas del wiki que enlazan con ésta'); 
ta['t-recentchangeslinked'] = new Array('k','Cambios recientes en las páginas que enlazan con esta otra'); 
ta['feed-rss'] = new Array('','Sindicación RSS de esta página'); 
ta['feed-atom'] = new Array('','Sindicación Atom de esta página'); 
ta['t-contributions'] = new Array('','Ver la lista de contribuciones de este usuario'); 
ta['t-emailuser'] = new Array('','Enviar un mensaje de correo a este usuario'); 
ta['t-upload'] = new Array('u','Subir imágenes o archivos multimedia'); 
ta['t-specialpages'] = new Array('q','Lista de todas las páginas especiales'); 
ta['ca-nstab-main'] = new Array('c','Ver el artículo'); 
ta['ca-nstab-user'] = new Array('c','Ver la página de usuario'); 
ta['ca-nstab-media'] = new Array('c','Ver la página de multimedia'); 
ta['ca-nstab-special'] = new Array('','Esta es una página especial, no se puede editar la página en sí'); 
ta['ca-nstab-wp'] = new Array('a','Ver la página de proyecto'); 
ta['ca-nstab-image'] = new Array('c','Ver la página de la imagen'); 
ta['ca-nstab-mediawiki'] = new Array('c','Ver el mensaje de sistema'); 
ta['ca-nstab-template'] = new Array('c','Ver la plantilla'); 
ta['ca-nstab-help'] = new Array('c','Ver la página de ayuda'); 
ta['ca-nstab-category'] = new Array('c','Ver la página de categoría');
ta['wpConfirmB'] = new Array('s','Borrar realmente la página');

/*</pre>
== Código del plegado/desplegado de plantillas ==
<pre><nowiki> */
var NavigationBarHide = 'Plegar';
var NavigationBarShow = 'Desplegar';

var NavigationBarShowDefault = 0;

document.write('<script type="text/javascript" ' +
  'src="/w/index.php?title=MediaWiki:NavigationBar.js' +
  '&amp;action=raw&amp;smaxage=3600&amp;ctype=text/javascript&amp;dontcountme=s"></scr' +
  'ipt>');

/*</nowiki></pre>

== Código para artículos destacados ==
<pre><nowiki> */
		
function LinkFA() 
{
   //Si este es artículo destacado, poner enlace a [[Wikipedia:Artículos destacados]]
   var a = document.getElementById('id-articulo-destacado');
   if (a)
     a.firstChild.href = wgArticlePath.replace("$1", "Wikipedia:Art%C3%ADculos_destacados");

   // iterate over all <span>-elements
   for (var i=0; a = document.getElementsByTagName("span")[i]; i++) {
      // if found a FA span
      if(a.className == "destacado") {
         // iterate over all <li>-elements
         for(var j=0; b = document.getElementsByTagName("li")[j]; j++) {
            // if found a FA link
            if (b.className == "interwiki-" + a.id) {
               b.style.padding = "0 0 0 16px";
               b.style.backgroundImage = "url('http://upload.wikimedia.org/" +
                                         "wikipedia/en/6/60/LinkFA-star.png')";
               b.style.backgroundRepeat = "no-repeat";
               b.title = "Este artículo ha sido destacado en esta wiki";
            }
         }
      }
   }
}

if (window.addEventListener) window.addEventListener("load",LinkFA,false);
else if (window.attachEvent) window.attachEvent("onload",LinkFA);


function addLoadEvent(func) {
   if (window.addEventListener) {
       window.addEventListener("load", func, false);
   } else if (window.attachEvent) {
       window.attachEvent("onload", func);
   }
}

/*</nowiki></pre>
== Código para eliminar el título y las categorías en la Portada ==
<pre><nowiki>*/
   var mpTitle = "Portada";
   var isMainPage = (document.title.substr(0, document.title.lastIndexOf(" - ")) == mpTitle);
   var isDiff = (document.location.search
                 && (document.location.search.indexOf("diff=") != -1 ||
                     document.location.search.indexOf("oldid=") != -1));

   if (isMainPage && !isDiff) {
      document.write('<style type="text/css">/*<![CDATA[*/ ' +
                     '#lastmod, #siteSub, #contentSub, h1.firstHeading, #catlinks' +
                     '{ display: none !important; } /*]]>*/</style>');
   }

/*</nowiki></pre>
== Interproyectos en un recuadro a la izquierda ==
Modificado a partir de de:wikt:Mediawiki:monobook.js

Funcionan con la plantilla <nowiki>{{</nowiki>[[Plantilla:{{{1}}}|{{{1}}}]]{{#if:{{{2|}}}|<nowiki>|</nowiki>{{{2}}}}}{{#if:{{{3|}}}|<nowiki>|</nowiki>{{{3}}}}}{{#if:{{{4|}}}|<nowiki>|</nowiki>{{{4}}}}}<nowiki>}}</nowiki><noinclude>
{{esotérica}}
[[Categoría:Wikipedia:Plantillas que usan ParserFunctions|{{PAGENAME}}]]
</noinclude> y en breve con otras [[:Categoría:Wikipedia:Plantillas_de_enlace_entre_proyectos|plantillas de enlace entre proyectos]]
<pre><nowiki>*/

 document.write('<style type="text/css">#interProject {display: none; speak: none;} #p-tb .pBody {padding-right: 0;}<\/style>');
 function iProject() {
  var elementos = new Array();
  var els = document.getElementsByTagName("span");
  var elsLen = els.length;
  for (i = 0, j = 0; i < elsLen; i++) {
    if ( "interProject" == els[i].className) {
      elementos[j] = els[i];
      j++;
    }
  }
  if (j) {
     var IPY='<h5>otros proyectos<\/h5><div class="pBody"><ul>';
     for (i = 0; i< elementos.length; i++) {
         IPY += '<li>'+elementos[i].innerHTML+'</li>';
     }
     var interProject = document.createElement("div");
     interProject.style.marginTop = "0.7em";
     interProject.innerHTML = IPY+'</ul><\/div>';
     document.getElementById("p-tb").appendChild(interProject);
   }
 }
 addLoadEvent(iProject);

/*</nowiki></pre>
== Caracteres especiales (edittools) ==
Crea (y coloca) el ''combobox'' que permite seleccionar un conjunto determinado de
caracteres especiales bajo la caja de edición.
Funciona en conjunto con [[MediaWiki:Edittools]] y [[MediaWiki:Edittools.js]].

Basado en [[commons:MediaWiki:Edittools.js]].
<pre><nowiki>*/

document.write('<script type="text/javascript" ' +
               'src="/w/index.php?title=MediaWiki:Edittools.js' +
               '&action=raw&smaxage=3600' +
               '&ctype=text/javascript' +
               '&dontcountme=s"></scr' +
               'ipt>');

function MenuDeCaracteresEspecialesWrp()
{
  if (typeof(quieroEditToolsSimple) != "undefined" && !quieroEditToolsSimple)
      MenuDeCaracteresEspeciales();
}

addLoadEvent(MenuDeCaracteresEspecialesWrp);

/*</nowiki></pre>

== Búsqueda especial extendida (specialsearch) ==
Añade a la página [[Special:Search]] enlaces a buscadores externos como Yahoo, Google, MSN Live y Exalead.

Trabaja en conjunto con el módulo [[MediaWiki:SpecialSearch.js]] y está basado en [[w:fr:MediaWiki:Monobook.js]].
<pre><nowiki>*/

document.write('<script type="text/javascript" src="' 
+ '/w/index.php?title=MediaWiki:SpecialSearch.js'
+ '&action=raw&ctype=text/javascript&dontcountme=s&smaxage=3600"></script>');

/*</nowiki></pre>

== Título incorrecto ==
Desde en: (Maintainers: User:Interiot, User:Mets501) incorporado por [[Usuario:Platonides]] 

<pre><nowiki>*/


// For pages that have something like Template:Lowercase, replace the title, but only if it is cut-and-pasteable as a valid wikilink.
//      (for instance iPod's title is updated.  But [[C#]] is not an equivalent wikilink, so [[C Sharp]] doesn't have its main title changed)
//
// The function looks for a banner like this: 
 // <div id="RealTitleBanner">    <!-- div that gets hidden -->
 //   <span id="RealTitle">title</span>
 // </div>
 // An element with id=DisableRealTitle disables the function.
var disableRealTitle = 0;               // users can disable this by making this true from their monobook.js
if (wgIsArticle) {                      // don't display the RealTitle when editing, since it is apparently inconsistent (doesn't show when editing sections, doesn't show when not previewing)
    addOnloadHook(function() {
        try {
                var realTitleBanner = document.getElementById("RealTitleBanner");
                if (realTitleBanner && !document.getElementById("DisableRealTitle") && !disableRealTitle) {
                        var realTitle = document.getElementById("RealTitle");
                        if (realTitle) {
                                var realTitleHTML = realTitle.innerHTML.replace(/<\/?(sub|sup|small|big)>/gi, function(match) { return match.toLowerCase(); });
                                realTitleText = pickUpText(realTitle);

                                var isPasteable = 0;
                                //var containsHTML = /</.test(realTitleHTML);        // contains ANY HTML
                                var containsTooMuchHTML = /</.test( realTitleHTML.replace(/<\/?(sub|sup|small|big)>/gi, "") ); // contains HTML that will be ignored when cut-n-pasted as a wikilink
                                // calculate whether the title is pasteable
                                var verifyTitle = realTitleText.replace(/^ +/, "");             // trim left spaces
                                verifyTitle = verifyTitle.charAt(0).toUpperCase() + verifyTitle.substring(1, verifyTitle.length);       // uppercase first character

                                // if the namespace prefix is there, remove it on our verification copy.  If it isn't there, add it to the original realValue copy.
                                if (wgNamespaceNumber != 0) {
                                        if (wgCanonicalNamespace == verifyTitle.substr(0, wgCanonicalNamespace.length).replace(/ /g, "_") && verifyTitle.charAt(wgCanonicalNamespace.length) == ":") {
                                                verifyTitle = verifyTitle.substr(wgCanonicalNamespace.length + 1);
                                        } else {
                                                realTitleText = wgCanonicalNamespace.replace(/_/g, " ") + ":" + realTitleText;
                                                realTitleHTML = wgCanonicalNamespace.replace(/_/g, " ") + ":" + realTitleHTML;
                                        }
                                }

                                // verify whether wgTitle matches
                                verifyTitle = verifyTitle.replace(/^ +/, "").replace(/ +$/, "");                // trim left and right spaces
                                verifyTitle = verifyTitle.replace(/_/g, " ");           // underscores to spaces
                                verifyTitle = verifyTitle.charAt(0).toUpperCase() + verifyTitle.substring(1, verifyTitle.length);       // uppercase first character
                                isPasteable = (verifyTitle == wgTitle);

                                var h1 = document.getElementsByTagName("h1")[0];
                                if (h1 && isPasteable) {
                                        h1.innerHTML = containsTooMuchHTML ? realTitleText : realTitleHTML;
                                        if (!containsTooMuchHTML)
                                                realTitleBanner.style.display = "none";
                                }
                                document.title = realTitleText + " - Wikipedia, la enciclopedia libre";
                        }
                }
        } catch (e) {
                /* Something went wrong. */
        }
    });
}

// similar to innerHTML, but only returns the text portions of the insides, excludes HTML
function pickUpText(aParentElement) {
  var str = "";

  function pickUpTextInternal(aElement) {
    var child = aElement.firstChild;
    while (child) {
      if (child.nodeType == 1)          // ELEMENT_NODE 
        pickUpTextInternal(child);
      else if (child.nodeType == 3)     // TEXT_NODE
        str += child.nodeValue;

      child = child.nextSibling;
    }
  }

  pickUpTextInternal(aParentElement);

  return str;
}

//</nowiki></pre>