let cookies = 0

let rate = 2

let cursorPrice = 10
let rollerPrice = 50
let mamiePrice = 100
let usinePrice = 1000

let globalInterval

let cursorWinPerSeconde = 0.1
let rollerWinPerSeconde = 0.5
let mamieWinPerSeconde = 5
let usineWinPerSeconde = 50

let cursorNumber = 0
let rollerNumber = 0
let mamieNumber = 0
let usineNumber = 0

let cookieDom = document.querySelector('#cookieImgContainer')
let cookieDomImg = document.querySelector('#cookieImgContainer').firstChild.nextSibling
let cookieNumberDom = document.querySelector('#cookieNumbersContainer')

let cursorPercent = document.querySelector('#cursorPercent')
let rollerPercent = document.querySelector('#rollerPercent')
let mamiePercent = document.querySelector('#mamiePercent')
let usinePercent = document.querySelector('#usinePercent')

let cursorBtn = document.querySelector('#addCursor')
let rollerBtn = document.querySelector('#addRoller')
let mamieBtn = document.querySelector('#addMamie')
let usineBtn = document.querySelector('#addUsine')

let cursor = document.querySelector('#cursor')
let roller = document.querySelector('#roller')
let mamie = document.querySelector('#mamie')
let usine = document.querySelector('#usine')

let usineImg = "<img class=\"usine\" src=\"/secret/usine.png\" height=\"100\" width=\"100\">"
let mamieImg = "<img class=\"mamie\" src=\"/secret/mamie.png\" height=\"100\" width=\"100\">"
let rollerImg ="<img class=\"roller\" src=\"/secret/rouleaux.png\" height=\"100\" width=\"100\">"
let cursorImg ="<img class=\"cursor\" src=\"/secret/cursor.png\" height=\"100\" width=\"100\">"

cookieDom.addEventListener('click', () => {
    cookies++
    updateCookies()

    if (cookies >= cursorPrice && cursorBtn.hasAttribute('disabled')){
        cursorBtn.removeAttribute('disabled')
    }
    if (cookies < cursorPrice && !cursorBtn.hasAttribute('disabled')){
        cursorBtn.setAttribute('disabled','disabled')
    }
    if (cookies >= rollerPrice && rollerBtn.hasAttribute('disabled')){
        rollerBtn.removeAttribute('disabled')
    }
    if (cookies < rollerPrice && !rollerBtn.hasAttribute('disabled')){
        rollerBtn.setAttribute('disabled','disabled')
    }
    if (cookies >= mamiePrice && mamieBtn.hasAttribute('disabled')){
        mamieBtn.removeAttribute('disabled')
    }
    if (cookies < mamiePrice && !mamieBtn.hasAttribute('disabled')){
        mamieBtn.setAttribute('disabled','disabled')
    }
    if (cookies >= usinePrice && usineBtn.hasAttribute('disabled')){
        usineBtn.removeAttribute('disabled')
    }
    if (cookies < usinePrice && !usineBtn.hasAttribute('disabled')){
        usineBtn.setAttribute('disabled','disabled')
    }

    changeScale(cookieDomImg, 1.5)
    setTimeout( () => {
        changeScale(cookieDomImg, 1)
    },100)

    if (cookies === 1000000){
        clearInterval(golbalInterval)
    }
})

cursorBtn.addEventListener('click', () => {
    if (cookies >= cursorPrice && !cursorBtn.hasAttribute('disabled')){
        cursorNumber++
        cookies = cookies - cursorPrice
        setGlobalInterval(cursorWinPerSeconde, cursorNumber)
        cursor.innerHTML += cursorImg
        cursorPrice  += rate * cursorPrice  / 100
        cursorPercent.textContent = (cursorWinPerSeconde * cursorNumber).toFixed(2)
        if (cookies <= cursorPrice){
            cursorBtn.setAttribute('disabled','disabled')
        }
    }
})

rollerBtn.addEventListener('click', () => {
    if (cookies >= rollerPrice && !rollerBtn.hasAttribute('disabled')){
        rollerNumber++
        cookies = cookies - rollerPrice
        setGlobalInterval(rollerWinPerSeconde, rollerNumber)
        roller.innerHTML += rollerImg
        rollerPrice  += rate * rollerPrice  / 100
        rollerPercent.textContent = (rollerWinPerSeconde * rollerNumber).toFixed(2)
        if (cookies <= rollerPrice){
            rollerBtn.setAttribute('disabled','disabled')
        }
    }
})

//
// mamieBtn.addEventListener('click', () => {
//     if (cookies >= mamiePrice && !mamieBtn.hasAttribute('disabled')){
//         mamieNumber++
//         clearInterval(mamieInterval)
//         mamieInterval = setInterval(() =>{
//             cookies+=(mamieWinPerSeconde * mamieNumber)
//             updateCookies()
//         },1000)
//         mamie.innerHTML += mamieImg
//         cookies = cookies - mamiePrice
//         mamiePrice  += rate * mamiePrice  / 100
//         mamiePercent.textContent = (mamieWinPerSeconde * mamieNumber).toFixed(2)
//         if (cookies <= mamiePrice){
//             mamieBtn.setAttribute('disabled','disabled')
//         }
//     }
// })
//
// usineBtn.addEventListener('click', () => {
//     if (cookies >= usinePrice && !usineBtn.hasAttribute('disabled')){
//         usineNumber++
//         clearInterval(usineInterval)
//         usineInterval = setInterval(() =>{
//             cookies+=(usineWinPerSeconde * usineNumber)
//             updateCookies()
//         },1000)
//         usine.innerHTML += usineImg
//         cookies = cookies - usinePrice
//         usinePrice  += rate * usinePrice  / 100
//         usinePercent.textContent = (usineWinPerSeconde * usineNumber).toFixed(2)
//         if (cookies <= usinePrice){
//             usineBtn.setAttribute('disabled','disabled')
//         }
//     }
// })

function setGlobalInterval(perSeconde, numberOfItems) {
    let winPerSecond = 0
    winPerSecond += (perSeconde * numberOfItems)
    clearInterval(globalInterval)
    globalInterval = setInterval(() =>{
        cookies+= winPerSecond
        updateCookies()
    },1000)
}

function changeScale (domElement , percent) {
    return domElement.style.transform = `scale(${percent})`
}

function updateCookies(){
    cookieNumberDom.textContent = Math.round(cookies)
}

