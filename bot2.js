// ==UserScript==
// @name         Bing Bot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for Bing
// @author       Yuriy
// @match        https://www.bing.com/*
// @match        https://napli.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let links = document.links;
let search_icon = document.getElementById("search_icon");
let keywords = ["10 самых популярных шрифтов от Google", "Отключение редакций и ревизий в WordPress", "Вывод произвольных типов записей и полей в WordPress"];
let keyword = keywords[getRandom(0, keywords.length)];
let bingInput = document.getElementById("sb_form_q");

if (search_icon !== null) {
  let i = 0;
  let timerId = setInterval (() => {
    bingInput.value += keyword[i];
    i++;

    if(i == keyword.length) {
      clearInterval(timerId);
      location.hostname == "napli.ru";
      document.getElementById("search_icon").click();
    }
  },500);

} else if (location.hostname == "napli.ru") {
  console.log("Мы на целевом сайте!");
  setInterval(() => {
  let index = getRandom(0, links.length);
  if (getRandom(0, 101) > 70) {
    location.href = "https://www.bing.com/";
  }

  else if (links[index].href.indexOf("napli.ru") !== -1) links[index].click();
  }, getRandom(3000, 5000));

} else {
  let nextBingPage = true;
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("napli.ru") !== -1) {
      let link = links[i];
      nextBingPage = false;
      console.log("Нашел строку " + link);
      setTimeout(() => {
        link.click();
      }, getRandom(2000, 3000));
      break;
    }
  }

  if (document.querySelector(".YyVfkd").innerText == "5") {
    nextBingPage = false;
    location.href = "https://www.bing.com/";
  }

  if (nextBingPage) {
    setTimeout(() => {
      pnnext.click();
    }, getRandom(2000, 4000))

  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
