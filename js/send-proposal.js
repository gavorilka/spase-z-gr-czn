const proposalSendBtn = document.querySelector('.btn-black')

proposalSendBtn.addEventListener('click',(evt) => {
    evt.preventDefault()
    // console.log('click')

    const proposal = new FormData()
    proposal.append('name', document.querySelector('.vacation-form input[name=name]').value)
    proposal.append('phone', document.querySelector('.vacation-form input[name=phone]').value)
    proposal.append('height',  document.querySelector('.vacation-form input[name=height]').value)
    proposal.append('weight', document.querySelector('.vacation-form input[name=weight]').value)
    proposal.append('agreement',  document.querySelector('.vacation-form input[name=agreement]').value)

    const url = '/php/proposal.php'
    const params = {
        method: 'POST',
        body: proposal
    }
    fetch(url,params)
        .then(response => response.json())
        .then(result => proposalModal(result));
})
const proposalModal = (result) => {
    console.log(result)
    const modal = document.querySelector('.modal')
    const modalPar = modal.querySelector('p')
    modalPar.textContent = result.message
    modal.classList.add('modal_opened')
}