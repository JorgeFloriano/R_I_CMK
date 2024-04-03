const sc = document.querySelector('html');
const canvas = document.querySelector('#canv1');
const form = document.querySelector('#form');
const clearButton = document.querySelector('#clear1');
const signButton = document.querySelector('#pen1');
const okButton = document.querySelector('#okSign1');
const ctx = canvas.getContext('2d');
const image = document.querySelector('#idSignTec1');
let writingMode = false;
let writingModeBtn = false;
sc.style.overflow = "";

form.addEventListener('submit', () => {
    const imageURL = canvas.toDataURL();
    image.value = imageURL;
    image.height = canvas.height;
    image.width = canvas.width;
    image.style.display = 'block';
    form.appendChild(image);
    clearPad();
})

const clearPad = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

clearButton.addEventListener('click', (event) => {
    event.preventDefault();
    clearPad();
})

signButton.addEventListener('click', (event) => {
    event.preventDefault();
    sc.style.overflow = "hidden";
    writingModeBtn = true;
    canvas.style.border = "3px solid rgb(105, 111, 196)";
})

okButton.addEventListener('click', (event) => {
    event.preventDefault();
    sc.style.overflow = "";
    writingModeBtn = false;
    canvas.style.border = "1px solid rgb(105, 111, 196)";
})

const getTargetPositionMobile = (event) => {
    positionX = event.touches[0].clientX - event.target.getBoundingClientRect().x;
    positionY = event.touches[0].clientY - event.target.getBoundingClientRect().y;

    return [positionX, positionY];
}

const getTargetPosition = (event) => {
    positionX = event.clientX - event.target.getBoundingClientRect().x;
    positionY = event.clientY - event.target.getBoundingClientRect().y;

    return [positionX, positionY];
}

const handlePointerMove = (event) => {
    if (writingModeBtn) {
        if (!writingMode) return
        if (event.type == 'touchmove') {
            const [positionX, positionY] = getTargetPositionMobile(event);
        } else {
            const [positionX, positionY] = getTargetPosition(event);
        }
        ctx.lineTo(positionX, positionY);
        ctx.stroke();
    }
}

const handlePointerUp = () => {
    writingMode = false;
}

const handlePointerDown = (event) => {
    writingMode = true;
    ctx.beginPath();

    if (event.type == 'touchmove') {
        const [positionX, positionY] = getTargetPositionMobile(event);
    } else {
        const [positionX, positionY] = getTargetPosition(event);
    }
    ctx.moveTo(positionX, positionY);
}

ctx.lineWidth = 2;
ctx.lineJoin = ctx.lineCap = 'round';

canvas.addEventListener('mousedown', handlePointerDown, {passive: true});
canvas.addEventListener('touchstart', handlePointerDown, {passive: true});
canvas.addEventListener('mouseup', handlePointerUp, {passive: true});
canvas.addEventListener('touchend', handlePointerUp, {passive: true});
canvas.addEventListener('mouseout', handlePointerUp, {passive: true});
canvas.addEventListener('mousemove', handlePointerMove, {passive: true});
canvas.addEventListener('touchmove', handlePointerMove, {passive: true});