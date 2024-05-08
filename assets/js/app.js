    
const offOne = document.querySelector('.off-one')
const rotates = document.querySelectorAll('.rotate')
const cl = document.querySelector('.cl')
const profile = document.querySelector('.to-left')

function toggleicon() {
offOne.classList.toggle("d-none");
cl.classList.toggle('d-none')
rotates.forEach(element => {
    let currentRotation = parseFloat(element.style.transform.replace('rotate(', '').replace('deg)', '')) || 0;
    currentRotation += 180;
    element.style.transform = `rotate(${currentRotation}deg)`;
});
}

    function toggleProfile(){
       profile.classList.toggle('h-200')
    }
