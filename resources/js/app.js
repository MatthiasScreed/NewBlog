import './bootstrap';
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

function initTinyMCE() {
    tinymce.init({
        selector: 'textarea',
        skin: false,
        content_css: false
    });
}

function runHomepageScript() {
    let finaltexts = [["Web_developer"], ["Graphic_designer"]];
    let finaltextIndex = 0;
    let currentWordIndex = 0;
    let finaltext = finaltexts[finaltextIndex][currentWordIndex];
    let currentWordDisplayTime = 0;
    const MINIMUM_DISPLAY_TIME = 15000; // 15 seconds
    const ANIMATION_INTERVAL = 10000; // 10 seconds

    const characters = "!#$%&'()*+,-./:;<=>?@[]^_`{|}~ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let iterations = finaltext.length + 20;

    function randomstr() {
        let n = Math.random();
        n = n * characters.length;
        n = Math.floor(n);
        let out = characters[n];
        return out;
    }

    let text = [];
    for (let i = 0; i < finaltext.length; i++) {
        let t = [];
        text.push(t);
    }

    for (let i = 0; i < finaltext.length; i++) {
        let t = text[i];
        for (let j = 0; j < iterations - 20 * Math.random(); j++) {
            t.push(randomstr());
        }
        t.push(finaltext[i]);
    }

    let counter = 0;
    let wordDisplayed = false;

    function change() {
        finaltext = finaltexts[finaltextIndex][currentWordIndex];
        text = [];
        for (let i = 0; i < finaltext.length; i++) {
            let t = [];
            text.push(t);
        }
        for (let i = 0; i < finaltext.length; i++) {
            let t = text[i];
            for (let j = 0; j < iterations - 20 * Math.random(); j++) {
                t.push(randomstr());
            }
            t.push(finaltext[i]);
        }

        const elemout = document.getElementById("output");
        elemout.innerHTML = '';

        let outputlist = [];
        for (let i = 0; i < finaltext.length; i++) {
            const outputpart = document.createElement("div");
            outputpart.classList.add("letters");
            elemout.appendChild(outputpart);
            outputlist.push(outputpart);
        }

        for (let i = 0; i < finaltext.length; i++) {
            let ft = text[i];
            if (counter < ft.length) {
                if (ft[counter] === '&') {
                    outputlist[i].innerHTML = '&amp;';
                } else if (ft[counter] === ' ') {
                    outputlist[i].innerHTML = ' ';
                } else {
                    outputlist[i].innerHTML = ft[counter];
                }
            } else {
                outputlist[i].innerHTML = ft[ft.length - 1];
            }
        }
        counter++;
        currentWordDisplayTime++;

        if (!wordDisplayed && currentWordDisplayTime * 100 >= MINIMUM_DISPLAY_TIME) {
            wordDisplayed = true;
        }

        if (wordDisplayed && currentWordDisplayTime * 100 >= ANIMATION_INTERVAL) {
            currentWordDisplayTime = 0;
            counter = 0;
            wordDisplayed = false;
            currentWordIndex = (currentWordIndex + 1) % finaltexts[finaltextIndex].length;
            if (currentWordIndex === 0) {
                finaltextIndex = (finaltextIndex + 1) % finaltexts.length;
            }
        }
    }

    const inst = setInterval(change, 100);
}

if (window.location.pathname === '/') {
    runHomepageScript();
}

window.addEventListener('DOMContentLoaded', () => {
    initTinyMCE();
});

