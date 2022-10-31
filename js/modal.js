const advantageList = document.querySelectorAll('.advantage-list li')
const modal = document.querySelector('.modal')
const closeBtn = document.querySelector('.close-modal')
for (const advantage of advantageList) {
    advantage.addEventListener('click',()=>{
        modal.classList.add('modal_opened')
    })
}
closeBtn.addEventListener('click',()=>{
    modal.classList.remove('modal_opened')
})