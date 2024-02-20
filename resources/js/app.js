import {openModal, closeModal, handleModalClose} from './components/modal-functions.js';

const buttonsAuthRegister = document.querySelectorAll('[data-modal]')

buttonsAuthRegister.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-target')
        const modal = document.getElementById(modalId)
        openModal(modal)
    })
})

const btnRegister = document.getElementById('btn-register')
const btnAuth = document.getElementById('btn-auth')

btnRegister.addEventListener('click', () => {
    closeModal(modalAuth)
    setTimeout(() => openModal(modalRegister), 300)
})

btnAuth.addEventListener('click', () => {
    closeModal(modalRegister)
    setTimeout(() => openModal(modalAuth), 300)
})

const modalContact = document.getElementById('modal-contact')
const openModalContact = document.getElementById('btn-contact')
const closeModalContact = document.getElementById('close-contact')

const modalRegister = document.getElementById('modal-register')
const closeModalRegister = document.getElementById('close-register')

const modalAuth = document.getElementById('modal-auth')
const closeModalAuth = document.getElementById('close-auth')

openModalContact.addEventListener('click', () => {
    openModal(modalContact)
})

closeModalContact.addEventListener('click', () => {
    closeModal(modalContact)
})

closeModalAuth.addEventListener('click', () => {
    closeModal(modalAuth)
})

closeModalRegister.addEventListener('click', () => {
    closeModal(modalRegister)
})

handleModalClose(modalContact)
handleModalClose(modalAuth)
handleModalClose(modalRegister)
