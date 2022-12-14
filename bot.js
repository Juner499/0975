// ==UserScript==
// @name         Bing Bot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for Bing
// @author       Yuriy
// @match        https://www.bing.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let links = document.links;
let search_icon = document.getElementById("search_icon");
let keywords = ["10 самых популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress", "Вывод произвольных типов записей и полей в WordPress"];
let keyword = keywords[getRandom(0, keywords.length)];

if (search_icon !== null) {
  document.getElementById("sb_form_q").value = keyword;
  search_icon.click();

} else {
  for(let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("napli.ru") !== -1) {
      let link = links[i];

      console.log("Нашел строку " + link);
      link.click();
      break;
    }

  }

}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
