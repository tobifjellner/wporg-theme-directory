import*as e from"@wordpress/interactivity";var t={d:(e,o)=>{for(var a in o)t.o(o,a)&&!t.o(e,a)&&Object.defineProperty(e,a,{enumerable:!0,get:o[a]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const o=(a={getContext:()=>e.getContext,store:()=>e.store},r={},t.d(r,a),r);var a,r;(0,o.store)("wporg/themes/favorite-button",{state:{get labelAction(){const{label:e,isFavorite:t}=(0,o.getContext)();return t?e.remove:e.add}},actions:{*triggerAction(){const e=(0,o.getContext)();if(e.isFavorite)try{yield wp.apiFetch({path:"/wporg-themes/v1/favorite",method:"DELETE",data:{theme_slug:e.themeSlug}}),e.isFavorite=!1,wp.a11y.speak(e.label.unfavorited,"polite")}catch(e){}else try{yield wp.apiFetch({path:"/wporg-themes/v1/favorite",method:"POST",data:{theme_slug:e.themeSlug}}),e.isFavorite=!0,wp.a11y.speak(e.label.favorited,"polite")}catch(e){}}}});